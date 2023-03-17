<?php
/**
 * 链接模块
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class SpecialadminAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Special');
		$this->model_content = D('SpecialContent');
		$this->model_type = D('SpecialType');
	}
	
	protected function _get_special($specialid) {
		//return false;
		return $this->model->where(array('id'=>$specialid))->find();
	}
	
	protected function _create_index_html($specialid) {
		return false;
	}
	
	protected function _create_list_html($specialid) {
		return false;
	}
	
	protected function _create_show_html($id) {
		return false;
		//$data = M('special_content')->where(array('id'=>$id))->find();
		//Tool::mkDir(str_replace(C('INSTALL_PATH'),'',__PATH__).dirname($data['url']));
		//$content = file_get_contents(WEB_URL.U('Modules/Special/content/show',array('id'=>$id)));
		//return file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$data['url'], $content);		
	}
	
	public function index() {
		$data = $this->model->page();
	
		$type = $this->type();
		$this->assign('type',$type);		
		$mr = mt_rand(1,9999);	
		$this->assign('mr',$mr);
		$this->assign('data',$data);		
		$this->display();
	}
	
	public function add() {
		if (IS_POST) {			
			$postData = $this->model->checkData();	
			$postData['create_time'] = NOW_TIME;
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->addData($postData);
			$this->addPublicMsg($status);
		}else {
			$type = $this->type();
			$this->assign('type',$type);
			
			$index_tpl_arr = FormElements::selectTemplate('Special/'.($current['setting']['dir_tpl']?'extend/'.$current['setting']['dir_tpl'].'/':'').'index');
			$list_tpl_arr = FormElements::selectTemplate('Special/'.($current['setting']['dir_tpl']?'extend/'.$current['setting']['dir_tpl'].'/':'').'list');
			$show_tpl_arr = FormElements::selectTemplate('Special/'.($current['setting']['dir_tpl']?'extend/'.$current['setting']['dir_tpl'].'/':'').'show');
			$this->assign('index_tpl_arr',$index_tpl_arr);
			$this->assign('list_tpl_arr',$list_tpl_arr);
			$this->assign('show_tpl_arr',$show_tpl_arr);
			
			$this->assign('index_tpl',FormElements::select($index_tpl_arr,'setting[index_tpl]','index.php'));
			$this->assign('list_tpl',FormElements::select($list_tpl_arr,'setting[list_tpl]','list.php'));
			$this->assign('show_tpl',FormElements::select($show_tpl_arr,'setting[show_tpl]','show.php'));
			$this->display();
		}
	}

	public function edit() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) parent::error($postData['vail_info']);
			parent::editPublicMsg($this->model->editData($postData));
		}else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$current['setting'] = json_decode($current['setting'],true);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));						
			$type = $this->type();
			$this->assign('type',$type);
			
			$index_tpl_arr = FormElements::selectTemplate('Special/'.($current['setting']['dir_tpl']?'extend/'.$current['setting']['dir_tpl'].'/':'').'index');
			$list_tpl_arr = FormElements::selectTemplate('Special/'.($current['setting']['dir_tpl']?'extend/'.$current['setting']['dir_tpl'].'/':'').'list');
			$show_tpl_arr = FormElements::selectTemplate('Special/'.($current['setting']['dir_tpl']?'extend/'.$current['setting']['dir_tpl'].'/':'').'show');
			$this->assign('index_tpl_arr',$index_tpl_arr);
			$this->assign('list_tpl_arr',$list_tpl_arr);
			$this->assign('show_tpl_arr',$show_tpl_arr);
			
			$this->assign('index_tpl',FormElements::select($index_tpl_arr,'setting[index_tpl]',$current['setting']['index_tpl']));
			$this->assign('list_tpl',FormElements::select($list_tpl_arr,'setting[list_tpl]',$current['setting']['list_tpl']));
			$this->assign('show_tpl',FormElements::select($show_tpl_arr,'setting[show_tpl]',$current['setting']['show_tpl']));			
			$this->display();
		}
	}

	public function delete() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_delete'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[删除功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		$mr = I('get.mr',0,'intval');
		if (IS_POST) {
			$idKey = explode('|', trim($_POST['id_key'],'|'));
			foreach ($idKey as $values) {
				$tempArray = explode(',', $values);
				if ($tempArray[1] !== Tool::encrypt($tempArray[0].$mr)) {
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
			$this->matchToken($id.$mr);
			$deleteNum = 1;
			$idString = $id;
		}
		// 		删除至回收站
		$status = $this->model->deleteRecycle($idString);
		$this->deletePublicMsg($status,'',U('index',array('page'=>I('list_page',0,'intval'))));
	}
		
	/**
	* 专题内容管理
	*
	*/	
	
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
	
	public function content_add() {
		// print_r($_POST);
		// exit;
		
		if(IS_POST) {
			$specialid = I('post.specialid',0,'intval');
			$typeid = I('post.typeid',0,'intval');
			$recomm = I('post.recomm',0,'intval');
			$position = I('post.position','');
			$link_url = I('post.link_url','');
			$this->matchToken($specialid);	
			$d = M('models')->where("model_type='special'")->find();
			$this->currentModel = F("models_{$d['id']}");
			$insertId = $this->modelAddPost();			
			/* 静态方式则生成HTML */
			if($insertId){
				$this->model_content->where(array('id'=>$insertId))->save(array('specialid'=>$specialid,'typeid'=>$typeid,'recomm'=>$recomm,'position'=>$position,'url'=>$link_url));
				$data = $this->_get_special($specialid);
				$setting = json_decode($data['setting'],true);
				//if($setting['index_ishtml']) $this->_create_index_html($specialid);
				//if($setting['list_ishtml']) $this->_create_list_html($specialid);
				//if($setting['show_ishtml']) $this->_create_show_html($insertId);
			}
			/* 成功展示 */
			$this->addPublicMsg($insertId,'',U('content_list',array('specialid'=>$specialid)));
		}else{			
			//生成URL TEST
			//$this->model->get_content_url(6,M('special_content')->where(array('id'=>6))->find());
			//$this->_create_show_html(6);
			$specialid = I('specialid',0,'intval');
			$this->assign('specialid',$specialid);
			
			$data = $this->_get_special($specialid);
			
			$setting = json_decode($data['setting'],true);
			$this->assign('setting',$setting);
			
			//取得专题内容模型数据
			$d = M('models')->where("model_type='special'")->find();
			$this->currentModel = F("models_{$d['id']}");
			$this->modelAddDisplay();			
			$this->encryptToken($specialid);
			$this->display();
		}
	}
	
	/* 内容编辑 */
	public function content_edit() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_edit'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作专题内容[编辑功能]，操作的专题ID['.I('specialid',0,'intval').']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		if (IS_POST) {
			// var_dump($_POST);exit;
			$specialid = I('post.specialid',0,'intval');
			$typeid = I('post.typeid',0,'intval');		
			$id = I('post.id',0,'intval');
			$recomm = I('post.recomm',0,'intval');
			$position = I('post.position','');
			$link_url = I('post.link_url','link_url');
			$this->matchToken($_POST['id'].$_POST['specialid'].$_POST['create_time']);
			$d = M('models')->where("model_type='special'")->find();
			$this->currentModel = F("models_{$d['id']}");		
			$status = $this->modelEditPost();			
			if($status){
				$style = "{$_POST['style_color']}|{$_POST['style_font_weight']}|{$_POST['style_font_size']}";
				$this->model_content->where(array('id'=>$id))->save(array('typeid'=>$typeid,'recomm'=>$recomm,'position'=>$position,'url'=>$link_url,'style'=>$style));
				//$data = $this->_get_special($specialid);
				//$setting = json_decode($data['setting'],true);
				//if($setting['index_ishtml']) $this->_create_index_html($specialid);
				//if($setting['list_ishtml']) $this->_create_list_html($specialid);
				//if($setting['show_ishtml']) $this->_create_show_html($insertId);
			}
			$this->editPublicMsg($status,'',U('content_list',array('specialid'=>$specialid)));
		} else {			
			$id = $this->checkData('id');
			$specialid = I('specialid',0,'intval');
			$this->assign('specialid',$specialid);
			$data = $this->_get_special($specialid);
			$setting = json_decode($data['setting'],true);
			$this->assign('setting',$setting);			
			$d = M('models')->where("model_type='special'")->find();
			$this->currentModel = F("models_{$d['id']}");
			$current = $this->modelEditDisplay();
			$this->encryptToken($id.$specialid.$current['create_time']);
			$this->display('content_add');
		}
	}
	
	/* 数据删除 */
	public function content_delete() {
		//不是超管是否有权限
		if (!SUPER_ADMIN && $this->adminNavigate['admin_delete'] != 1) {
			$this->writeLog('此后台操作人员，恶意操作内容[删除功能]，操作的导航ID['.$this->cid.']', 'USER_ERROR');
			$this->error('您无权操作！');
		}
		$specialid = I('get.specialid',0,'intval');
		if (IS_POST) {
			$idKey = explode('|', trim($_POST['id_key'],'|'));
			foreach ($idKey as $values) {
				$tempArray = explode(',', $values);
				if ($tempArray[1] !== Tool::encrypt($specialid.$tempArray[0])) {
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
			$this->matchToken($specialid.$id);
			$deleteNum = 1;
			$idString = $id;
		}
		// 		删除至回收站
		$status = $this->model_content->deleteRecycle($idString,$specialid);
		$this->deletePublicMsg($status,'',U('content_list',array('specialid'=>$specialid,'page'=>I('list_page',0,'intval'))));
	}
	
	
	public function content_list() {
		$specialid = I('specialid');
		$data = $this->_get_special($specialid);
		$setting = json_decode($data['setting'],true);
		$this->assign('setting',$setting);		
		
		$data = $this->model_content->page($specialid);
		$this->assign('specialid',$specialid);
		$this->assign('data',$data);
		$this->display();
	}
	
	/* 内容导入 */
	public function content_import() {	
		$typeid =  I('get.typeid',0,'intval');
		$specialid = I('get.specialid',0,'intval');
		$cid = I('get.cid',0,'intval');
		
		if (IS_POST || $_GET['import']==1) {			
			if(!$cid || !$specialid) $this->error('非法数据值，被拒绝！'.$cid);			
			$postData = Tool::filterData($_POST);
			//根据栏目读取文章数据			
			$navigate = F('navigate');
			$currentNavigate = $navigate[$cid];
			if(!$currentNavigate) $this->error('非法数据值，被拒绝！！');
			$currentModel = F("models_{$currentNavigate['mid']}");
			if(!$currentModel) $this->error('非法数据值，被拒绝！！！');			
			$contentsModel = M($currentModel['table_name']);
			$data = $contentsModel->where("id IN({$postData['id']})")->select();
			$m = $n = 0;
			foreach($data as $v) {
				//防止已导入的重复
				$map = array(
							'specialid'=>array('eq',$specialid),
							'contentid'=>array('eq',$v['id']),
							'table_name'=>array('eq',$currentModel['table_name']),
						);
				$re = $this->model_content->where($map)->find();				
				if($re){ $m++;continue;}					 
				$add = array();
				$add['specialid'] = $specialid;
				$add['cid'] = $cid;
				$add['typeid'] = $typeid;
				$add['table_name'] = $currentModel['table_name'];
				$add['contentid'] = $v['id'];
				$add['thumbnail'] = $v['thumbnail'];
				$add['title'] = $v['title'];
				$add['keywords'] = $v['keywords'];
				$add['description'] = $v['description'];
				$add['is_link'] = 1;
				$add['url'] = $v['url'];
				$add['save_time']  = $add['create_time'] = $v['create_time'];
				$add['userid'] = GBehavior::$session['id'];
				$this->model_content->data($add)->add();
				$n++;
			}		
			$this->ajaxReturn('','成功导入'.$n.'条，'.$m.'条已在专题不导入',1);
		} else {
			$this->assign('cid',$cid);
			$this->assign('typeid',$typeid);
			$this->assign('parent_navigate',$this->getNavigate($cid));
			$this->assign('specialid',$specialid);
			if($cid) {
				$navigate = F('navigate');
				$currentNavigate = $navigate[$cid];
				$currentModel = F("models_{$currentNavigate['mid']}");
				$contentsModel = D('Content/Contents');
				$data = $contentsModel->page($cid,$currentModel,array('specialid'=>$specialid,'typeid'=>$typeid));
				foreach($data[0] as $k=>$v){
					//防止已导入的重复
					$map = array(
							'specialid'=>array('eq',$specialid),
							'contentid'=>array('eq',$v['id']),
							'table_name'=>array('eq',$currentModel['table_name']),
						);
					$re = $this->model_content->where($map)->find();
					if($re) $data[0][$k]['is_import'] = 1;else $data[0][$k]['is_import'] = 0;	
				}
				$this->assign('data',$data);
			}
			
			$s = $this->_get_special($specialid);			
			$setting = json_decode($s['setting'],true);
			$this->assign('setting',$setting);
			
			$this->display();
		}
	}
	
	/* 得到指定条件栏目树 */
	private function getNavigate($pid = '',$where = '') {
		$navigate = F('navigate');
		foreach ($navigate as &$values) {
			$values['disabled'] =  ($values['is_channel'] != 2) ? 'disabled="disabled"' : '';
			$values['selected'] = $values['id'] == $pid ? 'selected="selected"' : '';
		}
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$str = "<option value='\$id' \$disabled \$selected>\$spacer \$navigate_name</option>";//\$selected
		$tree->init($navigate);
		return $tree->get_tree(0,$str);
		//$this->assign('parent_navigate',$tree->get_tree(0, $str));
	}
	
		
	/*private表示类中调用方法，外部禁止访问*/
	private function type() {
		$linkTypeData = $this->model_type->getField('id,type_name,sort');
		return $linkTypeData;
	}
	
	public function type_index() {
		$linkTypeData = $this->model_type->page();
		$this->assign('data',$linkTypeData);
		$this->display();
	}
	
	public function type_add() {
		if (IS_POST) {
			$postData = $this->model_type->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model_type->addData($postData);
			$this->addPublicMsg($status);
		}else {
			$this->display();
		}
	}
	
	public function type_edit() {
		if (IS_POST) {
			$postData = $this->model_type->checkData();
			if (!$postData['vail_status']) parent::error($postData['vail_info']);
			parent::editPublicMsg($this->model_type->editData($postData));
		}else {			
			$id = $this->checkData('id');
			$current = $this->model_type->where("id=$id")->find();
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}
	
	public function type_delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model_type->where("id IN($id)")->delete());
	}
	
	public function type_sort() {		
		$this->sort($this->model_type);
	}
	
}
?>