<?php 
/**
 * 标题字段设置
 * @author CHENG
 */
class Title extends Field {
	
	/* 显示字段样式 */
	public function show($value = '') {
		if (is_array($value)) {
			$style = explode('|', $value['style']);
			$value = $value['title'];
		}
		if (SESSION_TYPE == 1) {
			if ($this->setting['back_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['back_field_tpl']}";
				$this->html = ob_get_contents();
				ob_clean();
			}  else {
				$this->html = $this->internal($value,$style);
			}
		} else {
			if ($this->setting['front_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['front_field_tpl']}";
				$this->html = ob_get_contents();
				ob_clean();
			}  else {
				$this->html = $this->internal($value,$style);
			}
		}
		return $this->html;
	}
	/* 系统内置字段样式 */
	protected function internal($value) {
		$style = func_get_arg(1);
		$style_string = $style ? "style=\"font-weight:{$style[1]};color:{$style[0]};\"" : '';
		return <<<str
		<script type="text/javascript" src="__PUBLIC__/modules/content/js/colorpicker.js"></script>
		<input type="text" name="info[{$this->form['field_name']}]" value="$value" id="title" class="title" {$this->form['input_attr']} $style_string />
		<input id="style_color" type="hidden" value="{$style[0]}" name="style_color" />
		<input id="style_font_weight" type="hidden" value="{$style[1]}" name="style_font_weight" />		
		&nbsp;<img style="cursor:pointer;" src="__PUBLIC__/modules/content/images/bold.png" class="pointer" onclick="setBold();" />
		&nbsp;<img style="cursor:pointer;" src="__PUBLIC__/modules/content/images/colour.png" class="pointer" onclick="colorpicker('title_colorpanel','set_title_color');" />
		<input id="style_font_size" type="text" style="width:15px" value="{$style[2]}" name="style_font_size" title="字体大小，目前仅用于首页头条" onchange="setHotSize();" />
		<span id="title_colorpanel" style="position:absolute;z-index:9999;" class="colorpanel"></span>
		<style type="text/css">#title_colorpanel table tr td {padding:0px;}</style>
		<script type="text/javascript">
		function set_title_color(color) {
			$('#title').css('color',color);
			$('#style_color').val(color);
		}
		function setBold() {
			var _thisV = $('#style_font_weight').val();
			if(_thisV == 'bold') {
				$('#style_font_weight').val('');
				$('#title').css('font-weight','normal');
			}else {
				$('#style_font_weight').val('bold');
				$('#title').css('font-weight','bold');
			}
		}
		function setHotSize() {
			var _size = $('#style_font_size').val();
			if(!_size) _size = '26';
			$('[name="info[title_hot]"]').css({'font-size':_size+'px'})
		}
		$(function(){
			var _sizeInit = '{$style[2]}';
			if(_sizeInit) setHotSize();
		})
		</script>
str;
	}

	/**默认字段长度 **/
	public function getFieldLen() {
		return 60;
	}
	
	
	
	/*******======================其它自定义模型=================================********/
	
	//笑话模型，截取内容
	public function inter_title($value,$fieldArray) {
		if ($value) {
			if (SESSION_TYPE == 1) {
				return $value;
			} else {
				$GlobalModel = new GlobalModel();
				$GlobalModel->writeLog('此用户恶意修改隐藏的Title字段，严重！', 'USER_ERROR');
				return array('vail_status'=>false,'vail_info'=>'非法数据，被拒绝！');
			}
		}
		return String::msubstr(str_replace(array("\r\n",'_HXCMS_PAGE_',' '), '', strip_tags(self::$postData['content'])), 0,255);
	}


}
?>