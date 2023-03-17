<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />

<div style="border:1px solid #FFBE7A; background:#FFFCED;padding:10px;">
	<strong>{-$paper.title-}</strong> &nbsp; <a href="{-:U('paperlist/add', 'pid='.$paper['id'])-}" class="operate">新增期号</a>
					&nbsp; <a href="{-:U('paperlist/index', 'pid='.$paper['id'])-}" class="operate">期号列表</a>
					&nbsp; -> &nbsp; <strong style="color:red">{-$paperList.title-}</strong>
					&nbsp; <a href="{-:U('paperlist/layout', array('pid'=>$pid, 'lid'=>$lid))-}" class="operate">添加版面</a>
					&nbsp; <a href="{-:U('paperlist/layoutlist', array('pid'=>$pid, 'lid'=>$lid))-}" class="operate">版面管理</a>
</div>
<style>
.layoutlist li{float: left; width: 120px; margin-right: 20px; margin-top: 20px; border:1px solid #f1f1f1; padding:10px}
.layoutlist li p{padding: 5px 0px;}
.layoutlist li img{border:1px solid #f1f1f1;}
.layoutlist li:hover img{box-shadow: 0px 0px 3px #dedede;}
</style>
<ul class="clearfix layoutlist">
<volist name="paperLayoutList" id="vo">
	<li>
	<p><img src="{-$vo.thumbnail-}" width="120"></p>
	<p>版面编号：{-$vo.layout_number-}</p>
	<p>版面名称：{-$vo.layout_title-}</p>
	<p>执行编辑：{-$vo.executive_editor-}</p>
	<p><a href="{-:U('content?pid='.$pid.'&lid='.$lid.'&id='.$vo['id'])-}" class="sub left" target="_blank">内容关联</a> <a href="{-:U('layout?pid='.$pid.'&lid='.$lid.'&id='.$vo['id'])-}" class="sub right">修改</a></p>
	</li>	
</volist>
</ul>
<include file="./Core/App/Tpl/global_footer.php" />