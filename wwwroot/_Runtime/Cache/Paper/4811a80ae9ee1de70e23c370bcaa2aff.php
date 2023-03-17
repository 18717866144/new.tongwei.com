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
	<input type="hidden" name="id" value="<?php echo ($current["id"]); ?>">
	<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">刊物名称</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" name="title" value="<?php echo ($current["title"]); ?>" datatype="*1-30" errormsg="名称格式不正确！"/>
				<span class="setDesc Validform_checktip">1-30个字符之间</span>
			</td>
		</tr>
		
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">刊物标识(目录)</span></td>
			<td class="td_right">
				<input type="text" class="text normal" size="40" name="directory" value="<?php echo ($current["directory"]); ?>" datatype="/^[\w\-\.\_]{0,29}$/i" errormsg="格式不正确！"/>
				<span class="setDesc Validform_checktip">数字字母组合</span>
			</td>
		</tr>
		
		
		<tr>
			<td class="td_left">展示图片</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="thumbnail" ondblclick="$.CR.G.showIMG(this.value);" value="<?php echo ($current["thumbnail"]); ?>" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=thumbnail&up_num=1&related=paper&token=<?php echo Tool::encrypt('thumbnail1paper')?>','图片上传');" class="sub" /> 建议比例：360x472 、 180x236			
				</div>
			</td>
		</tr>
		
		<tr>
			<td class="td_left">刊物简介</td>
			<td class="td_right"><textarea class="textCont" rows="5" cols="49" name="description" datatype="*0-255" errormsg="255个字符以内！！！"  ignore="ignore"><?php echo ($current["description"]); ?></textarea><span class="Validform_checktip setDesc"></span></td>
		</tr>
		
		<tr>
			<td class="td_left">创刊时间</td>
			<td class="td_right">
			<?php echo FormElements::date('create_time', date('Y-m-d',$current['create_time']?$current['create_time']:time()));?>
			</td>
		</tr>
				
		<tr>
			<td class="td_left">外部链接</td>
			<td class="td_right">
				<input type="text" class="text" size="55" name="link_url" id="link_url" value="<?php echo $current['is_link']?$current['url']:'';?>" <?php echo $current['is_link']?'':'disabled';?> />
				<input type="checkbox" value="1" name="is_link" onclick="if($(this).prop('checked')){$('#link_url').removeAttr('disabled');}else{$('#link_url').attr('disabled','disabled');}" <?php echo $current['is_link']?'checked':'';?> />		
			</td>
		</tr>

		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">排序</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo (($current["sort"])?($current["sort"]):0); ?>" name="sort" class="text short" datatype="/^[\d]{1,8}$/" errormsg="排序格式不正确！"  />
				<span class="Validform_checktip setDesc">1-8个字符之间，只能输入数字并且第一位不能为零</span>
			</td>
		</tr>
			
		<tr>
			<td class="td_left">推荐刊物</td>
			<td class="td_right">
				<label>推荐&nbsp;<input type="checkbox" value="1" name="is_recommend" <?php echo $current['is_recommend']?'checked':'';?> /></label>
			</td>
		</tr>
				
		<tr>
			<td class="td_left">使用状态</td>
			<td class="td_right">
				<label>正常&nbsp;<input type="radio" value="1" name="a_status" <?php echo $current['a_status']==1||empty($current['a_status'])?'checked':'';?> /></label>
				&nbsp;&nbsp;
				<label>禁用&nbsp;<input type="radio" value="2" name="a_status" <?php echo $current['a_status']==2?'checked':'';?> /></label>
			</td>
		</tr>
		
		<tr>
			<td class="td_left">&nbsp;&nbsp;</td>
			<td class="td_right">
				<input type="submit" name="send" class="sub" value=" 提交 " />
				<input type="reset" class="sub" />
			</td>
		</tr>
	</table>
</form>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>