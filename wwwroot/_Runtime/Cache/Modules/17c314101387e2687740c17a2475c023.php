<?php if (!defined('THINK_PATH')) exit();?>﻿<?php defined('HX_CMS') or exit;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php echo ($special['title']); ?> - <?php echo (C("web_name")); ?> - <?php echo (C("web_name_ext")); ?></title>
<meta name="keywords" content="<?php echo ($special['title']); ?>">
<meta name="description" content="<?php echo ($special['description']); ?>">
<link rel="stylesheet" type="text/css" href="/skins/special/2022zhengwen/css/style.css">
<link type="text/css" href="/skins/special/2022zhengwen/css/stylewap.css" rel="stylesheet"/>
<script type="text/javascript" src="/static/js/jquery.js"></script>  
</head>
<body>

</head>
<body>
<div class="banner_zw" style="background:url(/skins/special/2022zhengwen/images/banner1.jpg) no-repeat center;background-size:1920px 311px;"></div>
<div class="bg">
    
    <div class="nav_zw">
		<div class="left">
		<a href="<?php echo ($special['url']); ?>" <?php if(!$typeid) echo ' class="home"'; ?> >活动首页</a>
		    
			<a href="<?php echo ($special['url']); ?>#1st">第一期作品</a>
		    <a href="<?php echo ($special['url']); ?>#2nd">第二期作品</a>
			<a href="<?php echo ($special['url']); ?>#3rd">第三期作品</a>
			<a href="<?php echo ($special['url']); ?>#4th">第四期作品</a>
		</div>
		<div class="right"><a target="_blank" href="https://www.tongwei.com/">网站首页</a></div>
	</div>
	
	
<div class="wrap clearfix">
    <!--
    <div class="lft_img">
	  <img src="/skins/special/2020zhengwen/2020zhengwen_1.jpg">
	</div>
	-->
    <div class="hdjj">
        <div class="zw_bt">活动简介<span>Activity profile</span></div>
        <div class="zw_hdjj">根据通威发〔2022〕6号文件《通威集团2022年企业文化建设工作实施方案》的通知精神，为进一步激发和坚定全体员工与企业共进步、同发展的信心和热情，展现通威人风采，推动文化落地，集团现正式启动2022年“标准引领，管理提升”主题征文活动，全体通威员工均可积极投稿参与。4-11月集团总共进行4期征文评选，每期评选出8篇优秀文章，纳入年度总评选范围，最终评出20篇优秀文章，并在年度企业文化收官活动上对获奖者给予表彰。同时，评选出的优秀征文，将在集团官网、《通威报》等开设专栏进行展示，并整理、编撰后，收录进2022年度通威集团企业文化征文汇编中。</div>
    </div>
    
</div>

<?php
 if(isset($_GET["act"]) && $_GET["act"] == "preview"){ ?>
 <?php } ?>
 <div class="show clearfix" id="4th">
    <div class="zw_bt">第四期作品展示<span>4th SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
					<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=4 and specialid='.($specialid).' order by sort desc,id desc limit 200', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html">
				<?php echo ($values['title']); ?>
				</a>
				</div>   
                <div class="h2"><?php echo ($values['author']); ?> / <?php echo ($values['source']); ?></div>				
	        	<div class="h3"><?php echo ($values['description']); ?></div>  
	          </div>			  			  
			</li><?php $i++; endforeach; endif; ;?>
			
        </ul>
    </div>
</div>
 

 
 <div class="show clearfix" id="3rd">
    <div class="zw_bt">第三期作品展示<span>3rd SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
					<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=3 and specialid='.($specialid).' order by sort desc,id desc limit 200', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html">
				<?php echo ($values['title']); ?>
				</a>
				</div>   
                <div class="h2"><?php echo ($values['author']); ?> / <?php echo ($values['source']); ?></div>				
	        	<div class="h3"><?php echo ($values['description']); ?></div>  
	          </div>			  			  
			</li><?php $i++; endforeach; endif; ;?>
			
        </ul>
    </div>
</div>


 
 <div class="show clearfix" id="2nd">
    <div class="zw_bt">第二期作品展示<span>2nd SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
					<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=2 and specialid='.($specialid).' order by sort desc,id desc limit 200', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html">
				<?php echo ($values['title']); ?>
				</a>
				</div>   
                <div class="h2"><?php echo ($values['author']); ?> / <?php echo ($values['source']); ?></div>				
	        	<div class="h3"><?php echo ($values['description']); ?></div>  
	          </div>			  			  
			</li><?php $i++; endforeach; endif; ;?>
			
        </ul>
    </div>
</div>


 <div class="show clearfix" id="1st">
    <div class="zw_bt">第一期作品展示<span>1ST SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
					<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=1 and specialid='.($specialid).' order by sort desc,id desc limit 200', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/<?php echo ($specialid); ?>/id/<?php echo ($values['id']); ?>.html">
				<?php echo ($values['title']); ?>
				</a>
				</div>   
                <div class="h2"><?php echo ($values['author']); ?> / <?php echo ($values['source']); ?></div>				
	        	<div class="h3"><?php echo ($values['description']); ?></div>  
	          </div>			  			  
			</li><?php $i++; endforeach; endif; ;?>
			
        </ul>
    </div>
</div>


<div style="text-align: center; line-height: 30px; padding: 20px 0px;"></div>

	
	<div id="bottom">
		<div style="width: 990px; margin: 0 auto">
			通威集团有限公司  TONGWEI 　蜀ICP备05002048号　　电话：028-85188888　　技术支持：通威集团有限公司
		</div>
	</div>
</div>

</body>
</html>