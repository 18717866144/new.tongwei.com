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
                <div class="time1"></div>
                <div class="conment">
                    <div class="conment_b">活动简介</div>
                    <span>根据通威发〔2016〕10号文件精神，为配合“讲用活动”开展，展现通威人风采，推动文化落地，实现“融合、变革、创新”，通威集团隆重举办2016年度企业文化征文大赛。本次征文大赛围绕“我为通威建言”、“通威文化正能量”、“一个合格的通威人”、“感受‘诚、信、正、一’体员体员体员体员体员体员体员工...<a href="{-$special['url']-}">[查看更多]</a></span>
                </div>
            </div>
        </div>
    </div>
</block>