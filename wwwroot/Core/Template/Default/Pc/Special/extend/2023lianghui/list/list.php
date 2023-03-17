<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title>
    <meta name="keywords" content="{-$special['title']-}">
    <meta name="description" content="{-$special['description']-}">
    <!-- External CSS -->
    <link rel="stylesheet" href="__PUBLIC__/assets/css/reset.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/aos.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/swiper.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/common.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/media.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/commonMedia.css" />
    <!--[if lt IE 9]>
    <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body style="background:#b9191a; ">
<div class="special-two" style="background:url(/static/2023lianghui/images/lhbanner5.jpg) no-repeat top;background-size: 100%;">
    <div class="head"><img src="/static/2023lianghui/images/lhbanner1.jpg" alt=""></div>
    <div class="mainbox">
        <div class="w1200">
            <div class="menuswrap">
                <div class="menus">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">
                            <a href="/special/40.html">首页</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="/special/lists/specialid/40/typeid/1.html">图文报道</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="/special/lists/specialid/40/typeid/2.html">代表议案</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="/special/lists/specialid/40/typeid/5.html">视频报道</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="/special/lists/specialid/40/typeid/3.html">媒体聚焦</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="/special/lists/specialid/40/typeid/6.html">往期回顾</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="zt-two-wrap">
                <div class="whitebox">
                    <div class="zttwo-title bg2 mb20">
                        <p class="t1">刘汉元代表十四届全国人大一次会议</p>
                        <if condition="$typeid eq 1">
                        <p class="t2">图文报道</p>
                        </if>
                        <if condition="$typeid eq 2">
                        <p class="t2">代表议案</p>
                        </if>
                        <if condition="$typeid eq 3">
                        <p class="t2">媒体聚焦</p>
                        </if>
                        <if condition="$typeid eq 5">
                        <p class="t2">视频报道</p>
                        </if>
                        <if condition="$typeid eq 6">
                        <p class="t2">往期回顾</p>
                        </if>
                    </div>
                    <ul class="zt-two-newslist">
                        <volist name="list" id="r">
                        <li>
                            <a href="{-$r['url']-}" target="_blank">{-$r[title]-}</a>
                        </li>
                        </volist>
                    </ul>
                    <div class="pages red mb20">
                        {-$pages-}
                        <!--<a class="btn" href="javascript:;"><img src="images/prev.png" alt=""></a>
                        <a class="item active" href="javascript:;">1</a>
                        <a class="item" href="javascript:;">2</a>
                        <a class="item" href="javascript:;">3</a>
                        <a class="item" href="javascript:;">4</a>
                        <a class="btn" href="javascript:;"><img src="images/next.png" alt=""></a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foot">
        <div class="w1200">
            通威集团有限公司 @ 2023 TONGWEI 版权所有　　
            <a href="">蜀ICP备05002048号</a>　　
            <span>总部地址：四川省成都市高新区天府大道中段588号通威国际中心</span>　
            <span>电话：028-85188888</span>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="js/jquery.js"></script>
<script src="js/aos.js"></script>
<script src="js/swiper.js"></script>
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

    winchange()
    $(window).scroll(function() {
        winchange()
    })

    function winchange() {
        var hh = $('.head').height()
        var sc = $(window).scrollTop()
        var ww = $(window).width()
        if (ww > 1240) {
            if (sc > 400) {
                $('.special-two .menuswrap').addClass('fixed')
            } else {
                $('.special-two .menuswrap').removeClass('fixed')
            }
        } else {
            if (sc > hh) {
                $('.special-two .menuswrap').addClass('fixed')
            } else {
                $('.special-two .menuswrap').removeClass('fixed')
            }
        }

    }
</script>
</body>

</html>