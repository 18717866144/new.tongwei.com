<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="Config:self_navi" />
<div class="topTip"><b>注：您所添加的参数名，系统会自动将其转换为大写，不过您也不必担心在调用时不区分大小写</b></div>
<form method="post" action="__ACTION__" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><font color="red">*</font>&nbsp;<span class="Validform_label">参数名</span></td>
			<td class="td_right"><input type="text" name="var_name" size="50" class="text" datatype="/^[\_a-z][\w]{1,29}$/i" errormsg="参数名格式不正确！" /><span class="setDesc Validform_checktip">2-30个字符，字母或下划线，只能输入字母数字和下划线</span> </td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">参数值</span></td>
			<td class="td_right"><textarea name="var_value" rows="4" cols="70" ignore="ignore" class="textCont long" datatype="*" errormsg="参数值格式不正确！"></textarea><span class="setDesc Validform_checktip">当选择数组类型时，格式如：1=>a,b=>b,d=>d，数字索引可省略</span> </td>
		</tr>
		<tr>
			<td class="td_left">参数类型</td>
			<td class="td_right">
				<input type="radio" value="string" name="var_type" checked="checked" />文本
				<input type="radio" value="numeric"  name="var_type" />数字
				<input type="radio" value="boolean"  name="var_type" />布尔
				<input type="radio" value="textarea" name="var_type" />多行文本
				<input type="radio" value="array" name="var_type" />数组
				<span class="setDesc">( <span class="setRed">*</span> 当选择布尔值的时候，其值只能输入Y/N )</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">所属组</td>
			<td class="td_right">
				<select name="var_group">
					<option value="site">站点设置</option>
					<option value="core">核心设置</option>
					<option value="mutual">交互设置</option>
					<option value="email">Email设置</option>	
					<option value="attachment">附件设置</option>
					<option value="debug">性能调试设置</option>
					<option value="ext">扩展设置</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">参数说明</td>
			<td class="td_right"><textarea rows="2" cols="70" name="var_desc" datatype="*1-255" ignore="ignore" errormsg="参数说明格式不正确！"></textarea><span class="setDesc Validform_checktip">255个字符以内</span> </td>
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