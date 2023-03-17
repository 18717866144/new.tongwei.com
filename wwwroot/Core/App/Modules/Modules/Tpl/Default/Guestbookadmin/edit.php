<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
	<table class="formTable">		
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">姓名</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" value="<?php echo $current['uname']?>" name="uname" datatype="*1-30" errormsg="姓名格式不正确！"/>
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>
		</tr>
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">手机</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" value="<?php echo $current['mobile']?>" name="mobile" datatype="m"  errormsg="手机号码格式不正确！" />
                <span class="setDesc Validform_checktip">11位手机号码</span>
            </td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">邮箱</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" value="<?php echo $current['email']?>" name="email" datatype="e" errormsg="邮箱格式不正确！" />
                <span class="setDesc  Validform_checktip">电子邮箱地址</span>
            </td>
		</tr>
	
		<tr>
			<td class="td_left">留言内容</td>
			<td class="td_right"><textarea class="textCont" cols="63" name="content" datatype="*1-255" errormsg="255个字符以内！！！"  ignore="ignore"><?php echo $current['content']?></textarea><span class="Validform_checktip setDesc">1-255个字符</span></td>
		</tr>
        
        <tr>
			<td class="td_left">回复内容</td>
			<td class="td_right"><textarea class="textCont" cols="63" name="reply" datatype="*0-255" errormsg="255个字符以内！！！"  ignore="ignore"><?php echo $current['reply']?></textarea><span class="Validform_checktip setDesc">0-255个字符</span></td>
		</tr>
        
        <tr>
			<td class="td_left">显示状态</td>
			<td class="td_right">
				已公开&nbsp;<input type="radio" value="1" name="status" <?php echo $current['status']==1 ? 'checked="checked"' : '';?> />
				未公开&nbsp;<input type="radio" value="0" name="status" <?php echo $current['status']==0 ? 'checked="checked"' : '';?> />
			</td>
		</tr>
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">排序</span></td>
			<td class="td_right">
				<input type="text" name="sort" class="text short" datatype="/^[\d]{1,8}$/" value="<?php echo $current['sort']?>" errormsg="排序格式不正确！"  />
				<span class="Validform_checktip setDesc">1-8个字符之间，只能输入数字并且第一位不能为零</span>
			</td>
		</tr>
        
         <tr>
			<td class="td_left">留言时间：</td>
			<td class="td_right">
				{-:date('Y-m-d H:i:s',$current['save_time'])-}
			</td>
		</tr>
        <tr>
			<td class="td_left">留言IP：</td>
			<td class="td_right">
				{-$current['ip']-}
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