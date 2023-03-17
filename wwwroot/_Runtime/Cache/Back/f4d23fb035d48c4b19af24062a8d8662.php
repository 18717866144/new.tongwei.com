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
<div class="operateTitle">更新系统缓存</div>
<table class="formTable">
	<tr>
		<td class="td_left">更新导航缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'navigate'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">更新系统模型</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'models'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">管理员组权限</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'admin_rule'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">管理组导航</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'admin_navigate'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">会员组权限</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'member_rule'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">系统日志</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'logs'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">模块缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'modules'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">Memcache</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'compile'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">系统编译缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'compile'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">系统临时缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'temp'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">字段缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'field'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
    <tr>
		<td class="td_left">地区缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'regions'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">全部缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'all'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
</table>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>