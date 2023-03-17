<?php
/**
 * Ajax异步获取数据或验证
 * 前台的Ajax验证数据则放入FrontAction 中，为了实现二级域名ajax非跨域问题
 */
class AjaxAction extends GlobalAction {
	
	protected function _initialize() {
		//if (!IS_AJAX) $this->error(C('NOT_AJAX'));
		parent::_initialize();
	}
	
	/* 得到会员信息 */
	public function get_member_info() {
		$uid = $this->checkData('uid');
		$data = M('Member')->where("id IN($uid)")->cache(true,3600)->field('id,username,nickname,picture_path,home_url')->select();
		$this->ajaxReturn(array('status'=>'success','data'=>$data));
	}
	
	public function region() {
		$id = I('id');
		if(!preg_match('/\d+/',$id)) echo 0;
		$data = M('Region')->where(array('id'=>$id))->find();
		$data['typeid_'.$data['typeid']] = $data;
		$i = $data['typeid'] - 1;
		$d['pid']  = $data['pid'];
		for($i;$i>=0;$i--){
			$pid = $d['pid'];
			$d = M('Region')->where(array('id'=>$pid))->find();
			$data['typeid_'.$i] = $d;
		}
		//print_r($data);exit;	
		$this->ajaxReturn(array('status'=>'success','data'=>$data));
	}	
}
?>