<!DOCTYPE html>
<!-- saved from url=(0051)http://z.tongwei.cn/special/specialid/119.html#twbd -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>2018（第十二届）中国品牌节</title>
	<meta name="keywords" content="2018（第十二届）中国品牌节">
	<meta name="description" content="2018（第十二届）中国品牌节">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="/static/2018pinpaijie/bootstrap.min.css" rel="stylesheet">
	<link href="/static/2018pinpaijie/css1.css" rel="stylesheet">
	<link href="/static/2018pinpaijie/fitCss1.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2018pinpaijie/jquery.min.js"></script>
<link rel="stylesheet" href="/static/2018pinpaijie/layer.css" id="layui_layer_skinlayercss">

</head>
<body>

<!-- <div class="banner"><div class="banWrap"></div></div> -->
<div >
	<div >
	<php>
		$agent = strtolower($_SERVER['HTTP_USER_AGENT']);
	
		$is_iphone = (strpos($agent, 'iphone')) ? true : false;
		$is_ipad = (strpos($agent, 'ipad')) ? true : false;
		$is_android = (strpos($agent, 'android')) ? true : false;  

		$map = array();
		$map['specialid'] = 12;		
        
        if($is_iphone||$is_ipad||$is_android)
		$map['typeid'] = 6;
		else
        $map['typeid'] = 5;

		$map['a_status'] = 1;
		$specialContent=M('SpecialContent');
		$currentData = $specialContent->where($map)->order('sort desc')->find();
		</php>
		<img src="{-$currentData.thumbnail-}" alt=""  id="toutu">
	</div>
</div>
<div id="nav-menu" class="fit-menu" style="width:100%;">
		<div class="fmWrap" style="width:900px;">
		<ul class="ul-fmw clearfix" id="home">
			<li >
			<a href="/special/12.html">返回专题</a>
			</li>

              <li class="active">
			
			<a class="fmwList n-twbd" href="javascript:;">精彩图文</a>
			</li>

					
		</ul>
	</div>
</div>

<div class="twbd" id="twbd" style="width:900px;margin:10px auto;min-height:800px;">
	
	<div class="row news clearfix" style="min-height:600px;">
				<div class="col-md-5 nw-r nw-l" style="width:100%;">
					<ul class="nw-r-ul">

                       
                       <sql sql="select * from h_special_content where specialid=12 and typeid=2 order by save_time desc">

                            <li class="nw-li-a">
								<a href="{-$values['url']-}" target="_blank">
									{-:($values['title'])-}
								</a>
							</li>

						</sql>	

						<sql sql="select * from h_special_content where specialid=12 and typeid=3 order by save_time desc">

                            <li class="nw-li-a">
								<a href="{-$values['url']-}" target="_blank">
									{-:($values['title'])-}
								</a>
							</li>

						</sql>	
                     


					</ul>
	</div>
	</div>
				
			
</div>



<div class="footer">
	<div class="ft_btm">
		<div class="ftbWp">
			<div class="ft-link">
				
			</div>
			<div class="ft-copy"> <a href="http://www.tongwei.com/">通威集团</a> <span>All Rights Reserved.</span> 蜀ICP备14018337号</div>
		</div>
	</div>
</div>
<script src="/static/2018pinpaijie/bootstrap.min.js"></script>
<script src="/static/2018pinpaijie/jquery.cookie.min.js"></script>
<script src="/static/2018pinpaijie/layer.min.js"></script>
<script type="text/javascript"> 


	var device_wid=$(window).width();

    if(device_wid<600)
    {
    	$('#twbd').css('width','100%');
    	$('#nav-menu .fmWrap').css('width','100%');
    	toutu='150px';
    
    }	

</script>


</body></html>
