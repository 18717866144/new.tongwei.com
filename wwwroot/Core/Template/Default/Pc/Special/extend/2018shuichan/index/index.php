<!DOCTYPE html>
<!-- saved from url=(0051)http://z.tongwei.cn/special/specialid/119.html#twbd -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>2018第二届中国水产科技大会</title>
	<meta name="keywords" content="2018第二届中国水产科技大会">
	<meta name="description" content="2018第二届中国水产科技大会">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<link href="/static/2018shuichan/bootstrap.min.css" rel="stylesheet">
	<link href="/static/2018shuichan/css.css" rel="stylesheet">
	<link href="/static/2018shuichan/fitCss.css" rel="stylesheet">
	<link rel="stylesheet" href="/static/2018shuichan/layer.css" id="layui_layer_skinlayercss">
	<link rel="stylesheet" href="https://g.alicdn.com/de/prismplayer/2.6.0/skins/default/aliplayer-min.css" />
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2018shuichan/jquery.min.js"></script>
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
	<img src="/static/2018shuichan/2018bg.jpg" alt="" style="width:100%;">
</div></div>
<div id="nav-menu" class="fit-menu">
		<div class="fmWrap">
		<ul class="ul-fmw clearfix" id="home">
			<li class="active">
			<a href="/">首页</a>
			</li>
			<li>
			<a class="fmwList n-ltjj" href="#ltjj">论坛简介</a>
			</li>
			<li><a class="fmwList n-ltyc" href="#ltyc">论坛议程</a>
			</li>
			<li>
			<a class="fmwList n-twbd" href="#twbd">图文报道</a>
			</li>
			<li><a class="fmwList n-nyjb" href="#nyjb">拟邀嘉宾</a>
			</li>
			<li><a class="fmwList n-nyqy" href="#nyqy">拟邀企业</a>
			</li>
			<li><a class="fmwList n-hzmt" href="#hzmt">合作媒体</a>
			</li>
			<li><a class="fmwList n-video" href="#contact">联系我们</a>
			</li>			
		</ul>
	</div>
</div>

<script type="text/javascript" src="//g.alicdn.com/de/prismplayer/1.8.6/prism-min.js"></script>
<!-- 现场直播 -->
<!--  <div id="hyzb">
    <div class="default-comTit">
		<div class="def-ct-wrap">
			<h3>会议<span>直播</span></h3>
			<p> Conference Live</p>
		</div>
	</div>
	<div class="wrap live_title">
		<div class="left">直播时间：2018/4/27 08:30 - 18:00</div>
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

   if(isiOS==true || isAndroid ==true)
   {
      
      source_url='http://zb.yuye.tv/AppName/StreamName.m3u8?auth_key=1524968627-0-0-a40761b347ae2df283fe7f97626147ab';

	  var player = new Aliplayer({
	  id: 'J_prismPlayer',
	  width: '100%',
	  height: "300px",
	  autoplay: true,
	   controlBarVisibility:'alwayse',
	   skinLayout:[                            // false | Array, 播放器使用的ui组件，非必填，不传使用默认，传false或[]整体隐藏
	    {name: "bigPlayButton", align: "blabs", x: 30, y: 80},
	    {name: "H5Loading", align: "cc"},
	    {name: "errorDisplay", align: "tlabs", x: 0, y: 0},
	    {name: "infoDisplay", align: "cc"},
	    {name: "controlBar", align: "blabs", x: 0, y: 0,
	      children: [
	        {name: "progress", align: "blabs", x: 0, y: 44},
	        {name: "playButton", align: "tl", x: 15, y: 12},
	        {name: "timeDisplay", align: "tl", x: 10, y: 7},
	        {name: "fullScreenButton", align: "tr", x: 10, y: 10},
	        //{name: "snapshot", align: "tr", x: 10, y: 10},
	        {name: "volume", align: "tr", x: 10, y: 10},
	        {name:"streamButton", align:"tr",x:0, y:10},
	        {name:"speedButton", align:"tr",x:0, y:10}
	      ]
	    }
	  ],
	  // isLive:true,
	  userH5Prism:true,
	  playsinline:true,
	  source:source_url,
	  // cover: 'http://liveroom-img.oss-cn-qingdao.aliyuncs.com/logo.png',
	  });

	   player.on('uiReady',function  (e) {
	    $('.prism-player .prism-big-play-btn').css("bottom", "30px");

	    });

    }
    else
    {    
    	source_url='rtmp://zb.yuye.tv/AppName/StreamName?auth_key=1524968606-0-0-e96c73f866d78049fd7b8d4ca3d8dd48';

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


			<div class="row news clearfix" style="min-height:200px;">
				<div class="col-md-5 nw-r nw-l">
					<ul class="nw-r-ul">

                        <sql sql="select * from h_special_content where (specialid=9 and cid=15 and sort=2018) or (specialid=9 and  is_link=1 and sort=2018) order by save_time desc limit 5">
							<li class="nw-li-a">
							<a href="{-$values['url']-}" target="_blank">
								{-:($values['title'])-}
							</a>
							</li>

						</sql>	



					</ul>
				</div>
				<div class="col-md-5 nw-r">
				    <a href="http://z.tongwei.cn/special/specialid/119.html"><div class="wangqi"></div></a>
					<div class="bk10"></div>
					<ul class="nw-r-ul">

						<sql sql="select * from h_special_content where (specialid=9 and cid=15 and sort=1) or (specialid=9 and  is_link=1 and sort=1) order by save_time desc limit 5">
							<li class="nw-li-a">
							<a href="{-$values['url']-}" target="_blank">
								{-:($values['title'])-}
							</a>
							</li>

						</sql>

					</ul>
				</div>
			</div>
<div class="newsMore"><a href="http://www.tongwei.com/special/lists/specialid/9/typeid/1.html">查看更多</a> </div>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">

                  <sql sql="select file_path from h_attachment where old_name like '2018shuichankeji%' and related_table='special_content' order by save_time desc">
						
                       <li data-target="#carousel-example-generic"
                        data-slide-to="{-$key-}" class="<if condition='$key eq 1'>active</if>"></li>

				  </sql>
						


					<!-- <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
				<li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
				<li data-target="#carousel-example-generic" data-slide-to="4" class="active"></li> -->
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">

				<sql sql="select file_path from h_attachment where old_name like '2018shuichankeji%' and related_table='special_content' order by save_time desc">

				   <div class="item <if condition='$key eq 1'>active</if>"><a href="javascript:;" target="_blank"><img src="{-$values['file_path']-}"></a><div class="carousel-caption"></div></div>

			    </sql>

				
				</div>
				<!-- Controls -->
				<a class="left carousel-control" href="http://z.tongwei.cn/special/specialid/119.html#carousel-example-generic" role="button" data-slide="prev"> <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> --> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="http://z.tongwei.cn/special/specialid/119.html#carousel-example-generic" role="button" data-slide="next"> <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> --> <span class="sr-only">Next</span> </a> 
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
	<p>为加快我国传统渔业向科技化、标准化、智能化、集约化、产业化和规模化水平的现代渔业转型升级的步伐，同时博采众长，集思广益，在农业部渔业渔政管理局、全国水产技术推广总站、中国水产学会、中国水产科学研究院、中国水产流通与加工协会、四川省水产局的指导下，通威集团联合中国渔业协会、中国林牧渔业经济学会、中国渔业报在成功举办“2017中国水产科技大会”的基础上，邀请相关政府机构、行业领袖、大中型企业董事长、总经理、研究机构、主流媒体及相关咨询机构共同举办“2018第二届中国水产科技大会”，为行业搭建养殖、运营、开发、展销的高端合作平台，共同探讨全产业链健康有序发展，推动产业繁荣与进步。</p>
	<span><b>论坛主题：</b>绿色变革 科技为先</span>
	<span><b>指导思想：</b>培育新动能、打造新业态、扶持新主体、拓宽新渠道、加快推进水产养殖行业转型升级</span>
	<!-- <span><b>论坛形式：</b>主题演讲 + 企业演讲 + 圆桌对话 + 颁奖仪式 + 揭牌仪式+ 精品展会</span> -->
	<span><b>活动时间：</b>2018年4月27日</span>
	<span><b>活动规模：</b>800人 </span>
	<span><b>活动地点：</b>成都·通威国际中心</span>
	<span><b>主持人：</b>刘栋栋 （中央电视台）</span>
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
	    <li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/1liuhanyuan.jpg"></div>
				<div class="jbTxt">
					<h4>刘汉元</h4>
					<p>十一届全国政协常委、全国人大代表、通威集团董事局主席</p>
				</div>
		  </a>
		</li>

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/3zhaoxingwu.jpg"></div>
				<div class="jbTxt">
					<h4>赵兴武</h4>
					<p>农业部渔业渔政管理局原局长、中国渔业协会会长</p>
				</div>
		  </a>
		</li>

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/2huhonglang.jpg"></div>
				<div class="jbTxt">
					<h4>胡红浪</h4>
					<p>全国水产技术推广总站、中国水产学会副站长</p>
				</div>
		  </a>
		</li>

		

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/4qingzuping.jpg"></div>
				<div class="jbTxt">
					<h4>卿足平</h4>
					<p>四川省农业厅党组成员、副厅长</p>
				</div>
		  </a>
		</li>

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/6maikangshen.jpg"></div>
				<div class="jbTxt">
					<h4>麦康森</h4>
					<p>中国工程院院士，中国海洋大学教授</p>
				</div>
		  </a>
		</li>

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/5guijianfang.jpg"></div>
				<div class="jbTxt">
					<h4>桂建芳</h4>
					<p>中国科学院院士、水生生物研究所原所长</p>
				</div>
		  </a>
		</li>


		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/10dengwei.jpg"></div>
				<div class="jbTxt">
					<h4>邓伟</h4>
					<p>中国水产科学研究院副院长</p>
				</div>
		  </a>
		</li>

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/11xiejun.jpg"></div>
				<div class="jbTxt">
					<h4>谢骏</h4>
					<p>中国水产科学研究院淡水渔业研究中心水产病害与饲料研究室研究员</p>
				</div>
		  </a>
		</li>

		

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/7liuxingguo.jpg"></div>
				<div class="jbTxt">
					<h4>刘兴国</h4>
					<p>中国水产科学研究院渔业机械仪器研究所生态工程研究室主任</p>
				</div>
		  </a>
		</li>

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/8qianxiaoming.jpg"></div>
				<div class="jbTxt">
					<h4>钱晓明</h4>
					<p>江苏中洋集团董事长</p>
				</div>
		  </a>
		</li>



        <li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/13philippe.jpg"></div>
				<div class="jbTxt">
					<h4>Philippe LEGER</h4>
					<p>比利时英伟水产公司全球总裁</p>
				</div>
		  </a>
		</li>

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/14wangwen.jpg"></div>
				<div class="jbTxt">
					<h4>汪文</h4>
					<p>中国渔业报总编辑</p>
				</div>
		  </a>
		</li>



		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/9guoyizhong.jpg"></div>
				<div class="jbTxt">
					<h4>郭异忠</h4>
					<p>通威股份总裁</p>
				</div>
		  </a>
		</li>


		

		<li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/12zhanglu.jpg"></div>
				<div class="jbTxt">
					<h4>张璐</h4>
					<p>通威股份副总裁兼技术总监</p>
				</div>
		  </a>
		</li>


        <li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/13xuyuanbin.jpg"></div>
				<div class="jbTxt">
					<h4>许愿斌</h4>
					<p>澳华集团副总裁</p>
				</div>
		  </a>
		</li>


        <li>
		  <a href="javascript:;">
				<div class="jbImg"><img src="/static/2018shuichan/14chenkaimin.jpg"></div>
				<div class="jbTxt">
					<h4>程开敏</h4>
					<p>粤海集团技术总监</p>
				</div>
		  </a>
		</li>

		


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
	  <img src="/static/2018shuichan/light2.png" alt="" style="width:100%;">
	</div>
</div> -->
<div class="ltyc" id="ltyc">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>论坛<span>议程</span></h3>
			<p>Forum agenda</p>
		</div>
	</div>
	<div class="ltycWrap">  
		<img src="/static/2018shuichan/yicheng1.png">
		<img src="/static/2018shuichan/yicheng2.png">
		<img src="/static/2018shuichan/yicheng3.png">
	</div>
</div>



<div class="nyqy" id="nyqy">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>拟邀<span>企业</span></h3>
			<p>Invited enterprise</p>
		</div>
	</div>
	<div class="nyqyWrap">
		<ul class="chqyBox clearfix">
					<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/1tongweigufen.png"></div>
					<div class="qyTxt">通威股份</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/20wenshishipin.png"></div>
					<div class="qyTxt">温氏食品</div>
				</a>
			</li>

             <li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/2aohua.png"></div>
					<div class="qyTxt">澳华集团</div>
				</a>
			</li>
              
            <li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/26aohaikonggu.png"></div>
					<div class="qyTxt">粤海控股</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/27hengxingjituan.png"></div>
					<div class="qyTxt">恒兴集团</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/28dabeinong.png"></div>
					<div class="qyTxt">大北农</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/29guolianshuichan.png"></div>
					<div class="qyTxt">国联水产</div>
				</a>
			</li>



			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/3haida.png"></div>
					<div class="qyTxt">海大集团</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/21xinxiwangliuhe.png"></div>
					<div class="qyTxt">新希望六和</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/4zhongyang.png"></div>
					<div class="qyTxt">中洋集团</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/22bilishiinve.png"></div>
					<div class="qyTxt">比利时INVE英伟水产</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/23danmaipaiouma.png"></div>
					<div class="qyTxt">丹麦拜欧玛</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/24meiguojiaji.png"></div>
					<div class="qyTxt">美国嘉吉水产营养</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/25baiyangshuichan.png"></div>
					<div class="qyTxt">百洋水产</div>
				</a>
			</li>






			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/5jianming.png"></div>
					<div class="qyTxt">建明工业</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/6fengshang.png"></div>
					<div class="qyTxt">江苏丰尚</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/7shuangshida.png"></div>
					<div class="qyTxt">双仕达</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/8jinqiao.png"></div>
					<div class="qyTxt">金桥</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/9zhuyili.png"></div>
					<div class="qyTxt">广州注意力</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/10xinxinyuan.png"></div>
					<div class="qyTxt">鑫元机械</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/11hongyuanyouzhi.png"></div>
					<div class="qyTxt">鸿远油脂</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/12wufengyufen.png"></div>
					<div class="qyTxt">五丰鱼粉</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/13foshanjingong.png"></div>
					<div class="qyTxt">佛山金功</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/14yuguangwulian.png"></div>
					<div class="qyTxt">渔光物联</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/15shanshuibaijin.png"></div>
					<div class="qyTxt">山水白金</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/16sangpushengwu.png"></div>
					<div class="qyTxt">桑普生化</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/17tongweizidonghua.png"></div>
					<div class="qyTxt">通威自动化</div>
				</a>
			</li>

			<li><a href="javascript:;">
					<div class="qyImg"><img src="/static/2018shuichan/18sanxinyaoye.png"></div>
					<div class="qyTxt">通威三新药业</div>
				</a>
			</li>


	</ul>
	</div>
</div>

<!--精彩视频-->
<div class="video-wrap" id="video" style="display:none">
	<div class="default-comTit">
		<div class="def-ct-wrap">
			<h3>精彩视频</h3>
			<p>video</p>
		</div>
	</div>

	<div class="video-wp c-block clearfix" id="cv-block">
		<div class="video-block">
			<div id="evideo" class="video"><img src="/static/2018shuichan/5ddd8184f1239c31a2278becb9e05dbf.jpg" style="width:100%;height:100%"></div>
			<div id="video-list" class="video-list">
				<div class="vl-hd"><span>相关视频</span></div>
				<div class="video-wrapper" id="video-wrapper">
					<div class="scroller"><ul id="vl-ul"></ul></div>
				</div>
			</div>
		</div>
	</div>
</div>



<!--精彩视频-->

<div class="hzmt" id="hzmt">
	<div class="default-comTit">
		<div class="def-ct-wrap">
			<h3>合作<span>媒体</span></h3>
			<p> Associated media</p>
		</div>
	</div>
	<ul class="mt-ul clearfix">
				<li><h1><img src="/static/2018shuichan/3b1841f9b12250f45926d54c7f95bf83.jpg"></h1><p>CCTV-7</p></li><li><h1><img src="/static/2018shuichan/9c65015de40e46bc2ca7f288f9a43a1a.jpg"></h1><p>农民日报</p></li><li><h1><img src="/static/2018shuichan/03bc2ab5243d8d2c1d66c661d4f6ffd8.jpg"></h1><p>中国渔业报</p></li><li><h1><img src="/static/2018shuichan/93940a47574cd891a6d1acce25cb6d22.jpg"></h1><p>南方农村报</p></li><li><h1><img src="/static/2018shuichan/0c431042c407095323e3e2684f423eda.jpg"></h1><p>四川农村日报</p></li><li><h1><img src="/static/2018shuichan/7c4945a241c4954d925ce3dfaf198d66.jpg"></h1><p>水产前沿</p></li><li><h1><img src="/static/2018shuichan/c83655c2f1a0c172e5d81f93d0ede9e1.jpg"></h1><p>科学养鱼</p></li><li><h1><img src="/static/2018shuichan/33167266db61f3ff3471740f391afc36.jpg"></h1><p>农财宝典</p></li><li><h1><img src="/static/2018shuichan/fc5c72853b5068418d5e1bfa10738c99.jpg"></h1><p>当代水产</p></li><li><h1><img src="/static/2018shuichan/19923cf0dbfc0f96b5a57a6f87840b06.jpg"></h1><p>中国经济时报</p></li><li><h1><img src="/static/2018shuichan/76c76e24b3cd51311087e31c6b8f994a.jpg"></h1><p>中国经营报</p></li><li><h1><img src="/static/2018shuichan/a82b58fe96ee62bfc5f6c32acd6174e0.jpg"></h1><p>商界传媒</p></li><li><h1><img src="/static/2018shuichan/2b9f9d84b8e2cd9f2361d1886d934462.jpg"></h1><p>每日经济新闻</p></li><li><h1><img src="/static/2018shuichan/5798522b66b17ed19f1becc805c552d0.jpg"></h1><p>21世纪经济报道</p></li><li><h1><img src="/static/2018shuichan/afab2f19ccb144f2a9e5ea30dc4f4aba.jpg"></h1><p>四川日报</p></li><li><h1><img src="/static/2018shuichan/1fe9f26444f955c9d6c1a61f0f6c75d6.jpg"></h1><p>成都商报</p></li><li><h1><img src="/static/2018shuichan/21ff732936a81e442c2a2ff8c1f98ada.jpg"></h1><p>华西都市报</p></li><li><h1><img src="/static/2018shuichan/ac4e6622fe414f628c80b517ad4ad4d6.jpg"></h1><p>四川电视台</p></li><li><h1><img src="/static/2018shuichan/c08c6568c94804cd82a389451d92cf2c.jpg"></h1><p>成都电视台</p></li><li><h1><img src="/static/2018shuichan/6bd0e5986393a81239c8c912ea693818.jpg"></h1><p>天府早报</p></li><li><h1><img src="/static/2018shuichan/aa6731d0f339abfcadbc27aa74d7d779.jpg"></h1><p>成都日报</p></li><li><h1><img src="/static/2018shuichan/1ff35f392659ace69f2de836352ec000.jpg"></h1><p>人民网</p></li><li><h1><img src="/static/2018shuichan/308d0b4d4e18332140ec6a9dfa65e696.jpg"></h1><p>新华网</p></li><li><h1><img src="/static/2018shuichan/2326acd2e9ad32fe04421718c863353f.jpg"></h1><p>腾讯网</p></li><li><h1><img src="/static/2018shuichan/97ce950099179e2b28394bd09c51da80.jpg"></h1><p>四川新闻网</p></li><li><h1><img src="/static/2018shuichan/543759ad5c115b2242ef62e936c6116f.jpg"></h1><p>农村金融时报</p></li><li><h1><img src="/static/2018shuichan/11cf9652580d7e2327bd628bae69eb96.jpg"></h1><p>农资导报</p></li><li><h1><img src="/static/2018shuichan/e015b58c9913bd12db6c79754cda7523.jpg"></h1><p>农村新报</p></li><li><h1><img src="/static/2018shuichan/696bce3cff0db28651d78b1c26c1e015.jpg"></h1><p>通心粉社区</p></li><li><h1><img src="/static/2018shuichan/34e1c477ddc3f7b0ab17a864f5abcd97.jpg"></h1><p>吾谷网</p></li><li><h1><img src="/static/2018shuichan/28a8b3c77ded03cdb94a638d95ed133c.jpg"></h1><p>中国水产养殖网</p></li><li><h1><img src="/static/2018shuichan/59ef51fe4ecf2465862f9b2087d6a9ec.jpg"></h1><p>中国水产门户网</p></li><li><h1><img src="/static/2018shuichan/8e6b09ff377c652866a05d62864b3efc.jpg"></h1><p>中国饲料工业信息网</p></li><li><h1><img src="/static/2018shuichan/d3afe040366e53284774a406191224b1.jpg"></h1><p>农博网</p></li><li><h1><img src="/static/2018shuichan/1bc52efe2ff642083e0fc79ab3134342.jpg"></h1><p>中国水产频道</p></li><li><h1><img src="/static/2018shuichan/6d16b8571b0c61974097f600ebb97f7d.jpg"></h1><p>饲料科技与经济</p></li><li><h1><img src="/static/2018shuichan/37ddf80cb879dce4cc9c2e1f3c58c443.jpg"></h1><p>广东饲料网</p></li><li><h1><img src="/static/2018shuichan/ee8b87e72ee34acb71abc10946baa656.jpg"></h1><p>中国农业全搜索</p></li><li><h1><img src="/static/2018shuichan/9d601ac156d7f743f696003b267b1f8f.jpg"></h1><p>中国渔业在线</p></li>	</ul>
</div>





<div class="lxwm" id="contact">
	<div class="default-comTit">
		<div class="def-ct-wrap pAnbg">
			<h3>联系<span>我们</span></h3>
			<p>Contact us</p>
		</div>
	</div>
	<div class="lxWrap clearfix">
     
         <div style="width:auto;padding:0px 10px;float:left;margin-top:20px;">
         	<div style="width:100%;">
         	参会报名：</div>
	         <div class="contact-b">
	         	
	         
	         		骈小姐&nbsp;&nbsp;028-86168242&nbsp;&nbsp;18680140928
	         
	         		&nbsp;&nbsp;PIANR@tongwei.com
	        

	         </div>	
	         <div class="contact-b">
	         	
	         		唐小姐&nbsp;&nbsp;028-86168724&nbsp;&nbsp;13689060116
	         	
	         		&nbsp;&nbsp;tangyy@tongwei.com
	         	
	         </div>
         </div>

         <div style="width:auto;float:right;padding:0px 10px;margin-top:20px;">
         	 <div style="width:100%;">
         	招商合作：</div>
	         <div class="contact-b">
	         	
	         	
	         		李小姐&nbsp;&nbsp;028-86168393&nbsp;&nbsp;13540227980
	         
	         		&nbsp;&nbsp;LIHH06@tongwei.com
	         

	         </div>	
	         <div class="contact-b">
	         	
	         		罗先生&nbsp;&nbsp;028-86168405&nbsp;&nbsp;18681370217
	         
	         		&nbsp;&nbsp;LUOJ016@tongwei.com
	         
	         </div>
         </div>
	 

	<!--	<div class="lx-l clearfix">
			<ul class="lx-lIcon">
				<li><img src="/static/2018shuichan/cu-tel.jpg"></li>
				<li></li><li></li><li></li><li></li><li></li>
				<li><img src="/static/2018shuichan/cu-add.jpg"></li>
				<li><img src="/static/2018shuichan/cu-email.jpg"></li>
			</ul>
			<ul class="lx-lTit">
				<li>参会报名：</li>
				<li>招商合作：</li>
				<li></li>
				<li></li>
				<li></li>
				<li>邮编：</li>
				<li>地址：</li>
				<li>电子邮箱：</li>
			</ul>
			<ul class="lx-lInfo">
				<li>冯小姐<span>028-86168409</span>13608205952</li>
				<li>陈小姐<span>028-86168393</span>18284563652</li>
				<li>付先生<span>028-86168392</span>18483667192</li>
				<li>路先生<span>028-86168177</span>18980769622</li>
				<li>蔡先生<span>028-86168613</span>13658057969</li>
				<li>610093</li>
				<li>成都市天府大道中段588号通威国际中心</li>
				<li>lux01@tongwei.com</li>
			</ul>
		</div>
		<div class="lx-r">
			<form onsubmit="return bm(this);">
			<ul class="lx-rUl">
				<li><input class="lxInp-a verify" type="text" name="data[name]" data-reg="[\u4e00-\u9fa5]" placeholder="您的中文姓名" maxlength="15"></li>
				<li><input class="lxInp-a verify" type="text" name="data[mobilephone]" placeholder="手机号码" data-reg="^((1[3,5,8][0-9])|(14[5,7])|(17[0,6,7,8]))\d{8}$" maxlength="11"></li>
				<li><input class="lxInp-a verify" type="text" name="data[email]" placeholder="邮箱地址" data-reg="[\w!#$%&amp;&#39;*+/=?^_`{|}~-]+(?:\.[\w!#$%&amp;&#39;*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?" maxlength="20"></li>
				<li><textarea class="lxInp-b" name="data[remark]" placeholder="填写备注信息（可选）" maxlength="200"></textarea></li>
				<li class="lxYzm-li clearfix"><div class="lxYzm-l"><input class="lxInp-d verify" type="text" placeholder="验证码" name="data[verifycode]" data-reg="^[0-9a-zA-Z]+$" maxlength="6"></div><div class="lxYzm-c"><img src="/static/2018shuichan/vy.jpg" onclick="this.src=&#39;http://z.tongwei.cn/signupgetcode.html?&#39;+Math.random()"></div></li>
				<li><input class="lxInp-c" type="submit" value="立即报名"> <span id="bmmsg" class="bmmsg"></span></li>
				<input type="hidden" name="data[tid]" value="3">
			</ul>
			</form>
		</div> -->

	</div>
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
<script src="/static/2018shuichan/bootstrap.min.js"></script>
<script src="/static/2018shuichan/jquery.cookie.min.js"></script>
<script src="/static/2018shuichan/layer.min.js"></script>
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
</script><span style="display:none" id="cnzz_stat_icon_1254973742"><a href="http://www.cnzz.com/stat/website.php?web_id=1254973742" target="_blank" title="站长统计">站长统计</a></span><script src="/static/2018shuichan/stat.php" type="text/javascript"></script><script src="/static/2018shuichan/core.php" charset="utf-8" type="text/javascript"></script>

</body></html>
