<?php
/**
 * 会员行为模型数据处理
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class ActionModel extends GlobalModel {
	
	/**
	 * 数据验证
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkData() {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'name'=>array('r/[\w]{1,30}/','行为标识格式不正确！'),
			'title'=>array('s1-80','行为说明格式不正确！'),
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
	
	/**
	 * 添加数据
	 * @param array $postData
	 */
	public function addData($postData) {
		$postData['save_time'] = NOW_TIME;
		$insertId =  $this->data($postData)->add();
		if($insertId) $postData['id'] = $insertId;
		//更新缓存
		$this->updateCache($postData);
		return $insertId;
	}
	
	/**
	 * 编辑数据
	 * @param array $postData
	 */
	public function editData($postData) {
		$postData['save_time'] = NOW_TIME;
		$status = $this->data($postData)->save();
		//更新缓存 
		if($status !== false) $this->updateCache($postData);
		return $status;
	}
	
	/**
	 * 行为分页
	 * @return multitype:NULL Ambigous <string, mixed>
	 */
	public function actionPage() {
		$total = $this->count(1);
		$Page = new Page($total);
		$pageData = array();
		$pageData[] = $this->order('id DESC')->limit($Page->limit())->field('id,name,title,remark,type,a_status')->select();
		$pageData[] = $Page->show();
		return $pageData;
	}
	
	/**
	 * 行为日志分页
	 * @return multitype:NULL Ambigous <string, mixed>
	 */
	public function logPage() {
		$total = $this->count(1);
		$Page = new Page($total);
		$pageData = array();
		//获取用户主模型
		$model_id = C('MEMBER_MAIN_MODEL');
		if ($model_id) {
			$models = F("models_$model_id");
			$member_table = $models['table_name'];
		} else {
			$member_table = 'member';//默认为member
		}
		$pageData[] = $this->table($this->tablePrefix.'action_log AS al')->join($this->tablePrefix.'action AS a ON a.id=al.action_id')->join($this->tablePrefix.$member_table.' AS m ON m.id=al.user_id')->limit($Page->limit())->order('al.id DESC')->field('m.username,a.title,a.name,al.*')->select();
		$pageData[] = $Page->show();
		return $pageData;
	}
	
	/**
	 * 日志详情
	 * @param numeric $id
	 * @return Ambigous <multitype:, NULL, string>
	 */
	public function logDetail($id) {
		$model_id = C('MEMBER_MAIN_MODEL');
		if ($model_id) {
			$models = F("models_$model_id");
			$member_table = $models['table_name'];
		} else {
			$member_table = 'member';//默认为member
		}
		$data = $this->table($this->tablePrefix.'action_log AS al')->join($this->tablePrefix.'action_log_data AS ald ON ald.acid=al.id')->join($this->tablePrefix.'action AS a ON a.id=al.action_id')->join($this->tablePrefix.$member_table.' AS m ON m.id=al.user_id')->order('al.id DESC')->field('m.username,a.title,a.name,al.*,ald.*')->find();
		if ($data) {
			$data['ip'] = long2ip($data['ip']);
			$IpLocation = new IpLocation();
			$data['ip_location'] = $IpLocation->getlocation($data['ip']);
		}
		return $data;
	}
	
	/**
	 * 读取一条数据
	 * @param numeric|string $value
	 * @param string $isCache
	 * @return Ambigous <boolean, array>|Ambigous <boolean, mixed, NULL, multitype:, unknown, string>|Ambigous <mixed, boolean, NULL, multitype:, unknown, string>
	 */
	public function findOneData($value,$isCache = true) {
		if ($isCache) {
			//读取缓存
			$action = (array)S('action');
			if (isset($action[$value]) && !empty($action[$value])) {
				return $action[$value]['a_status']==1 ? $action[$value] : false;
			}
			//读取新数据
			$data = $this->where("name='$value'")->find();
			//缓存，不判断状态
			$this->updateCache($data);
			
			return $data['a_status']==1 ? $data : false;
		} else {
			//非缓存直接通过 ID查寻最新数据
			return $this->where("id='$value'")->find();
		}
	}
	

	/**
	 * 更新缓存
	 * @param array $postData
	 */
	public function updateCache($data) {
		$action = (array)S('action');
		$action[$data['name']] = $data;
		S('action',$action,86400*360);
	}
	
	public function actionTypePage($action) {
		
	}
	
}
?>