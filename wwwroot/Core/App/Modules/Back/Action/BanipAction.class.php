<?php
/**
 * 封禁IP段管理 
 * @author CHENG
 * 常用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class BanipAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('BanIp');
	}
	
	public function index() {
		$ipData = $this->model->getPage();
		$this->assign('data',$ipData);
		$this->display();
	}
	
	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$result_id = $this->model->addData($postData);
			//更新ip封禁缓存
			if ($result_id) {
				$this->model->updateCache($result_id);
			}
			$this->addPublicMsg($result_id);
		} else {
			$this->display();
		}
	}
	
	public function edit() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->editData($postData);
			//更新ip封禁缓存
			if ($status !== false) {
				$this->model->updateCache($_POST['id']);
			}
			$this->editPublicMsg($status);
		} else {
			$id = $this->checkData('id');
			$current = $this->model->where("id=$id")->find();
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->delete();
		if ($status) {
			$this->model->updateCache($id,2);
		}
		$this->deletePublicMsg($status);
	}
	
	/* 更新IP段缓存 */
	public function cache() {
		$banIP = $this->model->select();
		if ($banIP) {
			$banIPCache = array();
			foreach ($banIP as $values) {
				$banIPCache[$values['id']] = $values;
			}
			F('ban_ip',$banIPCache);
			$this->success('成功更新封禁IP！',U('index'));
		} else {
			$this->error('未能找到需要更新的IP数据！');
		}
	}
	
}
?>