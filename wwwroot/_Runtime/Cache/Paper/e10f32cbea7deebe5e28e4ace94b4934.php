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

<table class="showTable" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr>		
		<th width="20"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
        <th colspan="2">报刊类别</th>
	</tr>
	
	<?php if(!empty($data)): if(is_array($data[0])): foreach($data[0] as $key=>$values): ?><tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo ($values["id"]); ?>" dtoken="<?php echo Tool::encrypt($values['id'].$mr)?>" /> </td>
            <!--<td width="180"><a href="<?php echo ($values['url']); ?>" target="_blank"><img src="<?php echo ($values["thumbnail"]); ?>" width="180" height="236" /></a></td>-->
            <td>
                <table width="100%" height=" ">
				<tr>							
                <td valign="top">
                    <div style="font-size:18px; line-height:25px; border-bottom:1px solid #ededed;"><a href="<?php echo ($values['url']); ?>" target="_blank"><?php echo ($values["title"]); ?></a></div>
                    <div style="font-size:12px; line-height:16px; margin-top:3px"><?php echo ($values["description"]); ?></div>
                    <div style="font-size:12px; line-height:16px; margin-top:10px; color:#999">创建时间：<?php echo date('Y-m-d H:i:s',$values['create_time']);?></div>
                </td>
				</tr>
				
				<tr>
					<td style="border-bottom:none;"  height="30">
					排序：<input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" />
					&nbsp; <a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a> 
					&nbsp; <a href="javascript:;" onclick="(_confirm('不可恢复，确定要删除？',function(){location.href='<?php echo U('delete',array('mr'=>$mr,'id'=>$values['id'],'token'=>Tool::encrypt($values['id'].$mr),'list_page'=>$_GET['page']))?>'}))" class="operate">删除</a> |					
					&nbsp; <?php if($values['is_recommend'] == 1){ ?><span class=setRed>推荐</span><?php }else{ ?>普通<?php }?>
					&nbsp; <?php if($values['a_status'] == 1){ ?>启用<?php }else{ ?><span class="setRed">未启用</span><?php }?>
					&nbsp; | 
					&nbsp; <a href="<?php echo U('paperlist/add', 'pid='.$values['id']);?>" class="operate">添加期号</a>
					&nbsp; <a href="<?php echo U('paperlist/index', 'pid='.$values['id']);?>" class="operate">期号列表</a>
					</td>
				</tr>
				</table>
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