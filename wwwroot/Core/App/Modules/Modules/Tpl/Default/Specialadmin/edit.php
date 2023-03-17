<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<script>
/*
//string mod;int m;int n;
//m：当前序号；n：总数
*/
function tab(mod,m,n){
	for(i=1;i<=n;i++){
		var nav=document.getElementById("tab_"+mod+"_"+i);
		var cont=document.getElementById("div_"+mod+"_"+i);
		nav.className=(i==m)?"on":"";
		cont.style.display=(i==m)?"block":"none";
	}
}
</script>
<form action="__ACTION__" method="post" id="formData">
<input type="hidden" name="id" value="{-$current.id-}" />
<div class="col-tab">
	<ul class="tabBut cu-li">
		<li id="tab_setting_1" onclick="tab('setting',1,2)" class="on">基本选项</li>
		<li id="tab_setting_2" onclick="tab('setting',2,2)">扩展设置</li>
	</ul>

<div id="div_setting_1" class="contentList">  
	<table class="formTable">    
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">专题类别</span></td>
			<td class="td_right">
            <select name="type_id">
                <option value="0">请选择类别</option>
                <notempty name="type">
                <foreach name="type" item="values">
                <option value="{-$values.id-}" <?php echo $current['type_id']==$values['id'] ? 'selected="selected"' : '';?>>{-$values.type_name-}</option>
                </foreach>
                </notempty>
                </select></td>
		</tr>
        
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">专题名称</span></td>
			<td class="td_right"><input type="text" class="text normal" size="50" name="title" value="{-$current.title-}" datatype="*1-100" errormsg="专题名称格式不正确！"><span class="setDesc Validform_checktip">1-100个字符之间</span></td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed"></span>&nbsp;<span class="Validform_label">责任编辑</span></td>
			<td class="td_right"><input type="text" class="text normal" size="10" name="author" value="{-$current.author-}" >
			</td>
		</tr>
        
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;专题横幅</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="50" name="banner"  value="{-$current.banner-}"  ondblclick="$.CR.G.showIMG(this.value);" datatype="*1-200" errormsg="请上传专题横幅">&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=banner&up_num=1&related=special&token=<?php echo Tool::encrypt('banner1special')?>','图片上传');" class="sub" />	<span class="setDesc Validform_checktip">上传专题横幅</span>				
				</div>
			</td>
		</tr>
        
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;专题缩略图</td>
			<td class="td_right">
				<div class="upload_show_text">
					<input type="text" class="text" size="50" name="thumb" value="{-$current.thumb-}" ondblclick="$.CR.G.showIMG(this.value);" datatype="*1-200" errormsg="请上传专题缩略图">&nbsp;&nbsp;
					<input type="button" value="上传图片" onclick="openNewWindow('__APP__/Attachment/Attachment/image?file_name=thumb&up_num=1&related=special&token=<?php echo Tool::encrypt('thumb1special')?>','图片上传');" class="sub" />	<span class="setDesc Validform_checktip">上传专题缩略图</span>			
				</div>
			</td>
		</tr>
        
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">专题导读</span></td>
			<td class="td_right">
				<textarea name="description" id="description" cols="40" rows="6">{-$current.description-}</textarea>		
			</td>
		</tr> 
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">专题总结</span></td>
			<td class="td_right">
				<textarea name="summary" id="description" cols="40" rows="6">{-$current.summary-}</textarea>		
			</td>
		</tr>
                
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">专题目录</span></td>
			<td class="td_right">
				<input type="text" class="text" size="50"  name="special_dir" value="{-$current.special_dir-}" datatype="*1-30" errormsg="专题目录格式不正确！"><span class="setDesc Validform_checktip">1-30个字符之间</span>			
			</td>
		</tr>
		
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">排序号</span></td>
			<td class="td_right">
				<input type="text" class="text" size="10"  name="sort" value="{-$current.sort-}" datatype="/^[\d]{1,8}$/" errormsg="排序格式不正确！"  />
				<span class="Validform_checktip setDesc">1-8位数字之间</span>
			</td>
		</tr>
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">阅读数</span></td>
			<td class="td_right">
				<input type="text" class="text" size="10"  name="click" value="{-$current.click-}"   />
				
			</td>
		</tr>

       <tr>
			<td class="td_left">外部链接</td>
			<td class="td_right">
				<input type="text" class="text" size="55" name="link_url" id="link_url" value="{-:$current['is_link']?$current['url']:''-}" {-:$current['is_link']?'':'disabled'-} />
				<input type="checkbox" value="1" name="is_link" onclick="if($(this).prop('checked')){$('#link_url').removeAttr('disabled');}else{$('#link_url').attr('disabled','disabled');}" {-:$current['is_link']?'checked':''-} />		
			</td>
		</tr>
        
        <tr>
			<td class="td_left">专题推荐</td>
			<td class="td_right">
				<label>启用&nbsp;<input type="radio" value="1" name="attr" <?php if($current['attr']==1) echo 'checked="checked"';?>  /></label>
				&nbsp;&nbsp;<label>停止&nbsp;<input type="radio" value="0" name="attr" <?php if($current['attr']==0) echo 'checked="checked"';?> /></label>
			</td>
		</tr>
        
		<tr>
			<td class="td_left">专题状态</td>
			<td class="td_right">
				<label>启用&nbsp;<input type="radio" value="1" name="l_status" <?php if($current['l_status']==1) echo 'checked="checked"';?>  /></label>
				&nbsp;&nbsp;<label>停止&nbsp;<input type="radio" value="2" name="l_status" <?php if($current['l_status']==2) echo 'checked="checked"';?> /></label>
			</td>
		</tr>
        
	</table>
</div>

<div id="div_setting_2" class="contentList" style="display:none">
<table class="formTable">
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">模板目录	</span></td>
			<td class="td_right">
			<?php $dir = FormElements::selectDir('Special/extend');?>
			<select name="setting[dir_tpl]">
				<option value="">默认目录</option>
				<?php foreach($dir as $k=>$v){ ?>
					<option value="{-$k-}" <if condition="$current['setting']['dir_tpl'] eq $k">selected="selected"</if> >{-$v-}</option>
				<?php }?>
			</select>
			<font style="color:#999">使用“extend/目录”下对应的模板 (保存后再次编辑可选择下属模版，待完善)</font></td>
		</tr>    
		<tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">专题模板	</span></td>
			<td class="td_right">{-$index_tpl-}</td>
		</tr>
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">列表模板	</span></td>
			<td class="td_right">{-$list_tpl-}</td>
		</tr>
        <tr>
			<td class="td_left"><span class="setRed">*</span>&nbsp;<span class="Validform_label">内容模板	</span></td>
			<td class="td_right">{-$show_tpl-}</td>
		</tr>
        
        <tr>
			<td class="td_left">生成静态</td>
			<td class="td_right">
				<label>首页&nbsp;<input type="checkbox" name="setting[index_ishtml]" <?php if($current['setting']['index_ishtml']==1) echo 'checked="checked"';?> /></label>&nbsp;&nbsp;
				<label>列表&nbsp;<input type="checkbox" name="setting[list_ishtml]" <?php if($current['setting']['list_ishtml']==1) echo 'checked="checked"';?> /></label>&nbsp;&nbsp;
                <label>内容&nbsp;<input type="checkbox" name="setting[show_ishtml]"  <?php if($current['setting']['show_ishtml']==1) echo 'checked="checked"';?>  /></label>&nbsp;&nbsp;
			</td>
		</tr>
         
        <tr class="index_url_rule"  <?php if($current['setting']['index_ishtml']!=1) echo 'style="display:none;"';?> >
			<td class="td_left">首页URL规则</td>
			<td class="td_right">
				<input type="text" class="text" size="50"  name="setting[index_url_rule]" value="{-$current['setting']['index_url_rule']-}" />
			</td>
		</tr>
       
        <tr class="list_url_rule"  <?php if($current['setting']['list_ishtml']!=1) echo 'style="display:none;"';?>  >
			<td class="td_left">列表URL规则</td>
			<td class="td_right">
				<input type="text" class="text" size="50"  name="setting[list_url_rule]" value="{-$current['setting']['list_url_rule']-}"  />
			</td>
		</tr>       
        
        <tr class="show_url_rule"  <?php if($current['setting']['show_ishtml']!=1) echo 'style="display:none;"';?>  >
			<td class="td_left">内容URL规则</td>
			<td class="td_right">
				<input type="text" class="text" size="50"  name="setting[show_url_rule]" value="{-$current['setting']['show_url_rule']-}"  />
			</td>
		</tr>
     
     	<tr>
			<td class="td_left">每页内容数量</td>
			<td class="td_right">
				<input type="text" name="setting[page_num]" value="{-$current['setting']['page_num']-}" size="1" class="input-text" >
			</td>
		</tr>
      
       <style>
	   .mb6{padding: 0px 0px 4px; vertical-align: middle; line-height: 22px;}
	   .mb6 input[type="checkbox"]{vertical-align: -2px;}
	   </style>
        <tr>
	    	<td class="td_left" valign="top">专题子分类<a href="javascript:addItem()" title="添加分类"><span style="color:red;font-size:16px;" >+</span></a></th>
	        <td valign="top"><div id="option_list">
	        <?php
			//print_r($current['setting']['type']);
			if(is_array($current['setting']['type'])) {
				$k = 1;
				foreach($current['setting']['type'] as $t) {?>
		        	<div class="mb6"><span>{-$t['typeid']-}<input type="hidden" name="setting[type][{-$k-}][typeid]" value="{-$t['typeid']-}">&nbsp;&nbsp;分类名称 <input type="text" name="setting[type][{-$k-}][name]" class="input-text" size="8" value="{-$t['name']-}">，&nbsp;&nbsp;分类路径 <input type="text" name="setting[type][{-$k-}][typedir]" class="input-text" size="8" value="{-$t['typedir']-}">，&nbsp;&nbsp;每页内容数量 <input type="text" name="setting[type][{-$k-}][page_num]" value="{-$t['page_num']-}" size="1" class="input-text" >，&nbsp;&nbsp;排序 <input type="text" name="setting[type][{-$k-}][listorder]" value="{-$t['listorder']-}" size="1" class="input-text" >，&nbsp;&nbsp;单页 <input type="checkbox" name="setting[type][{-$k-}][page]" value="1" <?php if($t['page']) echo 'checked';?> title="分类页默认显示为第一条内容" >，&nbsp;&nbsp;隐藏 <input type="checkbox" name="setting[type][{-$k-}][hide]" value="1" <?php if($t['hide']) echo 'checked';?> >，&nbsp;&nbsp;列表模板 <?php echo FormElements::select($list_tpl_arr,'setting[type]['.$k.'][list_tpl]',$t['list_tpl'])?>，&nbsp;&nbsp;内容模板 <?php echo FormElements::select($show_tpl_arr,'setting[type]['.$k.'][show_tpl]',$t['show_tpl'])?></span>&nbsp; &nbsp; <a href="javascript:;" onclick="delItem(this, '+m+');" title="删除分类" style="color:red;font-size:14px;" >×</a></div>
		   <?php $k++; } }?>
	        </div>
	        </td>
	   </tr>
        
        
</table>
</div>

</div>
<table class="formTable">   
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
function addItem() {
	var n = $('#option_list').find('div.mb6').length;
	var last  = parseInt( $('#option_list').find('div.mb6:last').find('input[name$="[typeid]"]').val() );
	if(last!=n){
		n = last;
	}
	var m = n+1;	
	var newOption =  '<div class="mb6"><span>'+m+'<input type="hidden" name="setting[type]['+m+'][typeid]" value="'+m+'">&nbsp;&nbsp;分类名称 <input type="text" name="setting[type]['+m+'][name]" class="input-text" size="8">，&nbsp;&nbsp;分类路径 <input type="text" name="setting[type]['+m+'][typedir]" class="input-text" size="8">，&nbsp;&nbsp;每页内容数量 <input type="text" name="setting[type]['+m+'][page_num]" value="20" size="1" class="input-text" >，&nbsp;&nbsp;排序 <input type="text" name="setting[type]['+m+'][listorder]" value="'+m+'" size="1" class="input-text" >，&nbsp;&nbsp;单页 <input type="checkbox" name="setting[type]['+m+'][page]" value="1" title="分类页默认显示为第一条内容" >，&nbsp;&nbsp;隐藏 <input type="checkbox" name="setting[type]['+m+'][hide]" value="1">，&nbsp;&nbsp;列表模板 <?php echo FormElements::select($list_tpl_arr,'setting[type][\'+m+\'][list_tpl]','list.php')?>，&nbsp;&nbsp;内容模板 <?php echo FormElements::select($show_tpl_arr,'setting[type][\'+m+\'][show_tpl]','show.php')?></span>&nbsp; &nbsp; <a href="javascript:;" onclick="descItem(this, '+m+');" title="删除分类" style="color:red;font-size:14px;" >×</a></div>';
	$('#option_list').append(newOption);
}

function delItem(a,id) {
	$(a).parent().remove();
}


$(function(){
	$("input[name='setting[index_ishtml]']").click(function(){
		if( $(this).is(":checked") ){
			$('.index_url_rule').show()
		}else{
			$('.index_url_rule').hide()
		}
	});
	
	$("input[name='setting[list_ishtml]']").click(function(){
		if( $(this).is(":checked") ){
			$('.list_url_rule').show()
		}else{
			$('.list_url_rule').hide()
		}
	});
	
	$("input[name='setting[show_ishtml]']").click(function(){
		if( $(this).is(":checked") ){
			$('.show_url_rule').show()
		}else{
			$('.show_url_rule').hide()
		}
	});
})
</script>
<include file="./Core/App/Tpl/global_footer.php" />