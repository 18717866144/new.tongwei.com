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
		<!--<h1 class="title">{-$navigate['navigate_name']-}</h1>-->
		<div class="content clearfix">
			
			<?php 
		   $id=$navigate['id']; 
		   switch($id){	  
			 
			 case 1:
             case 2: echo '<include file=\'./Core/Template/Default/Mobile/commons/intro.php\' />' ;break;  
			 case 3: echo '<include file=\'./Core/Template/Default/Mobile/commons/chairman.php\' />' ;break; 			 
			 case 4: echo '<include file=\'./Core/Template/Default/Mobile/commons/develop.php\' />' ;break;			 
			 case 5: echo '<include file="./Core/Template/Default/Mobile/commons/honor.php" />' ;break;			 
			 case 6: echo '<include file=\'./Core/Template/Default/Mobile/commons/publics.php\' />' ;break;
			 case 30: echo '<include file=\'./Core/Template/Default/Mobile/commons/members.php\' />' ;break;
			 
			 case 7:
             case 8: echo '<include file=\'./Core/Template/Default/Mobile/commons/agri.php\' />' ;break; 			 
			 case 9: echo '<include file=\'./Core/Template/Default/Mobile/commons/guangfu.php\' />' ;break;			 
			 case 10: echo '<include file=\'./Core/Template/Default/Mobile/commons/yuguang.php\' />' ;break;	
             case 11: echo '<include file=\'./Core/Template/Default/Mobile/commons/breeds.php\' />' ;break;			 
			 case 12: echo '<include file=\'./Core/Template/Default/Mobile/commons/foods.php\' />' ;break;
			 case 13: echo '<include file=\'./Core/Template/Default/Mobile/commons/diversified.php\' />' ;break;
			 
			 case 19:
             case 20: echo '<include file=\'./Core/Template/Default/Mobile/commons/wenhualinian.php\' />' ;break; 
			 case 21: echo '<include file=\'./Core/Template/Default/Mobile/commons/wenhuahuodong.php\' />' ;break;
             case 31: echo '<include file=\'./Core/Template/Default/Mobile/commons/pinpai.php\' />' ;break; 	

			 case 25:
             case 26: echo '<include file=\'./Core/Template/Default/Mobile/commons/zhaopin.php\' />' ;break; 
			 case 27: echo '<include file=\'./Core/Template/Default/Mobile/commons/hrpeiyang.php\' />' ;break; 
			 case 32: echo '<include file=\'./Core/Template/Default/Mobile/commons/hrlinian.php\' />' ;break; 
             case 34: echo '<include file=\'./Core/Template/Default/Mobile/commons/twschool.php\' />' ;break; 			 
                
			 
		   }
		   
		   
		   ?>	
			
			
		</div>
</div>
</block>