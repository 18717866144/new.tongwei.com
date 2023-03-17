<?php
/**
 * 会员模块公共数据处理
 * @author hanx
 *
 */
 
class PublicAction extends GlobalAction {
	const APP_KEY = 'e89466d3d3f0eb2715d8a4ca';
    const APP_SECRET = '235HJaeQ60kJ8mJ7DB50bsXVKJXx1CKl';
    protected $getCodeUrl = 'http://passport.tongwei.cn/Index/index';
    protected $getTokenUrl = 'http://passport.tongwei.cn/ApiOauth/getAccessToken';
	protected $getUserInfoUrl = 'http://passport.tongwei.cn/ApiOauthUser/getUserInfo';
	
	
	//原社区的通行证登录的方式
	public function login(){
	
		$url = $_GET['go'] ? $_GET['go'] : $_SERVER["HTTP_REFERER"];
		$url = RemoveXSS($url);
		$url = $url ? $url : 'http://v.tongwei.cn';

		$callback = sprintf('http://%s'.U('member/public/callback'), $_SERVER['HTTP_HOST']);

		//生成唯一随机串防CSRF攻击
		$state = sha1(md5(NOW_TIME));		
		session('state',$state);
		cookie('gourl',$url);
		$params = array();
		$params['app_key'] = self::APP_KEY;
		$params['redirect_uri'] = urlencode($callback);
		$params['response_type'] = 'code';
		$params['scope'] = 'basic';
		$params['state'] = $state;
		$code_url = sprintf('%s?%s', $this->getCodeUrl, http_build_query($params));
		redirect($code_url);
	}
	
	public function register(){
		redirect('http://passport.tongwei.cn/Index/signUp.html');
	}
	
	public function logout(){
		$_SESSION[C('MEMBER_SESSION')]['uid'] = $_SESSION[C('MEMBER_SESSION')]['username'] = $_SESSION[C('MEMBER_SESSION')]['mobile'] = NULL;
		redirect('http://www.tongwei.cn/member.php?mod=logging&action=logout');
		//redirect('http://passport.tongwei.cn/Index/signOut.html');
	}
	
	public function callback(){
		$code = $_GET['code'];
        //--------验证state防止CSRF攻击
        if ($_GET['state'] != session('state')) {
			exit;
			//exit('<h2>The state does not match. You may be a victim of CSRF.</h2>');
        }
		
        $keysArr = array(
            "grant_type" => "authorization_code",
            "app_key" => self::APP_KEY,
            "redirect_uri" => urlencode(sprintf('http://%s'.U('member/public/callback'), $_SERVER['HTTP_HOST'])),
            "app_secret" => self::APP_SECRET,
            "code" => $code
        );

        //构造请求access_token的url
        $token_url = sprintf('%s?%s', $this->getTokenUrl, http_build_query($keysArr));
        $response = json_decode(file_get_contents($token_url));		
        $result = array();
        if (isset($response->error)) {
			$this->error($response->error.$response->error_description);
        } else {
            $getUserInfoUrl = sprintf('%s/access_token/%s', $this->getUserInfoUrl, $response->access_token);
            $user = file_get_contents($getUserInfoUrl);
			$user = json_decode($user,1);
			$url = cookie('gourl');
			$url = $url ? $url : 'http://v.tongwei.cn';
			$_SESSION[C('MEMBER_SESSION')]['uid'] = $user['bbs_uid'];
			$_SESSION[C('MEMBER_SESSION')]['username'] = $user['username'];
			$_SESSION[C('MEMBER_SESSION')]['mobile'] = $user['mobile'];
			$_SESSION[C('MEMBER_SESSION')]['avatar'] = $user['avatar'];
			
			if($user && $user['id']){				
				redirect($url);
			}else{
				$this->error('帐户状态异常，请联系管理员');				
			}
        }
	}
}
?>