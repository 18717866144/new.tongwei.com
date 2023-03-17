<?php
/**
 * TagLib 内容解析处理
 * @author CHENG
 *
 */
class TagLibHandle {
	public $tags = array();
	
/**
	 * 处理解析内容模型查询的结果
	 * @param array $data
	 * @return array
	 */
	protected function handleContentResult($data) {
		$defaultThumb = explode('|', trim(C('DEFAULT_THUMBNAIL'),'|'));
		$navigate = F('navigate');
		$open_img_server = C('OPEN_ATTACHMENT_SERVER');
		if ($open_img_server) {
			$img_server_type = C('ATTACHMENT_SERVER_TYPE');
			$img_server_url = parse_url(C('ATTACHMENT_SERVER_URL'));
		}
		foreach ($data as &$values) {
			$values['a_title'] = $values['title'];
			/* 标题样式 */
			if (isset($values['style'])) {
				$style = explode('|', $values['style']);
				$style_string = '';
				if (!empty($style[0])) $style_string .= "color:{$style[0]};";
				$style_string .= empty($style[1]) ? '' : 'font-weight:bold;';
				$values['title'] = "<b style='$style_string'>{$values['title']}</b>";
				$values['style_string']  = $style_string;
			}
//			/* 缩略图 */
//			if (isset($values['thumbnail'])) {
//				if (empty($values['thumbnail'])) {
//					if ($this->tags['tbdt']) {
//						$key = array_rand($defaultThumb);
//						$values[$this->tags['tbpx'].'thumbnail'] = $values['thumbnail'] = "__PUBLIC__/images/thumbnail/".$defaultThumb[$key];
//					} else {
//						$values[$this->tags['tbpx'].'thumbnail'] = $values['thumbnail'] = null;
//					}
//				} else {
//					if ($open_img_server) {
//						$a_key = substr(sha1($values['thumbnail']), 0,1);
//						if ($img_server_type == 1) {//随机
//							$values['thumbnail'] = "{$img_server_url['scheme']}://".strstr($img_server_url['host'], '.',true).substr($a_key, 0,1).strstr($img_server_url['host'], '.')."/{$values['thumbnail']}";
//						} else {
//							$values['thumbnail'] = "{$img_server_url['scheme']}://{$img_server_url['host']}/{$values['thumbnail']}";
//						}
//					} else {
//						//$values['thumbnail'] = .$values['thumbnail'];
//					}
//					$values[$this->tags['tbpx'].'thumbnail'] = dirname($values['thumbnail']).'/'.$this->tags['tbpx'].basename($values['thumbnail']);
//				}
//			}
			/* 所属导航 */
			$values['navigate_name'] = $navigate[$values['cid']]['navigate_name'];
			$values['navigate_url'] = $navigate[$values['cid']]['url'];
		}
		return $data;
	}
}
?>