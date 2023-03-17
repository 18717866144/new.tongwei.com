<?php if (!defined('HX_CMS')) exit();?>
<input type="hidden" value="text" name="setting[field_type]" />
<table>
<?php if (isset($setting)) { ?>
 	<tr> 
        <td width="120">上传类型</td>
        <td>
	        <input type="radio" name="setting[allow_type]" value="img" <?php echo $setting['allow_type']=='img' ? 'checked="checked"' : ''?> onclick="$('.img_setting').show().siblings().hide();"> 图片 
	        <input type="radio" name="setting[allow_type]" value="media" <?php echo $setting['allow_type']=='media' ? 'checked="checked"' : ''?> onclick="$('.media_setting').show().siblings().hide();"> 媒体
	        <input type="radio" name="setting[allow_type]" value="soft" <?php echo $setting['allow_type']=='soft' ? 'checked="checked"' : ''?> onclick="$('.soft_setting').show().siblings().hide();">软件
	   </td>
    </tr>
     <tr>
    		<td colspan="2">
	    		<div class="img_setting" style="<?php echo $setting['allow_type']=='img' ? '' : 'display: none;'?>">
	    			<table>
	    				<tr>
	    					<td>单次上传的数量</td>
	    					<td><input type="text" size="7" name="setting[allow_img_num]" value="<?php echo $setting['allow_img_num']?>" /></td>
	    				</tr>
	    				<tr> 
				        <td width="120">允许上传类型</td>
				        <td><input type="text" name="setting[allow_image_type]" disabled="disabled" readonly value="<?php echo implode('|', C('ALLOW_IMAGE_TYPE'))?>" class="text">修改图片类型请到“上传配置”中修改</td>
				    </tr>
			    	<tr>
				        <td width="120">添加水印</td>
				        <td><input type="radio" name="setting[water_mark]" value="1" <?php echo $setting['water_mark']==1 ? 'checked="checked"' : '';?>> 是 <input type="radio" name="setting[water_mark]" value="2" <?php echo $setting['water_mark']==2 ? 'checked="checked"' : '';?>> 否</td>
				    </tr>
				    <tr>
				        <td width="120">更多描述行</td>
				        <td><input type="text" name="setting[is_title]" value="<?php echo intval($setting['is_title']);?>" > 请填写整数</td>
				    </tr>
				    <tr>
					    	<td width="120">图片裁剪</td>
					    	<td>
					    		<input type="radio" name="setting[crop_type]" value="1" onclick="$('#crop_set').show();" <?php echo $setting['crop_type']==1 ? 'checked="checked"' : '';?> /> 自动裁剪
					    		<input type="radio" name="setting[crop_type]" value="2" onclick="$('#crop_set').hide();" <?php echo $setting['crop_type']==2 ? 'checked="checked"' : '';?> /> 手动裁剪
					    	</td> 
				    </tr>
				    <tr id="crop_set" style="<?php echo $setting['crop_type']==1 ? '' : 'display:none;';?>">
					    	<td width="120">裁剪方式</td>
				    		<td>
				    			<div>
				    				<input type="radio" name="setting[crop_mode]" value="1" <?php echo $setting['crop_mode']==1 ? 'checked="checked"' : '';?> /> 按尺寸&nbsp;&nbsp;宽：<input type="text" size="7" class="text" name="setting[crop_width]" value="<?php echo $setting['crop_width'] ?>" />&nbsp;&nbsp;高：<input type="text" size="7" class="text" name="setting[crop_height]" value="<?php echo $setting['crop_height'] ?>"  />
				    			</div>
				    			<div style="margin-top:10px;">
				    				<input type="radio" name="setting[crop_mode]" value="2" <?php echo $setting['crop_mode']==2 ? 'checked="checked"' : '';?> /> 按倍数&nbsp;&nbsp;倍数：<input type="text" size="7" class="text" name="setting[crop_multiple]" value="<?php echo $setting['crop_multiple'] ?>" /> 0.1 - 1 之间
				    			</div>
				    		</td>
				    </tr>
			    </table>
		    </div>
		    <div class="soft_setting"  style="<?php echo $setting['allow_type']=='soft' ? '' : 'display: none;'?>">
		    		<table>
			    		<tr>
	    					<td>单次上传的数量</td>
	    					<td><input type="text" size="7" name="setting[allow_soft_num]" value="<?php echo $setting['allow_soft_num']?>" /></td>
	    				</tr>
	    				<tr> 
				        <td width="120">允许上传类型</td>
				        <td><input type="text" name="setting[allow_soft_type]" disabled="disabled" readonly value="<?php echo implode('|', C('ALLOW_SOFT_TYPE'))?>" class="text">修改图片类型请到“上传配置”中修改</td>
				    </tr>
	    				<tr>
				        <td width="120">文件链接方式</td>
				        <td><input type="radio" name="setting[download_link]" value="1" onclick="$('#select_download_link').hide();" <?php echo $setting['download_link']==1 ? 'checked="checked"' : '';?>>  链接到真实软件地址  <input type="radio" onclick="$('#select_download_link').show();" name="setting[download_link]" value="2" <?php echo $setting['download_link']==2 ? 'checked="checked"' : '';?>>  链接到跳转页面</td>
				    </tr>
				    <tr id="select_download_link" <?php echo $setting['download_link']==1 ? 'style="display:none"' : '';?>>
				    		<td width="120">下载页模板</td>
				    		<td>
					    		<select name="setting[download_tpl]">
								<?php $downLoadField = str_replace(APP_PATH.TEMPLATE_DIR.'/'.C('DEFAULT_SKIN').'/Content/down/', '', glob(APP_PATH.TEMPLATE_DIR.'/'.C('DEFAULT_SKIN').'/Content/down/*.php'));?>
								<?php foreach ($downLoadField as $value) {?>
								<option value="<?php echo $value?>" <?php echo $value==$setting['download_tpl'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
								<?php }?>
							</select>&nbsp;&nbsp;模板地址：<?php echo APP_PATH.TEMPLATE_DIR.'/'.C('DEFAULT_SKIN').'/Content/down/';?>
				    		</td>
				    </tr>
	    				<tr>
				        <td width="120"> 链接文件地址 </td>
				        <td><input type="radio" name="setting[download_type]" value="1" <?php echo $setting['download_type']==1 ? 'checked="checked"' : '';?>>   链接文件地址   <input type="radio" name="setting[download_type]" value="2" <?php echo $setting['download_type']==2 ? 'checked="checked"' : '';?>>  通过PHP读取</td>
				    </tr>
    				</table>
		    </div>
	    </td>
    </tr>
<?php }else {?>
    <tr> 
        <td width="120">上传类型</td>
        <td>
	        <input type="radio" name="setting[allow_type]" value="img" checked="checked" onclick="$('.img_setting').show().siblings().hide();"> 图片 
	        <input type="radio" name="setting[allow_type]" value="media" onclick="$('.media_setting').show().siblings().hide();"> 媒体
	        <input type="radio" name="setting[allow_type]" value="soft" onclick="$('.soft_setting').show().siblings().hide();">下载
	   </td>
    </tr>
    <tr>
    		<td colspan="2">
	    		<div class="img_setting">
	    			<table>
	    				<tr>
	    					<td>单次上传的数量</td>
	    					<td><input type="text" size="7" name="setting[allow_img_num]" value="10" /></td>
	    				</tr>
	    				<tr> 
				        <td width="120">允许上传类型</td>
				        <td><input type="text" name="setting[allow_image_type]" disabled="disabled" readonly value="<?php echo implode('|', C('ALLOW_IMAGE_TYPE'))?>" class="text">修改图片类型请到“上传配置”中修改</td>
				    </tr>
			    		<tr>
				        <td width="120">添加水印</td>
				        <td><input type="radio" name="setting[water_mark]" value="1" checked="checked"> 是 <input type="radio" name="setting[water_mark]" value="2"> 否</td>
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
			    </table>
		    </div>
		    <div class="soft_setting" style="display: none;">
		    		<table>
			    		<tr>
	    					<td>单次上传的数量</td>
	    					<td><input type="text" size="7" name="setting[allow_soft_num]" value="10" /></td>
	    				</tr>
	    				<tr> 
				        <td width="120">允许上传类型</td>
				        <td><input type="text" name="setting[allow_soft_type]" disabled="disabled" readonly value="<?php echo implode('|', C('ALLOW_SOFT_TYPE'))?>" class="text">修改图片类型请到“上传配置”中修改</td>
				    </tr>
	    				<tr>
				        <td width="120">文件链接方式</td>
				        <td><input type="radio" name="setting[download_link]" value="1" checked="checked" onclick="$('#select_download_link').hide();">  链接到真实软件地址  <input type="radio" name="setting[download_link]" value="2" onclick="$('#select_download_link').show();">  链接到跳转页面</td>
				    </tr>
				    <tr id="select_download_link" style="display:none">
				    		<td width="120">下载页模板</td>
				    		<td>
					    		<select name="setting[download_tpl]">
								<?php $downLoadField = str_replace(APP_PATH.TEMPLATE_DIR.'/'.C('DEFAULT_SKIN').'/Content/down/', '', glob(APP_PATH.TEMPLATE_DIR.'/'.C('DEFAULT_SKIN').'/Content/down/*.php'));?>
								<?php foreach ($downLoadField as $value) {?>
								<option value="<?php echo $value?>" <?php echo $value==$setting['download_tpl'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
								<?php }?>
							</select>&nbsp;&nbsp;模板地址：<?php echo APP_PATH.TEMPLATE_DIR.'/'.C('DEFAULT_SKIN').'/Content/down/';?>
				    		</td>
				    </tr>
	    				<tr>
				        <td width="120"> 链接文件地址 </td>
				        <td><input type="radio" name="setting[download_type]" value="1">   链接文件地址   <input type="radio" name="setting[download_type]" value="2" checked="checked">  通过PHP读取</td>
				    </tr>
    				</table>
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