<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo ($special['title']); ?> - <?php echo (C("web_name")); ?> - <?php echo (C("web_name_ext")); ?></title>
    <meta name="keywords" content="<?php echo ($special['title']); ?>">
    <meta name="description" content="<?php echo ($special['description']); ?>">
    <!-- External CSS -->
    <link rel="stylesheet" href="__PUBLIC__/assets/css/reset.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/aos.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/swiper.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/common.css?v=5" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/media.css?v=5" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/commonMedia.css" />
    <!--[if lt IE 9]>
    <script src="http://cdn.static.runoob.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body style="background: #b9191a;">
<div class="special-two" style="background:url(/static/2023lianghui/images/lhbanner5.jpg) no-repeat top;background-size: 100%;">
    <div class="head"><img src="/static/2023lianghui/images/lhbanner1.jpg" alt=""></div>
    <div class="mainbox">
        <div class="w1200">
            <div class="menuswrap">
                <div class="menus">
                    <ul class="swiper-wrapper" style="transition-duration: 0ms;transform: translate3d(20px, 0px, 0px);">
                        <li class="swiper-slide active first">
                            <a href="javascript:;">首页</a>
                        </li>
                        <li class="swiper-slide" data-index="1">
                            <a href="javascript:;">图文报道</a>
                        </li>
                        <li class="swiper-slide" data-index="3">
                            <a href="javascript:;">视频报道</a>
                        </li>
                        <li class="swiper-slide" data-index="2">
                            <a href="javascript:;">代表议案</a>
                        </li>
                        <li class="swiper-slide" data-index="4">
                            <a href="javascript:;">媒体聚焦</a>
                        </li>
                        <li class="swiper-slide" data-index="5">
                            <a href="javascript:;">往期回顾</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="zt-two-wrap">
                <div class="whitebox">
                    <div class="zttwo-title bg2 mb20 topage1">
                        <p class="t1">刘汉元代表十四届全国人大一次会议议案</p>
                        <p class="t2">图文报道</p>
                        <a class="more" href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=1');?>">更多</a>
                    </div>
                    <div class="top-report">
                        <div class="headlines">
                            <div class="tag">头条</div>
                            		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where FIND_IN_SET(\'s\',attr) and a_status=1 and typeid=1 and specialid=34 order by sort desc,id desc limit 1', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><a href="<?php echo ($values['url']); ?>" target="_blank">
                                <p class="tt"><?php echo ($values["title"]); ?></p>
                                <div class="desc">
                                    <?php echo msubstr($values['description'],0,70);?>
                                </div>
                            </a><?php $i++; endforeach; endif; ;?>
                        </div>
                        <div class="head-hot-wrap">
                            <div class="left">
                                <div class="zttwo-hotnews">
                                    <ul class="swiper-wrapper">
                                        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=4 and specialid=34 order by sort desc,id desc limit 20', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="swiper-slide">
                                            <a href="javascript:;">
                                                <div class="pic">
                                                    <div class="bgimg" style="background-image: url(<?php echo ($values['thumbnail']); ?>);">
                                                    </div>
                                                    <img class="img" src="<?php echo ($values['thumbnail']); ?>" alt="">
                                                </div>
                                                <div class="tt"></div>
                                            </a>
                                        </li><?php $i++; endforeach; endif; ;?>
                                    </ul>
                                    <div class="swiper-pagination"></div>
                                </div>
                                <div class="zttwo-video topage3">
                                    <div class="zttwo-title mb20">
                                        <p class="t1">刘汉元代表十四届全国人大一次会议</p>
                                        <p class="t2">视频报道</p>
                                        <a class="more" href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=5');?>">更多</a>
                                    </div>
                                    <ul class="swiper-wrapper">
                                        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=5 and specialid=34 order by sort desc,id desc limit 9', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="swiper-slide" data-src="<?php echo ($values['url']); ?>">
                                            <a href="javascript:;">
                                                <div class="pic">
                                                    <div class="bgimg" style="background-image: url(<?php echo ($values['thumbnail']); ?>);">
                                                    </div>
                                                    <img class="img" src="<?php echo ($values['thumbnail']); ?>" alt="">
                                                </div>
                                                <div class="tt"><?php echo ($values["title"]); ?></div>
                                            </a>
                                        </li><?php $i++; endforeach; endif; ;?>
                                    </ul>
                                    <a class="prev btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/prev.png" alt=""></a>
                                    <a class="next btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/next.png" alt=""></a>
                                </div>
                            </div>
                            <div class="right">
                                <ul class="zttwo-newslist">
                                    		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=1 and specialid=34 order by sort desc,id desc limit 10', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): if($key > 0): ?><li>
                                                <a href="<?php echo ($values['url']); ?>" target="_blank">
                                                    <p class="tt"><?php echo ($values["title"]); ?></p>
                                                </a>
                                            </li><?php endif; $i++; endforeach; endif; ;?>
                                </ul>
                                <a class="morewrap" href="twolist.html"><span>查看更多</span> <img src="__PUBLIC__/assets/ztimg/rr.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="zt-two-bottom">
                        <div class="left">
                            <div class="zttwo-title mb20 topage2">
                                <p class="t1">刘汉元代表十四届全国人大一次会议</p>
                                <p class="t2">代表议案</p>
                                <a class="more" href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=2');?>">更多</a>
                            </div>
                            <ul class="two-tiyi">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=2 and specialid=34 order by sort desc,id desc limit 5', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <a href="<?php echo ($values['url']); ?>" target="_blank">
                                        <div class="num"><?php echo ($key+1); ?></div>
                                        <div class="con">
                                            <p class="tt"><?php echo ($values['title_short']?$values['title_short']:$values['title']);?></p>
                                            <div class="desc">
                                                <?php echo msubstr($values['description'],0,160);?>
                                            </div>
                                        </div>
                                    </a>
                                </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                        </div>
                        <div class="right">
                            <div class="zttwo-title mb20 topage5">
                                <p class="t1">刘汉元代表十四届全国人大一次会议</p>
                                <p class="t2">往期回顾</p>
                                <a class="more" href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=6');?>">更多</a>
                            </div>
                            <ul class="zttwo-newslist nt mb20">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where a_status=1 and typeid=6 and specialid=34 order by sort desc,id desc limit 3', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <a href="<?php echo ($values['url']); ?>" target="_blank">
                                        <p class="tt"><?php echo ($values["title"]); ?></p>
                                    </a>
                                </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                            <div class="zttwo-title mb20 topage4">
                                <p class="t1">刘汉元代表十四届全国人大一次会议</p>
                                <p class="t2">媒体聚焦</p>
                                <a class="more" href="<?php echo U('modules/special/lists?specialid='.$specialid.'&typeid=3');?>">更多</a>
                            </div>
                            <div class="zttwo-media">
                                <ul class="swiper-wrapper">
                                    		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where FIND_IN_SET(\'h\',attr) and a_status=1 and typeid=3 and specialid=34 order by sort desc,id desc limit 4', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="swiper-slide">
                                        <a href="<?php echo ($values['url']); ?>" target="_blank">
                                            <div class="pic"><img src="<?php echo (thumb($values['thumbnail'],580,326,1)); ?>" alt=""></div>
                                            <p class="tt"><?php echo ($values["title"]); ?></p>
                                        </a>
                                    </li><?php $i++; endforeach; endif; ;?>
                                </ul>
                                <a class="prev btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/prev.png" alt=""></a>
                                <a class="next btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/next.png" alt=""></a>
                            </div>
                            <ul class="zttwo-newslist nt">
                                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where FIND_IN_SET(\'j\',attr) and a_status=1 and typeid=3 and specialid=34 order by sort desc,id desc limit 2', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <a href="<?php echo ($values['url']); ?>" target="_blank">
                                        <p class="tt"><?php echo ($values["title"]); ?></p>
                                    </a>
                                </li><?php $i++; endforeach; endif; ;?>
                            </ul>
                        </div>
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

<div class="videomask">
    <div class="content">
        <a class="closebtn" href="javascript:;">X</a>
        <video id="myvideo" src="__PUBLIC__/assets/video/video.mp4" controls width="100%"></video>
    </div>
</div>
<!-- JavaScript -->
<script src="__PUBLIC__/assets/js/jquery.js"></script>
<script src="__PUBLIC__/assets/js/aos.js"></script>
<script src="__PUBLIC__/assets/js/swiper.js"></script>
<script>
    AOS.init({
        offset: 0,
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

    var hotSwiper = new Swiper('.zttwo-hotnews', {
        autoplay: true,
        pagination: {
            el: '.zttwo-hotnews .swiper-pagination',
            clickable: true,
        }
    });
    var videoSwiper = new Swiper('.zttwo-video', {
        slidesPerView: 2,
        spaceBetween: 12,
        autoplay: {
            delay: 2000,
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
                slidesPerView: 2,
            },
            840: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            }
        },
    })
    var mediaSwiper = new Swiper('.zttwo-media', {
        autoplay: {
            delay: 2000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.zttwo-media .next',
            prevEl: '.zttwo-media .prev',
            disabledClass: 'disabled',
        }
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


    var myvideo = document.getElementById('myvideo')
    $('.zttwo-video li').click(function() {
        var vsrc = $(this).data('src')
        $('#myvideo').attr('src', vsrc)
        myvideo.play()
        $('.videomask').fadeIn()
    })
    $('.videomask .closebtn').click(function() {
        $(this).parents('.videomask').fadeOut()
        myvideo.pause()
    })
</script>
</body>

</html>