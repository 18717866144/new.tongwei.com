<?php
/**
 * 用户行为设置
 * @author CHENG
 *
 */
class ActionAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Action');
	}
	
	/* 行为列表 */
	public function index() {
		$data = $this->model->actionPage();
		$this->assign('data',$data);
		$this->display();
	}
	
	/* 添加行为 */
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
			$this->display();
		}
	}
	
	/* 编辑行为 */
	public function edit() {
		if (IS_POST) {
			/* 验证基本数据 */
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 验证惟一标识 */
			$status = $this->model->checkActionMark($postData['name'],$postData['id']);
			if ($status) $this->error('该行为标识已被占用！');
			/* 添加数据 */
			$status = $this->model->editData($postData);
			$this->editPublicMsg();
		} else {
			$current = $this->findOneData($this->checkData('id'));
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}
	
	/* 删除行为 */
	public function delete() {
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->delete();
		if($status) {
			//删除行为日志，和日志说明表
			$this->delete_action_log($id);
		}
		$this->deletePublicMsg($status);
	}
	
	/* 行为日志分页列表 */
	public function action_log() {
		$logData = $this->model->logPage();
		$this->assign('logData',$logData);
		$this->display();
	}
	
	/* 日志详情 */
	public function detail() {
		$data = $this->model->logDetail($this->checkData('id'));
		$this->assign('data',$data);
		$this->display();
	}
	
	/* 删除日志行为 */
	public function delete_action_log($delete_id = '') {
		if (empty($delete_id)) {
			$id = $this->checkData('id');
			$return = true;
		} else {
			$id = $delete_id;
			$return = false;
		}
		$this->model->table(DB_PREFIX.'action_log')->where("id IN($id)")->delete();
		$this->model->table(DB_PREFIX.'action_log_data')->where("acid IN($id)")->delete();
		if ($return) {
			$this->deletePublicMsg(true);
		}
	}
}
?>