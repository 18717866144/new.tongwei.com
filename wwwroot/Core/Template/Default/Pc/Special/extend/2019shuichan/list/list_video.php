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
	<div class="video clearfix">
    	<ul>
        	<volist name="list" id="r">
			<li>
				<a href="{-$r[url]-}" target="_blank">
					<img src="{-:thumb($r['thumbnail'],300,220,1)-}"  width="300" height="220" />
					<div class="video_info">
						<div class="video_t">{-$r[title]-}</div>
						<div class="video_img"><img src="/skins/2016lianghui/images/fdj5.png" width="35" height="35" /></div>
					</div>
				</a>
             </li>
             </volist>			
        </ul>
    </div>
	<div class="pages" style="padding-top: 0;">{-$pages-}</div>
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