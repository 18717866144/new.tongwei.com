<?php
/**
 * 下载详情Model
 * @author CHENG
 *
 */
class DownDetailsModel extends GlobalModel {
	
	public function addData($data) {
		$downArray = array(
			'aid'=>$data['aid'],
			'cid'=>$data['cid'],
			'userid'=>intval(GBehavior::$session['id']),
			'ip'=>CLIENT_IP_NUM,
			'save_time'=>NOW_TIME,
			'attch_id'=>$data['attch_id'],
		);
		$status = $this->data($downArray)->add();
		if (!$status) {//
			$this->writeLog("写入至下载详情表失败attch_id：{$downArray['id']}，可能用户".GBehavior::$session['id'].",ip:".CLIENT_IP.'时间'.date('Y-m-d H:i:s',NOW_TIME), 'SYSTEM_ERROR');
		}
		return $status;
	}
	
	public function downPage() {
		$options = $this->compareGET('d.save_time',array('start_time','end_time'),'time',false);
		$ipoptions = $this->compareGET('d.ip',array('start_ip','end_ip'),'ip');
		$options['where'] = array_merge_recursive($options['where'],$ipoptions['where']);
		$options['url'] .= $ipoptions['url'];
		if (!empty($_GET['username'])) {
			if (is_numeric($_GET['username'])) {
				$userid = intval($_GET['username']);
				$options['where']['d.userid'] = array('eq',$userid);
			} else {
				$username = Input::getVar($_GET['username']);
				$options['where']['d.username'] = array('eq',$username);
			}
			$options['url'] .= "&username={$_GET['username']}";
		}
		$total = $this->table($this->tablePrefix.'down_details AS d')->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__.'?page={PAGE}'.$options['url']);
		$pageData = array();
		$pageData[] = $this->where($options['where'])->table($this->tablePrefix.'down_details AS d')->join("{$this->tablePrefix}member AS m ON m.id=d.userid")->join("{$this->tablePrefix}attachment AS a ON a.id=d.attch_id")->limit($Page->limit())->order('d.id DESC')->field('d.*,m.email,a.new_name')->select();
		if ($pageData[0]) {
			$IpLocation = new IpLocation();
			$navigate = F('navigate');
			foreach ($pageData[0] as &$values) {
				$values['ip'] = long2ip($values['ip']);
				$values['ip_location'] = $IpLocation->getlocation($values['ip']);
				$values['navigate_name'] = $navigate[$values['cid']]['navigate_name'];
			}
		}
		$pageData[] = $Page->show();
		return $pageData;
	}
	
} 
?>