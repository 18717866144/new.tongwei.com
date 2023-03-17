<extend name="./Core/Template/Default/Pc/Special/extend/2016ec/2016ec.php" />
<block name="main">
<div class="detail">
	<div class="ad_id"><a  href="{-$special['url']-}">活动首页</a> > 作品展示</div>
	<div class="detali_wrap clearfix">
		<div class="detail_left">
			<div class="tittle">
				<div class="tittle_bt">{-$currentData.title-}</div>
				<span>{-$currentData.save_time|date='Y-m-d',###-}&nbsp;&nbsp;来源：{-$currentData.source-}&nbsp;&nbsp;作者：{-$currentData.author-}</span>
			</div>
			<div class="zhengwen">{-$currentData.content-}</div>
		</div>
		<div class="detail_right">
			<div class="time1"></div>
			<div class="conment">
				<div class="conment_b">活动简介</div>
				<span>根据通威发〔2016〕10号文件精神，为配合“讲用活动”开展，展现通威人风采，推动文化落地，实现“融合、变革、创新”，通威集团隆重举办2016年度企业文化征文大赛。本次征文大赛围绕“我为通威建言”、“通威文化正能量”、“一个合格的通威人”、“感受‘诚、信、正、一’体员体员体员体员体员体员体员工...<a href="/index.php?m=special&c=index&id={$specialid}">[查看更多]</a></span>
			</div>
		</div>
	</div>
</div>
</block>