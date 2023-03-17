<?php
/**
 * 缩略图[thunmbnail]字段处理
 * @author CHENG
 *
 */
class Image extends Field {
	
	/* 字段显示*/
	public function show($value = '') {
		if (SESSION_TYPE == 1) {
			if ($this->setting['back_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['back_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		} else {
			if ($this->setting['front_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['front_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		}
		return $this->html;
	}
	
	/* 系统内置字段样式 */
	protected function internal($value) {
		$web_url = C('WEB_URL');
		//相关表related
		$model = F("models_{$this->form['mid']}");
		$related_table = $model['table_name'];
		// 			裁剪设置
		$crop_value = $this->setting['crop_mode']==1 ? $this->setting['crop_width'].'_'.$this->setting['crop_height'] : $this->setting['crop_multiple'];
		// 		文件名，上传数目，是否加水印，裁剪类型，裁剪方式，裁剪值（如果为宽高，那么则用“宽_高”这种方式），相关表
		$file_name = rawurlencode("info[{$this->form['field_name']}]");
		$param_token = Tool::encrypt("{$file_name}1{$this->setting['water_mark']}{$this->setting['crop_type']}{$this->setting['crop_mode']}$crop_value$related_table");
		if ($value) {
			$randNum = mt_rand(1,9999);
			$token = Tool::encrypt($randNum.$value);
			$tokenValue = $value.'|'.$randNum.'|'.$token;
			$src = $value;
			$alt = $value;
		} else {
			$alt = '';
			$src ="__PUBLIC__/modules/content/images/upload-pic.png";
		}
		$corpHtml = $this->setting['crop_type']==2 ? '<input type="button" value="裁剪图片" onclick="crop();" class="sub cropIMG" />' : '';
		return  <<<html
			<div class="upload_show">
				<input type="hidden" value="$tokenValue" id="{$this->form['field_name']}" name="info[{$this->form['field_name']}]" />
				<dl>
					<dt style="height:123px;"><a href="javascript:;" id="thumbnail_{$this->form['field_name']}" style="margin-right:10px;display:inline-block;"><img style="width:100%" alt="$alt" src="$src" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name={$file_name}&up_num=1&is_water={$this->setting['water_mark']}&crop_type={$this->setting['crop_type']}&crop_mode={$this->setting['crop_mode']}&crop_value=$crop_value&related=$related_table&token=$param_token','图片上传');" /></a></dt>
					<dd>
						<div class="imgcurd" style="margin-top:10px;text-align:center;">
							<input type="button" value="裁剪图片" onclick="var _pic_src=$('#thumbnail_{$this->form['field_name']} img').attr('alt');if(_pic_src) {openNewWindow('__APP__/Attachment/Attachment/manual_crop?pic_src='+_pic_src+'&related_table=$related_table&field_name={$this->form['field_name']}','图片裁剪',680,480);} else {_alert('未找到可裁剪图片！')}" class="smallSub" />
							<input type="button" value="删除图片" onclick="$('[name=\'info[{$this->form['field_name']}]\']').val('');$('#thumbnail_{$this->form['field_name']} img').attr('src','__PUBLIC__/modules/content/images/upload-pic.png');" class="smallSub" style="margin-left:10px;" />
						</div>
					</dd>
				</dl>
			</div>
html;
	}
	
	/**
	 * 入库前执行的操作
	 * @param mixed $value
	 * @param array $fieldArray
	 * @return void|Ambigous <>|multitype:boolean string |string
	 */
	public function before_storage($value,$fieldArray) {
		//没有缩略图时是否抓取
		$Model = new GlobalModel();
		if ($value) {
			$thumbnailArray = explode('|', $value);
			//if (Tool::encrypt($thumbnailArray[1].$thumbnailArray[0]) === $thumbnailArray[2]) {
				return $thumbnailArray[0];
			//} else {
				//$Model->writeLog('此操作者，非法修改图片数据值，危险操作', 'USER_ERROR');
				//unset($Model);
				//return  array('vail_status'=>false,'vail_info'=>'非法数据被拒绝');			
			//}
		} else {
			if ($_POST['intercept_image'] == 1) {
				$auto_thumb_num = intval($_POST['auto_thumb_num'])-1;
				preg_match_all('/<img[^>]*src=[\'"]?([^\'">]+)[\'"]?[^>]*>/smi', Field::$postData['content'], $matches);
				if (!$matches || empty($matches[1][$auto_thumb_num])) return ;
				//不作统计，如果没有这张图，那么则直接抓取不到
				$thumb_pic = ltrim($matches[1][$auto_thumb_num],__ROOT__.'/');
				/**此处重新copy是为了附件清理，避免编辑器和图片使用同一张，造成清理时图片丢失***/
				//拷贝文件，非相同文件名
				$newFilename = uniqid('cp_').'_'.basename($thumb_pic);
				$newPath = '/'.dirname($thumb_pic).'/'.$newFilename;
				$status = copy(__PATH__.$thumb_pic, __PATH__.$newPath);
				if (!$status) {
					$Model->writeLog("复制编辑器内图片至缩略图失败，复制的目标：$thumb_pic，属性编辑器的第{$_POST['auto_thumb_num']}张", 'SYSTEM_ERROR');
					unset($Model);
					return ;
				}
				/* copy成功复件入库 */
				//添加入库
				$Attachment = D('Attachment/Attachment');
				$attachData = array();
				$attachData['new_name'] = $attachData['name'] = '/'.$newFilename;
				$attachData['save_path'] = dirname($newPath);
				$attachData['size'] = filesize(__PATH__.$newPath);
				$appendData = array();
				$currentModel = F("models_{$fieldArray['mid']}");
				$appendData['related_table'] = $currentModel['table_name'];
				$status = $Attachment->addAttachment($attachData,$appendData);
				if ($status) {
//					$Attachment = D('Attachment/Attachment');
//					//自动裁图
//					if ($fieldArray['field_setting']['crop_type'] == 1) {
//						//裁剪方式 
//						$crop_value = array(
//							'size'=>array($fieldArray['field_setting']['crop_width'],$fieldArray['field_setting']['crop_height']),
//							'multiple'=>$fieldArray['field_setting']['crop_multiple']
//						);						
//						$Attachment->cropIMG($newPath,$fieldArray['field_setting']['crop_mode'],$crop_value);
//					}
//					//加水印
//					if ($fieldArray['field_setting']['water_mark'] == 1) {
//						$Attachment->waterIMG($newPath);
//					}
					return $newPath;
				} else {
					unlink(__PATH__.$newPath);
					$Model->writeLog('写入添加编辑器图片至缩略图附件表失败', 'SYSTEM_ERROR');
					return ;
				}
			}
		}
	}
	
	/* 默认字段长度 */
	public function getFieldLen() {
		return 100;
	}

}
?>