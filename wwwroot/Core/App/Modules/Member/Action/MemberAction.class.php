<?php
/**
 * 后台会员操作处理控制器
 * @author CHENG
 * 用模型方法  index -->列表  add -->添加  edit-->编辑  delete-->删除
 */
class MemberAction extends GlobalAction {
	
	protected function _initialize() {
		parent::_initialize();
		parent::BackEntranceInit();
		$this->model = D('Member');
	}
	
// 	会员首页列表
	public function index() {
		$memberData = $this->model->memberPage();
		$this->assign('data',$memberData);
		$this->display();
	}
	
// 	会员详情
	public function detail() {
		$id = $this->checkData('id');
		$mainData = $this->findOneData($id);
		$this->assign('mainData',$mainData);
		//会员主表附加信息
		$mainModel = C('MEMBER_MAIN_MODEL');
		$modelsFields = F("models_fields_$mainModel");
		$this->assign('mainFields',$modelsFields);
		//会员附加信息
		$appendModelId = $mainData['append_model'];
// 		附加字段
		$modelsFields = F("models_fields_$appendModelId");
		$this->assign('appendFields',$modelsFields);
// 		附加信息
		$appendModel = F("models_$appendModelId");
		$this->assign('appendModel',$appendModel);
		$appendData = $this->model->modelFindOneFull($appendModel,$id);
		$this->assign('appendData',$appendData);
		$this->display();
	}
	
// 	添加会员
	public function add() {
		if (IS_POST) {
			$postData = $this->model->checkData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			
			/* 验证Email是否惟一 */
			if (C('EMAIL_REQUIRED') && C('EMAIL_UNIQUE') && $this->model->checkEmail($postData['email'],$_POST['id'])) $this->error('该E-mail已存在！');
			
			/* 验证用户名是否惟一 */
			$checkUser = $this->model->checkUserName($postData['username']);
			if (!$checkUser[0]) $this->error($checkUser[1]);
			
			$this->addPublicMsg($this->model->backAddData($postData));
		} else {
			//会员组模型
			$this->getGroupAndModels();
			$this->display();
		}
	}
	
	public function edit() {
		if (IS_POST) {
			//数据验证
			$postData = $this->model->checkEditData();
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			
			/* 验证Email是否惟一 */
			if (C('EMAIL_REQUIRED') && C('EMAIL_UNIQUE') && $this->model->checkEmail($postData['email'],$_POST['id'])) $this->error('该E-mail已存在！');
			
			$this->currentModel = F("models_{$postData['append_model']}");
			//修改主模型数据
			if (!$postData['vail_status']) $this->error($postData['vail_info']);
			$status = $this->model->editData($postData,$this->currentModel);
			if ($status !== false) {
				$this->editPublicMsg($this->modelEditPost(array('id'=>$postData['id'])));
			} else {
				$this->editPublicMsg(false);
			}
		} else {
			$id = $this->checkData('id');
			$member = $this->findOneData($id);
			//会员组模型
			$this->getGroupAndModels();
			$this->assign('mainData',$member);
			//会员组
			$this->assign('group',M('MemberGroupAccess')->where("uid=$id")->getField('group_id',true));
			//附加表数据
			$this->currentModel = F("models_{$member['append_model']}");
			$currentData = $this->modelEditDisplay($id);
			$this->assign('appendData',$currentData);
			$this->display();
		}
	}
	
	public function delete() {
		$id = $this->checkData('id');
		$data = $this->model->where("id IN($id)")->getField('id,append_model,picture_path');
		$status = $this->model->where("id IN($id)")->delete();
		if($status) {
			foreach ($data as $values) {
				//删除头像
				if (strtolower($values['picture_path']) != 'public/images/picture/') {
					Tool::removeDir(__PATH__.$values['picture_path']);
				}
				/*
				//删除附加表数据
				$models = F("models_{$values['append_model']}");
				$status = $this->model->table(DB_PREFIX.$models['table_name'])->where("mid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员附加表失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除用户和组关系
				$status = $this->model->table(DB_PREFIX.'member_group_access')->where("uid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员组失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除粉丝和关注
				$status = $this->model->table(DB_PREFIX.'member_fans')->where("userid={$values['id']} OR rel_userid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员关系表失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除关注组
				$status = $this->model->table(DB_PREFIX.'member_fans_group')->where("userid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员关注组表失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除私信
				$status = $this->model->table(DB_PREFIX.'member_letter')->where("userid={$values['id']} OR post_userid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员私信失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除说说
				$status = $this->model->table(DB_PREFIX.'member_talk')->where("userid={$values['id']} OR rel_userid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员说说表失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除足迹
				$status = $this->model->table(DB_PREFIX.'member_visit')->where("userid={$values['id']} OR rel_userid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员足迹表失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除动态
				$status = $this->model->table(DB_PREFIX.'member_dynamic')->where("userid={$values['id']}")->delete();
				if ($status === false) {
					$this->writeLog("删除会员时，删除会员动态表失败，会员id{$values['id']}", 'SYSTEM_ERROR');
				}
				//删除收藏 
				
				//删除会员通知关联
				 * */
			}
		}
		$this->deletePublicMsg($status);
	}
	
// 	会员状态设置
	public function audit() {
		$status = $this->checkData('status','GET');
		$id = $this->checkData('id');
		$status = $this->model->where("id IN($id)")->setField('m_status', $status);
		$status!==false ? $this->success('成功更改状态！') : $this->error('更改会员状态失败！'); 
	}
	
	// 	会员粉丝
	public function fans() {
		$id = $this->checkData('id');
		$MemberFans = D('MemberFans');
		$data = $MemberFans->findMemberFans($id,true);
		$this->assign('data',$data);
		$this->display();
	}
	
	// 	会员关注
	public function attent() {
		$id = $this->checkData('id');
		$MemberFans = D('MemberFans');
		$data = $MemberFans->findMemberAttent($id,true);
		$this->assign('data',$data);
		$this->display();
	}
	
	// 	得到所属组和模型
	private function getGroupAndModels() {
		//拿出会员模型
		$models = $this->model->table(DB_PREFIX.'models')->where("model_type='member'")->getField('id,model_name');
		$this->assign('models',$models);
		$groupData = $this->model->table(DB_PREFIX.'member_group')->where('status=1')->select();
		$this->assign('groupData',$groupData);
	}
}
?>