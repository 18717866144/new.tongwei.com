<?php
/**
 * 数据中转接口，可用于跳转或其它临时显示
 * @author CHENG
 * 
 */
class TransitAction extends GlobalAction {
	
	/* 保存至桌面 */
	public function save_desktop() {
		$Shortcut = "[InternetShortcut]
		URL=".WEB_URL."
		IDList=
		[{000214A0-0000-0000-C000-000000000046}]
		Prop3=19,2
		";
		$ua = $_SERVER["HTTP_USER_AGENT"];
		$filename = WEB_NAME.'.url';
		$encoded_filename = urlencode($filename);
		$encoded_filename = str_replace("+", "%20", $encoded_filename);
		header('Content-Type: application/octet-stream');
		if(preg_match("/MSIE/", $ua)){
			header('Content-Disposition: attachment; filename="'.$encoded_filename.'"');
		}else if(preg_match("/Firefox/", $ua)){
			header('Content-Disposition: attachment; filename*="utf8\'\''.$filename.'"');
		}else{
			header('Content-Disposition: attachment; filename="'.$filename.'"');
		}
		echo $Shortcut;
	}

}
?>