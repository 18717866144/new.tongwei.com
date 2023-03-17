<?php
/**
 * 支付数据接口规范
 * @author CHENG
 *
 */
abstract class Pay {
	
	/**
	 * 数据发送，开始提交支付
	 * @param array $payData  定单数据
	 * @param array $payTypeData  支付类型数据
	 */
	abstract public function pay_to(array $payData,array$payTypeData);
	
	/**
	 * 后台数据处理
	 * @param array $payTypeData  支付配置
	 */
	abstract public function notify_url(array $payTypeData);
	
	/**
	 * 前台接收的数据值处理
	 * @param array $payTypeData  支付配置
	 */
	abstract public function return_url(array $payTypeData);
	
	/**
	 * 验证快钱参数处理
	 * @param string $kq_va
	 * @param mixed $kq_na
	 * @return string
	 */
	protected function check_null($kq_va,$kq_na){
		return ($kq_va == ''&&!is_numeric($kq_va)) ? '' : $kq_na.'='.$kq_va.'&';
	}
	
	/**
	 * 公共前台提示消息处理
	 * @param string $order_id
	 * @param boolean $payStatus  支付商返回的支付状态
	 * @param boolean $signStatus  签名加密比对的状态
	 * @return Ambigous <multitype:unknown, multitype:boolean|numeric string string|array >
	 */
	protected function global_return_url($order_id,$payStatus,$signStatus) {
		//支付商支付失败
		if (!$payStatus) {
			return $this->result('failed','','充值失败，请联系支付商处理！');
		}
		//加密值不合法
		if (!$signStatus) {
			return $this->result('error','','充值失败，验证错误，请立即联系客服处理！');
		}
		$Pay = D('Modules/Pay');
		//查询本次定单
		$payData = $Pay->findOneOrder($order_id);
		switch ($payData['pay_status']) {
			case 'success':
				return $this->result('success','','充值成功！');
				break;
			case 'error':
				return $this->result('error','','充值失败，请联系客服处理！');
				break;
			case 'not_equal':
				return $this->result('not_equal','','充值失败，金额不匹配，请联系客服处理！');
				break;
			case 'lock':
				return $this->result('lock','','充值失败，此定单被锁定，请联系客服处理！');
				break;
			case 'cancel':
				return $this->result('cancel','','金额已成功充值到游戏，但交易定单被关闭！');
				break;
			case 'failed':
				return $this->result('failed','','充值失败，请联系支付商处理！');
				break;
		}
	}
	
	/**
	 * 设置费率
	 * @param array $payTypeData
	 * @param array $payData
	 * @return number   实际下单后应该返回的金额
	 */
	protected function set_rate($payTypeData,$payData) {
		if ($payTypeData['setting']['charges'] == 1) {//比历
			if ($payTypeData['setting']['pay_rate']) {
				$succMoney =  floor($payData['add_money']*$payTypeData['setting']['pay_rate']);
			}
		} else {//固定金额
			$succMoney = $payData['add_money'] - $payTypeData['setting']['pay_rate'];
		}
		return $succMoney;
	}
	
	/**
	 * 检查定单号状态
	 * 是否处理或不存在的定单号
	 * @param array $payTypeData
	 * @param string $order_id   平台定单号
	 * @param string $pay_plat_id  支付商定单号
	 * @param boolean $payStatus  支付商返回的处理状态：注意：非本平台 
	 * @param boolean $signStatus  支付商和平台的加密比对状态 
	 * @param numeric $returnMoney  支付商返回的支付金额
	 * @return Ambigous <multitype:unknown, multitype:boolean|numeric string string|array >
	 */
	protected function check_order($payTypeData,$order_id,$pay_plat_id,$payStatus,$signStatus,$returnMoney) {
		$Pay = D('Modules/Pay');
		//查询本次定单
		$payData = $Pay->findOneOrder($order_id);
		if (!$payData) {
			$Pay->writeLog("定单号不存在，支付类型：{$payTypeData['pay_mark']}",'SYSTEM_ERROR');
			return $this->result(-1);//定单号不存在
		}
		
		//判断是否已经发送过请求，支付商定单号不为空则表示已处理，或者非lock状态则也可以表示已处理
		if (empty($payData['reply_order'])) {
			//增加支付商定单号
			$payData['reply_order']=$pay_plat_id;
		} else {
			$Pay->writeLog("定单号已经被处理过，支付类型：{$payTypeData['pay_mark']}",'SYSTEM_ERROR');
			return $this->result(-2);//定单号已处理
		}
		
		//判断支付商返回的支付结果
		if (!$payStatus) {
			//修改定单状态
			$editData = array(
				'server_id'=>0,//不管是不充值到游戏，此处如果允值失败，则都表示充值到平台
				'pay_status'=>'failed',//
				'sys_remark'=>'支付商充值失败，联系支付商',
				'succ_money'=>0,//成功到帐金额为0
				'reply_order'=>$payData['reply_order'],//支付商定单号
				'handling_state'=>1,//支付商支付失败系统自动处理
			);
			$Pay->editData($payData['id'],$editData);
			$Pay->writeLog("此用户充值失败，原因：支付商支付失败，定单号{$payData['order_id']}！",'SYSTEM_ERROR');
			return $this->result(-3);//系统支付失败！
		}
		//加密签名或文件签名比对
		if (!$signStatus) {
			//修改定单状态
			$editData = array(
				'server_id'=>0,//不管是不充值到游戏，此处如果允值失败，则都表示充值到平台
				'pay_status'=>'error',//系统出错
				'sys_remark'=>'充值失败',
				'reply_order'=>$payData['reply_order'],//支付商定单号
				'succ_money'=>$returnMoney,//到帐金额
				'handling_state'=>2,//待处理
			);
			$Pay->editData($payData['id'],$editData);
			$Pay->writeLog("系统出错，支付商返回的加密签名和加密后的签名支付号不一致，，定单号{$payData['order_id']}！",'SYSTEM_ERROR');
			return $this->result(-4);
		}
		return $this->result(0,$payData);
	}
	
	
	private function pay_plat($payData,$succMoney,$Pay,$Member,$info = '') {
		//用户增加金额，用户在线充值直接增加用户SESSION金额
		$incSessionMoney = $payData['pay_type'] == 'user_online' ? true : false;
		$status = $Member->setMemberMoney($payData['userid'],$succMoney,$incSessionMoney);
		if ($status) {
			//修改定单状态，成功成交一笔订单
			$editData = array(
					'server_id'=>0,
					'pay_status'=>'success',//状态成功
					'sys_remark'=>$info.'充值成功',
					'reply_order'=>$payData['reply_order'],//支付商定单号
					'succ_money'=>$succMoney,//成功到帐金额
					'handling_state'=>1,//成功处理
			);
			$Pay->editData($payData['id'],$editData);
			return 0;
		} else {
			$editData = array(
					'server_id'=>0,
					'pay_status'=>'error',//
					'sys_remark'=>$info.'充值失败。',
					'reply_order'=>$payData['reply_order'],//支付商定单号
					'succ_money'=>$succMoney,//成功到帐金额
					'handling_state'=>2,//等待处理
			);
			$Pay->editData($payData['id'],$editData);
			$Pay->writeLog("用户成功充值，但是增加用户总金额失败，定单已被锁定，定单号{$payData['order_id']}，用户id{$payData['userid']}",'SYSTEM_ERROR');
			return 2;
		}
	}
	
	/**
	 * 支付商和本站交互后台全局处理
	 * @param array $payData  支付定单数据
	 * @param numeric $returnMoney  支付商返回成功充值的金额
	 * @param numeric $succMoney  本站计算中，用户实际到帐的金额
	 * @return number|boolean
	 */
	protected function notify_url_handle($payData,$returnMoney,$succMoney) {
		$Pay = D('Pay');
		$Member = D('Member/Member');
		// 判断返回的金额是否匹配，不匹配，锁单
		if ($returnMoney != $succMoney) {
			$editData = array(
					'server_id'=>0,//不管是不充值到游戏，此处如果允值失败，则都表示充值到平台
					'pay_status'=>'not_equal',//金额不匹配,手动划拨
					'sys_remark'=>'充值金额不匹配',
					'reply_order'=>$payData['reply_order'],//支付商定单号
					'succ_money'=>$returnMoney,//成功到帐金额为支付商返回金额
					'handling_state'=>2,//待处理
			);
			$Pay->editData($payData['id'],$editData);
			//写日志
			$Pay->writeLog("金额不匹配，下单金额：{$payData['add_money']}，实际金额：{$succMoney}，支付商返回的金额：{$returnMoney}，用户id{$payData['userid']}，定单号：{$payData['order_id']}",'SYSTEM_ERROR');
			return 1;
		}
		/* 判断充值方式 ，修改实际定单  0平台 */
		if ($payData['server_id'] == 0) {
			return $this->pay_plat($payData, $succMoney, $Pay,$Member);
		} else {
			/* 充值到游戏 */
			//1、判断是否开服，否则充值到平台
			$time = NOW_TIME;
			$serverData = M('Server')->where("id={$payData['server_id']} AND save_time <= $time AND a_status=1 AND is_delete=1")->find();
			if (!$serverData) {
				$Pay->writeLog("用户充值的服务器不存在或未开服，金额被充值到平台，详情见充值至平台日志，定单号{$payData['order_id']}，用户id{$payData['userid']}",'USER_ERROR');
				$status = $this->pay_plat($payData, $succMoney, $Pay,'服务器不存在或未开服，充值到平台。结果：');
				return $status === 0 ? 0 : 3;
			}
			// 2、判断角色是否创建，否则充值到平台
			import('ORG.Com.Plat.Plat');
			$Plat = Plat::selectPlat($serverData['server_url']);
			$userData  = array();
			$userData['username'] = $payData['username'];
			$userData['id'] = $payData['userid'];
			$result = $Plat->isActivation($userData, $serverData);
			if (!$result['status']) {
				$Pay->writeLog("用户充值的服务器角色不存在，金额被充值到平台，详情见充值至平台日志，定单号{$payData['order_id']}，用户id{$payData['userid']}",'USER_ERROR');
				$status = $this->pay_plat($payData, $succMoney, $Pay,$Member,'服务器角色不存在，充值到平台。结果：');
				return $status === 0 ? 0 : 4;
			}
			//3、开始充值到游戏
			$result = $Plat->pay($payData, $serverData);
			if ($result['status']) {
				/* 增加用户消费额和总金额，并且如果是在线充值直接更新session */
				$incSessionMoney = $payData['pay_type'] == 'user_online' ? true : false;
				$status = $Member->setMemberMoneyAndSpent($payData['userid'],$succMoney,$incSessionMoney);
				if ($status) {
					//修改定单状态，成功成交一笔订单
					$editData = array(
							'pay_status'=>'success',//状态成功
							'sys_remark'=>'成功充值到游戏',
							'reply_order'=>$payData['reply_order'],//支付商定单号
							'succ_money'=>$succMoney,//成功到帐金额
							'handling_state'=>1,//系统成功处理
					);
					$Pay->editData($payData['id'],$editData);
					return 0;
				} else {//正常是不会执行到这一步
					$editData = array(
							'pay_status'=>'cancel',//状态关闭
							'sys_remark'=>'充值到游戏成功，但定单被关闭',
							'reply_order'=>$payData['reply_order'],//支付商定单号
							'succ_money'=>$succMoney,//成功到帐金额
							'handling_state'=>1,//系统已将充值金额打款到游戏，此处只是未增加用户消费额和总金额，但这笔交易仍然是成功的，只是“状态关闭”
					);
					$Pay->editData($payData['id'],$editData);
					$Pay->writeLog("用户直充到游戏成功，但修改用户消费数和总金额数失败，无需补差额，定单已被关闭，定单号{$payData['order_id']}，用户id{$payData['userid']}",'SYSTEM_ERROR');
					return 5;
				}
			} else {
				$status =  $this->pay_plat($payData, $succMoney, $Pay,$Member,'充值到游戏失败，已充值到平台。结果：');
				return $status === 0 ? 0 : 6;
			}
		}
	}
	
	/**
	 * 返回结果
	 * @param string $info
	 * @param boolean|numeric $status
	 * @param string|array $data
	 * @return multitype:unknown string
	 */
	protected function result($status,$data = '',$info = '') {
		return array('status'=>$status,'info'=>$info,'data'=>$data);
	}
}
?>