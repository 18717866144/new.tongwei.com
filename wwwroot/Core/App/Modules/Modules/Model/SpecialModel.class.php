<?php
/**
 * 链接模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class SpecialModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);	
		$postData['setting']['index_ishtml'] = $postData['setting']['index_ishtml']==on ? 1  : 0 ;
		$postData['setting']['list_ishtml'] = $postData['setting']['list_ishtml']==on ? 1 : 0 ;
		$postData['setting']['show_ishtml'] = $postData['setting']['show_ishtml']==on ? 1 : 0 ;
		$postData['setting'] = json_encode($postData['setting']);
		//数据验证
		return ValiData::_vail()->_check(array(
			
		), $postData);
	}

	public function addData($postData) {
		$tableInfo = $this->getTableInfo('special');
		$postData['url'] = $this->get_special_url($tableInfo['Auto_increment'],$postData);
		
		$pics = explode('|',$postData['thumb']);
		$postData['thumb'] = $pics[0];
		$pics = explode('|',$postData['banner']);
		$postData['banner'] = $pics[0];
		unset($pics);
		
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		$postData['url'] = $this->get_special_url($postData['id'],$postData);
		
		$pics = explode('|',$postData['thumb']);
		$postData['thumb'] = $pics[0];
		$pics = explode('|',$postData['banner']);
		$postData['banner'] = $pics[0];
		unset($pics);
		
		return $this->where("id={$postData['id']}")->data($postData)->save();
	}

	public function page() {	
		$options = $this->resolveGET(array('type_id'));	
		// $options = $this->compareGET('create_time',array('start_time','end_time'),'time',false);
		// $resolveOptions = $this->resolveGET(array('type_id'));
		
		// $options['where'] = array_merge_recursive($options['where'],$resolveOptions['where']);
		// $options['url'] .= $resolveOptions['url'];		
		if( !empty($_GET['q']) ){
			$q = Input::getVar($_GET['q']);
			$options['where']['title'] = array('LIKE',$q);
			$options['url'] .= '&q='.$q;
		}
		
		$page = strip_tags(htmlspecialchars($_GET["page"],ENT_QUOTES));		
		
		
		
		$total = $this->where($options['where'])->count(1);
		$PAGE = new Page($total,'?page={PAGE}'.$options['url'],20);
		
		// print_r($options['where']);
		$pageData = array();
		
		$pageData[] = $this->where($options['where'])->limit($PAGE->limit())->order('sort DESC,id desc')->select();
		
		$pageData[] = $PAGE->show();
		
		return $pageData;
	}
	
	/**
	 * 删除
	 * @param numeric|string $id
	 * @param array $currentModel
	 * @return boolean|numeric
	 */
	public function deleteRecycle($id) {
		//过滤非法数据
		$status = $this->where("id IN({$id})")->delete();
		return $status;
	}
	
	public function get_special_url($id,$special) {
		if(!$special){ 
			$special = $this->find(array('id'=>$id));
		}
		$special['setting'] = json_decode($special['setting'],true);
		
		if($special['is_link']==1){
			return $special['link_url'];
		}
		
		if ($special['setting']['index_ishtml'] == 1) {
			$root = __ROOT__.'/'.(HTML_DIR?HTML_DIR.'/':'');
			$url = $special['setting']['index_url_rule'];
			$url = str_replace(array('{$special_dir}','{$specialid}'),array($special['special_dir'],$special['id']),$url);
		} else {
			$root = __ROOT__.'/';			
			$url = U('modules/special/special?specialid='.$id);
		}				
		$url = explode('|', $url);
		$url = $is_page ? str_replace('{$page}', $is_page, $url[1]) : $url[0];
		$root = $root.ltrim($url,'/');
		/* 添加其它系统变量 */
		if(!empty($urlRule[$urlRule_id]['append_var'])) {
			$append_var = $URLRule->getAppendVars($urlRule[$urlRule_id],$data);
			$root = str_replace($append_var['mark'], $append_var['data'], $root);
		}
		return $root;
	}
	/**
	 * 模型验证数据
	 * @see GlobalModel::modelCheckData()
	 * $setting array|string
	 */
	public function modelCheckData($setting = array()) {
		$postData = parent::modelCheckData();
		$postData['content'] = Input::getVar($_POST['info']['content']);//主内容不去除html
		return $postData;
	}
	
	public function get_content_url($id,$data,$is_page = false) {
		$cid = $data['cid'];
		$create_time = $data['create_time'];
		$special = $this->find(array('id'=>$data['specialid']));
		$special['setting'] = json_decode($special['setting'],true);		
		if ($special['setting']['show_ishtml'] == 1) {
			$root = __ROOT__.'/'.(HTML_DIR?HTML_DIR.'/':'');
			$url = $special['setting']['show_url_rule'];
			$url = str_replace(array('{$special_dir}','{$list_dir}','{$specialid}','{$listid}','{$id}','{$y}','{$m}','{$d}'),array($special['special_dir'],'',$id,$special['special_dir'],$id,date('Y',$create_time),date('m',$create_time),date('d',$create_time)),	$url);
		} else {
			$root = __ROOT__.'/';			
			$url = U('special/content',array('id'=>$id));
		}
		$url = explode('|', $url);
		$url = $is_page ? str_replace('{$page}', $is_page, $url[1]) : $url[0];
		$root = $root.ltrim($url,'/');
		/* 添加其它系统变量 */
		if(!empty($urlRule[$urlRule_id]['append_var'])) {
			$append_var = $URLRule->getAppendVars($urlRule[$urlRule_id],$data);
			$root = str_replace($append_var['mark'], $append_var['data'], $root);
		}
		return $root;
	}
	
	public function modelAddData($currentModel,$postData, $setting = array()) {
		//前后台添加配置
		$postData['is_admin'] = SESSION_TYPE;
		//发布人，前后台已自动判断
		$postData['userid'] = GBehavior::$session['id'];
		//create_time 创建时间
		$postData['create_time'] = NOW_TIME;
		//style
		$postData['style'] = "{$_POST['style_color']}|{$_POST['style_font_weight']}|{$_POST['style_font_size']}";
		//,url
		$tableInfo = $this->getTableInfo($currentModel['table_name']);
		if (isset($postData['is_link']) && $postData['is_link'] == 1) {
			$postData['url'] = $_POST['link_url'];
		}else {
			$postData['url'] = $this->get_content_url($tableInfo['Auto_increment'], $postData);
		}
		return parent::modelAddData($currentModel, $postData);
	}
	
	/**
	 * 模型数据编辑
	 * (non-PHPdoc)
	 * $currentModel array 当前模型
	 * $postData array 提交数据
	 * $setting array|string 其它配置
	 * @see GlobalModel::modelAddData()
	 */
	public function modelEditData($currentModel,$postData, $setting = array()) {
		// 	前台会员判断是否自动审核，必须在自动审核权限，并且此栏目也无需审核才可以
		//if (SESSION_TYPE == 2) $postData['a_status'] = $this->memberAuditStatus($postData['cid']);
		// 		style
		$postData['style'] = "{$_POST['style_color']}|{$_POST['style_font_weight']}|{$_POST['style_font_size']}";
		//,url
		if (isset($postData['is_link']) && $postData['is_link'] == 1) {
			$postData['url'] = $_POST['link_url'];
		}else {
			$postData['is_link'] = 0;
			$postData['create_time'] = $_POST['create_time'];
			$postData['url'] = $this->get_content_url($_POST['id'], $postData);
		}
		return parent::modelEditData($currentModel, $postData);
	}
		
	
}

class SpecialContentModel extends GlobalModel {	
	
	public function page($specialid) {
		$options = $this->resolveGET(array('specialid','typeid'));
		$resolveTime = $this->compareGET('save_time',array('start_time','end_time'),'time',false);
		$resolveStatus = $this->resolveGET(array('a_status'));
		$options['where'] = array_merge_recursive($options['where'],$resolveTime['where'],$resolveStatus['where']);
		$options['url'] .= $resolveTime['url'].$resolveStatus['url'];
		if (!empty($_GET['search_content'])) {
			$search_content = Input::getVar($_GET['search_content']);
			$s_type = Input::getVar($_GET['s_type']);
			if($s_type=='title') {
				$options['where']['title'] = array('LIKE',"%{$search_content}%");	
			}
			$options['url'] .= "&s_type=$s_type&search_content=$search_content";
		}
		//print_r($options['where']);
		$total = $this->where($options['where'])->count(1);	
		$PAGE = new Page($total,'?page={PAGE}&'.$options['url'],$limit=40);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->limit($PAGE->limit())->order('sort DESC,save_time desc')->select();		
		// print_r($this->getLastSql());
		$pageData[] = $PAGE->show();	

		return $pageData;
	}
		
	/**
	 * 删除
	 * @param numeric|string $id
	 * @param array $currentModel
	 * @return boolean|numeric
	 */
	public function deleteRecycle($id,$specialid) {
		//过滤非法数据
		$status = $this->where("id IN({$id}) and specialid={$specialid}")->delete();
		return $status;
	}
}


class SpecialTypeModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'type_name'=>array('s1-30','类别名称不正确！'),
			'sort'=>array('n1-8','排序格式不正确！'),
		), $postData);
	}

	public function addData($postData) {
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		return $this->data($postData)->save();
	}

	public function page() {
		$options = $this->resolveGET(array('id','type_name','sort'));
		
		$total = $this->count(1);
		
		$page = strip_tags(htmlspecialchars($_GET["page"],ENT_QUOTES));
		
		$Page = new Page($total,'?page='.$page.'&'.$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->limit($Page->limit())->order('sort DESC')->select();
		$pageData[] = $Page->show();
		
		return $pageData;
	}	
}

?>