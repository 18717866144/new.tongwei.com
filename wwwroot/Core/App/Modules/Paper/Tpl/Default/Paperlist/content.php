<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />

<div style="border:1px solid #FFBE7A; background:#FFFCED;padding:10px;">
	<strong>{-$paper.title-}</strong> -> <strong>{-$paperList.title-}</strong>
	-> {-$current.layout_number-} {-$current.layout_title-}
</div>
<script type="text/javascript" src="/Public/js/jquery.image-maps/jquery.image-maps5.0.js?20171219"></script>
<link rel="stylesheet" type="text/css" href="/Public/js/jquery.image-maps/imageHotAreaStyle.css">
<style>
#image_map img{ imgorder:1px solid #f1f1f1;box-shadow:0px 0px 5px #dedede}
</style>
<input type="hidden" name="isSave" id="isSave" value="1">
<div class="clearfix hot_area" style="margin: 20px" id="areaContent">
	<input type="hidden" class="" id="hotAreas" name="hotAreas" value=""> 
	
	<div class="left">
		<div name="imageMap" id="image_map" style="padding: 0; display: inline-block;"><img src="{-$current.thumbnail-}" ref="imageMap" id="photo"/></div>		
	</div>
	
	<div class="left" style="margin-left:20px;">
		<p style="padding: 0 0 10px 0px;vertical-align: middle">
		<a id="add_hot_area" href="JavaScript:;" class="sub" style="font-size:16px;">添加热区</a> &nbsp; 
		<a id="save_hot_area" href="JavaScript:;" class="sub" style="font-size:16px; line-height: 16px;">保存热区</a> &nbsp; <span style="color:red;">改动热区信息后请点击保存，否则不存储。</span>
		</p>
		<p id="savestr" style="color:red;padding: 0 0 20px 0px;"></p>
		<form name="saveArea" method="post" action="{-:U('Paperlist/savearea')-}">
		<ul id="areaItems"></ul>
		</form>
	</div>
</div>

<script>
var contentAddUrl = '{-:U('content_add?pid='.$pid.'&lid='.$lid.'&layoutid='.$id)-}';
var contentEditUrl = '{-:U('content_edit?pid='.$pid.'&lid='.$lid.'&layoutid='.$id)-}';
var contentSelectUrl = '{-:U('content_select?pid='.$pid.'&lid='.$lid.'&layoutid='.$id)-}';
var contentDeleteUrl = '{-:U('content_delete?pid='.$pid.'&lid='.$lid.'&layoutid='.$id)-}';

var pid = {-$pid-};
var lid = {-$lid-};
var layoutid = {-$id-};

$(document).ready(function() {	
	var setting = {
		maxAmount:30,
		tag:'li',
		contentAdd : function (ref){
			window.open(contentAddUrl+'?area='+ref);
		},
		contentEdit : function(ref,contentId){
			window.open(contentEditUrl+'?area='+ref+'&id='+contentId);
		},
		contentDelete : function(ref,contentId){
			if(contentId==-1) {
				$('#isSave').val('0');
				var mydate = new Date();				
				isSaveTime = mydate.getHours()+':'+mydate.getMinutes()  +':'+  mydate.getSeconds();
				$('#savestr').html('上次保存时间：'+isSaveTime);
				return false;
			}
			if(ref==1){
				var $o = $('#areaItems');
			}else{
				var $o = $('#areaItems').find('[ref="'+(ref-1)+'"]');
			}
			
			art.dialog({
				icon: 'succeed',
				content: '<font style="font-size:14px;line-height:22px;">热区信息删除成功！<br><span style="color:red">是否同步删除文章数据？<br>请注意，文章一旦删除无法恢复</span></font>',
				lock:true,
				follow:$o[0],
				okVal:'删除文章',
				ok:function () { 					
					$.ajax({
						url:contentDeleteUrl,
						data:{id:contentId,pid:pid,lid:lid,layout:layoutid},
						type:'POST',
						dataType:'json',
						boforeSend:function(){
							art.dialog.tips('数据正在提交...', 10);
						},
						success:function(data){
							_tips(data,false,'tips');
							$('#isSave').val('0');
							var mydate = new Date();				
							isSaveTime = mydate.getHours()+':'+mydate.getMinutes()  +':'+  mydate.getSeconds();
							$('#savestr').html('上次保存时间：'+isSaveTime);
						},
						error:function(){
							art.dialog.tips('发送数据至服务器失败！');
						}						
					});	
				},
				cancelVal:'不删除文章',
				cancel: function(){
					$('#isSave').val('0');
					var mydate = new Date();				
					isSaveTime = mydate.getHours()+':'+mydate.getMinutes()  +':'+  mydate.getSeconds();
					$('#savestr').html('上次保存时间：'+isSaveTime);
				} //为true等价于function(){}
			});			
		},
		contentSelect : function (ref) { 
			var $o = $('#areaItems').find('[ref="'+ref+'"]');
			art.dialog.data('ref',ref);
			art.dialog.open(contentSelectUrl,{title:'选择文章',width:650,height:400,id:'current_layout',lock:true,follow:$o[0]});
			
			/*
			art.dialog({
				title: '已添加文章选择',
				fixed: true,
				id:"content_priview",
				lock: true,
				background:"#CCCCCC",
				opacity:0,
				padding:50,
				content: ref,
				time: 0
			});
			*/
		},
		params:{
			//'areaLink':'添加热区时的默认值',
			//'areaType':'添加热区时的默认值'			
		},
		//proportion:"0.5", //缩放比例
		domCallBack:function(setting,params){
			//console.log(params);
			//return "<td>链接：<input type='text' value='http://bai1du.com'/></td>"
		}
	}

	//初始化加载
	//var areas = "[{'areaTitle':'12', 'areaLink':'./', 'contentId':'1', 'areaMapInfo':'0,0,120,80'},{'areaTitle':'', 'areaLink':'', 'contentId':'2', 'areaMapInfo':'260,13,353,112'}]";
	var areas = '{-$current['content']-}';
	$("#hotAreas").val(areas);

	//$('#hotAreas').val(''); //清空热区数据
	//$('#image_map').imageMaps(setting);
	//imageMaps.originalManual("./size.jpg",setting,true);
	
	imageMaps.proportionNoSameManual("{-$current.thumbnail-}",setting,1,1,true);
	
	//保存热区数据
	$('form[name="saveArea"]').submit(function(){
		var dataArray = $(this).serializeArray();
		dataArray.push({name:'pid', value:pid });
		dataArray.push({name:'lid', value:lid });
		dataArray.push({name:'layoutid', value:layoutid });
		
		var $form = $(this);
		var url = $form.attr('action');
		
		console.log('form.submit');
		
		$.ajax({
			url:url,
			data:dataArray,
			type:'POST',
			dataType:'json',
			boforeSend:function(){
				art.dialog.tips('数据正在提交...', 10);
			},
			success:function(data){
				_tips(data,false,'tips');
				$('#isSave').val('1');
				var mydate = new Date();				
				isSaveTime = mydate.getHours()+':'+mydate.getMinutes()  +':'+  mydate.getSeconds();
				$('#savestr').html('上次保存时间：'+isSaveTime);
			},
			error:function(){
				art.dialog.tips('发送数据至服务器失败！');
			}
		});		
		return false;
	});
	
	//保存按钮事件
	$('#save_hot_area').click(function(){
		$('form[name="saveArea"]').submit();
		console.log('save_hot_area.click');
	});
		
	//检查保存状态定时保存，主要为文章添加后修改后，热区信息变更自动保存待实现
	var isSave;
	var isSaveNum=0;
	var isSaveTime;
	setInterval(function(){
		isSave = $('#isSave').val();
		if(isSave==0){
			$('#save_hot_area').click();
			console.log('isSave'+'--isSaveNum:'+isSaveNum);
		}
		isSaveNum++;
	},2000);
	
	/*
	$(window).bind('beforeunload',function(){	
		art.dialog({title: '提醒',content:'<h1>您即将离开页面，请确认是否保存热区信息。</h1>',fixed: true,lock:true,background:"#CCCCCC",opacity:0.9,padding:'20px',time: 0});
		return false;
	});	
	*/
});
</script>
<include file="./Core/App/Tpl/global_footer.php" />