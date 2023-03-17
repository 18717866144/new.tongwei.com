<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />

<style type="text/css">
html {
	background:#F5F9FE;
}
body {
	width:960px;
	margin:0px auto;
}
div.operateTitle {
	margin:240px 0px 0px;
	border:1px solid #DFEDF7;
}
div.cz {
	height:30px;line-height:30px;padding-left:20px;
	padding:20px 20px;
	border:1px solid #DFEDF7;
	border-top:0px;
	background:#FFFFFF;
}
div.cz a {
	text-decoration:underline;
	margin:0px 5px 0px 10px;
}
</style>
<div class="operateTitle bold">{-$actionname-}成功！</div>
<div class="cz">
	请选择操作项：	
	<a href="{-$url-}" target="_blank">查看内容</a> &nbsp;
	<!--<a href="<?php echo U('edit',array('cid'=>$_GET['cid'],'id'=>$id,'mr'=>$mr,'token'=>Tool::encrypt($_GET['cid'].$id.$mr),'list_page'=>$_GET['list_page']))?>">更改内容</a> &nbsp;-->
	<a href="javascript:;" onClick="window.close();" class="sub">关闭本页</a>
</div>
<include file="./Core/App/Tpl/global_footer.php" />

<script type="text/javascript">
var title = '{-$title-}',areaid={-$area-};
var index = areaid - 1;
var url = '{-$url-}';
var id = '{-$id-}';
$(function(){
	var $hotAreas = $("#hotAreas", window.opener.document);
	var $areaItems = $("#areaItems", window.opener.document);
	var $save = $("#save_hot_area", window.opener.document);
	var $form = $('form[name="saveArea"]', window.opener.document);
	var $isSave = $('#isSave', window.opener.document);
	var mapInfo = $hotAreas.val();
	var $li = $areaItems.find('li').eq(index);
	$li.find('.areaTitleHtml').removeClass('no').html('<a href="'+url+'"  target="_blank">'+title+'</a>');
	$li.find('.areaTitle').val(title);
	$li.find('.areaLink').val(url);
	$li.find('.contentId').val(id);
	$li.find('.areaActionAdd ').removeClass('areaActionAdd').addClass('areaActionEdit').html('修改').attr('title','修改文章').unbind('click');
	$isSave.val('0');
	setTimeout(function(){
		 //$save.click();
		//$form.submit();
		//window.close();
	},3000);
});
</script>
<include file="./Core/App/Tpl/global_footer.php" />