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
<div class="navi clearfix">
<div class="naviDesc">字段管理</div>
	<div class="naviAction">
		<a href="<?php echo U('index',array('group'=>'site'))?>" <?php if ($group=='site'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>站点配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'mutual'))?>" <?php if ($group=='mutual'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>交互配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'core'))?>" <?php if ($group=='core'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>核心配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'email'))?>" <?php if ($group=='email'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>邮件配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'attachment'))?>" <?php if ($group=='attachment'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>附件配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'debug'))?>" <?php if ($group=='debug'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>性能调试配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'ext'))?>" <?php if ($group=='ext'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>扩展配置</u>
		</a>
		<a href="<?php echo U('add')?>" <?php if (ACTION_NAME=='add') echo 'class="current"'?>>
			<u>添加配置</u>
		</a>
	</div>
</div>
<form method="post" action="__ACTION__">
<input type="hidden" value="<?php echo $group;?>" name="var_group" />
	<table class="showTable">
	<tr>
		<th align="left" width="15%">参数描述</th>
		<th align="left" width="55%">参数值</th>
		<th align="left" width="20%">参数名</th>
		<th align="left" width="5%">排序</th>
		<th  align="left" width="5%">操作</th>
	</tr>
		<?php foreach ($paramsData as $values) {?>
			<tr>
				<td width="14%" style="padding-left:1%;text-indent:0px;"><?php echo nl2br($values['var_desc'])?></td>
				<td>
					<?php switch ($values['var_type']) {case 'string':?>
							<input type="text" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="<?php echo htmlspecialchars($values['var_value'])?>" class="text" style="width:500px;" />
						<?php break;case 'numeric':?>
							<input type="text" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="<?php echo $values['var_value']?>" class="text" style="width:120px;" />
						<?php break;case 'boolean':?>
							<label><input type="radio" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="Y" <?php echo $values['var_value']=='Y'?'checked="checked"' : ''?> />&nbsp;是</label>&nbsp;&nbsp;
							<label><input type="radio" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="N" <?php echo $values['var_value']=='N'?'checked="checked"' : ''?> />&nbsp;否</label>
						<?php break;case 'textarea':?>
							<textarea class="textCont" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" style="height:70px;width:490px;"><?php echo htmlspecialchars($values['var_value'])?></textarea>
						<?php break;case 'array':?>
							<textarea class="textCont" style="width:490px;height:70px;" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]"><?php echo htmlspecialchars($values['var_value'])?></textarea>
						<?php break;?>
					<?php }?>
				</td>
				<td><?php echo $values['var_name']?></td>
				<td><input name="sort[<?php echo $values['id']?>]" class='text' tabindex='10' type='text' size='3' value="<?php echo $values['sort']?>" class='input' /></td>
				<td><a href="javascript:;" onclick="_confirm('是否确定要删除？',function(){window.location.href='<?php echo U('delete',array('id'=>$values['id']))?>'},$.noop)" class="operate">删除</a></td>
			</tr>
		<?php }?>
		<tr>
			<td colspan="5" style="padding-left:15%;text-align:left;" >
				<input type="submit" value="提交" name="send" class="sub" />
				<?php if (in_array('sort', $ruleOther)) {?>
					<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort')?>');" class="sub" />
				<?php }?>
			</td>
		</tr>
	</table>
</form>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>