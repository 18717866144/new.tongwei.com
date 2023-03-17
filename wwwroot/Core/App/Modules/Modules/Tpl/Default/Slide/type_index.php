<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>		
		<th width="10%">排序</th>
        <th width="25%">分类ID</th>
		<th width="50%">分类名称</th>
		<th width="10%">操作</th>
	</tr>
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /></td>
			<td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
			<td>{-$values.id-}</td>
			<td>{-$values.type_name-}</td>
			<td>
				<?php if (in_array('type_edit', $ruleOperate)) {?>
					<a href="<?php echo U('type_edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('type_delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('type_delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		</foreach>
		<tr>
			<td colspan="12">
				{-$data[1]-}			
			</td>
		</tr>
	</notempty>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('type_sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('type_sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('type_delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('type_delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />