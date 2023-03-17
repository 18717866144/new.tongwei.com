<extend name="./Core/Template/Default/Pc/Special/extend/2021zhengwen/base.php" />
<block name="main">
<div class="wrap clearfix">
    <!--
    <div class="lft_img">
	  <img src="/skins/special/2020zhengwen/2020zhengwen_1.jpg">
	</div>
	-->
    <div class="hdjj">
        <div class="zw_bt">活动简介<span>Activity profile</span></div>
        <div class="zw_hdjj">根据通威发〔2021〕7号文件《通威集团2021年企业文化建设工作实施方案》的通知精神，为进一步激发和坚定全体员工与企业共进步、同发展的信心和热情，展现通威人风采，推动文化落地，集团现正式启动2021年“表率是最好的领导方法”主题征文活动，全体通威员工均可积极投稿参与。4-11月集团总共进行4期征文评选，每期评选出8篇优秀文章，纳入年度总评选范围，最终评出20篇优秀文章，并在年度企业文化收官活动上对获奖者给予表彰。同时，评选出的优秀征文，将在集团官网、《通威报》等开设专栏进行展示，并整理、编撰后，收录进2021年度通威集团企业文化征文汇编中。</div>
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
			
			<li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html">
				{-$values['title']-}
				</a>
				</div>   
                <div class="h2">{-$values['author']-} / {-$values['source']-}</div>				
	        	<div class="h3">{-$values['description']-}</div>  
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
			
			<li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html">
				{-$values['title']-}
				</a>
				</div>   
                <div class="h2">{-$values['author']-} / {-$values['source']-}</div>				
	        	<div class="h3">{-$values['description']-}</div>  
	          </div>			  			  
			</li> 
			
			 </sql>
			
        </ul>
    </div>
</div>


 
 <div class="show clearfix" id="2nd">
    <div class="zw_bt">第二期作品展示<span>2nd SHOWCASE</span></div>
    <div class="show_li">
        <ul>
         			
			<sql sql="select * from h_special_content where a_status=1 and typeid=2 and specialid={$specialid} order by sort desc,id desc limit 200">
			
			<li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html">
				{-$values['title']-}
				</a>
				</div>   
                <div class="h2">{-$values['author']-} / {-$values['source']-}</div>				
	        	<div class="h3">{-$values['description']-}</div>  
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
			
			<li class="news-block">	
			  <div class="summary">   
                <span class="tag"></span>
                <a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html" class="view">阅读全文</a>				
	        	<div class="h1">
				<a href="/special/show/specialid/{-$specialid-}/id/{-$values['id']-}.html">
				{-$values['title']-}
				</a>
				</div>   
                <div class="h2">{-$values['author']-} / {-$values['source']-}</div>				
	        	<div class="h3">{-$values['description']-}</div>  
	          </div>			  			  
			</li> 
			
			 </sql>
			
        </ul>
    </div>
</div>


<div style="text-align: center; line-height: 30px; padding: 20px 0px;"></div>
</block>