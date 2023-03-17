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
<style type="text/css">
html {
	background:#F5F9FE;
}
body {
	width:960px;
	margin:0px auto;
}
div.operateTitle {
	margin:240px 0px 0px;
	border:1px solid #DFEDF7;
}
div.cz {
	height:30px;line-height:30px;padding-left:20px;
	padding:20px 20px;
	border:1px solid #DFEDF7;
	border-top:0px;
	background:#FFFFFF;
}
div.cz a {
	text-decoration:underline;
	margin:0px 5px 0px 10px;
}
</style>
<div class="operateTitle bold"><?php echo $typeString?>数据成功！</div>
<div class="cz">
	请选择操作项：
	<?php if($a_status==2){ ?>					
	<a href="<?php echo U('Content/Index/show',array('cid'=>$_GET['cid'],'aid'=>$id,'preview'=>md5($_GET['cid'].'--sssss--'.$id)));?>" target="_blank" class="operate">预览内容</a>&nbsp;&nbsp;
	<?php }else { ?>
	<a href="<?php echo U('Content/Index/show',array('cid'=>$_GET['cid'],'aid'=>$id))?>" target="_blank">查看内容</a>&nbsp;&nbsp;
	<?php } ?>
	<!--<a href="<?php echo U('Content/Index/show',array('cid'=>$_GET['cid'],'aid'=>$id))?>" target="_blank">查看内容</a>-->
	<a href="<?php echo U('add',array('cid'=>$_GET['cid'],'list_page'=>$_GET['list_page']))?>">继续发布</a>
	<?php $mr = mt_rand(1, 99999);?>
	<a href="<?php echo U('edit',array('cid'=>$_GET['cid'],'id'=>$id,'mr'=>$mr,'token'=>Tool::encrypt($_GET['cid'].$id.$mr),'list_page'=>$_GET['list_page']))?>">继续更改</a>
	<a href="<?php echo U('show',array('cid'=>$_GET['cid'],'page'=>$_GET['list_page']))?>">管理内容</a>
	<!-- 
	<a href="<?php echo U('Content/navigate/show',array('cid'=>$_GET['cid']))?>">管理导航</a>
	 -->
</div>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>