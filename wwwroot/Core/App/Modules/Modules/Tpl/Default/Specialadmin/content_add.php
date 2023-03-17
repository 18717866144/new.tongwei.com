<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<link href="__PUBLIC__/modules/content/css/content_add.css" type="text/css" rel="stylesheet" />
<form action="__ACTION__" method="post" id="formData">
<?php if ($_GET['id']) {?>
<input type="hidden" value="<?php echo $current['create_time']?>" name="create_time" />
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<?php }?>
<input type="hidden" value="<?php echo $token?>" name="token" />
<input type="hidden" value="<?php echo $specialid?>" name="specialid" />
<div class="content_form clearfix">
	<div class="left">
		<table class="formTable">
        <?php if($setting['type']){ ?>
        <tr>
        <td class="td_left" style="width:80px;"><span class="Validform_label">内容类别</span></td>
        <?php $inputOpt=array();
			$inputOpt[0]='请选择类别';
		 foreach($setting['type'] as $t){
			$inputOpt[$t['typeid']]=$t['name'];
		}?>
        <td class="td_right"><?php echo FormElements::select($inputOpt, 'typeid',$current['typeid']);?></td>
        </tr>
        <?php }?>
			<?php foreach ($fieldArray['is_basic'] as $values) { ?>
				<tr>
					<td class="td_left" style="width:80px;">
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
	<div class="right">
		<?php foreach ($fieldArray['is_append'] as $values) {?>
			<dl class="rightDl  <?php if ($values['field_name'] == 'attr') echo 'attrs'?>">
				<dt><span class="Validform_label"><?php echo $values['nick_name']?></span>
					<?php if ($values['field_setting']['is_required']==1) {echo '<font color="red">*</font>&nbsp;';}?>
				</dt>
				<dd><?php echo $values['html']?><div class="setDesc Validform_checktip" style="clear:both;margin:5px 0px 0px;"><?php echo $values['tips']?></div></dd>
			</dl>
		<?php }?>
	</div>
</div>
</form>
<script type="text/javascript">
// 无父窗口在自身中打开
if(window.parent.name != 'mainIframe') $('.new_blank').attr('target','_self');
</script>
<include file="./Core/App/Tpl/global_footer.php" />