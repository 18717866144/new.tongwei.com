<?php defined('HX_CMS') or exit;?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
<meta name="keywords" content="{-$special['title']-}">
<meta name="description" content="{-$special['description']-}">
<link rel="stylesheet" type="text/css" href="/skins/2016lianghui/css/style.css">
<script type="text/javascript" src="/static/js/jquery.js"></script>  
<script language="JavaScript" src="/static/js/jquery.SuperSlide.js"></script>     
</head>
<body>
<div class="banner"></div>
<div class="nav">
	<div class="wrap">
    	<a href="{-$special.url-}">首页</a>
        <volist name="type" id="r">
       		<a href="{-:U('modules/special/lists',array('specialid'=>$specialid,'typeid'=>$r['typeid']))-}" <if condition="$typeid eq $r['typeid']"> class="act"</if> >{-$r['name']-}</a>
       	</volist> 
    </div>
</div>

<div class="main clearfix" style="margin-top: 20px;">
	<div class="main_left">
    	<div class="left_top">
            <div class="ntb">{-$typename-}</div>
            <div class="txt">2016<span>NPC&CPPCC</span></div>
        </div>
        <div class="left_mp">
		<volist name="type" id="v">
		<a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid='.$v['typeid'])-}" <if condition="$typeid eq $v['typeid']">class="get"</if> >{-$v['name']-}</a>
		</volist>
		</div>
    </div>
    	
    <div class="main_right">
    	<h2 class="title-top">{-$currentData['title_top']-}</h2>
		<h1 class="title">{-$currentData['title']-}</h1>
		<h3 class="title-bottom">{-$currentData['title_bottom']-}</h3>
		<div class="content-info">			 
        	{-:date('Y年m月d日',$currentData['save_time'])-}　<notempty name="currentData['source']">来源：<notempty name="currentData['sourceurl']"><a href="{-$currentData['sourceurl']-}" target="_blank">{-$currentData['source']-}</a><else/>{-$currentData['source']-}</notempty></notempty> &nbsp; <notempty name="currentData['author']">作者：{-$currentData['author']-}</notempty>
		</div>
		
		<div class="content clearfix">
			{-$currentData.content-}
		</div>
    </div>

</div>

<div class="botton">
	<div class="bot_wap">
    	<img src="/skins/2016lianghui/images/logo.png" />
        <div class="bot_a"><a href="http://www.tongwei.com" target="_blank">通威集团</a><a href="http://www.tongwei.com.cn" target="_blank">通威股份</a><a href="http://www.tongwei.cn" target="_blank">通心粉社区</a></div>
    </div>
</div>			
<script>
$(".banner_pos").slide({mainCell:".banner_con ul",titCell:".banner_bar",effect:"left",autoPlay:true,delayTime:500,interTime:3000,autoPage:'<a></a>',titOnClassName:'cur',prevCell:'.baner_left',nextCell:'.baner_right'});
$(".left_cen").slide({mainCell:".img_list ul",effect:"left",autoPlay:true,delayTime:500,interTime:3000,autoPage:false,prevCell:'#toLeft',nextCell:'#toRight'});
</script>
<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</body>
<html>