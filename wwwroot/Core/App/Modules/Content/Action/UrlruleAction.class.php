<?php
/**
 * 内容URL规则
 * @author CHEGN
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class UrlruleAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('UrlRule');
	}
	
	public function index() {
		$this->assign('ruleData',$this->model->select());
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
			$this->matchToken($_POST['id']);
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$this->editPublicMsg($this->model->editData($postData));
		}else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->encryptToken($id);
			$this->display();
		}
	}

	public function delete() {
		$this->deletePublicMsg($this->model->where("id=".$this->checkData('id'))->delete());
	}

	
}
?>