<?php
/**
 * 链接模块
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class GuestbookadminAction extends GlobalAction {	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Guestbook');		
	}
		
	public function index() {		
		$data = $this->model->page();
		$this->assign('data',$data);
		$this->display();		
	}
		
	// 	配置修改
	public function config() {
		$filePath = APP_PATH.'Modules/Modules/Conf/Guestbook/Config.php';
		if (IS_POST) {
			if (!file_exists(dirname($filePath))) Tool::mkDir(dirname($filePath));
			
			$array = array('time_limit','start_code');//允许写入的字段
			$data = array();
			foreach ($array as $v){
				$data[$v] = $_POST[$v];
			}
			$data['time_limit'] = intval($data['time_limit']);
			$data['start_code'] = $data['start_code']==1 ? 1 : 0;
			
			//缓冲获取内容
			ob_start();
			var_export($data);
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
	
	public function edit() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) parent::error($postData['vail_info']);
			parent::editPublicMsg($this->model->editData($postData));
		}else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}

	public function delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model->where("id IN($id)")->delete());
	}
}
?>