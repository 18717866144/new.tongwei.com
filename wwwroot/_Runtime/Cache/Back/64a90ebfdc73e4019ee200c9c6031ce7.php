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
<div class="content"  style="width:100%">
	<table class="showTable" width="100%">
		<tr>
			<th width="5%">ID</th>
			<th width="8%">模型类型</th>
			<th width="10%">模型名称</th>
			<th width="10%">模型主表</th>
			<th width="42%">模型备注</th>
			<th width="5%">状态</th>
			<th width="20%">操作</th>
		</tr>
		<?php foreach ($modelData as $values) {?>
			<tr>
				<td><?php echo $values['id']?></td>
				<td>
					<?php echo ($values['model_type']); ?>
				</td>
				<td><?php echo $values['model_name']?></td>
				<td><?php echo $values['table_name']?></td>
				<td><?php echo $values['remark']?></td>
				<td><?php echo $values['m_status']==1 ? '正常' : '禁用';?></td>
				<td>
				<a href="<?php echo U(GROUP_NAME.'/Fields/index',array('mid'=>$values['id'],'model_type'=>$values['model_type']))?>" class="operate">字段管理</a>&nbsp;&nbsp;
				<?php if ($values['model_type'] == 'form') {?>
				<a href="javascript:;" id="getScript" class="operate">script标签</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
				</td>
			</tr>
			<?php }?>
	</table>
</div>
<script type="text/javascript">
$(function(){
	$('#getScript').click(function(){
		art.dialog({
			title:'script标签',
			content:'&lt;script type="text/javascript" src="<?php echo U('Modules/Formindex/get_form_js',array('mid'=>'{-$Think.get.mid-}','cid'=>'{-$Think.get.cid-}','aid'=>'{-$Think.get.aid-}'))?>"&gt;&lt;/script&gt;',
			lock:true
		})
	})
})
</script>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>