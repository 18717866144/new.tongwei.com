<?php
/**
 * 链接模块
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class LinkAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Link');
		$this->model_type = D('LinkType');
	}
	
	public function index() {
		$linkData = $this->model->page();
		$type = $this->type();
		$this->assign('type',$type);
		$this->assign('data',$linkData);
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

	public function delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model->where("id IN($id)")->delete());
	}
	
	/*private表示类中调用方法，外部禁止访问*/
	private function type() {
		$linkTypeData = $this->model_type->getField('id,type_name,sort');
		return $linkTypeData;
	}
	
	public function type_index() {
		$linkTypeData = $this->model_type->page();
		$this->assign('data',$linkTypeData);
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