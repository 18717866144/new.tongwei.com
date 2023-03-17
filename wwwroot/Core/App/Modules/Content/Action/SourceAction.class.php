<?php
/**
 * 内容模型来源设置
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class SourceAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = M('Source');
	}
	
// 	列表
	public function index() {
		$source = $this->model->getField('id,source,source_pic');
		$this->assign('source',$source);
		$this->display();
	}
// 	删除
	public function delete() {
		$id = $this->checkData('id','GET');
		$status = $this->model->where("id=$id")->delete();
		if ($status) {
			$this->success('删除数据成功！');
		}else{		
			$this->success('删除数据失败！');
		}
	}
// 	添加
	public function add() {
		$postData = Tool::filterData($_POST);
		$postData['source_pic'] = explode('|',$postData['source_pic']);
		$postData['source_pic'] = $postData['source_pic'][0];
		$status = $this->model->add( array('source'=>$postData['source'],'source_pic'=>$postData['source_pic']) );
		if ($status) {
			$this->success('添加数据成功！');
		}else{		
			$this->success('添加数据失败！');
		}
	}
}
?>