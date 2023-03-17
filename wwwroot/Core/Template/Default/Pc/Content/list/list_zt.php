<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base_2019.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"><link rel="stylesheet" href="__PUBLIC__/twnew/css/news.css"></block>
<block name="page_banner">
    <div class="subbanner mt100" style="background-image: url(__PUBLIC__/assets/images/sub<?php echo $navigate['pid'];?>.png);">
        <div class="text">
            <div class="fw">
                <?php $parid=$navigate['pid']; ?>
                <p class="t1">{-$NAV[$parid]['navigate_name']-}</p>
                <p class="t2">{-$NAV[$parid]['keywords']-}</p>
                <div class="state">
                    <php>
                        $titles =explode('==',$NAV[$parid]['synopsis']);
                    </php>
                    <p>{-$titles[0]-}</p>
                    <p>{-$titles[1]-}</p>
                </div>
            </div>
        </div>
    </div>
</block>
<block name="main">
    <div class="mainbox pb50">
        <include file="./Core/Template/Default/Pc/side.php"/>
        <div class="aboutbox pt30">
            <div class="fw2">
                <!--<p class="intitle">新闻专题</p>-->
                <ul class="special-list">
                    <li aos="fade-up">
                        <a href="one.html">
                            <div class="pic"><img src="temp/zt1.png" alt=""></div>
                            <p class="tt">2022第六届中国水产科技大会</p>
                        </a>
                    </li>
                    <li aos="fade-up">
                        <a href="two.html">
                            <div class="pic"><img src="temp/zt2.png" alt=""></div>
                            <p class="tt">刘汉元代表十三届全国人大五次会议议案特别报道</p>
                        </a>
                    </li>
                    <li aos="fade-up">
                        <a href="three.html">
                            <div class="pic"><img src="temp/zt3.png" alt=""></div>
                            <p class="tt">通威集团2021年“表率是最好的领导方法”主题征文活动</p>
                        </a>
                    </li>
                    <li aos="fade-up">
                        <a href="one.html">
                            <div class="pic"><img src="temp/zt1.png" alt=""></div>
                            <p class="tt">2022第六届中国水产科技大会</p>
                        </a>
                    </li>
                    <li aos="fade-up">
                        <a href="two.html">
                            <div class="pic"><img src="temp/zt1.png" alt=""></div>
                            <p class="tt">刘汉元代表十三届全国人大五次会议议案特别报道</p>
                        </a>
                    </li>
                    <li aos="fade-up">
                        <a href="three.html">
                            <div class="pic"><img src="temp/zt1.png" alt=""></div>
                            <p class="tt">通威集团2021年“表率是最好的领导方法”主题征文活动</p>
                        </a>
                    </li>
                </ul>
                <div class="page-pt">
                    <div class="pages">
                        <a class="btn" href="javascript:;"><img src="images/prev.png" alt=""></a>
                        <a class="item active" href="javascript:;">1</a>
                        <a class="item" href="javascript:;">2</a>
                        <a class="item" href="javascript:;">3</a>
                        <a class="item" href="javascript:;">4</a>
                        <a class="btn" href="javascript:;"><img src="images/next.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="mainContent" >
	<div class="right slogan-bg">
	    <div class="content_tit">
		  {-$navigate['navigate_name']-}
		</div>
		<div class="content clearfix">
			<ul class="special-list" >			
			
			<content type="page" where="" cid="17" order="create_time desc" cache="false" limit="20" field="id,title,create_time,url,description,thumb">
			<li class="clearfix">
			
			  <a href="{-$values['url']-}" target="_blank" class="special-pic"><img src="{-$values.thumb-}" alt=""></a>
				<div class="right-content">
					<a href="{-$values['url']-}" target="_blank" class="special-title">{-$values.title-}</a>
					<p>{-:msubstr(trim($values['description'],'　'),0,58)-}</p>
					<div class="news-list-info">					
						<div class="read-link right"><a href="{-$values['url']-}" target="_blank">查看详情</a></div>
					</div>
				</div>
			
			</li>
			</content>
		</ul>
		
		<div class="pages clearfix">
		{-$page-}
		</div>	
			
		</div>
	</div>
	
	<div class="left ">		
		<include file="./Core/Template/Default/Pc/side.php" />
	</div>
	
	<div style="clear:both;"></div>
</div>
</block>