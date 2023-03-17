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
					状态：<select name="m_status">
						<option value="">全部</option>
						<option value="1" <?php echo $_GET['m_status']==1 ? 'selected="selected"' : '';?>>正常</option>
						<option value="2" <?php echo $_GET['m_status']==2 ? 'selected="selected"' : '';?>>禁止</option>
						<option value="3" <?php echo $_GET['m_status']==3 ? 'selected="selected"' : '';?>>未认证</option>
					</select>&nbsp;&nbsp;
					类别：<select name="select_type">
						<option value="id" <?php echo $_GET['select_type']=='id' ? 'selected="selected"' : '';?>>用户ID</option>
						<option value="username" <?php echo $_GET['select_type']=='username' ? 'selected="selected"' : '';?>>用户名</option>
						<option value="email" <?php echo $_GET['select_type']=='email' ? 'selected="selected"' : '';?>>E-mail</option>
					</select>&nbsp;&nbsp;
					<input type="text" name="search_content" size="25" value="<?php echo $_GET['search_content']?>" />&nbsp;&nbsp;
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
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
		<th>E-mail</th>
		<th>用户名</th>
		<th>积分数</th>
		<th>余额</th>
		<th>所属组</th>
		<th>附加模型</th>
		<th>状态</th>
		<th>操作</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id']?></td>
			<td><?php echo $values['email']?></td>
			<td><?php echo $values['username']?></td>
			<td><?php echo $values['points']?></td>
			<td><?php echo $values['money']-$values['spent']?></td>
			<td>
				<?php foreach ($values['group'] as $groupVal) {?>
				<?php echo $groupVal['title']?>&nbsp;
				<?php }?>
			</td>
			<td><?php echo $values['append_model_name']?></td>
			<td><?php switch ($values['m_status']) {
				case 1:
					echo '正常';
					break;
				case 2:
					echo '<span class="setRed">禁止</span>';
					break;
				case 3:
					echo '<span class="setGreen">未验证</span>';
					break;
			}?></td>
			<td>
				<?php if (in_array('detail', $ruleOperate)) {?>
					<a href="<?php echo U('Member/Member/detail',array('id'=>$values['id']),true,false,true);?>" class="operate">详情</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('Member/Member/edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('Member/Member/delete',array('id'=>$values['id']))?>'})" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="12"><?php echo $data[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('audit', $ruleOther)) {?>
		<input type="button" value="正常" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>1))?>')" class="sub" />
		<input type="button" value="未验证" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>3))?>')" class="sub" />
		<input type="button" value="禁止" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>2))?>')" class="sub" />
	<?php }?>
		<input type="button" value="发私信" onclick="$.CR.M.Letter.backLetter();" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete')?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />