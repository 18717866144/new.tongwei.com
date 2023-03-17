<?php if (!defined('HX_CMS')) exit(); ?>
<div>
	亲爱的用户，
</div>
<br />您好！欢迎您成为<b><?php echo C('WEB_NAME')?></b>的会员，点击下面的链接即可完成注册：<br /><br />
<a target="_blank" href="{$url}">{$url}</a><br />
<font color="#999999">(如果链接无法点击，请将它复制并粘贴到浏览器的地址栏中访问)</font><br /><br />
<div></div>
您的Email：
<a href="mailto:{$email}" target="_blank">
{$email}
</a>
<br>
<br>
<div>
<br>
本邮件是系统自动发送的，请勿直接回复！感谢您的访问，
<wbr></wbr>
祝您使用愉快！
<br>
<br>
<?php echo C('WEB_NAME')?>
<br>
<a target="_blank" href="<?php echo C('WEB_URL')?>"><?php echo C('WEB_URL')?></a>
<br>
</div>