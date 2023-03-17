<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<div class="search clearfix">
<form action="__ACTION__" method="get" name="search_form">
<input type="hidden" name="specialid" value="{-$specialid-}" />
	<table>
		<tr>
			<td class="td_left"></td>
			<td class="td_right">
			栏目：<select name="cid" class="selectPColumn">
			<option value="0">请选择栏目</option>
			{-$parent_navigate-}
			</select>                    
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
		<th width="10%"><input type="checkbox" name="check_id_all" id="check_id_all" /></th>
		<th width="10%">ID</th>
		<th>标题</th>
		<th width="20%">操作</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr>
			<td><input type='checkbox' name='id_all[]' value="<?php echo $values['id']?>"  dtoken="<?php echo Tool::encrypt($_GET['cid'].$values['id'].$rand)?>" <?php if($values['is_import']){ ?>disabled="disabled"<?php }?> /></td>
			<td><?php echo $values['id']?></td>
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
			<td><?php if($values['is_import']){ ?>
            	已导入
            	<?php }else{ ?>
            	<!--<a href="<?php echo U('content_import',array('specialid'=>$specialid,'cid'=>$cid,'id'=>$values['id'],'import'=>1,'list_page'=>$page))?>" class="operate">导入</a>-->
				<?php }?>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="4"><?php echo $data[1]?></td>
		</tr>
</table>
<script>
	var typeid=0;
</script>
<div class="btns">
	<input type="button" value="反选" id="invert_selection" class="sub" />
	<input type="button" value="导入" onclick="_confirm('是否确定要导入？',function(){$.CR.G.bulkAction('<?php echo U('content_import',array('specialid'=>$specialid,'cid'=>$cid,'import'=>1))?>'+'?typeid='+typeid)});" class="sub" />
	
	到分类<select name="typeid" onChange="typeid=this.value">
	<option value="">不分类</option>
	<?php foreach($setting['type'] as $v){ ?>
		<option value="{-$v['typeid']-}" <if condition="$v['typeid'] eq $typeid">selected</if> >{-$v['name']-}</option>
	<?php }?>
	</select>
	
</div>
<include file="./Core/App/Tpl/global_footer.php" />