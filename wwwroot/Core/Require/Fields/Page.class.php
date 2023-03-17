<?php
/**
 * 分页字段设置
 * @author CHENG
 */
class Page extends Field {
	/* 显示字段样式 */
	public function show($value = '') {
		if ($this->type == 1) {
			$this->html = "<select name=\"info[".$this->form['field_name']."]\" id=\"paginationtype\" onchange=\"if(this.value==2){\$('#paginationtype1').css('display','');\$('#paginationtype2').css('display','none');}else if(this.value==3){\$('#paginationtype1').css('display','none');\$('#paginationtype2').css('display','none');}else{ \$('#paginationtype1,#paginationtype2').css('display','none');}\">
                <option value=\"1\" selected=\"selected\">不分页</option>
                <option value=\"2\">自动分页 </option>
                <option value=\"3\">手动分页</option>
            </select>
			<span id=\"paginationtype1\" style=\"display:none;\"><input name=\"max_page_char\" type=\"text\" class=\"text\" id=\"maxcharperpage\" value=\"10000\" size=\"8\" maxlength=\"8\" class='input'>&nbsp;字符数（包含HTML标记）</span><span id=\"paginationtype2\" style=\"display:none;\">&nbsp;分页标识符为_HXCMS_PAGE_</span>";
		} else {
			if (!empty($value)) {
				$value = explode('|', $value);
				$content_page = $value[0];
				$max_page_char = empty($value[1]) ? 10000 : $value[1];
			}
			$this->html = "<select name=\"info[".$this->form['field_name']."]\" id=\"paginationtype\" onchange=\"if(this.value==2)\$('#paginationtype1').css('display','');else \$('#paginationtype1').css('display','none');\">";
			$type = array(1=>'不分页', 2=>'自动分页', 3=>'手动分页');
			$con = $content_page == 2 ? 'style="display:"' : 'style="display:none;"';
			foreach ($type as $i => $val) {
				$tag = ($i == $content_page) ? 'selected' : '';
				$this->html .= "<option value=\"$i\" $tag>$val</option>";
			}
			$this->html .= "</select><span id=\"paginationtype1\" $con> <input name=\"max_page_char\" type=\"text\" class=\"text\" id=\"maxcharperpage\" value=\"$max_page_char\" size=\"8\" maxlength=\"8\" class='input'>字符数（包含HTML标记）</span>";
		}
		return $this->html;
	}
	
	/* 入库前执行的操作 */
	public function before_storage($value,$fieldArray) {
		//自动分页
		if ($value == 2) {
			$max_page_char = $_POST['max_page_char'];
			$value = "$value|$max_page_char";
		}else {
			$value = "$value|";
		}
		return $value;
	}

	/* 得到字段默认长度 */
	public function getFieldLen() {
		return 10;
	}

	/* 系统内置字段样式 */
	protected function internal($value) {}


}
?>