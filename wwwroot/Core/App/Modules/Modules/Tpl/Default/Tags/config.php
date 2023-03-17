<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="__ACTION__" method="post" id="postData">
	<table class="formTable">
		<tr>
			<td class="td_left">Tags链接</td>
			<td class="td_right">
				<div>
					<label><input type="radio" value="1" name="url_type" <?php echo $setting['url_type'] == 1 ? 'checked="checked" ' : ''?> />静态</label>
					<label><input type="radio" value="2" name="url_type" <?php echo $setting['url_type'] == 2 ? 'checked="checked" ' : ''?> />伪静态</label>
					<label><input type="radio" value="3" name="url_type" <?php echo $setting['url_type'] == 3 ? 'checked="checked" ' : ''?> />动态</label>
				</div>
				<div style="margin-top:10px;">静　态：<input type="text" name="url_1" size="55" value="<?php echo $setting['url_1']?>" /></div><!-- tags/{$tag}.html|tags/{$tag}-{$page}.html -->
				<div style="margin-top:10px;">伪静态：<input type="text" name="url_2" size="55" value="<?php echo $setting['url_2']?>" /></div><!-- tags/{$tag}.html|tags/{$tag}-{$page}.html -->
				<div style="margin-top:10px;">动　态：<input type="text" name="url_3" size="55" value="<?php echo $setting['url_3']?>" /></div><!-- index.php/Module/Tagsindex/tag/{$tag}|index.php/Module/Tagsindex/tag/{$tag}/page/{$page} -->
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