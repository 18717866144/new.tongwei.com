<?php
/**
 * 标题字段设置
 * @author CHENG
 */
class Text extends Field {
	
	/* 显示字段样式 */
	public function show($value = '') {		
		$value = $this->type == 1 ? $this->setting['default_value'] : $value;
		if (SESSION_TYPE == 1) {
			if ($this->setting['back_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['back_field_tpl']}";
				$this->html = ob_get_clean();			
			}  else {
				$this->html = $this->internal($value);
			}
		} else {
			if ($this->setting['front_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['front_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		}
		return $this->html;
	}
	
	/* 系统内置字段样式 */
	protected function internal($value) {
		if (!empty($value) && $this->setting['is_disabled'] == 1 && $this->type == 2 && SESSION_TYPE != 1) {
			return  $value;
		}else {
			return $this->setting['is_password']==1 ? 
			FormElements::password('info['.$this->form['field_name'].']',$value,$this->form['input_attr']) :
			FormElements::input('info['.$this->form['field_name'].']',$value,$this->form['input_attr']);
		}
	}
	
	/* 得到默认字段长度 可用$this->setting */
	public function getFieldLen() {
		return 255;
	}
	
	/**********************自定义配置，请在下面添加******************/
	
	

	/* 设置入库关键字 */
	public function handel_keywords($value,$fieldArray) {
		return empty($value) ? '' : str_replace(' ', ',', $value);
	}
	
	/* 设置tags */
	public function set_tags($value,$fieldArray,$insertId = '') {
		///* 入库前 */
		if (empty($insertId)) {
			$value =  trim($value);
			if (!$value) return '';
			return implode(' ', array_unique(explode(' ',$value)));
		} else {
			if (!$value) return ;
			//入库后，如果按装tags模块，那么则添加tags
			$modules = F('modules');
			if ($modules['Tags']['is_install'] == 1 && $modules['Tags']['is_disabled'] ==1) {
				$Tags = D('Modules/Tags');
				$tagsArray = explode(' ',$value);
				$Tags->addTags($tagsArray);//添加总tags
				$setting = array();
				$setting['aid'] = $insertId;
				$setting['cid'] = self::$postData['main']['cid'];
				$setting['mid'] = $fieldArray['mid'];
				$Tags->addTagsList($tagsArray,$setting);
			}
		}
	}
	
	/* 过滤关联字段 */
	public function set_relevant($value,$fieldArray) {
		return empty($value) ? '' : trim($value,',');
	}

	/* 实名，防沉迷验证验证真实姓名 */
	public function check_truename($value,$fieldArray) {
		if (ACTION_NAME == 'anti_addiction' && MODULE_NAME == 'Set') {
			//如果不为空的话则上面系统内置的验证规则已经验证，这里是判断为空的情况
			return empty($value) ? array('vail_status'=>false,'vail_info'=>'请填写您的真实姓名！') : false;
		}
	}
	/* 实名，防沉迷验证，验证身份证 */
	public function check_id_card($value,$fieldArray) {
		//如果不为空的话则上面系统内置的验证规则已经验证，这里是判断为空的情况
		if (ACTION_NAME == 'anti_addiction' && MODULE_NAME == 'Set') {
			return empty($value) ? array('vail_status'=>false,'vail_info'=>'请填写您的身份证号！') : false;
		}
	}
	
}
?>