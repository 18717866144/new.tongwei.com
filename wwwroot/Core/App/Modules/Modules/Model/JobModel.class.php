<?php
/**
 * 链接模型
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class JobModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		$postData['content'] = Input::getVar($_POST['content']);//主要数据不去掉HTML
		//$postData['content'] = Input::safeHtml($postData['content']);//安全过滤			
		return ValiData::_vail()->_check(array(
			'jobs'=>array('s1-30','招聘职位格式不正确!'),
			'schooling'=>array('s1-20','要求学历格式不正确!'),
			'number'=>array('n1-5|r/^不限$/','招聘人数格式不正确！'),			
			'email'=>array('e|r/^$/','邮箱地址格式不正确！'),	
			'inputtime'=>array('r/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/','发布时间格式不正确！'),		
			'end_time'=>array('r/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/','结束时间格式不正确！'),
			'status'=>array('n1-2','发布状态格式不正确！'),
			'sort'=>array('n1-8','排序格式不正确！'),	
		), $postData);
	}
	
	public function addData($postData) {
		$postData['inputtime'] = strtotime($postData['inputtime']);
		$postData['end_time'] = strtotime($postData['end_time']);
		return $this->data($postData)->add();
	}

	public function editData($postData, $setting = array()) {
		$postData['inputtime'] = strtotime($postData['inputtime']);
		$postData['end_time'] = strtotime($postData['end_time']);
		 return $this->where("id={$postData['id']}")->data($postData)->save();
	}

	public function page() {
		$options = $this->resolveGET();
		$total = $this->count(1);
		$PAGE = new Page($total,'?page={PAGE}&'.$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->limit($PAGE->limit())->order('sort DESC')->select();
		$pageData[] = $PAGE->show();
		return $pageData;
	}
}


class JobJoinModel extends GlobalModel {
	public function checkData($setting = array()) {
		$postData = Tool::filterData($_POST);
		return ValiData::_vail()->_check(array(
			'uname'=>array('s1-30','姓名格式不正确!'),
			'sex'=>array('r/^[1,2]$/','性别格式不正确！'),
			'age'=>array('r/^\d+$/i','年龄格式不正确！'),
			'schooling'=>array('s1-30','学历格式不正确!'),
			'tel'=>array('t','手机号码格式不正确!'),			
			'email'=>array('e','邮箱地址格式不正确！'),	
		), $postData);
	}
	
	public function addData($postData) {
		$postData['create_time'] = NOW_TIME;
		return $this->data($postData)->add();
	}
		
	public function page() {		
		$options = $this->resolveGET(array('n.jobid'=>'jobid'));		
		$total = $this->where($options['where'])->count(1);
		$PAGE = new Page($total,'?page={PAGE}&'.$options['url']);
		$pageData = array();
		$pageData[0] = $this->table("{$this->tablePrefix}job_join as n")->where($options['where'])->join(" LEFT JOIN {$this->tablePrefix}job AS j ON (n.jobid=j.id)")->limit($PAGE->limit())->order('n.id DESC')->getField('n.id,n.jobid,n.uname,n.sex,n.age,n.schooling,n.tel,n.email,n.doc,n.create_time,n.a_status,n.remark,n.sendmail,j.jobs AS jobs');
		$pageData[1] = $PAGE->show();
		return $pageData;
	}
}
?>