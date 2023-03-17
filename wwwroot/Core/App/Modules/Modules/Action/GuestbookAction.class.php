<?php
/**
 * 链接模块
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class GuestbookAction extends GlobalAction {	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Guestbook');
		$this->GuestbookConfig = require APP_PATH.'Modules/Modules/Conf/Guestbook/Config.php';
	}		
	public function index() {		
		if (IS_POST) {			
			$this->matchToken(date('YmdH'));
			$is_ajax=false;
			if(isset($_POST['is_ajax'])&&$_POST['is_ajax']==1){
				$is_ajax=true;
			}
			if($this->GuestbookConfig['start_code']==1)
			{
				//验证码
				if (!$this->checkCode($_POST['code'])){
					if($is_ajax){
						echo -2;exit;
					}else{
						$this->error('Incorrect verification code！');
					}
				}
			}
			if(!isset($_POST['email'])){
				$_POST['email']='anonymous@tongwei.cn';
			}
			$postData = $this->model->checkData();
			if (!$postData['vail_status']){
				if($is_ajax){
					echo $postData['vail_info'];exit;
				}else{
					parent::error($postData['vail_info']);
				}
			}
			$array = array('uname','mobile','email','content','sort');//允许发布字
			$addData = array();
			foreach ($array as $v)
			{
				$addData[$v] = $postData[$v];
			}
			if($is_ajax){
				if(parent::editPublicReturnMsg($this->model->addData($addData))){
					echo 1;exit;
				}else{
					echo -1;exit;
				}
			}else{
				parent::editPublicMsg($this->model->addData($addData));
			}
		}else{
			$title = '留言反馈';
			$this->encryptToken(date('YmdH'));
			$this->assign('start_code',$this->GuestbookConfig['start_code']);
			$this->assign('title',$title);
			$tpl = 'Guestbook/index.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
}
?>