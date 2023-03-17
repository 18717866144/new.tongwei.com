<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<style type="text/css">
.u_m tr td,.u_m tr th {
	text-align:left;
	padding:10px 0px 10px 10px;
	border-bottom:1px solid #EFEFEF;
}
.u_m tr td {
	padding:20px 0px 20px 10px;
}
.s1 {
	width:400px;
	padding:5px;
	height:260px;
}
.u_s {
	height:260px;
}
.u_s tr td {
	padding:0px;
}
</style>
<form action="__ACTION__" method="post">
<table class="u_m" cellspacing="1">
	<tr>
		<th class="td_left" width="40%">选择导航范围</th>
		<th>选择操作内容</th>
	</tr>
	<tr>
		<td class="td_left" style="width:40%">
			<select name="cid" class="s1" multiple="multiple">
				<option value="" selected="selected">全部导航</option>
				<?php echo $navigate;?>
			</select>
		</td>
		<td style="padding-left:0px;">
			<table class="u_s">
				<tr><td valign="middle">&nbsp;&nbsp;每次更新 <input type="text" size="6" name="limit" value="10" /> 条信息</td></tr>
				<tr><td>&nbsp;&nbsp;更新所有信息 <input type="button" onclick="update();" class="sub" value="开始更新" /></td></tr>
			</table>
		</td>
	</tr>
</table>
</form>
<script type="text/javascript">
function update(){
	var _cid = '';
	$('select option:selected').each(function(){
		var _value = $(this).val();
		if(!_value) {
			return false;
		} else {
			_cid += _value+',';	
		}
	})
	_cid = _cid ? _cid.substr(0,_cid.length-1) : 0; 
	var _limit = $('[name="limit"]').val();
	if(!_limit) {
		_alert('请填写每次更新的条数！',function(){F('limit')});
		return false;
	}
	window.location.href = $.G.U('navigate_create_html',{cids:_cid,limit:_limit});
}
</script>
<include file="./Core/App/Tpl/global_footer.php" />