<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="search clearfix">
<form action="__ACTION__" method="get" name="search_form">
	<table>
		<tr>
			<td class="td_left">搜索[Search]：</td>
			<td class="td_right">
				IP段：<input type="text" name="ip" size="15" value="<?php echo $_GET['ip']?>" />&nbsp;&nbsp;
				<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
			</td>
		</tr>
	</table>
</form>
</div>
<table class="showTable">
	<tr>
		<th width="5%" id="id"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th>ID</th>
		<th>开始IP段</th>
		<th>结束IP段</th>
		<th>封禁时间</th>
		<th>创建时间</th>
		<th>备注</th>
		<th>操作</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td class="_id"><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id'];?></td>
			<td><?php echo long2ip($values['start_ip']);?></td>
			<td><?php echo long2ip($values['end_ip']);?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['lifted_time'])?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td><?php echo $values['remark'];?></td>
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
		<tr class="page">
			<td colspan="8"><?php echo $data[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete')?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />