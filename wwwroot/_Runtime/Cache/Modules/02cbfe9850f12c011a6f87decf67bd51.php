<?php if (!defined('THINK_PATH')) exit(); defined('HX_CMS') or exit;?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />

<title><?php echo ($special['title']); ?> - <?php echo (C("web_name")); ?> - <?php echo (C("web_name_ext")); ?></title>
<meta name="keywords" content="<?php echo ($special['title']); ?>">
<meta name="description" content="<?php echo ($special['description']); ?>">


<link rel="stylesheet" type="text/css" href="/static/css/normalize.css">

<?php  if(isMobile()){ ?> 
<link rel="stylesheet" type="text/css" href="/skins/2019lianghui/mobile_style.css?20180305v2">
<?php	 } else { ?>	 
<link rel="stylesheet" type="text/css" href="/skins/2019lianghui/style.css?20180305v2"> 
<?php	 } ?>






<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<script type="text/javascript" src="/static/js/jquery.js"></script>  
<script language="JavaScript" src="/static/js/jquery.SuperSlide.js"></script>     
<script type="text/javascript" src="/static/js/jquery.kwicks.js"></script>
<script type="text/javascript" src="/static/js/layer/layer.js"></script>
<script type="text/javascript" src="/static/js/layer/laytpl.js"></script>
<script type="text/javascript" src="/static/js/app_special.js"></script>
</head>
<body>
<div id="bg">
<div id="container" class="clearfix">
	<div class="banner"></div>
	<div id="main">
		<div class="nav">
			<ul class="clearfix">
				<li class="one"><a href="<?php echo ($special['url']); ?>">专题首页</a></li>
				<?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i; if($t['hide']==1) break; ?>
				<li<?php if($typeid==$t['typeid']) echo ' class="cur"';?>><a href="<?php echo ($special['url']); ?>#<?php echo ($t['typedir']); ?>"><?php echo ($t['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				<li style="float:right"><a href="http://www.tongwei.com" target="_blank">通威集团</a></li>
			</ul>
		</div>
		

<div class="index-1 big-pics-show clearfix" style="float:left;">
	<div class="big-pics-show-bd">
		<ul class="clearfix">
					<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=4 and specialid='.($specialid).' order by sort desc,id desc limit 20', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li><img src="<?php echo (thumb($values['thumbnail'],580,326,1)); ?>" alt="<?php echo ($values["title"]); ?>"></li><?php $i++; endforeach; endif; ;?>	
		</ul>
		<a class="prev-btn iconfont icon-left"></a>
		<a class="next-btn iconfont icon-right"></a>
	</div>
	<div class="big-pics-show-hd"></div>	
</div>

<div class="video-b" >

    <div class="video-bd" >
		<ul class="clearfix" >
		    <li data-video="/uploadfile/files/jjsn_2019_3_4.mp4" style="float:left;margin-left:0px;">
				<a href="javascript:;"><img src="/skins/2019lianghui/jjsn_2019_3_4.png" alt="">
				<span><b style=""></b></span><i class="iconfont icon-play"></i>
				</a>
			</li>	
			<li data-video="/uploadfile/files/cdtv1_2019_3_3.mp4" style="float:left;margin-left:0px;">
				<a href="javascript:;"><img src="/skins/2019lianghui/cdtv1_2019_3_3.png" alt="">
				<span><b style=""></b></span><i class="iconfont icon-play"></i>
				</a>
			</li>	
				
		</ul>
		<a class="prev-btn iconfont icon-left"></a>
		<a class="next-btn iconfont icon-right"></a>

	</div>
	<div class="video-hd"></div>

</div>


<script>
$(".big-pics-show").slide({mainCell:".big-pics-show-bd ul",titCell:".big-pics-show-hd",effect:"left",autoPlay:true,delayTime:500,interTime:5000,autoPage:"<a></a>",titOnClassName:"cur",prevCell:".prev-btn",nextCell:".next-btn",vis:2});

$(".video-b").slide({mainCell:".video-bd ul",titCell:".video-hd",effect:"left",autoPlay:true,delayTime:500,interTime:5000,autoPage:"<a></a>",titOnClassName:"cur",prevCell:".prev-btn",nextCell:".next-btn",vis:1});


$('.video-b .video-bd li').click(function(){
	var video = $(this).data('video');
	$.G.playVideo(video);
});

</script>

<div class="index-1 clearfix">
	<a name="news"></a>
	<div class="left">
		<div class="title-wrap"><span class="more"><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=1');?>" target="_blank">更多</a></span><h2><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=1');?>" target="_blank">图文直击</a></h2></div>
		<ul class="index-news">
		<?php $ids = array(); ?>
				<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where FIND_IN_SET(\'s\',attr) and a_status=1 and typeid=1 and specialid='.($specialid).' order by sort desc,id desc limit 1', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): $styleArr=explode('|',$values['style']);$style=$styleArr[2]?' style="font-size:'.$styleArr[2].'px;"':''; ?>
		<li class="top"><span class="date"><?php echo date('Y-m-d',$values['save_time']);?></span><a href="<?php echo ($values['url']); ?>" target="_blank"<?php echo ($style); ?>><?php echo ($values['title_hot']?$values['title_hot']:($values['title_short']?$values['title_short']:$values['title']));?></a></li>
		<?php $ids[]=$values['id']; $i++; endforeach; endif; ;?>
		<?php $idsStr = implode(',',$ids); ?>
				<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=1 and specialid='.($specialid).' and id not in('.($idsStr).') order by sort desc,id desc limit 6', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li><span class="date"><?php echo date('Y-m-d',$values['save_time']);?></span><a href="<?php echo ($values['url']); ?>" target="_blank"><?php echo ($values["title"]); ?></a></li><?php $i++; endforeach; endif; ;?>
		</ul>
		
		<div class="title-wrap" style="margin-top:15px"><span class="more"><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=5');?>" target="_blank">更多</a></span><h2><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=5');?>" target="_blank">往期回顾</a></h2></div>
		<ul class="index-news">
				<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=5 and specialid='.($specialid).' order by sort desc,id desc limit 6', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li><span class="date"><?php echo date('Y-m-d',$values['save_time']);?></span><a href="<?php echo ($values['url']); ?>" target="_blank"><?php echo ($values["title"]); ?></a></li><?php $i++; endforeach; endif; ;?>
		</ul>
	</div>
	
	<a name="proposal"></a>
	<div class="right" >
		<div class="title-wrap"><span class="more"><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=2');?>" target="_blank">更多</a></span><h2><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=2');?>" target="_blank">提案议案</a></h2></div>
		<ul class="index-proposal">
				<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=2 and specialid='.($specialid).' order by sort desc,id desc limit 5', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="clearfix">
			<i><?php echo sprintf("%02d",$i);?></i>
			<div class="info">
			<a href="<?php echo ($values['url']); ?>" target="_blank"><?php echo ($values['title_short']?$values['title_short']:$values['title']);?></a>
			<p><?php echo msubstr($values['description'],0,100);?></p>
			</div>
		</li><?php $i++; endforeach; endif; ;?>		
		</ul>
	</div>
</div>



<a name="media"></a>
<div class="index-3 media-news clearfix">
	<div class="title-wrap"><span class="more"><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=3');?>" target="_blank">更多</a></span><h2><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=3');?>" target="_blank">媒体聚焦</a></h2></div>
	<div class="left media-pics">
		<ul class="bd">
					<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where FIND_IN_SET(\'h\',attr) and a_status=1 and typeid=3 and specialid='.($specialid).' order by sort desc,id desc limit 4', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li <?php if($key%2 == 0): ?>style="margin-left:0"<?php endif; ?>><a href="<?php echo ($values['url']); ?>" target="_blank"><img src="<?php echo (thumb($values['thumbnail'],275,155,1)); ?>" alt="<?php echo ($values["title"]); ?>"><br><?php echo ($values["title"]); ?></a></li><?php $i++; endforeach; endif; ;?>				
		</ul>
	</div>
	
	<div class="right media-news-article">
	<ul>
				<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where FIND_IN_SET(\'j\',attr) and a_status=1 and typeid=3 and specialid='.($specialid).' order by sort desc,id desc limit 5', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li><span class="media"><?php echo ($values["source"]); ?></span><a href="<?php echo ($values['url']); ?>" target="_blank"><?php echo ($values["title"]); ?></a></li><?php $i++; endforeach; endif; ;?>			
	</ul>
	</div>
</div>


	</div>
	
	<div class="footer">
	<a href="http://www.tongwei.com" target="_blank" class="footer-logo"><img src="/skins/2019lianghui/logo.png" /></a>
	通威集团有限公司 @ 2019 TONGWEI 版权所有　　蜀ICP备05002048号　　总部地址：四川省成都市高新区天府大道中段588号通威国际中心　电话：028-85188888
	</div>
	<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</div>
</div>
</body>
<html>