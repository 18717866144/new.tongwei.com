<extend name="./Core/Template/Default/Pc/Special/extend/2019ec/2019ec.php" />
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
						<li{-$class-}><div class="author"><em>{-$r['source']-}</em><span>{-$r['author']-}</span></div><i>{-$m-}</i><a href="/special/show/specialid/{-$specialid-}/id/{-$r['id']-}.html">{-$r['title']-}</a></li>
						<php>$m++;</php>
						</volist>
					</ul>
				</div>
				<div class="pages">{-$pages-}</div>				
            </div>
			
            <div class="detail_right">
                <div class="time1"></div>
                <div class="conment">
                    <div class="conment_b">活动简介</div>
                    <span>根据通威发〔2019〕4号文件《通威集团2019年企业文化建设工作实施方案》的通知精神，为进一步激发和坚定全体员工与企业共进步、同发展的信心和热情，展现通威人风采，推动文化落地，集团现正式启动2019年度“通威大变革、大跨越”征文活动，全体通威员工均可积极投稿参与。4-11月集团总共进行4期征文评选，每期评选出8篇优秀文章，纳入年度总评选范围，最终评出20篇优秀文章，并在年度企业文化收官活动上对获奖者给予表彰。同时，评选出的优秀征文，将在集团官网、《通威报》等开设专栏进行展示，并整理、编撰后，收录进2019年度通威集团企业文化征文汇编中。</span>
                </div>
            </div>
        </div>
    </div>
</block>