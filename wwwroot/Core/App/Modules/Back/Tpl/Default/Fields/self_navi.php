<?php if (!defined('HX_CMS')) exit();?>
<div class="navi clearfix">
<div class="naviDesc">字段管理</div>
	<div class="naviAction">
		<?php foreach ($ruleLink as $values) {
		$rule = explode('/',$values['name']);
		?>
		<a class="<?php echo ACTION_NAME==$rule[3] ? 'current' : '';?>" href="<?php echo U(trim($values['name'],'/'),array('mid'=>$_GET['mid']))?>">
			<u><?php echo $values['title']?></u>
		</a>
		<?php }?>
		<a href="<?php echo U(GROUP_NAME.'/Models/index',array('mid'=>$_GET['mid']))?>">
			<u>模型管理</u>
		</a>
	</div>
</div>