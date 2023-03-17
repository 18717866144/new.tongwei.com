<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- External CSS -->
    <link rel="stylesheet" href="__PUBLIC__/assets/css/reset.css" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/aos.css">
    <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css">
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
        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select thumbnail from h_special_content where specialid=39 and typeid=1 and a_status=1 order by sort desc limit 1', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><img src="<?php echo ($values['thumbnail']); ?>" alt="" style="width:100%;"><?php $i++; endforeach; endif; ;?>
    </div>
    <div class="menus">
        <ul class="swiper-wrapper">
            <li class="swiper-slide first">
                <a href="/special/39.html">首页</a>
            </li>
            <li class="swiper-slide">
                <a href="/special/39.html#tuwen">图文报道</a>
            </li>
            <li class="swiper-slide">
                <a href="/special/39.html#yicheng">大会议程</a>
            </li>
            <li class="swiper-slide">
                <a href="/special/39.html#jianjie">大会简介</a>
            </li>
            <li class="swiper-slide">
                <a href="/special/39.html#jiabin">拟邀嘉宾</a>
            </li>
            <li class="swiper-slide">
                <a href="/special/39.html#danwei">合作单位</a>
            </li>
            <li class="swiper-slide">
                <a href="/special/39.html#meiti">合作媒体</a>
            </li>
            <li class="swiper-slide">
                <a href="/special/39.html#lianxi">联系我们</a>
            </li>
        </ul>
    </div>
    <div class="mainbox pt50 pb70">
        <div class="w1200">
            <div class="topage">
                <div class="maintitle mb20" style="background-image: url(/static/2022guangfu/images/tabbg.png)">
                    <p class="title">图文报道</p>
                    <p class="tips">第八届中国农业品牌年度颁奖盛典</p>
                </div>
                <ul class="ztone-newslist">
                    		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where (specialid=39 and typeid=3) order by sort desc,save_time desc', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                        <a href="<?php echo ($values['url']); ?>" target="_blank">
                            <p class="tt"><?php echo ($values['title']);?></p>
                            <div class="desc"><?php echo ($values['description']);?>
                            </div>
                            <p class="date"><?php echo date('Y-m-d',$values['save_time']);?></p>
                        </a>
                    </li><?php $i++; endforeach; endif; ;?>
                </ul>
               <!-- <div class="page-pt">
                    <div class="pages">
                        <a class="btn" href="javascript:;"><img src="__PUBLIC__/assets/images/prev.png" alt=""></a>
                        <a class="item active" href="javascript:;">1</a>
                        <a class="item" href="javascript:;">2</a>
                        <a class="item" href="javascript:;">3</a>
                        <a class="item" href="javascript:;">4</a>
                        <a class="btn" href="javascript:;"><img src="__PUBLIC__/assets/images/next.png" alt=""></a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div class="foot">
        <div class="w1200">
            <p>通威集团 All Rights Reserved. <a href="">蜀ICP备14018337号</a></p>
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