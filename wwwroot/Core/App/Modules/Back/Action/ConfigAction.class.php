<?php
/**
 * 系统配置控制器
 * @author CHENG
 * 常用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class ConfigAction extends GlobalAction {
	
	private $group = null;
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('SysConfig');
		$group = $this->checkData('group','GET',false);
		$this->group = $group ? $group : 'site';
		$this->assign('group',$this->group);
	}
	
	//添加新设置
	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			// 		检查惟一性
			$status =  $this->model->checkUnique($postData);
			if ($status && $status['var_group'] != 'debug') $this->error('该参数名称已被占用！！！');
			$this->addPublicMsg($this->model->addData($postData),'',U('add'));
		} else {
			$this->display();
		}
	}
	
	public function index() {
		if (IS_POST) {
			$this->editPublicMsg($this->model->editData(),'',U('index',array('group'=>$_POST['var_group'])));
		} else {
			$paramsData = $this->model->where("var_group='{$this->group}'")->order('sort ASC,id ASC')->select();
			$this->assign('paramsData',$paramsData);
			$this->display();
		}
	}
	
	public function delete() {
		// 		判断提交方式
		$this->deletePublicMsg($this->model->deleteData($this->checkData('id')));
	}
}
?>