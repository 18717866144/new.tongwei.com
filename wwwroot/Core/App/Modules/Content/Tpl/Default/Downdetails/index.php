<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="search clearfix">
<form action="__ACTION__" method="get" name="search_form">
	<table>
		<tr>
			<td class="td_left">搜索[Search]：</td>
			<td class="td_right">
				<div>
					时间：<?php echo FormElements::date('start_time',$_GET['start_time'],0,1)?> 到 <?php echo FormElements::date('end_time',$_GET['end_time'],0,0)?>
					&nbsp;&nbsp;
					IP段：<input type="text" name="start_ip" size="15" value="<?php echo $_GET['start_ip']?>" />&nbsp;-&nbsp;
					<input type="text" name="end_ip" size="15" value="<?php echo $_GET['end_ip']?>" />&nbsp;&nbsp;
					用户名/ID：<input type="text" size="18" name="username" value="<?php echo $_GET['username']?>" />
					&nbsp;&nbsp;
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
				</div>
			</td>
		</tr>
	</table>
</form>
</div>
<table class="showTable">
	<tr>
		<th width="5%" id="id"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="7%">ID</th>
		<th width="5%">下载用户</th>
		<th width="5%">下载IP</th>
		<th width="12%">下载时间</th>
		<th width="8%">附件名</th>
		<th width="8%">关联的CID->ID</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id']?></td>
			<td><?php echo empty($values['email']) ? '未知' : $values['email'].'/'.$values['userid'];?></td>
			<td><?php echo $values['ip_location']['country'].'['.$values['ip_location']['area'].']('.$values['ip'].')'?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td><?php echo $values['new_name']?></td>
			<td><a href="<?php echo U('Content/Index/show',array('aid'=>$values['aid'],'cid'=>$values['cid']))?>" target="_blank"><?php echo $values['navigate_name'].'('.$values['cid'].')->'.$values['aid']?></a></td>
		</tr>
		<?php }?>
		<tr class="page">
			<td colspan="7"><?php echo $data[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('type'=>'log'))?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />