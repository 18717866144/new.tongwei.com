<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/Special/extend/2018gfxz/base.php" />
<block name="main">
<div class="clearfix" style="margin:20px 20px 0px;">
	<div class="main_left">
    	<div class="left_top" style="height:28px;">
            <div class="ntb">{-$typename-}</div>
            <!-- <div class="txt">2018<span>NPC&CPPCC</span></div> -->
        </div>
        <div class="left_mp">
		<volist name="type" id="v">
		<php>if($v['hide']==1) break;</php>
		<a href="{-:U('modules/special/lists?specialid='.$specialid.'&typeid='.$v['typeid'])-}" <if condition="$typeid eq $v['typeid']">class="get"</if> >{-$v['name']-}</a>
		</volist>
		</div>
    </div>
    	
    <div class="main_right">
    	<ul>        	
			<volist name="list" id="r">
			<li <if condition="$i%2 eq 0">class="bg"</if>>
            	<notempty name="r['thumbnail']"><div class="right_img"><img src="{-:thumb($r['thumbnail'],275,155)-}" /></div></notempty>
                <div class="right_txt <empty name="r['thumbnail']">big_txt</empty>">
                	<div class="txt_t"><a href="{-$r['url']-}" target="_blank">{-$r[title]-}</a></div>
                    <div class="txt_c">{-:msubstr($r['description'],0,160)-}</div>
                    <p style="color:#aaa;font-size:12px;">{-:date('Y-m-d',$r['save_time'])-}</p>
                </div>
            </li>
			</volist>
        </ul>
        <div class="pages clearfix">{-$pages-}</div>
    </div>
</div>
</block>