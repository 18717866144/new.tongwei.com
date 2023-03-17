<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">编辑会员</div>
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" value="<?php echo $mainData['id']?>" name="id" />
	<table class="formTable">
		<tr>
			<td class="td_left">&nbsp;<span class="Validform_label">E-mail：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="email" ignore="ignore" datatype="e,*10-40" value="<?php echo $mainData['email'];?>" errormsg="E-mail格式不正确！" /><!-- ajaxurl="<?php echo U('Member/Entrance/check_front_email',array('id'=>$mainData['id']),true,false,true)?>"  -->
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">&nbsp;<span class="Validform_label">密码：</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" ignore="ignore" name="password" datatype="*6-16" value="" errormsg="密码格式不正确！" />
				<span class="setDesc Validform_checktip">为空不修改，6-16个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">
				<span class="setRed">*</span>&nbsp;<span class="Validform_label">会员附加模型：</span>
			</td>
			<td class="td_right">
				<?php foreach ($models as $key=>$modelName) {
					if ($key == C('MEMBER_MAIN_MODEL')) continue;
				?>
					<label><input type="radio" name="append_model" value="<?php echo $key?>" <?php echo $key==$mainData['append_model'] ? 'checked="checked"' : '';?> />&nbsp;<?php echo $modelName;?></label>&nbsp;&nbsp;
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
					<input type="checkbox" name="group[]" datatype="need_1" value="<?php echo $values['id'];?>" <?php echo in_array($values['id'], $group) ? 'checked="checked"' : '';?> errormsg="请选择所属权限！" />&nbsp;<?php echo $values['title']?>&nbsp;&nbsp;
				<?php }?>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">积分：</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo $mainData['points'];?>" name="points" datatype="n1-8" errormsg="积分格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">金钱：</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo $mainData['money'];?>" name="money" datatype="n1-8" errormsg="金钱数格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">消费：</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo $mainData['money'];?>" name="spent" datatype="n1-8" errormsg="消费数格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">会员展示页默认皮肤：</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo $appendData['skin']?>" name="skin" datatype="*1-30" errormsg="默认皮肤格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">会员状态：</td>
			<td class="td_right">
				<label>正常&nbsp;<input type="radio" value="1" name="m_status" <?php echo ($mainData['m_status']==1) ? 'checked="checked"' : '';?> /></label>
				<label>未认证&nbsp;<input type="radio" value="3" name="m_status" <?php echo ($mainData['m_status']==3) ? 'checked="checked"' : '';?> /></label>
				<label>禁止&nbsp;<input type="radio" value="2" name="m_status" <?php echo ($mainData['m_status']==2) ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<?php $newfieldArray = array_merge($fieldArray['is_basic'],(array)$fieldArray['is_append']);unset($fieldArray);foreach ($newfieldArray as $values) {?>
		<?php print_r($fieldArray);?>
			<tr>
				<td class="td_left" style="width:100px;">
				<?php if ($values['field_setting']['is_required']==1) {echo '<font color="red">*</font>&nbsp;';}?>
				<span class="Validform_label"><?php echo $values['nick_name']?></span>
				</td>
				<td class="td_right" style="width:auto;">
					<?php echo $values['html'];?>
					<?php if ($values['form_type'] != 'editor') {?>
						<span class="setDesc  Validform_checktip"><?php echo $values['tips']?></span>
					<?php }?>
				</td>
			</tr>
		<?php }?>
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<input type="submit" name="send" class="sub" value="提交" />
				<input type="reset" class="sub" />
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
$(function(){
	$("#formData").Validform({
		datatype:{//传入自定义datatype类型【方式二】;
			"check_card":function(gets,obj,curform,regxp){
				return IdCardValidate(gets);
			}
		}
	});
})
</script>
<include file="./Core/App/Tpl/global_footer.php" />