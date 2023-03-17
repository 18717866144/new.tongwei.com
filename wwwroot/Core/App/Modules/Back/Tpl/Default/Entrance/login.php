<?php if (!defined('HX_CMS')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<title><?php echo C('WEB_NAME');?> - 后台登录</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/modules/back/css/login.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/layer/layer.js"></script>
</head>
<body>
<div class="main clearfix" id="main">
	<form method="post" action="__ACTION__" id="login">
		<dl>
			<dt><span></span>网站管理登录</dt>
			<dd><label for="username">登录账户：</label><input type="text" class="username text" value="" name="username" /></dd>
			<dd><label for="username">登录密码：</label><input type="password" class="password text" value="" name="password"  /></dd>
			<dd><label for="username">登录验证：</label><input type="text" class="code" name="code" maxlength="4"  /><img class="code-img" 
 src="<?php echo U('Back/Entrance/get_code','w=115&h=32&l=4')?>" style="margin:0px 0px 0px 10px; cursor:pointer;" onclick="javascript:this.src=this.src+'&id='+Math.random();" /></dd>
			<dd><input type="submit" value="登 录 管 理" class="loginSub" /></dd>
		</dl>
	</form>
</div>
<script>
window.onload = function(){
	var _main = document.getElementById('main');
	_main.style.marginTop = (document.documentElement.clientHeight - _main.offsetHeight)/2+'px';
}
//预算表单
$('#login').submit(function(){	
	var $submit = $(this).find('.loginSub');
	var $code = $(this).find('.code-img');
	$submit.attr('disabled','true').addClass('disabled').val('正在提交申请');
	var url = $(this).attr('action');
	$.ajax({
		url:url,
		type:"post",
		data:$(this).serialize(),
		success: function(data){			
			console.log(data);			
			if(data.status==1){				
				$submit.val('登陆成功，正在进入');
				layer.msg('登 录 管 理',{icon:1,shift:0});
				setTimeout(function(){
					window.location.href = data.url;
				},1000);
			}else{
				$submit.val('登陆失败');
				layer.msg(data.info, {shift: 6});				
			}
		},
		error:function(request){
			$submit.val('登陆失败');
			layer.msg('登陆失败，请检查', {shift: 6});
		}
	});
	setTimeout(function(){
		$submit.attr('disabled',false).removeClass('disabled').val('登 录 管 理');
		$code.click();
	},3000);
	return false;
});
</script>
</body>
</html>