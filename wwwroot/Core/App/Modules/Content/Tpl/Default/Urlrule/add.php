<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">添加URL规则</div>
<form action="__ACTION__" method="post" id="formData"><!-- id="postData" -->
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">URL规则名</span></td>
			<td class="td_right">
				<input type="text" class="text" name="url_name" datatype="s1-30" errormsg="URL规则名格式不正确！" size="20" />
				<span class="setDesc Validform_checktip">1-30个字符</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">所属模块</td>
			<td class="td_right">
				<select name="model">
					<option value="content">内容模块</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">是否为静态HTML</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="is_html" />是&nbsp;</label>
				<label><input type="radio" value="2" name="is_html" checked="checked"  />否</label>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">URL规则</span></td>
			<td class="td_right">
				<input type="text" class="text" name="rule" size="70" id="urlRule" datatype="*1-255" errormsg="URL规则格式不正确！" />
				<span class="setDesc Validform_checktip">1-255个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">URL示例</td>
			<td class="td_right">
				<input type="text" class="text" name="example" ignore="ignore"  datatype="*1-255" errormsg="URL示例格式不正确！" size="70" />
				<span class="setDesc Validform_checktip">255个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">URL变量说明</td>
			<td class="td_right">
				<input type="button" value="导航ID" class="smallSub" onclick="$('#urlRule').insert({text:'{$cid}'})" />&nbsp;&nbsp;
				<input type="button" value="内容ID" class="smallSub" onclick="$('#urlRule').insert({text:'{$aid}'})" />&nbsp;&nbsp;
				<input type="button" value="分页符" class="smallSub" onclick="$('#urlRule').insert({text:'{$page}'})" />&nbsp;&nbsp;
				<input type="button" value="导航目录" class="smallSub" onclick="$('#urlRule').insert({text:'{$navigate_dir}'})" />&nbsp;&nbsp;
				<input type="button" value="父导航目录" style="padding: 0px 5px;" class="smallSub" onclick="$('#urlRule').insert({text:'{$parent_navigate_dir}'})" />&nbsp;&nbsp;
				<input type="button" value="日期[年]" class="smallSub" onclick="$('#urlRule').insert({text:'{$y}'})" />&nbsp;&nbsp;
				<input type="button" value="日期[月]" class="smallSub" onclick="$('#urlRule').insert({text:'{$m}'})" />&nbsp;&nbsp;
				<input type="button" value="日期[日]" class="smallSub" onclick="$('#urlRule').insert({text:'{$d}'})" />&nbsp;&nbsp;
			</td>	
		</tr>
		<tr>
			<td class="td_left">其它附加变量[内容页使用]</td>
			<td class="td_right">
				<input type="text" size="70" name="append_var" />
				<span class="setDesc Validform_checktip">请使用如下方式如：type_id=>{$tid}|game_id=>{$gid}</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="u_status"  checked="checked" />启用&nbsp;</label>
				<label><input type="radio" value="2" name="u_status"  />禁用</label>
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