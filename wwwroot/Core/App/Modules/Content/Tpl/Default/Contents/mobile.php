<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<style type="text/css">
div.main {width:100%;}
div.left,div.right {width:50%;float:left;overflow:hidden;}
div.main dl {margin-top:10px;text-align:center;}
div.main dl dt {text-align:center;margin-bottom:10px;}
div.left dl textarea {width:180px;height:290px;}
</style>
<div class="topTip"><b>提示：</b>数据移动、复制只支持同模型之间进行移动，不支持夸模型移动； </div>
<div class="main clearfix">
	<div class="left">
		<dl>
			<dt>
				<label><input type="radio" value="1" checked="checked" name="mobile_type" />批量复制</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<label><input type="radio" value="2" name="mobile_type" />批量移动</label>
			</dt>
			<dd>
				<textarea name="mobile_id" readonly="readonly" id="" cols="30" rows="10"><?php echo $_GET['id']?></textarea>
			</dd>
		</dl>
	</div>
	<div class="right">
		<dl>
			<dt>移动的目标导航</dt>
			<dd>
				<select name="target_id" size="2" style="width:200px;margin:0px auto;height:300px;">
					<option value="" style="text-align: center;color:red;">目标导航</option>
					<?php echo $navigate?>
				</select>
			</dd>
		</dl>
	</div>
</div>
<script type="text/javascript">
$.ajaxSetup({async:false});
var api = art.dialog.open.api;	// 			art.dialog.open扩展方法
var parent = art.dialog.opener;	// 父页面window对象
$(function(){
	api.button({
		name: '确定',
		callback: function () {
			var _selectValue = $('select option:selected').val();
			if(!_selectValue) {
				_alert('请选择需要移动或复制的导航！');
				return false;
			}
			$.ajax({
				url:'<?php echo U('mobile',array('cid'=>$_GET['cid'])) ?>',
				data:{id:$('textarea').val(),mobile_type:$('[name="mobile_type"]:checked').val(),target_id:_selectValue},
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