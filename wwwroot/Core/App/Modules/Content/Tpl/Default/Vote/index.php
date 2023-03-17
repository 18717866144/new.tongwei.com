<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>投票系统管理</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/static/layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<div style="width:900px;margin:40px auto 0px;">           
	<table class="layui-hide" id="activity_lists" ></table>
</div>              
          
<script src="/static/layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->

<script>
layui.use(['table','util'], function(){
  var table = layui.table,
      util = layui.util;
  
  table.render({
    elem: '#activity_lists'
    ,url:'/content/vote/getdata'
    ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
    ,cols: [[
      {field:'id', width:50, title: 'ID', sort: true}
      ,{field:'activity_name',  title: '活动名称'}
      ,{field:'activity_logo_url', width:200, title: '封面图',
	    templet: function(d){
          return '<img src="'+d.activity_logo_url+'" />'
        }
	  }
      ,{field:'create_time', width:150, title: '时间',templet:function(d){
		  return util.toDateString(d.create_time*1000, 'yyyy-MM-dd');
	  }},
	  {fixed: 'right', title:'操作',  width:150,templet:function(d){
		  return '<a href="/content/vote/edit?act_name='+d.activity_name+'&act_id='+d.id+'">编辑活动相关</a>';
	  }}
      
    ]]
  });
});
</script>



</body>
</html>