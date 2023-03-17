<?php
/**
 * 链接模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class SlideModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			
		), $postData);
	}

	public function addData($postData) {		
		$pics = explode('|',$postData['picurl']);
		$postData['picurl'] = $pics[0];
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		$pics = explode('|',$postData['picurl']);
		$postData['picurl'] = $pics[0];
		return $this->where("id={$postData['id']}")->data($postData)->save();
	}

	public function page() {
		$options = $this->resolveGET(array('title','picurl','l_status','url','sort','type_id'));		
		$total = $this->count(1);
		$PAGE = new Page($total,$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->order('sort desc,id desc')->select();
		$pageData[] = $PAGE->show();
		return $pageData;
	}
}

class slideTypeModel extends GlobalModel {
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
		$options = $this->resolveGET(array('id','type_name','sort','remark'));
		$total = $this->count(1);
		$Page = new Page($total,'?page={PAGE}&'.$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->limit($Page->limit())->order('sort DESC')->select();
		$pageData[] = $Page->show();
		return $pageData;
	}	
}

?>