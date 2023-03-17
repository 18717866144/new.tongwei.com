<?php defined('HX_CMS') or exit;?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<block name="tkd">
<title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
<meta name="keywords" content="{-$special['title']-}">
<meta name="description" content="{-$special['description']-}">
</block>
<link rel="stylesheet" type="text/css" href="/static/css/normalize.css">
<link rel="stylesheet" type="text/css" href="/skins/2018lianghui/style.css?20180305v2">
<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<script type="text/javascript" src="/static/js/jquery.js"></script>  
<script language="JavaScript" src="/static/js/jquery.SuperSlide.js"></script>     
</head>
<body>
<div id="bg">
<div id="container" class="clearfix">
	<div class="banner"></div>
	<div id="main">
		<div class="nav">
			<ul class="clearfix">
				<li class="one"><a href="{-$special['url']-}">专题首页</a></li>
				<volist name="type" id="t">
				<php>if($t['hide']==1) break;</php>
				<li<?php if($typeid==$t['typeid']) echo ' class="cur"';?>><a href="{-$special['url']-}#{-$t['typedir']-}">{-$t['name']-}</a></li>
				</volist>
				<li style="float:right"><a href="http://www.tongwei.com" target="_blank">通威集团</a></li>
			</ul>
		</div>
		<block name="main"></block>
	</div>
	
	<div class="footer">
	<a href="http://www.tongwei.com" target="_blank" class="footer-logo"><img src="/skins/2018lianghui/logo.png" /></a>
	通威集团有限公司 @ 2022 TONGWEI 版权所有　　蜀ICP备05002048号　　总部地址：四川省成都市高新区天府大道中段588号通威国际中心　电话：028-85188888
	</div>
	<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</div>
</div>
</body>
<html>