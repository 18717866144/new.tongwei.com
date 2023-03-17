<?php
/**
 * 多行文本字段设置
 * @author CHENG
 */
class Textarea extends Field {
	
	/* 显示字段样式 */
	public function show($value = '') {
		$value = $this->type == 1 ? $this->setting['default_value'] : $value;
		if (SESSION_TYPE == 1) {
			if ($this->setting['back_field_tpl']) {
				ob_start();
				require_once REQUIRE_PATH."Tpl/fields/{$this->form['form_type']}/{$this->setting['back_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		} else {
			if ($this->setting['front_field_tpl']) {
				ob_start();
				require_once REQUIRE_PATH."Tpl/fields/{$this->form['form_type']}/{$this->setting['front_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		}
		return $this->html;
	}

	/* 默认字段值设置 */
	public function getFieldLen() {
		return $this->setting['field_type'] == 'text' ? 0 : 255;
	}
	
	/* 系统内置字段样式 */
	protected function internal($value) {
		if (!empty($value) && $this->setting['is_disabled'] == 1 && $this->type == 2 && SESSION_TYPE == 2) {
			return $value;
		}else {
			return FormElements::textarea('info['.$this->form['field_name'].']',$value,$this->form['input_attr']);
		}
	}

	/**********************自定义配置，请在下面添加******************/
	
	
	/* 设置描述[摘要]长度 为空长度是否自动截取 */
	public function set_description($value,$fieldArray) {
		return (empty($value) && $_POST['intercept_content']==1) ? String::msubstr(strip_tags(preg_replace('/\s|\_HXCMS\_PAGE\_|\<pre.*\>.*\<\/pre\>/Ums', '',Input::TransHtmlCharEntiti(self::$postData['content']))),0,$fieldArray['field_len']) : $value;
	}
}
?>