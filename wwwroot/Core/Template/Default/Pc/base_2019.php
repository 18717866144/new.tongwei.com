<?php defined('HX_CMS') or exit;$thispid = $navigate['id'];?><block name="php"></block>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> -->
  <title>通威集团有限公司 - 为了生活更美好</title>
  <meta name="keywords" content="通威集团有限公司">
  <meta name="description" content="通威集团有限公司">
  <link rel="stylesheet" href="__PUBLIC__/twnew/layui/css/layui.css">
  <link rel="stylesheet" href="__PUBLIC__/twnew/css/common.css">
  <script src="__PUBLIC__/twnew/layui/layui.js"></script>
<script src="__PUBLIC__/twnew/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/twnew/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="__PUBLIC__/twnew/js/app.js"></script>
<block name="head"></block>
</head>
<body>
 
<div id="head">	
	<div class="nav">
		
		<div class="nav-main">
			<ul class="layui-nav nav1" lay-filter="" style="position:static">
			  <li class="layui-nav-item1" style="margin-right:154px;"><a href="{-$Think.config.WEB_URL-}" style="padding:0px;"><img src="__PUBLIC__/twnew/logo_origin.png"></a></li>
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

<block name="page_banner">
<div id="banner" style="background:url('/Public/twnew/images/<?php echo $navigate['pid']>0 ? $navigate['pid'] : $navigate['id']; ?>.jpg') no-repeat center;"></div>
</block>

<block name="main"></block>

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

<div id="bottom">
	<div class="wrap">
		通威集团有限公司 @ 2021 TONGWEI.COM 版权所有 &nbsp;<a href="https://beian.miit.gov.cn/">蜀ICP备05002048号</a> &nbsp;总部地址：四川省成都市高新区天府大道中段588号通威国际中心 &nbsp;电话：028-85188888</div>
</div>

<script>

layui.use(['layer','element'], function(){
  var $ = layui.jquery,
  layer = layui.layer,
  element = layui.element;


});

</script> 
</body>
</html>