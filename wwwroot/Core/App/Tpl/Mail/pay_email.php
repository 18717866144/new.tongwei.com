<?php if (!defined('HX_CMS')) exit(); ?>
<div style="padding: 30px">
	<div><p>尊敬的用户，您好，<b>{$email}</b>：</p>
</div>
<div style="margin: 6px 0 60px 0;">
	<p>感谢您的充值，祝您游戏愉快，以下是您的充值信息：</p>
	<p>充值账号: {$username}</p>
	<p>订单号: {$order_id}</p>
	<p>充值金额: {$money}</p>
	<p>订单号是您的充值凭证，请您妥善保管，不要透露给他人</p>
	<p>如您在充值过程中遇到问题，您可以查看关于充值问题的常见问题解答，如还是不能解决您的问题，</p>
	<p>欢迎您在常见问题解答页面点击"我有问题要寻求客服帮助>>"与我们支付组的客服人员联系</p>
</div>
<div style="color: #999;">
	<p>
	发件时间：
	<span times=" 09:06" t="5" style="border-bottom:1px dashed #ccc;"><?php echo date('Y/m/d',NOW_TIME)?></span>
	<?php echo date('h:i:s',NOW_TIME)?>
	</p>
	<p>此邮件为系统自动发出的，请勿直接回复。</p>
</div>
</div>
