<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"></block>

<block name="main">

<div id="mainContent" >
	<div class="right slogan-bg" style="width:1230px;">
	    <div class="content_tit">
		  {-$navigate['navigate_name']-} &nbsp;<i class="layui-icon layui-icon-next" style=""></i>
		</div>
		<div class="content clearfix">
			<div style="width:380px;float:left;">
			  <p>总部地址：中国·四川·成都·天府大道中段588号</p>
			 
			  <p>邮编：610093</p>
			  <p>电话：+86-28-8518 8888</p>
			  <p>传真：+86-28-8519 9999</p>
			  <p style="margin-top:30px;"><img src="/Public/twnew/contact_hotline.png" style="height:18px;"/></p>
			  <p style="font-size:18px;font-weight:bold;">800-8866888 &nbsp;&nbsp;400-8080888</p>
			  <p><img src="/Public/twnew/contact_gz.png" style="height:18px;"/></p>
			  <p><img src="/Public/twnew/erweima.png" style="width:130px;"/></p>
			</div>	
			<div style="width:850px;height:380px;overflow:hidden;float:right">
			 <a href="https://map.baidu.com/poi/%E9%80%9A%E5%A8%81%E5%9B%BD%E9%99%85%E4%B8%AD%E5%BF%83/@11585670.755611815,3553345.775,19z?uid=d66aa490b71e68d1aeb22a25&info_merge=1&isBizPoi=false&ugc_type=3&ugc_ver=1&device_ratio=1&compat=1&querytype=detailConInfo&da_src=shareurl" target="_blank">
			 <img src="/Public/twnew/contact_map.jpg" style="width:100%;">
			 </a>
			</div>
		</div>
	</div>
	
	
	<div style="clear:both;"></div>
</div>

</block>