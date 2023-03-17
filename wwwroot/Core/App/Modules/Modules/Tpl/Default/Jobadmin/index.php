<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="5%">排序</th>
		<th width="15%">职位名称</th>
		<th width="5%">学历要求</th>
		<th width="5%">招聘人数</th>
		<th width="5%">工作地点</th>
		<th width="10%">接收简历邮箱</th>
		<th width="15%">发布时间</th>
		<th width="15%">结束时间</th>
		<th width="5%">状态</th>
		<th width="10%">操作</th>
	</tr>
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /></td>			
			<td>{-$values.id-}</td>
            <td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
			<td>{-$values.jobs-}</td>
			<td>{-$values.schooling-}</td>
			<td>{-$values.number-}</td>
			<td>{-$values.place-}</td>
            <td>{-$values.email-}</td>
			<td>{-:date('Y-m-d H:i:s',$values['inputtime'])-}</td>
			<td>{-:date('Y-m-d H:i:s',$values['end_time'])-}</td>
			<td>
				<if condition="$values['status'] == 1">
					启用
				<else />
					<span class="setRed">停止</span>
				</if>
			</td>
			<td>
				<a href="<?php echo U('join/',array('jobid'=>$values['id']))?>" class="operate">简历</a>&nbsp;&nbsp;
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
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
<include file="./Core/App/Tpl/global_footer.php" />