<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="3%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="5%">排序</th>
		<th width="25%" style="text-align:left;">栏目名称</th>
		<th width="8%">栏目目录</th>
		<th width="8%">栏目类型</th>
		<th width="8%">所属模型</th>
		<th width="5%">显示</th>
		<th width="5%">状态</th>
		<th>操作</th>
	</tr>
	<?php echo $column_str ?>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort();" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete');?>')});" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="显示" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'c_status','status'=>1));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="隐藏" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'c_status','status'=>2));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="正常" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'is_show','status'=>1));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('change_status', $ruleOther)) {?>
		<input type="button" value="禁用" onclick="$.CR.G.bulkAction('<?php echo U('change_status',array('field'=>'is_show','status'=>2));?>')" class="sub" />
	<?php }?>
	<?php if (in_array('update_url', $ruleOther)) {?>
		<input type="button" value="更新URL" onclick="$.CR.G.bulkAction('<?php echo U('update_url');?>')" class="sub" />
	<?php }?>
	<?php if (in_array('create_html', $ruleOther)) {?>
		<input type="button" value="更新HTML" onclick="$.CR.G.bulkAction('<?php echo U('create_html');?>')" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />