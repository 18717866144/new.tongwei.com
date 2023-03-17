<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$special['title']-}"></block>
<block name="description"><meta name="description" content="{-$special['description']-}"></block>
<block name="head">
<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<link media="all" rel="stylesheet" href="{-$Think.config.INSTALL_PATH-}/static/css/special.chairman.css">
</block>

<block name="page_banner">
<div id="banner" style="background: url({-$special['banner']-}) no-repeat center center; height:195px; min-width:1200px;"></div>
</block>

<block name="main">
<div id="mainContent" >
	<div class="right show-left">
		<ul class="video-list">
			<volist name="list" id="values">
			<li <if condition="$key%2 eq 0">style="margin-left: 0"</if>><a href="{-$values.url-}" target="_blank"><img src="{-$values.thumbnail|thumb=###,365,205,1-}" alt="{-$values.title-}"><span>{-$values.title-}</span><i class="iconfont icon-play"></i></a></li>			
			</volist>
			<div style="clear:both;"></div>
		</ul>
		<div class="pages clearfix">
		{-$pages-}
		</div>
	</div>
	
	<div class="left ">		
		<div class="left_nav">
		
			<a href="{-$special['url']-}" class="top-link" target="_blank">
		    <div class="nav_tit">{-$special['title']-}</div>
		   </a>

		    <ul>
			
			<volist name="type" id="v">	
             <a href="{-:U('modules/special/lists',array('specialid'=>$specialid,'typeid'=>$v['typeid']))-}" target="_blank">
			   <li class="<if condition="$v['typeid'] eq $typeid">active</if>">{-$v['name']-}</li>
		     </a>
			</volist>	
			
			</ul>		
		</div>
		
		<div class="m-t-20" style="margin-top:0px!important;">
			<a href="/special/1.html" target="_blank"><img style="width:100%;" src="/static/img/r1.jpg"></a>
		</div>
		<div class="m-t-20">
			<a href="http://z.tongwei.cn/special/specialid/88.html" target="_blank"><img style="width:100%;" src="/static/img/r2.jpg"></a>
		</div>
	</div>
	
	<div style="clear:both;"></div>
</div>
</block>