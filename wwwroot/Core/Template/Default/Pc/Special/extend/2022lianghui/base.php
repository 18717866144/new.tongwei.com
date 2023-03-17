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
<link rel="stylesheet" href="__PUBLIC__/twnew/css/video.css">
<link media="all" rel="stylesheet" href="https://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<?php

 if(isMobile()){

?>
<link rel="stylesheet" type="text/css" href="/skins/2022lianghui/mobile_style.css?20180305v2">
<?php
 }
 else
 {
?>
<link rel="stylesheet" type="text/css" href="/skins/2022lianghui/style.css?20180305v2">
<?php
 }

?>



<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<script type="text/javascript" src="/static/js/jquery.js"></script>  
<script language="JavaScript" src="/static/js/jquery.SuperSlide.js"></script>     
<script type="text/javascript" src="/static/js/jquery.kwicks.js"></script>
<script type="text/javascript" src="/static/js/layer/layer.js"></script>
<script type="text/javascript" src="/static/js/layer/laytpl.js"></script>
<script type="text/javascript" src="/static/js/app_special.js"></script>
<style>
  .video-list img{width:400px!important;height:230px!important;}
  .video-list li{margin-left:0px!important;padding-bottom:0px!important;}
  .video-list li i{bottom:66px!important;left:16px!important;width:0px!important;height:0px!important;}
  .layui-layer-dialog{top:50%!important;margin-top:-230px!important;}
  .layui-layer-dialog .layui-layer-content{padding:0px!important;}
</style>
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
                    <?php if(3==$t['typeid']) {?>
                        <li><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=6')-}">视频报道</a></li>
                    <?php } ?>
				<php>if($t['hide']==1) continue;</php>
				<li<?php if($typeid==$t['typeid']) echo ' class="cur"';?>>
					<a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid='.$t['typeid'])-}">{-$t['name']-}</a>
				</li>
				</volist>
			
			</ul>
		</div>
		<block name="main"></block>
	</div>
	
	<div class="footer">
	<a href="http://www.tongwei.com" target="_blank" class="footer-logo"><img src="/skins/2021lianghui/logo.png" /></a>
	通威集团有限公司 @ 2022 TONGWEI 版权所有　　蜀ICP备05002048号　　总部地址：四川省成都市高新区天府大道中段588号通威国际中心　电话：028-85188888
	</div>
	<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</div>
</div>
</body>
<html>