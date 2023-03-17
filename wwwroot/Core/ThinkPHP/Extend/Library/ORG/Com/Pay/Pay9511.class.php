<?php
import('ORG.Com.Pay.Pay');
/**
 * 9511混服平台充值
 * @author CHENG
 *
 */
class Pay9511 extends Pay {
	/* (non-PHPdoc)
	 * @see Pay::pay_to()
	 */
	public function pay_to(array $payData, array $payTypeData) {
		$api_id = '251';
		$key = 'cc2c91103cdfd5c063d21fef60b5ff36';
		//获取混服ID
		$server_id = M('Server')->where("id='{$payData['server_id']}'")->limit(1)->getField('server_id');
		//加密签名方式
		$sign=strtolower(md5($api_id.$payData['userid'].$server_id.$payData['order_id'].$payData['add_money'].NOW_TIME.$key));
		//获取卡类型
		$trade_type = $this->trade_type_id();
		$http_biuld_array = array(
				'api_id'=>$api_id,
				'server_id'=>$server_id,
				'player_name'=>$payData['userid'],
				'order_no'=>$payData['order_id'],
				'time'=>NOW_TIME,
				'ip'=>$_SERVER['SERVER_ADDR'],
				'paymoney'=>$payData['add_money'],
				'trade_type_id'=>$trade_type['trade_type_id'],
				'card_type'=>$trade_type['card_type'],
				'sign'=>$sign
		);
		$url = 'http://mix.9511.com/api/pay?'.http_build_query($http_biuld_array);
		$content = json_decode(Tool::remoteUrl($url),true);
		header('Location:'.$content['url']);
	}
	
	/* 设置不同的卡类型 */
	private function trade_type_id() {
		switch ($_POST['pay_type']) {
			case 'alipay_guarantee';//支付宝
				$trade_type_id = 1;
				$card_type = '';
				break;
			case 'bill_bank';//快钱网银
				$trade_type_id = 2;
				$card_type = '';
				break;
			case 'bill_czk_yd';//神州行充值卡
				$trade_type_id = 3;
				$card_type = 'shenzhouxing';
				break;
			case 'bill_czk_lt';//联通充值卡
				$trade_type_id = 3;
				$card_type = 'liantong';
				break;
			case 'bill_czk_dx';//电信充值卡
				$trade_type_id = 3;
				$card_type = 'dianxin';
				break;
			case 'bill_dk_sd';//盛大一卡通
				$trade_type_id = 3;
				$card_type = 'shengda';
				break;
			case 'bill_czk_jw';//骏网一卡通
				$trade_type_id = 3;
				$card_type = 'junwang';
				break;
			case 'bill_dk_sh';// 搜狐一卡通
				$trade_type_id = 3;
				$card_type = 'souhu';
				break;
			case 'bill_dk_wm';// 完美一卡通
				$trade_type_id = 3;
				$card_type = 'wanmei';
				break;
			case 'bill_dk_wy';// 网易一卡通
				$trade_type_id = 3;
				$card_type = 'wangyi';
				break;
			case 'bill_dk_zy';// 纵游一卡通
				$trade_type_id = 3;
				$card_type = 'zongyou';
				break;
			case 'bill_dk_zt';// 征途一卡通
				$trade_type_id = 3;
				$card_type = 'zhengtu';
				break;
		}
		return array('trade_type_id'=>$trade_type_id,'card_type'=>$card_type);
	}

	/* (non-PHPdoc)
	 * @see Pay::notify_url()
	 */
	public function notify_url(array $payTypeData) {
		//您提交的支付回调地址?order_no=您提交的订单号码&realmoney=实收金额&status=(true / false 成功时为true，失败为false)&time=时间戳
		//参数获取
		$out_trade_no = $_GET['order_no'];//商户订单号
		$trade_no = $_GET['order_no'];//混服平台交易号
		$returnMoney = intval($_GET['realmoney']);//实收金额
		$pay_status = $_GET['status'];//true / false 成功时为true，失败为false
		$time = $_GET['time'];//时间戳
		//支付结果
		//$payStatus = ($_GET['status']=='true') ? true : false;
		$Pay = D('Modules/Pay');
		//查询本次定单
		$payData = $Pay->findOneOrder($out_trade_no);
		if (!$payData) {
			$Pay->writeLog("定单号不存在，支付类型：{$payTypeData['pay_mark']}",'SYSTEM_ERROR');
			return $this->result(-1);//定单号不存在
		}
		//判断是否已经发送过请求，支付商定单号不为空则表示已处理，或者非lock状态则也可以表示已处理
		if (empty($payData['reply_order'])) {
			//增加支付商定单号
			$payData['reply_order']=$trade_no;
		} else {
			//元宝已发放，成功处理
			if ($payData['ingot_status'] == 1) {
				$Pay->writeLog("定单号已经被处理过，支付类型：{$payTypeData['pay_mark']}",'SYSTEM_ERROR');
				return $this->result(-2);//定单号已处理
			}
		}
		
		//设置费率，取得下单后的可用金额
		$succMoney = $this->set_rate($payTypeData, $payData);
		//true全部交易成功，充值成功，元宝发放完成  //false充值成功，元宝未发放
		if ($pay_status == 'true' || $pay_status == 'false') {
			//充值成功
			if ($pay_status == 'false') {
				/* 以下都是混服平台,返回为true的情况下执行的，不管金额是否匹配都是成功 */
				$Member = D('Member/Member');
				/* 增加用户消费额和总金额，并且如果是在线充值直接更新session */
				$incSessionMoney = $payData['pay_type'] == 'user_online' ? true : false;
				/* 注意，这里和填正支付返回的金额不同，真正支付金额不匹配则锁单，这里已经充值到游戏按返回的金额 */
				$status = $Member->setMemberMoneyAndSpent($payData['userid'],$returnMoney,$incSessionMoney);
				if ($status) {
					// 判断返回的金额是否匹配，不匹配，只以返回的金额记录
					if ($returnMoney != $succMoney) {
						$editData = array(
								'server_id'=>0,//不管是不充值到游戏，此处如果允值失败，则都表示充值到平台
								'pay_status'=>'not_equal',//金额不匹配,手动划拨
								'sys_remark'=>'充值金额不匹配',
								'reply_order'=>$payData['reply_order'],//支付商定单号
								'succ_money'=>$returnMoney,//成功到帐金额为支付商返回金额
								'ingot_status'=>2,//元宝的发放状态
								'handling_state'=>1,//已处理，这里和我们真正的支付不相同
						);
						$Pay->editData($payData['id'],$editData);
						//写日志
						$Pay->writeLog("金额不匹配，下单金额：{$payData['add_money']}，实际金额：{$succMoney}，支付商返回的金额：{$returnMoney}，用户id{$payData['userid']}，定单号：{$payData['order_id']}",'SYSTEM_ERROR');
					} else {
						//修改定单状态，成功成交一笔订单
						$editData = array(
								'pay_status'=>'success',//状态成功
								'sys_remark'=>'成功充值到游戏',
								'reply_order'=>$payData['reply_order'],//支付商定单号
								'succ_money'=>$succMoney,//成功到帐金额
								'ingot_status'=>2,//元宝的发放状态
								'handling_state'=>1,//系统成功处理
						);
						$Pay->editData($payData['id'],$editData);
					}
				} else {//万万分之一的概率
					$editData = array(
						'pay_status'=>'cancel',//状态关闭
						'sys_remark'=>'充值到游戏成功，但定单被关闭',
						'reply_order'=>$payData['reply_order'],//支付商定单号
						'succ_money'=>$succMoney,//成功到帐金额
						'ingot_status'=>2,//元宝的发放状态
						'handling_state'=>1,//系统已将充值金额打款到游戏，此处只是未增加用户消费额和总金额，但这笔交易仍然是成功的，只是“状态关闭”
					);
					$Pay->editData($payData['id'],$editData);
					$Pay->writeLog("用户直充到游戏成功，但修改用户消费数和总金额数失败，无需补差额，定单已被关闭，定单号{$payData['order_id']}，用户id{$payData['userid']}",'SYSTEM_ERROR');
				}
			} else {//true元宝成功发放
				$editData = array(
					'ingot_status'=>1,//元宝成功发放
				);
				$Pay->editData($payData['id'],$editData);
			}
		} else {
			$Pay->writeLog('非法数据被传入，URL：'.__SELF__,'SYSTEM_ERROR');
			exit('非法数据');
		}
		if ($pay_status == 'true') {
			return $this->result(0,$payData);
		} else {
			return $this->result(-10);
		}
		
	}

	/* (non-PHPdoc)
	 * @see Pay::return_url()
	 */
	public function return_url(array $payTypeData) {
		$trade_no = $_GET['order_no'];//混服平台交易号，其实也就是我们自己的交易号
		$Pay = D('Modules/Pay');
		//查询本次定单
		$payData = $Pay->findOneOrder($trade_no);
		if ($payData['ingot_status'] == 1) {
			return $this->result('success','','充值成功，游戏元宝已成功发放！');
		} elseif ($payData['ingot_status'] == 2) {
			return $this->result('error','','充值成功，游戏元宝未成功发放，请联系客服处理！');
		} else {
			return $this->result('error','','未知情况，请联系客服处理！');
		}
	}

	
}
?>