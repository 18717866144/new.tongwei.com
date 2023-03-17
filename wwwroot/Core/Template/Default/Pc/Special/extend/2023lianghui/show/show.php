<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- External CSS -->
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/public.css">
    <link rel="stylesheet" href="css/common.css" />
    <link rel="stylesheet" href="css/media.css" />
    <link rel="stylesheet" href="css/commonMedia.css" />
    <title>专题二</title>
    <!--[if lt IE 9]>
    <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="special-two">
    <div class="head"><img src="ztimg/head2.png" alt=""></div>
    <div class="mainbox">
        <div class="w1200">
            <div class="menuswrap">
                <div class="menus">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">
                            <a href="two.html">首页</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="two.html">图文报道</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="two.html">提案建议</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="two.html">视频报道</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="two.html">媒体报道</a>
                        </li>
                        <li class="swiper-slide">
                            <a href="two.html">往期回顾</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="zt-two-wrap">
                <div class="whitebox">
                    <div class="ztone-detail pd">
                        <h3 class="title">金堂县住建局领导一行调研金堂基地人才安居工作</h3>
                        <p class="date">2022-04-13</p>
                        <div class="details">
                            <p style="text-align: center;"><img src="temp/n5.png" alt=""></p>
                            <br>
                            <p>为落实李斌董事长“安全是所有工作的前提”讲话精神，真正做到“我的属地我负责，我的工作请放心”，近日，永祥股份总经理助理兼品管部部长陈雪刚带队开展属地安全大检查。</p>
                            <br>
                            <p>为切实保障分析人员的工作环境安全、职业健康安全、检测工作安全，陈总带队围绕151属地上下三层楼的每一间房间进行细致检查，确保顶楼的淋洗塔正常，确保每一层楼功能房间里的仪器设备、人员操作、环境设施等安全可靠，确保大家处于安全的环境监控中。
                            </p>
                            <br>
                            <p>永祥新能源品管部始终坚持“安全第一、预防为主、以人为本、综合治理”的安全生产方针，落实到日常安全管理工作中。通过检查，采取安全管理对策，消除不安全因素，保障部门属地的人员、设备、运行等各方面的安全；进一步宣传、贯彻、落实公司的安全生产方针、政策和各项安全生产规章制度、规范、标准，真正做到防患于未然！
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foot">
        <div class="w1200">
            通威集团有限公司 @ 2022 TONGWEI 版权所有　　
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