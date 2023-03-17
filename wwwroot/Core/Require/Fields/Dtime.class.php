<?php
/**
 * 时间字段设置
 * @author CHENG
 */
class Dtime extends Field {	
	/* 字段显示 */
	public function show($value = '') {
		$value = $this->type == 1 ? NOW_TIME : $value;
		switch ($this->setting['field_type']) {
			case 'int':
				$format_value = date($this->setting['int_format'],$value);
				switch ($this->setting['int_format']) {
					case 'Y-m-d H:i':
						$size = 18;				
						$format = '%Y-%m-%d %H:%M';
						break;
					case 'Y-m-d':
						$format = '%Y-%m-%d';
						$size = 10;
						break;
					case 'm-d':
						$format = '%m-%d';
						$size = 5;
						break;
					default:
						$format = '%Y-%m-%d %H:%M:%S';
						$size = 20;
						break;
				}
				break;
		}
		if($this->setting['timesystem']){
				$showsTime = 'true';
		} else {
				$showsTime = '12';
		}
		if($this->setting['showweek']){
			$showweek = 'true';
		} else {
			$showweek = 'false';
		}
		if($this->setting['loadjs'] || !defined('CALENDAR_INIT')) {
			define('CALENDAR_INIT', 1);
			$this->html = '<link rel="stylesheet" type="text/css" href="'.__PUBLIC__.'/js/calendar/jscal2.css"/>
			<link rel="stylesheet" type="text/css" href="'.__PUBLIC__.'/js/calendar/border-radius.css"/>
			<link rel="stylesheet" type="text/css" href="'.__PUBLIC__.'/js/calendar/win2k.css"/>
			<script type="text/javascript" src="'.__PUBLIC__.'/js/calendar/calendar.js"></script>
			<script type="text/javascript" src="'.__PUBLIC__.'/js/calendar/lang/en.js"></script>';
		}
		/* 默认为无时 */
		if ($this->setting['default_value_type'] == 1 && empty($value)) $format_value = '';
		/* 编辑时内容不为空，前台不可修改 */
		if ($this->show_status == 'edit' && $this->form['is_disabled'] == 1 && $format_value!='' && SESSION_TYPE != 1) {
			$this->html = $format_value;
		} else {
			$id = preg_match("/\[(.*)\]/", $this->form['field_name'], $m) ? $m[1] : $this->form['field_name'];
			$this->html .= '<input type="text" name="info['.$this->form['field_name'].']" id="'.$id.'" value="'.$format_value.'" size="'.$size.'" class="date" readonly>&nbsp;';
			$this->html .= '<script type="text/javascript">
			Calendar.setup({
			weekNumbers: '.$showweek.',
		    inputField : "'.$id.'",
		    trigger    : "'.$id.'",
		    dateFormat: "'.$format.'",
		    showTime: '.$showsTime.',
		    minuteStep: 1,
		    onSelect   : function() {this.hide();}
			});
        </script>';
			//$this->html = '<input type="text" name="info['.$this->form['field_name'].']" value="'.$format_value.'" onfocus="'.$onfocus.'"  '.$this->form['input_attr'].' />';
		}
		return $this->html;
	}

	/**
	 * 入库前执行的操作
	 * @param Mixed $value
	 * @param array $fieldArray 字段所有配置
	 * @return Ambigous <unknown, number>
	 */
	public function before_storage($value,$fieldArray) {
		return ($fieldArray['field_setting']['field_type'] == 'int') ? strtotime($value) : $value;
	}
	
	public function update_archives($value, $a, $b, $c){
		M('archives')->where('id='.$c['dynamic_id'])->save( array('save_time'=>$value) );
	}

	/* 获取字段默认长度*/
	public function getFieldLen() {
		return 10;
	}

	/* 内置显示 方法*/
	protected function internal($value) {}

}
?>