<?php
/**
 * 前台公告展示
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class AnnounceindexAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Announce');
	}
	
	public function index() {
		$config = require APP_PATH.'Modules/Modules/Conf/Announce/Config.php';
		$tpl = 'Announce/list/'. (GBehavior::$session ? $config['member_list_tpl'] : $config['global_list_tpl']);
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	/* 显示 */
	public function show() {
		$id = $this->checkData('aid');
		$data = $this->findOneData($id);
		if (!$data) {
			if (C('START_SQL_LOGS')) $this->writeLog('此IP尝试不存在的系统消息Announce，已被拒绝！', 'USER_ERROR');
			$this->error(C('FIND_ERROR'));
		}
		if ($data['ann_type'] == 2 && !GBehavior::$session) {
			$this->writeLog('此IP未登录，并尝试访问会员只读的系统消息，恶意操作！', 'USER_ERROR');
			$this->error(C('FIND_ERROR'));
		}
		// 		会员信息则弹出
		if (GBehavior::$session) {
			$user_clickArray = S("announce_click_user_".GBehavior::$session['id']);
			if (!$user_clickArray) $user_clickArray =array();
			// 			更新会员点击数,会员么有公告
			if ($data['ann_type'] == 2 && !in_array($data['id'], $user_clickArray)) {
				$status = M('AnnounceClick')->add(array('userid'=>GBehavior::$session['id'],'aid'=>$data['id']));
				if ($status) {
					array_unshift($user_clickArray,$data['id']);
					S("announce_click_user_".GBehavior::$session['id'],$user_clickArray,3600*24*360);
				}else {
					if (C('START_SQL_LOGS')) $this->writeLog("更新会员查看公告点击数失败！aid{$data['id']},userid=>".GBehavior::$session['id'], 'SYSTEM_ERROR');
				}
			}
		} 
// 		上下篇
		$prevAndNext = $this->model->resolvePrevAndNext($id,$data['ann_type']);
		$this->assign('prev',$prevAndNext['prev']);
		$this->assign('next',$prevAndNext['next']);
		
		$this->assign('announce',$data);
		$tpl = 'Announce/show/'.$data['show_tpl'];
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	/* 点击数 */
	public function click() {
		$aid = $this->checkData('id');
		$click = $this->model->where("id={$aid}")->getField('click');
		$this->model->where("id={$aid}")->setInc('click');
		$click++;
		echo "document.write('$click')";
	}
}
?>