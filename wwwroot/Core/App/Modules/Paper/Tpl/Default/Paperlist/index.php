<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />

<div style="border:1px solid #FFBE7A; background:#FFFCED;padding:10px;">
	<strong>{-$paper.title-}</strong> &nbsp; <a href="{-:U('paperlist/add', 'pid='.$paper['id'])-}" class="operate">新增期号</a>
					&nbsp; <a href="{-:U('paperlist/index', 'pid='.$paper['id'])-}" class="operate">期号列表</a>
</div>

<table class="showTable" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr>
		<th width="20"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
        <th colspan="2">报刊信息</th>
	</tr>
	
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" dtoken="<?php echo Tool::encrypt($values['id'].$mr)?>" /> </td>
            <td width="180"><a href="{-$values['url']-}" target="_blank"><img src="{-$values.thumbnail-}" width="180" height="236" /></a></td>
            <td>
                <table width="100%" height="236">
				<tr>							
                <td valign="top">
                    <div style="font-size:14px; line-height:25px; border-bottom:1px solid #ededed;"><a href="{-$values['url']-}" target="_blank">{-$values.title-}</a></div>
                    <div style="font-size:12px; line-height:16px; margin-top:3px">{-$values.description-}</div>
                    <div style="font-size:12px;line-height:16px; margin-top:10px">创建时间：{-:date('Y-m-d H:i:s',$values['create_time'])-}</div>
                </td>
				</tr>
				
				<tr>
					<td style="border-bottom:0"  height="30">
					排序：<input name="sort[{-$values['id']-}]" class="text" tabindex="10" type="text" size="3" value="{-$values['sort']-}" />
					&nbsp; <a href="{-:U('edit',array('pid'=>$pid, 'id'=>$values['id']))-}" class="operate">编辑</a> 
					&nbsp; <a href="javascript:;" onclick="(_confirm('不可恢复，确定要删除？',function(){location.href='<?php echo U('delete',array('pid'=>$pid, 'id'=>$values['id'], 'mr'=>$mr, 'token'=>Tool::encrypt($values['id'].$mr),'list_page'=>$_GET['page']));?>'}))" class="operate">删除</a> |					
					&nbsp; <?php if($values['is_recommend'] == 1){ ?><span class=setRed>推荐</span><?php }else{ ?>普通<?php }?>
					&nbsp; <?php if($values['a_status'] == 1){ ?>发布<?php }else{ ?><span class="setRed">禁用<?php }?>
					&nbsp; | 
					&nbsp; <a href="{-:U('paperlist/content_all', array('pid'=>$pid, 'lid'=>$values['id']))-}" class="operate">全部内容</a>
					&nbsp; <a href="{-:U('paperlist/layoutlist', array('pid'=>$pid, 'lid'=>$values['id']))-}" class="operate">版面管理</a>
					&nbsp; <a href="{-:U('paperlist/layout', array('pid'=>$pid, 'lid'=>$values['id']))-}" class="operate">版面添加</a>
					<notempty name="layout">[&nbsp; 
					<volist name="layout" id="v">
						<a href="{-:U('paperlist/page', array('pid'=>$pid, 'lid'=>$values['id']))-}" class="operate">版面</a> &nbsp; 
					</volist>
					]</notempty>
					</td>
				</tr>
				</table>
            </td>
		</tr>
		</foreach>
	</notempty>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkTokenAction('<?php echo U('delete',array('mr'=>$mr,'list_page'=>$_GET['page']))?>','dtoken')});" class="sub" />
	<?php }?>    
</div>
<div class=""><?php echo $data[1]?></div>
<include file="./Core/App/Tpl/global_footer.php" />