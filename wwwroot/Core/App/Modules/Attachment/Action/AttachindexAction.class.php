<?php
/**
 * 附件后台列表
 * @author CHENG
 *
 */
class AttachindexAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Attachment');
	}
	
	/* 附件列表 */
	public function index() {
		$attachData = $this->model->attachmentPage();
		$this->assign('attachData',$attachData);
		$this->display();
	}
	
	public function ajax(){		
		$attachData = $this->model->attachmentPage();
		$this->ajaxReturn($attachData,'ok',1);
	}
	
	/* 附件清理 */
	public function clear() {
		if (isset($_GET['table'])) {
			if ($_GET['table'] == 'over') $this->redirect('clear',array(),2,'全部数据清理完成！');
			$tableArray = explode(',', $_GET['table']);
			$preg = intval($_GET['preg']);
			$currentTable = (isset($_GET['current_table'])&&!empty($_GET['current_table'])) ? $_GET['current_table'] : array_shift($tableArray);
			
			$total = (isset($_GET['total'])&&!empty($_GET['total'])) ? intval($_GET['total']) : $this->model->where("related_table='$currentTable' AND is_ueditor=$preg")->count(1);
			$limit = intval($_GET['limit']);
			$startLimit = (!isset($_GET['s_limit']) || empty($_GET['s_limit'])) ? 0 : $_GET['s_limit'];
			$fieldArray = $this->model->where("related_table='$currentTable' AND is_ueditor=$preg")->order('id ASC')->limit("$startLimit,$limit")->getField('file_path',true);
			if ($fieldArray) {
				foreach ($fieldArray as $value) {
					if ($preg==2) {
						$result = $this->model->table(DB_PREFIX.$currentTable)->where("{$_GET['field']}='$value'")->find();
					} else {
						$result = $this->model->table(DB_PREFIX.$currentTable)->where("{$_GET['field']} LIKE '%$value%'")->find();
					}
					if (!$result) {
						$a_key = sha1($value);
						$this->model->where("a_key='$a_key'")->find();
						@unlink(__PATH__.$value);
						@unlink(__PATH__.dirname($value).'/small_'.basename($value));
						$this->model->where("a_key='$a_key'")->delete();
					}
				}
				$startLimit = $startLimit+$limit;
				$BFB = round($startLimit/$total,2)*100;
				$info = '数据表<font color="red">'.$currentTable.'</font>已更新'.$BFB.'%';
				$tableArray = implode(',', $tableArray);
			} else {
				$startLimit = '';
				$total = '';
				$BFB = '';
				$info = '数据表<font color="red">'.$currentTable.'</font>已更新完成，正准备更新下一数据表';
				$currentTable = '';
				$tableArray = $tableArray ? implode(',', $tableArray) : 'over';
			}
			$this->redirect('clear',array('total'=>$total,'s_limit'=>$startLimit,'limit'=>$limit,'current_table'=>$currentTable,'table'=>$tableArray,'preg'=>$_GET['preg']),2,$info);
		} else {
			//拿出关联表
			$tableGroup = $this->model->group('related_table')->getField('related_table',true);
			$this->assign('table',$tableGroup);
			$this->display();
		}
	}
	
	/* 删除附件 */
	public function delete() {
		$id = $this->checkData('id');
		$data = $this->model->where("id IN($id)")->getField('file_path',true);
		if (!$data) $this->error(C('FIND_ERROR'));
		$status = $this->model->where("id IN($id)")->delete();
		if ($status) {
			foreach ($data as $value) {
				unlink(__PATH__.$value);
				unlink(__PATH__.dirname($value).'/small_'.basename($value));
			}
		}
		$this->deletePublicMsg($status);
	}
	
}
?>