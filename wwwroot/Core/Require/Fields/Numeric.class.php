<?php
/**
 * 数字字段设置
 * @author CHENG
 */
class Numeric extends Field {

	/* 字段显示 */
	public function show($value = '') {
		$value = $this->type == 1 ? $this->setting['default_value'] : $value;
		if (SESSION_TYPE == 1) {
			if ($this->setting['back_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['back_field_tpl']}";
				$this->html = ob_get_contents();
				ob_clean();
			}  else {
				$this->html = '<input type="text" name="info['.$this->form['field_name'].']" value="'.$value.'" '.$this->form['input_attr'].' size="'.$this->setting['size'].'"  />';
			}
		} else {
			if ($this->setting['front_field_tpl']) {
				ob_start();
				require_once TMPL_PATH."Fields/{$this->form['form_type']}/{$this->setting['front_field_tpl']}";
				$this->html = ob_get_contents();
				ob_clean();
			}  else {
				$this->html = '<input type="text" name="info['.$this->form['field_name'].']" value="'.$value.'" '.$this->form['input_attr'].' size="'.$this->setting['size'].'"  />';
			}
		}
		return $this->html;
	}


	/* 获取字段长度 */
	public function getFieldLen() {
		switch ($this->setting['field_type']) {
			case 'tinyint':
				return 3;
			case 'smallint':
				return 5;
			case 'mediumint':
				return 8;
			case 'int':
				return 10;
			case 'bigint':
				return 20;
		}
		
	}

	/* 系统内置字段样式 */
	protected function internal($value) {}
	
	/********************自定义函数******************/
	
	public function set_online_time() {
		return '$delete$';
	}
	
	/* 推广员UID设置 */
	public function set_user_uid() {
		return '$delete$';
	}
	
	/* 媒体ID */
	public function set_user_cid() {
		return '$delete$';
	}
	/* 广告素材ID */
	public function set_user_aid() {
		return $this->checkIDS('aid');
	}
	
	/* 游戏ID */
	public function set_user_gid() {
		return $this->checkIDS('gid');
	}
	
	/**
	 * 处理以上各个ID标签
	 * @param string $type
	 */
	private function checkIDS($type) {
		if (GBehavior::$session) {//cid,gid,aid,uid，一经写入就不变，所以不管更改任何表单，都是不变的
			return '$delete$';
		} else {
			switch ($type) {
				case 'uid':
				case 'cid':
					if (isset($_POST[$type]) && !empty($_POST[$type])) {
						return intval($_POST[$type]);
					}
					break;
			}
		}
	}

}
?>