<?php
/**
 * 导航字段设置
 * @author CHENG
 */
class Navigate extends Field {
	
	/* 显示字段样式 */
	public function show($value = '') {
		$value = $this->type == 1 ? intval($_GET['cid']) : $value;
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

	/* 系统内置字段样式 */
	protected function internal($value) {
		$navigate = F('navigate');
		return $navigate[$value]['navigate_name'].'<input type="hidden" value="'.$value.'" name="info['.$this->form['field_name'].']" /><input type="hidden" value="'.Tool::encrypt($value).'" name="cid_token" />';
	}
	
	
	/* 默认字段值设置 */
	public function getFieldLen() {
		return 8;
	}

	/* 入库前执行的操作 */
	public function before_storage($value,$fieldArray) {
		/* cidToken值 */
		if ($_POST['cid_token'] !== Tool::encrypt($value)) {
			$Model = new GlobalModel();
			$Model->writeLog('该使用者尝试修改CID，此操作十分危险!','USER_ERROR');
			return array('vail_status'=>false,'vail_info'=>'非法数据值被拒绝！');
		} else {
			return $value;
		}
	}
	
}
?>