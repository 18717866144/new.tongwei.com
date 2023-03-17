<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">编辑管理员组</div>
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" name="id" value="<?php echo $current['id']?>" />
<input type="hidden" name="token" value="<?php echo $token?>" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">组角色名：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="title" value="<?php echo $current['title']?>" datatype="s1-30" errormsg="组角色名格式不正确！" />
				<span class="setDesc Validform_checktip">1-30个字符</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">备注：</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="remark" datatype="s1-255" errormsg="备注格式不正确！"  ignore="ignore"><?php echo $current['remark']?></textarea>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">状态：</td>
			<td class="td_right">
				<label>正常&nbsp;<input type="radio" value="1" name="status" <?php echo $current['status']==1 ? 'checked="checked"' : '';?> /></label>
				<label>禁用&nbsp;<input type="radio" value="2" name="status" <?php echo $current['status']==1 ? 'checked="checked"' : '';?> /></label>
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