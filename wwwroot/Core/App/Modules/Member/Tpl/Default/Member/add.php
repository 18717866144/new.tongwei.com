<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">添加会员</div>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">E-mail：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="email" datatype="e,*10-40" ajaxurl="<?php echo U('Member/Entrance/check_front_email',array(),true,false,true)?>" errormsg="E-mail格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">密码：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="password" datatype="*6-16" errormsg="密码格式不正确！" />
				<span class="setDesc Validform_checktip">6-16个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">会员附加模型：</span>
			</td>
			<td class="td_right">
				<?php foreach ($models as $key=>$modelName) {?>
					<label><input type="radio" name="append_model" value="<?php echo $key?>" <?php echo $key==C('APPEND_MODEL') ? 'checked="checked"' : '';?> />&nbsp;<?php echo $modelName?></label>&nbsp;&nbsp;
				<?php }?>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">所属权限组：</span>
			</td>
			<td class="td_right">
				<?php foreach ($groupData as $values) {?>
					<input type="checkbox" name="group[]" datatype="need_1" value="<?php echo $values['id']?>" <?php echo $values['id']==C('MEMBER_DEFAULT_GROUP') ? 'checked="checked"' : '';?> errormsg="请选择所属权限！" />&nbsp;<?php echo $values['title']?>&nbsp;&nbsp;
				<?php }?>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">积分：</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo C('REGISTER_POINT')?>" name="points" datatype="n1-8" errormsg="积分格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">金钱：</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo C('REGISTER_MONEY')?>" name="money" datatype="n1-8" errormsg="金钱数格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">会员展示页默认皮肤：</span></td>
			<td class="td_right">
				<input type="text" value="default" name="skin" datatype="*1-30" errormsg="默认皮肤格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">称赞数：</span></td>
			<td class="td_right">
				<input type="text" value="0" name="zan" datatype="n1-8" errormsg="称赞数格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">验证状态：</td>
			<td class="td_right">
				<label>验证&nbsp;<input type="radio" value="1" name="is_checked" checked="checked" /></label>
				<label>未验证&nbsp;<input type="radio" value="2" name="is_checked" /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">会员状态：</td>
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