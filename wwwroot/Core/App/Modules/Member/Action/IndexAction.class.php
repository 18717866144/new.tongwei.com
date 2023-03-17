<?php
/**
 * 会员中心
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class IndexAction extends GlobalAction {
	
	protected function _initialize() {
		//会员初始化
		parent::memberInit();
		//重构父初始化方法
		parent::_initialize();
		//会员主规则
		parent::memberMainRule();
	}
	
	public function index() {
		$tpl = 'Member/index.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
}
?>