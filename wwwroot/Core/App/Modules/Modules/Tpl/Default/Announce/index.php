<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="search clearfix">
	<form action="__ACTION__" method="get" name="search_form">
		发布时间： <?php echo FormElements::date('start_time',$_GET['start_time'],0,1)?> 到 <?php echo FormElements::date('end_time',$_GET['end_time'],0,0)?>
		&nbsp;&nbsp;
		可见性：<select name="ann_type">
			<option value="">无</option>
			<option value="1" <?php echo $_GET['ann_type']==1 ? 'selected="selected"' : '';?>>所有人</option>
			<option value="2" <?php echo $_GET['ann_type']==2 ? 'selected="selected"' : '';?>>仅会员</option>
		</select>&nbsp;&nbsp;状态：<select name="a_status">
			<option value="">无</option>
			<option value="1" <?php echo $_GET['a_status']==1 ? 'selected="selected"' : '';?>>正常</option>
			<option value="2" <?php echo $_GET['a_status']==2 ? 'selected="selected"' : '';?>>禁用</option>
		</select>&nbsp;&nbsp;
		标题 <input type="text" class="text" size="30" value="{-$Think.get.title-}" name="title" />&nbsp;&nbsp;
		<input type="button" class="smallSub" onclick="$.CR.G.searchs();" value="搜索" />
	</form>
</div>
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="5%">排序</th>
		<th width="25%">标题</th>
		<th width="20%">过期时间</th>
		<th width="10%">发布人/ID</th>
		<th width="10%">保存时间</th>
		<th width="5%">可见类型</th>
		<th width="5%">状态</th>
		<th width="15%">操作</th>
	</tr>
		<foreach name="announceData[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id'];?>" /></td>
			<td><?php echo $values['id'];?></td>
			<td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
			<?php 
				$style = explode('|', $values['style']);
				$css_string = '';
				if ($style[0]) {
					$css_string .= "color:{$style[0]};";
				}
				if ($style[1]) {
					$css_string .= "font-weight:bold;";
				}
			?>
			<td style="text-align: left;<?php echo $css_string;?>"><?php echo $values['title'];?></td>
			<td>{-:date('Y-m-d H:i:s',$values['start_time'])-} - {-:date('Y-m-d H:i:s',$values['end_time'])-}</td>
			<td>{-$values.username-}/({-$values.userid-})</td>
			<td>{-:date('Y-m-d H:i:s',$values['save_time'])-}</td>
			<td><?php echo $values['ann_type']==1 ? '全部' : '会员';?></td>
			<td><?php echo $values['a_status']==1 ? '<span>√</span>' : '<span class="setRed">╳</span>';?></td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		</foreach>
		<tr>
			<td colspan="10"><div class="page">{-$announceData[1]-}</div></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />