<?php

class PaperLayoutModel extends GlobalModel {
	
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'layout_number'=>array('s1-30','刊物名称不正确！'),
			/*'layout_title'=>array('s1-30','刊物名称不正确！'),*/
			/* 'description'=>array('a|s0-255','刊物简介格式不正确！'), */
		), $postData);
	}
	
	public function saveData($postData){
		$pid = $postData['pid'];
		$id = $postData['id'];
		$_tmp = explode('|',$postData['thumbnail']);
		$postData['thumbnail'] = $_tmp[0];
		unset($postData['id']);
		if($id){
			$status = $this->where( array('id' => $id) )->data($postData)->save();
		}else{
			$status = $this->data($postData)->add();
		}		
		return $status;
	}	
}
?>