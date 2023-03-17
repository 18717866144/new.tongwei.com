<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">更新系统缓存</div>
<table class="formTable">
	<tr>
		<td class="td_left">更新导航缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'navigate'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">更新系统模型</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'models'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">管理员组权限</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'admin_rule'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">管理组导航</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'admin_navigate'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">会员组权限</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'member_rule'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">系统日志</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'logs'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">模块缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'modules'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">Memcache</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'compile'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">系统编译缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'compile'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">系统临时缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'temp'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">字段缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'field'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
    <tr>
		<td class="td_left">地区缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'regions'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
	<tr>
		<td class="td_left">全部缓存</td>
		<td class="td_right">
			<input type="button" onclick="window.location='<?php echo U('update_cache',array('type'=>'all'))?>'" value="更新" class="smallSub" />
		</td>
	</tr>
</table>
<include file="./Core/App/Tpl/global_footer.php" />