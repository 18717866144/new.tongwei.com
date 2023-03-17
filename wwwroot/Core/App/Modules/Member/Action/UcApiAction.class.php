<?php

/**
 * User: Cc <773177836@qq.com>
 * Date: 2017/3/20 9:52
 */
class UcApiAction extends Action
{
	
	protected $uid=0;
	protected $pwd='';
	protected $prefix='';
	public function _initialize() {
		
		
		$cookie_pre=$cookie_path=$cookie_domain=$authkey='';
		include './UcApi/config.inc.php';
		include './UcApi/uc_client/client.php';
		$this->prefix=$prefix=$cookie_pre.substr(md5($cookie_path.'|'.$cookie_domain),0,4).'_';
		if(!empty($_COOKIE[$prefix.'auth'])&&!empty($_COOKIE[$prefix.'saltkey'])) {
			list($this->pwd,$this->uid)=explode("\t", uc_authcode($_COOKIE[$prefix.'auth'],'DECODE',md5($authkey.$_COOKIE[$prefix.'saltkey'])));
		}
		
		
	}

	public function onLogin(){
		$synlogin='';
		if($this->pwd&&$this->uid){
			$user=uc_get_user($this->uid,1);
			if($user){
				$_SESSION[C('MEMBER_SESSION')]['uid'] = $this->uid;
				$_SESSION[C('MEMBER_SESSION')]['username'] =$user[1];
				$_SESSION[C('MEMBER_SESSION')]['mobile'] = isset($user[3])?$user[3]:'';
				$_SESSION[C('MEMBER_SESSION')]['avatar'] = "http://www.tongwei.cn/uc_server/avatar.php?uid={$this->uid}&size=small";
				//$synlogin=uc_user_synlogin($this->uid);
			}
		}
		return $synlogin;
	}
	public function syncLogin(){
		if(empty($_COOKIE[$this->prefix.'auth'])&&isset($_SESSION[C('MEMBER_SESSION')]['uid'])){
			return $_SESSION[C('MEMBER_SESSION')]['uid']>0?uc_user_synlogin($_SESSION[C('MEMBER_SESSION')]['uid']):'';
		}
	}
	
	
}