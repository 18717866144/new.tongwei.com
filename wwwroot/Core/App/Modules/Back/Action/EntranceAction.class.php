<?php
/**
 * 后台登录 退出 控制器
 * @author CHENG
 * 常用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class EntranceAction extends GlobalAction {	
	protected function _initialize() {
		if(!session('IN_ADMIN_LOGIN')) $this->error('URL错误','/');//是否非管理入口进入的访问
		parent::_initialize();
		$this->model = D('Admin');
	}
	
	/* 登录 */
	public function login() {
		if (IS_POST) {		
			//验证码
			if (!$this->checkCode($_POST['code'])) $this->error('验证码不正确！！！');
			//验证数据
			$postData = $this->model->checkLogin();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			//IP登录验证
			//if (!$this->model->checkLoginIP(1)) {
			//	$this->error("您的登录错误次数过多，请稍后再重新尝试！");
			//}
			//查找用户
			$userData = $this->model->getAdmin($postData);
			if (!$userData) {
				$this->error('登录失败，用户名或密码错误，或此用户名被封禁！');
			}
			$_SESSION['code'] = '';
			$this->success('登录成功！！！',U('Back/Index/index'));
		} else {
			if ($_SESSION[C('ADMIN_SESSION')]) {
				$this->redirect('Back/Index/index');
			}			
			$this->display();
		}
	}
	
	/* 退出 */
	public function logout() {
		if (isset($_SESSION[C('ADMIN_SESSION')]) && !empty($_SESSION[C('ADMIN_SESSION')])) {
			session(C('ADMIN_SESSION'),null);
			session(C('IS_SUPER_ADMIN'),null);
			session_unset();
			session_destroy();
//			$this->success('退出成功！',__ROOT__.'/admin.php');
			$this->success('退出成功！',__ROOT__.'/vivi_tw.php');
		} else {
			$this->writeLog("此IP未登录时，访问退出页面",'USER_ERROR');
			$this->error('请先登录！');
		}
	}
	
}
?>