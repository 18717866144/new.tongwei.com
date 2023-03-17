<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="content"  style="width:100%">
	<table class="showTable" width="100%">
		<tr>
			<th width="5%">ID</th>
			<th width="8%">模型类型</th>
			<th width="10%">模型名称</th>
			<th width="10%">模型主表</th>
			<th width="42%">模型备注</th>
			<th width="5%">状态</th>
			<th width="20%">操作</th>
		</tr>
		<?php foreach ($modelData as $values) {?>
			<tr>
				<td><?php echo $values['id']?></td>
				<td>
					{-$values['model_type']-}
				</td>
				<td><?php echo $values['model_name']?></td>
				<td><?php echo $values['table_name']?></td>
				<td><?php echo $values['remark']?></td>
				<td><?php echo $values['m_status']==1 ? '正常' : '禁用';?></td>
				<td>
				<a href="<?php echo U(GROUP_NAME.'/Fields/index',array('mid'=>$values['id'],'model_type'=>$values['model_type']))?>" class="operate">字段管理</a>&nbsp;&nbsp;
				<?php if ($values['model_type'] == 'form') {?>
				<a href="javascript:;" id="getScript" class="operate">script标签</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
				</td>
			</tr>
			<?php }?>
	</table>
</div>
<script type="text/javascript">
$(function(){
	$('#getScript').click(function(){
		art.dialog({
			title:'script标签',
			content:'&lt;script type="text/javascript" src="<?php echo U('Modules/Formindex/get_form_js',array('mid'=>'<literal>{-$Think.get.mid-}</literal>','cid'=>'<literal>{-$Think.get.cid-}</literal>','aid'=>'<literal>{-$Think.get.aid-}</literal>'))?>"&gt;&lt;/script&gt;',
			lock:true
		})
	})
})
</script>
<include file="./Core/App/Tpl/global_footer.php" />