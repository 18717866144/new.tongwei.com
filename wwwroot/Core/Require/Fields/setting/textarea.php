<?php if (!defined('HX_CMS')) exit();?>
<table>
	<tr> 
        <td width="100">字符类型：</td>
        <td>
			 <select name="setting[field_type]">
			 	<option value="varchar" <?php echo $setting['field_type']=='varchar' ? 'selected="selected"' : '';?>>VARCHAR</option>
			 	<option value="char" <?php echo $setting['field_type']=='char' ? 'selected="selected"' : '';?>>CHAR</option>
			 	<option value="text" <?php echo $setting['field_type']=='text' ? 'selected="selected"' : '';?>>TEXT</option>
			 </select>
        </td>
    </tr>
    <tr> 
        <td width="100">默认值：</td>
        <td><textarea class="textCont short" cols="50" style="height: 50px;" class="textCont" name="setting[default_value]"><?php echo $setting['default_value'];?></textarea>
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