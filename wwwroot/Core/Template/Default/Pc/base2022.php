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
        <link rel="stylesheet" href="__PUBLIC__/assets/css/swiper.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css?v=6" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/index.css?v=6" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/media.css?v=4" />
        <link rel="stylesheet" href="__PUBLIC__/assets/css/indexMedia.css?v=4" />
        <!--[if lt IE 9]>
        <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
        <![endif]-->
    <block name="head"></block>
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

<!-- 页脚 -->
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
                    <a href="https://www.tongwei.com.cn/" target="_blank">通威股份</a>
                    <a href="https://www.scyxgf.com/" target="_blank">永祥股份</a>
                    <a href="https://www.tw-solar.com/" target="_blank">通威太阳能</a>
                    <a href="https://www.tw-newenergy.com/index" target="_blank">通威新能源</a>
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
    //内页导航
    var tabSwiper = new Swiper('.menuswiper', {
        slidesPerView: 'auto',
        spaceBetween: 100,
        centerInsufficientSlides: true,
        breakpoints: {
            480: {
                spaceBetween: 20,
            },
            600: {
                spaceBetween: 30,
            },
            1024: {
                spaceBetween: 50,
            },
            1440: {
                spaceBetween: 80,
            }
        },
    })
    tabSwiper.slideTo($('.menuswiper li.active').index())

    //领导关怀
    var guanSwiper = new Swiper('.guan-swiper', {
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            nextEl: '.guanwrap .next',
            prevEl: '.guanwrap .prev',
        },
        autoplay: {
            delay: 5000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
        },
        loop:true,
        breakpoints: {
            480: {
                slidesPerView: 2,
                spaceBetween: 6,
            },
            600: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            720: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 2,
            },
        },
    })

    //产业图片通用
    var imagesSwiper = new Swiper('.common-images-swiper', {
        autoplay: {
            delay: 6000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
        },
        loop: true,
        autoHeight: true,
        navigation: {
            nextEl: '.common-images-swiper .swiper-common-btns .next',
            prevEl: '.common-images-swiper .swiper-common-btns .prev',
        },
        pagination: {
            el: '.common-images-swiper .swiper-common-btns .swiper-pagination',
            type: 'fraction',
        },
    })

    //饲料生产
    var shiSwiper = new Swiper('.shiliao-swiper', {
        autoplay: true,
        slidesPerView: 4,
        spaceBetween: 20,
        breakpoints: {
            600: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            820: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1280: {
                slidesPerView: 3,
            }
        },
    })

    //绿色养殖
    var greenSwiper = new Swiper('.green-swiper', {
        autoplay: true,
        slidesPerView: 4,
        spaceBetween: 10,
        breakpoints: {
            480: {
                slidesPerView: 1.3,
                spaceBetween: 6,
            },
            600: {
                slidesPerView: 1.5,
                spaceBetween: 6,
            },
            820: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
            1280: {
                slidesPerView: 3,
            }
        },
    })

    //社会责任
    var dutySwiper = new Swiper('.duty-swiper', {
        autoplay: true,
        slidesPerView: 3,
        spaceBetween: 50,
        navigation: {
            nextEl: '.duty-wrap .next',
            prevEl: '.duty-wrap .prev',
        },
        breakpoints: {
            600: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            820: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1440: {
                slidesPerView: 4,
                spaceBetween: 30,
            }
        },
    })

    //视讯播放
    var myvideo = document.getElementById('video')
    $('.sxlist li a').click(function() {
        var $src = $(this).data('src')    //获取视频地址
        var $title = $(this).data('title')    //获取视频名称
        $('#video').attr('src', $src)  //切换视频地址
        $('#vtitle').text($title)  //切换视频地址
        myvideo.play()   //播放视频
    })

    //企业视频
    var svideo = document.getElementById('myvideo')
    $('.video-list li a').click(function() {
        var $src = $(this).data('src')    //获取视频地址
        $('#myvideo').attr('src', $src)  //切换视频地址
        svideo.play()
        $('.videomask').fadeIn()
    })
    $('.videomask .closebtn').click(function() {
        $(this).parents('.videomask').fadeOut()
        svideo.pause()
    })

</script>
<script src="https://api.map.baidu.com/api?v=2.0&ak=Q9qMR08Dt9OX5Ag4AxeaWpN9T9tt0OgE"></script>
<script>
    var map = new BMap.Map('ditu') // 创建地图实例
    var point = new BMap.Point(104.074384, 30.556942) // 创建点坐标
    map.centerAndZoom(point, 18) // 初始化地图，设置中心点坐标和地图级别
    map.enableScrollWheelZoom(true) //开启鼠标滚轮缩放
    var myIcon = new BMap.Icon('__PUBLIC__/assets/images/tw.png', new BMap.Size(160, 61))
    var marker = new BMap.Marker(point, { icon: myIcon }) // 创建标注
    map.addOverlay(marker)
    // marker.setAnimation(BMAP_ANIMATION_BOUNCE);

</script>
<script>
    var yearSwiper = new Swiper('.year-swiper', {
        slidesPerView: 'auto',
        spaceBetween: 54,
        centerInsufficientSlides: true,
        navigation: {
            nextEl: '.yearwrap .nextbtn',
        },
        breakpoints: {
            480: {
                spaceBetween: 10
            },
            720: {
                spaceBetween: 16
            },
            1440: {
                spaceBetween: 30
            }
        },
    })


    var menuSwiper = new Swiper('.zaiti-mennu-swiper', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        centerInsufficientSlides: true,
        breakpoints: {
            720: {
                spaceBetween: 15,
            },
        },
    })
    $('.zaiti-mennu-swiper li').click(function() {
        var i = $(this).index()
        $(this).addClass('active').siblings().removeClass('active')
        menuSwiper.slideTo(i)
    })

    $('.inyears li').click(function() {
        var i = $(this).index()
        $(this).addClass('active').siblings().removeClass('active')
        var yearSwiper = new Swiper('.inyears', {
            slidesPerView: 'auto',
        })
        yearSwiper.slideTo(i)
    })

    $('.datebtn').click(function() {
        $('.date-showbox').fadeToggle()
    })

</script>

<script>
    var pid = {-$pid-};
    $(".yearcl").click(function (){
        var year=$(this).data("year")
        $.ajax({
            url:'/index.php/paper/api/getPaperYear',
            data:{pid:pid, year:year},
            type:'POST',
            dataType:'json',
            boforeSend:function(){
                console.log('数据提交');
            },
            success:function(data){
                console.log(data.data.paperList)
                $('#paperListContent-t ul').empty();
                $('#paperListContent-c').empty();
                $.each(data.data.paperList, function(idx, obj) {
                    var classStr = year == obj ? ' class="hover" ' : '';
                    $('#paperListContent-c').append('<a href="'+obj.url+'">'+obj.title+'</a>');
                });
            },
            error:function(){
                console.log('发送数据至服务器失败！');
            }
        });
    })
</script>
</body>
</html>