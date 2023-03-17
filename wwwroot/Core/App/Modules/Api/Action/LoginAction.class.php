<?php
/**
 * Api登录Action
 * @author CHENG
 *
 */
class LoginAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('ApiLogin');
	}
	
	//登录地址
	public function login(){
		$params = $this->checkData(array('type','callback'),'',false);
		(!$this->model->LoginApiKeyAndID($params['type'],$params['callback'])) &&  $this->error('未找到此登录方式！');
		//加载ThinkOauth类并实例化一个对象
		import("ORG.ThinkSDK.ThinkOauth");
		$sns  = ThinkOauth::getInstance($params['type']);
		//跳转到授权页面
		redirect($sns->getRequestCodeURL());
	}
	
	//授权回调地址
	public function callback(){
		$params = $this->checkData(array('type','code'));
		$type = $params['type'];
		$code = $params['code'];
		//基本登录判断
		(empty($type) || empty($code)) && $this->error('参数错误');
		$apiData = $this->model->LoginApiKeyAndID($type);
		(!$apiData) &&  $this->error('未找到此登录方式！');
		//获取Token信息
		$token = $this->model->getSnsToken($type,$code);
		//获取当前登录用户信息
		if(is_array($token)){
			$userinfo = $this->model->$type($token);
			$userinfo['api_type_num'] = $apiData['id'];
			//授权失败返回信息
			if (isset($userinfo['login_status']) && $userinfo['login_status'] == false) {
				$this->error($userinfo['info']);
			}
			//如果已经登录过，并且注册成为本站正式用户，直接获取此用户信息，否则注册至本站
			$a_key = sha1(json_encode($token).$userinfo['api_type_num']);
			$userData = $this->model->findOneApiInfo(array('al.a_key'=>$a_key));
			//已登录并且已注册至本站正式会员
			if ($userData && !empty($userData['userid'])) {//读取用户信息并跳转至用户中心
				$Member = D('Member/Member');
				$userData = $Member->getMember($userData['userid']);
				//登录送积分，送Money
				Actions::addActionsLog('login_points', 'member', $userData['id'], $userData['id']);
				Actions::addActionsLog('login_money', 'member', $userData['id'], $userData['id']);
				//修改登录后的信息如，登录时间，ip
				$userData = $Member->saveLoginInfo($userData);
				//保存用户
				$Member->saveSuccessUser($userData,$_POST['save']);
				//写入日志
				$Member->handleLoginSuccess($userData,2);
				$this->success('登录成功！',U("Member/Index/index",array(),true,false,true));
			} else {
				//已经使用Api登录过，但未注册
				if ($userData) {
					$userinfo = $userData;
					$userinfo['sns_id'] = $userData['id'];
				} else {//未登录，未注册
					$insertId = $this->model->addData($userinfo,$token);
					if (!$insertId) {
						$this->error('SNS登录出错！');
					}
					$userinfo['sns_id'] = $insertId;
				}
				//生成sns登录token
				$userinfo['sns_token'] = Tool::encrypt($userinfo['sns_id']);
				session('api_sns_login',$userinfo);
				$this->success('SNS登录成功！',U('Member/Entrance/register'));
			}
		} else {
			$this->error('未能成功获取参数！');
		}
	}
	
}
?>