<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" /> 
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="8%">用户名</th>
		<th width="10%">真实姓名</th>
		<th width="8%">QQ</th>
		<th width="14%">注册时间</th>
		<th width="30%" style="text-align:left;">备注</th>
		<th width="5%">状态</th>
		<th width="15%">操作</th>
	</tr>
		<?php foreach ($adminArray as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id']?></td>
			<td><?php echo $values['username']?></td>
			<td><?php echo $values['truename']?></td>
			<td><?php echo $values['qq']?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['reg_time'])?></td>
			<td style="text-align:left;"><?php echo $values['remark']?></td>
			<td><?php echo $values['admin_status']==1 ? '正常' : '禁用';?></td>
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