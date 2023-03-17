<?php if (!defined('HX_CMS')) exit();?>
<input type="hidden" value="varchar" name="setting[field_type]" />
<table>
	<?php if (!$setting) {?>
	<tr>
		<td width="140">是否显示上传框：</td>
			<td><input type="radio" value="1" name="setting[is_show_upload]" /> 是&nbsp;&nbsp;<input type="radio" value="2" name="setting[is_show_upload]" checked="checked" /> 否
		</td>
	</tr>
	<tr>
		<td width="140">输入模板目录或路径：</td><td>Template/<?php echo C('DEFAULT_SKIN')?>/<input type="text" name="setting[tpl_path]" value="" class="text" size="30" /></td>
	</tr>
	<?php } else {?>
	<tr>
		<td width="140">是否显示上传框：</td><td><input type="radio" value="1" name="setting[is_show_upload]" <?php echo $setting['is_show_upload']==1 ? 'checked="checked"' : '';?> /> 是&nbsp;&nbsp;<input type="radio" value="2" name="setting[is_show_upload]" <?php echo $setting['is_show_upload']==2 ? 'checked="checked"' : '';?> /> 否</td>
	</tr>
	<tr>
		<td width="140">输入模板目录或路径：</td><td>Template/<?php echo C('DEFAULT_SKIN')?>/<input type="text" name="setting[tpl_path]" value="<?php echo $setting['tpl_path']?>" class="text" size="30" /></td>
	</tr>
	<?php }?>
<tr>
    <td width="100">模板：</td>
    <td>
    	<select name="setting[field_tpl]">
    		<option value="">系统内置</option>
    		<?php foreach ($fieldTpl as $value) {?>
    		<option value="<?php echo $value?>" <?php echo $value==$setting['field_tpl'] ? 'selected="selected"' : ''?>><?php echo $value;?></option>
    		<?php }?>
    	</select>
    </td>
</tr>
</table>