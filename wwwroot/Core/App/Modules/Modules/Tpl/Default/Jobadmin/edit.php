<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" name="id" value="{-$current.id-}" />
	<table class="formTable">
        <tr>
			<td class="td_left" width="150"><span class="setRed">*</span>&nbsp;<span class="Validform_label">招聘职位</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="20" name="jobs" datatype="*1-30" errormsg="格式不正确！" value="{-$current.jobs-}" />
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>
		</tr>
		
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">学历要求</span></td>
			<td class="td_right a_click">
				<input type="text" class="text" size="20"  name="schooling" datatype="*1-20" errormsg="格式不正确！" value="{-$current.schooling-}" />
               	&nbsp; <a href="javascript:;">大专</a>&nbsp; <a href="javascript:;">本科</a>&nbsp; <a href="javascript:;">研究生</a>&nbsp; <a href="javascript:;">不限</a>
				<span class="setDesc Validform_checktip"></span>

			</td>
		</tr>
        
		<tr>
			<td class="td_left"> <span class="Validform_label">招聘人数</span></td>
			<td class="td_right a_click">
				<input type="text" class="text normal" name="number" datatype="n1-5|/^不限$/" errormsg="格式不正确！" value="{-$current.number-}" />
				&nbsp; <a href="javascript:;">不限</a>&nbsp; <a href="javascript:;">1</a>&nbsp; <a href="javascript:;">10</a> <span class="setDesc Validform_checktip">请填写数字或不限</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">工作地点</span></td>
			<td class="td_right a_click">
				<input type="text" class="text normal" name="place" value="{-$current.place-}" />
				&nbsp; <a href="javascript:;">合肥</a>&nbsp; <a href="javascript:;">成都</a>&nbsp; <a href="javascript:;">全国</a> <span class="setDesc Validform_checktip"></span>                 
			</td>
		</tr>
        <tr>
			<td class="td_left">邮箱地址</td>
			<td class="td_right">
				<input type="text" class="text normal" size="20" name="email" datatype="e|/^$/" errormsg="邮箱格式不正确！" value="{-$current.email-}" />
				<span class="setDesc Validform_checktip">收到简历自动发送到邮箱，不填写则不发送</span>
			</td>
		</tr>
        <tr>
			<td class="td_left"> <span class="Validform_label">发布时间</span></td>
			<td class="td_right">
			<?php echo FormElements::date('inputtime',date('Y-m-d H:i:s',$current['inputtime']),1,0)?>				 
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">结束时间</span></td>
			<td class="td_right">
			<?php echo FormElements::date('end_time',date('Y-m-d H:i:s',$current['end_time']),1,0)?>				 
			</td>
		</tr>
        <tr>
			<td class="td_left">发布状态</td>
			<td class="td_right">
				<input type="radio" value="1" name="status" <?php if($current['status']==1){?> checked="checked"<?php }?> />已通过&nbsp;
				<input type="radio" value="2" name="status" <?php if($current['status']!=1){?> checked="checked"<?php }?> />未通过&nbsp;
			</td>
		</tr>
        <tr>
			<td class="td_left">排列顺序</td>
			<td class="td_right">
				<input type="text" class="text normal" size="20" name="sort" datatype="n1-5" errormsg="排列顺序格式不正确" value="{-$current.sort-}"  />
			</td>
		</tr>
		<tr>
			<td class="td_left">招聘详情</td>
			<td class="td_right">
            <textarea name="content" id="content" style="float:left">{-$current.content-}</textarea> 
			<?php echo FormElements::edit('content','basic',260,600);?></td>
		</tr>
        
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<input type="submit" name="send" class="sub" value="发布信息" />
				<input type="reset" class="sub" value="清空重填" />
			</td>
		</tr>
	</table>
</form>

<script>
$('.a_click a').click(function(){
	var html = $(this).html();
	$(this).parent().find('input').val(html);
});
</script>
<include file="./Core/App/Tpl/global_footer.php" />