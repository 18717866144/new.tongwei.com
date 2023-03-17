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
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="10%">角色名称</th>
		<th width="55%">角色备注</th>
		<th width="5%">状态</th>
		<th width="20%">操作</th>
	</tr>
	<?php foreach ($adminGroup as $values) {?>
	<tr>
		<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
		<td><?php echo $values['id']?></td>
		<td><?php echo $values['title']?></td>
		<td style="text-align:left;"><?php echo $values['remark']?></td>
		<td><?php echo $values['status']==1 ? '正常' : '禁用';?></td>
		<td>
			<?php if ($values['is_super'] == 1) {?>
				<span class="disabled">导航权限</span>&nbsp;&nbsp;
				<span class="disabled">系统权限</span>&nbsp;&nbsp;
				<span class="disabled">编辑</span>&nbsp;&nbsp;
				<span class="disabled">删除</span>
			<?php } else {?>
				<?php if (in_array('set_navigate', $ruleOperate)) {?>
				<a href="javascript:;" class="operate" onclick="openNewWindow('<?php echo U('set_navigate',array('id'=>$values['id']))?>','导航权限')">导航权限</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('set_rule', $ruleOperate)) {?>
				<a href="javascript:;" class="operate" onclick="openNewWindow('<?php echo U('set_rule',array('id'=>$values['id']))?>','系统权限')">系统权限</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('edit', $ruleOperate)) {?>
				<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
				<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>
				<?php }?>
			<?php }?>
		</td>
	</tr>
	<?php }?>
</table>
<div class="btns">
<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete')?>')});" class="sub" />
	<?php }?>
</div>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>