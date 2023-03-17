<?php if (!defined('HX_CMS')) exit();?>
<?php 
//获取导航
$navigate = F('navigate');
foreach ($navigate as &$values) {
	$values['disabled'] =  ($values['n_type'] != 1 || $values['is_channel'] == 1) ? 'disabled="disabled"' : '';
	$values['selected'] = $values['id'] == $setting['navi_id'] ? 'selected="selected"' : '';
}
$tree = new Tree();
$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
$str = "<option value='\$id' \$disabled \$selected>\$spacer \$navigate_name</option>";//\$selected
$tree->init($navigate);
$navigate_str = $tree->get_tree(0, $str);
?>
<input type="hidden" value="mediumint" name="setting[field_type]" />
<?php 
	$models = $Models = M('Models')->where("model_type='content'")->getField('id,model_name');
?>
<table>
	<?php if (!$setting) {?>
	<tr>
		<td width="140">选择模型类型：</td>
		<td>
			<select name="setting[model_id]">
				<?php foreach ($models as $key=>$value) {?>
				<option value="<?php echo $key;?>"><?php echo $value?></option>
				<?php }?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="140">是否限定导航：</td>
		<td>
			<select name="setting[navi_id]">
				<option value="0">不限定导航</option>
				<option value="-1">限定为当前导航</option>
				<?php echo $navigate_str;?>
			</select>
		</td>
	</tr>
	<?php } else {?>
	<tr>
		<td width="140">选择模型类型：</td>
		<td>
			<select name="setting[model_id]">
				<?php foreach ($models as $key=>$value) {?>
				<option value="<?php echo $key;?>" <?php echo $setting['model_id']==$key ? 'selected="selected"' : '';?>><?php echo $value?></option>
				<?php }?>
			</select>
		</td>
	</tr>
	<tr>
		<td width="140">是否限定导航：</td>
		<td>
			<select name="setting[navi_id]">
				<option value="0" <?php echo $setting['navi_id']==0 ? 'selected="selected"' : '';?>>不限定导航</option>
				<option value="-1" <?php echo $setting['navi_id']==-1 ? 'selected="selected"' : '';?>>限定为当前导航</option>
				<?php echo $navigate_str;?>
			</select>
		</td>
	</tr>
	<?php }?>
<tr>
	<td width="140">前台模板：</td>
	<td>
		<select name="setting[front_field_tpl]">
			<option value="">系统内置</option>
			<?php foreach ($fieldTpl as $value) {?>
			<option value="<?php echo $value?>" <?php echo $value==$setting['front_field_tpl'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
			<?php }?>
		</select>
	</td>
</tr>
<tr>
	<td width="140">后台模板：</td>
	<td>
		<select name="setting[back_field_tpl]">
			<option value="">系统内置</option>
			<?php foreach ($fieldTpl as $value) {?>
			<option value="<?php echo $value?>" <?php echo $value==$setting['back_field_tpl'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
			<?php }?>
		</select>
	</td>
</tr>
</table>