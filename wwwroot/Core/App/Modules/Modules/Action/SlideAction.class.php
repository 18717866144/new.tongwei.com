<?php
class SlideAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Slide');
		$this->model_type = D('SlideType');
		$this->assign('title','幻灯片');		
	}
	
	public function index() {
		$type = $this->type();
		$this->assign('type',$type);
		$Data = $this->model->page();
		$this->assign('data',$Data);
		$this->display();		
	}
	
	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->addData($postData);
			$this->addPublicMsg($status);
		}else {
			$type = $this->type();
			$this->assign('type',$type);
			$this->display();
		}
	}
	
	public function edit() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) parent::error($postData['vail_info']);
			parent::editPublicMsg($this->model->editData($postData));
		}else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);			
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$type = $this->type();
			$this->assign('type',$type);
			$this->display();
		}
	}
	
	public function audit() {
		$id = $this->checkData('id');
		$a_status = $this->checkData('status','GET')==1 ? 1 : 0;
		$status = $this->model->where("id IN({$id})")->setField('l_status',$a_status);
		$status!==false ? $this->ajaxReturn('','成功更改状态！','success') : $this->ajaxReturn('','更改状态失败！','error');
	}
	

	public function delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model->where("id IN($id)")->delete());
	}
	
	
	/*private表示类中调用方法，外部禁止访问*/
	private function type() {
		$slideTypeData = $this->model_type->getField('id,type_name,sort,remark');
		return $slideTypeData;
	}
	
	public function type_index() {
		$slideTypeData = $this->model_type->page();
		$this->assign('data',$slideTypeData);
		$this->display();
	}
	
	public function type_add() {
		if (IS_POST) {
			$postData = $this->model_type->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model_type->addData($postData);
			$this->addPublicMsg($status);
		}else {
			$this->display();
		}
	}
	
	public function type_edit() {
		if (IS_POST) {
			$postData = $this->model_type->checkData();
			if (!$postData['vail_status']) parent::error($postData['vail_info']);
			parent::editPublicMsg($this->model_type->editData($postData));
		}else {			
			$id = $this->checkData('id');
			$current = $this->model_type->where("id=$id")->find();
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}
	
	public function type_delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model_type->where("id IN($id)")->delete());
	}
	
	public function type_sort() {		
		$this->sort($this->model_type);
	}
}
?>