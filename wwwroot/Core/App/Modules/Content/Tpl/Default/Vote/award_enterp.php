<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>入围公司</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
  <style>
    .qy_box{
		width:130px;
		height:60px;
		float:left;
		margin-right:20px;
		margin-bottom:20px;
		border:1px solid #eee;
		padding:4px;
		position:relative;
	}
	
	.qy_box img{
		width:100%;
	}
	
	.qy_box h3{
		text-align:center;
		font-size:13px;
	}
	
	.close{
		width:30px;
		height:30px;
		display:none;
		position:absolute;
		right:-15px;
		top:-15px;
		background:url('/static/close.png');
		background-size:30px;
	}
	
	.close:hover{
		background:url('/static/close_h.png');
		background-size:30px;
	}
	
	.up{
		width:30px;
		height:30px;
		display:none;
		position:absolute;
		right:-15px;
		top:-15px;
		background:url('/static/up.png');
		background-size:30px;
	}
	
	.up:hover{
		background:url('/static/up_h.png');
		background-size:30px;
	}
	
	.edit{
		width:24px;
		height:24px;
		display:none;
		position:absolute;
		right:-13px;
		bottom:13px;
		background:url('/static/edit.png');
		background-size:24px;
		
	}
	
	.edit:hover{
		background:url('/static/edit_h.png');
		background-size:24px;
	}
	
	.qy_box:hover .edit{
		display:inline-block;
	}
	
	.qy_box:hover .close{
		display:inline-block;
	}
	
	.qy_box:hover .up{
		display:inline-block;
	}
	
  
  </style>
</head>
<body>

<div style="width:900px;margin:40px auto 30px;">

 <div style="width:900px;margin-bottom:30px;float:left;" >   
    <div><h1>{-$award_name-}</h1></div> 
    <div style="margin-top:10px;">入围公司：
	<a href="javascript:;" onclick="javascript :history.back(-1)" style="display:inline-block;float:right;">返回上一页</a>
	</div>  

    <div style="width:100%;margin-top:10px;min-height:90px;" id="in">
	  
     <empty name="datas">
      <h3>暂无入围公司</h3>
     <else />	 
	   <volist name="datas" id="data">
	    <div class="qy_box">
	  	   <a href="javascript:;" class="close" data="{-$data.id-}" desp="{-$data.enterp_advant-}"></a>
		   <a href="javascript:;" class="edit" data="{-$data.id-}" desp="{-$data.enterp_advant-}" data2="{-$data.award_votes-}"></a>
		   <img src="{-$data.logo_url-}" />
		   <h3>{-$data.qy_name-}</h3>
		   
		</div>
	   </volist>	
     </empty> 
	</div>	
	
</div> 

<div style="width:900px;float:left;" >      
    <div>未入围公司</div>   

    <div style="width:100%;margin-top:10px;" id="not">
	   
	   <volist name="datas_not" id="data">
	    <div class="qy_box">
		   <a href="javascript:;" class="up" data="{-$data.id-}"></a>
		   <img src="{-$data.logo_url-}" />
		   <h3>{-$data.qy_name-}</h3>
		</div>
	   </volist>	

	</div>	
	
</div> 


</div>
            
          
<script src="/static/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->

<script>
layui.use(['layer'], function(){
      var $ = layui.$,
      layer = layui.layer;
      
	  var award_id = {-$award_id-};
	  
	  $('#in').on('click','.qy_box .edit',function(){ //编辑入围理由
		  
		  var award_ent_id = $(this).attr('data');
		  var enterp_advant= $(this).attr('desp');
		  var qy_name= $(this).parent().find('h3').html();
		  var votes = $(this).attr('data2');
		  
		  layer.open({
						type: 1
						,title: '编辑入围理由' 
						,closeBtn: 1
						,area: '400px;'
						,shade: 0.2
						,id: 'LAY_layuipro5' 
						,btn: ['确定']
						,btnAlign: 'right'
						,moveType: 0 
						,content: '<div style="padding: 50px 10px; line-height: 22px; background-color: #fff; font-weight: 300;"><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">企业：</span><input type="text" id="qy_name1" name="qy_name1" value="'+qy_name+'" style="width:370px;height:30px;line-height:30px;" disabled/></div><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">票数：</span><input type="text" id="votes2" name="votes2" value="'+votes+'" style="width:370px;height:30px;line-height:30px;" /></div><div style="margin-bottom:10px;">入围理由：</div><div><textarea name="reason" id="reason" style="width:370px;height:200px;">'+enterp_advant+'</textarea></div></div>'
						,success:function(){							
							
						}
						,yes: function(index,layero){							
				            var reason = $('#reason').val();
							var votes1 = $('#votes2').val();
							
                            $.ajax({
									  url:'/content/vote/deal',
									  type:'post',
									  dataType:'json',
									  data:{type:'edit_award_enterp',award_ent_id:award_ent_id,reason:reason,votes:votes1},
									  success:function(d){
										  
										  layer.msg(d.msg,{time:1000},function(){
											  
											  layer.close(index);
										      location.reload();
										  });
										  
									  }
									  
							});																		
						  
						}
						
			});
		  
	  });
	  
	  $('#in').on('click','.qy_box .close',function(){ //删除入围公司
		  
		  var award_ent_id = $(this).attr('data');
		  var enterp_advant= $(this).attr('desp');
		  var qy_name= $(this).parent().find('h3').html();
		  
		  layer.open({
						type: 1
						,title: '删除入围公司' 
						,closeBtn: 1
						,area: '400px;'
						,shade: 0.2
						,id: 'LAY_layuipro4' 
						,btn: ['确定删除']
						,btnAlign: 'right'
						,moveType: 0 
						,content: '<div style="padding: 50px 10px; line-height: 22px; background-color: #fff; font-weight: 300;"><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">企业：</span><input type="text" id="qy_name1" name="qy_name1" value="'+qy_name+'" style="width:370px;height:30px;line-height:30px;" disabled/></div><div style="margin-bottom:10px;">入围理由：</div><div><textarea name="reason" id="reason" style="width:370px;height:200px;" disabled>'+enterp_advant+'</textarea></div></div>'
						,success:function(){							
							
						}
						,yes: function(index,layero){							
				           
                            layer.confirm('真的要删?', function(index){								 
								  
								  layer.close(index);
								  $.ajax({
									  url:'/content/vote/deal',
									  type:'post',
									  dataType:'json',
									  data:{type:'del_award_enterp',award_ent_id:award_ent_id},
									  success:function(d){
										  
										  layer.msg(d.msg,{time:1000},function(){
											  
											  layer.close(index);
										      location.reload();
										  });
										  
									  }
									  
								  });		
							});
												
						  
						}
						
			});
		  
	  });
	  
	  $('#not').on('click','.qy_box .up',function(){ //加入入围公司
		  
		  var ent_id = $(this).attr('data');
		  var qy_name= $(this).parent().find('h3').html();
		  
		  layer.open({
						type: 1
						,title: '新增入围公司' 
						,closeBtn: 1
						,area: '400px;'
						,shade: 0.2
						,id: 'LAY_layuipro2' 
						,btn: ['确定']
						,btnAlign: 'right'
						,moveType: 0 
						,content: '<div style="padding: 50px 10px; line-height: 22px; background-color: #fff; font-weight: 300;"><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">企业：</span><input type="text" id="qy_name1" name="qy_name1" value="'+qy_name+'" style="width:370px;height:30px;line-height:30px;" disabled/></div><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">票数：</span><input type="text" id="votes1" name="votes1" value="0" style="width:370px;height:30px;line-height:30px;" /></div><div style="margin-bottom:10px;">入围理由：</div><div><textarea name="reason" id="reason" style="width:370px;height:200px;"></textarea></div></div>'
						,success:function(){							
							
						}
						,yes: function(index,layero){
							
				            var  reason = $('#reason').val();
							var  votes = $('#votes1').val();
                            
							if(reason!='')
                            {								
								$.ajax({
									  url:'/content/vote/deal',
									  type:'post',
									  dataType:'json',
									  data:{type:'add_award_enterp',ent_id:ent_id,award_id:award_id,reason:reason,votes:votes},
									  success:function(d){
										  
										  layer.msg(d.msg,{time:1000},function(){
											  
											  layer.close(index);
										      location.reload();
										  });
										  
									  }
									  
								});								
								
							}	
						  
						}
						
			});
		  
	  });
  
    
  
});
</script>




</body>

</html>