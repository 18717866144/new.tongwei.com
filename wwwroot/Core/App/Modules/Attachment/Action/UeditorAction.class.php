<?php
/**
 * 关于UEditor编辑器的操作
 * @author CHENG
 *
 */
class UeditorAction extends  AttachmentAction {
	
	private $ueditor_path = '';
	
	private $uploadfolder='/Uploads/';   //上传地址

	private $scrawlfolder='/Uploads/_scrawl/';   //涂鸦保存地址

	private $catchfolder='/Uploads/_catch/';   //远程抓取地址

	private $configpath='./Public/js/Ueditor/php/config.json';
	
	public function index() {
		$this->type = I('get.edit_type');
        date_default_timezone_set("Asia/chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");
        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents($this->configpath)), true);
		$this->config=$CONFIG;
		$action = I('get.action');
		switch ($action) {
			case 'config':
				$result =  json_encode($CONFIG);
				break;
			
				/* 上传图片 */
			case 'uploadimage':
				$result = $this->upload_image();
				break;
				/* 上传涂鸦 */
			case 'uploadscrawl':
				$result = $this->_upload_scrawl();
				break;
				/* 上传视频 */
			case 'uploadvideo':
				$allow = array('allowExtType'=> C('ALLOW_MEDIA_TYPE'),'maxSize'=>'1G');
				
				$up = parent::upload($allow,$this->ueditor_path);	

				if($up[0]['error'] === 0) {
				$up = $up[0];
				$fileInfo = $this->model->addAttachment($up,parent::setParam());
				if ($fileInfo) {
				$old_name = $fileInfo['attachment']['old_name'];
				$url = $fileInfo['attachment']['file_path'];
				$size = $fileInfo['attachment']['file_size'];
				$type = $fileInfo['attachment']['file_type'];
				$state = 'SUCCESS';
				}else {
					$state ='文件上传成功，但未成功写入数据库！';
				}


				}else {
					$state =$up[0]['errorMsg'];
				}
				
				$result = '{"url":"' .$url . '","fileType":"' . $type . '","original":"' . $old_name . '","state":"' . $state . '"}';
					
				break;
				/* 上传文件 */
			case 'uploadfile':
				$result = $this->upload_file();
				break;
		
				/* 列出图片 */
			case 'listimage':
				/* 列出文件 */
			case 'listfile':
				$result = $this->_list($action);
				break;		
				/* 抓取远程文件 */
			case 'catchimage':
				$result = $this->remote_image();
				break;
		
			default:
				$result = json_encode(array('state'=> '请求地址出错'));
				break;
		}
		
		/* 输出结果 */
		if (isset($_GET["callback"]) && false ) {
			if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
				echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
			} else {
				echo json_encode(array(
						'state'=> 'callback参数不合法'
				));
			}
		} else {
			exit($result) ;
		}
	}
	

	private function _upload_scrawl()
	{		
		$data = input('post.' . $this->config ['scrawlFieldName']);
        $url='';
        $title = '';
        $oriName = '';
		if (empty ($data)) {
			$state= 'Scrawl Data Empty!';
		} else {
			$savepath = $this->save_image('png', base64_decode($data), $this->scrawlfolder);
			if ($savepath) {
				$state = 'SUCCESS';
				$url = $savepath;
			} else {
				$state = 'Save scrawl file error!';
			}
		}
		$response=array(
		"state" => $state,
		"url" => $url,
		"title" => $title,
		"original" =>$oriName ,
		);
		return json_encode($response);
	}	

	//抓取远程文件
	private function _upload_catch()
	{
		set_time_limit(0);
		$sret = array(
			'state' => '',
			'list' => null
		);
		$savelist = array();
		$flist = input('post.' . $this->config ['catcherFieldName'].'/a');
		if (empty ($flist)) {
			$sret ['state'] = 'ERROR';
		} else {
			$sret ['state'] = 'SUCCESS';
			foreach ($flist as $f) {
				if (preg_match('/^(http|ftp|https):\\/\\//i', $f)) {
					$ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
					if (in_array('.' . $ext, $this->config ['catcherAllowFiles'])) {
						if ($img = file_get_contents($f)) {

							$savepath = $this->save_image($ext, $img, $this->catchfolder);
							if ($savepath) {
								$savelist [] = array(
									'state' => 'SUCCESS',
									'url' => '/'.$savepath,
									'size' => strlen($img),
									'title' => '',
									'original' => '',
									'source' => htmlspecialchars($f)
								);
							} else {
								$savelist [] = array(
									'state' => 'Save remote file error!',
									'url' => '',
									'size' => '',
									'title' => '',
									'original' => '',
									'source' => htmlspecialchars($f),
								);
							}
				
						} else {
							$savelist [] = array(
							'state' => 'Get remote file error',
							'url' => '',
							'size' => '',
							'title' => '',
							'original' => '',
							'source' => htmlspecialchars($f),
							);
						}
					} else {
						$sret ['state'] = 'File ext not allowed';
					}
				} else {
					$savelist [] = array(
						'state' => 'not remote image',
						'url' => '',
						'size' => '',
						'title' => '',
						'original' => '',
						'source' => htmlspecialchars($f),
					);
				}
			}
			$sret ['list'] = $savelist;
		}
		return json_encode($sret);
	}


	private function save_image($ext = null, $content = null, $path = null)	{
		$newfile = '';
		$path=substr($path,0,2)=='./' ? substr($path,2) :$path;
		$path=substr($path,0,1)=='/' ? substr($path,1) :$path;
		if ($ext && $content) {
		    do {
		        $newfile = $path.str_replace("-","",date('Y-m-d/')) . uniqid() . '.' . $ext;
		    } while (file_exists($newfile));
		    $dir = dirname($newfile);
		    if (!is_dir($dir)) {
		        mkdir($dir, 0777, true);
		    }
		    file_put_contents($newfile, $content);

		    // 图片压缩
			// $img_url='./'.$newfile;    
			// $image = \think\Image::open('./'.$img_url);
			// $image->thumb(700,1400)->save('./'.$img_url);

		}
		return $newfile;
	}


	private function _list($action)	{
		/* 判断类型 */
		switch ($action) {
			/* 列出文件 */
			case 'listfile':
				$allowFiles = $this->config['fileManagerAllowFiles'];
				$listSize = $this->config['fileManagerListSize'];
				$prefix='/';
				break;
			/* 列出图片 */
			case 'listimage':
			default:
				$allowFiles = $this->config['imageManagerAllowFiles'];
				$listSize = $this->config['imageManagerListSize'];
				$prefix='/';
		}
		$allowFiles = substr(str_replace(".", "|", join("", $allowFiles)), 1);
		/* 获取参数 */
		$size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
		$start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
		$end = intval($start) + intval($size);
        $path = '.'.$this->uploadfolder;
        $files = $this->getfiles($path, $allowFiles);
        if (!count($files)) {
            return json_encode(array(
                "state" => "no match file",
                "list" => array(),
                "start" => $start,
                "total" => count($files)
            ));
        }
        /* 获取指定范围的列表 */
        $len = count($files);
        for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
            $list[] = $files[$i];
        }
		/* 返回数据 */
		$result = json_encode(array(
			"state" => "SUCCESS",
			"list" => $list,
			"start" => $start,
			"total" => count($files)
		));
		return $result;
	}
	/**
	 * 遍历获取目录下的指定类型的文件
	 * @param string $path
	 * @param string $allowFiles
	 * @param array $files
	 * @return array
	 */
	private function getfiles($path, $allowFiles, &$files = array()) {

		//dump($path);
		if (!is_dir($path)) return null;
	
		if(substr($path, strlen($path) - 1) != '/') $path .= '/';
		$handle = opendir($path);
		while (false !== ($file = readdir($handle))) {
			if ($file != '.' && $file != '..') {
				$path2 = $path . $file;
				if (is_dir($path2)) {
					$this->getfiles($path2, $allowFiles, $files);
				} else {
					if (preg_match("/\.(".$allowFiles.")$/i", $file)) {
						$files[] = array(
							'url'=> substr($path2,1),
							'mtime'=> filemtime($path2)
						);
					}
				}
			}
		}
		return $files;
	}


	
	
	/* 图片上传 */
	public function upload_image() {
		$allow = array('allowExtType'=>C('ALLOW_IMAGE_TYPE'),'maxSize'=>C('UPLOAD_IMG_SIZE'));
		$up = parent::upload($allow,$this->ueditor_path);
		if($up[0]['error'] === 0) {
			$up = $up[0];			
			$fileInfo = $this->model->addAttachment($up,parent::setParam());
			if ($fileInfo) {
				//加水印
				if (C('EDITOR_IS_WATER')) $this->model->waterIMG($fileInfo['attachment']['file_path']);
				$old_name = $fileInfo['attachment']['old_name'];
				$url = $fileInfo['attachment']['file_path'];
				$size = $fileInfo['attachment']['file_size'];
				$type = $fileInfo['attachment']['file_type'];
				$state = 'SUCCESS';
			}else {
				$state ='文件上传成功，但未成功写入数据库！！！';
			}
		}else {
			$state =$up[0]['errorMsg'];
		}
		$title = '';
		$old_name = '';
		$response=array(
			"state" => $state,
			"url" => $url,
			"title" => $title,
			"original" =>$old_name ,
		);
		echo json_encode($response);
	}
	
	/* 抓取远程图片 */
	public function remote_image() {
		//远程抓取图片配置
		//$dir = mt_rand(0,140);
		$globalPath = UPLOADS_DIR."/{$this->ueditor_path}/$dir/".date(C('UPLOAD_DIR_FORMAT')).'/';
		$imgSavePath = __PATH__."$globalPath";
		$config = array(
			"savePath" => $imgSavePath ,            //保存路径
			"allowFiles" => C('ALLOW_IMAGE_TYPE'), //文件允许格式
			"maxSize" => 3000                    //文件大小限制，单位KB
		);
		$uri = htmlspecialchars( $_POST[ 'upfile' ] );
		$uri = str_replace( "&amp;" , "&" , $uri );
		$this->getRemoteImage( $uri,$config );
	}	
	
	
	public function manage_image($path2='', $files=''){
		$_GET['page'] = $_GET['page']?$_GET['page']:$_POST['page'];
		$data = D('Attachment')->attachmentPage();
		$pics = array();
		foreach($data[0] as $v ){
			$pics[]=$v['file_path'];	
		}		
		$p = implode('ue_separate_ue',$pics);
		$this->ajaxReturn(array('data'=>$p,'pages'=>$data[2]),'ok',1);
	}
	/**
	 * 远程抓取处理
	 * @param $uri
	 * @param $config
	 */
	private function getRemoteImage( $uri,$config)	{
		//忽略抓取时间限制
		set_time_limit( 0 );
		//ue_separate_ue  ue用于传递数据分割符号
		$imgUrls = explode( "ue_separate_ue" , $uri );
		$tmpNames = array();
		foreach ( $imgUrls as $imgUrl ) {
			//http开头验证
			if(strpos($imgUrl,"http")!==0){
				array_push( $tmpNames , "error" );
				continue;
			}
			//获取请求头
			$heads = get_headers( $imgUrl );
			//死链检测
			if ( !( stristr( $heads[ 0 ] , "200" ) && stristr( $heads[ 0 ] , "OK" ) ) ) {
				array_push( $tmpNames , "error" );
				continue;
			}
	
			//格式验证(扩展名验证和Content-Type验证)
			$fileType = strtolower(end(explode('.', $imgUrl)));
			if ( !in_array( $fileType , $config[ 'allowFiles' ] ) || stristr( $heads[ 'Content-Type' ] , "image" ) ) {
				array_push( $tmpNames , "error" );
				continue;
			}
	
			//打开输出缓冲区并获取远程图片
			ob_start();
			$context = stream_context_create(
				array (
					'http' => array (
							'follow_location' => false // don't follow redirects
					)
				)
			);
			//请确保php.ini中的fopen wrappers已经激活
			readfile( $imgUrl,false,$context);
			$img = ob_get_contents();
			ob_end_clean();
	
			//大小验证
			$uriSize = strlen( $img ); //得到图片大小
			$allowSize = 1024 * $config[ 'maxSize' ];
			if ( $uriSize > $allowSize ) {
				array_push( $tmpNames , "error" );
				continue;
			}
			//创建保存位置
			$savePath = $config[ 'savePath' ];
			if ( !file_exists( $savePath ) ) {
				Tool::mkDir( "$savePath");
			}
			//写入文件
			$newName =  md5(uniqid().mt_rand(1,99999)) . strrchr( $imgUrl , '.' );
			$tmpName = $savePath.$newName ;
			try {
				$fp2 = @fopen( $tmpName , "a" );
				fwrite( $fp2 , $img );
				fclose( $fp2 );
				$tmpName_path = str_replace(__PATH__, '', $tmpName);
				array_push( $tmpNames , $tmpName_path  );
				$imgInfo = pathinfo($imgUrl);
				$attachmentArray = array(
					'name'=>$imgInfo['basename'],
					'new_name'=>$newName,
					'size'=>filesize($tmpName),
					'save_path'=>$savePath,
				);
				//扩展数组
				$up_type = $this->checkData('up_type','GET');//上传类型
				$related_table = $this->checkData('related','GET');//关联表
				$ext = $this->checkData('ext','GET',false);//扩展字段
				$Append = array();
				$Append['ext'] = $ext;
				$Append['up_type'] = $up_type;
				$Append['related_table'] = $related_table;
				$Append['is_ueditor'] = 1;
				if (!$this->model->addAttachment($attachmentArray,$Append)) {
					$this->writeLog("抓取远程文件，写入附件表失败！，新文件名：$newName，文件路径 ：$tmpName_path，上传者{$attachmentArray['userid']}");
				}
				//加水印
				if (C('EDITOR_IS_WATER')) $this->model->waterIMG($tmpName_path);
			} catch ( Exception $e ) {
				array_push( $tmpNames , "error" );
			}
		}
		/**
		 * 返回数据格式
		 * {
		 *   'url'   : '新地址一ue_separate_ue新地址二ue_separate_ue新地址三',
		 *   'srcUrl': '原始地址一ue_separate_ue原始地址二ue_separate_ue原始地址三'，
		 *   'tip'   : '状态提示'
		 * }
		 */
		echo "{'url':'" . implode( "ue_separate_ue" , $tmpNames ) . "','tip':'远程图片抓取成功！','srcUrl':'" . $uri . "'}";
	}
	
	/* 上传文件 */
	public function upload_file() {
		$allow = array('allowExtType'=>C('ALLOW_SOFT_TYPE'),'maxSize'=>C('UPLOAD_SOFT_SIZE'));
		$up = parent::upload($allow,$this->ueditor_path);
		if($up[0]['error'] === 0) {
			$up = $up[0];
			$fileInfo = $this->model->addAttachment($up,parent::setParam());
			if ($fileInfo) {
				$old_name = $fileInfo['attachment']['old_name'];
				$url = $fileInfo['attachment']['file_path'];
				$size = $fileInfo['attachment']['file_size'];
				$type = $fileInfo['attachment']['file_type'];
				$state = 'SUCCESS';
			}else {
				$state ='文件上传成功，但未成功写入数据库！';
			}
		}else {
			$state =$up[0]['errorMsg'];
		}
		/**
		 * 向浏览器返回数据json数据
		 * {
		 *   'url'      :'a.rar',        //保存后的文件路径
		 *   'fileType' :'.rar',         //文件描述，对图片来说在前端会添加到title属性上
		 *   'original' :'编辑器.jpg',   //原始文件名
		 *   'state'    :'SUCCESS'       //上传状态，成功时返回SUCCESS,其他任何值将原样返回至图片上传框中
		 * }
		*/
		echo '{"url":"' .$url . '","fileType":"' . $type . '","original":"' . $old_name . '","state":"' . $state . '"}';
	}
}
?>