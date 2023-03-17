<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">添加封禁IP</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">起始IP：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="start_ip" datatype="/^[\d\.]{7,15}$/" errormsg="起始格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">结束IP：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="end_ip" datatype="/^[\d\.]{7,15}$/" ignore="ignore" errormsg="结束IP格式不正确！" />
				<span class="setDesc Validform_checktip">不填写则只验证单独起始IP</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">解封时间：</span></td>
			<td class="td_right">				
                <?php echo FormElements::date('lifted_time',date('Y-m-d H:i:s',NOW_TIME+604800),1,1,1,1,' class="text normal" datatype="*" errormsg="解封时间格式不正确！"')?>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">备注：</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="remark" datatype="*1-150" errormsg="备注格式不正确！"  ignore="ignore"></textarea>
				<span class="setDesc Validform_checktip"></span>
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