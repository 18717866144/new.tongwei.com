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
<div class="naviDesc clearfix"><?php echo ($navname); ?> - 内容管理 <span style="font-size:12px; color:#999;">上次更新时间：<?php if($updatatime) echo date('Y-m-d H:i:s',$updatatime);else echo '无';?></span></div>
<form action="__ACTION__" method="post" id="formData">
<?php if ($cid) {?><input type="hidden" value="<?php echo $cid?>" name="cid" /><?php }?>
<table class="formTable" style="width:90%" align="left">			
<tr>
<td class="td_left">内容：</td>
<td>
<div class="tabs">
<div class="tabs-title"><a class="tabs-title-list" hrer="javascript:;">PC版内容</a><a class="tabs-title-list" hrer="javascript:;">Mobile版内容</a></div>
<div class="tabs-content m_t_15">
	<div class="tabs-content-list">
	<textarea name="content" id="content"><?php echo ($content); ?></textarea>                 
	<?php echo FormElements::edit('content','basic',500);?>
	</div>
	
	<div class="tabs-content-list">
	<textarea name="contentmobile" id="contentmobile"><?php echo ($contentmobile); ?></textarea>                 
	<?php echo FormElements::edit('contentmobile','basic',500);?>
	</div>
</div>
</div>
</td>
</tr>
<tr>
<td class="td_left">&nbsp;&nbsp;</td>
<td class="td_right">
<input type="submit" name="send" class="sub" value="提交" />
<input type="reset" class="sub" />
</td>
</tr>
</table>
</form>
<script>
$.G.Tabs();
</script>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>