<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<style type="text/css">
.soruceList {width:98%;margin:0px auto;}
.soruceList li {background:#E2E9EA;border: 1px solid #C2D1D8;display: block;float: left;font-weight: bold;margin-bottom: 10px;margin-right: 10px;padding: 5px 12px;position: relative;}
.soruceList li span {color: #FF0000;cursor: pointer;display: block;height: 12px;line-height: 12px;position: absolute;right: 0;text-align: center;top: 0;width: 12px;}
</style>
<div class="soruceList clearfix">
	<ul>
		<?php foreach ($source as $key=>$value) {?>
		<li>
			<div><?php echo $value['source'];?> <img src="<?php echo $value['source_pic'];?>"></div>
			<input type="checkbox" name="id_all[]" checked="checked" value="<?php echo $key;?>" style="display:none;" />
			<span class="source_close" onclick="$.CR.G.bulkAction('<?php echo U('delete',array('id'=>$key));?>')">×</span>
		</li>
		<?php }?>
	</ul>
</div>
<form action="<?php echo U('add')?>" class="formData" method="post" style="border:1px solid #dedede; padding:20px;">
	<div class="marginTop10" style="width:98%; margin:0px auto;">
		<div>
			<span class="Validform_label">来源名称</span>&nbsp;
			<input type="text" datatype="*1-30" errormsg="来源格式不正确！" name="source" size="30" />&nbsp;&nbsp;
			<span class="Validform_checktip">&nbsp;</span>
		</div>
		<br>
		<div>
			<span class="Validform_label">对应图片</span>&nbsp;
			<input type="text" name="source_pic" size="30" />&nbsp;&nbsp;<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=source_pic&up_num=1&related=source&token=<?php echo Tool::encrypt('source_pic1source')?>','图片上传');" class="sub" />&nbsp;&nbsp;<span class="Validform_checktip">尺寸：长x高 = 50至150 x 22 </span>
		</div>
		<br>
		<div>
			<span class="Validform_label">　　　　</span>&nbsp;
			<input type="submit" value="添加" class="smallSub" />
		</div>
	</div>
</form>
<include file="./Core/App/Tpl/global_footer.php" />