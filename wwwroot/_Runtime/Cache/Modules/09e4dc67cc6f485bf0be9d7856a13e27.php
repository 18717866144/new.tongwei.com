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
			<td class="td_left">搜索：</td>
			<td class="td_right">
					专题类别 <select name="type_id">
						<option value="">全部</option>
			<?php if(!empty($type)): if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php echo $_GET['type_id']==$v['id'] ? 'selected="selected"' : '';?>><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; endif; ?>
					</select>&nbsp;&nbsp;
                    时间 <?php echo FormElements::date('start_time',$_GET['start_time'],0,1)?> 到 <?php echo FormElements::date('end_time',$_GET['end_time'],0,0)?>
					关键词 <input type="text" size="18" name="q" value="<?php echo $_GET['q']?>" />
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
			</td>
			
			<td>
			<a href="javascript:;" id="special_index_html">更新专题列表</a>
			</td>
			
		</tr>
	</table>
</form>
</div>

<script>

$('#special_index_html').click(function(){
	
	$.post(
	    '/tospecialhtml.php',
		{type:'special_index'},
		function(e){
			if(e==1)
			{
				alert('专题列表页面更新成功');
			}
			else{
				alert('更新失败');
			}
			
		}
	
	
	);	
	
});




</script>

<table class="showTable" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr>		
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
        <th width="5%">ID</th>
        <th width="5%">排序</th>
        <th>专题信息</th>
		<th width="15%">操作</th>
	</tr>
	<?php if(!empty($data)): if(is_array($data[0])): foreach($data[0] as $key=>$values): ?><tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo ($values["id"]); ?>" dtoken="<?php echo Tool::encrypt($values['id'].$mr)?>" /></td>
            <td><?php echo ($values["id"]); ?></td>
            <td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
            <td>
                <table width="100%"><tr><td width="150" style="border-bottom:none;"><a href="<?php echo U('Modules/Special/special',array('specialid'=>$values['id']));?>" target="_blank"><img src="<?php echo ($values["thumb"]); ?>" width="150" height="100" /></a></td>
                <td valign="top" style="border-bottom:none;">
                    <div style="font-size:14px; line-height:25px; border-bottom:1px solid #D3D3D3;"><a href="<?php echo U('Modules/Special/special',array('specialid'=>$values['id']));?>" target="_blank"><?php echo ($values["title"]); ?></a></div>
                    <div style="font-size:12px; line-height:16px; margin-top:3px"><?php echo ($values["description"]); ?></div>
                    <div style="font-size:12px; line-height:16px; margin-top:3px; color:#999">创建时间：<?php echo date('Y-m-d H:i:s',$values['create_time']);?></div>
					
                </td></tr></table>
            </td>

			<td>
				<?php if (in_array('content_add', $ruleOperate)) {?><a href="<?php echo U('content_add','specialid='.$values['id']);?>" class="operate" target="_blank">添加信息</a><?php }?> | <a href="javascript:openNewWindow('<?php echo U('content_import','specialid='.$values['id']);?>')" class="operate">导入信息</a><br />
				<a href="<?php echo U('content_list','specialid='.$values['id']);?>" class="operate">管理信息</a> | <a href="">专题评论</a><br />
                <?php if($values['attr'] == 1){ ?><span class=setRed>推荐专题</span><?php }else{ ?>普通专题<?php }?> | <?php if($values['l_status'] == 1){ ?>正在使用<?php }else{ ?><span class="setRed">停止使用</span><?php }?><br />
                <?php if (in_array('edit', $ruleOperate)) {?><a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑专题</a><?php }?> | <?php if (in_array('delete', $ruleOperate)) {?><a href="javascript:;" onclick="(_confirm('不可恢复，确定要删除？',function(){location.href='<?php echo U('delete',array('mr'=>$mr,'id'=>$values['id'],'token'=>Tool::encrypt($values['id'].$mr),'list_page'=>$_GET['page']))?>'}))" class="operate">删除专题</a><?php }?>
			</td>
		</tr><?php endforeach; endif; endif; ?>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkTokenAction('<?php echo U('delete',array('mr'=>$mr,'list_page'=>$_GET['page']))?>','dtoken')});" class="sub" />
	<?php }?>    
</div>
<div class=""><?php echo $data[1]?></div>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>