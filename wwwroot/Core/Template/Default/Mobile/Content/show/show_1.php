<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="title"><title>{-$currentData.title-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$currentData.keywords-}"></block>
<block name="description"><meta name="description" content="{-$currentData.description-}"></block>
<block name="head">
<style>
  img{width:100%!important;height:auto!important;}
  p{font:1rem Microsort YaHei;text-indent:0!important;}
 .top-img{width:100%;position:relative;}
 .top-img img{width:100%;}
 .top-img .cover-img{width:100%;height:100%;position:absolute;left:0;top:0;background:#0003;z-index:9;}
 .top-img .cover-text{padding:11% 10% 7%;width:80%;height:82%;overflow:hidden;position:absolute;left:0;top:0;z-index:99;color:#fff;font-weight:bold;font-size:1.5rem;line-height:2rem;}
 .nextprev{width:100%;float:left;}
 .nextprev .b{height:1.2rem;line-height:1.2rem;color:#999;font:.9rem Microsort YaHei}
 .nextprev .a{color:#666;font:1rem Microsort YaHei;}
 .go-back{padding:4px 10px 5px;height:1.4rem;background:#00000059;display:block;position:absolute;left:10%;top:0;z-index:120;border-radius:4px;}
 .go-back .left-arrow{width:12px;height:1.4rem;display:inline-block;background:url('/Public/left_arrow.png') no-repeat center;background-size:.9rem;float:left;margin-right:2px;} .go-back-text{height:1.4rem;line-height:1.5rem;display:inline-block;color:#fff;font-size:.8rem;float:left;font-family:Microsort YaHei;}
 .news-list li a{color:#555; display:inline;}
</style>
<?php if($isweixin == 1){ ?>
<script src="https://res2.wx.qq.com/open/js/jweixin-1.6.0.js"></script>
<script>
var nohashUrl = window.location.href.replace(window.location.hash, '');
var wx_nonceStr = '';//'{-:rand_string(10)-}';
var img_url = "{-$currentData['thumbnail']-}";
var wx_imgUrl = "https://www.tongwei.com/Public/twnew/default.png";
if(img_url){
	wx_imgUrl = "https://www.tongwei.com{-:thumb($currentData['thumbnail'],70,70,1)-}";
}
var wx_title = '{-$currentData.title-}';
var wx_desc = '{-$currentData.description-}';
var wx_link = nohashUrl;

var wx_timestamp ='';// '{-:time()-}';
var wx_sign = '';
var wx_appid = '';
$.ajax({
		//url:'/index.php/index/ajaxGetWeixinSign',
		url:'/index.php/index/getNewWeixinConfig',
		type:"post",
		//data:{url:nohashUrl, noncestr:wx_nonceStr, timestamp:wx_timestamp},
		data:{url:nohashUrl},
		success: function(data){
            	
			if(data.status==1){				
				wx_sign = data.infos.signature;
				wx_appid = data.infos.appId;
				wx_nonceStr = data.infos.nonceStr;
				wx_timestamp = data.infos.timestamp;
				 
				initWeixin();
			}
		},
		error:function(request){
			
		}
});
function initWeixin(){
	wx.config({
		debug: false,
		appId: wx_appid,
		timestamp: wx_timestamp,
		nonceStr: wx_nonceStr,
		signature: wx_sign,
		jsApiList: ['updateTimelineShareData','updateAppMessageShareData']
	});

	wx.ready(function(){
		
		wx.updateTimelineShareData({
			title: wx_title,
			desc:wx_desc,
			link: wx_link,
			imgUrl: wx_imgUrl,
			type:'link',
			success: function () { 
				
			}
			
		});	
		

        wx.updateAppMessageShareData({
			title: wx_title,
			desc:wx_desc,
			link: wx_link,
			imgUrl: wx_imgUrl,
			success: function () { 
				
			}
			
		});	
	
		
	});

}
</script>
<?php }?>
</block>

<block name="header">
<php>
$url = $_SERVER["HTTP_REFERER"];
if( strpos($url,'https://www.tongwei.com/') ===0 ){
	$backUrl = 'javascript:history.back();';
}else{
	$backUrl = $NAV[$currentData['cid']]['url'];
}
</php>
<!--
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
-->
</block>

<block name="snav"></block>

<block name="main">
<div class="top-img">
<img src="<?php echo $currentData['thumbnail']?$currentData['thumbnail']:'/Public/twnew/default.png'; ?>" />
<div class="cover-img"></div>
<a href="/index.php?d=m" class="go-back">
<span class="left-arrow"></span>
<span class="go-back-text">回到主页</span>
</a>
<div class="cover-text">{-$currentData['title']-}</div>
</div>
<div class="wrap m-t-10 clearfix" style="padding-bottom: 15px;">
		<if condition="$preview eq 1">
		<div style="padding:15px; text-align:center;font-size:22px;background:#C5EDEC;border:1px solid #f00;">该页面现为预览地址，不能作为正式页面访问，请到后台更改内容发布设置。</div>
		</if>
		<notempty name="currentData.title_top"><h2 class="title-top">{-$currentData['title_top']-}</h2></notempty>
		<!--<h1 class="title">{-$currentData['title']-}</h1>-->
		<notempty name="currentData.title_bottom"><h3 class="title-bottom">{-$currentData['title_bottom']-}</h3></notempty>
		<div class="content-info">			 
        	{-:date('Y年m月d日',$currentData['save_time'])-}<notempty name="currentData['source']"> &nbsp; 来源：<notempty name="currentData['sourceurl']"><a href="{-$currentData['sourceurl']-}" target="_blank">{-$currentData['source']-}</a><else/>{-$currentData['source']-}</notempty></notempty><notempty name="currentData['author']"> &nbsp; 作者：{-$currentData['author']-}</notempty>
		</div>
		
		<div class="content clearfix">
			<notempty name="currentData.video">
			<script>
			var _width = $(window).width();
			var _video_height = 9/16*(_width-30);			
			</script>
			<div style="z-index:9; position: relative; width:100%; display:block; margin-top:20px;background:#000">
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
			CKobject.embedSWF('/static/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%',_video_height,flashvars,params);
			<?php }else{ ?>
			CKobject.embed('/static/ckplayer/ckplayer.swf','a1','ckplayer_a1','100%',_video_height,true,flashvars,video,params);
			<?php }?>
			</script>
			</notempty>
			{-$currentData.content-}
			
			
			<div style="width:100%;margin-top:2rem;">
			  <div class="nextprev" style="margin-bottom:1rem;">
				<div class="b">上一篇</div>
				<a href="{-$prev['url']-}" class="a">
				 {-$prev['title']-}
				</a>
			  </div>
			  <div class="nextprev" style="margin-bottom:2rem;">
				<div class="b">下一篇</div>
				<a href="{-$next['url']-}" class="a">
				{-$next['title']-}
				</a>
			  </div>
			
			</div>
			
		</div>
		
		
		<content type="relevant" limit="8" order="id DESC" mid="1">
		<?php if($i==1){?>
		<div class="associated">
			<h4>延伸阅读</h4>
			<ul class="news-list">
		<?php }?>
				<li>
					<a href="{-$values.url-}">
					<img style="width:110px!important;" src="{-:$values['thumbnail']-}">
					<p>{-$values.a_title-}</p>					
					</a>
				</li>
		<?php if($i==8){?>
			</ul>
		</div>
		<?php }?>
		</content>
</div>
<script>
$(function(){
	$.post('<?php echo U('Content/index/u_f');?>',{f:'click',aid:<?php echo $currentData['id'];?>,cid:<?php echo $currentData['cid'];?>});
	
	$('img').parent('p').css('textIndent','0em');
	
});
</script>
</block>
<block name="footer"></block>