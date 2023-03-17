<?php
/**
 * 内容字段子类
 * @author CHENG
 */
require 'MF.class.php';
class PaperModels extends MF {
	public static $field = array(
		'title'=>'标题',
		'navigate'=>'导航',
		'text' => '单行文本',
		'textarea' => '多行文本',
		'editor' => '编辑器',
		'numeric' => '数字',
		'box' => '选项',
		'image' => '图片',
		'dtime' => '日期和时间',
		'associate'=>'关联字段',
		'is_link'=>'转向链接',
		'file'=>'单文件',
		'files'=>'多文件',
		'type'=>'内容类型',
		'page'=>'分页',
		'Region'=>'地区',
	);
	
	public static $notAllowedField = array(
		
	);
}
?>