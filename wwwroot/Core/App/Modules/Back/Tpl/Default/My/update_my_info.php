<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">修改我的信息</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="Validform_label">密码：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="password" datatype="/^(.{6,16})?$/" errormsg="密码格式不正确！" />
				<span class="setDesc Validform_checktip">6-16个字符之间，为空则不修改</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">真实姓名：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="truename" value="<?php echo $session['truename']?>" datatype="/^[\u4E00-\uFA29]{2,7}$/" ignore="ignore" errormsg="真实姓名格式不正确！" />
				<span class="setDesc Validform_checktip">2-7个字符之间，只能是汉字</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">Q Q：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="qq" value="<?php echo $session['qq']?>" datatype="/^[1-9][0-9]{4,10}$/" errormsg="QQ号码格式不正确！" ignore="ignore" />
				<span class="setDesc Validform_checktip">请输入正确的QQ号码。</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">备注：</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="remark" datatype="s1-255" errormsg="备注格式不正确！"  ignore="ignore"><?php echo $session['remark']?></textarea>
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