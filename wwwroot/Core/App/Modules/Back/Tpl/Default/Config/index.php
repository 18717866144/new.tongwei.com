<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="Config:self_navi" />
<form method="post" action="__ACTION__">
<input type="hidden" value="<?php echo $group;?>" name="var_group" />
	<table class="showTable">
	<tr>
		<th align="left" width="15%">参数描述</th>
		<th align="left" width="55%">参数值</th>
		<th align="left" width="20%">参数名</th>
		<th align="left" width="5%">排序</th>
		<th  align="left" width="5%">操作</th>
	</tr>
		<?php foreach ($paramsData as $values) {?>
			<tr>
				<td width="14%" style="padding-left:1%;text-indent:0px;"><?php echo nl2br($values['var_desc'])?></td>
				<td>
					<?php switch ($values['var_type']) {case 'string':?>
							<input type="text" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="<?php echo htmlspecialchars($values['var_value'])?>" class="text" style="width:500px;" />
						<?php break;case 'numeric':?>
							<input type="text" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="<?php echo $values['var_value']?>" class="text" style="width:120px;" />
						<?php break;case 'boolean':?>
							<label><input type="radio" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="Y" <?php echo $values['var_value']=='Y'?'checked="checked"' : ''?> />&nbsp;是</label>&nbsp;&nbsp;
							<label><input type="radio" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" value="N" <?php echo $values['var_value']=='N'?'checked="checked"' : ''?> />&nbsp;否</label>
						<?php break;case 'textarea':?>
							<textarea class="textCont" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]" style="height:70px;width:490px;"><?php echo htmlspecialchars($values['var_value'])?></textarea>
						<?php break;case 'array':?>
							<textarea class="textCont" style="width:490px;height:70px;" name="name[<?php echo $values['id'];?>#<?php echo $values['var_name'];?>#<?php echo $values['var_type']?>]"><?php echo htmlspecialchars($values['var_value'])?></textarea>
						<?php break;?>
					<?php }?>
				</td>
				<td><?php echo $values['var_name']?></td>
				<td><input name="sort[<?php echo $values['id']?>]" class='text' tabindex='10' type='text' size='3' value="<?php echo $values['sort']?>" class='input' /></td>
				<td><a href="javascript:;" onclick="_confirm('是否确定要删除？',function(){window.location.href='<?php echo U('delete',array('id'=>$values['id']))?>'},$.noop)" class="operate">删除</a></td>
			</tr>
		<?php }?>
		<tr>
			<td colspan="5" style="padding-left:15%;text-align:left;" >
				<input type="submit" value="提交" name="send" class="sub" />
				<?php if (in_array('sort', $ruleOther)) {?>
					<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort')?>');" class="sub" />
				<?php }?>
			</td>
		</tr>
	</table>
</form>
<include file="./Core/App/Tpl/global_footer.php" />