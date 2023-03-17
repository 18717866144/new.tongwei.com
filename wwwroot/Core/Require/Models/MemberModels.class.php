<?php
/**
 * 会员字段子类
 * @author CHENG
 */
require 'MF.class.php';
class MemberModels extends MF {
	public static $field = array(
		'text' => '单行文本',
		'textarea' => '多行文本',
		'numeric' => '数字',
		'box' => '选项',
		'dtime' => '日期和时间',
		'image' => '图片',
	);
	public static $notAllowedField = array();
}
?>