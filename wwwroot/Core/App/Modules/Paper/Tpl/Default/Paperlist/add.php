<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />

<div style="border:1px solid #FFBE7A; background:#FFFCED;padding:10px;">
	<strong>{-$paper.title-}</strong> &nbsp; <a href="{-:U('paperlist/add', 'pid='.$paper['id'])-}" class="operate">新增期号</a>
					&nbsp; <a href="{-:U('paperlist/index', 'pid='.$paper['id'])-}" class="operate">期号列表</a>
</div>

<form action="__ACTION__" method="post" id="formData">
	<input type="hidden" name="id" value="{-$current.id-}">
	<input type="hidden" name="pid" value="{-$pid-}">
	<table class="formTable"  style="margin-top:5px;">
		<tr>
			<td class="td_left"><strong>刊物名称</strong></td>
			<td class="td_right"><strong>{-$paper.title-}</strong></td>
		</tr>
			
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">本期名称</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" name="title" value="{-$current.title-}" datatype="*1-30" errormsg="名称格式不正确！"/>
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>			
		</tr>
		
		<tr>
			<td class="td_left">展示图片</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="thumbnail" ondblclick="$.CR.G.showIMG(this.value);" value="{-$current.thumbnail-}" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=thumbnail&up_num=1&related=paper&token=<?php echo Tool::encrypt('thumbnail1paper')?>','图片上传');" class="sub" /> 建议比例：360x472 、 180x236			
				</div>
			</td>
		</tr>
		
		<tr>
			<td class="td_left">PDF文件</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="pdf" id="pdf" value="{-$current.pdf-}" />&nbsp;&nbsp;
					<input type="button" value="上传文件" onclick="openNewWindow('__APP__/Attachment/Attachment/file?file_name=pdf&file_type=soft&up_num=1&download_link=1&download_type=1&related=paper&token=<?php echo Tool::encrypt('pdfsoft111paper')?>','文件上传');" class="sub" /> <input type="button" id="showfile" class="sub" onclick="$.CR.B.F.index('pdf','','showfile');" value="选择文件" /> PDF文件请尽量压缩，否则网页打开易故障			
				</div>
			</td>
		</tr>
			
		<tr>
			<td class="td_left">本期简介</td>
			<td class="td_right"><textarea class="textCont" rows="5" cols="49" name="description" datatype="*0-255" errormsg="255个字符以内！！！"  ignore="ignore">{-$current.description-}</textarea><span class="Validform_checktip setDesc"></span></td>
		</tr>
		
		<tr>
			<td class="td_left">发布时间</td>
			<td class="td_right">
			{-:FormElements::date('create_time', date('Y-m-d',$current['create_time']?$current['create_time']:time()))-}
			</td>
		</tr>
			
			
				
		<tr>
			<td class="td_left">外部链接</td>
			<td class="td_right">
				<input type="text" class="text" size="55" name="link_url" id="link_url" value="{-:$current['is_link']?$current['url']:''-}" {-:$current['is_link']?'':'disabled'-} />
				<input type="checkbox" value="1" name="is_link" onclick="if($(this).prop('checked')){$('#link_url').removeAttr('disabled');}else{$('#link_url').attr('disabled','disabled');}" {-:$current['is_link']?'checked':''-} />		
			</td>
		</tr>

		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">排序</span></td>
			<td class="td_right">
				<input type="text" value="{-$current.sort|default=0-}" name="sort" class="text short" datatype="/^[\d]{1,8}$/" errormsg="排序格式不正确！"  />
				<span class="Validform_checktip setDesc">1-8个字符之间，只能输入数字并且第一位不能为零</span>
			</td>
		</tr>
			
		<tr>
			<td class="td_left">发布状态</td>
			<td class="td_right">
				<label>发布&nbsp;<input type="radio" value="1" name="a_status" {-:$current['a_status']==1||empty($current['a_status'])?'checked':''-} /></label>
				&nbsp;&nbsp;
				<label>禁用&nbsp;<input type="radio" value="2" name="a_status" {-:$current['a_status']==2?'checked':''-} /></label>
			</td>
		</tr>
		
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<input type="submit" name="send" class="sub" value=" 提交 " />
				<input type="reset" class="sub" />
			</td>
		</tr>
	</table>
</form>
<include file="./Core/App/Tpl/global_footer.php" />