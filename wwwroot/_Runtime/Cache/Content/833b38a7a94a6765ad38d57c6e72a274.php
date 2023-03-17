<?php if (!defined('THINK_PATH')) exit(); if (!defined('HX_CMS')) exit();?>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<title><?php echo C('WEB_NAME');?> - 内容管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/modules/css/basic.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/validform/css/style.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/validform/js/Validform.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="__PUBLIC__/modules/js/global.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/global.js"></script>
<script type="text/javascript">
var WEB_URL = '<?php echo C('WEB_URL');?>',_PUBLIC_ = '__PUBLIC__',_ROOT_ = '__ROOT__',_APP_ = '__APP__',_VAR_GROUP_='<?php echo C('VAR_GROUP') ;?>',_VAR_MODULE_='<?php echo C('VAR_MODULE') ;?>',_VAR_ACTION_='<?php echo C('VAR_ACTION') ;?>',JSONP_CALLBACK='<?php echo C('VAR_JSONP_HANDLER')?>',FACE_NUM = 70,_GROUP_NAME_='<?php echo GROUP_NAME;?>',_MODULE_NAME_='<?php echo MODULE_NAME;?>',_ACTION_NAME_='<?php echo ACTION_NAME;?>',_GROUP_ = _APP_+'?'+_VAR_GROUP_+'='+_GROUP_NAME_,_URL_ = _GROUP_+'&'+_VAR_MODULE_+'='+_MODULE_NAME_,_ACTION_ = _URL_+'&'+_VAR_ACTION_+'='+_ACTION_NAME_;
</script>
</head>
<body>
<?php if (!defined('HX_CMS')) exit();?>
<?php if($parentRuleName || $ruleLink){?>
<div class="navi clearfix">
	<div class="naviDesc"><?php echo $parentRuleName?></div>
	<div class="naviAction">
		<?php foreach ($ruleLink as $values) { $rule = explode('/',$values['name']); ?>
		<a class="<?php echo ACTION_NAME==$rule[3] ? 'current' : '';?>" href="<?php echo U(trim($values['name'],'/')) ?>">
			<u><?php echo $values['title']?></u>
		</a>
		<?php }?>
	</div>
</div>
<?php }?>
<link href="__PUBLIC__/modules/content/css/navigate.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">var RELATED = 'single',SESSION_ID = '<?php echo session_id();?>';window.UEDITOR_HOME_URL = '__PUBLIC__/js/UEditor/';</script>
<script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.config.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.all.min.js"></script>
<div class="operateTitle">添加单页导航</div>
<form method="post" action="__ACTION__" id="formData">
	<ul class="titleDesc">
		<li class="set">基本信息</li><li>选项设置</li><li>SEO设置</li><li>URL/HTML设置</li><li>模板设置</li>
	</ul>
	<div class="main_1 globalMain">
		<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">上级导航</span></td>
			<td class="td_right">
				<select name="pid" class="selectPColumn">
					<option value="0">[≡ 作为顶级导航 ≡]</option>
					<?php echo ($parent_navigate); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">导航名称</span></td>
			<td class="td_right">
				<input type="text" name="navigate_name" class="text" size="25" datatype="*1-20" errormsg="导航名称格式不正确！" />
				<span class="setDesc Validform_checktip">1-20个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp; <span class="Validform_label">导航标识(目录)</span></td>
			<td class="td_right">
				<input type="text" name="navigate_mark" ajaxurl="<?php echo U('Back/Public/check_navigate_mark')?>"  size="25" datatype="/^[\w\-\.\_]{0,29}$/i" class="text" errormsg="导航标识格式不正确！" />
				<span class="setDesc Validform_checktip">1-30个字符之间，以字母开头，只是能是英文或数字或下划线，必须惟一</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">导航缩略图</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="thumbnail" ondblclick="$.CR.G.showIMG(this.value);" value="" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=thumbnail&up_num=1&related=navigate&token=<?php echo Tool::encrypt('thumbnail1navigate')?>','图片上传');" class="sub" />
					<input type="button" value="裁剪图片" onclick="crop();" class="sub" />
					<input type="button" value="删除图片" onclick="$('[name=\'thumbnail\']').val('');" class="sub" />
				</div>
			</td>
		</tr>
        <tr>
			<td class="td_left">导航大图</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="setting[pic]" value="" ondblclick="$.CR.G.showIMG(this.value);" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=setting[pic]&up_num=1&related=navigate&token=<?php echo Tool::encrypt(rawurlencode('setting[pic]').'1navigate')?>','图片上传');" class="sub" />
					<input type="button" value="裁剪图片" onclick="crop();" class="sub" />
					<input type="button" value="删除图片" onclick="$('[name=\'setting[pic]\']').val('');" class="sub" />
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">导航排序</span></td>
			<td class="td_right">
				<input type="text" value="1" size="10" name="sort" class="text short" datatype="/^[1-9][\d]{0,7}$/" errormsg="导航排序格式不正确！" />
				<span class="Validform_checktip setDesc">1-8个数字，第一位非零</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">导航简介</td>
			<td class="td_right">
				<textarea cols="60" class="textCont" name="synopsis" datatype="*1-255" errormsg="导航简介格式不正确！" ignore="ignore"></textarea>
				<span class="setDesc Validform_checktip">255个字符以内</span>
			</td>
		</tr>
        <tr>
			<td class="td_left">频道导航</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="is_channel" /> 是</label>
				<label><input type="radio" value="2" name="is_channel" checked="checked" /> 否</label>
				<span class="Validform_checktip">频道导航可添加子栏目。</span>
			</td>
		</tr>
            <tr>
                <td class="td_left"><span class="Validform_label">子分类</span></td>
                <td class="td_right">
                    <input type="text" name="cate_name" class="text" size="25" datatype="/^[\w\-\.\_]{0,29}$/i" errormsg="分类标识格式不正确！"/>
                    <span class="setDesc Validform_checktip">1-20个字符之间</span>
                </td>
            </tr>
		</table>
	</div>
	<div class="main_2 globalMain none">
		<table class="formTable">
		<tr>
			<td class="td_left">导航状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" checked="checked" name="c_status" />正常</label>
				<label><input type="radio" value="2" name="c_status" /> 禁用</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">显示状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" checked="checked" name="is_show"  /> 显示</label>
				<label><input type="radio" value="2" name="is_show" /> 隐藏</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		</table>
	</div>
	<div class="main_3 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">SEO标题</td>
				<td class="td_right">
					<input type="text" name="title" class="text long" datatype="*1-60" size="50" ignore="ignore" errormsg="SEO标题格式不正确！" />
					<span class="Validform_checktip setDesc">60个字符以内</span>
				</td>
			</tr>
			<tr>
				<td class="td_left">SEO关键字</td>
				<td class="td_right">
					<input type="text" name="keywords" class="text long" size="50" datatype="*1-100" ignore="ignore" errormsg="SEO关键字格式不正确！" />
					<span class="Validform_checktip setDesc">100个字符以内</span>
				</td>
			</tr>
			<tr>
				<td class="td_left">SEO描述</td>
				<td class="td_right">
					<textarea name="description" class="textCont long" cols="60" datatype="*1-255" ignore="ignore" errormsg="SEO描述格式不正确！" ></textarea>
					<span class="Validform_checktip setDesc">255个字符以内</span>
				</td>
			</tr>
		</table>
	</div>
	<div class="main_4 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">导航生成HTML</td>
				<td class="td_right">
					<label><input type="radio" name="setting[navigate_is_html]" value="1" onclick="$('div.column_html').show().siblings().hide()" checked="checked" /> 是</label>
					<label><input type="radio" name="setting[navigate_is_html]"  onclick="$('div.column_no_html').show().siblings().hide()" value="2"  /> 否</label>  
				</td>
			</tr>
			<tr>
				<td class="td_left">链接地址</td>
				<td class="td_right">
					<div class="column_html" ><?php echo ($columnUrlData_html); ?></div>
					<div class="column_no_html" style="display: none;"><?php echo ($columnUrlData_nohtml); ?></div>
				</td>
			</tr>
		</table>
	</div>
	<div class="main_5 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">单页模板：</td>
				<td class="td_right">
				 	<?php echo $column_index_tpl;?>
				</td>
			</tr>
		</table>
	</div>
	
	<div style="margin-top:10px;margin-left:180px;">
		<input type="submit" value="提交" name="send" class="sub" />
		<input type="reset" value="重填" class="sub" />
	</div>
</form>
<script type="text/javascript">
$(function(){$('.titleDesc li').click(function(){$(this).addClass('set').siblings().removeClass('set');var _index = $(this).index();$('.main_'+(_index+1)).show().siblings('[class^="main"]').hide();})})
</script>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>