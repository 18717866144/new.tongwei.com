<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0051)http://z.tongwei.cn/special/specialid/119.html#twbd -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>2020第六届中国农业品牌年度颁奖盛典</title>
	<meta name="keywords" content="2020第六届中国农业品牌年度颁奖盛典">
	<meta name="description" content="2020第六届中国农业品牌年度颁奖盛典">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<link href="/static/2020nongmu/bootstrap.min.css" rel="stylesheet">
	<link href="/static/2020nongmu/css.css" rel="stylesheet">
	<link href="/static/2020nongmu/fitCss.css" rel="stylesheet">
	<link href="/static/2020nongmu/superslide.css" rel="stylesheet">
	<link rel="stylesheet" href="/static/2020nongmu/layer.css" id="layui_layer_skinlayercss">
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2020nongmu/jquery.min.js"></script>
	<script src="/static/2019nongmu/SuperSlide.2.1.3.js"></script>
	<script src="/static/2020nongmu/layer.min.js"></script>

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

#video .videos{
	width:1000px;
	margin:0px auto;
}

#video  .videos .video{    
          width:100%;
		  height:auto;
          position:relative;
        }

        #video  .videos .video-bd {
          width:100%;
          height: 206px;
          overflow: hidden;
      }

        #video  .videos .video li{
          float: left;
          display: block;
          width: 320px;
          height: 204px;   
          margin-right:20px; 
          overflow: hidden;
          position: relative;
          border:1px solid #dedede;
          cursor: pointer;
      }

      #video .videos .video li img {
          width:100%;
      }

       #video  .videos .video .play{    
          position:absolute;
          width:52px;
          height:52px;
          /*background:url('../images/play.png') center no-repeat; */
          background-size: 50px;
          left:132px;
          top:73px;
        }

       #video .videos .video ul li:hover .play{    
            background:url('/static/2020nongmu/play_on.png') center no-repeat;
          background-size: 50px;
        }

        #video  .videos .video .video-title{
            width:100%;
            height:30px;
            position:absolute;
            bottom:0px;
            background-color: #000;
          filter: alpha(Opacity=30);
          -moz-opacity: 0.3;
          -webkit-opacity: 0.3;
          opacity: 0.3;
        }

        #video  .videos .video .video-text{
            width:100%;
            height:30px;
            line-height:30px;
            text-align:center;
            font-size:15px;
            position:absolute;
            bottom:0px;
            color:#fff;
        }

       #video  .videos .prev-btn:hover,.next-btn:hover{background:#004ea2; color:#FFF;}
      #video  .videos .prev-btn{left:1px;}
      #video  .videos .next-btn{right: 0px;}

      #video  .videos .video:hover .prev-btn,.video:hover  .next-btn{background:rgba(0,0,0,.5)}
      #video  .videos .video:hover .prev-btn:hover,.video:hover .next-btn:hover{background:#004ea2; color:#FFF;}
	  
	  .layui-layer-dialog .layui-layer-content{
		  padding:0px;
		  line-height:0px;
		  overflow-y:hidden;
	  }
	 
	  
	  #wjhg ul li{width:100%!important;float:left;padding:10px;border:1px solid #efefef;list-style:none;
	  box-shadow:2px 2px 2px #efefef;margin:0px 20px 20px 0px;
	  }
	  #wjhg ul li p {width:50%;height:300px;background:#f9f9f9;overflow:hidden;float:left;}
      #wjhg ul li p img {width:100%;background:#f9f9f9;}
	  #wjhg ul li .info {padding-top:6px;height:300px;width:50%;float:left;padding-left:10px;}
	  #wjhg ul li .t {width:200px;height:80px;line-height:80px;float:left;font-size:24px;color:#555;font-weight:bold;}
	  #wjhg ul li .c{width:100%;float:left;}
      #wjhg ul li i{
		  display: inline-block;
			margin-right: 10px;
			float: left;
			width: 80px;
			height: 80px;
			background: url(/public/jiebg.png) no-repeat center center;
			background-size:66px;
			color: #FFF;
			font-weight: bold;
			font-size: 32px;
			text-align: center;
			line-height: 76px;
			font-style: normal;
	  }
	  
	  
	  @media screen and (max-width:768px){
		  
		  #wjhg ul li{width:350px!important;float:left;padding:10px;border:1px solid #efefef;list-style:none;
		  margin-left:7px;	}
		  #wjhg ul li p {width:100%;height:200px;background:#f9f9f9;overflow:hidden;}
		  #wjhg ul li p img {width:100%;background:#f9f9f9;}
		  #wjhg ul li .info {padding-top:6px;text-align:left;}
		  #wjhg ul li .t {font-size:16px;color:#333;font-weight:bold;text-align:left;}
		  #wjhg ul li i{
			  display: inline-block;
				margin-right: 10px;
				float: left;
				width: 30px;
				height: 30px;
				line-height:30px;
				background: url(/public/jiebg.png) no-repeat center center;
				background-size:30px;
				color: #FFF;
				font-weight: bold;
				font-size: 12px;
				text-align: center;
		  }		  
	  } 
	
	  
	  .nw-r  h3 {
		line-height: 30px;
		text-align: left;
		color:#333;
		font-size: 20px;
		padding-bottom: 10px;
		font-weight: normal;	
	}
	
	.nw-r h3 a{
	   color:#333;
	}

.nw-r p {
    font-size: 15px;
    color: #999;
    text-indent: 2em;
}
	  
	.nw-r .rank_c{
		width:24px;
		height:24px;
		display:inline-block;
		border-radius:24px;
		line-height:24px;
		text-align:center;
		color:#fff;
		background:#34a53d;
		margin-right:4px;
	}

	</style>

</head>
<body>

<!-- <div class="banner"><div class="banWrap"></div></div> -->
<div >
	<div id="top_banner">
		<img src="/static/2020nongmu/1920_580.jpg" alt="" style="width:100%;">
	</div>
</div>

<div id="nav-menu" class="fit-menu">
		<div class="fmWrap">
		<ul class="ul-fmw clearfix" id="home">
			
			<li class="active"><a class="fmwList n-twbd" href="#twbd">图文报道</a></li>			
			<li><a class="fmwList n-ltjj" href="#ltjs">论坛介绍</a></li>
			<li><a class="fmwList n-nyjb" href="#nyjb">拟邀嘉宾</a></li>			
			<li><a class="fmwList n-nyqy" href="#lhzb">联合主办</a></li>
			<li><a class="fmwList n-nyqy" href="#hzmt">合作媒体</a></li>			
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
				
						<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title from h_special_content where specialid=30 and typeid=1 and a_status=1 order by sort desc', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="<?php if($key == 0): ?>on<?php endif; ?>">
				
				<div class="dot">
				<div class="liner"></div>
				</div>
				</li><?php $i++; endforeach; endif; ;?>
	
				</ul>
				</div>
				<div class="bd">
				<ul style="position: relative;">				
						<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where specialid=30 and typeid=1 and a_status=1 order by sort desc', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
				<a href="javascript:;"><img src="<?php echo ($values['thumbnail']); ?>"></a>
				</li><?php $i++; endforeach; endif; ;?>
		
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
			    <?php $map = array(); $map['specialid'] = 30; $map['typeid'] = 2; $map['a_status'] = 1; $map['attr']='s'; $specialContent=M('SpecialContent'); $currentData1 = $specialContent->where($map)->order('sort desc')->find(); ?>
				 <div class="col-md-5 nw-r nw-l" style="padding-top:12px;">
					<h3><a target="_blank" href="<?php echo ($currentData1["url"]); ?>"><?php echo ($currentData1["title"]); ?></a></h3>
					<p style="text-align: justify;text-justify: inter-ideograph;line-height:27px;"><?php echo ($currentData1["description"]); ?><a href="<?php echo ($currentData1["url"]); ?>">查看详情&gt;&gt;</a></p>
					
				</div>				
				
				<div class="col-md-5 nw-r" style="min-height:217px;">
					<ul class="nw-r-ul">
                        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where specialid=30 and typeid=2 and a_status=1 and attr=\'\' order by sort desc limit 5', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="nw-li-a">
							    
								<a href="<?php echo ($values['url']); ?>" target="_blank">
								<span class="rank_c"><?php echo ($key+1); ?></span>
									<?php echo ($values['title']);?>
								</a>
							</li><?php $i++; endforeach; endif; ;?>	
					</ul>		
			    </div>
				
			</div>
			<div class="newsMore">
				<a href="https://www.tongwei.com/special/lists/specialid/30/typeid/1.html">查看更多</a> 
			</div>
			
		</div>
	</div>
</div>

<div class="ltjj" id="ltjs">
	<div class="default-comTit" style="margin-bottom:0px;">
		<div class="def-ct-wrap pAnbg">
			<h3>论坛<span>介绍</span></h3>
			<p>Forum profile</p>
		</div>
	</div>
	<div class="ltjjWrap">
			<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select content from h_special_content where (specialid=30 and typeid=3)  limit 1', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): echo ($values['content']); $i++; endforeach; endif; ;?>
	</div>
</div>

<div class="nyjb" id="nyjb">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>拟邀<span>嘉宾</span></h3>
			<p>Invited guests</p>
		</div>
	</div>
	<ul class="ltjbBox clearfix">	
	<!--<img src="/static/2020nongmu/guest1.png" style="width:100%;">
	<img src="/static/2020nongmu/guest2.png" style="width:100%;">-->
	
			<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,description,thumbnail from h_special_content where (specialid=30 and typeid=4)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="<?php echo ($values['thumbnail']); ?>"></div>
				<div class="jbTxt">
					<h4><?php echo ($values['title']); ?></h4>
					<p><?php echo ($values['description']); ?></p>
				</div>
		  </a>
		</li><?php $i++; endforeach; endif; ;?>	

	</ul>
</div>

<!--
<div class="ltyc" id="wjhg">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>往届<span>回顾</span></h3>
			<p>History review</p>
		</div>
	</div>
	<div class="slideBox1 ltycWrap clearfix">  
	    <div class="bd">
		  <ul>	    		
		
			<li >
				<a href="/special/20.html" target="_blank">
				<p><img src="/static/2020nongmu/chongwu1.jpg"></p>
				<div class="info">
					<i>1</i>
					<div class="t">首届</div>
					<div class="c">2019年9月26日，以“智慧引领 产业赋能 融合创变”为主题的第二届中国光伏产业领跑论坛在通威国际中心隆重启幕。</div>
				</div>
				</a>
			</li>
			
			
			</ul>
		</div>	
		
	</div>
</div> 
<script type="text/javascript">
                
				var device_wid=$(window).width();   
				var vis = 2;     
				if(device_wid<768){  vis = 1;}

				jQuery(".slideBox1").slide({
					mainCell: ".bd ul",
					effect: "leftLoop",
					vis:vis,
					trigger: "click",
					autoPlay: false,
					interTime:5000,
					mouseOverStop: false,
					startFun:function(i,c){
						
					}
				});
</script>
-->

<div class="nyqy" id="lhzb">
	<div class="default-comTit" style="margin-top:0px;">
		<div class="def-ct-wrap pAnbg">
			<h3>联合<span>主办</span></h3>
			<p>CO-HOST</p>
		</div>
	</div>
	<div class="nyqyWrap" style="margin-bottom:0px;">
		<ul class="chqyBox clearfix" style="text-align:center;">					
		<!--<img src="/static/2020nongmu/qiyelist.png" style="width:100%;">-->
		
        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=30 and typeid=5)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li style="width:180px;display:inline-block;">
			    
					<div class="qyImg"><img src="<?php echo ($values['thumbnail']); ?>"></div>
					<div class="qyTxt"><?php echo ($values['title']); ?></div>				
			</li><?php $i++; endforeach; endif; ;?> 

	   </ul>
	</div>
</div>

<div class="nyqy" id="xbdw">
	<div class="default-comTit" style="margin-top:0px;">
		<div class="def-ct-wrap pAnbg">
			<h3>协办<span>单位</span></h3>
			<p>STRATEGIC COORPATION</p>
		</div>
	</div>
	<div class="nyqyWrap" style="margin-bottom:0px;">
		<ul class="chqyBox clearfix" style="text-align:center;">					
		<!--<img src="/static/2020nongmu/qiyelist.png" style="width:100%;">-->
		
        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=30 and typeid=6)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li style="width:180px;display:inline-block;">
			    
					<div class="qyImg"><img src="<?php echo ($values['thumbnail']); ?>"></div>
					<div class="qyTxt"><?php echo ($values['title']); ?></div>				
			</li><?php $i++; endforeach; endif; ;?> 

	   </ul>
	</div>
</div>

<div class="nyqy" id="zcdw">
	<div class="default-comTit" style="margin-top:0px;">
		<div class="def-ct-wrap pAnbg">
			<h3>支持<span>单位</span></h3>
			<p>SUPPORT BY</p>
		</div>
	</div>
	<div class="nyqyWrap" style="margin-bottom:0px;">
		<ul class="chqyBox clearfix" style="text-align:center;">					
		<!--<img src="/static/2020nongmu/qiyelist.png" style="width:100%;">-->
		
        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=30 and typeid=7)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li style="width:180px;display:inline-block;">
			    
					<div class="qyImg"><img src="<?php echo ($values['thumbnail']); ?>"></div>
					<div class="qyTxt"><?php echo ($values['title']); ?></div>				
			</li><?php $i++; endforeach; endif; ;?> 

	   </ul>
	</div>
</div>

<div class="hzmt" id="hzmt" >
	<div class="default-comTit">
		<div class="def-ct-wrap">
			<h3>合作<span>媒体</span></h3>
			<p>MEDIA SUPPORT</p>
		</div>
	</div>
	<ul class="mt-ul clearfix">
	
	    		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=30 and typeid=8)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
				<h1><img src="<?php echo ($values['thumbnail']); ?>"></h1>
				<p><?php echo ($values['title']); ?></p>
			</li><?php $i++; endforeach; endif; ;?>		
				</ul>
</div>



<div class="footer">
	<div class="ft_btm">
		<div class="ftbWp">
			<div class="ft-link">
				
			</div>
			<div class="ft-copy"> <a href="http://www.tongwei.com/" style="color:#fff;">通威集团</a> <span>All Rights Reserved.</span> 蜀ICP备14018337号</div>
		</div>
	</div>
</div>
<script src="/static/2020nongmu/bootstrap.min.js"></script>
<script src="/static/2020nongmu/jquery.cookie.min.js"></script>
<script src="/static/2020nongmu/layer.min.js"></script>
<script type="text/javascript">

    var device_wid=$(window).width();   
  
    if(device_wid<600)
    {   
        $('#top_banner').html('<img src="/static/2020nongmu/600_300.jpg" alt="" style="width:100%;">');
		
    }

	
	
</script>

</body></html>