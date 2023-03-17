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
<div class="search clearfix">
	<form action="__ACTION__" method="get" name="search_form">
		所属类别：<select name="type_id">
			<option value="">全部</option>
			<?php if(!empty($type)): if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php echo $_GET['type_id']==$v['id'] ? 'selected="selected"' : '';?>><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; endif; ?></select>
		
		&nbsp;&nbsp;状态：
		<select name="l_status">
			<option value="">全部</option>
			<option value="1" <?php echo $_GET['l_status']==1 ? 'selected="selected"' : '';?>>启用</option>
			<option value="2" <?php echo $_GET['l_status']==2 ? 'selected="selected"' : '';?>>停止</option>
		</select>		
		<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
	</form>
</div>

<table class="showTable" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr>		
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
        <th width="5%">排序</th>
        <th width="12%">标题</th>
		<th width="23%">连接</th>
        <th width="30%">图片</th>
		<th width="10%">所属类别</th>
        <th width="5%">状态</th>        
		<th width="10%">操作</th>
	</tr>            
	<?php if(!empty($data)): if(is_array($data[0])): foreach($data[0] as $key=>$values): ?><tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo ($values["id"]); ?>" /></td>
            <td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
            <td><?php echo ($values["title"]); ?></td>
            <td><?php echo ($values["url"]); ?></td>
            <td><?php echo ($values["picurl"]); ?></td>
            <td><?php echo $type[$values['type_id']]['type_name'];?></td>
			<td>
				<?php if($values['l_status'] == 1): ?>启用
				<?php else: ?>
					<span class="setRed">停用</span><?php endif; ?>
			</td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr><?php endforeach; endif; endif; ?>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<input type="button" value="启用" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>1))?>')" class="sub" />
	<input type="button" value="停用" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>-1))?>')" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>    
</div>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>