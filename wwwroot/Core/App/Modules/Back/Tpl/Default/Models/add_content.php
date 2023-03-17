<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">添加内容模型</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">模型名称</span></td>
			<td class="td_right">
				<input type="text" class="text" size="35" name="model_name" datatype="*1-30" errormsg="模型名称格式不正确！！！" />
				<span class="setDesc Validform_checktip">1-30个字符</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">模型表名</span></td>
			<td class="td_right">
				{-:C('DB_PREFIX')-}<span class="table_type_name" style="display: none;"></span><input type="text" id="table_exists" size="30" class="text normal" ajaxurl="<?php echo U('Back/Public/check_models_table',array('model_type'=>'content'))?>" name="table_name" datatype="/^[a-z][\w]{0,29}$/i" errormsg="模型表名格式不正确！"  />
				<span class="setDesc Validform_checktip">字母开头，1-30个字符，只能输入字母、数字和下划线。</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">模型备注</span></td>
			<td class="td_right">
				<textarea class="textCont" name="remark" cols="50" datatype="*0-255" dragonfly="dragonfly" errormsg="模型备注格式不正确！" ignore="ignore"></textarea>
				<span class="setDesc Validform_checktip">255个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">后台列表页模板：</span>
			</td>
			<td class="td_right">
				<select name="setting[back_list_tpl]">
					<?php foreach ($backList as $value) {?>
					<option value="<?php echo $value?>"><?php echo $value;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">后台内容页模板：</span>
			</td>
			<td class="td_right">
				<select name="setting[back_content_tpl]">
					<?php foreach ($backContent as $value) {?>
					<option value="<?php echo $value?>"><?php echo $value;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">会员列表页模板：</span>
			</td>
			<td class="td_right">
				<select name="setting[member_list_tpl]">
					<?php foreach ($memberList as $value) {?>
					<option value="<?php echo $value?>"><?php echo $value;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">会员内容页模板：</span>
			</td>
			<td class="td_right">
				<select name="setting[member_content_tpl]">
					<?php foreach ($memberContent as $value) {?>
					<option value="<?php echo $value?>"><?php echo $value;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">独立模型</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="setting[is_alone]" />是</label>
				<label><input type="radio" value="2" name="setting[is_alone]" checked="checked" />否</label>
			</td>
		</tr>
		<tr>
			<td class="td_left">模型状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="m_status" checked="checked" />启用</label>
				<label><input type="radio" value="2" name="m_status" /> 禁用</label>
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