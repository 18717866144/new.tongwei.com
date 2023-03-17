<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<table class="showTable">
	<tr>
		<th width="30"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="30">ID</th>
		<th width="50">排序</th>
		<th width="70">用户名称</th>
		<th width="100">联系电话</th>
		<th width="150">邮箱</th>
		<th>留言内容</th>
		<th width="80">所属分类</th>
		<th width="140">留言时间/IP</th>
        <th width="50">状态</th>
		<th width="100">操作</th>
	</tr>
	<notempty name="data">
		<foreach name="data[0]" item="values">
		<tr>
			<td><input type='checkbox' name='id_all[]' value="{-$values.id-}" /></td>			
			<td>{-$values.id-}</td>
            <td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="2" style="width:30px;" value="<?php echo $values['sort']?>" /></td>
			<td>{-$values.uname-}</td>
			<td>{-$values.mobile-}</td>
			<td>{-$values.email-}</td>
			<td>{-$values.content-}</td>
			<td>{-$values.type_id-}</td>
            <td>{-:date('Y-m-d H:i:s',$values['save_time'])-}<br>{-$values.ip-}<br><?php $ipinfo = json_decode($values['ipinfo'],true);?>{-$ipinfo.country-}{-$ipinfo.area-}</td>
			<td>
				<if condition="$values['status'] == 1">已公开<else /><span class="setRed">不公开</span></if><br>
                <?php if($values['reply']) echo '已回复';else echo '<span class="setRed">未回复</span>';?>
			</td>
			<td>
				<?php if (in_array('edit', $ruleOperate)) {?>
					<a href="<?php echo U('edit',array('id'=>$values['id']))?>" class="operate">回复</a>&nbsp;&nbsp;
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