<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<link href="__PUBLIC__/modules/content/css/navigate.css" type="text/css" rel="stylesheet" />
<div class="operateTitle">添加普通栏目</div>
<form method="post" action="__ACTION__" id="formData">
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
						<option value="<?php echo $values['id']?>"><?php echo $values['model_name']?></option>
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
					{-$parent_navigate-}
				</select>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">导航名称</span></td>
			<td class="td_right">
				<input type="text" name="navigate_name" class="text" size="25" datatype="*1-20" errormsg="导航名称格式不正确！" />
				<span class="setDesc Validform_checktip">1-20个字符之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp; <span class="Validform_label">导航标识(目录)</span></td>
			<td class="td_right">
				<input type="text" name="navigate_mark" ajaxurl="<?php echo U('Back/Public/check_navigate_mark')?>"  size="25" datatype="/^[\w\-\.\_]{0,29}$/i" class="text" errormsg="导航标识格式不正确！" />
				<span class="setDesc Validform_checktip">1-30个字符之间，以字母开头，只是能是英文或数字或下划线，必须惟一</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">导航缩略图</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="55" name="thumbnail" ondblclick="$.CR.G.showIMG(this.value);" value="" />&nbsp;&nbsp;
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
					<input type="text" class="text" size="55" name="setting[pic]" value="" ondblclick="$.CR.G.showIMG(this.value);" />&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=setting[pic]&up_num=1&related=navigate&token=<?php echo Tool::encrypt(rawurlencode('setting[pic]').'1navigate')?>','图片上传');" class="sub" />
					<input type="button" value="裁剪图片" onclick="crop();" class="sub" />
					<input type="button" value="删除图片" onclick="$('[name=\'setting[pic]\']').val('');" class="sub" />
				</div>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">导航排序</span></td>
			<td class="td_right">
				<input type="text" value="1" size="10" name="sort" class="text short" datatype="/^[1-9][\d]{0,7}$/" errormsg="导航排序格式不正确！" />
				<span class="Validform_checktip setDesc">1-8个数字，第一位非零</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">导航简介</td>
			<td class="td_right">
				<textarea cols="60" class="textCont" cols="50" name="synopsis" datatype="*1-255" errormsg="导航简介格式不正确！" ignore="ignore"></textarea>
				<span class="setDesc Validform_checktip">255个字符以内</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">频道导航</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="is_channel" onclick="$('#show_type_1').prop('checked',true);$('#show_type_2').prop('checked',false);$('#index_tpl').show();$('#list_tpl').hide();" /> 是</label>
				<label><input type="radio" value="2" name="is_channel" checked="checked" onclick="$('#show_type_2').prop('checked',true);$('#show_type_1').prop('checked',false);$('#index_tpl').hide();$('#list_tpl').show();" /> 否</label>
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
				<label><input type="radio" value="1" checked="checked" name="c_status" />正常</label>
				<label><input type="radio" value="2" name="c_status" /> 禁用</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">显示状态</td>
			<td class="td_right">
				<label><input type="radio" value="1" checked="checked" name="is_show"  /> 显示</label>
				<label><input type="radio" value="2" name="is_show" /> 隐藏</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台添加信息</td>
			<td class="td_right">
				<label><input type="radio" value="1" name="setting[front_add_review]" checked="checked" /> 需要审核</label>
				<label><input type="radio" value="2" name="setting[front_add_review]"  /> 无需审核</label>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台信息管理</td>
			<td class="td_right">
				<input type="checkbox" name="setting[front_edit_review]" checked="checked" value="1" /> 审核编辑信息&nbsp;
				<select name="setting[is_manger]">
				<option value="0">不能管理信息</option>
				<option value="1">可管理未审核信息</option>
				<option value="2">只可编辑未审核信息</option>
				<option value="3">只可删除未审核信息</option>
				<option value="4">可管理所有信息</option>
				<option value="5">只可编辑所有信息</option>
				<option value="6">只可删除所有信息</option>
				</select>
				<span class="Validform_checktip"></span>
			</td>
		</tr>
		<tr>
			<td class="td_left">投稿增加点数</td>
			<td class="td_right">
				<input class="text short" type="text" name="setting[front_point]" size="10" value="0" />
				<span>
				<b class="setRed">点数</b>
				(不增加请设为0,扣点请设为负数)
				</span>
			</td>
		</tr>
		<tr>
			<td class="td_left">前台读取值字段[AID]</td>
			<td class="td_right">
				<input class="text short" type="text" name="setting[aid_field]" size="10" value="id" />
				<span>(正常不用更改，除非你的特别的需求，非数值型读取)</span>
			</td>
		</tr>
		</table>
	</div>
	<div class="main_3 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">SEO标题</td>
				<td class="td_right">
					<input type="text" name="title" class="text long" datatype="*1-60" size="50" ignore="ignore" errormsg="SEO标题格式不正确！" />
					<span class="Validform_checktip setDesc">60个字符以内</span>
				</td>
			</tr>
			<tr>
				<td class="td_left">SEO关键字</td>
				<td class="td_right">
					<input type="text" name="keywords" class="text long" size="50" datatype="*1-100" ignore="ignore" errormsg="SEO关键字格式不正确！" />
					<span class="Validform_checktip setDesc">100个字符以内</span>
				</td>
			</tr>
			<tr>
				<td class="td_left">SEO描述</td>
				<td class="td_right">
					<textarea name="description" class="textCont long" cols="60" datatype="*1-255" ignore="ignore" errormsg="SEO描述格式不正确！" ></textarea>
					<span class="Validform_checktip setDesc">255个字符以内</span>
				</td>
			</tr>
		</table>
	</div>
	<div class="main_4 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">导航生成HTML</td>
				<td class="td_right">
					<label><input type="radio" name="setting[navigate_is_html]" value="1" onclick="$('div.column_html').show().siblings().hide()" checked="checked" /> 是</label>
					<label><input type="radio" name="setting[navigate_is_html]"  onclick="$('div.column_no_html').show().siblings().hide()" value="2"  /> 否</label>  
				</td>
			</tr>
			<tr>
				<td class="td_left">链接地址</td>
				<td class="td_right">                	
					<div class="column_html" >{-$columnUrlData_html-}</div>
					<div class="column_no_html" style="display: none;">{-$columnUrlData_nohtml-}</div>
				</td>
			</tr>
			<tr>
				<td class="td_left">内容生成HTML</td>
				<td class="td_right">
					<label><input type="radio" name="setting[content_is_html]" value="1" onclick="$('div.content_html').show().siblings().hide()" checked="checked" /> 是</label>
					<label><input type="radio" name="setting[content_is_html]"  onclick="$('div.content_no_html').show().siblings().hide()" value="2"  /> 否</label>  
				</td>
			</tr>
			<tr>
				<td class="td_left">链接地址</td>
				<td class="td_right">
					<div class="content_html" >{-$contentUrlData_html-}</div>
					<div class="content_no_html" style="display: none;">{-$contentUrlData_nohtml-}</div>
				</td>
			</tr>
		</table>
	</div>
	<div class="main_5 globalMain none">
		<table class="formTable">
			<tr>
				<td class="td_left">显示模式：</td>
				<td class="td_right">
					<label><input type="radio" name="setting[show_type]" id="show_type_1" value="1" onclick="$('#index_tpl').show();$('#list_tpl').hide();" />频道模式</label>
					<label><input type="radio" name="setting[show_type]" id="show_type_2" value="2" checked="checked" onclick="$('#index_tpl').hide();$('#list_tpl').show();" />列表模式</label>
					<label><input type="radio" name="setting[show_type]" id="show_type_3" value="3" checked="checked" onclick="$('#index_tpl').hide();$('#list_tpl').hide();" />单页模式</label>
					<span class="Validform_checktip setDesc">推荐默认，在非正常情况可以特殊指定。</span>
				</td>
			</tr>
			<tr id="index_tpl">
				<td class="td_left">频道模板：</td>
				<td class="td_right">
				 	{-$column_index_tpl-}
				</td>
			</tr>
			<tr id="list_tpl">
				<td class="td_left">列表模板：</td>
				<td class="td_right">
				 	{-$column_list_tpl-}
				</td>
			</tr>
			<tr>
				<td class="td_left">内容模板：</td>
				<td class="td_right">
				 	{-$show_tpl-}
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
						<dt><label><input type="checkbox" value="" name="" onclick="if($(this).prop('checked')) {$(this).closest('dl').find('input:checkbox').prop('checked',true)} else {$(this).closest('dl').find('input:checkbox').prop('checked',false)}" /><?php echo $values['title'];?></label></dt>
						<dd><label><input type="checkbox" value="1" name="setting[<?php echo $key?>][admin_add]" />添加</label></dd>
						<dd><label><input type="checkbox" value="1" name="setting[<?php echo $key?>][admin_edit]" />编辑</label></dd>
						<dd><label><input type="checkbox" value="1" name="setting[<?php echo $key?>][admin_delete]" />删除</label></dd>
						<dd><label><input type="checkbox" value="1" name="setting[<?php echo $key?>][admin_sort]" />排序</label></dd>
						<dd><label><input type="checkbox" value="1" name="setting[<?php echo $key?>][admin_audit]" />审核</label></dd>
						<dd><label><input type="checkbox" value="1" name="setting[<?php echo $key?>][admin_attr]" />属性</label></dd>
						<dd><label><input type="checkbox" value="1" name="setting[<?php echo $key?>][admin_mobile]" />移动</label></dd>
					</dl>
					<?php }?>
				</td>
			</tr>
			<?php }?>
			<tr>
				<td class="td_left">会员组投搞：</td>
				<td class="td_right">
		 			<label><input type="checkbox" name="setting[add_tg]" value="1" />&nbsp;允许投搞</label>
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
</script>
<include file="./Core/App/Tpl/global_footer.php" />