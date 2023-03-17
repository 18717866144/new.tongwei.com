<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="" id="ajaxForm">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<input type="hidden" value="<?php echo $token?>" name="token" />
<table class="showTable">
	<tr>
		<th width="5%" style="padding-left:0px;text-align:center;"><input disabled="disabled" type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="50%" style="padding-left:0px;">导航名称</th>
		<th width="9%" style="padding-left:0px;">查看</th>
		<th width="9%" style="padding-left:0px;">添加</th>
		<th width="9%" style="padding-left:0px;">修改</th>
		<th width="9%" style="padding-left:0px;">删除</th>
		<th width="9%" style="padding-left:0px;">排序</th>
	</tr>
	<?php echo $navigate_str ?>
</table>
</form>
<script type="text/javascript">
$(function(){
	$('[name="id_all[]"]').click(function(){
		if($(this).prop('checked')) {
			$(this).closest('tr').find(':checkbox').prop('checked',true);
		} else {
			$(this).closest('tr').find(':checkbox').prop('checked',false);
		}
	})
})
$.ajaxSetup({async:false});
var api = art.dialog.open.api;	// 			art.dialog.open扩展方法
var parent = art.dialog.opener;	// 父页面window对象
var throughBox = art.dialog.through;
api.button(
	{
		name: '确定',
		callback: function () {
			_val = $('#ajaxForm').serialize();
			$.post('__ACTION__',_val,function(data){
				alert(data.info);
			},'json');
		},
		focus: true
	},
	{
		name: '关闭'
	}
);
</script>
<include file="./Core/App/Tpl/global_footer.php" />