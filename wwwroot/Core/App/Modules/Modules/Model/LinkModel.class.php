<?php
/**
 * 链接模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class LinkModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'web_name'=>array('s1-30','网站名称不正确！'),
			'web_url'=>array('u&s1-100','网站URL格式不正确!'),
			'username'=>array('a|s1-10','联系人格式不正确！'),
			'qq'=>array('a|q','联系QQ格式不正确！'),
			'sort'=>array('n1-8','排序格式不正确！'),
			'remark'=>array('a|s1-255','备注格式不正确！'),
		), $postData);
	}

	public function addData($postData) {
		$postData['save_time'] = NOW_TIME;
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		 return $this->where("id={$postData['id']}")->data($postData)->save();
	}

	public function page() {
		$options = $this->resolveGET(array('type_id','link_pos','l_status','web_name'));
		$total = $this->count(1);
		$Page = new Page($total,'?page={PAGE}&'.$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->limit($Page->limit())->order('sort DESC')->select();
		$pageData[] = $Page->show();
		return $pageData;
	}
}

class LinkTypeModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'type_name'=>array('s1-30','类别名称不正确！'),
			'sort'=>array('n1-8','排序格式不正确！'),
		), $postData);
	}

	public function addData($postData) {
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		return $this->data($postData)->save();
	}

	public function page() {
		$options = $this->resolveGET(array('id','type_name','sort'));
		$total = $this->count(1);
		$Page = new Page($total,'?page={PAGE}&'.$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->limit($Page->limit())->order('sort DESC')->select();
		$pageData[] = $Page->show();
		return $pageData;
	}	
}

?>