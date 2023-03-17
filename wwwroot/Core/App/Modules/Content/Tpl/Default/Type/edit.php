<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="operateTitle">编辑内容类型</div>
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
	<table class="formTable">
		<tr>
			<td class="td_left">上级类型</td>
			<td class="td_right">
				<select name="pid">
					<option value="0" <?php echo $current['pid']==0 ? 'selected="selected"' : '';?>>顶级类型</option>
					<?php echo $type_tree;?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">所属内容模型</td>
			<td class="td_right">
				<select name="model_id">
					<?php foreach ($models as $key=>$value) {?>
					<option value="<?php echo $key?>" <?php echo $current['model_id']==$key ? 'selected="selected"' : '';?>><?php echo $value;?></option>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left">所属导航</td>
			<td class="td_right">
				<select name="navi_id">
					<option value="0" <?php echo $current['navi_id']==0 ? 'selected="selected"' : '';?>>不限任何导航</option>
					<?php echo $navigate;?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">类型名称</span></td>
			<td class="td_right">
				<input type="text" class="text" name="type_name" value="<?php echo $current['type_name']?>" datatype="*1-30" errormsg="类型名称格式不正确！" size="20" />
				<span class="setDesc Validform_checktip">1-30个字符</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="t_status" <?php echo $current['t_status']==1 ? 'checked="checked"' : '';?> />&nbsp;正常</label>&nbsp;&nbsp;
				<label><input type="radio" value="2" name="t_status" <?php echo $current['t_status']==2 ? 'checked="checked"' : '';?>  />&nbsp;禁用</label>
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
<include file="./Core/App/Tpl/global_footer.php" />