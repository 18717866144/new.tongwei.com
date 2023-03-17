<!DOCTYPE html>
<!-- saved from url=(0051)http://z.tongwei.cn/special/specialid/119.html#twbd -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>SNEC第十三届(2019)国际太阳能光伏与智慧能源(上海)展览会暨论坛</title>
	<meta name="keywords" content="SNEC第十三届（2019）国际太阳能光伏与智慧能源（上海）展览会暨论坛">
	<meta name="description" content="SNEC第十三届（2019）国际太阳能光伏与智慧能源（上海）展览会暨论坛">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<link href="/static/2019snec/bootstrap.min.css" rel="stylesheet">	
	<link rel="stylesheet" href="/static/2019snec/layer.css" id="layui_layer_skinlayercss">
	<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
	<link href="/static/2019snec/css.css" rel="stylesheet">
	<link href="/static/2019snec/fitCss.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2019snec/jquery.min.js"></script>

</head>
<body>

<!-- <div class="banner"><div class="banWrap"></div></div> -->

<div id="toutu">

		<!-- <img src="/static/2019snec/banner.jpg" alt="" id="toutu"> -->
</div>

<div id="nav-menu" class="fit-menu" >
		<div class="fmWrap" >
		<ul class="ul-fmw clearfix" id="home">
			<li class="active">
			<a href="/">首页</a>
			</li>
			<li>
			<a class="fmwList n-ltjj" href="#jcsp">精彩视频</a>
			</li>
			
			<li>
			<a class="fmwList n-twbd" href="#jctw">精彩图文</a>
			</li>	
             			
			<li>
			<a class="fmwList n-ltjj" href="#ltjj">论坛简介</a>
			</li>
		
						
		</ul>
	</div>
</div>


<div class="twbd" id="jcsp">
	<!-- <div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>精彩图文</h3>
			<p>Graphic View</p>
		</div>
	</div> -->    
	<!-- 视频 -->

	<div class="index-video">
		<div class="default-comTit" >
			<div class="def-ct-wrap pAnbg">
				<h3>精彩<span>视频</span></h3>
				<p>Forum Videos</p>
			</div>
		</div>				

		<div class="videos">
		
		  
		   <ul class="index-video-list clearfix ">
			
				<li data-video="/Public/1.mp4" class="video-box one-video">
					<a href="javascript:;"><img src="/Public/1.png">
					<div class="video-tit"><b style="">2019SNEC，通威来了</b></div>
					<i class="iconfont icon-play play1"></i>
					</a>
				</li>

			</ul>
		   
			
		  <!--
		   <ul class="index-video-list clearfix">

				<li data-video="http://v.tongwei.cn/Uploads/2017/1025/1508895172_59efe9c40a98b.mp4" class="video-box">
					<a href="javascript:;"><img src="/Public/ppj20181.jpg" alt="通威宣传片中文版（2017年）">
					<div class="video-tit"><b style="">通威宣传片中文版（2017年）</b></div>
					<i class="iconfont icon-play play"></i>
					</a>
				</li>

				<li data-video="/Public/pinpaijie20182.mp4" class="video-box">
					<a href="javascript:;"><img src="/Public/ppj20182.jpg" alt="2018（第十二届）中国品牌节">
					<div class="video-tit"><b style="">2018（第十二届）中国品牌节</b></div>
					<i class="iconfont icon-play play"></i>
					</a>
				</li>						

			</ul>
			<a class="prev-btn iconfont icon-left prevnext"><i class="layui-icon layui-icon-left"></i>  </a>
			<a class="next-btn iconfont icon-right prevnext"><i class="layui-icon layui-icon-right"></i>  </a>
			-->		
			
		   
		
		</div>
	</div>
	
    <div class="twbdWrap" id="jctw">    
	       <div class="default-comTit">
				<div class="def-ct-wrap pAnbg">
					<h3>精彩<span>图文</span></h3>
					<p>Pictures News</p>
				</div>
			</div>	
			
			
	  <div class="twbdWrap">
        
        <a href="/special/lists/specialid/17/typeid/1.html" class="seemore-top">+MORE</a>
        
		<div class="conWp">
			<div class="row news clearfix" >		

			    <div class="nw-r" id="left_news">
				    <a href="javascript:;"><div class="benqi"></div></a>
					<div class="bk10"></div>
					<ul class="nw-r-ul">
                        <!-- 本期 -->
						<sql sql="select * from h_special_content where specialid=17 and typeid=2 order by sort desc limit 5">
						 

							<li class="nw-li-a">
							<a href="{-$values['url']-}" target="_blank">
								{-:($values['title'])-}
							</a>
							<!--<div style="width:98%;margin-top:13px;">
								<img src="{-:($values['thumbnail'])-}" alt="">
							</div>-->
							</li>					


						</sql>

					</ul>
				</div>		
			
				<div class="nw-r nw-l" id="right_news">
				   <a href="javascript:;"><div class="wangqi"></div></a>
					<ul class="nw-r-ul">
                        <!-- 媒体报道 -->
                        <sql sql="select * from h_special_content where specialid=17 and typeid=3 order by sort desc limit 5">
							<li class="nw-li-a">
							<a href="{-$values['url']-}" target="_blank">
								{-:($values['title'])-}
							</a>
							</li>

						</sql>	



					</ul>
				</div>
				

			</div>
			<!-- <div class="newsMore" style="margin-bottom:80px;"><a href="/special/lists/specialid/10/typeid/1.html?type=pre">查看更多</a> </div> -->
			
		</div>
	</div>
			
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">	

                  <sql sql="SELECT title,url,thumbnail FROM h_special_content where specialid=17 and typeid=1 ORDER BY sort desc,id desc">                 
						
                       <li data-target="#carousel-example-generic"
                        data-slide-to="{-$key-}" class="<if condition='$key eq 0'>active</if>"></li>

				  </sql>	

				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				<sql sql="SELECT title,url,thumbnail FROM h_special_content where specialid=17 and typeid=1 ORDER BY sort desc,id desc">    

				   <div class="item <if condition='$key eq 0'>active</if>"><a href="javascript:;" target="_blank"><img src="{-$values['thumbnail']-}"></a><div class="carousel-caption"></div></div>

			    </sql>
			 

				
				</div> 
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> --> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> --> <span class="sr-only">Next</span> </a> 
			</div>

    </div>
 

	
</div>

<div style="clear:both;"></div>
<div class="ltjj" id="ltjj">
	<div class="default-comTit" style="margin-top:80px;">
		<div class="def-ct-wrap pAnbg">
			<h3>论坛<span>简介</span></h3>
			<p>Forum profile</p>
		</div>
	</div>
	<div class="ltjjWrap" id="ppjjj">
    
		<php>
		$map = array();
		$map['specialid'] = 17;			
		$map['typeid'] = 4;
		$map['a_status'] = 1;
		$specialContent=M('SpecialContent');
		$currentData = $specialContent->where($map)->order('sort desc')->find();
		</php>

		<p>
		  {-$currentData.content-}
		</p>


	   
		
	</div>					

</div>


<div class="footer">
	<div class="ft_btm">
		<div class="ftbWp">
			<div class="ft-link">
				
			</div>
			<div class="ft-copy"> <a href="http://www.tongwei.com/">通威集团</a> <span>All Rights Reserved.</span> 蜀ICP备05002048号</div>
		</div>
	</div>
</div>
<script src="/static/2019snec/bootstrap.min.js"></script>
<script src="/static/2019snec/jquery.cookie.min.js"></script>
<script src="/static/2019snec/layer.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="/static/js/jquery.kwicks.js"></script>
<script type="text/javascript" src="/static/js/layer/layer.js"></script>
<script type="text/javascript" src="/static/js/layer/laytpl.js"></script>
<script type="text/javascript" src="/static/js/app_pinpai2018.js"></script>
<script type="text/javascript">

    var device_wid=$(window).width();
    var wid='';
    var height='';
  
    if(device_wid<600)
    {   
        wid=device_wid-40; 
		height =wid-100;
		
		
    }
	
	
	// 视频播放
		$('.index-video li').click(function(){
			var video = $(this).data('video');
			$.G.playVideo(video,wid,height);
		});
	
	/* 视频轮播 */ 
	  $('.index-video').slide({ 
		titCell:'', 
		mainCell:'ul', 
		titOnClassName:'hover', 
		effect:'leftLoop', 
		autoPlay:false, 
		autoPage:false, 
		prevCell:'.prev-btn', 
		nextCell:'.next-btn', 
		vis:2
	  });

	
</script>


</body></html>
