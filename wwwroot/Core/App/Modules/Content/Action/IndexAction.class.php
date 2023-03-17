<?php
/**
 * 前台内容模型展现入口
 */
class IndexAction extends GlobalAction {
	
	private $cid = 0;
	private $aid = 0;	
	private $currentNavigate = null;
	private $currentData = null;
	
	protected function _initialize() {
		parent::_initialize();
		//获取基本参数
		$params = $this->checkData(array('cid','aid','navigate_name'),'',false);
		$cid = $params['cid'];
		$aid = $params['aid'];		
		$navigate_name = $params['navigate_name'];
		if(!$cid && $navigate_name){
			$navigate = F('navigate');
			foreach($navigate as $k=>$v){
				if($v['navigate_mark']==$navigate_name){
					$cid = $v['id'];
					break;
				}
			}
			if($cid<1){
				_404("内容不存在或已删除！");
			}
		}
		//实例化模型
		$this->model = D('Contents');
		//参数处理
		if ($cid) {
			$this->cid = $cid;
			$this->assign('cid',$cid);
			$navigate = F('navigate');
			$this->currentNavigate = $navigate[$this->cid];
			if (!$this->currentNavigate) {				
				$this->writeLog("此用户或IP尝试访问一个不存在的导航，尝试访问的导航id：{$this->cid}", 'USER_ERROR');
				_404("内容不存在或已删除！");
			}else{
                $this->assign('webNavigate',$this->currentNavigate);
            }
			if($this->currentNavigate['c_status'] != 1  ) {
				$this->writeLog("此用户或IP尝试访问一个已被禁用的导航，尝试访问的导航id：{$this->cid}", 'USER_ERROR');
				_404("内容不存在或已删除！");
			}
		}
			
		if ($aid) {
			$this->aid = $aid;
			$this->currentModel = F("models_{$this->currentNavigate['mid']}");
			//默认读取字段设置
			$key = isset($this->currentNavigate['setting']['aid_field'])&&!empty($this->currentNavigate['setting']['aid_field']) ? $this->currentNavigate['setting']['aid_field'] : 'id';
			$this->currentData = $this->model->findOneMainData($this->aid,$this->currentModel['table_name'],$key);
			if (!$this->currentData) {
				$this->writeLog('此用户尝试通过地址栏，访问Content/index/show,aid为'.$this->aid.'中一个不存在的页面，恶意操作！', 'USER_ERROR');
				_404('内容不存在或已删除！');
			}
						
			if ($this->currentData['a_status'] != 1) {				
				
				if ($this->currentData['a_status'] == 4  && I('get.preview')==md5($cid.'--sssss--'.$aid) ) {
					$this->assign('preview',1);
				}else{
					$this->writeLog('此用户尝试通过地址栏，访问Content/index/show,aid为'.$this->aid.'中一个已被禁用的页面，恶意操作！', 'USER_ERROR');
					_404('内容不存在或已删除！');
				}
			}
			if ($this->currentData['is_delete'] != 1) {
				//$this->writeLog('此用户尝试通过地址栏，访问Content/index/show,aid为'.$this->aid.'中一个已被禁用的页面，恶意操作！', 'USER_ERROR');
				_404('内容不存在或已删除！');
			}
		}
		
	}
	
	
	/* 新闻模板 */
	public function xinwen() {		
		
		
		
		$this->display($this->mobileTpl.'xinwen.php');		
		
	}
	
	/* 内容展示 */
	public function detail() {		
		//查出附加数据
		$appendData = $this->model->findOneAppendData($this->aid,$this->currentData['cid']);
		if ($appendData) $this->currentData = array_merge($this->currentData,(array)$appendData);
		//内容分页设置
		$pageSetting = explode('|', $this->currentData['page']);
		if ($pageSetting[0] == 1) {
			$this->assign('content',$this->currentData['content']);
			$this->assign('pageinfo',false);
		} else {
			$contentArray = $this->model->getPageContent($this->currentData,$pageSetting);
			/* 选择分页类型 */
			if (IS_AJAX) {
				$this->ajaxReturn(array('content'=>$contentArray['content'],'pageinfo'=>$contentArray['pageinfo']));
			} else {
				$this->assign('content',$contentArray['content']);
				$this->assign('pageinfo',$contentArray['pageinfo']);
			}
		}
		
		//当前数据
		$this->assign('currentData',$this->currentData);
		//当前导航信息
		$this->assign('navigate',$this->currentNavigate);
		//上下篇
		$prevAndNext = $this->model->resolvePrevAndNext($this->currentData['cid'],$this->currentModel,$this->currentData['id']);
		$this->assign('prev',$prevAndNext['prev']);
		$this->assign('next',$prevAndNext['next']);
		//Tags
		$this->assign('tags',$this->currentData['tags'] ? $this->model->contentTags($this->currentData['tags']) : '');
		
		//模板选择
		$tpl = 'Content/show/show_new.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	
	/* 首页 */
	public function index() {
		
				
//		$tpl = $this->getTpl('index2022.php');
//		$this->display($tpl);
        $mobileTpl = TEMPLATE_PATH.DEFAULT_SKIN.'/Mobile/';
		if($_GET['d']=='m'){
			$this->display($mobileTpl.'index2022.php');
		}else{
//			$this->display($this->pcTpl.'index2023cj.php');
			$this->display($this->pcTpl.'index2022.php');
		}
		
	}
	
	/* 改版首页测试 */
	public function idx() {
		$tpl = $this->getTpl('index_new_2020cj.php');
		$this->display($tpl);
		/*
		if($_GET['t']=='aa'){
			$this->display($this->mobileTpl.'index.php');
		}else{
			$this->display($this->pcTpl.'index.php');
		}
		*/
	}
	

	
	public function vote() {
		header('content-type:text/html;charset=utf-8');
		//echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];exit;
		if($this->isGet()){
			
			/* 判断是否微信访问 */
			$ua = $_SERVER['HTTP_USER_AGENT']; 	

			if(strpos($ua, 'MicroMessenger') == false || strpos($ua, 'WindowsWechat ')){ 

			   exit('<p style="color:#444;font-size:2rem;text-align:center;line-height:6rem;">请在手机微信里访问投票系统<div style="width:100%;height:150px;text-align:center;"><img style="width:150px;display:inline-block;" src="/Public/2019426erweima.png"></div></p><script>alert("请在手机微信里访问投票系统");</script>');
             
			} 
			
			/* 判断qy_name，activity_id,on是否存在 */
			
			if(!isset($_GET['activity_id'])||$_GET['activity_id']=='')
		    {
			   exit('没有相关活动');
			} 
			
			if(!isset($_GET['on'])||$_GET['on']=='0')
			{
			   exit('投票已结束');
			}

            $activity_id = intval($_GET['activity_id']);			
			$like ="where ve.activity_id=".$activity_id;
			if(isset($_GET['qy_name']))
		    {
				$like .= " and ve.qy_name like '%".trim($_GET['qy_name'])."%'";
			}  

            $Model = new Model();
			
			$sql1 = "select ve.votes,val.activity_logo_url from h_vote_enterp as ve left join h_vote_activity_lists val on ve.activity_id=val.id where ve.activity_id=".$activity_id;

            $sql = "select * from h_award_enterp as ae left join h_vote_enterp ve on ve.id=ae.enterp_id ".$like; 			
		    
			$res = $Model->query($sql);
			$activity = $Model->query($sql1);
			
			//$votes = 0;
			$info=array();
			//foreach($activity as $act){
				
			//	$votes+=intval($act['votes']);
			//}
			//$info['vote_all'] = $votes;
			$info['activity_logo_url'] = $activity[0]['activity_logo_url'];
			
			$res1=array();
			$flag  = 0;
			
			foreach($res as $v){
				$award_id = $v['award_id'];
				if(!isset($res1[$award_id]))
				{
					$res1[$award_id]=array();
					$res1[$award_id]['award_id'] = $award_id;
					$res1[$award_id]['award_name'] = $v['award_name'];
					$res1[$award_id]['votes_all'] = 0;
					$res1[$award_id]['qiyes'] = array();
				}
				    $res1[$award_id]['votes_all'] += $v['award_votes'] ;
				
				    $res1[$award_id]['qiyes'][$flag]['enterp_id'] = $v['enterp_id'];
					$res1[$award_id]['qiyes'][$flag]['qy_name'] = $v['qy_name'];
					$res1[$award_id]['qiyes'][$flag]['qy_desp'] = $v['enterp_advant'];
					$res1[$award_id]['qiyes'][$flag]['logo_url'] = $v['logo_url'];
					$res1[$award_id]['qiyes'][$flag]['votes'] = $v['award_votes'];
				
				$flag++;
			}
			//var_dump($res1);exit;	
		
		   /*
			require_once "Jssdk.php";
			$url_link='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$jssdk = new JSSDK("wx53f1624eb99f1f3d", "b9613af433771f2eedef7b63d2a9f508",$url_link);						
		var_dump($jssdk);exit;				
			$signPackage = $jssdk->getSignPackage();	
            $this->assign('signPackage',$signPackage);
			*/
			
			$this->assign('vote_date',date('Y-m-d',time()));
            $this->assign('info',$info); 			
			$this->assign('enterps',$res1);
			
			$tpl = $this->getTpl('vote.php');
			$this->display($tpl);	
			
		}		
		
	}
	
	public function dealvote(){
		
		if($this->isPost()){
		
		   $ent_id = intval($_POST['ent_id']);
		   $award_id = intval($_POST['award_id']);
		   
		   $m = M('Award_enterp');
		   $in = $m->where(array('award_id'=>$award_id,'enterp_id'=>$ent_id))->setInc('award_votes'); 
		   
		   $res=array(
		      'code' => 0,
			  'msg' =>'投票失败'
		   );
		   
		   if($in>=1)
		   {
			  $res['code'] = 1;
			  $res['msg'] = '投票成功';
		   }
            
            echo json_encode($res);			
	   
		}
	}

	
	/* 导航页 */
	public function navigate() {
		$setting = $this->currentNavigate['setting'];
		if ($this->currentNavigate['n_type'] == 2) {
			/* 获取单页内容 */
			$Navigate = D('Navigate');
			$contentArray = $Navigate->getSingleContent($this->currentNavigate);
			unset($Navigate);
			$this->assign('content',$contentArray['content']);
			$this->assign('contentmobile',$contentArray['contentmobile']);
			$this->assign('pageinfo',$contentArray['pageinfo']);
			$tpl = "single/{$setting['navigate_index_tpl']}";
		}else {
			/* isset兼容之前，有点懒不想更新导航 */
			/* 列表页也可以显示模型类型主频道页  */
			if (isset($setting['show_type'])) {
				switch($setting['show_type']){
					case '1':
						$tplPath = 'index';
					break;
					
					case '3':
						$tplPath = 'show';
					break;
					
					default:
						$tplPath = 'list';
					break;
				}	
			}else{
				$tplPath = ($this->currentNavigate['is_channel'] == 1) ? 'index' : 'list';
			}						
			//$tpl = $this->checkData('tpl','GET',false);
			//$tpl = $tpl ? "$tplPath/$tpl.php" :  "$tplPath/{$setting['navigate_'.$tplPath.'_tpl']}";
			$tpl = $setting['show_type'] == 3 ? "{$tplPath}/{$setting['show_tpl']}" : "$tplPath/{$setting['navigate_'.$tplPath.'_tpl']}";
		}
		
		if($setting['show_type'] == 3){
			$this->currentModel = F("models_{$this->currentNavigate['mid']}");
			$currentData = M()->table(DB_PREFIX.$this->currentModel['table_name'])->where( array('a_status'=>1, 'is_delete'=>1, 'cid'=>$this->cid) )->find();
			if ($currentData && $this->currentModel['model_type'] == 'content' && $this->currentModel['setting']['is_alone'] == 2) {
				$appendData = M()->where(array('aid'=>$currentData['id']))->table(DB_PREFIX.$this->currentModel['table_name'].'_data')->find();
			} else {
				$appendData = array();
			}
			$currentData = array_merge($currentData,(array)$appendData);
			$this->assign('currentData', $currentData);
		}
		$this->assign('navigate',$this->currentNavigate);
		$tpl = 'Content/'.$tpl;
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	/* 内容展示 */
	public function show() {		
		//查出附加数据
		$appendData = $this->model->findOneAppendData($this->aid,$this->currentData['cid']);
		if ($appendData) $this->currentData = array_merge($this->currentData,(array)$appendData);
		//内容分页设置
		$pageSetting = explode('|', $this->currentData['page']);
		if ($pageSetting[0] == 1) {
			$this->assign('content',$this->currentData['content']);
			$this->assign('pageinfo',false);
		} else {
			$contentArray = $this->model->getPageContent($this->currentData,$pageSetting);
			/* 选择分页类型 */
			if (IS_AJAX) {
				$this->ajaxReturn(array('content'=>$contentArray['content'],'pageinfo'=>$contentArray['pageinfo']));
			} else {
				$this->assign('content',$contentArray['content']);
				$this->assign('pageinfo',$contentArray['pageinfo']);
			}
		}
		
		//当前数据
		$this->assign('currentData',$this->currentData);
		//当前导航信息
		$this->assign('navigate',$this->currentNavigate);
		//上下篇
		$prevAndNext = $this->model->resolvePrevAndNext($this->currentData['cid'],$this->currentModel,$this->currentData['id']);
		$this->assign('prev',$prevAndNext['prev']);
		$this->assign('next',$prevAndNext['next']);
		//Tags
		$this->assign('tags',$this->currentData['tags'] ? $this->model->contentTags($this->currentData['tags']) : '');
		
		//模板选择
		$tpl = 'Content/show/' .  $this->currentNavigate['setting']['show_tpl'];
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	public function getNewWeixinConfig(){
		
		if(IS_POST){
			$res = array('status'=>1);
			
			$url_link = I('post.url');
			
			require_once "Jssdk.php";			
			$jssdk = new JSSDK("wx53f1624eb99f1f3d", "86d0d19797be3ff70b9e932ebb6893b3",$url_link);
			
            if(!$url_link)
			{
				$res['status'] = 0;				
			}				
				
			$signPackage = $jssdk->getSignPackage();	
            //$this->assign('signPackage',$signPackage);
			$res['infos'] = $signPackage;
			
			$this->ajaxReturn($res);
			
		}
		
	}
	
	public function ajaxGetWeixinSign(){
		//if(IS_POST && $this->weixin){
		if(IS_POST){
			$url = I('post.url');
			$timestamp = I('post.timestamp');
			$noncestr = I('post.noncestr');
			if(!$url || !$timestamp || !$noncestr) $this->error('缺失参数');			
			$sign = $this->getWeixinJssdk($url,$timestamp,$noncestr);
			$this->success($sign);
		}
	}
	
	protected function getWeixinJssdk($url,$timestamp,$noncestr) {
		$ticket = S('ticket');
		if(!$ticket){
			$access_token = S('access_token');
			if(!$access_token){
				$_tmp = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx53f1624eb99f1f3d&secret=86d0d19797be3ff70b9e932ebb6893b3');
				$_tmp = json_decode($_tmp,true);
				$access_token = $_tmp['access_token'];
				S('access_token',$access_token,7150);
			}
			
			$_tmp = file_get_contents('http://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$access_token.'&type=jsapi');
			$_tmp = json_decode($_tmp,true);				
			if($_tmp['errcode']==0){
				$ticket = $_tmp['ticket'];
				S('ticket',$ticket,7150);
			}
		}
		
		$signature = $this->getSHA1('url='.$url, 'timestamp='.$timestamp, 'noncestr='.$noncestr, 'jsapi_ticket='.$ticket);
		
		$this->assign('timestamp',$timestamp);
		$this->assign('noncestr',$noncestr);
		$this->assign('signature',$signature);
		return $signature;
	}
	
	protected function getSHA1($url, $timestamp, $noncestr, $jsapi_ticket) {
		//排序
		try {
			$array = array($url, $jsapi_ticket, $timestamp, $noncestr);
			sort($array, SORT_STRING);
			$str = implode('&',$array);
			return sha1($str);
		} catch (Exception $e) {			
			return;
		}
	}
	
	/**
	 * 更新累加字段  只用于有规律递增 可缓存防刷，一天
	 * aid
	 * cid
	 * f 需要更新字段
	 * sp 更新步长 默认+1
	 * st 更新的类型，默认+
	 * cn 字段缓存名 有则表示需要缓存
	 */
	public function u_f() {
		$field = $this->checkData('f');//需要更新字段
		$tableName = DB_PREFIX.$this->currentModel['table_name'];
		if (IS_POST) {
			if (!IS_AJAX) {
				$this->writeLog("此用户恶意通过非法方式访问Content->index->u_f方法", 'USER_ERROR');
				$this->error(C('NOT_AJAX'));
			}
			$step = $this->checkData('sp','',false);//每次更新步长
			$stype = $this->checkData('st','',false);//每次更新类型
			$cacheName = $this->checkData('cn','',false);//是否需要缓存，有值，则传入缓存名
			/* 更新字段 */
			$setting = array('cid'=>$this->cid,'aid'=>$this->aid);	
			
			$status = $this->model->incDecField($field,$this->currentModel,$setting,$step,$stype,$cacheName);
			
			//var_dump($status);exit; ///////////
			
			/* 状态返回 */
			$status!==false ? $this->ajaxReturn('','','success') : $this->ajaxReturn('','系统出错！','error');
		} else {
			$field = $this->model->table($tableName)->where("id={$this->aid}")->limit(1)->getField($field);
			//会慢一拍
			echo "document.write('$field')";
		}
	}
	
	/* 文章阅读心情 */
	public function mood() {
		//心情
		$Mood = D('ContentMood');
		if (IS_POST) {
			$params = $this->checkData(array('mood_id','mood_type'),'',false);
			$params['aid'] = $this->aid;
			$params['cid'] = $this->cid;
			$status = empty($params['mood_id']) ? $Mood->addData($params) : $Mood->editData($params);
			if (is_array($status)) {
				$this->ajaxReturn(false,$status[1],0);
			} else {
				$this->ajaxReturn($status,'',1);
			}
		} else {
			$params = $this->checkData(array('num','mood_id'),'',false);
			$mood = $params['mood_id'] ? $Mood->findOneMood(intval($params['mood_id']),'id') : $Mood->findOneMood(array('aid'=>$this->aid,'cid'=>$this->cid,'mid'=>$this->currentNavigate['mid']));
			$moodFace = array('震惊','不解','愤怒','杯具','路过','高兴','支持','超赞','同情','感动');
			//全部心情
			if ($params['num'] == 10) {
				$newMoodFace = $moodFace;
			} else {//随机心情
				$keys = array_rand($moodFace,$params['num'] ? $params['num'] : 6);
				$newMoodFace = array();
				foreach ($moodFace as $key=>$val) {
					if (in_array($key, $keys,true)) $newMoodFace[] = $val;
				}
			}
			unset($Mood,$moodFace,$params);
			$this->ajaxReturn(array('mood'=>$mood,'face'=>$newMoodFace));
		}
	}
	

 	/* 文件下载 */
	public function down() {
		$token = $this->checkData('token');//token值
		$url_type = $this->checkData('u');//下载类型
		$external_url = $this->checkData('l','GET',false);//远程文件类型链接
		$Attachment = D('Attachment/Attachment');
		$result = $Attachment->downAttachment($url_type,$token,$external_url);
		unset($Attachment);
		if ($result) {
			/* 写入下载详情表 */
			$DownDetails = D('DownDetails');
			$DownDetails->addData(array('aid'=>$this->aid,'cid'=>$this->cid,'attch_id'=>$result['id']));
			unset($DownDetails);
			/* 更新下载次数，已通过ajax调用 u_f添加  */
		} else {
			$this->error('文件不存在！');
		}
	}
	
		
	public function search(){
		$mid = I('get.mid');
		$mid = intval($mid);
		$mid = 1;
		$type = 'title';
		$models = F('models_'.$mid);
		$q = I('post.q')?I('post.q'):I('get.q');
		$q = Input::safeHtml($q);
		$q = Input::forSearch($q);		
		$data = $this->model->search($type,$models['table_name'],$q);
		
		$this->assign('searchData',$data);
		$this->assign('q',$q);
		$tpl = 'Content/index/search.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
}
?>