<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">添加模块</div>
<form action="__ACTION__" method="post" id="postData">
<input type="hidden" value="<?php echo $config['module_dir']?>" name="module_dir" />
<table class="formTable">
	<tr>
		<td class="td_left">模块名称：</td>
		<td class="td_right"><?php echo $config['module_name']?></td>
	</tr>
	<tr>
		<td class="td_left">模块目录：</td>
		<td class="td_right"><?php echo $config['module_dir']?></td>
	</tr>
	<tr>
		<td class="td_left">模块描述：</td>
		<td class="td_right"><?php echo $config['description']?></td>
	</tr>
	<tr>
		<td class="td_left">模块版本：</td>
		<td class="td_right"><?php echo $config['version']?></td>
	</tr>
	<tr>
		<td class="td_left">模块数据表：</td>
		<td class="td_right"><?php echo $config['module_table']?></td>
	</tr>
	<tr>
		<td class="td_left"><input style="margin:0px;" type="submit" name="send" class="sub" value="开始安装" /></td>
		<td class="td_right">&nbsp;</td>
	</tr>
</table>
</form>
<include file="./Core/App/Tpl/global_footer.php" />