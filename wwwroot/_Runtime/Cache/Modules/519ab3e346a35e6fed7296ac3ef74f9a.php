<?php if (!defined('THINK_PATH')) exit(); defined('HX_CMS') or exit;?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />

<title><?php echo ($special['title']); ?> - <?php echo (C("web_name")); ?> - <?php echo (C("web_name_ext")); ?></title>
<meta name="keywords" content="<?php echo ($special['title']); ?>">
<meta name="description" content="<?php echo ($special['description']); ?>">


<link rel="stylesheet" type="text/css" href="/static/css/normalize.css">
<link rel="stylesheet" href="__PUBLIC__/twnew/css/video.css">
<link media="all" rel="stylesheet" href="https://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<?php
 if(isMobile()){ ?>
<link rel="stylesheet" type="text/css" href="/skins/2022lianghui/mobile_style.css?20180305v2">
<?php
 } else { ?>
<link rel="stylesheet" type="text/css" href="/skins/2022lianghui/style.css?20180305v2">
<?php
 } ?>



<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<script type="text/javascript" src="/static/js/jquery.js"></script>  
<script language="JavaScript" src="/static/js/jquery.SuperSlide.js"></script>     
<script type="text/javascript" src="/static/js/jquery.kwicks.js"></script>
<script type="text/javascript" src="/static/js/layer/layer.js"></script>
<script type="text/javascript" src="/static/js/layer/laytpl.js"></script>
<script type="text/javascript" src="/static/js/app_special.js"></script>
<style>
  .video-list img{width:400px!important;height:230px!important;}
  .video-list li{margin-left:0px!important;padding-bottom:0px!important;}
  .video-list li i{bottom:66px!important;left:16px!important;width:0px!important;height:0px!important;}
  .layui-layer-dialog{top:50%!important;margin-top:-230px!important;}
  .layui-layer-dialog .layui-layer-content{padding:0px!important;}
</style>
</head>
<body>
<div id="bg">
<div id="container" class="clearfix">
	<div class="banner"></div>
	<div id="main">
		<div class="nav">
			<ul class="clearfix">
				<li class="one"><a href="<?php echo ($special['url']); ?>">专题首页</a></li>
				
				<?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i; if(3==$t['typeid']) {?>
                        <li><a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=6');?>">视频报道</a></li>
                    <?php } ?>
				<?php if($t['hide']==1) continue; ?>
				<li<?php if($typeid==$t['typeid']) echo ' class="cur"';?>>
					<a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid='.$t['typeid']);?>"><?php echo ($t['name']); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			
			</ul>
		</div>
		
<div class="clearfix" style="margin:20px 20px 0px;">
	<div class="main_left">
    	<div class="left_top">
            <div class="ntb"><?php echo ($typename); ?></div>
            <div class="txt">2022<span>NPC&CPPCC</span></div>
        </div>
        <div class="left_mp">
		<?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['hide']==1) continue; ?>
		<a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid='.$v['typeid']);?>" <?php if($typeid == $v['typeid']): ?>class="get"<?php endif; ?> ><?php echo ($v['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=6');?>">视频报道</a>
		</div>
    </div>
    	
    <div class="main_right">
    	<ul>        	
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><li >
            	<!--<?php if(!empty($r['thumbnail'])): ?><div class="right_img">
				<img src="<?php echo thumb($r['thumbnail'],275,155);?>" /> 
				</div><?php endif; ?>-->
                <div class="right_txt big_txt">
                	<div class="txt_t"><a href="<?php echo ($r['url']); ?>" target="_blank"><?php echo ($r[title]); ?></a></div>
					<?php if($r['description'] != '') { ?>
                    <div class="txt_c"><?php echo msubstr($r['description'],0,160);?></div>
					<?php } ?>
                    <p style="color:#aaa;"><?php echo date('Y-m-d',$r['save_time']);?></p>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
			<li style="clear:both;"></li>
        </ul>
        <div class="pages clearfix"><?php echo ($pages); ?></div>
    </div>
</div>

	</div>
	
	<div class="footer">
	<a href="http://www.tongwei.com" target="_blank" class="footer-logo"><img src="/skins/2021lianghui/logo.png" /></a>
	通威集团有限公司 @ 2022 TONGWEI 版权所有　　蜀ICP备05002048号　　总部地址：四川省成都市高新区天府大道中段588号通威国际中心　电话：028-85188888
	</div>
	<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</div>
</div>
</body>
<html>