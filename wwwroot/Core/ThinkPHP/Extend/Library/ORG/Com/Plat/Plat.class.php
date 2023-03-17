<?php
/**
 * 游戏平台
 * @author Administrator
 */
abstract class Plat {
	protected $gameKey;//游戏键
	protected $gameSite;//游戏站点
	protected $rundStr = 'abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789';	//随机因子
	/**
	 * 进入游戏
	 * @param Array $userData 用户数组
	 * @param Array $serverData 服务器数组
	 */
	abstract protected function goGame(array $userData,array $serverData);
	/**
	 * 领取卡包
	 * @param Array $userData 用户数组
	 * @param Array $serverData 服务器数组  必须包含游戏ID
	 * @param string|numeric $card_type 卡包类型
	 */
	abstract protected function card(array $userData,array $serverData,$card_type);
	/**
	 * 判断角色是否激活
	 * @param Array $userData 用户数组
	 * @param Array $serverData 服务器数组
	 */
	abstract protected function isActivation(array $userData,array $serverData);
	/**
	 * 游戏支付
	 * @param Array $payData  支付数组
	 * @param Array $serverData 服务器数组
	 */
	abstract protected function pay(array $payData,array $serverData);
	
	/**
	 * 返回结果集
	 * @param boolean|numeric $status
	 * @param mixed $data
	 * @param string $info
	 */
	protected function returnResult($status,$data = '',$info = '') {
		$status = $status ? 'success' : 'error';
		return array('status'=>$status,'info'=>$info,'data'=>$data);
	}
	
	/**
	 * 选择平台
	 * @param string $url
	 */
	public static function selectPlat($server_url) {
		$className = "Plat{$server_url}";
		import('ORG.Com.Plat.'.$className);
		return new $className();
	}
}
?>