<?php
/**
 * 9511游戏平台登录
 * @author CHENG
 *
 */
class Plat9511 extends Plat {
	protected $gameSite = '251';
	protected $gameKey = 'cc2c91103cdfd5c063d21fef60b5ff36';
	/* (non-PHPdoc)
	 * @see Plat::goGame()
	 */
	public function goGame(array $userData, array $serverData) {
		//生成签名方式
		$sign = strtolower(md5($this->gameSite.$userData['id'].$serverData['server_id'].NOW_TIME.$this->gameKey));
		//解析url参数
		$http_bulid_array = array(
			'api_id'=>$this->gameSite,
			'server_id'=>$serverData['server_id'],
			'player_name'=>$userData['id'],
			'sign'=>$sign,
			'ip'=>$_SERVER['SERVER_ADDR'],
			'time'=>NOW_TIME
		);
		//生成完整URL
		$url = 'http://mix.9511.com/api/login?'.http_build_query($http_bulid_array);
		$content = json_decode(Tool::remoteUrl($url),true);
		if (isset($content['err'])) {
			$Model = new GlobalModel();
			$Model->writeLog("进入游戏失败，错误编号：{$content['err']}，错误信息：{$content['msg']}，用户ID：{$userData['id']}，本地服务器ID：{$serverData['id']}，远程服务器ID：{$userData['server_id']}", 'SYSTEM_ERROR');
			return $this->returnResult(false,'','服务器配置出错！');
		} else {
			return $this->returnResult(true,$content['url']);
		}
	}

	/* (non-PHPdoc)
	 * @see Plat::noviceCard()
	 */
	public function card(array $userData, array $serverData,$card_type) {
		$sign = strtolower(md5($this->gameSite.$userData['id'].$serverData['server_id'].NOW_TIME.$this->gameKey));
		$http_build_query = array(
				'api_id'=>$this->gameSite,
				'server_id'=>$serverData['server_id'],
				'player_name'=>$userData['id'],
				'sign'=>$sign,
				'ip'=>$_SERVER['SERVER_ADDR'],
				'time'=>NOW_TIME,
				'card_type_id'=>$card_type,
		);
		$url = 'http://mix.9511.com/api/card?'.http_build_query($http_build_query);
		$content = json_decode(Tool::remoteUrl($url),true);
		if (isset($content['err'])) {
			$Model = new GlobalModel();
			$Model->writeLog("领卡失败，错误编号：{$content['err']}，错误信息：{$content['msg']}，用户ID：{$userData['id']}，本地服务器ID：{$serverData['id']}，远程服务器ID：{$userData['server_id']}，卡类型：{$card_type}", 'SYSTEM_ERROR');
			return $this->returnResult(false,'',$content['msg'] ? $content['msg'] : '服务器出错，未能成功领取新手卡！');
		} else {
			return $this->returnResult(true,$content['card_no']);
		}
	}

	/* (non-PHPdoc)
	 * @see Plat::isActivation()
	 */
	public function isActivation(array $userData, array $serverData) {
		$sign= strtolower(md5($this->gameSite.$userData['id'].$serverData['server_id'].NOW_TIME.$this->gameKey));
		$http_build_query = array(
				'api_id'=>$this->gameSite,
				'server_id'=>$serverData['server_id'],
				'player_name'=>$userData['id'],
				'sign'=>$sign,
				'time'=>NOW_TIME,
		);
		$url = 'http://mix.9511.com/api/userinfo?'.http_build_query($http_build_query);
		$content = json_decode(Tool::remoteUrl($url),true);
		if (isset($content['err'])) {
			$Model = new GlobalModel();
			$Model->writeLog("查看用户角色失败，错误编号：{$content['err']}，错误信息：{$content['msg']}，用户ID：{$userData['id']}，本地服务器ID：{$serverData['id']}，远程服务器ID：{$userData['server_id']}", 'SYSTEM_ERROR');
			return $this->returnResult(false,'',$content['msg'] ? $content['msg'] : '角色不存在！');
		} else {
 			//{"success":true,"count":"0","info":"null"}
			//{"success":true,"count":1,"info":[{"name":"欧阳薇静","level":"1","job":"战士"}]}
			if ($content['count'] >= 1) {
				return $this->returnResult(true,$content['info']);
			} else {
				return $this->returnResult(false,$content['info'],'角色不存在！');
			}
		}
	}

	/* (non-PHPdoc)
	 * @see Plat::pay()
	 */
	protected function pay(array $payData, array $serverData) {
		// TODO Auto-generated method stub
		
	}

	public function repay($order_id) {
		$sign = strtolower(md5($this->gameSite.$order_id.NOW_TIME.$this->gameKey));
		$http_bulid_array = array(
				'api_id'=>$this->gameSite,
				'order_no'=>$order_id,
				'time'=>NOW_TIME,
				'sign'=>$sign,
		);
		$url = 'http://mix.9511.com/api/repay?'.http_build_query($http_bulid_array);
		$content = json_decode(Tool::remoteUrl($url),true); 
// 		{"err":10003,"msg":"加密字串异常","detail":[]}
// 		{"success":true,"status":1,"messages":"充值成功！"}
		if (isset($content['err'])) {
			$Model = new GlobalModel();
			$Model->writeLog("补单失败，错误编号：{$content['err']}，错误信息：{$content['msg']}，定单号：{$order_id}", 'SYSTEM_ERROR');
			return $this->returnResult(false,'',$content['msg'] ? $content['msg'] : '补单失败，请查看错误日志！');
		} else {//success
			if ($content['status'] == 1) {
				return $this->returnResult(true);
			} else {
				$Model = new GlobalModel();
				$Model->writeLog("补单失败，参数请求成功状态SUCCESS，补单结果：{$content['status']}，错误编号：{$content['err']}，错误信息：{$content['msg']}，定单号：{$order_id}", 'SYSTEM_ERROR');
				return $this->returnResult(false,'',$content['msg'] ? $content['msg'] : '补单失败，请查看错误日志！');
			}
		}
	}
}
?>