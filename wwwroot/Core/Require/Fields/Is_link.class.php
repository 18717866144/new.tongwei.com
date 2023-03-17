<?php
/**
 * 外链字段设置
 * @author CHENG
 */
class Is_link extends Field {
	
	/* 字段显示 */
	public function show($value = '') {
		if ($this->type == 1) {
			$this->html = '<input type="text" class="text is_link" value="" size="23"  id="link_url" name="link_url" disabled="disabled" />
					<input type="checkbox" name="info['.$this->form['field_name'].']" value="1" '.$this->form['input_attr'].' onclick="if($(this).prop(\'checked\')){$(\'#link_url\').removeAttr(\'disabled\');}else{$(\'#link_url\').attr(\'disabled\',\'disabled\');}" />';
		} else {
			$is_link = $value['is_link'];
			if ($is_link == 1) {
				$checked = 'checked="checked"';
			}else {
				$disabled = 'disabled="disabled"';
			}
			$link_url = $value['url'];
			$this->html = '<input type="text" class="text is_link"  size="23" value="'.$link_url.'" id="link_url" alt="'.$link_url.'" name="link_url" '.$disabled.' />
					<input type="checkbox" '.$checked.' name="info['.$this->form['field_name'].']" value="1" '.$this->form['input_attr'].' onclick="if($(this).prop(\'checked\')){$(\'#link_url\').val($(\'#link_url\').attr(\'alt\')).removeAttr(\'disabled\');}else{$(\'#link_url\').val(\'\').attr(\'disabled\',\'disabled\');}" />';
		}
		return $this->html;
	}

	/**
	 * 入库前执行的操作
	 * @param mixed $value
	 * @param array $fieldArray
	 * @return void|Ambigous <>|multitype:boolean string |string
	 */
	public function before_storage($value,$fieldArray) {
		return empty($value) ? 0 : 1;
	}

	/* 得到字段默认长度 */
	public function getFieldLen() {
		return 1;
	}

	/* 系统内置字段样式 */
	protected function internal($value) {}

	
}
?>