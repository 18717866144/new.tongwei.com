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
					&nbsp;类型：<select name="s_type">
						<option value="filename" <?php echo $_GET['s_type']=='filename' ? 'selected="selected"' : '';?>>文件名</option>
						<option value="u_username" <?php echo $_GET['s_type']=='u_username' ? 'selected="selected"' : '';?>>前台会员</option>
						<option value="a_username" <?php echo $_GET['s_type']=='a_username' ? 'selected="selected"' : '';?>>管理员</option>
					</select>
					&nbsp;&nbsp;
					<input type="text" size="25" name="search_content" value="<?php echo $_GET['search_content']?>" />&nbsp;&nbsp;
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
		<th width="16%">文件类型</th>
		<th width="7%">文件大小</th>
		<th width="14%">原文件名</th>
		<th width="8%">上传者</th>
		<th width="8%">关联表</th>
		<th width="10%">扩展</th>
		<th width="14%">上传时间</th>
		<th width="12%">操作</th>
	</tr>
		<?php foreach ($attachData[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id'];?></td>
			<td><a href="javascript:;" <?php if (in_array($values['file_type'], array('jpg','jpeg','png','gif','bmp'))) {?>onclick="$.CR.G.showIMG('<?php echo $values['file_path']?>')"<?php }?>><img src="__PUBLIC__/images/file/<?php echo $values['file_type']=='jpeg' ? 'jpg' : $values['file_type'];?>.gif" /><?php echo $values['new_name']?></a></td>
			<td><?php echo Tool::unitConversion($values['file_size']);?></td>
			<td><?php echo $values['old_name'];?></td>
			<td><?php echo $values['is_system']==1 ? $values['a_username'].'[管]' : ($values['u_username'] ? $values['u_username'] : $values['u_email']).'[普]';?></td>
			<td><?php echo $values['related_table']?></td>
			<td><?php echo $values['ext']?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td>
				<?php if (in_array('down', $ruleOperate)) {?>
					<a href="__ROOT__<?php echo $values['file_path'];?>" class="operate" target="_blank">下载</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		<?php }?>
		<tr class="page">
			<td colspan="10"><?php echo $attachData[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete')?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />