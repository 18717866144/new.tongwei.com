<?php if (!defined('HX_CMS')) exit();?>
<input type="hidden" value="1" name="setting[is_unsigned]" />
<table>
<?php if (isset($setting)) { ?>
    <tr> 
        <td width="100"><strong>时间格式：</strong></td>
        <td>
            <input type="radio" name="setting[field_type]" value="int" checked="checked">时间戳 显示格式：
            <select name="setting[int_format]">
          	 <option value="Y-m-d H:i:s" <?php echo $setting['int_format']=='Y-m-d H:i:s' ? 'selected="selected"' : '';?>>24小时制:<?php echo date('Y-m-d H:i:s'); ?></option>
                <option value="Y-m-d h:i:s" <?php echo $setting['int_format']=='Y-m-d h:i:s' ? 'selected="selected"' : '';?>>12小时制:<?php echo date('Y-m-d h:i:s'); ?></option>
                <option value="Y-m-d H:i" <?php echo $setting['int_format']=='Y-m-d H:i' ? 'selected="selected"' : '';?>><?php echo date('Y-m-d H:i'); ?></option>
                <option value="Y-m-d" <?php echo $setting['int_format']=='Y-m-d' ? 'selected="selected"' : '';?>><?php echo date('Y-m-d'); ?></option>
                <option value="m-d" <?php echo $setting['int_format']=='m-d' ? 'selected="selected"' : '';?>><?php echo date('m-d'); ?></option>
            </select>
        </td>
    </tr>
    <tr> 
        <td><strong>默认值：</strong></td>
        <td>
            <input type="radio" name="setting[default_value_type]" value="1" <?php echo $setting['default_value_type']==1 ? 'checked="checked"' : '';?> />无<br />
            <input type="radio" name="setting[default_value_type]" value="2" <?php echo $setting['default_value_type']==2 ? 'checked="checked"' : '';?> />当前时间
        </td>
    </tr>
<?php }else { ?>
    <tr> 
        <td><strong>时间格式：</strong></td>
        <td>
            <input type="radio" name="setting[field_type]" value="int" checked="checked">时间戳 显示格式：
            <select name="setting[int_format]">
          	      <option value="Y-m-d H:i:s">24小时制:<?php echo date('Y-m-d H:i:s'); ?></option>
	                <option value="Y-m-d h:i:s">12小时制:<?php echo date('Y-m-d h:i:s'); ?></option>
	                <option value="Y-m-d H:i"><?php echo date('Y-m-d H:i'); ?></option>
	                <option value="Y-m-d"><?php echo date('Y-m-d'); ?></option>
	                <option value="m-d"><?php echo date('m-d'); ?></option>
            </select>
        </td>
    </tr>
    <tr> 
        <td><strong>默认值：</strong></td>
        <td>
            <input type="radio" name="setting[default_value_type]" value="1" checked/>无<br />
            <input type="radio" name="setting[default_value_type]" value="2" />当前时间
        </td>
    </tr>
<?php } ?>
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