<?php
/**
 * Taga模型处理
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class TagsModel extends GlobalModel {
	
	/**
	 * 添加tags
	 * @param array $tagsArray
	 */
	public function addTags($tagsArray) {
		//取出已存在的数据
		$tagsString = "'". implode("','", $tagsArray)."'";
		$dataBaseTags = $this->where("tag_name IN($tagsString)")->getField('tag_name',true);
		// 		在添加数据时，修改库中已经存在的值，如果是新值则肯定是tag_num=1
		if ($dataBaseTags && !isset($_POST['id'])) $this->where("tag_name IN($tagsString)")->setInc('tag_num',1);
		// 		添加新值
		$newTagsArray = array();
		foreach ($tagsArray as $value) {
			$value = strtolower($value);//数据库不区分大小写
			if (in_array($value,$dataBaseTags)) continue;//去除数据库中已存在的数据
			$tempArray = array();
			$tempArray['tag_name'] = $value;
			$tempArray['tag_num'] = 1;
			$newTagsArray[] = $tempArray;
		}
		if (!$newTagsArray) return ;
		if (!$this->addAll($newTagsArray)) $this->writeLog('添加TAG入总TAGS失败，可能的SQL'.$this->getLastSql(),'SYSTEM_ERROR');
	}
	
	/**
	 * 添加tags列表数据
	 * @param array $tagsArray
	 * @param array $setting
	 */
	public function addTagsList($tagsArray,$setting) {
		$TagsList = M('TagsList');
		//删除原来的=>在修改时
		if (isset($_POST['id']) && !empty($_POST['id'])) $TagsList->where("aid={$setting['aid']} AND cid={$setting['cid']}")->delete();
		$newTagsName = array();
		$i = 0;
		foreach ($tagsArray as $tags_value) {
			$newTagsName[$i]['tag_name'] = $tags_value;
			$newTagsName[$i]['cid'] = $setting['cid'];
			$newTagsName[$i]['mid'] = $setting['mid'];
			$newTagsName[$i]['aid'] = $setting['aid'];
			$newTagsName[$i]['save_time'] = time();
			$i++;
		}
		if (!$TagsList->addAll($newTagsName)) $this->writeLog('添加TAG入总TAGSList表失败，可能的SQL'.$TagsList->getLastSql(),'SYSTEM_ERROR');
	}
	
	/**
	 * tags分页->后台
	 * @return multitype:Ambigous <string, mixed> Ambigous <mixed, string, boolean, NULL, unknown, multitype:, multitype:multitype: , void, object>
	 */
	public function tagsPage() {
		$total = $this->count(1);
		$Page = new Page($total,__ACTION__.'?page={PAGE}');
		$pageData = array();
		$pageData[0] = $this->limit($Page->limit())->select();
		$pageData[1] = $Page->show();
		return $pageData;
	}
	
	/**
	 * tags列表分页
	 * @param mixed $tag
	 * @return multitype:multitype: NULL Ambigous <string, mixed> |boolean
	 */
	public function tagsListPage($tag) {
		$total = $this->table($this->tablePrefix.'tags_list')->where("tag_name='$tag'")->count(1);
		$tagsSetting = require APP_PATH.'Modules/Modules/Conf/Tags/Config.php';
		$url = explode('|', $tagsSetting['url_'.$tagsSetting['url_type']]);
		$url = str_replace(array('{$tag}','{$page}'), array($tag,'{PAGE}'), $url[1]);
		$Page = new Page($total,__ROOT__.'/'.$url);
		$pageData = array();
		$pageData['page'] = $this->table($this->tablePrefix.'tags_list')->where("tag_name='$tag'")->limit($Page->limit())->select();
		if ($pageData['page']) {
			$data = array();
			foreach ($pageData['page'] as $values) {
				$data[$values['mid']][] = $values;
			}
			$keys = array_keys($data);
			$pageData['page'] = array();
			foreach ($data as $key=>&$dataValues) {
				$models = F("models_$key");
				$Model = $this->returnModel($models['table_name']);
				$aidArray = array();
				foreach ($dataValues as $vValues) {
					$aidArray[] = $vValues['aid'];
				}
				$aidString = implode(',', $aidArray);
				if($aidString){
					$newData = $Model->where("id IN($aidString) AND a_status=1 AND is_delete=1")->getField('id,cid,userid,click,title,url,thumbnail');
				}else{
					$newData =array();
				}
				$pageData['page'] = array_merge($pageData['page'],$newData);
			}
			$pageData['pageinfo'] = $Page->show('first','prev','list','next','last');
			return $pageData;
		} else {
			return false;
		}
	}
}
?>