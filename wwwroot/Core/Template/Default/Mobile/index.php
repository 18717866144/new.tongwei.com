<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />

<block name="header">
<header><!--style="background:#c90009; "-->
	<div class="logo">
	<a href="{-$Think.config.INSTALL_PATH-}/" title="{-$Think.config.web_name-}">	
	<img src="{-$Think.config.INSTALL_PATH-}/static/mobile/images/logo-ico-32.png">	
	</a>
	</div>
	<div class="title" style="text-align:center">
	通威集团
	</div>
	<div class="other js-trigger">
	<i class="iconfont icon-menu"></i>
	</div>
</header>
</block>

<block name="banner">
<div id="impression-slide" class="slide impression-slide">
	<ul class="slide-ul impression-slide-ul">
		<sql sql="select * from h_slide where type_id=2 and l_status=1 order by sort desc,id desc limit 5">
		<li><notempty name="values.url"><a href="{-$values.url-}" target="_blank"><img src="{-$values.picurl-}"></a><else/><img src="{-$values.picurl-}"></notempty></li>
		</sql>
	</ul>
	<ul class="slide-tit impression-slide-tit"></ul>
</div>
<script>
//通威印像图片轮播
TouchSlide({
    slideCell:'#impression-slide',
    titCell:'.impression-slide-tit',
    mainCell:'.impression-slide-ul',
    titOnClassName:'hover',
    effect:'leftLoop',
    autoPlay:true,
    interTime:5000,
    autoPage:'<li></li>'
 });
</script>
</block>

<block name="main">
<div class="wrap clearfix">
	<h2 class="st">集团快讯</h2>
	<ul class="news-list">
	<?php $noids=array(); ?>
	<?php if($_GET['preview']==999){ ?>
		<sql sql="select * from h_article where cid = 15 and FIND_IN_SET('h',attr) and (a_status=1 or a_status=4) AND is_delete=1 order by sort desc,id desc limit 1">
		<php>
		$style=explode('|',$values['style']);$style_size = $style[2]?'font-size:'.$style[2].'px':'';				
		if (!empty($style[0])) $style .= "color:{$style[0]};";
		if (!empty($style[1])) $style .= "font-weight:bold;";	
        	
		</php>
		<!--style="{-$style_size-}"-->
		<li class="headlines clearfix">
			<a href="/index.php{-$values['url']-}">			
			<p class="headlines-title" >{-$values['title_hot']?$values['title_hot']:$values['a_title']-}</p>
			<p class="headlines-img"><img src="{-$values['thumbnail']|thumb=###,512,200,1-}" alt="{-$values.a_title-}"></p>				
			</a>								
		</li>	
		<?php $noids[]=$values['id']; ?>
		</sql>
	<?php }else{ ?>
		<content limit="1" type="list" where="FIND_IN_SET('h',attr) and !FIND_IN_SET('d',attr)" cid="15" field="id,title,title_short,title_hot,style,save_time,url,description,thumbnail">
		<php>
		$style=explode('|',$values['style']);$style_size = $style[2]?'font-size:'.$style[2].'px':'';				
		if (!empty($style[0])) $style .= "color:{$style[0]};";
		if (!empty($style[1])) $style .= "font-weight:bold;";	
        $titles = explode('==',$values['title_hot']);			
		</php>
		 <!--style="{-$style_size-}"--> 
		<li class="headlines clearfix">
			<a href="/index.php{-$values['url']-}">				
			<p class="headlines-title" style="font-weight:bold;"><php>if($titles[1]){</php>{-$titles[0]-}<br/>{-$titles[1]-}<php>}else{</php>{-$titles[0]-}<php>}</php></p>
			<p class="headlines-img"><img src="{-$values['thumbnail']|thumb=###,512,280,1-}" alt="{-$values.a_title-}"></p>				
			</a>								
		</li>
		<?php $noids[]=$values['id']; ?>
		</content>
	<?php }?>
	
		<php>$noids_str = $noids?implode(',',$noids):'0';</php>
		<content limit="5" type="list" where="id not in({$noids_str}) and !FIND_IN_SET('d',attr)" cid="15" field="id,title,title_short,style,save_time,url,description,thumbnail">
		<li>
			<a href="/index.php{-$values['url']-}" class="headlines-pic">
				<div class="news-list-t clearfix">
				   <!--
					<notempty name="values['thumbnail']">					
					<div class="news-list-img">
						<img src="{-:thumb($values['thumbnail'],300,195,true)-}">
					</div>
					</notempty> -->
					
					<div class="news-list-title">			
						{-$values.a_title-}
					</div>
				</div>
				<div class="news-list-other clearfix">{-:date('Y年m月d日',$values['save_time'])-}</div>
			</a>
		</li>
		</content>				
	</ul>
	<div style="padding:17px 0px; text-align:center"><a class="more-btn" href="{-$NAV[15]['url']-}">查看更多</a></div>
	<div style="width:100%;height:10px;background:#F1F1F1;"></div>
	
	<h2 class="st">媒体报道</h2>
	<ul class="news-list news-media-list">
		<?php $noids=array(); ?>
		<content limit="1" type="list" where="FIND_IN_SET('h',attr)" cid="18" field="id,title,title_short,title_hot,style,save_time,url,description,thumbnail,source_pic">
		<php>
		$style=explode('|',$values['style']);$style_size = $style[2]?'font-size:'.$style[2].'px':'';				
		if (!empty($style[0])) $style .= "color:{$style[0]};";
		if (!empty($style[1])) $style .= "font-weight:bold;";					
		</php>
		<!--style="{-$style_size-}"-->
		<li>
		<a href="{-$values['url']-}" class="headlines-pic">
			<div class="news-list-t clearfix">
				<notempty name="values['thumbnail']">
				<div class="news-list-img">
					<img src="{-:thumb($values['thumbnail'],300,195,true)-}">
				</div>
				</notempty>
				<div class="news-list-title" style="font-weight:700">			
					{-$values.a_title-}
				</div>
			</div>
			<div class="news-list-other clearfix">{-:date('Y年m月d日',$values['save_time'])-}</div>
		</a>
		</li>
		<?php $noids[]=$values['id']; ?>
		</content>
		<php>$noids_str = $noids?implode(',',$noids):'0';</php>
		<content limit="5" type="list" where="id not in({$noids_str})" cid="18" field="id,title,title_short,style,save_time,url,description,thumbnail">
		<li>
			<a href="{-$values['url']-}" class="headlines-pic">
				<div class="news-list-t clearfix">					
					<div class="news-list-title">			
						{-$values.a_title-}
					</div>
				</div>
				<div class="news-list-other clearfix">{-:date('Y年m月d日',$values['save_time'])-}</div>
			</a>
		</li>
		</content>		
	</ul>
	<div style="padding:17px 0px; text-align:center"><a class="more-btn" href="{-$NAV[18]['url']-}">查看更多</a></div>
	<div style="width:100%;height:10px;background:#F1F1F1;"></div>
</div>
</block>
