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
<div class="topTip"><b>提示：</b>安装或修改模块后，必须更新系统缓存才可生效，非超管权限用户需要修改相应权限组； </div>
<table class="showTable">
	<tr>
		<th width="10%">模块名称</th>
		<th width="10%">模块目录</th>
		<th width="5%">版本号</th>
		<th width="15%">安装日期</th>
		<th width="15%">更新日期</th>
		<th width="25%">模块数据表</th>
		<th width="15%">操作</th>
	</tr>
		<?php foreach ($modules as $values) {?>
		<tr>
			<td><?php echo $values['module_name']?></td>
			<td><?php echo $values['module_dir']?></td>
			<td><?php echo $values['version']?></td>
			<td><?php echo $values['install_time']?></td>
			<td><?php echo $values['update_time']?></td>
			<td><?php echo $values['install_table']?></td>
			<td>
				<?php if ($values['is_install'] == 3) {?>
					<span class="disabled">内置</span>
				<?php } elseif ($values['is_install'] == 1) {?>
						<?php if (in_array('delete', $ruleOperate)) {?>
							<a href="javascript:;" onclick="_confirm('是否确定要卸载？',function(){location.href='<?php echo U('delete',array('module_dir'=>$values['module_dir']))?>'})">卸载</a>
						<?php }?>
							<?php if (in_array('m_status', $ruleOperate)) {?>
							&nbsp;|&nbsp;
							<?php if ($values['is_disabled'] == 1) { ?>
								<a href="<?php echo U('m_status',array('module_dir'=>$values['module_dir'],'m_status'=>2))?>">禁用</a>
							<?php } else {?>
								<a href="<?php echo U('m_status',array('module_dir'=>$values['module_dir'],'m_status'=>1))?>"  class="setRed">开启</a>
							<?php }?>
						<?php }?>
				<?php  } else {?>
						<?php if (in_array('add', $ruleOperate)) {?>
							<a href="<?php echo U('add',array('module_dir'=>$values['module_dir']))?>" class="setGreen">安装</a>
						<?php }?>
				<?php }?>
			</td>
		</tr>
		<?php }?>
</table>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>