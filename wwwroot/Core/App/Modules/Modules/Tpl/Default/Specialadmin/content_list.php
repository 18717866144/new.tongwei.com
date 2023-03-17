<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/Content/self_navi.php" />
<div class="search clearfix">
<form action="__ACTION__" method="get" name="search_form">
<input type="hidden" name="specialid" value="{-$specialid-}">
	<table>
		<tr>
			<td class="td_left">搜索：</td>
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
					 专题类别：<select name="typeid">
						<option value="">全部</option>
						<?php foreach($setting['type'] as $k=>$v){
							echo '<option value="',$v['typeid'],'" ',($_GET['typeid']==$v['typeid']?'selected':''),'>',$v['name'],'</option>';
						}						
						?>
					</select>&nbsp;&nbsp;
					<input type="text" name="search_content" size="25" value="<?php echo $_GET['search_content']?>" />&nbsp;&nbsp;
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />&nbsp;&nbsp;
					<?php if (!SUPER_ADMIN) {?>
					<input type="button" class="smallSub <?php echo $rtype=='my' ? 'currentSub' : ''?>" value="我发布的" onclick="window.location.href='__SELF__<?php echo strpos(__SELF__, '?')===false ? '?' : '&';?><?php echo 'rtype=my';?>'" />&nbsp;&nbsp;
					<input type="button" class="smallSub <?php echo $rtype=='all' ? 'currentSub' : ''?>" value="全部列表" onclick="window.location.href='__SELF__<?php echo strpos(__SELF__, '?')===false ? '?' : '&';?><?php echo 'rtype=all';?>'" />
					<?php }?>
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
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>"  dtoken="<?php echo Tool::encrypt($specialid.$values['id'])?>" /></td>
			<td><?php echo $values['id']?></td>
			<td><input name="sort[<?php echo $values['id']?>]" class="text" tabindex="10" type="text" size="3" value="<?php echo $values['sort']?>" /></td>
			<td>
				{-:($values['typeid']>0?'<span class="setRed">'.$setting['type'][$values['typeid']]['name'].'</span>':'')-} {-$values.title-}<small style="margin-left:8px; color:#999;"><?php if($values['is_link']){?>[链接]<?php }?></small>
				<?php if (!empty($values['thumbnail'])) {?>
				&nbsp;<img src="__PUBLIC__/modules/content/images/small_img.gif" alt="<?php echo $values['thumbnail']?>" onclick="$.CR.G.showIMG(this.alt)" style="cursor: pointer;" />
				<?php }?>
				<?php				
				if ($values['attr']) {
					$attrString = '<span class="setRed">[';
					$attr = explode(',', $values['attr']);
					foreach ($attr as $value) {
						switch ($value) {
							case 'h':
								$attrString .='焦点图片&nbsp;';
								break;
							case 's':
								$attrString .='头条推荐&nbsp;';
								break;
							case 'j':
								$attrString .= '图解推荐&nbsp;';
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
					<a href="<?php if($values['is_link']){?>{-$values['url']-}<?php }else{?>/special/{-$values['specialid']-}/{-$values['id']-}.html<?php }?>" target="_blank" class="operate">预览</a>&nbsp;&nbsp;
					<?php if (in_array('content_edit', $ruleOperate) ) {?>
					<a href="<?php echo U('create_show_html',array('specialid'=>$values['specialid'],'id'=>$values['id'],'list_page'=>$_GET['page']))?>" class="operate">生成HTML</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('content_edit', $ruleOperate) && (SUPER_ADMIN || $adminNavigate['admin_edit'])) {?>
					<a href="<?php echo U('Content_edit',array('specialid'=>$values['specialid'],'id'=>$values['id'],'token'=>Tool::encrypt($_GET['specialid'].$values['id']),'list_page'=>$_GET['page']));?>" class="operate new_blank" target="_blank">编辑</a>&nbsp;&nbsp;
				<?php }?>
				<?php if (in_array('content_delete', $ruleOperate) && (SUPER_ADMIN || $adminNavigate['admin_delete'])) {?>
					<a href="javascript:;" onclick="(_confirm('是否确定要删除？',function(){location.href='<?php echo U('content_delete',array('specialid'=>$values['specialid'],'id'=>$values['id'],'token'=>Tool::encrypt($values['specialid'].$values['id']),'list_page'=>$_GET['page']))?>'}))" class="operate">删除</a>&nbsp;&nbsp;
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
	<?php if (in_array('sort', $ruleOther) && (SUPER_ADMIN || $adminNavigate['admin_sort'])) {?>
		<input type="button" value="排序" onclick="$.CR.G.sort('<?php echo U('sort',array('cid'=>$_GET['cid']))?>');" class="sub" />
	<?php }?>
	<?php if (in_array('delete', $ruleOther) && (SUPER_ADMIN || $adminNavigate['admin_delete'])) {?>
		<input type="button" value="删除" onclick="_confirm('是否确定要删除？',function(){$.CR.G.bulkTokenAction('<?php echo U('content_delete',array('specialid'=>$specialid,'list_page'=>$_GET['page']))?>','dtoken')});" class="sub" />
	<?php }?>
	<?php if (in_array('update_url', $ruleOther)) {?>
		<input type="button" value="更新URL" onclick="$.CR.G.bulkAction('<?php echo U('update_url',array('cid'=>$_GET['cid']))?>')" class="sub" />
	<?php }?>
	<?php if (in_array('create_html', $ruleOther)) {?>
		<input type="button" value="更新HTML" onclick="$.CR.G.bulkAction('<?php echo U('create_html',array('cid'=>$_GET['cid']))?>')" class="sub" />
	<?php }?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />