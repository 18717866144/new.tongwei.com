<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="Fields:self_navi" />
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="8%">排序</th>
		<th width="11%">字段名</th>
		<th width="20%">字段别名</th>
		<th width="11%">表单类型</th>
		<th width="5%">主表字段</th>
		<th width="5%">搜索字段</th>
		<th width="5%">字段状态</th>
		<th width="20%">操作</th>
	</tr>
	<?php foreach ($modelField as $values) {
		$values['field_setting'] = json_decode($values['field_setting'],true);
		?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /></td>
			<td><?php echo $values['id']?></td>
			<td><input name="sort[<?php echo $values['id']?>]" class='text' tabindex='10' type='text' size='3' value="<?php echo $values['sort']?>" class='input' /></td>
			<td><?php echo $values['field_name']?></td>
			<td><?php echo $values['nick_name']?></td>
			<td><?php echo $values['form_type']?></td>
			<td><?php echo $values['field_setting']['is_system']==1 ? '<span class="setBlue">√</span>' : '<span class="setRed">╳</span>'?></td>
			<td><?php echo $values['field_setting']['is_search']==1 ? '<span class="setBlue">√</span>':'<span class="setRed">╳</span>'?></td>
			<td><?php echo $values['field_status']==1?'<span class="setBlue">√</span>':'<span class="setRed">╳</span>'?></td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id'],'mid'=>$values['mid']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<?php if (in_array($values['field_name'], $not_delete)) {?>
					<span>删除</span>
					<?php } else {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id'],'mid'=>$values['mid']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
					<?php }?>
				<?php }?>
			</td>
		</tr>
	<?php }?>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />