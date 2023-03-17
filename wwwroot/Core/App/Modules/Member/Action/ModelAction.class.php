<?php
/**
 * 会员模型行为
 * @author Administrator
 *
 */
class ModelAction extends GlobalAction {
	
	public function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('ModelAction');
	}
	
	public function index() {
		$data = $this->model->actionPage();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function add() {
		if (IS_POST) {
			/* 验证基本数据 */
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 验证惟一标识 */
			$status = $this->model->checkActionMark($postData['name']);
			if ($status) $this->error('该行为标识已被占用！');
			/* 添加数据 */
			$this->addPublicMsg($this->model->addData($postData));
		} else {
			//得到会员模型
			$this->getMemberModels();
			$this->display();
		}
	}
	
	public function edit() {
		if (IS_POST) {
			/* 验证基本数据 */
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 验证惟一标识 */
			$status = $this->model->checkActionMark($postData['name'],$_POST['id']);
			if ($status) $this->error('该行为标识已被占用！');
			/* 添加数据 */
			$this->editPublicMsg($this->model->editData($postData));
		} else {
			$this->getMemberModels();
			$current = $this->model->findOneData($this->checkData('id'),false);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->delete();
		$this->deletePublicMsg($status);
	}
	
	/* 得到会员模型 */
	private function getMemberModels() {
		$models = M('Models')->where("model_type='member'")->select();
		$this->assign('models',$models);
	}
}
?>