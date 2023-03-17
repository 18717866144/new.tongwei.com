<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"><link rel="stylesheet" href="__PUBLIC__/twnew/css/news.css"></block>

<block name="main">
<div id="mainContent" >
	<div class="right slogan-bg">
	    <div class="content_tit">
		  {-$navigate['navigate_name']-}
		</div>
		<div class="content clearfix">
			<ul class="special-list" >			
			
			<content type="page" where="" cid="17" order="create_time desc" cache="false" limit="20" field="id,title,create_time,url,description,thumb">
			<li class="clearfix">
			
			  <a href="{-$values['url']-}" target="_blank" class="special-pic"><img src="{-$values.thumb-}" alt=""></a>
				<div class="right-content">
					<a href="{-$values['url']-}" target="_blank" class="special-title">{-$values.title-}</a>
					<p>{-:msubstr(trim($values['description'],'　'),0,58)-}</p>
					<div class="news-list-info">					
						<div class="read-link right"><a href="{-$values['url']-}" target="_blank">查看详情</a></div>
					</div>
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