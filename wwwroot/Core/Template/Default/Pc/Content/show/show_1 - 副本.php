<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head">

<link rel="stylesheet" href="__PUBLIC__/twnew/css/news.css">
<script type="text/javascript" src="__PUBLIC__/twnew/js/jquery.qrcode.min.js"></script>
<style>
.layui-icon-login-wechat{display:inline-block;cursor:pointer;float:right;font-size:22px;color:#888;}
.layui-icon-login-wechat:hover{color:#01458e;}

</style>
</block>

<block name="main">
<div id="mainContent" >
	<div class="right slogan-bg">
	    <!--<div class="content_tit"></div> -->
		<div class="content-rgt clearfix">	 
	
		   <if condition="$preview eq 1">
		<div style="padding:15px; text-align:center;font-size:22px;background:#C5EDEC;border:1px solid #f00;">该页面现为预览地址，不能作为正式页面访问，请到后台更改内容发布设置。</div>
		</if>
		<notempty name="currentData.title_top"><h2 class="title-top">{-$currentData['title_top']-}</h2></notempty>
		<h1 class="title">{-$currentData['title_content']?$currentData['title_content']:$currentData['title']-}</h1>
		<notempty name="currentData.title_bottom"><h3 class="title-bottom">{-$currentData['title_bottom']-}</h3></notempty>
		<div class="content-info" style="position:relative;">
        	{-:date('Y年m月d日',$currentData['save_time'])-}　<notempty name="currentData['source']">来源：<notempty name="currentData['sourceurl']"><a href="{-$currentData['sourceurl']-}" target="_blank">{-$currentData['source']-}</a><else/>{-$currentData['source']-}</notempty></notempty> &nbsp; <notempty name="currentData['author']">作者：{-$currentData['author']-}</notempty>　<span id="hits"></span><a href="javascript:;" id="see_on_phone" style="width:90px;"><i class="layui-icon layui-icon-login-wechat" style="font-size:14px;"></i> 分享到&nbsp;<div class="show-block"></div></a>
		</div>
		
		<div class="content clearfix" style="min-height:290px;">
			<notempty name="currentData.video">
<div style="z-index:9; position: relative; width: 640px; height: 360px; display:block; margin-top:20px;background:#000">
<div id="a1"></div>
</div>
<script type="text/javascript" src="/static/ckplayer/ckplayer.js" charset="utf-8"></script>
<script type="text/javascript">
var flashvars={f:'{-$currentData.video-}',c:0,b:1,p:2,i:''};
var params={allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
var video=['{-$currentData.video-}->video/mp4'];
<?php
if( substr($currentData['video'],-3,3) == 'flv'){
?>
CKobject.embedSWF('/static/ckplayer/ckplayer.swf','a1','ckplayer_a1','640','360',flashvars,params);
<?php }else{ ?>
CKobject.embed('/static/ckplayer/ckplayer.swf','a1','ckplayer_a1','640','360',true,flashvars,video,params);
<?php }?>
</script>
			</notempty>
			{-$currentData.content-}
			
			<div style="width:100%;margin:3rem 0 2rem;text-align:right;">
			  <span style="height:24px;display:inline-block;line-height:24px;color:#888;font-size:12px;">分享到</span>&nbsp;
			  <i class="layui-icon layui-icon-login-wechat" id="wx_share"></i>
			</div>
		</div>
		<!--
		<div class="content-info-b clearfix">
			<div class="content-info-c">
				<div class="editor"></div>
				<div class="bdsharebuttonbox"><a  style="background: none; padding: 0;font-size: 14px">分享：</a><a class="bds_people" title="分享到人民微博" href="javascript:;" data-cmd="people"></a><a class="bds_weixin" title="分享到微信" href="javascript:;" data-cmd="weixin"></a><a class="bds_tsina" title="分享到新浪微博" href="javascript:;" data-cmd="tsina"></a><a class="bds_tqq" title="分享到腾讯微博" href="javascript:;" data-cmd="tqq"></a><a class="bds_tfh" title="分享到凤凰微博" href="javascript:;" data-cmd="tfh"></a><a class="bds_iguba" title="分享到股吧" href="javascript:;" data-cmd="iguba"></a><a class="bds_more" href="javascript:;" tangram_guid="TANGRAM_322" data-cmd="more"></a></div>
			</div>
		</div>
		-->
		
		<content type="relevant" limit="8" order="id DESC" mid="1">
		<?php if($i==1){  $count = count($data);?>		
		
		<div class="news-others">
		  <div class="others-tit">相关新闻</div>
		  <ul class="news-group-list">
        <?php }?>
		
		     <li class="more-list">
					<span class="date">{-:date('Y/m/d',$values['save_time'])-}</span>
					<a href="{-$values.url-}" style="" >{-$values.a_title-}</a>
			 </li>	
			 
		<?php if($i==$count){?>
		  </ul>		
		</div>	
		<?php }?>
		</content>
			
		</div>
			
		
	</div>
	
	<div class="left ">		
		<include file="./Core/Template/Default/Pc/side.php" />
	</div>
	
	<div style="clear:both;"></div>
</div>
</div>
<div id="tanchu" style="display:none;width:310px;padding:40px 0px;background:#fff;">
  <p style="text-align:center;font-size:13px;height:30px;line-height:30px;margin-bottom:10px;">微信扫一扫，分享到朋友圈</p>
  <div class="erweima" style="text-align:center;"></div>
</div>
<script>

layui.use(['layer'], function(){
  var $ = layui.jquery,
  layer = layui.layer;
  
  $('#wx_share').click(function(){
	
	 layer.open({
		 type:1,
		 title:false,
		 btn:false,
		 closeBtn:true,
		 content:$('#tanchu')
		 
	 });
	
	
});


});

</script> 
<script>


$('#tanchu .erweima').qrcode({
					render: "canvas",
                     width: 200,
                     height: 200,
                     text: <?php echo strpos($currentData['url'],'http://')!==false?'"'.$currentData['url'].'"':'"http://'.$_SERVER['HTTP_HOST'].$currentData['url'].'"';?>
});


$('#see_on_phone .show-block').qrcode({
					render: "canvas",
                     width: 100,
                     height: 100,
                     text: <?php echo strpos($currentData['url'],'http://')!==false?'"'.$currentData['url'].'"':'"http://'.$_SERVER['HTTP_HOST'].$currentData['url'].'"';?>
});


//$(function(){
//	$.post('<?php //echo U('Content/index/u_f');?>//',{f:'click',aid:<?php //echo $currentData['id'];?>//,cid:<?php //echo $currentData['cid'];?>//});
//});
//window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script>
</block>