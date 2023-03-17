<extend name="./Core/Template/Default/Pc/Special/extend/2016ec/2016ec.php" />
<block name="main">
<div class="detail">
        <div class="ad_id"><a href="{$url}">活动首页</a> > {-$typename-}</div>
        <div class="detali_wrap clearfix">
            <div class="detail_left">
				<div class="zw_bt">{-$typename-}<span>SHOWCASE</span></div>
				<div class="list_li">
					<ul><php>$m=(max(1,$_GET['p'])-1)*200 + 1;</php>
						<volist name="list" id="r">
						<php>$class=$key%2==0?'':' style="background:#fcfcfc"';</php>
						<li{-$class-}><div class="author"><em>{-$r['source']-}</em><span>{-$r['author']-}</span></div><i>{-$m-}</i><a href="{-$r['url']-}">{-$r['title']-}</a></li>
						<php>$m++;</php>
						</volist>
					</ul>
				</div>
				<div class="pages">{-$pages-}</div>				
            </div>
			
            <div class="detail_right">
				<div class="desc" style="padding:8px;">
					<p style="text-align: center;"><span style="color:#004499;"><span style="font-size:20px;">活动介绍</span></span></p>
					<p style="margin-top:10px;">　　书籍是传播先进思想、传承优秀文化、弘扬精神文明的重要载体。青年员工更处于实践加深学习阶段，有着开展读书活动的良好背景条件。为鼓励和引导通威国际中心广大员工养成多读书、读好书的习惯，做到勤于思考，勤于探索，学以致用，用有所成，把学习的体会和成果转化为谋划工作的思路、促进工作的举措，促使广大职工成长为本职工作的行家和解决实际问题的能手，推动学习型组织建设，通威国际中心&ldquo;同心家园&rdquo;将在通威国际中心入驻企业职工中开展&ldquo;读书励志岗位成才&rdquo;主题读书活动。</p>
					
					<div>&nbsp;</div>
					<div><span style="color:#004499;">活动范围：</span> 入驻通威国际中心各单位职工</div>
					<div>&nbsp;</div>
					<div><span style="color:#004499;">活动时间：</span> 2016年7月-11月</div>
					<div>&nbsp;</div>
					<div><span style="color:#004499;">主办单位：</span>中共成都市委统战部、成都高新区党群工作局（统战部）、桂溪街道党工委</div>
					<div>&nbsp;</div>
					<div><span style="color:#004499;">承办单位：</span>通威国际中心党委</div>
					<div>&nbsp;</div>
					<div><span style="color:#004499;">协办单位：</span>通威集团工会委员会、通宇物业</div>                    
				</div>
			</div>
	
        </div>
    </div>
</block>