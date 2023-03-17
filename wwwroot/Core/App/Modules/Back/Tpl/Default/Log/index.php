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
					&nbsp;用户类型：<select name="user_type">
						<option value="">未知</option>
						<option value="1" <?php echo $_GET['user_type']==1 ? 'selected="selected"' : '';?>>管理员</option>
						<option value="2" <?php echo $_GET['user_type']==2 ? 'selected="selected"' : '';?>>前台会员</option>
					</select>
					&nbsp;
					用户名/ID：<input type="text" size="18" name="username" value="<?php echo $_GET['username']?>" />
				</div>
				<div class="marginTop10">
					日志类型：<select name="log_type">
						<option value="">全部</option>
						<option value="INFO" <?php echo ($_GET['log_type']=='INFO') ? 'selected="selected"' : '';?>>系统信息</option>
						<option value="SYSTEM_ERROR" <?php echo ($_GET['log_type']=='SYSTEM_ERROR') ? 'selected="selected"' : '';?>>系统错误</option>
						<option value="USER_ERROR" <?php echo ($_GET['log_type']=='USER_ERROR') ? 'selected="selected"' : '';?>>会员错误</option>
					</select>&nbsp;&nbsp;
					操作模型：<select name="operate_model">
					<option value="">无模型</option>
					<?php foreach ($modelFile as $value) {?>
					<option value="<?php echo $value;?>" <?php echo $value==$_GET['operate_model'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
					<?php }?>
					</select>&nbsp;&nbsp;
					IP段：<input type="text" name="start_ip" size="15" value="<?php echo $_GET['start_ip']?>" />&nbsp;-&nbsp;
					<input type="text" name="end_ip" size="15" value="<?php echo $_GET['end_ip']?>" />&nbsp;&nbsp;
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
		<th width="7%">用户/ID</th>
		<th width="5%">用户类型</th>
		<th width="5%">日志类型</th>
		<th width="10%">IP地址</th>
		<th width="8%">操作模型</th>
		<th width="10%">记录时间</th>
		<th width="10%">内容</th>
		<th width="20%">可能的SQL</th>
		<th width="20%">来源URL</th>
	</tr>
		<?php foreach ($logData[0] as $values) {?>
		<tr>
			<td class="_id"><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo empty($values['username']) ? '未知' : $values['username'].'/'.$values['userid'];?></td>
			<td><?php switch ($values['user_type']) {
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
			<td><?php echo $values['log_type']?></td>
			<td><?php echo $values['ip_location']['country'].'['.$values['ip_location']['area'].']<br />('.$values['ip'].')'?></td>
			<td><?php echo $values['operate_model']?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td><?php echo $values['content']?></td>
			<td><?php echo $values['possible_sql']?></td>
			<td><?php echo $values['source_url']?></td>
		</tr>
		<?php }?>
		<tr class="page">
			<td colspan="10"><?php echo $logData[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('type'=>'log'))?>')});" class="sub" />
	<?php }?>
</div>
<script type="text/javascript">
$(function(){
	$('[name="id_all[]"]').click(function(event){
		event.stopPropagation();
	})
	$('.showTable tr[class!="page"]').click(function(){
		var desc = [];
		var i = 0;
		$('.showTable th[id!="id"]').each(function(){
			desc[i] = $(this).html();
			i++;
		})
		var _html = '',i=0;
		$(this).children('td[class!="_id"]').each(function(){
			_html += '<div style="padding:7px 0px;border-bottom:1px dashed #CCCCCC;width:100%;"><b>'+desc[i]+'：</b>'+$(this).html()+'</div>';
			i++;
		})
		art.dialog({
			title:'日志详情',
			lock:true,
			content:_html,
			width:600,
			height:400
		})
	})
})
</script>
<include file="./Core/App/Tpl/global_footer.php" />