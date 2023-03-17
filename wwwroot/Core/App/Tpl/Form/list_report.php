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
					&nbsp;&nbsp; IP段：<input type="text" name="start_ip" size="15" value="<?php echo $_GET['start_ip']?>" />&nbsp;-&nbsp;
					<input type="text" name="end_ip" size="15" value="<?php echo $_GET['end_ip']?>" />&nbsp;&nbsp;
					 用户ID：<input type="text" size="18" name="userid" value="<?php echo $_GET['userid']?>" />
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs('__ACTION__?mid=<?php echo $_GET['mid']?>&');" />
				</div>
			</td>
		</tr>
	</table>
</form>
</div>
<table class="showTable">
	<tr>
		<th><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th>ID</th>
		<th>可能用户</th>
		<th>提交IP</th>
		<th>提交时间</th>
		<th>操作</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>"  /></td>
			<td><?php echo $values['id']?></td>
			<td><?php echo $values['userid']?></td>
			<td><?php echo $values['ip_location']['country'].'['.$values['ip_location']['area'].']('.$values['ip'].')'?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td>
				<?php  if (in_array('details', $ruleOperate)) {?>
					<a href="javascript:;" class="operate" onclick="openNewWindow('<?php echo U('details',array('mid'=>$_GET['mid'],'id'=>$values['id']));?>','表单内容详情')">详情</a>&nbsp;&nbsp;
				<?php  }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('mid'=>$_GET['mid'],'id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="6"><?php echo $data[1]?></td>
		</tr>
</table>
<?php if (in_array('delete', $ruleOther)) {?>
	<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$_GET['mid']))?>')});" class="sub" />
<?php }?>
<include file="./Core/App/Tpl/global_footer.php" />