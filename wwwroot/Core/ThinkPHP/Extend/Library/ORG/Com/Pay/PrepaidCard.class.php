<?php
import('ORG.Com.Pay.Pay');
/**
 * 快钱充值卡充值
 * @author CHENG
 *
 */
class PrepaidCard extends Pay {
	
	
	/* (non-PHPdoc)
	 * 数据发送
	 * @see Pay::pay_to()
	*/
	public function pay_to(array $payData,array $payTypeData) {
		$inputCharset = 1;///字符集
		$bgUrl = WEB_URL.$payTypeData['setting']['notify_url'];//后台通讯地址
// 		$pageUrl= $payTypeData['return_url'];//前台返回地址,
		$version='v2.0';
		$language=1;
		$signType=1; //加密方式MD5
		$merchantAcctId=$payTypeData['setting']['account'];//收款帐号
		$payerName=$payData['username'];//支付人姓名
// 		$payerContactType='1';//支付人联系方式类型1为email  
// 		$payerContact="";//支付人联系方式
		$orderId=$payData['order_id'];//商户订单号
		$orderAmount=$payData['add_money'] *100;  // 商户订单金额，整型数字 以分为单位。比方 10 元，提交时金额应为 1000
		$payType='42';//支付方式41 代表快钱账户支付 42 代表快钱默认支付方式，目前为卡密支付和快钱账户支付 52 代表卡密支付
// 		$cardNumber='';//充值卡序号  仅在商户定制了卡密直连功能时填写
// 		$cardPwd='';//充值卡密码  仅在商户定制了卡密直连功能时填写
		$fullAmountFlag='0';  //全额支付标示,目前只开放了0
		$orderTime=date('YmdHis');//商户订单提交时间
		$productName='game_pay';//商品名称
		$productNum=1;//商品数目
// 		$productId='';//商品代码
// 		$productDesc='';//商品描述
// 		$ext1='';//扩展字段 1
// 		$ext2='';//扩展字段 2
		$bossType=$this->checkBossType($payTypeData);//充值类型
		$key=$payTypeData['setting']['key'];//商户密码
		
		/* 加密计算 */
		$signMsg = "inputCharset=$inputCharset";
		/* url 拼装*/
		$signMsg .= "&bgUrl=$bgUrl";
// 		$signMsg .= "&pageUrl=$pageUrl";
		$signMsg .= "&version=$version";
		$signMsg .= "&language=$language";
		$signMsg .= "&signType=$signType";
		$signMsg .= "&merchantAcctId=$merchantAcctId";
		$signMsg .= "&payerName=$payerName";
// 		$signMsg .= "&payerContactType=$payerContactType";
// 		$signMsg .= "&payerContact=$payerContact";
		$signMsg .= "&orderId=$orderId";
		$signMsg .= "&orderAmount=$orderAmount";
		$signMsg .= "&payType=$payType";
// 		$signMsg .= "&cardNumber=$cardNumber";
// 		$signMsg .= "&cardPwd=$cardPwd";
		$signMsg .= "&fullAmountFlag=$fullAmountFlag";
		$signMsg .= "&orderTime=$orderTime";
		$signMsg .= "&productName=$productName";
		$signMsg .= "&productNum=$productNum";
// 		$signMsg .= "&productId=$productId";
// 		$signMsg .= "&productDesc=$productDesc";
// 		$signMsg .= "&ext1=$ext1";
// 		$signMsg .= "&ext2=$ext2";
		$signMsg .= "&bossType=$bossType";
		$signMsg .= "&key=$key";
		$signMsgKey = strtoupper(md5($signMsg));
		$signMsg = $signMsg."&signMsg=$signMsgKey";
		$locationStr = 'https://www.99bill.com/szxgateway/recvMerchantInfoAction.htm?'.$signMsg;
		header('Location:'.$locationStr);
	}
	
	public function notify_url(array $payTypeData) {
		$resultData = $this->checkParams($payTypeData);
		/* 定单号基本处理 */
		/* 是否存在，是否处理，支付商完成状态，签名比对结果 */
		//支付结果
		$payStatus = $resultData['payResult'] == 10 ? true : false;
		//加密签名比对结果
		$signStatus = $resultData['signMsg'] === $resultData['signMsgMD5'] ? true : false;
		//支付商金额转换分=>元，扣费率，实际到账金额
		$resultData['payAmount'] = $payTypeData['setting']['pay_rate'] ? floor($resultData['payAmount']*$payTypeData['setting']['pay_rate']/100) : floor($resultData['payAmount']/100);
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
	 
	/**
	 * 返回的页面
	 */
	public function return_url(array $payTypeData) {
		$resultData = $this->checkParams($payTypeData);
		//支付商支付结果
		$payStatus = $resultData['payResult'] == 10 ? true : false;
		//加密值
		$signStatus = $resultData['signMsg'] === $resultData['signMsgMD5'] ? true : false;
		return parent::global_return_url($resultData['orderId'], $payStatus, $signStatus);
	}
	
	/* 验证返回的参数 */
	private function checkParams($payTypeData) {
		$signMsgVal  = $this->check_null($_GET['merchantAcctId'],'merchantAcctId');//提交订单时的快钱账户号保持一致
		$signMsgVal .= $this->check_null($_GET['version'],'version');//网关版本
		$signMsgVal .= $this->check_null($_GET['language'],'language');
		$signMsgVal .= $this->check_null($_GET['payType'],'payType');//支付方式
		$signMsgVal .= $this->check_null($_GET['cardNumber'],'cardNumber');//充值卡序号
		$signMsgVal .= $this->check_null($_GET['cardPwd'],'cardPwd');//充值卡密码
		$signMsgVal .= $this->check_null($_GET['orderId'],'orderId');//商户订单号
		$signMsgVal .= $this->check_null($_GET['orderAmount'],'orderAmount');//商 户 订 单 金额
		$signMsgVal .= $this->check_null($_GET['dealId'],'dealId');//快钱交易号
		$signMsgVal .= $this->check_null($_GET['orderTime'],'orderTime');//商 户 订 单 提交时间
		$signMsgVal .= $this->check_null($_GET['ext1'],'ext1');
		$signMsgVal .= $this->check_null($_GET['ext2'],'ext2');
		$signMsgVal .= $this->check_null($_GET['payAmount'],'payAmount');//订单实际支付金额
		$signMsgVal .= $this->check_null($_GET['billOrderTime'],'billOrderTime');//快钱交易时间
		$signMsgVal .= $this->check_null($_GET['payResult'],'payResult');//处理结果 10成功 11失败
		$signMsgVal .= $this->check_null($_GET['signType'],'signType');//签名类型
		$signMsgVal .= $this->check_null($_GET['bossType'],'bossType');//充值卡类型
		$signMsgVal .= $this->check_null($_GET['receiveBossType'],'receiveBossType');//支付卡类型
		$signMsgVal .= $this->check_null($_GET['receiverAcctId'],'receiverAcctId');//实际收款账号
		$signMsgVal .= "key={$payTypeData['setting']['key']}";///商户卡密
		$signMsgMD5 = strtoupper(md5($signMsgVal));
		$resultData = array();
		$resultData['signMsg'] = $_GET['signMsg'];//快钱返回的签名字符串
		$resultData['signMsgMD5'] = $signMsgMD5;
		$resultData['payResult'] = $_GET['payResult'];
		$resultData['orderId'] = $_GET['orderId'];
		$resultData['dealId'] = $_GET['dealId'];
		$resultData['bossType'] = $_GET['bossType'];
		$resultData['payAmount'] = $_GET['payAmount'];
		$resultData['signMsgVal'] = $signMsgVal;
		return $resultData;
	}
	
	/**
	 * 验证支付类型
	 * @param array $payTypeData
	 */
	private function checkBossType($payTypeData) {
		switch ($payTypeData['pay_mark']) {
			case 'bill_czk_yd'://代表神州行充值卡
				return 0;
				break;
			case 'bill_czk_lt'://1代表联通充值卡
				return 1;
				break;
			case 'bill_czk_dx'://3代表电信充值卡
				return 3;
				break;
			case 'bill_czk_jw'://4 代表骏网一卡通
				return 4;
				break;
			default://代表已开通任一卡类型
				return 9;
				break;
		}
	}

}
?>