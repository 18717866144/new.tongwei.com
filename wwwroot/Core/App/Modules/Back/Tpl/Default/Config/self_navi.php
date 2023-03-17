<?php if (!defined('HX_CMS')) exit();?>
<div class="navi clearfix">
<div class="naviDesc">字段管理</div>
	<div class="naviAction">
		<a href="<?php echo U('index',array('group'=>'site'))?>" <?php if ($group=='site'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>站点配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'mutual'))?>" <?php if ($group=='mutual'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>交互配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'core'))?>" <?php if ($group=='core'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>核心配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'email'))?>" <?php if ($group=='email'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>邮件配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'attachment'))?>" <?php if ($group=='attachment'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>附件配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'debug'))?>" <?php if ($group=='debug'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>性能调试配置</u>
		</a>
		<a href="<?php echo U('index',array('group'=>'ext'))?>" <?php if ($group=='ext'&&ACTION_NAME=='index') echo 'class="current"'?>>
			<u>扩展配置</u>
		</a>
		<a href="<?php echo U('add')?>" <?php if (ACTION_NAME=='add') echo 'class="current"'?>>
			<u>添加配置</u>
		</a>
	</div>
</div>