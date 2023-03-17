<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
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
<div class="wrap clearfix">
		<ul class="video-list clearfix">
			<content type="page" cid="{$cid}" cache="false" limit="50" field="id,cid,title,save_time,style,click,url,description,thumbnail,video">
			<li>
			<a href="{-$values.url-}">
			<p class="video-title">{-$values.a_title-}</p>
			<p class="video-img"><img src="{-$values.thumbnail-}" alt="{-$values.a_title-}"><i class="iconfont icon-play"></i></p>
			</a>
			</li>
			</content>
		</ul>		
		<div style="border:1px dotted #f1f1f1;background: #fefefa; padding:10px;line-height:190%;margin-top:35px;">
		<p><h2 style="font-size:16px;">视频下载</h2></p>
		<p>通威宣传片2017版：<a href="http://pan.baidu.com/s/1nuRk5xZ" target="_blank">http://pan.baidu.com/s/1nuRk5xZ</a></p>
		<p>通威35年专题片：<a href="http://pan.baidu.com/s/1dEC7LIT" target="_blank">http://pan.baidu.com/s/1dEC7LIT</a></p>
		</div>
		<!--<div class="read-more" id="">阅读更多</div>-->
</div>
</block>