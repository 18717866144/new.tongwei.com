<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="search clearfix">
	<form action="__ACTION__" method="get" name="search_form">
		链接类别：<select name="type_id">
			<option value="">全部</option>
			<notempty name="type">
            <foreach name="type" item="v">
            <option value="{-$v.id-}" <?php echo $_GET['type_id']==$v['id'] ? 'selected="selected"' : '';?>>{-$v.type_name-}</option>
            </foreach>
            </notempty></select>
		链接位置：<select name="link_pos">
			<option value="">全部</option>
			<option value="1" {-:$_GET['link_pos']==1 ? 'selected="selected"' : ''-}>首页</option>
			<option value="2" {-:$_GET['link_pos']==2 ? 'selected="selected"' : ''-}>内页</option>
		</select>
		&nbsp;&nbsp;链接状态：
		<select name="l_status">
			<option value="">全部</option>
			<option value="1" {-:$_GET['l_status']==1 ? 'selected="selected"' : ''-}>已审核</option>
			<option value="2" {-:$_GET['l_status']==2 ? 'selected="selected"' : ''-}>未审核</option>
		</select>
		&nbsp;&nbsp;网站名称 <input type="text" class="text" size="30" value="{-$Think.get.web_name-}" name="web_name" />&nbsp;&nbsp;
		<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
	</form>
</div>
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="5%">排序</th>
		<th width="8%">网站名称</th>
		<th width="15%">图片Logo</th>
		<th width="7%">链接类别</th>
		<th width="7%">链接位置</th>
		<th width="12%">时间</th>
		<th width="8%">联系人</th>
		<th width="8%">联系QQ</th>
		<th width="5%">状态</th>
		<th width="10%">操作</th>
	</tr>
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /></td>
			<td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
			<td>{-$values.id-}</td>
			<td><a href="{-$values.web_url-}" title="{-$values.web_url-}" target="_blank">{-$values.web_name-}</a></td>
			<td>{-:empty($values['web_logo']) ? '' : '<img src="__ROOT__/'.$values['web_logo'].'" width="88" height="32" />'-}</td>
			<td><?php echo $type[$values['type_id']]['type_name'];?></td>
			<td>{-$values['link_pos']==1 ? '首页' : '内页'-}</td>
			<td>{-:date('Y-m-d H:i:s',$values['save_time'])-}</td>
			<td>{-$values.username-}</td>
			<td>{-$values.qq-}</td>
			<td>
				<if condition="$values['l_status'] == 1">
					正常
				<else />
					<span class="setRed">隐藏</span>
				</if>
			</td>
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
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$values['mid']))?>')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />