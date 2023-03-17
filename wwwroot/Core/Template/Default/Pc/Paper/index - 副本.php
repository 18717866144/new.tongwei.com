<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="php">
<php>$navigate = $NAV['22'];</php>
</block>
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"><link rel="stylesheet" href="__PUBLIC__/twnew/css/papers.css"></block>

<block name="main">
<div id="mainContent" >
	<div class="right slogan-bg">
	    <div class="content_tit" >
		 {-$navigate['navigate_name']-}&nbsp;<i class="layui-icon layui-icon-next" style=""></i>
		</div>
		<div class="content clearfix">	 
	
		    <php>$m=0;</php>		
			<ul class="paper-list clearfix">
				<volist name="paper" id="r">
			
				<php>$thumbnail = $r['thumbnail'];</php>		
				<volist name="r['_list']" id="values">
				<php>$thumbnail = $values['thumbnail'];</php>
				</volist>
				<li <if condition="$m%3 eq 0">style="margin-left:0"</if> >
				<a href="{-$r['url']-}" target="_blank" class="thumb"><img src="{-$thumbnail-}" >
				<div class="cover-div">
				  <div class="txt-div"></div>
				  <div class="txt">查看详情</div>
				</div>
				</a>
				<div class="paper-info">
					<a href="{-$r['url']-}" target="_blank" >{-$r.title-}</a>				
				</div>
				</li>
				<php>$m++;</php>
				</volist>
			</ul>					
			
		</div>
	</div>
	
	<div class="left ">		
		<include file="./Core/Template/Default/Pc/side.php" />
	</div>
	
	<div style="clear:both;"></div>
</div>
</block>