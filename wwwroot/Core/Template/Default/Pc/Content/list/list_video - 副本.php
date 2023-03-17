<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head">
<link rel="stylesheet" href="__PUBLIC__/twnew/css/video.css">
<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
    <block name="head"><link rel="stylesheet" href="__PUBLIC__/twnew/css/news.css"></block>

</block>


<block name="main">
<div id="mainContent" >
	<div class="right slogan-bg">
	    <div class="content_tit">
		  {-$navigate['navigate_name']-}
		</div>
		<div class="content clearfix">
	
		   <ul class="video-list clearfix">
			<content type="page" cid="{$cid}" cache="false" limit="10" field="id,cid,title,save_time,style,click,url,description,thumbnail,video">
			<li data-video="{-$values.video-}" <if condition="$key%2 eq 0">style="margin-left: 0"</if>><a href="javascript:;"><img src="{-$values.thumbnail-}" alt="{-$values.a_title-}" width="492" height="412"><span>{-$values.a_title-}</span><i class="iconfont icon-play"></i></a></li>
			</content>
		</ul>
            <div class="pages clearfix">
                {-$page-}
            </div>
       <!--     <div style="display:none;border:1px dotted #f1f1f1;background: #fefefa; padding:10px;line-height:190%;margin-top:35px;">
		<p><h2 style="font-size:16px;">视频下载</h2></p>
		<p>通威宣传片2017版：<a href="https://pan.baidu.com/s/1gfjbCkj" target="_blank">https://pan.baidu.com/s/1gfjbCkj</a></p>
		<p>通威35年专题片：<a href="http://pan.baidu.com/s/1dEC7LIT" target="_blank">http://pan.baidu.com/s/1dEC7LIT</a></p>
		</div>-->
			
		</div>
	</div>
	
	
	<div class="left ">		
		<include file="./Core/Template/Default/Pc/side.php" />
	</div>
	
	<div style="clear:both;"></div>
</div>
<script type="text/javascript">
$('.video-list li').click(function(){
	var video = $(this).data('video');
	$.G.playVideo(video);
});
</script>
</block>
