<?php
/**
 * 用户设置
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class SetAction extends GlobalAction {
	
	protected function _initialize() {
		//会员初始化
		parent::memberInit();
		//重构父初始化方法
		parent::_initialize();
		//会员主规则
		parent::memberMainRule();
		$this->currentModel = F("models_".GBehavior::$session['append_model']);
		$this->model = D('Member');
	}

	/* 基本信息 */
	public function basic() {
		if (IS_POST) {
			$this->checkOperTime('更新基本资料');
			//更新昵称
			$nickname = $this->checkData('nickname');
			if ($nickname != GBehavior::$session['nickname']) {
				$Member = D('Member');
				$result = $Member->checkNickName($nickname);
				if (!$result[0]) {
					$this->error($result[1]);
				}
				$status = $Member->where("id=".GBehavior::$session['id'])->setField('nickname',$nickname);
				$status ? $_SESSION[C('MEMBER_SESSION')]['nickname'] = $nickname : $this->error('昵称更新失败！');
				unset($Member);
			}
			//更新其它基本资料
			$this->editPublicMsg($this->modelEditPost(),array('基本资料更新成功！','基本资料未能成功更新！'),U("Set/basic",array(),true,false,true));
		} else {
			$currentData = $this->modelEditDisplay(GBehavior::$session['id'],'member_basic');
			
			$tpl = 'Member/Set/basic.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
	
	/* 设置密码 */
	public function password() {
		if (IS_POST) {
			$this->checkOperTime('设置密码');
			$postData = $this->model->checkPassword();
			if(!$postData['vail_status']) $this->error($postData['vail_info']);
			if (sha1(md5($postData['old_password'])) !== GBehavior::$session['password']) {
				$this->writeLog('此用户修改密码时，原密码输入不正确，可能为非正常用户！', 'USER_ERROR');
				$this->error('原密码不正确，无法进行密码修改！');
			}
			$password = sha1(md5($postData['new_password']));
			$status = $this->model->where("id=".GBehavior::$session['id'])->setField('password',$password);
			$this->editPublicMsg($status,array('密码设置成功！','密码设置失败！'),U("Set/password",array(),true,false,true));
		} else {
			$tpl = 'Member/Set/password.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
	
	/* 上传头像 */
	public function picture() {
		if (IS_POST) {
			$this->checkOperTime('上传头像');
			$fileDir = UPLOADS_DIR.'/picture/'.date(C('UPLOAD_DIR_FORMAT'),NOW_TIME).'/'.GBehavior::$session['id'].'/';
			if (!file_exists($fileDir)) Tool::mkDir($fileDir);
			$filePath = __PATH__.$fileDir;
			$srcName = "_src.jpg";
			$bigName = "big.jpg";
			$middleName = 'middle.jpg';
			$smallName = "small.jpg";
			
			$src=base64_decode($_POST['pic']);
			if($src) {
				if (!file_put_contents($filePath.$srcName,$src)) {
					$this->writeLog('保存用户源头像失败！', 'SYSTEM_ERROR');
					$this->ajaxReturn('','头像保存失败，请重试！');
				}
			}
			$pic1=base64_decode($_POST['pic1']);
			$pic2=base64_decode($_POST['pic2']);
			$pic3=base64_decode($_POST['pic3']);
			if (!file_put_contents($filePath.$bigName,$pic1)) {
				$this->writeLog('保存用户大头像失败！', 'SYSTEM_ERROR');
				$this->ajaxReturn('','头像保存失败，请重试！','error');
			}
			if (!file_put_contents($filePath.$middleName,$pic2)) {
				$this->writeLog('保存用户中等头像失败！', 'SYSTEM_ERROR');
				$this->ajaxReturn('','头像保存失败，请重试！','error');
			}
			if (!file_put_contents($filePath.$smallName,$pic3)) {
				$this->writeLog('保存用户小头像失败！', 'SYSTEM_ERROR');
				$this->ajaxReturn('','头像保存失败，请重试！','error');
			}
			//成功则保存用户头像路径
			$status = $this->model->where("id=".GBehavior::$session['id'])->setField('picture_path',$fileDir);
			if ($status !== false) {
				//更新操作时间
				$this->checkOperTime();
				$_SESSION[C('MEMBER_SESSION')]['picture_path'] = 	$fileDir;
				$this->writeLog('用户成功更改头像', 'INFO');
				$this->ajaxReturn('','',1);
			} else {
				$this->writeLog('修改用户头像路径失败！', 'SYSTEM_ERROR');
				$this->ajaxReturn('','头像保存失败，请重试！','error');
			}
		} else {
			$tpl = 'Member/Set/picture.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
		
	}
	
	/* 绑定E-mail */
	public function bind_email() {
		if (IS_POST) {
			//bindEmail
			$postData = ValiData::_vail()->_check(array('email'=>array('s5-40&e','E-mail格式不正确！')), $_POST);
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			//验证绑定邮箱是否为当前邮箱
			if (GBehavior::$session['m_status'] ==1 && GBehavior::$session['email']==$postData['email']) $this->error('该邮箱已成功绑定，若要重新绑定，请更换E-mail！');
			//验证E-mail是否重复
			if ($postData['email'] != GBehavior::$session['email'] && C('EMAIL_UNIQUE') && $this->model->checkEmail($postData['email'],GBehavior::$session['id'])) $this->error('该E-mail已被占用，请更换！');
			import('ORG.Net.Mail.Mail');
			//此处只需要存储至这个临时的session变量，不需要$_SESSION,永久保存
			GBehavior::$session['post_email'] = $postData['email'];
			$sendResult = Mail::sendMail(GBehavior::$session['post_email'], C('WEB_NAME')."-邮箱绑定", $this->model->handleMail(GBehavior::$session,2));
			if ($sendResult) {
				$this->success('邮件已成功发送，请及时验证绑定您的邮箱！',U("Set/bind_email",array(),true,false,true));
			} else {
				$this->error('邮件发送失败，请重新提交绑定！');
			}
		} else {
			$tpl = 'Member/Set/bind_email.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
	
	/* 帐号绑定 */
	public function account_bound() {
		$ApiLogin = D('Api/ApiLogin');
		$params = $this->checkData(array('type','code','op'),'GET',false);
		if (isset($params['type']) && !empty($params['type'])) {
			//绑定
			if ($params['op'] == 1) {
				$type = $params['type'];
				$code = $params['code'];
				//基本登录判断
				(empty($type) || empty($code)) && $this->error('参数错误');
				$apiData = $ApiLogin->LoginApiKeyAndID($type);
				(!$apiData) &&  $this->error('未找到此登录方式！');
				//获取Token信息
				$token = $ApiLogin->getSnsToken($type,$code);
				//获取当前登录用户信息
				if(is_array($token)){
					$userinfo = $ApiLogin->$type($token);
					$userinfo['api_type'] = $userinfo['api_type_num'] = $apiData['id'];
					//授权失败返回信息
					if (isset($userinfo['login_status']) && $userinfo['login_status'] == false) {
						$this->error($userinfo['info']);
					}
					$userinfo['userid'] = GBehavior::$session['id'];
					$insertId = $ApiLogin->addData($userinfo,$token);
					$insertId ? $this->success('SNS绑定成功！',U(ACTION_NAME)) : $this->error('SNS绑定出错！',U(ACTION_NAME));
				} else {
					$this->error('授权失败！');
				}
			} else {//解绑
				$status = $ApiLogin->deleteData(GBehavior::$session['id'],$params['type']);
				$status ? $this->success('SNS解绑成功！',U(ACTION_NAME)) : $this->error('SNS解绑出错！',U(ACTION_NAME));
			}
		} else {
			$apiData = $ApiLogin->table(DB_PREFIX.'api_login AS al')
											->join(DB_PREFIX.'api_token AS at ON al.id=at.lid')
											->join(DB_PREFIX.'api_set AS ase ON ase.id=al.api_type')
											->where("al.userid=".GBehavior::$session['id'])
											->getField('ase.name,al.api_userid,al.api_username,al.api_nickname,al.api_type,al.userid,al.a_key,at.token');
			$this->assign('apiData',$apiData);
			
			$tpl = 'Member/Set/account_bound.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
		
	}
}
?>