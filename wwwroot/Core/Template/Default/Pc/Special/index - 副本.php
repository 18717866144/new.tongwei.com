<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="php">
<php>$navigate = $NAV['17'];</php>
</block>
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"><link rel="stylesheet" href="__PUBLIC__/twnew/css/news.css"></block>

<block name="main">
<div id="mainContent" >
	<div class="right slogan-bg">
	    <div class="content_tit" style="margin-bottom:0px;">
		  <a href="{-$navigate['url']-}" style="color:#0154a4;">{-$navigate['navigate_name']-} &nbsp;<i class="layui-icon layui-icon-next" style=""></i></a>
		</div>
		<div class="content clearfix">	
		
			<ul class="special-list" >
			
			
			<sql type="page" table="h_special" limit="10" where="l_status=1 and is_show=0">
			<li class="clearfix">
				<a href="{-$values['url']-}" class="special-pic" target="_blank" style="background:url({-$values['thumb']-}) no-repeat center;background-size:100%;">
				<!--
				<img src="{-:thumb($values['banner'],480,300,true)-}" alt="{-$values.title-}">
				-->
				</a>
				<div class="right-content">
					<a href="{-$values['url']-}" class="special-title" target="_blank">{-$values.title-}</a>
				</div>				
			</li>	
			</sql>
			<div style="clear:both;"></div>
			</ul>
			<div class="pages clearfix" style="margin-top:30px;">
			{-$page-}
			</div>	
			
		</div>
	</div>
	
	<div class="left ">		
		
				<include file="./Core/Template/Default/Pc/side.php" />
		
	</div>
	
	<div style="clear:both;"></div>
</div>
</block>