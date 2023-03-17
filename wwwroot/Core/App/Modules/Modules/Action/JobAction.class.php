<?php
class JobAction extends GlobalAction {
	protected $id = 0;
	protected $jobConfig = NULL;
	protected $configFile = NULL;
	protected $str = 'Iaskd0909kjsayuasA^iudah';
	
	protected function _initialize() {
		parent::_initialize();
		$this->model = D('Job');
		$this->model_join = D('JobJoin');
		$this->assign('title','人才招聘');
		$this->id = I('get.id',0,'intval');
		$this->assign('id',$this->id);
		$this->configFile = APP_PATH.'Modules/Modules/Conf/Job/Config.php';
	}
	
	public function index() {
		$where = array();
		$where['status'] =  array('eq',1);
		$where['end_time'] =  array('gt',NOW_TIME);
		$jobData = $this->model->where($where)->order('sort desc,id desc')->select();
		$this->assign('jobData',$jobData);
		$tpl = 'Job/index.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	public function show() {
		if(!$this->id) $this->error();
		$where = array();
		$where['id'] = array('eq',$this->id);
		$where['status'] =  array('eq',1);
		$where['end_time'] =  array('gt',NOW_TIME);
		$jobData = $this->model->where($where)->find();
		if(!$jobData) $this->error();//必要的检查		
		$this->assign('jobData',$jobData);
		$tpl = 'Job/show.php';
		$tpl = $this->getTpl($tpl);
		$this->display($tpl);
	}
	
	public function join() {
		//检测职位信息是否存在
		if(!$this->id) $this->error('1');
		$job = $this->model->find($this->id);
		if(!$job) $this->error('2');
		
		//读取配置文件
		$setting = require $this->configFile;
		
		if(IS_POST) {			
			//检查token，验证表单，可防止重复提交
			if(!$this->model_join->autoCheckToken()){
				$this->error('3');	
			}
			
			//检查验证码
			if ($setting['start_code'] == 1){
				if(strtolower($_POST['code']) !== strtolower($_SESSION['code'])) $this->error('验证码不正确！');
			}
		
			//判断提交时间,不可过快
			if ($setting['time_limit']) {
				//检测原理是打开表单页面的时间和POST时的时间对比，可理解为填写表单所需花的时间，并且最大相差不能超过10小时，防止提交错误的POSTTIME
				if (NOW_TIME - $_POST['posttime'] < $setting['time_limit'] || NOW_TIME - $_POST['posttime'] > 10*60*60) {
					$this->writeLog("提交JOB申请过于频繁，JOBID，{$id}", 'USER_ERROR');
					$this->error('提交速度太快或过于频繁，请等稍等片刻！');
				}
			}
			
			//验证字段
			$postData = $this->model_join->checkData();
			
			//检查附件			
			$upload = new FileUpload();// 实例化上传类
			$upload->maxSize  = $setting['maxSize'].'KB';//设置附件上传大小
			$upload->minSize = $setting['minSize'].'KB';//设置附件上传大小
			$upload->allowExtType = $setting['allowExtType'];//设置附件上传类型
			$upload->saveFilePath = __PATH__.UPLOADS_DIR.'/Job/'.date(C('UPLOAD_DIR_FORMAT'),NOW_TIME);//设置附件上传目录
			$re = $upload->upload('doc');//只上传一个文件
    		if($re[0]['error']) $this->error($re[0]['errorMsg']);			
			$postData['doc'] = str_replace(__PATH__,'',$re[0]['save_path']).'/'.$re[0]['new_name'];		
			$postData['jobid'] = $this->id;
			//保存信息
			$status = $this->model_join->addData($postData);
			
			if($status) {
				//开启邮件自动发送，并且有邮件地址，则发送邮件给招聘人员
				if($setting['sendMail'] && $job['email']) $this->_sendMail_asyn($status);
			}
			parent::editPublicMsg($status,array('success_info'=>'申请职位信息提交成功','error_info'=>'申请职位失败，请重试'),U('Modules/Job/show/','id='.$this->id));			
		}else{
			C('TOKEN_ON',true);//开启表单令牌验证
			$this->assign('setting',$setting);
			$this->assign('jobData',$job);
			$this->assign('posttime',NOW_TIME);
			$tpl = 'Job/join.php';
			$tpl = $this->getTpl($tpl);
			$this->display($tpl);
		}
	}
	
	/**
	* 异步发送邮件,供_sendMail_asyn调用地址
	*/
	public function sendMail(){
		$id = $_GET['id'];
		$time = $_GET['time'];
		$token = $_GET['token'];
		$email = $_GET['email'];
		$str = $this->str;
		if($token!=md5($id.$time.$str)) exit;
		$staus = $this->_sendMail($id,$email);
		//if($status){
		//	$this->model_join->data(array('id'=>$id,'sendmail'=>time()))->save();//记录发送成功
		//}
		//发送失败，重试？
		//else{
		//	$this->sendMail();
		//}
		return $status;
	}
		
	/**
	* 异步发送邮件，方法，内部调用
	*/
	public function _sendMail_asyn($id,$email=NULL){
		$u = parse_url(C('WEB_URL'));		
		$fp = fsockopen($u['host'], 80 ,$errno,$errstr,30);
		if(!$fp){
            return "$errstr ($errno)";
        }
		//sleep(1);
		$str = $this->str;
		$url = U('/Modules/Job/sendMail',array(
			'id'=>$id,
			'time'=>NOW_TIME,
			'token'=>md5($id.NOW_TIME.$str),
			'email'=>$email?$email:0
		));
		//echo $url;exit;
		$out = "GET $url HTTP/1.1\r\n"; 
    	$out .= "Host: ".$u['host']."\r\n";
    	$out .= "Connection: Close\r\n\r\n";
		fwrite($fp, $out);
		/*执行结果
		while (!feof($fp)) {
			echo fgets($fp, 128);
		}
		*/     	
     	fclose($fp);
		return true;
    }
	
	public function _sendMail($id,$email=NULL){
		$joinData = $this->model_join->find($id);
		$joinData['sex'] = $joinData['sex']==1?'男':($joinData['sex']==2?'女':'未填写');
		if(!$joinData) return false;
		$jobData = $this->model->find($joinData['jobid']);
		$email = $email?$email:$jobData['email'];
		import('ORG.Net.Mail.Mail');		
		$sendResult = Mail::sendMail(
			$email,
			'申请职位-'.$jobData['JOBS'].'-'.$joinData['uname'].'-'.date('Y年m月d日 H时i分',$joinData['create_time']),
			'<div style="font-size:15px; color:#000;">您好，<span style="color:#666;font-size:12px;">'.$joinData['uname'].'</span>于<span style="color:#666;font-size:12px;">'.date('Y-m-d H:i:s',$joinData['create_time']).'</span>在<span style="color:#666;font-size:12px;">'.C('WEB_NAME').'</span>网站上申请应聘岗位：<strong style="color:#F00;">'.$jobData['jobs'].'</strong>。<br><span style="color:#666;font-size:12px;">该邮件由系统自动发出，非用户发送，请勿回复。</span><br><p><strong style=font-size:18px;>'.$jobData['jobs'].'</strong><br>姓名：'.$joinData['uname'].'<br>性别：'.$joinData['sex'].'<br>年龄：'.$joinData['age'].'<br>学历：'.$joinData['schooling'].'<br>电话：'.$joinData['tel'].'<br>邮件：'.$joinData['email'].'</p></div>',
			array(0=>array(__PATH__.$joinData['doc'],$joinData['uname'].'的简历.'.pathinfo($joinData['doc'],PATHINFO_EXTENSION)))
		);
		return $sendResult;
	}		
}
?>