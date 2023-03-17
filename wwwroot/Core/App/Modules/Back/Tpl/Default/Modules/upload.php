<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<div class="topTip"><b>提示：</b>只可上传Zip为文件若上传非Zip文件，程序会自动过滤并删除； </div>
<form method="post" action="__ACTION__" id="formData">
	<table class="formTable">
		<tr>
			<td class="td_left">上传新模块.Zip</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="button" value="点击上传" onclick="openNewWindow('<?php echo U('Attachment/Attachment/file',array('file_name'=>'up_module','up_num'=>5,'related'=>'modules','file_type'=>'soft','download_link'=>1,'download_type'=>1,'token'=>Tool::encrypt('up_modulesoft511modules')))?>','模块上传');" class="sub" />
					<div id="soft_filesLists"></div>
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
<include file="./Core/App/Tpl/global_footer.php" />