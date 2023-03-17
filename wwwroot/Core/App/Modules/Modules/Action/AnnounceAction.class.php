<?php
/**
 * 后台公告操作模块
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class AnnounceAction extends GlobalAction {
	
	protected function _initialize(){
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Announce');
	}
	
	public function index() {
		$annouceData = $this->model->announcePage();
		$this->assign('announceData',$annouceData);
		$this->display();
	}
	
	// 	配置修改
	public function config() {
		$filePath = APP_PATH.'Modules/Modules/Conf/Announce/Config.php';
		if (IS_POST) {
			if (!file_exists(dirname($filePath))) Tool::mkDir(dirname($filePath));
			// 			缓冲获取内容
			ob_start();
			unset($_POST['send']);
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
			$tpl = TEMPLATE_PATH.C('DEFAULT_SKIN').'/Announce/list/';
			$list_tplArray = str_replace($tpl, '', glob($tpl.'*.php'));
			$this->assign('list_tplArray',$list_tplArray);
			$this->display();
		}
	}

	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if(!$postData['vail_status']) $this->error($postData['vail_info']);	
			$this->addPublicMsg($this->model->addData($postData));
		}else {
			// 	公告模板
			$tpl = TEMPLATE_PATH.C('DEFAULT_SKIN').'/Announce/show/';
			$show_tplArray = str_replace($tpl, '', glob($tpl.'*.php'));
			$this->assign('show_tplArray',$show_tplArray);
			$this->display();
		}
	}

	public function edit() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if(!$postData['vail_status']) $this->error($postData['vail_info']);
			$this->editPublicMsg($this->model->editData($postData));
		}else {
			$id = $this->checkData('id');
			$current = $this->model->where("id=$id")->find();
			$current ? $this->assign('current',$current) : C('FIND_ERROR');
			// 	公告模板
			$tpl = TEMPLATE_PATH.C('DEFAULT_SKIN').'/Announce/';
			$show_tplArray = str_replace($tpl.'show/', '', glob($tpl.'show/'.'*.php'));
			$this->assign('show_tplArray',$show_tplArray);
			$this->display();
		}
	}

	public function delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model->where("id IN($id)")->delete());
	}

	
}
?>