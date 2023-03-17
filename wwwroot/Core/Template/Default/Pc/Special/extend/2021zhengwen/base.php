﻿<?php defined('HX_CMS') or exit;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
<meta name="keywords" content="{-$special['title']-}">
<meta name="description" content="{-$special['description']-}">
<link rel="stylesheet" type="text/css" href="/skins/special/2021zhengwen/css/style.css">
<link type="text/css" href="/skins/special/2021zhengwen/css/stylewap.css" rel="stylesheet"/>
<script type="text/javascript" src="/static/js/jquery.js"></script>  
</head>
<body>
<block name="head"></block>
</head>
<body>
<div class="banner_zw" style="background:url(/skins/special/2021zhengwen/images/banner1.jpg) no-repeat center;background-size:1920px 311px;"></div>
<div class="bg">
    
    <div class="nav_zw">
		<div class="left">
		<a href="{-$special['url']-}" <?php if(!$typeid) echo ' class="home"'; ?> >活动首页</a>
		    
			<a href="{-$special['url']-}#1st">第一期作品</a>
		    <a href="{-$special['url']-}#2nd">第二期作品</a>
			<a href="{-$special['url']-}#3rd">第三期作品</a>
			<a href="{-$special['url']-}#4th">第四期作品</a>
		</div>
		<div class="right"><a target="_blank" href="https://www.tongwei.com/">网站首页</a></div>
	</div>
	
	<block name="main">
		
	</block>
	
	<div id="bottom">
		<div style="width: 990px; margin: 0 auto">
			通威集团有限公司  TONGWEI 　蜀ICP备05002048号　　电话：028-85188888　　技术支持：通威集团有限公司
		</div>
	</div>
</div>

</body>
</html>