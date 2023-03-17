<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
	<table class="formTable">
		<tr>
			<td class="td_left" ><font color="red">*</font>&nbsp;<span class="Validform_label">公告标题</span></td>
			<td class="td_right" style="width:auto;">
				<script type="text/javascript" src="__PUBLIC__/modules/content/js/colorpicker.js"></script>
				<?php 
					$style = explode('|', $current['style']);
					$css_string = '';
					if ($style[0]) {
						$css_string .= "color:{$style[0]};";
					}
					if ($style[1]) {
						$css_string .= "font-weight:bold;";
					}
				?>
				<input type="text" name="title" value="<?php echo $current['title']?>" id="title" class="title" datatype="*1-60" errormsg="1-60个字符之间！" size="50" style="<?php echo $css_string;?>" />
				<input id="style_color" type="hidden" value="<?php echo $style[0];?>" name="style_color" />
				<input id="style_font_weight" type="hidden" value="<?php echo $style[1];?>" name="style_font_weight" />
				&nbsp;<img src="__PUBLIC__/modules/content/images/bold.png" class="pointer" onclick="setBold();" />
				&nbsp;<img src="__PUBLIC__/modules/content/images/colour.png" class="pointer" onclick="colorpicker('title_colorpanel','set_title_color');" />
				<span id="title_colorpanel" style="position:absolute;z-index:9999;" class="colorpanel"></span>
				<span class="setDesc Validform_checktip">1-60个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left" ><font color="red">*</font>&nbsp;显示时间</td>
			<td class="td_right"><?php echo FormElements::date('start_time',$_GET['start_time'],0,1)?> 到 <?php echo FormElements::date('end_time',$_GET['end_time'],0,0)?></td>
		</tr>
		<tr>
			<td class="td_left" ><font color="red">*</font>&nbsp;内容</td>
			<td class="td_right" style="width:auto;">
			<div class="_content">
			<div class="_content_top">
			<script type="text/javascript">var RELATED='announce';</script>
			<script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.config.js"></script><script type="text/javascript" src="__PUBLIC__/js/UEditor/ueditor.all.min.js"></script>
			<script type="text/plain" id="myEditor" name="content"><?php echo $current['content'] ?></script>
			<script type="text/javascript">UE.getEditor('myEditor',{initialFrameWidth:'100%',initialFrameHeight:300});</script>
		</div>
	</div>
	</td>
	</tr>
	<tr>
		<td class="td_left" ><font color="red">*</font>&nbsp;内容模版</td>
		<td class="td_right">
			<select name="show_tpl">
				<foreach name="show_tplArray" item="value">
					<option value="{-$value-}" <?php echo $value==$current['show_tpl'] ? 'selected="selected"' : '';?>>{-$value-}</option>
				</foreach>
			</select>
		</td>
	</tr>
	<tr>
		<td class="td_left"><span class="Validform_label">外部链接</span></td>
		<td class="td_right">
			<input size="50" class="text" type="text" name="link" value="<?php echo $current['link']?>" ignore="ignore" errormsg="链接格式不正确！" datatype="url" />
			<span class="setDesc Validform_checktip">填写外部链接时，此公告会自动跳转</span>
		</td>
	</tr>
	<tr>
		<td class="td_left">公告类型</td>
		<td class="td_right">
			<label><input type="radio" value="1" name="ann_type" <?php echo $current['ann_type']==1 ? 'checked="checked" ' : '';?>/>&nbsp;所有人可见</label>
			<label><input type="radio" value="2" name="ann_type" <?php echo $current['ann_type']==2 ? 'checked="checked" ' : '';?> />&nbsp;仅会员可见</label>
		</td>
	</tr>
	<tr>
		<td class="td_left" >公告状态</td>
		<td class="td_right">
			<label><input type="radio" value="1" name="a_status"   <?php echo $current['a_status']==1 ? 'checked="checked" ' : '';?>/>&nbsp;正常</label>
			<label><input type="radio" value="2" name="a_status"  <?php echo $current['a_status']==2 ? 'checked="checked" ' : '';?> />&nbsp;禁用</label>
		</td>
	</tr>
	<tr>
		<td class="td_left">&nbsp;&nbsp;</td>
		<td class="td_right">
			<input type="submit" name="send" class="sub" value="提交" />
			<input type="reset" class="sub" />
		</td>
	</tr>
	</table>
</form>
<script type="text/javascript">
function set_title_color(color) {
	$('#title').css('color',color);
	$('#style_color').val(color);
}
function setBold() {
	var _thisV = $('#style_font_weight').val();
	if(_thisV == 'bold') {
		$('#style_font_weight').val('');
		$('#title').css('font-weight','normal');
	}else {
		$('#style_font_weight').val('bold');
		$('#title').css('font-weight','bold');
	}
}
</script>
<include file="./Core/App/Tpl/global_footer.php" />