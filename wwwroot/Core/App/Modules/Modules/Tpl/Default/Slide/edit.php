<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" name="id" value="{-$current.id-}">
	<table class="formTable">    
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;所属类别</td>
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
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">标题</span></td>
			<td class="td_right"><input type="text" class="text normal" size="50" name="title" value="{-$current.title-}"></td>
		</tr>
        <tr>
            <td class="td_left"><span class="Validform_label">副标题</span></td>
            <td class="td_right"><input type="text" class="text" size="50" name="s_title" value="{-$current.s_title-}"/></td>
        </tr>
        <tr>
            <td class="td_left">&nbsp;<span class="Validform_label">标题颜色</span></td>
            <td class="td_right">
                <input type="text" class="text" size="10"  name="color" value="{-$current.color-}"/>（文字颜色，如：#ffffff）
            </td>
        </tr>
        <tr>
            <td class="td_left"><span class="Validform_label">副标题字体</span></td>
            <td class="td_right"><input type="text" class="text" size="50" name="s_size" value="{-$current.s_size-}"/>（字体大小数字，如：16px）</td>
        </tr>
        <tr>
            <td class="td_left">标题显示</td>
            <td class="td_right">
                显示&nbsp;<input type="radio" value="1" name="t_show" <?php if($current['t_show']==1) echo' checked="checked" ';?>/>
                &nbsp;&nbsp;不显示&nbsp;<input type="radio" value="2" name="t_show" <?php if($current['t_show']==2) echo' checked="checked" ';?>/>
            </td>
        </tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span> 图片</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="50" name="picurl" value="{-$current.picurl-}" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=picurl&up_num=1&related=slide&token=<?php echo Tool::encrypt('picurl1slide')?>','图片上传');" class="sub" />					
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left">&nbsp;<span class="Validform_label">链接URL</span></td>
			<td class="td_right">
				<input type="text" class="text" size="50"  name="url" value="{-$current.url-}">				
			</td>
		</tr>
		
		<tr>
			<td class="td_left">&nbsp;<span class="Validform_label">排序号</span></td>
			<td class="td_right">
				<input type="text" class="text" size="10"  name="sort" value="{-$current.sort-}" />（大的靠前）				
			</td>
		</tr>
        
		<tr>
			<td class="td_left">显示状态</td>
			<td class="td_right">
				启用&nbsp;<input type="radio" value="1" name="l_status" <?php if($current['l_status']==1) echo' checked="checked" ';?> >
				&nbsp;&nbsp;停止&nbsp;<input type="radio" value="2" name="l_status" <?php if($current['l_status']==2) echo' checked="checked" ';?> >
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