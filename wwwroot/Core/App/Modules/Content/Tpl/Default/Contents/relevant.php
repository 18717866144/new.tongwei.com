<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<style type="text/css">
.showTable tr.current td {background:#d3eff7;}
</style>
<div class="search clearfix">
<form action="__ACTION__" method="get" name="search_form">
	<table>
		<tr>
			<td class="td_left">搜索[Search]：</td>
			<td class="td_right">
					<select name="cid">
						<option value="">不限</option>
						<?php echo $navigate?>
					</select>
					 状态：<select name="s_type">
						<option value="title" <?php echo $_GET['s_type']=='title' ? 'selected="selected"' : '';?>>标题</option>
						<option value="id" <?php echo $_GET['s_type']=='id' ? 'selected="selected"' : '';?>>ID</option>
						<option value="tags" <?php echo $_GET['s_type']=='tags' ? 'selected="selected"' : '';?>>标签</option>
						<option value="description" <?php echo $_GET['s_type']=='description' ? 'selected="selected"' : '';?>>简介</option>
						<option value="u_username" <?php echo $_GET['s_type']=='u_username' ? 'selected="selected"' : '';?>>发布人[普]</option>
						<option value="a_username" <?php echo $_GET['s_type']=='a_username' ? 'selected="selected"' : '';?>>发布人[管]</option>
					</select>&nbsp;&nbsp;
					<input type="text" name="search_content" size="25" value="<?php echo $_GET['search_content']?>" />&nbsp;&nbsp;
					<input type="button" class="smallSub" value="搜索" name="search" onclick="$.CR.G.searchs();" />
			</td>
		</tr>
	</table>
</form>
</div>
<table class="showTable">
	<tr>
		<th width="7%">ID</th>
		<th width="60%">标题</th>
		<!--<th width="8%">发布人</th>-->
		<th width="15%">发布时间</th>
	
		<th width="5%">状态</th>
	</tr>
		<?php foreach ($data[0] as $values) {?>
		<tr id="<?php echo $values['id']?>" title=<?php echo String::msubstr($values['title'], 0,13)?>>
			<td style="padding-left:0px;"><?php echo $values['id']?></td>
			<td>
				<a href="javascript:;" class="title"><?php echo $values['title']?></a>
				<?php if (!empty($values['thumbnail'])) {?>
				&nbsp;<img src="__PUBLIC__/modules/content/images/small_img.gif" alt="<?php echo $values['thumbnail']?>" onclick="$.CR.G.showIMG(this.alt)" style="cursor: pointer;" />
				<?php }?>
			</td>
		
			<td><?php echo date('Y-m-d H:i:s',$values['save_time'])?></td>
			
			<td><?php echo $values['a_status']==1 ? '√' : '<span class="setRed">╳</span>'?></td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="7"><?php echo $data[1]?></td>
		</tr>
</table>
<script type="text/javascript">
var api = art.dialog.open.api;	// 			art.dialog.open扩展方法
var parent = art.dialog.opener;	// 父页面window对象

$(function(){
	
	$('.showTable').on('click','tr .title',function(){
		let tr_obj = $(this).parent().parent();
		
		tr_obj.hasClass('current')? tr_obj.removeClass('current') : tr_obj.addClass('current');
	})

	api.button({
		name: '确定',
		callback: function () {
			var relevantValue = '';
			var _titleHtml = '';
			$('tr.current').each(function(){
				
				relevantValue += $(this).attr('id')+',';
				_titleHtml += '<p>'+$(this).attr('title')+'<a href="javascript:;" class="setRed FR" style="margin-right:5px;" id="'+$(this).attr('id')+'">  X </a></p>';
				
			});
			
			
			if(relevantValue) {
				relevantValue = relevantValue.substr(0,relevantValue.length-1);
				parent.$('#relevantTitle').append(_titleHtml);
				
				var relevant = parent.$('input[name="info[relevant]"]');
				var _val = relevant.val();				
				_val  = _val ? _val+','+relevantValue : relevantValue;				
				
				parent.$('input[name="info[relevant]"]').val(_val);
				
			} 
			
			
			
			
		},
		focus: true
	},
	{
		name: '关闭'
	});
})
</script>
<include file="./Core/App/Tpl/global_footer.php" />