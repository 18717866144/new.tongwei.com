<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="Fields:self_navi" />
<div class="operateTitle">修改字段</div>
<form action="<?php echo U($ACTION,array('mid'=>$_GET['mid'])) ?>" method="post" id="formData">
<!-- <input type="hidden" value="<?php echo $_GET['mid']?>" name="mid" />  -->
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<input type="hidden" value="<?php echo $token?>" name="token" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">字段类型</span></td>
			<td class="td_right">
				<select name="form_type" disabled="disabled" onchange="getFields(this.value);" datatype="*" errormsg="请选择字段类型！！！" >
					<option value="">请选择字段类型</option>
					<?php foreach ($fieldsArray as $key=>$value) {?>
						<option value="<?php echo $key?>" <?php echo $key==$current['form_type'] ? 'selected="selected"' : '';?>><?php echo $value;?></option>
					<?php }?>
				</select>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">字段名</span></td>
			<td class="td_right">
				<input type="text" class="text normal" disabled="disabled" size="35" value="<?php echo $current['field_name']?>" name="field_name" datatype="/^[a-z][\w]{0,19}$/i" errormsg="字段名格式不正确！" />
				<span class="setDesc Validform_checktip">1-20个字符之间，字母开头，只能包含字母，数字，下划线</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">字段别名（备注）</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="35" name="nick_name" value="<?php echo $current['nick_name']?>" datatype="*1-30" errormsg="1-30个字符之间！" />
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">字段提示</span></td>
			<td class="td_right">
				<input type="text" class="text long" name="tips" size="50" value="<?php echo $current['tips']?>" ignore="ignore" datatype="*1-255" errormsg="字段提示格式不正确！" />
				<span class="setDesc Validform_checktip">255个字符之内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">相关参数设置</td>
			<td class="td_right">
				<?php echo $data_setting;?>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">字符长度值</span></td>
			<td class="td_right">
				<input type="text" name="field_len" class="text" size="10" value="<?php echo empty($current['field_len']) ? '' : $current['field_len'];?>" id="max_len" ignore="ignore" datatype="/^[1-9][\d]*$/" errormsg="字段长度值格式不正确！" />
				<span class="setDesc Validform_checktip">只能输入数字，如果不限长度请留空。</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">表单附加属性</span></td>
			<td class="td_right">
				<input type="text" class="text long" size="50" name="input_attr" value="<?php echo Input::forShow($current['input_attr'])?>" ignore="ignore" datatype="*1-255" errormsg="表单附加属性格式不正确！" />
				<span class="setDesc Validform_checktip">255个字符以内，可添加CSS和JS，或其它验证表单属性等。</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">ValiData数据验证</span></td>
			<td class="td_right">
				<div>
					<input type="text" name="pattern" size="50" class="text long" datatype="*1-255" value="<?php echo $current['pattern']?>" ignore="ignore" errormsg="ValiData数据验证格式不正确！" />
					<span class="setDesc Validform_checktip">以@分隔参数，255个字符以内，系统将通过此校验规则验证数据的合法性，不想校验数据留空，</span>
				</div>
				<span>参考<a href="javascript:;" class="setRed">VailData数据验证</a>规则</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">字段排序</span></td>
			<td class="td_right">
				<input type="text" name="sort" size="20" value="<?php echo $current['sort']?>" class="text short" datatype="/^[1-9][\d]{0,7}$/i" errormsg="字段排序格式不正确！" />
				<span class="setDesc Validform_checktip">1-8个字符之间，数值越大越靠前</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">前台处理函数</span></td>
			<td class="td_right">
				<input type="text" name="setting[front_func]" value="<?php echo $setting['front_func']?>" size="35" class="text normal" />
				<label><input type="radio" name="setting[front_func_type]" value="1" <?php echo $setting['front_func_type']==1 ? 'checked="checked"' : '';?> /> 入库前</label>
				<label><input type="radio" name="setting[front_func_type]" value="2" <?php echo $setting['front_func_type']==2 ? 'checked="checked"' : '';?> /> 入库后</label>
				<label><input type="radio" name="setting[front_func_type]" value="3" <?php echo $setting['front_func_type']==3 ? 'checked="checked"' : '';?> /> 入库前后</label>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="Validform_label">后台处理函数</span></td>
			<td class="td_right">
				<input type="text" name="setting[back_func]" value="<?php echo $setting['back_func']?>" size="35" class="text normal" />
				<label><input type="radio" name="setting[back_func_type]" value="1" <?php echo $setting['back_func_type']==1 ? 'checked="checked"' : '';?> /> 入库前</label>
				<label><input type="radio" name="setting[back_func_type]" value="2" <?php echo $setting['back_func_type']==2 ? 'checked="checked"' : '';?> /> 入库后</label>
				<label><input type="radio" name="setting[back_func_type]" value="3" <?php echo $setting['back_func_type']==3 ? 'checked="checked"' : '';?> /> 入库前后</label>
			</td>
		</tr>
		<tr>
			<td class="td_left">是否使用字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" value="1" name="field_status" checked="checked" <?php echo $current['field_status']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" value="2" name="field_status" <?php echo $current['field_status']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为主表字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" value="1" name="setting[is_system]" <?php echo $setting['is_system']==1 ? 'checked="checked"' : '';?> disabled="disabled" /></label>
				<label>否&nbsp;<input type="radio" value="2" name="setting[is_system]" <?php echo $setting['is_system']==2 ? 'checked="checked"' : '';?> disabled="disabled" /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为基本信息[左侧显示]</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_basic]" value="1" <?php echo $setting['is_basic']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_basic]" value="2" <?php echo $setting['is_basic']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为必填字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_required]" value="1" <?php echo $setting['is_required']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_required]" value="2" <?php echo $setting['is_required']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">数据值惟一字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_unique]" value="1" <?php echo $setting['is_unique']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_unique]" value="2" <?php echo $setting['is_unique']==2 ? 'checked="checked"' : '';?>  /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为内置字段<br />[必须要有入库前的方法]</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_internal]" value="1" <?php echo $setting['is_internal']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_internal]" value="2" <?php echo $setting['is_internal']==2||!isset($setting['is_internal']) ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为前台填写字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_posted]" value="1" <?php echo $setting['is_posted']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_posted]" value="2" <?php echo $setting['is_posted']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台不可修改的字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_disabled]" value="1" <?php echo $setting['is_disabled']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_disabled]" value="2" <?php echo $setting['is_disabled']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为隐藏项[主要用于前台]</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_hide]" value="1" <?php echo $setting['is_hide']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_hide]" value="2"  <?php echo $setting['is_hide']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台列表展示字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_front_list]" value="1" <?php echo $setting['is_front_list']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_front_list]" value="2" <?php echo $setting['is_front_list']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">后台列表展示字段</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_back_list]" value="1" <?php echo $setting['is_back_list']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_back_list]" value="2" <?php echo $setting['is_back_list']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为搜索条件</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_search]" value="1" <?php echo $setting['is_search']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_search]" value="2" <?php echo $setting['is_search']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">作为全站搜索信息</td>
			<td class="td_right">
				<label>是&nbsp;<input type="radio" name="setting[is_fulltext]" value="1" <?php echo $setting['is_fulltext']==1 ? 'checked="checked"' : '';?> /></label>
				<label>否&nbsp;<input type="radio" name="setting[is_fulltext]" value="2" <?php echo $setting['is_fulltext']==2 ? 'checked="checked"' : '';?> /></label>
			</td>
		</tr>
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<input type="submit" name="send" class="sub" value="提交" />
				<input type="reset" class="sub" />
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
function getFields(thisVal) {
	if(!thisVal) return false;
	$.get('<?php echo U('Back/Public/get_fields_setting')?>',{field_type:thisVal},function(data){
		if(data.status == 'success') {
			$('#setting').html(data.setting_data);
		}
	},'json');
}
</script>
<include file="./Core/App/Tpl/global_footer.php" />