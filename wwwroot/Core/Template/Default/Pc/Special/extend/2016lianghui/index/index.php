<?php defined('HX_CMS') or exit;?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
<meta name="keywords" content="{-$special['title']-}">
<meta name="description" content="{-$special['description']-}">
<link rel="stylesheet" type="text/css" href="/skins/2016lianghui/css/style.css">
<script type="text/javascript" src="/static/js/jquery.js"></script>  
<script language="JavaScript" src="/static/js/jquery.SuperSlide.js"></script>     
</head>
<body>
<div class="banner"></div>
<div class="nav">
	<div class="wrap">
    	<a href="{-$special.url-}" class="act">首页</a>
        <a href="#news">图文直击</a>
        <a href="#video">视频报道</a>
        <a href="#media">媒体聚焦</a>
    </div>
</div>
<div class="kjdh_warp">
	<div class="ind_frame">       
		<div class="jc_warp">
			<div class="jc_con">
				<a name="news"></a>
            	<div class="dh"><span style="display:none">图文直击</span></div>
            	<div class="jc_ban">
						<div class="banner_farm">
							<div class="banner_pos">
								<span class="baner_left"><img src="/skins/2016lianghui/images/banleft.png" /></span>
								<span class="baner_right"><img src="/skins/2016lianghui/images/banright.png" /></span>
								<div class="banner_con">
                                	<ul>
										<sql sql="select * from h_special_content where FIND_IN_SET('h',attr) and a_status=1 and typeid=1 and specialid={$specialid} order by id desc,sort desc limit 5">
										<li><a href="{-$values['url']-}" target="_blank"><img src="{-$values['thumbnail']-}" width="1000" height="420" /></a></li>
										</sql>
                                    </ul>
                                 </div>              
								<div class="banner_bar"></div>
							</div>
						</div>
					</div>

					<div class="news_warp clearfix">
							<div class="left_news cl">
								<sql sql="select * from h_special_content where FIND_IN_SET('s',attr) and a_status=1 and typeid=1 and specialid={$specialid} order by id desc,sort desc limit 1">
								<div class="lt_news_tit"><a href="{-$values['url']-}" target="_blank">{-$values['title']-}</a></div>
								<div class="lt_news_det">{-:msubstr($values['description'],0,400)-}</div>
								<div class="getmorenews"><a href="{-$values['url']-}" target="_blank">详细>></a></div>
								</sql>
                            </div>
							<div class="right_news">
								<ul>
                                    <sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by id desc,sort desc limit 5">
									<li><a href="{-$values['url']-}" target="_blank"><span class="fnews_tag news_one">{-:sprintf("%02d",$i)-}</span><span class="fnews_txt">{-$values['title']-}</span></a></li>
									</sql>
                                </ul>
							</div>
					</div>
             		<div class="tw_more"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>1))-}">查看更多</a></div>
			</div>
		</div>
		<a name="video"></a>
        <div class="images_warp">
                <div class="images_news">
                    <div class="dh2"><span style="display:none">视频报道</span></div>
                    <div class="images_list">
                        <ul>
                             <sql sql="select * from h_special_content where a_status=1 and typeid=2 and specialid={$specialid} order by id desc,sort desc limit 6">	
							<li>
                                <a href="{-$values['url']-}" target="_blank">
                                    <img src="{-$values['thumbnail']-}"  width="300" height="220" />
                                    <div class="alertinfo">
                                        <div class="infotit">{-$values['title']-}</div>
                                        <div class="fdj_img"><img src="/skins/2016lianghui/images/fdj5.png" width="35" height="35" /></div>
                                    </div>
                                </a>
                            </li>
							</sql>
                      </ul>
                    </div>
                    <div class="imagesmore"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>2))-}" target="_blank">查看更多</a></div>
                </div>
        </div>
	
	<a name="media"></a>
	<div class="media_wrap clearfix">
    	<div class="dh3"><span style="display:none">媒体聚焦</span></div>
		
		<div class="left_cen">
			<div class="img_list">
			<ul>			
			<sql sql="select * from h_special_content where a_status=1 and typeid=3 and specialid={$specialid} order by id desc,sort desc limit 5">			
			<li><a href="{-$values['url']-}" target="_blank"><img src="{-$values['thumbnail']-}" alt="{-$values['title']-}" width="300" height="300"><span><em>{-$values['title']-}</em></span></a></li>
			</sql>					
			</ul>
			</div>
			<a href="javascript:;" id="toLeft" class="link toLeft"></a>
			<a href="javascript:;" id="toRight" class="link toRight"></a>			
		</div>
	 
		<div class="media_right">
			<div class="news_li">
				<ul>
					<sql sql="select * from h_special_content where a_status=1 and typeid=3 and specialid={$specialid} order by id desc,sort desc limit 9">
					<li><a href="{-$values['url']-}"  target="_blank">{-$values['title']-}</a><div class="date">{-$values['source']-}<span>{-:date('Y-m-d',$values['save_time'])-}</span></div></li>
					</sql>
				</ul>        
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="tw_more" style="margin-top: 20px;"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>3))-}">查看更多</a></div>
    </div>
</div>	
</div>

<div class="botton">
	<div class="bot_wap">
    	<img src="/skins/2016lianghui/images/logo.png" />
        <div class="bot_a"><a href="http://www.tongwei.com" target="_blank">通威集团</a><a href="http://www.tongwei.com.cn" target="_blank">通威股份</a><a href="http://www.tongwei.cn" target="_blank">通心粉社区</a></div>
    </div>
</div>			
<script>
$(".banner_pos").slide({mainCell:".banner_con ul",titCell:".banner_bar",effect:"left",autoPlay:true,delayTime:500,interTime:3000,autoPage:'<a></a>',titOnClassName:'cur',prevCell:'.baner_left',nextCell:'.baner_right'});
$(".left_cen").slide({mainCell:".img_list ul",effect:"left",autoPlay:true,delayTime:500,interTime:3000,autoPage:false,prevCell:'#toLeft',nextCell:'#toRight'});
</script>
<div style="display:none;"><script src="http://s20.cnzz.com/stat.php?id=3976932&web_id=3976932" language="JavaScript"></script></div>
</body>
<html>