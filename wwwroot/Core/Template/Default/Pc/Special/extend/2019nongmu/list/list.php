<!DOCTYPE html>
<!-- saved from url=(0051)http://z.tongwei.cn/special/specialid/119.html#twbd -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<title>2019第五届中国农业品牌年度盛典</title>
	<meta name="keywords" content="2019第五届中国农业品牌年度盛典">
	<meta name="description" content="2019第五届中国农业品牌年度盛典">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="/static/2019nongmu/bootstrap.min.css" rel="stylesheet">
	<link href="/static/2019nongmu/css1.css" rel="stylesheet">
	<link href="/static/2019nongmu/fitCss1.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="/static/2019nongmu/jquery.min.js"></script>
<link rel="stylesheet" href="/static/2019nongmu/layer.css" id="layui_layer_skinlayercss">

</head>
<body>

<div >
	<div id="top_banner">  
				
		<img src="/static/2019nongmu/20191223.jpg" alt="" style="width:100%;">
	
	</div>
</div>
<div id="nav-menu" class="fit-menu" >
		<div class="fmWrap" style="width:55%;">
		<ul class="ul-fmw clearfix" id="home">
			<li >
			<a href="/special/21.html">返回专题</a>
			</li>
			<li class="active">
			
			<a class="fmwList n-twbd" href="javascript:;">新闻报道</a>
			</li>
					
		</ul>
	</div>
</div>

<div class="twbd" id="twbd" style="width:60%;margin:10px auto;">
	
	<div class="row news clearfix" style="min-height:600px;">
				<div class="col-md-5 nw-r nw-l" style="width:100%;">
					<ul class="nw-r-ul">

                        <sql sql="select * from h_special_content where (specialid=21 and cid=15) or (specialid=21 and  is_link=1 ) order by save_time desc">
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
<script src="/static/2019nongmu/bootstrap.min.js"></script>
<script src="/static/2019nongmu/jquery.cookie.min.js"></script>
<script src="/static/2019nongmu/layer.min.js"></script>
<script type="text/javascript">
    var device_wid=$(window).width();     
    if(device_wid<600)
    {   
        $('#top_banner').html('<img src="/static/2019nongmu/20191223m.jpg" alt="" style="width:100%;">');
		
    }
	
	if(ishome){var dt= 0,ob;var wh=$(window).height()/2;ob=$('#home').find('li');ob.eq(0).attr('class','active');}else{$('#home').find('li').eq(3).attr('class','active');}
	if(!touch){
		$(window).scroll(function() {
			var scrollt=document.documentElement.scrollTop + document.body.scrollTop;
			if (scrollt>586){$("#nav-menu").addClass("navbar-fixed-top");}else{$("#nav-menu").removeClass("navbar-fixed-top");}
			if(ishome){
				dt=$(document).scrollTop();ob.removeAttr('class');
				if(dt>$('#hzmt').offset().top-wh){
					ob.eq(6).attr('class','active');
				}else if(dt>$('#nyqy').offset().top-wh){
					ob.eq(5).attr('class','active');
				}else if(dt>$('#nyjb').offset().top-wh){
					ob.eq(4).attr('class','active');
				}else if(dt>$('#twbd').offset().top-wh){
					ob.eq(3).attr('class','active');
				}else if(dt>$('#ltyc').offset().top-wh){
					ob.eq(2).attr('class','active');
				}else if(dt>$('#ltjj').offset().top-wh){
					ob.eq(1).attr('class','active');
				}else{
					ob.eq(0).attr('class','active');
				}
			}
		});
	}
	
</script>
<script src="/static/2019nongmu/core.php" charset="utf-8" type="text/javascript"></script>

</body></html>
