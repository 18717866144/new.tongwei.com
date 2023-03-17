<?php
/**
 * Tags模块，TagsModel，系统公共调用模型
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class TagsAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Tags');
	}
	
	public function index() {
		$tagsData = $this->model->tagsPage();
		$this->assign('tagsData',$tagsData);
		$this->display();
	}
	
	public function config() {
		$filePath = APP_PATH.'Modules/Modules/Conf/Tags/Config.php';
		if (IS_POST) {
			ob_start();
			unset($_POST['send']);
			var_export($_POST);
			$contents = ob_get_contents();
			ob_clean();
			$status = file_put_contents($filePath, "<?php\r\nreturn $contents;\r\n");
			$status ? $this->success('成功更改配置！') : $this->error('配置更改失败！'); 
		} else {
			if (file_exists($filePath)) {
				$setting = require $filePath;
				$this->assign('setting',$setting);
			} 
			$this->display();
		}
	}

	public function edit() {
		if (IS_POST) {
			$postData = Tool::filterData($_POST);
			$postData = ValiData::_vail()->_check(array(
				'style'=>array('a|s1-20','样式状态码格式不正确！'),
				'click'=>array('a|n1-8','点击数格式不正确！'),
			), $postData);	
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->where("id={$postData['id']}")->save($postData);
			$this->editPublicMsg($status);
		}else {
			$id = $this->checkData('id');
			$current = $this->model->where("id=$id")->find();
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display();
		}
	}

	public function delete() {
		$id = $this->checkData('id');
		$tag_names = $this->model->where("id IN($id)")->getField('tag_name',true);
		$status = $this->model->where("id IN($id)")->delete();
		if ($status) {
			$tag_names_string = '\''.implode('\',\'', $tag_names).'\'';
			$this->model->table(C('DB_PREFIX').'tags_list')->where("tag_name IN($tag_names_string)")->delete();
		}
		$this->deletePublicMsg($status);
	}

}
?>