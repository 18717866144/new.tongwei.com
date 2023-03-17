<?php	return array ( 'cid' => array ( 'id' => '12', 'mid' => '1', 'field_name' => 'cid', 'nick_name' => '导航', 'tips' => '', 'pattern' => 'r/^[1-9][\\d]{0,7}$/', 'field_len' => '8', 'form_type' => 'navigate', 'field_setting' => array ( 'field_type' => 'mediumint', 'is_unsigned' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '1', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '58', ), 'typeid' => array ( 'id' => '394', 'mid' => '1', 'field_name' => 'typeid', 'nick_name' => '内容类别', 'tips' => '', 'pattern' => '', 'field_len' => '8', 'form_type' => 'type', 'field_setting' => array ( 'field_type' => 'mediumint', 'model_id' => '1', 'navi_id' => '-1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '57', ), 'title_top' => array ( 'id' => '91', 'mid' => '1', 'field_name' => 'title_top', 'nick_name' => '上标题', 'tips' => '', 'pattern' => '', 'field_len' => '255', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title"', 'sort' => '51', ), 'title' => array ( 'id' => '1', 'mid' => '1', 'field_name' => 'title', 'nick_name' => '必填标题', 'tips' => '1-60个字符之间', 'pattern' => 's1-60', 'field_len' => '60', 'form_type' => 'title', 'field_setting' => array ( 'front_field_tpl' => 'front.php', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '1', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '1', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '1', 'is_back_list' => '1', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title" datatype="*1-60" errormsg="标题格式不正确！"  title="用于列表页或没有头条标题时显示"', 'sort' => '50', ), 'title_short' => array ( 'id' => '395', 'mid' => '1', 'field_name' => 'title_short', 'nick_name' => '简短标题', 'tips' => '主要用于部分地方调用', 'pattern' => '', 'field_len' => '255', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_system' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', ), 'field_status' => '1', 'input_attr' => 'class="text title"', 'sort' => '50', ), 'title_hot' => array ( 'id' => '471', 'mid' => '1', 'field_name' => 'title_hot', 'nick_name' => '首页头条标题', 'tips' => '仅用于首页头条显示，留空则使用必填标题', 'pattern' => '', 'field_len' => '255', 'form_type' => 'textarea', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'style="text-align:center; line-height:28px;font-family:\'Microsoft Yahei\'; padding: 16px 0px; font-size:26px; text-align: center; font-weight: bold; white-space: pre-wrap!important; color:#000;font-weight:bold;" class="texta description"', 'sort' => '50', ), 'title_content' => array ( 'id' => '473', 'mid' => '1', 'field_name' => 'title_content', 'nick_name' => '内容页面标题', 'tips' => '仅用于内容页标题显示，留空则显示必填标题', 'pattern' => '', 'field_len' => '255', 'form_type' => 'textarea', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'style="text-align:center; line-height:28px;font-family:\'Microsoft Yahei\'; padding: 16px 0px; font-size:26px; text-align: center; font-weight: bold; white-space: pre-wrap!important; color:#000;font-weight:bold;" class="texta description"', 'sort' => '49', ), 'title_bottom' => array ( 'id' => '92', 'mid' => '1', 'field_name' => 'title_bottom', 'nick_name' => '下标题', 'tips' => '', 'pattern' => '', 'field_len' => '255', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title"', 'sort' => '48', ), 'author' => array ( 'id' => '93', 'mid' => '1', 'field_name' => 'author', 'nick_name' => '作者', 'tips' => '', 'pattern' => '', 'field_len' => '255', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_system' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', ), 'field_status' => '1', 'input_attr' => 'class="text keywords"', 'sort' => '47', ), 'source' => array ( 'id' => '4', 'mid' => '1', 'field_name' => 'source', 'nick_name' => '来源', 'tips' => '60个字符以内', 'pattern' => 'a|s1-60', 'field_len' => '60', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => 'source_img.php', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text source" ignore="ignore" datatype="*1-60" errormsg="来源格式不正确！"', 'sort' => '46', ), 'source_pic' => array ( 'id' => '468', 'mid' => '1', 'field_name' => 'source_pic', 'nick_name' => '来源网站图片', 'tips' => '', 'pattern' => '', 'field_len' => '255', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '1', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '45', ), 'sourceurl' => array ( 'id' => '94', 'mid' => '1', 'field_name' => 'sourceurl', 'nick_name' => '来源URL', 'tips' => '', 'pattern' => '', 'field_len' => '255', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title"', 'sort' => '44', ), 'keywords' => array ( 'id' => '2', 'mid' => '1', 'field_name' => 'keywords', 'nick_name' => '关键字', 'tips' => '多关键词之间用“空格”隔开', 'pattern' => 'a|s1-60', 'field_len' => '60', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => 'handel_keywords', 'front_func_type' => '1', 'back_func' => 'handel_keywords', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title"  ignore="ignore" datatype="*1-60" errormsg="关键字格式不正确！"', 'sort' => '43', ), 'description' => array ( 'id' => '5', 'mid' => '1', 'field_name' => 'description', 'nick_name' => '摘要', 'tips' => '255个字符以内', 'pattern' => 's10-255', 'field_len' => '255', 'form_type' => 'textarea', 'field_setting' => array ( 'field_type' => 'char', 'default_value' => '', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => 'set_description', 'front_func_type' => '1', 'back_func' => 'set_description', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '1', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="texta description" datatype="*10-255" errormsg="摘要格式不正确！"', 'sort' => '42', ), 'video' => array ( 'id' => '470', 'mid' => '1', 'field_name' => 'video', 'nick_name' => '视频文件', 'tips' => '', 'pattern' => '', 'field_len' => '0', 'form_type' => 'file', 'field_setting' => array ( 'field_type' => 'text', 'allow_type' => 'media', 'file_size_type' => 'large', 'download_link' => '1', 'download_type' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title"', 'sort' => '41', ), 'content' => array ( 'id' => '6', 'mid' => '1', 'field_name' => 'content', 'nick_name' => '内容详情', 'tips' => '', 'pattern' => '', 'field_len' => '0', 'form_type' => 'editor', 'field_setting' => array ( 'field_type' => 'text', 'intercept_content' => '1', 'auto_thumb_num' => '1', 'back_toolbar' => 'basic', 'back_custom_toolbar' => '', 'front_toolbar' => 'small', 'front_custom_toolbar' => '', 'default_value' => '', 'height' => '300', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '1', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '1', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '2', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '40', ), 'page' => array ( 'id' => '7', 'mid' => '1', 'field_name' => 'page', 'nick_name' => '分页', 'tips' => '', 'pattern' => '', 'field_len' => '10', 'form_type' => 'page', 'field_setting' => array ( 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '2', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '39', ), 'thumbnail' => array ( 'id' => '9', 'mid' => '1', 'field_name' => 'thumbnail', 'nick_name' => '缩略图', 'tips' => '', 'pattern' => '', 'field_len' => '100', 'form_type' => 'image', 'field_setting' => array ( 'field_type' => 'char', 'water_mark' => '2', 'crop_type' => '2', 'crop_mode' => '1', 'crop_width' => '150', 'crop_height' => '', 'crop_multiple' => '', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '1', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="thumbnail"', 'sort' => '37', ), 'relevant' => array ( 'id' => '10', 'mid' => '1', 'field_name' => 'relevant', 'nick_name' => '相关文章', 'tips' => '', 'pattern' => '', 'field_len' => '100', 'form_type' => 'text', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'is_password' => '2', 'front_field_tpl' => '', 'back_field_tpl' => 'relevant.php', 'front_func' => 'set_relevant', 'front_func_type' => '1', 'back_func' => 'set_relevant', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '2', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '35', ), 'is_link' => array ( 'id' => '11', 'mid' => '1', 'field_name' => 'is_link', 'nick_name' => '转向链接', 'tips' => '', 'pattern' => '', 'field_len' => '1', 'form_type' => 'is_link', 'field_setting' => array ( 'field_type' => 'tinyint', 'is_unsigned' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '33', ), 'save_time' => array ( 'id' => '13', 'mid' => '1', 'field_name' => 'save_time', 'nick_name' => '发布时间', 'tips' => '', 'pattern' => '', 'field_len' => '10', 'form_type' => 'dtime', 'field_setting' => array ( 'is_unsigned' => '1', 'field_type' => 'int', 'int_format' => 'Y-m-d H:i:s', 'default_value_type' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="date"', 'sort' => '32', ), 'a_status' => array ( 'id' => '17', 'mid' => '1', 'field_name' => 'a_status', 'nick_name' => '审核状态', 'tips' => '', 'pattern' => '', 'field_len' => '1', 'form_type' => 'box', 'field_setting' => array ( 'options' => '已审核|1
只预览|4
未审核|2
未通过|3', 'box_type' => 'radio', 'field_type' => 'tinyint', 'is_unsigned' => '1', 'set_value' => '', 'default_value' => '1', 'output_type' => '2', 'filter_type' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '27', ), 'sort' => array ( 'id' => '22', 'mid' => '1', 'field_name' => 'sort', 'nick_name' => '排序', 'tips' => '', 'pattern' => 'n1-8', 'field_len' => '8', 'form_type' => 'numeric', 'field_setting' => array ( 'default_value' => '1', 'field_type' => 'tinyint', 'is_unsigned' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'datatype="n1-8" errormsg="排序格式不正确" class="sort" size="10"', 'sort' => '17', ), 'attr' => array ( 'id' => '8', 'mid' => '1', 'field_name' => 'attr', 'nick_name' => '属性', 'tips' => '', 'pattern' => '', 'field_len' => '0', 'form_type' => 'box', 'field_setting' => array ( 'options' => '头条新闻|h
首页不显示|d
推荐新闻|f', 'box_type' => 'checkbox', 'field_type' => 'set', 'is_unsigned' => '1', 'set_value' => 'h,d,f', 'default_value' => '', 'output_type' => '2', 'filter_type' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="attrs"', 'sort' => '1', ), );?>