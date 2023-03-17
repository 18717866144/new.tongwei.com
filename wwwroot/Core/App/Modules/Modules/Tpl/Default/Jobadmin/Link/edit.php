<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;链接类别</td>
			<td class="td_right">
				<select name="type_id">
                <option value="0">请选择类别</option>
                <notempty name="type">
                <foreach name="type" item="v">
                <option value="{-$v.id-}" <?php echo $current['type_id']==$v['id'] ? 'selected="selected"' : '';?>>{-$v.type_name-}</option>
                </foreach>
                </notempty>
                </select>
			</td>
		</tr>
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">网站名称</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" value="<?php echo $current['web_name']?>" name="web_name" datatype="*1-30" errormsg="网站名称格式不正确！"/>
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">网站Logo</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="web_logo" ondblclick="$.CR.G.showIMG(this.value);" value="<?php echo $current['web_logo']?>" readonly="readonly" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=web_logo&up_num=1&related=link&token=<?php echo Tool::encrypt('web_logo1link')?>','图片上传');" class="sub" />
					<input type="button" value="裁剪图片" onclick="crop();" class="sub" />
					<input type="button" value="删除图片" onclick="$('[name=\'web_logo\']').val('');" class="sub" />
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">网站URL</span></td>
			<td class="td_right">
				<input type="text" class="text" size="55"  name="web_url" datatype="url" errormsg="网站URL格式不正确！" value="<?php echo $current['web_url']?>" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">联系人</span></td>
			<td class="td_right">
				<input type="text" class="text normal" name="username" value="<?php echo $current['username']?>" datatype="*1-10" ignore="ignore" errormsg="联系人格式不正确！" />
				<span class="setDesc Validform_checktip">10个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">联系QQ</span></td>
			<td class="td_right">
				<input type="text" class="text normal" name="qq" datatype="/^[1-9][0-9]{4,10}$/" ignore="ignore" value="<?php echo $current['qq']?>" errormsg="联系QQ格式不正确！" />
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">排序</span></td>
			<td class="td_right">
				<input type="text" value="0" name="sort" class="text short" datatype="/^[\d]{1,8}$/" value="<?php echo $current['sort']?>" errormsg="排序格式不正确！"  />
				<span class="Validform_checktip setDesc">1-8个字符之间，只能输入数字并且第一位不能为零</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">链接位置</td>
			<td class="td_right">
				首页&nbsp;<input type="radio" value="1" name="link_pos" <?php echo $current['link_pos']==1 ? 'checked="checked"' : '';?> />
				内页&nbsp;<input type="radio" value="2" name="link_pos" <?php echo $current['link_pos']==2 ? 'checked="checked"' : '';?> />
			</td>
		</tr>
		<tr>
			<td class="td_left">显示状态</td>
			<td class="td_right">
				正常&nbsp;<input type="radio" value="1" name="l_status" <?php echo $current['l_status']==1 ? 'checked="checked"' : '';?> />
				隐藏&nbsp;<input type="radio" value="2" name="l_status" <?php echo $current['l_status']==2 ? 'checked="checked"' : '';?> />
			</td>
		</tr>
		<tr>
			<td class="td_left">备注</td>
			<td class="td_right"><textarea class="textCont" cols="63" name="remark" datatype="*1-255" errormsg="255个字符以内！！！"  ignore="ignore"><?php echo $current['remark']?></textarea><span class="Validform_checktip setDesc"></span></td>
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