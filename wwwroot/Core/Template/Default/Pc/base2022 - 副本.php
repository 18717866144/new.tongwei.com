<?php defined('HX_CMS') or exit;$thispid = $navigate['id'];?><block name="php"></block>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>通威集团有限公司-为了生活更美好</title>
        <meta name="keywords" content="通威集团有限公司-为了生活更美好">
        <meta name="description" content="通威集团有限公司-为了生活更美好">
        <!-- External CSS -->
        <link rel="stylesheet" href="__PUBLIC__/assets/css/reset.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/aos.css">
        <link rel="stylesheet" href="__PUBLIC__/assets/css/swiper.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/index.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/media.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/indexMedia.css" />
        <!--[if lt IE 9]>
        <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <![endif]-->
    <block name="head"></block>
    </head>
<body>

<header class="header">
    <div class="fw">
        <a class="logo" href="index.html"><img src="images/logo.png" alt=""></a>
        <div class="head-right">
            <div class="navwrap">
                <ul class="nav">
                    <li class="active">
                        <a class="item" href="index.html">首页</a>
                    </li>
                    <li>
                        <a class="item next" href="about.html">关于通威</a>
                        <div class="subnav">
                            <a href="about.html">集团简介</a>
                            <a href="about2.html">主席寄语</a>
                            <a href="about3.html">领导关怀</a>
                            <a href="about4.html">组织结构</a>
                            <a href="about5.html">企业荣誉</a>
                            <a href="about1.html">发展历程</a>
                        </div>
                    </li>
                    <li>
                        <a class="item next" href="news1.html">新闻中心</a>
                        <div class="subnav">
                            <a href="news1.html">集团要闻</a>
                            <a href="news2.html">集团公告</a>
                            <a href="news5.html">媒体聚焦</a>
                            <a href="news4.html">新闻专题</a>
                            <a href="news3.html">通威视讯</a>
                        </div>
                    </li>
                    <li>
                        <a class="item next" href="chanye4.html">集团产业</a>
                        <div class="subnav">
                            <a href="chanye4.html">饲料生产</a>
                            <a href="chanye6.html">绿色养殖</a>
                            <a href="chanye3.html">食品加工</a>
                            <a href="chanye1.html">高纯晶硅</a>
                            <a href="chanye5.html">太阳能电池</a>
                            <a href="chanye7.html">渔光一体</a>
                            <a href="chanye2.html">其他产业</a>
                        </div>
                    </li>
                    <li>
                        <a class="item next" href="keji1.html">科技创新</a>
                        <div class=" subnav">
                            <a href="keji1.html">科研体系</a>
                            <a href="keji3.html">发明专利</a>
                            <a href="keji4.html">科研成果</a>
                            <a href="keji2.html">产学研合作</a>
                        </div>
                    </li>
                    <li>
                        <a class="item next" href="wenhua6.html">企业文化</a>
                        <div class=" subnav">
                            <a href="wenhua6.html">文化理念</a>
                            <a href="wenhua1.html">党建引领</a>
                            <a href="wenhua5.html">文化活动</a>
                            <a href="wenhua4.html">社会责任</a>
                            <a href="wenhua2.html">品牌价值</a>
                            <a href="wenhua7.html">文化载体</a>
                            <a href="wenhua3.html">企业视频</a>
                        </div>
                    </li>
                    <li>
                        <a class="item next" href="online1.html">在线服务</a>
                        <div class=" subnav">
                            <a href="online1.html">学习中心</a>
                            <a href="online3.html">人才招聘</a>
                            <a href="online1.html">在线办公</a>
                            <a href="online1.html">电子采购</a>
                            <a href="online2.html">监督平台</a>
                        </div>
                    </li>
                    <li>
                        <a class="item" href="contact.html">联系通威</a>
                    </li>
                </ul>
            </div>
            <!-- 切换语言 -->
            <a class="language" href="http://en.tongwei.com/" target="_blank"><img src="images/lag.png" alt=""></a>
            <!-- 搜索按钮 -->
            <a class="search-btn" href="javascript:;"><img src="images/ss.png" alt=""></a>
            <!-- 搜索框 -->
            <div class="head-search search-hide">
                <form action="search.html" method="get">
                    <input type="text" name="q" placeholder="输入关键词，回车">
                    <a href="javascript:;" class="btn-search"><img src="images/ss.png" alt=""></a>
                    <a href="javascript:;" class="btn-close"><img src="images/close.png" alt=""></a>
                </form>
            </div>
            <div class="navbtn">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
            </div>
        </div>
    </div>
</header>

<block name="page_banner">
<div id="banner" style="background:url('/Public/twnew/images/<?php echo $navigate['pid']>0 ? $navigate['pid'] : $navigate['id']; ?>.jpg') no-repeat center;"></div>
</block>

<block name="mainbox"></block>

<!-- 页脚 -->

<div id="footer" class="row">

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
			
			<dd><a href="/news/index.html" target="_blank">集团快讯</a></dd><dd><a href="/special/index.html" target="_blank">热点专题</a></dd><dd><a href="/media/index.html" target="_blank">媒体报道</a></dd><dd><a href="/wvideo/index.html" target="_blank">通威微视</a></dd>	
		
		</dl><dl>
			<dt><a href="/culture/index.html" target="_blank">品牌文化</a></dt>
			
			<dd><a href="/culture/index.html">文化理念</a></dd><dd><a href="/team/index.html">文化活动</a></dd><dd><a href="/paper/index.html">文化刊物</a></dd><dd><a href="/video/index.html">视频中心</a></dd><dd><a href="/brand/index.html">品牌实力</a></dd>
		
		</dl><dl style="background:transparent;width:62px;">
			<dt><a href="/join/index.html" target="_blank">人才中心</a></dt>
			
			<dd><a href="/hrconcept/index.html">人才理念</a></dd><dd><a href="/hrtrain/index.html">人才培养</a></dd><dd><a href="/twschool/index.html">通威大学</a></dd><dd><a href="/join/index.html">人才招聘</a></dd>	<dd><a href="/contact/index.html">联系通威</a></dd>
		
		</dl>	

		<!-- 
		<dl style="border-right:0px;">
			<dt><a href="javascript:;" target="_blank">通威网站群</a></dt>	

			 <dd><a href="http://www.tongwei.com.cn" target="_blank">通威股份</a></dd>			 
			 <dd><a href="http://www.scyxgf.com/" target="_blank">永祥股份</a></dd>
			 <dd><a href="http://www.tw-solar.com" target="_blank">通威太阳能</a></dd>
			 <dd><a href="http://tw-newenergy.com/" target="_blank">通威新能源</a></dd>
			 <dd style="width:86px;"><a href="http://www.care-pet.com/" target="_blank">好主人宠物食品</a></dd>
			 
		</dl>	
		<dl style="border-right:0px;">
			<dt style="height:24px;"></dt>	
             <dd><a href="http://www.twxhgg.com/" target="_blank">通威地产</a></dd>			
		     <dd><a href="http://www.tongyuwuye.com/" target="_blank">通宇物业</a></dd>			
			<dd><a href="http://www.tongweifood.cn/" target="_blank">通威食品</a></dd>
			<dd><a href="http://www.twfry.com/" target="_blank">通威鱼苗</a></dd>
		
		</dl> -->
		
		<dl class="qrcode" style="background:transparent;float:right;width:80px;border-right:0px;margin-right:0px;margin-left:0px;">	
            <dt style="margin-bottom:5px;">手机访问</dt>		
			<dd style="line-height:10px;">			
			<img src="/Public/twnew/images/mobile.jpg">
			</dd>
		</dl>	
		<div style="clear:both;"></div>
	</div>
</div>

<footer class="footer">
    <div class="foot-top">
        <div class="fw">
            <div class="wrap">
                <div class="left">
                    <div class="infos">
                        <p>总部地址：四川省成都市高新区天府大道中段588号通威国际中心</p>
                        <p>联系电话：028-85188888</p>
                    </div>
                    <div class="codes">
                        <div class="citem">
                            <img src="temp/code1.png" alt="">
                            <p class="t0"><span>关注通威</span></p>
                        </div>
                        <div class="citem">
                            <img src="temp/code2.png" alt="">
                            <p class="t0"><span>通威融媒</span></p>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="foot-search-wrap">
                        <!-- 搜索打开按钮 -->
                        <a class="sbtn" href="javascript:;"><img src="images/ss2.png" alt=""></a>
                        <!-- 搜索框 -->
                        <div class="foot-search search-hide">
                            <input type="text" placeholder="搜索">
                            <a href="javascript:;" class="btn-search"><img src="images/ss.png" alt=""></a>
                            <a href="javascript:;" class="btn-close"><img src="images/close.png" alt=""></a>
                        </div>
                    </div>
                    <div class="line"></div>
                    <!--<div class="item">
                        <a class="tt" href="index.html">首页</a>
                    </div>-->
                    <div class="item">
                        <a class="tt" href="javascript:;">关于通威</a>
                        <div class="sublist">
                            <a href="about.html">集团简介</a>
                            <a href="about2.html">主席寄语</a>
                            <a href="about3.html">领导关怀</a>
                            <a href="about4.html">组织结构</a>
                            <a href="about5.html">企业荣誉</a>
                            <a href="about1.html">发展历程</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">新闻中心</a>
                        <div class="sublist">
                            <a href="news1.html">集团要闻</a>
                            <a href="news2.html">集团公告</a>
                            <a href="news1.html">媒体聚焦</a>
                            <a href="news4.html">新闻专题</a>
                            <a href="news3.html">通威视讯</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">业务领域</a>
                        <div class="sublist">
                            <a href="chanye4.html">饲料生产</a>
                            <a href="chanye6.html">绿色养殖</a>
                            <a href="chanye3.html">食品加工</a>
                            <a href="chanye1.html">高纯晶硅</a>
                            <a href="chanye5.html">太阳能电池</a>
                            <a href="chanye7.html">渔光一体</a>
                            <a href="chanye2.html">其他产业</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">科技创新</a>
                        <div class="sublist">
                            <a href="keji1.html">科研体系</a>
                            <a href="keji3.html">发明专利</a>
                            <a href="keji4.html">科研成果</a>
                            <a href="keji2.html">产学研合作</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">企业文化</a>
                        <div class="sublist">
                            <a href="wenhua6.html">文化理念</a>
                            <a href="wenhua1.html">党建引领</a>
                            <a href="wenhua5.html">文化活动</a>
                            <a href="wenhua4.html">社会责任</a>
                            <a href="wenhua2.html">品牌价值</a>
                            <a href="wenhua7.html">文化载体</a>
                            <a href="wenhua3.html">企业视频</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">在线服务</a>
                        <div class="sublist">
                            <a href="online1.html">学习中心</a>
                            <a href="online3.html">人才招聘</a>
                            <a href="online1.html">在线办公</a>
                            <a href="online1.html">电子采购</a>
                            <a href="online2.html">监督平台</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="contact.html">联系通威</a>
                    </div>
                </div>
            </div>
            <div class="links">
                <a href="">通威股份</a>
                <a href="">永祥股份</a>
                <a href="">通威太阳能</a>
                <a href="">通威新能源</a>
                <a href="">通威农牧</a>
                <a href="">通宇物业</a>
                <a href="">通威食品</a>
                <a href="">通威鱼</a>
                <a href="">好主人宠物食品</a>
                <a href="">通威传媒</a>
                <a href="">通威商管</a>
            </div>
        </div>
    </div>
    <div class="foot-bottom">
        <div class="fw">
            通威集团有限公司 @ 2021 TONGWEI.COM 版权所有 &nbsp;
            <a href="">蜀ICP备05002048号</a>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="js/jquery.js"></script>
<script src="js/aos.js"></script>
<script src="js/swiper.js"></script>
<script src="js/common.js"></script>

</body>
</html>