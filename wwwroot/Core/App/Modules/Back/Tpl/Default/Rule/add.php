<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">添加新规则</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left">父级节点：</td>
			<td class="td_right">
				<select name="pid">
					<option value="0">作为一级节点</option>
					{-$parent_node-}
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">节点名称：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="title" datatype="s1-30" errormsg="节点名称格式不正确！" />
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">项目名称：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="app_name" value="{-$Think.const.APP_NAME-}" datatype="/^[a-z\_][\w]{0,29}$/i" errormsg="项目名称格式不正确！" />
				<span class="setDesc Validform_checktip">1-30个字符之间，[a-z\_][\w]</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">分组名称：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="group_name" value="{-$Think.const.GROUP_NAME-}" datatype="/^[a-z\_][\w]{0,29}$/i" errormsg="分组名称格式不正确！" />
				<span class="setDesc Validform_checktip">1-30个字符之间，[a-z\_][\w]</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">模块名称：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="module_name" id="module_name" datatype="/^[a-z\_][\w]{0,29}$/i" errormsg="模块名称格式不正确！" />&nbsp;&nbsp;<input type="button" value="公共占位符" class="smallSub node_button" style="padding: 0px 5px;" onclick="$('#module_name').val('_public_test_public_module')" />
				<span class="setDesc Validform_checktip">1-30个字符之间，[a-z\_][\w]</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">方法名称：</span></td>
			<td class="td_right">
				<div>
					<span class="Validform_label" style="display:none;">方法名称：</span>
					<input type="text" class="text normal" size="35" name="action_name" readonly="readonly" id="action_name" datatype="/^[a-z\_][\w]{0,29}$/i" errormsg="方法名称格式不正确！" />&nbsp;&nbsp;<input type="button" value="公共占位符" style="padding: 0px 5px;" class="smallSub node_button" onclick="$('#action_name').val('_public_test_public_action')" />
					<span class="setDesc Validform_checktip">1-30个字符之间，[a-z\_][\w]</span>
				</div>
				<div style="margin-top:8px;">
					<input type="button" value="列表" class="smallSub node_button" onclick="$('#action_name').val('index')"  />&nbsp;
					<input type="button" value="添加" class="smallSub node_button" onclick="$('#action_name').val('add')"  />&nbsp;
					<input type="button" value="编辑" class="smallSub node_button" onclick="$('#action_name').val('edit')"  />&nbsp;
					<input type="button" value="删除" class="smallSub node_button" onclick="$('#action_name').val('delete')"  />&nbsp;
					<input type="button" value="排序" class="smallSub node_button" onclick="$('#action_name').val('sort')"  />&nbsp;
					<input type="checkbox" value="1"  onclick="$('#action_name').removeAttr('readonly')"  /> 其它
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">字段排序：</span></td>
			<td class="td_right">
				<input type="text" name="sort" size="20" value="1" class="text short" datatype="/^[1-9][\d]{0,7}$/i" errormsg="排序格式不正确！！！" />
				<span class="setDesc Validform_checktip">1-8个字符之间，数值越大越靠前</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">规则条件：</span></td>
			<td class="td_right">
				<input type="text" name="condition" size="50" value="" class="text" datatype="*1-100" ignore="ignore" errormsg="规则条件格式不正确！！！" />
				<span class="setDesc Validform_checktip">100个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">节点类型：</td>
			<td class="td_right">
				<select name="node_type">
					<option value="0">无类型</option>
					<option value="1">引导类型</option>
					<option value="2">链接类型</option>
					<option value="3">操作类型</option>
					<option value="4">其它类型</option>
				</select>
				<span class="setDesc">引导类型将作为可见菜单项，链接类型将做为内部可见菜单项</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">备注：</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="remark" datatype="*1-255" errormsg="备注格式不正确！"  ignore="ignore"></textarea>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">显示状态：</td>
			<td class="td_right">
				<label>显示&nbsp;<input type="radio" value="1" name="show_status" checked="checked" /></label>
				<label>隐藏&nbsp;<input type="radio" value="2" name="show_status" /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">使用状态：</td>
			<td class="td_right">
				<label>正常&nbsp;<input type="radio" value="1" name="status" checked="checked" /></label>
				<label>禁用&nbsp;<input type="radio" value="2" name="status" /></label>
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