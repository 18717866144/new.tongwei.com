<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="60"><input type="checkbox" name="check_id_all" id="check_id_all" /> ID</th>
		<th width="15%">申请职位</th>
        <th width="10%">姓名</th>
        <th width="35">性别</th>
        <th width="35">年龄</th>
		<th width="50">学历</th>
		<th width="90">电话</th>
		<th width="150">邮箱</th>
		<th width="120">申请时间</th>
		<th>操作</th>
	</tr>
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /> {-$values.id-}</td>			
			<td><a href="{-:U('join','jobid='.$values['jobid'])-}">{-$values.jobs-}</a></td>
            <td>{-$values.uname-}</td>
			<td>{-$values['sex']==1?男:($values['sex']==2?女:'')-}</td>
			<td>{-$values.age-}</td>
			<td>{-$values.schooling-}</td>
			<td>{-$values.tel-}</td>
            <td>{-$values.email-}</td>
			<td>{-:date('Y-m-d H:i:s',$values['create_time'])-}</td>
			<td><a href="{-$values.doc-}" target="_blank" class="operate">简历</a>&nbsp;&nbsp;
           		<a href="javascript:sendmail({-$values.id-})" class="operate" title="把本简历发到指定的邮箱">邮件</a>&nbsp;&nbsp;
				<?php if (in_array('join_edit', $ruleOperate)) {?>
				<a href="<?php echo U('join_edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('join_delete', $ruleOperate)) {?>
				<a href="javascript:;" onclick="(_confirm('确定要删除？',function(){location.href='<?php echo U('join_delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		</foreach>
		<tr>
			<td colspan="12">
				{-$data[1]-}			
			</td>
		</tr>
	</notempty>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>    
</div>
<script>
function sendmail(id){
	if(art.dialog.list['sendmaildialog']) art.dialog.list['sendmaildialog'].close();
	art.dialog({
		id: 'sendmaildialog',
		title:'发送邮件',
		icon:'face-smile',
		content: '将简历ID为[ <strong style="color:#F00">'+id+'</strong> ]的应聘记录发送到邮箱<br><br>邮箱地址：<input type=text name=email>',
		button: [
			{
				name: '发送邮件',
				callback: function () {
					var val = ($('input[name=email]').val());
					if(!val.match(/^[a-z0-9]+([._]*[a-z0-9]+)*@[a-z0-9]+([_.][a-z0-9]+)+$/gi)){
						 alert("邮箱格式不正确，请重新填写");
						 $("input[name=email]").focus();
						 return false;
					}
					$.ajax({
						async:true,//非跨域下有效
						url:'<?php echo U('sendMail')?>',
						data:{'id':id,'email':val},
						type:'POST',
						dataType:'json',
						boforeSend:function(){art.dialog.tips('数据正在提交...', 10);},
						success:function(data){_tips(data,true);},
						error:function(){art.dialog.tips('发送数据至服务器失败！');}
					})
					return true;
				},
				focus: true
			},
			{
				name: '关闭'
			}
		],
		init:function(){
			$("input[name=email]").focus();
		}
	});
}
</script>
<include file="./Core/App/Tpl/global_footer.php" />