<!DOCTYPE html>
<!-- saved from url=(0051)http://z.tongwei.cn/special/specialid/119.html#twbd -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>2018（第十二届）中国品牌节</title>
	<meta name="keywords" content="2018（第十二届）中国品牌节">
	<meta name="description" content="2018（第十二届）中国品牌节">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<link href="/static/2018pinpaijie/bootstrap.min.css" rel="stylesheet">
	<link href="/static/2018pinpaijie/css.css" rel="stylesheet">
	<link href="/static/2018pinpaijie/fitCss.css" rel="stylesheet">
	<link rel="stylesheet" href="/static/2018pinpaijie/layer.css" id="layui_layer_skinlayercss">
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2018pinpaijie/jquery.min.js"></script>

	<style>
		#hyzb{
			width:1000px;
			margin: 20px auto;
		}
		.left{float:left;display:inline;}
		.right{float:right;display:inline;}
		.wrap{width: 1000px;}
		.wrap img{width: 100%;}        
		.live_title{background: #e6462e; line-height: 50px; height:50px; color:#FFF;}
		.live_title a{color: #fff;}
		a.btn{background: #F4F400; padding: 3px 10px; color:#049; border-radius: 3px;}
		a.btn:hover{background: #E6FB73}
		.live_title .left{margin-left: 10px;}
		.live_title .right{margin-right: 10px;}
		#d{background: rgba(0,0,0,.8); width: 100%; height: 100%;  position:fixed;top:0;left:0; text-align:center; display: none; z-index: 99998;}
		#d a{position:absolute; top:0; margin:auto auto; bottom:0; left:0; right:0; width:200px; height:80px; line-height: 40px; text-align: center; color:#fff; font-size: 20px; background: red; z-index: 99999;}

		@media only screen and (max-width: 767px){
			#hyzb{
				width:100%;
			}
			div.wrap{width:100%;}
			div.jituanlogo{display:none;}
			div.live_title{font-size:14px;}	 
		}

		#ppjjj img{
			width:100%;
		}

		.nw-r-ul{
			width:96%;
			float:right;
		}

		.nw-r{
			position: relative;
		}



	</style>

</head>
<body>

<!-- <div class="banner"><div class="banWrap"></div></div> -->
<div>
	<div >
		<php>

        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	
		$is_iphone = (strpos($agent, 'iphone')) ? true : false;
		$is_ipad = (strpos($agent, 'ipad')) ? true : false;
		$is_android = (strpos($agent, 'android')) ? true : false;  

		$map = array();
		$map['specialid'] = 12;		
        
        if($is_iphone||$is_ipad||$is_android)
		$map['typeid'] = 6;
		else
        $map['typeid'] = 5;

		$map['a_status'] = 1;
		$specialContent=M('SpecialContent');
		$currentData = $specialContent->where($map)->order('sort desc')->find();
		</php>
		<img id="toutu" src="{-$currentData.thumbnail-}" alt="" >
	</div>
</div>
<div id="nav-menu" class="fit-menu" >
		<div class="fmWrap" style="width:900px;">
		<ul class="ul-fmw clearfix" id="home">
			<li class="active">
			<a href="/">首页</a>
			</li>
			<li>
			<a class="fmwList n-ltjj" href="#ltjj">品牌节简介</a>
			</li>
			<li>
			<a class="fmwList n-twbd" href="#jckd">精彩图文</a>
			</li>
			
			
			
			
		
			</li>			
		</ul>
	</div>
</div>


<div class="twbd" id="jchg">
	<!-- <div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>精彩图文</h3>
			<p>Graphic View</p>
		</div>
	</div> -->    
    <div class="twbdWrap" id="lunbotu" style="width:900px;">    
	
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">	

                  <sql sql="SELECT title,url,thumbnail FROM h_special_content where specialid=12 and typeid=1 ORDER BY sort desc,id desc">                 
						
                       <li data-target="#carousel-example-generic"
                        data-slide-to="{-$key-}" class="<if condition='$key eq 0'>active</if>"></li>

				  </sql>	

				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				<sql sql="SELECT title,url,thumbnail FROM h_special_content where specialid=12 and typeid=1 ORDER BY sort desc,id desc">    

				   <div class="item <if condition='$key eq 0'>active</if>"><a href="javascript:;" target="_blank"><img src="{-$values['thumbnail']-}"></a><div class="carousel-caption"></div></div>

			    </sql>
			 

				
				</div> 
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> --> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> --> <span class="sr-only">Next</span> </a> 
			</div>

</div>
 

	<div class="twbdWrap" style="margin-top:10px;position:relative;">
        
        <a href="/special/lists/specialid/12/typeid/1.html" style="padding:0px 2px;display:inline-block;height:20px;line-height:20px;position:absolute;right:1px;top:0px;">+MORE</a>
        
		<div class="conWp">


			<div class="row news clearfix" style="min-height:200px;">		

			    <div class="nw-r" id="left_news" style="width:50%;float:left;min-height:140px;">
				    <a href="javascript:;"><div class="wangqi"></div></a>
					<div class="bk10"></div>
					<ul class="nw-r-ul">

						<sql sql="select * from h_special_content where specialid=12 and typeid=2 order by sort desc limit 5">
						 

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
			
				<div class="nw-r nw-l" id="right_news" style="width:50%;float:left;min-height:140px;">
				   <a href="javascript:;"><div class="benqi"></div></a>
					<ul class="nw-r-ul">

                        <sql sql="select * from h_special_content where specialid=12 and typeid=3 order by sort desc limit 5">
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
</div>

<div style="clear:both;"></div>
<div class="ltjj" id="ltjj">
	<div class="default-comTit" style="margin-top:10px;">
		<div class="def-ct-wrap pAnbg">
			<h3>品牌节<span>简介</span></h3>
			<p>Forum profile</p>
		</div>
	</div>
	<div class="ltjjWrap" id="ppjjj" style="width:900px;">
    
    <php>
	$map = array();
	$map['specialid'] = 12;			
	$map['typeid'] = 4;
	$map['a_status'] = 1;
	$specialContent=M('SpecialContent');
	$currentData = $specialContent->where($map)->order('sort desc')->find();
	</php>

	<p>
      {-$currentData.content-}
	</p>

<!-- 视频 -->

	<div class="index-video" style="margin: 19px 19px 0px">
						

						<ul class="index-video-list clearfix">

									<li data-video="http://v.tongwei.cn/Uploads/2017/1025/1508895172_59efe9c40a98b.mp4" style="float:left;width:350px;margin-left:60px;text-align:center;margin-bottom:20px;"><a href="javascript:;"><img src="/Public/ppj20181.jpg" alt="通威宣传片中文版（2017年）"><span><b style="">通威宣传片中文版（2017年）</b></span><i class="iconfont icon-play"></i></a></li>

									<li data-video="/Public/pinpaijie20182.mp4" style="width:350px;float:left;margin-left:60px;text-align:center;margin-bottom:20px;"><a href="javascript:;"><img src="/Public/ppj20182.jpg" alt="2018（第十二届）中国品牌节"><span><b style="">2018（第十二届）中国品牌节</b></span><i class="iconfont icon-play"></i></a></li>						

						</ul>
					</div>
   
	
	</div>

	

<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/jquery.kwicks.js"></script>
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/layer/layer.js"></script>
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/layer/laytpl.js"></script>
<script type="text/javascript" src="{-$Think.config.INSTALL_PATH-}/static/js/app_pinpai2018.js"></script>
					

</div>


<div class="footer" style="margin-top:100px;">
	<div class="ft_btm">
		<div class="ftbWp">
			<div class="ft-link">
				
			</div>
			<div class="ft-copy"> <a href="http://www.tongwei.com/">通威集团</a> <span>All Rights Reserved.</span> 蜀ICP备14018337号</div>
		</div>
	</div>
</div>
<script src="/static/2018pinpaijie/bootstrap.min.js"></script>
<script src="/static/2018pinpaijie/jquery.cookie.min.js"></script>
<script src="/static/2018pinpaijie/layer.min.js"></script>
<script type="text/javascript">

    var device_wid=$(window).width();
    var wid=960;
  
    if(device_wid<600)
    {
    	$('#lunbotu').css('width','100%');
    	$('#ppjjj').css('width','100%');
    	$('#left_news').css('width','100%');
    	$('#left_news').css('marginBottom','10px');
    	$('#right_news').css('width','100%');
    	$('.index-video-list li').css('width','100%');
    	$('.index-video-list li').css('marginLeft','0px');

        wid=device_wid; 
    }
 

    // 视频播放
    $('.index-video li').click(function(){
		var video = $(this).data('video');
		$.G.playVideo(video,wid);
	});


	if(ishome){var dt= 0,ob;var wh=$(window).height()/2;ob=$('#home').find('li');ob.eq(0).attr('class','active');}else{$('#home').find('li').eq(3).attr('class','active');}
	if(!touch){
		$(window).scroll(function() {
			var scrollt=document.documentElement.scrollTop + document.body.scrollTop;
			if (scrollt>586){$("#nav-menu").addClass("navbar-fixed-top");}else{$("#nav-menu").removeClass("navbar-fixed-top");}
			if(ishome){
				dt=$(document).scrollTop();ob.removeAttr('class');
				if(dt>$('#hzmt').offset().top-wh){
					ob.eq(6).attr('class','active');
				}else if(dt>$('#nyqy').offset().top-wh){
					ob.eq(5).attr('class','active');
				}else if(dt>$('#nyjb').offset().top-wh){
					ob.eq(4).attr('class','active');
				}else if(dt>$('#twbd').offset().top-wh){
					ob.eq(3).attr('class','active');
				}else if(dt>$('#ltyc').offset().top-wh){
					ob.eq(2).attr('class','active');
				}else if(dt>$('#ltjj').offset().top-wh){
					ob.eq(1).attr('class','active');
				}else{
					ob.eq(0).attr('class','active');
				}
			}
		});
	}
	
</script>


</body></html>
