<?php
/**
 * 会员初始化扩展行为
 * 注意：此行为扩制器中不可使用GBehavior中的怕有常量和其它数据，因为加载优先级问题
 * @author CHENG
 *
 */
class Member_initBehavior extends Behavior {
	/* (non-PHPdoc)
	 * @see Behavior::run()
	 */
	public function run(&$params) {
		//验证登录
		$params['check_login'] = $this->checkLogin();
		//验证节点规则
		$params['check_rule'] = $this->checkRule();
		//用户组规则列表
		$params['rule'] = $this->getCurrentRule();
	}

	// 	验证规则
	private function checkRule() {
		//公共权限
		if (GROUP_NAME == 'Member' && MODULE_NAME == 'Public') {
			return true;
		} else {
			//不可使用DB_PREFIX，常量在此处未定义
			$prefix = C('DB_PREFIX');
			//验证权限
			C('AUTH_CONFIG.AUTH_GROUP',$prefix.'member_group');
			C('AUTH_CONFIG.AUTH_GROUP_ACCESS',$prefix.'member_group_access');
			C('AUTH_CONFIG.AUTH_RULE',$prefix.'member_rule');
			C('AUTH_CONFIG.AUTH_USER',$prefix.'member');
			$Auth = new Auth();
			$ruleUrl = GROUP_NAME.'/'.MODULE_NAME.'/'.ACTION_NAME;
			return $Auth->check(APP_NAME.'/'.$ruleUrl, $_SESSION[C('MEMBER_SESSION')]['id']) ? $ruleUrl : false;
		}
	}
	
	// 	验证会员是否存在，SESSION丢失读COOKIE重新生成
	protected function checkLogin() {
		$memberSession = session(C('MEMBER_SESSION'));
		if ($memberSession) return array(true);
		//session不存在 ，读取cookie
		$cookieArray = cookie(C('MEMBER_COOKIE'));
		if (!$cookieArray) return array(false,'请先登录本站后，再进行操作！');
		$cookieArray = unserialize(Base64::decrypt($cookieArray));
		$newToken = Tool::encrypt($cookieArray['id']);
		$Member = D('Member/Member');
		if ($newToken !== $cookieArray['token']) {
			$Member->writeLog("此用户COOKIE加密值比对失败，可能操作为恶意修改测试，用户id{$cookieArray['id']}", 'USER_ERROR');
			return array(false,'非法数据值，被拒绝！');
		}
		$userData = $Member->getMember($cookieArray['id'],'id');
		$Member->saveSuccessUser($userData);
		unset($Member);
		return array(true);
	}
	
	// 	设置用户组规则列表
	private function  getCurrentRule() {
		//取出用户组
		$MemberGroupAccess = D('Member/MemberGroupAccess');
		$ruleData = $MemberGroupAccess->findCurrentMemberRule();
		// 		取出当前操作规则及同级规则
		$ruleArray = array();
		foreach ($ruleData as $values) {
			if ($values['show_status'] != 1) continue;
			$urlRule = explode('/', $values['name']);
			if ($urlRule[1] === GROUP_NAME && $urlRule[2] === MODULE_NAME) {
				$values['name'] = str_replace(APP_NAME.'/', '', $values['name']);
				$ruleArray['current_rule'][] = $values;
				if ($values['node_type'] == 2) {
					$ruleArray['link'][] = $values;
				}elseif ($values['node_type'] == 3) {
					$ruleArray['operation'][] = $urlRule[3];
				} elseif ($values['node_type'] == 1) {//引导类型，（其实是父级）
					$ruleArray['guide'][] = $urlRule[2];
				}
				if ($values['node_type'] == 4 || $values['node_type'] == 3) {
					$ruleArray['other'][] = $urlRule[3];
				}
			}
		}
		unset($MemberGroupAccess,$ruleData);
		return $ruleArray;
	}
}
?>