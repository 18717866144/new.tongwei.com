<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/Special/extend/2019guangfu/base.php" />
<block name="main">
<div class="clearfix" style="margin:20px 20px 0px;">
	<div class="main_left">
    	<div class="left_top">
            <div class="ntb">{-$typename-}</div>
            <div class="txt">2018<span>NPC&CPPCC</span></div>
        </div>
        <div class="left_mp">
		<volist name="type" id="v">
		<php>if($v['hide']==1) break;</php>
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
</block>