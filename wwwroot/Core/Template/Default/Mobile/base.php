<?php defined('HX_CMS') or exit;$thispid = $navigate['id'];?><block name="php"></block><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
<meta name="format-detection"content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="dns-prefetch" href="//www.tongwei.com">
<block name="title"><title>{-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$Think.config.WEB_KEYWORDS-}"></block>
<block name="description"><meta name="description" content="{-$Think.config.WEB_DESCRIPTION-}"></block>
<link rel="icon" href="{-$Think.config.INSTALL_PATH-}/favicon.ico">
<link media="all" rel="stylesheet" href="{-$Think.config.INSTALL_PATH-}/static/css/normalize.css">
<link media="all" rel="stylesheet" href="{-$Think.config.INSTALL_PATH-}/static/mobile/css/style.css?v=20171206">
<link media="all" rel="stylesheet" href="https://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/jquery.js"></script>
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/TouchSlide.js"></script>

<link media="all" rel="stylesheet" href="{-$Think.config.INSTALL_PATH-}/static/js/drawer/drawer.css">
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/drawer/jquery.drawer.js"></script>
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/drawer/iscroll.js"></script>
    <link media="all" rel="stylesheet" href="{-$Think.config.INSTALL_PATH-}/static/swiper/css/swiper.css">
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/swiper/js/swiper.js"></script>


<block name="head"></block>
</head>
<body class="drawer drawer-right" style="background: url('https://www.tongwei.com/Public/twnew/images/indust3.jpg') no-repeat 100%">
<div class="drawer-overlay">
<block name="header">
<header>
	<div class="logo">
	<a href="{-$Think.config.INSTALL_PATH-}/" title="{-$Think.config.web_name-}">
	<i class="iconfont icon-left"></i>
	<img src="{-$Think.config.INSTALL_PATH-}/static/mobile/images/logo-ico-32.png">	
	</a>
	</div>
	<div class="title"></div>
	<div class="other js-trigger"><i class="iconfont icon-menu"></i></div>
</header>
</block>

<block name="banner"></block>

<block name="snav">
<php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];$thispid=max(0,$thispid);</php>
<div class="wrap snav">
	<ul>
		<navigate type="all">
		<if condition="$thispid eq 0">
		<li><a href="{-$values['url']-}">{-$values['navigate_name']-}</a></li>
		<else/>
		<if condition="$thispid eq $values['id']">
		<volist name="values['child']" id="v"><li><a class="child-link <if condition="$v['id'] eq $navigate['id']">hover</if>" href="{-$v['url']-}">{-$v['navigate_name']-}</a></li></volist>
		</if>
		</if>
		</navigate>	
	</ul>
	<div class="left-bg"></div>
	<div class="right-bg"></div>
</div>
</block>

<block name="main"></block>
<block name="footer">
<footer>
	<div class="wrap">
		通威集团有限公司　<a href="https://beian.miit.gov.cn/">蜀ICP备05002048号</a> <span style="font-size:12px;">技术支持：通威传媒</span>
	</div>
</footer>
</block>
<a class="go-to-top iconfont icon-up"></a>
<script>
$(function(){
	var $goToTop = $('.go-to-top');
	var f=0,s;
	$(window).scroll(
		function(){
			$(window).scrollTop()  > 1000 ?  f=1 : f=2 ;
			if(f==1 && s!='show'){
				$goToTop.show();
				s='show';
			}else if(f==2 && s!='hide'){
				$goToTop.hide();
				s='hide';
			}else{
			}
		}
	);
	$goToTop.click(function(){$("html,body").animate({scrollTop: 0}, 500);	});	
	
});			
</script>
</div>

<div class="drawer-main drawer-default" style="z-index:2147483649">
  <nav class="drawer-nav" role="navigation">	
    <ul class="drawer-nav-list clearfix" style="padding-top:15px;">
	<li class="close" style="float:left;width:30px;height:30px;margin-left:6px;background:url(/Public/mobile/images/close.png) no-repeat center;background-size:100%;"></li>
	<li style="float:right;color:#fff;height:29px;line-height:29px;font-weight:200;font-size:12px;width:140px;text-align:right;padding-right:10px;">通威 · 为了生活更美好</li>
	</ul>    
	<navigate type="all">
	<p class="drawer-nav-title"><a href="{-$values['url']-}">{-$values['navigate_name']-}</a></p>
		<notempty name="values.child">
		<ul class="drawer-nav-list clearfix" style="">
		<volist name="values['child']" id="v"><li><a href="{-$v['url']-}">{-$v['navigate_name']-}</a></li></volist>
		</ul>
		</notempty>
	</navigate>
  </nav>
</div>  
<script>
   $('.js-trigger').on('click',function(){
		$('.drawer-default').animate({right:'0px'},200);	
		
		$('.close').on('click', function(e) {  
               
                $('.drawer-default').animate({right:'-280px'},150);
            });  
		
	});
</script>

</body>
</html>