<?php
/**
 * 选项字段设置
 * @author CHENG
 */
class Box extends Field {
	
	/* 字段显示 */
	public function show($value = '') {
		$value = $this->type == 1 ? $this->setting['default_value'] : $value;
		// 		转换为数组
		if (!empty($value)) $value = explode(',', $value);
		// 		选项options处理
		if (!empty($this->setting['options'])) {
			$options = explode("\r\n", $this->setting['options']);
			$inputOpt = array();
			foreach ($options as $optVal) {
				$option = explode('|',$optVal);
				// 				判断输出选项名或值
				$this->setting['output_type']==1 ? $inputOpt[$option[0]] = $option[1]: $inputOpt[$option[1]] = $option[0] ;//1输出选项值,2输出选项名
			}
		}
		switch ($this->setting['box_type']) {
			case 'radio':
				$this->html =  FormElements::radio($inputOpt,'info['.$this->form['field_name'].']',$value,$this->form['input_attr']);
				break;
			case 'checkbox'://复选框
				$this->html = '<input type="hidden" name="info['.$this->form['field_name'].']" />'.FormElements::checkbox($inputOpt, 'info['.$this->form['field_name'].'][]', $value,$this->form['input_attr']);
				break;
			case 'multiple'://select多选
				$this->html =  FormElements::select($inputOpt, 'info['.$this->form['field_name'].'][]', $value,$this->form['input_attr'],true);
				break;
			case 'select':
				$this->html =  FormElements::select($inputOpt, 'info['.$this->form['field_name'].']', $value,$this->form['input_attr']);
				break;
		}
		return $this->html;
	}


	/**
	 * 入库前操作
	 * @param mixed $value
	 * @param array $fieldArray
	 * @return Ambigous <unknown, string>|unknown
	 */
	public function before_storage($value,$fieldArray) {
		//多选				
		if ($fieldArray['field_setting']['box_type'] == 'checkbox' || $fieldArray['field_setting']['box_type'] == 'multiple') {			
//			if(is_array($value)){
//				$_value = array();
//				foreach($value as $k=>$v)
//				{
//					if($v!=''){ $_value[]=$v; }
//				}
//				$value = $_value;
//				$value = array_filter($value);
//			}			
			$value = $value ? implode(',', $value) : $value;
			return $value;
		}else {
			return $value;
		}
	}

	/* 获取字段默认长度 */
	public function getFieldLen() {
		return 0;
	}

	/* 内置显示*/
	protected function internal($value) {}
	
	
	/********************自定义函数************/
	
	/**
	 * 用户身份证实名验证
	 * @param numeric $value
	 * @param array $fieldArray
	 */
	public function check_certified($value,$fieldArray,$insertId = '') {
		/* 内置字段适用于会员模型，内容模型也可以使用，但数据需要从库中获取这是耗性能的一种操作 */
		/* 如果需要原数据库字段可使用$_POST['id']获取，其它$fieldArray则就可以获取 */
		if ($insertId) {
			$_SESSION[C('MEMBER_SESSION')]['is_certified'] = $value;
		} else {
			if (!empty(self::$postData['truename']) && !empty(self::$postData['id_card'])) {
				return 1;
			} else {
				return GBehavior::$session ? GBehavior::$session['is_certified'] : 2;
			}
		}
	}
	
	/**
	 * 验证是否成年
	 * @param numeric $value
	 * @param array $fieldArray
	 * @param string $insertId
	 */
	public function check_audlt($value,$fieldArray,$insertId = '') {
		//入库后
		if ($insertId) {
			$_SESSION[C('MEMBER_SESSION')]['is_adult'] = $value;
		} else {
			if (!empty(self::$postData['truename']) && !empty(self::$postData['id_card'])) {
				//验证是否成年
				$age = preg_replace('/^(.{6})(.{8})(.{4})$/', '$2', self::$postData['id_card']);
				return date('Ymd')-$age >= 180000 ? 1 : 2;
			} else {
				return GBehavior::$session ? GBehavior::$session['is_adult'] : 2;
			}
		}
	}
}
?>