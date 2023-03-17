<extend name="./Core/Template/Default/Pc/Special/extend/2016ec/2016ec.php" />
<block name="main">
<div class="wrap clearfix">
    <div class="hdjj" style="width:94%;padding:25px 3%; font-size:16px;line-height:180%;">
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

<div class="tab_show clearfix">
	<div class="tab_left left">
		<div class="zw_bt">{-$type[1]['name']-}<span>SHOW ARTICLE</span></div>
			<ul class="tab_ul">
			<sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 200">
			<php>$class=$key%2==0?'':' class="libg"';</php>
			<li{-$class-}><div class="author"><em>{-$values['source']-}</em><span>{-$values['author']-}</span></div><i>{-$i-}</i><a href="{-$values['url']-}">{-$values['title']-}</a></li>
			</sql>
			</ul>
		</div>
	
	<div class="tab_right right">
		<div class="zw_bt">{-$type[2]['name']-}<span>SHOW ARTICLE</span></div>
			<ul class="tab_ul">
			<sql sql="select * from h_special_content where a_status=1 and typeid=2 and specialid={$specialid} order by sort desc,id desc limit 200">
			<php>$class=$key%2==0?'':' class="libg"';</php>
			<li{-$class-}><div class="author"><em>{-$values['source']-}</em><span>{-$values['author']-}</span></div><i>{-$i-}</i><a href="{-$values['url']-}">{-$values['title']-}</a></li>
			</sql>
			</ul>
		</div>
	</div>
</div>
</block>