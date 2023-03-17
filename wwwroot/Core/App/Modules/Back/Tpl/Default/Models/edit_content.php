<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">编辑内容模型</div>
<form action="__ACTION__" method="post" id="formData">
	<input type="hidden" name="id" value="<?php echo $current['id']?>" />
	<input type="hidden" name="token" value="<?php echo $token?>" />
	<input type="hidden" name="model_type" value="<?php echo $current['model_type']?>" />
	<input type="hidden" name="table_name" value="<?php echo $current['table_name']?>" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">模型名称</span></td>
			<td class="td_right">
				<input type="text" class="text" size="35" value="<?php echo $current['model_name']?>" name="model_name" datatype="*1-30" errormsg="模型名称格式不正确！！！" />
				<span class="setDesc Validform_checktip">1-30个字符</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">模型表名</span></td>
			<td class="td_right">
				{-:C('DB_PREFIX')-}<span class="table_type_name" style="display: none;"></span><input type="text" id="table_exists" size="30" class="text normal" disabled="disabled" value="<?php echo $current['table_name']?>" name="table_name" datatype="/^[a-z][\w]{0,29}$/i" errormsg="模型表名格式不正确！"  />
				<span class="setDesc Validform_checktip">字母开头，1-30个字符，只能输入字母、数字和下划线。</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">模型备注</span></td>
			<td class="td_right">
				<textarea class="textCont" name="remark" cols="50" datatype="*0-255" dragonfly="dragonfly" errormsg="模型备注格式不正确！" ignore="ignore"><?php echo $current['remark']?></textarea>
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
					<option value="<?php echo $value?>" <?php echo $setting['back_list_tpl']==$value ? 'checked="checked"' : '';?>><?php echo $value;?></option>
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
					<option value="<?php echo $value?>" <?php echo $setting['back_content_tpl']==$value ? 'checked="checked"' : '';?>><?php echo $value;?></option>
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
					<option value="<?php echo $value?>" <?php echo $setting['member_list_tpl']==$value ? 'checked="checked"' : '';?>><?php echo $value;?></option>
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
					<option value="<?php echo $value?>" <?php echo $setting['member_content_tpl']==$value ? 'checked="checked"' : '';?>><?php echo $value;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
        <tr>
			<td class="td_left">辅助导航</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="setting[form_left_nav]" <?php echo $setting['form_left_nav']==1 ? 'checked="checked"' : '';?> />启用</label>
				<label><input type="radio" value="2" name="setting[form_left_nav]" <?php echo $setting['form_left_nav']==2 ? 'checked="checked"' : '';?> /> 禁用</label> <span style="color:#999">添加内容页面，启用辅助导航，适用于表单字段很长时启用</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">独立模型</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="setting[is_alone]" <?php echo $setting['is_alone']==1 ? 'checked="checked"' : '';?> disabled="disabled" />是</label>
				<label><input type="radio" value="2" name="setting[is_alone]" <?php echo $setting['is_alone']==2 ? 'checked="checked"' : '';?> disabled="disabled" />否</label>
				<input type="hidden" value="<?php echo $setting['is_alone'];?>" name="setting[is_alone]" />
			</td>
		</tr>
		<tr>
			<td class="td_left">模型状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="m_status" <?php echo $current['m_status']==1 ? 'checked="checked"' : '';?> />启用</label>
				<label><input type="radio" value="2" name="m_status" <?php echo $current['m_status']==2 ? 'checked="checked"' : '';?> /> 禁用</label>
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