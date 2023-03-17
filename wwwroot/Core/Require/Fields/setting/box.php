<?php if (!defined('HX_CMS')) exit();?>
<table>
<?php if (isset($setting)) { ?>
	
    <tr> 
        <td width="100">选项列表</td>
        <td><textarea class="textCont short" style="height: 50px;" cols="50" name="setting[options]"><?php echo $setting['options']?></textarea></td>
    </tr>
    <tr> 
        <td>选项类型</td>
        <td>
            <input type="radio" name="setting[box_type]" value="radio" <?php echo $setting['box_type']=='radio' ? 'checked="checked"' : '';?> onclick="$('#setcols').show();$('#setsize').hide();"/> 单选按钮 
            <input type="radio" name="setting[box_type]" value="checkbox"  <?php echo $setting['box_type']=='checkbox' ? 'checked="checked"' : '';?> onclick="$('#setcols').show();$('setsize').hide();"/> 复选框 
            <input type="radio" name="setting[box_type]" value="select"  <?php echo $setting['box_type']=='select' ? 'checked="checked"' : '';?> onclick="$('#setcols').hide();$('setsize').show();" /> 下拉框 
            <input type="radio" name="setting[box_type]" value="multiple"  <?php echo $setting['box_type']=='multiple' ? 'checked="checked"' : '';?> onclick="$('#setcols').hide();$('setsize').show();" /> 多选列表框
        </td>
    </tr>
    <tr> 
        <td>字段类型</td>
        <td>
            <select name="setting[field_type]" onchange="javascript:fieldtype_setting(this.value);">
                <option value="varchar" <?php echo $setting['field_type']=='varchar' ? 'selected="selected"' : '';?>>字符 VARCHAR</option>
                <option value="char" <?php echo $setting['field_type']=='char' ? 'selected="selected"' : '';?>>字符 CHAR</option>
                <option value="tinyint" <?php echo $setting['field_type']=='tinyint' ? 'selected="selected"' : '';?>>整数 TINYINT(3)</option>
                <option value="smallint" <?php echo $setting['field_type']=='smallint' ? 'selected="selected"' : '';?>>整数 SMALLINT(5)</option>
                <option value="mediumint" <?php echo $setting['field_type']=='mediumint' ? 'selected="selected"' : '';?>>整数 MEDIUMINT(8)</option>
                <option value="int" <?php echo $setting['field_type']=='int' ? 'selected="selected"' : '';?>>整数 INT(10)</option>
                <option value="set" <?php echo $setting['field_type']=='set' ? 'selected="selected"' : '';?>>SET</option>
                <option value="enum" <?php echo $setting['field_type']=='enum' ? 'selected="selected"' : '';?>>ENUM</option>
            </select> <span id="minnumber" style="<?php echo ($setting['field_type']!='varchar'&& $setting['field_type']!='char' && $setting['field_type']!='enum' && $setting['field_type']!='set') ? '' : 'display:none';?>"><input type="radio" name="setting[is_unsigned]" value="1" <?php echo $setting['is_unsigned']==1 ? ' checked="checked"' : '';?> /> <font color='red'>正整数</font> <input type="radio" name="setting[is_unsigned]" value="2" <?php echo $setting['is_unsigned']==2 ? ' checked="checked"' : '';?> /> 整数</span>
             <span id="set_enum" style="<?php echo ($setting['field_type']=='set'|| $setting['field_type']=='enum') ? '' : 'display:none';?>">
            	设置值：<input type="text" class="text" size="40" name="setting[set_value]" value="<?php echo $setting['set_value']?>" />&nbsp;&nbsp;多个值使用","分隔
            </span>
        </td>
    </tr>
    <tr> 
        <td>默认值</td>
        <td><input type="text" name="setting[default_value]" size="40" value="<?php echo $setting['default_value']?>" class="text"></td>
    </tr>
    <tr> 
        <td>输出格式</td>
        <td>
            <input type="radio" name="setting[output_type]" value="2" <?php echo $setting['output_type']==2 ? ' checked="checked" ' : '';?>/> 输出选项名称
            <input type="radio" name="setting[output_type]" value="1"  <?php echo $setting['output_type']==1 ? ' checked="checked" ' : '';?> /> 输出选项值 
        </td>
    </tr>
    <tr> 
        <td>作为筛选字段</td>
        <td>
            <input type="radio" name="setting[filter_type]" value="1"  <?php echo $setting['filter_type']==1 ? ' checked="checked" ' : '';?> /> 是 
            <input type="radio" name="setting[filter_type]" value="2"  <?php echo $setting['filter_type']==2 ? ' checked="checked" ' : '';?> /> 否
        </td>
    </tr>	
<script type="text/javascript">
    function fieldtype_setting(obj) {
        if(obj!='varchar' && obj!='char') {
            $('#minnumber').css('display','');
        } else {
            $('#minnumber').css('display','none');
        }
    }
</script>
<?php }else { ?>
    <tr> 
        <td width="100">选项列表</td>
        <td><textarea class="textCont short" style="height: 50px;" cols="50" name="setting[options]">选项名称1|选项值1</textarea></td>
    </tr>
    <tr> 
        <td>选项类型</td>
        <td>
            <input type="radio" name="setting[box_type]" value="radio" checked="checked" onclick="$('#setcols').show();$('#setsize').hide();"/> 单选按钮 
            <input type="radio" name="setting[box_type]" value="checkbox" onclick="$('#setcols').show();$('setsize').hide();"/> 复选框 
            <input type="radio" name="setting[box_type]" value="select" onclick="$('#setcols').hide();$('setsize').show();" /> 下拉框 
            <input type="radio" name="setting[box_type]" value="multiple" onclick="$('#setcols').hide();$('setsize').show();" /> 多选列表框
        </td>
    </tr>
    <tr> 
        <td>字段类型</td>
        <td>
            <select name="setting[field_type]" onchange="javascript:fieldtype_setting(this.value);">
                <option value="varchar">字符 VARCHAR</option>
                <option value="char">字符 CHAR</option>
                <option value="tinyint">整数 TINYINT(3)</option>
                <option value="smallint">整数 SMALLINT(5)</option>
                <option value="mediumint">整数 MEDIUMINT(8)</option>
                <option value="int">整数 INT(10)</option>
                <option value="set">SET</option>
                <option value="enum">ENUM</option>
            </select> <span id="minnumber" style="display:none"><input type="radio" name="setting[is_unsigned]" value="1" checked="checked" /> <font color='red'>正整数</font> <input type="radio" name="setting[is_unsigned]" value="2" /> 整数</span>
            <span id="set_enum" style="display: none;">
            	设置值：<input type="text" class="text" size="40" name="setting[set_value]" />&nbsp;&nbsp;多个值使用","分隔
            </span>
        </td>
    </tr>
    <tr> 
        <td>默认值</td>
        <td><input type="text" name="setting[default_value]" size="40" class="text"></td>
    </tr>
    <tr> 
        <td>输出格式</td>
        <td>
        	<input type="radio" name="setting[output_type]" value="2"  checked="checked" /> 输出选项名称
            <input type="radio" name="setting[output_type]" value="1" /> 输出选项值 
        </td>
    </tr>
    <tr> 
        <td>作为筛选字段</td>
        <td>
            <input type="radio" name="setting[filter_type]" value="1" /> 是 
            <input type="radio" name="setting[filter_type]" value="2"  checked="checked"/> 否
        </td>
    </tr>
<script type="text/javascript">
    function fieldtype_setting(obj) {
        if(obj!='varchar' && obj!='char' && obj!='set' && obj!='enum') {
            $('#minnumber').css('display','');
            $('#set_enum').hide();
        } 
        else if(obj == 'enum' || obj == 'set') {
        	$('#set_enum').show();
       	 $('#minnumber').hide();
        }
        else {
            $('#minnumber').css('display','none');
            $('#set_enum').hide();
        }
    }
</script>
<?php }?>
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