<?php if (!defined('HX_CMS')) exit(); ?>
<div style="padding: 30px">
	<div><p>您好，<b>{$email}({$username})</b>：</p>
</div>
<div style="margin: 6px 0 60px 0;">
	<p>请点击下面的链接来认证您的邮箱，以确认修改或绑定！</p>
	<p><a href="{$url}" target="_blank">{$url}</a></p>
	<p>如果您的邮箱不支持链接点击，请将以上链接地址拷贝到你的浏览器地址栏中认证。</p>
</div>
<div style="color: #999;">
	<p>
	发件时间：
	<span times=" 09:06" t="5" style="border-bottom:1px dashed #ccc;"><?php echo date('Y/m/d',time())?></span>
	<?php echo date('h:i:s',time())?>
	</p>
	<p>此邮件为系统自动发出的，请勿直接回复。</p>
</div>
</div>