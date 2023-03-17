<?php
/**
 * 内容类型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class ContentTypeModel extends GlobalModel {
	
	/* 数据验证 */
	public function checkData() {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'model_id'=>array('n1-8','内容模型ID格式不正确！'),
			'type_name'=>array('s1-30','类型名称格式不正确！'),
		), $postData);
	}
	
	/* 类型分页 */
	public function typePage() {
		$options = $this->resolveGET(array('type_name','model_id'));
		$options['where'] = '1=1'.$options['where'];
		$total = $this->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__.'?page={PAGE}'.$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->table($this->tablePrefix.'content_type AS t')->join($this->tablePrefix.'models AS m ON m.id=t.model_id')->field('t.*,m.model_name')->select();
		$pageData[] = $Page->show();
		return $pageData;
	}
	
	public function addData($postData) {
		$insert = $this->data($postData)->add();
		return $insert;
	}
	
	public function editData($postData) {
		return $this->data($postData)->save();
	}
}
?>