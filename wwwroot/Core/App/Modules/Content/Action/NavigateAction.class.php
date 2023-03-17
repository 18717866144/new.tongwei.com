<?php
/**
 * 后台导航处理
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class NavigateAction extends GlobalAction {
	private $adminNavigate = null;
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Navigate');
		if (!SUPER_ADMIN) {
			$this->adminNavigate = D('AdminGroupAccess')->findCurrentAdminNavigate();
		}
		//查看权限，暂时不用
	}
	
	public function index() {
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$model = M('Models')->where("model_type='content' AND m_status=1")->getField('id,model_name');
		$navigate = $this->model->order('sort desc,id asc')->getField('id,pid,sort,navigate_name,navigate_mark,c_status,is_show,n_type,is_channel,save_time,mid,setting');
		$types = array(1 => "普通导航", 2 => '单页导航', 3 => '外部链接');
		foreach ($navigate as &$values) {
			if (!isset($this->adminNavigate[$values['id']]) && !SUPER_ADMIN) {
				unset($navigate[$values['id']]);
				continue;
			}
			$values['model_name'] = empty($model[$values['mid']]) ? '<span style="color:red;">╳</span>' : $model[$values['mid']];
			$values['str_manage'] = '';
// 			只有频道页可以添加子导航
			if ($values['is_channel'] == 1 && (SUPER_ADMIN || $this->adminNavigate[$values['id']]['add'] == 1)) {
				$values['str_manage'] .= '<a href="' .U('add_ordinary',array('id'=>$values['id'])). '">添加子导航</a>';
			}else {
				$values['str_manage'] .= '<span style="color:#999999;">添加子导航</span>';
			}
			$values['setting'] = json_decode($values['setting'],true);
			if (($values['n_type'] == 3 || ($values['setting']['navigate_is_html']!=1))) {
				$values['str_manage'] .= '&nbsp;|&nbsp;<span style="color:#999999;">生成HTML</span>';
			} else {
				$values['str_manage'] .= '&nbsp;|&nbsp;<a href="'.U('create_html',array('id'=>$values['id'])).'">生成HTML</a>';
			}
			if ($values['n_type'] == 3){
				$values['str_manage'] .= '&nbsp;|&nbsp;<span style="color:#999999;">预览</span>';
			}else{
				$values['str_manage'] .= '&nbsp;|&nbsp;<a href="'.U('/Index/navigate',array('cid'=>$values['id'])).'" target="_blank">预览</a>';
			}
			if (SUPER_ADMIN || $this->adminNavigate[$values['id']]['edit'] == 1) {
				$values['str_manage'] .= '&nbsp;|&nbsp;<a href="'.U('edit',array('id'=>$values['id'])).'">修改</a>';
			} else {
				$values['str_manage'] .= '&nbsp;|&nbsp;<span style="color:#999999;">修改</span> ';
			}
			if (SUPER_ADMIN || $this->adminNavigate[$values['id']]['delete'] == 1) {
				$values['str_manage'] .= '&nbsp;|&nbsp;<a class="" href="javascript:;" onclick="art.dialog.confirm(\'是否确定要删除？\',function(){location.href=\''.U('delete',array('id'=>$values['id'])). '\'},$.noop)">删除</a>';
			} else {
				$values['str_manage'] .= '&nbsp;|&nbsp;<span style="color:#999999;">删除</span>';
			}
			$values['type_name'] = $types[$values['n_type']];
			$values['show_name'] = $values['is_show']==1 ? '√' : '<span style="color:red;">╳</span>';
			$values['a_status_name'] = $values['c_status']==1 ? '√' : '<span style="color:red;">╳</span>';
		}
		$str = "<tr>
	<td><input type='checkbox' name='id_all[]' value='\$id' /></td>
	<td>\$id</td>
	<td><input name='sort[\$id]' class='text' tabindex='10' type='text' size='3' value='\$sort' class='input'></td>
	<td style='text-align:left;text-indent:10px;'>\$spacer\$navigate_name</td>
	<td>\$navigate_mark</td>
	<td>\$type_name</td>
	<td>\$model_name</td>
	<td>\$show_name</td>
	<td>\$a_status_name</td>
	<td align='center' >\$str_manage</td>
	</tr>";
		$tree->init($navigate);
		$column = $tree->get_tree(0, $str);
		$this->assign("column_str", $column);
		$this->display();
	}
	
	// 	添加外部链接
	public function add_link() {
		if (IS_POST) {
			$this->add_post(3);
		}else {
			// 			上级栏目
			$this->getNavigate();
			$this->display();
		}
	}
	/* 添加普通栏目 */
	public function add_ordinary() {
		// 		模型
		if (IS_POST) {
			$this->add_post(1);
		}else {
			// 			上级栏目
			$this->getNavigate($this->checkData('id','GET',false));
			// 			得到数据表信息
			$this->assign('tableInfo',$this->model->getTableInfo());
			// 			系统模型
			$contentModel = M('Models')->where("model_type='content' AND m_status=1")->select();
			$this->assign('contentModel',$contentModel);
			// 			栏目URL
			$this->assign('columnUrlData_html',FormElements::selectUrl('content', 'navigate', 1,'setting[navigate_url_rule_html]'));
			$this->assign('columnUrlData_nohtml',FormElements::selectUrl('content', 'navigate', 2,'setting[navigate_url_rule_no_html]'));
			// 			内容URL
			$this->assign('contentUrlData_html',FormElements::selectUrl('content', 'show', 1,'setting[content_url_rule_html]'));
			$this->assign('contentUrlData_nohtml',FormElements::selectUrl('content', 'show', 2,'setting[content_url_rule_no_html]'));
			// 			模板先以DEFAULT_SKIN为准
			$this->assign('column_index_tpl',FormElements::select(FormElements::selectTemplate('Content/index'),'setting[navigate_index_tpl]'));
			$this->assign('column_list_tpl',FormElements::select(FormElements::selectTemplate('Content/list'),'setting[navigate_list_tpl]'));
			$this->assign('show_tpl',FormElements::select(FormElements::selectTemplate('Content/show'),'setting[show_tpl]'));
			//后台用户组
			$adminGroup = M('AdminGroup')->where('status=1')->getField('id,title,is_super');
			$this->assign('adminGroup',$adminGroup);
			$this->display();
		}
	}
	/* 添加单页栏目 */
	public function add_single() {
		if (IS_POST) {
			$this->add_post(2);
		}else {
			// 			上级栏目
			$this->getNavigate($this->checkData('id','GET',false));
			$this->assign('columnUrlData_html',FormElements::selectUrl('content', 'navigate', 1,'setting[navigate_url_rule_html]'));
			$this->assign('columnUrlData_nohtml',FormElements::selectUrl('content', 'navigate', 2,'setting[navigate_url_rule_no_html]'));
			$this->assign('column_index_tpl',FormElements::select(FormElements::selectTemplate('Content/single'),'setting[navigate_index_tpl]'));
			$this->display();
		}
	}
	
	/* 得到指定条件栏目树 */
	private function getNavigate($pid = '',$where = '') {
		$navigate = $this->model->where($where)->select();
		foreach ($navigate as &$values) {
			$values['disabled'] =  ($values['is_channel'] == 2) ? 'disabled="disabled"' : '';
			$values['selected'] = $values['id'] == $pid ? 'selected="selected"' : '';
		}
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$str = "<option value='\$id' \$disabled \$selected>\$spacer \$navigate_name</option>";//\$selected
		$tree->init($navigate);
		$this->assign('parent_navigate',$tree->get_tree(0, $str));
	}
	
	/**
	 * 添加处理方法
	 * @param numeric $type
	 */
	private function add_post($type) {
// 		是否有添加子菜单的权限 
		if ($_POST['pid'] != 0 && !SUPER_ADMIN && $this->adminNavigate[$_POST['pid']]['add'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作[添加功能]，操作的导航父ID'.$_POST['pid'], 'USER_ERROR');
			$this->error('您无权操作！');
		}
		// 	数据验证
		$postData = $this->model->checkData($type);
		if (!$postData['vail_status']) $this->error($postData['vail_info']);
		$status = $this->model->addData($postData);
// 		单页
//		if ($type == 2) {
//			$Single = M('Single');
//			$status = $Single->data(array('sid'=>$status,'content'=>$_POST['content']))->add();
//			if (!$status) $this->writeLog('插入单页内容失败', 'SYSTEM_ERROR');
//		}
		if ($status) {
			//更新模型字段缓存
			R('Back/Public/_navigate');
		}
		$this->addPublicMsg($status);
	}
	
	/**
	 * 数据编辑
	 */
	public function edit() {
		if (IS_POST) {
			$this->matchToken($_POST['id'].$_POST['n_type']);
			//验证权限
			if ($this->adminNavigate[$_POST['id']]['edit'] != 1 && !SUPER_ADMIN) {
				$this->writeLog('此后台操作人员，恶意操作[编辑功能]，操作的导航ID'.$_POST['id'], 'USER_ERROR');
				$this->error('您无权操作！');
			}
			// 		数据验证
			$postData = $this->model->checkData($_POST['n_type']);
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->editData($postData);
			// 		单页
			//if ($_POST['n_type'] == 2 && $status!==false ) {
			//	$Single = M('Single');
			//	$status = $Single->where("sid={$_POST['id']}")->setField('content',$_POST['content']);
			//	if($status === false) $this->writeLog('修改单页内容失败，ID'.$_POST['id'], 'SYSTEM_ERROR');
			//}
			if ($status !== false) {
				//更新模型字段缓存
				R('Back/Public/_navigate');
			}
			$this->editPublicMsg($status);
		}else {

			$id = $this->checkData('id');
			
			$current = $this->findOneData($id);
			$current ? $this->assign('current',$current) : $this->error(C('FINT_ERROR'));
			$this->encryptToken($id.$current['n_type']);
			if ($current['setting']) {
				$setting = json_decode($current['setting'],true);
				$this->assign('setting',$setting);
			}
					//后台用户组
					$adminGroup = M('AdminGroup')->where('status=1')->getField('id,title,is_super');
					$this->assign('adminGroup',$adminGroup);
			// 		栏目类别
			switch ($current['n_type']) {
				case 1:
					$tpl = 'edit_ordinary';
					// 			系统模型
					$contentModel = M('Models')->where("model_type='content' AND m_status=1")->select();
					$this->assign('contentModel',$contentModel);
					// 			栏目URL
					$this->assign('columnUrlData_html',FormElements::selectUrl('content', 'navigate', 1,'setting[navigate_url_rule_html]',$setting['navigate_url_rule_html']));
					$this->assign('columnUrlData_nohtml',FormElements::selectUrl('content', 'navigate', 2,'setting[navigate_url_rule_no_html]',$setting['navigate_url_rule_no_html']));
					// 			内容URL
					$this->assign('contentUrlData_html',FormElements::selectUrl('content', 'show', 1,'setting[content_url_rule_html]',$setting['content_url_rule_html']));
					$this->assign('contentUrlData_nohtml',FormElements::selectUrl('content', 'show', 2,'setting[content_url_rule_no_html]',$setting['content_url_rule_no_html']));
					// 			模板先以DEFAULT_SKIN为准
					$this->assign('column_index_tpl',FormElements::select(FormElements::selectTemplate('Content/index'),'setting[navigate_index_tpl]',$setting['navigate_index_tpl']));
					$this->assign('column_list_tpl',FormElements::select(FormElements::selectTemplate('Content/list'),'setting[navigate_list_tpl]',$setting['navigate_list_tpl']));
					$this->assign('show_tpl',FormElements::select(FormElements::selectTemplate('Content/show'),'setting[show_tpl]',$setting['show_tpl']));
					
					break;
				case 2:
					$tpl = 'edit_single';
					$this->assign('columnUrlData_html',FormElements::selectUrl('content', 'navigate', 1,'setting[navigate_url_rule_html]',$setting['navigate_url_rule_html']));
					$this->assign('columnUrlData_nohtml',FormElements::selectUrl('content', 'navigate', 2,'setting[navigate_url_rule_no_html]',$setting['navigate_url_rule_no_html']));
// 					$this->assign('tableInfo',$this->model->getTableInfo());
					$this->assign('column_index_tpl',FormElements::select(FormElements::selectTemplate('Content/single'),'setting[navigate_index_tpl]',$setting['navigate_index_tpl']));
					//单页内容
					//$Single = M('Single');
					//$content = $Single->where("sid=$id")->getField('content');
					//$this->assign('content',$content);
					break;
				case 3:
					$tpl = 'edit_link';
					break;
			}
			// 			上级栏目
			$this->getNavigate($current['pid'],"id<>$id");
			//处理缩略图
			//if ($current['thumbnail']) {
			//	$randNum = mt_rand(1,9999);
			//	$token = Tool::encrypt($randNum.$current['thumbnail']);
			//	$tokenValue = $current['thumbnail'].'|'.$randNum.'|'.$token;
				//$this->assign('thumbnail',$tokenValue);
				$this->assign('thumbnail',$current['thumbnail']);
			//}
			$this->display($tpl);
		}
	}
	
	/* 删除 */
	public function delete() {
		$id = $this->checkData('id');
		$idArray = explode(',', $id);
		foreach ($idArray as $idValue) {
			//验证权限
			if ($this->adminNavigate[$idValue]['delete'] != 1 && !SUPER_ADMIN) {
				$this->writeLog('此后台操作人员，恶意操作[删除功能]，操作的导航ID'.$idValue, 'USER_ERROR');
				$this->error('您无权操作！');
			}
		}
		$deleteData = $this->model->where("id IN($id)")->select();
		$status = $this->model->where("id IN($id)")->delete();
		if ($status) {
			//$Single = M('Single');
			// 		删除单页
			//$Single->where("sid IN($id)")->delete();
			// 		查出子级
			$sonData = $this->model->where("pid IN($id)")->select();
			if ($sonData) {
				$son_id = array();
				foreach ($sonData as $values) {
					$son_id[] = $values['id'];
				}
				$son_id = implode(',',$son_id);
				$this->delete($son_id);
			}
		}
		if ($status) {
			//更新模型字段缓存
			R('Back/Public/_navigate');
		}
		$this->deletePublicMsg($status);
	}
	
	/* 更新URL */
	public function update_url() {
		$data = $this->model->where("id IN({$_POST['id']})")->select();
		foreach ($data as $values) {
			$values['setting'] = json_decode($values['setting'],true);
			$url = URL::get_navigate_url($values['id'], $values);
			$this->model->where("id={$values['id']}")->setField('url',$url);
		}
		//更新模型字段缓存
		R('Back/Public/_navigate');
		$this->success('更新成功！');
	}
	
	/* 更新状态 */
	public function change_status() {
		$params = $this->checkData(array('field','status'),'GET');
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->setField($params['field'],$params['status']);
		if ($status !== false) {
			//更新模型字段缓存
			R('Back/Public/_navigate');
			$this->success('更新成功！');
		} else {
			$this->error('更新失败！');
		}
	}
	
	/* 排序 */
	public function sort() {
		$sort = $this->checkData('sort');
		$sortArr = explode('|', $sort);
		foreach ($sortArr as $values) {
			$valueArr = explode('#', $values);
			//验证权限
			if ($this->adminNavigate[$valueArr[0]]['sort'] != 1 && !SUPER_ADMIN) {
				$this->writeLog('此后台操作人员，恶意操作[排序功能]，操作的导航ID'.$valueArr[0], 'USER_ERROR');
				$this->error('您无权操作！');
			}
			$status = $this->model->where("id='{$valueArr[0]}'")->setField('sort',$valueArr[1]);
		}
		$this->ajaxReturn('','排序设置成功！',1);
	}
	//p， 最大生成多少页，在发布内容时避免全部生成卡死页面
	/* 创建HTML */
	public function create_html($id,$success=true,$p=1) {		
		//$id = $this->checkData('id');
		$id = abs(intval($id));
		$navigate = $this->model->where("id IN($id)")->select();
		foreach ($navigate as $values) {
			$values['setting'] = json_decode($values['setting'],true);
			//同一模型并且只是内容栏目，并且非自身
			if($values['n_type'] == 3 || ($values['n_type']==1 && $values['setting']['navigate_is_html']!=1)) continue;
			//创建目录
			Tool::mkDir(dirname(str_replace(C('INSTALL_PATH'),'',__PATH__).$values['url']));
			//获取附加参数
			$params = array('cid'=>$values['id']);
			$appendParams = URL::get_navigate_append_params($values);
			$appendParams && ($params = array_merge($params,$appendParams));
			$_GET['page'] = 0;
			if($values['n_type'] == 2) {//=>单页
				$Single = M('Single');
				$singleContent = $Single->where("sid={$values['id']}")->getField('content');
				$page = count(explode('_HXCMS_PAGE_', $singleContent));
				//有分页
				if ($page > 1) {
					while ($page > 0) {
						$_GET['page'] +=1;
						$params['page'] = $_GET['page'];
						//生成单页列表页
						$content = file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
						$fileUrl = URL::get_navigate_url($values['id'], $values,$_GET['page'],false);
						file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$fileUrl, $content);
						//生成索引页
						$_GET['page'] == 1 && file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$values['url'], $content);
						$page--;
					}
				} else {
					$content = file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
					file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$values['url'], $content);
				}
			} elseif ($values['n_type'] == 1) {
				//获取分页的total 以及 limit
				$params['back_update_navigate'] = 1;//获取更新标记
				file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
				unset($params['back_update_navigate']);
				$globalsPageInfo = S('back_update_navigate_page_'.$values['id']);
				$pageNum = ceil($globalsPageInfo['html_total']/$globalsPageInfo['html_limit']);
				$_GET['page'] = 0;//当行上面得到$GLOBALS时，$_GET['page']会自动变成 1此处再次变为0
				
				//发布内容时自动生成的页数
				$maxp = 0;
				if($p){
					$maxp = $pageNum-$p;
				}
				while ($pageNum > $maxp) {
					$_GET['page'] +=1;
					$params['page'] = $_GET['page'];
					//生成列表页
					$content = file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
					$fileUrl = URL::get_navigate_url($values['id'], $values,$_GET['page'],false);
					file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$fileUrl, $content);
					//生成索引页
					$_GET['page'] == 1 && file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$values['url'], $content);
					$pageNum--;
				}
			}
		}
		if($success==true) $this->success('成功更新导航HTML！',U('index'));
	}
	
}
?>