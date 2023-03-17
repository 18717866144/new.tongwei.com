<?php defined('HX_CMS') or exit;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
<meta name="keywords" content="{-$special['title']-}">
<meta name="description" content="{-$special['description']-}">
<link rel="stylesheet" type="text/css" href="/skins/special/2019ec/css/style.css">
<link type="text/css" href="/skins/special/2019ec/css/stylewap.css" rel="stylesheet"/>
<script type="text/javascript" src="/static/js/jquery.js"></script>  
<script language="JavaScript" src="/static/js/jquery.SuperSlide.js"></script>
</head>
<body>
<block name="head"></block>
</head>
<body>
<div class="bg">
    <div class="banner_zw" style="background:url(/skins/special/2019ec/images/banner1.jpg) no-repeat center;background-size:100%;"></div>
    <div class="nav_zw">
		<div class="left">
		<a href="{-$special['url']-}" <?php if(!$typeid) echo ' class="home"'; ?> >活动首页</a>
		    
			<a href="{-$special['url']-}#1st">第一期作品</a>
            <a href="{-$special['url']-}#2nd">第二期作品</a>
			<a href="{-$special['url']-}#3rd">第三期作品</a>
		</div>
		<div class="right"><a target="_blank" href="http://www.tongwei.com/">通威集团</a></div>
	</div>
	
	<block name="main">
		
	</block>
	
	<div id="bottom">
		<div style="width: 990px; margin: 0 auto">
			通威集团有限公司  TONGWEI 　蜀ICP备05002048号　　电话：028-85188888　　技术支持：通威传媒
		</div>
	</div>
</div>

<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</body>
</html>