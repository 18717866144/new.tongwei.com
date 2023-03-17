<?php
/**
 * Api数据交互设置
 * @author CHENG
 *
 */
class ApisetAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('ApiSet');
	}
	
	public function index() {
		$data = $this->model->select();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			//验证惟一性
			!$this->model->checkUnique($postData['name']) && $this->error('该Api标识已存在！');
			//数据添加
			$this->addPublicMsg($this->model->addData($postData));
		} else {
			$this->display();
		}
		
	}
	
	public function edit() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			//验证惟一性
			!$this->model->checkUnique($postData['name'],$postData['id']) && $this->error('该Api标识已存在！');
			//数据添加
			$this->editPublicMsg($this->model->editData($postData));
		} else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->delete();
		$this->deletePublicMsg($status);
	}
	
}
?>