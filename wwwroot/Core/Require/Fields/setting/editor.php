<table>
<input type="hidden" value="text" name="setting[field_type]" />
<?php if (!defined('HX_CMS')) exit();
if (isset($setting)) {?>
	<tr> 
        <td width="150">下方是否显示工具条：</td>
        <td>
        	<input type="radio" name="setting[bottom_toolbar]" value="1" <?php echo $setting['bottom_toolbar']=='1' ? 'checked="checked"' : ''?>>显示
        	<input type="radio" name="setting[bottom_toolbar]" value="2" <?php echo $setting['bottom_toolbar']=='2' ? 'checked="checked"' : ''?>> 不显示
        </td>
    </tr>
	<tr> 
        <td width="150">自动提取摘要</td>
        <td>
        	<input type="radio" name="setting[intercept_content]" value="1" <?php echo $setting['intercept_content']=='1' ? 'checked="checked"' : ''?>>自动提取
        	<input type="radio" name="setting[intercept_content]" value="2" <?php echo $setting['intercept_content']=='2' ? 'checked="checked"' : ''?>> 不自动提取
        </td>
    </tr>
	<tr> 
        <td width="150">自动提取缩略图</td>
        <td>
        	<input type="radio" name="setting[intercept_image]" value="1" <?php echo $setting['intercept_image']=='1' ? 'checked="checked"' : ''?>>自动提取
        	<input type="radio" name="setting[intercept_image]" value="2" <?php echo $setting['intercept_image']=='2' ? 'checked="checked"' : ''?>> 不自动提取
			，提取第<input type="text" name="setting[auto_thumb_num]" value="<?php echo $setting['auto_thumb_num'] ?  $setting['auto_thumb_num']  : 1;?>">张为缩略图
        </td>
    </tr>
    <tr> 
        <td width="150">后台编辑器样式：</td>
        <td>
        	<input type="radio" name="setting[back_toolbar]"  onclick="$('#back_custom_editor').hide();" value="text" <?php echo $setting['back_toolbar']=='text' ? 'checked="checked"' : ''?>>纯文本
        	<input type="radio" name="setting[back_toolbar]"  onclick="$('#back_custom_editor').hide();" value="small" <?php echo $setting['back_toolbar']=='small' ? 'checked="checked"' : ''?>> 简洁型 
        	<input type="radio" name="setting[back_toolbar]"  onclick="$('#back_custom_editor').hide();" value="basic"  <?php echo $setting['back_toolbar']=='basic' ? 'checked="checked"' : ''?>>标准型 
        	<input type="radio" name="setting[back_toolbar]"  onclick="$('#back_custom_editor').hide();" value="full" <?php echo $setting['back_toolbar']=='full' ? 'checked="checked"' : ''?>>完整型
        	<input type="radio" name="setting[back_toolbar]" onclick="$('#back_custom_editor').show();" value="custom" <?php echo $setting['back_toolbar']=='custom' ? 'checked="checked"' : ''?>>自定义
        </td>
    </tr>
    <tr>
    	<td colspan="2"  id="back_custom_editor" style="<?php echo $setting['back_toolbar']=='custom' ? 'display:block;' : 'display:none;'; ?>">
    		<textarea name="setting[back_custom_toolbar]" class="textCont" cols="30" rows="10" style="width:100%;height:70px;"><?php echo $setting['back_custom_toolbar'];?></textarea>
    		<div>格式如：[['fullscreen', 'source', '|', 'undo', 'redo','selectall', 'cleardoc']]，选项请参照UEditor</div>
    	</td>
    </tr>
    <tr> 
        <td>前台编辑器样式：</td>
        <td>
        	<input type="radio" name="setting[front_toolbar]" onclick="$('#front_custom_editor').hide();" value="text" <?php echo $setting['front_toolbar']=='text' ? 'checked="checked"' : ''?>>纯文本
        	<input type="radio" name="setting[front_toolbar]" onclick="$('#front_custom_editor').hide();" value="small" <?php echo $setting['front_toolbar']=='small' ? 'checked="checked"' : ''?> > 简洁型 
        	<input type="radio" name="setting[front_toolbar]" onclick="$('#front_custom_editor').hide();" <?php echo $setting['front_toolbar']=='basic' ? 'checked="checked"' : ''?> value="basic"> 标准型 
        	<input type="radio" name="setting[front_toolbar]" onclick="$('#front_custom_editor').hide();" <?php echo $setting['front_toolbar']=='full' ? 'checked="checked"' : ''?> value="full"> 完整型
        	<input type="radio" name="setting[front_toolbar]" onclick="$('#front_custom_editor').show();"  value="custom" <?php echo $setting['front_toolbar']=='custom' ? 'checked="checked"' : ''?>>自定义
        </td>
    </tr>
    <tr>
    	<td colspan="2"  id="front_custom_editor" style="<?php echo $setting['front_toolbar']=='custom' ? '' : 'display:none;'; ?>">
    		<textarea name="setting[front_custom_toolbar]" class="textCont" cols="30" rows="10" style="width:100%;height:70px;"><?php echo $setting['front_custom_toolbar']?></textarea>
    		<div>格式如：[['fullscreen', 'source', '|', 'undo', 'redo','selectall', 'cleardoc']]，选项请参照UEditor</div>
    	</td>
    </tr>
    <tr> 
        <td>默认值：</td>
        <td><textarea name="setting[default_value]" class="textCont" rows="2" cols="20" id="defaultvalue" style="height:50px;width:250px;"><?php echo $setting['default_value'];?></textarea></td>
    </tr>
    <tr> 
        <td>编辑器默认高度：</td>
        <td><input type="text" name="setting[height]" class="text" value="<?php echo $setting['height']?>" size="4" class="input-text"> px</td>
    </tr>
<?php }else { ?>
    <tr> 
        <td width="150">后台编辑器样式：</td>
        <td>
          <input type="radio" name="setting[back_toolbar]" onclick="$('#back_custom_editor').hide();" value="text">纯文本
        	<input type="radio" name="setting[back_toolbar]" onclick="$('#back_custom_editor').hide();" value="small"> 简洁型 
        	<input type="radio" name="setting[back_toolbar]" onclick="$('#back_custom_editor').hide();" value="basic">标准型 
        	<input type="radio" name="setting[back_toolbar]" onclick="$('#back_custom_editor').hide();" value="full" checked="checked">完整型
        	<input type="radio" name="setting[back_toolbar]" onclick="$('#back_custom_editor').show();" value="custom">自定义
        </td>
    </tr>
    <tr>
    	<td colspan="2"  id="back_custom_editor" style="display:none">
    		<textarea name="setting[back_custom_toolbar]" class="textCont" cols="30" rows="10" style="width:100%;height:70px;"></textarea>
    		<div>格式如：[['fullscreen', 'source', '|', 'undo', 'redo','selectall', 'cleardoc']]，选项请参照UEditor</div>
    	</td>
    </tr>
    <tr> 
        <td>前台编辑器样式：</td>
        <td> 
        	<input type="radio" name="setting[front_toolbar]"  onclick="$('#front_custom_editor').hide();" value="text"> 纯文本 
        	<input type="radio" name="setting[front_toolbar]"  onclick="$('#front_custom_editor').hide();" value="small"  checked="checked" > 简洁型 
        	<input type="radio" name="setting[front_toolbar]"  onclick="$('#front_custom_editor').hide();"  value="basic"> 标准型 
        	<input type="radio" name="setting[front_toolbar]"  onclick="$('#front_custom_editor').hide();" value="full"> 完整型
        	<input type="radio" name="setting[front_toolbar]" onclick="$('#front_custom_editor').show();"  value="custom">自定义
        </td>
    </tr>
    <tr>
    	<td colspan="2"  id="front_custom_editor" style="display:none">
    		<textarea name="setting[front_custom_toolbar]" class="textCont" cols="30" rows="10" style="width:100%;height:70px;"></textarea>
    		<div>格式如：[['fullscreen', 'source', '|', 'undo', 'redo','selectall', 'cleardoc']]，选项请参照UEditor</div>
    	</td>
    </tr>
    <tr> 
        <td>默认值：</td>
        <td><textarea name="setting[default_value]" class="textCont" rows="2" cols="20" id="defaultvalue" style="height:50px;width:250px;"></textarea></td>
    </tr>
    <tr> 
        <td>编辑器默认高度：</td>
        <td><input type="text" name="setting[height]" class="text" value="200" size="4" class="input-text"> px</td>
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