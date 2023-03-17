<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/Special/extend/2018lianghui/base.php" />
<block name="main">

<div class="index-1 clearfix">
	<a name="news"></a>
	<div class="left" style="width:730px">
		<div class="title-wrap"><span class="more"><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=1')-}" target="_blank">更多</a></span><h2><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=1')-}" target="_blank">图文直击</a></h2></div>
		<ul class="index-news">
		<php>$ids = array();</php>
		<sql sql="select * from h_special_content where FIND_IN_SET('s',attr) and a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 1">
		<php>$styleArr=explode('|',$values['style']);$style=$styleArr[2]?' style="font-size:'.$styleArr[2].'px;"':'';</php>
		<li class="top"><span class="date">{-:date('Y-m-d',$values['save_time'])-}</span><a href="{-$values['url']-}" target="_blank"{-$style-}>{-:($values['title_hot']?$values['title_hot']:($values['title_short']?$values['title_short']:$values['title']))-}</a></li>
		<php>$ids[]=$values['id'];</php>
		</sql>
		<php>$idsStr = implode(',',$ids);</php>
		<sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} and id not in({$idsStr}) order by sort desc,id desc limit 6">
		<li><span class="date">{-:date('Y-m-d',$values['save_time'])-}</span><a href="{-$values['url']-}" target="_blank">{-$values.title-}</a></li>
		</sql>
		</ul>
		
		<div class="title-wrap" style="margin-top:15px"><span class="more"><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=5')-}" target="_blank">更多</a></span><h2><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=5')-}" target="_blank">往期回顾</a></h2></div>
		<ul class="index-news">
		<sql sql="select * from h_special_content where a_status=1 and typeid=5 and specialid={$specialid} order by sort desc,id desc limit 6">
		<li><span class="date">{-:date('Y-m-d',$values['save_time'])-}</span><a href="{-$values['url']-}" target="_blank">{-$values.title-}</a></li>
		</sql>
		</ul>
	</div>
	
	<a name="proposal"></a>
	<div class="right" style="width:400px">
		<div class="title-wrap"><span class="more"><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=2')-}" target="_blank">更多</a></span><h2><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=2')-}" target="_blank">提案议案</a></h2></div>
		<ul class="index-proposal">
		<sql sql="select * from h_special_content where a_status=1 and typeid=2 and specialid={$specialid} order by sort desc,id desc limit 6">
		<li class="clearfix">
			<i>{-:sprintf("%02d",$i)-}</i>
			<div class="info">
			<a href="{-$values['url']-}" target="_blank">{-:($values['title_short']?$values['title_short']:$values['title'])-}</a>
			<p>{-:msubstr($values['description'],0,100)-}</p>
			</div>
		</li>
		</sql>		
		</ul>
	</div>
</div>

<div class="index-1 big-pics-show clearfix">
	<div class="big-pics-show-bd">
		<ul class="clearfix">
			<sql sql="select * from h_special_content where a_status=1 and typeid=4 and specialid={$specialid} order by sort desc,id desc limit 20">
			<li><img src="{-$values['thumbnail']|thumb=###,580,326,1-}" alt="{-$values.title-}"></li>
			</sql>	
		</ul>
		<a class="prev-btn iconfont icon-left"></a>
		<a class="next-btn iconfont icon-right"></a>
	</div>
	<div class="big-pics-show-hd"></div>	
</div>
<script>
$(".big-pics-show").slide({mainCell:".big-pics-show-bd ul",titCell:".big-pics-show-hd",effect:"left",autoPlay:true,delayTime:500,interTime:5000,autoPage:"<a></a>",titOnClassName:"cur",prevCell:".prev-btn",nextCell:".next-btn",vis:2});
</script>

<a name="media"></a>
<div class="index-3 media-news clearfix">
	<div class="title-wrap"><span class="more"><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=3')-}" target="_blank">更多</a></span><h2><a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=3')-}" target="_blank">媒体聚焦</a></h2></div>
	<div class="left media-pics">
		<ul class="bd">
			<sql sql="select * from h_special_content where FIND_IN_SET('h',attr) and a_status=1 and typeid=3 and specialid={$specialid} order by sort desc,id desc limit 4">
			<li <if condition="$key%2 eq 0">style="margin-left:0"</if>><a href="{-$values['url']-}" target="_blank"><img src="{-$values['thumbnail']|thumb=###,275,155,1-}" alt="{-$values.title-}"><br>{-$values.title-}</a></li>
			</sql>				
		</ul>
	</div>
	
	<div class="right media-news-article">
	<ul>
		<sql sql="select * from h_special_content where FIND_IN_SET('j',attr) and a_status=1 and typeid=3 and specialid={$specialid} order by sort desc,id desc limit 10">
		<li><span class="media">{-$values.source-}</span><a href="{-$values['url']-}" target="_blank">{-$values.title-}</a></li>
		</sql>			
	</ul>
	</div>
</div>

</block>