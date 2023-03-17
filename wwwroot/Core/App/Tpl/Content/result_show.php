<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
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
<div class="operateTitle bold"><?php echo $typeString?>数据成功！</div>
<div class="cz">
	请选择操作项：
	<?php if($a_status==2){ ?>					
	<a href="<?php echo U('Content/Index/show',array('cid'=>$_GET['cid'],'aid'=>$id,'preview'=>md5($_GET['cid'].'--sssss--'.$id)));?>" target="_blank" class="operate">预览内容</a>&nbsp;&nbsp;
	<?php }else { ?>
	<a href="<?php echo U('Content/Index/show',array('cid'=>$_GET['cid'],'aid'=>$id))?>" target="_blank">查看内容</a>&nbsp;&nbsp;
	<?php } ?>
	<!--<a href="<?php echo U('Content/Index/show',array('cid'=>$_GET['cid'],'aid'=>$id))?>" target="_blank">查看内容</a>-->
	<a href="<?php echo U('add',array('cid'=>$_GET['cid'],'list_page'=>$_GET['list_page']))?>">继续发布</a>
	<?php $mr = mt_rand(1, 99999);?>
	<a href="<?php echo U('edit',array('cid'=>$_GET['cid'],'id'=>$id,'mr'=>$mr,'token'=>Tool::encrypt($_GET['cid'].$id.$mr),'list_page'=>$_GET['list_page']))?>">继续更改</a>
	<a href="<?php echo U('show',array('cid'=>$_GET['cid'],'page'=>$_GET['list_page']))?>">管理内容</a>
	<!-- 
	<a href="<?php echo U('Content/navigate/show',array('cid'=>$_GET['cid']))?>">管理导航</a>
	 -->
</div>
<include file="./Core/App/Tpl/global_footer.php" />