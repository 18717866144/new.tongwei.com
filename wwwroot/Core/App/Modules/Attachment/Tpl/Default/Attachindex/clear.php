<?php if (!defined('HX_CMS')) exit();?>
<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<style type="text/css">
.u_m tr td,.u_m tr th {
	text-align:left;
	padding:10px 0px 10px 10px;
	border-bottom:1px solid #EFEFEF;
}
.u_m tr td {
	padding:20px 0px 20px 10px;
}
.left {
	border-right:1px solid #EFEFEF;
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
<table class="u_m" cellspacing="1">
	<tr>
		<th class="left" width="40%">选择数据表范围</th>
		<th>选择操作内容</th>
	</tr>
	<tr>
		<td class="td_left">
			<select name="table[]" class="s1" multiple="multiple">
				<option value="table_all" selected="selected">全部数据表</option>
				<?php foreach ($table as $value) {
					if ($value == 'ueditor') continue;
				?>
				<option value="<?php echo $value;?>"><?php echo $value;?></option>
				<?php }?>
			</select>
		</td>
		<td style="padding-left:0px;">
			<table class="u_s">
				<tr>
					<td valign="middle">
						<div>&nbsp;&nbsp;更新字段&nbsp;<input type="text" size="10" name="field" value="thumbnail" /></div>
						<div style="margin-top: 10px;">&nbsp;&nbsp;编辑器操作：<label><input type="radio" value="1" name="preg" />是</label>&nbsp;&nbsp;<label><input type="radio" value="2" checked="checked" name="preg" />否</label></div>
						<div style="margin-top: 10px;">&nbsp;&nbsp;每次更新 <input type="text" size="6" name="limit" value="20" /> 条信息</div>
						<div style="margin-top: 8px;">&nbsp;&nbsp;当选择Ueditor时字段为content</div>
					</td>
				</tr>
				<tr><td>&nbsp;&nbsp;更新所有信息 <input type="button" onclick="update();" class="sub" value="开始更新" /></td></tr>
			</table>
		</td>
	</tr>
</table>
<script type="text/javascript">
function update(){
	var _table = '';
	$('select option:selected').each(function(){
		var _value = $(this).val();
		if(!_value) {
			return false;
		} else {
			_table += _value+',';	
		}
	})
	if(_table) {
		if(_table.indexOf('table_all') > -1) {
			_table = '';
			$('select option').each(function(){
				if($(this).val() == 'table_all') return true;
				_table += $(this).val()+',';
			})
		}
		_table = _table.substr(0,_table.length-1);
	} else {
		_alert('请选择更新的数据表！');
		return ;
	}
	var _field = $('[name="field"]').val();
	if(!_field) {
		_alert('请填写更新的字段！',function(){F('field')});
		return false;
	}
	var _limit = $('[name="limit"]').val();
	if(!_limit) {
		_alert('请填写每次更新的条数！',function(){F('limit')});
		return false;
	}
	var _preg = $('[name="preg"]:checked').val();
	window.location.href = $.G.U({table:_table,field:_field,limit:_limit,preg:_preg});
}
</script>
<include file="./Core/App/Tpl/global_footer.php" />