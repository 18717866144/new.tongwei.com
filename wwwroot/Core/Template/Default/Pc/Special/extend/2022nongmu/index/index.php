<!DOCTYPE html>
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
    <title>2022第八届中国农业品牌年度颁奖盛典</title>
    <!--[if lt IE 9]>
    <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="special-one">
    <div class="head">
        <sql sql="select thumbnail from h_special_content where specialid=39 and typeid=1 and a_status=1 order by sort desc limit 1">
            <img src="{-$values['thumbnail']-}" alt="" style="width:100%;">
        </sql>
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
                <div class="maintitle mb20" style="background-image: url(/static/2022nongmu/images/tabbg.png)">
                    <p class="title">图文报道</p>
                    <p class="tips">第八届中国农业品牌年度颁奖盛典</p>
                </div>
                <div class="photo-text mb40">
                    <div class="left">
                        <div class="zttwo-hotnews one">
                            <ul class="swiper-wrapper">
                                <sql sql="select title,thumbnail from h_special_content where specialid=39 and typeid=2 and a_status=1 order by sort desc">
                                <li class="swiper-slide">
                                    <a href="javascript:;">
                                        <div class="pic">
                                            <div class="bgimg" style="background-image: url({-$values['thumbnail']-});">
                                            </div>
                                            <img class="img" src="{-$values['thumbnail']-}" alt="" width="100%" height="100%">
                                        </div>
                                        <div class="tt">{-$values['title']-}</div>
                                    </a>
                                </li>
                                </sql>
                            </ul>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="tops">
                            <sql sql="select * from h_special_content where specialid=39 and typeid=3 and a_status=1 order by id desc limit 1">
                            <a href="{-$values.url-}" target="_blank">
                                <p class="tt">{-$values.title-}</p>
                                <div class="desc">
                                    {-$values['description']-}
                                </div>
                            </a>
                            </sql>
                        </div>
                        <ul class="list">
                            <sql sql="select title,description,url from h_special_content where specialid=39 and typeid=3 and a_status=1 order by id desc limit 7">
                                <if condition='$key gt 0'>
                                <li><a href="{-$values.url-}" target="_blank">{-$values.title-}</a></li>
                                </if>
                            </sql>
                        </ul>
                        <a class="morewrap" href="/special/lists/specialid/39/typeid/3.html"><span>查看更多</span> <img src="__PUBLIC__/assets/ztimg/rr.png"
                                                                                       alt=""></a>
                    </div>
                </div>
            </div>
            <div class="topage" id="yicheng">
                <div class="maintitle mb20" style="background-image: url(/static/2022nongmu/images/tabbg.png)">
                    <p class="title">大会议程</p>
                    <p class="tips">第八届中国农业品牌年度颁奖盛典</p>
                </div>
                <table class="meet-table mb40">
                    <tr>
                        <th class="th1">时间</th>
                        <th>事项</th>
                    </tr>
                    <tr>
                        <td>1月15日 08:00-12:00</td>
                        <td>天府农博园参观</td>
                    </tr>
                    <tr>
                        <td>1月15日 14:00-16:30</td>
                        <td>
                            <p>农产品推介及品牌研讨会</p>
                        </td>
                    </tr>
                    <tr>
                        <td>1月15日 17:00-18:00</td>
                        <td>
                            <p>参观通威体验中心</p>
                        </td>
                    </tr>
                    <tr>
                        <td>1月15日 18:30-20:00</td>
                        <td>
                            <p>欢迎晚宴·五粮液之夜</p>
                        </td>
                    </tr>
                    <tr>
                        <th class="th1"></th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>12月16日 08:50-09:00</td>
                        <td>领导及重要嘉宾入场</td>
                    </tr>
                    <tr>
                        <td>12月16日 09:00-09:10</td>
                        <td>开幕式</td>
                    </tr>
                    <tr>
                        <td>12月16日 09:10-10:10</td>
                        <td>领导、嘉宾致辞</td>
                    </tr>
                    <tr>
                        <td>12月16日 10:10-10:30</td>
                        <td>2022中国农产品百强标志性品牌发布仪式</td>
                    </tr>
                    <tr>
                        <td>12月16日 10:30-11:00</td>
                        <td>合影、观展</td>
                    </tr>
                    <tr>
                        <td>12月16日 11:00-11：20</td>
                        <td>主题演讲：数字技术与全面推进乡村振兴</td>
                    </tr>
                    <tr>
                        <td>12月16日 11:20-11:40</td>
                        <td>主题演讲：畜牧企业未来之路</td>
                    </tr>
                    <tr>
                        <td>12月16日 11:40-12:00</td>
                        <td>主题演讲：中国式农业农村现代化与农业强国建设</td>
                    </tr>
                    <tr>
                        <td>12月16日 12:00-13:30</td>
                        <td>午餐、商务洽谈</td>
                    </tr>
                    <tr>
                        <td>12月16日 13:30-13:50</td>
                        <td>主题演讲：创新发展渔光一体 打造乡村振兴范本</td>
                    </tr>
                    <tr>
                        <td>12月16日 13:50-14:10</td>
                        <td>主题演讲：创新科技服务模式，助力建设农业强国</td>
                    </tr>
                    <tr>
                        <td>12月16日 14:10-14:30</td>
                        <td>主题演讲：二十大后农业品牌建设新思考</td>
                    </tr>
                    <tr>
                        <td>12月16日 14:30-14:50</td>
                        <td>主题演讲：农业强国建设与企业家精神</td>
                    </tr>
                    <tr>
                        <td>12月16日 14:50-15:10</td>
                        <td>主题演讲：中国农产品的国际化思考</td>
                    </tr>
                    <tr>
                        <td>12月16日 15:10-15:30</td>
                        <td>主题演讲：产业蝶变：预制菜品牌建设要点及发展战略</td>
                    </tr>
                    <tr>
                        <td>12月16日 15:30-15:50</td>
                        <td>主题演讲：借势文化塑造中国农产品品牌</td>
                    </tr>
                    <tr>
                        <td>12月16日 15:50-16:40</td>
                        <td>圆桌对话：落实二十大精神  赋能乡村振兴</td>
                    </tr>
                    <tr>
                        <td>12月16日 16:40-17:00</td>
                        <td>颁奖仪式：2022年度中国农业品牌颁奖典礼</td>
                    </tr>
                    <tr>
                        <td>12月16日 17:00-17:10</td>
                        <td>闭幕、离场</td>
                    </tr>
                </table>
            </div>
            <div class="topage" id="jianjie">
                <div class="maintitle mb20" style="background-image: url(/static/2022nongmu/images/tabbg.png)">
                    <p class="title">大会简介</p>
                    <p class="tips">第八届中国农业品牌年度颁奖盛典</p>
                </div>
                <div class="meetbrief mb30">
                    <sql sql="select * from h_special_content where specialid=39 and typeid=5 and a_status=1 order by id desc limit 1">
                        {-$values['content']-}
                    </sql>
                </div>
                <table class="meet-table mb40">
                    <tr>
                        <td class="t1">论坛主题</td>
                        <td>赋能乡村振兴 建设农业强国</td>
                    </tr>
                    <tr>
                        <td class="t1">论坛形式</td>
                        <td>农业产业园参观+农产品推介会+主题演讲+圆桌对话+中国农产品百强标志性品牌发布+颁奖盛典+同期展会</td>
                    </tr>
                    <tr>
                        <td class="t1">论坛时间</td>
                        <td>2022年12月15-16日</td>
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
                        <td>中国农业产业化龙头企业协会、中国饲料工业协会</td>
                    </tr>
                    <tr>
                        <td class="t1">特别支持单位</td>
                        <td>中国畜牧业协会、四川省知识产权服务促进中心</td>
                    </tr>
                    <tr>
                        <td class="t1">联合主办单位</td>
                        <td>中国农业电影电视中心、全国农业科技创业创新联盟、西部民营经济研究院、通威集团</td>
                    </tr>
                    <tr>
                        <td class="t1">大会唯一指定用酒</td>
                        <td>五粮液</td>
                    </tr>
                    <tr>
                        <td class="t1">支持单位</td>
                        <td>通威农发、通威新能源、天马科技、内江供应链集团、呼伦贝尔农投、北京小罐茶、建明中国、李记集团、通威食品、飘香居、少海啤酒、特门郭勒、洽洽食品、傲农集团、辅音国际、布勒（常州）、利川红、鼎王金猪、源味武川、苏状元、逸田蓝莓、野性田园、威兰特果小酒、沙漠仙草、欧其乐、润家香米、椒之骄、巡蜂侠、向霖农业</td>
                    </tr>
                    <tr>
                        <td class="t1">协办单位</td>
                        <td>国际绿色经济协会、四川省科技助力乡村振兴促进会、新疆农业产业化龙头企业协会、内蒙古农牧业产业化龙头企业协会、山西省现代农业产业发展协会、湖南省农业产业化协会、安徽省生态农业产业商会、陕西省农业产业化龙头企业协会、福建省农业产业化龙头企业协会、江苏省农业产业化龙头企业协会、湖南省现代农业企业协会、湖北省农业产业化龙头企业协会、四川省川联农业产业化龙头企业协会、四川省畜牧业协会、四川省饲料工业协会、四川省农产品流通协会、西部农业品牌研究院、海南省农业交流协会、重庆市有机农业产业协会、重庆市畜牧业协会、重庆市农产品流通协会、四川省农村发展促进会、四川省智慧农业科技协会、中国农村网</td>
                    </tr>
                    <tr>
                        <td class="t1">承办单位</td>
                        <td>中国农业品牌年度颁奖盛典组委会、通威传媒</td>
                    </tr>
                </table>
            </div>
            <div class="topage" id="jiabin">
                <div class="maintitle mb20" style="background-image: url(/static/2022nongmu/images/tabbg.png)">
                    <p class="title">拟邀嘉宾</p>
                    <p class="tips">第八届中国农业品牌年度颁奖盛典</p>
                </div>
                <ul class="guestlist">
                    <sql sql="select title,description,thumbnail from h_special_content where (specialid=39 and typeid=6)  order by sort desc,save_time asc limit 100">
                    <li>
                        <div class="ww">
                            <div class="tx" style="background-image: url({-:thumb($values['thumbnail'],200,200,true)-});"></div>
                            <p class="name">{-$values['title']-}</p>
                            <div class="desc">{-$values['description']-}</div>
                        </div>
                    </li>
                    </sql>
                </ul>
            </div>
            <div class="topage" id="danwei">
                <div class="maintitle mb30" style="background-image: url(/static/2022nongmu/images/tabbg.png)">
                    <p class="title">合作单位</p>
                    <p class="tips">第八届中国农业品牌年度颁奖盛典</p>
                </div>
                <div class="partner">
                    <div class="item">
                        <p class="t0">联合主办单位</p>
                        <div class="cons">
                            <ul class="partlist">
                                <sql sql="select title,thumbnail from h_special_content where (specialid=39 and typeid=7)  order by sort desc,save_time asc limit 50">
                                <li>
                                    <div class="ww">
                                        <div class="logo"><img src="{-$values['thumbnail']-}" alt=""></div>
                                        <p class="name">{-$values['title']-}</p>
                                    </div>
                                </li>
                                </sql>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <p class="t0">支持单位</p>
                        <div class="cons">
                            <ul class="partlist">
                                <sql sql="select title,thumbnail from h_special_content where (specialid=39 and typeid=8)  order by sort desc,save_time asc limit 50">
                                    <li>
                                        <div class="ww">
                                            <div class="logo"><img src="{-$values['thumbnail']-}" alt=""></div>
                                            <p class="name">{-$values['title']-}</p>
                                        </div>
                                    </li>
                                </sql>
                            </ul>
                        </div>
                    </div>
                    <div class="item">
                        <p class="t0">协办单位</p>
                        <div class="cons">
                            <ul class="partlist">
                                <sql sql="select title,thumbnail from h_special_content where (specialid=39 and typeid=9)  order by sort desc,save_time asc limit 50">
                                    <li>
                                        <div class="ww">
                                            <div class="logo"><img src="{-$values['thumbnail']-}" alt=""></div>
                                            <p class="name">{-$values['title']-}</p>
                                        </div>
                                    </li>
                                </sql>
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
                                <sql sql="select title,thumbnail from h_special_content where (specialid=39 and typeid=10)  order by sort desc,save_time asc limit 50">
                                <li>
                                    <div class="ww">
                                        <div class="logo"><img src="{-$values['thumbnail']-}" alt=""></div>
                                        <p class="name">{-$values['title']-}</p>
                                    </div>
                                </li>
                                </sql>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topage" id="lianxi">
                <div class="maintitle mb20" style="background-image: url(/static/2022nongmu/images/tabbg.png)">
                    <p class="title">联系我们</p>
                    <p class="tips">第八届中国农业品牌年度颁奖盛典</p>
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