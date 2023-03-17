<?php
import('ORG.Com.Pay.Pay');
/**
 * 平台支付
 * @author CHENG
 *
 */
class PlatPay  extends Pay {
	/* (non-PHPdoc)
	 * @see Pay::notify_url()
	 */
	public function notify_url(array $payData) {
		//增加支付商定单号
		$payData['reply_order']=$payData['order_id'];
		//实充金额
		$payData['succ_money'] = $payData['add_money'];
		//公共支付主程序处理
		$status = parent::notify_url_handle($payData,$payData['add_money'],$payData['add_money']);
		return $this->result($status,$payData);
	}

	/* (non-PHPdoc)
	 * @see Pay::return_url()
	 */
	public function return_url(array $payData) {
		return parent::global_return_url($payData['order_id'], true, true);
	}

	/* (non-PHPdoc)
	 * @see Pay::pay_to()
	 */
	public function pay_to(array $payData, array $payTypeData) {
		return true;		
	}

	
}
?>