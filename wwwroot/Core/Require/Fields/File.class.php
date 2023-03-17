<?php
/**
 * 多文件字段设置
 * @author CHENG
 */
class File extends Field {
	
	/* 字段显示 */
	public function show($value = '') {
		if (SESSION_TYPE == 1) {
			if ($this->setting['back_field_tpl']) {
				ob_start();
				require_once REQUIRE_PATH."Tpl/field/{$this->form['form_type']}/{$this->setting['back_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		} else {
			if ($this->setting['front_field_tpl']) {
				ob_start();
				require_once REQUIRE_PATH."Tpl/field/{$this->form['form_type']}/{$this->setting['front_field_tpl']}";
				$this->html = ob_get_clean();
			}  else {
				$this->html = $this->internal($value);
			}
		}
		return $this->html;
	}
	
	/* 系统内置字段样式 */
	protected function internal($value) {
		//相关表related
		$model = F("models_{$this->form['mid']}");
		$related_table = $model['table_name'];
		
		$file_name = rawurlencode("info[{$this->form['field_name']}]");
		/* 多文件类型 */
						
// 			文件名/上传类型/上传数目/下载链接方式/下载类型
			$token = Tool::encrypt("{$file_name}{$this->setting['allow_type']}1{$this->setting['download_link']}{$this->setting['download_type']}$related_table");
			$htmlString = <<<string
			<input type="text" id="{$this->form['field_name']}" name="info[{$this->form['field_name']}]" {$this->form['input_attr']} value="$value" />
				<input type="button" value="上传文件" onclick="openNewWindow('__APP__/Attachment/Attachment/file?file_name={$file_name}&file_type={$this->setting['allow_type']}&up_num=1&download_link={$this->setting['download_link']}&download_type={$this->setting['download_type']}&related=$related_table&token=$token&file_size_type={$this->setting['file_size_type']}','上传文件');" class="smallSub" />	
string;
		return $htmlString;
		
	}

	/**
	 * 入库前
	 * @param mixed $value
	 * @param array $fieldArray
	 * @return string
	 */
	public function before_storage($value,$fieldArray) {
		return empty($value) ? '' : str_replace(' ', ',', $value);
	}

	/* 得到字段默认长度 */
	public function getFieldLen() {
		return 0;
	}

	
}
?>