<?php if (!defined('HX_CMS')) exit();?>
<div class="navi clearfix">
	<div class="naviDesc"><?php echo $parentRuleName?></div>
	<div class="naviAction">
		<?php foreach ($ruleLink as $values) {
		$rule = explode('/',$values['name']);
		?>
		<a class="<?php echo ACTION_NAME==$rule[3] ? 'current ' : '';?><?php echo $values['name']=='/Content/Contents/add' ? 'new_blank' : '';?>" <?php echo $values['name']=='/Content/Contents/add' ? 'target="_blank"' : '';?> href="<?php echo U(trim($values['name'],'/'),array('cid'=>$_GET['cid']))?>">
			<u><?php echo $values['title']?></u>
		</a>
		<?php }?>
        <?php if ($_GET['specialid'] >0) { ?>
        <a class="" href="/modules/specialadmin/content_add/specialid/<?php echo $_GET['specialid'];?>.html">
            <u>添加信息</u>
        </a>
        <?php }?>
	</div>
</div>