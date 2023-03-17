<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />

<table class="showTable" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr>		
		<th width="20"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
        <th colspan="2">报刊类别</th>
	</tr>
	
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" dtoken="<?php echo Tool::encrypt($values['id'].$mr)?>" /> </td>
            <!--<td width="180"><a href="{-$values['url']-}" target="_blank"><img src="{-$values.thumbnail-}" width="180" height="236" /></a></td>-->
            <td>
                <table width="100%" height=" ">
				<tr>							
                <td valign="top">
                    <div style="font-size:18px; line-height:25px; border-bottom:1px solid #ededed;"><a href="{-$values['url']-}" target="_blank">{-$values.title-}</a></div>
                    <div style="font-size:12px; line-height:16px; margin-top:3px">{-$values.description-}</div>
                    <div style="font-size:12px; line-height:16px; margin-top:10px; color:#999">创建时间：{-:date('Y-m-d H:i:s',$values['create_time'])-}</div>
                </td>
				</tr>
				
				<tr>
					<td style="border-bottom:none;"  height="30">
					排序：<input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" />
					&nbsp; <a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a> 
					&nbsp; <a href="javascript:;" onclick="(_confirm('不可恢复，确定要删除？',function(){location.href='<?php echo U('delete',array('mr'=>$mr,'id'=>$values['id'],'token'=>Tool::encrypt($values['id'].$mr),'list_page'=>$_GET['page']))?>'}))" class="operate">删除</a> |					
					&nbsp; <?php if($values['is_recommend'] == 1){ ?><span class=setRed>推荐</span><?php }else{ ?>普通<?php }?>
					&nbsp; <?php if($values['a_status'] == 1){ ?>启用<?php }else{ ?><span class="setRed">未启用</span><?php }?>
					&nbsp; | 
					&nbsp; <a href="{-:U('paperlist/add', 'pid='.$values['id'])-}" class="operate">添加期号</a>
					&nbsp; <a href="{-:U('paperlist/index', 'pid='.$values['id'])-}" class="operate">期号列表</a>
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