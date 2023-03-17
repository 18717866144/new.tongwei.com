<?php if (!defined('HX_CMS')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<title><?php echo C('WEB_NAME');?>-内容管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/modules/css/basic.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
</head>
<body>
<style type="text/css">
div.topTip{border:1px solid #DFEDF7;margin-bottom:0px;padding-left:15px;}
.info{border:1px solid #DFEDF7;border-top:0px;text-indent:15px;padding:7px 0px;}
.info li{height:26px;line-height:26px;}
.fk {padding:5px 0px;}
.fk li{padding:7px 0px;}
</style>
<div class="topTip"><b>系统信息</b></div>
<div class="info clearfix">
<ul>
    <li>网站域名：<?php echo $_SERVER["SERVER_NAME"];?></li>
    <!--<li>网站路径：<?php /*echo $_SERVER["DOCUMENT_ROOT"];*/?></li>-->
    <li>服务器端口：<?php echo $_SERVER["SERVER_PORT"];?></li>
    <li>服务器IP：<?php echo $_SERVER["SERVER_ADDR"];?></li>
    <li>当前客户端IP：<?php echo $_SERVER["REMOTE_ADDR"];?></li>
    <li>操作系统：<?php echo PHP_OS;?></li>
    <li>运行环境：<?php echo $_SERVER["SERVER_SOFTWARE"];?></li>
    <li>PHP运行方式：<?php echo php_sapi_name();?></li>
    <li>MYSQL版本：<?php echo mysql_get_server_info();?></li>
    <li>产品名称：<span class="setRed"><?php echo HX_CMS;?></span></li>
    <li>产品版本：<span class="setRed"><?php echo VERSION?></span></li>
    <li>产品流水号：<span class="setRed"><?php echo VDATE;?></span></li>
    <li>服务器允许上传的最大值：<?php echo ini_get('upload_max_filesize');?></li>
    <li>服务器是否自动转义：<?php echo ini_get('magic_quotes_gpc') ? '开启' : '未开启' ;?></li>
    <li>服务器执行时间限制：<?php echo ini_get('max_execution_time');?>秒</li>
    <li>服务器剩余空间：<?php echo round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M';?></li>
</ul>
</div>
</body>
</html>