<?php
/**
 * 关联字段设置
 * @author CHENG
 */
class Associate extends Field {
	
	public function show($value = '') {
		/* 正常显示 */
		switch ($this->setting['insert_type']) {
			case 'id':
				$optionType = $this->setting['set_id'];
				break;
			case 'title':
				$optionType = $this->setting['set_field'];
				break;
			case 'title_id':
				// 					$optionType = $setting['set_field'];
				break;
					
		}
		$Model = new Model();
		$data = $Model->table($this->setting['table_name'])->field("{$this->setting['set_id']},{$this->setting['set_field']}")->select();
		$this->html = '<select name="info['.$this->form['field_name'].']" '.$this->form['input_attr'].'>';
		$this->html .= '<option value="">请选择数据</option>';
		foreach ($data as $values) {
			$selected = ($values[$optionType] == $value) ? 'selected="selected"' : '';
			$this->html .= '<option value="'.$values[$optionType].'" '.$selected.'>'.$values[$this->setting['set_field']].'</option>';
		}
		$this->html .= '</select>';
		return $this->html;
	}


	/**设置字段长度默认值 **/
	public function getFieldLen() {
		return 0;		
	}

	/* 内置字段显示处理 */
	protected function internal($value) {}


	
}
?>