<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">评论配置</div>
<form action="__ACTION__" method="post">
	<table class="formTable">
		<tr>
			<td class="td_left">允许游客评论</td>
			<td class="td_right">
				<div>
					<label><input type="radio" value="1" name="allow_visitor" <?php echo $setting['allow_visitor'] == 1 ? 'checked="checked" ' : ''?> />允许</label>
					<label><input type="radio" value="2" name="allow_visitor" <?php echo $setting['allow_visitor'] == 2 ? 'checked="checked" ' : ''?> />不允许</label>
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left">评论是否审核</td>
			<td class="td_right">
				<div>
					<label><input type="radio" value="2" name="is_checked" <?php echo $setting['is_checked'] == 2 ? 'checked="checked" ' : ''?> />审核</label>
					<label><input type="radio" value="1" name="is_checked" <?php echo $setting['is_checked'] == 1 ? 'checked="checked" ' : ''?> />不审核</label>
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left">开启验证码</td>
			<td class="td_right">
				<div>
					<label><input type="radio" value="1" name="start_code" <?php echo $setting['start_code'] == 1 ? 'checked="checked" ' : ''?> />开启</label>
					<label><input type="radio" value="2" name="start_code" <?php echo $setting['start_code'] == 2 ? 'checked="checked" ' : ''?> />不开启</label>
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left">评论发表间隔时间</td>
			<td class="td_right">
				<input type="text" size="10" name="time_limit" value="<?php echo $setting['time_limit'] ? $setting['time_limit'] : 0;?>" />秒
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