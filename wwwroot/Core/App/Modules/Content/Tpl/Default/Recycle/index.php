<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<div class="operateTitle bold" style="margin:50px auto 0px;width:960px;">
	选择模型：<select onchange="this.value != '' ? window.location.href=$.G.RUrlSuffix('<?php echo U('Content/Recycle/Index')?>')+'mid='+this.value : '';">
	<option value="">请选择模型</option>
	<?php foreach ($models as $key=>$value) {?>
	<option value="<?php echo $key;?>" <?php echo $_GET['mid']==$key ? 'selected="selected"' : '';?>><?php echo $value;?></option>
	<?php }?>
	</select>
</div>
<include file="./Core/App/Tpl/global_footer.php" />