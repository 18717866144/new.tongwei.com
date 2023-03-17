<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="title"><title>{-$currentData.title-} - {-$paper.title-}{-$paperList.title-} {-$layout.layout_number-}：{-$layout.layout_title-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$currentData.keywords-}"></block>
<block name="description"><meta name="description" content="{-$currentData.description-}"></block>

<block name="head">
<?php if($isweixin == 1){ ?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
var nohashUrl = window.location.href.replace(window.location.hash, '');
var wx_nonceStr = '{-:rand_string(10)-}';
var wx_title = '{-$currentData.title|str_replace="'","",###-}';
var wx_desc = '{-$currentData.description|str_replace="'","",###-}';
var wx_link = nohashUrl;
var wx_imgUrl = 'http://www.tongwei.com{-$currentData.thumbnail-}';
var wx_timestamp = '{-:time()-}';
var wx_sign;
var wx_appid = 'wx53f1624eb99f1f3d';
$.ajax({
		url:'/index.php/index/ajaxGetWeixinSign',
		type:"post",
		data:{url:nohashUrl, noncestr:wx_nonceStr, timestamp:wx_timestamp},
		success: function(data){					
			if(data.status==1){				
				wx_sign = data.info;
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
		jsApiList: ['onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo','onMenuShareQZone']
	});

	wx.ready(function(){
		wx.onMenuShareAppMessage({
			title: wx_title,
			desc: wx_desc,
			link: wx_link,
			imgUrl: wx_imgUrl,
			type: '',
			dataUrl: '',
			success: function () { 
				
			},
			cancel: function () { 
				
			}
		});
		wx.onMenuShareTimeline({
			title: wx_title,
			link: wx_link,
			imgUrl: wx_imgUrl,
			success: function () { 
				
			},
			cancel: function () { 
				
			}
		});
		wx.onMenuShareQQ({
			title: wx_title,
			desc: wx_desc,
			link: wx_link,
			imgUrl: wx_imgUrl,
			success: function () { 
			   
			},
			cancel: function () { 
			   
			}
		});
		wx.onMenuShareWeibo({
			title: wx_title,
			desc: wx_desc,
			link: wx_link,
			imgUrl: wx_imgUrl,
			success: function () { 
			
			},
			cancel: function () { 
			
			}
		});
		wx.onMenuShareQZone({
			title: wx_title,
			desc: wx_desc,
			link: wx_link,
			imgUrl: wx_imgUrl,
			success: function () { 
			   
			},
			cancel: function () { 
				
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
if( strpos($url,'http://www.tongwei.com/') ===0 ){
	$backUrl = 'javascript:history.back();';
}else{
	$backUrl = '/paper/'.$pid.'/'.$lid.'.html';
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
	{-$paper['title']-}	
	</div>
	<div class="other js-trigger">
	<i class="iconfont icon-menu"></i>
	</div>
</header>
</block>

<block name="snav">
<php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>
<div class="wrap snav">
	<ul>
		<li><a href="{-$paper.url-}" style="display:inline">{-$paper.title-}</a> > <a href="{-$paperList.url-}" style="display:inline">{-$paperList.title-}</a> > {-$layout.layout_number-}：{-$layout.layout_title-}</li>
	</ul>
</div>

</block>

<block name="main">
<div class="wrap m-t-10 clearfix" style="padding-bottom: 15px;" id="minHeight">
		<if condition="$preview eq 1">
		<div style="padding:15px; text-align:center;font-size:22px;background:#C5EDEC;border:1px solid #f00;">该页面现为预览地址，不能作为正式页面访问，请到后台更改内容发布设置。</div>
		</if>
		<notempty name="currentData.title_top"><h2 class="title-top">{-$currentData['title_top']-}</h2></notempty>
		<h1 class="title">{-$currentData['title']-}</h1>
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
		</div>
		
		<content type="relevant" limit="8" order="id DESC" mid="1">
		<?php if($i==1){?>
		<div class="associated">
			<h4>延伸阅读</h4>
			<ul class="news-list">
		<?php }?>
				<li>
					<a href="{-$values.url-}">
					<img src="{-:thumb($values['thumbnail'],110,72,1)-}">
					<p>{-$values.a_title-}</p>					
					</a>
				</li>
		<?php if($i==8){?>
			</ul>
		</div>
		<?php }?>
		</content>
		
		<php>
		$content = json_decode($layout['content'],true);
		</php>
		<div class="associated">
			<h4>本版新闻</h4>
			<ul class="news-list" style="padding-top: 0">
				<volist name="content" id="values">
				<li>
				<a href="{-$values['areaLink']-}" class="headlines-pic">
					<div class="news- -t clearfix">					
						<div class="news-list-title">			
							{-$values.areaTitle-}
						</div>
					</div>
					<div class="news-list-other clearfix">{-$layout.layout_number-}：{-$layout.layout_title-} &nbsp; &nbsp; {-:date('Y年m月d日',$paperList['save_time'])-}</div>
				</a>
				</li>
				</volist>
			</ul>
		</div>
</div>
<script>
$(function(){
	$.post('<?php echo U('Paper/content_u_f');?>',{f:'click',id:<?php echo $currentData['id'];?>});
});
</script>
</block>