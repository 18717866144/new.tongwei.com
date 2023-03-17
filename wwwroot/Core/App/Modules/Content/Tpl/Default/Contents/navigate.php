<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/modules/content/css/content_navigate.css">
<script type="text/javascript">
$(function(){
	$('body').height($(window).height());
	$('.tree ul li:last').addClass('last2');
	$('.tree ul .channel').each(function(){
		$(this).find('li').length>=1 ? $(this).find('li:last').addClass('last2') : '';
		$(this).nextAll('li').length > 0 ? $(this).removeClass('last2') : $(this).addClass('last2');
	})

// 	点击显示/隐藏
	$('li.channel').click(function(event){
		event.stopPropagation();//防冒泡
		var _attr = $(this).attr('open_status');
		if(_attr == 'open_channel') {
			$(this).attr('open_status','close_channel').children('img').attr('src','__PUBLIC__/modules/content/images/folder-closed.gif').siblings('ul').hide();
		} else {//close_channel
			$(this).attr('open_status','open_channel').children('img').attr('src','__PUBLIC__/modules/content/images/folder.gif').siblings('ul').show();
		}
	});

	$('#all').click(function(){
		var _attr = $(this).attr('class');
		if(_attr == 'openAll') {
			$('li.channel').attr('open_status','close_channel').children('img').attr('src','__PUBLIC__/modules/content/images/folder-closed.gif').siblings('ul').hide();
			$(this).attr('class','closeAll');
		} else {
			$('li.channel').attr('open_status','open_channel').children('img').attr('src','__PUBLIC__/modules/content/images/folder.gif').siblings('ul').show();
			$(this).attr('class','openAll');
		}
	});

	$('a.showList').click(function(event){
		event.stopPropagation();//防冒泡
	});
});
</script>
<div class="openOrClose"><a href="javascript:;" class="openAll" id="all">展开/隐藏</a></div>
<div class="tree">
	<?php 
		$tree = '';
		function _get_tree($data,$level) {
			$tree .= '<ul class="level_'.$level.'">';
				foreach ($data as $values) {
					if($values['n_type']==3 && !$values['child']) continue;
					if($values['is_channel'] == 2) {
						if($values['mid']==0){
							$href = 'href="'.U('Content/Contents/single',array('cid'=>$values['id'])).'"';
							$add_img = '<img src="__PUBLIC__/modules/content/images/file.gif" />';
						}else{							
							$href = 'href="'.U('Content/Contents/show',array('cid'=>$values['id'])).'"';
							$add_img = '<a href="'.U('Content/Contents/add',array('cid'=>$values['id'])).'" target="_blank"><img src="__PUBLIC__/modules/content/images/add_content.gif" /></a>';
						}
						$tree .= '<li>'.$add_img.'&nbsp;<a '.$href.' target="sonMainBody" class="showList">'.$values['navigate_name'].'</a>';
					}else {
							$class .= ' ';
							$href = '';
							$add_img = '';
							$tree .= '<li class="channel" open_status="open_channel"><img src="__PUBLIC__/modules/content/images/folder.gif" />&nbsp;'.$values['navigate_name'];
					}
					if (isset($values['child'])) $tree .= _get_tree($values['child'], $level=$level+1);
					$tree	.= '</li>';
				}
			$tree .= '</ul>';
			return $tree;
		} 
		echo _get_tree($navigateData,1);
	?>
</div>
<include file="./Core/App/Tpl/global_footer.php" />