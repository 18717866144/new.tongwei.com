<?php
/**
 * 内容导航数据模型处理
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class NavigateModel extends GlobalModel {
	
	/**
	 * 数据验证
	 * @param array|string $setting
	 * @return Ambigous <boolean, unknown, multitype:unknown string >|unknown
	 */
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		$postData['n_type'] = $type = $setting;
		$postData['content'] = Input::getVar($_POST['content']);//主内容不去除html
		$global = array(
			'navigate_name'=>array('s1-50','栏目名称格式不正确！！！'),
			'navigate_mark'=>array('r/^[a-z][\w]{0,29}$/i','栏目标识(目录)格式不正确！！！'),
			'sort'=>array('r/^[1-9][\d]{0,7}$/','栏目排序格式不正确！！！'),
			'synopsis'=>array('a|s1-255','栏目简介格式不正确！！！'),
			);
		if ($type == 1) {
			$array = array('mid'=>array('r/^[1-9][\d]{0,7}$/','所属模型格式不正确！！！'));
			$array = array_merge($global,$array);
		}else {
			$array = array();
		}
		
		return ValiData::_vail()->_check($array, $postData);
		return $postData;
	}

	/**
	 * 添加数据
	 * @param array $postData
	 * @param array $setting
	 * @return Ambigous <mixed, boolean, string, unknown, false, number>
	 */
	public function addData($postData,$setting = array()) {
// 	url和配置处理
		$tableInfo = $this->getTableInfo();
		$postData = $this->handleColumnData($postData,$tableInfo['Auto_increment']);
// 	存入时间
		$postData['save_time'] = NOW_TIME;
		//缩略图
		if ($postData['thumbnail']) $postData['thumbnail'] = $this->formatThumbnail($postData['thumbnail']);
// 		系统分配导航标识（外链）
		//if ($postData['n_type'] == 3) $postData['navigate_mark'] = uniqid('n_');
		return $this->data($postData)->add();
	}

	/**
	 * 数据编辑
	 * @param array $postData
	 * @param array|string $setting
	 * @return Ambigous <boolean, false, number>
	 */
	public function editData($postData,$setting = array()) {
		$postData = $this->handleColumnData($postData,$postData['id']);
		//缩略图
		if ($postData['thumbnail']) $postData['thumbnail'] = $this->formatThumbnail($postData['thumbnail']);
		return $this->data($postData)->save();
	}
	
	/* 格式化缩略图 */
	private function formatThumbnail($image) {
		$thumbnailArray = explode('|', $image);
		//if (Tool::encrypt($thumbnailArray[1].$thumbnailArray[0]) === $thumbnailArray[2]) {
			return $thumbnailArray[0];
		//} else {
		//	$this->writeLog('此操作者，非法修改图片数据值，危险操作，关联表navigate', 'USER_ERROR');
		//	return '';
		//}
	}

	/* 处理公共导航栏目数据 */
	private function handleColumnData($postData,$cid) {
		// 		父级栏目mark
		$postData['parent_navigate_mark'] = trim($this->getParentColumn($postData['pid']),'/');
		// 		栏目url
		if ($postData['n_type'] != 3) $postData['url'] =URL::get_navigate_url($cid, $postData);
		// 		序列化栏目配置
		if ($postData['setting']['pic']) $postData['setting']['pic'] = $this->formatThumbnail($postData['setting']['pic']);
		if (isset($postData['setting'])) $postData['setting'] = json_encode($postData['setting']);
		return $postData;
	}
	
	/**
	 * 得到无限级的父级栏目
	 */
	private function getParentColumn($pid,$parent_column_dir = '') {
		$parent_column = $this->where("id=$pid")->field('pid,navigate_mark')->find();
		if (empty($parent_column_dir)) {
			$parent_column_dir = $parent_column['navigate_mark'];
		}else {
			$parent_column_dir = $parent_column['navigate_mark'].'/'.$parent_column_dir;
		}
		if ($parent_column['pid'] != 0) {
			return $this->getParentColumn($parent_column['pid'],$parent_column_dir);
		}else {
			return $parent_column_dir;
		}
	}

	/* 得到单页内容 */
	public function getSingleContent($data) {
		$current = $this->table($this->tablePrefix.'single')->where("sid={$data['id']}")->find();
		$content = $current['content'];
		$contentmobile = $current['contentmobile'];
		//未分页直接返回
		if (!strpos($content, '_HXCMS_PAGE_')) return array('content'=>$content, 'contentmobile'=>$contentmobile, 'pageinfo'=>false);
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		if ($page <= 1) $page = 1;
		$content = explode('_HXCMS_PAGE_', $content);
		$pageNum = count($content);
		if ($page >= $pageNum) $page = $pageNum;
		$content = $content[$page-1];
		$pageurl = ($page <= 1) ? '###' : URL::get_navigate_url($data['id'], $data,$page-1,false);
		$page_string = '<a href="'.$pageurl.'">上一页</a>';
		for ($i=1;$i<=$pageNum;$i++) {
			if ($page == $i) {
				$pageurl = '###';
				$class= 'class="current_page"';
			}else {
				$pageurl = URL::get_navigate_url($data['id'], $data,$i,false);
				$class = '';
			}
			$page_string .= '<a href="'.$pageurl.'" '.$class.'>'.$i.'</a>';
		}
		// 		判断同上
		$pageurl = ($page >= $pageNum) ? '###' : URL::get_navigate_url($data['id'], $data,$page+1,false);
		$page_string .= '<a href="'.$pageurl.'">下一页</a>';
		return array('content'=>$content, 'contentmobile'=>$contentmobile, 'pageinfo'=>$page_string);
	}
	
}

?>