<?php defined('HX_CMS') or exit;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
<meta name="keywords" content="{$SEO['keyword']}">
<meta name="description" content="{$SEO['description']}">
<link media="all" rel="stylesheet" href="/skins/special/qywh/css/normalize.css">
<link media="all" rel="stylesheet" href="/skins/special/qywh/css/style.css">
<script type="text/javascript" src="/static/js/jquery.js"></script>
<script type="text/javascript" src="/static/js/jquery.SuperSlide.js"></script>
<script type="text/javascript" src="/static/js/layer/layer.js"></script>
<script type="text/javascript" src="/static/js/jquery.pin.js"></script>
<script type="text/javascript" src="/static/ckplayer/ckplayer.js"></script>
<body>
<div id="header">
	<div class="header"><img src="{-$special['banner']-}"></div>
</div>
<div class="w100" style="background:#F2F2F2;padding-bottom:15px;">
	<div class="warp nav">
		<a href="{-$special['url']-}">专题首页</a>|
		<volist name="type" id="t">
		<a href="#{-$t['typedir']-}">{-$t['name']-}</a>|
		</volist>
		<span class="right">
		<a href="http://www.tongwei.com" target="_blank">通威集团</a>|
		<a href="http://www.tongwei.com.cn" target="_blank">通威股份</a>|
		<a href="http://www.tongwei.cn" target="_blank">通心粉社区</a>
		</span>
	</div>

	<div class="warp m_t_10">
		<div class="left video">
			<div id="a1"></div>
			<script type="text/javascript">			
			var flashvars={ 
				f:'http://www.tongwei.com/uploadfile/files/2016qywh.mp4',	
				i:'http://www.tongwei.com/Skins/images/tw.jpg',
				c:0,v:100,h:3,p:1,
				my_url:encodeURIComponent(window.location.href),
				my_title:'通威集团企业文化专题片',
				my_pic:encodeURIComponent('http://www.tongwei.com/Skins/images/tw.jpg')
			};
			var video=['http://www.tongwei.com/uploadfile/files/2016qywh.mp4->video/mp4->video/mp4'];					
			var params={ bgcolor:'#000',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent' };
			CKobject.embed('/static/ckplayer/ckplayer.swf','a1','ckplayer_a1','569','360',false,flashvars,video,params);
			</script>
		</div>
		
		<div class="right desc">
			<div class="title1"><h2><i>活动介绍</i></h2></div>
			<div class="p">
				<p>　　根据通威发 [2016] 10 号文件精神，为配合“讲用活动”开展、展现通威人风采、推动文化落地、深入学习和理解刘主席及集团决策层管理思想、实现“融合、变革、创新”，并为员工提供一个展示自我和交流学习的平台，作为2016年企业文化建设工作的重要内容，在全集团范围举办通威集团2016年企业文化辩论大赛。</p>
				<p class="p_date"><span>时间</span>2016年11月2日</p>
				<p class="p_addr"><span>地点</span>通威国际中心 五楼国际会议中心</p>
			</div>
		</div>
	</div>
</div>

<div class="w100" style="background:#FFF;padding-bottom:15px;">
	<div class="warp">
		<div class="title2"><a name="{-$type[1]['typedir']-}"></a><h2><i>{-$type[1]['name']-}</i></h2></div>
		<div class="s_newstop left">
			<ul>
				<sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 8">
				<li <if condition="$key eq 0">class="topone"</if> ><a href="{-$values['url']-}" target="_blank">{-$values['title']-}</a></li>
				</sql>
			</ul>
		</div>
		<div class="s_newspic right">
			<div class="bd">
				<ul>
				<sql sql="select * from h_special_content where find_in_set('h',attr) and a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 5">
				<li><a href="{-$values['url']-}" target="_blank"><img src="{-:$values['thumbnail']-}" /><span>{-$values['title']-}</span></a></li>
				</sql>
				</ul>
			</div>
			<div class="hd"></div>
			<a class="slide_btn prev_btn iconfont icon-left"></a>
			<a class="slide_btn next_btn iconfont icon-right"></a>
		</div>
	</div>
</div>
<script>
$('.s_newspic').slide({mainCell:'.bd ul',titCell:'.hd',autoPage:'<a></a>',effect:'left',autoPlay:true,delayTime:500,interTime:3000,switchLoad:'_src',prevCell:'.prev_btn',nextCell:'.next_btn'}).hover(
	function(){
		$(this).find('.slide_btn').show();
	},
	function(){
		$(this).find('.slide_btn').hide();
	}
);
$('.nav').pin();
</script>

<div class="w100" style="background:#F2F2F2;padding-bottom:15px;">
	<div class="warp">
		<div class="title2"><a name="{-$type[2]['typedir']-}"></a><h2><i>{-$type[2]['name']-}</i></h2></div>
		<div class="s_pic clearfix">
			<div class="bd">
			<ul>
			<sql sql="select * from h_special_content where a_status=1 and typeid=2 and specialid={$specialid} order by sort desc,id desc limit 5">
			<li><img src="{-$values['thumbnail']-}" /></li>
			</sql>
			</ul>
			</div>
			<div class="hd"></div>
			<a class="slide_btn prev_btn iconfont icon-left"></a>
			<a class="slide_btn next_btn iconfont icon-right"></a>
		</div>
	</div>
</div>
<script>
$('.s_pic').slide({mainCell:'.bd ul',titCell:'.hd',autoPage:'<a>$</a>',effect:'left',autoPlay:true,delayTime:500,interTime:3000,switchLoad:'_src',prevCell:'.prev_btn',nextCell:'.next_btn',vis:2,scroll:2}).hover(
	function(){
		$(this).find('.slide_btn').show();
	},
	function(){
		$(this).find('.slide_btn').hide();
	}
);
</script>

<div class="w100" style="background:#FFF;padding-bottom:15px;">
	<div class="warp">
		<div class="title2"><a name="{-$type[3]['typedir']-}"></a><h2><i>{-$type[3]['name']-}</i></h2></div>
		<div class="s_piclist">
		<ul class="clearfix">
		<sql sql="select * from h_special_content where a_status=1 and typeid=3 and specialid={$specialid} order by sort desc,id desc limit 1">				
				<php>$pics = json_decode($values['pics']);</php>
				<?php foreach($pics as $v){ ?>
				<li><img src="{-:thumb($v[0],246,165)-}" layer-src="{-$v[0]-}" alt="{-$v[1]-}"/></li>
				<?php }?>				
		</sql>
		</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
layer.ready(function(){
  layer.photos({
    photos: '.s_piclist',
	anim: 5
  });
});
</script>

<div id="bottom" style="background: #051c36; line-height: 30px; color:#999; text-align: center; font-size: 12px;">
	<div style="width: 990px; margin: 0 auto">
		通威集团有限公司  TONGWEI 　蜀ICP备05002048号　　电话：028-85188888　　技术支持：通威传媒
	</div>
</div>
<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</body>
</html>