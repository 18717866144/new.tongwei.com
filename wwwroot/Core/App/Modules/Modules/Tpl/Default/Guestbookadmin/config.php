<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">留言反馈配置</div>
<form action="__ACTION__" method="post">
	<table class="formTable">
		<tr>
			<td class="td_left">时间间隔</td>
			<td class="td_right"><input type="text" size="10" name="time_limit" value="<?php echo $setting['time_limit']?>" />秒</td>
		</tr>
        
        <tr>
			<td class="td_left">开启验证码</td>
			<td class="td_right">
				
					<label><input type="radio" value="1" name="start_code" <?php echo $setting['start_code'] == 1 ? 'checked="checked" ' : ''?> />是</label>
					<label><input type="radio" value="0" name="start_code" <?php echo $setting['start_code'] == 2 ? 'checked="checked" ' : ''?> />否</label>
				
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