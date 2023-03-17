<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"></block>

<block name="header">
<php>
$url = $_SERVER["HTTP_REFERER"];
if( strpos($url,'http://www.tongwei.com/') ===0 ){
	$backUrl = 'javascript:history.back();';
}else{
	$backUrl = '/';
}
</php>
<header>
	<div class="logo">
	<a href="{-$backUrl-}" title="{-$Think.config.web_name-}">
	<i class="iconfont icon-left"></i>
	<img src="{-$Think.config.INSTALL_PATH-}/static/mobile/images/logo-ico-32.png">	
	</a>
	</div>
	<div class="title" style="text-align:center">
	{-$navigate['navigate_name']-}
	</div>
	<div class="other js-trigger">
	<i class="iconfont icon-menu"></i>
	</div>
</header>
</block>

<block name="main">
<div class="wrap clearfix">
		<ul class="news-list">
			<php>$noids=array();</php>
			<if condition="$_GET['page'] lt 2">
			<content type="list" cid="{$cid}" cache="false" where="FIND_IN_SET('h',attr)" limit="1" field="id,cid,title,save_time,title_hot,style,click,url,description,thumbnail">
			<php>
				
				$titles = explode('==',$values['title_hot']);			
			</php>
			<li class="headlines clearfix">
				<a href="{-$values['url']-}">				
				<p class="headlines-title">{-$values['a_title']-}</p>
				<p class="headlines-img"><img src="{-$values['thumbnail']-}" alt="{-$values.a_title-}"></p>				
				</a>								
			</li>
			<?php $noids[]=$values['id']; ?>
			</content>
			</if>
			
			<php>$noids_str = $noids?implode(',',$noids):'0';</php>
			<content type="page" where="id not in({$noids_str})" cid="{$cid}" order="save_time desc" cache="false" limit="20" field="id,cid,title,save_time,style,click,url,description,thumbnail">
			<li>
			<a href="{-$values['url']-}" class="headlines-pic">
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
		<div class="pages clearfix">
		{-$page-}
		</div>
		<!--<div class="read-more" id="">阅读更多</div>-->
</div>
</block>