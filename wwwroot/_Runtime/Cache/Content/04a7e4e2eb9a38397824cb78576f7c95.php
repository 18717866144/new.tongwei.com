<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
    <link rel="stylesheet" href="__PUBLIC__/assets/css/public.css?v=3" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/index.css?v=3" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/media.css?v=3" />
    <link rel="stylesheet" href="__PUBLIC__/assets/css/indexMedia.css?v=3" />
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
                    <?php $data=array ( 1 => array ( 'id' => '1', 'navigate_name' => '关于通威', 'pid' => '0', 'mid' => '0', 'sort' => '9', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178182', 'navigate_mark' => 'about', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'ABOUT TONGWEI', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '开拓创新，拥抱变革，以智能制造启动新引擎，以绿色发展助力中国梦==谱写绿色农业与绿色能源的“双绿色发展”崭新篇章', 'cate_name' => NULL, 'child' => array ( 2 => array ( 'id' => '2', 'navigate_name' => '集团简介', 'pid' => '1', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178275', 'navigate_mark' => 'intro', 'parent_navigate_mark' => 'about', 'title' => '通威集团简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '通威集团是以农业、新能源为双主业，并在化工、宠物食品、建筑与房地产等行业快速发展的大型民营科技型企业，系农业产业化国家重点龙头企业。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 3 => array ( 'id' => '3', 'navigate_name' => '主席寄语', 'pid' => '1', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178308', 'navigate_mark' => 'chairman', 'parent_navigate_mark' => 'about', 'title' => '十一届全国政协常委、通威集团董事局主席寄语', 'keywords' => '', 'thumbnail' => '', 'url' => '/chairman/index.html', 'description' => '在这个充满机遇与挑战的时代，我们将一如既往地坚持“追求卓越，奉献社会”的企业宗旨，坚定不移地奉行“诚、信、正、一”的经营理念，并矢志不渝地以“世界级健康安全食品供应商和世界级清洁能源企业”为企业使命和价值诉求，勠力同心，斗志昂扬，一往无前，把通威事业推向更高的平台和更为广阔的天地。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 43 => array ( 'id' => '43', 'navigate_name' => '领导关怀', 'pid' => '1', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655804003', 'navigate_mark' => 'leadcare', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/leadcare/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 30 => array ( 'id' => '30', 'navigate_name' => '成员企业', 'pid' => '1', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559181384', 'navigate_mark' => 'members', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/members/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 5 => array ( 'id' => '5', 'navigate_name' => '企业荣誉', 'pid' => '1', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178380', 'navigate_mark' => 'honor', 'parent_navigate_mark' => 'about', 'title' => '通威集团企业荣誉简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/honor/index.html', 'description' => '三十余载光辉历程，在刘汉元主席带领下，通威不断获得国家和社会认可，品牌价值不断跃升。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 4 => array ( 'id' => '4', 'navigate_name' => '发展历程', 'pid' => '1', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178352', 'navigate_mark' => 'develo', 'parent_navigate_mark' => 'about', 'title' => '通威集团发展历程简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/develo/index.html', 'description' => '发迹于眉山，成长于成都，壮大于全国，放眼于世界。起源于探索，扎根于实干，发展于产业，领先于时代。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 14 => array ( 'id' => '14', 'navigate_name' => '新闻中心', 'pid' => '0', 'mid' => '1', 'sort' => '8', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498179620', 'navigate_mark' => 'newscenter', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'PRESS CENTER', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '1', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '通威官方发布的最新动态或消息，为您提供关于通威的第一手资讯', 'cate_name' => NULL, 'child' => array ( 15 => array ( 'id' => '15', 'navigate_name' => '集团快讯', 'pid' => '14', 'mid' => '1', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179761', 'navigate_mark' => 'news', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 29 => array ( 'id' => '29', 'navigate_name' => '集团公告', 'pid' => '14', 'mid' => '1', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1504679813', 'navigate_mark' => 'notice', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/notice/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_report.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 18 => array ( 'id' => '18', 'navigate_name' => '媒体聚焦', 'pid' => '14', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179867', 'navigate_mark' => 'media', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/media/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 17 => array ( 'id' => '17', 'navigate_name' => '新闻专题', 'pid' => '14', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498179840', 'navigate_mark' => 'special', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/special/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'is_manger' => '0', 'front_point' => '', 'aid_field' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_zt.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 35 => array ( 'id' => '35', 'navigate_name' => '通威视讯', 'pid' => '14', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1584067783', 'navigate_mark' => 'wvideo', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/wvideo/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_shixun.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 7 => array ( 'id' => '7', 'navigate_name' => '集团产业', 'pid' => '0', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178528', 'navigate_mark' => 'industries', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'GROUP INDUSTRY', 'thumbnail' => '', 'url' => '/agri/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '发端于水产、成长于农牧、跨越于新能源==通威始终坚守实体经济，践行实业报国初心，持续演绎绿色发展梦想', 'cate_name' => NULL, 'child' => array ( 8 => array ( 'id' => '8', 'navigate_name' => '饲料产业', 'pid' => '7', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178772', 'navigate_mark' => 'agri', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/agri/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 11 => array ( 'id' => '11', 'navigate_name' => '绿色养殖', 'pid' => '7', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178878', 'navigate_mark' => 'breeds', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/breeds/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 12 => array ( 'id' => '12', 'navigate_name' => '食品加工', 'pid' => '7', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179495', 'navigate_mark' => 'foods', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/foods/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 9 => array ( 'id' => '9', 'navigate_name' => '高纯晶硅', 'pid' => '7', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178794', 'navigate_mark' => 'energy', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/energy/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 42 => array ( 'id' => '42', 'navigate_name' => '太阳能电池', 'pid' => '7', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655799960', 'navigate_mark' => 'solarcell', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/solarcell/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 52 => array ( 'id' => '52', 'navigate_name' => '高效组件', 'pid' => '7', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1668490646', 'navigate_mark' => 'module', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/module/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 10 => array ( 'id' => '10', 'navigate_name' => '渔光一体', 'pid' => '7', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178853', 'navigate_mark' => 'yuguang', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/yuguang/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 13 => array ( 'id' => '13', 'navigate_name' => '相关多元', 'pid' => '7', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179557', 'navigate_mark' => 'diversified', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/diversified/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'other', 'child' => array ( ), ), ), ), 19 => array ( 'id' => '19', 'navigate_name' => '品牌文化', 'pid' => '0', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180753', 'navigate_mark' => 'brandculture', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'BRAND CULTURE', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '品牌强企，实现无形价值沉淀==文化为核，驱动通威稳健发展', 'cate_name' => NULL, 'child' => array ( 20 => array ( 'id' => '20', 'navigate_name' => '文化理念', 'pid' => '19', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180783', 'navigate_mark' => 'culture', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 48 => array ( 'id' => '48', 'navigate_name' => '党建引领', 'pid' => '19', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655804256', 'navigate_mark' => 'partys', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/partys/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 21 => array ( 'id' => '21', 'navigate_name' => '文化活动', 'pid' => '19', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180808', 'navigate_mark' => 'team', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/team/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 6 => array ( 'id' => '6', 'navigate_name' => '社会责任', 'pid' => '19', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178457', 'navigate_mark' => 'public', 'parent_navigate_mark' => 'brand-culture', 'title' => '通威集团社会公益事业简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/public/index.html', 'description' => '通威三十余载发展壮大，始终情牵社会、心系公益，真正实现了企业价值与社会价值的统一。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 31 => array ( 'id' => '31', 'navigate_name' => '品牌价值', 'pid' => '19', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559182519', 'navigate_mark' => 'brand', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/brand/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 22 => array ( 'id' => '22', 'navigate_name' => '文化载体', 'pid' => '19', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498180840', 'navigate_mark' => 'newspaper', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/paper/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 23 => array ( 'id' => '23', 'navigate_name' => '企业视频', 'pid' => '19', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498180872', 'navigate_mark' => 'video', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/video/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_video.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 25 => array ( 'id' => '25', 'navigate_name' => '人才中心', 'pid' => '0', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180924', 'navigate_mark' => 'work', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'TALENT CENTER', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '保障员工权益，支持员工成长==实现企业和员工的共同发展', 'cate_name' => NULL, 'child' => array ( 26 => array ( 'id' => '26', 'navigate_name' => '人才招聘', 'pid' => '25', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180946', 'navigate_mark' => 'join', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 34 => array ( 'id' => '34', 'navigate_name' => '学习中心', 'pid' => '25', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1560935870', 'navigate_mark' => 'twschool', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/twschool/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 51 => array ( 'id' => '51', 'navigate_name' => '监督平台', 'pid' => '25', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655805881', 'navigate_mark' => 'supervision', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/supervision/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 49 => array ( 'id' => '49', 'navigate_name' => '在线办公', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1655804513', 'navigate_mark' => 'online', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => 'http://fbc.tongwei.com', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 33 => array ( 'id' => '33', 'navigate_name' => '联系通威', 'pid' => '0', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559185971', 'navigate_mark' => 'contact', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/contact/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_contact.php', ), 'synopsis' => 'CONTACT TONGWEI', 'cate_name' => '', 'child' => array ( ), ), ); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li <?php if($values['pid'] == $webNavigate['pid']): ?>class="active"<?php endif; ?>>
                        <a class="item <?php if(!empty($$values["child"])): ?>next<?php endif; ?>" href="<?php echo ($values['url']); ?>"><?php echo ($values['navigate_name']); ?></a>
                        <?php if(!empty($values["child"])): ?><div class="subnav">
                                <?php if(is_array($values['child'])): $i = 0; $__LIST__ = $values['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v['url']); ?>"><?php echo ($v['navigate_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div><?php endif; ?>
                        </li><?php $i++; endforeach; endif; ;?>
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
        		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select * from h_slide where type_id=1 and l_status=1 order by sort desc,id desc limit 5', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li class="swiper-slide">
                <a <?php if(!empty($values["url"])): ?>href="<?php echo ($values["url"]); ?>"  target="_blank"<?php endif; ?> style="background-image: url(<?php echo ($values["picurl"]); ?>);">
                <img class="img" src="<?php echo ($values["picurl"]); ?>" alt="<?php echo ($values["title"]); ?>">
                <?php if($values["t_show"] == 1): ?><div class="text">
                        <div class="fw">
                            <?php if(!empty($values["title"])): ?><p class="t1" <?php if(!empty($values["color"])): ?>style="color: <?php echo ($values["color"]); ?>;"<?php endif; ?>><?php echo ($values["title"]); ?></p><?php endif; ?>
                            <?php if(!empty($values["s_title"])): ?><p class="t3" style="<?php if(!empty($values["color"])): ?>color: <?php echo ($values["color"]); ?>;<?php endif; ?> <?php if(!empty($values["s_size"])): ?>font-size: <?php echo ($values["s_size"]); ?>;<?php endif; ?>"><?php echo ($values["s_title"]); ?></p><?php endif; ?>
                            <!--                                    <?php if(!empty($values["s_title"])): ?><p class="t2" <?php if(!empty($values["color"])): ?>style="color: <?php echo ($values["color"]); ?>;"<?php endif; ?>>追求卓越 &nbsp;&nbsp;&nbsp;奉献社会 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;诚信正一</p><?php endif; ?>-->
                        </div>
                    </div><?php endif; ?>
                </a>
            </li><?php $i++; endforeach; endif; ;?>
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
    <!--<section class="section1">
        <div class="fw">
            <div class="common-title">
                <span class="title">热点新闻</span>
            </div>
            <div class="hotnews-wrap">
                <div class="hotnews">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">
                            <a href="">
                                <p class="tt">震撼来袭！2022第六届中国水产科技大会将全网同步直播</p>
                                <span class="type">直播</span>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="">
                                <p class="tt">震撼来袭！2022第六届中国水产科技大会将全网同步直播2</p>
                                <span class="type">直播</span>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="">
                                <p class="tt">震撼来袭！2022第六届中国水产科技大会将全网同步直播3</p>
                                <span class="type">直播</span>
                            </a>
                        </li>
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
                        		<?php
 import('ORG.TagLib.Contents'); $contentClass = new Contents(); $contentClass->tags = array ( 'limit' => '3', 'type' => 'list', 'where' => 'FIND_IN_SET(\'h\',attr)', 'cid' => '15', 'field' => 'id,title,title_short,title_hot,style,save_time,url,thumbnail', 'return' => 'data|values', 'order' => 'sort DESC,save_time DESC', 'tag' => 'foreach', 'cache' => false, 'tbdt' => true, 'tbpx' => 'small_', ); $data = $contentClass->_list(); $i=1; if(is_array($data)): foreach($data as $key=>$values): $pic_ulr=$values['thumbnail']; $titles =explode('==',$values['title_hot']); ?>
                            <li class="swiper-slide">
                                <a href="<?php echo ($values["url"]); ?>">
                                    <div class="pic">
                                        <div class="imgbg" style="background-image: url(<?php echo thumb($pic_ulr,900,507,true);?>);"></div>
                                       <!-- <img class="img" src="<?php echo thumb($pic_ulr,770,417,true);?>" alt="<?php echo ($values["title"]); ?>">-->
                                    </div>
                                    <div class="text">
                                        <?php if($titles[1]) { ?>
                                        <div class="title"><?php echo ($titles[0]); echo ($titles[1]); ?></div>
                                        <?php }else{ ?>
                                        <div class="title"><?php echo ($titles[0]); ?></div>
                                        <?php } ?>
                                    </div>
                                </a>
                            </li>
                            <?php  $noids.=','.$values['id']; $i++; endforeach; endif; ;?>
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
                            <?php $noids=substr($noids,1);?>
                            		<?php
 import('ORG.TagLib.Contents'); $contentClass = new Contents(); $contentClass->tags = array ( 'limit' => '10', 'type' => 'list', 'cid' => '15', 'field' => 'id,title,title_short,style,save_time,url', 'where' => 'id not in('.($noids).') and !FIND_IN_SET(\'d\',attr)', 'order' => 'save_time desc', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, 'tbdt' => true, 'tbpx' => 'small_', ); $data = $contentClass->_list(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <a href="<?php echo ($values['url']); ?>">
                                        <p class="tt"><?php echo ($values['title_short']?$values['title_short']:$values['a_title']); ?></p>
                                        <p class="date"><?php echo date('Y-m-d',$values['save_time']);?></p>
                                    </a>
                                </li><?php $i++; endforeach; endif; ;?>
                        </ul>
                    </div>
                    <!-- 媒体聚焦 -->
                    <div class="box">
                        <ul class="newslist">
                            		<?php
 import('ORG.TagLib.Contents'); $contentClass = new Contents(); $contentClass->tags = array ( 'limit' => '10', 'type' => 'list', 'cid' => '18', 'field' => 'id,title,title_short,style,save_time,url', 'order' => 'save_time desc', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, 'tbdt' => true, 'tbpx' => 'small_', ); $data = $contentClass->_list(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <a href="<?php echo ($values['url']); ?>">
                                        <p class="tt"><?php echo ($values['title_short']?$values['title_short']:$values['a_title']); ?></p>
                                        <p class="date"><?php echo date('Y-m-d',$values['save_time']);?></p>
                                    </a>
                                </li><?php $i++; endforeach; endif; ;?>
                        </ul>
                    </div>
                    <!-- 新闻专题 -->
                    <div class="box">
                        <ul class="newslist">
                            		<?php
 import('ORG.TagLib.Resolve'); $contentClass = new Resolve(); $contentClass->tags = array ( 'sql' => 'select id,title,url,create_time from h_special where l_status=1 and is_show=0 order by id desc limit 0,10', 'type' => 'list', 'return' => 'data|values', 'tag' => 'foreach', 'cache' => false, ); $data = $contentClass->_sql(); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li>
                                    <a href="<?php echo ($values["url"]); ?>" target="_blank">
                                        <p class="tt"><?php echo ($values["title"]); ?></p>
                                        <p class="date"><?php echo (date("Y-m",$values["create_time"])); ?> </p>
                                    </a>
                                </li><?php $i++; endforeach; endif; ;?>
                        </ul>
                    </div>
                </div>
                <!-- 专区链接 -->
                <div class="newindex-area">
                    <a href="/special/1.html">
                        <div class="text">
                            <p class="t1">刘汉元主席专区</p>
                            <!--<p class="t2">让大家在不远的未来能够常常看到青山绿水白云蓝天</p>-->
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
                        <img src="__PUBLIC__/assets/images/ls1.png" alt="绿色农业">
                        <div class="text">
                            <p class="tt"><span>绿色农业</span></p>
                            <!--<div class="state">
                                打造世界级健康安全食品供应商
                            </div>-->
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/energy/index.html">
                        <img src="__PUBLIC__/assets/images/ls2.png" alt="绿色能源">
                        <div class="text">
                            <p class="tt"><span>绿色能源</span></p>
                            <!--<div class="state">
                                打造世界级清洁能源运营商
                            </div>-->
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/diversified/index.html">
                        <img src="__PUBLIC__/assets/images/ls3.png" alt="相关多元">
                        <div class="text">
                            <p class="tt"><span>相关多元</span></p>
                            <!--<div class="state">科学规划、合理布局，适度发展宠物食品等相关产业</div>-->
                        </div>
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
                <!-- <div class="index-erweima">
                    <img src="__PUBLIC__/assets/temp/code1.png" alt="">
                    <p class="t0"><span>关注通威</span></p>
                </div>-->
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
                    <?php $data=array ( 1 => array ( 'id' => '1', 'navigate_name' => '关于通威', 'pid' => '0', 'mid' => '0', 'sort' => '9', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178182', 'navigate_mark' => 'about', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'ABOUT TONGWEI', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '开拓创新，拥抱变革，以智能制造启动新引擎，以绿色发展助力中国梦==谱写绿色农业与绿色能源的“双绿色发展”崭新篇章', 'cate_name' => NULL, 'child' => array ( 2 => array ( 'id' => '2', 'navigate_name' => '集团简介', 'pid' => '1', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178275', 'navigate_mark' => 'intro', 'parent_navigate_mark' => 'about', 'title' => '通威集团简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '通威集团是以农业、新能源为双主业，并在化工、宠物食品、建筑与房地产等行业快速发展的大型民营科技型企业，系农业产业化国家重点龙头企业。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 3 => array ( 'id' => '3', 'navigate_name' => '主席寄语', 'pid' => '1', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178308', 'navigate_mark' => 'chairman', 'parent_navigate_mark' => 'about', 'title' => '十一届全国政协常委、通威集团董事局主席寄语', 'keywords' => '', 'thumbnail' => '', 'url' => '/chairman/index.html', 'description' => '在这个充满机遇与挑战的时代，我们将一如既往地坚持“追求卓越，奉献社会”的企业宗旨，坚定不移地奉行“诚、信、正、一”的经营理念，并矢志不渝地以“世界级健康安全食品供应商和世界级清洁能源企业”为企业使命和价值诉求，勠力同心，斗志昂扬，一往无前，把通威事业推向更高的平台和更为广阔的天地。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 43 => array ( 'id' => '43', 'navigate_name' => '领导关怀', 'pid' => '1', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655804003', 'navigate_mark' => 'leadcare', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/leadcare/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 30 => array ( 'id' => '30', 'navigate_name' => '成员企业', 'pid' => '1', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559181384', 'navigate_mark' => 'members', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/members/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 5 => array ( 'id' => '5', 'navigate_name' => '企业荣誉', 'pid' => '1', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178380', 'navigate_mark' => 'honor', 'parent_navigate_mark' => 'about', 'title' => '通威集团企业荣誉简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/honor/index.html', 'description' => '三十余载光辉历程，在刘汉元主席带领下，通威不断获得国家和社会认可，品牌价值不断跃升。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 4 => array ( 'id' => '4', 'navigate_name' => '发展历程', 'pid' => '1', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178352', 'navigate_mark' => 'develo', 'parent_navigate_mark' => 'about', 'title' => '通威集团发展历程简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/develo/index.html', 'description' => '发迹于眉山，成长于成都，壮大于全国，放眼于世界。起源于探索，扎根于实干，发展于产业，领先于时代。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 14 => array ( 'id' => '14', 'navigate_name' => '新闻中心', 'pid' => '0', 'mid' => '1', 'sort' => '8', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498179620', 'navigate_mark' => 'newscenter', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'PRESS CENTER', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '1', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '通威官方发布的最新动态或消息，为您提供关于通威的第一手资讯', 'cate_name' => NULL, 'child' => array ( 15 => array ( 'id' => '15', 'navigate_name' => '集团快讯', 'pid' => '14', 'mid' => '1', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179761', 'navigate_mark' => 'news', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 29 => array ( 'id' => '29', 'navigate_name' => '集团公告', 'pid' => '14', 'mid' => '1', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1504679813', 'navigate_mark' => 'notice', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/notice/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_report.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 18 => array ( 'id' => '18', 'navigate_name' => '媒体聚焦', 'pid' => '14', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179867', 'navigate_mark' => 'media', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/media/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 17 => array ( 'id' => '17', 'navigate_name' => '新闻专题', 'pid' => '14', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498179840', 'navigate_mark' => 'special', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/special/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'is_manger' => '0', 'front_point' => '', 'aid_field' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_zt.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 35 => array ( 'id' => '35', 'navigate_name' => '通威视讯', 'pid' => '14', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1584067783', 'navigate_mark' => 'wvideo', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/wvideo/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_shixun.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 7 => array ( 'id' => '7', 'navigate_name' => '集团产业', 'pid' => '0', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178528', 'navigate_mark' => 'industries', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'GROUP INDUSTRY', 'thumbnail' => '', 'url' => '/agri/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '发端于水产、成长于农牧、跨越于新能源==通威始终坚守实体经济，践行实业报国初心，持续演绎绿色发展梦想', 'cate_name' => NULL, 'child' => array ( 8 => array ( 'id' => '8', 'navigate_name' => '饲料产业', 'pid' => '7', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178772', 'navigate_mark' => 'agri', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/agri/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 11 => array ( 'id' => '11', 'navigate_name' => '绿色养殖', 'pid' => '7', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178878', 'navigate_mark' => 'breeds', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/breeds/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 12 => array ( 'id' => '12', 'navigate_name' => '食品加工', 'pid' => '7', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179495', 'navigate_mark' => 'foods', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/foods/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 9 => array ( 'id' => '9', 'navigate_name' => '高纯晶硅', 'pid' => '7', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178794', 'navigate_mark' => 'energy', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/energy/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 42 => array ( 'id' => '42', 'navigate_name' => '太阳能电池', 'pid' => '7', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655799960', 'navigate_mark' => 'solarcell', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/solarcell/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 52 => array ( 'id' => '52', 'navigate_name' => '高效组件', 'pid' => '7', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1668490646', 'navigate_mark' => 'module', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/module/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 10 => array ( 'id' => '10', 'navigate_name' => '渔光一体', 'pid' => '7', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178853', 'navigate_mark' => 'yuguang', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/yuguang/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 13 => array ( 'id' => '13', 'navigate_name' => '相关多元', 'pid' => '7', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179557', 'navigate_mark' => 'diversified', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/diversified/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'other', 'child' => array ( ), ), ), ), 19 => array ( 'id' => '19', 'navigate_name' => '品牌文化', 'pid' => '0', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180753', 'navigate_mark' => 'brandculture', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'BRAND CULTURE', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '品牌强企，实现无形价值沉淀==文化为核，驱动通威稳健发展', 'cate_name' => NULL, 'child' => array ( 20 => array ( 'id' => '20', 'navigate_name' => '文化理念', 'pid' => '19', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180783', 'navigate_mark' => 'culture', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 48 => array ( 'id' => '48', 'navigate_name' => '党建引领', 'pid' => '19', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655804256', 'navigate_mark' => 'partys', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/partys/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 21 => array ( 'id' => '21', 'navigate_name' => '文化活动', 'pid' => '19', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180808', 'navigate_mark' => 'team', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/team/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 6 => array ( 'id' => '6', 'navigate_name' => '社会责任', 'pid' => '19', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178457', 'navigate_mark' => 'public', 'parent_navigate_mark' => 'brand-culture', 'title' => '通威集团社会公益事业简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/public/index.html', 'description' => '通威三十余载发展壮大，始终情牵社会、心系公益，真正实现了企业价值与社会价值的统一。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 31 => array ( 'id' => '31', 'navigate_name' => '品牌价值', 'pid' => '19', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559182519', 'navigate_mark' => 'brand', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/brand/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 22 => array ( 'id' => '22', 'navigate_name' => '文化载体', 'pid' => '19', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498180840', 'navigate_mark' => 'newspaper', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/paper/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 23 => array ( 'id' => '23', 'navigate_name' => '企业视频', 'pid' => '19', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498180872', 'navigate_mark' => 'video', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/video/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_video.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 25 => array ( 'id' => '25', 'navigate_name' => '人才中心', 'pid' => '0', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180924', 'navigate_mark' => 'work', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => 'TALENT CENTER', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '保障员工权益，支持员工成长==实现企业和员工的共同发展', 'cate_name' => NULL, 'child' => array ( 26 => array ( 'id' => '26', 'navigate_name' => '人才招聘', 'pid' => '25', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180946', 'navigate_mark' => 'join', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 34 => array ( 'id' => '34', 'navigate_name' => '学习中心', 'pid' => '25', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1560935870', 'navigate_mark' => 'twschool', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/twschool/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 51 => array ( 'id' => '51', 'navigate_name' => '监督平台', 'pid' => '25', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1655805881', 'navigate_mark' => 'supervision', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/supervision/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 49 => array ( 'id' => '49', 'navigate_name' => '在线办公', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1655804513', 'navigate_mark' => 'online', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => 'http://fbc.tongwei.com', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 33 => array ( 'id' => '33', 'navigate_name' => '联系通威', 'pid' => '0', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559185971', 'navigate_mark' => 'contact', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/contact/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_contact.php', ), 'synopsis' => 'CONTACT TONGWEI', 'cate_name' => '', 'child' => array ( ), ), ); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><div class="item">
                            <a class="tt" href="<?php echo ($values['url']); ?>"><?php echo ($values['navigate_name']); ?></a>
                            <?php if(!empty($values["child"])): ?><div class="sublist">
                                    <?php if(is_array($values['child'])): $i = 0; $__LIST__ = $values['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v['url']); ?>"><?php echo ($v['navigate_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div><?php endif; ?>
                        </div><?php $i++; endforeach; endif; ;?>
                    <div class="foot-right01">
                        <div class="index-erweima mt">
                            <img src="__PUBLIC__/assets/temp/code2.png" alt="">
                            <p class="t0"><span>通威融媒</span></p>
                        </div>
                    </div>
                </div>
                 <!--<div class="index-erweima">
                    <img src="__PUBLIC__/assets/temp/code2.png" alt="">
                    <p class="t0"><span>通威融媒</span></p>
                </div>-->
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
             <!--<span class="s1">总部地址：四川省成都市高新区天府大道中段588号通威国际中心</span>
            <span class="s1">联系电话：028-85188888</span>-->
            <span class="s1">通威集团有限公司 @ 2021 TONGWEI.COM 版权所有</span>
            <a class="s1" href="https://beian.miit.gov.cn/">蜀ICP备05002048号</a>
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