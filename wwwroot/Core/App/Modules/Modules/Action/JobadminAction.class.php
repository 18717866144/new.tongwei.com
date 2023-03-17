<?php
/**
 * 链接模块
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class JobAdminAction extends GlobalAction {	
	protected $jobConfig = NULL;
	protected $configFile = NULL;
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Job');
		$this->configFile = APP_PATH.'Modules/Modules/Conf/Job/Config.php';
		$this->model_join = D('JobJoin');
	}
	
	public function index() {
		$Data = $this->model->page();
		$this->assign('data',$Data);
		$this->display();
		//$sendmail = new JobAction();
		//$re = $sendmail->_sendMail_asyn(1,'188869755@qq.com');
		//$re = $sendmail->_sendMail(1,'188869755@qq.com');
		//print_r($re);
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
	
	// 	配置修改
	public function config() {		
		if (IS_POST) {
			if (!file_exists(dirname($this->configFile))) Tool::mkDir(dirname($this->configFile));
			$array = array('sendMail','time_limit','start_code','maxSize','minSize','allowExtType');//允许写入的字段
			//缓冲获取内容
			$data = array();
			foreach ($array as $v){
				$data[$v] = $_POST[$v];
			}
			$data['time_limit'] = intval($data['time_limit']);
			$data['sendMail'] = $data['sendMail']==1 ? 1 : 0;
			$data['start_code'] = $data['start_code']==1 ? 1 : 0;
			$data['minSize'] = intval($data['minSize']);
			$data['maxSize'] = intval($data['maxSize']);
			if($data['minSize']>$data['maxSize']) $this->error('简历文件大小最小要求应小于最大限制');
			$data['allowExtType'] = array_filter(explode("\r\n",$data['allowExtType']));
			$data = Tool::filterData($data);//过滤				
			ob_start();
			var_export($data);
			$contents = ob_get_contents();
			ob_clean();
			$status = file_put_contents($this->configFile, "<?php\r\nreturn $contents;\r\n");
			$status ? $this->success('成功更改配置！') : $this->error('配置更改失败！');
		} else {
			if(file_exists($this->configFile)){
				$this->jobConfig = require $this->configFile;
				$this->assign('setting',$this->jobConfig);
			}
			$this->display();
		}
	}
	
	public function sendMail(){
		if(IS_POST){
			$id = $_POST['id'];
			$email = $_POST['email'];
			if(!$id || !$email) exit;
			$sendmail = new JobAction();
			$re = $sendmail->_sendMail_asyn($id,$email);
			if($re) {$str = '成功';$re=1;}else{$str = '失败';$re=0;}
			$this->ajaxReturn('','邮件发送'.$str,$re);
		}else{
		 	exit;
			//$this->ajaxReturn('','',0);	
		}
	}
	
	// 	配置修改
	public function join() {
		if (IS_POST) {
						
		} else {
			$Data = $this->model_join->page();
			$this->assign('data',$Data);
			$this->display();
		}
	}
}
?>