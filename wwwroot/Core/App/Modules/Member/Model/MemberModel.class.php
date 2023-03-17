<?php
/**
 * 会员基础模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class MemberModel extends GlobalModel {
	
	/**
	 * 数据初始化接口
	 * (non-PHPdoc)
	 * @see Model::_initialize()
	 */
	protected function _initialize() {
		/* 获取不同会员的模型数据表 */
		$model_id = C('MEMBER_MAIN_MODEL');
		try {
			$models = F("models_$model_id");
			$this->tableName = $models['table_name'];
		} catch (Exception $e) {
			$e->getCode().'<br />未找到会员模型';
		}
	}
	
	/**
	 * 注册数据过滤
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkRegister() {
		$rule = array(
				'username'=>array('r/^[\w]{3,20}$/i','用户名格式不正确！'),
				'password'=>array('s6-20','密码格式不正确！'),
				'repeat_password'=>array('fpassword','密码确认和密码必须一致！'),
		);
		//E-mail是否必填
		if (C('EMAIL_REQUIRED')) $rule['email'] = array('s10-40&e','E-mail格式不正确！');
		return ValiData::_vail()->_check($rule, Tool::filterData($_POST));
	}
	/**
	 * 登录数据过滤
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkLogin() {
		$postData = Tool::filterData($_POST);
		$rule = array(
			'username'=>array('r/^[\w]{3,20}$/i','用户名格式不正确！'),
			'email'=>array('s10-40&e','E-mail格式不正确！'),
			'password'=>array('s6-20','密码格式不正确！'),
		);
		//是E-mail并开启E-mail登录
		if (C('EMAIL_LOGIN') && strpos($postData['username'], '@') !== false) {//
			$rule['username'] = $rule['email'];
		}
		unset($rule['email']);
		return ValiData::_vail()->_check($rule, $postData);
	}
	
	/**
	 * 验证用户名格式或是否存在
	 * @param string $username
	 * @return multitype:boolean string |Ambigous <multitype:boolean string , multitype:boolean >
	 */
	public function checkUserName($username) {
// 		/^[\x{4e00}-\x{9fa5}a-z\_][\x{4e00}-\x{9fa5}\w]{1,11}$/ui
		if (!preg_match('/^[\w]{3,20}$/i', $username)) {
			return array(false,'用户名格式不正确！');
		}else {
			if (in_array($username, C('NOT_REGISTER_USERNAME'))) {
				return array(false,'该用户名已被系统保留！');
			}else {
				$data = $this->where("username='$username'")->getField('id');
				return  $data ? array(false,'该用户名已存在！') : array(true);
			}
		}
	}
	
	/**
	 * 验证昵称
	 * @param string $nickname
	 * @return Ambigous <multitype:boolean string , multitype:boolean >|multitype:boolean string
	 */
	public function checkNickName($nickname) {
		if (preg_match('/^[\w\-\x{4e00}-\x{9fa5}]{2,20}$/ui', $nickname)) {
			$data = $this->where("username='$nickname'")->getField('id');
			return  $data ? array(false,'该昵称已存在！') : array(true);
		}else {
			return array(false,'昵称格式不正确！');
		}
	}
	
	/**
	 * 验证修改密码
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkPassword() {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
				'old_password'=>array('s6-20','原密码格式不正确！'),
				'new_password'=>array('s6-20','新密码格式不正确！'),
				'repeat_password'=>array('fnew_password','密码确认和新密码必须一致！'),
		), $postData);
	}
	
	/**
	 * 检查Email是否存在
	 * @param string $email
	 * @param string|numeric $id
	 * @return Ambigous <mixed, boolean, NULL, multitype:, unknown, string>
	 */
	public function checkEmail($email,$id = '') {
		if (!empty($id)) $id = " AND id<>$id";
		return $this->where("email='$email' $id")->find();
	}
	
	/**
	 * 前台用户自定义注册[会员主表数据]，添加用户=>入库
	 * @param array $postData
	 * @return boolean
	 */
	public function addData($postData) {
		/* 游戏附加类型 */
		$cookie = unserialize(base64_decode(cookie('temp_reg')));
		$postData['uid'] = intval($cookie['uid']);
		$postData['cid'] = intval($cookie['cid']);
		//会员模型，添加主表其它数据
		$postData['password'] = sha1(md5($postData['password']));
		$postData['append_model'] = C('APPEND_MODEL');//默认附加模型
// 		会员主页地址
		$tableInfo = $this->getTableInfo();
		$uid = $tableInfo['Auto_increment'];
// 		要更改
		$postData['home_url'] = U("Home/index",array('uid'=>$uid),true,false,true);
		$postData['picture_path'] = 'Public/images/picture/';
		$postData['register_time'] = NOW_TIME;
		$postData['register_ip'] = CLIENT_IP_NUM;
		$postData['m_status'] = 3;//待验证
		$insertId = $this->data($postData)->add(); 
		if (!$insertId) {
			$this->writeLog("系统出错，此IP注册失败，添加会员主表失败", 'SYSTEM_ERROR');
			return false;
		}
		return $insertId;
	}
	
	/**
	 * 添加会员附加表信息(non-PHPdoc)
	 * @see GlobalModel::modelAddData()
	 */
	public function modelAddData($currentModel, $postData,$setting) {
		//添加关联主表id
		$postData['main']['mid'] = $setting['insert_id'];
		$postData['main']['skin'] = C('MEMBER_DEFAULT_SKIN');//会员中心skin
		//添加数据
		$Model = $this->returnModel($currentModel['table_name']);
		$status = $Model->data($postData['main'])->add();
		if ($status) {
			//添加默认组
			$MemberGroupAccess = D('Member/MemberGroupAccess');
			$status = $MemberGroupAccess->setAccess(array(C('MEMBER_DEFAULT_GROUP')),$setting['insert_id']);
			if($status) {
				$postData['insert_id'] = $setting['insert_id'];
			}  else {
				//记录日志
				$this->writeLog('系统出错，新增用户，添加默认用户组失败！SQL'.$MemberGroupAccess->getLastSql(), 'SYSTEM_ERROR');
				//删除主表数据
				$this->where("id={$setting['insert_id']}")->delete();
				//删除附加表数据
				$Model->where("mid={$setting['insert_id']}")->delete();
				//return false
				$postData['insert_id'] = false;
			}
		} else {/* 附加表添加失败 */
			//记录日志
			$this->writeLog("会员注册写入会员附加表失败！", 'SYSTEM_ERROR');
			//删除主表数据
			$this->where("id={$setting['insert_id']}")->delete();
			//return false
			$postData['insert_id'] = false;
		}
		unset($Model,$currentModel,$MemberGroupAccess);
		//返回最后处理的最新数据
		return $postData;
	}
	
	/**
	 * 得到会员信息
	 * @param numeric|string $type_value
	 * @param string $type_name
	 * @return Ambigous <unknown, mixed, boolean, NULL, multitype:, string>|boolean
	 */
	public function getMember($type_value,$type_name = 'id') {
		$userData = $this->where("$type_name='$type_value'")->find();
		if ($userData) {
			$appendModel = F("models_{$userData['append_model']}");
			$Model = $this->returnModel($appendModel['table_name']);
			$userAppend = $Model->where("mid={$userData['id']}")->find();
			if ($userAppend) {
				$userData = array_merge($userData,$userAppend);
				// 用户组取得
				$group = $this->table("{$this->tablePrefix}member_group_access AS c")->join("LEFT JOIN {$this->tablePrefix}member_group AS g ON c.group_id=g.id")->field('g.id,g.title')->where("{$userData['id']}=c.uid")->select();
				$userData['group'] = $group;
				return $userData;
			}else {
				$this->writeLog("读取用户附加表失败，用户id{$userData['id']}", 'SYSTEM_ERROR');
				return false;
			}
		}else {
			return false;
		}
	}
	
	/**
	 * 保存登录的用户信息
	 * @param Array $userData
	 * @return Array
	 */
	public function saveLoginInfo($userData) {
		$save_userinfo = array();
		$save_userinfo['login_ip'] = $userData['login_ip'] = get_client_ip(1);
		$save_userinfo['login_time'] = $userData['login_time'] = time();
		$save_userinfo['login_num'] = $userData['login_num'] = $userData['login_num']+1;
		$status = $this->where("id='{$userData['id']}'")->save($save_userinfo);
		if(!$status) $this->writeLog("修改用户登录数据失败，用户id{$userData['id']}", 'SYSTEM_ERROR');
		//行为---->用户登录是否增加积分
		Actions::addActionsLog('login_points', $this->tableName , $userData['id'],$userData['id']);
		return $userData;
	}
	
	/**
	 * 保存成功登录的用户
	 * @param Array $userData
	 * @param string $saveCookie
	 * @return boolean
	 */
	public function saveSuccessUser($userData,$saveCookie = true) {
		//写cookie
		if ($saveCookie) {
			$user_cookie = array();
			$user_cookie['id'] = $userData['id'];
			$user_cookie['email'] = $userData['email'];
			$user_cookie['token'] = Tool::encrypt($userData['id']);
			$user_cookie_string = Base64::encrypt(serialize($user_cookie));
			cookie(C('MEMBER_COOKIE'),$user_cookie_string,86400*14);
		}
		$_SESSION[C('MEMBER_SESSION')] = $userData;
		return true;
	}
	
	/**
	 * 处理发送的Email
	 * @param Array $postData
	 */
	public function handleMail($data,$type = 1) {
		switch ($type) {
			case 1://注册邮件验证
				ob_start();
				require TMPL_PATH.'Mail/'.C('REGISTER_EMAIL_TPL');
				$contents = ob_get_clean();
				$url = C('WEB_URL').U('Member/Entrance/check_email?type='.$type.'&id='.$data['id'].'&token='.Tool::encrypt($type.$data['id'].$type));
				$contents = str_replace(array('{$id}','{$url}','{$email}'), array($data['id'],$url,$data['email']),$contents);
				break;
			case 2://绑定E-mail
				ob_start();
				require TMPL_PATH.'Mail/'.C('BIND_EMAIL_TPL');
				$contents = ob_get_clean();
				$url = C('WEB_URL').U('Member/Entrance/check_email?type='.$type.'&id='.$data['id'].'&post_email='.$data['post_email'].'&token='.Tool::encrypt($type.$data['id'].$type.$data['post_email']));
				$contents = str_replace(array('{$id}','{$url}','{$email}','{$username}'), array($data['id'],$url,$data['post_email'],$data['username']),$contents);
				break;
			case 3://找回密码
				ob_start();
				require TMPL_PATH.'Mail/'.C('FORGET_EMAIL_TPL');
				$contents = ob_get_clean();
				$url = C('WEB_URL').U('Member/Entrance/check_email?type='.$type.'&id='.$data['id'].'&email='.$data['email'].'&valid='.NOW_TIME.'&token='.Tool::encrypt($type.$data['id'].$type.$data['email'].NOW_TIME.NOW_TIME));
				$contents = str_replace(array('{$id}','{$url}','{$email}'), array($data['id'],$url,$data['post_email']),$contents);
				break;
			case 4://充值E-mail提示
				ob_start();
				require TMPL_PATH.'Mail/'.C('PAY_EMAIL_TPL');
				$contents = ob_get_clean();
				$contents = str_replace(array('{$order_id}','{$money}','{$email}','{$username}'), array($data['order_id'],$data['succ_money'],$data['contact'],$data['username']),$contents);
				break;
		}
		return $contents;
	}
	
	/**
	 * 后台用户分页
	 * @return multitype:Ambigous <string, mixed> Ambigous <mixed, boolean, NULL, string, unknown, multitype:, multitype:multitype: , void, object>
	 */
	public function memberPage() {
		$where = array();
		$url = '';
		$options = $this->compareGET('register_time',array('reg_start_time','reg_end_time'),'time',false);
		$where = $options['where'];
		$url .= $options['url'];
		$options = $this->compareGET('login_time',array('login_start_time','login_end_time'),'time',false);
		$options['where'] = array_merge_recursive($options['where'],$where);
		$url .= $options['url'];
		$options = $this->compareGET('register_ip',array('reg_start_ip','reg_end_ip'),'ip');
		$options['where'] = array_merge_recursive($options['where'],$where);
		$url .= $options['url'];
		$options = $this->compareGET('login_ip',array('login_start_ip','login_end_ip'),'ip');
		$options['where'] = array_merge_recursive($options['where'],$where);
		$url .= $options['url'];
		switch ($_GET['select_type']) {
			case 'id':
				$select_type = 'id';
				break;
			case 'username';
				$select_type = 'username';
				break;
			default:
				$select_type = 'email';
				break;
		}
		$resolveOptions = $this->resolveGET(array('m_status',$select_type=>'search_content'));
		$options['where'] = array_merge_recursive($resolveOptions['where'],$where);
		$url .= $resolveOptions['url'];
		$total = $this->where($where)->count(1);
		$Page = new Page($total,$url);
		$pageData = array();
		$pageData[0] = $this->where($where)->limit($Page->limit())->order('id DESC')->select();
		foreach ($pageData[0] as &$values) {
			$group = $this->table("{$this->tablePrefix}member_group_access AS c")->join("LEFT JOIN {$this->tablePrefix}member_group AS g ON c.group_id=g.id")->field('g.id,g.title')->where("{$values['id']}=c.uid")->select();
			$values['group'] = $group;
			$models = F("models_{$values['append_model']}");
			$values['append_model_name'] = $models['model_name'];
		}
		$pageData[1] = $Page->show();
		return $pageData;
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see GlobalModel::modelFindOneFull()
	 * 查出会员附加表数据，虽然可折叠，但不可删除
	 */
	public function modelFindOneFull($currentModel,$id) {
		return $this->table("{$this->tablePrefix}{$currentModel['table_name']}")->where("mid=$id")->find();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see GlobalModel::modelEditData()
	 * 修改模型会员附加表数据
	 */
	public function modelEditData($currentModel,$postData, $setting = array()) {
		// 		修改主表
		$Model = $this->returnModel($currentModel['table_name']);
		//后台修改
		if (SESSION_TYPE == 1) {
			$status = $Model->where("mid={$setting['id']}")->save($postData['main']);
		} elseif (SESSION_TYPE == 2) {
			$status = $Model->where("mid={$_SESSION[C('MEMBER_SESSION')]['id']}")->save($postData['main']);
		}
		$status = $postData['save_status'] = $status === false ? false : true;
		if ($status) {
// 			用户修改时成功status更新session
			if (SESSION_TYPE == 2) {
				foreach ($postData['main'] as $key=>$value) {
					$_SESSION[C('MEMBER_SESSION')][$key] = $value;
				}
				if (empty($_SESSION[C('MEMBER_SESSION')]['username'])) {
					$username = strtolower(Input::getVar($_POST['username']));
					$u_status = $this->where("id={$_SESSION[C('MEMBER_SESSION')]['id']}")->setField('username',$username);
					// 			成功更新session
					$u_status ? $_SESSION[C('MEMBER_SESSION')]['username'] = $username : $this->writeLog('系统出错，修改完善用户名失败', 'SYSTEM_ERROR');
				}
			}
		}
		//返回最后处理的最新数据
		return $postData;
	}
	
	/**
	 * 后台添加用户数据过滤
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkData() {
		$postData = Tool::filterData($_POST);
		$rule = array(
				'email'=>array('a|s10-40&e','E-mail格式不正确！'),
				'password'=>array('s6-20','密码格式不正确！'),
				'group'=>array('l1,','请选择所属权限组！'),
				'skin'=>array('s1-30','默认皮肤格式不正确！'),
		);
		//E-mail是否必填，必填覆盖之前的email
		if (C('EMAIL_REQUIRED')) $rule['email'] = array('s10-40&e','E-mail格式不正确！');
		return ValiData::_vail()->_check($rule, $postData);
	}
	
	/**
	 * 后台用户数据编辑过滤
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkEditData() {
		$postData = Tool::filterData($_POST);
		$rule = array(
				'email'=>array('a|s10-40&e','E-mail格式不正确！'),
				'password'=>array('a|s6-20','密码格式不正确！'),
				'group'=>array('l1,','请选择所属权限组！'),
				'skin'=>array('a|s1-30','默认皮肤格式不正确！'),
		);
		//E-mail是否必填
		if (C('EMAIL_REQUIRED')) $rule['email'] = array('s10-40&e','E-mail格式不正确！');
		return ValiData::_vail()->_check($rule, $postData);
	}
	
	/**
	 * 后台系统添加用户，添加用户=>入库
	 * @param array $postData
	 * @return boolean
	 */
	public function backAddData($postData) {
		//会员模型，添加主表其它数据
		$postData['password'] = sha1(md5($postData['password']));
		// 		会员主页地址
		$tableInfo = $this->getTableInfo();
		$uid = $tableInfo['Auto_increment'];
		// 		要更改
		$postData['home_url'] = U("Home/index",array('uid'=>$uid),true,false,true);
		$postData['picture_path'] = 'Public/images/picture/';
		$postData['register_time'] = NOW_TIME;
		$postData['register_ip'] = CLIENT_IP_NUM;
		$insertId = $this->data($postData)->add();
		if ($insertId) {
			$appendModel = F("models_{$postData['append_model']}");
			$AppendModel = $this->returnModel($appendModel['table_name']);
			$postData['mid'] = $insertId;
			$status = $AppendModel->data($postData)->add();
			unset($AppendModel);
			if ($status) {
				//添加默认组
				$MemberGroupAccess = D('MemberGroupAccess');
				$status = $MemberGroupAccess->setAccess($postData['group'],$insertId);
				unset($MemberGroupAccess);
				if($status) {
					return true;
				}  else {
					$this->writeLog('系统出错，新增用户，添加默认用户组失败！SQL'.$MemberGroupAccess->getLastSql(), 'SYSTEM_ERROR');
					return false;
				}
			} else {
				$this->writeLog("系统出错，此IP注册失败，添加会员附加表失败，请检查可能的SQL".$this->getLastSql(), 'SYSTEM_ERROR');
				$this->where("id=$insertId")->delete();
				return false;
			}
		} else {
			$this->writeLog("系统出错，此IP注册失败，添加会员主表失败，请检查可能的SQL".$this->getLastSql(), 'SYSTEM_ERROR');
			return false;
		}
	}
	
	/**
	 * 编辑会员信息
	 * @param array $postData
	 * @param array $appendModel
	 * @return unknown|boolean
	 */
	public function editData($postData,$appendModel) {
		if (!empty($postData['password'])) {
			$postData['password'] = sha1(md5($postData['password']));
		} else {
			unset($postData['password']);
		}
		if ($this->data($postData)->save() !== false) {
			$AppendModel = $this->returnModel($appendModel['table_name']);
			$status = $AppendModel->where("mid={$postData['id']}")->save($postData);
			unset($AppendModel);
			//会员组
			if ($status !== false) {
				$MemberGroupAccess = D('MemberGroupAccess');
				$status = $MemberGroupAccess->setAccess($postData['group'],$postData['id']);
				unset($MemberGroupAccess);
			}
			return $status;
		} else {
			return false;
		}
	}
	
	
	/**
	 * 设置增加用户金额
	 * @param numeric $id
	 * @param numeric $money
	 * @param boolean $update_session
	 * @return boolean
	 */
	public function setMemberMoney($id,$money,$update_session = false) {
		$status = $this->where("id=$id")->setInc('money', $money);
		if ($status === false) {
			$this->writeLog("增加用户金额失败，用户ID{$id}", 'SYSTEM_ERROR');
			return false;
		} else {
			//如果是在线用户，并且及时更新
			if (GBehavior::$session && $update_session) {
				$_SESSION[C('MEMBER_SESSION')]['money'] = $_SESSION[C('MEMBER_SESSION')]['money']+$money;
			}
			return true;
		}
	}
	
	/**
	 * 设置用户消费金额
	 * @param numeric $id
	 * @param numeric $money
	 * @param boolean $update_session
	 * @return boolean
	 */
	public function setMemberSpent($id,$money,$update_session = false) {
		$status = $this->where("id=$id")->setInc('spent', $money);
		if ($status === false) {
			$this->writeLog("增加用户消费额失败，用户ID{$id}", 'SYSTEM_ERROR');
			return false;
		} else {
			//如果是在线用户，并且及时更新
			if (GBehavior::$session && $update_session) {
				$_SESSION[C('MEMBER_SESSION')]['spent'] = $_SESSION[C('MEMBER_SESSION')]['spent']+$money;
			}
			return true;
		}
	}
	/**
	 * 设置用户金额和消费额
	 * @param numeric $id
	 * @param numeric $money
	 * @param boolean $update_session
	 * @return boolean
	 */
	public function setMemberMoneyAndSpent($id,$money,$update_session = false) {
		$status = $this->query("UPDATE {$this->tablePrefix}{$this->tableName} SET money=money+$money,spent=spent+$money WHERE id=$id");
		if ($status === false) {
			$this->writeLog("增加用户金额和消费额失败，用户ID{$id}", 'SYSTEM_ERROR');
			return false;
		} else {
			//如果是在线用户，并且及时更新
			if (GBehavior::$session && $update_session) {
				$_SESSION[C('MEMBER_SESSION')]['money'] = $_SESSION[C('MEMBER_SESSION')]['money']+$money;
				$_SESSION[C('MEMBER_SESSION')]['spent'] = $_SESSION[C('MEMBER_SESSION')]['spent']+$money;
			}
			return true;
		}
	}
}
?>