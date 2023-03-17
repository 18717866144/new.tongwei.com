<?php defined('HX_CMS') or exit;$thispid = $navigate['id'];?><block name="php"></block>
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
        <link rel="stylesheet" href="__PUBLIC__/assets/css/swiper.css">
        <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css?v=5">
        <link rel="stylesheet" href="__PUBLIC__/assets/css/common.css?v=6" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/media.css?v=4" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/commonMedia.css?v=4" />
        <title>专题三</title>
        <!--[if lt IE 9]>
        <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <![endif]-->
    </head>
<body>
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
                        <li <if condition="$values['id'] == $navigate['pid']"> class="active"</if>>
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
            <a class="language" href="http://en.tongwei.com/" target="_blank"><img src="__PUBLIC__/assets/images/lag.png" alt=""></a>
            <!-- 搜索按钮 -->
            <a class="search-btn" href="javascript:;"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
            <!-- 搜索框 -->
            <div class="head-search search-hide">
                <form action="/search.html" method="get">
                    <input type="text" name="q" id="ipt" placeholder="输入关键词，回车">
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
<block name="page_banner">

</block>
<block name="main"></block>
<footer class="footer">
    <div class="foot-top">
        <div class="fw">
            <div class="wrap">
                <!-- <div class="index-erweima">
                    <img src="__PUBLIC__/assets/temp/code1.png" alt="">
                    <p class="t0"><span>关注通威</span></p>
                </div> -->
                <div class="left">
                    <div class="infos">
                        <p style="word-wrap:break-word">总部地址：四川省成都市高新区天府大道中段588号通威国际中心</p>
                        <p>联系电话：028-85188888</p>
                    </div>
                    <div class="codes">
                        <div class="citem">
                            <img src="__PUBLIC__/assets/temp/code1.png" alt="">
                            <p class="t0"><span>关注通威</span></p>
                        </div>
                        <div class="citem hide">
                            <img src="__PUBLIC__/assets/temp/code2.png" alt="">
                            <p class="t0"><span>通威融媒</span></p>
                        </div>
                    </div>
                </div>
                <div class="right mr0">
                    <div class="foot-search-wrap">
                        <!-- 搜索打开按钮 -->
                        <a class="sbtn" href="javascript:;"><img src="__PUBLIC__/assets/images/ss2.png" alt=""></a>
                        <!-- 搜索框 -->
                        <div class="foot-search search-hide">
                            <form action="/search" method="get">
                                <input type="text" name="q" id="ipts" placeholder="输入关键词，回车">
                                <a href="javascript:;" class="btn-search" onclick="searchs()"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
                                <a href="javascript:;" class="btn-close"><img src="__PUBLIC__/assets/images/close.png" alt=""></a>
                            </form>
                        </div>
                    </div>
                    <div class="line"></div>
                    <!--<div class="item">
                        <a class="tt" href="index.html">首页</a>
                    </div>-->
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
                    <div class="foot-right01">
                        <div class="index-erweima mt">
                            <img src="__PUBLIC__/assets/temp/code2.png" alt="">
                            <p class="t0"><span>通威融媒</span></p>
                        </div>
                    </div>
                </div>
                <!-- <div class="index-erweima">
                    <img src="__PUBLIC__/assets/temp/code2.png" alt="">
                    <p class="t0"><span>通威融媒</span></p>
                </div> -->
            </div>
            <div class="linkwrap">
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
    </div>
    <div class="foot-bottom">
        <div class="fw">
            <!-- <span class="s1">总部地址：四川省成都市高新区天府大道中段588号通威国际中心</span>
            <span class="s1">联系电话：028-85188888</span> -->
            <span>通威集团有限公司 @ 2021 TONGWEI.COM 版权所有</span>
            <a href="https://beian.miit.gov.cn/">蜀ICP备05002048号</a>
        </div>
    </div>
</footer>
<!-- 页脚 -->
<div class="videomask">
    <div class="content">
        <a class="closebtn" href="javascript:;">X</a>
        <video id="myvideo" src="https://www.tongwei.com/uploadfile/files/tongwei2022.mp4" controls width="100%"></video>
    </div>
</div>
<!-- JavaScript -->
<script src="__PUBLIC__/assets/js/jquery.js"></script>
<script src="__PUBLIC__/assets/js/aos.js"></script>
<script src="__PUBLIC__/assets/js/swiper.js"></script>
<script src="__PUBLIC__/assets/js/common.js"></script>
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
        $(this).addClass('active').siblings().removeClass('active')
        var index = $(this).data('index')
        $("html,body").animate({ scrollTop: $(".topage" + index).offset().top - 80 }, 500);
    });
    $(".menus li.first").click(function() {
        $(this).addClass('active').siblings().removeClass('active')
        $("html,body").animate({ scrollTop: 0 }, 500);
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
                $('.special-three .smenuwrap').addClass('fixed')
            } else {
                $('.special-three .smenuwrap').removeClass('fixed')
            }
        } else {
            if (sc > hh) {
                $('.special-three .smenuwrap').addClass('fixed')
            } else {
                $('.special-three .smenuwrap').removeClass('fixed')
            }
        }
    }

    var bookSwiper = new Swiper('.book-swiper', {
        autoplay: {
            delay: 25000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
        },
        loop: true,
        navigation: {
            nextEl: '.book-wrap .next',
            prevEl: '.book-wrap .prev'
        }
    })

    var mediaSwiper = new Swiper('.zttwo-media', {
        autoplay: {
            delay: 6000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.zttwo-media .next',
            prevEl: '.zttwo-media .prev',
            disabledClass: 'disabled'
        }
    })

    var videoSwiper = new Swiper('.zttwo-video', {
        slidesPerView: 2,
        spaceBetween: 12,
        autoplay: {
            delay: 6000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.zttwo-video .next',
            prevEl: '.zttwo-video .prev',
            disabledClass: 'disabled',
        },
        breakpoints: {
            540: {
                spaceBetween: 10,
            }
        },
    })


</script>
</body>
</html>