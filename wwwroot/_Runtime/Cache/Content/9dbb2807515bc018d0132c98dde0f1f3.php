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
<table class="showTable">
	<tr>
		<th width="3%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="5%">排序</th>
		<th width="25%" style="text-align:left;">栏目名称</th>
		<th width="8%">栏目目录</th>
		<th width="8%">栏目类型</th>
		<th width="8%">所属模型</th>
		<th width="5%">显示</th>
		<th width="5%">状态</th>
		<th>操作</th>
	</tr>
	<?php echo $column_str ?>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort();" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete');?>')});" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="显示" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'c_status','status'=>1));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="隐藏" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'c_status','status'=>2));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="正常" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'is_show','status'=>1));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="禁用" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'is_show','status'=>2));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('update_url', $ruleOther)) {?>
		<input type="button" value="更新URL" onclick="$.CR.G.bulkAction('<?php echo U('update_url');?>')" class="sub" />
	<?php }?>
	<?php if (in_array('create_html', $ruleOther)) {?>
		<input type="button" value="更新HTML" onclick="$.CR.G.bulkAction('<?php echo U('create_html');?>')" class="sub" />
	<?php }?>
</div>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>