<?php
import('ORG.Com.Pay.Pay');
/**
 * 快钱点卡充值
 * @author CHENG
 *
 */
class Cards extends Pay {

	/* (non-PHPdoc)
	 * @see Pay::pay_to()
	 */
	public function pay_to(array $payData, array $payTypeData) {
		$merchantAcctId=$payTypeData['setting']['account'];
		$orderId =$payData['order_id'];
		$orderAmount=$payData['add_money'];
		$payType = $this->payType($payTypeData);
		$bgUrl= WEB_URL.$payTypeData['setting']['notify_url'];
		$pageUrl= WEB_URL.$payTypeData['setting']['return_url'];
		$ext1= 'game_pay';
		$ext2 = 'game_pay';
		$key=$payTypeData['setting']['key'];
		$signMsgVal = "merchantAcctId=$merchantAcctId";
		$signMsgVal .= "&orderId=$orderId";
		$signMsgVal .= "&orderAmount=$orderAmount";
		$signMsgVal .= "&payType=$payType";
		$signMsgVal .= "&pageUrl=$pageUrl";
		$signMsgVal .= "&bgUrl=$bgUrl";
		$signMsgVal .= "&ext1=$ext1";
		$signMsgVal .= "&ext2=$ext2";
		$signMsgVal .= "&key=$key";
		$signMsgMD5 = strtoupper(md5($signMsgVal));
		$signMsgVal = "$signMsgVal&signMsg=$signMsgMD5";
		header('Location:http://222.73.15.116/Pay_gatekq.aspx?'.$signMsgVal);
	}

	/* (non-PHPdoc)
	 * @see Pay::notify_url()
	*/
	public function notify_url(array $payTypeData) {
		$resultData = $this->checkParams($payTypeData);
		/* 定单号基本处理 */
		/* 是否存在，是否处理，支付商完成状态，签名比对结果 */
		//支付结果
		$payStatus = $resultData['payResult'] == 0 ? true : false;
		//加密签名比对结果
		$signStatus = $resultData['signMsg'] === $resultData['signMsgMD5'] ? true : false;
		//支付商金额转换分=>元，扣费率，实际到账金额
		$resultData['payAmount'] = $payTypeData['setting']['pay_rate'] ? floor($resultData['payAmount']*$payTypeData['setting']['pay_rate']) : $resultData['payAmount'];
		//查检定单
		$payResult = parent::check_order($payTypeData, $resultData['orderId'], $resultData['dealId'],$payStatus,$signStatus,$resultData['payAmount']);
		if ($payResult['status'] === 0) {
			$payData = $payResult['data'];
		} else {
			return $payResult;
		}
		//设置费率，取得下单后的可用金额
		$succMoney = $this->set_rate($payTypeData, $payData);
		//公共支付主程序处理
		$status = parent::notify_url_handle($payData,$resultData['payAmount'],$succMoney);
		
		return $this->result($status,$payData);
	}
	
	/* (non-PHPdoc)
	 * @see Pay::return_url()
	*/
	public function return_url(array $payTypeData) {
		$resultData = $this->checkParams($payTypeData);
		//支付商支付结果
		$payStatus = $resultData['payResult'] == 0 ? true : false;
		//加密值
		$signStatus = $resultData['signMsg'] === $resultData['signMsgMD5'] ? true : false;
		return parent::global_return_url($resultData['orderId'], $payStatus, $signStatus);
	}
	
	private function checkParams($payTypeData) {
		$payResult = $_GET['payResult'];//支付结果 0 为成功，3 为失败
		$dealId = $_GET['dealId'];//快钱多卡种订单号
		$merchantAcctId = $_GET['merchantAcctId'];//商户 ID
		$orderId = $_GET['orderId'];//商户请求支付提交的订单号
		$payAmount = $_GET['payAmount'];//实际支付金额
		$cardNumber = $_GET['cardNumber'];//卡号
		$ext1 = $_GET['ext1'];
		$ext2 = $_GET['ext2'];
		$errInfo = empty($_GET['errInfo']) ? '' : $_GET['errInfo'];//支付失败的原因
		$signMsg = $_GET['signMsg'];
		$key = $payTypeData['setting']['key'];
		$signMsgVal = "payResult=$payResult";
		$signMsgVal .= "&dealId=$dealId";
		$signMsgVal .= "&merchantAcctId=$merchantAcctId";
		$signMsgVal .= "&orderId=$orderId";
		$signMsgVal .= "&payAmount=$payAmount";
		$signMsgVal .= "&cardNumber=$cardNumber";
		$signMsgVal .= "&ext1=$ext1";
		$signMsgVal .= "&ext2=$ext2";
		$signMsgVal .= "&key=$key";
		$signMsgMD5 = strtoupper(md5($signMsgVal));
		$resultData = array();
		$resultData['dealId'] = $dealId;
		$resultData['orderId'] = $orderId;
		$resultData['payAmount'] = $payAmount;
		$resultData['signMsgMD5'] = $signMsgMD5;
		$resultData['signMsgVal'] = $signMsgVal;
		$resultData['signMsg'] = $signMsg;
		return $resultData;
		//$resultData['ext2'] = $ext2;//以扩展形式来传递类型
	}
	
	/**
	 * 充值类型设置
	 * @param array $payTypeData
	 * @return string
	 */
	private function payType($payTypeData) {
		switch ($payTypeData['pay_mark']) {
			case 'bill_dk_sd'://快钱盛大点卡充值
				return 'C';
				break;
			case 'bill_dk_zt'://快钱征途点卡充值
				return 'D';
				break;
			case 'bill_dk_wy'://快钱网易点卡充值
				return 'M';
				break;
			case 'bill_dk_sh'://快钱搜狐点卡充值
				return 'N';
				break;
			case 'bill_dk_wm'://快钱完美点卡充值
				return 'U';
				break;
		}
	}
}
?>