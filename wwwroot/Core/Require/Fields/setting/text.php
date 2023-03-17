<?php if (!defined('HX_CMS')) exit();?>
<table>
	<tr>
    	<td width="100">文本类型：</td>
    	<td>
    		<select name="setting[field_type]">
    			<option value="varchar" <?php echo $setting['field_type']=='varchar' ? 'selected="selected"' : ''; ?>>VARCHAR</option>
    			<option value="char" <?php echo $setting['field_type']=='char' ? 'selected="selected"' : ''; ?>>CHAR</option>
    		</select>
    	</td>
    </tr>
    <tr> 
        <td width="100">默认值：</td>
        <td><input type="text" class="text" name="setting[default_value]" value="<?php echo $setting['default_value']?>" ></td>
    </tr>
    <tr> 
        <td width="100">是否为密码框：</td>
        <?php if (isset($setting)) {?>
        <td><input type="radio" name="setting[is_password]" value="1" <?php echo $setting['is_password']==1 ? 'checked="checked"' : '';?>> 是 <input type="radio" name="setting[is_password]" value="2"  <?php echo $setting['is_password']==2 ? 'checked="checked"' : '';?>> 否</td>
        <?php }else {?>
        <td><input type="radio" name="setting[is_password]" value="1"> 是 <input type="radio" name="setting[is_password]" value="2" checked="checked"> 否</td>
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