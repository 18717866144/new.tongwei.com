<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" name="id" value="<?php echo $current['id']?>" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">类别名称</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="20" value="<?php echo $current['type_name']?>" name="type_name" datatype="*1-30" errormsg="类别名称格式不正确！"/>
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>
		</tr>
        <tr>
			<td class="td_left"><span class="setRed"> </span>&nbsp;<span class="Validform_label">备注</span></td>
			<td class="td_right">
				<input type="text" name="remark" class="text short" value="<?php echo $current['remark'];?>" />
				<span class="Validform_checktip setDesc"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">排序 </span></td>
			<td class="td_right">
				<input type="text" name="sort" class="text short" datatype="/^[\d]{1,8}$/" value="<?php echo $current['sort'];?>" errormsg="排序格式不正确！"  />
				<span class="Validform_checktip setDesc">1-8个字符之间，只能输入数字并且第一位不能为零</span>
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
<include file="./Core/App/Tpl/global_footer.php" />