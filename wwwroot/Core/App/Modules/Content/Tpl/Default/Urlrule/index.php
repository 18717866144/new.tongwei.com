<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="3%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="8%">所属模块</th>
		<th width="12%">规则名</th>
		<th width="26%" style="text-align:left;overflow:hidden;">URL规则</th>
		<th width="26%" style="text-align:left;overflow:hidden;">规则示例</th>
		<th width="5%">Html</th>
		<th width="5%">状态</th>
		<th width="15%">操作</th>
	</tr>
		<?php foreach ($ruleData as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id']?></td>
			<td>
				<switch name="values['model']">
					<case value="content">内容</case>
				</switch>
			</td>
			<td><?php echo $values['url_name']?></td>
			<td style="text-align:left;margin-left:7px;"><?php echo $values['rule']?></td>
			<td style="text-align:left;margin-left:7px;"><?php echo $values['example']?></td>
			<td><?php echo $values['is_html']==1?'<span class="setBlue">√</span>':'<span class="setRed">╳</span>' ?></td>
			<td><?php echo $values['u_status']==1?'<span class="setBlue">√</span>':'<span class="setRed">╳</span>' ?></td>
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