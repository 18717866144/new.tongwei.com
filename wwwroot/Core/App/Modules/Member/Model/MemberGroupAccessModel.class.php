<?php
/**
 * 会员组和组关系模型 
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class MemberGroupAccessModel extends GlobalModel {
	
	/**
	 * 设置会员和组的关联性
	 * @param array $groupArray
	 * @param numeric $memberId
	 */
	public function setAccess($groupArray,$memberId) {
		//删除旧数据，可能有些lumang
		$this->where("uid=$memberId")->delete();
		$accessArray = array();
		$i = 0;
		foreach ($groupArray as $groupVal) {
			$accessArray[$i]['uid'] = $memberId;
			$accessArray[$i]['group_id'] = $groupVal;
			$i++;
		}
		$status = $this->addAll($accessArray);
		if (!$status) {
			$this->writeLog("写入会员和会员关联组失败，会员用户ID:{$memberId}", 'SYSTEM_ERROR');
		}
		return $status;
	}
	/**
	 * 查找会员所属组
	 * @param string $id
	 * @return Ambigous <mixed, NULL, multitype:Ambigous <unknown, string> unknown , unknown, multitype:>
	 */
	public function findMemberGroup($id = '') {
		$id = empty($id) ? $_SESSION[C('MEMBER_SESSION')]['id'] : $id;
		return $this->where("uid=$id")->getField('group_id',true);
	}
	
	/**
	 * 取得当前管理员的所有权限
	 * @return Ambigous <multitype:, mixed, number, boolean, string>
	 */
	public function findCurrentMemberRule() {
		$groupArray = $this->findMemberGroup();
		$ruleData = array();
		// 		该用户的所有权限
		foreach ($groupArray as $groupVal) {
			$data = F("member_rule_$groupVal");
			if (!$data) continue;
			$ruleData += $data;
		}
		return $ruleData;
	}

	
}
?>