<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">排序</th>
		<th width="8%">TAG_NAME</th>
		<th width="8%">TAG数量</th>
		<th width="8%">点击数</th>
		<th width="15%">操作</th>
	</tr>
	<notempty name="tagsData[0]">
		<foreach name="tagsData[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /></td>
			<td><input name="sort[{-$values.id-}]" class="text" tabindex="10" type="text" size="3" value="{-$values.sort-}" /></td>
			<td>
				<?php 
					$style = explode('|', $values['style']);
					$color = $style[0] ? "color:{$style[0]};" : '';
					$bold = $style[1] ? "font-weight:{$style[1]};" : '';
					if ($style)
					echo '<font class="'.$color.$bold.'">'.$values['tag_name'].'</font>';
				?>
			</td>
			<td>{-$values.tag_num-}</td>
			<td>{-$values.click-}</td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>
				<?php }?>
			</td>
		</tr>
		</foreach>
		<tr>
			<td colspan="6">
				{-$tagsData[1]-}			
			</td>
		</tr>
	</notempty>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort();" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete')?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />