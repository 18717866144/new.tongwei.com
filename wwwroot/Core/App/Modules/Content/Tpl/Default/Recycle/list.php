<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="Recycle:self_navi" />
<div class="search clearfix">
<form action="{-:U('Content/Recycle/index')-}" method="get" name="search_form">
	<table>
		<tr>
			<td class="td_left">搜索[Search]：</td>
			<td class="td_right">
					时间：<?php echo FormElements::date('start_time',$_GET['start_time'],0,1)?> 到 <?php echo FormElements::date('end_time',$_GET['end_time'],0,0)?>
					 状态：<select name="a_status">
						<option value="">全部</option>
						<option value="1" <?php echo $_GET['a_status']==1 ? 'selected="selected"' : '';?>>已审核</option>
						<option value="2" <?php echo $_GET['a_status']==2 ? 'selected="selected"' : '';?>>未审核</option>
						<option value="3" <?php echo $_GET['a_status']==3 ? 'selected="selected"' : '';?>>未通过</option>
					</select>&nbsp;&nbsp;
					 类型：<select name="s_type">
						<option value="title" <?php echo $_GET['s_type']=='title' ? 'selected="selected"' : '';?>>标题</option>
						<option value="id" <?php echo $_GET['s_type']=='id' ? 'selected="selected"' : '';?>>ID</option>
						<option value="tags" <?php echo $_GET['s_type']=='tags' ? 'selected="selected"' : '';?>>标签</option>
						<option value="description" <?php echo $_GET['s_type']=='description' ? 'selected="selected"' : '';?>>简介</option>
						<option value="u_username" <?php echo $_GET['s_type']=='u_username' ? 'selected="selected"' : '';?>>发布人[普]</option>
						<option value="a_username" <?php echo $_GET['s_type']=='a_username' ? 'selected="selected"' : '';?>>发布人[管]</option>
					</select>&nbsp;&nbsp;
					模型ID：<select name="mid"><?php foreach ($models as $key=>$value) {?>
					<option value="<?php echo $key;?>" <?php echo $_GET['mid']==$key ? 'selected="selected"' : '';?>><?php echo $value;?></option>
					<?php }?>
					</select>&nbsp;&nbsp;
					<input type="text" name="search_content" size="25" value="<?php echo $_GET['search_content']?>" />&nbsp;&nbsp;
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs('?mid=<?php echo $_GET['mid'];?>&');" />&nbsp;&nbsp;
			</td>
		</tr>
	</table>
</form>
</div>
<table class="showTable">
	<tr>
		<th width="5%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="5%">ID</th>
		<th width="5%">排序</th>
		<th width="35%">标题</th>
		<th width="7%">发布人</th>
		<th width="13%">发布时间</th>
		<th width="5%">点击量</th>
		<th width="5%">状态</th>
		<th width="40%">操作</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>" /></td>
			<td><?php echo $values['id']?></td>
			<td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
			<td>
				<?php echo String::msubstr($values['title'], 0,25);?>
				<?php if (!empty($values['thumbnail'])) {?>
				&nbsp;<img src="__PUBLIC__/modules/content/images/small_img.gif" alt="<?php echo $values['thumbnail']?>" onclick="$.CR.G.showIMG(this.alt)" style="cursor: pointer;" />
				<?php }?>
				<?php 
				if ($values['attr']) {
					$attrString = '<span class="setRed">[';
					$attr = explode(',', $values['attr']);
					foreach ($attr as $value) {
						switch ($value) {
							case 'r':
								$attrString .='推荐&nbsp;';
								break;
							case 'a':
								$attrString .='特荐&nbsp;';
								break;
							case 'h':
								$attrString .='头条&nbsp;';
								break;
							case 's':
								$attrString .='滚动&nbsp;';
								break;
							case 'f':
								$attrString .= '幻灯&nbsp;';
								break;
						}
					}
					$attrString = rtrim($attrString,'&nbsp;');
					$attrString .= ']</span>';
				} else {
					$attrString = '';
				}
				echo $attrString;
				?>
			</td>
			<td><?php echo $values['is_admin']==1 ? $values['a_username'].'[管]' : ($values['u_username'] ? $values['u_username'] : $values['u_email']).'[普]';?></td>
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			<td><?php echo $values['click']?></td>
			<td><?php echo $values['a_status']==1 ? '√' : '<span class="setRed">╳</span>'?></td>
			<td>
				<?php if (in_array('revert', $ruleOperate)) {?>
					<a href="<?php echo U('revert',array('mid'=>$_GET['mid'],'id'=>$values['id']));?>" class="operate new_blank">还原</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('delete', $ruleOperate)) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('delete',array('mid'=>$_GET['mid'],'id'=>$values['id']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
				<?php }?>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="9"><?php echo $data[1]?></td>
		</tr>
</table>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<?php if (in_array('revert', $ruleOther)) {?>
		<input type="button" value="还原" onclick="$.CR.G.bulkAction('<?php echo U('revert',array('mid'=>$_GET['mid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther)) {?>
		<input type="button" value="彻底删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkAction('<?php echo U('delete',array('mid'=>$_GET['mid']))?>','dtoken')});" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />