<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head">

</block>

<block name="main">
<div id="mainContent" >
	<div class="right slogan-bg">
	    <div class="content_tit">
		  {-$navigate['navigate_name']-} &nbsp;<i class="layui-icon layui-icon-next" style=""></i>
		</div>
		<div class="content clearfix" style="min-height:300px;">
		   <?php 
		   $id=$navigate['id']; 
		   switch($id){	  
			 
			 case 1:
             case 2: echo '<include file=\'./Core/Template/Default/Pc/commons/intro.php\' />' ;break;  
			 case 3: echo '<include file=\'./Core/Template/Default/Pc/commons/chairman.php\' />' ;break; 			 
			 case 4: echo '<include file=\'./Core/Template/Default/Pc/commons/develop.php\' />' ;break;			 
			 case 5: echo '<include file="./Core/Template/Default/Pc/commons/honor.php" />' ;break;			 
			 case 6: echo '<include file=\'./Core/Template/Default/Pc/commons/publics.php\' />' ;break;
			 case 30: echo '<include file=\'./Core/Template/Default/Pc/commons/members.php\' />' ;break;
			 
			 case 7:
             case 8: echo '<include file=\'./Core/Template/Default/Pc/commons/agri.php\' />' ;break; 			 
			 case 9: echo '<include file=\'./Core/Template/Default/Pc/commons/guangfu.php\' />' ;break;			 
			 case 10: echo '<include file=\'./Core/Template/Default/Pc/commons/yuguang.php\' />' ;break;	
             case 11: echo '<include file=\'./Core/Template/Default/Pc/commons/breeds.php\' />' ;break;			 
			 case 12: echo '<include file=\'./Core/Template/Default/Pc/commons/foods.php\' />' ;break;
			 case 13: echo '<include file=\'./Core/Template/Default/Pc/commons/diversified.php\' />' ;break;
			 
			 case 19:
             case 20: echo '<include file=\'./Core/Template/Default/Pc/commons/wenhualinian.php\' />' ;break; 
			 case 21: echo '<include file=\'./Core/Template/Default/Pc/commons/wenhuahuodong.php\' />' ;break;
             case 31: echo '<include file=\'./Core/Template/Default/Pc/commons/pinpai.php\' />' ;break; 	

			 case 25:
             case 26: echo '<include file=\'./Core/Template/Default/Pc/commons/zhaopin.php\' />' ;break; 
			 case 27: echo '<include file=\'./Core/Template/Default/Pc/commons/hrpeiyang.php\' />' ;break; 
			 case 32: echo '<include file=\'./Core/Template/Default/Pc/commons/hrlinian.php\' />' ;break; 
             case 34: echo '<include file=\'./Core/Template/Default/Pc/commons/twschool.php\' />' ;break; 			 
                
			 
		   }
		   
		   
		   ?>			 
		</div>
	</div>
	
	<div class="left ">		
		<include file="./Core/Template/Default/Pc/side.php" />
	</div>	
	<div style="clear:both;"></div>
</div>
</block>