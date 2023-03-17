<?php
/**
 * 内容类型处理器
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class TypeAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('ContentType');
	}
	
	public function index() {
		//获取模型
		$models = $this->getModels();
		//获取导航
		$navigate = $this->getNavigate();
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$typeData = $this->model->getField('id,pid,model_id,navi_id,type_name,t_status');
		foreach ($typeData as &$values) {
			$values['model_name'] = $models[$values['model_id']];
			$values['navigate_name'] = $navigate[$values['navi_id']] ? $navigate[$values['navi_id']] : '无导航限制';
			$values['str_manage'] = '';
// 			只有频道页可以添加子导航
			$values['str_manage'] .= '<a href="' .U('add',array('pid'=>$values['id'])). '" class="operate">添加子类型</a>&nbsp;&nbsp;';
			$values['str_manage'] .= '<a class="operate" href="'.U('edit',array('id'=>$values['id'])).'">编辑</a>&nbsp;&nbsp;<a class="operate" onclick="(_confirm(\'是否确定要删除？\',function(){location.href=\''.U('delete',array('id'=>$values['id'])).'\'}))" href="javascript:;">删除</a>';
			$values['t_status_name'] = $values['t_status']==1 ? '√' : '<span style="color:red;">╳</span>';
		}
		$str = "<tr>
	<td><input type='checkbox' name='id_all[]' value='\$id' /></td>
	<td>\$id</td>
	<td style='text-align:left;text-indent:10px;'>\$spacer\$type_name</td>
	<td>\$model_name</td>
	<td>\$navigate_name</td>
	<td>\$t_status_name</td>
	<td align='center' >\$str_manage</td>
	</tr>";
		$tree->init($typeData);
		$this->assign("type_tree", $tree->get_tree(0, $str));
		$this->display();
	}

	
	public function add() {
		if (IS_POST) {
			/* 数据验证 */
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 添加 */
			$status = $this->model->addData($postData);
			$this->addPublicMsg($status);
		} else {
			/* 获取类型树 */
			$this->getTypeTree(intval($_GET['pid']));
			/* 得到模型 */
			$this->getModels();
			/* 得到导航 */
			$this->getNavigate();
			$this->display();
		}
	}
	
	public function edit() {
		if (IS_POST) {
			/* 数据验证 */
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			/* 添加 */
			$status = $this->model->editData($postData);
			$this->editPublicMsg($status);
		} else {
			$id = $this->checkData('id');
			$current = $this->findOneData($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			/* 获取类型树 */
			$this->getTypeTree($current['pid']);
			/* 得到模型 */
			$this->getModels();
			/* 得到导航 */
			$this->getNavigate($current['navi_id']);
			$this->display();
		}
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->delete();
		$this->deletePublicMsg($status);
	}
	
	/* 得到指定条件类型树 */
	private function getTypeTree($pid = '') {
		$typeData = $this->model->select();
		foreach ($typeData as &$values) {
			$values['selected'] = $values['id'] == $pid ? 'selected="selected"' : '';
		}
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$str = "<option value='\$id' \$selected>\$spacer \$type_name</option>";//\$selected
		$tree->init($typeData);
		$this->assign('type_tree',$tree->get_tree(0, $str));
	}
	
	/* 得到内容模型并分配  */
	private function getModels() {
		//内容模型
		$models = $this->model->table(DB_PREFIX.'models')->where("model_type='content'")->getField('id,model_name');
		$this->assign('models',$models);
		return $models;
	}
	/* 得到导航并分配  */
	private function getNavigate($navi_id = 0) {
		$navigate = F('navigate');
		foreach ($navigate as &$values) {
			$values['disabled'] =  ($values['n_type'] != 1 || $values['is_channel'] == 1) ? 'disabled="disabled"' : '';
			$values['selected'] = $values['id'] == $navi_id ? 'selected="selected"' : '';
		}
		$tree = new Tree();
		$tree->icon = array('&nbsp;&nbsp;│ ', '&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		$str = "<option value='\$id' \$disabled \$selected>\$spacer \$navigate_name</option>";//\$selected
		$tree->init($navigate);
		$this->assign('navigate',$tree->get_tree(0, $str));
		return $navigate;
	}
}
?>