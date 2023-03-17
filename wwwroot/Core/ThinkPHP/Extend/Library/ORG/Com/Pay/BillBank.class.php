<?php
import('ORG.Com.Pay.Pay');
/**
 * 快钱网银支付
 * @author CHENG
 *
 */
class BillBank extends Pay {
	/* (non-PHPdoc)
	 * @see Pay::notify_url()
	 */
	public function notify_url(array $payTypeData) {
		//人民币网关账号，该账号为11位人民币网关商户编号+01,该值与提交时相同。
		$kq_check_all_para=$this->check_null($_REQUEST['merchantAcctId'],'merchantAcctId');
		//网关版本，固定值：v2.0,该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['version'],'version');
		//语言种类，1代表中文显示，2代表英文显示。默认为1,该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['language'],'language');
		//签名类型,该值为4，代表PKI加密方式,该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['signType'],'signType');
		//支付方式，一般为00，代表所有的支付方式。如果是银行直连商户，该值为10,该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['payType'],'payType');
		//银行代码，如果payType为00，该值为空；如果payType为10,该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['bankId'],'bankId');
		//商户订单号，,该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['orderId'],'orderId');
		//订单提交时间，格式：yyyyMMddHHmmss，如：20071117020101,该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['orderTime'],'orderTime');
		//订单金额，金额以“分”为单位，商户测试以1分测试即可，切勿以大金额测试,该值与支付时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['orderAmount'],'orderAmount');
		// 快钱交易号，商户每一笔交易都会在快钱生成一个交易号。
		$kq_check_all_para.=$this->check_null($_REQUEST['dealId'],'dealId');
		//银行交易号 ，快钱交易在银行支付时对应的交易号，如果不是通过银行卡支付，则为空
		$kq_check_all_para.=$this->check_null($_REQUEST['bankDealId'],'bankDealId');
		//快钱交易时间，快钱对交易进行处理的时间,格式：yyyyMMddHHmmss，如：20071117020101
		$kq_check_all_para.=$this->check_null($_REQUEST['dealTime'],'dealTime');
		//商户实际支付金额 以分为单位。比方10元，提交时金额应为1000。该金额代表商户快钱账户最终收到的金额。
		$kq_check_all_para.=$this->check_null($_REQUEST['payAmount'],'payAmount');
		//费用，快钱收取商户的手续费，单位为分。
		$kq_check_all_para.=$this->check_null($_REQUEST['fee'],'fee');
		//扩展字段1，该值与提交时相同
		$kq_check_all_para.=$this->check_null($_REQUEST['ext1'],'ext1');
		//扩展字段2，该值与提交时相同。
		$kq_check_all_para.=$this->check_null($_REQUEST['ext2'],'ext2');
		//处理结果， 10支付成功，11 支付失败，00订单申请成功，01 订单申请失败
		$kq_check_all_para.=$this->check_null($_REQUEST['payResult'],'payResult');
		//错误代码 ，请参照《人民币网关接口文档》最后部分的详细解释。
		$kq_check_all_para.=$this->check_null($_REQUEST['errCode'],'errCode');
		
		$trans_body=substr($kq_check_all_para,0,strlen($kq_check_all_para)-1);
		$MAC=base64_decode($_REQUEST['signMsg']);
		$fp = fopen(LIBRARY_PATH.'/ORG/Com/Pay/Bill/Bank/99bill-rsa.pem', 'r');
		$cert = fread($fp, 8192);
		fclose($fp);
		$pubkeyid = openssl_get_publickey($cert);
		$ok = openssl_verify($trans_body, $MAC, $pubkeyid);
		if ($ok == 1) {
			//支付结果
			$payStatus = $_REQUEST['payResult']==10 ? true : false;
			//支付商金额转换分=>元，扣费率，实际到账金额
			$returnMoney = $_REQUEST['payAmount']/100;
			//加密签名比对结果
			$signStatus = true;
			//查检定单
			$payResult = parent::check_order($payTypeData, $_REQUEST['orderId'], $_REQUEST['dealId'], $payStatus, $signStatus, $returnMoney);
			if ($payResult['status'] === 0) {
				$payData = $payResult['data'];
			} else {
				return $payResult;
			}
			//设置费率，取得下单后的可用金额
			$succMoney = $this->set_rate($payTypeData, $payData);
			//公共支付主程序处理
			$status = parent::notify_url_handle($payData,$returnMoney,$succMoney);
			
			return $this->result($status,$payData);
			
		}else{
			$Pay = D('Modules/Pay');
			//查询本次定单
			$payData = $Pay->findOneOrder($_REQUEST['orderId']);
			//修改定单状态
			$editData = array(
					'server_id'=>0,//不管是不充值到游戏，此处如果允值失败，则都表示充值到平台
					'pay_status'=>'failed',//
					'sys_remark'=>'支付验证失败',
					'succ_money'=>0,//成功到帐金额为0
					'reply_order'=>$_REQUEST['dealId'],//支付商定单号
					'handling_state'=>2,//支付验证失败等待处理
			);
			$Pay->editData($payData['id'],$editData);
			$Pay->writeLog("此用户充值失败，原因：快钱支付验证失败，定单号{$payData['order_id']}！");
			return $this->result(-5);//系统支付失败！
		}
	}

	/* (non-PHPdoc)
	 * @see Pay::return_url()
	 */
	public function return_url(array $payTypeData) {
		//支付商支付结果
		$payStatus = $_GET['pay_result'] == 10 ? true : false;
		//加密值，这里默认设置为不拦截，即为true,让后面的读取库来判断处理结果
		$signStatus = true;
		
		return parent::global_return_url($_GET['order_id'], $payStatus, $signStatus);
	}

	/* (non-PHPdoc)
	 * @see Pay::pay_to()
	 */
	public function pay_to(array $payData, array $payTypeData) {
		//人民币网关账号，该账号为11位人民币网关商户编号+01,该参数必填。
		$merchantAcctId = $payTypeData['setting']['account'];
		//编码方式，1代表 UTF-8; 2 代表 GBK; 3代表 GB2312 默认为1,该参数必填。
		$inputCharset = "1";
		//接收支付结果的页面地址，该参数一般置为空即可。
		$pageUrl = "";
		//服务器接收支付结果的后台地址，该参数务必填写，不能为空。
		$bgUrl = WEB_URL.$payTypeData['setting']['notify_url'];
		//网关版本，固定值：v2.0,该参数必填。
		$version =  "v2.0";
		//语言种类，1代表中文显示，2代表英文显示。默认为1,该参数必填。
		$language =  "1";
		//签名类型,该值为4，代表PKI加密方式,该参数必填。
		$signType =  "4";
		//支付人姓名,可以为空。
		$payerName= "";
		//支付人联系类型，1 代表电子邮件方式；2 代表手机联系方式。可以为空。
		$payerContactType =  "1";
		//支付人联系方式，与payerContactType设置对应，payerContactType为1，则填写邮箱地址；payerContactType为2，则填写手机号码。可以为空。
		$payerContact = '';//11599630@qq.com
		//商户订单号，以下采用时间来定义订单号，商户可以根据自己订单号的定义规则来定义该值，不能为空。
		$orderId = $payData['order_id'];
		//订单金额，金额以“分”为单位，商户测试以1分测试即可，切勿以大金额测试。该参数必填。
		$orderAmount = $payData['add_money'] * 100;//分为单位，再乘以100
		//订单提交时间，格式：yyyyMMddHHmmss，如：20071117020101，不能为空。
		$orderTime = date("YmdHis");
		//商品名称，可以为空。
		$productName= "game_pay";
		//商品数量，可以为空。
		$productNum = "1";
		//商品代码，可以为空。
		$productId = "";
		//商品描述，可以为空。
		$productDesc = "";
		//扩展字段1，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
		$ext1 = "";
		//扩展自段2，商户可以传递自己需要的参数，支付完快钱会原值返回，可以为空。
		$ext2 = "";
		//支付方式，一般为00，代表所有的支付方式。如果是银行直连商户，该值为10，必填。
		$payType = "00";
		//银行代码，如果payType为00，该值可以为空；如果payType为10，该值必须填写，具体请参考银行列表。
		$bankId = '';
		//同一订单禁止重复提交标志，实物购物车填1，虚拟产品用0。1代表只能提交一次，0代表在支付不成功情况下可以再提交。可为空。
		$redoFlag = "";
		//快钱合作伙伴的帐户号，即商户编号，可为空。
		$pid = "";
		// signMsg 签名字符串 不可空，生成加密签名串
		
		$kq_all_para=$this->check_null($inputCharset,'inputCharset');
		$kq_all_para.=$this->check_null($pageUrl,"pageUrl");
		$kq_all_para.=$this->check_null($bgUrl,'bgUrl');
		$kq_all_para.=$this->check_null($version,'version');
		$kq_all_para.=$this->check_null($language,'language');
		$kq_all_para.=$this->check_null($signType,'signType');
		$kq_all_para.=$this->check_null($merchantAcctId,'merchantAcctId');
		$kq_all_para.=$this->check_null($payerName,'payerName');
		$kq_all_para.=$this->check_null($payerContactType,'payerContactType');
		$kq_all_para.=$this->check_null($payerContact,'payerContact');
		$kq_all_para.=$this->check_null($orderId,'orderId');
		$kq_all_para.=$this->check_null($orderAmount,'orderAmount');
		$kq_all_para.=$this->check_null($orderTime,'orderTime');
		$kq_all_para.=$this->check_null($productName,'productName');
		$kq_all_para.=$this->check_null($productNum,'productNum');
		$kq_all_para.=$this->check_null($productId,'productId');
		$kq_all_para.=$this->check_null($productDesc,'productDesc');
		$kq_all_para.=$this->check_null($ext1,'ext1');
		$kq_all_para.=$this->check_null($ext2,'ext2');
		$kq_all_para.=$this->check_null($payType,'payType');
		$kq_all_para.=$this->check_null($bankId,'bankId');
		$kq_all_para.=$this->check_null($redoFlag,'redoFlag');
		$kq_all_para.=$this->check_null($pid,'pid');
		$kq_all_para=substr($kq_all_para,0,strlen($kq_all_para)-1);
		
		/////////////  RSA 签名计算 ///////// 开始 //
		$fp = fopen(LIBRARY_PATH.'/ORG/Com/Pay/Bill/Bank/99bill-rsa.pem', 'r');
		$priv_key = fread($fp, 8192);
		fclose($fp);
		$pkeyid = openssl_get_privatekey($priv_key);
		// compute signature
		openssl_sign($kq_all_para, $signMsg, $pkeyid,OPENSSL_ALGO_SHA1);
		// free the key from memory
		openssl_free_key($pkeyid);
		$signMsg = base64_encode($signMsg);
		$postStr = <<<str
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<body>如果无法跳转，请点击下面的按钮，进行跳转<br />
			<form name="kqPay" id="kqPay" action="https://www.99bill.com/gateway/recvMerchantInfoAction.htm" method="post">
				<input type="hidden" name="inputCharset" value="$inputCharset" />
				<input type="hidden" name="pageUrl" value="$pageUrl" />
				<input type="hidden" name="bgUrl" value="$bgUrl" />
				<input type="hidden" name="version" value="$version" />
				<input type="hidden" name="language" value="$language" />
				<input type="hidden" name="signType" value="$signType" />
				<input type="hidden" name="signMsg" value="$signMsg" />
				<input type="hidden" name="merchantAcctId" value="$merchantAcctId" />
				<input type="hidden" name="payerName" value="$payerName" />
				<input type="hidden" name="payerContactType" value="$payerContactType" />
				<input type="hidden" name="payerContact" value="$payerContact" />
				<input type="hidden" name="orderId" value="$orderId" />
				<input type="hidden" name="orderAmount" value="$orderAmount" />
				<input type="hidden" name="orderTime" value="$orderTime" />
				<input type="hidden" name="productName" value="$productName" />
				<input type="hidden" name="productNum" value="$productNum" />
				<input type="hidden" name="productId" value="$productId" />
				<input type="hidden" name="productDesc" value="$productDesc" />
				<input type="hidden" name="ext1" value="$ext1" />
				<input type="hidden" name="ext2" value="$ext2" />
				<input type="hidden" name="payType" value="$payType" />
				<input type="hidden" name="bankId" value="$bankId" />
				<input type="hidden" name="redoFlag" value="$redoFlag" />
				<input type="hidden" name="pid" value="$pid" />
				<input type="button" value="提交">
			</form>
<script type="text/javascript">
document.kqPay.submit();
</script>
</body>
</html>
str;
		echo $postStr;
	}

	
}
?>