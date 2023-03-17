<?php
/**
 * 下载详情展示
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class DowndetailsAction extends GlobalAction {

	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('DownDetails');
	}
	
	public function index() {
		$pageData = $this->model->downPage();
		$this->assign('data',$pageData);
		$this->display();
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$this->deletePublicMsg($this->model->where("id IN($id)")->delete());
	}
	
}
?>