<?php
/**
 * 评论模块前台处理和展现
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class CommentsindexAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Comments');
	}
	
	public function add() {
		$configPath = APP_PATH.'Modules/Modules/Conf/Comments/Config.php';
		$config =  (file_exists($configPath)) ? require $configPath : array();
		if (NOW_TIME - $_SESSION['COMMENTS_TIME'] < $config['time_limit']) {
			$this->writeLog("此用户尝试在短时间内重复评论或回复，行为可疑", 'USER_ERROR');
			$this->error('评论的太快啦，休息一下吧！');
		}
		
		//游客是否允许评论
		if (!$_SESSION[C('MEMBER_SESSION')]['uid'] && $config['allow_visitor'] == 2 ) $this->error('游客暂不可评论，快注册成为本站会员吧！');
		//是否开启验证码，未做
		
		$postData = $this->model->checkData();		
		if(!$postData['vail_status']) $this->error($postData['vail_info']);
		//不允许自己给自己回复
		//if (!empty($postData['rel_userid']) && $postData['rel_userid'] == GBehavior::$session['id']) $this->error('您不可以给自己回复哦！');
		//是否需要审核
		$postData['is_checked'] = $config['is_checked'] == 2 ? 2 : 1;
		$data = $this->model->addData($postData);
		if ($data) {
			$info = $postData['is_checked']==2 ? '，请等待审核' : '';
			$this->ajaxReturn($data,'评论成功'.$info,1);
		} else {
			$this->ajaxReturn('','评论失败',0);
		}
	}
	
	/* 获取评论列表 */
	public function comments_list() {
		$params =array(
			'aid' => intval(I('aid')),
			'cid' => intval(I('cid')),
			'page' => intval(I('page')),
		);
		if( !$params['aid'] || !$params['cid'] || !$params['page']) $this->error('参数错误'.json_encode($params));
		$pageData = $this->model->commentsPage($params);
		if($pageData['page']!=-1){
			$this->ajaxReturn($pageData,'成功',1);
		}else{
			$this->ajaxReturn('',$pageData['info'],0);
		}
	}
	
	/* 获取评论统计 */
	public function count_comments() {
		$acid = $this->checkData('acid');
		$acid = explode(',', $acid);
		$Comments = M('Comments');
		$data = array();
		foreach ($acid as $value) {
			$params = explode('-', $value);
			/* 10分钟自动缓存 */
			$total = $Comments->where("aid={$params[0]} AND cid={$params[1]} AND  is_checked=1 AND is_delete=1")->cache(true,600)->count(1);
			$data[$value] = $total;
		}
		$this->ajaxReturn($data,'',1);
	}
	
	//评论点赞
	public function praise(){
		$id = intval(I('post.id'));
		if(1>$id){
			$this->ajaxReturn('','error',0);
		}
		
		$uid = $_SESSION[C('MEMBER_SESSION')]['uid'];
		if(!$uid){
			$configPath = APP_PATH.'Modules/Modules/Conf/Comments/Config.php';
			$config =  (file_exists($configPath)) ? require $configPath : array();
			if( $config['allow_visitor'] == 2 ) $this->ajaxReturn('','需要登录才可以操作',0);
		}
				
		$CommentsPraise = M('CommentsPraise');
		
		//上面已经验证过是否允许游客操作，允许游客操作，则可以不用验证，否则UID肯定存在
		if($uid){
			$re = $CommentsPraise->where( array('userid'=>$uid, 'cid'=>$id) )->find();
			if($re) $this->ajaxReturn('','您已经赞过了',0);
		}
	
		$c =  $this->model->where(array('id'=>$id))->find();		
		if(!$c){
			$this->ajaxReturn('','评论不存在',0);
		}
		
		$re = $this->model->where(array('id'=>$id))->save(  array('praise' => array('exp','praise+1') ) );
		if($re){				
			$addData = array(
				'userid'=>$uid,
				'cid'=>$id,
				'save_time'=>NOW_TIME,			
			);
			$CommentsPraise->add($addData);
			$data = array();
			$data['id']=$id;
			$data['praise'] = intval($c['praise'])+1;			
			$this->ajaxReturn($data,'操作成功',1);
		}else{
			$this->ajaxReturn('','操作失败，请重试',0);
		}
	}
	
}
?>