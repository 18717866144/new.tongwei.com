<?php if (!defined('HX_CMS')) exit();?>
<?php if (!defined('HX_CMS')) exit();?>
<include file="CORE/App/Tpl/global_header.php" />
<script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/uploadify/uploadify.css" />
<link rel="stylesheet" href="__PUBLIC__/modules/attachment/css/basic.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/webuploader-0.1.5/webuploader.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/webuploader-0.1.5/webuploader.css" />
	<div class="navi">
		<a href="javascript:;" class="current">本地上传</a>
		<a href="javascript:;">网络文件</a>
		<?php if (SESSION_TYPE == 1) {?>
		<a href="javascript:;">目录浏览</a>
		<?php }?>
	</div>
	<div class="aMain">
		<div class="desc">
			<ul>
				<li><span class="setDesc">允许上传的文件类型：*.<?php echo $allow_type;?>;</span></li>
				<li><span class="setDesc">一次最多上传&nbsp;<font class="setRed"><?php echo $_GET['up_num']?></font>&nbsp;个附件,单文件最大&nbsp;<font class="setRed"><?php echo $allow_size;?></font>&nbsp;</span></li>
			</ul>
		</div>
		<div class="a_1">
			<!--<input type="file" name="file_upload" id="file_upload" />-->
            <div id="filePicker">选择文件</div>
			<fieldset id="swfupload" class="blue pad-10">
				<legend>列表</legend>
				<div id="fileQueue"></div>
				<div class="showList showList1"></div>
			</fieldset>
		</div>
		<div class="a_2 net" style="display: none">
			<dl>
				<?php if($_GET['up_num'] > 1) { ?>
				<dt>
					<a href="javascript:;" class="Plus">[&nbsp;+&nbsp;]</a>
					<a href="javascript:;" class="Minus">[&nbsp;-&nbsp;]</a>
				</dt>
				<?php }?>
				<dd>请输入网址：<input type="text" class="text" size="60" name="http_url[]" /></dd>
			</dl>
			<fieldset id="swfupload" class="blue pad-10">
				<legend>列表</legend>
				<div id="fileQueue"></div>
				<div class="showList showList2"></div>
			</fieldset>
		</div>
		<?php if (SESSION_TYPE == 1) {?>
		<div class="a_3" style="display: none">
			
		</div>
		<?php }?>
	</div>
<script type="text/javascript">

//net 
$('.net a').click(function(){
	if($(this).attr('class') == 'Plus') {
		$('.net dl dd').length >= 10 ? _alert('一次最多只可添加10个远程文件！') : $('.net dl dd:first').clone().appendTo('.net dl').children('input').val('');
	} else {
		$('.net dl dd').length > 1 ? $('.net dl dd:last').remove() : _alert('内置表单无法移除！');
	}
})
//navi 
$('.navi a').click(function(){
	var _index = $(this).index() + 1;
	$('div[class^="a_"]').hide();
	$('div.a_'+_index).show();
	$(this).addClass('current').siblings('a').removeClass('current');
});
$.ajaxSetup({async:false});
var api = art.dialog.open.api;	// art.dialog.open扩展方法
var parent = art.dialog.opener;	// 父页面window对象
var i=0;//初始化数组下标
var uploadErrorArr = [];

$(function(){
	api.button({
		name: '确定',
		callback: function () {
// 			var fileArray = [];
			var _index = $('.navi a[class="current"]').index();
			if(_index == 1) {
// 				获取远程URL
				var http_url =  '';
				$('[name="http_url[]"]').each(function(){
					var _value = $(this).val();
					http_url += _value ? _value+'|' : ''; 
				});
				http_url = http_url.substr(0,http_url.length-1);
				if(!http_url) {_alert('请输入远程文件地址！');return false;}
// 				发送至服务器
				$.post('__URL__/remote',{http_url:http_url,up_type:'<?php echo $file_type;?>',ext:'<?php echo $_GET['ext'] ?>',related:'<?php echo $_GET['related']?>'},function(data){
					if(data.status == 'success') {
						$.each(data.data,function(k,v){
							var _html = '<div class="list"><a href="javascript:;" class="on" type="'+v.attachment.file_type+'" alt="'+v.attachment.file_path+'" id="'+v.insert_id+'" token="'+v.attachment.token+'">';
	        				_html += '<img src="__PUBLIC__/images/file/'+v.attachment.file_type+'.png" width="90" height="65" />';
	    	    			_html += '<p>&nbsp;&nbsp;</p></a></div>';
	    	    			$('.showList2').append(_html);
						})
					} else {
						alert(data.info);
					}
				},'json');	
			}
// 			取得数据
			<?php if ($_GET['up_num']== 1) {?>
			var _list = '.showList'+(_index+1);
			var filesHtml = ''; 			
			var _path = $(_list+' a[class="on"]').attr('alt');
			var _id = $(_list+' a[class="on"]').attr('id');
			var _token = $(_list+' a[class="on"]').attr('token');
			if(!_path || !_id || !_token) return true;
			parent.$('[name="<?php echo $file_name; ?>"]').val(_path);
			<?php } else {?>
			var _list = '.showList'+(_index+1);
			var filesHtml = ''; 
			$(_list+' a[class="on"]').each(function(){
				var _path = $(this).attr('alt');
				var _id = $(this).attr('id');
				var _token = $(this).attr('token');
				if(!_path || !_id || !_token) return true;
				//此处添加多个列表数据
				filesHtml += '<div><a href="javascript:;" class="remove" onclick="$(this).parent().remove();" title="删除"><img src="/Public/modules/back/images/del.gif"></a> <a href="javascript:;" class="remove" onclick="M_down(this);" title="向下移动"><img src="/Public/modules/back/images/down.gif"></a>  <a href="javascript:;" class="remove" onclick="M_up(this);" title="向上移动"><img src="/Public/modules/back/images/up.gif"></a><ul>';
				filesHtml += '<li><input type="text" name="<?php echo $file_name?>[file][]" size="94" readonly="readonly" value="'+_path+'|'+_id+'|'+_token+'" /></li>';
				filesHtml += '<li><textarea name="<?php echo $file_name?>[explan][]" cols="100" rows="1"></textarea></li>';
				filesHtml += '</ul></div>';
			})
			parent.$('#<?php echo $file_type;?>_filesLists').append(filesHtml);
			<?php }?>
		},
		focus: true
	},
	{
		name: '关闭'
	});
	//文件上传
	//$('#file_upload').uploadify({
	//	//样式设置
	//	width:'75',
	//	height:'28',
	//	buttonImage:'__PUBLIC__/js/uploadify/swfBnt.png',
	//	auto     : true,//关闭自动上传
	//	multi    : true,//允许同时上传多张图片
	//	removeTimeout : 1,//文件队列上传完成1秒后删除
	//	uploadLimit : '<?php //echo $_GET['up_num'];?>//',//一次最多只允许上传10条
	//	queueID:'fileQueue',//上传框显示的id
	//	buttonCursor: 'pointer',
	//	swf      : '__PUBLIC__/js/uploadify/uploadify.swf',
	//	uploader : '__URL__/public_upload',
	//	method   : 'post',//方法，服务端可以用$_POST数组获取数据
	//	formData:{up_type:'<?php //echo $file_type;?>//',related:'<?php //echo $_GET['related']?>//',ext:'<?php //echo $_GET['ext']?>//',SESSION_ID:'<?php //echo session_id();?>//'},
	//	fileTypeDesc : '允许上传的格式为*.<?php //echo $allow_type?>//;',//允许上传的格式
	//	fileTypeExts : '*.<?php //echo $allow_type;?>//;',//限制允许上传的图片后缀*.jpg;*.gif;
	//	fileSizeLimit : '<?php //echo $allow_size;?>//',//限制上传的图片不得超过200KB
	//	onUploadSuccess : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
    //		var uploadArr = $.parseJSON(data);
    //		if(uploadArr.status == 'success') {
    //    		var _html = '<div class="list"><a href="javascript:;" class="on" type="'+uploadArr.data.file_type+'" alt="'+uploadArr.data.path+'" id="'+uploadArr.data.id+'" token="'+uploadArr.data.token+'">';
    //    			_html += '<img src="__PUBLIC__/images/file/'+uploadArr.data.file_type+'.png" width="90" height="65" />';
    //	    		_html += '<p>&nbsp;&nbsp;</p></a></div>';
    //	    		$('.showList1').append(_html);
    //		}else {
    //			uploadErrorArr[i] = uploadArr;
    //			i++;
    //		}
    //	 },
    //	 'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
  	//		//上传错误弹出错误信息
	//		var uploadLength = uploadErrorArr.length;
    //    	if(uploadLength > 0) {
    //    			var errorString = '';
	//           	for(var k=0;k<uploadLength;k++) {
	//	           	if(uploadErrorArr[k].data.errorMsg) {
	//	           		if(!uploadErrorArr[k].data.name) {
	//	           			errorString += '文件上传失败，失败原因：'+uploadErrorArr[k].data.errorMsg+'<br />';
	//	           		}else {
	//	           			errorString += '文件'+uploadErrorArr[k].data.name+'上传失败，失败原因：'+uploadErrorArr[k].data.errorMsg+'<br />';
	//	           		}
	//		        } else {
	//		           	errorString += uploadErrorArr[k].info+'<br />';
	//			    }
	//           	}
    //      	 	_alert(errorString);
    //    	}
    //  	}
    //});

	$('div.showList').on('click','a',function(){
		var _thisNum = 0;
		$('div.showList a').each(function(){
			if($(this).attr('class') == 'on') {_thisNum = _thisNum++;}
		});
		//判断选择是否超过最大附件数
		if(_thisNum > {-$Think.get.up_num-}) {_alert('最多只允许上传{-$Think.get.up_num-}个附件！！！');}
		var _thisClass = $(this).attr('class');
		var _thisId = $(this).children('img').attr('id');
		if(_thisClass == 'on') {
			$(this).children('p').hide();
			$(this).removeClass('on');
		}else {
			$(this).children('p').show();
			$(this).addClass('on');
		}
	});
});
</script>
<script>
    var uploader;
    $(function(){
        //初始化Web Uploader,每上传一个文件都会创建一个uploader对象，同时选择多个文件时，则会创建多个uploader对象。
        uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto: true,     //true时，选择文件后自动上传。
            // swf文件路径
            swf: '__PUBLIC__/webuploader-0.1.5/Uploader.swf',
            // 文件接收服务端。
            server: '__URL__/public_upload',
            // 选择文件的按钮。可选。
            pick: '#filePicker',
            formData:{up_type:'<?php echo $file_type;?>',related:'<?php echo $_GET['related']?>',ext:'<?php echo $_GET['ext']?>',SESSION_ID:'<?php echo session_id();?>'},
            // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
            resize: false
            // 只允许选择图片文件。
            // accept: {
            //     title: 'Images',
            //     extensions: 'gif,jpg,jpeg,bmp,png',
            //     mimeTypes: 'image/*'
            // }
        });

        //给webuploader绑定事件    fileQueued 当文件被加入队列后触发。  file参数表示当前文件对象
        // uploader.on('fileQueued',function (file) {
        //     //生成图片的缩略图   ret表示缩略图的路径
        //     //makeThumb( file, callback, width, height )
        //     uploader.makeThumb(file,function (error, ret ) {
        //         if (error){
        //             alert(file.name+"缩略图生成失败！");
        //         } else{
        //             //将缩略图放入div容器中
        //             var img="<img src=\""+ret+"\" style=\"width: 100px;height: 130px;margin-right: 10px\"/>";
        //             $("#imgs").append(img);
        //         }
        //     }, 100, 130)
        // });

        // 当有文件被添加进队列的时候
        uploader.on( 'fileQueued', function( file ) {
            $("#imgs").append( '<div id="' + file.id + '" class="item">' +
                '<h4 class="info">' + file.name + '</h4>' +
                '<p class="state">等待上传...</p>' +
                '</div>' );
        });

        //给webuploader绑定上传成功事件
        uploader.on("uploadSuccess",function (file,response) {
            /*var value= $("#imgs_path").val();
            if(value.length>0){
                value+="|";
            }
            value+=response.uploadPath;
            $("#imgs_path").val(value);*/
            var uploadArr = response;
            console.log(response.data.file_type);
            if(uploadArr.status == 'success') {
                var _html = '<div><a href="javascript:;" class="on" type="'+uploadArr.data.file_type+'" alt="'+uploadArr.data.path+'" id="'+uploadArr.data.id+'" token="'+uploadArr.data.token+'">';
                _html += uploadArr.data.path;
                _html += '</a></div>';
                $('.showList1').append(_html);
            }else {
                uploadErrorArr[i] = uploadArr;
                i++;
            }
        });

        uploader.on( 'uploadError', function( file , response) {
            $( '#'+file.id ).find('p.state').text('上传出错');
        });

        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress .progress-bar');

            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<div class="progress progress-striped active">' +
                    '<div class="progress-bar" role="progressbar" style="width: 0%">' +
                    '</div>' +
                    '</div>').appendTo( $li ).find('.progress-bar');
            }

            $li.find('p.state').text('上传中');

            $percent.css( 'width', percentage * 100 + '%' );
        });

    })

    //上传图片
    /* function upload_imgs() {
         if (uploader){
             uploader.upload();
         }
     }*/
</script>
<include file="CORE/App/Tpl/global_footer.php" />