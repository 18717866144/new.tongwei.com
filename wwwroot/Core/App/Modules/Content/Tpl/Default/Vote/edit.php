<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>编辑活动相关信息</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>


<div style="width:900px;margin:40px auto 0px;"> 
    <div><h1>{-$act_name-}</h1></div>     
    <div>奖项：<a href="javascript:;" id="add_jx">新增奖项</a>
	<a href="/content/vote/enterp?act_name={-$act_name-}&act_id={-$act_id-}" style="display:inline-block;float:right;font-size:13px;">参选公司列表</a>
	</div>     
	<table class="layui-hide" id="awards_list" ></table>
</div>              
          
<script src="/static/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->

<script>
layui.use(['table','util','layer'], function(){
  var $ = layui.$,
      layer = layui.layer,
      table = layui.table,
      util = layui.util;
	  
	  $('#add_jx').click(function(){
		  var act_id = {-$act_id-};
		  layer.open({
			type: 1
			,title: '新增奖项' //不显示标题栏
			,closeBtn: 1
			,area: '300px;'
			,shade: 0.2
			,id: 'LAY_layuipro' //设定一个id，防止重复弹出
			,btn: ['确定']
			,btnAlign: 'right'
			,moveType: 0 //拖拽模式，0或者1
			,content: '<div style="padding: 50px; line-height: 22px; background-color: #fff; color: #fff; font-weight: 300;"><div><input type="text" id="award_name" name="award_name" placeholder="输入奖项名称" style="height:30px;line-height:30px;"/></div></div>'
			,yes: function(index,layero){
			    
			    var award_name = $('#award_name').val();
				if(award_name=='')
				{
				  return false;
				}
				
				$.ajax({
					  url:'/content/vote/deal', 
					  type:'post',
					  dataType:'json',
					  data:{act_id:act_id,type:'add_award',award_name:award_name},
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
  
  table.render({
    elem: '#awards_list'
    ,url:'/content/vote/getdata?type=jx&act_id={-$act_id-}'
    ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
    ,cols: [[
      {field:'id', width:80, title: 'ID', sort: true}
      ,{field:'award_name',  title: '奖项名称'},
	  {fixed: 'right', title:'操作',  width:150,templet:function(d){
		  return '<a href="javascript:;" onclick="edit('+d.id+',\''+d.award_name+'\',{-$act_id-})">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/content/vote/award?act_id={-$act_id-}&award_name='+d.award_name+'&award_id='+d.id+'">入围公司</a>';
	  }}
      
    ]]
  });
  
});
</script>

<script>
   function edit(id,name,act_id){
	   
	   layui.use(['layer'], function(){
			  var $ = layui.$,
			  layer = layui.layer;				  
			          
					  layer.open({
						type: 1
						,title: '编辑奖项' //不显示标题栏
						,closeBtn: 1
						,area: '300px;'
						,shade: 0.2
						,id: 'LAY_layuipro' //设定一个id，防止重复弹出
						,btn: ['确定']
						,btnAlign: 'right'
						,moveType: 0 //拖拽模式，0或者1
						,content: '<div style="padding: 50px 10px; line-height: 22px; background-color: #fff; color: #fff; font-weight: 300;"><div><input type="text" id="edit_name" name="edit_name" value="'+name+'" style="width:100%;height:30px;line-height:30px;"/></div></div>'
						,yes: function(index,layero){
							
							var award_name = $('#edit_name').val();
							if(award_name=='')
							{
							  return false;
							}
							
							$.ajax({
								  url:'/content/vote/deal', 
								  type:'post',
								  dataType:'json',
								  data:{award_id:id,type:'edit_award',award_name:award_name,act_id:act_id},
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