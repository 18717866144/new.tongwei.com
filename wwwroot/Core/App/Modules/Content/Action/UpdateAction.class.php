<?php
/**
 * 内容HTML更新
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class UpdateAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
	}
	
	/* 更新内容URL */
	public function content_url() {
		$navigate = F('navigate');
		if (isset($_GET['limit'])) {
			if ($_GET['cid'] == 'all') {
				$this->redirect('content_url',array(),1,'全部数据更新成功！');
			} else {
				//$navigate = F('navigate');
// 				全部导航
				if (empty($_GET['cid'])) {
					$cidArray = array();
					foreach ($navigate as $values) {
						if($values['n_type'] == 1 && $values['is_channel'] == 2) $cidArray[] = $values['id'];
					}
				} else {
					$cidArray = explode(',', $_GET['cid']);
				}
			}
			$currentCid = isset($_GET['current_cid'])&&!empty($_GET['current_cid']) ? intval($_GET['current_cid']) : array_shift($cidArray);
			$limit = intval($_GET['limit']);
			$forNum = !isset($_GET['for_num'])||empty($_GET['for_num']) ? 0 : intval($_GET['for_num']);
			$model = F("models_{$navigate[$currentCid]['mid']}");
			$Model = new GlobalModel();
			$Model = $Model->returnModel($model['table_name']);
			$total = empty($_GET['total']) ? $Model->where("cid=$currentCid")->count(1) : intval($_GET['total']);
			$sqlLimit = "$forNum,$limit";
			$content = $Model->where("cid=$currentCid")->limit($sqlLimit)->select();
			if ($content) {
				foreach ($content as $values) {
					$url = URL::get_content_url($values['id'],$values);
					$Model->where("id={$values['id']}")->setField('url',$url);
				}
				$BFB = round($forNum/$total,2)*100;
				$BFB = $BFB >= 100 ? 100 : $BFB;
				$info = "正在更新导航<font color='red'>{$navigate[$currentCid]['navigate_name']}</font>，已更新$BFB%";
				$forNum = $forNum+$limit;
// 				此处为no，主为了防止 上面判断empty($_GET['cid'])循环cid，当为no页current_cid存在时，它再查一次查不到就会all的状态
				$cid = empty($cidArray) ? 'no' : implode(',',$cidArray);
			} else {
				$total = 0;
				$forNum = 0;
				$info = "导航<font color='red'>{$navigate[$currentCid]['navigate_name']}</font>，更新完成，正准备更新下一导航...";
				$currentCid = 0;
				$cid = empty($cidArray) ? 'all' : implode(',',$cidArray);
			}
			$this->redirect('content_url',array('cid'=>$cid,'current_cid'=>$currentCid,'limit'=>$limit,'for_num'=>$forNum,'total'=>$total),1,$info);
		} else {
			$this->assign('navigate',$this->showNavigate($navigate));
			$this->display();
		}
	}
	
	/* 生成内容HTML */
	public function content_create_html() {
		$navigate = F('navigate');
		if (isset($_GET['limit'])) {
			if ($_GET['cid'] == 'all') {
				$this->redirect('content_create_html',array(),1,'全部数据更新成功！');
			} else {
				//全部导航
				if (empty($_GET['cid'])) {
					$cidArray = array();
					foreach ($navigate as $values) {
						if($values['n_type'] == 1 && $values['is_channel'] == 2 && $values['setting']['content_is_html']==1) $cidArray[] = $values['id'];
					}
				} else {
					$cidArray = explode(',', $_GET['cid']);
				}
			}
			$currentCid = isset($_GET['current_cid'])&&!empty($_GET['current_cid']) ? intval($_GET['current_cid']) : array_shift($cidArray);
			$limit = intval($_GET['limit']);
			$forNum = !isset($_GET['for_num'])||empty($_GET['for_num']) ? 0 : intval($_GET['for_num']);
			$model = F("models_{$navigate[$currentCid]['mid']}");
			$Model = new GlobalModel();
			$Model = $Model->returnModel($model['table_name']);
			$total = empty($_GET['total']) ? $Model->where("cid=$currentCid")->count(1) : intval($_GET['total']);
			$sqlLimit = "$forNum,$limit";
			$contentData = $Model->where("cid=$currentCid")->limit($sqlLimit)->select();
			if ($contentData) {
				$ContentsModel = D('Contents');
				foreach ($contentData as $values) {
					$ContentsModel->createContentHtml($values['id'],$model,$navigate);
				}
				unset($Model,$ContentsModel);
				$BFB = round($forNum/$total,2)*100;
				$BFB = $BFB >= 100 ? 100 : $BFB;
				$info = "正在更新导航<font color='red'>{$navigate[$currentCid]['navigate_name']}</font>，已更新$BFB%";
				$forNum = $forNum+$limit;
// 				此处为no，主为了防止 上面判断empty($_GET['cid'])循环cid，当为no页current_cid存在时，它再查一次查不到就会all的状态
				$cid = empty($cidArray) ? 'no' : implode(',',$cidArray);
			} else {
				$total = 0;
				$forNum = 0;
				$info = "导航<font color='red'>{$navigate[$currentCid]['navigate_name']}</font>，更新完成，正准备更新下一导航...";
				$currentCid = 0;
				$cid = empty($cidArray) ? 'all' : implode(',',$cidArray);
			}
			//$this->redirect('content_create_html',array('cid'=>$cid,'current_cid'=>$currentCid,'limit'=>$limit,'for_num'=>$forNum,'total'=>$total),1,$info);
			$url = U('content_create_html',array('cid'=>$cid,'current_cid'=>$currentCid,'limit'=>$limit,'for_num'=>$forNum,'total'=>$total));
			showmessage($info,$url,100);
		} else {
			foreach ($navigate as &$values) {
				// 				同一模型并且只是内容栏目，并且非自身
				$values['disabled'] =  ($values['n_type'] != 1 || $values['is_channel'] == 1 || $values['setting']['content_is_html']!=1) ? 'disabled="disabled"' : '';
			}
			$this->assign('navigate',$this->showNavigate($navigate));
			$this->display();
		}
	}
	
	/* 生成导航HTML */
	public function navigate_create_html() {
		$navigate = F('navigate');
		if (isset($_GET['limit'])) {
			if ($_GET['cids'] == 'all') {
				//$this->redirect('navigate_create_html',array(),1,'全部数据更新成功！');
				showmessage('全部数据更新成功！',U('navigate_create_html'),100);
			} else {
				//全部导航
				if (empty($_GET['cids'])) {
					$cidArray = array();
					foreach ($navigate as $values) {
						if($values['n_type'] == 2 || ($values['n_type']==1 && $values['setting']['navigate_is_html']==1)) $cidArray[] = $values['id'];
					}
				} else {
					$cidArray = explode(',', $_GET['cids']);
					foreach ($cidArray as $key=>$vo) {
						if (!is_numeric($vo)) unset($cidArray[$key]);
					}
				}
			}
			
			//当前执行ID，如果存在等于自己，否则等于cidarray中第一个，并删除cidarray中的第一个，便于下次执行
			$currentCid = isset($_GET['current_cid'])&&!empty($_GET['current_cid']) ? intval($_GET['current_cid']) : array_shift($cidArray);
			
			$currentNavigate = M('Navigate')->where("id=$currentCid")->find();
			$currentNavigate['setting'] = json_decode($currentNavigate['setting'],true);
			
			if($currentNavigate['setting']['navigate_is_html']==1){
			
			
			//创建目录
			Tool::mkDir(dirname(str_replace(C('INSTALL_PATH'),'',__PATH__).$currentNavigate['url']));
			//获取附加参数
			$params = array('cid'=>$currentNavigate['id']);
			$appendParams = URL::get_navigate_append_params($currentNavigate);
			$appendParams && ($params = array_merge($params,$appendParams));
			//单页
			if($currentNavigate['n_type'] == 2) {
				$Single = M('Single');
				$singleContent = $Single->where("sid={$currentNavigate['id']}")->getField('content');
				$page = count(explode('_HXCMS_PAGE_', $singleContent));
				//有分页
				if ($page > 1) {
					$_GET['page'] = 0;
					while ($page > 0) {
						$_GET['page'] +=1;
						$params['page'] = $_GET['page'];
						//生成单页列表页
						$content = file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
						$fileUrl = URL::get_navigate_url($currentNavigate['id'], $currentNavigate,$_GET['page'],false);
						file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$fileUrl, $content);
						//生成索引页
						$_GET['page'] == 1 && file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$currentNavigate['url'], $content);
						$page--;
					}
				} else {
					$content = file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
					file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$currentNavigate['url'], $content);
				}
				$current_cid = 0;
				$current_page_num = 1;
				$_GET['page'] = 0;
				$BFB = 100;
				$temp_Cid = empty($cidArray) ? 'all' : implode(',',$cidArray);
			} elseif ($currentNavigate['n_type'] == 1) {
				//最先执行一次获取分页的到GLOBAL['html_total']   $GLOBALS['html_limit']
				$params['back_update_navigate'] = 1;//获取更新标记
				file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
				unset($params['back_update_navigate']);
				$globalsPageInfo = S('back_update_navigate_page_'.$currentNavigate['id']);
				
				//总页数=总内容数量/每页内容数
				$pageNum = ceil($globalsPageInfo['html_total']/$globalsPageInfo['html_limit']);
				$pageNum = max($pageNum,1);
				//当前次数
				$current_page_num = isset($_GET['current_page_num']) ? $_GET['current_page_num'] : 1;
				
				//当前页数
				$currentPageNum = $_GET['limit'] * $current_page_num;
							
				$page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 0;
				
				if ($currentPageNum < $pageNum) {
					$whilePageNum = $_GET['limit'];//执行页数
					$current_cid = $currentCid;
					$current_page_num += 1;
					//$page+=1;
					$BFB = round($currentPageNum/$pageNum,2)*100;
					$temp_Cid = empty($cidArray) ? 'no' : implode(',',$cidArray);
				} else {
					//最后一次更新
					$whilePageNum = $_GET['limit']-abs($pageNum-$currentPageNum);
					$current_cid = 0;
					$current_page_num = 1;
					//$page=0;
					$BFB = 100;
					$temp_Cid = empty($cidArray) ? 'all' : implode(',',$cidArray);
				}
								
				while ($whilePageNum > 0) {
					$page += 1;
					$params['page'] = $page;					
					//生成列表页
					$content = file_get_contents(WEB_URL.U('Content/Index/navigate',$params));
					$fileUrl = URL::get_navigate_url($currentNavigate['id'], $currentNavigate,$page,false);
					file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$fileUrl, $content);
					//生成索引页
					$page == 1 && file_put_contents(str_replace(C('INSTALL_PATH'),'',__PATH__).$currentNavigate['url'], $content);
					$whilePageNum--;
					if($page>=$pageNum) $page=0;
				}
			}
			
			}else{
				$temp_Cid = empty($cidArray) ? 'all' : implode(',',$cidArray);				
			}
			$BFB = $BFB >= 100 ? 100 : $BFB;
			$info = "正在更新导航<font color='red'>{$navigate[$currentCid]['navigate_name']}</font>，已更新$BFB%";
			//$this->redirect('navigate_create_html',array('cids'=>$temp_Cid,'current_cid'=>$current_cid,'limit'=>$_GET['limit'],'current_page_num'=>$current_page_num,'page'=>$page),1,$info);
			$url = U('navigate_create_html',array('cids'=>$temp_Cid,'current_cid'=>$current_cid,'limit'=>$_GET['limit'],'current_page_num'=>$current_page_num,'page'=>$page));
			showmessage($info,$url,100);
		} else {
			foreach ($navigate as &$values) {
				//同一模型并且只是内容栏目，并且非自身
				$values['disabled'] =  ($values['n_type'] == 3 || ($values['n_type']==1 && $values['setting']['navigate_is_html']!=1)) ? 'disabled="disabled"' : '';
			}
			$this->assign('navigate',$this->showNavigate($navigate));
			$this->display();
		}
	}
	
	/* 首页生成 */
	public function index_create_html($success=true) {		    
			 
		   // $status=file_get_contents(WEB_URL.'/tohtml.php');
			
			$html=file_get_contents(WEB_URL.'/index.php/content/index/index');
			
            $res=file_put_contents('index.html',$html);
		   
		    if ($res){			
				$str = '<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>成功更新首页</title></head><body>成功更新首页</body></html>';
				if($success==true) $this->show($str);
			} else {
				if($success==true) $this->error('首页更新失败！');
			}
		
		
	/*	if( C('INDEX_HTML')==1) {
			$_POST['index_name']='index.html';
			$status = $this->buildHtml("index",__PATH__,TEMPLATE_PATH.DEFAULT_SKIN."/Pc/index.php");
			if ($status){			
				$str = '<!DOCTYPE HTML><html><head><meta charset="utf-8"><title>成功更新首页</title></head><body>成功更新首页 <a style="color:red;font-size:16px;text-decoration:underline;" target="_blank" href="'.C('WEB_URL').'/'.C('INSTALL_PATH').$_POST['index_name'].'">浏览</a></body></html>';
				if($success==true) $this->show($str);
			} else {
				if($success==true) $this->error('首页更新失败！');
			}
		} */
	}
	
	/* 更新缩略图 */
	public function thumbnail() {
		//公用导航缓存开启
		$navigate = F('navigate');
		
		if (isset($_GET['start'])) {
			$cidArray = session('temp_navigate');
			if (is_null($cidArray)) {
				//更新全部导航
				if (empty($_GET['cid'])) {
					$cidArray = array();
					foreach ($navigate as $values) {
						if($values['n_type'] == 1 && $values['is_channel'] == 2) $cidArray[] = $values['id'];
					}
				} else {
					$cidArray = explode(',', trim($_GET['cid'],','));
				}
				session('temp_navigate',$cidArray);
			}elseif (empty($cidArray) && is_array($cidArray)) {
				$this->redirect('thumbnail',array(),1,'所有导航更新完成！');
			}
			//当前更新的导航
			if (empty($_GET['current_cid'])||!isset($_GET['current_cid'])) {
				$current_cid = array_shift($cidArray);
				session('temp_navigate',$cidArray);
			} else {
				$current_cid = intval($_GET['current_cid']);
			}
			$field = $_GET['field'];
			$limit = intval($_GET['limit']);//每次更新的条数
			$up_num = intval($_GET['up_num']);//更新了几轮
			$model = F("models_{$navigate[$current_cid]['mid']}");
			//获取字段
			$Model = M();
			$total = $Model->table(DB_PREFIX.$model['table_name'])->where("`$field`!=''")->count(1);
			$fieldData = $Model->table(DB_PREFIX.$model['table_name'])->where("`$field`!=''")->limit($up_num,$limit)->getField($field,true);
			if ($fieldData) {
				$model_field = F("models_fields_{$navigate[$current_cid]['mid']}");
				$Attachment = $Attachment ? $Attachment : D('Attachment/Attachment');
				foreach ($fieldData as $value) {
					if ($model_field[$field]['field_setting']['crop_type'] != 1) continue;//非自动裁剪退出
					//裁剪方式,比例，或宽高
					$crop_value = array(
							'size'=>array(
								$model_field[$field]['field_setting']['crop_width'],
								$model_field[$field]['field_setting']['crop_height']
							),
							'multiple'=>$model_field[$field]['field_setting']['crop_multiple'],
					);
					$Attachment->cropIMG($value,$model_field[$field]['field_setting']['crop_mode'],$crop_value);
				}
				$BFB = round(($up_num+$limit)/$total,2)*100;
				$BFB = $BFB >= 100 ? 100 : $BFB;
				$this->redirect('thumbnail',array('up_num'=>$up_num+$limit,'current_cid'=>$current_cid,'limit'=>$limit,'start'=>1,'field'=>$field),1,'导航<font color="red">'.$navigate[$current_cid]['navigate_name'].'</font>成功更新'.$BFB.'%');
			} else {
				//跳转换至下一个内容导航
				$this->redirect('thumbnail',array('limit'=>$limit,'start'=>1,'field'=>$field),1,'导航<font color="red">'.$navigate[$current_cid]['navigate_name'].'</font>成功更新完成,正准备更新下一导航！');
			}
		} else {
			session('temp_navigate',null);
			foreach ($navigate as &$values) {
				//内容栏目，并且非自身
				$values['disabled'] = ($values['n_type'] != 1 || $values['is_channel'] == 1) ? 'disabled="disabled"' : '';
			}
			$this->assign('navigate',$this->showNavigate($navigate));
			$this->display();
		}
	}
	
	/* 显示导航树 */
	private function showNavigate($navigate) {
		$Tree = new Tree();
		$Tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
		$Tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$str = "<option value='\$id' \$disabled>\$spacer \$navigate_name</option>";//\$selected
		$Tree->init($navigate);
		return $Tree->get_tree(0, $str);
	}
}
?>