<?php
/**
 * 内容操作模型
 */
class PaperAction extends GlobalAction {
	protected $model;
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Paper');		
	}
	
	public function index(){
		$data = $this->model->page();
		$this->assign('data', $data);
		$this->display();
	}
	
	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->addData($postData);
			$this->addPublicMsg($status);
		}else {
			$this->display();
		}
	}
	
	public function edit(){
		if (IS_POST) {
			$postData = $this->model->checkData();			
			if (!$postData['vail_status']) parent::error($postData['vail_info']);
			parent::editPublicMsg($this->model->editData($postData));
		}else {
			$id = $this->checkData('id');
			$current = $this->model->find($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display('add');
		}
	}
	
	
}
