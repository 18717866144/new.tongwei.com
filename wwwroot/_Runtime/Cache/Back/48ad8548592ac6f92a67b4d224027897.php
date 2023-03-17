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
<div class="operateTitle">修改我的信息</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="Validform_label">密码：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="password" datatype="/^(.{6,16})?$/" errormsg="密码格式不正确！" />
				<span class="setDesc Validform_checktip">6-16个字符之间，为空则不修改</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">真实姓名：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="truename" value="<?php echo $session['truename']?>" datatype="/^[\u4E00-\uFA29]{2,7}$/" ignore="ignore" errormsg="真实姓名格式不正确！" />
				<span class="setDesc Validform_checktip">2-7个字符之间，只能是汉字</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">Q Q：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="qq" value="<?php echo $session['qq']?>" datatype="/^[1-9][0-9]{4,10}$/" errormsg="QQ号码格式不正确！" ignore="ignore" />
				<span class="setDesc Validform_checktip">请输入正确的QQ号码。</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">备注：</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="remark" datatype="s1-255" errormsg="备注格式不正确！"  ignore="ignore"><?php echo $session['remark']?></textarea>
				<span class="setDesc Validform_checktip"></span>
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