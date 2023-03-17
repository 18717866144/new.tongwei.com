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
    <script type="text/javascript" src="__PUBLIC__/twnew/js/jquery.qrcode.min.js"></script>
</block>

<block name="main">
<style>
.positionBg{background:none; border:2px solid none;z-index:10;display:block;position:absolute;}
a.positionBg.hover,a.positionBg:hover{background: rgba(0,153,204,.3);border:2px solid red;}
#paperPic img{width:100%}
</style>
<div id="mainContent" >
	<div class="right2 slogan-bg">
	    <div class="content_tit">
		  <php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>	
         <a href="{-$navigate['url']-}" class="top-link">{-$navigate['navigate_name']-}</a>
		<span style="font-size: 14px; margin-left:20px">			  
		<a href="/paper/{-$paper.id-}.html" class="">{-$paper.title-}</a> > <a href="{-$paperList.url-}" class="">{-$paperList.title-}</a> > {-$layout.layout_number-}：{-$layout.layout_title-}
		</span>
		<div id="paperList" style="float:right; position:relative;width: 20%;">
            <!--<div style="float: left;">
                <em style="display: inline-block;float: left;font-style: normal;font-size:14px;color:#333; ">分享：</em>
                    <i class="bdsharebuttonbox" style="display: inline-block;
    padding-top: 5px;">
                        <a class="bds_weixin" title="分享到微信" href="javascript:;" data-cmd="weixin" style="font-size: 14px;"></a>
                </i>
                <div class="clearfix"></div>
            </div>-->
            <div style="float: left;">
                <span style="display: inline-block;float: left;font-style: normal;font-size:14px;color:#333; ">分享到</span>&nbsp;
                <i class="layui-icon layui-icon-login-wechat" id="wx_sharea" style="color: #51c232;font-size: 20px;"></i>
            </div>
			<span id="paperListTitle">分期查看 <i class="iconfont icon-down"></i></span>
			<div id="paperListContent" style="position:absolute;top:42px;">
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

        <div class="left1">		
		
		<div id="paperPic" style="position:relative; border:1px solid #f1f1f1;z-index: 8; width: 348px;">
			<php>$zoom =  350/667;$content = json_decode($layout['content'],true);</php>
			<img src="{-$layout.thumbnail-}" style="position: relative; z-index: 9" usemap="#paperPic">		
			<volist name="content" id="vo">
			<php>
			$mapInfo =explode(',', $vo['areaMapInfo']);
			$width = $mapInfo[2] - $mapInfo[0];
			$height = $mapInfo[3] - $mapInfo[1];
			$left = $mapInfo[0];
			$top = $mapInfo[1];	
					
			$width = round($width * $zoom);
			$height = round($height * $zoom);
			$left = round($left * $zoom);
			$top = round($top * $zoom);
			</php>
			<a class="positionBg" rel="{-$key-}" href="{-$vo.areaLink-}" title="{-$vo.areaTitle-}" style="width:{-$width-}px;height:{-$height-}px;left:{-$left-}px;top:{-$top-}px"></a>
			</volist>	
		</div>
		<div class="clearfix" style="padding: 20px 0px; line-height: 20px;">
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td width="33%" align="center"><a href="{-$prev.url-}">上一版</a></td>
				<td width="33%" align="center">{-$layout.layout_number-}：{-$layout.layout_title-}</td>
				<td width="33%" align="center"><a href="{-$next.url-}">下一版</a></td>
			</tr>
			</table>
		</div>
	</div>		
	
		<div class="right1">
		<if condition="$preview eq 1">
		<div style="padding:15px; text-align:center;font-size:22px;background:#C5EDEC;border:1px solid #f00;">该页面现为预览地址，不能作为正式页面访问，请到后台更改内容发布设置。</div>
		</if>
		<notempty name="currentData.title_top"><h2 class="title-top">{-$currentData['title_top']-}</h2></notempty>
		<h1 class="title">{-$currentData['title_content']?$currentData['title_content']:$currentData['title']-}</h1>
		<notempty name="currentData.title_bottom"><h3 class="title-bottom">{-$currentData['title_bottom']-}</h3></notempty>
		<div class="content-info">
        	{-:date('Y年m月d日',$currentData['save_time'])-}　<notempty name="currentData['source']">来源：<notempty name="currentData['sourceurl']"><a href="{-$currentData['sourceurl']-}" target="_blank">{-$currentData['source']-}</a><else/>{-$currentData['source']-}</notempty></notempty> &nbsp; <notempty name="currentData['author']">作者：{-$currentData['author']-}</notempty>　<span id="hits"></span>
		</div>
		
		<div class="content clearfix" style="min-height:409px;">			
			{-$currentData.content-}
		</div>
		
		<div class="content-info-b clearfix">
			<div class="content-info-c" style="float:left;">
				<div class="editor"></div>
				<!--<div class="bdsharebuttonbox" style="margin-left:0px;"><a  style="background: none; padding: 0;font-size: 14px">分享：</a><a class="bds_people" title="分享到人民微博" href="javascript:;" data-cmd="people"></a><a class="bds_weixin" title="分享到微信" href="javascript:;" data-cmd="weixin"></a><a class="bds_tsina" title="分享到新浪微博" href="javascript:;" data-cmd="tsina"></a><a class="bds_tqq" title="分享到腾讯微博" href="javascript:;" data-cmd="tqq"></a><a class="bds_tfh" title="分享到凤凰微博" href="javascript:;" data-cmd="tfh"></a><a class="bds_iguba" title="分享到股吧" href="javascript:;" data-cmd="iguba"></a><a class="bds_more" href="javascript:;" tangram_guid="TANGRAM_322" data-cmd="more"></a>
                </div>-->
                <div style="width:100%;margin:1rem 0 2rem;text-align:right;">
                    <span style="height:24px;display:inline-block;line-height:24px;color:#888;font-size:12px;">分享到</span>&nbsp;
                    <i class="layui-icon layui-icon-login-wechat" id="wx_share" style="color: #51c232;font-size: 20px;"></i>
                </div>
                <div id="tanchu" style="display:none;width:310px;padding:40px 0px;background:#fff;">
                    <p style="text-align:center;font-size:13px;height:30px;line-height:30px;margin-bottom:10px;">微信扫一扫，分享到朋友圈</p>
                    <div class="erweima" style="text-align:center;"></div>
                </div>
			</div>
		</div>
		
		<content type="relevant" limit="8" order="id DESC" mid="1">
		<?php if($i==1){  $count = count($data);?>
		<div class="associated">
			<h4>延伸阅读</h4>
			<ul class="news-list">
		<?php }?>
				<li>
					<div class="news-list-title"><a href="{-$values.url-}">{-$values.a_title-}</a></div>
					<p class="news-list-des">{-$values.description-}</p>
					<div class="news-list-info">
						<div class="updatetime"><i class="iconfont icon-time"></i>{-:date('Y年m月d日',$currentData['save_time'])-}</div>
						<div class="views"></div>
					</div>
				</li>
		<?php if($i==$count){?>
			</ul>
		</div>
		<?php }?>
		</content>		
	</div>		
	
	<div style="clear:both;"></div>		
	</div>
	</div>	
	
</div>
<php>		
$year = date('Y',$paperList['create_time']);
</php>
<script>
var year = {-$year-};
var isList = 0;
var pid = {-$pid-};
$(function(){
	$.post('<?php echo U('Paper/content_u_f');?>',{f:'click',id:<?php echo $currentData['id'];?>});
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


/*window._bd_share_config = {
    common : {
        bdText : '{-$currentData[\'title_content\']?$currentData[\'title_content\']:$currentData[\'title\']-}',
        bdDesc : '',
        bdUrl : 'https://www.tongwei.com{-$paperList.url-}',
        bdPic : ''
    },
    share : [{
        "bdSize" : 14
    }],
}
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='/Public/twnew/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];*/
</script>

    <script>

        layui.use(['layer'], function(){
            var $ = layui.jquery,
                layer = layui.layer;

            $('#wx_sharea').click(function(){

                layer.open({
                    type:1,
                    title:false,
                    btn:false,
                    closeBtn:true,
                    content:$('#tanchu')

                });


            });

            $('#wx_share').click(function(){

                layer.open({
                    type:1,
                    title:false,
                    btn:false,
                    closeBtn:true,
                    content:$('#tanchu')

                });


            });


        });


        $('#tanchu .erweima').qrcode({
            render: "canvas",
            width: 200,
            height: 200,
            text: <?php echo strpos($currentData['url'],'http://')!==false?'"'.$currentData['url'].'"':'"http://'.$_SERVER['HTTP_HOST'].$currentData['url'].'"';?>
        });

    </script>
</block>