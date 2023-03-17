<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>搜索{-$q-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$keywords-}"></block>
<block name="description"><meta name="description" content="{-$keywords-}"></block>
<block name="head"><link rel="stylesheet" href="__PUBLIC__/twnew/css/search.css"></block>


<block name="page_banner">
<div id="banner" style="background:url('/Public/twnew/images/search_list.jpg') no-repeat center;"></div>
</block>
<block name="main">

<div id="mainContent" style="width:990px;min-height:440px;">
	<div class="right slogan-bg">
	    <div class="content_tit1">
		  <span class="top-link">内容搜索</span>
		  <span class="child-link">找到 <span style="color:#f00">{-$q-}</span> 相关内容共<span style="color:#f00"> {-$searchData[2]-}</span> 个	</span>
		</div>
		<div class="content clearfix">	 
	
		<notempty name="searchData[0]">
		<ul class="news-list clearfix">
		
		 <volist name="searchData[0]" id="values">
		   <li class="news-block">
			
			  <div class="date-block">
				<span class="day">{-:date('d日',$values['save_time'])-}</span><span class="month">{-:date('Y年m月',$values['save_time'])-}</span>				
        	  </div>
			  <div class="summary">            
	        	<div class="h1"><a href="{-$values['url']-}" target="_blank">{-:str_replace($q,'<span style="color:red">'.$q.'</span>',$values['title'])-}</a></div>            
	        	<div class="h3">{-$values['description']-}</div>   
	          </div>			
			
			</li>
		
			</volist>		
			
		</ul>
		
		<div class="pages clearfix">
		{-$searchData[1]-}
		</div>	
		
		<else />	
			<div style="width:300px;;float:left;">
			    <p style="margin-bottom:0px;margin-top:20px;">抱歉，没有找到相关内容！</p>
		    	<p>您可以更换或精简关键词再次搜索！</p>
			</div>
			<div style="float:left;">
			   <p style="margin-bottom:0px;margin-top:20px;">
				  <form action="/search" method="get" name="search" >				  
					<input type="text" name="q" class="ipt1" placeholder="输入关键词，回车搜索" autocomplete="on"/>
						
				  </form>	
				</p>
			</div>
		</notempty>	
			
		</div>
	</div>

	
	<div style="clear:both;"></div>
</div>
</block>