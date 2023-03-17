<?php
/**
 * 我的数据处理(可以合并，但是为了节点工整，使用My处理)
 * @author CHENG
 *
 */
class MyAction extends GlobalAction {
	

	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Admin');
	}
	
	/** 修改我的信息 **/
	public function update_my_info() {
		if (IS_POST) {
			$postData = $this->model->checkMyInfo();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$postData['id'] = GBehavior::$session['id'];
			$status = $this->model->editData($postData);
			/* 更新及时信息 */
			if ($status !== false) {
				/* 密码不更新，下次登录生效 */
				unset($postData['password']);
				$this->model->updateAdminSession($postData);
			}
			$this->editPublicMsg($status,'',U('update_my_info'));
		} else {
			$this->display();
		}
	}
	
}
?>