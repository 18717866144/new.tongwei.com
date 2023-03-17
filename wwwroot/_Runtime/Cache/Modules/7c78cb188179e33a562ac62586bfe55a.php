<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>渔光同辉 双碳逐梦-热烈庆祝通威集团40年华诞</title>
    <meta name="keywords" content="渔光同辉 双碳逐梦-热烈庆祝通威集团40年华诞">
    <meta name="description" content="渔光同辉 双碳逐梦-热烈庆祝通威集团40年华诞">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/Swiper/3.0.0/css/swiper.min.css" rel="stylesheet">
    <link href="/static/40nian/css/css.css?v=3" rel="stylesheet"/>
    <link href="/static/40nian/css/addcss.css?v=2" rel="stylesheet"/>
    <link href="/static/40nian/css/fitCss.css" rel="stylesheet"/>
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="banner">
    <div class="banWrap"></div>
</div>
<div id="nav-menu" class="fit-menu">
    <div class="fmWrap">
        <ul class="ul-fmw clearfix" id="home">
            <ul class="ul-fmw clearfix" id="home">
                <li><a href="/special/37.html">首页</a></li>
                <li><a class="fmwList n-gyyj" href="/special/37.html#gyyj">光影回顾</a></li>
                <li><a class="fmwList n-twjjh" href="/special/37.html#twjjh">回眸瞬间</a></li>
                <li><a class="fmwList n-sybg" href="/special/37.html#sybg">员工祝福</a></li>
                <li><a class="fmwList n-twcyl" href="/special/37.html#twcyl">微笑面孔</a></li>
                <li><a class="fmwList n-jchd" href="/special/37.html#jchd">精彩活动</a></li>
                <li><a class="fmwList n-mxzf" href="/special/37.html#mxzf">媒体寄语</a></li>
                <!--<li><a class="fmwList n-mtjj" href="/special/37.html#mtjj">媒体聚焦</a></li>-->
            </ul>
        </ul>
    </div>
</div>
<div class="wp-mainWrap">
    <div class="uPos">您当前的位置：<a href="javascript:;"
                                target="_blank">首页</a>&nbsp;&gt;&nbsp;<?php if ($_GET['typeid'] == '2') { echo '回眸瞬间'; } elseif ($_GET['typeid'] == '5') { echo '精彩活动'; } elseif ($_GET['typeid'] == '6') { echo '媒体寄语'; }; ?></div>
    <div class="newsList clearfix">
        <div class="news-l">
            <div class="news-l-tit">
                <h3><?php if ($_GET['typeid'] == '2') { echo '回眸瞬间'; } elseif ($_GET['typeid'] == '5') { echo '精彩活动'; } elseif ($_GET['typeid'] == '6') { echo '媒体寄语'; }; ?></h3>
                <ul class="news-l-ul">
                    <li><a <?php if ($_GET['typeid'] == 2) {echo 'class="on"';} ?>  href="/special/lists/specialid/37/typeid/2.html">回眸瞬间</a></li>
                    <li><a <?php if ($_GET['typeid'] == 5) {echo 'class="on"';} ?>  href="/special/lists/specialid/37/typeid/5.html">精彩活动</a></li>
                    <li><a <?php if ($_GET['typeid'] == 6) {echo 'class="on"';} ?>  href="/special/lists/specialid/37/typeid/6.html">媒体寄语</a></li>
                </ul>
            </div>
        </div>
        <div class="news-r">
            <ul class="news-r-ul">
                <?php $typeid=$_GET['typeid'] ?>
                		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_special_content where (specialid=37 and typeid='.($typeid).') order by sort desc,save_time desc', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li onmouseout="this.style.background='#fff';" onmousemove="this.style.background='#f4f9fd';"><a
                            target="_blank"
                            href="<?php echo ($values['url']); ?>">
                        <div class="news-dl">
                            <!--<div class="news-dl-img"><img src="/Uploads/2017/0914/cf4cc330ae15ac25000cd29d8af974b4.png">
                            </div>-->
                            <div class="news-dl-txt">
                                <div class="news-dl-tit">
                                    <div class="newsDate"></div>
                                    <h2><?php echo ($values['title']); ?></h2>
                                </div>
                                <p><?php echo ($values['title_short']); ?> <?php echo ($values['keywords']); ?> <?php echo ($values['description']);?></p>
                            </div>
                        </div>
                    </a>
                </li><?php $i++; endforeach; endif; ;?>
            </ul>
        </div>
    </div>
    <div class="pageCut">
        <div class="pgWrap">

        </div>
    </div>
</div>
</div>
<script type="text/javascript">var ishome = false, touch = false;</script>
<div class="footer">
    <div class="ft_btm">
        <div class="ftbWp">
            <div class="ft-link">
            </div>
            <div class="ft-copy">Copyright &copy; 2022 <a href="https://www.tongwei.com/" target="_blank">通威集团</a> <span>All Rights Reserved.</span><a
                        href="https://beian.miit.gov.cn/" target="_blank">蜀ICP备05002048号</a></div>
        </div>
    </div>
</div>
<script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src="/skin/35thyear/js/carousel.js"></script>
<script src="https://cdn.bootcss.com/Swiper/3.0.0/js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container-gyyj', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 3,
        loop: true,
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 30,
    });
</script>
<script src="http://cdn.bootcss.com/layer/2.4/layer.min.js"></script>
<script type="text/javascript">
    var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cspan style='display:none' id='cnzz_stat_icon_1254973742'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1254973742' type='text/javascript'%3E%3C/script%3E"));
</script>
<!--newcnzz-->
<div style="display: none;">
    <script src="https://s19.cnzz.com/z_stat.php?id=1263524351&web_id=1263524351" language="JavaScript"></script>
</div>
</body>
</html>