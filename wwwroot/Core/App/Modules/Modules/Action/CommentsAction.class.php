<?php
/**
 * 评论模型操作
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class CommentsAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Comments');
	}
	
	public function index() {
		$data = $this->model->backCommentsPage();
		$this->assign('data',$data);
		$this->display();
	}
	
// 	配置修改
	public function config() {
		$filePath = APP_PATH.'Modules/Modules/Conf/Comments/Config.php';
		if (IS_POST) {
			if (!file_exists(dirname($filePath))) Tool::mkDir(dirname($filePath));
			unset($_POST['send']);
// 			缓冲获取内容
			ob_start();
			var_export($_POST);
			$contents = ob_get_contents();
			ob_clean();
			$status = file_put_contents($filePath, "<?php\r\nreturn $contents;\r\n");
			$status ? $this->success('成功更改配置！') : $this->error('配置更改失败！'); 
		} else {
			if (file_exists($filePath)) {
				$setting = require $filePath;
				$this->assign('setting',$setting);
			} 
			$this->display();
		}
	}
	//审核
	public function audit() {
		$status = $this->checkData('status','GET')==1 ? 1 : 3;
		$status = $this->model->where("id IN({$_POST['id']})")->setField('is_checked',$status);
		if (!$status) $this->writeLog("修改内容审核状态失败，将要悠 的标识 ' $status'，", 'SYSTEM_ERROR');
		$this->editPublicMsg($status,array('审核成功！','系统出错，审核失败！'));
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model->where("id IN($id)")->delete());
	}
}
?>