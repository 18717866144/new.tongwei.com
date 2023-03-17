<extend name="./Core/Template/Default/Pc/Special/extend/2021zhengwen/base.php" />
<block name="main">
<style>

</style>
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
			<div class="right_block">
			   <div class="time1"></div>
				<div class="conment">
					<div class="conment_b">活动简介</div>
					<span>根据通威发〔2021〕7号文件《通威集团2021年企业文化建设工作实施方案》的通知精神，为进一步激发和坚定全体员工与企业共进步、同发展的信心和热情，展现通威人风采，推动文化落地，集团现正式启动2021年“表率是最好的领导方法”主题征文活动，全体通威员工均可积极投稿参与。4-11月集团总共进行4期征文评选，每期评选出8篇优秀文章，纳入年度总评选范围，最终评出20篇优秀文章，并在年度企业文化收官活动上对获奖者给予表彰。同时，评选出的优秀征文，将在集团官网、《通威报》等开设专栏进行展示，并整理、编撰后，收录进2021年度通威集团企业文化征文汇编中。</span>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
   	  
        $(window).scroll(function() {
			
			var lft_nav_scroll = $(document).scrollTop();
		
		    if(lft_nav_scroll >= 395)
			{
				$('.detali_wrap .detail_right').addClass('detail_right_fixed');
			}
			else{
				$('.detali_wrap .detail_right').removeClass('detail_right_fixed');
			}
			
		});	  


</script>
</block>