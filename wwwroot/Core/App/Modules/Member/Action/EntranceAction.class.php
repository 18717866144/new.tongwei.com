<?php
/**
 * 会员登录注册入口，以及一些公共会员方法处理
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class EntranceAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Member');
	}
	
	public function login() {
		/* 登录状态不可再登录 */
// 		if (GBehavior::$session) {
// 			$this->writeLog("此用户在登录状态下尝试再次访问登录页".GBehavior::$session['username'], 'USER_ERROR');
// 			$this->error('您已登录，若要重新登录，请先退出！');
// 		}
		if (IS_POST) {
			/* 销毁原来的SESSION，保证在登录状态下再次注册可重复登录 */
			GBehavior::$session = $_SESSION[C('MEMBER_SESSION')] = null;
			//允许登录
			if (!C('OPEN_LOGIN')) $this->error('系统禁止登录！');
			//验证验证码
			if (C('OPEN_CODE') && !$this->checkCode($_POST['code'])) $this->error('验证码不正确！');
			//验证数据
			$postData = $this->model->checkLogin();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			//IP登录验证
			if (!$this->model->checkLoginIP(2)) $this->error("您的登录错误次数过多，请稍后再重新尝试！");
			//判断登录方式并查找用户
			$login_type = C('EMAIL_LOGIN')&&strpos($postData['username'], '@')!==false ? 'email' : 'username';
			$userData = $this->model->getMember($postData['username'],$login_type);
			//判断用户是否存在
			if (!$userData) {
				$this->model->handleLoginError(2,$postData);
				$this->writeLog("此IP登录失败尝试用户名或E-mail{$postData['username']}", 'USER_ERROR');
				$this->error('登录失败，用户名或密码不正确！');
			}
			//验证用户状态
			if ($userData['m_status'] == 2) {
				$this->writeLog("此用户：{$postData['username']}已被禁止登录网，未能成功登录", 'USER_ERROR');
				$this->error('登录失败，您已被本站禁止！');
			}
			//比对密码
			if ($userData['password'] !== sha1(md5($postData['password']))) {
				$this->model->handleLoginError(2,$postData);
				$content = "用户登录失败，用户名或E-mail{$postData['username']}，尝试的密码{$postData['password']}，加密后".sha1(md5($postData['password']));
				$this->writeLog($content,'USER_ERROR');
				$this->error('登录失败，用户名或密码不正确！');
			} else {
				//登录送积分，送Money
				Actions::addActionsLog('login_points', 'member', $userData['id'], $userData['id']);
				Actions::addActionsLog('login_money', 'member', $userData['id'], $userData['id']);
				//修改登录后的信息如，登录时间，ip
				$userData = $this->model->saveLoginInfo($userData);
				//保存用户
				$this->model->saveSuccessUser($userData,$_POST['save']);
				//写入日志
				$this->model->handleLoginSuccess($userData,2);
				$location_url = isset($_POST['location_url'])&&!empty($_POST['location_url']) ? addslashes($_POST['location_url']) : U("Index/index",array(),true,false,true);
				$this->success('登录成功！',$location_url);
			}
		} else {
			$tpl = 'Member/Entrance/login.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
	
	/* 注册 */
	public function register() {
// 		if (GBehavior::$session) {
// 			$this->writeLog("此用户在注册状态下尝试再次访问注册页".GBehavior::$session['username'], 'USER_ERROR');
// 			$this->error('您已登录，若要重新注册，请先退出！');
// 		}
		/* 如果有会员附加模型 */
		$model_id = C('APPEND_MODEL');
		if ($model_id) {
			$this->currentModel = F("models_$model_id");
			$this->modelAddDisplay('member_register');
			$this->encryptToken($model_id);
		}
		if (IS_POST) {
			/* 销毁原来的SESSION，保证在登录状态下再次注册可重复登录 */
			GBehavior::$session = $_SESSION[C('MEMBER_SESSION')] = null;
			/* 是否开启注册 */
			if (!C('OPEN_REGISTER')) $this->error('系统禁止注册！');
			/* 验证验证码 */
			if (C('OPEN_CODE') && !$this->checkCode($_POST['code'])) $this->error('验证码不正确！');
			/* 验证基本注册数据 */
			$postData = $this->model->checkRegister();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 验证用户名是否惟一 */
			$checkUser = $this->model->checkUserName($postData['username']);
			if (!$checkUser[0]) $this->error($checkUser[1]);
			/* 验证Email是否惟一 */
			if (C('EMAIL_REQUIRED') && C('EMAIL_UNIQUE') && $this->model->checkEmail($postData['email'])) $this->error('该E-mail已存在！');
			/* 验证是否为sns注册 */
			if ((isset($postData['sns_id'])&&!empty($postData['sns_id'])) && $_POST['sns_token'] !== Tool::encrypt($postData['sns_id'])) {
				$this->writeLog("此用户非法修改sns_id注册值，导致sns_token值比对不成功，恶意操作！", 'USER_ERROR');
				$this->error('非法数据值，拒绝注册！');
			}
			/* 主表数据入库 */
			$insertId = $this->model->addData($postData);
			if ($insertId) {
				/* 有附加表写入附加表数据 */
				if ($model_id) {
					//此$insertId其实仍然是上面的$insertId即主表主键
					$insertId = $this->modelAddPost(array('insert_id'=>$insertId),'member_register');
					if (!$insertId) {
						$this->error('注册失败，请重试！');
					}
				}
				/* sns登录则保存已注册的信息 */
				(isset($postData['sns_id'])&&!empty($postData['sns_id'])) &&  D('ApiLogin')->where(array('id'=>$postData['sns_id']))->setField('userid',$insertId);
				//获取用户信息
				$userData = $this->model->getMember($insertId);
				//注册送积分，送Money
				Actions::addActionsLog('register_points', 'member', $userData['id'], $userData['id']);
				Actions::addActionsLog('register_money', 'member', $userData['id'], $userData['id']);
				//修改登录后的信息如，登录时间，ip
				$userData = $this->model->saveLoginInfo($userData);
				//保存用户
				$this->model->saveSuccessUser($userData);
				//写入日志
				$this->model->handleLoginSuccess($userData,2);
				//发送email
				if (isset($postData['email']) && !empty($postData['email'])) {
					import('ORG.Net.Mail.Mail');
					$Mail = Mail::sendMail($userData['email'], WEB_NAME."-注册邮件验证", $this->model->handleMail($userData,1));
				}
				$this->success('注册成功，欢迎成功为本站会员！',U("Index/index",array(),true,false,true));
			} else {
				$this->error('注册失败，请联系网站人员处理！');
			}
		} else {
			$tpl = 'Member/Entrance/register.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
	
	/* 退出 */
	public function logout() {
		if (!GBehavior::$session) {
			$this->writeLog("有IP尝试访问退出页面，但此IP未有登录用户！",'USER_ERROR');
			$this->error('请先登录再执行此操作！');
		}
		cookie(C('MEMBER_COOKIE'),null);
		unset($_SESSION[C('MEMBER_SESSION')]);
		session_unset();
		session_destroy();
		$this->success('退出成功！',U("Entrance/login",array(),true,false,true));
	}
	
 	/* 验证email */
	public function check_email() {
			$type = $this->checkData('type');
			$id = $this->checkData('id');
			$token = $this->checkData('token');
			switch ($type) {
				case 1:
					$newTooken = Tool::encrypt($type.$id.$type);
					if ($token !== $newTooken) {
						$this->writeLog("此用户提交非法数据至Email验证，Email验证类型：[$type]，用户id{$id}", 'USER_ERROR');
						$this->error('非法数据，被拒绝！');
					}
					$status = $this->model->where("id='$id'")->setField('m_status',1);
					if ($status === 0) {
						$this->writeLog("此会员：(ID:$id)，尝试激活已被激活的邮件，可能恶意操作！", 'USER_ERROR');
						$this->error('您已成功激活过了，将跳转至网站首页！',C('WEB_URL'));
					} elseif ($status){
						cookie(C('MEMBER_COOKIE'),null);
						unset($_SESSION[C('MEMBER_SESSION')]);
						session_unset();
						session_destroy();
						$this->success('恭喜，您已成功激活邮件，重新登录后生效！',U("Entrance/login",array(),true,false,true));
					}else {
						$this->writeLog("会员激活邮件失败！id：$id", 'SYSTEM_ERROR');
						$this->error('邮件激活失败，请联系客服处理！');
					}
					break;
				case 2://邮箱绑定
					$postEmail = $this->checkData('post_email');
					$newTooken = Tool::encrypt($type.$id.$type.$postEmail);
					if ($token !== $newTooken) {
						$this->writeLog("此用户提交非法数据至Email验证，Email验证类型：[$type]，用户id{$id}", 'USER_ERROR');
						$this->error('非法数据，被拒绝！');
					}
// 					验证是否登录
					if (!GBehavior::$session) {
						$this->writeLog('此IP尝试访问，用户绑定邮箱处理动作，严重恶意操作', 'USER_ERROR');
						$this->error('请先登录！',U("Entrance/login",array(),true,false,true));
					}
// 					修改数据
					$status = $this->model->where('id='.GBehavior::$session['id'])->setField(array('email'=>$postEmail,'m_status'=>1));
					if ($status !== false) {
						$_SESSION[C('MEMBER_SESSION')]['m_status'] = 1;
						$_SESSION[C('MEMBER_SESSION')]['email'] = $postEmail;
						$this->writeLog('用户更改或绑定邮箱！', 'INFO');
						$this->success('成功更改或绑定邮箱！',U("Index/index",array(),true,false,true));
					} else {
						$this->writeLog("修改用户邮箱失败，系统出错！", 'SYSTEM_ERROR');
						$this->error('未能成功更改或绑定邮箱，请重试！',U("Set/bind_email",array(),true,false,true));
					}
					break;
				case 3://密码找回
					$email = $this->checkData('email');
					$time = $this->checkData('valid');
					$newTooken = Tool::encrypt($type.$id.$type.$email.$time.$time);
					if ($token !== $newTooken) {
						$this->writeLog("此用户提交非法数据至Email验证，Email验证类型：[$type]，用户id{$id}", 'USER_ERROR');
						$this->error('非法数据，被拒绝！');
					}
					if (time() - $time > 1800) {//30分钟有效
						$this->writeLog("此用户密码找回验证邮箱过期，Email验证类型：[$type]，用户id{$id}", 'USER_ERROR');
						$this->error('此邮件验证已过期，请重新发送！',U("Entrance/forget_password",array(),true,false,true));
					}
					$this->assign('time',NOW_TIME);
					$this->assign('id',$id);
					$this->encryptToken($id.$id.NOW_TIME);
					$tpl = 'Member/Entrance/repeat_password.php';
					$tpl = $this->getTpl($tpl);
					$this->display($tpl);
					break;
			}
	}
	
 	/* 重置密码处理 */
	public function repeat_password_post() {
// 		验证提交方式
		if (!IS_POST) {
			$this->writeLog('此IP非法访问重置密码处理方法，恶意操作！', 'USER_ERROR');
			$this->error(C('NOT_POST'));
		}
// 		验证访问源
		if (stripos($_SERVER['HTTP_REFERER'], U('Member/Entrance/check_email')) === false) {
			$this->writeLog('此IP通过非法来源访问重置密码处理方法，恶意操作！', 'USER_ERROR');
			$this->error('非法来源访问！');
		}
// 		验证token
		$this->matchToken($_POST['id'].$_POST['id'].$_POST['time']);
		$postData = ValiData::_vail()->_check(array(
			'password'=>array('s6-20','密码格式不正确！'),
			'repeat_password'=>array('fpassword','密码确认和密码必须一致！'),
		), Tool::filterData($_POST));
		if (!$postData['vail_status']) $this->error($postData['vail_info']);
		$status = $this->model->where("id={$postData['id']}")->setField('password',sha1(md5($postData['password'])));
		if($status !== false) {
			$this->writeLog("用户成功找回密码，id：{$postData['id']}",'INFO');
			$this->success('密码重置成功！',U("Entrance/login",array(),true,false,true));
		} else {
			$this->writeLog("用户找回密码失败！，用户ID：{$postData['id']}", 'SYSTEM_ERROR');
			$this->error('重置密码失败，请重置！');
		}
	}
	
 	/* 找回密码 */
	public function forget_password() {
		if (GBehavior::$session) {
			$this->writeLog("此用户在注册状态下尝试再次访问找回密码页面".GBehavior::$session['username'], 'USER_ERROR');
			$this->error('您已登录，若要找回密码，请先退出！');
		}
		if (IS_POST) {
			$postData = Tool::filterData($_POST);
			/* 判断email惟一也必须验证用户名 */
			$rule = array(
				'username'=>array('r/^[\w]{3,20}$/','用户名格式不正确！'),
				'email'=>array('s5-40&e','E-mail格式不正确！'),
			);
			$where = " AND username='{$postData['username']}'";
			//基本数据格式验证
			$postData = ValiData::_vail()->_check($rule,$postData );
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			//验证Email是否已绑定
			$userData = $this->model->where("email='{$postData['email']}' $where")->find();
			if (!$userData) {
				$this->writeLog('用户使用找回密码入口，恶意尝试，E-mail：'.$postData['email'].'，用户名：'.$postData['username'].'可能为恶意操作！','USER_ERROR');
				$this->error('E-mail或用户名不存在，请确认后再重试！');
			}
			if ($userData['m_status'] == 1){
				$this->writeLog('用户在此时间执行找回密码动作！', 'INFO');
				import('ORG.Net.Mail.Mail');
				$status = Mail::sendMail($postData['email'], WEB_NAME."-密码找回邮件验证", $this->model->handleMail($userData,3));
				$status ? $this->success('邮件已成功发送，请进入邮箱找密码！') : $this->error('邮件发送失败，请重试！');
			} else {
				$this->writeLog('用户E-mail未绑定，无法进行密码找回，E-mail'.$postData['email'], 'INFO');
				$this->error('抱歉，未进行绑定的邮箱，无法进行密码找回！');
			}
			//发邮件
		} else {
			$tpl = 'Member/Entrance/forget_password.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
	/* 验证用户昵称是否存在 */
	protected function checkNick($operate) {
		if (!GBehavior::$session['username']) {
			$this->writeLog("用户未设置昵称（用户名）就执行['$operate']，恶意操作！", 'USER_ERROR');
			$this->error('未设置昵称前，不可操作哦，快去设置昵称吧！');
		}
	}
	
	/**
	 * 更新用户模块统计
	 * @param string $module
	 * @param number $change
	 */
	protected function uM_Count($module,$change = 1) {
		$M_count = F(GBehavior::$session['m_count_dir']."m_count_".GBehavior::$session['id']);
		$M_count[$module] = $change==1 ? $M_count[$module]+1 : $M_count[$module]-1 ;
		F(GBehavior::$session['m_count_dir']."m_count_".GBehavior::$session['id'],$M_count);
	}
	

	
	
	/* ajax验证前台用户名 */
	public function check_front_username() {
		$username = strtolower($this->checkData('param'));
		$InfoArray = D('Member')->checkUserName($username);
		$InfoArray[0] ? $this->ajaxReturn('','','y') : $this->ajaxReturn('',$InfoArray[1],'n');
	}
	
	/* 验证前台昵称 */
	public function check_front_nickname() {
		$nickname = strtolower($this->checkData('param'));
		$InfoArray = D('Member')->checkNickName($nickname);
		$InfoArray[0] ? $this->ajaxReturn('','','y') : $this->ajaxReturn('',$InfoArray[1],'n');
	}
	
	/* 验证前台email */
	public function check_front_email() {
		$id = $this->checkData('id','GET',false);
		$token = $this->checkData('token','GET',false);
		if ($token && $token !== Tool::encrypt($id.$id)) $this->ajaxReturn('','非法数据值，被拒绝！','n');
		$status = D('Member')->checkEmail($this->checkData('param'),$id);
		$status ? $this->ajaxReturn('','该E-mail已存在！','n') : $this->ajaxReturn('','','y');
	}
	
	
}
?>