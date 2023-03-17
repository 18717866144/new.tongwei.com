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
					&nbsp;用户类型：<select name="login_type">
						<option value="">全部</option>
						<option value="1" <?php echo $_GET['login_type']==1 ? 'selected="selected"' : '';?>>管理员</option>
						<option value="2" <?php echo $_GET['login_type']==2 ? 'selected="selected"' : '';?>>前台会员</option>
					</select>
					&nbsp;
					测试用户名：<input type="text" size="18" name="username" value="<?php echo $_GET['username']?>" />
				</div>
				<div class="marginTop10">
					IP段：<input type="text" name="start_ip" style="width: 160px" value="<?php echo $_GET['start_ip']?>" />&nbsp;&nbsp;-&nbsp;
					<input type="text" name="end_ip" style="width: 160px" value="<?php echo $_GET['end_ip']?>" />&nbsp;&nbsp;
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
		<th>登录IP地址</th>
		<th>用户类型</th>
		<th>尝试用户名</th>
		<th>尝试密码</th>
		<th>出错次数</th>
		<th>最后登录出错时间</th>
	</tr>
		<?php foreach ($logData[0] as $values) {?>
		<tr>
			<td class="_id"><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['ip_location']['country'].'['.$values['ip_location']['area'].']('.$values['ip'].')'?></td>
			<td><?php switch ($values['login_type']) {
				case 1:
					echo '管理员';
					break;
				case 2:
					echo '前台会员';
					break;
				default:
					echo '未知';
					break;
			} ?></td>
			<td><?php echo $values['test_username']?></td>
			<td><?php echo $values['test_password']?></td>
			<td><?php echo $values['error_num']?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['error_time'])?></td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="7"><?php echo $logData[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('type'=>'login_error'))?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />