<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$special['title']-}"></block>
<block name="description"><meta name="description" content="{-$special['description']-}"></block>
<block name="head"><link media="all" rel="stylesheet" href="{-$Think.config.INSTALL_PATH-}/static/css/special.chairman.css"></block>

<block name="page_banner">
<div id="banner" style="background: url({-$special['banner']-}) no-repeat center center; height:195px; min-width:1200px;"></div>
</block>

<block name="main">
<div id="mainContent" >
	<div class="right show-left">
		<ul class="news-list">
				
			<volist name="list" id="values">
			
			<li class="news-block">			
			  <div class="date-block">
				<span class="day">{-:date('d日',$values['save_time'])-}</span><span class="month">{-:date('Y年m月',$values['save_time'])-} </span>
				<!-- <span class="year"></span> -->
        	  </div>
			  <div class="summary">            
	        	<div class="h1"><a href="{-$values['url']-}" target="_blank">{-$values.title-}</a></div>            
	        	<div class="h3">{-:msubstr(trim($values['description'],'　'),0,50)-}</div>   
	          </div>			
			</li>				
			
			</volist>
			
		</ul>	
		<div class="pages clearfix">
		{-$pages-}
		</div>	
		<!--<div class="read-more" id="">阅读更多</div>-->
	</div>
	
	<div class="left ">		
		<div class="left_nav">
		
			<a href="{-$special['url']-}" class="top-link" target="_blank">
		    <div class="nav_tit">{-$special['title']-}</div>
		   </a>

		    <ul>
			
			<volist name="type" id="v">	
             <a href="{-:U('modules/special/lists',array('specialid'=>$specialid,'typeid'=>$v['typeid']))-}" target="_blank">
			   <li class="<if condition="$v['typeid'] eq $typeid">active</if>">{-$v['name']-}</li>
		     </a>
			</volist>	
			
			</ul>		
		</div>
		
		<div class="m-t-20" style="margin-top:0px!important;">
			<a href="/special/1.html" target="_blank"><img style="width:100%;" src="/static/img/r1.jpg"></a>
		</div>
		<div class="m-t-20">
			<a href="http://z.tongwei.cn/special/specialid/88.html" target="_blank"><img style="width:100%;" src="/static/img/r2.jpg"></a>
		</div>
	</div>
	
	<div style="clear:both;"></div>
</div>
</block>