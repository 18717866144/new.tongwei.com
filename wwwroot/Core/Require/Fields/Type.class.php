<?php
/**
 * 内容类型扩展数据字段
 * @author CHENG
 */
class Type extends Field {
	
	/* 字段显示 */
	public function show($value = '') {
		/* 判断导航类型 */
		if ($this->setting['navi_id'] == 0) {
			$navi_id = 0;
		} elseif ($this->setting['navi_id'] == -1) {
			$navi_id = intval($_GET['cid']);
		} else {
			$navi_id = $this->setting['navi_id'];
		}
		//模型id
		$model_id = $this->setting['model_id'];
		$typeData = M('ContentType')->where("model_id=$model_id AND navi_id=$navi_id AND t_status=1")->getField('id,pid,type_name');
		if ($typeData) {
			foreach ($typeData as &$values) {
				$values['selected'] = $values['id'] == $value ? 'selected="selected"' : '';
			}
			$tree = new Tree();
			$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
			$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
			$str = "<option value='\$id' \$selected>\$spacer \$type_name</option>";//\$selected
			$tree->init($typeData);
			$tree_str =  $tree->get_tree(0, $str);
			$init_option = '请选择类型';
		} else {
			$init_option = '无可选类型';
			$tree_str = '';
		}
		$this->html = <<<string
		<select name="info[{$this->form['field_name']}]" {$this->form['input_attr']}>
			<option value="0">$init_option</option>
			$tree_str
		</select>
string;
		return $this->html;
	}
	
	/* 得到字段默认长度 */
	public function getFieldLen() {
		return 8;
	}

	/* 系统内置字段样式 */
	protected function internal($value) {}
}
?>