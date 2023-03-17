<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<style type="text/css">
div.select_fields_div {
    height: 150px;
    width: 110px;
    background: #F9F9F9;
    border-color: #666666 #CCCCCC #CCCCCC #666666;
    border-style: solid;
    border-width: 1px;
    font-size: 13px;
    padding: 5px;
	overflow-y:auto;
}
div.select_fields_div a {
	display:block;height:22px;line-height:22px;
}
</style>
<div class="operateTitle">添加行为</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">行为标识</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="name" datatype="/^[\w]{1,30}$/i" errormsg="行为名格式不正确！" />
				<span class="setDesc Validform_checktip">30个字符，包含，字母，数字，下划线.</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">用户模型字段</td>
			<td class="td_right">
				<div>
					<textarea name="fields" cols="35" id="fields" rows="10" datatype="*"  errormsg="用户模型字段不能为空！"></textarea>
					<span class="setDesc Validform_checktip"></span>
				</div>
				<div class="marginTop10">
					<p>格式：field:isEmpty，如field:1</p>
					<p>1表示不可为空，其它则表示可以为空</p>
					<p>内置字段将不会显示</p>
				</div>
				<div class="marginTop10">
					<div id="model_type" class="FL select_fields_div">
						<?php foreach ($models as $values) {?>
							<a href="javascript:;" onclick="$.CR.B.getModelFields(<?php echo $values['id']?>)"><?php echo $values['model_name']?></a>
						<?php }?>
					</div>
					<div id="select_fields" class="FL select_fields_div" style="margin-left: 15px;"></div>
				</div>
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
			<td class="td_left">状态：</td>
			<td class="td_right">
				<label>正常&nbsp;<input type="radio" value="1" name="m_status" checked="checked" /></label>
				<label>禁用&nbsp;<input type="radio" value="2" name="m_status" /></label>
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