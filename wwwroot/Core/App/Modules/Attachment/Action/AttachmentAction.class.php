<?php
/**
 * 附件上传
 * @author CHENG
 *
 */
class AttachmentAction extends GlobalAction {
	
	protected function _initialize() {
// 		uploadify SESSION 丢失解决方法
		if(isset($_REQUEST['SESSION_ID']) && $_REQUEST['SESSION_ID'] !=session_id()){
			session_destroy();
			session_id($_REQUEST['SESSION_ID']);
			session_start();
		}
		/* 重写父类，此初始化方法，顺序不能变 */
		parent::_initialize();
// 		只有登录用户可访问或者is_uploadify
		if (!GBehavior::$session) {
			$this->writeLog('此IP未登录，尝试访问附件上传模块，严重恶意操作！', 'USER_ERROR');
			$this->error('请先登录再执行本次操作！');
		}
		$this->model = D('Attachment');
	}
	
	/* 设置常规参数 ==> 可能为临时*/
	protected function setParam() {
		$params = $this->checkData(array('up_type','related'),'',false);//上传类型、关联表		
		$up_type = $params['up_type'];
		$related_table = $params['related'];
		//公共类型
		$params = $this->checkData(array('ext','is_ueditor'),'POST',false);//扩展字段、是否是编辑器
		extract($params);
		$Append = array();
		$Append['ext'] = $ext;
		$Append['up_type'] = $up_type;
		$Append['related_table'] = $related_table;
		$Append['is_ueditor'] = $is_ueditor;
		return $Append;
	}
	
	/* 上传图片 */
	public function image() {
		$params = $this->checkData(array('file_name','up_num','related','token'));//表单名、上传的个数、关联表、Token
		extract($params);
		$related_table = $related;
		$params = $this->checkData(array('is_water','crop_type','crop_mode','crop_value','ext'),'GET',false);//是否加水印、裁剪类型、裁剪方式、裁剪值、扩展字段
        extract($params);
		$connect_token = rawurlencode($file_name).$up_num.$is_water.$crop_type.$crop_mode.$crop_value.$related_table;
		// 		比对token值
		if ($token !== Tool::encrypt($connect_token)) {
			$this->writeLog('上传附件图片，参数被恶意修改，可能为恶意操作！', 'USER_ERROR');
			$this->error('非法数据，被拒绝！');
		}
		$allow_type = implode(';*.', C('ALLOW_IMAGE_TYPE'));//允许上传的类型
		$allow_size = C('UPLOAD_IMG_SIZE');//最大允许上传的值
		$this->assign('allow_type',$allow_type);
		$this->assign('allow_size',$allow_size);
		$this->assign('file_name',rawurldecode($file_name));//解码表单名
		preg_match('/\[(.*)\]/isU',rawurldecode($file_name),$temp);
		$this->assign('file_name_2',$temp[1]?$temp[1]:rawurldecode($file_name));//字段名
		$this->display();
	}
	
	/* 上传文件[非图片] */
	public function file() {
		$params = $this->checkData(array('file_name','up_num','related','file_type','token'));//表单名、上传的个数、关联表、token
		extract($params);
		$related_table = $related;
		if ($file_type == 'img') {
			$params = $this->checkData(array('download_link','download_type'));
			extract($params);
			$connect_token = rawurlencode($file_name).$file_type.$up_num.$download_link.$download_type.$related_table;
			$allow_type = implode(';*.', C('ALLOW_IMAGE_TYPE'));//允许上传的类型
			$allow_size = C('UPLOAD_IMG_SIZE');//最大允许上传的值
		}elseif ($file_type == 'soft') {
			$params = $this->checkData(array('download_link','download_type'));
			extract($params);
			$connect_token = rawurlencode($file_name).$file_type.$up_num.$download_link.$download_type.$related_table;
			$allow_type = implode(';*.', C('ALLOW_SOFT_TYPE'));//允许上传的类型
			$allow_size = C('UPLOAD_SOFT_SIZE');//最大允许上传的值
		} elseif ($file_type == 'media') {
			$params = $this->checkData(array('download_link','download_type'));
			extract($params);
			$connect_token = rawurlencode($file_name).$file_type.$up_num.$download_link.$download_type.$related_table;
			$allow_type = implode(';*.', C('ALLOW_MEDIA_TYPE'));//允许上传的类型
			$allow_size = C('UPLOAD_MEDIA_SIZE');//最大允许上传的值
		}
		// 		比对token值
		if ($token !== Tool::encrypt($connect_token)) {
			$this->writeLog('上传附件file_type:'.$file_type.'，参数被恶意修改，可能为恶意操作！', 'USER_ERROR');
			$this->error('非法数据，被拒绝！');
		}	
		$this->assign('file_size_type',I('file_size_type','small'));
		$this->assign('allow_type',$allow_type);
		$this->assign('allow_size',$allow_size);
		$this->assign('file_name',rawurldecode($file_name));//解码表单名
		$this->assign('file_type',$file_type);
		preg_match('/\[(.*)\]/isU',rawurldecode($file_name),$temp);
		$this->assign('file_name_2',$temp[1]?$temp[1]:rawurldecode($file_name));//字段名
		$this->display();
	}
		
	/* 公共上传入口 */
	public function public_upload() {
		$append = $this->setParam();
		if ($append['up_type'] == 'img') {
			$allow = array('allowExtType'=>C('ALLOW_IMAGE_TYPE'),'maxSize'=>C('UPLOAD_IMG_SIZE'));
		}elseif ($append['up_type'] == 'soft') {
			$allow = array('allowExtType'=>C('ALLOW_SOFT_TYPE'),'maxSize'=>C('UPLOAD_SOFT_SIZE'));
		}elseif ($append['up_type'] == 'media') {
			$allow = array('allowExtType'=>C('ALLOW_MEDIA_TYPE'),'maxSize'=>C('UPLOAD_MEDIA_SIZE'));
		}elseif ($append['up_type'] == 'other') {
			$allow = array('allowExtType'=>explode('|', $append['file_type']),'maxSize'=>C('UPLOAD_OTHER_SIZE'));
		}else {}
		$up = $this->upload($allow);
		if ($up[0]['error'] === 0) {
			$up = $up[0];
			$fileInfo = $this->model->addAttachment($up,$append);
			if ($fileInfo) {
				$this->writeLog("文件成功上传，并成功写入附件表！", 'INFO');
				$this->ajaxReturn(array('old_name'=>$fileInfo['attachment']['old_name'],'path'=>$fileInfo['attachment']['file_path'],'id'=>$fileInfo['insert_id'],'file_type'=>$fileInfo['attachment']['file_type'],'token'=>$fileInfo['attachment']['token']),'文件上传成功！','success');
			}else {
				$this->writeLog("文件上传成功，但未成功写入数据库！新图片路径{$fileInfo['attachment']['file_path']}，可能的SQL语句".$this->model->getLastSql(),'SYSTEM_ERROR');
				$this->ajaxReturn('','文件上传失败！','error');
			}
		}else {
			$this->writeLog("添加附件失败！参考原因：{$up[0]['errorMsg']}",'USER_ERROR');
			$this->ajaxReturn($up[0],'文件上传失败！','error');
		}
	}
	
	/* 图片加水印设置 */
	public function water() {
		if (!IS_AJAX) {
			$this->writeLog('此IP尝试访问一个隐藏的AJAX方法','USER_ERROR');
			$this->error(C('NOT_AJAX'));
		}
		$src = explode('|',$_POST['src']);
		foreach ($src as $value) {
			$this->model->waterIMG($value);
		}
	}
	
	/* 公共裁剪图片 */
	public function auto_crop() {
		if (!IS_AJAX) {
			$this->writeLog('此IP尝试访问一个隐藏的AJAX方法','USER_ERROR');
			$this->error(C('NOT_AJAX'));
		}
		$crop_type = $this->checkData('crop_type');
		//非自动裁剪则推出
		if ($crop_type != 1) $this->ajaxReturn('','','error');
		$params = $this->checkData(array('crop_mode','crop_value'));
		extract($params);
		/* 根据裁剪类型传入不同的值 */
		$crop_value = $crop_mode == 1 ? array('size'=>explode('_', $crop_value)) : array('multiple'=>$crop_value);
		$src = $this->checkData('src');
		$src = explode('|',$src);
		foreach ($src as $value) {$this->model->cropIMG($value,$crop_mode,$crop_value);}
	}

	/* 上传图片处理 */
	protected function upload(array $uploadSetting,$dirpath = '') {
		//$dir = mt_rand(0,200);//上传路径
		if ($dirpath) $dirpath = $dirpath.'/';
		$globalPath = UPLOADS_DIR."/$dirpath".date(C('UPLOAD_DIR_FORMAT'));
		$imgSavePath = __PATH__.$globalPath;
		$allow = array('saveFilePath'=>$imgSavePath);
		$allow = array_merge($allow,$uploadSetting);
		$FileUpload = new FileUpload($allow);
		return $FileUpload->upload();
	}
	
	/* 手动图片裁剪 */
	public function manual_crop() {
		if (isset($GLOBALS["HTTP_RAW_POST_DATA"])) {
			//获取图片源及参数
			$new_pic_source = $GLOBALS["HTTP_RAW_POST_DATA"];
			$params = $this->checkData(array('pic_src','related_table'),'GET',false);
			
			if (empty($params['pic_src'])) {
				return false;
			}
			//新文件配置
			$old_pathinfo = pathinfo(__PATH__.$params['pic_src']);
			$upload = array();
			$upload['new_name'] = 'manual_crop_'.$old_pathinfo['basename'];
			$upload['name'] = $old_pathinfo['basename'];
			$upload['save_path'] = $old_pathinfo['dirname'];
			//保存文件
			if (!file_exists($upload['save_path'])) Tool::mkDir($upload['save_path']);
			$result = file_put_contents($upload['save_path'].'/'.$upload['new_name'],$new_pic_source);
			//添加附加
			if ($result) {
				$append = array();
				$append['related_table'] = $params['related_table'];
				$result = $this->model->addAttachment($upload,$append);
				if ($result['insert_id']) {
					echo "{$result['attachment']['file_path']}|{$result['insert_id']}|".Tool::encrypt($result['insert_id'].$result['attachment']['file_path']);
				}
			} else {
				echo '';
			}
		} else {
			$this->display();
		}
	}
	
	/* 远程抓取文件 */
	public function remote() {
		$append = $this->setParam();
		if ($append['up_type'] == 'img') {
			$allow = C('ALLOW_IMAGE_TYPE');
		}elseif ($append['up_type'] == 'soft') {
			$allow = C('ALLOW_SOFT_TYPE');
		}elseif ($append['up_type'] == 'media') {
			$allow = C('ALLOW_MEDIA_TYPE');
		}elseif ($append['up_type'] == 'other') {
			$allow = explode('|', $append['file_type']);
		}else {
				
		}
		$http_url = $this->checkData('http_url');
		$http_urlArray = explode('|',$http_url);
		$fileInfoArray = array();
		foreach ($http_urlArray as $value) {
			$url_info = pathinfo($http_url);
			if (!in_array($url_info['extension'], $allow)) {
				$this->writeLog("此用户上传非允许的扩展名文件！", 'USER_ERROR');
				$this->ajaxReturn('','文件名不在允许的范围！','error');
			}
			$content = Http::fsockopenDownload($value);
			if (!$content) {
				$this->writeLog('无法读取远程文件！', 'SYSTEM_ERROR');
				$this->ajaxReturn('','无法读取远程文件！','error');
			}
			$globalPath = __PATH__.UPLOADS_DIR.'/remote/'.mt_rand(0,140).'/'.date(C('UPLOAD_DIR_FORMAT'));
			if (!file_exists($globalPath)) Tool::mkDir($globalPath);
			$fileName = md5(uniqid().mt_rand(1,99999)).'.'.$url_info['extension'];
			if (file_put_contents($globalPath.'/'.$fileName, $content)) {
				$data = array();
				$data['name'] = $url_info['basename'];
				$data['new_name'] = $fileName;
				$data['size'] = filesize($globalPath.'/'.$fileName) ;
				//这里先这样做，但是去已经下载至服务器，影响服务器性能，应该用curl或fsoke
				if ($data['size'] > Tool::sizeToBytes(C('UPLOAD_IMG_SIZE'))) $this->ajaxReturn('','文件大小超过限制！','error');
				$data['save_path'] = $globalPath;
				$fileInfoArray[] = $this->model->addAttachment($data,$append);
			} else {
				$this->writeLog('成功抓取远程文件，但保存至本地文件失败！', 'SYSTEM_ERROR');
				$this->ajaxReturn('','远程文件上传失败！','error');
			}
		}
		$this->ajaxReturn($fileInfoArray,'文件上传成功！！！','success');
	}
	
	protected function _uploader($guid,$chunk=0,$chunks=1,$type='.mp4'){
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		@set_time_limit(5 * 60);
		$targetDir = './Upload_tmp';
		$_uploadDir='/Uploads'. DIRECTORY_SEPARATOR .date('Y'). DIRECTORY_SEPARATOR .date('md');
		$uploadDir = '.'.$_uploadDir;
		//上传临时文件夹
		if (!file_exists($targetDir)) {
			@mkdir($targetDir);
		}
		//上传文件夹
		if (!file_exists($uploadDir)) {
			@mkdir($uploadDir,0777,true);
		}
		$fileName = $guid;
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
		if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
			return array('state'=>-1,'value'=>'Failed to open output stream.','done'=>false);
		}

		if (!empty($_FILES)) {
			if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
				return array('state'=>-2,'value'=>'Failed to move uploaded file.','done'=>false);
			}
			// Read binary input stream and append it to temp file
			if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
				return array('state'=>-3,'value'=>'Failed to open input stream.','done'=>false);
			}
		} else {
			if (!$in = @fopen("php://input", "rb")) {
				return array('state'=>-4,'value'=>'Failed to open input stream.','done'=>false);
			}
		}

		while ($buff = fread($in, 4096)) {
			fwrite($out, $buff);
		}
		@fclose($out);
		@fclose($in);

		rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

		$index = 0;
		$done = true;
		for( $index; $index < $chunks; $index++ ) {
			if ( !file_exists("{$filePath}_{$index}.part") ) {
				$done = false;
				break;
			}
		}
		$newfilename='';
		if ( $done ) {
			$newfilename=uniqid(time()."_").$type;
			$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $newfilename;
			if (!$out = @fopen($uploadPath, "wb")) {
				return array('state'=>-5,'value'=>'Failed to open output stream.','done'=>false);
			}

			if ( flock($out, LOCK_EX) ) {
				for( $index = 0; $index < $chunks; $index++ ) {
					if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
						break;
					}

					while ($buff = fread($in, 4096)) {
						fwrite($out, $buff);
					}

					@fclose($in);
					@unlink("{$filePath}_{$index}.part");
				}

				flock($out, LOCK_UN);
			}
			@fclose($out);
		}
		return array('state'=>1,'value'=>str_replace("\\","/",$_uploadDir),'filename'=>$newfilename,'done'=>$done);
	}
	public function webuploader(){
		if(!IS_POST){die();}
		//$append = $this->setParam();
		$append = array();
		$append['ext'] = I('get.ext','');
		$append['up_type'] = I('get.up_type');
		$append['related_table'] = I('get.related');
		$append['is_ueditor'] = 2;

		$type='';
		if(!I('get.guid')){
			$this->ajaxReturn('-1','参数不正确！(guid invaild)','error');
		}
		
		switch (I('get.type')){
			case 'video/mp4':$type='.mp4';break;
			case 'video/avi':$type='.avi';break;
			case 'audio/mp3':$type='.mp3';break;
			case 'audio/x-mpegurl':$type='.m3u';break;
			case 'video/x-flv':$type='.flv';break;
			case 'video/x-f4v':$type='.f4v';break;
			case 'application/x-shockwave-flash':$type='.swf';break;
			case 'video/ogg':$type='.ogg';break;
			case 'audio/ogg':$type='.ogg';break;
		}
		if($type==''){
			$this->ajaxReturn('-2','参数不正确！(type invaild)','error');
		}
		
		$chunk = I('get.chunk',0);
		$chunks = I('get.chunks',1);
		//上传视频
		$result=$this->_uploader(I('get.guid'),$chunk,$chunks,$type);
		if($result['state']!=1){
			$this->ajaxReturn('-3','上传文件错误！('.$result['value'].')','error');
		}

		if($result['done']){
			if ($append['up_type'] == 'media') {
				$allow = array('allowExtType'=>C('ALLOW_MEDIA_TYPE'),'maxSize'=>C('UPLOAD_MEDIA_SIZE'));
			}
			$up=array(
				'name'=>I('get.name',''),
				'new_name'=>$result['filename'],
				'size'=>I('get.size'),
				'save_path'=>$result['value']
			);
			$fileInfo = $this->model->addAttachment($up,$append);
			if ($fileInfo) {
				$this->writeLog("文件成功上传，并成功写入附件表！", 'INFO');
				$this->ajaxReturn(array('old_name'=>$fileInfo['attachment']['old_name'],'path'=>$fileInfo['attachment']['file_path'],'id'=>$fileInfo['insert_id'],'file_type'=>$fileInfo['attachment']['file_type'],'token'=>$fileInfo['attachment']['token']),'文件上传完成！','complete');
			}else {
				$this->writeLog("文件上传成功，但未成功写入数据库！新图片路径{$fileInfo['attachment']['file_path']}，可能的SQL语句".$this->model->getLastSql(),'SYSTEM_ERROR');
				$this->ajaxReturn('','文件上传失败！','error');
			}
		}else{
			$this->ajaxReturn('1','上传文件成功','success');
		}
	}
	public function wu_del()
	{
		if(I('post.token') ==Tool::encrypt(I('post.id').I('post.path'))){
			$path=I('post.path');
			if(is_file('.'.$path)){
				@unlink('.'.$path);
			}
			$this->model->where("id=%d and a_key='%s'",I('post.id'),sha1($path))->delete();
			die('1');
		}else{
			die('-1');
		}
	}
}
?>