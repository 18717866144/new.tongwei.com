<?php defined('HX_CMS') or exit;$thispid = $navigate['id'];?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
<meta name="format-detection"content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link rel="dns-prefetch" href="//www.tongwei.com">
<title>{-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
<meta name="keywords" content="{-$Think.config.WEB_KEYWORDS-}">
<meta name="description" content="{-$Think.config.WEB_DESCRIPTION-}">
<link rel="icon" href="/favicon.ico">

<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/TouchSlide.js"></script>
<style>
*{margin:0px;padding:0px;font:14px Microsoft YaHei;}
a{text-decoration:none;color:#444;}
ul li{list-style:none;}
body{background:#78797b;}
#header{width:100%;text-align:center;margin-bottom:1rem;}
#header h3{font-size:16px;color:#fff;}
#impression-slide img{width:100%;}
#main{width:90%;padding:0 5%;}
#main .h-title{height:5rem;line-height:5rem;font-size:1.2rem;color:#fff;font-weight:600;}
#main .mainBox{width:100%;margin-bottom:6rem;}
#main .mainBox .tabs-head{width:100%;height:3rem;float:left;margin-bottom:1rem;}
#main .mainBox .tabs-head .h{
	display:inline-block;
	float:left;width:33%;
	height:3rem;
	line-height:3rem;
	text-align:center;
	font-size:1rem;
	color:#fff;
	}
#main .mianBox .tabs-head .h-active{border-bottom:2px solid #049;color:#049;}	
#main .mainBox .tabs-bd{width:100%;min-height:3rem;float:left;position:relative;}
#main .mainBox .tabs-bd .b{width:100%;min-height:3rem;position:absolute;left:0;top:0;}
.disnone{display:none;}
.news-list,.video-list{margin-bottom:7rem;;}
.news-list li,.video-list li{border-bottom:1px solid #f1f1f1;margin-bottom:2.5rem;}
.news-list li,.video-list li:last-child{border:0;}
.news-list li a,.video-list li a{color:#2b2b2b; display:block; min-height:auto; padding:0px 0px 5px;}
.news-list li  .news-list-img{float:right; width:33%;min-width:98px; margin-left:8px;}
.news-list li  .news-list-img img,.video-list li .video-img img{width:100%;}
.news-list li  .news-list-other{line-height:20px; font-size:12px;color:#999;}
.news-list li  .news-list-title,.video-list li .video-title{width:98%;display:block; line-height:130%; font-size:16px;}
.news-list li.headlines .headlines-img img{width:100%; margin-top:5px;}
.news-list li.headlines .headlines-title{font-size:18px; font-weight:500;color:#fff;}
.news-list li .date{color:#f9f9f9;font-size:12px;}
.footer{width:100%;height:4rem;position:fixed;bottom:0;left:0;z-index:999;background:#fff;}
.footer .foot-b{width:50%;height:4rem;float:left;color:#555;text-align:center;line-height:4rem;}
.footer .foot-b .icon{width:1.4rem;height:1.4rem;display:inline-block;}
.footer .foot-b .home{background:url('/Public/home_icon.png') no-repeat center;background-size:100%;}
.footer .foot-b .news{background:url('/Public/news_icon.png') no-repeat center;background-size:100%;}
.footer .foot-b .txt{padding:0 .2rem;height:1.4rem;line-height:1.4rem;display:inline-block;}
</style>
</head>
<body>
<div id="header">
<img src="/Public/twnew/logo_origin.png" style="display:inline-block;margin-top:2rem;height:2.4rem;">
<h3>为了生活更美好</h3>
</div>
<div id="impression-slide" class="slide impression-slide">
	<ul class="slide-ul impression-slide-ul">
		<sql sql="select * from h_slide where type_id=2 and l_status=1 order by sort desc,id desc limit 5">
		<li><notempty name="values.url"><a href="{-$values.url-}" target="_blank"><img src="{-$values.picurl-}"></a><else/><img src="{-$values.picurl-}"></notempty></li>
		</sql>
	</ul>
	<ul class="slide-tit impression-slide-tit"></ul>
</div>
<script>
//通威印像图片轮播
TouchSlide({slideCell:'#impression-slide', titCell:'.impression-slide-tit', mainCell:'.impression-slide-ul', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, autoPage:'<li></li>'});
</script>
<div id="main">
  
  <div class="h-title">新闻中心NEWS</div>
  <div class="mainBox">
       <div class="tabs-head">
	      <span class="h h-active">推荐</span>
		  <span class="h">集团快讯</span>
		  <span class="h">媒体报道</span>
	   </div>
	   <div class="tabs-bd">
	      <div class="b">
		    <ul class="news-list">
			<content limit="10" type="list" where="FIND_IN_SET('h',attr)" cid="15" field="id,title,title_short,title_hot,style,save_time,url,description,thumbnail">
			   <li class="headlines clearfix">
					<a href="/index.php/news/{-$values['id']-}.html">	
					<p class="headlines-img"><img src="{-$values['thumbnail']-}" alt="{-$values.a_title-}"></p>	
                    <p class="headlines-title">{-$values['title_hot']?$values['title_hot']:$values['a_title']-}</p>					
					</a>
					<div class="date clearfix">
					{-:date('Y年m月d日',$values['save_time'])-}
					</div>					
				</li>
				
			</content>
			</ul>
		  </div>
		  <div class="b disnone">
		    <ul class="news-list">
			<content limit="10" type="list" where="FIND_IN_SET('h',attr)" cid="15" field="id,title,title_short,title_hot,style,save_time,url,description,thumbnail">
			   <li class="headlines clearfix">
					<a href="/index.php/news/{-$values['id']-}.html">	
					<p class="headlines-img"><img src="{-$values['thumbnail']-}" alt="{-$values.a_title-}"></p>	
                    <p class="headlines-title">{-$values['title_hot']?$values['title_hot']:$values['a_title']-}</p>					
					</a>
					<div class="date clearfix">
					{-:date('Y年m月d日',$values['save_time'])-}
					</div>					
				</li>
				
			</content>
			</ul>
		  </div>
		  <div class="b disnone">
		    <ul class="news-list">
			<content limit="10" type="list" where="" cid="18" field="id,title,title_short,title_hot,style,save_time,url,description,thumbnail">
			   <li class="headlines clearfix">
					<a href="/index.php/news/{-$values['id']-}.html">	
					<p class="headlines-img">
					<img src="<?php echo $values['thumbnail']?$values['thumbnail']:'/Public/twnew/default.png'; ?>">
					</p>	
                    <p class="headlines-title">{-$values['title_hot']?$values['title_hot']:$values['a_title']-}</p>					
					</a>
					<div class="date clearfix">
					{-:date('Y年m月d日',$values['save_time'])-}
					</div>					
				</li>
				
			</content>
			</ul>
		  </div>
	     
	   </div>
	<div style="clear:both;"></div>   
  </div>
  
  <div class="footer">
    <span class="foot-b">
	 <span class="icon home"></span>
	 <span class="txt">首页</span>
	</span>
	<span class="foot-b">
	 <span class="icon news"></span>
	 <span class="txt">新闻</span>
	</span>
  </div>
  
</div>



<script>
  $('.tabs-head').on('click','.h',function(){
	  
	   let idx = $(this).index();
	   
	   $('.tabs-bd .b').addClass('disnone');
	   $('.tabs-bd .b:eq('+idx+')').removeClass('disnone');
	  
	  
  });
   
</script>
</body>
</html>
