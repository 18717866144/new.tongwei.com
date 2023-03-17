<?php if (!defined('HX_CMS')) exit();?>
<input type="hidden" value="text" name="setting[field_type]" />
<table>
<?php if (isset($setting)) { ?>
 	
     <tr>
    		<td colspan="2">	    		
		    <div class="soft_setting">
		<table>
		<tr> 
        <td width="120">文件类型</td>
        <td align="left"><input type="radio" name="setting[allow_type]" value="soft" <?php echo $setting['allow_type']=='soft' ? 'checked="checked"' : ''?> onclick="$('.soft_setting').show().siblings().hide();"> 软件 
	        <input type="radio" name="setting[allow_type]" value="media" <?php echo $setting['allow_type']=='media' ? 'checked="checked"' : ''?> onclick="$('.media_setting').show().siblings().hide();"> 媒体
            </td></tr>
            
	    <tr> 
		 <td width="120">允许类型</td>
		<td>
        <div class="soft_setting" style="<?php echo $setting['allow_type']=='soft' ? '' : 'display: none;'?>">
	    <input type="text" name="setting[allow_soft_type]" disabled="disabled" readonly="readonly" value="<?php echo implode('|', C('ALLOW_SOFT_TYPE'))?>" class="text">修改类型请到"上传配置"中修改</div>
        <div class="media_setting" style="<?php echo $setting['allow_type']=='media' ? '' : 'display: none;'?>">
        <input type="text" name="setting[allow_media_type]" disabled="disabled" readonly="readonly" value="<?php echo implode('|', C('ALLOW_MEDIA_TYPE'))?>" class="text">修改类型请到"上传配置"中修改</div>
            </td>
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
    		<td colspan="2">
	    		
		    <div class="soft_setting">

<table>
			    		
	    				<tr> 
				        <td colspan="2">	    		
		    <div class="soft_setting">
		<table>
		<tr> 
        <td width="120">文件类型</td>
        <td align="left"><input type="radio" name="setting[allow_type]" value="soft" onclick="$('.soft_setting').show().siblings().hide();"> 软件 
	        <input type="radio" name="setting[allow_type]" value="media" onclick="$('.media_setting').show().siblings().hide();"> 媒体
            </td></tr>
            
	    <tr> 
        <td width="120">允许类型</td>
		<td>
        <div class="soft_setting" style="<?php echo $setting['allow_type']=='soft' ? '' : 'display: none;'?>">
	    <input type="text" name="setting[allow_soft_type]" disabled="disabled" readonly="readonly" value="<?php echo implode('|', C('ALLOW_SOFT_TYPE'))?>" class="text">修改类型请到"上传配置"中修改</div>
        <div class="media_setting" style="<?php echo $setting['allow_type']=='media' ? '' : 'display: none;'?>">
        <input type="text" name="setting[allow_media_type]" disabled="disabled" readonly="readonly" value="<?php echo implode('|', C('ALLOW_MEDIA_TYPE'))?>" class="text">修改类型请到"上传配置"中修改</div>
            </td>
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