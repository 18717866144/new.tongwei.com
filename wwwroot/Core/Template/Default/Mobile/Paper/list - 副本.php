<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="php">
<php>$navigate = $NAV['22'];</php>
</block>
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
	$backUrl = '/paper/'.$pid.'.html';
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
	{-$paper['title']-}
	</div>
	<div class="other js-trigger">
	<i class="iconfont icon-menu"></i>
	</div>
</header>
</block>


<block name="main">
<?php
$t=array();
if($maxtime && $mintime){
for($i=date('Y',$maxtime);$i>=date('Y',$mintime);$i--){
$t[] = $i;
}
}
?>
<div id="paperListContent-t">
<ul>
<volist name="t" id="r">
<li <if condition="$r eq $year">class="hover"</if>><a <if condition="$r eq $year">class="hover"</if> href="?year={-$r-}">{-$r-}</a></li>
</volist>	
</ul>
</div>
<div class="wrap m-t-10 clearfix" style="min-height: 500px;">
	<ul class="paper-list clearfix">
		<volist name="paperList" id="values">
		<li <if condition="$m%2 eq 0">style="margin-left:0"</if> >
		<a href="{-$values['url']-}" target="_blank" title="{-$paper.title-} {-$values.title-}">
			<div class="paper-border">
				<img src="{-$values.thumbnail|thumb=###,200,296,1-}" alt="{-$paper.title-} {-$values.title-}"</div>
			</div>
			<div class="paper-title">{-$values.title-}</div>
		</a>
		</li>
		<php>$m++;</php>
		</volist>
	</ul>
	
</div>
</block>