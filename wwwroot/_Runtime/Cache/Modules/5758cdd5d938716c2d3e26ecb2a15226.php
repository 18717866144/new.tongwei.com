<?php if (!defined('THINK_PATH')) exit(); if (!defined('HX_CMS')) exit();?>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<title><?php echo C('WEB_NAME');?> - 内容管理系统</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/global.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/modules/css/basic.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/validform/css/style.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/validform/js/Validform.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/artDialog.js?skin=default"></script>
<script type="text/javascript" src="__PUBLIC__/js/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="__PUBLIC__/modules/js/global.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/global.js"></script>
<script type="text/javascript">
var WEB_URL = '<?php echo C('WEB_URL');?>',_PUBLIC_ = '__PUBLIC__',_ROOT_ = '__ROOT__',_APP_ = '__APP__',_VAR_GROUP_='<?php echo C('VAR_GROUP') ;?>',_VAR_MODULE_='<?php echo C('VAR_MODULE') ;?>',_VAR_ACTION_='<?php echo C('VAR_ACTION') ;?>',JSONP_CALLBACK='<?php echo C('VAR_JSONP_HANDLER')?>',FACE_NUM = 70,_GROUP_NAME_='<?php echo GROUP_NAME;?>',_MODULE_NAME_='<?php echo MODULE_NAME;?>',_ACTION_NAME_='<?php echo ACTION_NAME;?>',_GROUP_ = _APP_+'?'+_VAR_GROUP_+'='+_GROUP_NAME_,_URL_ = _GROUP_+'&'+_VAR_MODULE_+'='+_MODULE_NAME_,_ACTION_ = _URL_+'&'+_VAR_ACTION_+'='+_ACTION_NAME_;
</script>
</head>
<body>
<?php if (!defined('HX_CMS')) exit();?>
<?php if($parentRuleName || $ruleLink){?>
<div class="navi clearfix">
	<div class="naviDesc"><?php echo $parentRuleName?></div>
	<div class="naviAction">
		<?php foreach ($ruleLink as $values) { $rule = explode('/',$values['name']); ?>
		<a class="<?php echo ACTION_NAME==$rule[3] ? 'current' : '';?>" href="<?php echo U(trim($values['name'],'/')) ?>">
			<u><?php echo $values['title']?></u>
		</a>
		<?php }?>
	</div>
</div>
<?php }?>
<form action="__ACTION__" method="post" id="formData">
	<table class="formTable">    
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;所属类别</td>
			<td class="td_right">
				<select name="type_id">
                <option value="0">请选择类别</option>
                <?php if(!empty($type)): if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; endif; ?>
                </select>
			</td>
		</tr>
        
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">标题</span></td>
			<td class="td_right"><input type="text" class="text normal" size="50" name="title"/></td>
		</tr>

        <tr>
            <td class="td_left"><span class="Validform_label">副标题</span></td>
            <td class="td_right"><input type="text" class="text" size="50" name="s_title"/></td>
        </tr>
        <tr>
            <td class="td_left"><span class="Validform_label">副标题字体</span></td>
            <td class="td_right"><input type="text" class="text" size="50" name="s_size"/>（字体大小数字，如：16px）</td>
        </tr>
        <tr>
            <td class="td_left">&nbsp;<span class="Validform_label">标题颜色</span></td>
            <td class="td_right">
                <input type="text" class="text" size="10"  name="color"/>（文字颜色，如：#ffffff）
            </td>
        </tr>
        <tr>
            <td class="td_left">标题显示</td>
            <td class="td_right">
                显示&nbsp;<input type="radio" value="1" name="t_show"/>
                &nbsp;&nbsp;不显示&nbsp;<input type="radio" value="2" name="t_show"  checked="checked" />
            </td>
        </tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span> 图片</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="50" name="picurl" value="" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=picurl&up_num=1&related=slide&token=<?php echo Tool::encrypt('picurl1slide')?>','图片上传');" class="sub" />					
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left"> <span class="Validform_label">链接URL</span></td>
			<td class="td_right">
				<input type="text" class="text" size="50"  name="url" />				
			</td>
		</tr>
		
		<tr>
			<td class="td_left">&nbsp;<span class="Validform_label">排序号</span></td>
			<td class="td_right">
				<input type="text" class="text" size="10"  name="sort" value="0" />（大的靠前）				
			</td>
		</tr>
        
		<tr>
			<td class="td_left">显示状态</td>
			<td class="td_right">
				启用&nbsp;<input type="radio" value="1" name="l_status" checked="checked" />
				&nbsp;&nbsp;停止&nbsp;<input type="radio" value="2" name="l_status" />
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
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>