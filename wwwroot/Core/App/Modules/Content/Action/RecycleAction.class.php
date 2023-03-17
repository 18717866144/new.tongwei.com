<?php
/**
 * 内容回收站
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class RecycleAction extends GlobalAction {
	
	private $mid = 0;
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->mid = $this->checkData('mid','GET',false);
		if (!$this->mid && ACTION_NAME !='index') {
			$this->error(C('PARAM_MISSING'));
		} else {
			if ($this->mid) {
				$this->currentModel = F("models_{$this->mid}");
			}
		}
		$this->model = D('Contents');
	}
	
	public function index() {
		$this->assign('models',$this->model->table(DB_PREFIX.'models')->where("model_type='content'")->getField('id,model_name'));
		if (!$this->mid) {
			$tpl = 'index';
		} else {
			$data = $this->model->recyclePage($this->currentModel);
			$this->assign('data',$data);
			$tpl = 'list';
		}
		$this->display($tpl);
	}
	
 	/* 数据还原 */
	public function revert() {
		$id = $this->checkData('id');
		$status = $this->model->table(DB_PREFIX.$this->currentModel['table_name'])->where("id IN($id)")->setField('is_delete',1);
		$status ? $this->success('已成功还原数据！') : $this->error('数据还原失败！');
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$status = $this->model->table(DB_PREFIX.$this->currentModel['table_name'])->where("id IN($id)")->delete();
		$this->deletePublicMsg($status,'',U('index',array('mid'=>$this->mid)));
	}
}
?>