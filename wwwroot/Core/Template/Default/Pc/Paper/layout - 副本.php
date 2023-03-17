<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="php">
<php>$navigate = $NAV['22'];</php>
</block>
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head">
<link media="all" rel="stylesheet" href="__PUBLIC__/twnew/css/font_326879_xr9h6v4dxaud6lxr.css">
<link rel="stylesheet" href="__PUBLIC__/twnew/css/papers.css">
</block>

<block name="main">
<div id="mainContent" >
	<div class="right slogan-bg">
	    <div class="content_tit" style="display:block;">
		  <php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>		
		<a href="/paper/{-$paper.id-}.html" class="">{-$paper.title-}</a> > <a href="{-$paperList.url-}" class="">{-$paperList.title-}</a> > {-$layout.layout_number-}：{-$layout.layout_title-}
		</span>
		<div id="paperList" style="float:right; position:relative">
			<span id="paperListTitle">分期查看 <i class="iconfont icon-down"></i></span>
			<div id="paperListContent" style="position:absolute">
				<div id="paperListContent-t">
				<ul>		
				</ul>
				</div>
				<ul id="paperListContent-c" class="clearfix">			
				</ul>
			</div>
		</div>		
		  
		</div>
		<div class="content clearfix">	 
	
		<php>
	      $zoom = 0.7;
		  $content = json_decode($layout['content'],true);
		</php>
		    
          <div id="paperLeft" clas="left1 clearfix" style="float: left;margin-bottom:50px; position: relative;clear:both;">
			<div id="paperPic" style="position:relative;border:1px solid #f1f1f1;  z-index: 8; width: 469px;">
				<img src="{-$layout.thumbnail-}" style="position: relative; z-index: 9" usemap="#paperPic">		
				<volist name="content" id="vo">
				<php>
				$mapInfo =explode(',', $vo['areaMapInfo']);
				$width = $mapInfo[2] - $mapInfo[0];
				$height = $mapInfo[3] - $mapInfo[1];
				$left = $mapInfo[0];
				$top = $mapInfo[1];			
				$width = $width * $zoom;
				$height = $height * $zoom;
				$left = $left * $zoom;
				$top = $top * $zoom;
				</php>
				<a class="positionBg" rel="{-$key-}" href="{-$vo.areaLink-}" title="{-$vo.areaTitle-}" style="width:{-$width-}px;height:{-$height-}px;left:{-$left-}px;top:{-$top-}px"></a>
				</volist>	
			</div>
			
			<a href="{-$prev.url-}" class="p-btn prev-btn " title="上一版">上一版</a>
			<a href="{-$next.url-}" class="p-btn next-btn " title="下一版">下一版</a>
		</div>		

		<div class="left1 paperTitle">
		<table style="margin-bottom:20px;" width="100%" cellpadding="0" cellspacing="0" border="0"><tr>
		<td valign="top">
		<ul id="paperTitle" style="border:1px solid #f1f1f1;">
		<li style="background: url(/static/img/banner.png) no-repeat left center;color:#FFF">{-$layout.layout_number-}：{-$layout.layout_title-}</li>
		<volist name="content" id="vo">
			<li class="titleBg <if condition="$key%2 eq 0">two</if>" rel="{-$key-}"><a href="{-$vo.areaLink-}" >{-$vo.areaTitle-}</a></li>
		</volist>
		</ul>
		</td>	
		</tr>
		</table>
		
		<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr>		
		
		<td width="200" valign="top">
		<ul id="layoutlist" style="border:1px solid #f1f1f1;">
		<li style="background: url(/static/img/banner.png) no-repeat left center;color:#FFF">本期版面导航</li>
		<volist name="layouts" id="vo">
			<li class="titleBg <if condition="$key%2 eq 0">two</if> <if condition="$layoutid eq $vo['id']">hover</if>" rel="{-$key-}"><a href="{-$vo.url-}">{-$vo.layout_number-}：{-$vo.layout_title-}</a></li>
		</volist>
		</ul>
		</td>		
		
		</tr>
		</table>		
		</div> 
			
		<div style="clear:both;"></div>	
		</div>
	</div>
	
	<div class="left ">		
		<include file="./Core/Template/Default/Pc/side.php" />
	</div>
	
	<div style="clear:both;"></div>
</div>
<php>		
$year = date('Y',$paperList['create_time']);
</php>
<script>
var year = {-$year-};
var isList = 0;
var pid = {-$pid-};
$(function(){	
	$('#paperListTitle').click(function(){
		if( $('#paperListContent').is(":hidden") ){
			$('#paperListContent').show();
			$('#paperListTitle').addClass('hover').find('i').addClass('icon-guanbi').removeClass('icon-down');
			if(isList==0) getList(pid,year); isList = 1;
			if( $('#paperLayout').is(":hidden") ){	
			
			}else{
				$('#paperLayout').hide();				
			}
		}else{
			$('#paperListContent').hide();
			$('#paperListTitle').removeClass('hover').find('i').addClass('icon-down').removeClass('icon-guanbi');
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


$('#paperPic .positionBg,#paperTitle .titleBg').hover(function(){
	var index = $(this).attr('rel');
	positionBg(index);
	titleBg(index);
},function(){
	$('#paperPic').find('.positionBg').removeClass('hover');
	$('#paperTitle').find('.titleBg').removeClass('hover');
});
$(function(){
	var _h = $('#paperPic').find('img').width();
	 $('#paperPic').width(_h);
	 $('#paperPic').find('img').css({'width':'100%'});
	var _w = 389;

	$('.paperTitle').css({'width': _w + 'px' });
})
function positionBg(i){
	$('#paperPic').find('.positionBg').removeClass('hover');
	$('#paperPic').find('.positionBg[rel="'+i+'"]').addClass('hover');
}
function titleBg(i){	
	$('#paperTitle').find('.titleBg').removeClass('hover');
	$('#paperTitle').find('.titleBg[rel="'+i+'"]').addClass('hover');
}
</script>
</block>