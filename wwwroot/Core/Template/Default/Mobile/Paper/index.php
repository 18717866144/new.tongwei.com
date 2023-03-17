<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="php">
<php>$navigate = $NAV['22'];</php>
</block>
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
	$backUrl = $NAV[$currentData['cid']]['url'];
}
</php>
<header>
	<div class="logo">
	<a href="{-$backUrl-}" title="{-$Think.config.web_name-}">
	<i class="iconfont icon-left"></i>
	<img src="{-$Think.config.INSTALL_PATH-}/static/mobile/images/logo-ico-32.png">	
	</a>
	</div>
	<div class="title" style="text-align:center">
	{-$navigate['navigate_name']-}	
	</div>
	<div class="other js-trigger">
	<i class="iconfont icon-menu"></i>
	</div>
</header>
</block>

<block name="main">
<div class="wrap m-t-10 clearfix" style="padding-bottom: 15px">
	<php>$m=0;</php>		
	<ul class="paper-list clearfix">
		<volist name="paper" id="r">
		<php>$thumbnail = $r['thumbnail'];</php>		
		<volist name="r['_list']" id="values">
		<php>$thumbnail = $values['thumbnail'];</php>
		</volist>
		<li <if condition="$m%2 eq 0">style="margin-left:0"</if> >
		<a href="{-$r['url']-}"  title="{-$r.title-}">
			<div class="paper-border">
				<img src="{-$thumbnail|thumb=###,200,296,1-}" alt="{-$r.title-}"</div>
			</div>
			<div class="paper-title">{-$r.title-}</div>
		</a>
		</li>
		<php>$m++;</php>
		</volist>
	</ul>
</div>
</block>