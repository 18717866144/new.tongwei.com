<?php
/**
 * 系统全局扩展行为
 * 预计下次废除
 *
 */
class GBehavior extends Behavior {
	public static $session = null;
	public function run(&$params) {
		//会员状态
		$this->checkUser();
	}

	/* 网站所有用户判断，前台，后台，未登录 */
	private function checkUser() {
		//后台管理员
		if (isset($_SESSION[C('ADMIN_SESSION')]) && !empty($_SESSION[C('ADMIN_SESSION')])) {
			self::$session = $_SESSION[C('ADMIN_SESSION')];
			$sessionType = 1;
			//是否是超管
			define('SUPER_ADMIN',isset($_SESSION[C('SUPER_ADMIN')]) && !empty($_SESSION[C('SUPER_ADMIN')]) ? true :false);
			/* 后台不缓存配置 */
			C('DB_SQL_BUILD_CACHE',false);//不创建Sql查询缓存
		}
		//前台会员 
		elseif (isset($_SESSION[C('MEMBER_SESSION')]) && !empty($_SESSION[C('MEMBER_SESSION')])) {
			self::$session = $_SESSION[C('MEMBER_SESSION')];
			$sessionType = 2;
		}
		//未登录模式 
		else {
			$sessionType = 0;
			self::$session = null;
		}
		//会员SESSION类型
		define('SESSION_TYPE',$sessionType);
	}
}
?>