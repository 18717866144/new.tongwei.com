<?php defined('HX_CMS') or exit;?> 
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>2019第三届水产科技大会投票系统</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-status-bar-style" content="black"> 
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="/static/layui/css/layui.css">
  <style>
     .layui-colla-content{
		 padding:10px;
	 }
  
     .layui-container{
		 padding:0px;
	 }
     
     .box{
		 border:1px solid #f2f2f2;
		 margin-bottom:1rem;
		 padding:.4rem 0rem .8rem;
	 }
	 
	 .p-side{
		 padding:0rem .2rem;
	 }
     
     .h{
		 height:6rem;
	 }
	 
	 .tit{
		 height:2.4rem;
		 line-height:2.8rem;
		 color:#333;
		 font-size:0.9rem;
		 font-weight:bold;
		 overflow:hidden;
	 }
	 
	 .des{
		 height:3rem;
		 color:#888;
		 font-size:.7rem;
		 overflow:hidden;
	 }
	 
	 .v-t{
		 height:2.4rem;
		 line-height:2.8rem;
		 font-size:.7rem;
	 }
	 
	 .btn-l{
		 height:1.5rem;
		 
	 }
	 
	 .v-btn{
		 width:98%;
		 height:1.5rem;
		 line-height:1.5rem;
		 text-align:center;
		 color:#fff;
		 display:inline-block;
	 }
	 
	 .v-btn-col1{
		 background-color:#1E9FFF;
	 }
	 
	 .v-btn-col2{
		 background-color:#009688;
	 }
	 
	 .t-center{
		 text-align:center;
	 }
  
     .l-h60{
		 line-height:6rem;
	 }
	 
	 .mgn-bt4{
		 margin-bottom:.6rem;
	 }
	 
	 .layui-input-block{
		 margin-left:0px;
		 float:left;
	 }
	 
	 #vote_rule{
		display: inline-block;
		height: 38px;
		line-height: 38px;
		padding: 0x;
		color: #444;
		white-space: nowrap;
		text-align: center;
		font-size: 14px;
		border: none;		
		cursor: pointer;
	 }
  
  </style>
</head>
<body >
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]--> 

<div class="layui-container">   
  <div class="layui-ro">
     
	 <div class="layui-col-xs12">
	   <img src="{-$info['activity_logo_url']-}" style="width:100%">
	 </div>
	 
	 <div class="layui-col-xs12" style="height:2rem;line-height:2rem;font-size:.7rem;color:#777;padding-left:10px;" id="count_date">
	   
	 </div>
	 
	 <div class="layui-col-xs12">
	    <form class="layui-form" style="width:100%;">
		   
		    <div class="layui-form-item" style="width:94%;padding:0px 10px;">
				<div class="layui-input-block" style="width:60%">
				  <input type="text" name="qy_name" id="qy_name" placeholder="输入企业名称或关键词" autocomplete="off" class="layui-input" style="border-right:none;border-radius:0px;">
				  <input type="hidden" name="activity_id" value="1">
				  <input type="hidden" name="on" value="1">
				</div>
				<div class="layui-input-block" style="width:20%">
				  <button class="layui-btn layui-btn-normal" lay-submit lay-filter="search" style="border-radius:0px;">搜 索</button>
				</div>
				
				<div class="layui-input-block" style="width:20%;font-size:.8rem;text-align:right;">
				  <a href="/static/2019shuichan/rule.docx" id="vote_rule">投票规则</a>
				</div>
		    </div>		   
		   		
		</form>		
		
	 </div>
  
  </div> 
</div>

<div class="layui-collapse" lay-accordion>

<empty name="enterps">
没有相关企业!

<else /> 

<volist name="enterps" key="key1" id="vo">

  <div class="layui-colla-item" data-all="{-$vo['votes_all']-}">
    <h2 class="layui-colla-title">{-$vo["award_name"]-}</h2>
    <div class="layui-colla-content <if condition='$key eq 1'>layui-show</if>" >
	    
		<div class="layui-container"> 
		
		  <volist name="vo['qiyes']" id="qy">
			<div class="layui-row box h">
				<div class="layui-col-xs3 h l-h60">
					<img src="{-$qy["logo_url"]-}" style="width:100%;">
				</div>	
				<div class="layui-col-xs7 p-side">
					
					<div class="layui-row">
						<div class="layui-col-xs12 tit">
						  {-$qy["qy_name"]-}
						</div>
						<div class="layui-col-xs12 des">
						  {-$qy["qy_desp"]-}
						</div>
					</div>
					
				</div>	
				<div class="layui-col-xs2">
				  <div class="layui-row">
					 <div class="layui-col-xs12 v-t">
					 	<span class="v-t-no">{-$qy['votes']-}</span>票 <span class="v-t-per">{-$qy['votes']*100/$vo['votes_all']|substr=0,4-}</span>%
					 </div>
					 <div class="layui-col-xs12 btn-l mgn-bt4" onclick="go_vote({-$vo['award_id']-},{-$qy['enterp_id']-},this)">
					   <a href="javascript:;" class="v-btn v-btn-col1">投票</a>
					 </div>
					 <div class="layui-col-xs12 btn-l" onclick="sharef('快来为{-$qy.qy_name-}投票吧！','{-$qy.qy_name-}')">
					   <a href="javascript:;" class="v-btn v-btn-col2">分享</a>
					 </div>
				  
				  </div>		  
				  
				</div>				
			</div>
	      </volist>	 	
			

		</div>
	
	</div>
  </div>
  
</volist>


</empty>





</div>



<script src="/static/layui/layui.js"></script>
<script>
/* 投票开始时间设置 */
var start_time = new Date('2019/3/20 00:00:00').getTime();

layui.use(['layer','element'], function(){
  var $ = layui.$,
      layer = layui.layer,
      element = layui.element;     
	 
	  
	  
});

function go_vote(award_id,ent_id,obj){
    //localStorage.setItem("vote_count",0);return false;
    //var vote_on = localStorage.getItem("vote_on");console.log(vote_on);return false;
    if(localStorage.vote_on)
	{
		var vote_on = localStorage.getItem("vote_on");
		if(vote_on=='off')
		return false;
	    		
	}
	
	/* 判断投票开始没 */
	//var start_time=new Date('2019/3/20 00:00:00').getTime();
	var nowTime=new Date().getTime();
    if(start_time>nowTime)
	{
		layer.msg('投票还没开始!',{time:800});return false;
	}		
    
    var full_date = "{-$vote_date-}";
	//localStorage.setItem("vote_count",0);return false;
	if(!localStorage.vote_count)
	{						  
		localStorage.setItem("vote_count",0);
        localStorage.setItem("vote_date",full_date);		
	}
	else{
		var tmp_date = localStorage.getItem("vote_date");
		if(tmp_date !=full_date)
		{
			localStorage.setItem("vote_count",0);
			localStorage.setItem("vote_date",full_date);
		}
		else{			
			var c = parseInt(localStorage.getItem("vote_count"));	
			if(c>=10)
			{
				layer.msg('您今天的投票已用完！',{time:800});return false;
			}			
		}									 
	}
	
	layui.use(['layer'], function(){
	      var $ = layui.$,
		  layer = layui.layer;  		 

		  //console.log($(obj).parents('.layui-colla-item').attr('data-all'));return false; 
		 
		  $.ajax({
			  url:'/index.php/content/index/dealvote', 
			  type:'post',
			  dataType:'json',
			  data:{award_id:award_id,ent_id:ent_id},
			  success:function(e){				  
				  if(e.code)
				  {
					  layer.msg(e.msg);	
					  var c = parseInt(localStorage.getItem("vote_count"));	
					  localStorage.setItem("vote_count",c+1);  
                      
                      /* dom改变投票数及占比 */
                      var now_data_all = parseInt($(obj).parents('.layui-colla-item').attr('data-all'))+1;
                      var this_vote_no = parseInt($(obj).prev().find('.v-t-no').html())+1;
                      var this_vote_per = Math.round((this_vote_no/now_data_all)*1000)/10;

                      $(obj).parents('.layui-colla-item').attr('data-all',now_data_all);
                      $(obj).prev().find('.v-t-no').html(this_vote_no);
                      $(obj).prev().find('.v-t-per').html(this_vote_per);

                      var others = $(obj).parents('.box').siblings();		 
		  
					  $.each(others, function(){
					  	   var vote_no = parseInt($(this).find('.v-t-no').html());
					  	   var vote_per = Math.round((vote_no/now_data_all)*1000)/10;
						   $(this).find('.v-t-per').html(vote_per)
					  });  


				  }
				  else
				      layer.msg(e.msg);
			  }			  
			  
		  });		  
	});		
}


</script>

<script src="http://res2.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script>

/*
wx.config({
	debug:false,
    appId: '{-$signPackage["appId"]-}',
    timestamp: '{-$signPackage["timestamp"]-}',
    nonceStr: '{-$signPackage["nonceStr"]-}',
    signature: '{-$signPackage["signature"]-}',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
	  'onMenuShareTimeline',
    ]
  });	
*/

function sharef(str='快来2019第三届水产科技大会为您支持的企业投票吧！',qy=''){	
	
	alert('请点击右上角“...”选择分享到朋友圈');return false;
	var url ='http://www.tongwei.com/index.php/content/index/vote?qy_name='+qy+'&activity_id=1&on=1';
	wx.onMenuShareTimeline({
          title: str,
          link: url,
          imgUrl: 'http://www.tongwei.com/static/2019shuichan/2019sckj_bg.jpg',
          trigger: function (res) {
            // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
            // alert('用户点击分享到朋友圈');
			
          },
          success: function (res) {
             //alert('已分享');
          },
          cancel: function (res) {
             //alert('已取消');
          },
          fail: function (res) {
            // alert(JSON.stringify(res));
          }
        }); 
	
}  

 
</script> 

<script>
    var flag = false;
	localStorage.setItem("vote_on",'on');
    show(); 
    var s=setInterval(show,1000);	
	
    function show(){			
			
			//var time=new Date('2019/3/20 00:00:00').getTime();		
		    var time=new Date('2019/4/19 23:59:59').getTime();
			 var nowTime=new Date().getTime();
			//获取时间差
			var timediff=Math.round((time-nowTime)/1000);
			//获取还剩多少天
			var day=parseInt(timediff/3600/24);
			//获取还剩多少小时
			var hour=parseInt(timediff/3600%24);
			//获取还剩多少分钟
			var minute=parseInt(timediff/60%60);
			//获取还剩多少秒
			var second=timediff%60;
			//输出还剩多少时间
			
			// 判断投票是否开始
			//var start_time=new Date('2019/3/20 00:00:00').getTime();
			var nowTime=new Date().getTime();
			if(start_time>nowTime)
			{
				document.getElementById("count_date").innerHTML='<span style="color:red;">投票还没开始</span>';
				return false;
			}		
			
			//
			document.getElementById("count_date").innerHTML='距离投票结束还有'+day+'天'+hour+'小时'+minute+'分'+second+'秒';			
			
			if(timediff<0)
			{
				if(!flag)
				{
					alert('投票已结束');
					flag = true;
					localStorage.setItem("vote_on",'off');
				}
				clearInterval(s);
				document.getElementById("count_date").innerHTML='投票已结束';
				return false;
		    }
			
	}



</script>


</body>
</html>

