<?php if (!defined('HX_CMS')) exit();?>
<table>
<input type="hidden" value="char" name="setting[field_type]" />
<?php if (isset($setting)) { ?>
    <tr> 
        <td width="120">允许上传类型</td>
        <td><input type="text" name="setting[allow_image_type]" disabled="disabled" readonly="readonly" value="<?php echo implode('|', C('ALLOW_IMAGE_TYPE'))?>" class="text">修改图片类型请到“上传配置”中修改</td>
    </tr>
    <tr> 
        <td width="120">添加水印</td>
        <td><input type="radio" name="setting[water_mark]" value="1" <?php echo $setting['water_mark']==1 ? 'checked="checked"' : '';?>> 是 <input type="radio" name="setting[water_mark]" value="2" <?php echo $setting['water_mark']==2 ? 'checked="checked"' : '';?>> 否</td>
    </tr>
    <tr>
	    	<td width="120">图片裁剪</td>
	    	<td>
	    		<input type="radio" name="setting[crop_type]" value="1" onclick="$('#crop_set').show();" <?php echo $setting['crop_type']==1 ? 'checked="checked"' : '';?> /> 自动裁剪
	    		<input type="radio" name="setting[crop_type]" value="2" onclick="$('#crop_set').hide();" <?php echo $setting['crop_type']==2 ? 'checked="checked"' : '';?> /> 手动裁剪
	    	</td> 
    </tr>
    <tr id="crop_set"  style="<?php echo $setting['crop_type']==1 ? '' : 'display:none;';?>">
    		<td width="120">裁剪方式</td>
    		<td>
    			<div>
    				<input type="radio" name="setting[crop_mode]" value="1" <?php echo $setting['crop_mode']==1 ? 'checked="checked"' : '';?> /> 按尺寸&nbsp;&nbsp;
    				宽：<input type="text" size="7" class="text" name="setting[crop_width]" value="<?php echo $setting['crop_width'] ?>" />&nbsp;&nbsp;高：<input type="text" size="7" class="text" name="setting[crop_height]" value="<?php echo $setting['crop_height'] ?>" />
    			</div>
    			<div style="margin-top:10px;">
    				<input type="radio" name="setting[crop_mode]" value="2" <?php echo $setting['crop_mode']==2 ? 'checked="checked"' : '';?> /> 倍数&nbsp;&nbsp;
    				倍数：<input type="text" size="7" class="text" name="setting[crop_multiple]" value="<?php echo $setting['crop_multiple'] ?>" /> 0.1 - 1 之间
    			</div>
    		</td>
    </tr>
<?php }else {?>
    <tr> 
        <td width="120">允许上传类型</td>
        <td><input type="text" name="setting[allow_image_type]" disabled="disabled" readonly="readonly" value="<?php echo implode('|', C('ALLOW_IMAGE_TYPE'))?>" class="text">修改图片类型请到“上传配置”中修改</td>
    </tr>
    <tr> 
        <td width="120">添加水印</td>
        <td><input type="radio" name="setting[water_mark]" value="1"> 是 <input type="radio" name="setting[water_mark]" value="2" checked="checked"> 否</td>
    </tr>
    <tr>
	    	<td width="120">图片裁剪</td>
	    	<td>
	    		<input type="radio" name="setting[crop_type]" value="1" onclick="$('#crop_set').show();" checked="checked" /> 自动裁剪
	    		<input type="radio" name="setting[crop_type]" value="2" onclick="$('#crop_set').hide();" /> 手动裁剪
	    	</td> 
    </tr>
    <tr id="crop_set">
    		<td width="120">裁剪方式</td>
    		<td>
    			<div>
    				<input type="radio" name="setting[crop_mode]" value="1" checked="checked" /> 按尺寸&nbsp;&nbsp;宽：<input type="text" size="7" class="text" name="setting[crop_width]" />&nbsp;&nbsp;高：<input type="text" size="7" class="text" name="setting[crop_height]"  />
    			</div>
    			<div style="margin-top:10px;">
    				<input type="radio" name="setting[crop_mode]" value="2"  /> 按倍数&nbsp;&nbsp;倍数：<input type="text" size="7" class="text" name="setting[crop_multiple]"  /> 0.1 - 1 之间
    			</div>
    		</td>
    </tr>
<?php }?>
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