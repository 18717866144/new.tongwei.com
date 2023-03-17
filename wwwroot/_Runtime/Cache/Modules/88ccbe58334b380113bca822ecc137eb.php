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
	<table>
		<tr>
			<td class="td_left">搜索[Search]：</td>
			<td class="td_right">
				<div>
					时间：<?php echo FormElements::date('start_time',$_GET['start_time'],0,1)?> 到 <?php echo FormElements::date('end_time',$_GET['end_time'],0,0)?>
					&nbsp;&nbsp;
					IP段：<input type="text" name="start_ip" size="15" value="<?php echo $_GET['start_ip']?>" />&nbsp;-&nbsp;
					<input type="text" name="end_ip" size="15" value="<?php echo $_GET['end_ip']?>" />&nbsp;&nbsp;
					
				</div>
				<div class="marginTop10">
					评论人ID：<input type="text" size="18" name="userid" value="<?php echo $_GET['userid']?>" />&nbsp;&nbsp;
					回复人ID：<input type="text" size="18" name="rel_userid" value="<?php echo $_GET['rel_userid']?>" />&nbsp;&nbsp;
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
				</div>
			</td>
		</tr>
	</table>
</form>
</div>
<table class="showTable">
	<tr>
		<th width="3%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="7%">评论人</th>
		<th width="7%">回复人</th>
		<th width="10%">评论文章</th>
		<th width="43%">评论内容</th>
		<th width="15%">IP地址</th>
		<th width="10%">时间</th>
		<th width="5%">是否审核</th>
		<th width="5%">用户删除</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id'];?></td>
			<td><?php echo $values['username'];?>/<?php echo $values['rel_userid']?></td>
			<?php if ($values['rel_id'] == 0) {?>
			<td>No1</td>
			<?php } else {?>
			<td><?php echo $values['rel_email'] ? $values['rel_email'] : '游客';?>/<?php echo $values['rel_userid']?></td>
			<?php }?>
			<td><a href="<?php echo $values['article']['url'];?>" target="_blank">[<?php echo $values['navigate'];?>]<?php echo String::msubstr($values['article']['title'], 0,20,'UTF-8');?></a></td>
			<td style="text-align:left;overflow:hidden;"><a href="javascript:;" onclick="art.dialog({title:'评论详情',content:$(this).html()})"><?php echo $values['content']?></a></td>
			<td><?php echo $values['ip_location']['country'].'['.$values['ip_location']['area'].']('.$values['ip'].')'?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td><?php if ($values['is_checked'] == 1) {echo '正常';} elseif($values['is_checked']==2){echo '<span class="setGreen">未审核</span>';} else {echo '<span class="setRed">未通过</span>';}?></td>
 			<td><?php if ($values['is_delete'] == 1) {echo '正常';} else {echo '<span class="setRed">删除</span>';}?></td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="10"><?php echo $data[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('audit', $ruleOther) && (SUPER_ADMIN || $adminNavigate['admin_audit'])) {?>
		<input type="button" value="审核" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>1))?>')" class="sub" />
		<input type="button" value="未通过" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>3))?>')" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete')?>')});" class="sub" />
	<?php }?>
</div>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>