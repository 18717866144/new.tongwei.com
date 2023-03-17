<?php

class PaperContentModel extends GlobalModel {
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
	
		public function modelAddData($currentModel,$postData, $setting = array()) {
		//前后台添加配置
		$postData['main']['is_admin'] = SESSION_TYPE;
// 		普通用户
		if (SESSION_TYPE == 2) {
			//save_time配置，当前台没有save_time时
			if (!isset($postData['main']['save_time']) || empty($postData['main']['save_time'])) $postData['main']['save_time'] = time();
			// 			判断是否自动审核，必须在自动审核权限，并且此栏目也无需审核才可以
			$postData['main']['a_status'] = $this->memberAuditStatus($postData['main']['cid']);
		}
		//发布人，前后台已自动判断
		$postData['main']['userid'] = GBehavior::$session['id'];
		//		create_time 创建时间
		$postData['main']['create_time'] = NOW_TIME;
		// 		style
		$postData['main']['style'] = "{$_POST['style_color']}|{$_POST['style_font_weight']}|{$_POST['style_font_size']}";
		//,url
		$tableInfo = $this->getTableInfo($currentModel['table_name']);		
		if (isset($postData['main']['is_link']) && $postData['main']['is_link'] == 1) {
			$postData['main']['url'] = $_POST['link_url'];
		}else {
			$postData['main']['url'] = '/paper/content/'.$tableInfo['Auto_increment'].'.html';
		}
		return parent::modelAddData($currentModel, $postData);
	}
	
	/**
	 * 模型数据编辑
	 * $currentModel array 当前模型
	 * $postData array 提交数据
	 * $setting array|string 其它配置
	 * @see GlobalModel::modelAddData()
	 */
	public function modelEditData($currentModel,$postData, $setting = array()) {
		// 		前台会员判断是否自动审核，必须在自动审核权限，并且此栏目也无需审核才可以
		if (SESSION_TYPE == 2) $postData['main']['a_status'] = $this->memberAuditStatus($postData['main']['cid']);
		// 		style
		$postData['main']['style'] = "{$_POST['style_color']}|{$_POST['style_font_weight']}|{$_POST['style_font_size']}";
		//,url
		if (isset($postData['main']['is_link']) && $postData['main']['is_link'] == 1) {
			$postData['main']['url'] = $_POST['link_url'];
		}else {
			$postData['main']['is_link'] = 0;
			$postData['main']['create_time'] = $_POST['create_time'];
			$postData['main']['url'] = '/paper/content/'.$_POST['id'].'.html';
		}
		return parent::modelEditData($currentModel, $postData);
	}
	
	public function page() {
		$options = $this->resolveGET(array('pid','lid','layoutid'));
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
}
?>