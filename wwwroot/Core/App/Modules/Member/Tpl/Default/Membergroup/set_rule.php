<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<link href="__PUBLIC__/js/ztree/zTreeStyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/ztree/jquery.ztree.min.js"></script>
<form action="#" id="AjaxForm" method="post">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<input type="hidden" value="<?php echo $token?>" name="token" />
</form>
<ul id="tree" class="ztree"></ul>
<script type="text/javascript">
var setting = {
		check: {
			enable: true,
			chkboxType :{ "Y" : "ps", "N" : "ps" }
		},
		data: {
			simpleData: {enable: true}
		},
		view:{showIcon:false,dblClickExpand :false},
		callback:{
			onClick:onClick
		}
	};
var zNodes =[
	{ id:0, pId:0, name:"全选/取消", open:true},
	<?php $ruleNum = count($ruleData);?>
	<?php $i=1;foreach ($ruleData as $values) {?>
	{ id:<?php echo $values['id'];?>, pId:<?php echo $values['pid']?>, name:"<?php echo $values['title'];?>"<?php echo in_array($values['id'], $power,true) ? ',checked:true' : '';?>}<?php echo $i==$ruleNum ? '' : ',';?>
	<?php $i++;}?>
	];

function onClick(e,treeId, treeNode) {
	var zTree = $.fn.zTree.getZTreeObj("tree");
	zTree.expandNode(treeNode);
}
$(function(){
	$.fn.zTree.init($("#tree"), setting, zNodes);
})
$.ajaxSetup({async:false});
var api = art.dialog.open.api;//art.dialog.open扩展方法
var parent = art.dialog.opener;//父页面window对象
var throughBox = art.dialog.through;
api.button(
	{
		name: '确定',
		callback: function () {
			var treeObj = $.fn.zTree.getZTreeObj('tree');
			var nodes = treeObj.getCheckedNodes(true);
			var checkedStr = '';
			$.each(nodes,function(k,v){
				if(v.id > 0) checkedStr += '<input type="hidden" name="rule['+v.id+']" value="'+v.id+'" />';
			})
			$('#AjaxForm').append(checkedStr);
			_val = $('#AjaxForm').serialize();
			$.post('__ACTION__',_val,function(data){alert(data.info);},'json');
		},
		focus: true
	},
	{name: '关闭'}
);
</script>
<include file="./Core/App/Tpl/global_footer.php" />