<?php
/**
 * 会员组模型
 * @author CHENG
 *
 */
class MemberGroupModel extends GlobalModel {
	
	/**
	 * 数据验证
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkData() {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
				'title'=>array('s1-30','组角色名格式不正确！'),
				'remark'=>array('a|s1-255','备注格式不正确！'),
		), $postData);
	}
	
	/**
	 * 添加数据
	 * @param array $postData
	 * @return Ambigous <mixed, boolean, string, unknown, false, number>
	 */
	public function addData($postData) {
		return $this->data($postData)->add();
	}
	
	/**
	 * 编辑数据
	 * @param array $postData
	 * @return Ambigous <mixed, boolean, string, unknown, false, number>
	 */
	public function editData($postData) {
		return $this->where("id={$_POST['id']}")->save($postData);
	}
	
	/**
	 * 会员组权限设置
	 * @return Ambigous <boolean, false, number>
	 */
	public function setRule() {
		// 			写入数据库
		$status = $this->where("id={$_POST['id']}")->setField('rules',implode(',', $_POST['rule']));
		if ($status !== false) {
			$ruleId = implode(',', $_POST['rule']);
			$ruleData = $this->table($this->tablePrefix.'member_rule')->where("id IN($ruleId) AND status=1")->order('sort DESC')->getField('id,name,title,show_status,node_type,condition,append,pid,sort');
			//更新后台管理员规则列表
			F("member_rule_{$_POST['id']}",$ruleData);
			$status = true;
		}
		return $status;
	}
	
}
?>