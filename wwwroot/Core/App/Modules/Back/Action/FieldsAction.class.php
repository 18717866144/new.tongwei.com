<?php
/**
 * 字段管理控制器
 * @author CHENG
 * 常用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class FieldsAction extends GlobalAction {
	private $mid;
	private $current_model;
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('ModelsFields');
		$this->mid = $this->checkData('mid','GET',true);
		$this->current_model = F("models_{$this->mid}");
		if (!$this->current_model) {$this->error('模型缓存数据不存在，请先更新缓存！');}
		
	}
	
	public function index() {
		$className = ucfirst($this->current_model['model_type']).'Models';
		require REQUIRE_PATH."Models/$className.class.php";
		$this->assign('not_delete',eval("return $className::\$notAllowedField;"));
		$this->assign('modelField',$this->model->where("mid='{$this->mid}'")->order('sort DESC,id ASC')->select());
		$this->display();
	}
	
	public function add() {
		if (IS_POST) {
			$this->matchToken($this->mid.$_POST['mid']);
			/* 数据过滤，注意不能开启html和php的过滤 */
			$postData = $this->model->checkData('add');
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 模型判断 */
			if ($this->current_model['model_type'] == 'content') {
				/* 判断是主表还是附加表添加的字段 */	
				$tableName = $postData['setting']['is_system']==1 ? $this->current_model['table_name'] : $this->current_model['table_name'].'_data';
			}else {
				$postData['setting']['is_system']==1;
				$tableName = $this->current_model['table_name'];
			}
			/* 根据字段设置临时更改字段类型，否则使用字段配置文件配置的类型 */
			$fieldType = isset($postData['setting']['field_type']) ? $postData['setting']['field_type'] : $postData['form_type'];
			/* 字段长度为空，那么取出默认字段长度 */
			if (empty($postData['field_len']) || !isset($postData['field_len'])) {
				require REQUIRE_PATH.'Fields/Field.class.php';
				$form_type = ucfirst($postData['form_type']);
				require REQUIRE_PATH."Fields/$form_type.class.php";
				$formClass = new $form_type();
				$formClass->setting = $postData['setting'];
				$postData['field_len'] = call_user_func_array(array($formClass,'getFieldLen'),array());
			}
			/* 添加数据 */
			$insertId = $this->model->addData($postData);
			if ($insertId) {
				$status = $this->model->saveField($fieldType,$tableName,$postData);
				$status === false ? $this->model->where("id=$insertId")->delete() : $status = true;
				$this->addPublicMsg($status,'成功添加字段，请及时更新模型字段缓存！',U('Back/Fields/index',array('mid'=>$postData['mid'])));
			}else {
				$this->addPublicMsg(false);
			}
		}else {
			/* 内容模型中是否是独立模型绑定is_system为系统 */
			$this->assign('bindSystem',isset($this->current_model['setting']['is_alone']) && $this->current_model['setting']['is_alone']==2 ? false : true );
			/* 拿出字段信息 */
			$className = ucfirst($this->current_model['model_type']).'Models';
			require REQUIRE_PATH."Models/$className.class.php";
			$this->assign('fieldsArray',eval("return $className::\$field;"));
			$this->encryptToken($this->current_model['id'].$this->current_model['id']);
			$this->display();
		}
	}
	
	/* 编辑 */
	public function edit() {
		if (IS_POST) {
			/* token安全值 */
			$this->matchToken($_POST['id'].$this->mid);
			/* 数据过滤，注意不能开启html和php的过滤 */
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 重新设置，不允许设置的属性 */
			$oldData = $this->findOneData($postData['id']);
			$oldData['setting'] = json_decode($oldData['field_setting'],true);
			$postData['setting']['is_system'] = $oldData['setting']['is_system'];
			$postData['field_name'] = $oldData['field_name'];
			$postData['form_type'] = $oldData['form_type'];
			/* 模型判断和设置 */
			if ($this->current_model['model_type'] == 'content') {
				//判断是主表还是附加表添加的字段
				$tableName = $postData['setting']['is_system']==1 ? $this->current_model['table_name'] : $this->current_model['table_name'].'_data';
			}else {
				$postData['setting']['is_system']==1;
				$tableName = $this->current_model['table_name'];
			}
			/* 根据字段设置临时更改字段类型，否则使用字段配置文件配置的类型 */
			$fieldType = isset($postData['setting']['field_type']) ? $postData['setting']['field_type'] : $postData['form_type'];
			/* 字段长度为空，设置默认字段长度 */
			if (empty($postData['field_len']) || !isset($postData['field_len'])) {
				require REQUIRE_PATH.'Fields/Field.class.php';
				$form_type = ucfirst($postData['form_type']);
				require REQUIRE_PATH."Fields/$form_type.class.php";
				$formClass = new $form_type();
				$formClass->setting = $postData['setting'];
				$postData['field_len'] = call_user_func_array(array($formClass,'getFieldLen'),array());
			}
			/* 修改字段信息 */
			$status = $this->model->saveField($fieldType,$tableName,$postData,'MODIFY');
			if($status !== false) {
				$status = $this->model->editData($postData);
				$this->editPublicMsg($status,'成功修改字段，请及时更新模型字段缓存！',U('index',array('mid'=>$this->mid)));
			} else {
				$this->editPublicMsg(false);
			}
		}else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			/* 拿出字段信息 */
			$className = ucfirst($this->current_model['model_type']).'Models';
			require REQUIRE_PATH."Models/$className.class.php";
			$this->assign('fieldsArray',eval("return $className::\$field;"));
			/* 字段模板 */
			$fieldTpl = str_replace(TMPL_PATH."Fields/{$current['form_type']}/", '', glob(TMPL_PATH."Fields/{$current['form_type']}/*.php"));
			/* 字段配置 */
			$setting = json_decode($current['field_setting'],true);
			ob_start();
			require REQUIRE_PATH."Fields/setting/{$current['form_type']}.php";
			$data_setting = ob_get_clean();
			$this->encryptToken($id.$this->mid);
			$this->assign('data_setting',$data_setting);
			
			$this->assign('setting',$setting);
			$this->display();
		}
	}
	
	/* 删除 */
	public function delete() {
		$id = $this->checkData('id');
		$fieldArray = $this->model->where("id IN($id)")->field('id,field_name,field_setting')->select();
		/* 查出不允许删除的字段 */
		$className = ucfirst($this->current_model['model_type']).'Models';
		require REQUIRE_PATH."Models/$className.class.php";
		//删除数据字段
		$drop_str = '';
		$status = true;
		foreach ($fieldArray as $values) {
			if (in_array($values['field_name'],eval("return $className::\$notAllowedField;"),true)) continue;//去除不允许删除的字段
			$field_setting = json_decode($values['field_setting'],true);
			if ($field_setting['is_system']==1) {
				$temp_status = $this->model->execute("ALTER TABLE `".DB_PREFIX."{$this->current_model['table_name']}` DROP `{$values['field_name']}`");
			}else {
				$this->model->execute("ALTER TABLE `".DB_PREFIX."{$this->current_model['table_name']}_data` DROP `{$values['field_name']}`");
			}
			$this->model->where("id={$values['id']}")->delete();
			if ($temp_status === false) $status = false;
		}
		$this->deletePublicMsg($status,'成功删除字段，请及时更新模型字段缓存！',U('index',array('mid'=>$this->mid)));
	}
	
}
?>