<?php
/**
 * 系统附加模型
 * @author CHENG
 *
 */
class AttachmentModel extends GlobalModel {
	
	/**
	 * 附件添加
	 * @param array $upload
	 * @param array $append
	 * @return boolean|array
	 */
	public function addAttachment($upload,$append = array()) {
		$globalPath = rtrim(str_replace(__PATH__, '', $upload['save_path']),'/');
		$attachmentArr = array();
// 		自定义
		$attachmentArr['userid'] = intval(GBehavior::$session['id']);
		$attachmentArr['is_system'] = SESSION_TYPE;
		$attachmentArr['ext'] = (string) $append['ext'] ;//避免null
		$attachmentArr['related_table'] = $append['related_table'];
		$attachmentArr['is_ueditor'] = $append['is_ueditor'] ? $append['is_ueditor'] : 2;//是否是编辑器上传
		$attachmentArr['old_name'] = $upload['name'] ? $upload['name'] : $upload['old_name'];
// 		是否使用新文件名
		$attachmentArr['new_name'] = $upload['new_name'];
		$attachmentArr['file_path'] = "$globalPath/{$attachmentArr['new_name']}";
		$attachmentArr['file_size'] = $upload['size'] ? $upload['size'] : filesize("{$upload['save_path']}/{$attachmentArr['new_name']}");
		$attachmentArr['file_type'] = end(explode('.',$upload['new_name']));
		$attachmentArr['save_time'] = NOW_TIME;
		$attachmentArr['a_key'] = sha1($attachmentArr['file_path']);
		//入库
		$insertId = $this->data($attachmentArr)->add();
		if ($insertId) {
			$attachmentArr['token'] = Tool::encrypt($insertId.$attachmentArr['file_path']);
			$this->writeLog('附件成功上传，并写入数据库！', 'INFO');
			return array('insert_id'=>$insertId,'attachment'=>$attachmentArr);
		}else {
			$this->writeLog('附件上传成功，但入库失败，', 'SYSTEM_ERROR');
			return false;
		}
	}
	
	/**
	 * 上传附加至远程服务服务器，
	 * 用于搭建远程附件服务器
	 * @param array $uploads
	 * @return Ambigous <NULL, string>|NULL
	 */
	public function uploadRemoteAttachment($uploads) {
		$serverDomain = C('ATTACHMENT_SERVER_URL');
		if (C('OPEN_ATTACHMENT_SERVER')) {
			//域名选择方式
			if (C('IMG_SERVER_TYPE') == 1) {//1随机，2指定
				$urlArray = parse_url($serverDomain);
				$domain = $urlArray['scheme'].'://'.strstr($urlArray['host'], '.',true).substr($uploads['a_key'], 0,1).strstr($urlArray['host'], '.');
				$newUrl = $domain.$urlArray['path'].($urlArray['query'] ? '?'.$urlArray['query'] : '');
			} else {//指定
				$urlArray = parse_url($serverDomain);
				$domain = $urlArray['scheme'].'://'.$urlArray['host'];
				$newUrl = $serverDomain;
			}
			$this->writeLog($newUrl, 'SYSTEM_ERROR');
			//上传文件至远程服务器
			$uploads['file_path'] = str_replace(__PATH__, '', $uploads['file_path']);
			$rundString = String::randString();
			$params = array(
				'file_path'=>'@'.__PATH__.$uploads['file_path'],
				'save_path'=>dirname($uploads['file_path']),
				'file_type'=>implode('|', array_merge((array)C('ALLOW_SOFT_TYPE'),(array)C('ALLOW_IMAGE_TYPE'))),
				'r_string'=>$rundString,
				'acc_tokens'=>Tool::encrypt($rundString),
			);
			$result = CURL::http($serverDomain,$params,'POST');
			//失败写入日志
			($result !== 'success') && $this->writeLog("附件上传至远程文件失败！返回的错误信息：{$result}", 'SYSTEM_ERROR');
			return $result ? $domain : null;
		} else {
			return null;
		}
	}
	
	/**
	 * 图片加水印
	 * @param string $path
	 */
	public function waterIMG($path) {
		if (!file_exists(__PATH__.$path)) return false;
		set_time_limit(90);
		import('ORG.Util.Image.ThinkImage');
		$IMG = new ThinkImage(THINKIMAGE_GD,__PATH__.$path);
		// 		保存原始图片
		$IMG->save(__PATH__.dirname($path).'/bak_'.basename($path));//
		$newFile = __PATH__.$path;
		if (C('WATER_TYPE') == 'text') {
			$offest = C('WATER_TEXT_OFFSET');//偏移量
			$angle = C('WATER_TEXT_ANGLE');//倾斜度
			$color = C('WATER_TEXT_COLOR');
			$size = C('WATER_TEXT_FONT_SIZE');
			$font = __PATH__.'Require/Font/'.C('WATER_TEXT_TTF');
			$text = C('WATER_TEXT');
			switch (C('WATER_POSITION')) {
				case 1:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_NORTHWEST,$offest,$angle)->save($newFile);
					break;
				case 2:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_NORTH,$offest,$angle)->save($newFile);
					break;
				case 3:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_NORTHEAST,$offest,$angle)->save($newFile);
					break;
				case 4:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_WEST,$offest,$angle)->save($newFile);
					break;
				case 5:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_CENTER,$offest,$angle)->save($newFile);
					break;
				case 6:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_EAST,$offest,$angle)->save($newFile);
					break;
				case 7:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_SOUTHWEST,$offest,$angle)->save($newFile);
					break;
				case 8:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_SOUTH,$offest,$angle)->save($newFile);
					break;
				case 9:
					$IMG->text($text,$font,$size,$color,THINKIMAGE_WATER_SOUTHEAST,$offest,$angle)->save($newFile);
					break;
			}
		}else {//image
			$waterIMGPath = __PATH__.'Require/water/'.C('WATER_IMAGE');
			switch (C('WATER_POSITION')) {
				case 1:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_NORTHWEST)->save($newFile);
					break;
				case 2:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_NORTH)->save($newFile);
					break;
				case 3:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_NORTHEAST)->save($newFile);
					break;
				case 4:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_WEST)->save($newFile);
					break;
				case 5:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_CENTER)->save($newFile);
					break;
				case 6:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_EAST)->save($newFile);
					break;
				case 7:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_SOUTHWEST)->save($newFile);
					break;
				case 8:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_SOUTH)->save($newFile);
					break;
				case 9:
					$IMG->water($waterIMGPath,THINKIMAGE_WATER_SOUTHEAST)->save($newFile);
					break;
			}
		}
	}
	
	/**
	 * 图片裁剪
	 * @param string $src
	 * @param numeric $crop_mode
	 * @param array $crop_value =>array(
	 * 							size=>array(width,height),
	 * 							multiple=>1//比例
	 * 						)
	 * @param string $crop_position
	 * @param string $tbpx
	 */
	public function cropIMG($src,$crop_mode,array $crop_value,$crop_position = '',$tbpx = 'small_') {
		if (!file_exists(__PATH__.$src)) return false;
		set_time_limit(90);
		import('ORG.Util.Image.ThinkImage');
		$IMG = new ThinkImage(THINKIMAGE_GD,__PATH__.$src);
		$new_name = __PATH__.dirname($src)."/$tbpx".basename($src);
		$crop_position = empty($crop_position) ? THINKIMAGE_THUMB_CENTER : $crop_position;
		if ($crop_mode == 1) {//尺寸裁剪
			$crop_value = $crop_value['size'];
			$imgWidth = $IMG->width();
			$imgHeight = $IMG->height();
			//宽度超过则为原图宽
			if ($crop_value[0] >= $imgWidth) $crop_value[0] = $imgWidth;
// 			高为0时，则自动为宽的比例
			if (empty($crop_value[1]) || $crop_value[1]==0) $crop_value[1] = round($imgHeight * ($crop_value[0]/$IMG->width()));
// 			本身高度小于指定高度，则为图片高度
			if ($crop_value[1] >= $imgHeight) $crop_value[1] = $imgHeight;
			$IMG->thumb($crop_value[0],$crop_value[1],$crop_position)->save($new_name);
		} else {//比例裁剪
			$crop_value = $crop_value['multiple'];
			if ($crop_value >= 1) $crop_value = 1;//最大尺寸
			$imgWidth = round($IMG->width() * $crop_value);
			$imgHeight = round($IMG->height() * $crop_value);
			$IMG->thumb($imgWidth,$imgHeight,$crop_position)->save($new_name);
		}
		/* //新图片附加入库 */
		$a_key = sha1($src);
		$bigimg = $this->where("a_key='{$a_key}'")->find();
		$append = array(
			'related_table' => $bigimg['related_table'],
			'is_ueditor'=>$bigimg['is_ueditor'],
			'ext'=>$bigimg['ext'],
		);
		$upload = array(
			'save_path'=>dirname($new_name),
			'name'=>basename($src),
			'new_name'=>basename($new_name),
		);
		$this->addAttachment($upload,$append);
		unset($IMG);
	}
	
	/**
	 * 验证Token值
	 * @param array $attach
	 * @return boolean|array
	 */
	public function checkToken($attach) {
		$attachData = explode('|', $attach);
		$token = Tool::encrypt($attachData[1].$attachData[0]);
		return $token == $attachData[2] ? $attachData : false;
	}
	
	/**
	 * 附件删除
	 * @param unknown $a_keys
	 */
	public function deleteAttachment($a_keys) {
		$attachmentData = $this->where("a_key IN($a_keys)")->field('file_path')->select();
		if ($this->where("a_key IN($a_keys)")->delete()) {
			foreach ($attachmentData as $values) {
				@unlink(__PATH__.$values['file_path']);
				$bak_name = 'bak_'.basename($values['file_path']);
				@unlink(__PATH__.dirname($values['file_path'])."/$bak_name");
			}
		}
	}
	
	/**
	 * 
	 * @param 附件存在类型 $url_type
	 * @param 下载的附件token $token
	 * @param 外部链接地址 $external_url
	 * @return boolean
	 */
	public function downAttachment($url_type,$token = '',$external_url = '') {
		if ($url_type == 1) {//本地
			$fileArray = $this->where("a_key='$token'")->field('id,file_path,old_name')->find();
			if (!$fileArray) return false;
			/* 附件下载 */
			//是否开启图片分布式存储
			$open_img_server = C('OPEN_ATTACHMENT_SERVER');
			if ($open_img_server) {
				$img_server_type = C('ATTACHMENT_SERVER_TYPE');
				$img_server_url = parse_url(C('ATTACHMENT_SERVER_URL'));
				if ($img_server_type == 1) {//随机
					$a_key = substr(sha1($fileArray['file_path']), 0,1);
					$file = "{$img_server_url['scheme']}://".strstr($img_server_url['host'], '.',true).substr($a_key, 0,1).strstr($img_server_url['host'], '.')."/{$fileArray['file_path']}";
				} else {
					$file = "{$img_server_url['scheme']}://{$img_server_url['host']}/{$fileArray['file_path']}";
				}
				header("Location:{$file}");
			} else {
				$filename = $fileArray['old_name'];
				$file = __PATH__.$fileArray['file_path'];
				/* 大文件断点下载 */
				header("Content-Description: File Transfer");
				header("Content-type: application/octet-stream");
				//处理中文文件名
				$ua = $_SERVER["HTTP_USER_AGENT"];
				$encoded_filename = rawurlencode($filename);
				if (preg_match("/MSIE/", $ua)) {
					header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
				} else if (preg_match("/Firefox/", $ua)) {
					header("Content-Disposition: attachment; filename*=\"utf8''" . $filename . '"');
				} else {
					header('Content-Disposition: attachment; filename="' . $filename . '"');
				}
				header("Content-Length: ". filesize($file));
				readfile($file);
			}
		} else {//远程
			/* 兼容只传两个参数 $url_type $external_url*/
			$external_url = (func_num_args()==2) ? $token : $external_url;
			$fileArray = array();
			$fileArray['file_path'] = base64_decode($external_url);
			$fileArray['id'] = 0;
			header("Location:{$fileArray['file_path']}");
		}
		return $fileArray;
	}
	
	/**
	 * 附件分页，后台分页
	 * @return array
	 */
	public function attachmentPage($where = array() ) {
		$options = $this->compareGET('a.save_time',array('start_time','end_time'),'time',false);
		if (!empty($_GET['search_content'])) {
			$search_content = Input::getVar($_GET['search_content']);
			$s_type = Input::getVar($_GET['s_type']);
			switch ($s_type) {
				case 'filename':
					$options['where']['a.old_name'] = array('eq',$search_content);
					break;
				case 'u_username':
					//普通用户
					$tempWhere = strpos($search_content, '@') ? 'email' : 'username';
					$userid = $this->table($this->tablePrefix.'member')->where("$tempWhere='$search_content'")->getField('id');
					$options['where']['a.userid'] = array('eq',$userid);
					break;
				case 'a_username':
					$userid = $this->table($this->tablePrefix.'admin')->where("username='$search_content'")->getField('id');
					$options['where']['a.userid'] = array('eq',$userid);
					break;
				case 'img':
					$options['where']['a.file_type'] = array('in',C('ALLOW_IMAGE_TYPE'));
					break;
				case 'media':
					$options['where']['a.file_type'] = array('in',C('ALLOW_MEDIA_TYPE'));
					break;
				case 'soft':
					$options['where']['a.file_type'] = array('in',C('ALLOW_SOFT_TYPE'));
					break;
			}
			$options['url'] .= "&s_type=$s_type&search_content=$search_content";
		}
		$total = $this->table($this->tablePrefix.'attachment AS a')->where($options['where'])->count(1);
		$pageData = array();
		$Page = new Page($total,__ACTION__.'?page={PAGE}'.$options['url']);
		$pageData[0] = $this->where($options['where'])->limit($Page->limit())->table($this->tablePrefix.'attachment AS a')->join("LEFT JOIN {$this->tablePrefix}member AS m ON (m.id=a.userid AND a.is_system=2) LEFT JOIN {$this->tablePrefix}admin AS ad ON (ad.id=a.userid AND a.is_system=1)")->field('a.*,ad.username AS a_username,m.email AS u_email,m.username AS u_username')->order('a.id DESC')->select();
		$pageData[1] = $Page->show();
		$pageData[2] = array( 'totalpage' => ceil($total/20),'total'=>$total,'page'=>max(1,I('page')) );
		return $pageData;
	}
}
?> 