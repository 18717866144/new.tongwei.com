<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base.php" />
<block name="banner">
<div id="focus-image" class="row">
	<div class="focus-image">
	<ul class="slide-image">
		<sql sql="select * from h_slide where type_id=1 and l_status=1 order by sort desc,id desc limit 5">
		<li style="background:url({-$values.picurl-}) no-repeat center center;"><notempty name="values.url"><a href="{-$values.url-}" target="_blank"></a></notempty></li>
		</sql>
	</ul>
	</div>
	<ul class="slide-tit"></ul>
</div>
</block>

<block name="notes">
<div id="notes" class="row">
	<div class="wrap clearfix">
		<div class="note left">
			<i class="iconfont icon-voice"></i>
			<div class="note-bd">
			<ul class="clearfix">
			<content limit="2" type="list" cid="29" field="id,title,title_short,style,save_time,url,description,thumbnail">
				<li>					
					<a href="{-$values.url-}" style="{-$values.style_string-}" target="_blank">{-$values['title_short']?$values['title_short']:$values['a_title']-}</a>
				</li>
			</content>
			</ul>
			</div>
		</div>
		<div class="search right">			
			<!--<form action="" method="get" name="search" >-->
				<div class="search-title"><span>新闻</span></div>
				<input type="text" name="q" class="search-text">
				<input type="submit" class="search-submit" value="搜索">				
			<!--</form>-->
		</div>
	</div>
</div>
</block>

<block name="main">
<div class="wrap m-t-10 clearfix">
	
	
	<!-- 上 -->
	<div class=" index-right" style="width:100%;">		
		<div class="tabs-title-1">
			<ul class="clearfix">
			<li class="hover" style="width:288px;;"><a href="">通威集团</a></li>
			<li style="width:288px;;margin-left:16px;"><a href="">农业产业</a></li>
			<li style="width:288px;;margin-left:16px;"><a href="">新能源产业</a></li>
			<li style="width:288px;;margin-left:16px;"><a href="">相关多元产业</a></li>
			</ul>
		</div>
		<div class="group-industries clearfix" style="border-top:0px;padding-left:10px;padding-bottom:10px;">
			<div class="group-industries-tabs">
				<div class="bd">
					<div class="slide impression-slide" style="margin:40px 0px 0px;float:left;">
						<ul class="slide-ul impression-slide-ul">
							<li><img src="static/img/620x350.jpg"></li>
							<li><img src="static/img/620x350-2.jpg"></li>
							<li><img src="static/img/620x350-3.jpg"></li>
						</ul>
						<ul class="slide-tit impression-slide-tit"></ul>
					</div>

					<div class="index-video" style="float:left;width:548px;padding-left:15px;">
						<div class="title-1">
							<h2 style="margin-left: 0; padding-left: 0;"><a href="{-$NAV[23]['url']-}"><i class="iconfont icon-video" style="color:#EC8510"></i><span style="color:#EC8510">视频 </span>看通威</a></h2>
							<span class="more"><a href="{-$NAV[23]['url']-}">+MORE</a></span>
						</div>

						<ul class="index-video-list clearfix">
							<content limit="2" type="list" cid="23" field="id,title,style,save_time,url,description,thumbnail,video">
							<li style="width:250px;height:140px;margin-left:7px;" data-video="{-$values.video-}" <if condition="$key%2 eq 0">style="float:left;margin-left:0px;"</if> ><a href="javascript:;"><img style="width:250px;height:140px;" src="{-$values.thumbnail|thumb=###,250,140,1-}" alt="{-$values.a_title-}"><span>{-$values.title-}</span><i class="iconfont icon-play"></i></a></li>
							</content>
						</ul>
					</div>

					<div style="float:left;width:509px;margin-top:50px;margin-left:22px;">
					<a href="{-:U('modules/special/special?specialid=1')-}" target="_blank">
					<img src="static/images/chairman-160.png"></a>
					</div>
					
<script type="text/javascript">
$('.index-video-list li').click(function(){
	var video = $(this).data('video');
	$.G.playVideo(video);
});
</script>	





				<!-- 	<div class="index-special m-t-10">
						<ul>
							<li class="li-2">
								<a href="/special/8.html" class="thumb"><img src="/static/img/s/s11-2018.jpg"></a>
								<div class="right-content">
									<a href="/special/8.html" class="tit">刘汉元代表出席十三届全国人大一次会议报道</a>
									<p>2018年全国两会，刘汉元主席首次以全国人大代表身份参加全国两会，继续履行好代表的神圣职责，积极建言献策，就当前我国空气环境生态“脱贫”问题、降低企业“五险一金”缴费比例、提高光伏扶贫质量等方面提出合理建议。</p>
								</div>
							</li>
							
							<li class="li-1">
								<a href="http://z.tongwei.cn/special/specialid/130.html" class="thumb"><img src="/static/img/s/s12.png"></a>
								<div class="right-content">
									<a href="http://z.tongwei.cn/special/specialid/130.html" class="tit">智能制造新引擎　绿色发展中国梦</a>
									<p>卅五年华，岁月如新!2017年9月20日，通威集团将迎来35岁华诞庆典。通威不仅在稳健发展中创造了累累硕果，也推动、见证了行业的转型发展和国家的经济腾飞，并成为我国社会经济飞跃发展的生动缩影。</p>
								</div>
							</li>
							
							<li class="li-2">
								<a href="/news/7435.html" class="thumb"><img src="/static/img/s/s13.png"></a>
								<div class="right-content">
									<a href="/news/7435.html" class="tit">通威品牌价值再次实现跨越提升突破450亿</a>
									<p>通威集团连续14年跻身这一国际公信力和认同度最高、权威性和参鉴性最强的中国品牌国家队行列，继去年品牌价值突破400亿元后，今年再次实现跨越、以450.62亿元品牌价值名列总榜单第76位。</p>
								</div>
							</li>

							<li class="li-1">
								<a href="/news/7249.html" class="thumb"><img src="/static/img/s/s14.png"></a>
								<div class="right-content">
									<a href="/news/7249.html" class="tit">集团2017年企业文化建设工作启动仪式举行</a>
									<p>5月18日，通威集团2017年度企业文化建设工作启动仪式暨通威大学光伏学院揭牌仪式隆重举行。来自集团、股份管理总部、通威太阳能(成都)有限公司及周边兄弟公司300余位领导、员工参加仪式。</p>
								</div>
							</li>
						</ul>
					</div>	 -->	
				</div>	

				<div class="bd">					
					<div class="map" id="map">地图加载中……</div>
					<div class="agricultural-s clearfix">
						<dl style="margin-left: 0;">
							<dt>								
								<div class="dt-left"><i class="icon3-1"></i>良种繁育</div>
								<div class="dt-right"><a href="{-$NAV[8]['url']-}">+MORE</a></div>								
							</dt>
							<dd>
								<a href="" class="thumb"><img src="static/images/i1.jpg"></a>
								<p>通威种苗已形成在鲤鱼、鲫鱼、南美白对虾、罗非鱼、斑点叉尾鮰等经济品种以及南方鲶、鳊鱼、黄颡鱼等特色鱼种上的苗种优势。</p>
							</dd>
						</dl>
						
						<dl>
							<dt>								
								<div class="dt-left"><i class="icon3-2"></i>饲料生产</div>
								<div class="dt-right"><a href="{-$NAV[8]['url']-}">+MORE</a></div>								
							</dt>
							<dd>
								<a href="" class="thumb"><img src="static/images/i2.jpg"></a>
								<p>通威股份主要生产和销售水产和畜禽饲料，年产饲料能力超过1000万吨，是全球最大的水产饲料生产企业和主要的畜禽饲料生产企业。</p>
							</dd>
						</dl>
						
						<dl style="margin-left: 0;">
							<dt>								
								<div class="dt-left"><i class="icon3-3"></i>健康养殖</div>
								<div class="dt-right"><a href="{-$NAV[8]['url']-}">+MORE</a></div>								
							</dt>
							<dd>
								<a href="" class="thumb"><img src="static/images/i3.jpg"></a>
								<p>通威历经10余年，以100多项关于水产养殖技术的研究和大量推广应用成果提炼出可提高养殖效益和环保效益的创新水产养殖技术。</p>
							</dd>
						</dl>
						
						<dl>
							<dt>								
								<div class="dt-left"><i class="icon3-4"></i>食品加工</div>
								<div class="dt-right"><a href="{-$NAV[8]['url']-}">+MORE</a></div>								
							</dt>
							<dd>
								<a href="{-$NAV[8]['url']-}" class="thumb"><img src="static/images/i4.jpg"></a>
								<p>通威在海南、广东、湖南、四川等地创建了国际领先的水产食品加工出口基地，已成为国内名副其实的健康安全水产品领导品牌。</p>
							</dd>
						</dl>						
					</div>
					<div class="index-special m-t-35">
						<ul>
							
							<li class="li-1">
								<a href="/news/8178.html" class="thumb"><img src="{-:thumb('/Uploads/2017/1126/d1fbd5d1073f34c19b053cf1be96aefa.jpg',250,115,1)-}"></a>
								<div class="right-content">
									<a href="/news/8178.html" class="tit">资本大佬蓉城论剑，通威股份再获殊荣</a>
									<p>11月24日，由《每日经济新闻》主办的“2017第六届中国上市公司领袖峰会暨2017中国上市公司口碑榜颁奖典礼”在成都盛大召开。通威股份荣获“中国上市公司口碑榜·最佳董事会”荣誉奖项。</p>
								</div>
							</li>
							
							<li class="li-2">
								<a href="/news/7543.html" class="thumb"><img src="/static/img/s/s5.jpg"></a>
								<div class="right-content">
									<a href="/news/7543.html" class="tit">深化农业供给侧改革 创新水产养殖模式</a>
									<p>改革之下，现代化、集约化、规模化、产业化养殖模式势在必行，通威将持续加大水产养殖模式的创新推广，全方位推进水产品供给侧结构性改革。</p>
								</div>
							</li>
						</ul>
					</div>	
				</div>
				<div class="bd twnei">
					<h2 class="title-2">通威“渔光一体”创新模式</h2>
					<div class="slide twnei-slide" style="margin-top:10px;">
						<ul class="slide-ul twnei-slide-ul">
							<li><img src="static/img/620x350-twnei.jpg"></li>
							<li><img src="static/img/620x350-twnei-2.jpg"></li>
							<li><img src="static/img/620x350-twnei-3.jpg"></li>
							<li><img src="static/img/620x350-twnei-4.jpg"></li>								
						</ul>
						<ul class="slide-tit twnei-slide-tit"></ul>
					</div>
					<h2 class="title-2" style="margin-top: 25px">通威太阳能：全球最大的太阳能光伏电池生产企业</h2>
					<div class="twsolar clearfix">
						<ul class="twsolar-left left">
							<li class="li1"><i class="icon1-1"></i>10GW产能最大</li>
							<li class="li2"><i class="icon1-2"></i>市场占有率最高</li>
							<li class="li3"><i class="icon1-3"></i>数字车间最先进</li>
							<li class="li4"><i class="icon1-4"></i>晶硅电池出货最大</li>							
						</ul>
						<div class="twsolar-right right">
							<ul class="slide-ul">
								<li><a href="javascript:;"><img src="/static/img/t/1.jpg" alt=""><span>通威太阳能（成都）公司</span></a></li>
								<li><a href="javascript:;"><img src="/static/img/t/2.jpg" alt=""><span>通威太阳能（成都）公司第一块电池板</span></a></li>
								<li><a href="javascript:;"><img src="/static/img/t/3.jpg" alt=""><span>通威太阳能</span></a></li>
								<li><a href="javascript:;"><img src="/static/img/t/4.jpg" alt=""><span>通威太阳能</span></a></li>
								<li><a href="javascript:;"><img src="/static/img/t/5.jpg" alt=""><span>通威太阳能</span></a></li>
							</ul>
							<a class="prev-btn iconfont icon-left"></a>
							<a class="next-btn iconfont icon-right"></a>
						</div>
					</div>
					<h2 class="title-2" style="margin-top:19px">永祥股份：中国多晶硅行业领军企业</h2>
					<div class="yongx-bg"><img src="static/images/yongx.png"></div>
					<div class="yongx-slide">
						<div class="yongx-slide-bd">
							<ul class="yongx-slide-ul">
								<li><a href="javascript:;"><img src="/static/img/y/1.jpg" alt=""><span><i>永祥股份</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/y/2.jpg" alt=""><span><i></i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/y/3.jpg" alt=""><span><i></i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/y/4.jpg" alt=""><span><i></i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/y/5.jpg" alt=""><span><i></i></span></a></li>
							</ul>
						</div>
						<div class="yongx-slide-btn">
							<a class="prev-btn iconfont icon-left"></a>
							<a class="next-btn iconfont icon-right"></a>
						</div>
					</div>
					
					<div class="index-special m-t-10">
						<ul>
							<li class="li-1">
								<a href="/news/8196.html" class="thumb"><img src="{-:thumb('/Uploads/2017/1130/633937e22f5817653151ea3d4ab75498.png',250,115,1)-}"></a>
								<div class="right-content">
									<a href="/news/8196.html" class="tit">光伏大咖点赞：通威“智造”引领行业变革</a>
									<p>12月1日，以“共进•共享•共赢”为主题的2017通威太阳能全球合作伙伴大会在成都举行，来自中国、法国、德国、韩国、荷兰、瑞士、美国等全球顶级光伏企业精英600余人齐聚蓉城，共同探讨行业前沿技术，洞见光伏发展未来。</p>
								</div>
							</li>

							<li class="li-2">
								<a href="/news/7508.html" class="thumb"><img src="/static/img/s/s8.jpg"></a>
								<div class="right-content">
									<a href="/news/7508.html" class="tit">新华社聚焦永祥股份高纯晶硅及配套项目</a>
									<p>据新华社报道，随着“领跑者”计划的实施，我国光伏产业技术不断进步，单、多晶组件效率不断提高，光伏企业加码高纯晶硅项目，高纯晶硅产业的全球地位和竞争力将进一步提高，从而改变世界高纯晶硅竞争格局。</p>
								</div>
							</li>

						</ul>
					</div>		
				</div>
				<div class="bd">
					<h2 class="title-3 twdc"><span>通威地产</span></h2>
					<div class="slide twdc-slide">
						<ul class="slide-ul twdc-slide-ul">
			
							<li><img src="static/img/620x250-1.jpg"></li>
							<li><img src="static/img/620x250-2.jpg"></li>
							<li><img src="static/img/620x250-3.jpg"></li>
							<li><img src="static/img/620x250-4.jpg"></li>
						</ul>
						<ul class="slide-tit twdc-slide-tit"></ul>
					</div>
					
					<h2 class="title-3 care"><a href="http://www.care-pet.com" target="_blank"><span>好主人宠物食品</span></a></h2>
					<div class="care twsolar clearfix">
						<ul class="twsolar-left left">
							<li class="li1"><a href="https://care.tmall.com" target="_blank"><i class="icon1-1"></i>好主人天猫旗舰店</a></li>
							<li class="li2"><a href="https://mall.jd.com/index-1000001708.html" target="_blank"><i class="icon1-2"></i>好主人京东旗舰店</a></li>
							<li class="li3"><a href="http://haozhurencarepet.suning.com" target="_blank"><i class="icon1-3"></i>好主人苏宁易购旗舰店</a></li>
							<li class="li4"><a href="https://www.amazon.cn/Care-%E5%A5%BD%E4%B8%BB%E4%BA%BA/b/ref=bl_dp_s_web_1832842071?ie=UTF8&node=1832842071" target="_blank"><i class="icon1-4"></i>好主人亚马逊旗舰店</a></li>							
						</ul>
						<div class="twsolar-right right">
							<ul class="slide-ul">
								<li><a href="http://www.care-pet.com" target="_blank"><img src="/static/img/h/1.jpg" alt=""><span>好主人，安全才能更放心</span></a></li>
								<li><a href="http://www.care-pet.com" target="_blank"><img src="/static/img/h/2.jpg" alt=""><span>好主人</span></a></li>
								<li><a href="http://www.care-pet.com" target="_blank"><img src="/static/img/h/3.jpg" alt=""><span>好主人</span></a></li>
								<li><a href="http://www.care-pet.com" target="_blank"><img src="/static/img/h/4.jpg" alt=""><span>好主人</span></a></li>
								<li><a href="http://www.care-pet.com" target="_blank"><img src="/static/img/h/5.jpg" alt=""><span>好主人</span></a></li>
							</ul>
							<a class="prev-btn iconfont icon-left"></a>
							<a class="next-btn iconfont icon-right"></a>
						</div>
					</div>
					
					<h2 class="title-3 tywy m-t-10"><a href="http://www.tongyuwuye.com" target="_blank"><span>通宇物业</span></a></h2>
					<div class="tywy yongx-slide">
						<div class="yongx-slide-bd">
							<ul class="yongx-slide-ul">
								<li><a href="javascript:;"><img src="/static/img/w/1.jpg" alt=""><span><i>通威生活家</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/w/2.jpg" alt=""><span><i>通威生活家</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/w/3.jpg" alt=""><span><i>通威国际中心</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/w/4.jpg" alt=""><span><i>通宇物业前台品质服务</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/w/5.jpg" alt=""><span><i>通威集团升旗仪式</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/w/7.jpg" alt=""><span><i>通宇物业秩序队员日常巡逻</i></span></a></li>
							</ul>
						</div>
						<div class="yongx-slide-btn">
							<a class="prev-btn iconfont icon-left"></a>
							<a class="next-btn iconfont icon-right"></a>
						</div>
					</div>
					
					<h2 class="title-3 twmedia"><a href="http://www.tongweimedia.com" target="_blank"><span>通威传媒</span></a></h2>
					<div class="tywy yongx-slide">
						<div class="yongx-slide-bd">
							<ul class="yongx-slide-ul">
								<li><a href="javascript:;"><img src="/static/img/c/c1.jpg" alt=""><span><i>承办2016第二届中国农牧品牌年度盛典</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/c/c2.jpg" alt=""><span><i>执行2017年永祥股份15周年庆典晚会</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/c/c3.jpg" alt=""><span><i>承办2017中国(成都)首届楼宇经济峰会</i></span></a></li>
								<li><a href="javascript:;"><img src="/static/img/c/c4.jpg" alt=""><span><i>承办2015通威科技大会</i></span></a></li>
							</ul>
						</div>
						<div class="yongx-slide-btn">
							<a class="prev-btn iconfont icon-left"></a>
							<a class="next-btn iconfont icon-right"></a>
						</div>
					</div>
					
					<div class="index-special m-t-25">
						<ul>
							<li class="li-1">
								<a href="/news/7105.html" class="thumb"><img src="/static/img/s/s9.jpg"></a>
								<div class="right-content">
									<a href="/news/7105.html" class="tit">好主人亚洲领先宠物食品生产线投产</a>
									<p>2017年，随着亚洲领先宠物食品生产线的顺利投产，好主人公司将坚持走质量与效益并行、品牌发展道路的决心，势必将好主人宠物食品打造为家喻户晓的国际化宠物食品品牌，成为行业品质标杆企业。</p>
								</div>
							</li>

							<li class="li-2">
								<a href="/news/7240.html" class="thumb"><img src="/static/img/s/s10.jpg"></a>
								<div class="right-content">
									<a href="/news/7240.html" class="tit">连锁品牌“通威生活家——T.MART”投运</a>
									<p>成都写字楼首家自有便利连锁品牌 “通威生活家——T.MART”在通威国际中心全面投运，将为入驻客户提供更多办公以外的生活便利。</p>
								</div>
							</li>
						</ul>
					</div>	
				</div>
			</div>
		</div>		
		
	</div>


    


</div>
<!--[if lt IE 9]>
<style>
.newspaper .newspaper-bd li i{top:216px;right:0;}
</style>
<![endif]-->
<!--
<div id="accordion" class="row m-t-20">
	<div class="wrap" style="position: relative">
		<ul class="kwicks">
			<li id="li1"><a href="http://z.tongwei.cn/special/specialid/88.html" target="_blank"></a></li>
			<li id="li2"><a href="http://z.tongwei.cn/special/specialid/130.html" target="_blank"></a></li>			
			<li id="li4"><a href="http://z.tongwei.cn/special/specialid/88.html" target="_blank"></a></li>
			<li id="li3"><a href="http://z.tongwei.cn/special/specialid/88.html" target="_blank"></a></li>
		</ul>
	</div>
</div>
-->
<script id="txfNews" type="text/html">
{{# for(var i = 0, len = d.list.length; i < (len>5?5:len); i++){ }}
{{# if(i==0){ }}
<li class="headlines clearfix">
	<a href="{{ d.list[i].url }}" class="headlines-pic" target="_blank"><img src="{{ d.list[i].pic }}"></a>
	<div class="right-content">
		<a href="{{ d.list[i].url }}" class="headlines-title" target="_blank">{{ d.list[i].title }}</a>
		<p>{{ d.list[i].summary }}</p>
	</div>					
</li>
{{# }else{ }}
{{# var dateline = d.list[i].dateline; dateline = dateFormat(dateline); }}
<li class="more-list">
	<span class="date">{{ dateline }}</span>
	<a href="{{ d.list[i].url }}" target="_blank">{{ d.list[i].title }}</a>
</li>
{{# } }}
{{# } }}
</script>

<script id="txfTxh" type="text/html">
{{# for(var i = 0, len = d.list.length; i < (len>5?5:len); i++){ }}
<li class="headlines clearfix">
	<a href="{{ d.list[i].url }}" class="headlines-pic" target="_blank"><img src="{{ d.list[i].avatar }}"></a>
	<div class="right-content">
		<a href="{{ d.list[i].url }}" class="headlines-title" target="_blank">{{ d.list[i].name }}</a>
		<p>{{ d.list[i].summary }}</p>
	</div>					
</li>
{{# } }}
</script>

<script id="txfVideo" type="text/html">
{{# for(var i = 0, len = d.list.length; i < (len>2?2:len); i++){ }}
<li class="headlines txfvideo clearfix">
	<a href="{{ d.list[i].url }}" class="headlines-pic" target="_blank"><img src="{{ d.list[i].pic }}"><i class="iconfont icon-play"></i></a>
	<div class="right-content">
		<a href="{{ d.list[i].url }}" class="headlines-title" target="_blank">{{ d.list[i].title }}</a>
		<p>{{ d.list[i].summary }}</p>
	</div>
</li>
{{# } }}
</script>

<script>
function dateFormat(str) { 
	var test = /([\\d]{4})-([\\d]{1,2})-([\\d]{1,2}) ([\\d]{1,2}):([\\d]{1,2})/;
	return (str.replace(test, function($0,$1,$2,$3,$4,$5) { 
		return($2 +"-" + $3); 
	}));
}
/*
$(function(){
	$('.kwicks').kwicks({
		max : 475,
		spacing : 8
	});	
	
});
*/
$('#focus-image').slide({ titCell:'.slide-tit', mainCell:'.focus-image ul', titOnClassName:'hover', effect:'fold', autoPlay:true, autoPage:'<li></li>' });

$('.note').slide({mainCell:'.note-bd ul', titOnClassName:'hover', effect:'topLoop', autoPlay:true, autoPage:'' });

/*
//通心粉内容轮播
$('.news-tongweicn').slide({ titCell:'.tabs-title ul li', mainCell:'.news-tongweicn-tabs', titOnClassName:'hover', effect:'leftLoop', autoPlay:false, autoPage:false, startFun:function(i, c, slider, titCell, mainCell, targetCell, prevCell, nextCell){
	if(i==0){		
		$.G.getJson2HTml('http://api.tongwei.cn/ApiNews/getNewsForGroup?type=1','#txfNews','.tongweicn1',0);
	}
	if(i==1){
		$.G.getJson2HTml('http://api.tongwei.cn/ApiNews/getNewsForGroup?type=2','#txfTxh','.tongweicn2',1);		
	}
	if(i==2){
		$.G.getJson2HTml('http://api.tongwei.cn/ApiNews/getNewsForGroup?type=3','#txfVideo','.tongweicn3',2);	
	}
	if(i==3){
		$.G.getJson2HTml('http://api.tongwei.cn/ApiNews/getNewsForGroup?type=4','#txfNews','.tongweicn4',3);
	}
	// /api/Tongxinfen/getNews
}});
*/

//产业领域轮播
var isLoadMap=false;
$('.index-right').slide({ titCell:'.tabs-title-1 li', mainCell:'.group-industries-tabs', titOnClassName:'hover', effect:'fade', autoPlay:false, autoPage:false, startFun:function(i){
	if(i==1 && isLoadMap==false){
		$('#map').html('地图加载中……');
		//console.log('map');
		$.getScript("/static/js/echarts.min.js").done(function(data, status, jqxhr) {
			isLoadMap = true;
			$.getScript("/static/js/mapConfig.js");
		}).fail(function(){ $('#map').html('地图加载失败……'); });
	}
} });

//通威印像图片轮播
$('.impression-slide').slide({ titCell:'.impression-slide-tit', mainCell:'.impression-slide-ul', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, autoPage:'<li></li>'});
$('.twnei-slide').slide({ titCell:'.twnei-slide-tit', mainCell:'.twnei-slide-ul', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, autoPage:'<li></li>' });
$('.twsolar-right').slide({ titCell:'', mainCell:'.slide-ul', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, prevCell:'.prev-btn', nextCell:'.next-btn'});
$('.yongx-slide').slide({ titCell:'', mainCell:'.yongx-slide-ul', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, autoPage:false, prevCell:'.prev-btn', nextCell:'.next-btn', vis:3 });

$('.twdc-slide').slide({ titCell:'.twdc-slide-tit', mainCell:'.twdc-slide-ul', titOnClassName:'hover', effect:'leftLoop', autoPlay:true, autoPage:'<li></li>' });

//数字刊物轮播
$('.newspaper').slide({ titCell:'', mainCell:'.newspaper-bd ul', titOnClassName:'hover', effect:'leftLoop', autoPlay:false, autoPage:false, prevCell:'.prev-btn', nextCell:'.next-btn', vis:4 });
</script>
</block>
