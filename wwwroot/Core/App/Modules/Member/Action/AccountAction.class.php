<?php
/**
 * 我的帐户，充值，api登录交互
 * @author Administrator
 *
 */
class AccountAction extends GlobalAction {
	
	
	protected function _initialize() {
		parent::_initialize();
		// 		会员初始化
		$this->memberInit();
		// 		会员主规则
		$this->memberMainRule();
	}
	
	public function kf_online() {
		$tpl = 'Member/Account/kf_online.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
		$this->display($this->tpl.'kf_online.php');
	}
	
	public function points() {
		$tpl = 'Member/Account/points.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	public function pay_record() {
		$tpl = 'Member/Account/pay_record.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
}
?>