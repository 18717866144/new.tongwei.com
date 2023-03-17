<?php
/**
 * 内容操作模型
 */
class PaperlistAction extends GlobalAction {
	protected $model;
	protected $pid;
	protected $paper;
	protected $modelPaperLayout;
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();		
		$this->model = D('PaperList');		
		$this->modelPaperLayout = D('PaperLayout');		
		$this->pid = I('pid');
		$this->assign('pid', $this->pid);
		if(!$this->pid){
			$this->error('报纸类别有误',U('Paper/index'));
		}
		$this->paper = D('Paper')->find($this->pid);
		$this->assign('paper', $this->paper);		
		
	}
	
	public function index(){		
		$data = $this->model->page();		
		$this->assign('data', $data);
		$this->display();
	}
	
	public function add() {		
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->addData($postData);
			$this->addPublicMsg($status, '', U('index?pid='.$this->pid));
		}else {
			$this->display();
		}
	}
	
	public function edit(){
		if (IS_POST) {
			$postData = $this->model->checkData();			
			if (!$postData['vail_status']) parent::error($postData['vail_info']);
			parent::editPublicMsg($this->model->editData($postData), '', U('index?pid='.$this->pid));
		}else {
			$id = $this->checkData('id');
			$current = $this->model->find($id);
			$current ? $this->assign('current',$current) : $this->error(C('FIND_ERROR'));
			$this->display('add');
		}
	}
	
	public function layoutlist(){
		$lid = I('lid');
		$paperList = $this->model->find($lid);
		$this->assign('paperList',  $paperList);
		$this->assign('lid',  $lid);
		
		$paperLayoutList = $this->modelPaperLayout->where( array('pid'=>$this->pid, 'lid'=>$lid) )->select();
		$this->assign('paperLayoutList',  $paperLayoutList);
		
		$this->display();
	}
	
	public function layout(){
		$lid = I('lid');
		$paperList = $this->model->find($lid);
		$this->assign('paperList',  $paperList);
		$this->assign('lid',  $lid);
		if(IS_POST){
			$postData = $this->modelPaperLayout->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->modelPaperLayout->saveData($postData);
			
			if($status){
				$this->success('操作成功', U('layout?pid='.$this->pid.'&lid='.$lid) );				
			}else{				
				$this->error('操作失败');		
			}	
			
		}else{			
			$id = I('id');
			if($id){
				$current = $this->modelPaperLayout->find($id);
				$this->assign('current', $current);
			}
			$this->display();
		}		
	}
	
	public function content_all(){
		$pid = $this->pid;
		$lid = I('lid');		
		$layoutid = I('layoutid');
		$this->assign('pid',$pid);
		$this->assign('lid',$lid);
		$this->assign('layoutid',$layoutid);		
		$paperLists = $this->model->where( array('pid'=>$pid) )->order('id desc')->limit(40)->select();
		$paperList = $this->model->find($lid);		
	
		$layouts_tmp = $this->modelPaperLayout->where( array('lid'=>$lid,'pid'=>$pid) )->order('id asc')->select();
						
		$layouts = array();
		$prev = array();
		$next = array();
		
		foreach($layouts_tmp as $k=>$v){			
			$v['url'] = '/paper/'.$pid.'/'.$lid.'?layoutid='.($k+1);
			$layouts[$v['id']] = $v;
		}
				
		$data = D('PaperContent')->page();	
		
		$a_status = array('1'=>'已审核','2'=>'<font style="color:red">未审核</a>','3'=>'<font style="color:green">未通过</a>');
		
		$this->assign('data',$data);
		$this->assign('paperLists', $paperLists);
		$this->assign('paperList', $paperList);
		$this->assign('layouts', $layouts);
		$this->display();
	}
	
	public function content(){
		$lid = I('lid');
		$paperList = $this->model->find($lid);
		$this->assign('paperList',  $paperList);
		$this->assign('lid',  $lid);
		$id = I('id');
		$current = $this->modelPaperLayout->find($id);
		$this->assign('id', $id);	
		$this->assign('current', $current);				
		$this->display();		
	}
	
	public function savearea(){
		if(!IS_POST) return;
		
		$pid = $this->pid;
		$lid = I('post.lid');
		$id = I('post.layoutid');
		$areaMapInfo = I('post.areaMapInfo');
		$areaTitle = I('post.areaTitle');
		$areaLink = I('post.areaLink');
		$contentId = I('post.contentId');		
		$content = array();		
		foreach($areaMapInfo as $k=>$v){
			$content[] = array(				
				'areaTitle' => $areaTitle[$k],
				'areaLink' => $areaLink[$k],
				'contentId' => $contentId[$k],
				'areaMapInfo' => $v,
			);
		}

		$data = array(
			'content'=>json_encode($content),
			'contentids'=>implode(',', $contentId),
		);
		$re = $this->modelPaperLayout->where(array('id'=>$id))->save( $data );
		if($re){
			$this->success('保存成功');		
		}else{			
			$this->error('保存失败');
		}
	}
	
	public function content_add(){
		$this->model = D('PaperContent');
		//取得专题内容模型数据
		$d = M('models')->where("model_type='paper'")->find();
		$this->currentModel = F("models_{$d['id']}");
		
		$lid = I('lid');
		$this->assign('lid', $lid);
		
		$layoutid = I('layoutid');
		$this->assign('layoutid', $layoutid);
		
		$area = I('area');
		$this->assign('area', $area);
		
		if(IS_POST) {
		
			$info = I('post.info');			
			$this->matchToken($this->pid);		
			$insertId = $this->modelAddPost();
			
			$title = $info['title'];
			$this->assign('title', $title);
			
			$url = '/paper/content/'.$insertId.'.html';
			$this->assign('url', $url);
			
			if($insertId){			
				$this->assign('actionname', '添加');
				$this->assign('id', $insertId);
				$this->display('content_add_success');				
			}else{
				$this->error('添加失败');			
			}
			//$this->addPublicMsg($insertId,'',U('content_list',array('specialid'=>$specialid)));
		}else{			
						
			$this->modelAddDisplay();			
			$this->encryptToken($this->pid);
			$this->display();
		}
	}
	
	
	public function content_edit(){
		$this->model = D('PaperContent');
		//取得专题内容模型数据
		$d = M('models')->where("model_type='paper'")->find();
		$this->currentModel = F("models_{$d['id']}");
		
		$lid = I('lid');
		$this->assign('lid', $lid);
		
		$layoutid = I('layoutid');
		$this->assign('layoutid', $layoutid);
		
		$area = I('area');
		$this->assign('area', $area);
		$id = $this->checkData('id');
		
		if(IS_POST) {		
			$info = I('post.info');			
			$this->matchToken($this->pid);		
			$re = $this->modelEditPost();				
			$title = $info['title'];
			$this->assign('title', $title);			
			$url = '/paper/content/'.$id.'.html';
			$this->assign('url', $url);			
			if($re){			
				$this->assign('actionname', '修改');
				$this->assign('id', $id);
				$this->display('content_add_success');				
			}else{
				$this->error('编辑失败');
			}
			//$this->addPublicMsg($insertId,'',U('content_list',array('specialid'=>$specialid)));
		}else{			
						
			$current = $this->modelEditDisplay();						
			$this->encryptToken($this->pid);
			$this->display('content_add');
		}
	}
	
	public function content_delete(){
		if(!IS_POST) return;
		
		$pid = $this->pid;
		//$this->model = D('PaperContent');
		//取得专题内容模型数据
		$d = M('models')->where("model_type='paper'")->find();
		$this->currentModel = F("models_{$d['id']}");

		$lid = I('lid');
		$this->assign('lid', $lid);

		$layoutid = I('layoutid');
		$this->assign('layoutid', $layoutid);

		$area = I('area');
		$this->assign('area', $area);
		$id = $this->checkData('id');
		
		$re = D('PaperContent')->where( array('id'=>$id,'pid'=>$pid,'lid'=>$lid,'layoutid'=>$layoutid) )->delete();
		
		if($re){			
			$this->assign('actionname', '修改');
			$this->assign('id', $id);
			$this->success('删除成功');	
			//$this->display('content_add_success');				
		}else{
			$this->error('删除失败');
		}
		//$this->addPublicMsg($insertId,'',U('content_list',array('specialid'=>$specialid)));

	}
	
	/* 内容选择 */
	public function content_select() {	
		
		$pid = $this->pid;
		$lid = I('lid');
		
		$layoutid = I('layoutid');
		$this->assign('pid',$pid);
		$this->assign('lid',$lid);
		$this->assign('layoutid',$layoutid);
		
		$paperLists = $this->model->where( array('pid'=>$pid) )->order('id desc')->limit(20)->select();
		$layouts = $this->modelPaperLayout->where( array('lid'=>$lid) )->select();

		$data = D('PaperContent')->page();		
		$this->assign('data',$data);

		$this->assign('paperLists', $paperLists);
		$this->assign('layouts', $layouts);
		$this->display();
		
	}
	

/* 重置模型数据 */
	protected function modelModelData($current) {
		//标题重构
		$current['title'] = array('title'=>$current['title'],'style'=>$current['style']);
		//外部链接
		$current['is_link'] = $current['is_link']==1 ? array('is_link'=>$current['is_link'],'url'=>$current['url']) : array('is_link'=>$current['is_link']);
		$current['source'] = array('source'=>$current['source'], 'source_pic'=>$current['source_pic']);
		
// 		关联数据
		$relevant_value = $current['relevant'];
		$current['relevant'] = array();
		$current['relevant']['value'] = $relevant_value;
		$relevant = trim($relevant_value,',');
		if($relevant) $current['relevant']['relevant_title'] = $this->model->findRelevantData($relevant,$this->currentModel);
		return $current;
	}	
}
