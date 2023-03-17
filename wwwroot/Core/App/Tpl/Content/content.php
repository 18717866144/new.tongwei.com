<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<link href="__PUBLIC__/modules/content/css/content_add.css" type="text/css" rel="stylesheet" />
<?php  if($form_left_nav==1){?>
<style>
.form_left_nav{width:60px;position:fixed;left:0px;top:0px;z-index:999; border:1px solid #DEDEDE;}
.form_left_nav a{display:block; width:55px; height:25px; line-height:25px; text-align:right; background:url(/Public/modules/back/images/bg.png) repeat-x left -200px; padding:0 5px 0px 0px; color:#666}
.form_left_nav a:hover{color:#222;}
</style>
<script>
$(function(){
	var _windowWidth = $(window).width();
	$('.form_left_nav').css({'left':(_windowWidth-960)/2 - 64});
});
</script>
<?php }?>
<form action="__ACTION__?cid=<?php echo $_GET['cid']?>&list_page=<?php echo $_GET['list_page'] ?>" method="post" id="formData">
<?php if ($_GET['id']) {?>
<input type="hidden" value="<?php echo $current['create_time']?>" name="create_time" />
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<?php }?>
<input type="hidden" value="<?php echo $token?>" name="token" />
<div class="content_form clearfix" style="position:relative;">
	<div class="left">
		<table class="formTable">
			<?php $left_dir= ''; foreach ($fieldArray['is_basic'] as $values) { if($form_left_nav==1) $left_dir .='<a href="#'.$values['field_name'].'">'.$values['nick_name'].'</a>';?>
				<tr>
					<td class="td_left" style="width:80px;"><?php if($form_left_nav==1) {?><a name="<?php echo $values['field_name'];?>"></a><?php }?>
					<?php if ($values['field_setting']['is_required']==1) {echo '<font color="red">*</font>&nbsp;';}?>
					<span class="Validform_label"><?php echo $values['nick_name']?></span>
					</td>
					<td class="td_right">
						<?php echo $values['html'];?>
						<?php if ($values['form_type'] != 'editor') {?>
							<span class="setDesc  Validform_checktip"><?php echo $values['tips']?></span>
						<?php }?>
					</td>
				</tr>
			<?php }?>
			<tr>
				<td class="td_left">&nbsp;&nbsp;</td>
				<td class="td_right">
					<input type="submit" name="send" class="sub" value="提交" />
					<input type="reset" class="sub" />
				</td>
			</tr>
		</table>        
	</div>
	<?php if($form_left_nav==1) echo '<div class="form_left_nav">',$left_dir,'</div>';?>
	<div class="right">
		<?php foreach ($fieldArray['is_append'] as $values) {?>
			<dl class="rightDl  <?php if ($values['field_name'] == 'attr') echo 'attrs'?>">
				<dt><span class="Validform_label"><?php echo $values['nick_name']?></span><a name="$values['field_name']"></a>
					<?php if ($values['field_setting']['is_required']==1) {echo '<font color="red">*</font>&nbsp;';}?>
				</dt>
				<dd><?php echo $values['html']?><div class="setDesc Validform_checktip" style="clear:both;margin:5px 0px 0px;"><?php echo $values['tips']?></div></dd>
			</dl>
		<?php }?>
	</div>
</div>
</form>
<script>
$(document).ready(function(){
	var size = $('#style_font_size').val();
	if(!size||size=='')
	$('#style_font_size').val('28');	
    
	var flag = 0;
	$(".formTable .description").on('blur',function(){
		 var text=$(this).val();
		 var lens = text.length;
		
		 var html1='<span class="input_num" style="display:inline-block;float:right;">已输入字数'+lens+'个</span>';
		 var html2='已输入字数'+lens+'个';
	     
		 if(flag==0)		 
		 $(this).parent('.td_right').append(html1);
	     else
		 $(this).parent('.td_right').find('.input_num').html(html2);	 
		 flag=1;
	});
	
});

</script>
<script type="text/javascript">
// 无父窗口在自身中打开1
if(window.parent.name != 'mainIframe') $('.new_blank').attr('target','_self');
</script>
<include file="./Core/App/Tpl/global_footer.php" />