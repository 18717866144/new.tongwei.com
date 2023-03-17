<?php
/**
 * Tags模块前台显示
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class TagsindexAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Tags');
	}
	
	
	public function index() {
		$tpl = 'Content/tags/index.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	/* tags列表 */
	public function tag_list() {
		$tag = $this->checkData('tag');
		//tags加+1
		$this->model->where("tag_name='$tag'")->setInc('click',1);
		$this->assign('tag',$tag);
		$tpl = 'Content/tags/tag_list.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
}
?>
