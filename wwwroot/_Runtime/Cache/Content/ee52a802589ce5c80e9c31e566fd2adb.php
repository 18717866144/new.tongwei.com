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
<link href="__PUBLIC__/modules/content/css/navigate.css" type="text/css" rel="stylesheet" />
<div class="operateTitle">修改普通栏目</div>
<form method="post" action="__ACTION__" id="formData">
<input type="hidden" value="<?php echo $current['id']?>" name="id" />
<input type="hidden" value="<?php echo $token?>" name="token" />
<input type="hidden" value="<?php echo $current['n_type']?>" name="n_type" />
	<ul class="titleDesc">
		<li class="set">基本信息</li><li>选项设置</li><li>SEO设置</li><li>URL/HTML设置</li><li>模板设置</li><li>权限设置</li>
	</ul>
	<div class="main_1 globalMain">
		<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">所属模型</span></td>
			<td class="td_right">
				<select name="mid" datatype="n1-8" errormsg="请选择所属模型！！！">
					<option value="">请选择所属模型</option>
					<?php foreach ($contentModel as $values) {?>
						<option value="<?php echo $values['id']?>" <?php echo $current['mid']==$values['id'] ? 'selected="selected"' : '';?>><?php echo $values['model_name']?></option>
					<?php }?>
				</select>
				<span class="setDesc Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">上级导航</span></td>
			<td class="td_right">
				<select name="pid" class="selectPColumn">
					<option value="0">[≡ 作为顶级导航 ≡]</option>
					<?php echo ($parent_navigate); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">导航名称</span></td>
			<td class="td_right">
				<input type="text" name="navigate_name" value="<?php echo $current['navigate_name']?>" class="text" size="25" datatype="*1-20" errormsg="导航名称格式不正确！" />
				<span class="setDesc Validform_checktip">1-20个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp; <span class="Validform_label">导航标识(目录)</span></td>
			<td class="td_right">
				<input type="text" name="navigate_mark" value="<?php echo $current['navigate_mark']?>" ajaxurl="<?php echo U('Back/Public/check_navigate_mark',array('id'=>$current['id']))?>"  size="25" datatype="/^[\w\-\.\_]{0,29}$/i" class="text" errormsg="导航标识格式不正确！" />
				<span class="setDesc Validform_checktip">1-30个字符之间，以字母开头，只是能是英文或数字或下划线，必须惟一</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">导航缩略图</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="thumbnail" value="<?php echo $thumbnail?>" ondblclick="$.CR.G.showIMG(this.value);" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=thumbnail&up_num=1&related=navigate&token=<?php echo Tool::encrypt('thumbnail1navigate')?>','图片上传');" class="sub" />
					<input type="button" value="裁剪图片" onclick="crop();" class="sub" />
					<input type="button" value="删除图片" onclick="$('[name=\'thumbnail\']').val('');" class="sub" />
				</div>
			</td>
		</tr>
        <tr>
			<td class="td_left">导航大图</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="setting[pic]" value="<?php echo $setting['pic'];?>" ondblclick="$.CR.G.showIMG(this.value);" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=setting[pic]&up_num=1&related=navigate&token=<?php echo Tool::encrypt(rawurlencode('setting[pic]').'1navigate')?>','图片上传');" class="sub" />
					<input type="button" value="裁剪图片" onclick="crop();" class="sub" />
					<input type="button" value="删除图片" onclick="$('[name=\'setting[pic]\']').val('');" class="sub" />
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">导航排序</span></td>
			<td class="td_right">
				<input type="text" value="<?php echo $current['sort']?>" size="10" name="sort" class="text short" datatype="/^[1-9][\d]{0,7}$/" errormsg="导航排序格式不正确！" />
				<span class="Validform_checktip setDesc">1-8个数字，第一位非零</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">导航简介</td>
			<td class="td_right">
				<textarea cols="60" class="textCont" cols="50" name="synopsis" datatype="*1-255" errormsg="导航简介格式不正确！" ignore="ignore"><?php echo $current['synopsis']?></textarea>
				<span class="setDesc Validform_checktip">255个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">频道导航</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="is_channel" disabled="disabled"  <?php echo $current['is_channel']==1 ? 'checked="checked"' : '';?> onclick="$('#show_type_1').prop('checked',true);$('#show_type_2').prop('checked',false);$('#index_tpl').show();$('#list_tpl').hide();" /> 是</label>
				<label><input type="radio" value="2" name="is_channel" disabled="disabled"  <?php echo $current['is_channel']==2 ? 'checked="checked"' : '';?> onclick="$('#show_type_2').prop('checked',true);$('#show_type_1').prop('checked',false);$('#index_tpl').hide();$('#list_tpl').show();" /> 否</label>
				<span class="Validform_checktip">频道导航不可添加内容，只可添加子栏目。</span>
			</td>
		</tr>
		</table>
	</div>
	<div class="main_2 globalMain none">
		<table class="formTable">
		<tr>
			<td class="td_left">导航状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="c_status" <?php echo $current['c_status']==1 ? 'checked="checked"' : '';?> />正常</label>
				<label><input type="radio" value="2" name="c_status" <?php echo $current['c_status']==2 ? 'checked="checked"' : '';?> /> 禁用</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">显示状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="is_show"  <?php echo $current['is_show']==1 ? 'checked="checked"' : '';?> /> 显示</label>
				<label><input type="radio" value="2" name="is_show"  <?php echo $current['is_show']==2 ? 'checked="checked"' : '';?> /> 隐藏</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台添加信息</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="setting[front_add_review]" <?php echo $setting['front_add_review']==1 ? 'checked="checked"' : '';?> /> 需要审核</label>
				<label><input type="radio" value="2" name="setting[front_add_review]"  <?php echo $setting['front_add_review']==2 ? 'checked="checked"' : '';?>  /> 无需审核</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台信息管理</td>
			<td class="td_right">
				<input type="checkbox" name="setting[front_edit_review]" value="1"   <?php echo $setting['front_edit_review']==1 ? 'checked="checked"' : '';?> /> 审核编辑信息&nbsp;
				<select name="setting[is_manger]">
				<option value="0">不能管理信息</option>
				<option value="1"  <?php echo $setting['is_manger']==1 ? 'selected="selected"' : '';?>>可管理未审核信息</option>
				<option value="2"  <?php echo $setting['is_manger']==2 ? 'selected="selected"' : '';?>>只可编辑未审核信息</option>
				<option value="3"  <?php echo $setting['is_manger']==3 ? 'selected="selected"' : '';?>>只可删除未审核信息</option>
				<option value="4"  <?php echo $setting['is_manger']==4 ? 'selected="selected"' : '';?>>可管理所有信息</option>
				<option value="5"  <?php echo $setting['is_manger']==5 ? 'selected="selected"' : '';?>>只可编辑所有信息</option>
				<option value="6"  <?php echo $setting['is_manger']==6 ? 'selected="selected"' : '';?>>只可删除所有信息</option>
				</select>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">投稿增加点数</td>
			<td class="td_right">
				<input class="text short" type="text" name="setting[front_point]" size="10" value="<?php echo $setting['front_point'];?>" />
				<span>
				<b class="setRed">点数</b>
				(不增加请设为0,扣点请设为负数)
				</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台读取值字段[AID]</td>
			<td class="td_right">
				<input class="text short" type="text" name="setting[aid_field]" size="10" value="<?php echo $setting['aid_field'];?>" />
				<span>(正常不用更改，除非你的特别的需求，非数值型读取)</span>
			</td>
		</tr>
		</table>
	</div>
	<div class="main_3 globalMain ">
		<table class="formTable">
			<tr>
				<td class="td_left">SEO标题</td>
				<td class="td_right">
					<input type="text" name="title" class="text long" value="<?php echo $current['title']?>" datatype="*1-60" size="50" ignore="ignore" errormsg="SEO标题格式不正确！" />
					<span class="Validform_checktip setDesc">60个字符以内</span>
				</td>
			</tr>
			<tr>
				<td class="td_left">SEO关键字</td>
				<td class="td_right">
					<input type="text" name="keywords" class="text long" value="<?php echo $current['keywords']?>" size="50" datatype="*1-100" ignore="ignore" errormsg="SEO关键字格式不正确！" />
					<span class="Validform_checktip setDesc">100个字符以内</span>
				</td>
			</tr>
			<tr>
				<td class="td_left">SEO描述</td>
				<td class="td_right">
					<textarea name="description" class="textCont long" cols="60" datatype="*1-255" ignore="ignore" errormsg="SEO描述格式不正确！" ><?php echo $current['description']?></textarea>
					<span class="Validform_checktip setDesc">255个字符以内</span>
				</td>
			</tr>
            
            <tr>
				<td class="td_left">HTML内容</td>
				<td class="td_right">                 
				<textarea name="content" id="content"><?php echo ($current['content']); ?></textarea>                 
				<?php echo FormElements::edit('content','basic',300);?>
				</td>
			</tr>
		</table>
	</div>
	<div class="main_4 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">导航生成HTML</td>
				<td class="td_right">
					<label><input type="radio" name="setting[navigate_is_html]" value="1" onclick="$('div.column_html').show().siblings().hide()" <?php echo $setting['navigate_is_html']==1 ? 'checked="checked"' : '';?>  /> 是</label>
					<label><input type="radio" name="setting[navigate_is_html]"  onclick="$('div.column_no_html').show().siblings().hide()" value="2"  <?php echo $setting['navigate_is_html']==2 ? 'checked="checked"' : '';?>  /> 否</label>  
				</td>
			</tr>
			<tr>
				<td class="td_left">链接地址</td>
				<td class="td_right">
					<div class="column_html"  <?php echo $setting['navigate_is_html']==2 ? 'style="display: none;"' : '';?>><?php echo ($columnUrlData_html); ?></div>
					<div class="column_no_html" <?php echo $setting['navigate_is_html']==1 ? 'style="display: none;"' : '';?>><?php echo ($columnUrlData_nohtml); ?></div>
				</td>
			</tr>
			<tr>
				<td class="td_left">内容生成HTML</td>
				<td class="td_right">
					<label><input type="radio" name="setting[content_is_html]" value="1" onclick="$('div.content_html').show().siblings().hide()"  <?php echo $setting['content_is_html']==1 ? 'checked="checked"' : '';?> /> 是</label>
					<label><input type="radio" name="setting[content_is_html]"  onclick="$('div.content_no_html').show().siblings().hide()" value="2"  <?php echo $setting['content_is_html']==2 ? 'checked="checked"' : '';?>  /> 否</label>  
				</td>
			</tr>
			<tr>
				<td class="td_left">链接地址</td>
				<td class="td_right">
					<div class="content_html" <?php echo $setting['content_is_html']==2 ? 'style="display: none;"' : '';?>><?php echo ($contentUrlData_html); ?></div>
					<div class="content_no_html" <?php echo $setting['content_is_html']==1 ? 'style="display: none;"' : '';?>><?php echo ($contentUrlData_nohtml); ?></div>
				</td>
			</tr>
		</table>
	</div>
	<div class="main_5 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">显示模式：</td>
				<td class="td_right">
					<label><input type="radio" name="setting[show_type]" id="show_type_1" value="1" <?php echo $setting['show_type']==1 ? 'checked="checked"' : '';?> onclick="$('#index_tpl').show();$('#list_tpl').hide();" />频道模式</label>
					<label><input type="radio" name="setting[show_type]" id="show_type_2" value="2" <?php echo $setting['show_type']==2 ? 'checked="checked"' : '';?> onclick="$('#index_tpl').hide();$('#list_tpl').show();" />列表模式</label>
					<label><input type="radio" name="setting[show_type]" id="show_type_3" value="3" <?php echo $setting['show_type']==3 ? 'checked="checked"' : '';?> onclick="$('#index_tpl').hide();$('#list_tpl').hide();" />单页模式</label>
					<span class="Validform_checktip setDesc">推荐默认，在非正常情况可以特殊指定。</span>
				</td>
			</tr>
			<tr id="index_tpl" style="<?php echo $setting['show_type']==2 ? 'display:none"' : '';?>">
				<td class="td_left">频道模板：</td>
				<td class="td_right">
				 	<?php echo ($column_index_tpl); ?>
				</td>
			</tr>
			<tr id="list_tpl" style="<?php echo $setting['show_type']==1 ? 'display:none"' : '';?>">
				<td class="td_left">列表模板：</td>
				<td class="td_right">
				 	<?php echo ($column_list_tpl); ?>
				</td>
			</tr>
			<tr>
				<td class="td_left">内容模板：</td>
				<td class="td_right">
				 	<?php echo ($show_tpl); ?>
				</td>
			</tr>
		</table>
	</div>
	<div class="main_6 globalMain none">
		<table class="formTable">
			<?php if (SUPER_ADMIN) {?>
			<tr>
				<td class="td_left">管理员组权限：</td>
				<td class="td_right">
					<?php foreach ($adminGroup as $key=>$values) {?>
					<dl class="navi_content">
						<dt><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="" name="" onclick="if($(this).prop('checked')) {$(this).closest('dl').find('input:checkbox').prop('checked',true)} else {$(this).closest('dl').find('input:checkbox').prop('checked',false)}" /><?php echo $values['title'];?></label></dt>
						<dd><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="1" name="setting[<?php echo $key?>][admin_add]" <?php echo ($setting[$key]['admin_add']==1) ? 'checked="checked"' : '';?> />添加</label></dd>
						<dd><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="1" name="setting[<?php echo $key?>][admin_edit]" <?php echo ($setting[$key]['admin_edit']==1) ? 'checked="checked"' : '';?> />编辑</label></dd>
						<dd><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="1" name="setting[<?php echo $key?>][admin_delete]" <?php echo ($setting[$key]['admin_delete']==1) ? 'checked="checked"' : '';?> />删除</label></dd>
						<dd><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="1" name="setting[<?php echo $key?>][admin_sort]" <?php echo ($setting[$key]['admin_sort']==1) ? 'checked="checked"' : '';?> />排序</label></dd>
						<dd><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="1" name="setting[<?php echo $key?>][admin_audit]" <?php echo ($setting[$key]['admin_audit']==1) ? 'checked="checked"' : '';?> />审核</label></dd>
						<dd><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="1" name="setting[<?php echo $key?>][admin_attr]" <?php echo ($setting[$key]['admin_attr']==1) ? 'checked="checked"' : '';?> />属性</label></dd>
						<dd><label><input type="checkbox" <?php echo $values['is_super']==1 ? 'disabled="disabled"' : '';?> value="1" name="setting[<?php echo $key?>][admin_mobile]" <?php echo ($setting[$key]['admin_mobile']==1) ? 'checked="checked"' : '';?> />移动</label></dd>
					</dl>
					<?php }?>
				</td>
			</tr>
			<?php }?>
			<tr>
				<td class="td_left">会员组投搞：</td>
				<td class="td_right">
		 			<label><input type="checkbox" name="setting[add_tg]" value="1" <?php echo $setting['add_tg']==1 ? 'checked="checked"' : '';?> />&nbsp;允许投搞</label>
				</td>
			</tr>
		</table>
	</div>
	<div style="margin-top:10px;margin-left:180px;">
		<input type="submit" value="提交" name="send" class="sub" />
		<input type="reset" value="重填" class="sub" />
	</div>
</form>
<script type="text/javascript">
$(function(){$('.titleDesc li').click(function(){$(this).addClass('set').siblings().removeClass('set');var _index = $(this).index();$('.main_'+(_index+1)).show().siblings('[class^="main"]').hide();})})
//编辑器BUG，hide后无法正确加载，暂时方案
$(function(){
	setTimeout('fsss()',1000);
})

function fsss(){	
	$('.main_3').hide();	
}
</script>
<?php if (!defined('HX_CMS')) exit();?>
<!-- //*后台公共加载文件**// -->
</body>
</html>