<?php
/**
 * 链接模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class GuestbookModel extends GlobalModel {
	public function checkData($setting = array()){
		$postData = Tool::filterData($_POST);
		$postData['sort'] = $postData['sort'] > -1 ? $postData['sort'] : 0;
		return ValiData::_vail()->_check(array(
			'uname'=>array('s1-20','姓名格式不正确！'),
			'mobile'=>array('t','手机号码格式不正确!'),
			'email'=>array('e','电子邮箱格式不正确！'),
			'content'=>array('a|s1-1000','留言内容不正确！'),
			'sort'=>array('n1-8','排序格式不正确！'),
			'reply'=>array('a|s0-1000','留言回复内容不正确！'),
		), $postData);
	}
	
	public function addData($postData) {
		$postData['ip'] = CLIENT_IP;
		$IpLocation = new IpLocation();
		$postData['ipinfo']  = json_encode($IpLocation->getlocation(CLIENT_IP));
		unset($IpLocation);
		$postData['save_time'] = NOW_TIME;
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		 return $this->where("id={$postData['id']}")->data($postData)->save();
	}

	public function page() {
		$options = $this->resolveGET();
		$total = $this->count(1);
		$PAGE = new Page($total,$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->order('id DESC')->select();
		$pageData[] = $PAGE->show();
		return $pageData;
	}
}
?>