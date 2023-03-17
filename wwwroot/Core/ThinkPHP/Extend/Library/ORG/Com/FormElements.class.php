<?php
class FormElements {
	
	static public function radio($options,$field_name,$value = '',$input_attr = '') {
		$html = '';
		foreach ($options as $key=>$values) {
			$checked = in_array($key, $value) ? 'checked="checked"' : ''; 
			$html .='<label><input type="radio" name="'.$field_name.'" value="'.$key.'" '.$checked.'  '.$input_attr.' />&nbsp;'.$values.'</label>&nbsp;&nbsp;'; 
		}
		return $html;
	}
		
	static public function checkbox($options,$field_name,$value,$input_attr = '') {
		$html = '';
		foreach ($options as $key=>$values) {
			$checked = in_array($key, $value) ? 'checked="checked"' : ''; 
			$html .= '<label><input type="checkbox" name="'.$field_name.'" value="'.$key.'" '.$checked.' '.$input_attr.' /> '.$values.'</label>&nbsp;&nbsp;';
		}
		return $html;
	}
	
	static public function select($options,$field_name,$value='',$input_attr='',$ismultiple = false) {
		if ($ismultiple) {
			$ismultiple = 'multiple="multiple"';
		}
		$html = "<select name=\"$field_name\" $ismultiple $input_attr $class>";
		foreach ($options as $key=>$values) {
			if (is_array($value)) {
				$selected = in_array($key, $value) ? 'selected="selected"' : '';
			}else {
				$selected = $key==$value ? 'selected="selected"' : '';
			}
			$html .= '<option value="'.$key.'" '.$selected.'>'.$values.'</option>';
		}
		return $html .= '</select>';
	}
	
	public static function input($fieldName,$value = '',$input_attr = '') {
		return '<input type="text" value="'.$value.'" '.$input_attr.' name="'.$fieldName.'" />';
	}
	public static function password($fieldName,$value = '',$input_attr = '') {
		return '<input type="password" value="'.$value.'" '.$input_attr.' name="'.$fieldName.'" />';
	}
	
	public static function textarea($fieldName,$value = '',$input_attr = '') {
		return '<textarea '.$input_attr.' name="'.$fieldName.'">'.$value.'</textarea>';
	}
	
	/**
	 * 模板选择
	 * @param $style  风格
	 * @param $module 模块
	 * @param $id 默认选中值
	 * @param $str 属性
	 * @param $pre 模板前缀
	 */
	public static function selectTemplate($dirpath = 'Content/show') {
		//先读取上传的模板
		$dirpath = trim($dirpath,'/');
		$dirpathArr = explode('/',$dirpath);
// 	模板目录
		$defaultSkin = C('DEFAULT_SKIN') ?  C('DEFAULT_SKIN') : 'Default';
		$defaultSkin = $defaultSkin . '/Pc';
		$filepath = TEMPLATE_PATH . $defaultSkin . '/' . $dirpath . '/';
		$configpath = TEMPLATE_PATH . $defaultSkin . '/' . $dirpathArr[0] . '/config.php';
		$skinname = array();
		if(file_exists($configpath)){
			$skinname = require $configpath;
		}
// 	取出原文件
		$tp_show =  str_replace($filepath, '', glob($filepath ."*.php"));
		$new_tpl = array();
		foreach ($tp_show as $k => $v) {
			$n = $dirpathArr[1].'/'.$v;
			$new_tpl[$v] = $v.($skinname[$n]?" ({$skinname[$n]})":'');			
		}
		//print_r($new_tpl);exit;
		return $new_tpl;
	}
	
	public static function selectDir($dirpath = 'Content/show') {
		//先读取上传的模板
		$dirpath = trim($dirpath,'/');
		$dirpathArr = explode('/',$dirpath);
		// 	模板目录
		$defaultSkin = C('DEFAULT_SKIN') ?  C('DEFAULT_SKIN') : 'Default';
		$defaultSkin = $defaultSkin . '/Pc';
		$filepath = TEMPLATE_PATH . $defaultSkin . '/' . $dirpath . '/';
		$configpath = TEMPLATE_PATH . $defaultSkin . '/' . $dirpathArr[0] . '/config.php';
		$skinname = array();
		if(file_exists($configpath)){
			$skinname = require $configpath;
		}
		// 取出原文件
		$tp_show =  str_replace($filepath, '', glob($filepath."*"));
		$new_tpl = array();
		foreach ($tp_show as $k => $v) {
			$v = trim($v,'/');
			$n = 'extend/'.$v;
			$new_tpl[$v] = $v.($skinname[$n]?" ({$skinname[$n]})":'');			
		}		
		return $new_tpl;
	}
	
	public static function selectUrl($model,$typeFile,$isHtml,$selectName,$value = '') {
		$UrlRule = M('UrlRule');
		$urlArr = $UrlRule->where("model='$model' AND url_name='$typeFile' AND is_html=$isHtml AND u_status=1")->select();
		$newArr = array();
		foreach ($urlArr as $values) {
			$newArr[$values['id']] = $values['example'];
		}
		return self::select($newArr, $selectName,$value);
	}
	
	/**
	 * 日期时间控件
	 * 
	 * @param $name 控件name，id
	 * @param $value 选中值
	 * @param $isdatetime 是否显示时间
	 * @param $loadjs 是否重复加载js，防止页面程序加载不规则导致的控件无法显示
	 * @param $showweek 是否显示周，使用，true | false
	 */
	public static function date($name, $value = '', $isdatetime = 0, $loadjs = 0, $showweek = 'true', $timesystem = 1, $otherTxt='') {
		if($value == '0000-00-00 00:00:00') $value = '';
		$id = preg_match("/\[(.*)\]/", $name, $m) ? $m[1] : $name;
		if($isdatetime) {
			$size = 21;
			$format = '%Y-%m-%d %H:%M:%S';
			if($timesystem){
				$showsTime = 'true';
			} else {
				$showsTime = '12';
			}
			
		} else {
			$size = 10;
			$format = '%Y-%m-%d';
			$showsTime = 'false';
		}
		$str = '';
		if($loadjs || !defined('CALENDAR_INIT')) {
			define('CALENDAR_INIT', 1);
			$str .= '<link rel="stylesheet" type="text/css" href="'.__PUBLIC__.'/js/calendar/jscal2.css"/>
			<link rel="stylesheet" type="text/css" href="'.__PUBLIC__.'/js/calendar/border-radius.css"/>
			<link rel="stylesheet" type="text/css" href="'.__PUBLIC__.'/js/calendar/win2k.css"/>
			<script type="text/javascript" src="'.__PUBLIC__.'/js/calendar/calendar.js"></script>
			<script type="text/javascript" src="'.__PUBLIC__.'/js/calendar/lang/en.js"></script>';
		}
		$str .= '<input type="text" name="'.$name.'" id="'.$id.'" value="'.$value.'" size="'.$size.'" class="date" "'.$otherTxt.'" readonly>&nbsp;';
		$str .= '<script type="text/javascript">
			Calendar.setup({
			weekNumbers: '.$showweek.',
		    inputField : "'.$id.'",
		    trigger    : "'.$id.'",
		    dateFormat : "'.$format.'",
		    showTime   : '.$showsTime.',
		    minuteStep : 1,
		    onSelect   : function(){this.hide();}
			});
        </script>';
		return $str;
	}
	
	/**
	 * 编辑器
	 * @param $name 控件name，id
	 * @param $value 选中值
	 * @param $isdatetime 是否显示时间
	 * @param $loadjs 是否重复加载js，防止页面程序加载不规则导致的控件无法显示
	 * @param $showweek 是否显示周，使用，true | false
	 */
	public static function edit($name, $toolbar_setting='',$height=200,$width=0) {			
		$small = "toolbars:[
		['fullscreen', 'source', '|', 'undo', 'redo','|',
			'bold', 'italic', 'underline','forecolor', 'backcolor', 'fontfamily', 'fontsize', 'justifyleft', 'justifycenter', 'justifyright','|', 'removeformat', 'autotypeset', '|','insertimage']]";
		$basic = "toolbars:[
		['fullscreen', 'source', '|', 'undo', 'redo', '|',
			'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
			'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
			'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
			'directionalityltr', 'directionalityrtl', 'indent', '|',
			'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
			'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
			'insertimage','insertvideo', 'music', 'attachment', 'map', 'pagebreak', 'template',  '|',
			'horizontal', 'date', 'time', 'spechars',  'wordimage', '|',
			'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', '|',
			'print', 'preview', 'searchreplace', 'help']
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
			$width = $width ? $width : "'100%'";
			switch($toolbar_setting) {
				case 'small':
					$toolbars = $small.",initialFrameWidth:".$width.",initialFrameHeight:".$height;
					break;
				case 'basic':
					$toolbars = $basic.",initialFrameWidth:".$width.",initialFrameHeight:".$height;
					break;
				case 'full':
					$toolbars = $full.",initialFrameWidth:".$width.",initialFrameHeight:".$height;
					break;
				default :
					$toolbars = "initialFrameWidth:".$width.",initialFrameHeight:".$height;
				break;
			}
			$toolbars = '{'.$toolbars.'}';			
			$session_id = session_id();
			$contentHtml = '';
			if(!defined('EDIT_INIT')) {
				define('EDIT_INIT', 1);
				$contentHtml .= '<script type="text/javascript">var RELATED = "single",SESSION_ID = "'.$session_id.'";window.UEDITOR_HOME_URL ="__PUBLIC__/js/UEditor/";</script><script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.config.js"></script><script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.all.min.js"></script>';
			}
			$contentHtml .= '<script type="text/javascript">UE.getEditor("'.$name.'",'.$toolbars.');</script>';
		return $contentHtml;
	}
	
	
}
?>