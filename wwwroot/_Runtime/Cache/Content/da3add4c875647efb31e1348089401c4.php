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
<script type="text/javascript" src="__PUBLIC__/js/insertsome.js"></script>
<div class="operateTitle">编辑URL规则</div>
<form action="__ACTION__" method="post" id="formData"><!-- id="postData" -->
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<input type="hidden" value="<?php echo $token?>" name="token" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">URL规则名</span></td>
			<td class="td_right">
				<input type="text" class="text" name="url_name" value="<?php echo $current['url_name']?>" datatype="s1-30" errormsg="URL规则名格式不正确！" size="20" />
				<span class="setDesc Validform_checktip">1-30个字符</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">所属模块</td>
			<td class="td_right">
				<select name="model">
					<option value="content" <?php echo $current['model']=='content' ? 'selected="selected"' : ''?> />内容模块</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">是否为静态HTML</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="is_html" <?php echo $current['is_html']==1 ? 'checked="checked"' : ''?> /> 是&nbsp;</label>
				<label><input type="radio" value="2" name="is_html" <?php echo $current['is_html']==2 ? 'checked="checked"' : ''?>  /> 否</label>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">URL规则</span></td>
			<td class="td_right">
				<input type="text" class="text" name="rule" value="<?php echo $current['rule']?>" size="70" id="urlRule" datatype="*1-255" errormsg="URL规则格式不正确！" />
				<span class="setDesc Validform_checktip">1-255个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">URL示例</td>
			<td class="td_right">
				<input type="text" class="text" name="example" value="<?php echo $current['example']?>" ignore="ignore"  datatype="*1-255" errormsg="URL示例格式不正确！" size="70" />
				<span class="setDesc Validform_checktip">255个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">URL变量说明</td>
			<td class="td_right">
				<input type="button" value="导航ID" class="smallSub" onclick="$('#urlRule').insert({text:'{$cid}'})" />&nbsp;&nbsp;
				<input type="button" value="内容ID" class="smallSub" onclick="$('#urlRule').insert({text:'{$aid}'})" />&nbsp;&nbsp;
				<input type="button" value="分页符" class="smallSub" onclick="$('#urlRule').insert({text:'{$page}'})" />&nbsp;&nbsp;
				<input type="button" value="导航目录" class="smallSub" onclick="$('#urlRule').insert({text:'{$navigate_dir}'})" />&nbsp;&nbsp;
				<input type="button" value="父导航目录" style="padding: 0px 5px;" class="smallSub" onclick="$('#urlRule').insert({text:'{$parent_navigate_dir}'})" />&nbsp;&nbsp;
				<input type="button" value="日期[年]" class="smallSub" onclick="$('#urlRule').insert({text:'{$y}'})" />&nbsp;&nbsp;
				<input type="button" value="日期[月]" class="smallSub" onclick="$('#urlRule').insert({text:'{$m}'})" />&nbsp;&nbsp;
				<input type="button" value="日期[日]" class="smallSub" onclick="$('#urlRule').insert({text:'{$d}'})" />&nbsp;&nbsp;
			</td>	
		</tr>
		<tr>
			<td class="td_left">其它附加变量[内容页使用]</td>
			<td class="td_right">
				<input type="text" size="70" value="<?php echo $current['append_var']?>" name="append_var" />
				<span class="setDesc Validform_checktip">请使用如下方式如：type_id=>{$tid}|game_id=>{$gid}</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="u_status"  <?php echo $current['u_status']==1 ? 'checked="checked"' : ''?> />启用</label>&nbsp;
				<label><input type="radio" value="2" name="u_status"  <?php echo $current['u_status']==2 ? 'checked="checked"' : ''?>  />禁用</label>
			</td>
		</tr>
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<input type="submit" name="send" class="sub" value="提交" />
				<input type="reset" class="sub" />
			</td>
		</tr>
	</table>
</form>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>