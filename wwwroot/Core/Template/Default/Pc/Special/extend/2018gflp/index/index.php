<!DOCTYPE html>
<!-- saved from url=(0051)http://z.tongwei.cn/special/specialid/119.html#twbd -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title> 2018首届中国光伏产业领跑论坛</title>
	<meta name="keywords" content=" 2018首届中国光伏产业领跑论坛">
	<meta name="description" content=" 2018首届中国光伏产业领跑论坛">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<link href="/static/2018gflp/bootstrap.min.css" rel="stylesheet">
	<link href="/static/2018gflp/css.css" rel="stylesheet">
	<link href="/static/2018gflp/fitCss.css" rel="stylesheet">
	<link rel="stylesheet" href="/static/2018gflp/layer.css" id="layui_layer_skinlayercss">
	<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.6.0/skins/default/aliplayer-min.css" />
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2018gflp/jquery.min.js"></script>
	<script src="https://g.alicdn.com/de/prismplayer/2.6.0/aliplayer-min.js"></script>	

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



	</style>

</head>
<body>

<!-- <div class="banner"><div class="banWrap"></div></div> -->
<div ><div >
    
	            <php>
					$map = array();
					$map['specialid'] = 13;			
					$map['typeid'] = 11;
					$map['a_status'] = 1;
					$specialContent=M('SpecialContent');
					$currentData1 = $specialContent->where($map)->order('sort desc')->find();
				</php>
				
				<img src="{-$currentData1['thumbnail']-}" alt="" style="width:100%;">
	<!--<img src="/static/2018gflp/gflp1.jpg" alt="" style="width:100%;">-->
	
</div></div>
<div id="nav-menu" class="fit-menu">
		<div class="fmWrap">
		<ul class="ul-fmw clearfix" id="home">
			<li class="active">
			<a href="/">首页</a>
			</li>
			<li>
			<a class="fmwList n-twbd" href="#twbd">图文报道</a>
			</li>
			<li>
			<a class="fmwList n-ltjj" href="#ltjj">论坛简介</a>
			</li>			
			
			<li><a class="fmwList n-nyjb" href="#nyjb">拟邀嘉宾</a>
			</li>
			<li><a class="fmwList n-ltyc" href="#ltyc">论坛议程</a>
			</li>
		    <li><a class="fmwList n-nyqy" href="#bjsd">颁奖盛典</a>
			</li>
			<li><a class="fmwList n-nyqy" href="#nyqy">联合主办</a>
			</li>
			<li><a class="fmwList n-hzmt" href="#hzmt">合作媒体</a>
			</li>
				
		</ul>
	</div>
</div>

<script type="text/javascript" src="//g.alicdn.com/de/prismplayer/1.8.6/prism-min.js"></script>
<!-- 现场直播 -->



<!--

<div id="hyzb" style="display:none;">
    <div class="default-comTit">
		<div class="def-ct-wrap">
			<h3>会议<span>直播</span></h3>
			<p> Conference Live</p>
		</div>
	</div>
	<div class="wrap live_title">
		<div class="left">直播时间：2018/10/20 13:20 - 18:40</div>
		<div class="right"><a href="/special/9.html" class="btn">刷新页面</a></div>
	</div>
	<div class="wrap">
		<div class="prism-player" id="J_prismPlayer"></div>
	</div>

</div>  

<script>

    var u = navigator.userAgent;
	var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;//android终端
	var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);

   if(isiOS==false && isAndroid ==false)  
    {    
	    $('#hyzb').css('display','block');
    	source_url='rtmp://r2.vzan.cc/v/147827_131843276052466920';

    	var $width = $(window).width();
		var $w = $width > 1000 ? 1000 : $width;
		var $h = $w / 16 * 9  + 48;

        player = new Aliplayer({
			id: "J_prismPlayer", // 容器id
			source: source_url,  // 视频url 支持互联网可直接访问的视频地址
			autoplay: true,//自动播放
			width: "100%",//播放器宽度
			height: $h+"px",//播放器高度
			isLive: true,
			extraInfo:{"m3u8BufferLength":"30", "liveStartTime":"2018/4/27 8:30:00", "liveStopTime":"2018/4/27 18:00:00", "liveRetry":1}
		});

    }

</script> 

-->






<div class="twbd" id="twbd">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>图文<span>报道</span></h3>
			<p>Graphic report</p>
		</div>
	</div>
	<div class="twbdWrap">
		<div class="conWp">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="float:left;">
				<!-- Indicators -->
				<ol class="carousel-indicators">

                 <sql sql="select thumbnail from h_special_content where specialid=13 and typeid=3 and a_status=1 order by sort desc">
						
                       <li data-target="#carousel-example-generic"
                        data-slide-to="{-$key-}" class="<if condition='$key eq 1'>active</if>"></li>

				  </sql>	

				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				<sql sql="select thumbnail from h_special_content where specialid=13 and typeid=3 and a_status=1 order by sort desc">

				   <div class="item <if condition='$key eq 1'>active</if>"><a href="javascript:;" target="_blank"><img src="{-$values['thumbnail']-}"></a><div class="carousel-caption"></div></div>

			    </sql>
				
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="http://z.tongwei.cn/special/specialid/119.html#carousel-example-generic" role="button" data-slide="prev"> <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> --> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="http://z.tongwei.cn/special/specialid/119.html#carousel-example-generic" role="button" data-slide="next"> <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> --> <span class="sr-only">Next</span> </a> 
			</div>
			
			
			<div class="row news clearfix" style="min-height:200px;">
			
			    <php>
					$map = array();
					$map['specialid'] = 13;			
					$map['typeid'] = 7;
					$map['a_status'] = 1;
					$map['attr']='s';
					$specialContent=M('SpecialContent');
					$currentData1 = $specialContent->where($map)->order('sort desc')->find();
				</php>
			
			    <div class="col-md-5 nw-r nw-l" style="padding-top:12px;">
					<h3><a target="_blank" href="{-$currentData1.url-}">{-$currentData1.title-}</a></h3>
					<p style="text-align: justify;text-justify: inter-ideograph;">{-$currentData1.description-}<a href="{-$currentData1.url-}">查看详情&gt;&gt;</a></p>
					
				</div>
			
			
				<div class="col-md-5 nw-r" style="min-height:217px;">
					<ul class="nw-r-ul">
                        <sql sql="select * from h_special_content where specialid=13 and typeid=7 and a_status=1 and attr='' order by sort desc limit 5">
							<li class="nw-li-a">
							    
								<a href="{-$values['url']-}" target="_blank">
								<span class="rank_c">{-$key+1-}</span>
									{-:($values['title'])-}
								</a>
							</li>
						</sql>	
					</ul>		
			    </div>
				
            <div class="newsMore">
			   <a href="http://www.tongwei.com/special/lists/specialid/13/typeid/1.html">查看更多</a> 
			</div>    
			
		</div>
		
		
	</div>
</div>

<div class="ltjj" id="ltjj">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>论坛<span>简介</span></h3>
			<p>Forum profile</p>
		</div>
	</div>
	<div class="ltjjWrap">
	
	  <php>
	$map = array();
	$map['specialid'] = 13;			
	$map['typeid'] = 1;
	$map['a_status'] = 1;
	$specialContent=M('SpecialContent');
	$currentData = $specialContent->where($map)->order('sort desc')->find();
	</php>

	<p>
      {-$currentData.content-}
	</p>
	
	</div>
</div>

<div class="nyjb" id="nyjb">
	<div class="default-comTit" style="margin-top:0px;">
		<div class="def-ct-wrap pAnbg">
			<h3>拟邀<span>嘉宾</span></h3>
			<p>Invited guests</p>
		</div>
	</div>
	<ul class="ltjbBox clearfix">
	
	
	
	<sql sql="select title,description,thumbnail from h_special_content where specialid=13 and typeid=4 and a_status=1 order by sort desc">
	    <li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="{-$values['thumbnail']-}"></div>
				<div class="jbTxt">
					<h4>{-$values['title']-}</h4>
					<p>{-$values['description']-}</p>
				</div>
		  </a>
		</li>
	</sql> 	
   

	</ul>
</div>

<!-- <div class="ltyc" id="ltyc">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>论坛<span>亮点</span></h3>
			<p>Highlight</p>
		</div>
	</div>
	<div class="lightWrap">
	  <img src="/static/2018gflp/light2.png" alt="" style="width:100%;">
	</div>
</div> -->
<div class="ltyc" id="ltyc">
	<div class="default-comTit" style="margin-top:0px;">
		<div class="def-ct-wrap pAnbg">
			<h3>论坛<span>议程</span></h3>
			<p>Forum agenda</p>
		</div>
	</div>
	<div class="ltycWrap" style="text-align:center;">  
	<php>
	$map = array();
	$map['specialid'] = 13;			
	$map['typeid'] = 2;
	$map['a_status'] = 1;
	$specialContent=M('SpecialContent');
	$currentData = $specialContent->where($map)->order('sort desc')->find();
	</php>	
		<img src=" {-$currentData.thumbnail-}" style="width:900px;">
		
	</div>
</div>


<div class="ltyc" id="bjsd">
    <div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>颁奖<span>盛典</span></h3>
			<p>Award ceremony</p>
		</div>
	</div>
	<div class="ltycWrap" style="text-align:center;">  
	<php>
	$map = array();
	$map['specialid'] = 13;			
	$map['typeid'] = 8;
	$map['a_status'] = 1;
	$specialContent=M('SpecialContent');
	$currentData = $specialContent->where($map)->order('sort desc')->find();
	</php>	
		<p>
		
		  {-$currentData.content-}
		
		</p>
		
	</div>
</div>



<div class="nyqy" id="nyqy">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap pAnbg">
			<h3>联合<span>主办</span></h3>
			<p>Co-hosts</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">	
				
		  <sql sql="select title,thumbnail from h_special_content where specialid=13 and typeid=5 and a_status=1 order by sort desc">
		    <li><a href="javascript:;">
					<div class="qyImg"><img src="{-$values['thumbnail']-}"></div>
					<div class="qyTxt">{-$values['title']-}</div>
				</a>
			</li>
          </sql>	
	</ul>
	</div>
</div>

<div class="nyqy" id="nyqy">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap pAnbg">
			<h3>战略<span>合作</span></h3>
			<p>Strategic Cooperation</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">	
				
		  <sql sql="select title,thumbnail from h_special_content where specialid=13 and typeid=9 and a_status=1 order by sort desc">
		    <li><a href="javascript:;">
					<div class="qyImg"><img src="{-$values['thumbnail']-}"></div>
					<div class="qyTxt">{-$values['title']-}</div>
				</a>
			</li>
          </sql>	
	</ul>
	</div>
</div>

<div class="nyqy" id="nyqy">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap pAnbg">
			<h3>特别<span>赞助</span></h3>
			<p>Special Sponsor</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">	
				
		  <sql sql="select title,thumbnail from h_special_content where specialid=13 and typeid=10 and a_status=1 order by sort desc">
		    <li><a href="javascript:;">
					<div class="qyImg"><img src="{-$values['thumbnail']-}"></div>
					<div class="qyTxt">{-$values['title']-}</div>
				</a>
			</li>
          </sql>	
	</ul>
	</div>
</div>


<div class="hzmt" id="hzmt">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap">
			<h3>合作<span>媒体</span></h3>
			<p> Associated media</p>
		</div>
	</div>
	<ul class="mt-ul clearfix">
	
	        <sql sql="select title,thumbnail from h_special_content where specialid=13 and typeid=6 and a_status=1 order by sort desc">
				<li><h1><img src="{-$values['thumbnail']-}"></h1><p>{-$values['title']-}</p></li>
			</sql>	
				
	</ul>
</div>






<script type="text/javascript">
	var ishome=true,touch=false;
	function bm(obj) {
		var msg=document.getElementById('bmmsg'),reg,isdo=true;msg.innerHTML='';
		$(obj).find('.verify').each(function(){
			try{
				reg=new RegExp($(this).attr('data-reg'));
				if(!$(this).val()||!reg.test($(this).val())){
					msg.innerHTML='“'+$(this).attr('placeholder')+'”填写不正确！';
					isdo=false;
					return false;
				}else{
					isdo=true;
				}
			}catch(e){
				msg.innerHTML='故障！请尝试电话联系...';isdo=false;return false;
			}
		});
		if(isdo){
			var sbtn=$(obj).find('.lxInp-c');sbtn.attr('disabled','disabled');
			$.post("http://z.tongwei.cn/signupsdo.html",$(obj).serialize(),function (d) {
				if(d.code==1){msg.innerHTML=' 提交成功！';$(obj)[0].reset();}else{msg.innerHTML=d.msg;sbtn.removeAttr('disabled');}
			},'json');
		}
		return false;
	}
</script>
<div class="footer">
	<div class="ft_btm">
		<div class="ftbWp">
			<div class="ft-link">
				
			</div>
			<div class="ft-copy"> <a href="http://www.tongwei.com/">通威集团</a> <span>All Rights Reserved.</span> 蜀ICP备14018337号</div>
		</div>
	</div>
</div>
<script src="/static/2018gflp/bootstrap.min.js"></script>
<script src="/static/2018gflp/jquery.cookie.min.js"></script>
<script src="/static/2018gflp/layer.min.js"></script>
<script type="text/javascript">
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
<script type="text/javascript">
	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cspan style='display:none' id='cnzz_stat_icon_1254973742'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1254973742' type='text/javascript'%3E%3C/script%3E"));
</script><span style="display:none" id="cnzz_stat_icon_1254973742"><a href="http://www.cnzz.com/stat/website.php?web_id=1254973742" target="_blank" title="站长统计">站长统计</a></span><script src="/static/2018gflp/stat.php" type="text/javascript"></script><script src="/static/2018gflp/core.php" charset="utf-8" type="text/javascript"></script>

</body></html>
