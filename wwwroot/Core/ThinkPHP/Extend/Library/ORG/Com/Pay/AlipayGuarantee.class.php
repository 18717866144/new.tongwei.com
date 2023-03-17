<?php
import('ORG.Com.Pay.Pay');
/**
 * 支付宝担保交易
 * @author CHENG
 *
 */
class AlipayGuarantee extends Pay {
	/* (non-PHPdoc)
	 * @see Pay::notify_url()
	 */
	public function notify_url(array $payTypeData) {
		$alipay_config = $this->alipay_config($payTypeData);
		//notify_return验证导入/计算得出通知验证结果
		require LIBRARY_PATH.'ORG/Com/Pay/Alipay/Guarantee/alipay_notify.class.php';
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		$Pay = D('Modules/Pay');
		if($verify_result) {//验证成功
			echo "success";//返回数据给支付宝
			//参数获取
			$out_trade_no = $_POST['out_trade_no'];//商户订单号
			$trade_no = $_POST['trade_no'];//支付宝交易号
			$trade_status = $_POST['trade_status'];//交易状态
			$quantity = $_POST['quantity'];//数量
			$price = $_POST['price'];//单价
			$allMoney = $price * $quantity;//总金额
			
			//查询本次定单
			$payData = $Pay->findOneOrder($out_trade_no);
			if (!$payData) {
				$Pay->writeLog("定单号不存在，支付类型：{$payTypeData['pay_mark']}",'SYSTEM_ERROR');
				return $this->result(-1);//快钱返回的定单号不存在
			}
			
			//增加支付商定单号
			$payData['reply_order']=$trade_no;
			
			//设置费率，取得最后到帐金额
			if ($payTypeData['setting']['charges'] == 1) {//比历
				$succMoney =  floor($payData['add_money']*$payTypeData['setting']['pay_rate']);
			} else {//固定金额
				$succMoney = $payData['add_money'] - $payTypeData['setting']['pay_rate'];
			}
			
			$status = parent::notify_url_handle($payData,$allMoney,$succMoney);
			return $this->result($status,$payData);
		} else {
			//验证失败
			$Pay->writeLog("支付失败，支付宝验证失败，结果".$verify_result."，支付类型：{$payTypeData['pay_mark']}",'SYSTEM_ERROR');
			file_put_contents('bbb.php', $Pay->getLastSql());
			echo "fail";
			//调试用，写文本函数记录程序运行情况是否正常
			//logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
		}		
	}

	/* (non-PHPdoc)
	 * @see Pay::return_url()
	 */
	public function return_url(array $payTypeData) {
		
		
		//数据签名验证
		$alipay_config = $this->alipay_config($payTypeData);
		//notify_return验证导入
		require LIBRARY_PATH.'ORG/Com/Pay/Alipay/Guarantee/alipay_notify.class.php';
		$alipayNotify = new AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		
		if($verify_result) {//验证成功
			$out_trade_no = $_GET['out_trade_no'];//商户订单号
			$trade_no = $_GET['trade_no'];//支付宝交易号
			$trade_status = $_GET['trade_status'];//交易状态
			
			$Pay = D('Modules/Pay');
			
			//判断该笔订单是否在商户网站中已经做过处理
			if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
				//查询本次定单
				$payData = $Pay->findOneOrder($out_trade_no);
				switch ($payData) {
					case 'success':
						return $this->result('success','','充值成功！');
						break;
					case 'error':
						return $this->result('success','','充值失败，请联系客服处理！');
						break;
					case 'not_equal':
						return $this->result('not_equal','','充值失败，金额不匹配，请联系客服处理！');
						break;
					case 'lock':
						return $this->result('lock','','充值失败，此定单被锁定，请联系客服处理！');
						break;
				}
			} else {
				$Pay->writeLog("支付失败，支付宝返回状态：{$_GET['trade_status']}",'SYSTEM_ERROR');
				$this->result('failed','','充值失败，请联系客服处理！');
			}
		} else {
			//验证失败
			//如要调试，请看alipay_notify.php页面的verifyReturn函数
			$this->result('failed','','充值失败，请联系支付平台处理！');
		}		
	}

	/* (non-PHPdoc)
	 * @see Pay::pay_to()
	 */
	public function pay_to(array $payData, array $payTypeData) {
		/* 基本配置 */
		$alipay_config = $this->alipay_config($payTypeData);
		/* 提交按钮导入 */
		import('ORG.Com.Pay.Alipay.Guarantee.alipay_submit');
		/* 参数配置 */
		$payment_type = "1";//支付类型必填，不能修改
		$notify_url = $payTypeData['setting']['notify_url'];//需http://格式的完整路径，不能加?id=123这类自定义参数
		$return_url = $payTypeData['setting']['return_url'];//页面跳转同步通知页面路径/需http://格式的完整路径，不能加?id=123这类自定义参数，不能写成http://localhost/
		$seller_email = '18715155081';//卖家支付宝帐户
		$out_trade_no = $payData['order_id'];//商户订单号//商户网站订单系统中唯一订单号，必填
		$subject = 'game_pay';//订单名称
		$price = $payData['add_money'];//付款金额
		$quantity = "1";//商品数量//必填，建议默认为1，不改变值，把一次交易看成是一次下订单而非购买一件商品
		$logistics_fee = "0.00";//物流费用//必填，即运费
		$logistics_type = "EXPRESS";//物流类型 必填，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
		$logistics_payment = "SELLER_PAY";//物流支付方式//必填，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）
		$body = '游戏付款';//订单描述
		$show_url = '';//商品展示地址 //需以http://开头的完整路径，如：http://www.xxx.com/myorder.html
		$receive_name = '虚拟交易';//收货人姓名  如：张三
		$receive_address = '虚拟交易，无地址';//收货人地址
		$receive_zip = '230000';//收货人邮编
		$receive_phone = '';//收货人电话号码   0571-88158090
		$receive_mobile = '18715155081';//收货人手机号码 如：13312341234
		/************************************************************/
		//构造要请求的参数数组，无需改动
		$parameter = array(
			"service" => "create_partner_trade_by_buyer",
			"partner" => trim($alipay_config['partner']),
			"payment_type"	=> $payment_type,
			"notify_url"	=> $notify_url,
			"return_url"	=> $return_url,
			"seller_email"	=> $seller_email,
			"out_trade_no"	=> $out_trade_no,
			"subject"	=> $subject,
			"price"	=> $price,
			"quantity"	=> $quantity,
			"logistics_fee"	=> $logistics_fee,
			"logistics_type"	=> $logistics_type,
			"logistics_payment"	=> $logistics_payment,
			"body"	=> $body,
			"show_url"	=> $show_url,
			"receive_name"	=> $receive_name,
			"receive_address"	=> $receive_address,
			"receive_zip"	=> $receive_zip,
			"receive_phone"	=> $receive_phone,
			"receive_mobile"	=> $receive_mobile,
			"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
		);
		//建立请求
		$alipaySubmit = new AlipaySubmit($alipay_config);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
	}
	
	/* 担保交易配置 */
	public function alipay_config(array $payTypeData) {
		header("Content-type: text/html; charset=utf-8");
		$alipay_config = array();
		$alipay_config['partner'] = $payTypeData['setting']['account'];//合作身份者id，以2088开头的16位纯数字
		$alipay_config['key']	= $payTypeData['setting']['key'];//安全检验码，以数字和字母组成的32位字符
		$alipay_config['sign_type']    = strtoupper('MD5');//签名方式 不需修改
		$alipay_config['input_charset']= strtolower('utf-8');//字符编码格式 目前支持 gbk 或 utf-8
		$alipay_config['cacert']    = LIBRARY_PATH.'ORG/Com/Pay/Alipay/Guarantee/cacert.pem';//ca证书路径地址，用于curl中ssl校验
		$alipay_config['transport']    = 'http';//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		return $alipay_config;
	}
}
?>