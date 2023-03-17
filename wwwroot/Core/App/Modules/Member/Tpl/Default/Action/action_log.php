<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="3%" id="id"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th>所属行为</th>
		<th>执行用户</th>
		<th>行为关联表</th>
		<th>数据ID</th>
		<th>执行时间</th>
		<th>操作</th>
	</tr>
		<?php foreach ($logData[0] as $values) {?>
		<tr>
			<td class="_id"><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['title'];?>[<?php echo $values['name']?>]</td>
			<td><?php echo $values['username']; ?>[<?php echo $values['user_id']?>]</td>
			<td><?php echo $values['action_table']?></td>
			<td><?php echo $values['record_id'];?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td>
				<?php if (in_array('detail', $ruleOperate)) {?>
					<a href="<?php echo U('detail',array('id'=>$values['id']))?>" class="operate">详情</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete_action_log', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete_action_log',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		<?php }?>
		<tr class="page">
			<td colspan="7"><?php echo $logData[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete_action_log', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete_action_log')?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />