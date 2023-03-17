<?php
/**
 * 多文件字段设置
 * @author CHENG
 */
class Files extends Field {
	
	/* 字段显示 */
	public function show($value = '') {
		if (SESSION_TYPE == 1) {
			if ($this->setting['back_field_tpl']) {
				ob_start();
				require_once REQUIRE_PATH."Tpl/fields/{$this->form['form_type']}/{$this->setting['back_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		} else {
			if ($this->setting['front_field_tpl']) {
				ob_start();
				require_once REQUIRE_PATH."Tpl/fields/{$this->form['form_type']}/{$this->setting['front_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		}
		return $this->html;
	}
	
	/* 系统内置字段样式 */
	protected function internal($value) {
		//相关表related
		$model = F("models_{$this->form['mid']}");
		$related_table = $model['table_name'];
		if (empty($value)) {
			$fileValue = '';
		} else {
			$tempValue = json_decode($value,true);
			$fileValue = '';
			$mirrorValue = '';
			$m=0;
			foreach ($tempValue as $tempV) {
				$m++;
				if (stripos($tempV[0], 'http://') === 0 || stripos($tempV[0], 'https://') === 0) {//镜像
					$tokenValue = $tempV[0];
					$mirrorValue .= '<div>'.$m.'<a href="javascript:;" class="remove" onclick="$(this).parent().remove();" title="删除"><img src="/Public/modules/back/images/del.gif"></a> <a href="javascript:;" class="remove" onclick="M_down(this);" title="向下移动"><img src="/Public/modules/back/images/down.gif"></a>  <a href="javascript:;" class="remove" onclick="M_up(this);" title="向上移动"><img src="/Public/modules/back/images/up.gif"></a><ul>';
					$mirrorValue .= '<li><input type="text" name="info['.$this->form['field_name'].'][file][]" size="94" readonly="readonly" value="'.$tokenValue.'" /></li>';
					$mirrorValue .= '<li><textarea name="info['.$this->form['field_name'].'][explan][]" cols="100" rows="1">'.$tempV[1].'</textarea></li>';
					$mirrorValue .= '</ul></div>';
				} else {
					$randNum = mt_rand(1,9999);
					$token = Tool::encrypt($randNum.$tempV[0]);
					$tokenValue = $tempV[0].'|'.$randNum.'|'.$token;
					$fileValue .= '<div><span>'.$m.'</span><a href="javascript:;" class="remove" onclick="$(this).parent().remove();" title="删除"><img src="/Public/modules/back/images/del.gif"></a> <a href="javascript:;" class="remove" onclick="M_down(this);" title="向下移动"><img src="/Public/modules/back/images/down.gif"></a> <a href="javascript:;" class="remove" onclick="M_up(this);" title="向上移动"><img src="/Public/modules/back/images/up.gif"></a><ul>';
					$isShowIMG = $this->setting['allow_type'] == 'img' ? 'onclick="$.CR.G.showIMG(\''.$tempV[0].'\')"' : '';
					$fileValue .= '<li><input type="text" '.$isShowIMG.' name="info['.$this->form['field_name'].'][file][]" size="94" readonly="readonly" value="'.$tokenValue.'" /></li>';
					if($this->setting['is_title']>0){
						for($i=0;$i<$this->setting['is_title'];$i++){
							$n=$i+2;
							$fileValue .= '<li><input type="text" name="info['.$this->form['field_name'].'][title_'.$i.'][]" size="94" value="'.$tempV[$n].'" /></li>';
						}						
					}					
					$fileValue .= '<li><textarea name="info['.$this->form['field_name'].'][explan][]" cols="100" rows="1">'.$tempV[1].'</textarea></li>';
					$fileValue .= '</ul></div>';
				}
			}
			unset($tempValue);
		}
		$file_name = rawurlencode("info[{$this->form['field_name']}]");
		/* 多文件类型 */
		if ($this->setting['allow_type'] == 'img') {
			// 			裁剪设置
			$crop_value = $this->setting['crop_mode']==1 ? $this->setting['crop_width'].'_'.$this->setting['crop_height'] : $this->setting['crop_multiple'];
			// 		文件名，上传数目，是否加水印，裁剪类型，裁剪方式，裁剪值（如果为宽高，那么则用“宽_高”这种方式），相关表
			$token = Tool::encrypt("{$file_name}{$this->setting['allow_img_num']}{$this->setting['water_mark']}{$this->setting['crop_type']}{$this->setting['crop_mode']}$crop_value$related_table");
			$htmlString = <<<string
			<fieldset class="filesFieldset">
				<legend>图集列表</legend>
				<input type="hidden" name="info[{$this->form['field_name']}]">
				<div class="filesLists" id="{$this->form['field_name']}_filesLists">				
				$fileValue
				</div>
			</fieldset>
			<div class="atlas">
				<input type="button" value="上传图集" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name={$file_name}&up_num={$this->setting['allow_img_num']}&is_water={$this->setting['water_mark']}&crop_type={$this->setting['crop_type']}&crop_mode={$this->setting['crop_mode']}&crop_value=$crop_value&related=$related_table&is_title={$this->setting['is_title']}&token=$token','上传图集');" class="smallSub" />
			</div>			
string;
			
		} elseif ($this->setting['allow_type'] == 'media') {
			
		} elseif ($this->setting['allow_type'] == 'soft') {
// 			文件名/上传类型/上传数目/下载链接方式/下载类型
			$token = Tool::encrypt("{$file_name}{$this->setting['allow_type']}{$this->setting['allow_soft_num']}{$this->setting['download_link']}{$this->setting['download_type']}$related_table");
			$htmlString = <<<string
			<fieldset class="filesFieldset">				
				<dl class="mirror">
					<dt>远程镜像地址&nbsp;&nbsp;<a class="Plus" href="javascript:;" onclick="$('#mirror_list').children('div:first').clone().appendTo('#mirror_list').children('a').show().siblings('ul').find('input,textarea').val('');">[ + ]</a><a class="Minus" onclick="$('#mirror_list').children('div').length > 1 ? $('#mirror_list').children('div:last').remove() : ''" href="javascript:;">[ - ]</a></dt>
					<dd id="mirror_list" class="mirror_list">
						<div><a href="javascript:;" class="remove" onclick="$(this).parent().remove();" title="删除"><img src="/Public/modules/back/images/del.gif"></a> <a href="javascript:;" class="remove" onclick="M_down(this);" title="向下移动"><img src="/Public/modules/back/images/down.gif"></a>  <a href="javascript:;" class="remove" onclick="M_up(this);" title="向上移动"><img src="/Public/modules/back/images/up.gif"></a>
							<ul>
								<li><input type="text" name="info[{$this->form['field_name']}][file][]" size="94" value="http://" /></li>
								<li><textarea name="info[{$this->form['field_name']}][explan][]" cols="100" rows="1"></textarea></li>
							</ul>
						</div>
						$mirrorValue
					</dd>
				</dl>
				<dl class="localhost">
					<dt>本地真实地址</dt>
					<dd><div class="filesLists" id="{$this->setting['allow_type']}_filesLists">$fileValue</div></dd>
				</dl>
			</fieldset>
			<div class="atlas">
				<input type="button" value="上传文件" onclick="openNewWindow('__APP__/Attachment/Attachment/file?file_name={$file_name}&file_type={$this->setting['allow_type']}&up_num={$this->setting['allow_soft_num']}&download_link={$this->setting['download_link']}&download_type={$this->setting['download_type']}&related=$related_table&token=$token','上传文件');" class="smallSub" />
			</div>
string;
		}
$htmlString .=  <<<string
		<script>
			function M_up(obj){
				$(obj).parent("div").prev("div").insertAfter($(obj).parent("div"));
			}
			function M_down(obj){
				$(obj).parent("div").next("div").insertBefore($(obj).parent("div"));
			}
			</script>
string;
		return $htmlString;
		
	}

	/**
	 * 入库前
	 * @param mixed $value
	 * @param array $fieldArray
	 * @return string
	 */
	public function before_storage($value,$fieldArray) {
		$file = array();
		$i = 0;
		foreach ($value['file'] as $key=>$fileValue) {
			$fileValue = trim($fileValue);
			//去除重复
			if (empty($fileValue) || $fileValue == 'http://' || $fileValue == 'https://') {
				continue;
			}
			if (stripos($fileValue, 'http://') === 0 || stripos($fileValue, 'https://') === 0) {//镜像
				$filePath = $fileValue;
			} else {//非镜像
				$temp = explode('|', $fileValue);
				if (Tool::encrypt($temp[1].$temp[0]) !== $temp[2]) {
					if (!isset($Model)) $Model = new GlobalModel();
					$Model->writeLog("此用户上传的文件或图集token值被修改过，已自动剔除，疑似恶意操作！", 'USER_ERROR');
					continue;
				}
				$filePath = $temp[0];
			}
			$temp = array($filePath,$value['explan'][$key]);
			for($n=0;$n<$fieldArray['field_setting']['is_title'];$n++){
				array_push($temp,$value['title_'.$n][$key]);
			}
			$file[]	= $temp;		
			$i++;
		}
		return empty($file) ? '' : json_encode($file);
	}

	/* 得到字段默认长度 */
	public function getFieldLen() {
		return 0;
	}

	
}
?>