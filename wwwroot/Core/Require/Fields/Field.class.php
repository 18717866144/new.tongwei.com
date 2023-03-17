<?php
/**
 * 字段抽像父类
 * @author CHENG
 *
 */
abstract class Field {
	public $form = array();
	public $setting = array();
	public $type = 0;//1添加,2编辑
	protected $html = null;
	public static $postData = null;
	/* 字段显示 */
	abstract public function show($value = '');//type=>1,添加,2修改
	/* 得到字段默认长度 */
	abstract public function getFieldLen();
	/* 系统内置字段样式 */
	abstract protected function internal($value);
}
?>