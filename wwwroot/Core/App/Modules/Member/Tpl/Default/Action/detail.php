<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">行为日志详情</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left">所属行为</td>
			<td class="td_right"><?php echo $data['title']?>[<?php echo $data['name']?>(<?php echo $data['action_id']?>)]</td>
		</tr>
		<tr>
			<td class="td_left">执行用户</td>
			<td class="td_right"><?php echo $data['username']?>(<?php echo $data['user_id']?>)</td>
		</tr>
		<tr>
			<td class="td_left">行为关联表</td>
			<td class="td_right"><?php echo $data['action_table']?></td>
		</tr>
		<tr>
			<td class="td_left">数据ID</td>
			<td class="td_right"><?php echo $data['record_id']?></td>
		</tr>
		<tr>
			<td class="td_left">执行时间</td>
			<td class="td_right"><?php echo date('Y-m-d H:i:s',$data['save_time'])?></td>
		</tr>
		<tr>
			<td class="td_left">执行IP</td>
			<td class="td_right"><?php echo $data['ip_location']?>[<?php echo $data['ip']?>]</td>
		</tr>
		<tr>
			<td class="td_left">备注说明</td>
			<td class="td_right"><?php echo $data['remark'];?></td>
		</tr>
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<input type="button" name="send" class="sub" value="返回" onclick="javascript:history.back();" />
			</td>
		</tr>
	</table>
</form>
<include file="./Core/App/Tpl/global_footer.php" />