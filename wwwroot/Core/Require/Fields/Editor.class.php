<?php
/**
 * 编辑器字段段设置
 * @author CHENG
 */
class Editor extends Field {
	
	/* 显示字段样式 */
	public function show($value = '') {
		$toolbar_setting = SESSION_TYPE == 1 ? $this->setting['back_toolbar'] : $this->setting['front_toolbar'];
		if ($toolbar_setting == 'text') {
			$contentHtml = '<textarea name="info['.$this->form['field_name'].']" '.$this->form['input_attr'].'>'.$value.'</textarea>';
		} else {
			$small = "toolbars:[
			['fullscreen', 'source', '|', 'undo', 'redo','selectall', 'cleardoc', '|',
			'bold', 'italic', 'underline', '|','insertimage', '|', 'removeformat', 'autotypeset', '|','preview', 'searchreplace','help']]";
			$basic = "toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'forecolor', 'backcolor', 'removeformat', 'autotypeset', '|','blockquote', 'pasteplain', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
               'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
                'link', 'unlink', 'anchor', '|',
                'insertimage', 'insertvideo', 'music', 'attachment', 'pagebreak', '|',
                'horizontal', 'date', 'time', 'spechars', '|',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', '|',
                'preview', 'searchreplace', 'help']
        ]";
			$full = "toolbars:[
            ['fullscreen', 'source', '|', 'undo', 'redo', '|',
                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                'directionalityltr', 'directionalityrtl', 'indent', '|',
                'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                'insertimage', 'insertvideo', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe','insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', '|',
                'print', 'preview', 'searchreplace', 'help']
        ]";
			switch ($toolbar_setting) {
				case 'small':
					$toolbars = $small.",initialFrameWidth:'100%',initialFrameHeight:{$this->setting['height']}";
					break;
				case 'basic':
					$toolbars = $basic.",initialFrameWidth:'100%',initialFrameHeight:{$this->setting['height']}";
					break;
				case 'full':
					$toolbars = $full.",initialFrameWidth:'100%',initialFrameHeight:{$this->setting['height']}";
					break;
				case 'custom':
					if (SESSION_TYPE == 1) {
						$toolbars = "toolbars:{$this->setting['back_custom_toolbar']},initialFrameWidth:'100%',initialFrameHeight:{$this->setting['height']}";
					}else {
						$toolbars = "toolbars:{$this->setting['front_custom_toolbar']},initialFrameWidth:'100%',initialFrameHeight:{$this->setting['height']}";
					}
					break;
			}
			$toolbars = '{'.$toolbars.'}';
			//相关表related
			$model = F("models_{$this->form['mid']}");
			$related_table = $model['table_name'];
			$session_id = session_id();
			$contentHtml = <<<string
				<script type="text/javascript">var RELATED = '$related_table',SESSION_ID = '$session_id';window.UEDITOR_HOME_URL = '__PUBLIC__/js/UEditor/';</script>
string;
if(!defined('EDIT_INIT')) {
define('EDIT_INIT', 1);
$contentHtml .= <<<string
				<script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.config.js"></script><script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.all.min.js?11"></script>
string;
}
$contentHtml .= <<<string
				<script type="text/plain" id="{$this->form['field_name']}" name="info[{$this->form['field_name']}]">$value</script>
				<script type="text/javascript">UE.getEditor('{$this->form['field_name']}',$toolbars);</script>
string;

		}
$this->html = <<<str
	<div class="_content_top">$contentHtml</div>
str;

if($this->setting['bottom_toolbar']!=2){
$intercept_content = $this->setting['intercept_content']==1?'checked="checked"':'';
$intercept_image = $this->setting['intercept_image']==1?'checked="checked"':'';
$auto_thumb_num = $this->setting['auto_thumb_num']?$this->setting['auto_thumb_num']:1;
$this->html .= <<<str
			<div class="content_attr"><input type="checkbox" name="intercept_content" value="1" $intercept_content />&nbsp;当摘要为空时，截取内容至摘要&nbsp;&nbsp;<input type="checkbox" name="intercept_image" value="1" $intercept_image />是否获取内容第<input type="text" class="text" style="width:35px;" name="auto_thumb_num" value="$auto_thumb_num" />张图片作为标题图片 </div>
str;
}
		return $this->html;
	}

	/* 内置显示 方法*/
	protected function internal($value) {}
	
	
	/* 默认字段值设置 */
	public function getFieldLen() {
		return 0;
	}

	/***************=========自定义=================************************/
	//joke模型使用
	public function format_content($value,$fieldArray) {
		$value = Tool::filterData($value);
		return  str_replace(array(' ',"\r\n"), array('&nbsp;','<br />'), $value);
	}



	
}
?>