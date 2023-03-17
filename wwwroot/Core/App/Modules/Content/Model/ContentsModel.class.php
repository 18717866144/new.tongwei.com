<?php
/**
 * 内容操作模型，核心 
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class ContentsModel extends GlobalModel {
	
	/**
	 * 模型验证数据
	 * @see GlobalModel::modelCheckData()
	 * $setting array|string
	 */
	public function modelCheckData($setting = array()) {
		$postData = parent::modelCheckData();
		$postData['content'] = Input::getVar($_POST['info']['content']);//主内容不去除html
		$postData['phase'] = Input::getVar($_POST['info']['phase']);//主内容不去除html
		$postData['efficacy'] = Input::getVar($_POST['info']['efficacy']);//主内容不去除html
		$postData['per'] = Input::getVar($_POST['info']['per']);//主内容不去除html
		$postData['use'] = Input::getVar($_POST['info']['use']);//主内容不去除html
		$postData['ent'] = Input::getVar($_POST['info']['ent']);//主内容不去除html
		$postData['analysis'] = Input::getVar($_POST['info']['analysis']);//主内容不去除html
		$postData['Signing'] = Input::getVar($_POST['info']['Signing']);//主内容不去除html
		$postData['materials'] = Input::getVar($_POST['info']['materials']);//主内容不去除html
		return $postData;
	}
	
	/**
	 * 模型数据添加
	 * (non-PHPdoc)
	 * $currentModel array 当前模型
	 * $postData array 提交数据
	 * $setting array|string 其它配置
	 * @see GlobalModel::modelAddData()
	 */ 
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
			$postData['main']['url'] = URL::get_content_url($tableInfo['Auto_increment'], $postData['main']);
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
			$postData['main']['url'] = URL::get_content_url($_POST['id'],$postData['main']);
		}
		return parent::modelEditData($currentModel, $postData);
	}
	
	/**
	 * 内容回收站分页
	 * @param array $currentModel
	 * @return multitype:NULL Ambigous <string, mixed>
	 */
	public function recyclePage($currentModel) {
		$options = $this->compareGET('c.save_time',array('start_time','end_time'),'time',false);
		$resolveOptions = $this->resolveGET(array('c.a_status'=>'a_status'));
		$options['where'] = array_merge_recursive($options['where'],$resolveOptions['where']);
		$options['url'] .= $resolveOptions['url'];
		if (!empty($_GET['search_content'])) {
			$search_content = Input::getVar($_GET['search_content']);
			$s_type = Input::getVar($_GET['s_type']);
			switch ($s_type) {
				case 'title':
					$options['where']['c.title'] = array('like',"%{$search_content}%");
					break;
				case 'u_username':
					//普通用户
					$tempWhere = strpos($search_content, '@') ? 'email' : 'username';
					$userid = $this->table($this->tablePrefix.'member')->where("$tempWhere='$search_content'")->getField('id');
					$options['where'] .= " AND c.userid='$userid'";
					$options['where']['c.userid'] = array('eq',$userid);
					break;
				case 'a_username':
					$userid = $this->table($this->tablePrefix.'admin')->where("username='$search_content'")->getField('id');
					$options['where']['c.userid'] = array('eq',$userid);
					break;
				case 'id':
					$options['where']['c.id'] = array('eq',$search_content);
					break;
				case 'description':
					$options['where']['c.description'] = array('like',"%{$search_content}%");
					break;
				case 'tags':
					$options['where']['c.tags'] = array('like',"%{$search_content}%");
					break;
			}
			$options['url'] .= "&s_type=$s_type&search_content=$search_content";
		}
		$options['where']['c.is_delete'] = array('eq',2);
		// 	内容，多表模型
		$total = $this->table("{$this->tablePrefix}{$currentModel['table_name']} AS c")->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__."?mid={$currentModel['id']}&page={PAGE}{$options['url']}");
		$data = array();
		$data[0] = $this->table("{$this->tablePrefix}{$currentModel['table_name']}  AS c")->where($options['where'])->join(" LEFT JOIN {$this->tablePrefix}member AS m ON (c.userid=m.id AND c.is_admin=2)")->join("LEFT JOIN {$this->tablePrefix}admin AS a ON (c.userid=a.id AND c.is_admin=1)")->limit($Page->limit())->order('c.id DESC')->getField('c.id,c.title,c.attr,c.thumbnail,c.url,c.sort,c.a_status,c.click,c.is_admin,c.save_time,a.username AS a_username,m.username AS u_username,m.email AS u_email');
		$data[1] = $Page->show();
		return $data;
	}
	
	/**
	 * 内容列表分页
	 * (non-PHPdoc)
	 * @see Model::page()
	 */
	public function page($cid,$currentModel,$url=array()) {
		$options = $this->compareGET('c.save_time',array('start_time','end_time'),'time',false);
		$resolveOptions = $this->resolveGET(array('c.a_status'=>'a_status','c.attr'=>'attr'));
		$options['where'] = array_merge_recursive($options['where'],$resolveOptions['where']);
		$options['url'] .= $resolveOptions['url'];
		if($url){
			foreach($url as $k=>$v){
				$options['url'] .= '&'.$k.'='.$v;
			}			
		}
		if (!empty($_GET['search_content'])) {
			$search_content = Input::getVar($_GET['search_content']);
			$s_type = Input::getVar($_GET['s_type']);
			switch ($s_type) {
				case 'title':
					$options['where']['c.title'] = array('LIKE',"%{$search_content}%");
					break;
				case 'u_username':
					//普通用户
					$tempWhere = strpos($search_content, '@') ? 'email' : 'username';
					$userid = $this->table($this->tablePrefix.'member')->where("$tempWhere='$search_content'")->getField('id');
					$options['where']['c.userid'] = array('eq',$userid);
					break;
				case 'a_username':
					$userid = $this->table($this->tablePrefix.'admin')->where("username='$search_content'")->getField('id');
					$options['where']['c.userid'] = array('eq',$userid);
					break;
				case 'id':
					$options['where']['c.id'] = array('eq',$search_content);
					break;
				case 'description':
					$options['where']['c.description'] = array('LIKE',"%{$search_content}%");
					break;
				case 'tags':
					$options['where']['c.tags'] = array('LIKE',"%{$search_content}%");
					break;
			}
			$options['url'] .= "&s_type=$s_type&search_content=$search_content";
		}
// 		超管取出全部，非超管取出自己
		if (SESSION_TYPE == 1) {
			//非超管读取数据的判断
//			if ($_SESSION[C('SUPER_ADMIN')]) {
				$options['where']['c.is_delete'] = array('eq',1);
//			} else {
//				$rtype = isset($_GET['rtype'])&&!empty($_GET['rtype']) ? $_GET['rtype'] : 'my';
//				if($rtype == 'my') {
//					$options['where']['c.userid'] = array('eq',GBehavior::$session['id']);
//					$options['where']['c.is_admin'] = array('eq',1);
//				}
//				$options['url'] .= '&rtype='.$rtype;
//				$options['where']['c.is_delete'] = array('eq',1);
//			}
		} else {
			$options['where']['c.userid'] = array('eq',GBehavior::$session['id']);
			$options['where']['c.is_admin'] = array('eq',2);
			$options['where']['c.is_delete'] = array('eq',1);
		}
		$options['where']['c.cid'] = array('eq',$cid);
		// 	内容，多表模型
		$total = $this->table("{$this->tablePrefix}{$currentModel['table_name']} AS c")->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__."?cid=$cid&page={PAGE}{$options['url']}");
		$data = array();
		$data[0] = $this->table("{$this->tablePrefix}{$currentModel['table_name']}  AS c")->where($options['where'])->join(" LEFT JOIN {$this->tablePrefix}member AS m ON (c.userid=m.id AND c.is_admin=2)")->join("LEFT JOIN {$this->tablePrefix}admin AS a ON (c.userid=a.id AND c.is_admin=1)")->limit($Page->limit())->order('c.id DESC')->getField('c.id,c.title,c.attr,c.thumbnail,c.url,c.sort,c.a_status,c.click,c.is_admin,c.save_time,a.username AS a_username,m.username AS u_username,m.email AS u_email');
		$data[1] = $Page->show();
		return $data;
	}
	
	/**
	 * 个人主页分享展示
	 * @param numeric $cid
	 * @param array $currentModel
	 * @param array $user
	 * @return multitype:NULL Ambigous <string, mixed>
	 */
	public function homeSharePage($cid,$currentModel,$user) {
		// 	内容，多表模型
		$total = $this->table("{$this->tablePrefix}{$currentModel['table_name']}")->where("cid=$cid AND userid='{$user['id']}' AND is_admin=2 AND a_status=1 AND is_delete=1")->count(1);
		$Page = new Page($total,__ACTION__."?cid=$cid&page={PAGE}&uid={$user['id']}");
		$data = array();
		$data[0] = $this->table("{$this->tablePrefix}{$currentModel['table_name']}")->where("cid=$cid AND userid='{$user['id']}' AND is_admin=2 AND a_status=1 AND is_delete=1")->limit($Page->limit())->order('id DESC')->getField('id,title,thumbnail,url,sort,a_status,click,is_admin,save_time');
		$data[1] = $Page->show();
		return $data;
	}
	
	/**
	 * 相关文章分页
	 * @param numeric $cid
	 * @param array $currentModel
	 * @return multitype:NULL Ambigous <string, mixed>
	 */
	public function relevantPage($cid,$currentModel) {
		$resolveOptions = $this->resolveGET(array('c.cid'=>'s_cid'));
		$options['where'] = $resolveOptions['where'];
		$options['url'] .= $resolveOptions['url'];
		if (!empty($_GET['search_content'])) {
			$search_content = Input::getVar($_GET['search_content']);
			$s_type = Input::getVar($_GET['s_type']);
			switch ($s_type) {
				case 'title':
					$options['where']['c.title'] = array('LIKE',"%{$search_content}%");
					break;
				case 'u_username':
					//普通用户
					$tempWhere = strpos($search_content, '@') ? 'email' : 'username';
					$userid = $this->table($this->tablePrefix.'member')->where("$tempWhere='$search_content'")->getField('id');					
					$options['where']['c.userid'] = array('eq',$userid);
					break;
				case 'a_username':
					$userid = $this->table($this->tablePrefix.'admin')->where("username='$search_content'")->getField('id');
					$options['where']['c.userid'] = array('eq',$userid);
					break;
				case 'id':
					$options['where']['c.id'] = array('eq',$search_content);
					break;
				case 'description':
					$options['where']['c.description'] = array('LIKE',"%{$search_content}%");
					break;
				case 'tags':
					$options['where']['c.tags'] = array('LIKE',"%{$search_content}%");
					break;
			}
			$options['url'] .= "&s_type=$s_type&search_content=$search_content";
		}
		$where['c.a_status'] = array('eq',1);
		$where['c.is_delete'] = array('eq',1);
		// 	内容，多表模型
		$total = $this->table("{$this->tablePrefix}{$currentModel['table_name']} AS c")->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__."?cid=$cid&page={PAGE}{$options['url']}");
		$data = array();
		$data[0] = $this->table("{$this->tablePrefix}{$currentModel['table_name']} AS c")->join(" LEFT JOIN {$this->tablePrefix}member AS m ON (c.userid=m.id AND c.is_admin=2)")->join("LEFT JOIN {$this->tablePrefix}admin AS a ON (c.userid=a.id AND c.is_admin=1)")->where($options['where'])->limit($Page->limit())->order('id DESC')->getField('c.id,c.title,c.thumbnail,c.url,c.a_status,c.click,c.is_admin,c.save_time,a.username AS a_username,m.username AS u_username,m.email AS u_email');
		$data[1] = $Page->show();
		return $data;
	}
	
	/**
	 * 查找同一模型关联数据
	 * @param numeric|string $relevant_id
	 * @param array $currentModel
	 */
	public function findRelevantData($relevant_id,$currentModel) {
		 return $this->table($this->tablePrefix.$currentModel['table_name'])->where("id IN($relevant_id)")->field('id,title')->select();
	}
	
	/**
	 * 删除至回收站
	 * @param numeric|string $id
	 * @param array $currentModel
	 * @return boolean|numeric
	 */
	public function deleteRecycle($id,$currentModel) {
// 		过滤非法数据
		$status = M()->table($this->tablePrefix.$currentModel['table_name'])->where("id IN($id)")->setField('is_delete',2);
		$idArr = explode(',',$id);
		$NAV = F('navigate');
		foreach($idArr as $v){
			$data = M()->table($this->tablePrefix.$currentModel['table_name'])->find($v);			
			$nav = $NAV[$data['cid']];
			if($nav['setting']['content_is_html'] == 1){
				unlink(__PATH__. preg_replace ('/http:\/\/[^\/]*/', '', $data['url'], 1) );
			}
		}
		return $status;
	}
	
	
	/**
	 * 会员添加分享是否自动审核
	 * @param numeric $cid
	 * @return number
	 */
	public function memberAuditStatus($cid) {
		$Auth = new Auth();
		$isAudit = $Auth->check('App/Member/auto_audit/auto_audit', GBehavior::$session['id']);
		$navigate = F('navigate');
		$currentNavigate = $navigate[$cid];
		return $isAudit && $currentNavigate['setting']['front_edit_review']!=1 ? 1 : 2;
	}
	
	/**
	 * =======================内容显示的解析==============================
	 */
	
	/**
	 * 解析上下篇
	 * @param numeric $cid
	 * @param array $currentModel
	 * @param numeric $id
	 * @return multitype:Ambigous <unknown, multitype:string Ambigous <mixed, void, NULL> > Ambigous <unknown, multitype:string Ambigous <mixed, void, NULL, multitype:> >
	 */
	public function resolvePrevAndNext($cid,$currentModel,$id) {
		$table = $currentModel['table_name'];

		$prev = $this->table($this->tablePrefix.$table)->where("id<$id AND cid=$cid AND a_status=1 AND is_delete=1")->order('id DESC')->field('id,url,title')->find();
		$prev = $prev ? $prev : array('url'=>'#','title'=>C('NOT_PREV'));
		$next = $this->table($this->tablePrefix.$table)->where("id>$id AND cid=$cid AND a_status=1 AND is_delete=1")->order('id ASC')->field('id,url,title')->find();
		$next = $next ? $next : array('url'=>'#','title'=>C('NOT_NEXT'));
		return array('prev'=>$prev,'next'=>$next);
	}
	
	/**
	 * 内容分页数目
	 * @param string $content
	 * @param array $contentPage
	 * @return number
	 */
	public function getPageNum($content,$contentPage) {
		// 		内容分页
		$page_type = explode('|', $contentPage);
		switch ($page_type[0]) {
			case 2://自动分页
				$contentLen = mb_strlen($content,'UTF-8');
				return ceil($contentLen/$page_type[1]);
				break;
			case 3:
				return count(explode('_HXCMS_PAGE_', $content));
				break;
			default:
				return 0;
				break;
		}
	}
	
	/**
	 * 得到分页内容
	 * @param array $data
	 * @param numeric $pageSetting
	 * @return multitype:string Ambigous <unknown, string>
	 */
	public function getPageContent($data,$pageSetting) {
		$content = $data['content'];
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		if ($page <= 1) $page = 1;
		if ($pageSetting[0] == 2) { //自动分页
			$contentLen = mb_strlen($content,'UTF-8');
			$pageNum = ceil($contentLen/$pageSetting[1]);
			if ($page >= $pageNum) $page = $pageNum;
			$content = String::msubstr($content, ($page-1)*$pageSetting[1],$page*$pageSetting[1]);
		} else {//手动分页
			$content = explode('_HXCMS_PAGE_', $content);
			$pageNum = count($content);
			if ($page >= $pageNum) $page = $pageNum;
			$content = $content[$page-1];
		}
		/* 分页链接 */
		//是否是ajax分页
		$ajaxPage = (isset($data['ajax_page'])&&$data['ajax_page']==1) ? true : C('SHOW_AJAX_PAGE');
		//上一页
		$pageurl = ($page <= 1) ? '###' : URL::get_content_url($data['id'], $data,$page-1);
		$params_type = $ajaxPage ? 'href="javascript:;" link="'.$pageurl.'"' : 'href="'.$pageurl.'"';
		$page_string = '<a '.$params_type.' class="show_prev_page">上一页</a>';
		//页码
		for ($i=1;$i<=$pageNum;$i++) {
			if ($page == $i) {
				$pageurl = '###';
				$class= 'class="current_page"';
			}else {
				$pageurl = URL::get_content_url($data['id'], $data,$i);
				$class = '';
			}
			$params_type = $ajaxPage ? 'href="javascript:;" link="'.$pageurl.'"' : 'href="'.$pageurl.'"';
			$page_string .= '<a '.$params_type.' '.$class.'>'.$i.'</a>';
		}
		// 下一页
		$pageurl = ($page >= $pageNum) ? '###' : URL::get_content_url($data['id'], $data,$page+1);
		$params_type = $ajaxPage ? 'href="javascript:;" link="'.$pageurl.'"' : 'href="'.$pageurl.'"';
		$page_string .= '<a '.$params_type.' class="show_next_page">下一页</a>';
		return array('content'=>$content,'pageinfo'=>$page_string);
	}
	
	/**
	 * 内容TAGS
	 * @param string $tags
	 * @return string
	 */
	public function contentTags($tags) {
		$modules = F('modules');
		if ($modules['Tags']) {
			//TagsUrl
			$tagSetting = require APP_PATH.'Modules/Modules/Conf/Tags/Config.php';
			$url = explode('|', $tagSetting['url_'.$tagSetting['url_type']]);
			$url = $url[0];
			$tags = explode(' ',$tags);
			$tags_string = '';
			foreach ($tags as $tag_value) {
				$tags_string .= '<a href="'.__ROOT__.'/'.str_replace('{$tag}', $tag_value, $url).'">'.$tag_value.'</a>&nbsp;';
			}
		} else {
			foreach ($tags as $tag_value) {
				$tags_string .= '<a href="javascript:;">'.$tag_value.'</a>&nbsp;';
			}
		}
		return $tags_string;
	}
	
	/**
	 * 字段累加减设置  常用于，赞，顶，下载数的点击统计
	 * @param string $field 需要更新的字段名
	 * @param array $currentModel 当前操作模型
	 * @param array $setting 需要的参数配置，包含aid,cid，可扩展其它
	 * @param numeric $step 步长
	 * @param string $stype 字段变更类开，+或-
	 * @param string $cacheName 防刷缓存名
	 * return boolean|numeric
	 */
	public function incDecField($field,$currentModel,$setting,$step = 1,$stype = '+',$cacheName = '') {
		/* 设定默认值 */
		$step = $step ? intval($step) : 1;
		$stype = !$stype ? '+' : '-';
		/* 有缓存名，则表示需要缓存，判断是否已经缓存过了 */
		if ($cacheName) {
			//cookie存在，返回
			if (cookie("$cacheName{$setting['cid']}_{$setting['aid']}")) return ;
			// 服务器端缓存判断
			$fileCacheName = $cacheName.CLIENT_IP_NUM;
			$cache = S($fileCacheName);
			$currentCache = $setting['cid'].'_'.$setting['aid'];
			if (is_array($cache) && in_array($currentCache,$cache,true)) {
				//生成cookie
				cookie("$cacheName{$setting['cid']}_{$setting['aid']}",'ok',24*3600);
				return ;
			} else {
				$cache = array();
			}
		}
		/* 更新类型 */		
		
		$table_m = $this->table($this->tablePrefix.$currentModel['table_name']);
		if($stype === '+'){
			//$stauts = $table_m->where("id={$setting['aid']}")->setInc($field,$step);
			$sql = 'update '.$this->tablePrefix.$currentModel['table_name'].' set '.$field.'='.$field.'+'.$step.' where id = '.$setting['aid'];
		}
		else{
			//$stauts = $table_m->where("id={$setting['aid']}")->setDec($field,$step);
			$sql = 'update '.$this->tablePrefix.$currentModel['table_name'].' set '.$field.'='.$field.'-'.$step.' where id = '.$setting['aid'];
		}
		$model1= new Model();
		$status = $model1->query($sql);
		//var_dump($model1->getLastSql());exit;
		/* 数据库更新成功，更新缓存 */
		if ($cacheName && $status !== false) {
			//$status = false;
			//生成cookie
			cookie("$cacheName{$setting['cid']}_{$setting['aid']}",'ok',24*3600);
			//添加至缓存
			array_unshift($cache,$currentCache);
			S($fileCacheName,$cache,24*3600);
		}
		/* 更新出错，写日志 */
		//if (!$status) $this->writeLog("修改数据表字段出错，最后SQL，表：{$currentModel['table_name']}，类型：{$stype}，字段：{$field}，步长 ：{$step}", 'SYSTEM_ERROR');
		
		return $status;
	}	

	/**
	 * 查找出一条主数据
	 * @param string|numeric $value
	 * @param string $table_name
	 * @param string $key
	 */
	public function findOneMainData($value,$table_name,$key = 'id') {
		return $this->where(array($key=>$value))->table(DB_PREFIX.$table_name)->find();
	}
	/**
	 * 查找出一条附加表数据
	 * @param string|numeric $value
	 * @param string $table_name
	 * @param string $key
	 */
	public function findOneAppendData($id,$cid) {
		$navigate = F('navigate');
		$mid = $navigate[$cid]['mid'];
		$model = F("models_{$mid}");
		unset($mid,$navigate);
		if ($model['model_type'] == 'content' && $model['setting']['is_alone'] == 2) {
			return $this->where(array('aid'=>$id))->table(DB_PREFIX.$model['table_name'].'_data')->find();
		} else {
			return false;
		}
	}
	
	/**
	 * 创建内容HTML
	 * @param numeric $id
	 * @param array $currentModel
	 * @param array $navigate
	 */
	public function createContentHtml($id,$currentModel,$navigate) {
		$data = $this->modelFindOneFull($currentModel,$id);
		//去除非静态
		if ($navigate[$data['cid']]['setting']['content_is_html'] != 1) return;
		if ($data['is_link'] != 0) return;
		//循环创建目录
		Tool::mkDir(__PATH__.dirname($data['url']));
		//获取额外参数
		$params = array('aid'=>$data['id'],'cid'=>$data['cid']);
		$appendParams = URL::get_content_append_params($data);
		$appendParams && ($params = array_merge($params,$appendParams));
		//是否为内容分页
		$pageSetting = explode('|', $data['page']);
		if ($pageSetting[0] == 1) {
			$content = file_get_contents(WEB_URL.U('Content/Index/show',$params));
			file_put_contents(__PATH__.$data['url'], $content);
		} else {
			if ($pageSetting[0] == 2) { //自动分页
				$contentLen = mb_strlen($data['content'],'UTF-8');
				$pageNum = ceil($contentLen/$pageSetting[1]);
			} else {//手动分页
				$data['content'] = explode('_HXCMS_PAGE_', $data['content']);
				$pageNum = count($data['content']);
			}
			$_GET['page'] = 1;
			for ($i=1;$i<=$pageNum;$i++) {
				$params['page'] = $_GET['page'];
				$content = file_get_contents(WEB_URL.U('Content/Index/show',$params));
				//生成分页
				$tempURL = URL::get_content_url($data['id'], $data,$_GET['page']);
				file_put_contents(__PATH__.$tempURL, $content) ;
				//生成索引页
				($_GET['page'] == 1) && file_put_contents(__PATH__.$data['url'], $content) ;
				$_GET['page']+=1;
			}
		}
	}
	
	/**
	 * 内容列表分页
	 * (non-PHPdoc)
	 * @see Model::search()
	 */
	public function search($type,$table,$keywords) {	
		$where = array();
		$where['a_status']=array('eq',1);
		$where['is_delete']=array('eq',1);
		switch ($type) {
		case 'title':
			$where['title'] = array('like','%'.$keywords.'%');
			break;		
		case 'content':
			$where['content'] = array('like','%'.$keywords.'%');			
			break;	
		}			
		$url = "q=$keywords";
		//内容，多表模型
		$total = $this->table("{$this->tablePrefix}{$table} AS c")->where($where)->count(1);
		
		$Page = new Page($total,"?$url&page={PAGE}");
		$data = array();
		$data[0] = $this->table("{$this->tablePrefix}{$table} AS c")->where($where)->limit($Page->limit())->order('c.id DESC')->select();
		$data[1] = $Page->show('first','prev','list','next','last');
		$data[2] = $total;
		return $data;
	}
}
?>