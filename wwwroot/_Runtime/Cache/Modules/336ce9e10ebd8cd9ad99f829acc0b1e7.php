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
		链接类别：<select name="type_id">
			<option value="">全部</option>
			<?php if(!empty($type)): if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php echo $_GET['type_id']==$v['id'] ? 'selected="selected"' : '';?>><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; endif; ?></select>
		链接位置：<select name="link_pos">
			<option value="">全部</option>
			<option value="1" <?php echo $_GET['link_pos']==1 ? 'selected="selected"' : '';?>>首页</option>
			<option value="2" <?php echo $_GET['link_pos']==2 ? 'selected="selected"' : '';?>>内页</option>
		</select>
		&nbsp;&nbsp;链接状态：
		<select name="l_status">
			<option value="">全部</option>
			<option value="1" <?php echo $_GET['l_status']==1 ? 'selected="selected"' : '';?>>已审核</option>
			<option value="2" <?php echo $_GET['l_status']==2 ? 'selected="selected"' : '';?>>未审核</option>
		</select>
		&nbsp;&nbsp;网站名称 <input type="text" class="text" size="30" value="<?php echo ($_GET['web_name']); ?>" name="web_name" />&nbsp;&nbsp;
		<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
	</form>
</div>
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="5%">排序</th>
		<th width="8%">网站名称</th>
		<th width="15%">图片Logo</th>
		<th width="7%">链接类别</th>
		<th width="7%">链接位置</th>
		<th width="12%">时间</th>
		<th width="8%">联系人</th>
		<th width="8%">联系QQ</th>
		<th width="5%">状态</th>
		<th width="10%">操作</th>
	</tr>
	<?php if(!empty($data)): if(is_array($data[0])): foreach($data[0] as $key=>$values): ?><tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo ($values["id"]); ?>" /></td>
			<td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
			<td><?php echo ($values["id"]); ?></td>
			<td><a href="<?php echo ($values["web_url"]); ?>" title="<?php echo ($values["web_url"]); ?>" target="_blank"><?php echo ($values["web_name"]); ?></a></td>
			<td><?php echo empty($values['web_logo']) ? '' : '<img src="__ROOT__/'.$values['web_logo'].'" width="88" height="32" />';?></td>
			<td><?php echo $type[$values['type_id']]['type_name'];?></td>
			<td><?php echo ($values['link_pos']==1 ? '首页' : '内页'); ?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time']);?></td>
			<td><?php echo ($values["username"]); ?></td>
			<td><?php echo ($values["qq"]); ?></td>
			<td>
				<?php if($values['l_status'] == 1): ?>正常
				<?php else: ?>
					<span class="setRed">隐藏</span><?php endif; ?>
			</td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr><?php endforeach; endif; ?>
		<tr>
			<td colspan="12">
				<?php echo ($data[1]); ?>			
			</td>
		</tr><?php endif; ?>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>
</div>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>