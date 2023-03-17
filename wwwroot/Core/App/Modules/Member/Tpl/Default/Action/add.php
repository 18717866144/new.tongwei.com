<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">添加行为</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">行为标识</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="name" datatype="/^[\w]{1,30}$/i" errormsg="用户名格式不正确！" />
				<span class="setDesc Validform_checktip">30个字符，包含，字母，数字，下划线.</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">行为说明</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="title" datatype="*1-80" errormsg="1-80个字符之间！" />
				<span class="setDesc Validform_checktip">1-80个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">&nbsp;<span class="Validform_label">行为类型</span></td>
			<td class="td_right">
				<select name="type" id="">
					<option value="1">系统</option>
					<option value="2" selected="selected">用户</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">行为描述</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="remark" datatype="*1-150" errormsg="行为描述格式不正确！"  ignore="ignore"></textarea>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">行为规则</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="rule" datatype="*" errormsg="行为描述格式不正确！"  ignore="ignore"></textarea>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<p>规则定义 table:$table|field:$field|condition:$condition|rule:$rule[|cycle:$cycle|max:$max][;......]</p>
				<p>规则字段解释：table->要操作的数据表，不需要加表前缀；</p>
				<p>field->要操作的字段；</p>
				<p>condition->操作的条件，目前支持字符串，默认变量{$self}为执行行为的用户</p>
				<p>rule->对字段进行的具体操作，目前支持加、减</p>
				<p>cycle->执行周期，单位（小时），表示$cycle小时内最多执行$max次</p>
				<p>max->单个周期内的最大执行次数（$cycle和$max必须同时定义，否则无效）</p>
				<p>单个行为后可加 ； 连接其他规则 </p>
			</td>
		</tr>
		<tr>
			<td class="td_left">状态：</td>
			<td class="td_right">
				<label>正常&nbsp;<input type="radio" value="1" name="a_status" checked="checked" /></label>
				<label>禁用&nbsp;<input type="radio" value="2" name="a_status" /></label>
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