<?php
import('ORG.TagLib.TagLibHandle');
class Tags extends TagLibHandle {
	
	public function _list() {
		/* 取出tags数据 */
		$Tags = M('Tags');
		$data = $Tags->order($this->tags['order'])->cache((boolean)$this->tags['cache'])->field($this->tags['field'])->limit($this->tags['limit'])->select();
		/* 设置url */
		$tagSetting = require APP_PATH.'/Modules/Modules/Conf/Tags/Config.php';
		$url = explode('|', $tagSetting['url_'.$tagSetting['url_type']]);
		$url = $url[0];
		foreach ($data as &$values) {
			$values['url'] = __ROOT__.'/'.str_replace('{$tag}', $values['tag_name'], $url);
			$values['a_tag_name'] = $values['tag_name'];
			if (isset($values['style'])) {
				$style = explode('|', $values['style']);
				$color = empty($style[0]) ? '' : "color:$style[0];";
				$bold = empty($style[1]) ? 'normal' : 'bold';
				$bg = empty($style[2]) ? '' : "background:$style[2];";
				$values['tag_name'] = '<b style=\'font-weight:'.$bold.';'.$color.$bg.'\'>'.$values['tag_name'].'</b>';
			}
		}
		return $data;
	}
	
	/**
	 * 内容列表分页
	 * @return boolean|multitype:multitype: Ambigous <multitype:, array> NULL Ambigous <string, mixed>
	 */
	public function _cntpage() {
		$Model = new GlobalModel();
		//获取配置
		$tagsSetting = require APP_PATH.'Modules/Modules/Conf/Tags/Config.php';
		//设置url
		$url = explode('|', $tagsSetting['url_'.$tagsSetting['url_type']]);
		$url = str_replace(array('{$tag}','{$page}'), array($this->tags['tag_name'],'{PAGE}'), $url[1]);
		//获取总数
		$total = $Model->table(DB_PREFIX.'tags_list')->cache((boolean)$this->tags['cache'])->where("tag_name='{$this->tags['tag_name']}'")->count(1);
		//获取tag_list分页
		$Page = new Page($total,__ROOT__.'/'.$url,$this->tags['limit']);
		$pageData = array();
		$pageData['page'] = $Model->table(DB_PREFIX.'tags_list')->cache((boolean)$this->tags['cache'])->where("tag_name='{$this->tags['tag_name']}'")->limit($Page->limit())->select();
		if (empty($pageData['page'])) return false;
		$data = array();
		foreach ($pageData['page'] as $values) {
			$data[$values['mid']][] = $values;
		}
		$pageData['page'] = array();
		$field = $this->tags['field'];
		foreach ($data as $key=>&$dataValues) {
			$models = F("models_$key");
			$TableModel = $Model->returnModel($models['table_name']);
			//取得字段的交集->过滤非此表的中字段数
			if (!empty($field) && $field!='*') {
				$fieldArray = explode(',', $field);
				$tableField = $Model->getTableField($models['table_name']);
				$fieldArray = array_intersect($fieldArray, $tableField);
				$field = implode(',', $field);
			}
			$aidArray = array();
			foreach ($dataValues as $vValues) {
				$aidArray[] = $vValues['aid'];
			}
			$aidString = implode(',', $aidArray);
			if($aidString){
				$newData = (array)$TableModel->cache((boolean)$this->tags['cache'])->where("id IN($aidString) AND a_status=1 AND is_delete=1")->field($field)->select();
			}else{
				$newData =array();
			}

			$pageData['page'] = array_merge($pageData['page'],$newData);
			$pageData['page'] = $this->handleContentResult($pageData['page']);
		}
		$pageData['pageinfo'] = $Page->show('first','prev','list','next','last');
		unset($Model,$TableModel,$tagsSetting,$newData,$data);
		return $pageData;
	}
}
?>