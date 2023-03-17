<?php	return array ( 'cid' => array ( 'id' => '456', 'mid' => '10', 'field_name' => 'cid', 'nick_name' => '导航', 'tips' => '', 'pattern' => 'r/^[1-9][\\d]{0,7}$/', 'field_len' => '8', 'form_type' => 'navigate', 'field_setting' => array ( 'field_type' => 'mediumint', 'is_unsigned' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '1', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '50', ), 'title' => array ( 'id' => '455', 'mid' => '10', 'field_name' => 'title', 'nick_name' => '标题', 'tips' => '1-60个字符之间', 'pattern' => 's1-60', 'field_len' => '60', 'form_type' => 'title', 'field_setting' => array ( 'front_field_tpl' => 'front.php', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '1', 'is_unique' => '2', 'is_posted' => '1', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '1', 'is_back_list' => '1', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title" datatype="*1-60" errormsg="标题格式不正确！"', 'sort' => '48', ), 'description' => array ( 'id' => '466', 'mid' => '10', 'field_name' => 'description', 'nick_name' => '视频摘要', 'tips' => '', 'pattern' => '', 'field_len' => '1000', 'form_type' => 'textarea', 'field_setting' => array ( 'field_type' => 'varchar', 'default_value' => '', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_system' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', ), 'field_status' => '1', 'input_attr' => 'class="text description"', 'sort' => '47', ), 'video' => array ( 'id' => '467', 'mid' => '10', 'field_name' => 'video', 'nick_name' => '视频地址', 'tips' => '', 'pattern' => '', 'field_len' => '0', 'form_type' => 'file', 'field_setting' => array ( 'field_type' => 'text', 'allow_type' => 'media', 'file_size_type' => 'large', 'download_link' => '1', 'download_type' => '2', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="text title"', 'sort' => '46', ), 'attr' => array ( 'id' => '458', 'mid' => '10', 'field_name' => 'attr', 'nick_name' => '属性', 'tips' => '', 'pattern' => '', 'field_len' => '0', 'form_type' => 'box', 'field_setting' => array ( 'options' => '首页头条|h', 'box_type' => 'checkbox', 'field_type' => 'set', 'is_unsigned' => '1', 'set_value' => 'h', 'default_value' => '', 'output_type' => '2', 'filter_type' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '1', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '40', ), 'thumbnail' => array ( 'id' => '459', 'mid' => '10', 'field_name' => 'thumbnail', 'nick_name' => '缩略图', 'tips' => '', 'pattern' => '', 'field_len' => '100', 'form_type' => 'image', 'field_setting' => array ( 'field_type' => 'char', 'water_mark' => '2', 'crop_type' => '1', 'crop_mode' => '1', 'crop_width' => '150', 'crop_height' => '', 'crop_multiple' => '', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '1', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="thumbnail"', 'sort' => '37', ), 'save_time' => array ( 'id' => '460', 'mid' => '10', 'field_name' => 'save_time', 'nick_name' => '发布时间', 'tips' => '', 'pattern' => '', 'field_len' => '10', 'form_type' => 'dtime', 'field_setting' => array ( 'is_unsigned' => '1', 'field_type' => 'int', 'int_format' => 'Y-m-d H:i:s', 'default_value_type' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'class="date"', 'sort' => '32', ), 'click' => array ( 'id' => '462', 'mid' => '10', 'field_name' => 'click', 'nick_name' => '点击数', 'tips' => '', 'pattern' => 'n1-8', 'field_len' => '8', 'form_type' => 'numeric', 'field_setting' => array ( 'default_value' => '0', 'field_type' => 'tinyint', 'is_unsigned' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_internal' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'datatype="n1-8" errormsg="点击数格式不正确！" size="10"', 'sort' => '31', ), 'a_status' => array ( 'id' => '461', 'mid' => '10', 'field_name' => 'a_status', 'nick_name' => '审核状态', 'tips' => '', 'pattern' => '', 'field_len' => '1', 'form_type' => 'box', 'field_setting' => array ( 'options' => '已审核|1
未审核|2
未通过|3', 'box_type' => 'radio', 'field_type' => 'tinyint', 'is_unsigned' => '1', 'set_value' => '', 'default_value' => '1', 'output_type' => '2', 'filter_type' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_system' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', ), 'field_status' => '1', 'input_attr' => '', 'sort' => '27', ), 'sort' => array ( 'id' => '465', 'mid' => '10', 'field_name' => 'sort', 'nick_name' => '排序', 'tips' => '', 'pattern' => 'n1-8', 'field_len' => '8', 'form_type' => 'numeric', 'field_setting' => array ( 'default_value' => '1', 'field_type' => 'tinyint', 'is_unsigned' => '1', 'front_field_tpl' => '', 'back_field_tpl' => '', 'front_func' => '', 'front_func_type' => '1', 'back_func' => '', 'back_func_type' => '1', 'is_basic' => '2', 'is_required' => '2', 'is_unique' => '2', 'is_posted' => '2', 'is_disabled' => '2', 'is_hide' => '2', 'is_front_list' => '2', 'is_back_list' => '2', 'is_search' => '2', 'is_fulltext' => '2', 'is_system' => '1', ), 'field_status' => '1', 'input_attr' => 'datatype="n1-8" errormsg="排序格式不正确" class="sort" size="10"', 'sort' => '17', ), );?>