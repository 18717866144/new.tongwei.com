<?php
/**
 * 数据中转接口
 * 
 */
class TongxinfenAction extends GlobalAction {
	
	protected $url = 'http://api.tongwei.cn/ApiNews/getNewsForGroup';
		
	public function getNews($type) {
		$data = file_get_contents($this->url.'?type='.$type);		
	}
}
?>