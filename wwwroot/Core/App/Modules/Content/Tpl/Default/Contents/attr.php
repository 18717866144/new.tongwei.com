<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<style type="text/css">
.attr {width:96%;margin:20px auto 0px;}
.attr dt {background:#F0F8FD;height:30px;line-height:30px;font-weight:bold;}
.attr dd {line-height:180%;margin-top:10px;}
</style>
<form id="attr_Form">
<input type="hidden" value="<?php echo $_GET['id']?>" name="id" />
<dl class="attr">
	<dt>
		<?php echo $type == 'add' ? '此处，更改的属性只是添加新属性，无法重新更改属性。' : '此处，更改的属性只是删除属性，无法重新添加属性。';?>
	</dt>
	<dd>
		<?php foreach ($attr as $key=>$value) {?>
			<label><input type="checkbox" value="<?php echo $key?>" name="attr[]" /><?php echo $value?></label>&nbsp;
		<?php }?>
	</dd>
</dl>
</form>
<script type="text/javascript">
$.ajaxSetup({async:false});
var api = art.dialog.open.api;	// 			art.dialog.open扩展方法
var parent = art.dialog.opener;	// 父页面window对象
$(function(){
	api.button({
		name: '确定',
		callback: function () {
			var _checkValue = $('#attr_Form').serialize();
			if(!_checkValue) {
				_alert('请选择需要添加的属性值！');
				return false;
			}
			$.ajax({
				url:'<?php echo U('attr',array('cid'=>$_GET['cid'],'type'=>$type));?>',
				data:_checkValue,
				type:'POST',
				dataType:'json',
				boforeSend:function(){
					art.dialog.tips('数据正在提交...', 10);
				},
				success:function(data){
					if(data.status == 'error' || data.status==0) {
						art.dialog.tips('操作失败！');
					} else {
						art.dialog.tips('操作成功！');	
						setTimeout(function(){api.close();},2000);
					}
				},
				error:function(){
					art.dialog.tips('发送数据至服务器失败！');
				}
			})
			return false;
		},
		focus: true
	},
	{
		name: '关闭'
	});
})
</script>
<include file="./Core/App/Tpl/global_footer.php" />