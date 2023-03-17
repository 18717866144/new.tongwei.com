<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/Special/extend/2022lianghui/base.php" />
<block name="main">
<div class="clearfix" style="margin:20px 20px 0px;">
	<div class="main_left">
    	<div class="left_top">
            <div class="ntb">{-$typename-}</div>
            <div class="txt">2022<span>NPC&CPPCC</span></div>
        </div>
        <div class="left_mp">
		<volist name="type" id="v">
		<php>if($v['hide']==1) continue;</php>
		<a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid='.$v['typeid'])-}" <if condition="$typeid eq $v['typeid']">class="get"</if> >{-$v['name']-}</a>
		</volist>
		<a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid=6')-}">视频报道</a>
		</div>
    </div>
    	
    <div class="main_right">
    	<ul>        	
			<volist name="list" id="r">
			<li >
            	<!--<notempty name="r['thumbnail']">
				<div class="right_img">
				<img src="{-:thumb($r['thumbnail'],275,155)-}" /> 
				</div></notempty>-->
                <div class="right_txt big_txt">
                	<div class="txt_t"><a href="{-$r['url']-}" target="_blank">{-$r[title]-}</a></div>
					<?php if($r['description'] != '') { ?>
                    <div class="txt_c">{-:msubstr($r['description'],0,160)-}</div>
					<?php } ?>
                    <p style="color:#aaa;">{-:date('Y-m-d',$r['save_time'])-}</p>
                </div>
            </li>
			</volist>
			<li style="clear:both;"></li>
        </ul>
        <div class="pages clearfix">{-$pages-}</div>
    </div>
</div>
</block>