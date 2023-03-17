<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Mobile/base.php" />
<block name="php">
<php>$navigate = $NAV['22'];</php>
</block>
<block name="title"><title>{-$paper.title-}{-$paperList.title-} {-$layout.layout_number-}：{-$layout.layout_title-} - {-$Think.config.web_name_ext-}</title></block>
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
<!--<header>
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
</header>-->
</block>

<block name="snav">
<php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>
<div class="wrap snav">
	<ul>
	<li><a href="/paper/{-$paper.id-}.html" class="">{-$paper.title-}</a>
	</ul>	
</div>

<php>		
$year = date('Y',$paperList['create_time']);
</php>
<div class="paperlist" style="margin:10px 10px 0px;">
	<span id="paperListTitle">{-$paperList.title-} <i class="iconfont icon-down"></i>
		
	</span>
		
	<span id="paperLayoutTitle">{-$layout.layout_number-}：{-$layout.layout_title-} <i class="iconfont icon-down"></i>
		<div id="paperLayout" style="display: none">
			<ul>
			<volist name="layouts" id="vo">
				<li class="titleBg <if condition="$layoutid eq $vo['id']">hover</if>" rel="{-$key-}"><a href="{-$vo.url-}">{-$vo.layout_number-}：{-$vo.layout_title-}</a></li>
			</volist>
			</ul>
		</div>
	</span>
	
	<div id="paperListContent" style="display: none">
		<div id="paperListContent-t">
		<ul>		
		</ul>
		</div>
		<ul id="paperListContent-c" class="clearfix">			
		</ul>
	</div>
</div>
</block>

<block name="main">
<php>
$content = json_decode($layout['content'],true);
</php>
<div class="wrap clearfix" id="minHeight">
		<ul class="news-list">						
			<volist name="content" id="values">
			<li>
			<a href="{-$values['areaLink']-}" class="headlines-pic">
				<div class="news- -t clearfix">					
					<div class="news-list-title">			
						{-$values.areaTitle-}
					</div>
				</div>
				<div class="news-list-other clearfix">{-$layout.layout_number-}：{-$layout.layout_title-} &nbsp; &nbsp; {-:date('Y年m月d日',$paperList['save_time'])-}</div>
			</a>
			</li>
			</volist>
		</ul>
</div>
<script>
var year = {-$year-};
var isList = 0;
var pid = {-$pid-};
$(function(){ 	
	var $h = $(window).height();
	var $headerHeight = $('header').height();
	var $snavHeight = $('.snav').height();
	var $bottomHeight = $('footer').height();
	var _newHeight = $h-$headerHeight-$snavHeight-$bottomHeight-30;
	$('#minHeight').height(_newHeight);
	$('#paperLayoutTitle').click(function(){
		if( $('#paperListContent').is(":hidden") ){			
		}else{
			$('#paperListContent').hide();
		}
		$('#paperLayout').toggle();
	});
	$('#paperListTitle').click(function(){
		if( $('#paperListContent').is(":hidden") ){
			$('#paperListContent').show();
			if(isList==0) getList(pid,year); isList = 1;
			if( $('#paperLayout').is(":hidden") ){			
			}else{
				$('#paperLayout').hide();
			}
		}else{
			$('#paperListContent').hide();
		}
	});
	
	$('#paperListContent-t ul').delegate('li', 'click', function(event){
		var $o = $(this);
		var thisYear = $o.html();
		$o.parent().find('li').removeClass('hover');
		getList(pid,thisYear);
		event.stopPropagation();			
	});
	function getList(pid,year){
		$.ajax({
			url:'/index.php/paper/api/getPaperYear',
			data:{pid:pid, year:year},
			type:'POST',
			dataType:'json',
			boforeSend:function(){
				console.log('数据提交');
			},
			success:function(data){	
				$('#paperListContent-t ul').empty();
				$('#paperListContent-c').empty();
				$.each(data.data.yearList, function(idx, obj) {
					var classStr = year == obj ? ' class="hover" ' : '';
					$('#paperListContent-t ul').append('<li'+classStr+'>'+obj+'</li>');
				});
				$.each(data.data.paperList, function(idx, obj) {
					var classStr = year == obj ? ' class="hover" ' : '';
					$('#paperListContent-c').append('<li'+classStr+'><a href="'+obj.url+'">'+obj.title+'</a></li>');
				});
			},
			error:function(){
				console.log('发送数据至服务器失败！');
			}						
		});
	}	
});
</script>
</block>