<?php
/**
 * 内容模型标签解析处理
 * @author CHENG
 *
 */
import('ORG.TagLib.TagLibHandle');
class Contents extends TagLibHandle {
	
	
	/**
	 * 无限级得到导航
	 * @param numeric $id
	 * @param array $parentArray
	 * @return array
	 */
	public function getCurrentPosition($id,$delimiter = '',$position = '') {
		//$positionCache = S("navigate_position_{$id}");
		if (empty($positionCache)) {
			$navigate = F('navigate');
			$tempArray = array('navigate_name'=>$navigate[$id]['navigate_name'],'url'=>$navigate[$id]['url']);			
			$position = '<a href="'.$tempArray['url'].'">'.$tempArray['navigate_name'].'</a>'.$delimiter.$position;
			//递归调用
			if ($navigate[$id]['pid'] !=0 ) {
				$position = $this->getCurrentPosition($navigate[$id]['pid'],$delimiter,$position);
			}
			S("navigate_position_$id",$position);
			return rtrim($position,$delimiter);
		} else {
			return $positionCache;
		}		
	}
	
	/**
	 * 解析列表
	 * @return Ambigous <multitype:, array>
	 */
	public function _list() {
		$table = $this->resoveModel();
		$Model = new GlobalModel();
		$listData = $Model->table(DB_PREFIX.$table)->where($this->tags['where'])->field($this->tags['field'])->cache((boolean)$this->tags['cache'])->limit($this->tags['limit'])->order($this->tags['order'])->select();
		unset($Model);
		return $this->handleContentResult($listData);
	}
	
	/**
	 * 解析内容页相关
	 * @return Ambigous <multitype:, array>
	 */
	public function _relevant() {
		$this->tags['aid'] = isset($this->tags['aid']) && !empty($this->tags['aid']) ? str_ireplace('$aid', intval($_GET['aid']), $this->tags['aid']) : intval($_GET['aid']);
		$this->tags['rfield'] = $this->tags['rfield'] ? $this->tags['rfield'] : 'relevant';
		$table = $this->resoveModel();
		$Model = new GlobalModel();
		$relevant = in_array($this->tags['rfield'],$Model->getTableField($table),true) ? $Model->table(DB_PREFIX.$table)->where("id={$this->tags['aid']}")->getField($this->tags['rfield']) : $Model->table(DB_PREFIX.$table.'_data')->where("aid={$this->tags['aid']}")->getField($this->tags['rfield']);
		if($relevant){
			$this->tags['where'] = "id IN($relevant) AND a_status=1 AND is_delete=1";
			$listData = $Model->table(DB_PREFIX.$table)->where($this->tags['where'])->field($this->tags['field'])->cache((boolean)$this->tags['cache'])->limit($this->tags['limit'])->order($this->tags['order'])->select();
		}else{
			$listData=array();
		}
		unset($Model,$table);
		return $this->handleContentResult($listData);
	}
	
	/**
	 * 解析内容下载列表
	 * down模型时cid必须只有能一个
	 * @return Ambigous <multitype:, string, unknown>
	 */
	public function _down() {
		$this->tags['aid'] = isset($this->tags['aid']) && !empty($this->tags['aid']) ? str_ireplace('$aid', intval($_GET['aid']), $this->tags['aid']) : intval($_GET['aid']);
		$this->tags['rfield'] = $this->tags['rfield'] ? $this->tags['rfield'] : 'down_file';
		$table = $this->resoveModel();
		$Model = new GlobalModel();
		$downFile = in_array($this->tags['rfield'],$Model->getTableField($table)) ? $Model->table(DB_PREFIX.$table)->where("id={$this->tags['aid']}")->getField($this->tags['rfield']) : $Model->table(DB_PREFIX.$table.'_data')->where("aid={$this->tags['aid']}")->getField($this->tags['rfield']);
		$downFileArray = json_decode($downFile,true);
		$downFile = array();
		$i = 0;
		/* 取出下载的显示配置 */
		$navigate = F('navigate');
		$mid = $navigate[$this->tags['cid']]['mid'];
		unset($navigate);
		$models_fields = F("models_fields_$mid");
		$downFieldSetting = $models_fields[$this->tags['rfield']]['field_setting'];
		foreach ($downFileArray as $fileValues) {
			if ($downFieldSetting['download_link'] == 1) {//链接到真实软件地址     
				if ($downFieldSetting['download_type']==1) {//1=>链接文件地址
					if ((stripos($fileValues[0], 'http://') === 0 || stripos($fileValues[0], 'https://') === 0)) {
						$downFile[$i]['url'] = $fileValues[0];
					} else {
						$downFile[$i]['url'] = __ROOT__.'/'.$fileValues[0];
					}
				} else {// 2=>通过PHP读取 
					if ((stripos($fileValues[0], 'http://') === 0 || stripos($fileValues[0], 'https://') === 0)) {
						$downFile[$i]['url'] = U('Content/Index/down',array('cid'=>$this->tags['cid'],'aid'=>$this->tags['aid'],'u'=>2,'l'=>base64_encode($fileValues[0]),'token'=>sha1($fileValues[0])),true,false,true);
					} else {
						$downFile[$i]['url'] = U('Content/Index/down',array('cid'=>$this->tags['cid'],'aid'=>$this->tags['aid'],'u'=>1,'token'=>sha1($fileValues[0])),true,false,true);
					}
				}
			} else {//2=>  链接到跳转页面
				if ((stripos($fileValues[0], 'http://') === 0 || stripos($fileValues[0], 'https://') === 0)) {
					$downFile[$i]['url'] = U('Content/Index/down_show',array('cid'=>$this->tags['cid'],'aid'=>$this->tags['aid'],'u'=>2,'l'=>base64_encode($fileValues[0]),'f'=>$this->tags['rfield'],'t'=>str_replace('.php', '', $downFieldSetting['download_tpl']),'token'=>sha1($fileValues[0])),true,false,true);
				} else {
					$downFile[$i]['url'] = U('Content/Index/down_show',array('cid'=>$this->tags['cid'],'aid'=>$this->tags['aid'],'u'=>1,'f'=>$this->tags['rfield'],'t'=>str_replace('.php', '', $downFieldSetting['download_tpl']),'token'=>sha1($fileValues[0])),true,false,true);
				}
				
			}
			$downFile[$i]['text'] = empty($fileValues[1]) ? '本地下载' : $fileValues[1];
			$i++;
		}
		unset($Model,$downFileArray);
		return $downFile;
	}
	
	/**
	 * 解析内容图集
	 * @return Ambigous <multitype:, unknown>
	 */
	public function _images() {
		$this->tags['aid'] = isset($this->tags['aid']) && !empty($this->tags['aid']) ? str_ireplace('$aid', intval($_GET['aid']), $this->tags['aid']) : intval($_GET['aid']);
		$this->tags['rfield'] = $this->tags['rfield'] ? $this->tags['rfield'] : 'images';
		$table = $this->resoveModel();
		$Model = new GlobalModel();
		/* 内容主表和附加表 */
		$imagesFile = in_array($this->tags['rfield'],$Model->getTableField($table)) ? $Model->table(DB_PREFIX.$table)->where("id={$this->tags['aid']}")->getField($this->tags['rfield']) : $Model->table(DB_PREFIX.$table.'_data')->where("aid={$this->tags['aid']}")->getField($this->tags['rfield']);
		$imagesFileArray = json_decode($imagesFile,true);
		//是否开启图片分布式存储
		$open_img_server = C('OPEN_ATTACHMENT_SERVER');
		if ($open_img_server) {
			$img_server_type = C('ATTACHMENT_SERVER_TYPE');
			$img_server_url = parse_url(C('ATTACHMENT_SERVER_URL'));
		}
		$imagesFile = array();
		$i = 0;
		foreach ($imagesFileArray as $fileValues) {
			if ($open_img_server) {
				$a_key = substr(sha1($fileValues[0]), 0,1);
				if ($img_server_type == 1) {//随机
					$imagesFile[$i]['url'] = "{$img_server_url['scheme']}://".strstr($img_server_url['host'], '.',true).substr($a_key, 0,1).strstr($img_server_url['host'], '.')."/{$fileValues[0]}";
				} else {
					$imagesFile[$i]['url'] = "{$img_server_url['scheme']}://{$img_server_url['host']}/{$fileValues[0]}";
				}
			} else {
				$imagesFile[$i]['url'] = __ROOT__.'/'.$fileValues[0];
			}
			$imagesFile[$i]['text'] = $fileValues[1];
			$i++;
		}
		unset($Model,$imagesFileArray);
		return $imagesFile;
	}
	
	/**
	 * 解析分页
	 * @return multitype:NULL Ambigous <multitype:, array> Ambigous <string, mixed>
	 */
	public function _page() {
		/* 解析数据模型和配置 */
		$table = $this->resoveModel();
		$navigate = F('navigate');
		$current_id = intval($_GET['cid']);
		/* 分页 */
		$Model = new Model();
		$total = $Model->table(DB_PREFIX.$table)->where($this->tags['where'])->cache((boolean)$this->tags['cache'])->count(1);
		$_GET['page'] = isset($_GET['page'])&&!empty($_GET['page']) ? $_GET['page'] : 1;
		$pageData = array();
		//如果是导航分页
		if ($current_id) {
			$currentNavigate = $navigate[$current_id];
			$url = $this->tags['urlrule']?str_replace(array('[CID]','[PAGE]'),array($_GET['cid'],'{PAGE}'),$this->tags['urlrule']): URL::get_navigate_url($current_id, $currentNavigate,$_GET['page']);
			$Page = new Page($total,$url,$this->tags['limit']);
		} else {
			/* 分页URI设置 */
			//$url = preg_replace('/([\?\&\/]page[=\/][1-9][\d]*)/', '', $_SERVER['REQUEST_URI']);
			$urlrule = $this->tags['urlrule']?str_replace(array('[CID]','[PAGE]'),array($_GET['cid'],'{PAGE}'),$this->tags['urlrule']): '';			
			$url = preg_replace('/([\?\&\/]page[=\/][1-9][\d]*)/', '', $_SERVER['REQUEST_URI']);
			$delimiter = strpos($url, '?')===false ? '?' : '&';
			$url = $urlrule?$urlrule:$url.$delimiter.'page={PAGE}';
			//$Page = new Page($total,$url.$delimiter.'page={PAGE}',$this->tags['limit']);
			$Page = new Page($total,$url,$this->tags['limit']);
		}
		//获取数据
		$pageData['page'] = $Model->table(DB_PREFIX.$table)->where($this->tags['where'])->field($this->tags['field'])->cache((boolean)$this->tags['cache'])->limit($Page->limit())->order($this->tags['order'])->select();
		//分页列表设置
		if (isset($currentNavigate) && $currentNavigate['setting']['navigate_is_html'] == 1) {
			//后台生成静态时需要的分页数和总量
			if (I('get.back_update_navigate') == 1) {
				S('back_update_navigate_page_'.$this->tags['cid'],array('html_total'=>$total,'html_limit'=>$this->tags['limit']));
				exit();
			}
			$pageData['pageinfo'] = $Page->show('first','prev','list','next','last');//'other',
		}else {
			$pageData['pageinfo'] = $Page->show('first','prev','list','next','last');//'other',
		}
		$pageData['page'] = $this->handleContentResult($pageData['page']);
		unset($Model);
		return $pageData;
	}
	
	/**
	 * 解析得到模型
	 * mid 只能是常数
	 * cid 也只能是常数
	 * 当有mid时优先取MID，没有mid时，取传入的cid值[但此时CID只能有一个]
	 * mid和cid都没有时，则默认为当前CID
	 * @return Ambigous <>
	 */
	private function resoveModel() {
		/* 设置默认cid */
		$navigate = F('navigate');
		/* mid存在，优先取mid，mid中可设置cid的值[只有设置了mid才可以设置cid，其它则不行]，但必须是同一模型下的CID */
		if (isset($this->tags['mid'])) {
			$this->tags['where'] = empty($this->tags['where']) ? 'a_status=1 AND is_delete=1' : $this->tags['where'].' AND a_status=1 AND is_delete=1';
			$model = F("models_{$this->tags['mid']}");
		} elseif (isset($this->tags['cid'])) {
			/* 支持当前导航下的子导航，只支持频道导航，但说明的是，只能取出它的下一级导航，不支持无限级，并且所属模型必须和频道模型一致 */
			if ($this->tags['cid'] == 'son') {
				$current_id = intval($_GET['cid']);
				//非频道导航下使用son则无效，取出的是它自己的导航模型
				if ($navigate[$current_id]['is_channel'] == 2) {
					$this->tags['cid'] = $current_id;
				} else {//正常频道导航取出它的下了级子栏目
					$this->tags['cid'] = '';
					foreach ($navigate as $values) {
						/* 它的子级+正常栏目+同一模型 */
						if ($values['pid'] == $current_id && $values['c_status'] == 1 && $values['mid'] == $navigate[$current_id]['mid']) {
							$this->tags['cid'] .= $values['id'].',';
						}
					}
					$this->tags['cid'] = rtrim($this->tags['cid'],',');
				}
				$this->tags['where'] = empty($this->tags['where']) ? "cid IN({$this->tags['cid']}) AND a_status=1 AND is_delete=1" : "cid IN({$this->tags['cid']}) AND {$this->tags['where']}  AND a_status=1 AND is_delete=1";
				$model = F("models_{$navigate[$current_id]['mid']}");
			} else {
				/* cid可以有多个，但必须是同一模型，如果有多个cid，取其中一个 */
				/* $cid已经废弃，但为了兼容1.1之前 */
				$this->tags['cid'] = empty($this->tags['cid']) ? intval($_GET['cid']) : str_ireplace('$cid', intval($_GET['cid']), $this->tags['cid']);
				$this->tags['where'] = empty($this->tags['where']) ? "cid IN({$this->tags['cid']}) AND a_status=1 AND is_delete=1" : "cid IN({$this->tags['cid']}) AND {$this->tags['where']}  AND a_status=1 AND is_delete=1";
				//设置mid，所属模型表
				//$strpos = strpos($this->tags['cid'], ',');
				//$temp_cid = $strpos===false ? $this->tags['cid'] : substr($this->tags['cid'], $strpos-1,1);
				//$model = F("models_{$navigate[$temp_cid]['mid']}");
				$strpos = explode($this->tags['cid'], ',');
				$temp_cid = abs(intval($this->tags['cid']));
				$temp_cid = $temp_cid > 0 ? $temp_cid : $strpos[0];
				$model = F("models_{$navigate[$temp_cid]['mid']}");
			}
		} else {//当前本模型
			$this->tags['cid'] = intval($_GET['cid']);
			$this->tags['where'] = empty($this->tags['where']) ? "cid={$this->tags['cid']} AND a_status=1 AND is_delete=1" : "cid={$this->tags['cid']} AND {$this->tags['where']}  AND a_status=1 AND is_delete=1";
			$model = F("models_{$navigate[$this->tags['cid']]['mid']}");
		}
		return $model['table_name'];
	}
	
}
?>