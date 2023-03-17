<?php

class PaperModel extends GlobalModel {
		
	protected function getTime($data){
		return $data?strtotime($data):NOW_TIME;
	}
	
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'title'=>array('s1-30','刊物名称不正确！'),
			'sort'=>array('n1-8','排序格式不正确！'),
			'description'=>array('a|s0-255','刊物简介格式不正确！'),
			'directory'=>array('r/^[\w\-\.\_]{0,29}$/i','目录格式不正确'),
		), $postData);
	}
	
	public function addData($postData) {
		$postData['create_time'] = $this->getTime($postData['create_time']);
		$postData['save_time'] = NOW_TIME;
		$postData['url'] = $postData['is_link']?$postData['link_url']:'';		
		$is_link = $postData['is_link'];
		$_tmp = explode('|',$postData['thumbnail']);
		$postData['thumbnail'] = $_tmp[0];
		$id = $this->data($postData)->add();
		if($id && $is_link!=1){
			$url = '/paper/'.$id.'.html';
			$this->where( array('id'=>$id) )->data( array('url'=>$url) )->save();
		}
		return $id;
	}
	
	public function editData($postData) {
		$postData['create_time'] = $this->getTime($postData['create_time']);
		$postData['save_time'] = NOW_TIME;	
		$postData['url'] = $postData['is_link']?$postData['link_url']:'/paper/'.$postData['id'].'.html';
		$postData['is_link'] = $postData['is_link']?1:0;
		$postData['is_recommend'] = $postData['is_recommend']?1:0;
		$_tmp = explode('|',$postData['thumbnail']);
		$postData['thumbnail'] = $_tmp[0];
		return $this->where( array('id' => $postData['id']) )->data($postData)->save();
	}


	public function page($order = 'sort DESC,id DESC') {
		$options = array();
		//超管取出全部，非超管取出自己
		if (SESSION_TYPE == 1) {
			$options['where']['is_delete'] = array('eq',1);
		} else {
			$options['where']['userid'] = array('eq',GBehavior::$session['id']);
			$options['where']['is_admin'] = array('eq',2);
			$options['where']['is_delete'] = array('eq',1);
		}
		
		$total = $this->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__."?page={PAGE}");
		$data = array();
		$data[0] = $this->where($options['where'])->limit($Page->limit())->order($order)->getField('id,title,description,attr,thumbnail,save_time,a_status,sort,click,create_time,userid,is_admin,is_delete,is_link,url');
		$data[1] = $Page->show();
		return $data;
	}
}
?>