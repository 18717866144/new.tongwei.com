<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>公司列表</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>


<div style="width:900px;margin:40px auto 0px;">   
    <div><h1>{-$act_name-}</h1></div>    
    <div>公司列表：<a href="javascript:;" id="add_enterp">新增公司</a>
	<a href="javascript:;" onclick="javascript :history.back(-1)" style="display:inline-block;float:right;">返回上一页</a>
	</div>     
	<table class="layui-hide" id="enterp_list" ></table>
</div>              
          
<script src="/static/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->

<script>
layui.use(['table','util','layer','upload'], function(){
  var $ = layui.$,
      layer = layui.layer,
      table = layui.table,
      util = layui.util,
      upload = layui.upload;	  

  
	table.render({
		elem: '#enterp_list'
		,height: 540
		,url: '/content/vote/getdata?type=enterp&act_id={-$act_id-}' //数据接口
		,title: '公司列表'		
		,page: true //开启分页
		,toolbar: 'default' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档		
		,cols: [[ //表头
		  {type: 'checkbox', fixed: 'left'}
		  ,{field: 'id', title: 'ID', width:80, sort: true}
		  ,{field: 'qy_name', title: '企业名', width:250}
		  ,{field: 'logo', title: 'logo', width: 250}
		 
		  ,{fixed: 'right', title:'操作',  templet:function(d){
		  return '<a href="javascript:;" onclick="edit('+d.id+',\''+d.qy_name+'\','+d.votes+',\''+d.logo_url+'\')">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="del('+d.id+',{-$act_id-},\''+d.qy_name+'\',\''+d.logo_url+'\')" >删除</a>';
	  }}
		]]
	});
	  
	  
	  $('#add_enterp').click(function(){
		  var act_id = {-$act_id-};
		  
		  layer.open({
						type: 1
						,title: '新增公司' //不显示标题栏
						,closeBtn: 1
						,area: '300px;'
						,shade: 0.2
						,id: 'LAY_layuipro1' //设定一个id，防止重复弹出
						,btn: ['确定']
						,btnAlign: 'right'
						,moveType: 0 //拖拽模式，0或者1
						,content: '<div style="padding: 50px 10px; line-height: 22px; background-color: #fff; font-weight: 300;"><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">企业：</span><input type="text" id="qy_name1" name="qy_name1" value="" style="width:80%;height:30px;line-height:30px;"/></div><div>Logo：<span style="color:red;font-size:12px;">尺寸：300px*100px</span></div><div class="layui-upload"><button type="button" class="layui-btn" id="test1">上传图片</button><div class="layui-upload-list"><img class="layui-upload-img" id="demo1"><p id="demoText"></p></div></div><div></div><input type="hidden" id="logo_url1" name="logo_url1" value=""></div>'
						,success:function(){
							
							var uploadInst = upload.render({
								elem: '#test1'
								,accept:'images'
								,acceptMime:'image/jpg, image/png'
								,url: '/content/vote/upload'
								,done: function(res){
								  //如果上传失败
								  if(res.code==1){
									$('#demoText').html('<img src="'+res.url+'" />');
									$('#logo_url1').val(res.url);
								  }
								  //上传成功
								}
								,error: function(){
								  
								  
								}
							  });
						}
						,yes: function(index,layero){
							
							var qy_name = $('#qy_name1').val();
							
							var logo_url=$('#logo_url1').val();
							if(qy_name=='')
							{
							  return false;
							}
							
							$.ajax({
								  url:'/content/vote/deal', 
								  type:'post',
								  dataType:'json',
								  data:{type:'add_enterp',qy_name:qy_name,act_id:act_id,logo_url:logo_url},
								  success:function(e){			  
									 
									  layer.msg(e.msg,{time:1000},function(){
										  layer.close(index);
										  location.reload();
									  });
								  }			  
								  
							});	
						  
						}
						
			});
		  
		  
	  });
  
});
</script>

<script>

   function del(ent_id,act_id,qy_name,logo_url){
	   
	   layui.use(['layer'], function(){
			  var $ = layui.$,
			  layer = layui.layer;				  
			          
					  layer.open({
						type: 1
						,title: '删除公司' //不显示标题栏
						,closeBtn: 1
						,area: '300px;'
						,shade: 0.2
						,id: 'LAY_layuipro11' //设定一个id，防止重复弹出
						,btn: ['确定删除']
						,btnAlign: 'right'
						,moveType: 0 //拖拽模式，0或者1
						,content: '<div style="padding: 50px 10px; line-height: 22px; background-color: #fff; font-weight: 300;"><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">企业：</span><input type="text" id="qy_name" name="qy_name" value="'+qy_name+'" style="width:80%;height:30px;line-height:30px;" disabled/></div><div><img src="'+logo_url+'" style="width:100%"></div></div>'
						,yes: function(index,layero){
							
							layer.confirm('真的要删?', function(index){								 
								  
								  layer.close(index);
								  $.ajax({
									  url:'/content/vote/deal',
									  type:'post',
									  dataType:'json',
									  data:{type:'del_enterp',ent_id:ent_id,act_id:act_id},
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
	   
   }

   function edit(id,name,votes,logo_url){
	   
	   layui.use(['layer'], function(){
			  var $ = layui.$,
			  layer = layui.layer;				  
			          
					  layer.open({
						type: 1
						,title: '编辑公司' //不显示标题栏
						,closeBtn: 1
						,area: '300px;'
						,shade: 0.2
						,id: 'LAY_layuipro' //设定一个id，防止重复弹出
						,btn: ['确定']
						,btnAlign: 'right'
						,moveType: 0 //拖拽模式，0或者1
						,content: '<div style="padding: 50px 10px; line-height: 22px; background-color: #fff; font-weight: 300;"><div style="margin-bottom:10px;"><span style="height:30px;line-height:30px;display:inline-block;">企业：</span><input type="text" id="qy_name" name="qy_name" value="'+name+'" style="width:80%;height:30px;line-height:30px;"/></div><div>logo：<img style="width:70%;" src="'+logo_url+'" /></div></div>'
						,yes: function(index,layero){
							
							var qy_name = $('#qy_name').val();
							
							if(qy_name==''||votes=='')
							{
							  return false;
							}
							
							$.ajax({
								  url:'/content/vote/deal', 
								  type:'post',
								  dataType:'json',
								  data:{ent_id:id,type:'edit_enterp',qy_name:qy_name},
								  success:function(e){			  
									 
									  layer.msg(e.msg,{time:1000},function(){
										  layer.close(index);
										  location.reload();
									  });
								  }			  
								  
							});	
						  
						}
					  });
					  
		
			  
			});
	   
   }


</script>


</body>

</html>