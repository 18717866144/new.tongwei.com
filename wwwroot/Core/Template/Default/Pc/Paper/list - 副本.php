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
	    <div class="content_tit">
		  <a href="{-$paper['url']-}">{-$paper['title']-}&nbsp;<i class="layui-icon layui-icon-next" style=""></i></a>
		</div>
		
		<?php
			$t=array();
			if($maxtime && $mintime){
				for($i=date('Y',$maxtime);$i>=date('Y',$mintime);$i--){
					$t[] = $i;
				}
			}
		?>
		<div class="year-t" style="margin-bottom:30px;">
			<volist name="t" id="r">
				<a href="?year={-$r-}" <if condition="$r eq $year">style="color:#fff;background-color:#049;"</if> >{-$r-}</a>
			</volist>
		</div>
		
		<ul class="paper-list m-t-35 clearfix">			
			<volist name="paperList" id="values">
			<li <if condition="$key%3 eq 0">style="margin-left:0"</if> >
			<a href="{-$values['url']-}" target="_blank" class="thumb"><img src="{-$values.thumbnail-}"></a>
			<div class="paper-info">
			<a href="{-$values['url']-}" target="_blank">{-$paper.title-} &nbsp;{-$values.title-}</a>
			</div>
			</li>
			</volist>			
		</ul>
	</div>
	
	<div class="left ">		
		<include file="./Core/Template/Default/Pc/side.php" />
	</div>
	
	<div style="clear:both;"></div>
</div>
</block>