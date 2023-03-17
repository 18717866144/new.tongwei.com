<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">配置选项</div>
<form action="__ACTION__" method="post">
	<table class="formTable">
		<tr>
			<td class="td_left">是否自动发送邮件</td>
			<td class="td_right">				
				<label><input type="radio" value="1" name="sendMail" <?php echo $setting['sendMail'] == 1 ? 'checked="checked" ' : ''?> />是</label>
				<label><input type="radio" value="0" name="sendMail" <?php echo $setting['sendMail'] == 0 ? 'checked="checked" ' : ''?> />否</label>
			</td>
		</tr>
        
        <tr>
			<td class="td_left">提交申请开启验证码</td>
			<td class="td_right">				
				<label><input type="radio" value="1" name="start_code" <?php echo $setting['start_code'] == 1 ? 'checked="checked" ' : ''?> />是</label>
				<label><input type="radio" value="0" name="start_code" <?php echo $setting['start_code'] == 0 ? 'checked="checked" ' : ''?> />否</label>
			</td>
		</tr>
        
        <tr>
			<td class="td_left">提交申请时间间隔</td>
			<td class="td_right"><input type="text" size="20" name="time_limit" value="<?php echo $setting['time_limit']?>" />秒</td>
		</tr>        
        
        <tr>
			<td class="td_left">上传简历最小要求</td>
            <td class="td_right"><input type="text" size="20" name="minSize" value="<?php echo $setting['minSize'];?>">kb  <span style="color:#999; margin-left:15px;">提示：1MB=1024kb</span></td>
        </tr>
        
        <tr>
			<td class="td_left">上传简历最大限制</td>
            <td class="td_right"><input type="text" size="20" name="maxSize" value="<?php echo $setting['maxSize'];?>">kb</td>
        </tr>

        <tr>
			<td class="td_left">允许上传简历格式</td>
			<td class="td_right"><textarea style="width:200px;height:60px;" name="allowExtType"><?php foreach( $setting['allowExtType'] as $v){echo $v."\r\n";};?></textarea></td>
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