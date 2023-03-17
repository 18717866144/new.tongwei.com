<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<div style="border:1px solid #FFBE7A; background:#FFFCED;padding:10px;">
	<strong>{-$paper.title-}</strong> &nbsp; <a href="{-:U('paperlist/add', 'pid='.$paper['id'])-}" class="operate">新增期号</a>
					&nbsp; <a href="{-:U('paperlist/index', 'pid='.$paper['id'])-}" class="operate">期号列表</a>
					&nbsp; -> &nbsp; <strong style="color:red">{-$paperList.title-}</strong>
					&nbsp; <a href="{-:U('paperlist/layout', array('pid'=>$pid, 'lid'=>$lid))-}" class="operate">添加版面</a>
					&nbsp; <a href="{-:U('paperlist/layoutlist', array('pid'=>$pid, 'lid'=>$lid))-}" class="operate">版面管理</a>
</div>

<div class="search clearfix" style="margin-top:10px">
<form action="__ACTION__" method="get" name="search_form">
<input type="hidden" name="pid" value="{-$pid-}" />
	<table>
		<tr>
			<td class="td_left"></td>
			<td class="td_right">
			期号：<select name="lid" class="selectPColumn">
			<option value="">近期全部</option>
			<volist name="paperLists" id="vo">
				<option value="{-$vo.id-}" <if condition="$vo['id'] eq $lid">selected="selected"</if> >{-$vo.title-}</option>
			</volist>			
			</select>
           	版面：<select name="layoutid" class="selectPColumn">
			<option value="">全部版面</option>
			<volist name="layouts" id="vo">
				<option value="{-$vo.id-}" <if condition="$vo['id'] eq $layoutid">selected="selected"</if> >{-$vo.layout_number-}：{-$vo.layout_title-}</option>
			</volist>
			</select>			
			状态：<select name="a_status">
			<option value="">全部</option>
			<option value="1" <?php echo $_GET['a_status']==1 ? 'selected="selected"' : '';?>>已审核</option>
			<option value="2" <?php echo $_GET['a_status']==2 ? 'selected="selected"' : '';?>>未审核</option>
			<option value="3" <?php echo $_GET['a_status']==3 ? 'selected="selected"' : '';?>>未通过</option>
			</select>&nbsp;&nbsp;			
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
		<th width="30">ID</th>
		<th>标题</th>
		<th width="120">所属版面</th>
		<th width="50">状态</th>
		<th width="110">操作</th>
	</tr >
		<?php foreach ($data[0] as $values) {?>
		<tr>			
			<td><?php echo $values['id']?></td>
			<td><a href="{-$values.url-}" target="_blank"><?php echo $values['title'];?></a>
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
			<td><a href="{-$layouts[$values['layoutid']]['url']-}" target="_blank">{-$layouts[$values['layoutid']]['layout_number']-}：{-$layouts[$values['layoutid']]['layout_title']-}</a></td>
			<td>{-$a_status[$values['a_status']]-}</td>
			<td>
				<a href="{-$values.url-}" target="_blank">查看</a>
			</td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="3"><?php echo $data[1]?></td>
		</tr>
</table>	
</div>
<script>
	var $areaItems = $( artDialog.open.origin.document.getElementById('areaItems') );
	var $isSvae = $( artDialog.open.origin.document.getElementById('isSave') );	
	var ref = art.dialog.data('ref');
	var $li =  $areaItems.find('li[ref="'+ref+'"]');
	$('.selectContent').click(function(){ 		
		var title = $(this).data('title'),url=$(this).data('url'),id=$(this).data('id');	
		
		$li.find('.areaTitleHtml').removeClass('no').html('<a href="'+url+'"  target="_blank">'+title+'</a>');
		$li.find('.areaTitle').val(title);
		$li.find('.areaLink').val(url);
		$li.find('.contentId').val(id);
		$li.find('.areaActionAdd ').removeClass('areaActionAdd').addClass('areaActionEdit').html('修改').attr('title','修改文章');
		$isSvae.val(0);
		art.dialog.close();
		//alert( $s.html() )
	});
</script>
<include file="./Core/App/Tpl/global_footer.php" />