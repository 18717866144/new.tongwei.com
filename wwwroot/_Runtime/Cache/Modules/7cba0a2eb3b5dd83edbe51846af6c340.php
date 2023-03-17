<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- External CSS -->
    <link rel="stylesheet" href="__PUBLIC__/assets/css/reset.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/aos.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/swiper.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/common.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/commonMedia.css" />
    <title>2022第五届中国国际光伏产业高峰论坛</title>
    <!--[if lt IE 9]>
    <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="special-one">
    <div class="head">
        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select thumbnail from h_special_content where specialid=36 and typeid=1 and a_status=1 order by sort desc limit 1', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><img src="<?php echo ($values['thumbnail']); ?>" alt="" style="width:100%;"><?php $i++; endforeach; endif; ;?>
    </div>
    <div class="menus">
        <ul class="swiper-wrapper">
            <li class="swiper-slide first">
                <a href="/" target="_blank">首页</a>
            </li>
            <li class="swiper-slide">
                <a href="javascript:;">图文报道</a>
            </li>
            <li class="swiper-slide">
                <a href="javascript:;">大会议程</a>
            </li>
            <li class="swiper-slide">
                <a href="javascript:;">大会简介</a>
            </li>
            <li class="swiper-slide">
                <a href="javascript:;">拟邀嘉宾</a>
            </li>
            <li class="swiper-slide">
                <a href="javascript:;">合作单位</a>
            </li>
            <li class="swiper-slide">
                <a href="javascript:;">合作媒体</a>
            </li>
            <li class="swiper-slide">
                <a href="javascript:;">联系我们</a>
            </li>
        </ul>
    </div>
    <div class="mainbox pt50 pb70">
        <div class="w1200">
            <div class="topage" id="tuwen">
                <div class="maintitle mb20" style="background-image: url(/static/2022guangfu/images/tabbg.png)">
                    <p class="title">图文报道</p>
                    <p class="tips">2022第五届中国国际光伏产业高峰论坛</p>
                </div>
                <div class="photo-text mb40">
                    <div class="left">
                        <div class="zttwo-hotnews one">
                            <ul class="swiper-wrapper">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where specialid=36 and typeid=2 and a_status=1 order by sort desc', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="swiper-slide">
                                    <a href="javascript:;">
                                        <div class="pic">
                                            <div class="bgimg" style="background-image: url(<?php echo ($values['thumbnail']); ?>);">
                                            </div>
                                            <img class="img" src="<?php echo ($values['thumbnail']); ?>" alt="" width="100%" height="100%">
                                        </div>
                                        <div class="tt"><?php echo ($values['title']); ?></div>
                                    </a>
                                </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="tops">
                            		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where specialid=36 and typeid=3 and a_status=1 order by id desc limit 1', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><a href="<?php echo ($values["url"]); ?>" target="_blank">
                                <p class="tt"><?php echo ($values["title"]); ?></p>
                                <div class="desc">
                                    <?php echo ($values['description']); ?>
                                </div>
                            </a><?php $i++; endforeach; endif; ;?>
                        </div>
                        <ul class="list">
                            		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,description,url from h_special_content where specialid=36 and typeid=3 and a_status=1 order by id desc limit 7', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): if($key > 0): ?><li><a href="<?php echo ($values["url"]); ?>" target="_blank"><?php echo ($values["title"]); ?></a></li><?php endif; $i++; endforeach; endif; ;?>
                        </ul>
                        <a class="morewrap" href="/special/lists/specialid/36/typeid/3.html"><span>查看更多</span> <img src="__PUBLIC__/assets/ztimg/rr.png"
                                                                                       alt=""></a>
                    </div>
                </div>
            </div>
            <div class="topage" id="yicheng">
                <div class="maintitle mb20" style="background-image: url(/static/2022guangfu/images/tabbg.png)">
                    <p class="title">大会议程</p>
                    <p class="tips">2022第五届中国国际光伏产业高峰论坛</p>
                </div>
                <table class="meet-table mb40">
                    <tr>
                        <th class="th1">时间</th>
                        <th>事项</th>
                    </tr>
                    <tr>
                        <td>8月25日 09:00-17:00</td>
                        <td>签到、观展</td>
                    </tr>
                    <tr>
                        <td>8月25日 08:00-11:00</td>
                        <td>
                            <p>金堂县光伏项目参观考察</p>
                        </td>
                    </tr>
                    <tr>
                        <td>8月25日 12:15-13:30</td>
                        <td>
                            <p>午餐</p>
                        </td>
                    </tr>
                    <tr>
                        <td>8月25日 13:30-17:00</td>
                        <td>
                            <p>光伏创新技术交流分论坛</p>
                        </td>
                    </tr>
                    <tr>
                        <td>8月25日 17:00-18:00</td>
                        <td>
                            <p>观展、参观通威集团体验中心</p>
                        </td>
                    </tr>
                    <tr>
                        <td>8月25日 18:30-20:00</td>
                        <td>欢迎晚宴</td>
                    </tr>
                    <tr>
                        <th class="th1"></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>8月26日 08:45-09:00</td>
                        <td>开幕式</td>
                    </tr>
                    <tr>
                        <td>8月26日 09:00-10:00</td>
                        <td>领导致辞</td>
                    </tr>
                    <tr>
                        <td>8月26日 10:00-10:10</td>
                        <td>发布仪式: 2022中国光伏百强品牌价值榜发布</td>
                    </tr>
                    <tr>
                        <td>8月26日 10:10-10:40</td>
                        <td>合影、观展</td>
                    </tr>
                    <tr>
                        <td>8月26日 10:40-11:20</td>
                        <td>投资环境推介</td>
                    </tr>
                    <tr>
                        <td>8月26日 11:20-12:00</td>
                        <td>圆桌对话:抢抓能源革命机遇，打造世界级光伏产业</td>
                    </tr>
                    <tr>
                        <td>8月26日 12:00-13:30</td>
                        <td>午餐、商务洽谈</td>
                    </tr>
                    <tr>
                        <td>8月26日 13:30-14:00</td>
                        <td>主题演讲：光伏硅材料的现状和发展</td>
                    </tr>
                    <tr>
                        <td>8月26日 14:00-14:30</td>
                        <td>主题演讲：中国光伏行业的发展形势与挑战</td>
                    </tr>
                    <tr>
                        <td>8月26日 14:30-14:50</td>
                        <td>主题演讲：促进抽水蓄能产业健康持续发展的若干建议</td>
                    </tr>
                    <tr>
                        <td>8月26日 14:50-15:05</td>
                        <td>主题演讲：光伏伴侣-有机硅材料，助力光伏产业高质量发展</td>
                    </tr>
                    <tr>
                        <td>8月26日 15:05-15:20</td>
                        <td>主题演讲：光储并济数字互联助力能源转型共创零碳世界.</td>
                    </tr>
                    <tr>
                        <td>8月26日 15:20-15:35</td>
                        <td>主题演讲：服务“源网荷储”全产业链助力新型电力系统高质量发展</td>
                    </tr>
                    <tr>
                        <td>8月26日 15:35-15:50</td>
                        <td>主题演讲：欧盟光伏产品生态设计指令及能效标签进展介绍</td>
                    </tr>
                    <tr>
                        <td>8月26日 15:50-16:05</td>
                        <td>主题演讲：下一代高效电池和高效组件装备的发展趋势</td>
                    </tr>
                    <tr>
                        <td>8月26日 16:05-16:15</td>
                        <td>倡议发布：光伏产业助力碳中和目标提前实现</td>
                    </tr>
                    <tr>
                        <td>8月26日 16:15-17:10</td>
                        <td>领袖对话：“双碳”引领，中国光伏赋能绿色未来</td>
                    </tr>
                    <tr>
                        <td>8月26日 17:10-17:30</td>
                        <td>闭幕仪式、离场</td>
                    </tr>
                </table>
            </div>
            <div class="topage" id="jianjie">
                <div class="maintitle mb20" style="background-image: url(/static/2022guangfu/images/tabbg.png)">
                    <p class="title">大会简介</p>
                    <p class="tips">2022第五届中国国际光伏产业高峰论坛</p>
                </div>
                <div class="meetbrief mb30">
                    		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where specialid=36 and typeid=5 and a_status=1 order by id desc limit 1', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): echo ($values['content']); $i++; endforeach; endif; ;?>
                </div>
                <table class="meet-table mb40">
                    <tr>
                        <td class="t1">论坛主题</td>
                        <td>锚定双碳目标 赋能绿色未来</td>
                    </tr>
                    <tr>
                        <td class="t1">论坛形式</td>
                        <td>主题演讲+圆桌对话+发布仪式+跨界探讨+品牌/产品展示</td>
                    </tr>
                    <tr>
                        <td class="t1">论坛时间</td>
                        <td>2022年8月25日-26日</td>
                    </tr>
                    <tr>
                        <td class="t1">论坛地点</td>
                        <td>中国·成都·通威国际中心</td>
                    </tr>
                    <tr>
                        <td class="t1">论坛主持人</td>
                        <td>刘栋栋 中央电视台著名主持人</td>
                    </tr>
                    <tr>
                        <td class="t1">指导单位</td>
                        <td>水电水利规划设计总院、中国能源研究会</td>
                    </tr>
                    <tr>
                        <td class="t1">总冠名</td>
                        <td>乐山.中国绿色硅谷</td>
                    </tr>
                    <tr>
                        <td class="t1">联合主办单位</td>
                        <td>中国光伏行业协会、全国工商联新能源商会、中国有色金属工业协会硅业分会、中国水力发电工程学会、亚洲光伏产业协会、四川省工商业联合会、通威集团</td>
                    </tr>
                    <tr>
                        <td class="t1">战略合作单位</td>
                        <td>金辰股份、阳光电源、特变电工、硅宝科技、中信建投期货、TOV南德、陕西中集、晟成光伏、沃特维、神钢无锡、安特威、明冠新材</td>
                    </tr>
                    <tr>
                        <td class="t1">大会战略合作伙伴<br>官方唯一指定用酒</td>
                        <td>泸州老窖.国窖1573</td>
                    </tr>
                    <tr>
                        <td class="t1">大会战略合作伙伴<br>官方唯一指定用车</td>
                        <td>宝马(中国)</td>
                    </tr>
                    <tr>
                        <td class="t1">特别赞助单位:</td>
                        <td>安泰新能源、奥特维、大族光伏设备、十-科技、先导智能、湖南红太阳、美科股份、宇晶股份、微导纳米、弘元新材、聚和新材、国强兴晟、长沙博能、华信众恒、秦能光电、瑞晶太阳能、兆德电子、冷井热能</td>
                    </tr>
                    <tr>
                        <td class="t1">支持单位</td>
                        <td>高测股份、英杰电气、大恒能源、正泰新能源、首航新能源、腾晖光伏、北方华创、光达科技、福莱德科技、国自机器人、捷佳伟创、利科技、渔光物联、汉特环保、浩能新能源、罗博特科、康能电气、成都瑞烯、瑞传科技、海承碳素、万洁环保、申奇电子</td>
                    </tr>
                    <tr>
                        <td class="t1">协办单位</td>
                        <td>国际绿色经济协会、长三角太阳能光伏技术创新中心、清华大学能源转型与社会发展研究中心、中国绿色供应链联盟光伏专委会、PGO绿色能源生态合作组织、江苏省光伏产业协会、安徽省新能源协会、内蒙古太阳能行业协会、山东省太阳能行业协会、浙江省可再生能源协会、上海新能源行业协会、上海市太阳能学会、无锡新能源商会、苏州市光伏产业协会、常州市光伏行业协会、嘉兴市光伏行业协会、清华四川能源互联网研究院、四川省新能源产业促进会、四川省清洁能源产业联盟、四川大学、上海交通大学、电子科技大学、西南石油大学、苏州大学、西华大学、乐山师范学院</td>
                    </tr>
                    <tr>
                        <td class="t1">承办单位</td>
                        <td>第五届中国国际光伏产业高峰论坛组委会、通威传媒</td>
                    </tr>
                </table>
            </div>
            <div class="topage" id="jiabin">
                <div class="maintitle mb20" style="background-image: url(/static/2022guangfu/images/tabbg.png)">
                    <p class="title">拟邀嘉宾</p>
                    <p class="tips">2022第五届中国国际光伏产业高峰论坛</p>
                </div>
                <ul class="guestlist">
                    		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,description,thumbnail from h_special_content where (specialid=36 and typeid=6)  order by sort desc,save_time asc limit 100', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                        <div class="ww">
                            <div class="tx" style="background-image: url(<?php echo thumb($values['thumbnail'],200,200,true);?>);"></div>
                            <p class="name"><?php echo ($values['title']); ?></p>
                            <div class="desc"><?php echo ($values['description']); ?></div>
                        </div>
                    </li><?php $i++; endforeach; endif; ;?>
                </ul>
            </div>
            <div class="topage" id="danwei">
                <div class="maintitle mb30" style="background-image: url(/static/2022guangfu/images/tabbg.png)">
                    <p class="title">合作单位</p>
                    <p class="tips">2022第五届中国国际光伏产业高峰论坛</p>
                </div>
                <div class="partner">
                    <div class="item">
                        <p class="t0">联合主办单位</p>
                        <div class="cons">
                            <ul class="partlist">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=36 and typeid=7)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <div class="ww">
                                        <div class="logo"><img src="<?php echo ($values['thumbnail']); ?>" alt=""></div>
                                        <p class="name"><?php echo ($values['title']); ?></p>
                                    </div>
                                </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <p class="t0">战略合作单位</p>
                        <div class="cons">
                            <ul class="partlist">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=36 and typeid=8)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                        <div class="ww">
                                            <div class="logo"><img src="<?php echo ($values['thumbnail']); ?>" alt=""></div>
                                            <p class="name"><?php echo ($values['title']); ?></p>
                                        </div>
                                    </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <p class="t0">协办单位</p>
                        <div class="cons">
                            <ul class="partlist">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=36 and typeid=9)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                        <div class="ww">
                                            <div class="logo"><img src="<?php echo ($values['thumbnail']); ?>" alt=""></div>
                                            <p class="name"><?php echo ($values['title']); ?></p>
                                        </div>
                                    </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topage" id="meiti">
                <div class="partner nobr mb40">
                    <div class="item">
                        <p class="t0">合作媒体</p>
                        <div class="cons">
                            <ul class="partlist">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select title,thumbnail from h_special_content where (specialid=36 and typeid=10)  order by sort desc,save_time asc limit 50', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <div class="ww">
                                        <div class="logo"><img src="<?php echo ($values['thumbnail']); ?>" alt=""></div>
                                        <p class="name"><?php echo ($values['title']); ?></p>
                                    </div>
                                </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topage" id="lianxi">
                <div class="maintitle mb20" style="background-image: url(/static/2022guangfu/images/tabbg.png)">
                    <p class="title">联系我们</p>
                    <p class="tips">2022第五届中国国际光伏产业高峰论坛</p>
                </div>
                <div class="contactus">
                    <p>会务报名：刘女士 - 18116621510</p>
                    <p>商务报名：陈先生 - 18782983897</p>
                    <p>商务报名：王老师 - 13458393246</p>
                    <p>商务报名：金老师 - 18728023450</p>
                    <p>商务报名：王老师 - 18402831245</p>
                </div>
            </div>
        </div>
    </div>
    <div class="foot">
        <div class="w1200">
            <p>通威集团 All Rights Reserved. <a href="https://beian.miit.gov.cn/" target="_blank">蜀ICP备14018337号</a></p>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="__PUBLIC__/assets/js/jquery.js"></script>
<script src="__PUBLIC__/assets/js/aos.js"></script>
<script src="__PUBLIC__/assets/js/swiper.js"></script>
<script>
    AOS.init({
        offset: 200,
        duration: 1500,
        easing: 'ease',
        delay: 100,
        once: 'true',
    })
    var menuSwiper = new Swiper('.menus', {
        slidesPerView: 'auto',
        centerInsufficientSlides: true
    })
    $('.menus li').click(function() {
        menuSwiper.slideTo($(this).index())
    })

    $(".menus li").not('.first').click(function() {
        var index = $(this).index() - 1
        console.log(index)
        $("html,body").animate({ scrollTop: $(".topage").eq(index).offset().top - 80 }, 500);
    });
    $(".menus li.first").click(function() {
        $("html,body").animate({ scrollTop: 0 }, 500);
    })

    var hotSwiper = new Swiper('.zttwo-hotnews', {
        autoplay: true,
        pagination: {
            el: '.zttwo-hotnews .swiper-pagination',
            clickable: true,
        }
    });

    winchange()
    $(window).scroll(function() {
        winchange()
    })


    function winchange() {
        var hh = $('.head').height()
        var sc = $(window).scrollTop()
        if (sc > hh) {
            $('.special-one .menus').addClass('fixed')
        } else {
            $('.special-one .menus').removeClass('fixed')
        }
    }
</script>
</body>

</html>