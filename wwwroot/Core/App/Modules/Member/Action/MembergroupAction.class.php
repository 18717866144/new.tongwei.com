<?php
/**
 * 会员组控制器
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class MembergroupAction extends GlobalAction {
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('MemberGroup');
		
	}
	
	public function index() {
		$memberGroup = $this->model->order('id DESC')->select();
		$this->assign('memberGroup',$memberGroup);
		$this->display();
	}
	
	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$this->addPublicMsg($this->model->addData($postData));
		} else {
			$this->display();
		}
	}
	
	public function edit() {
		if (IS_POST) {
			$this->matchToken();
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$this->addPublicMsg($this->model->editData($postData));
		} else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->encryptToken($id);
			$this->display();
		}
	}
	
	/* 设置规则 */
	public function set_rule() {
		if (IS_POST) {
			$this->matchToken();
			$this->editPublicMsg($this->model->setRule());
		} else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$this->encryptToken($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			//分配已有权限规则
			$this->assign('power',explode(',',$current['rules']));
			$this->assign('ruleData',$this->model->table(DB_PREFIX.'member_rule')->where('status=1')->order('sort DESC')->field('id,pid,title')->select());
			$this->display();
		}
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->delete();
		if ($status) {
			$this->model->table(DB_PREFIX.'member_group_access')->where("group_id IN($id)")->delete();
		}
		$this->deletePublicMsg($status);
	}
	
}
?>