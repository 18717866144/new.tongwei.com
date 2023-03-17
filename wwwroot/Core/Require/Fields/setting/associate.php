<?php 
if (!defined('HX_CMS')) exit();
$tables = D('Back/ModelsFields')->listTables();
?>
<table>
<?php if (isset($setting)) {?>
    <tr> 
        <td>关联表名</td>
        <td>
            <?php if (!empty($tables) && is_array($tables)) { ?>   
                <select name="setting[table_name]" id="table_name">
                    <?php
                    foreach ($tables as $names) {
						$select = ($names == $setting['table_name']) ? 'selected="selected"' : ''; 
                    ?>
                        <option value="<?php echo $names ?>" <?php echo $select ?>><?php echo $names ?></option>
                    <?php } ?>
                </select>
            <?php } ?>
        </td>
    </tr>
    <tr> 
        <td>显示字段</td>
        <td><select name="setting[set_field]" id="set_field"></select> 用于返回值赋值给管理字段。</td>
    </tr>
    <tr> 
        <td>赋值字段</td>
        <td><select name="setting[set_id]" id="set_id"></select> 用于返回值赋值给管理字段。(表里面唯一标示，比如主键)</td>
    </tr>
    <tr> 
        <td>存入数据方式&nbsp;</td>
        <td>
        		<input type="radio" name="setting[insert_type]" value="id" <?php echo $setting['insert_type']=='id' ? 'checked="checked"' : '';?> />&nbsp;ID存入&nbsp;&nbsp;
        		<input type="radio" name="setting[insert_type]" value="title" <?php echo $setting['insert_type']=='title' ? 'checked="checked"' : '';?> />&nbsp;标题存入&nbsp;&nbsp;</td>
    </tr>
<?php }else {?>
    <tr> 
        <td>关联表名</td>
        <td>
            <?php if (!empty($tables) && is_array($tables)) { ?>   
                <select name="setting[table_name]" id="table_name">
                    <?php
                    foreach ($tables as $names) {
						$select = ($names == $setting['table_name']) ? 'selected="selected"' : ''; 
                    ?>
                        <option value="<?php echo $names ?>" <?php echo $select ?>><?php echo $names ?></option>
                    <?php } ?>
                </select>
            <?php } ?>
        </td>
    </tr>
    <tr> 
        <td>显示字段</td>
        <td><select name="setting[set_field]" id="set_field"></select> 用于返回值赋值给管理字段。</td>
    </tr>
    <tr> 
        <td>赋值字段</td>
        <td><select name="setting[set_id]" id="set_id"></select> 用于返回值赋值给管理字段。(表里面唯一标示，比如主键)</td>
    </tr>
    <tr> 
        <td>存入数据方式&nbsp;&nbsp;</td>
        <td><input type="radio" name="setting[insert_type]" value="id" checked="checked"/>&nbsp;ID存入&nbsp;&nbsp;<input type="radio" name="setting[insert_type]" value="title" />&nbsp;标题存入</td>
    </tr>
<?php } ?>
<tr>
	<td width="100">前台模板：</td>
	<td>
		<select name="setting[front_field_tpl]">
			<option value="">系统内置</option>
			<?php foreach ($fieldTpl as $value) {?>
			<option value="<?php echo $value?>" <?php echo $value==$setting['front_field_tpl'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
			<?php }?>
		</select>
	</td>
</tr>
<tr>
	<td width="100">后台模板：</td>
	<td>
		<select name="setting[back_field_tpl]">
			<option value="">系统内置</option>
			<?php foreach ($fieldTpl as $value) {?>
			<option value="<?php echo $value?>" <?php echo $value==$setting['back_field_tpl'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
			<?php }?>
		</select>
	</td>
</tr>
</table>
<script type="text/javascript">
	$(function(){
		var tableVal = $('#table_name').val();
		getField(tableVal);
		$('#table_name').change(function(){
			var tableVal = $(this).val();
			getField(tableVal);
		});
    });
    function getField(tableName) {
		$.get('<?php echo U('Back/Public/get_field')?>',{table:tableName},function(data){
		if(data.status == 'success') {
			var _optionSet_id = '';
			var _optionSet_field = '';
			$.each(data.data,function(k,v){
				if(v == '<?php echo $setting['set_id']?>') {
					var _set_id_selected = 'selected="selected"';
				}else {
					var _set_id_selected = '';
				}
				if(v == '<?php echo $setting['set_field']?>') {
							var _set_field_selected = 'selected="selected"';
						}else {
							var _set_field_selected = '';
						}
						_optionSet_id += '<option value="'+v+'" '+_set_id_selected+'>'+v+'</option>';
						_optionSet_field += '<option value="'+v+'" '+_set_field_selected+'>'+v+'</option>';
					});
					$('#set_id').html(_optionSet_id);
					$('#set_field').html(_optionSet_field);
				}
		},'json');
     }
            </script>