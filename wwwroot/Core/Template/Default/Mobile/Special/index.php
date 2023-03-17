<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="php"><php>$navigate=$NAV[17];</php></block>
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"></block>

<block name="header">
<php>
$url = $_SERVER["HTTP_REFERER"];
if( strpos($url,'http://www.tongwei.com/') ===0 ){
	$backUrl = 'javascript:history.back();';
}else{
	$backUrl = '/';
}
</php>
<header>
	<div class="logo">
	<a href="{-$backUrl-}" title="{-$Think.config.web_name-}">
	<i class="iconfont icon-left"></i>
	<img src="{-$Think.config.INSTALL_PATH-}/static/mobile/images/logo-ico-32.png">	
	</a>
	</div>
	<div class="title">
	<i></i>
	{-$navigate['navigate_name']-}	
	</div>
	<div class="other js-trigger">
	<i class="iconfont icon-menu"></i>
	</div>
</header>
</block>

<block name="main">
<div class="wrap m-t-10 clearfix">	
		<ul class="video-list">
			<sql type="page" table="h_special" limit="20" where="l_status=1">
			<li class="clearfix">
				<a href="{-$values.url-}" <if condition="$values['is_link'] eq 1">target="_blank"</if>>
				<p class="video-title">{-$values.title-}</p>
				<p class="video-img"><img style="width:100%" src="{-$values.thumb-}"></p>
				</a>							
			</li>	
			</sql>
		</ul>			
		<div class="pages clearfix">
		{-$page-}
		</div>
		
</div>
</block>