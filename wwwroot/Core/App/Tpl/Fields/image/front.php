<?php if (!defined('HX_CMS')) exit();
$model = F("models_{$this->form['mid']}");
$related_table = $model['table_name'];
// 			裁剪设置
$crop_value = $this->setting['crop_mode']==1 ? $this->setting['crop_width'].'_'.$this->setting['crop_height'] : $this->setting['crop_multiple'];
// 		文件名，上传数目，是否加水印，裁剪类型，裁剪方式，裁剪值（如果为宽高，那么则用“宽_高”这种方式），相关表
$file_name = rawurlencode("info[{$this->form['field_name']}]");
$token = Tool::encrypt("{$file_name}1{$this->setting['water_mark']}{$this->setting['crop_type']}{$this->setting['crop_mode']}$crop_value$related_table");
// 修改或有值有，重新加密token值
if ($value) {
	$randNum = mt_rand(1,9999);
	$token = Tool::encrypt($randNum.$value);
	$value = $value.'|'.$randNum.'|'.$token;
}
?>
<input type="text" id="thumbnail" readonly="readonly" name="info[<?php echo $this->form['field_name']?>]" value="<?php echo $value;?>" <?php echo $this->form['input_attr']?> />
<input type="button" class="sub" value="上传图片" onclick="openNewWindow('<?php echo C('WEB_URL')?>/Attachment/Attachment/image?file_name=<?php echo $file_name;?>&up_num=1&is_water=<?php echo $this->setting['water_mark'];?>&crop_type=<?php echo $this->setting['crop_type']?>&crop_mode=<?php echo $this->setting['crop_mode']?>&crop_value=<?php echo $crop_value;?>&related=<?php echo $related_table;?>&token=<?php echo $token;?>','图片上传');" />
<input type="button" onclick="$('#thumbnail').val('');" value="删除图片" class="sub" />
