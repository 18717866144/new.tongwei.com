<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="10%">角色名称</th>
		<th width="55%">角色备注</th>
		<th width="5%">状态</th>
		<th width="20%">操作</th>
	</tr>
	<?php foreach ($adminGroup as $values) {?>
	<tr>
		<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
		<td><?php echo $values['id']?></td>
		<td><?php echo $values['title']?></td>
		<td style="text-align:left;"><?php echo $values['remark']?></td>
		<td><?php echo $values['status']==1 ? '正常' : '禁用';?></td>
		<td>
			<?php if ($values['is_super'] == 1) {?>
				<span class="disabled">导航权限</span>&nbsp;&nbsp;
				<span class="disabled">系统权限</span>&nbsp;&nbsp;
				<span class="disabled">编辑</span>&nbsp;&nbsp;
				<span class="disabled">删除</span>
			<?php } else {?>
				<?php if (in_array('set_navigate', $ruleOperate)) {?>
				<a href="javascript:;" class="operate" onclick="openNewWindow('<?php echo U('set_navigate',array('id'=>$values['id']))?>','导航权限')">导航权限</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('set_rule', $ruleOperate)) {?>
				<a href="javascript:;" class="operate" onclick="openNewWindow('<?php echo U('set_rule',array('id'=>$values['id']))?>','系统权限')">系统权限</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('edit', $ruleOperate)) {?>
				<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
				<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>
				<?php }?>
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