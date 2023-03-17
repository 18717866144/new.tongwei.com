<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="search clearfix">
	<form action="__ACTION__" method="get" name="search_form">
		所属类别：<select name="type_id">
			<option value="">全部</option>
			<notempty name="type">
            <foreach name="type" item="v">
            <option value="{-$v.id-}" <?php echo $_GET['type_id']==$v['id'] ? 'selected="selected"' : '';?>>{-$v.type_name-}</option>
            </foreach>
            </notempty></select>
		
		&nbsp;&nbsp;状态：
		<select name="l_status">
			<option value="">全部</option>
			<option value="1" {-:$_GET['l_status']==1 ? 'selected="selected"' : ''-}>启用</option>
			<option value="2" {-:$_GET['l_status']==2 ? 'selected="selected"' : ''-}>停止</option>
		</select>		
		<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
	</form>
</div>

<table class="showTable" cellpadding="0" cellspacing="0" style="margin-top:5px;">
	<tr>		
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
        <th width="5%">排序</th>
        <th width="12%">标题</th>
		<th width="23%">连接</th>
        <th width="30%">图片</th>
		<th width="10%">所属类别</th>
        <th width="5%">状态</th>        
		<th width="10%">操作</th>
	</tr>            
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /></td>
            <td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
            <td>{-$values.title-}</td>
            <td>{-$values.url-}</td>
            <td>{-$values.picurl-}</td>
            <td><?php echo $type[$values['type_id']]['type_name'];?></td>
			<td>
				<if condition="$values['l_status'] == 1">
					启用
				<else />
					<span class="setRed">停用</span>
				</if>
			</td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('确定要删除？',function(){location.href='<?php echo U('delete',array('id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		</foreach>
	</notempty>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<input type="button" value="启用" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>1))?>')" class="sub" />
	<input type="button" value="停用" onclick="$.CR.G.bulkAction('<?php echo U('audit',array('status'=>-1))?>')" class="sub" />
	<?php if (in_array('sort', $ruleOther)) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('mid'=>$values['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="删除" onclick="_confirm('确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>    
</div>
<include file="./Core/App/Tpl/global_footer.php" />