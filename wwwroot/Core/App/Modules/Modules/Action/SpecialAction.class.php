<?php
/**
 * 链接模块
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class SpecialAction extends GlobalAction {	
	protected $specialConfig = NULL;
	protected $special = array();
	protected $specialid = 0;
	protected $typeid = NULL;
	protected $typename = '';
	protected $type = array();
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Special');
		$this->model_content = D('SpecialContent');
		$this->model_type = D('SpecialType');

		$resspecialtype = $this->model_type->select();
		$this->assign('spectype',$resspecialtype);

		
		if( ! in_array(ACTION_NAME, array('index')) ){
			$this->specialid = I('specialid',0,'intval');			
			if(!$this->specialid) $this->error('地址有误');
			$this->special = $this->_special($this->specialid);			
			if(!$this->special) $this->error('不存在的专题');
			
			$this->typeid = I('typeid',0,'intval');		
			$this->assign('typeid',$this->typeid);
			
			$this->type = $this->special['setting']['type'];
			$this->typename = $this->type[$this->typeid]['name'];
			
			$this->assign('type', $this->type);
			$this->assign('typename', $this->typename);			
			$this->assign('specialid',$this->specialid);
			$this->assign('special',$this->special);
			$currentData['title'] = $this->special['title'];
			$this->assign('currentData',$currentData);
		}
		//专题模块配置文件
		$configFile = APP_PATH.'Modules/Modules/Conf/Special/Config.php';

		if(file_exists($configFile)){
			$this->specialConfig = require $configFile;
		}
		//传参数到模板文件		
		$this->assign('specialConfig',$this->specialConfig);
	}
	
	protected function _special($id) {
		$current = $this->findOneData($id);
		$current['setting'] = json_decode($current['setting'],true);
		return $current;
	}
	
	/**
	* 首页
	*/
	public function index() {
			
		$tpl = 'Special/index.php';
		
		//var_dump($_GET);exit;
		
		$tpl = $this->getTpl($tpl);

		$this->display($tpl);
	}
	
	/**
	* 专题页
	*/	
	public function special() {
		if($this->special['l_status']!=1 && $_GET['test']!=888) $this->error('专题未启用');		
		$tpl = 'Special/'.($this->special['setting']['dir_tpl']?'extend/'.$this->special['setting']['dir_tpl'].'/':'').'index/' . $this->special['setting']['index_tpl'];
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);

	}
		
	/**
	* 专题内容或分类的列表
	*/
	public function lists() {
		
		$map  = array();
		$map['specialid'] = $this->specialid;
		$map['a_status'] = 1;
		$num = $this->special['setting']['page_num'];
		if($this->typeid){
			$map['typeid'] = $this->typeid;
			$num = $this->type[$this->typeid]['page_num'];
		}
		$num = $num?$num:20;
		
		$page = I('p',0,'intval');		
		$total = $this->model_content->where($map)->count();
		$list = M('specialContent')->where($map)->order('sort desc,id desc')->page("{$page},{$num}")->select();		
		
		import("ORG.Util.Page");
		$Pages = new Page($total, U('modules/special/lists',array('specialid'=>$this->specialid,'typeid'=>$this->typeid, 'p'=>'{PAGE}')), $num, 'p');
		$show = $Pages->show('first','prev','list','next','last');
	
		$this->assign('list',$list);
		$this->assign('pages',$show);
		
		if($this->typeid){
			$tpl = 'Special/'.($this->special['setting']['dir_tpl']?'extend/'.$this->special['setting']['dir_tpl'].'/':'').'list/' . $this->special['setting']['type'][$this->typeid]['list_tpl'];
		}else{
			$tpl = 'Special/'.($this->special['setting']['dir_tpl']?'extend/'.$this->special['setting']['dir_tpl'].'/':'').'list/' . $this->special['setting']['list_tpl'];
		}		
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	/**
	* 专题内容页
	*/
	public function show() {
		$id = I('id',0,'intval');
		if(!$id) $this->error();		
		$map = array();
		$map['specialid'] = $this->specialid;
		$map['id'] = $id;
		$map['a_status'] = 1;		
		$content = $this->model_content->where($map)->find();
		$this->assign('currentData',$content);
		$this->assign('typeid',$content['typeid']);
		$tpl = 'Special/'.($this->special['setting']['dir_tpl']?'extend/'.$this->special['setting']['dir_tpl'].'/':'').'show/' . $this->special['setting']['show_tpl'];
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
		
	public function u_f() {
		exit;
		$field = $this->checkData('f');//需要更新字段
		$tableName = DB_PREFIX.$this->currentModel['table_name'];
		// $this->writeLog($tableName);
		// var_dump($field);
		$this->ajaxReturn($field,$field,$field);
		if (IS_POST) {
			if (!IS_AJAX) {
				$this->writeLog("此用户恶意通过非法方式访问Content->index->u_f方法", 'USER_ERROR');
				$this->error(C('NOT_AJAX'));
			}
			$step = $this->checkData('sp','',false);//每次更新步长
			$stype = $this->checkData('st','',false);//每次更新类型
			$cacheName = $this->checkData('cn','',false);//是否需要缓存，有值，则传入缓存名
			/* 更新字段 */
			$setting = array('specialid'=>$this->specialid,'id'=>$this->id);
			$status = $this->model->incDecField($field,$this->currentModel,$setting,$step,$stype,$cacheName);
			/* 状态返回 */
			// $status ? $this->ajaxReturn('','','success') : $this->ajaxReturn('','系统出错！','error');
		} else {
			$field = $this->model->table($tableName)->where("id={$this->aid}")->limit(1)->getField($field);
			//会慢一拍
			echo "document.write('$field')";
		}
	}
}
?>