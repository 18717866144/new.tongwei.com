<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head">
<?php if($isweixin == 1){ ?>
<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>
var nohashUrl = window.location.href.replace(window.location.hash, '');
var wx_nonceStr = '{-:rand_string(10)-}';
var wx_title = '{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-}';
var wx_desc = '{-:$navigate['description'] ? $navigate['description'] : $navigate['navigate_name']-}';
var wx_link = nohashUrl;
var wx_imgUrl = 'http://www.tongwei.com{-:($navigate['thumbnail']?$navigate['thumbnail']:'/static/img/620x350-2.jpg')-}';
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
	<div class="title" style="text-align:center">
	{-$navigate['navigate_name']-}	
	</div>
	<div class="other js-trigger">
	<i class="iconfont icon-menu"></i>
	</div>
</header>
</block>

<block name="main">
<div class="wrap m-t-10 clearfix" style="padding-bottom: 15px;">
		<div class="right slogan-bg" >
	    <div class="content_tit">
		  {-$navigate['navigate_name']-} &nbsp;<i class="layui-icon layui-icon-next" style=""></i>
		</div>
		<div class="content clearfix">
			<div style="width:100%;float:left;">
			  <p>总部地址：中国·成都·天府大道中段588号</p>
			
			  <p>邮编：610093</p>
			  <a href="tel:862885188888"><p>电话：+86-28-8518 8888</p></a>
			  <p>传真：+86-28-8519 9999</p>
			  <p style="margin-top:30px;"><img src="/Public/twnew/contact_hotline.png" style="width:120px!important;"/></p>
			  <a href="tel:4008080888"><p style="font-size:18px;font-weight:bold;">800-8866888 &nbsp;&nbsp;400-8080888</p></a>			
			 
			</div>	
			<div style="width:100%;float:left;margin-top:20px;">
			 <a href="https://map.baidu.com/poi/%E9%80%9A%E5%A8%81%E5%9B%BD%E9%99%85%E4%B8%AD%E5%BF%83/@11585670.755611815,3553345.775,19z?uid=d66aa490b71e68d1aeb22a25&info_merge=1&isBizPoi=false&ugc_type=3&ugc_ver=1&device_ratio=1&compat=1&querytype=detailConInfo&da_src=shareurl" target="_blank">
			 <img src="/Public/twnew/contact_map.jpg" style="width:100%;">
			 </a>
			</div>
		</div>
	</div>
</div>
</block>