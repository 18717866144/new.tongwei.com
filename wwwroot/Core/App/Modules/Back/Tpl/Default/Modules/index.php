<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="topTip"><b>提示：</b>安装或修改模块后，必须更新系统缓存才可生效，非超管权限用户需要修改相应权限组； </div>
<table class="showTable">
	<tr>
		<th width="10%">模块名称</th>
		<th width="10%">模块目录</th>
		<th width="5%">版本号</th>
		<th width="15%">安装日期</th>
		<th width="15%">更新日期</th>
		<th width="25%">模块数据表</th>
		<th width="15%">操作</th>
	</tr>
		<?php foreach ($modules as $values) {?>
		<tr>
			<td><?php echo $values['module_name']?></td>
			<td><?php echo $values['module_dir']?></td>
			<td><?php echo $values['version']?></td>
			<td><?php echo $values['install_time']?></td>
			<td><?php echo $values['update_time']?></td>
			<td><?php echo $values['install_table']?></td>
			<td>
				<?php if ($values['is_install'] == 3) {?>
					<span class="disabled">内置</span>
				<?php } elseif ($values['is_install'] == 1) {?>
						<?php if (in_array('delete', $ruleOperate)) {?>
							<a href="javascript:;" onclick="_confirm('是否确定要卸载？',function(){location.href='<?php echo U('delete',array('module_dir'=>$values['module_dir']))?>'})">卸载</a>
						<?php }?>
							<?php if (in_array('m_status', $ruleOperate)) {?>
							&nbsp;|&nbsp;
							<?php if ($values['is_disabled'] == 1) { ?>
								<a href="<?php echo U('m_status',array('module_dir'=>$values['module_dir'],'m_status'=>2))?>">禁用</a>
							<?php } else {?>
								<a href="<?php echo U('m_status',array('module_dir'=>$values['module_dir'],'m_status'=>1))?>"  class="setRed">开启</a>
							<?php }?>
						<?php }?>
				<?php  } else {?>
						<?php if (in_array('add', $ruleOperate)) {?>
							<a href="<?php echo U('add',array('module_dir'=>$values['module_dir']))?>" class="setGreen">安装</a>
						<?php }?>
				<?php }?>
			</td>
		</tr>
		<?php }?>
</table>
<include file="./Core/App/Tpl/global_footer.php" />