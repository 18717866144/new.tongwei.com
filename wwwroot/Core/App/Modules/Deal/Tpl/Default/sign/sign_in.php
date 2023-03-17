<?php if (!defined('HX_CMS')) exit();?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>签到</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
	<link href="/static/layui/css/layui.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/layui/layui.js"></script>
    
    <style>
       input::-webkit-input-placeholder {   
		 /* WebKit browsers */   
		color: #fff;   
		}  
		
		input::-moz-placeholder {   
		 /* Mozilla Firefox 19+ */   
		color: #fff;   
		}   
		input::-ms-input-placeholder{   
		 /* Internet Explorer 10+ */   
		color: #fff;   
		} 

		.layui-input{
			color:#fff;
			font-size:16px;
		}

		.bg-tm{
			background:rgba(0, 0, 0, 0);border:0px;border-bottom:1px solid #fff;
		}
    </style> 
 
</head>
  <body style="background: url(static/2018shuichan/qiandao-bg.png) center top no-repeat;
    background-size: 100%;">
      

       <form class="layui-form" action="" style="padding:10px;margin:105px 20px 20px;">
		  <div class="layui-form-item">
		    <!-- <div class="layui-block" style="height:30px;line-height:30px;">姓 名</div> -->
		    <div class="layui-block">
		      <input type="text" name="u_name" lay-verify="" autocomplete="off" placeholder="您的姓名" class="layui-input bg-tm" >
		    </div>
		  </div>

		  <div class="layui-form-item" style="margin:40px 0px;">
		    <!-- <div  class="layui-block" style="height:30px;line-height:30px;">手 机</div> -->
		    <div class="layui-block">
		      <input type="text" name="u_phone" lay-verify="phone" autocomplete="off" placeholder="您的手机号"  class="layui-input bg-tm" maxlength="11">
		    </div>
		  </div>
 
		  <div class="layui-form-item" style="margin-top:60px;">
		    <div class="layui-block" >
		      <button class="layui-btn" lay-submit="" lay-filter="ljqd" style="width:100%;height:60px;line-height:60px;border-radius:40px;border:1px solid #fff;background:rgba(0, 0, 0, 0);font-size:26px;">立即签到</button>
		    </div>
		  </div>

	   </form>	  




	   <script>

          layui.use(['form','layer'], function(){
			  var $ = layui.jquery
			  ,form = layui.form
			  ,layer = layui.layer;


              form.on('submit(ljqd)', function(data){
			     
			     var phone=data.field.u_phone;			    
                 // 验证手机号
                 var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;  
                 if (!myreg.test(phone)) {  

                     layer.msg('手机号不正确');

                 }

                 $.ajax({
			                url:'qiandao_deal.html',
			                type:'post',
			                dataType:'json',
			                data:data.field,
			                success:function(e){	
			                     var msg=e.msg;			                         
			                     layer.msg(msg,{time: 1500},function(){
			                     	window.location.reload();
			                     }); 

			                       
			                   
			                   
			                },
			                error:function(){
		                          layer.msg('网络错误!请重试',{time:2000});
			                }



			          });
                 

			     return false;
			  });


		 });	  


	   </script>

  </body>
</html>