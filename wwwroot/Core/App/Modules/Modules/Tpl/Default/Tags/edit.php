<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<script type="text/javascript" src="/Public/modules/content/js/colorpicker.js"></script>
<style type="text/css">#title_colorpanel1 table tr td,#title_colorpanel2 table tr td {padding:0px;}</style>
<form action="__ACTION__" method="post" id="postData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
	<table class="formTable">
		<tr>
			<td class="td_left">TAG_NAME</td>
			<td class="td_right">
				{-$current.tag_name-}
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">状态样式码</span></td>
			<td class="td_right">
				<script type="text/javascript" src="__PUBLIC__/modules/content/js/colorpicker.js"></script>
				<div>
					<input type="text" class="text" size="40" readonly="readonly" id="style" name="style" value="<?php echo $current['style'] ? $current['style'] : '||'?>" />
					&nbsp;<img style="cursor:pointer;" src="__PUBLIC__/modules/content/images/colour.png" class="pointer" onclick="colorpicker('title_colorpanel1','set_title_color1');" />
					<span id="title_colorpanel1" style="position:absolute;z-index:9999;" class="colorpanel"></span>
					&nbsp;<img style="cursor:pointer;" src="__PUBLIC__/modules/content/images/bold.png" class="pointer" onclick="setBold();" />
					&nbsp;<img style="cursor:pointer;" src="__PUBLIC__/modules/content/images/colour.png" class="pointer" onclick="colorpicker('title_colorpanel2','set_title_color2');" />
					<span id="title_colorpanel2" style="position:absolute;z-index:9999;" class="colorpanel"></span>
					<input class="smallSub node_button" type="button" onclick="$('[name=\'style\']').val('||')" value="清空" />
				</div>
				<div>格式：字体色|加粗|背景色</div>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">点击量</span></td>
			<td class="td_right">
				<input class="text short" type="text" sucmsg=" " errormsg="1-8个字符之间，只能输入数字！！！" ignore="ignore" datatype="/^[\d]{0,8}$/" name="click" value="{-$current.click-}" />
				<span class="Validform_checktip setDesc">1-8个字符之间，只能输入数字！</span>
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
function set_title_color1(color) {
		var value = $('#style').val();
		var preg = /^([\w\#]{7})?\|(.*)\|([\w\#]{7})?$/i
		if(!preg.test(value)) return;
		value = value.replace(preg,color+'|'+RegExp.$2+'|'+RegExp.$3);
		$('#style').val(value);
}
function set_title_color2(color) {
	var value = $('#style').val();
	var preg = /^([\w\#]{7})?\|(.*)\|([\w\#]{7})?$/i
	if(!preg.test(value)) return;
	value = value.replace(preg,RegExp.$1+'|'+RegExp.$2+'|'+color);
	$('#style').val(value);
}
function setBold() {
	var value = $('#style').val();
	var preg = /^([\w\#]{7})?\|(.*)\|([\w\#]{7})?$/i
	if(!preg.test(value)) return;
	var bold = RegExp.$2 == 'bold' ? '' : 'bold';
	value = value.replace(preg,RegExp.$1+'|'+bold+'|'+RegExp.$3);
	$('#style').val(value);
}
	</script>		
<include file="./Core/App/Tpl/global_footer.php" />