<?php if (!defined('HX_CMS')) exit();?>
<table>
    <tr> 
        <td width="100">默认值：</td>
        <td><input type="text" class="text" name="setting[default_value]" value="<?php echo isset($setting['default_value']) ? $setting['default_value'] : '';?>" ></td>
    </tr>
    <tr> 
        <td width="100">数值类型：</td>
        <td>
			 <select name="setting[field_type]">
			 	<option value="tinyint" <?php echo $setting['field_type']=='tinyint' ? 'selected="selected"' : '';?>>TINYINT</option>
			 	<option value="smallint" <?php echo $setting['field_type']=='smallint' ? 'selected="selected"' : '';?>>SMALLINT</option>
			 	<option value="mediumint" <?php echo $setting['field_type']=='mediumint' ? 'selected="selected"' : '';?>>MEDIUMINT</option>
			 	<option value="int" <?php echo $setting['field_type']=='int' ? 'selected="selected"' : '';?>>INT</option>
			 	<option value="bigint" <?php echo $setting['field_type']=='bigint' ? 'selected="selected"' : '';?>>BIGINT</option>
			 </select>
        </td>
    </tr>
    <tr>
    	<td width="100">是否为正整数：</td>
    	<?php if (isset($setting['is_unsigned'])) {?>
    	<td>
    		是 <input type="radio" value="1" name="setting[is_unsigned]" <?php echo $setting['is_unsigned']==1 ? 'checked="checked"' : '';?>  />
    		否 <input type="radio" value="2" name="setting[is_unsigned]" <?php echo $setting['is_unsigned']==2 ? 'checked="checked"' : '';?>/>
    	</td>
    	<?php } else {?>
    	<td>
    		是 <input type="radio" value="1" name="setting[is_unsigned]" checked="checked" />
    		否 <input type="radio" value="2" name="setting[is_unsigned]" />
    	</td>
    	<?php }?>
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