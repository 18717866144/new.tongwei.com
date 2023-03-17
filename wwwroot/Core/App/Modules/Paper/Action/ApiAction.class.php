<?php
/**
 * 报刊展示
 */
class ApiAction extends GlobalAction {
	protected $model;
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Paper');
		$this->model_list = D('PaperList');
		$this->model_layout = D('PaperLayout');
		//if(!IS_POST) return;
	}
	
	public function getPaperYear(){
		$pid = I('pid');		
		$year = I('year',0,'intval');		
		$year = $year?$year:date('Y',NOW_TIME);
		$start_time = strtotime($year.'-01-01 00:00:00');		
		$end_time = strtotime($year.'-12-31 23:59:59');
		
		$map2 = array(
			'pid'=>$pid,
			'a_status'=>1,
			'is_delete'=>1			
		);
		
		$mintime = $this->model_list->where($map2)->order('create_time asc')->limit(1)->getField('create_time');
		$maxtime = $this->model_list->where($map2)->order('create_time desc')->limit(1)->getField('create_time');
		
		//$map2['create_time'] =  array('between',array($start_time,$end_time));
		$paperList = $this->model_list->where($map2)->order('sort desc,id desc')->limit(100)->select();
		$data = array(
			'year' => $year,
			'yearList' => array(),
			'paperList' => array(),
		);
		foreach($paperList as $k=>$v){
			$y = date('Y',$v['create_time']);
			if(!in_array($y, $data['yearList'])) $data['yearList'][] = $y;
			if($y==$year) $data['paperList'][] = $v;
		}
		
		$this->ajaxReturn($data,'',1);
	}
	
	public function index(){
		$map = array();
		$map['a_status'] = 1;
		$map['is_delete'] = 1;
		$paper = $this->model->where($map)->order('sort desc,id desc')->select();
		foreach($paper as $k=>&$v){
			$v['_list'] = $this->model_list->where( array('pid='.$v['id'].' and a_status=1 and is_delete =1') )->order('sort desc,id desc')->limit(1)->select();
		}
		$this->assign('paper', $paper);
		$tpl = $this->getTpl('Paper/index.php');
		$this->display($tpl);
	}
	
	public function lists() {
		$pid = I('pid');
		$this->assign('pid', $pid);
		
		$year = I('year',date('Y',NOW_TIME),'intval');
		$start_time = strtotime($year.'-01-01 00:00:00');
		$end_time = strtotime($year.'-12-31 23:59:59');
		$this->assign('year',$year);
		$this->assign('start_time',$start_time);
		$this->assign('end_time',$end_time);
		
		$map = array();
		$map['id'] = $pid;
		$map['a_status'] = 1;
		$map['is_delete'] = 1;		
		$paper = $this->model->where($map)->find();
		$this->assign('paper', $paper);
		
		$map2 = array(
			'pid'=>$pid,
			'a_status'=>1,
			'is_delete'=>1			
		);
		$mintime = $this->model_list->where($map2)->order('create_time asc')->limit(1)->getField('create_time');
		$maxtime = $this->model_list->where($map2)->order('create_time desc')->limit(1)->getField('create_time');
		
		$map2['create_time'] =  array('between',array($start_time,$end_time));
		$paperList = $this->model_list->where($map2)->order('sort desc,id desc')->limit(100)->select();
		
		$this->assign('maxtime',$maxtime);
		$this->assign('mintime',$mintime);
		$this->assign('paperList',$paperList);
		$tpl = $this->getTpl('Paper/list.php');
		$this->display($tpl);
	}
	
	public function layout(){
		$pid = I('get.pid');
		$lid = I('get.lid');
		$layoutid = I('get.layoutid');
		
		$layoutid = $layoutid?$layoutid:1;
				
		$layouts_tmp = $this->model_layout->where( array('lid'=>$lid,'pid'=>$pid) )->order('id asc')->select();
		
		if(!$layouts_tmp) return;
				
		$paper = $this->model->find($pid);
		$paperList = $this->model_list->find($lid);
		
		$layouts = array();
		$prev = array();
		$next = array();
		$count = count($layouts_tmp);
		
		foreach($layouts_tmp as $k=>&$v){			
			$v['url'] = '/paper/'.$pid.'/'.$lid.'/node_'.($k+1).'.html';
				//'/paper/layout?pid='.$pid.'&lid='.$lid.'&layoutid='.($k+1);
			if( ($k+1)==$layoutid){
				$layout = $v;	
				if($k==0){
					$prev = array('url'=>'javascript:;');
				}else{
					$n = $k-1;					
					$prev = $layouts_tmp[$n];
					$prev['url'] = '/paper/'.$pid.'/'.$lid.'/node_'.$k.'.html';
				}
				if($k==$count-1){
					$next = array('url'=>'javascript:;');
				}else{
					$n = $k+1;
					$next = $layouts_tmp[$n];
					$next['url'] = '/paper/'.$pid.'/'.$lid.'/node_'.($k+2).'.html';
				}
			}			
			$layouts[$v['id']] = $v;
		}
		$this->assign('pid',$pid);
		$this->assign('lid',$lid);
		$this->assign('layoutid',$layoutid);
		
		$this->assign('paper', $paper);
		$this->assign('paperList', $paperList);
		$this->assign('layouts', $layouts);
		$this->assign('layout', $layout);
		$this->assign('prev', $prev);
		$this->assign('next', $next);
		$tpl = $this->getTpl('Paper/layout.php');
		$this->display($tpl);				
	}
		
	public function content(){
		$id = I('get.id');
		if(!$id) return;
		
		$contentModel =  D('PaperContent');
		$currentData = $contentModel->where( array('a_status'=>1,'is_delete'=>1) )->find($id);
		if(!$currentData) return;
		
		$pid = 	$currentData['pid'];
		$lid = 	$currentData['lid'];
		$layoutid = $currentData['layoutid'];
				
		$layouts_tmp = $this->model_layout->where( array('lid'=>$lid,'pid'=>$pid) )->order('id asc')->select();
		
		if(!$layouts_tmp) return;
				
		$paper = $this->model->find($pid);
		$paperList = $this->model_list->find($lid);
		
		$layouts = array();
		$prev = array();
		$next = array();
		$count = count($layouts_tmp);
		
		foreach($layouts_tmp as $k=>&$v){			
			$v['url'] = '/paper/'.$pid.'/'.$lid.'/node_'.($k+1).'.html';;
			if( ($k+1)==$layoutid){
				$layout = $v;	
				if($k==0){
					$prev = array('url'=>'javascript:;');
				}else{
					$n = $k-1;					
					$prev = $layouts_tmp[$n];
					$prev['url'] = '/paper/'.$pid.'/'.$lid.'/node_'.$k.'.html';;	
				}
				if($k==$count-1){
					$next = array('url'=>'javascript:;');
				}else{
					$n = $k+1;
					$next = $layouts_tmp[$n];
					$next['url'] = '/paper/'.$pid.'/'.$lid.'/node_'.($k+2).'.html';;
				}
			}			
			$layouts[$v['id']] = $v;
		}
		
		$this->assign('pid',$pid);
		$this->assign('lid',$lid);
		$this->assign('layoutid',$layoutid);
		
		$this->assign('paper', $paper);
		$this->assign('paperList', $paperList);
		$this->assign('layouts', $layouts);
		$this->assign('layout', $layout);
		$this->assign('prev', $prev);
		$this->assign('next', $next);
		
		$this->assign('currentData',$currentData);
		$tpl = $this->getTpl('Paper/content.php');
		$this->display($tpl);
	}
	
	protected function getLayouts($pid, $lid){
		
	} 
}
