<?php
import('ORG.Com.Pay.Pay');
/**
 * 支付网银充值接口
 * @author CHENG
 *
 */
class AlipayBank extends Pay {
	/* (non-PHPdoc)
	 * @see Pay::pay_to()
	 */
	public function pay_to(array $payData, array $payTypeData) {
		/* 基本配置 */
		$alipay_config = $this->alipay_config($payTypeData);
		/* 数据配置 */
		$payment_type = "1";//支付类型  必填，不能修改
		$notify_url = WEB_URL.$payTypeData['setting']['notify_url'];//服务器异步通知页面路径   需http://格式的完整路径，不能加?id=123这类自定义参数
		$return_url = WEB_URL.$payTypeData['setting']['return_url'];//页面跳转同步通知页面路径  需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
		$seller_email = '13365511711@qq.com';//卖家支付宝帐户  //必填
		$out_trade_no = $payData['order_id']; //商户网站订单系统中唯一订单号，必填
		$subject = 'game_pay';//订单名称  必填
		$total_fee = $payData['add_money'];//付款金额//必填
		$body = 'game_pay';//订单描述
		
		$paymethod = "bankPay";//默认支付方式//必填
		$defaultbank = $_POST['bank_type'];//默认网银
		//商品展示地址
		$show_url = '';
		//需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html
		//防钓鱼时间戳
		$anti_phishing_key = "";
		//若要使用请调用类文件submit中的query_timestamp函数
		//客户端的IP地址
		$exter_invoke_ip = "";
		//非局域网的外网IP地址，如：221.0.0.1
		
		
		/************************************************************/
		
		//构造要请求的参数数组，无需改动
		$parameter = array(
				"service" => "create_direct_pay_by_user",
				"partner" => trim($alipay_config['partner']),
				"payment_type"	=> $payment_type,
				"notify_url"	=> $notify_url,
				"return_url"	=> $return_url,
				"seller_email"	=> $seller_email,
				"out_trade_no"	=> $out_trade_no,
				"subject"	=> $subject,
				"total_fee"	=> $total_fee,
				"body"	=> $body,
				"show_url"	=> $show_url,
				"anti_phishing_key"	=> $anti_phishing_key,
				"exter_invoke_ip"	=> $exter_invoke_ip,
				"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		/* 提交按钮导入 */
		import('ORG.Com.Pay.Alipay.Bank.alipay_submit');
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
		
	}

	/* (non-PHPdoc)
	 * @see Pay::notify_url()
	 */
	public function notify_url(array $payTypeData) {
		$alipay_config = $this->alipay_config($payTypeData);
		import('ORG.Com.Pay.Alipay.Bank.alipay_notify');
		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		if($verify_result) {//验证成功
			//参数获取
			$out_trade_no = $_POST['out_trade_no'];//商户订单号
			$trade_no = $_POST['trade_no'];//支付宝交易号
			$trade_status = $_POST['trade_status'];//交易状态
			$quantity = $_POST['quantity'];//数量
			$price = $_POST['price'];//单价
			$returnMoney = $price * $quantity;//总金额
			//$_POST['trade_status']=>TRADE_FINISHED|TRADE_SUCCESS，虚拟交易都算成功，不分完成交易 和支付成功
			//支付结果
			$payStatus = true;
			//加密签名比对结果
			$signStatus = true;
			//查检定单
			$payResult = parent::check_order($payTypeData, $out_trade_no, $trade_no,$payStatus,$signStatus,$returnMoney);
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
		} else {
			//验证失败fail
			return $this->result(17);
		}
	}

	/* (non-PHPdoc)
	 * @see Pay::return_url()
	 */
	public function return_url(array $payTypeData) {
		$alipay_config = $this->alipay_config($payTypeData);
		import('ORG.Com.Pay.Alipay.Bank.alipay_notify');
		//计算得出通知验证结果
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		if($verify_result) {//验证成功
			$out_trade_no = $_GET['out_trade_no'];//商户订单号
			$trade_no = $_GET['trade_no'];//支付宝交易号
			$trade_status = $_GET['trade_status'];//交易状态
			if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
				//支付商支付结果
				$payStatus = true;
				//加密值
				$signStatus = true;
				return parent::global_return_url($out_trade_no, $payStatus, $signStatus);
			} else {
				echo "trade_status=".$_GET['trade_status'];
			}
		} else {
			//验证失败
			return $this->result(17,'验证失败，请联系客服处理！');
		}		
	}

	
	/* 交易配置 */
	public function alipay_config(array $payTypeData) {
		$alipay_config = array();
		$alipay_config['partner'] = $payTypeData['setting']['account'];//合作身份者id，以2088开头的16位纯数字
		$alipay_config['key']	= $payTypeData['setting']['key'];//安全检验码，以数字和字母组成的32位字符
		$alipay_config['sign_type']    = strtoupper('MD5');
		$alipay_config['input_charset']= strtolower('utf-8');
		$alipay_config['cacert'] = LIBRARY_PATH.'ORG/Com/Pay/Alipay/Timely/cacert.pem';//ca证书路径地址，用于curl中ssl校验
		$alipay_config['transport']    = 'http';
		return $alipay_config;
	}
	
}
?>