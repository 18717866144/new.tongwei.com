<?php
/**
 * 评论模型处理
 * @author CHENG
 * 常用模型处理方法  checkData->数据验证  addData->添加数据  editData->编辑数据  deleteData->删除数据
 */
class CommentsModel extends GlobalModel {
	
	/**
	 * 数据验证
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	/**
	 * 数据验证
	 * @return Ambigous <boolean, unknown, multitype:unknown string >
	 */
	public function checkData() {
		$postData = Tool::filterData($_POST);
		$postData['content'] = htmlspecialchars($_POST['content']);
		return ValiData::_vail()->_check(array(
			'content'=>array('s5-140,','内容必须在5到140个字之间！'),
			'aid'=>array('r/^[1-9][\d]{0,7}$/','无法获取文章源！'),
			'cid'=>array('r/^[1-9][\d]{0,7}$/','无法获取栏目源！'),
		), $postData);
	}
	
	/**
	 * 添加数据
	 * @param array $postData
	 * @return string|boolean
	 */
	public function addData($postData) {
		$data = array();
		$rel_id = intval($postData['rel_id']);
		$aid = $postData['aid'];
		$cid = $postData['cid'];
		
		//回复评论数据验证
		$r = array();
		if($rel_id){
			$r = $this->where( array('id'=>$rel_id, 'aid'=>$aid, 'cid'=>$cid) )->find();
			if(!$r) return false;
		}
		
		$rel_userid = $r ? $r['userid'] : 0;
		$rel_username = $r ? $r['username'] : '';
		$pid = $r ? ($r['pid']>0?$r['pid']:$rel_id) : 0;
		
		$data['userid'] = intval($_SESSION[C('MEMBER_SESSION')]['uid']);
		$data['username'] = $_SESSION[C('MEMBER_SESSION')]['username'];		
		$data['rel_id'] = $rel_id;
		$data['rel_userid'] = $rel_userid;		
		$data['rel_username'] = $rel_username;
		$data['save_time'] = NOW_TIME;
		$data['pid'] = $pid;
		$data['aid'] = $aid;
		$data['cid'] = $cid;
		$data['content'] = $postData['content'];
		$data['ip'] = CLIENT_IP_NUM;		
		$insertId = $this->data($data)->add();
		if ($insertId) {
			$newdata = array(
				'id'=>$insertId,
				'userid' => $data['userid'],	//用户ID
				'username' => $data['username']?$data['username']:'通心粉',//用户名
				'content' => $data['content'], //内容
				'save_time' => date('Y-m-d',$data['save_time']),//时间
				'rel_userid' => $data['rel_userid'],//回复的用户ID
				'rel_username' => $data['rel_username'],//回复的用户ID
				'pid' => $data['pid'],	//回复的评论ID
				'aid' => $data['aid'], //文章ID
				'cid' => $data['cid'], //栏目ID
				'praise'=>0,
				'child' => array(),
			);
			
			return $newdata;
		} else {
			$this->writeLog("用户发表评论失败，写入主表失败", 'SYSTEM_ERROR');
			return false;
		}
	}
		
	/**
	 * 后台评论列表
	 * @return multitype:NULL Ambigous <string, mixed>
	 */
	public function backCommentsPage() {
		$options = $this->compareGET('c.save_time',array('start_time','end_time'),'time',false);
		$ipoptions = $this->compareGET('c.ip',array('start_ip','end_ip'),'ip');
		$resolveOptions = $this->resolveGET(array('c.userid'=>'userid','c.rel_userid'=>'rel_userid'));
		$options['where'] = array_merge_recursive($options['where'],$ipoptions['where'],$resolveOptions['where']);		
		$options['url'] .= $ipoptions['url'];
		$options['url'] .= $resolveOptions['url'];
		$resolveOptions = $this->resolveGET(array('c.content'=>'content'),'like');		
		$options['where'] = array_merge_recursive($options['where'],$resolveOptions['where']);		
		$options['url'] .= $resolveOptions['url'];		
		if (!empty($_GET['username'])) {
			if (is_numeric($_GET['username'])) {
				$userid = intval($_GET['username']);
				$options['where']['userid'] = array('eq',$userid);
			} else {
				$username = Input::getVar($_GET['username']);
				$options['where']['username'] = array('eq',$username);
			}
			$options['url'] .= "&username={$_GET['username']}";
		}
		$total = $this->table($this->tablePrefix.'comments AS c')->where($options['where'])->count(1);
		$Page = new Page($total,__ACTION__.'?page={PAGE}'.$options['url']);
		$pageData = array();
		$pageData[0] = $this->table($this->tablePrefix.'comments AS c')
					->where($options['where'])->order('c.id DESC')
					->field('c.*')->limit($Page->limit())->select();
		if ($pageData[0]) {
			$navigate = F('navigate');
			$IpLocation = new IpLocation();
			foreach ($pageData[0] as &$values) {
				$mid = $navigate[$values['cid']]['mid'];
				$Model = F("models_$mid");
				$Model = $this->returnModel($Model['table_name']);
				$values['article'] = $Model->where("id={$values['aid']}")->limit(1)->getField('id,title,url');
				$values['article'] = $values['article'][$values['aid']];
				$values['navigate'] = $navigate[$values['cid']]['navigate_name'];
				$values['ip'] = long2ip($values['ip']);
				$values['ip_location'] = $IpLocation->getlocation($values['ip']);
				$values['username'] = $values['username'] ? $values['username'] : '游客';
				$values['content'] = Tool::faceChange($values['content']);
			}
		}
		$pageData[1] = $Page->show();
		return $pageData;
	}
	
	/**
	 * 前台Ajax分页
	 * @param numeric $aid 文章ID
	 * @param numeric $cid 导航ID
	 * @param number $limit
	 * @return multitype:number |Ambigous <multitype:number NULL , string>
	 */
	public function commentsPage($params,$limit = 10) {
		//extract($params);
		$aid = $params['aid'];
		$cid = $params['cid'];
		$pageData = array();
		$total = $this->where("aid=$aid AND cid=$cid AND rel_id=0 AND is_checked=1 AND is_delete=1")->count(1);
		if ($params['page'] > ceil($total/$limit)) {
			$pageData['page'] = -1;
			$pageData['info'] = '没有数据了';
			return $pageData;
		}
		$Page = new Page($total,'',$limit);
		$pageData['data'] = $this->table($this->tablePrefix.'comments AS ma')
											->where("ma.aid=$aid AND ma.cid=$cid AND ma.rel_id=0 AND ma.is_checked=1 AND ma.is_delete=1")
											->order('ma.save_time DESC')->limit($Page->limit())
											->field('ma.*')
											->select();
		if ($pageData['data']) {
			$uid = $_SESSION[C('MEMBER_SESSION')]['uid'];
			foreach ($pageData['data'] as &$values) {
				if($uid) {
					$res = M('CommentsPraise')->where(array('userid'=>$uid,'cid'=>$values['id']))->find();
					if($res)  $values['praise_time'] = $res['save_time'];
				}
				$values = $this->comments_Factory($values);
				$idArray[] = $values['id'];
			}
			$idString = implode(',', $idArray);
			//获取主条主评论后面的所有子集
			$sonData = $this->where("pid IN($idString) AND is_checked=1 AND is_delete=1")->select();
			if ($sonData) {
				foreach ($sonData as &$son_values) {
					$son_values = $this->comments_Factory($son_values);
				}
			}
			$pageData['data'] = array_merge($pageData['data'],(array)$sonData);
		}
		$Tree = new Tree();
		$Tree->init($pageData['data']);
		$pageData['data'] = $Tree->get_tree_array(0);
		//这里注意，当tree这后，它的键又变为以id值，但在jquery$.each中，它无法排序，最好的办法是把tree之后的pageData['data']再得到普通键，
		//这里为实现所以用下面的方法array_multisort($pageData['data'],SORT_DESC);
		
		foreach($pageData['data'] as &$v){
			$arr = array();
			foreach($v['child'] as $kk=>&$vv){
				array_multisort($v['child'],SORT_DESC);
			}
		}
		
		array_multisort($pageData['data'],SORT_DESC);
		return $pageData;
	}
	
	/**
	 * 评论系统处理加工方法，这里没有把foreach套入
	 * @param array $data
	 * @return Ambigous <string, unknown>
	 */
	private function comments_Factory($data) {
		$data['ip'] = long2ip($data['ip']);		
		$data['save_time'] = date('Y-m-d H:i:s',$data['save_time']);
		$data['username'] = $data['username'] ? $data['username'] : '通心粉';
		$data['content'] = Tool::faceChange($data['content']);
		//$data['picture_path'] = $data['picture_path'] ? __ROOT__.'/'.$data['picture_path'].'middle.jpg' : __ROOT__.'/Public/images/picture/middle.jpg';
		//$data['home_url'] = $data['home_url'] ? $data['home_url'] : '###';
		return $data;
	}
}
?>