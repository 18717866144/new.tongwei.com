<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>通威集团有限公司-为了生活更美好</title>
    <meta name="keywords" content="通威集团有限公司-为了生活更美好">
    <meta name="description" content="通威集团有限公司-为了生活更美好">
    <!-- External CSS -->
    <link rel="stylesheet" href="__PUBLIC__/assets/css/reset.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/aos.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/swiper.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/index.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/media.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/indexMedia.css" />
    <!--[if lt IE 9]>
    <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
<script>
    function IsPC() {
        var userAgentInfo = navigator.userAgent;
        var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPod");
        var flag = true;
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
        }
        if( location.toString().indexOf("?mobile") >0 ) {
            flag = true;
        }
        return flag;
    }
    if (!IsPC()) {
        location.href = "/index.php?d=m";
    }
</script>
    <!-- header  -->
    <header class="header">
        <div class="fw">
            <a class="logo" href="/"><img src="__PUBLIC__/assets/images/logo.png" alt=""></a>
            <div class="head-right">
                <div class="navwrap">
                    <ul class="nav">
                        <li>
                            <a class="item" href="/">首页</a>
                        </li>
                        <navigate type="all">
                        <li <if condition="$values['pid'] == $webNavigate['pid']"> class="active"</if>>
                            <a class="item <notempty name='$values.child'>next</notempty>" href="{-$values['url']-}">{-$values['navigate_name']-}</a>
                            <notempty name="values.child">
                            <div class="subnav">
                                <volist name="values['child']" id="v">
                                <a href="{-$v['url']-}">{-$v['navigate_name']-}</a>
                                </volist>
                            </div>
                            </notempty>
                        </li>
                        </navigate>
                    </ul>
                </div>
                <!-- 切换语言 -->
                <a class="language" href="http://en.tongwei.com/" target=""><img src="__PUBLIC__/assets/images/lag.png" alt=""></a>
                <!-- 搜索按钮 -->
                <a class="search-btn" href="javascript:;"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
                <!-- 搜索框 -->
                <div class="head-search search-hide">
                    <form action="/search.html" method="get">
                    <input type="text" name="q" id="ipt" placeholder="搜索">
                    <a href="javascript:;" class="btn-search" onclick="searchs()"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
                    <a href="javascript:;" class="btn-close"><img src="__PUBLIC__/assets/images/close.png" alt=""></a>
                    </form>
                </div>
                <div class="navbtn">
                    <div class="line line1"></div>
                    <div class="line line2"></div>
                    <div class="line line3"></div>
                </div>
            </div>
        </div>
    </header>
    <!-- banner  -->
    <div class="banner mt100">
        <ul class="swiper-wrapper">
                <sql sql="select * from h_slide where type_id=1 and l_status=1 order by sort desc,id desc limit 5">
                    <li class="swiper-slide">
                        <a <notempty name="values.url"> href="{-$values.url-}"  target="_blank"</notempty> style="background-image: url({-$values.picurl-});">
                        <img class="img" src="{-$values.picurl-}" alt="{-$values.title-}">
                        <if condition="$values.t_show == 1">
                            <div class="text">
                                <div class="fw">
                                    <notempty name="values.title"><p class="t1" <notempty name="values.color">style="color: {-$values.color-};"</notempty>>{-$values.title-}</p></notempty>
                                    <notempty name="values.s_title"><p class="t3" style="<notempty name='values.color'>color: {-$values.color-};</notempty> <notempty name='values.s_size'>font-size: {-$values.s_size-};</notempty>">{-$values.s_title-}</p></notempty>
<!--                                    <notempty name="values.s_title"><p class="t2" <notempty name="values.color">style="color: {-$values.color-};"</notempty>>追求卓越 &nbsp;&nbsp;&nbsp;奉献社会 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;诚信正一</p></notempty>-->
                                </div>
                            </div>
                        </if>
                        </a>
                    </li>
                </sql>
            <!-- <li class="swiper-slide">
                <a href="" style="background-image: url(temp/banner02.png);">
                    <img class="img" src="__PUBLIC__/assets/temp/banner02.png" alt="">
                    <div class="text">
                        <div class="fw">
                            <p class="t1" style="color: #fff;">光伏改变世界</p>
                            <p class="t2" style="color: #fff;">打造世界级绿色能源和绿色食品供应商</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="swiper-slide">
                <a href="" style="background-image: url(temp/banner03.png);">
                    <img class="img" src="__PUBLIC__/assets/temp/banner03.png" alt="">
                    <div class="text">
                        <div class="fw">
                            <p class="t1" style="color: #fff;">绿水青山就是金山银山</p>
                        </div>
                    </div>
                </a>
            </li> -->
        </ul>
        <div class="banner-dots">
            <div class="fw">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- 主体内容 -->
    <div class="mainbox graybg">
        <!-- 热点新闻 -->
       <!-- <section class="section1">
            <div class="fw">
                <div class="common-title">
                    <span class="title">热点新闻</span>
                </div>
                <div class="hotnews-wrap">
                    <div class="hotnews">
                        <ul class="swiper-wrapper">
                            <content limit="3" type="list" where="FIND_IN_SET('f',attr)" cid="15" field="id,title,title_short,title_hot,style,save_time,url,thumbnail">
                            <li class="swiper-slide">
                                <a href="{-$values.url-}">
                                    <p class="tt">{-$values.title-}</p>
                                    <span class="type">推荐</span>
                                </a>
                            </li>
                            </content>
                        </ul>
                    </div>
                </div>

            </div>
        </section>-->
        <!-- 资讯 -->
        <section class="section2">
            <div class="fw">
                <div class="left">
                    <div class="leftnews">
                        <ul class="swiper-wrapper">
                            <content limit="3" type="list" where="FIND_IN_SET('h',attr)" cid="15" field="id,title,title_short,title_hot,style,save_time,url,thumbnail">
                                <php>
                                    $pic_ulr=$values['thumbnail'];
                                    $titles =explode('==',$values['title_hot']);
                                </php>
                            <li class="swiper-slide">
                                <a href="{-$values.url-}">
                                    <div class="pic">
                                        <div class="imgbg" style="background-image: url({-:thumb($pic_ulr,758,427,true)-});"></div>
                                        <img class="img" src="{-:thumb($pic_ulr,758,417,true)-}" alt="{-$values.title-}">
                                    </div>
                                    <div class="text">
                                        <php>
                                            if($titles[1])
                                            {
                                        </php>
                                        <div class="title">{-$titles[0]-}{-$titles[1]-}</div>
                                            <php>}else{</php>
                                        <div class="title">{-$titles[0]-}</div>
                                                <php>}</php>
                                    </div>
                                </a>
                            </li>
                            </content>
                        </ul>
                        <div class="swiper-pagination"></div>
                        <a class="btn prev" href="javascript:;"><img src="__PUBLIC__/assets/images/zuo2.png" alt=""></a>
                        <a class="btn next" href="javascript:;"><img src="__PUBLIC__/assets/images/you0.png" alt=""></a>
                    </div>
                </div>
                <div class="right">
                    <div class="tabs-wrap">
                        <div class="tabs">
                            <a class="on" href="javascript:;">集团新闻</a>
                            <a href="javascript:;">媒体聚焦</a>
                            <a href="javascript:;">新闻专题</a>
                            <a href="http://rm.tongwei.com/index" target="_blank">通威融媒</a>
                        </div>
                        <a class="more02" href="/news/index.html">更多 <img src="__PUBLIC__/assets/images/jt2.png" alt=""></a>
                    </div>
                    <div class="tabswrap">
                        <!-- 集团新闻 -->
                        <div class="box open">
                            <ul class="newslist">
                                <php>$noids_str = $noids?implode(',',$noids):'0';</php>
                                <content limit="10" type="list" cid="15" field="id,title,title_short,style,save_time,url" where="id not in({$noids_str}) and !FIND_IN_SET('d,f',attr)" order="save_time desc">
                                <li>
                                    <a href="{-$values['url']-}">
                                        <p class="tt">{-$values['title_short']?$values['title_short']:$values['a_title']-}</p>
                                        <p class="date">{-:date('Y-m-d',$values['save_time'])-}</p>
                                    </a>
                                </li>
                                </content>
                            </ul>
                        </div>
                        <!-- 媒体聚焦 -->
                        <div class="box">
                            <ul class="newslist">
                                <content limit="10" type="list" cid="18" field="id,title,title_short,style,save_time,url" order="save_time desc">
                                <li>
                                    <a href="{-$values['url']-}">
                                        <p class="tt">{-$values['title_short']?$values['title_short']:$values['a_title']-}</p>
                                        <p class="date">{-:date('Y-m-d',$values['save_time'])-}</p>
                                    </a>
                                </li>
                                </content>
                            </ul>
                        </div>
                        <!-- 新闻专题 -->
                        <div class="box">
                            <ul class="newslist">
                                <sql sql="select id,title,url,create_time from h_special where l_status=1 and is_show=0 order by id desc limit 0,10">
                                <li>
                                    <a href="{-$values.url-}" target="_blank">
                                        <p class="tt">{-$values.title-}</p>
                                        <p class="date">{-$values.create_time|date="Y-m-d",###-}</p>
                                    </a>
                                </li>
                                </sql>
                            </ul>
                        </div>
                    </div>
                    <!-- 专区链接 -->
                    <div class="newindex-area">
                        <a href="/special/1.html">
                            <div class="text">
                                <p class="t1">刘汉元主席专区</p>
                                <p class="t2">让大家在不远的未来能够常常看到青山绿水白云蓝天</p>
                            </div>
                            <img class="icon" src="__PUBLIC__/assets/images/fy.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="newindex1">
            <div class="fw">
                <ul class="lvse-list">
                    <li>
                        <a href="/agri/index.html">
                            <img src="__PUBLIC__/assets/images/ls1.png" alt="">
                            <p class="tt"><span>绿色农业</span></p>
                            <div class="state">
                                饲料工业为核心，不断延伸和完善水产及畜禽产业，打造集品种改良、研发、养殖技术研究和推广，以及食品加工、销售、品牌打造和服务为一体的绿色农牧产业链。
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/energy/index.html">
                            <img src="__PUBLIC__/assets/images/ls2.png" alt="">
                            <p class="tt"><span>绿色能源</span></p>
                            <div class="state">
                                高纯晶硅生产、高效太阳能电池片生产、光伏电站建设与运营的垂直一体化光伏企业，拥有自主知识产权的光伏新能源产业链条。
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/diversified/index.html">
                            <img src="__PUBLIC__/assets/images/ls3.png" alt="">
                            <p class="tt"><span>相关多元</span></p>
                            <div class="state">积极拓展宠物食品、建筑与房地产、物业管理、文化传媒、商业管理等相关产业。</div>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <!-- footer  -->
    <footer class="footer">
        <div class="foot-top">
            <div class="fw">
                <div class="wrap">
                    <div class="left">
                        <div class="foot-search">
                            <form action="/search" method="get">
                                <input type="text" name="q" id="ipts" placeholder="搜索">
                                <a href="javascript:;" class="btn-search" onclick="searchs()"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
                            </form>
                        </div>
                        <div class="infos">
                            <p>总部地址：四川省成都市高新区天府大道中段588号通威国际中心</p>
                            <p>联系电话：028-85188888</p>
                        </div>
                        <div class="codes">
                            <div class="citem">
                                <img src="__PUBLIC__/assets/temp/code1.png" alt="">
                                <p class="t0"><span>关注通威</span></p>
                            </div>
                            <div class="citem">
                                <img src="__PUBLIC__/assets/temp/code2.png" alt="">
                                <p class="t0"><span>通威融媒</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <!--<div class="foot-search-wrap">-->
                            <!-- 搜索打开按钮 -->
                            <!--<a class="sbtn" href="javascript:;"><img src="__PUBLIC__/assets/images/ss2.png" alt=""></a>-->
                            <!-- 搜索框 -->
                            <!--<div class="foot-search search-hide">
                                <form action="/search" method="get">
                                <input type="text" name="q" id="ipts" placeholder="搜索">
                                <a href="javascript:;" class="btn-search" onclick="searchs()"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
                                <a href="javascript:;" class="btn-close"><img src="__PUBLIC__/assets/images/close.png" alt=""></a>
                                </form>
                            </div>-->
                        <!--</div>-->
                        <div class="line"></div>
                        <div class="item">
                            <a class="tt" href="index.html">首页</a>
                        </div>
                        <navigate type="all">
                        <div class="item">
                            <a class="tt" href="{-$values['url']-}">{-$values['navigate_name']-}</a>
                            <notempty name="values.child">
                            <div class="sublist">
                                <volist name="values['child']" id="v">
                                <a href="{-$v['url']-}">{-$v['navigate_name']-}</a>
                                </volist>
                            </div>
                            </notempty>
                        </div>
                        </navigate>
                    </div>
                </div>
                <div class="links">
                    <a href="http://www.tongwei.com.cn/" target="_blank">通威股份</a>
                    <a href="http://www.scyxgf.com/" target="_blank">永祥股份</a>
                    <a href="http://www.tw-solar.com/" target="_blank">通威太阳能</a>
                    <a href="http://www.tw-newenergy.com/index" target="_blank">通威新能源</a>
                    <a href="https://www.tw-nongmu.com/" target="_blank">通威农牧</a>
                    <a href="http://www.tongyuwuye.com/" target="_blank">通宇物业</a>
                    <a href="http://www.tongweifood.cn/" target="_blank">通威食品</a>
                    <a href="http://www.tongweifood.cn/list_17.html" target="_blank">通威鱼</a>
                    <a href="http://www.care-pet.com/" target="_blank">好主人宠物食品</a>
                    <a href="javascript:;">通威传媒</a>
                    <a href="javascript:;">通威商管</a>
                </div>
            </div>
        </div>
        <div class="foot-bottom">
            <div class="fw">
                通威集团有限公司 @ 2021 TONGWEI.COM 版权所有 &nbsp;
                <a href="https://beian.miit.gov.cn/" target="_blank">蜀ICP备05002048号</a>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="__PUBLIC__/assets/js/jquery.js"></script>
    <script src="__PUBLIC__/assets/js/aos.js"></script>
    <script src="__PUBLIC__/assets/js/swiper.js"></script>
    <script src="__PUBLIC__/assets/js/common.js"></script>
    <script>
        if ($('.banner li').length === 1) {
            $('.banner .swiper-pagination').hide()
        }
        var bannerSwiper = new Swiper('.banner', {
            autoplay: {
                delay: 15000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
            },
            loop:true,
            pagination: {
                el: '.banner .swiper-pagination',
                clickable: true
            }
        });
        // 热点新闻轮播
        var hotnewsSwiper = new Swiper('.hotnews', {
            autoplay: {
                delay: 12000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
            },
            spaceBetween: 100,
            speed: 1000,
            loop: true,
            slidesPerView: 1,
            grid: {
                fill: 'column',
                rows: 1,
            },
            breakpoints: {
                1024: {
                    direction: 'vertical',
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                1280: {
                    spaceBetween: 50,
                }
            }
        })
        // 大图新闻轮播
        var leftnewsSwiper = new Swiper('.leftnews', {
            autoplay: {
                delay: 10000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
            },
            loop: true,
            speed: 500,
            navigation: {
                nextEl: '.leftnews .next',
                prevEl: '.leftnews .prev',
            },
            pagination: {
                el: '.leftnews .swiper-pagination',
                clickable: true,
            },
        })

        // 切换
        // 更多链接
        var linkarr = ["/news/index.html", "/media/index.html", '/special/index.html']
        $('.tabs-wrap .more-jt').attr('href', linkarr[$('.tabs-wrap .tabs .on').index()])
        $('.tabs a').click(function() {
            $(this).addClass('on').siblings().removeClass('on')
            var index = $(this).index()
            $(this).parent().next().attr('href', linkarr[index])
            $('.tabswrap .box').eq(index).addClass('open').siblings().removeClass('open')
        })
        // 产业轮播
        var cylistSwiper = new Swiper('.cylist-swiper', {
            slidesPerView: 7,
            breakpoints: {
                360: {
                    slidesPerView: 2
                },
                720: {
                    slidesPerView: 3
                },
                1024: {
                    slidesPerView: 4,
                },
                1480: {
                    slidesPerView: 5,
                },
            },
        })
        // 产业切换 
        $('.cylist-swiper li').click(function() {
            var _li = $(this).index()
            var _src = $(this).data('img')
            $(this).addClass('active').siblings().removeClass('active')
            $('.cyinfo-wrap .box').eq(_li).addClass('show').siblings().removeClass('show')
            $('.cywrap').css('background-image', 'url(' + _src + ')')
            cylistSwiper.slideTo(_li)
        })

        // 可持续发展切换
        $('.fatabs a').click(function() {
            $(this).addClass('on').siblings().removeClass('on')
            $('.fatabs-wrap .box').eq($(this).index()).addClass('open').siblings().removeClass('open')
        })

    </script>
</body>

</html>