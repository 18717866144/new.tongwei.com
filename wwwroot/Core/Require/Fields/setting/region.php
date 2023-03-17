<?php if (!defined('HX_CMS')) exit();?>
<input type="hidden" value="smallint" name="setting[field_type]" />
<table>
<tr> 
<td width="100">默认值：</td>
<td><input type="text" class="text" name="setting[default_value]" value="<?php echo isset($setting['default_value']) ? $setting['default_value'] : '';?>" ></td>
</tr>
<tr> 
<td width="100">选择层级：</td>
<td><input type="text" class="text" name="setting[level]" value="<?php echo isset($setting['level']) ? $setting['level'] : '4';?>" ></td>
</tr>
<tr>
	<td width="100">前台模板：</td>
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
	<td width="100">后台模板：</td>
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