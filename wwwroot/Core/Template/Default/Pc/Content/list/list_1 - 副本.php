<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"><link rel="stylesheet" href="__PUBLIC__/twnew/css/news.css"></block>

<block name="main">
<div id="mainContent">
	<div class="right slogan-bg">
	    <div class="content_tit" style="margin-bottom:20px;">
		  {-$navigate['navigate_name']-}  &nbsp;<i class="layui-icon layui-icon-next" style=""></i>
		</div>
		<div class="content clearfix"> 
		
			<ul class="news-list">
			
			<content type="page" cid="{$cid}" order="save_time desc" cache="false" limit="10" field="id,cid,title,save_time,style,click,url,description,thumbnail">
			<li class="news-block">
			
			  <div class="date-block">
				<span class="day">{-:date('d',$values['save_time'])-}</span><span class="month">{-:date('Y/m',$values['save_time'])-} </span>
				<!-- <span class="year"></span> -->
        	  </div>
			  <div class="summary">            
	        	<div class="h1"><a href="{-$values['url']-}" target="_blank">{-$values.a_title-}</a></div>            
	        	<!--<div class="h3">{-:msubstr(trim($values['description'],'　'),0,120)-}</div> -->
                <div class="h3">{-:trim($values['description'],'　')-}</div>				
				<a href="{-$values['url']-}" class="news-detail"></a>
	          </div>
			
			
			</li>
			</content>
		</ul>

		
		<div class="pages clearfix">
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