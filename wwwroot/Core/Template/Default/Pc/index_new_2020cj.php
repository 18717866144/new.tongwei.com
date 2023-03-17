<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>通威集团有限公司 - 为了生活更美好</title>
  <meta name="keywords" content="通威集团有限公司">
  <meta name="description" content="通威集团有限公司">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
  <link rel="stylesheet" href="/Public/twnew/layui/css/layui.css">
  <link rel="stylesheet" href="/Public/twnew/css/index.css">
</head>
<body style="background-color:#d50707;">

<script>
function IsPC() {
	var userAgentInfo = navigator.userAgent;
	var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPod");
	var flag = true;
	for (var v = 0; v < Agents.length; v++) {
		if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
	}
	if( location.toString().indexOf("?mobile") >0 ) { 
		flag = true;
	}
	return flag;
}
if (!IsPC()) {
	location.href = "/index.php?d=m";
}
</script>
 
<div id="head">	
	<div id="focus-image" class="row">
		<div class="focus-image">
		<ul class="slide-image">	
             
			<sql sql="select * from h_slide where type_id=1 and l_status=1 order by sort desc,id desc limit 5">
				<li style="background:url({-$values.picurl-}) no-repeat center center;">
				<notempty name="values.url"><a href="{-$values.url-}" target="_blank"></a></notempty>
				</li>
			</sql>   

		</ul>
		</div>
		
		<!--<a href="javascript:;" class="ctl-btn prev"><i class="layui-icon layui-icon-left" ></i> </a>-->
		<a href="javascript:;" class="ctl-btn next"><i class="layui-icon layui-icon-right" ></i> </a>
	</div>

	<div class="nav">
		
		<div class="nav-main">
			<ul class="layui-nav nav1" lay-filter="" style="position:static">
			  <li class="layui-nav-item1" style="margin-right:154px;"><a href="{-$Think.config.WEB_URL-}" style="padding:0px;"><img src="__PUBLIC__/twnew/logo.png"></a></li>
			</ul>

	        <ul class="layui-nav nav-right" lay-filter="" id="menus">    
				  
				  <div class="hidden-div">
				      <!-- 导航隐藏 -->
					  <div id="menu-anim" data="0">
						  <li class="layui-nav-item2" style="margin-right:30px;"><a href="/">首页</a></li>
						  <navigate type="all">
						  <li class="<?php if($key == 33) echo 'layui-nav-item2';else echo 'layui-nav-item0'; ?>" >
							<a href="{-$values['url']-}" >{-$values['navigate_name']-}</a>
							<notempty name="values.child">
							<dl class="layui-nav-child1"> 
							<volist name="values['child']" id="v">
							  <dd><a href="{-$v['url']-}" >{-$v['navigate_name']-}</a></dd>
							</volist>						 
							</dl>
							</notempty>
						  </li>
						 </navigate>

					  </div>
				  </div>
				  
				  <li class="layui-nav-item " style="display:none;position:relative;width:26px;margin-right:10px;overflow:hidden;z-index:10;">
				   <a href="javascript:;" class="nav-menu"></a>		 
				  </li>	
			
				  <li class="layui-nav-item" style="position:relative;">
				    <a href="javascript:;" class="nav-search"></a>
				    <dl class="layui-nav-child search-box"> 
				    <form action="/search" method="get" name="search" >
				      <dd class="search-dd">
					  <input type="text" name="q" class="ipt" placeholder="输入关键词，回车" autocomplete="off"/>
					  <span class="go-search"></span>
					  </dd>
					  </form>			     
				    </dl>
				  </li>

				  <li class="layui-nav-item " style="position:relative;width:26px;">
				   <a href="http://en.tongwei.com" class="nav-lang">EN</a>		 
				  </li>	
				  
			</ul>

			<div style="clear:both;"></div>
		</div>

	</div>

</div>

<div id="main" style="width:1230px;padding:0 4px 2px;background:#d50707;border-radius:2px;margin-bottom:0px;">
	<div class="content1">
        
	  <div class="main-left">
		<div class="left" style="background: #d50707">
		
			<div class="titles">
				<div class="lft-img">
				
				  <!-- 头条标题 -->
				  <content limit="1" type="list" where="FIND_IN_SET('h',attr)" cid="15" field="id,title,title_short,title_hot,style,save_time,url,thumbnail">
						<php>
						     $pic_ulr=$values['thumbnail'];
						     $styles=explode('|',$values['style']);						     
							 $size1=$size2="";
						     if($styles[2]){
								 $sizes=explode('-',$styles[2]);
                                 $size1=$size2="font-size:".$sizes[0]."px; color:#fff;";
                                 if($sizes[1])
                                 $size2 = "font-size:".$sizes[1]."px color:#fff;";
								 
							 }
							 
							 $lineheight='line-height:64px;';
							 $titles =explode('==',$values['title_hot']);
							 if($titles[1])
							 {
								 $lineheight='line-height:30px;';
							 }
						</php>
							<php>
								if($titles[1])
								{
							</php>
							<a href="{-$values.url-}" target="_blank">
						<div class="main-tit" style="{-$lineheight-}">
							
							 <span style="{-$size1-}">{-$titles[0]-}</span><br/>
							 <span style="{-$size2-}">{-$titles[1]-}</span>
						
						</div>
							<php>}else{</php>
							<a href="{-$values.url-}" target="_blank">
							<div class="main-tit" style="{-$lineheight-}">
								
								 <span style="{-$size1-}; color: #fff;" >{-$titles[0]-}</span>
								
							</div>
							
							<php>}</php>
					
               
					<div class="headline-pic" style="background:url('{-:thumb($pic_ulr,540,300,true)-}')"></div>
					</a>                    
					<?php $noids[]=$values['id']; ?>	   
				  </content>  

				</div>
					   
				   
                <ul class="news-group-list">
                    <li class="tit" >
						<!--<a href="/news/index.html" class="more" target="_blank">+more</a>-->
						<a href="/news/index.html" target="_blank" style="color: #fff;background: #d50707;">集团要闻</a>
					</li>				
				<php>$noids_str = $noids?implode(',',$noids):'0';</php>
				<content limit="12" type="list" cid="15" field="id,title,title_short,style,save_time,url" where="id not in({$noids_str}) and !FIND_IN_SET('d',attr)" order="save_time desc">	
                	<li class="more-list" <?php if($key==11) echo 'style="margin-bottom:0px;"' ?>>
						<span class="date" style="color: #fff;">{-:date('m-d',$values['save_time'])-}</span>
						<a href="{-$values['url']-}" style="color: #fff;" target="_blank">{-$values['title_short']?$values['title_short']:$values['a_title']-}</a>
					</li>				
				</content>
				
				</ul>
			</div>
            <div style="clear:both;"></div>
		</div>
		
		</div>
		
		<div class="right" style="padding-top:12px;background: #d50707;">

		    <a href="/special/1.html" target="_blank">
			<div class="line" style="margin-top:0px;height:240px;" >
				<img src="/Public/twnew/images/chairman.png" alt="刘汉元主席" style="width:100%;">
			</div>
		    </a>
		
            <a href="/notice/index.html" target="_blank">
			<div class="line" style="margin-top:2px;">
				<span class="announce"></span>集团公告
			</div>
		    </a>

			<a href="http://fbc.tongwei.com" target="_blank">
			<div class="line" style="margin-top:2px;">
				<span class="entrance"></span>FBC入口
			</div>
	     	</a>
            
            <a href="/join/index.html" target="_blank">
			<div class="line" style="margin-top:2px;">
				<span class="handshake"></span>人才招聘
			</div>
		    </a>

		    


		</div>

	</div>

	<!-- 主席专区 -->
    <div class="chairman-indust">
   		<div class="right" style="background: #d50707;">
		   
			<div class="indust">
			  <a href="/industries/newenergy.html" target="_blank">
				<img src="/Public/twnew/images/indust1.jpg" alt="">
				<!--<div class="tit-block"></div>-->
				<div class="tit-text">
					<!--<span class="solar"></span>-->
					<span class="tit-title">绿色能源</span>
				</div>
			  </a>
			</div>
			
			
			
			<div class="indust">
			  <a href="/industries/greenagri.html" target="_blank">
				<img src="/Public/twnew/images/indust2.jpg" alt="">
				<!--<div class="tit-block"></div>-->
				<div class="tit-text">
					<!--<span class="agriculture"></span>-->
					<span class="tit-title">绿色农业</span>
				</div>
			  </a>
			</div>
			
			
			
			<div class="indust">
			  <a href="/industries/diversified.html" target="_blank">
				<img src="/Public/twnew/images/indust3.jpg" alt="">
				<!--<div class="tit-block"></div>-->
				<div class="tit-text">
					<!--<span class="others"></span>-->
					<span class="tit-title">相关多元</span>
				</div>
			  </a>	
			</div>
			
		</div>

	</div>
    <style>
        .layui-tab-brief>.layui-tab-title .layui-this{background-color: #d50707;}
    </style>
	<!-- 媒体报刊板块 -->
    <div class="media">
    	<div class="left" style="background: #d50707;">
    		<ul class="news-group-list">
                    <li class="tit" >
						<a href="/media/index.html" target="_blank" class="more" style="color: #fff;">+more</a>
						<a href="/media/index.html" target="_blank" style="color: #fff;">媒体报道</a>
					</li>
					
					<content limit="7" type="list" cid="18" field="id,title,title_short,style,save_time,url">
					<li class="more-list">
						<a href="{-$values['url']-}" style="color: #fff;" target="_blank">{-$values['title_short']?$values['title_short']:$values['a_title']-}</a>
					</li>				
					</content>
			</ul>	

    	</div>

    	<div class="right" style="background: #d50707;">
          
            <div class="layui-tab layui-tab-brief" lay-filter="medias">
			  <ul class="layui-tab-title">
			    <li class="layui-this" style="color: #fff;">文化刊物</li>
			    <li style="color: #fff;">视频中心</li>
			    <li style="color: #fff;">新闻专题</li>
			  </ul>
			  <div class="layui-tab-content">
			    <div class="layui-tab-item layui-show">
			        <a href="/paper/index.html" class="tab-more"  style="color: #fff;">+more</a>
                    <div class="papers" >
			           	  	<div class="newspaper">
								<div class="newspaper-bd" style="width:753px;">
									<ul class="clearfix">	

                                <sql sql="select * from h_paper where a_status=1 and is_delete=1 order by sort desc,id desc ">
									
										<li>
										<a href="{-$values.url-}" target="_blank" ><img src="{-$values.thumbnail-}"></a>
										<i><span>{-$values.title-}</span></i>
										</li>
                                    </sql>	
							    </sql>		
										
									</ul>
								</div>
						
							<a class="prev-btn iconfont icon-left"><i class="layui-icon layui-icon-left"></i> </a>
							<a class="next-btn iconfont icon-right"><i class="layui-icon layui-icon-right"></i> </a>
						  </div>
					</div>

			    </div>
			    <div class="layui-tab-item">
			        <a href="/video/index.html" class="tab-more"  style="color: #fff;">+more</a>
                    <div class="videos">
					 	<div class="video">
								<div class="video-bd">
									<ul class="clearfix">	

									 <content limit="10" type="list" cid="23" field="id,title,style,save_time,url,description,thumbnail,video">
										<li data-video="{-$values.video-}">
										  <img src="{-$values.thumbnail|thumb=###,380,206,1-}"  alt="{-$values.a_title-}">
										  <div class="play"></div>
										  <div class="video-title"></div>
										  <div class="video-text">
										  	 	{-$values.a_title-}
										  </div>
										</li>
									 </content>	
										
										<!--
										<li data-video="/uploadfile/files/twgroupvideo2019.mp4">
										  <img src="/Public/twnew/images/video1.png"  alt="通威宣传片中文版">
										  <div class="play"></div>
										  <div class="video-title"></div>
										  <div class="video-text">
										  	 	通威集团宣传片
										  </div>
										</li>
										<li data-video="/uploadfile/files/通威35年专题片.mp4">
										  <img src="/Public/twnew/images/video2.jpg"  alt="通威35周年专题片">
										  <div class="play"></div>
										  <div class="video-title"></div>
										  <div class="video-text">
										  	 	通威35周年专题片
										  </div>
										</li>	-->
										
									</ul>
								</div>
						   
							<a class="prev-btn iconfont icon-left"><i class="layui-icon layui-icon-left"></i>  </a>
							<a class="next-btn iconfont icon-right"><i class="layui-icon layui-icon-right"></i>  </a>
							
							
						  </div>

					 </div>    

			    </div>
			    <div class="layui-tab-item" style="padding:0px 3px;">
			        <a href="/special/index.html" class="tab-more"  style="color: #fff;">+more</a>
                    <div class="specials">
					 	<ul style="width:50%;float:left;">
						
						<sql sql="select id,title,url,create_time from h_special where l_status=1 and is_show=0 order by id desc limit 0,5">
						
						  <li class="special-list">
						   <a href="{-$values.url-}" target="_blank" title="{-$values.title-}" style="color: #fff;">  <span class="list-tit" style="background: #d50707;">{-$values.create_time|date="Y-m",###-}</span>{-$values.title-} </a>
						  </li>
						  
						</sql> 
						 
                        </ul>
						
						<ul style="width:50%;float:left;">
						
						<sql sql="select id,title,url,create_time from h_special where l_status=1 and is_show=0 order by id desc limit 5,5">
						
						  <li class="special-list">
						   <a href="{-$values.url-}" target="_blank" title="{-$values.title-}" style="color: #fff;">  <span class="list-tit" style="background: #d50707;">{-$values.create_time|date="Y-m",###-}</span>{-$values.title-} </a>
						  </li>
						  
						</sql> 
						 
                        </ul>
				    </div>    

			    </div>
			  </div>
			</div> 	

    	</div>


    </div>

    
    <div style="clear:both;"></div>
</div>

<div style="width:100%;background:#d50707;">


   <div style="width:1230px;margin:0px auto;">
       <!-- 页脚 -->
<div id="logos" style="background:transparent;">
<!--
  <div style="width:1230px;margin:0px auto;">
     <div style="height:34px;background:url(static/images/2x2.jpg) repeat-x left center;">
	    <span style="margin-left:14px;padding:0px 10px;display:inline-block;line-height:34px;color:#049;background:#fff;font-size:22px;font-weight:bold;">通威网站群</span>
	 </div>
  </div> -->

  <div class="main">  
    <a href="http://www.tongwei.com.cn" target="_blank" class="logo" style="margin-left:0px;background:url(/Public/twnew/images/twgf_w.png) no-repeat center;background-size:82%;">
	 <!--<img src="/Public/twnew/images/twgf.png" />-->
	</a>
	
	<a href="http://www.scyxgf.com" target="_blank" class="logo" style="background:url(/Public/twnew/images/yxgf_w.png) no-repeat center -2px;background-size:80%;">
	
	</a>
	
	<a href="http://www.tw-solar.com" target="_blank" class="logo" style="background:url(/Public/twnew/images/twsolar_w.png) no-repeat center -2px;background-size:79%;">
	 
	</a>
	
	<a href="http://www.tw-newenergy.com" target="_blank" class="logo" style="background:url(/Public/twnew/images/twnewenergy_w.png) no-repeat center -2px;background-size:79%;">
	
	</a>	
	<!--
	<a href="http://www.twxhgg.com" target="_blank" class="logo" style="background:url(/Public/twnew/images/twxhgg.png) no-repeat center;background-size:80%;">
	 
	</a> -->
	
	<a href="http://www.tongyuwuye.com" target="_blank" class="logo" style="background:url(/Public/twnew/images/tongyuwuye_w.png) no-repeat center -2px;background-size:79%;">
	
	</a>
	
	<a href="http://www.tongweifood.cn" target="_blank" class="logo" style="background:url(/Public/twnew/images/twfood_w.png) no-repeat center -2px;background-size:78%;">
	 
	</a>
	<a href="http://www.tongweifood.cn/list_17.html" target="_blank" class="logo" style="background:url(/Public/twnew/images/twfish_w.png) no-repeat center 0px;background-size:72%;">
	 
	</a>
	
	<a href="http://www.care-pet.com" target="_blank" class="logo" style="width:116px;margin-right:22px;background:url(/Public/twnew/images/carepet_w.png) no-repeat center -4px;background-size:77%;">
	
	</a>
	
	<a href="javascript:;" target="_blank" class="logo" style="background:url(/Public/twnew/images/twmedia_w.png) no-repeat center -1px;margin-right:0px;background-size:72%;">
	 
	</a>
	
  </div>
</div>

<div id="footer" class="row m-t-20" style="background:transparent;">
 	<div class="wrap clearfix">
	
	<dl class="qrcode" style="width:80px;background:transparent;float:left;margin-left:0px;margin-right:41px;">		
            <dt style="margin-bottom:5px;">关注通威</dt>		
			<dd style="line-height:10px;">			
			<img src="/Public/twnew/images/twqrcode.jpg"></dd>
	</dl>
	
	<dl style="margin-left:4px;">
			<dt><a href="/intro/index.html" target="_blank">关于通威</a></dt>
			
			<dd><a href="/intro/index.html">集团简介</a></dd><dd><a href="/chairman/index.html">主席寄语</a></dd><dd><a href="/develo/index.html">发展历程</a></dd><dd><a href="/honor/index.html">企业荣誉</a></dd><dd><a href="/public/index.html">社会责任</a></dd><dd><a href="/members/index.html">成员企业</a></dd>	
		
		</dl><dl>
			<dt><a href="/energy/index.html" target="_blank">产业领域</a></dt>
			
			<dd><a href="/energy/index.html" target="_blank">光伏智造</a></dd><dd><a href="/yuguang/index.html" target="_blank">渔光一体</a></dd><dd><a href="/agri/index.html" target="_blank">饲料产业</a></dd><dd><a href="/breeds/index.html" target="_blank">智慧养殖</a></dd><dd><a href="/foods/index.html" target="_blank">食品加工</a></dd><dd><a href="/diversified/index.html" target="_blank">相关产业</a></dd>
		
		</dl><dl>
			<dt><a href="/news/index.html" target="_blank">新闻中心</a></dt>
			
			<dd><a href="/news/index.html" target="_blank">集团快讯</a></dd><dd><a href="/special/index.html" target="_blank">热点专题</a></dd><dd><a href="/media/index.html" target="_blank">媒体报道</a></dd>	
		
		</dl><dl>
			<dt><a href="/culture/index.html" target="_blank">品牌文化</a></dt>
			
			<dd><a href="/culture/index.html">文化理念</a></dd><dd><a href="/team/index.html">文化活动</a></dd><dd><a href="/paper/index.html">文化刊物</a></dd><dd><a href="/video/index.html">视频中心</a></dd><dd><a href="/brand/index.html">品牌实力</a></dd>
		
		</dl><dl style="background:transparent;width:62px;">
			<dt><a href="/join/index.html" target="_blank">人才中心</a></dt>
			
			<dd><a href="/hrconcept/index.html">人才理念</a></dd><dd><a href="/hrtrain/index.html">人才培养</a></dd><dd><a href="/twschool/index.html">通威大学</a></dd><dd><a href="/join/index.html">人才招聘</a></dd>	<dd><a href="/contact/index.html">联系通威</a></dd>
		
		</dl>	

		
		<dl class="qrcode" style="float:right;width:80px;border-right:0px;margin-right:0px;margin-left:0px;">	
            <dt style="margin-bottom:5px;">手机访问</dt>		
			<dd style="line-height:10px;">			
			<img src="/Public/twnew/images/mobile.jpg">
			</dd>
		</dl>	
		<div style="clear:both;"></div>
	</div>	
</div>

<div id="bottom" style="background:transparent;color:#fff;">
	<div class="wrap">
		通威集团有限公司 @ 2019 TONGWEI 版权所有 &nbsp;<a style="color:#fff;" href="https://beian.miit.gov.cn/">蜀ICP备05002048号</a> &nbsp;总部地址：四川省成都市高新区天府大道中段588号通威国际中心 &nbsp;电话：028-85188888 &nbsp;技术支持：通威传媒</div>
</div>
   </div>
</div>

 
<script src="/Public/twnew/layui/layui.js"></script>
<script src="/Public/twnew/js/jquery.js"></script>
<script type="text/javascript" src="/Public/twnew/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="/Public/twnew/js/app.js"></script>

<script>
$('#focus-image').slide({ 	
	mainCell:'.focus-image ul', 
	titOnClassName:'hover', 
	effect:'fold', 
	autoPlay:false, 
	interTime:5000,
	prevCell:'.prev',
	nextCell:'.next',
	autoPage:'<li></li>' 
});

</script> 

</script>

<script>

layui.use(['layer','element','carousel'], function(){
  var $ = layui.jquery,
  layer = layui.layer,
  element = layui.element,
  carousel = layui.carousel;
  
  /*
  $('.go-search').click(function(){
	   var ipt = $('form input[name="q"]').val();
	   if(ipt == '')
	   {
		   alert('搜索关键词不能为空');
		   return false;
	   }
	  $(this).parents('form').submit();
   });
   */
   
  /* 导航鼠标悬停事件 
   var timer='';
   var timer2='';
   var timer3='';
   $("#menus .hidden-div").on({
        "mouseenter":function(){
            clearTimeout(timer);
            clearTimeout(timer2);
			clearTimeout(timer3);
			$('.nav-menu').addClass('nav-menu-on');
            timer=setTimeout(function(){
                //这里触发hover事件   
			   $('#menu-anim').css('display','block');
			   $('#menu-anim').animate({opacity:'1'},"slow"); 
			   
            },400);
        },
        "mouseleave":function(){           
            
           timer2=setTimeout(function(){
			   clearTimeout(timer);  
			
			   $('#menu-anim').animate({opacity:'0'},"slow");
               timer3=setTimeout(function(){	
			     $('#menu-anim').css('display','none');	
			   },600);		  
			   $('.nav-menu').removeClass('nav-menu-on');
		   },2000);

        }
    });
 */
  /* 
   $('#menus .nav-menu').mouseover(function(){	
       var thisobj = $(this);   
	   var flag = $('#menu-anim').attr('data');
	   if(flag=='0')
	   {
		   $('#menu-anim').animate({opacity:'1'},"slow");
		   $('#menu-anim').attr('data','1');
		   thisobj.addClass('nav-close');
		   //thisobj.css('background','url(../images/close.png)');
	   }
	   
   });
   
   $('#menus .nav-menu').click(function(){	
       var thisobj = $(this);   
	   var flag = $('#menu-anim').attr('data');
	   if(flag=='1')
	   {
		   $('#menu-anim').animate({opacity:'0'},"slow");
		   $('#menu-anim').attr('data','0');
		   thisobj.removeClass('nav-close');
		    //thisobj.css('background','url(../images/menu.png)');
	   }
	   
   });
   

  carousel.render({
    elem: '#slide2'
    ,width: '100%' //设置容器宽度
    ,height:'300px'
    ,arrow: 'none' //始终显示箭头
    ,anim:'fade'
    ,interval:5000
    ,indicator:'inside'
   
  }); */

  /* 报刊轮播 */ 
  $('.papers .newspaper').slide({ 
  	titCell:'', 
  	mainCell:'.newspaper-bd ul', 
  	titOnClassName:'hover', 
  	effect:'leftLoop', 
  	autoPlay:false, 
  	autoPage:false, 
  	prevCell:'.prev-btn', 
  	nextCell:'.next-btn', 
  	vis:5
  });

  /* 视频轮播 */ 
  $('.videos .video').slide({ 
  	titCell:'', 
  	mainCell:'.video-bd ul', 
  	titOnClassName:'hover', 
  	effect:'leftLoop', 
  	autoPlay:false, 
  	autoPage:false, 
  	prevCell:'.prev-btn', 
  	nextCell:'.next-btn', 
  	vis:2
  });

  /* 专题轮播 */ 

  
  /* 视频播放 */
  $('.videos li').click(function(){
	var video = $(this).data('video');
	$.G.playVideo(video);
});



});
</script> 
</body>
</html>