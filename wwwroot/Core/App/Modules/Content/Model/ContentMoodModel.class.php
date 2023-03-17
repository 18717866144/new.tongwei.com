<?php
/**
 * 内容观后心情
 * @author CHENG
 *
 */
class ContentMoodModel extends GlobalModel {
	
	/**
	 * 查找出一条内容心情
	 * @param array|numeric|string $values
	 * @param string $type
	 */
	public function findOneMood($values,$type = 'aid') {
		if ($type == 'aid') {
			return $this->where("aid={$values['aid']} AND cid='{$values['cid']}' AND mid='{$values['mid']}'")->find();
		} else {
			return $this->where("id='{$values}'")->find();
		}
	}
	
	/**
	 * 添加数据
	 * @param array $postData
	 * @return boolean|multitype:boolean string |Ambigous <mixed, boolean, string, unknown, false, number>
	 */
	public function addData($postData) {
		//缓存判断
		if (!$this->_cache($postData)) {
			return array(false,'亲，你已经表达过心情了哦，保持平常心有益身体健康！');
		}
		$postData['aid'] = intval($postData['aid']);
		$postData['cid'] = intval($postData['cid']);
		$navigate = F('Navigate');
		$postData['mid'] = $navigate[$postData['cid']]['mid'];
		$postData['save_time'] = NOW_TIME;
		$postData['m'.$postData['mood_type']] = 1;
		$postData['total'] = 1;
		$insertId = $this->data($postData)->add();
		if(!$insertId) {
			$this->writeLog("添加心情评论失败，可能原因此内容ID的心情评论已存在！", 'SYSTEM_ERROR');
			return false;
		}
		return $insertId;
	}
	
	/**
	 * 编辑数据
	 * @param array $postData
	 * @return boolean|multitype:boolean string |Ambigous <string, multitype:string , number>
	 */
	public function editData($postData) {
		//缓存判断
		if (!$this->_cache($postData)) {
			return array(false,'亲，你已经表达过心情了哦，保持平常心有益身体健康！');
		}
		$mood_type = 'm'.$postData['mood_type'];
		$data[$mood_type] = array('exp',$mood_type.'+1');
		$data['total'] = array('exp','total+1');
		$data['id'] = intval($postData['mood_id']);
		$status = $this->data($data)->save();
		if (!$status) {
			$this->writeLog("修改心情评论失败！", 'SYSTEM_ERROR');
			return false;
		}
		return $data['id'];
	}
	
	/**
	 * 心情缓存
	 * @param unknown $data
	 * @return boolean
	 */
	private function _cache($data) {
		$cacheName = "mood_{$data['aid']}_{$data['cid']}";
		$cache_time = 3600;//缓存1小时
		//判断cookie
		$cookieValue = cookie($cacheName);
		if ($cookieValue) {
			return false;
		}
		//生成cookie
		cookie($cacheName,1,$cache_time);
		//缓存服务器
		$cache = (array)S('mood_cache');
		if (isset($cache[CLIENT_IP][$cacheName]) && !empty($cache[CLIENT_IP][$cacheName]) && (NOW_TIME - $cache[CLIENT_IP][$cacheName]) <= $cache_time) {
			return false;
		} else {
			/* 这里应该是评论或修改OK时，才添加缓存和Cookie，但此小功能就这样做 */
			$cache[CLIENT_IP] = is_array($cache[CLIENT_IP]) ? $cache[CLIENT_IP] : array();
			$cache[CLIENT_IP][$cacheName] = NOW_TIME;
			S('mood_cache',$cache,$cache_time);
			return true;
		}
		
	}
}
?>