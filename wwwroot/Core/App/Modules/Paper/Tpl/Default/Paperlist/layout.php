<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />

<div style="border:1px solid #FFBE7A; background:#FFFCED;padding:10px;">
	<strong>{-$paper.title-}</strong> &nbsp; <a href="{-:U('paperlist/add', 'pid='.$paper['id'])-}" class="operate">新增期号</a>
					&nbsp; <a href="{-:U('paperlist/index', 'pid='.$paper['id'])-}" class="operate">期号列表</a>
					&nbsp; -> &nbsp; <strong style="color:red">{-$paperList.title-}</strong>
					&nbsp; <a href="{-:U('paperlist/layout', array('pid'=>$pid, 'lid'=>$lid))-}" class="operate">添加版面</a>
					&nbsp; <a href="{-:U('paperlist/layoutlist', array('pid'=>$pid, 'lid'=>$lid))-}" class="operate">版面管理</a>
</div>

<form action="__ACTION__" method="post" id="formData">
	<input type="hidden" name="id" value="{-$current.id-}">
	<input type="hidden" name="pid" value="{-$pid-}">
	<input type="hidden" name="lid" value="{-$lid-}">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">版面编号</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" name="layout_number" value="{-$current.layout_number-}" datatype="*1-30" errormsg="名称格式不正确！"/>
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>			
		</tr>
		
		<tr>
			<td class="td_left"><strong>版面名称</strong></td>
			<td class="td_right"><input type="text" class="text normal" size="40" name="layout_title" value="{-$current.layout_title-}" datatype="*0-30" errormsg="名称格式不正确！"/></td>
		</tr>
		
		<tr>
			<td class="td_left"><strong>执行编辑</strong></td>
			<td class="td_right"><input type="text" class="text normal" size="40" name="executive_editor" value="{-$current.executive_editor-}" datatype="*0-30" errormsg="名称格式不正确！"/></td>
		</tr>
		
		
		<tr>
			<td class="td_left">版面图片</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="thumbnail" ondblclick="$.CR.G.showIMG(this.value);" value="{-$current.thumbnail-}" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=thumbnail&up_num=1&related=paper&token=<?php echo Tool::encrypt('thumbnail1paper')?>','图片上传');" class="sub" /> 建议比例（宽度*高度）：667*1010
				</div>
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