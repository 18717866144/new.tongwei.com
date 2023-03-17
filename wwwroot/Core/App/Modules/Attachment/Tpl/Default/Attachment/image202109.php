<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />

<script type="text/javascript" src="__PUBLIC__/js/uploadify/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/js/uploadify/uploadify.css" />
<link rel="stylesheet" href="__PUBLIC__/modules/attachment/css/basic.css" type="text/css" />

	<div class="navi">
		<a href="javascript:;" class="current">本地上传</a>&nbsp;
		<a href="javascript:;">网络文件</a>&nbsp;
		<?php if (SESSION_TYPE == 1) {?>
		<a href="javascript:;">图库</a>&nbsp;
		<a href="javascript:;" style="display: none">目录浏览</a>
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
			<input type="file" name="file_upload" id="file_upload" />
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
			<fieldset id="swfupload" class="blue pad-10">
				<legend>列表</legend>
				<div class="showList showList3"></div>
				<div class="showPage showPage3"></div>
			</fieldset>
		</div>
		<div class="a_4" style="display: none">
			
		</div>
		<?php }?>
	</div>
<script type="text/javascript">
// ajax全局设置
$.ajaxSetup({async:false,timeout:90000});
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
	if(_index == 3){
		getFilesLists(1);
	}
});

function getFilesLists(p){
	$('.showList3').html('');
	$('.showPage3').html('');
	$.get(
		'{-:U('attachindex/ajax')-}',{s_type:'img',search_content:'img',page:p},function(data){				
				if(data.status == 1){					
					var d = data.data;
					$.each(d[0],function(k,v){
						var _html = '<div class="list"><a href="javascript:;" type="'+v.file_type+'" alt="'+v.file_path+'" id="'+v.id+'" token="'+v.a_key+'"  title="'+v.old_name+'" >';
	        				_html += '<img src="__ROOT__'+v.file_path+'" width="90" height="65"  alt="'+v.old_name+'"  />';
	    	    			_html += '<p style="display:none">&nbsp;&nbsp;</p></a></div>';
						$('.showList3').append(_html);
					});
					var _page='<div id="page">';
					for(var p=1;p<=d[2].totalpage;p++){
						_page += '<a '+(d[2].page == p ? 'class="selfList"':'')+' data-page='+p+'>'+p+'</a>';			
					}
					_page += '</div>';
					
					$('.showPage3').append(_page);
				}
			}
	);
}
$('.showPage3').delegate('#page a', 'click', function(){
	var $this = $(this);
	if( $this.hasClass('selfList') ) return false;
	var page = $this.data('page');
	getFilesLists(page);
});


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
				if(!http_url) {_alert('请输入远程图片网址！');return false;}
// 				发送至服务器
				$.post('__URL__/remote',{http_url:http_url,up_type:'img',ext:'<?php echo $_GET['ext'] ?>',related:'<?php echo $_GET['related']?>'},function(data){
					if(data.status == 'success') {
						$.each(data.data,function(k,v){
							var _html = '<div class="list"><a href="javascript:;" class="on" type="'+v.attachment.file_type+'" alt="'+v.attachment.file_path+'" id="'+v.insert_id+'" token="'+v.attachment.token+'">';
	        				_html += '<img src="__ROOT__'+v.attachment.file_path+'" width="90" height="65" />';
	    	    			_html += '<p>&nbsp;&nbsp;</p></a></div>';
	    	    			$('.showList2').append(_html);
						})
					} else {
						alert(data.info);
						return false;
					}
				},'json');	
			}
// 			取得数据
			var _list = '.showList'+(_index+1);
			var file = '';
			<?php if ($_GET['up_num']== 1) {?>				
				var _path = $(_list+' a[class="on"]').attr('alt');
				var _id = $(_list+' a[class="on"]').attr('id');
				var _token = $(_list+' a[class="on"]').attr('token');
				if(!_path || !_id || !_token) return true;
				file = _path+'|';
				//返回图片的显示，只是有默认图片时适用
//				parent.$('#thumbnail_<?php echo $file_name;?> img').attr({src:'__ROOT__/'+_path,alt:_path});
				var fieldName = '<?php echo $file_name;?>';
				/* info模式 */
				if(fieldName.indexOf(']') > -1 && fieldName.indexOf('[') > -1) {
					var fieldNameArray = fieldName.split('[');
					fieldName = fieldNameArray[1].split(']');
				}
				parent.$('#thumbnail_'+fieldName[0]+' img').attr({src:'__ROOT__'+_path,alt:_path});
				//返回的路径
				//parent.$('[name="<?php echo $file_name; ?>"]').val(_path);//.attr('alt',_path)
				parent.$('[name="<?php echo $file_name; ?>"]').val(_path+'|'+_id+'|'+_token);//.attr('alt',_path)
			<?php } else {?>
				var filesHtml = ''; 
				$(_list+' a[class="on"]').each(function(){
					var _path = $(this).attr('alt');
					var _id = $(this).attr('id');
					var _token = $(this).attr('token');
					if(!_path || !_id || !_token) return true;
					file += _path+'|';
					//此处添加多个列表数据
					filesHtml += '<div><a href="javascript:;" class="remove" onclick="$(this).parent().remove();" title="删除"><img src="/Public/modules/back/images/del.gif"></a> <a href="javascript:;" class="remove" onclick="M_down(this);" title="向下移动"><img src="/Public/modules/back/images/down.gif"></a>  <a href="javascript:;" class="remove" onclick="M_up(this);" title="向上移动"><img src="/Public/modules/back/images/up.gif"></a><ul>';
					filesHtml += '<li><input type="text" onclick="$.CR.G.showIMG(\''+_path+'\')" name="<?php echo $file_name?>[file][]" size="94" readonly="readonly" value="'+_path+'|'+_id+'|'+_token+'" /></li>';
					
					<?php
					if($_GET['is_title']>0){
						for($i=0;$i<$_GET['is_title'];$i++){
					?>
							filesHtml += '<li><input type="text" name="<?php echo $file_name?>[title_<?php echo $i;?>][]" size="94" value=""></li>';
					<?php
						}
					}
					?>
					filesHtml += '<li><textarea name="<?php echo $file_name?>[explan][]" cols="100" rows="1"></textarea></li>';
					filesHtml += '</ul></div>';
				})
				parent.$('#<?php echo $file_name_2;?>_filesLists').append(filesHtml);
			<?php }?>
			file = file.substr(0,file.length-1);
			//	判断是否自动裁剪图片
			<?php if($_GET['crop_type'] == 1) {?> 
				$.post('__URL__/auto_crop',{crop_type:'<?php echo $_GET['crop_type'];?>',crop_mode:'<?php echo $_GET['crop_mode']?>',crop_value:'<?php echo $_GET['crop_value']?>',src:file});
			<?php } ?>
			//判断图片是否需要加水印
			<?php if($_GET['is_water'] == 1) { ?>
				$.post('__URL__/water',{src:file});
			<?php } ?>

			
		},
		focus: true
	},
	{
		name: '关闭'
	});
	//文件上传
	$('#file_upload').uploadify({
		//样式设置
		width:'75',
		height:'28',
		buttonImage:'__PUBLIC__/js/uploadify/swfBnt.png',
		auto     : true,//关闭自动上传
		multi    : true,//允许同时上传多张图片
		removeTimeout : 1,//文件队列上传完成1秒后删除
		uploadLimit : '<?php echo $_GET['up_num'];?>',//一次最多只允许上传10条
		queueID:'fileQueue',//上传框显示的id
		buttonCursor: 'pointer',
		swf      : '__PUBLIC__/js/uploadify/uploadify.swf',
		uploader : '__URL__/public_upload',
		method   : 'post',//方法，服务端可以用$_POST数组获取数据
		formData:{up_type:'img',related:'<?php echo $_GET['related']?>',ext:'<?php echo $_GET['ext']?>',SESSION_ID:'<?php echo session_id();?>'},
		fileTypeDesc : '允许上传的格式为*.<?php echo $allow_type?>;',//允许上传的格式
		fileTypeExts : '*.<?php echo $allow_type;?>;',//限制允许上传的图片后缀*.jpg;*.gif;
		fileSizeLimit : '<?php echo $allow_size;?>',//限制上传的图片不得超过200KB
		onUploadSuccess : function(file, data, response) {//每次成功上传后执行的回调函数，从服务端返回数据到前端
		
    		//var uploadArr = $.parseJSON(data);
			var uploadArr=eval("("+data+")");
			
			
    		if(uploadArr.status == 'success') {
        		var _html = '<div class="list"><a href="javascript:;" class="on" type="'+uploadArr.data.file_type+'" alt="'+uploadArr.data.path+'" id="'+uploadArr.data.id+'" token="'+uploadArr.data.token+'">';
        			_html += '<img src="__ROOT__'+uploadArr.data.path+'" width="90" height="65" />';
    	    		_html += '<p>&nbsp;&nbsp;</p></a></div>';
    	    		$('.showList1').append(_html);
    		}else {
    			uploadErrorArr[i] = uploadArr;
    			i++;
    		}
    	 },
    	 'onQueueComplete' : function(queueData) {//上传队列全部完成后执行的回调函数
  			//上传错误弹出错误信息
			var uploadLength = uploadErrorArr.length;
        	if(uploadLength > 0) {
        			var errorString = '';
	           	for(var k=0;k<uploadLength;k++) {
		           	if(uploadErrorArr[k].data.errorMsg) {
		           		if(!uploadErrorArr[k].data.name) {
		           			errorString += '文件上传失败，失败原因：'+uploadErrorArr[k].data.errorMsg+'<br />';
		           		}else {
		           			errorString += '文件'+uploadErrorArr[k].data.name+'上传失败，失败原因：'+uploadErrorArr[k].data.errorMsg+'<br />';
		           		}
			        } else {
			           	errorString += uploadErrorArr[k].info+'<br />';
				    }
	           	}
          	 	_alert(errorString);
        	}
      	}
    });

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
<include file="./Core/App/Tpl/global_footer.php" />