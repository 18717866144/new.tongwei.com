<?php
/**
 * 会员模型处理行为
 * @author CHENG
 *
 */
class ModelActionModel extends GlobalModel {
	
	
	public function checkData() {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'name'=>array('r/[\w]{1,30}/','行为标识格式不正确！'),
			'remark'=>array('a|s1-150','行为描述格式不正确！'),
		), $postData);
	}
	
	/**
	 * 验证行为标识是否惟一
	 * @param string $mark
	 * @param number $id
	 */
	public function checkActionMark($mark,$id = 0) {
		$where = empty($id) ? '' : " AND id<>$id";
		return $this->where("name='$mark' $where")->find();
	}
	
	public function actionPage() {
		$total = $this->count(1);
		$Page = new Page($total);
		$pageData = array();
		$pageData[] = $this->limit($Page->limit())->order('id DESC')->select();
		$pageData[] = $Page->show();
		return $pageData;
	}
	
	public function addData($postData) {
		$postData['save_time'] = NOW_TIME;
		$insertId = $this->data($postData)->add();
		if ($insertId) {
			$postData['id'] = $insertId;
			$this->updateCache($postData);
		}
		return $insertId;
	}
	
	public function editData($postData) {
		$postData['save_time'] = NOW_TIME;
		$status = $this->data($postData)->save();
		if($status !== false ) {
			$this->updateCache($postData);
		}
		return $status;
	}
	
	/**
	 * 读取一条数据
	 * @param string|numeric $value
	 * @param string $isCache  当开启读取缓存时必须以name值查找，否则以id值查找
	 * @return array|Ambigous <mixed, boolean, NULL, multitype:, unknown, string>
	 */
	public function findOneData($value,$isCache = true) {
		if ($isCache) {
			//读取缓存
			$ModelAction = (array)S('member_model_action');
			if (isset($ModelAction[$value]) && !empty($ModelAction[$value])) {
				return $ModelAction[$value]['m_status']==1 ? $ModelAction[$value] : false;
			}
			//读取新数据
			$data = $this->where("name='$value'")->find();
			//缓存，不判断状态
			$this->updateCache($data);
			
			return $data['m_status']==1 ? $data : false;
		} else {
			return  $this->where("id='$value'")->find();
		}
	}
	
	/**
	 * 更新缓存数据
	 * @param array $data
	 */
	public function updateCache($data) {
		$action = (array)S('member_model_action');
		$action[$data['name']] = $data;
		S('member_model_action',$action,86400*360);
	}
}
?>