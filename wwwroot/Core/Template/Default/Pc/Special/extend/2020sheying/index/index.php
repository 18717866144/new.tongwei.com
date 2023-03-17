<extend name="./Core/Template/Default/Pc/Special/extend/2020sheying/base.php" />
<block name="main">
<style>
 .layui-layer{box-shadow:none;}
</style>
<div class="wrap clearfix">
    <!--
    <div class="lft_img">
	  <img src="/skins/special/2020sheying/2020sheying_1.jpg">
	</div>
	-->
    <div class="hdjj">
        <div class="zw_bt">活动简介<span>Activity profile</span></div>
        <div class="zw_hdjj">根据通威发〔2020〕4号文件《通威集团2020年企业文化建设工作实施方案》的通知精神，为进一步激发和坚定全体员工与企业共进步、同发展的信心和热情，展现通威人风采，推动文化落地，集团现正式启动2020年通威“聚焦执行力”摄影比赛，全体通威员工均可积极投稿参与。4-11月集团总共进行4期摄影作品评选，每期评选出9张优秀作品，纳入年度总评选范围，最终评出20张优秀作品，并在年度企业文化收官活动上对获奖者给予表彰。同时，评选出的优秀作品，将在集团官网、《通威报》等开设专栏进行展示。</div>
    </div>
    
</div>

<?php

if(isset($_GET["act"]) && $_GET["act"] == "preview"){
 ?>
 <?php } ?>
  <div class="show clearfix" id="4th">
    <div class="zw_bt">第四期作品展示<span>4th SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
			<sql sql="select * from h_special_content where a_status=1 and typeid=4 and specialid={$specialid} order by sort desc,id desc limit 200">
			
			<li class="news-block" <?php if($i%3 == 0) echo 'style="margin-right:0px;"'; ?>>
              <div class="desp">
			    <div class="desp-content">{-$values['description']-}</div>
				<div class="view"><span class="view-btn" data="{-$values['thumbnail']-}">查看大图</span></div>
			  </div>			
			  <div class="summary">            
	        	<div class="h1">{-$values['title']-}</div>            
	        	<div class="h3" style="background:url({-$values['thumbnail']-}) no-repeat center;background-size:270px auto;"></div>  
	          </div>
			  <div class="date-block">
				<span class="day">{-$values['author']-}</span>
				<span class="month">{-$values['source']-}</span>		
        	  </div>			  
			</li> 
		
			 </sql>
			
        </ul>
    </div>
</div>
 

 
 <div class="show clearfix" id="3rd">
    <div class="zw_bt">第三期作品展示<span>3rd SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
			<sql sql="select * from h_special_content where a_status=1 and typeid=3 and specialid={$specialid} order by sort desc,id desc limit 200">
			
			<li class="news-block" <?php if($i%3 == 0) echo 'style="margin-right:0px;"'; ?>>
              <div class="desp">
			    <div class="desp-content">{-$values['description']-}</div>
				<div class="view"><span class="view-btn" data="{-$values['thumbnail']-}">查看大图</span></div>
			  </div>			
			  <div class="summary">            
	        	<div class="h1">{-$values['title']-}</div>            
	        	<div class="h3" style="background:url({-$values['thumbnail']-}) no-repeat center;background-size:270px auto;"></div>  
	          </div>
			  <div class="date-block">
				<span class="day">{-$values['author']-}</span>
				<span class="month">{-$values['source']-}</span>		
        	  </div>			  
			</li> 
		
			 </sql>
			
        </ul>
    </div>
</div>

 
 <div class="show clearfix" id="2st">
    <div class="zw_bt">第二期作品展示<span>2nd SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
			<sql sql="select * from h_special_content where a_status=1 and typeid=2 and specialid={$specialid} order by sort desc,id desc limit 200">
			
			<li class="news-block" <?php if($i%3 == 0) echo 'style="margin-right:0px;"'; ?>>
              <div class="desp">
			    <div class="desp-content">{-$values['description']-}</div>
				<div class="view"><span class="view-btn" data="{-$values['thumbnail']-}">查看大图</span></div>
			  </div>			
			  <div class="summary">            
	        	<div class="h1">{-$values['title']-}</div>            
	        	<div class="h3" style="background:url({-$values['thumbnail']-}) no-repeat center;background-size:270px auto;"></div>  
	          </div>
			  <div class="date-block">
				<span class="day">{-$values['author']-}</span>
				<span class="month">{-$values['source']-}</span>		
        	  </div>			  
			</li> 
		
			 </sql>
			
        </ul>
    </div>
</div>
 
 
 <div class="show clearfix" id="1st">
    <div class="zw_bt">第一期作品展示<span>1ST SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
			<sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 200">
			
			<li class="news-block" <?php if($i%3 == 0) echo 'style="margin-right:0px;"'; ?>>
              <div class="desp">
			    <div class="desp-content">{-$values['description']-}</div>
				<div class="view"><span class="view-btn" data="{-$values['thumbnail']-}">查看大图</span></div>
			  </div>			
			  <div class="summary">            
	        	<div class="h1">{-$values['title']-}</div>            
	        	<div class="h3" style="background:url({-$values['thumbnail']-}) no-repeat center;background-size:270px auto;"></div>  
	          </div>
			  <div class="date-block">
				<span class="day">{-$values['author']-}</span>
				<span class="month">{-$values['source']-}</span>		
        	  </div>			  
			</li> 
		
			 </sql>
			
        </ul>
    </div>
</div>



<script>
   $(document).ready(function(){
	   
	   var screenHeight = $(window).height() - 50;	   
	   
	   $('.news-block .desp .view-btn').click(function(){
	   
	       var src = $(this).attr('data');
		   layer.open({
			   type:1,
			   title:false,
			   shade:0.7,
			   scrollbar:false,
			   skin:'layui-layer-nobg',
			   area:['auto'],
			   shadeClose:false,
			   content:'<img src="'+src+'" style="max-height:'+screenHeight+'px;">'
			   
		   });
	   
       });
	   
   });

</script>
<div style="text-align: center; line-height: 30px; padding: 20px 0px;"></div>
</block>