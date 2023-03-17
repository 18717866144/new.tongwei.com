<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<div class="naviDesc clearfix">{-$navname-} - 内容管理 <span style="font-size:12px; color:#999;">上次更新时间：<?php if($updatatime) echo date('Y-m-d H:i:s',$updatatime);else echo '无';?></span></div>
<form action="__ACTION__" method="post" id="formData">
<?php if ($cid) {?><input type="hidden" value="<?php echo $cid?>" name="cid" /><?php }?>
<table class="formTable" style="width:90%" align="left">			
<tr>
<td class="td_left">内容：</td>
<td>
<div class="tabs">
<div class="tabs-title"><a class="tabs-title-list" hrer="javascript:;">PC版内容</a><a class="tabs-title-list" hrer="javascript:;">Mobile版内容</a></div>
<div class="tabs-content m_t_15">
	<div class="tabs-content-list">
	<textarea name="content" id="content">{-$content-}</textarea>                 
	<?php echo FormElements::edit('content','basic',500);?>
	</div>
	
	<div class="tabs-content-list">
	<textarea name="contentmobile" id="contentmobile">{-$contentmobile-}</textarea>                 
	<?php echo FormElements::edit('contentmobile','basic',500);?>
	</div>
</div>
</div>
</td>
</tr>
<tr>
<td class="td_left">&nbsp;&nbsp;</td>
<td class="td_right">
<input type="submit" name="send" class="sub" value="提交" />
<input type="reset" class="sub" />
</td>
</tr>
</table>
</form>
<script>
$.G.Tabs();
</script>
<include file="./Core/App/Tpl/global_footer.php" />