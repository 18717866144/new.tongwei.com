<?php
/**
 * 公告模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class AnnounceModel extends GlobalModel {
	
	
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		$postData['content'] = (string) Input::getVar($_POST['content']);
		return ValiData::_vail()->_check(array(
			'title'=>array('s1-60','标题格式不正确！'),
			'content'=>array($this,'checkContent','内容格式不正确！'),
			'link'=>array('a|u&s5-100','外部链接格式不正确！'),
		),$postData);
	}
	
	/**
	 * 验证内容格式
	 * @param string $content
	 * @return boolean
	 */
	public function checkContent($content) {
		if (empty($content)) {
			return empty($_POST['link']) ? false : true; 
		} else {
			return true;
		}
	}

	public function addData($postData, $setting = array()) {
		$postData['style'] = $postData['style_color'].'|'.$postData['style_font_weight'].'|'.$postData['style_font_size'];
		$postData['start_time'] = strtotime($postData['start_time']);
		$postData['end_time'] = strtotime($postData['end_time']);
		$postData['userid'] = GBehavior::$session['id'];
		$postData['username'] = GBehavior::$session['username'];
		$postData['save_time'] = NOW_TIME;
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		$postData['style'] = $postData['style_color'].'|'.$postData['style_font_weight'].'|'.$postData['style_font_size'];
		$postData['start_time'] = strtotime($postData['start_time']);
		$postData['end_time'] = strtotime($postData['end_time']);
		return $this->data($postData)->save();
	}

	// 公告
	public function announcePage() {
		$options = $this->compareGET('save_time',array('start_time','end_time'),'time',false);
		$resolveEQ = $this->resolveGET(array('ann_type','a_status'));
		$resolveLIKE = $this->resolveGET(array('title'),'LIKE');
		$options['where'] = array_merge_recursive($options['where'],$resolveEQ['where'],$resolveLIKE['where']);		
		$url = $options['url'].$resolveEQ['url'].$resolveLIKE['url'];
		$total = $this->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__.$url);
		$pageData = array();
		$pageData[0] = $this->order('id DESC')->where($options['where'])->field('id,title,style,start_time,end_time,a_status,ann_type,userid,username,sort,save_time')->limit($Page->limit())->select();
		$pageData[1] = $Page->show();
		return $pageData;
	}
	
	/**
	 * 解析上下篇
	 * @param numeric $id
	 * @param numeric $type 会员，公共
	 * @return multitype:Ambigous <unknown, multitype:string Ambigous <mixed, void, NULL> > Ambigous <unknown, multitype:string Ambigous <mixed, void, NULL, multitype:> >
	 */
	public function resolvePrevAndNext($id,$type) {
		//		上下篇,这里上下篇不根据栏目
		$now_time = NOW_TIME;
		$prev = $this->where("id<$id start_time<=$now_time AND end_time>=$now_time AND ann_type=$type AND a_status=1")->order('id DESC')->field('id,url,title')->find();
		$prev = $prev ? $prev : array('url'=>'###','title'=>C('NOT_PREV'));
		$next = $this->where("id>$id start_time<=$now_time AND end_time>=$now_time AND ann_type=$type AND a_status=1")->order('id ASC')->field('id,url,title')->find();
		$next = $next ? $next : array('url'=>'###','title'=>C('NOT_NEXT'));
		return array('prev'=>$prev,'next'=>$next);
	}
	
}
?>