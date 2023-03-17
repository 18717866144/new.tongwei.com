<?php if (!defined('HX_CMS')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<title><?php echo C('WEB_NAME');?> - 内容管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/modules/back/css/index.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/modules/back/js/index.js"></script>
</head>
<body>
<div class="header">
	<div class="logo left"><a href="__APP__/Back/Index/index"><img src="__PUBLIC__/images/cms_logo.png" /></a></div>
	<div class="header_right left">
		<div class="header_info clearfix">
        	<div class="left">欢迎您：<span style="color:#99FF00"><?php echo $session['username']?></span>&nbsp;&nbsp;所属组：[<?php foreach ($session['admin_group'] as $values) { echo $values['title'],','; }?>]&nbsp;&nbsp;<a href="__APP__/Back/Entrance/logout" class="logout">[退出]</a></div>            
			<div class="right" style="padding-right:10px;"><a href="<?php echo U('Back/Public/update_cache')?>" target="main_iframe">更新缓存</a>&nbsp;|&nbsp;<a href="<?php echo C('WEB_URL'),'/',C('INSTALL_PATH')?>index.php" target="_blank">预览首页</a>&nbsp;|&nbsp;<a href="<?php echo C('WEB_URL'),'/',C('INSTALL_PATH')?>" target="_blank">网站首页</a></div>
		</div>
        <ul class="header_menu">
		<?php $i=0;foreach ($ruleData as $ruleValue) {?>
		<li id="header_menu_li_<?php echo $ruleValue['id']?>"<?php echo $i==0 ? ' class="on"' : '';?>><a href="javascript:_T(<?php echo $ruleValue['id']?>);" hidefocus="true"><?php echo $ruleValue['title']?></a></li>
		<?php $i++;}?>
        <!--<li style="background:none; margin-left:10px;">站点选择：
        <span id="site_name" onMouseOver="jvavascript:$('.site_list').show();" onMouseOut="jvavascript:$('.site_list').hide();"><b>默认站点</b>
        	<div class="site_list" style="display:none;"><a href="javascript:selectSite(1,'中文版');">中文版</a><a href="javascript:selectSite(2,'英文版');">英文版</a></div>
        </span></li>-->
		</ul>
	</div>
</div>
			
<div id="main_left" class="left">
<?php $i=0;foreach ($ruleData as $ruleValue) {?>
<dl id="left_menu_li_<?php echo $ruleValue['id']?>" <?php echo $i==0 ? '' : 'style="display:none;"';?>>
<?php foreach ($ruleValue['child'] as $childValues) {?>
<dt><?php echo $childValues['title']?></dt>
<?php foreach ($childValues['child'] as $childChildValues) { ?>
<?php if ($childChildValues['node_type'] == 1) {?>
<dd><a href="__APP__<?php echo $childChildValues['name']?>" target="main_iframe"><?php echo $childChildValues['title']?></a></dd>
<?php }?>
<?php }?>
<?php }?>
</dl>
<?php $i++;}?>
</div>
    
<div id="main_right" class="">    	
        <div id="tool">
        <a href="javascript:;" title="刷新" class="refresh" onclick="_refresh();"></a><a href="javascript:;" title="全屏" class="full_screen" onclick="fullScreen()"></a>        
        </div>
        <div id="position">当前位置：<span id="position_path">后台管理</span></div>
        <div id="iframe_content"><iframe src="__APP__/Back/Index/show" id="main_iframe" name="main_iframe" frameborder="0" width="100%"></iframe></div>
	</div>
<script>
function selectSite(siteId,siteName)
{
	$.get("/index.php/Back/Site/selectSite/id/"+siteId,function(data){
		if (data==1){
			$('#site_name>b').html(siteName);
			window.top.main_iframe.location.reload();
		}
	});	
}
</script>
</body>
</html>