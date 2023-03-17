<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">修改管理员</div>
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<input type="hidden" value="<?php echo $token?>" name="token" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">用户名：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" value="<?php echo $current['username']?>" size="35" name="username" datatype="/^[a-z][\w]{4,11}$/i" ajaxurl="<?php echo U('Back/Public/check_back_username',array('id'=>$current['id']))?>" errormsg="用户名格式不正确！" />
				<span class="setDesc Validform_checktip">字母开头，5-12位，只能包含[a-z\w],添加成功后不可更改</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">密码：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="password" datatype="/^(.{6,16})?$/" errormsg="密码格式不正确！" />
				<span class="setDesc Validform_checktip">6-16个字符之间，为空则不修改</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">真实姓名：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="truename" value="<?php echo $current['truename']?>" datatype="/^[\u4E00-\uFA29]{2,7}$/" ignore="ignore" errormsg="真实姓名格式不正确！" />
				<span class="setDesc Validform_checktip">2-7个字符之间，只能是汉字</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">Q Q：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="qq" value="<?php echo $current['qq']?>" datatype="/^[1-9][0-9]{4,10}$/" errormsg="QQ号码格式不正确！" ignore="ignore" />
				<span class="setDesc Validform_checktip">请输入正确的QQ号码。</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">所属权限组：</span>
			</td>
			<td class="td_right">
				<?php foreach ($groupData as $values) {?>
					<label><input type="checkbox" name="group[]" value="<?php echo $values['id']?>" datatype="need_1" <?php echo in_array($values['id'], $group) ? 'checked="chekced"' : '';?> errormsg="请选择所属权限！" />&nbsp;<?php echo $values['title']?></label>
				<?php }?>
				<span class="setDesc Validform_checktip"></span>
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
				<label>正常&nbsp;<input type="radio" value="1" name="admin_status" <?php echo $current['admin_status']==1 ? 'checked="checked" ' : '';?>/></label>
				<label>禁用&nbsp;<input type="radio" value="2" name="admin_status" <?php echo $current['admin_status']==2 ? 'checked="checked" ' : '';?>/></label>
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