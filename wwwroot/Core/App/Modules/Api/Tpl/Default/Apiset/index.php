<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th>Api说明</th>
		<th>Api标识</th>
		<th>Api_ID</th>
		<th>Api_Key</th>
		<th style="text-align:left;">扩展</th>
		<th width="5%">状态</th>
		<th>操作</th>
	</tr>
		<?php foreach ($data as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id']?></td>
			<td><?php echo $values['title']?></td>
			<td><?php echo $values['name']?></td>
			<td><?php echo $values['api_id']?></td>
			<td><?php echo $values['api_key']?></td>
			<td style="text-align:left;"><?php echo $values['ext']?></td>
			<td><?php echo $values['a_status']==1 ? '正常' : '禁用';?></td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		<?php }?>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete')?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />