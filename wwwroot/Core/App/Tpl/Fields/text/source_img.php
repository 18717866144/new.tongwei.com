<?php if (!defined('HX_CMS')) exit();?>
<?php if( !is_array($value) ) { $value = array('source' => $value ); } ?>
<input type="text" size="20" name="info[<?php echo $this->form['field_name']?>]" id="source" value="<?php echo $value['source'];?>" <?php echo $this->form['input_attr']?> />
<img id="source_pic_img" style="vertical-align: top; cursor: pointer;" src="<?php echo $value['source_pic']?$value['source_pic']:'/Public/modules/content/images/small_img.gif';?>" alt="点击删除" onclick="$('#source_pic_input').val(''); $('#source_pic_img').attr('src', '/Public/modules/content/images/small_img.gif');">
<div style="position:relative;display:inline-block;">
<input type="button" onclick="showSource()" class="smallSub" value="选择" style="margin-left:8px;height: 23px;line-height:23px;" title="来源与对应图片在(扩展->文章来源）管理" />
<div id="source_div" show_status="show" style="display:none;position: absolute;bottom:25px;background:#F0F8FD;left:8px;width:400px;z-index:200;padding:10px;border:1px solid #95AADB">
	<?php 
		$Soucrce = M('Source');
		$source = $Soucrce->select();
		unset($Soucrce);
		foreach ($source as $v) {
	?>
	<a href="javascript:;" style="padding:3px 7px; " onclick="$('#source').val($(this).text()); $('#source_pic_input').val($(this).data('pic')); $('#source_pic_img').attr('src', $(this).data('pic')); $('#source_div').attr('show_status','show');$('#source_div').hide();" data-pic="<?php echo $v['source_pic']?>"><?php echo $v['source']?></a>
	<?php }?>
</div>
</div>
<input type="hidden" id="source_pic_input" name="info[source_pic]" value="<?php echo $value['source_pic'];?>">
<script type="text/javascript">
function showSource() {
	if($('#source_div').attr('show_status') == 'show') {
		$('#source_div').attr('show_status','hide');
		$('#source_div').show();
	} else {
		$('#source_div').attr('show_status','show');
		$('#source_div').hide();
	}
}
</script>