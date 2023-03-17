<?php defined('HX_CMS') or exit;$thispid = $navigate['id'];?><block name="php"></block>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>通威集团有限公司 - 为了生活更美好</title>
  <meta name="keywords" content="通威集团有限公司">
  <meta name="description" content="通威集团有限公司">
  <link rel="stylesheet" href="./layui/css/layui.css">
  <link rel="stylesheet" href="./css/index.css">

<block name="head"></block>
</head>
<body class="allbg" style="background:url('/Uploads/2019lhbg.png') center top no-repeat;background-size:100%;">

<div id="header" class="row" style="margin-top:60px;">
	<div class="header wrap clearfix">
		<div class="logo left" style="margin-left:10px"><a href="{-$Think.config.INSTALL_PATH-}/" title="{-$Think.config.web_name-}" target="_blank"><img src="{-$Think.config.INSTALL_PATH-}/Uploads/logo_bg.png"></a></div>
		<div class="header-right right" style="margin-right:10px;">
			<ul class="nav left clearfix">
				<li><a href="{-$Think.config.INSTALL_PATH-}/" >首页</a></li>
				<navigate type="all">
				<li><a href="{-$values['url']-}" target="_blank">{-$values['navigate_name']-}</a>
					<notempty name="values.child">
						<ul class="child_nav">
						<volist name="values['child']" id="v"><li><a href="{-$v['url']-}" target="_blank">{-$v['navigate_name']-}</a></li></volist>
						</ul>
					</notempty>
				</li>
				</navigate>
			</ul>
			
			<ul class="nav-other right clearfix">
				<li><a href="http://www.tongwei.com">中文</a> / <a href="http://en.tongwei.com" target="_blank">EN</a></li>
				<li class="dropdown"><a href="">通威网站群<i class="iconfont icon-down rote"></i></a>
					<dl class="dropdown-con sites">
					<links typeid="1" limit="100">
						<dd><a href="{-$values.web_url-}" target="_blank">{-$values.web_name-}</a></dd>
					</links>					
					</dl>
				</li>
			</ul>
		</div>		
	</div>
</div>

<div id="allbg" style="width:1200px;padding-top:10px;background:#fff;;
">

<!-- yuan dao hang box-shadow: 0 10px 30px 0 rgba(0,0,0,.7) -->

<block name="banner">
<div id="banner-image" class="row" >
	<div class="focus-image" >
	<ul>
		<li style="background: url({-:($navigate['pic']?$navigate['pic']:'/static/img/banner.png')-}) no-repeat center center;"></li>		
	</ul>
	</div>
</div>
</block>

<block name="notes">
<php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>
<div id="notes" class="row">
	<div class="location wrap">
		<a href="/" class="home-link"><i class="iconfont icon-home"></i></a>
		<a href="{-$NAV[$thispid]['url']-}" class="top-link" target="_blank">{-$NAV[$thispid]['navigate_name']-}</a>		
		<navigate type="all">
		<if condition="$thispid eq $values['id']">
		<volist name="values['child']" id="v"><a class="child-link <if condition="$v['id'] eq $navigate['id']">hover</if>" href="{-$v['url']-}" target="_blank">{-$v['navigate_name']-}</a></volist>
		</if>      
		</navigate>		
	</div>
</div>
</block>

<block name="main"></block>



</div>

<div id="footer" class="row m-t-20">
	<div class="wrap clearfix">
		<navigate type="all">
		<dl>
			<dt><a href="{-$values['url']-}" target="_blank">{-$values['navigate_name']-}</a></dt>
			<notempty name="values.child">				
			<volist name="values['child']" id="v"><dd><a href="{-$v['url']-}" target="_blank">{-$v['navigate_name']-}</a></dd></volist>
			</notempty>
		</dl>
		</navigate>
		
		<dl class="qrcode">
			<dt>与通威互动</dt>
			<dd><img src="/static/images/qrcode-weixin.jpg"><br>扫一扫 关注通威</dd>
		</dl>
	</div>	
</div>

<div id="bottom">
	<div class="wrap">
		通威集团有限公司 @ 2021 TONGWEI.COM 版权所有 &nbsp;<a href="https://beian.miit.gov.cn/">蜀ICP备05002048号</a> &nbsp;总部地址：四川省成都市高新区天府大道中段588号通威国际中心 &nbsp;电话：028-85188888</a>
	</div>
</div>
<!--<a class="go-to-top iconfont icon-up"></a>-->
<script>
$(function(){
	$('.nav>li').hover(function(){
		$(this).addClass('hover');
	},function(){
		$(this).removeClass('hover');	
	});
	
	$.G.goTop();
	
	$('.search-text').bind('keypress', function (event) {  
    	if (event.keyCode == 13) { 
			$('.search-submit').click();
		}
	});
	$('.search-submit').click(function(){
		var $s =$(this),$q=$('.search-text'),q=$q.val();
		if(!q) return;		
		window.location.href =  '/search?q='+q;
	})
});
</script>
<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</body>
</html>