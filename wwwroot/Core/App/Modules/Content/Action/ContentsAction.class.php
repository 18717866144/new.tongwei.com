<?php
/**
 * 内容操作模型
 */
class ContentsAction extends GlobalAction {
	private $cid;
	private $navigate;
	private $currentNavigate = array();
	private $adminNavigate = array();
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Contents');
		$array =  array('index', 'navigate', 'delimiter', 'single');
		if ( !in_array(ACTION_NAME, $array) ) {
			$this->cid = $this->checkData('cid','GET',false);
		}
		$this->navigate = F('navigate');
		if ($this->cid) {
			$this->currentNavigate = $this->navigate[$this->cid];
			$this->currentModel = F("models_{$this->currentNavigate['mid']}");
			//$this->currentModelField = F("models_fields_{$this->currentModel['id']}");
		}
		if (!SUPER_ADMIN) {
			//此管理员权限
			$groupArray = array_keys(GBehavior::$session['admin_group']);
			//用户组当前栏目的权限
			foreach ($groupArray as $value) {
				$this->adminNavigate = array_merge($this->adminNavigate,(array)$this->currentNavigate['setting'][$value]);
			}
			$this->assign('adminNavigate',$this->adminNavigate);
		}
	}
	
	/* 框架导航 */
	public function navigate() {
		$navigate = $this->navigate;
		$groupArray = array_keys(GBehavior::$session['admin_group']);
		foreach ($navigate as $key=>&$values) {
//			if ($values['n_type'] == 2 || $values['n_type'] == 3) {
//				unset($navigate[$key]);
//				continue;
//			}
			if($values['c_status'] == 2){
				unset($navigate[$key]);
				continue;
			}
			if (!SUPER_ADMIN) {
				$isPower = false;
				foreach ($groupArray as $gValue) {
					// 单页导航权限也加入
					if ($values['setting'][$gValue]['admin_add'] == 1 || ($values['setting'][$gValue]['single']==1 && $values['n_type']==2) ) {
						$isPower = true;
					}
				}
				if (!$isPower) unset($navigate[$key]);
			}
		}
		$Tree = new Tree();
		$Tree->init($navigate);
		$this->assign('navigateData',$Tree->get_tree_array(0));
		$this->display();
	}
	
	/* 添加内容 */
	public function add() {
		// 			判断导航是否允许添加
		if ($this->currentNavigate['is_channel'] !=2 || $this->currentNavigate['n_type'] != 1) $this->error('此导航不允许添加内容！');
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_add'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[添加功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		if (IS_POST) {
			$this->matchToken($this->cid);
			$insertId = $this->modelAddPost();
			/* 静态方式则生成HTML */
			if ($this->currentNavigate['setting']['content_is_html'] == 1 && $insertId) $this->create_html($insertId);
			if ($this->currentNavigate['setting']['navigate_is_html'] == 1 && $insertId) $this->navigate_create_html($this->cid);			
			if ($insertId) $this->index_create_html();
			/* 成功展示 */
			$this->result_show($insertId);
		} else {
			$this->modelAddDisplay();
			$this->encryptToken($this->cid);
		   // echo TMPL_PATH.'Content/'.$this->currentModel['setting']['back_content_tpl'];exit;
		   //Core/App/Tpl/Content/content.php
			$this->display(TMPL_PATH.'Content/'.$this->currentModel['setting']['back_content_tpl']);
		}
	}
	
	/* 内容编辑 */
	public function edit() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_edit'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[编辑功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		if (IS_POST) {		
			$this->matchToken($_POST['id'].$this->cid.$_POST['create_time']);
			$status = $this->modelEditPost();			
			/* 静态方式则生成HTML */
			if ($this->currentNavigate['setting']['content_is_html'] == 1 && $status!==false) $this->create_html($_POST['id']);
			if ($this->currentNavigate['setting']['navigate_is_html'] == 1 &&  $status!==false) $this->navigate_create_html($this->cid);
			if ($status!==false) $this->index_create_html();
			$this->result_show($status);
		} else {
			//加Token防止修改非自身数据
			$id = $this->checkData('id');
			$this->matchToken($this->cid.$id.$this->checkData('mr'));
			$current = $this->modelEditDisplay();
			$this->encryptToken($id.$this->cid.$current['create_time']);
			$this->display(TMPL_PATH.'Content/'.$this->currentModel['setting']['back_content_tpl']);
		}
	}
	
	/* 数据删除 */
	public function delete() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_delete'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[删除功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		$mr = $this->checkData('mr','GET');
		if (IS_POST) {
			$idKey = explode('|', trim($_POST['id_key'],'|'));
			foreach ($idKey as $values) {
				$tempArray = explode(',', $values);
				if ($tempArray[1] !== Tool::encrypt($this->cid.$tempArray[0].$mr)) {
					$this->writeLog("此次删除动作发送的POST数据值，被人恶意篡改，严重", 'USER_ERROR');
					$this->error('非法数据值，被拒绝！');//出现错误，立刻谈回， 不再执行
					break;
				}
				$idArray[] = $tempArray[0];
			}
			$idString = implode(',', $idArray);
			$deleteNum = count($idArray);
		} else {
			$id = $this->checkData('id');
			$this->matchToken($this->cid.$id.$mr);
			$deleteNum = 1;
			$idString = $id;
		}
		//删除至回收站
		$status = $this->model->deleteRecycle($idString,$this->currentModel);
		$this->deletePublicMsg($status,'',U('Content/Contents/show',array('cid'=>$this->cid)));
	}
	
	/* 重置模型数据 */
	protected function modelModelData($current) {
		// 			标题重构
		$current['title'] = array('title'=>$current['title'],'style'=>$current['style']);
		//			外部链接
		$current['is_link'] = $current['is_link']==1 ? array('is_link'=>$current['is_link'],'url'=>$current['url']) : array('is_link'=>$current['is_link']);
		
		$current['source'] = array('source'=>$current['source'], 'source_pic'=>$current['source_pic']);
		
// 		关联数据
		$relevant_value = $current['relevant'];
		$current['relevant'] = array();
		$current['relevant']['value'] = $relevant_value;
		$relevant = trim($relevant_value,',');
		if($relevant) $current['relevant']['relevant_title'] = $this->model->findRelevantData($relevant,$this->currentModel);
		return $current;
	}
	
	/* 添加或修改后的提示操作 */
	private function result_show($result) {
		$typeString = (ACTION_NAME == 'add') ? '添加' : '修改'; 
		if($result !== false) {
			$this->writeLog("$typeString数据成功！", 'INFO') ; 
		} else {
			$this->writeLog("$typeString数据失败！", 'USER_ERROR');
			$errorString = ACTION_NAME == 'add' ? C('ADD_ERROR') : C('EDIT_ERROR');
			$this->error($errorString);
		}
		$this->assign('typeString',$typeString);
		$this->assign('id',isset($_POST['id']) ? $_POST['id'] : $result);
		$this->assign('a_status',$_POST['a_status']);		
		$this->display(TMPL_PATH.'Content/result_show.php');
	}
	
	/* 列表页 */
	public function show() {
		$this->cid = $this->checkData('cid','GET',false);
		if (!$this->cid) {
			$this->display();
		} else {
// 			非超管可以查看列表和自己发布的，这样编辑组也有权限审核
			if (!SUPER_ADMIN) {
				//$rtype = $this->checkData('rtype','GET',false);
				//$this->assign('rtype',$rtype ? $rtype : 'my');//默认拿出自己发布的
			}
			$data = $this->model->page($this->cid,$this->currentModel);
			$this->assign('data',$data);
			$this->display(TMPL_PATH.'Content/'.$this->currentModel['setting']['back_list_tpl']);
		}
	}
	
	/* 相关文章 */
	public function relevant() {
		$navigate = $this->navigate;
		//相同栏目
		foreach ($navigate as &$values) {
// 			去除非同一模型
			if ($values['mid'] != $this->currentNavigate['mid']) continue;
			$values['disabled'] =  ($values['n_type'] == 3 || $values['is_channel'] == 1) ? 'disabled="disabled"' : '';
			$values['selected'] = $values['id'] == $_GET['cid'] ? 'selected="selected"' : '';
		}
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$str = "<option value='\$id' \$disabled \$selected>\$spacer \$navigate_name</option>";//\$selected
		$tree->init($navigate);
		$this->assign('navigate',$tree->get_tree(0, $str));		
		$data = $this->model->relevantPage($this->cid,$this->currentModel);
		$this->assign('data',$data);
		$this->display();
	}
	
	/* 排序 */
	public function sort() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_sort'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[排序功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		$sort = $this->checkData('sort');
		$sortArr = explode('|', $sort);
		$Model = $this->model->returnModel($this->currentModel['table_name']);
		foreach ($sortArr as $values) {
			$valueArr = explode('#', $values);
			$status = $Model->where("id='{$valueArr[0]}'")->setField('sort',$valueArr[1]);
		}
		$this->ajaxReturn('','排序设置成功！',1);
	}
	
	/* 审核 */
	public function audit() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_audit'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[审核功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		$a_status = $this->checkData('status','GET')==1 ? 1 : 3;
		$mr = $this->checkData('mr','GET');
		$idKey = explode('|', trim($_POST['id_key'],'|'));
		foreach ($idKey as $values) {
			$tempArray = explode(',', $values);
			if ($tempArray[1] !== Tool::encrypt($this->cid.$tempArray[0].$mr)) {
				$this->writeLog("此次审核动作发送的POST数据值，被人恶意篡改，严重", 'USER_ERROR');
				$this->error('非法数据值，被拒绝！');//出现错误，立刻谈回， 不再执行
				break;
			}
			$idArray[] = $tempArray[0];
		}
		$idString = implode(',', $idArray);
		$status = M()->table(DB_PREFIX.$this->currentModel['table_name'])->where("id IN({$idString})")->setField('a_status',$a_status);
		
// 		审核通过更新会员中心动态
		if($a_status == 1) {
			$data = M()->table(DB_PREFIX.$this->currentModel['table_name'])->where("id IN({$idString}) AND is_admin=2")->getField('id,userid');
			$Dynamic = D('Member/MemberDynamic');
			foreach ($data as $key=>$value) {$Dynamic->addData('share',$key,$this->currentModel['table_name'],$value);}
		}
		if (!$status) $this->writeLog("修改内容审核状态失败，将要悠 的标识 ' $status'，", 'SYSTEM_ERROR');
		$status!==false ? $this->ajaxReturn('','成功更改审核状态！','success') : $this->ajaxReturn('','更改审核状态失败！','error');
	}
	
	/* 移动 */
	public function mobile() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_mobile'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[移动功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		if (IS_POST) {
			$postData = Tool::filterData($_POST);
			$Model = $this->model->returnModel($this->currentModel['table_name']);
// 			批量复制
			if ($postData['mobile_type'] == 1) {
				$result = $Model->where("id IN({$postData['id']})")->select();
 				foreach ($result as &$values) {
 					unset($values['id']);
 					$values['cid'] = $postData['target_id'];
 				}
 				$status = $Model->addAll($result);	
			} else {//批量移动
				$status = $Model->where("id IN({$postData['id']})")->setField('cid',$postData['target_id']);
			}
			if ($status) {
				$this->ajaxReturn('','',1);
			} else {
				$this->writeLog("数据移动或复制失败，复制的导航源{$this->cid}，复制的目标导航{$postData['target_id']}，可能的SQL".$Model->getLastSql(), 'SYSTEM_ERROR');
				$this->ajaxReturn('','',0);
			}
		} else {
			$navigate = F('navigate');
			foreach ($navigate as &$values) {
// 				同一模型并且只是内容栏目，并且非自身
				$values['disabled'] =  ($values['n_type'] != 1 || $values['is_channel'] == 1 || $values['mid']!=$this->currentNavigate['mid'] || $values['id']==$this->cid) ? 'disabled="disabled"' : '';
			}
			$tree = new Tree();
			$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
			$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
			$str = "<option value='\$id' \$disabled>\$spacer \$navigate_name</option>";//\$selected
			$tree->init($navigate);
			$this->assign('navigate',$tree->get_tree(0, $str));
			$this->display();
		}
	}
	
	/* 属性 */
	public function attr() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_attr'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[属性功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		if (IS_POST) {
			$type = $this->checkData('type','GET');
			if (empty($_POST['attr'])) {
				$this->writeLog('未选择需要操作的属性就提交，可能禁用了JS！', 'USER_ERROR');
				$this->error('请选择需要操作的属性！');
			}
			$idArray = explode(',', $_POST['id']);
			if (empty($idArray)) {
				$this->writeLog('需要操作属性的数据丢失，可能为恶意更改导致！', 'USER_ERROR');
				$this->error('未找到可操作属性的数据！');
			}
			$Model = $this->model->returnModel($this->currentModel['table_name']);
			if ($type == 'add') {
				foreach ($idArray as $value) {
					$tempValue = Input::getVar($value);
					$attr = $Model->where("id=$value")->getField('attr');
					if ($attr) {
						$attrArray = explode(',', $attr);
						$attrArray = array_merge($attrArray,$_POST['attr']);
					} else {
						$attrArray = $_POST['attr'];
					}
					$attr = implode(',', $attrArray);
					$Model->where("id=$value")->setField('attr',$attr);
				}
			} else {
				foreach ($idArray as $value) {
					$tempValue = Input::getVar($value);
					$attr = $Model->where("id=$value")->getField('attr');
					if ($attr) {
						$attrArray = explode(',', $attr);
						foreach ($attrArray as $key=>$attrValue) {
							if (in_array($attrValue, $_POST['attr'])) unset($attrArray[$key]);
						}
						$attr = implode(',', $attrArray);
						$Model->where("id=$value")->setField('attr',$attr);
					}
				}
			}
			$this->ajaxReturn('','',1);
		} else {
			$modelFields = F("models_fields_{$this->currentNavigate['mid']}");
			$attr = explode("\r\n", $modelFields['attr']['field_setting']['options']);
			$newAttr = array();
			foreach ($attr as $value) {
				$tempValue = explode('|', $value);
				$newAttr[$tempValue[1]] = $tempValue[0];
			}
			$this->assign('type',$this->checkData('type'));
			$this->assign('attr',$newAttr);
			$this->display();
		}
	}
	
	/* 更新URL */
	public function update_url() {
		$Model = $this->model->returnModel($this->currentModel['table_name']);
		$data = $Model->where("id IN({$_POST['id']})")->select();
		foreach ($data as $values) {
			$url = URL::get_content_url($values['id'],$values);
			$Model->where("id={$values['id']}")->setField('url',$url);
		}
		$this->success('更新成功！');
	}
	
	/* 创建HTML */
	public function create_html($importId = 0) {
		$ids = empty($importId) ? $this->checkData('id') : $importId;
		$idArray = explode(',', $ids);
		$navigate = F('navigate');
		foreach ($idArray as $id) {
			$this->model->createContentHtml($id,$this->currentModel,$navigate);
		}
		(!$importId) && $this->success('成功更新内容页HTML！');
	}
	
	/* 创建栏目页HTML */
	private function navigate_create_html($importId = 0) {			
		if ($importId>0 && $this->navigate[$importId]['setting']['navigate_is_html']==1) {				
			R('Navigate/create_html',array('id'=>$importId,'success'=>false,'p'=>1));
		}
	}
	
	/* 创建首页HTML */
	private function index_create_html() {		
		R('Update/index_create_html',array('success'=>false));		
	}
	
	/*修改单页栏目内容*/
	public function single() {		
		$Single = M('Single');
		$navigate = $this->navigate;
		if(IS_POST) {
			$cid = intval($_POST['cid']);
			if($cid<1 || $navigate[$cid]['mid']!=0) $this->error('此导航不允许添加内容！');
			$d = $Single->where("sid=$cid")->find();
			$_POST['content']=Input::getVar($_POST['content']);
			$_POST['contentmobile']=Input::getVar($_POST['contentmobile']);
			$data = array('sid'=>$cid,'content'=>$_POST['content'], 'contentmobile'=>$_POST['contentmobile'],'updatatime'=>time());
			if($d){
				$status = $Single->where('sid='.$cid)->save($data);
			}else{
				$status = $Single->add($data);
			}
			if($status === false) $this->writeLog('修改单页内容失败，ID'.$cid, 'SYSTEM_ERROR');
			if ($status !== false && $navigate[$cid]['setting']['navigate_is_html']==1) {				
				R('Navigate/create_html',array('id'=>$cid,'success'=>false));
			}
			$this->editPublicMsg($status,'',U('Contents/single',array('cid'=>$cid)));
		}else{
			$cid = intval($_GET['cid']);
			if($cid<1 || $navigate[$cid]['mid']!=0) $this->error('此导航不允许添加内容！');
			$data = $Single->where("sid=$cid")->find();			
			$this->assign('cid',$cid);
			$this->assign('navname',$navigate[$cid]['navigate_name']);
			$this->assign('content',$data['content']);
			$this->assign('contentmobile',$data['contentmobile']);
			$this->assign('updatatime',$data['updatatime']);
			$this->display();
		}
	}
}
?>