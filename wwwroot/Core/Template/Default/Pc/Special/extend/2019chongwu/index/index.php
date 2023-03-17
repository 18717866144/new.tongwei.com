<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
	<title> 2019首届中国宠物行业高质量发展论坛</title>
	<meta name="keywords" content=" 2019首届中国宠物行业高质量发展论坛">
	<meta name="description" content=" 2019首届中国宠物行业高质量发展论坛">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<link href="/static/2019chongwu/bootstrap.min.css" rel="stylesheet">
	<link href="/static/2019chongwu/css.css" rel="stylesheet">
	<link href="/static/2019chongwu/fitCss.css" rel="stylesheet">
	<link href="/static/2019chongwu/superslide.css" rel="stylesheet">
	
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2019chongwu/jquery.min.js"></script>
	<script src="/static/2019chongwu/bootstrap.min.js"></script>
	<script src="/static/2019chongwu/SuperSlide.2.1.3.js"></script>
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

.review-1 li {
    width: 320px;
    float: left;
    padding: 10px;
    border: 1px solid #EFEFEF;
    box-shadow: 2px 2px 2px #EFEFEF;
    margin: 0px 20px 20px 0px;
    list-style: none;
}

.review-1 li i {
    display: inline-block;
    margin-right: 10px;
    float: left;
    width: 88px;
    height: 88px;
    background: url(/static/2019chongwu/jiebg.png) no-repeat center center;
    color: #FFF;
    font-weight: bold;
    font-size: 48px;
    text-align: center;
    line-height: 76px;
    font-style: normal;
}

.review-1 li .t {
	height:92px;
	line-height:92px;
    font-size: 28px;
    font-weight: bold;
	margin-bottom:10px;
}

.review-1 li .c {
	width:464px;
	float:right;
	height:166px;
    font-size: 15px;
	overflow:hidden;
	text-align: justify;
	
}

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
<div >
	<div id="top_banner">   
				
		<img src="/static/2019chongwu/20191129.jpg" alt="" style="width:100%;">
	
	</div>
</div>
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
			<!--
			<li><a class="fmwList n-ltyc" href="#ltyc">论坛议程</a>
			</li> -->
		  
			<li><a class="fmwList n-nyqy" href="#chqy">参会企业</a>
			</li>
			<li><a class="fmwList n-hzmt" href="#hzmt">合作媒体</a>
			</li>
				
		</ul>
	</div>
</div>


<div class="twbd" id="twbd">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>图文<span>报道</span></h3>
			<p>Graphic report</p>
		</div>
	</div>
	<div class="twbdWrap">
		<div class="conWp">

            <div id="slideBox" class="slideBox">
				<div class="hd">
				<ul>
				
				<sql sql="select title from h_special_content where specialid=20 and typeid=3 and a_status=1 order by sort desc">
				<li class="<if condition='$key eq 0'>on</if>">
				
				<div class="dot">
				<div class="liner"></div>
				</div>
				</li>
				</sql>
	
				</ul>
				</div>
				<div class="bd">
				<ul style="position: relative;">
				
				<sql sql="select title,thumbnail from h_special_content where specialid=20 and typeid=3 and a_status=1 order by sort desc">
				<li>
				<a href="javascript:;"><img src="{-$values['thumbnail']-}"></a>
				</li>
				</sql>
		
				</ul>
				</div>

				<a class="prev" href="javascript:void(0)"></a>
				<a class="next" href="javascript:void(0)"></a>
			</div>
		<script type="text/javascript">
			jQuery(".slideBox").slide({
				mainCell: ".bd ul",
				effect: "fold",
				trigger: "click",
				autoPlay: true,
				mouseOverStop: false,
				startFun:function(i,c){
					
				}
			});
		</script>	
			
			<div class="row news clearfix" style="min-height:200px;">
			
			    <php>
					$map = array();
					$map['specialid'] = 20;			
					$map['typeid'] = 4;
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
                        <sql sql="select * from h_special_content where specialid=20 and typeid=4 and a_status=1 and attr='' order by sort desc limit 5">
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
			   <a href="http://www.tongwei.com/special/lists/specialid/20/typeid/1.html">查看更多</a> 
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
	$map['specialid'] = 20;			
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
	
	
	
	<sql sql="select title,description,thumbnail from h_special_content where specialid=20 and typeid=5 and a_status=1 order by sort desc">
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
<!--
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
	$map['specialid'] = 19;			
	$map['typeid'] = 2;
	$map['a_status'] = 1;
	$specialContent=M('SpecialContent');
	$currentData = $specialContent->where($map)->order('sort desc')->find();
	</php>	
		<img src=" {-$currentData.thumbnail-}" style="width:900px;">
		
	</div>
</div> 

<div class="nyqy" id="lhzb">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap pAnbg">
			<h3>联合<span>主办</span></h3>
			<p>Co-hosts</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">	
				
		  <sql sql="select title,thumbnail from h_special_content where specialid=20 and typeid=7 and a_status=1 order by sort desc">
		    <li><a href="javascript:;">
					<div class="qyImg"><img src="{-$values['thumbnail']-}"></div>
					<div class="qyTxt">{-$values['title']-}</div>
				</a>
			</li>
          </sql>	
	</ul>
	</div>
</div>

<div class="nyqy" id="zlhz">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap pAnbg">
			<h3>战略<span>合作</span></h3>
			<p>Strategic Cooperation</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">	
				
		  <sql sql="select title,thumbnail from h_special_content where specialid=20 and typeid=8 and a_status=1 order by sort desc">
		    <li><a href="javascript:;">
					<div class="qyImg"><img src="{-$values['thumbnail']-}"></div>
					<div class="qyTxt">{-$values['title']-}</div>
				</a>
			</li>
          </sql>	
	</ul>
	</div>
</div>

<div class="nyqy" id="tbzz">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap pAnbg">
			<h3>特别<span>赞助</span></h3>
			<p>Special Sponsor</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">	
				
		  <sql sql="select title,thumbnail from h_special_content where specialid=20 and typeid=9 and a_status=1 order by sort desc">
		    <li><a href="javascript:;">
					<div class="qyImg"><img src="{-$values['thumbnail']-}"></div>
					<div class="qyTxt">{-$values['title']-}</div>
				</a>
			</li>
          </sql>	
	</ul>
	</div>
</div> -->

<div class="nyqy" id="chqy">
	<div class="default-comTit" style="margin-top:9px;">
		<div class="def-ct-wrap pAnbg">
			<h3>部分参会<span>企业</span></h3>
			<p>Supported by</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">	
				
		  <sql sql="select title,thumbnail from h_special_content where specialid=20 and typeid=10 and a_status=1 order by sort desc">
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
	
	        <sql sql="select title,thumbnail from h_special_content where specialid=20 and typeid=11 and a_status=1 order by sort desc">
				<li><h1><img src="{-$values['thumbnail']-}"></h1><p>{-$values['title']-}</p></li>
			</sql>	
				
	</ul>
</div>






<script type="text/javascript">
	var ishome=true,touch=false;

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

<script type="text/javascript">
   	var device_wid=$(window).width();   
  
    if(device_wid<600)
    {   
        $('#top_banner').html('<img src="/static/2019chongwu/20191129m.jpg" alt="" style="width:100%;">');
		
    }

	if(ishome){var dt= 0,ob;var wh=$(window).height()/2;ob=$('#home').find('li');ob.eq(0).attr('class','active');}else{$('#home').find('li').eq(3).attr('class','active');}
	if(!touch){
		$(window).scroll(function() {
			var scrollt=document.documentElement.scrollTop + document.body.scrollTop;
			if (scrollt>586){$("#nav-menu").addClass("navbar-fixed-top");}else{$("#nav-menu").removeClass("navbar-fixed-top");}
			if(ishome){
				dt=$(document).scrollTop();ob.removeAttr('class');
				if(dt>$('#hzmt').offset().top-wh){
					ob.eq(5).attr('class','active');
				}else if(dt>$('#chqy').offset().top-wh){
					ob.eq(4).attr('class','active');
				}else if(dt>$('#nyjb').offset().top-wh){
					ob.eq(3).attr('class','active');
				}else if(dt>$('#ltjj').offset().top-wh){
					ob.eq(2).attr('class','active');
				}else if(dt>$('#twbd').offset().top-wh){
					ob.eq(1).attr('class','active');
				}else{
					ob.eq(0).attr('class','active');
				}
			}
		});
	}
	
</script>


</body></html>
