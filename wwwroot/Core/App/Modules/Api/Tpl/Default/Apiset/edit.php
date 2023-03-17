<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">修改Api信息</div>
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">Api说明</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" value="<?php echo $current['title']?>" name="title" datatype="*1-50" errormsg="Api说明格式不正确！" />
				<span class="setDesc Validform_checktip">50个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">Api标识</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" value="<?php echo $current['name']?>" name="name" datatype="/^[\w]{1,25}$/i" ajaxurl="<?php echo U('Back/Public/check_api_set',array('id'=>$current['id']))?>" errormsg="Api标识格式不正确！" />
				<span class="setDesc Validform_checktip">字母或数字或下划线</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">Api_ID</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="api_id" value="<?php echo $current['api_id']?>" datatype="/^[\w]{1,30}$/i" errormsg="Api_ID格式不正确！" />
				<span class="setDesc Validform_checktip">30个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">Api_Key</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="api_key" value="<?php echo $current['api_key']?>" datatype="/^[\w]{1,255}$/i" errormsg="Api_Key格式不正确！" />
				<span class="setDesc Validform_checktip">字母或数字或下划线</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">扩展：</td>
			<td class="td_right">
				<textarea class="textCont" cols="50" name="ext" datatype="*1-255" errormsg="扩展格式不正确！"  ignore="ignore"><?php echo $current['ext']?></textarea>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">状态：</td>
			<td class="td_right">
				<label>正常&nbsp;<input type="radio" value="1" name="a_status" <?php echo $current['a_status']==1 ? 'checked="checked"' : '';?> /></label>
				<label>禁用&nbsp;<input type="radio" value="2" name="a_status" <?php echo $current['a_status']==2 ? 'checked="checked"' : '';?> /></label>
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