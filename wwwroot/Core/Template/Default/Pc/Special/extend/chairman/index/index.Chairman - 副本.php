<?php defined('HX_CMS') or exit;?>
<!--<extend name="./Core/Template/Default/Pc/base_2019.php" />-->
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="title"><title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$special['title']-}"></block>
<block name="description"><meta name="description" content="{-$special['description']-}"></block>
<block name="head">
<link media="all" rel="stylesheet" href="http://at.alicdn.com/t/font_326879_xr9h6v4dxaud6lxr.css">
<link media="all" rel="stylesheet" href="{-$Think.config.INSTALL_PATH-}/static/css/special.chairman.css">
</block>


<block name="page_banner">
<div id="banner" style="background: url(/Uploads/2017/0929/3c2530b45e18d927dcad0faa5052aa69.jpg) no-repeat center center; height:220px; min-width:1200px;"></div>
</block>

<block name="main">
<div class="wrap">
	<div class="left1 show-left">
		
		<div class="special-news-top">
			<div class="title-1 special-title">
				<h2><i class="icon-special-news-top"></i><span style="display: none;">最新动态</span></h2>
				<span class="more"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>1))-}" target="_blank">+MORE</a></span>
			</div>
			
			<ul class="special-news-top-list clearfix">
				<sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 4">
				<if condition="$key eq 0">
				<li class="headlines clearfix">
					<a href="{-$values['url']-}" class="headlines-pic" target="_blank" style="background:url({-$values['thumbnail']-}) no-repeat center;background-size:100%;">
				</a>
					<div class="right-content">
						<a href="{-$values['url']-}" class="headlines-title" target="_blank">{-$values.title-}</a>
						<p style="text-align:justify;">{-:msubstr($values['description'],0,220)-}</p>
						<div class="news-list-info">					
							<div class="views left"></div>
							<div class="read-link right"><a href="{-$values['url']-}" target="_blank">阅读全文&gt;&gt;</a></div>
						</div>
					</div>		
				</li>
				<else/>
				<li class="lilines" <if condition="($key-1)%3 eq 0">style="margin-left:0;"</if> >					
					<a href="{-$values.url-}" style="{-$values.style_string-}"  target="_blank"><img src="{-$values['thumbnail']|thumb=###,260,190,1-}" alt="{-$values.title-}"><br>{-$values['title_short']?$values['title_short']:$values['title']-}</a>
				</li>
				</if>
				</sql>			
			</ul>	
			<div style="clear:both;"></div>
		</div>
		
		<div class="special-news-lianghui m-t-20">
			<div class="title-1 special-title" style="margin:20px 0px;">
				<h2><i class="icon-special-news-lianghui"></i><span style="display: none;">历界全国两会建言献策特别报道</span></h2>
				<span class="more"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>2))-}" target="_blank">+MORE</a></span>
			</div>
			
			<div class="lianghui-slide m-t-20">
				<ul class="hd">
					<sql sql="select * from h_special_content where FIND_IN_SET('h',attr) and a_status=1 and typeid=2 and specialid={$specialid} order by id desc,sort desc limit 5">
					<li><a href="{-$values['url']-}" target="_blank"><img src="{-$values['thumbnail']|thumb=###,820,400,1-}" width="820" height="400" /><em>{-$values.title-}</em></a></li>
					</sql>
				</ul>
				<ul class="bd slide-tit"></ul>
			</div>
			
			<ul class="special-news-media m-t-20 clearfix">				
				<sql sql="select * from h_special_content where FIND_IN_SET('j',attr) and a_status=1 and typeid=2 and specialid={$specialid} order by id desc,sort desc limit 8">
				<li><a href="{-$values['url']-}" target="_blank"><i class="icon-media"><img src="{-$values.source_pic-}" alt="{-$values.source-}"></i>{-$values.title-}</a></li>
				</sql>				
			</ul>
			<div style="clear:both;"></div>
		</div>
		
		<div class="special-video m-t-20">
			<div class="title-1 special-title">
				<h2><i class="icon-special-video"></i><span style="display: none;">视频专访</span></h2>
				<span class="more"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>3))-}" target="_blank">+MORE</a></span>
			</div>
			
			<ul class="special-video-list clearfix">
				<sql sql="select * from h_special_content where a_status=1 and typeid=3 and specialid={$specialid} order by id desc,sort desc limit 3">
				<li <if condition="$key%3 eq 0">style="margin-left: 0"</if> ><a href="{-$values.url-}" target="_blank"><img src="{-$values.thumbnail|thumb=###,260,185,1-}" alt="{-$values.a_title-}"><span>{-$values.title-}</span><i class="iconfont icon-play"></i></a></li>
				</sql>
			</ul>
		</div>
				
	</div>
	
	<div class="right1 show-right">		
		<div class="special-book-slide m-t-20">
			<ul class="hd">
				<li>
				<a href="/uploadfile/创变者逻辑.pdf" class="book-pic" target="_blank"><img src="/static/img/230x330-1.jpg"></a>
				<div class="desc">
				<i class="icon-yinyong-left"></i>
				<p>以十一届全国政协常委、全国人大代表、通威集团董事局主席刘汉元的企业经营思想形成过程为线索，对全球重要水产饲料企业和全球光伏新能源龙头企业通威集团成功发展的深层次逻辑，进行了系统研究和案例剖析，总结了刘主席的思想及方法论体系，具有广泛的启发意义和借鉴价值。</p>
				<i class="icon-yinyong-right"></i>
				</div>
				</li>
				<li>
				<a href="/uploadfile/重构大格局.pdf" class="book-pic" target="_blank"><img src="/static/img/230x330-2.jpg"></a>
				<div class="desc">
				<i class="icon-yinyong-left"></i>
				<p>本书通过对全球能源问题展开从微观到宏观，从理论到实践，从过去、现在到未来发展的全面讨论，展示出一个全新的能源与人类社会发展的大画面，揭示了人类社会发展的根本原动力是能源与能源革命这一主题。</p>
				<i class="icon-yinyong-right"></i>
				</div>
				</li>
			</ul>			
			<ul class="bd"></ul>
		</div>
		
		<div class="special-sayings m-t-20">
			<div class="title-1 special-title">
				<h2><i class="icon-special-sayings"></i><span style="display: none;">观点语录</span></h2>
				<span class="more"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>4))-}" target="_blank">+MORE</a></span>
			</div>
			<ul>
				<sql sql="select * from h_special_content where a_status=1 and typeid=4 and specialid={$specialid} order by sort desc,id desc limit 5">
				<li>{-$values.content|strip_tags-}<p>{-$values.description-}</p></li>			
				</sql>
			</ul>
		</div>
		<!--
		<div class="m-t-20"><a href="http://www.tongwei.cn/forum.php?mod=forumdisplay&fid=91" target="_blank"><img src="/static/img/tongxinfen.jpg"></a></div>
		<div class="m-t-20"><img src="/static/img/tupianji.jpg"></div>-->
	</div>
	
	<div style="clear:both;"></div>
</div>

<script>
$('.lianghui-slide').slide({ titCell:'.slide-tit', mainCell:'.hd', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, autoPage:'<li></li>' });
$('.special-book-slide').slide({ titCell:'.bd', mainCell:'.hd', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, autoPage:'<li></li>' });
</script>
</block>