<?php
/**
 * URL规则模型处理
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class UrlRuleModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		// TODO Auto-generated method stub
		return ValiData::_vail()->_check(array(
			'url_name'=>array('s1-255','URL规则文件名格式不正确！！！'),
			'rule'=>array('s1-255','URL规则格式不正确！！！'),
			'example'=>array('a|s1-255','URL示例格式不正确！！！'),
		), $postData);
	}

	public function addData($postData,$setting = array()) {
		return $this->data($postData)->add();
	}

	public function editData($postData,$setting = array()) {
		return $this->data($postData)->save();
	}
	
	/**
	 * 获取附加变量参数值及标记
	 * @param array $urlRule
	 * @param array $data
	 * @return array
	 */
	public function getAppendVars($urlRule,$data) {
		$append_var = explode('|', trim($urlRule['append_var'],'|'));
		$appendData = array();
		foreach ($append_var as $value) {
			$tempArray = explode('=>', $value);
			$appendData['mark'][] = $tempArray[1];
			$appendData['data'][] = $data[$tempArray[0]];
		}
		return $appendData;
	}
	
	/**
	 * 获取附加变量参数值及字段
	 * @param array $urlRule
	 * @param array $data
	 * @return array
	 */
	public function getAppendVarsAndValues($urlRule,$data) {
		$append_var = explode('|', trim($urlRule['append_var'],'|'));
		$valueArray = array();
		foreach ($append_var as $value) {
			$tempArray = explode('=>', $value);
			$valueArray[$tempArray[0]] = $data[$tempArray[0]];
		}
		return $valueArray;
	}
	
}
?>