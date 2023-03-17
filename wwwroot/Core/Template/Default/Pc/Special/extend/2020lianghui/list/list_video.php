<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/Special/extend/2020lianghui/base.php" />

<block name="main">

<div class="clearfix" style="margin:20px 20px 0px;">
	<div class="main_left">
    	<div class="left_top">
            <div class="ntb">{-$typename-}</div>
            <div class="txt">2020<span>NPC&CPPCC</span></div>
        </div>
        <div class="left_mp">
		<volist name="type" id="v">
		<php>if($v['hide']==1) continue;</php>
		<a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid='.$v['typeid'])-}" <if condition="$typeid eq $v['typeid']">class="get"</if> >{-$v['name']-}</a>
		</volist>
		<a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid='.$v['typeid'])-}" class="get">视频报道</a>
		</div>
    </div>
    	
    <div class="main_right">
    	
		<ul class="video-list clearfix">
		
		<sql sql="select * from h_special_content where a_status=1 and typeid=6 and specialid={$specialid} order by sort desc,id desc limit 50">
			<li data-video="{-$values['url']-}" style="width:402px;float:left;<php>if(($key+1)%2 !=0) echo 'margin-right:28px;';</php>">
				<a href="javascript:;">
					<img src="{-$values['thumbnail']-}" alt="">					
					<i class="iconfont icon-play"></i>
				</a>
			</li>
			
		</sql>	
			
		
		</ul>		
		
    </div>
	<script>
	 $('.video-list li').click(function(){
		var video = $(this).data('video');
		$.G.playVideo(video);
	});
	</script>
</div>
</block>