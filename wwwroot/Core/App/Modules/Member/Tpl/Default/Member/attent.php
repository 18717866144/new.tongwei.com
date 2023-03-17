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
					注册时间：<?php echo FormElements::date('reg_start_time',$_GET['reg_start_time'],0,1)?> 到 <?php echo FormElements::date('reg_end_time',$_GET['reg_end_time'],0,0)?>
					&nbsp;&nbsp;&nbsp;
					登录时间：<?php echo FormElements::date('login_start_time',$_GET['login_start_time'],0,1)?> 到 <?php echo FormElements::date('login_end_time',$_GET['login_end_time'],0,0)?>
				</div>
				<div class="marginTop10">
					注册IP段：<input type="text" name="reg_start_ip" size="15" value="<?php echo $_GET['reg_start_ip']?>" />&nbsp;-&nbsp;
					<input type="text" name="reg_end_ip" size="15" value="<?php echo $_GET['reg_end_ip']?>" />&nbsp;&nbsp;
					登录IP段：<input type="text" name="login_start_ip" size="15" value="<?php echo $_GET['login_start_ip']?>" />&nbsp;-&nbsp;
					<input type="text" name="login_end_ip" size="15" value="<?php echo $_GET['login_end_ip']?>" />
				</div>
				<div class="marginTop10">
					验证：<select name="is_checked">
						<option value="">全部</option>
						<option value="1">已验证</option>
						<option value="2">未验证</option>
					</select>&nbsp;&nbsp;
					状态：<select name="m_status">
						<option value="">全部</option>
						<option value="1" <?php echo $_GET['m_status']==1 ? 'selected="selected"' : '';?>>正常</option>
						<option value="2" <?php echo $_GET['m_status']==2 ? 'selected="selected"' : '';?>>未审核</option>
					</select>&nbsp;&nbsp;
					E-mail：<input type="text" name="search_content" size="25" value="<?php echo $_GET['search_content']?>" />&nbsp;&nbsp;
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
				</div>
			</td>
		</tr>
	</table>
</form>
</div>
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="6%">ID</th>
		<th width="15%">E-mail/ID</th>
		<th width="10%">昵称</th>
		<th width="8%">关注类型</th>
		<th width="8%">关注组</th>
		<th width="15%">关注时间</th>
		<th width="20%">操作</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['fid']?>" /></td>
			<td><?php echo $values['fid']?></td>
			<td><?php echo $values['email'].'/'.$values['id']?></td>
			<td><?php echo $values['username']?></td>
			<td><?php switch ($values['type']) {
				case 1:
					echo '单向关注';
					break;
				case 2:
					echo '双向关注';
					break;
				case 3:
					echo '悄悄关注';
					break;
			}?></td>
			<td><?php echo $values['group_id'];?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time']);?></td>
			<td>
				<?php //if (in_array('edit_relation', $ruleOperate)) {?>
					<a href="<?php echo U('Member/Member/detail',array('id'=>$values['id']),true,false,true);?>" class="operate">详情</a>&nbsp;&nbsp;
				<?php //}?>
				<?php //if (in_array('delete_relation', $ruleOperate)) {?>
					<a href="<?php echo U('Member/Member/fans',array('id'=>$values['id']),true,false,true);?>" class="operate">粉丝</a>&nbsp;&nbsp;
				<?php //}?>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="12"><?php echo $data[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="sort('__APP__/Content/Contents/sort/cid/<?php echo $_GET['cid']?>');" class="sub" />
	<?php }?>
	<?php if (in_array('audit', $ruleOther)) {?>
		<input type="button" value="审核" onclick="bulkAction('__APP__/Content/Contents/audit/cid/<?php echo $_GET['cid']?>/status/1')" class="sub" />
		<input type="button" value="取消审核" onclick="bulkAction('__APP__/Content/Contents/audit/cid/<?php echo $_GET['cid']?>/status/2')" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){bulkAction('__URL__/delete')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />