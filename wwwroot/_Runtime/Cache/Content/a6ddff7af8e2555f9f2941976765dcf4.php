<?php if (!defined('THINK_PATH')) exit();?>﻿<?php defined('HX_CMS') or exit;$thispid = $navigate['id'];?>
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
<!-- header  -->
<header class="header">
    <div class="fw">
        <a class="logo" href="/"><img src="__PUBLIC__/assets/images/logo.png" alt=""></a>
        <div class="head-right">
            <div class="navwrap">
                <ul class="nav">
                    <li <?php if($navigate['pid'] == ''): ?>class="active"<?php endif; ?>>
                    <a class="item" href="/">首页</a>
                    </li>
                    <?php $data=array ( 1 => array ( 'id' => '1', 'navigate_name' => '关于通威', 'pid' => '0', 'mid' => '0', 'sort' => '9', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178182', 'navigate_mark' => 'about', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 2 => array ( 'id' => '2', 'navigate_name' => '集团简介', 'pid' => '1', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178275', 'navigate_mark' => 'intro', 'parent_navigate_mark' => 'about', 'title' => '通威集团简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '通威集团是以农业、新能源为双主业，并在化工、宠物食品、建筑与房地产等行业快速发展的大型民营科技型企业，系农业产业化国家重点龙头企业。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 3 => array ( 'id' => '3', 'navigate_name' => '主席寄语', 'pid' => '1', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178308', 'navigate_mark' => 'chairman', 'parent_navigate_mark' => 'about', 'title' => '十一届全国政协常委、通威集团董事局主席寄语', 'keywords' => '', 'thumbnail' => '', 'url' => '/chairman/index.html', 'description' => '在这个充满机遇与挑战的时代，我们将一如既往地坚持“追求卓越，奉献社会”的企业宗旨，坚定不移地奉行“诚、信、正、一”的经营理念，并矢志不渝地以“世界级健康安全食品供应商和世界级清洁能源企业”为企业使命和价值诉求，勠力同心，斗志昂扬，一往无前，把通威事业推向更高的平台和更为广阔的天地。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 43 => array ( 'id' => '43', 'navigate_name' => '领导关怀', 'pid' => '1', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1652777223', 'navigate_mark' => 'leadcare', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/leadcare/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 30 => array ( 'id' => '30', 'navigate_name' => '成员企业', 'pid' => '1', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559181384', 'navigate_mark' => 'members', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/members/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 5 => array ( 'id' => '5', 'navigate_name' => '企业荣誉', 'pid' => '1', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178380', 'navigate_mark' => 'honor', 'parent_navigate_mark' => 'about', 'title' => '通威集团企业荣誉简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/honor/index.html', 'description' => '三十余载光辉历程，在刘汉元主席带领下，通威不断获得国家和社会认可，品牌价值不断跃升。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 4 => array ( 'id' => '4', 'navigate_name' => '发展历程', 'pid' => '1', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178352', 'navigate_mark' => 'develo', 'parent_navigate_mark' => 'about', 'title' => '通威集团发展历程简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/develo/index.html', 'description' => '发迹于眉山，成长于成都，壮大于全国，放眼于世界。起源于探索，扎根于实干，发展于产业，领先于时代。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 14 => array ( 'id' => '14', 'navigate_name' => '新闻中心', 'pid' => '0', 'mid' => '1', 'sort' => '8', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498179620', 'navigate_mark' => 'newscenter', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '1', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 15 => array ( 'id' => '15', 'navigate_name' => '集团快讯', 'pid' => '14', 'mid' => '1', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179761', 'navigate_mark' => 'news', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 29 => array ( 'id' => '29', 'navigate_name' => '集团公告', 'pid' => '14', 'mid' => '1', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1504679813', 'navigate_mark' => 'notice', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/notice/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_report.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 18 => array ( 'id' => '18', 'navigate_name' => '媒体聚焦', 'pid' => '14', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179867', 'navigate_mark' => 'media', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/media/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 17 => array ( 'id' => '17', 'navigate_name' => '新闻专题', 'pid' => '14', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498179840', 'navigate_mark' => 'special', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/special/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'is_manger' => '0', 'front_point' => '', 'aid_field' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_zt.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 35 => array ( 'id' => '35', 'navigate_name' => '通威视讯', 'pid' => '14', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1584067783', 'navigate_mark' => 'wvideo', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/wvideo/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_shixun.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 7 => array ( 'id' => '7', 'navigate_name' => '集团产业', 'pid' => '0', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178528', 'navigate_mark' => 'industries', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/energy/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 8 => array ( 'id' => '8', 'navigate_name' => '饲料生产', 'pid' => '7', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178772', 'navigate_mark' => 'agri', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/agri/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 11 => array ( 'id' => '11', 'navigate_name' => '绿色养殖', 'pid' => '7', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178878', 'navigate_mark' => 'breeds', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/breeds/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 12 => array ( 'id' => '12', 'navigate_name' => '食品加工', 'pid' => '7', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179495', 'navigate_mark' => 'foods', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/foods/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 9 => array ( 'id' => '9', 'navigate_name' => '高纯晶硅', 'pid' => '7', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178794', 'navigate_mark' => 'energy', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/energy/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 42 => array ( 'id' => '42', 'navigate_name' => '太阳能电池', 'pid' => '7', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1652776138', 'navigate_mark' => 'solarcell', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/solarcell/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 10 => array ( 'id' => '10', 'navigate_name' => '渔光一体', 'pid' => '7', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178853', 'navigate_mark' => 'yuguang', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/yuguang/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 13 => array ( 'id' => '13', 'navigate_name' => '其他产业', 'pid' => '7', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179557', 'navigate_mark' => 'diversified', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/diversified/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'other', 'child' => array ( ), ), ), ), 19 => array ( 'id' => '19', 'navigate_name' => '品牌文化', 'pid' => '0', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180753', 'navigate_mark' => 'brandculture', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 20 => array ( 'id' => '20', 'navigate_name' => '文化理念', 'pid' => '19', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180783', 'navigate_mark' => 'culture', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 48 => array ( 'id' => '48', 'navigate_name' => '党建引领', 'pid' => '19', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1654594850', 'navigate_mark' => 'partys', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/partys/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 21 => array ( 'id' => '21', 'navigate_name' => '文化活动', 'pid' => '19', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180808', 'navigate_mark' => 'team', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/team/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 6 => array ( 'id' => '6', 'navigate_name' => '社会责任', 'pid' => '19', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178457', 'navigate_mark' => 'public', 'parent_navigate_mark' => 'brand-culture', 'title' => '通威集团社会公益事业简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/public/index.html', 'description' => '通威三十余载发展壮大，始终情牵社会、心系公益，真正实现了企业价值与社会价值的统一。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 31 => array ( 'id' => '31', 'navigate_name' => '品牌价值', 'pid' => '19', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559182519', 'navigate_mark' => 'brand', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/brand/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 22 => array ( 'id' => '22', 'navigate_name' => '文化载体', 'pid' => '19', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498180840', 'navigate_mark' => 'newspaper', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/paper/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 23 => array ( 'id' => '23', 'navigate_name' => '企业视频', 'pid' => '19', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498180872', 'navigate_mark' => 'video', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/video/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_video.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 25 => array ( 'id' => '25', 'navigate_name' => '人才中心', 'pid' => '0', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180924', 'navigate_mark' => 'work', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 26 => array ( 'id' => '26', 'navigate_name' => '人才招聘', 'pid' => '25', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180946', 'navigate_mark' => 'join', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 34 => array ( 'id' => '34', 'navigate_name' => '学习中心', 'pid' => '25', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1560935870', 'navigate_mark' => 'twschool', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/twschool/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 49 => array ( 'id' => '49', 'navigate_name' => '在线办公', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1654596251', 'navigate_mark' => 'online', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => 'http://fbc.tongwei.com', 'description' => '', 'setting' => NULL, 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 50 => array ( 'id' => '50', 'navigate_name' => '电子采购', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1654596567', 'navigate_mark' => 'buy', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => 'https://care.tmall.com/', 'description' => '', 'setting' => NULL, 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 51 => array ( 'id' => '51', 'navigate_name' => '监督平台', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1654596691', 'navigate_mark' => 'supervision', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/supervision/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 33 => array ( 'id' => '33', 'navigate_name' => '联系通威', 'pid' => '0', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559185971', 'navigate_mark' => 'contact', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/contact/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_contact.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><li <?php if($values['id'] == $navigate['pid']): ?>class="active"<?php endif; ?>>
                        <a class="item <?php if(!empty($$values["child"])): ?>next<?php endif; ?>" href="<?php echo ($values['url']); ?>"><?php echo ($values['navigate_name']); ?></a>
                        <?php if(!empty($values["child"])): ?><div class="subnav">
                                <?php if(is_array($values['child'])): $i = 0; $__LIST__ = $values['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v['url']); ?>"><?php echo ($v['navigate_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div><?php endif; ?>
                        </li><?php $i++; endforeach; endif; ;?>
                </ul>
            </div>
            <!-- 切换语言 -->
            <a class="language" href="http://en.tongwei.com/" target="_blank"><img src="__PUBLIC__/assets/images/lag.png" alt=""></a>
            <!-- 搜索按钮 -->
            <a class="search-btn" href="javascript:;"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
            <!-- 搜索框 -->
            <div class="head-search search-hide">
                <form action="/search.html" method="get">
                    <input type="text" name="q" id="ipts" placeholder="输入关键词，回车">
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


    <div class="subbanner mt100" style="background-image: url(__PUBLIC__/assets/images/sub37.png);">
        <div class="text">
            <div class="fw">
                <p class="t1">可持续发展</p>
                <div class="state">
                    <p>发端于水产、成长于农牧、跨越于新能源 通威始终坚守实体经济，</p>
                    <p>践行实业报国 不忘初心，持续演绎绿色发展梦想</p>
                </div>
            </div>
        </div>
    </div>



    <div class="mainbox pb50">
        <div class="menuwrap">
            <div class="fw2">
                <div class="menuswiper">
                    <?php $thispid = $navigate['id']; ?>
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide <?php if($thispid == 38): ?>active<?php endif; ?>">
                            <a href="/operator/index.html">绿色运营</a>
                        </li>
                        <li class="swiper-slide <?php if($thispid == 39): ?>active<?php endif; ?>">
                            <a href="/foodstuff/index.html">绿色食品</a>
                        </li>
                        <li class="swiper-slide <?php if($thispid == 40): ?>active<?php endif; ?>">
                            <a href="/energys/index.html">绿色能源</a>
                        </li>
                        <li class="swiper-slide <?php if($thispid == 41): ?>active<?php endif; ?>">
                            <a href="/dream/index.html">绿色梦想</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <?php
 $id=$navigate['id']; switch($id){ case 37: case 38: echo '<div class="pt30">
    <div class="fw2">
        <p class="intitle">绿色运营</p>
        <div class="greenbox">
            <div class="green-brief fs15 mb40" aos="fade-up">
                <p>通威集团是深耕绿色农业和绿色能源产业,快速发展的大型跨国集团公司,现拥有遍布全国各地及海外地区的300余家分、子公司,员工近5万人。目前,通威已打造出水产饲料、高纯晶硅、高效电池三大全球龙头,在新能源产业方面,已成为拥有从上游高纯晶硅生产、中游高效太阳能电池片生产,到终端光伏电站建设与运营的垂直一体化光伏企业,成为全球能源革命的主要参与者和重要推动力量之一。
                </p>
                <br>
                <p>通威集团连续多年入列中国企业500强、全球新能源企业500强、中国民营企业500强、中国民营企业制造业100强、碳中和先锋企业等殊荣,旗下的通威股份多次荣列中国民营上市公司100强、中国最具竞争力民营企业50强，三次荣获国家科学技术进步奖。2021年,通威股份市值最高突破2800亿元,通威品牌价值近1500亿元,位居四川民营企业首位,并成为全国乃至全球水产和光伏两大行业品牌价值最高企业。
                </p>
            </div>
            <div class="totaldata mtb" aos="fade-up">
                <div class="item xs">
                    <p class="n0"><span>500</span>强</p>
                    <div class="n1">中国企业</div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>2800</span>亿元</p>
                    <div class="n1">市值最高</div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>1500</span>亿元</p>
                    <div class="n1">品牌价值近</div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>50000</span>人</p>
                    <div class="n1">员工近</div>
                </div>
                <div class="item w1">
                    <p class="n0"><span>300</span>余家分、子公司</p>
                    <div class="n1">集团现拥有遍布全国各地及海外地区的</div>
                </div>
            </div>
            <p class="green-title" aos="fade-up">贡献SDGS(助力联合国可持续发展目标)</p>
            <div class="sdgs" aos="fade-up"><img src="__PUBLIC__/assets/images/icons/yy.png" alt=""></div>
            <p class="green-title" aos="fade-up">主要产品及服务</p>
            <div class="green-brief mb20" aos="fade-up">
                通威以农业、光伏新能源为主业,形成了“农业+光伏”资源整合、协同发展的经营模式,在农业领域和新能源领域,为人们提供一流的产品和服务，致力于打造世界级健康安全食品供应商、世界级清洁能源供应商。
            </div>
            <div class="duline"></div>
            <p class="green-tt" aos="fade-up">农业产业</p>
            <ul class="green-list" aos="fade-up">
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g01.png" alt=""></div>
                        <p class="tt">水产苗种</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g02.png" alt=""></div>
                        <p class="tt">饲料生产</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g03.png" alt=""></div>
                        <p class="tt">动物保健</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g04.png" alt=""></div>
                        <p class="tt">绿色养殖</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g5.png" alt=""></div>
                        <p class="tt">食品加工</p>
                    </a>
                </li>
            </ul>
            <div class="duline"></div>
            <p class="green-tt" aos="fade-up">新能源产业</p>
            <ul class="green-list" aos="fade-up">
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g6.png" alt=""></div>
                        <p class="tt">高纯硅晶</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g7.png" alt=""></div>
                        <p class="tt">高效晶硅太阳能电池</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g8.png" alt=""></div>
                        <p class="tt">“渔光-体”创新发展模式</p>
                    </a>
                </li>
            </ul>
            <div class="duline"></div>
            <p class="green-tt" aos="fade-up">相关多元产业</p>
            <ul class="green-list" aos="fade-up">
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g9.png" alt=""></div>
                        <p class="tt">地产</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g10.png" alt=""></div>
                        <p class="tt">物业服务</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g11.png" alt=""></div>
                        <p class="tt">宠物食品</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g12.png" alt=""></div>
                        <p class="tt">文化传媒</p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/g13.png" alt=""></div>
                        <p class="tt">通威商管</p>
                    </a>
                </li>
            </ul>
            <div class="duline"></div>
            <p class="green-title" aos="fade-up">成就员工发展</p>
            <div class="green-brief mb30" aos="fade-up">
                长期以来,通威管理者坚信人才是企业发展的基石,是企业财富的源泉,在公司“事事争创一流”文化价值观的引领下,我们紧紧围绕公司发展战略,提供具有竞争力的薪酬体系，构建了完善的人才培养体系,
                为员工在通威的成长和发展提供了广阔的平台,实现企业和员工的共同发展。
            </div>
            <div class="duline"></div>
            <p class="green-tt" aos="fade-up">员工发展</p>
            <div class="green-brief mb30" aos="fade-up">
                通威集团有限公司工会委员会(下称:集团工会)成立于2004年,目前所有在册的4.7万名通威正式员工均称为工会会员,根据《工会法》选举设置工会主席1名,经费审查、组织、文娱、女工等15名委员专项开展.工作,建立切实履行工会职能,围绕促进企业经营发展开展日常活动，维护职工权益,组织丰富多彩健康有益的职工活动,设置了党员活动室、员工读书园地,专门增设“妈妈小屋”，并成立了瑜伽、篮球、羽毛球.等兴趣小组，每周定期开展活动。真正做到以员工为本,服务员工。
            </div>
            <p class="green-tt" aos="fade-up">权益保障</p>
            <div class="green-brief mb30" aos="fade-up">
                人才是公司发展的重要战略资源。公司为员工提供健全薪酬福利体系,构建民主对话的工作环境,保障员工职业健康与安全,让员工在公平、高效、健康的工作环境下成长。
            </div>
            <div class="green-types mb40" aos="fade-up">
                <span>薪酬福利</span>
                <span>职业健康与安全</span>
                <span>民主沟通</span>
            </div>
            <p class="green-tt" aos="fade-up">发展</p>
            <div class="green-brief mb20" aos="fade-up">
                <p>我们为不同岗位、不同层次的员工提供了因材施教的培训策略,</p>
                <p>提高员工素质与技能,让员工在职场成长的各阶段都能获得及时的技术、知识储备和支撑,增长技能、拓宽眼界,不断提升职场竞争力。</p>
            </div>
            <div class="green-blue mb40" aos="fade-up">
                <div class="ss">
                    <span>新 &nbsp;员 &nbsp;工：</span>成长项目:“师带徒”培训机制、启航计划等
                </div>
                <div class="ss">
                    <span>在职员工：</span>成长项目:专题培训、在线学习平台等
                </div>
                <div class="ss">
                    <span>管 &nbsp;理 &nbsp;层：</span>看优秀、学先进”的对标学习之旅、360度评价报告等
                </div>
            </div>
            <p class="green-title" aos="fade-up">打造责任供应链</p>
            <div class="green-brief mb10" aos="fade-up">
                我们珍惜与供应商相互支持、互利共赢的良好合作局面,在“以确保质量为主、以降低成本为主、以抓住机遇把握行情为主”三项采购原则的前提下,进一步优化建设适合自身、最能体现优势的采购系统,与供应商共建责任供应链。
            </div>
            <div class="duline mb20"></div>
            <div class="green-types mb40" aos="fade-up">
                <span>严选供应商</span>
                <span>供应商考评</span>
                <span>供应商培训</span>
                <span>供应商退出</span>
            </div>
            <p class="green-title" aos="fade-up">促进合作对话</p>
            <div class="green-brief mb10" aos="fade-up">
                通威以开放心态积极展开国内外交流合作,立足本土、面向国际，在交流合作中创建专业分工、相互协作的行业生态,达成共享共融、共生共赢的发展共识,不断走向更为广阔的天地。
            </div>
            <div class="duline mb20"></div>
            <div class="green-types mb40" aos="fade-up">
                <span>构建平台促进交流</span>
                <span>行业合作协作共赢</span>
                <span>积极发声传播品牌</span>
                <span>供应商退出</span>
            </div>
            <p class="green-title" aos="fade-up">拓展海外发展</p>
            <div class="green-brief mb10" aos="fade-up">
                2007年通威在越南建立海外第-家水产饲料公司,不久便凭借产品和服务实力摘得当地销售桂冠。如今通威已经在海外建立起7家子公司,不但为投资国贡献税收,还有效解决了当地人员就业、提升了投资国当地养殖水平,为客户提供了更多的优质饲料选择。与此同时,通威新能源业务也积极践行“走出去”步伐,高效晶硅太阳能电池片等光伏产品也销往海外30余个国家,为增强国民经济在国际市场的竞争力贡献力量。
            </div>
            <div class="duline mb20"></div>
            <div class="green-types" aos="fade-up">
                <span>提供就业</span>
                <span>技术交流</span>
                <span>社区建设</span>
            </div>
        </div>
    </div>
</div>' ;break; case 39: echo '<div class="pt30">
    <div class="fw2">
        <p class="intitle">绿色食品</p>
        <div class="greenbox">
            <ul class="numlist c5" aos="fade-up">
                <li>
                    <span class="nn">1</span>
                    <p class="ncon">培育优质水产苗种</p>
                </li>
                <li>
                    <span class="nn">2</span>
                    <p class="ncon">提升饲料产品健康安全指数</p>
                </li>
                <li>
                    <span class="nn">3</span>
                    <p class="ncon">发展集约化、现代化、智能化养殖</p>
                </li>
                <li>
                    <span class="nn">4</span>
                    <p class="ncon">提供绿色动保产品</p>
                </li>
                <li>
                    <span class="nn">5</span>
                    <p class="ncon">提供生态、优质、安全、健康的全程可追溯到产品</p>
                </li>
            </ul>
            <div class="totaldata mtb">
                <div class="item xs">
                    <p class="n0"><span>800</span>余件</p>
                    <div class="n1">累计申请专利</div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>365</span>模式</p>
                    <div class="n1">深化通威</div>
                </div>
                <div class="item xs">
                    <p class="n0 f18">推进智慧化科学化规模化</p>
                    <div class="n1">养殖模式</div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>100%</span>合格率</p>
                    <div class="n1">2021年饲料产品一次校验</div>
                </div>
                <div class="item w2">
                    <p class="n2">参与制定修定</p>
                    <div class="sdata-wrap">
                        <div class="sdata">
                            <p class="n0"><span>10</span>项</p>
                            <p class="n1">国家标准</p>
                        </div>
                        <div class="sdata">
                            <p class="n0"><span>6</span>项</p>
                            <p class="n1">地方标准</p>
                        </div>
                        <div class="sdata">
                            <p class="n0"><span>7</span>项</p>
                            <p class="n1">行业标准</p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="green-title" aos="fade-up">贡献SDGS(助力联合国可持续发展目标)</p>
            <div class="sdgs" aos="fade-up"><img src="__PUBLIC__/assets/images/icons/sp.png" alt=""></div>
            <p class="green-title" aos="fade-up">打造品质农业</p>
            <div class="green-brief mb20" aos="fade-up">
                国家《乡村振兴战略规划(2018-2022年)》提出要推进农业绿色化、优质化、特色化、品牌化,大力发展绿色生态健康养殖，提升农产品质量和食品安全。通威深耕水产,以饲料工业为核心,各环节齐头并进,建立了以“苗种繁育-饲料营养-
                动物保健一绿色养殖-食品加工”为核心的安全可追溯现代水产产业链,致力于打造世界级健康安全食品供应商,为人们的美好生活提供生态、优质和安全的绿色产品。
            </div>
            <div class="duline"></div>
            <div class="green-type2 mb30" aos="fade-up">
                <span>绿色安全饲料</span>
                <span>科学高效养殖</span>
                <span>营养健康食品</span>
                <span>贴心透明服务</span>
            </div>
            <p class="green-title" aos="fade-up">科技改变农业</p>
            <div class="green-brief mb20" aos="fade-up">
                中国已进入到由传统渔业向现代渔业转变的关键阶段，要突破资源、环境、食品安全等问题的制约,需运用现代智能技术、创新合作模式推动传统水产养殖方式升级改造。通威以饲料工业为核心，各环节齐头并进,成立高层次研发团队、搭建技术创新平台,积极开展动物营养提升、养殖技术研究,提升智能化养殖、数据化管理水平,以科技力量积极推动产业转型升级,提高农业行业的整体效率和收益。
            </div>
            <div class="duline"></div>
            <div class="green-type2 blue" aos="fade-up">
                <span>构建创新生态</span>
                <span>发展智能养殖</span>
                <span>关键技术攻坚</span>
                <span>参见行业标准</span>
            </div>
        </div>
    </div>
</div>' ;break; case 40: echo '<div class="pt30">
    <div class="fw2">
        <p class="intitle">绿色能源</p>
        <div class="greenbox">
            <ul class="numlist c4" aos="fade-up">
                <li>
                    <span class="nn">1</span>
                    <p class="ncon">打造具有独立自主知识产权的光伏新能源产业链</p>
                </li>
                <li>
                    <span class="nn">2</span>
                    <p class="ncon">推动光伏技术创新，让能源更清洁、 更高效</p>
                </li>
                <li>
                    <span class="nn">3</span>
                    <p class="ncon">建设智能制造工厂，树立行业智能制造标杆</p>
                </li>
                <li>
                    <span class="nn">4</span>
                    <p class="ncon">扩大技术交流合作，推动光伏产业向前发展</p>
                </li>
            </ul>
            <div class="totaldata mtb" aos="fade-up">
                <div class="item xs">
                    <p class="n0"><span>180,000</span>吨/年</p>
                    <div class="n1">高纯晶硅产能</div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>40</span>GW</p>
                    <div class="n1">太阳能电池产能超过</div>
                </div>
                <div class="item">
                    <p class="n0"><span>99.999999999</span>%</p>
                    <div class="n1">
                        <p>高纯晶硅产品</p>
                        <p>关键杂质元素纯度达到</p>
                    </div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>2.8</span>GW</p>
                    <div class="n1">装机并网规模超.</div>
                </div>
                <div class="item xs">
                    <p class="n0"><span>46</span>座</p>
                    <div class="n1">建成“渔光-体”光伏电站.</div>
                </div>
            </div>
            <p class="green-title" aos="fade-up">贡献SDGS(助力联合国可持续发展目标)</p>
            <div class="sdgs" aos="fade-up"><img src="__PUBLIC__/assets/images/icons/ny.png" alt=""></div>
            <p class="green-title" aos="fade-up">光伏助推能源转型</p>
            <div class="green-brief mb40" aos="fade-up">
                <p>全球变暖已经成不争的事实,2015-2019年间，全球平均气温较工业化前时代升高了1.1°C,气候不稳定又造成每年出现.极寒、极热、干旱、洪涝等极端天气事件越来越多,对粮\
                    食安全、人类健康、经济增长造成持续负面影响。为了加强对气候变化威胁的全球应对，各国通过了《巴黎协定》,致力于在本世纪将全球气温升幅控制在2°C以内。作为全球最大的
                    发展中国家,2020年9月22日,习近平主席在第七十五届联合国大会-
                    -般性辩论_上庄严承诺“中国将提高国家自主贡献力度,二氧化碳排放力争于2030年前达到峰值,努力争取2060年前实现
                    碳中和"。加快发展以光伏、风能为代表的可再生能源,推进汽车电动化、能源消费电力化、电力生产清洁化,不仅是我国达成碳中和目标，实现绿色清洁高质量发展的必由之路,也是全球落实《巴黎协定》,实
                    现气候治理和可持续发展的主要路径。</p>
                <br>
                <p>当前,光伏发电已在全球许多国家和地区成为最经济的发电方式,2021年我国光伏发电成本已降到0.3元/千瓦时以内,预计“十四五”期间将降到0.25元/千瓦时以下，低
                    于绝大部分煤电。如进- -步考虑生态环境成本，光伏发电的优势将更加明显。当前光伏发电已基本实现平价.上网,因此发电成本实际已经降到了15美元左右每桶原油的价
                    格,且发电全过程零污染、零排放。中国已形成了200GW左右的光伏系统产能,产品每年发出的电力,相当于1亿吨石油的当量。</p>
                <br>
                <p>2021年是“十四五”的开局之年,站在新的起点,大力推动光伏、风能等可再生能源发展,不仅能为全社会提供稳定可靠、清洁经济的电力,为我国经济内循环提供保障,还能推进
                    能源转型升级,助力我国减排目标早日实现。过程中,既不额外.增加国家负担,还能充分利用我国已经具备的水泥、钢铁产能,并带动储能、特高压电网等相关新基建项目,从投资和消费两个维度
                    有效拉动国内市场,成为当前及未来促进国内大循环、国内国际双循环的生力军。</p>
            </div>
            <div class="green-items mb40" aos="fade-up">
                <div class="item">
                    <p class="tt">到2025年,光伏总装机规模(直流侧，下同)达到7.3亿千瓦，占全国总装机的24%，全年发电量为8770亿千瓦时,占当年全社会用电量的9%。</p>
                    <div class="pic"><img src="__PUBLIC__/assets/images/cc1.png" alt=""></div>
                </div>
                <div class="item">
                    <p class="tt">到2035年,光伏总装机规模达到30亿kW,占全国总装机的49%,全年发电量为3.5万亿千瓦时,占当年全社会用电量的28%。
                    </p>
                    <div class="pic"><img src="__PUBLIC__/assets/images/cc1.png" alt=""></div>
                </div>
            </div>
            <div class="duline"></div>
            <p class="green-title" aos="fade-up">我们的贡献</p>
            <div class="dubrief" aos="fade-up">以每100MW光伏电站年设计发电量1.2亿度电折算,目前为止通威生产的66GW高效光伏电池</div>
            <div class="greenimg mb40" aos="fade-up">
                <img src="__PUBLIC__/assets/images/cc3.png" alt="">
                <img src="__PUBLIC__/assets/images/cc4.png" alt="">
            </div>
            <div class="duline"></div>
            <p class="green-title" aos="fade-up">引领全产业链发展</p>
            <div class="green-brief mb30" aos="fade-up">
                <p>中国光伏行业经历了从无到有、从小到大、从追赶到超越的历程。目前中国已成为全球最大的光伏产品生产国。通威2006年进入光伏领域,加速拓展和完善新能源产业布局，已形成具有自主知识产权的
                    光伏新能源产业链条。永祥股份实现了两条完整循环经济产业链;通威太阳能深度切入太阳能发电核心产品的研发、制造和推广:
                    ,是全球领先的晶硅电池生产企业,产能规模、出货量连续六年位居:全球首位;通威于全球首创“渔光-体”创新发展模式，实现了光伏新能源产业和传统渔业的协同创新发展,达到“上可发电,
                    下可养鱼”的目的,用更清洁、更安全,通威多年来始终坚持绿色发展,助推可再生能源发展,为子孙后代留住青山绿水、白云蓝天。</p>
                <br>
                <p><img src="__PUBLIC__/assets/images/timg1.png" alt=""></p>
            </div>
            <div class="duline"></div>
            <p class="green-title" aos="fade-up">夯实安全发展基础</p>
            <div class="green-brief mb20" aos="fade-up">
                通威光伏产业链能够稳健发展,离不开对安全质量原则的坚守,我们始终奉行安全优先原则,将安全作为一条不可逾越的红线,引进先进管理模式、完善管理制度,全力为员工提供健康作业环境,提升生产效益。
            </div>
            <div class="green-tags mb20" aos="fade-up">
                <span>保障安全生产</span>
                <span>营建安全氛围</span>
            </div>
            <div class="duline"></div>
            <p class="green-title" aos="fade-up">推动光伏事业发展</p>
            <div class="green-brief mb20" aos="fade-up">
                我们深知中国光伏事业的创新发展,离不开行业内各企业的通力合作。通威积极推动行业标准化建设、加强技术交流不遗余力,与企业、高校、协会合作,推动我国能源革命迈上新的发展台阶。
            </div>
            <div class="green-step" aos="fade-up">
                <div class="wrap">
                    <span class="on">参编国家标准</span>
                    <span>1. 参与国家标准</span>
                    <span>2. 共享行业智慧</span>
                    <span>3. 推动技术合作</span>
                </div>
            </div>
        </div>
    </div>
</div>' ;break; case 41: echo '<div class="pt30">
    <div class="fw2">
        <p class="intitle">绿色梦想</p>
        <div class="greenbox">
            <ul class="numlist" aos="fade-up">
                <li>
                    <span class="nn">1</span>
                    <p class="ncon">构建绿色制造体系，推动产业绿色转型</p>
                </li>
                <li>
                    <span class="nn">2</span>
                    <p class="ncon">首创“渔光一体”绿色模式，提升生态效益和经济效益</p>
                </li>
                <li>
                    <span class="nn">3</span>
                    <p class="ncon">首创“渔光一体”绿色模式，提升生态效益和经济效益</p>
                </li>
            </ul>
            <div class="totaldata fwrap mtb br" aos="fade-up">
                <div class="item">
                    <div class="n2">永祥股份通过科技创新和技术进步 产品综合电耗和蒸汽消耗同比下降</div>
                    <div class="sdata-wrap">
                        <div class="sdata">
                            <p class="n0 nc"><span>4%</span>电耗</p>
                        </div>
                        <div class="sdata">
                            <p class="n0 nc"><span>54%</span>蒸汽</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="n2">通威太阳能实现</div>
                    <p class="n0 f18">碳足迹可追溯</p>
                </div>
                <div class="item">
                    <div class="n2">通威太阳能单位电耗 低于国家行业标准</div>
                    <p class="n0"><span>30%</span></p>
                </div>
                <div class="item">
                    <div class="n2">
                        <p>工厂颗粒物排放</p>
                        <p>低于国家行业标准</p>
                    </div>
                    <p class="n0"><span>87%</span></p>
                </div>
                <div class="item xs">
                    <div class="n2">通威新能源成功申报 万亩级</div>
                    <p class="n0 f18">“渔光小镇”</p>
                </div>
                <div class="item xs">
                    <div class="n2">实现年二氧化碳减排</div>
                    <p class="n0"><span>40</span>万吨</p>
                </div>
                <div class="item xs">
                    <div class="n2">单位水耗低于国家行业标准</div>
                    <p class="n0"><span>52%</span></p>
                </div>
                <div class="item xs">
                    <div class="n2">
                        <p>挥发性有机物排放</p>
                        <p>低于国家行业标准</p>
                    </div>
                    <p class="n0"><span>80%</span></p>
                </div>
                <div class="item xs">
                    <div class="n2">
                        <p>废水排放中的氨氮排放</p>
                        <p>低于国家行业标准</p>
                    </div>
                    <p class="n0"><span>96%</span></p>
                </div>
                <div class="item xs">
                    <div class="n2">
                        <p>累计公益投入超过</p>
                    </div>
                    <p class="n0"><span>4.5</span>亿元</p>
                </div>
            </div>
            <p class="green-title" aos="fade-up">贡献SDGS(助力联合国可持续发展目标)</p>
            <div class="sdgs" aos="fade-up"><img src="__PUBLIC__/assets/images/icons/mx.png" alt=""></div>
            <p class="green-title" aos="fade-up">实施绿色制造</p>
            <div class="green-brief mb20" aos="fade-up">
                习近平总书记在不同场合反复强调“绿水青山就是金山银山”。党的十九大报告中明确指出“建立健全绿色低碳循环发展的经济体系”。作为国民经济的主体,制造业的绿色程度对构建绿色经济体系有着举足轻重的作用。对于践行绿色农业、绿色能源“双绿色”发展道路的通威来说,提供绿色产品和服务、打造绿色工厂、实施绿色运营,构建起绿色制造体系是实现产业升级的重要任务,是我们创新发展的优先途径,是主动承担社会责任的必然选择。
            </div>
            <div class="duline"></div>
            <div class="green-zhizao mb40" aos="fade-up">
                <div class="item">
                    <span class="t0">健全环境管理</span>
                </div>
                <div class="item">
                    <span class="t0">工业环境治理</span>
                    <div class="con">
                        <span>饲料生产:探索废气“零排放”工艺</span>
                        <span>高纯晶硅生产:全封闭式循环经济产业链</span>
                        <span>高效晶硅太阳能电池生产:智能制造降低能耗</span>
                    </div>
                </div>
                <div class="item">
                    <span class="t0">践行节能降耗</span>
                    <div class="con">
                        <span>全员节能参与</span>
                        <span>节能技术创新</span>
                        <span>智能制造升级</span>
                    </div>
                </div>
            </div>
            <p class="green-title" aos="fade-up">创新绿色模式</p>
            <div class="green-brief mb20" aos="fade-up">
                <p>2014年1月,通威成立研究小组,研究如何让渔、光共生,并提出了“渔光一体”的绿色构想。2015年12月,通威第一个真正意义.上的“渔光- -体”项目-通
                    威江苏如东“渔光一体”项目正式实现并网发电,全球首创的“渔光一体”绿色创想从蓝图变为现实。</p>
                <p>“渔光一体”创新发展模式,一方面利用渔业养殖水面,解决了光伏电站规模化应用所需的空间资源;另一方面引导水产养殖集约化、智能化、高效化发展，为水产养殖行业水污染、绿色养殖问题提供了创新解决方案,书写推动绿水青山建设
                    的生动实践。</p>
            </div>
            <div class="duline"></div>
            <p class="green-title" aos="fade-up">传播绿色理念</p>
            <div class="green-brief mb20" aos="fade-up">
                坚定不移走生态优先、绿色发展之路,以减少、改善环境污染为目标，将行之有效的项目复制推广,让更多人参与其中。在创造提供可持续产品和服务的同时,我们期待能将可持续的商业模式、先进科技及环保理念为更多人所知、所用。
            </div>
            <div class="duline"></div>
            <div class="green-types mb30" aos="fade-up">
                <span class="one">加入绿色组织:联合国全球契约组织和中国企业气候行动</span>
                <span>建言绿色发展:启动碳中和计划</span>
                <span>建立绿色标准:绿色光伏智造标准</span>
            </div>
            <p class="green-title" aos="fade-up">抗击新冠疫情</p>
            <ul class="green-kangji mb20" aos="fade-up">
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/kj1.png" alt=""></div>
                        <p class="tt">2020年1月29日,通威集团第一时间捐赠1000万元，驰援武汉及周边疫区前线抗击疫情及相关防治工作。 </p>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">
                        <div class="pic"><img src="__PUBLIC__/assets/temp/kj2.png" alt=""></div>
                        <p class="tt">2020年3月2日-3日,通威食品捐赠价值300万元的健康食品，驰援抗击新冠疫情的医护人员。
                        </p>
                    </a>
                </li>
            </ul>
            <table class="greentable" aos="fade-up">
                <tr>
                    <th>战疫一线</th>
                    <th>上下游供应链</th>
                    <th>投身当地社区</th>
                </tr>
                <tr>
                    <td>1000万元专项捐款驰援湖北防控一-线</td>
                    <td>向海外合作伙伴捐赠医疗防护物资</td>
                    <td>向各地政府捐赠防疫物资</td>
                </tr>
                <tr>
                    <td>300万元“天使营养关爱计划”守护医护人员 </td>
                    <td>向当地养殖户提供消毒物资 </td>
                    <td>组织员工响应执勤防控工作 </td>
                </tr>
            </table>
        </div>
    </div>
</div>' ;break; } ?>
    </div>


<!-- 页脚 -->
<footer class="footer">
    <div class="foot-top">
        <div class="fw">
            <div class="wrap">
                <div class="left">
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
                    <div class="foot-search-wrap">
                        <!-- 搜索打开按钮 -->
                        <a class="sbtn" href="javascript:;"><img src="__PUBLIC__/assets/images/ss2.png" alt=""></a>
                        <!-- 搜索框 -->
                        <div class="foot-search search-hide">
                            <form action="/search.html" method="get">
                                <input type="text" name="q" id="ipt" placeholder="输入关键词，回车">
                                <a href="javascript:;" class="btn-search" onclick="searchs()"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
                                <a href="javascript:;" class="btn-close"><img src="__PUBLIC__/assets/images/close.png" alt=""></a>
                            </form>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="item">
                        <a class="tt" href="/">首页</a>
                    </div>
                    <?php $data=array ( 1 => array ( 'id' => '1', 'navigate_name' => '关于通威', 'pid' => '0', 'mid' => '0', 'sort' => '9', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178182', 'navigate_mark' => 'about', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 2 => array ( 'id' => '2', 'navigate_name' => '集团简介', 'pid' => '1', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178275', 'navigate_mark' => 'intro', 'parent_navigate_mark' => 'about', 'title' => '通威集团简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/intro/index.html', 'description' => '通威集团是以农业、新能源为双主业，并在化工、宠物食品、建筑与房地产等行业快速发展的大型民营科技型企业，系农业产业化国家重点龙头企业。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 3 => array ( 'id' => '3', 'navigate_name' => '主席寄语', 'pid' => '1', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178308', 'navigate_mark' => 'chairman', 'parent_navigate_mark' => 'about', 'title' => '十一届全国政协常委、通威集团董事局主席寄语', 'keywords' => '', 'thumbnail' => '', 'url' => '/chairman/index.html', 'description' => '在这个充满机遇与挑战的时代，我们将一如既往地坚持“追求卓越，奉献社会”的企业宗旨，坚定不移地奉行“诚、信、正、一”的经营理念，并矢志不渝地以“世界级健康安全食品供应商和世界级清洁能源企业”为企业使命和价值诉求，勠力同心，斗志昂扬，一往无前，把通威事业推向更高的平台和更为广阔的天地。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 43 => array ( 'id' => '43', 'navigate_name' => '领导关怀', 'pid' => '1', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1652777223', 'navigate_mark' => 'leadcare', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/leadcare/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 30 => array ( 'id' => '30', 'navigate_name' => '成员企业', 'pid' => '1', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559181384', 'navigate_mark' => 'members', 'parent_navigate_mark' => 'about', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/members/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 5 => array ( 'id' => '5', 'navigate_name' => '企业荣誉', 'pid' => '1', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178380', 'navigate_mark' => 'honor', 'parent_navigate_mark' => 'about', 'title' => '通威集团企业荣誉简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/honor/index.html', 'description' => '三十余载光辉历程，在刘汉元主席带领下，通威不断获得国家和社会认可，品牌价值不断跃升。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 4 => array ( 'id' => '4', 'navigate_name' => '发展历程', 'pid' => '1', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178352', 'navigate_mark' => 'develo', 'parent_navigate_mark' => 'about', 'title' => '通威集团发展历程简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/develo/index.html', 'description' => '发迹于眉山，成长于成都，壮大于全国，放眼于世界。起源于探索，扎根于实干，发展于产业，领先于时代。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 14 => array ( 'id' => '14', 'navigate_name' => '新闻中心', 'pid' => '0', 'mid' => '1', 'sort' => '8', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498179620', 'navigate_mark' => 'newscenter', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '1', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 15 => array ( 'id' => '15', 'navigate_name' => '集团快讯', 'pid' => '14', 'mid' => '1', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179761', 'navigate_mark' => 'news', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/news/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 29 => array ( 'id' => '29', 'navigate_name' => '集团公告', 'pid' => '14', 'mid' => '1', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1504679813', 'navigate_mark' => 'notice', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/notice/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_report.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 18 => array ( 'id' => '18', 'navigate_name' => '媒体聚焦', 'pid' => '14', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498179867', 'navigate_mark' => 'media', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/media/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search - ����.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 17 => array ( 'id' => '17', 'navigate_name' => '新闻专题', 'pid' => '14', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498179840', 'navigate_mark' => 'special', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/special/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'is_manger' => '0', 'front_point' => '', 'aid_field' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_zt.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 35 => array ( 'id' => '35', 'navigate_name' => '通威视讯', 'pid' => '14', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1584067783', 'navigate_mark' => 'wvideo', 'parent_navigate_mark' => 'newscenter', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/wvideo/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_shixun.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 7 => array ( 'id' => '7', 'navigate_name' => '集团产业', 'pid' => '0', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498178528', 'navigate_mark' => 'industries', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/energy/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 8 => array ( 'id' => '8', 'navigate_name' => '饲料生产', 'pid' => '7', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178772', 'navigate_mark' => 'agri', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/agri/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 11 => array ( 'id' => '11', 'navigate_name' => '绿色养殖', 'pid' => '7', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178878', 'navigate_mark' => 'breeds', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/breeds/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 12 => array ( 'id' => '12', 'navigate_name' => '食品加工', 'pid' => '7', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179495', 'navigate_mark' => 'foods', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/foods/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'farming', 'child' => array ( ), ), 9 => array ( 'id' => '9', 'navigate_name' => '高纯晶硅', 'pid' => '7', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178794', 'navigate_mark' => 'energy', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/energy/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 42 => array ( 'id' => '42', 'navigate_name' => '太阳能电池', 'pid' => '7', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1652776138', 'navigate_mark' => 'solarcell', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/solarcell/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 10 => array ( 'id' => '10', 'navigate_name' => '渔光一体', 'pid' => '7', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178853', 'navigate_mark' => 'yuguang', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/yuguang/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'energy', 'child' => array ( ), ), 13 => array ( 'id' => '13', 'navigate_name' => '其他产业', 'pid' => '7', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498179557', 'navigate_mark' => 'diversified', 'parent_navigate_mark' => 'industries', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/diversified/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_3.php', ), 'synopsis' => '', 'cate_name' => 'other', 'child' => array ( ), ), ), ), 19 => array ( 'id' => '19', 'navigate_name' => '品牌文化', 'pid' => '0', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180753', 'navigate_mark' => 'brandculture', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 20 => array ( 'id' => '20', 'navigate_name' => '文化理念', 'pid' => '19', 'mid' => '0', 'sort' => '7', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180783', 'navigate_mark' => 'culture', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/culture/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 48 => array ( 'id' => '48', 'navigate_name' => '党建引领', 'pid' => '19', 'mid' => '0', 'sort' => '6', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1654594850', 'navigate_mark' => 'partys', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/partys/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 21 => array ( 'id' => '21', 'navigate_name' => '文化活动', 'pid' => '19', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180808', 'navigate_mark' => 'team', 'parent_navigate_mark' => 'brand-culture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/team/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 6 => array ( 'id' => '6', 'navigate_name' => '社会责任', 'pid' => '19', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498178457', 'navigate_mark' => 'public', 'parent_navigate_mark' => 'brand-culture', 'title' => '通威集团社会公益事业简介', 'keywords' => '', 'thumbnail' => '', 'url' => '/public/index.html', 'description' => '通威三十余载发展壮大，始终情牵社会、心系公益，真正实现了企业价值与社会价值的统一。', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 31 => array ( 'id' => '31', 'navigate_name' => '品牌价值', 'pid' => '19', 'mid' => '0', 'sort' => '3', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559182519', 'navigate_mark' => 'brand', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/brand/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 22 => array ( 'id' => '22', 'navigate_name' => '文化载体', 'pid' => '19', 'mid' => '1', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1498180840', 'navigate_mark' => 'newspaper', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/paper/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'index_live.php', 'navigate_list_tpl' => 'list_1.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 23 => array ( 'id' => '23', 'navigate_name' => '企业视频', 'pid' => '19', 'mid' => '10', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '1', 'is_channel' => '2', 'save_time' => '1498180872', 'navigate_mark' => 'video', 'parent_navigate_mark' => 'brandculture', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/video/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'front_add_review' => '1', 'front_edit_review' => '1', 'is_manger' => '0', 'front_point' => '0', 'aid_field' => 'id', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'content_is_html' => '2', 'content_url_rule_no_html' => '11', 'show_type' => '2', 'navigate_index_tpl' => 'search.php', 'navigate_list_tpl' => 'list_video.php', 'show_tpl' => 'show_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 25 => array ( 'id' => '25', 'navigate_name' => '人才中心', 'pid' => '0', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '1', 'save_time' => '1498180924', 'navigate_mark' => 'work', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( 26 => array ( 'id' => '26', 'navigate_name' => '人才招聘', 'pid' => '25', 'mid' => '0', 'sort' => '5', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1498180946', 'navigate_mark' => 'join', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/join/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 34 => array ( 'id' => '34', 'navigate_name' => '学习中心', 'pid' => '25', 'mid' => '0', 'sort' => '4', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1560935870', 'navigate_mark' => 'twschool', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/twschool/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 49 => array ( 'id' => '49', 'navigate_name' => '在线办公', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1654596251', 'navigate_mark' => 'online', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => 'http://fbc.tongwei.com', 'description' => '', 'setting' => NULL, 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 50 => array ( 'id' => '50', 'navigate_name' => '电子采购', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '3', 'is_channel' => '2', 'save_time' => '1654596567', 'navigate_mark' => 'buy', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => 'https://care.tmall.com/', 'description' => '', 'setting' => NULL, 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), 51 => array ( 'id' => '51', 'navigate_name' => '监督平台', 'pid' => '25', 'mid' => '0', 'sort' => '1', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1654596691', 'navigate_mark' => 'supervision', 'parent_navigate_mark' => 'work', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/supervision/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_1.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ), ), 33 => array ( 'id' => '33', 'navigate_name' => '联系通威', 'pid' => '0', 'mid' => '0', 'sort' => '2', 'c_status' => '1', 'is_show' => '1', 'n_type' => '2', 'is_channel' => '2', 'save_time' => '1559185971', 'navigate_mark' => 'contact', 'parent_navigate_mark' => '', 'title' => '', 'keywords' => '', 'thumbnail' => '', 'url' => '/contact/index.html', 'description' => '', 'setting' => array ( 'pic' => '', 'navigate_is_html' => '2', 'navigate_url_rule_no_html' => '10', 'navigate_index_tpl' => 'single_contact.php', ), 'synopsis' => '', 'cate_name' => NULL, 'child' => array ( ), ), ); $i=1; if(is_array($data)): foreach($data as $key=>$values): ?><div class="item">
                            <a class="tt" href="<?php echo ($values['url']); ?>"><?php echo ($values['navigate_name']); ?></a>
                            <?php if(!empty($values["child"])): ?><div class="sublist">
                                    <?php if(is_array($values['child'])): $i = 0; $__LIST__ = $values['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v['url']); ?>"><?php echo ($v['navigate_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div><?php endif; ?>
                        </div><?php $i++; endforeach; endif; ;?>
                    <!--<div class="item">
                        <a class="tt" href="javascript:;">新闻中心</a>
                        <div class="sublist">
                            <a href="news1.html">集团要闻</a>
                            <a href="news2.html">集团公告</a>
                            <a href="news1.html">媒体聚焦</a>
                            <a href="news4.html">新闻专题</a>
                            <a href="news3.html">通威视讯</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">业务领域</a>
                        <div class="sublist">
                            <a href="chanye4.html">饲料生产</a>
                            <a href="chanye6.html">绿色养殖</a>
                            <a href="chanye3.html">食品加工</a>
                            <a href="chanye1.html">高纯晶硅</a>
                            <a href="chanye5.html">太阳能电池</a>
                            <a href="chanye7.html">渔光一体</a>
                            <a href="chanye2.html">其他产业</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">科技创新</a>
                        <div class="sublist">
                            <a href="keji1.html">科研体系</a>
                            <a href="keji3.html">发明专利</a>
                            <a href="keji4.html">科研成果</a>
                            <a href="keji2.html">产学研合作</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">企业文化</a>
                        <div class="sublist">
                            <a href="wenhua6.html">文化理念</a>
                            <a href="wenhua1.html">党建引领</a>
                            <a href="wenhua5.html">文化活动</a>
                            <a href="wenhua4.html">社会责任</a>
                            <a href="wenhua2.html">品牌价值</a>
                            <a href="wenhua7.html">文化载体</a>
                            <a href="wenhua3.html">企业视频</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="javascript:;">在线服务</a>
                        <div class="sublist">
                            <a href="online1.html">学习中心</a>
                            <a href="online3.html">人才招聘</a>
                            <a href="online1.html">在线办公</a>
                            <a href="online1.html">电子采购</a>
                            <a href="online2.html">监督平台</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="tt" href="contact.html">联系通威</a>
                    </div>-->
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
            通威集团有限公司 @ 2022 TONGWEI.COM 版权所有 &nbsp;
            <a href="https://beian.miit.gov.cn/" target="_blank">蜀ICP备05002048号</a>
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
            delay: 2000,
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
        autoplay: true,
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
        slidesPerView: 4,
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
        $('#video').attr('src', $src)  //切换视频地址
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
    function searchs(){
        var msg=$("#ipt").val();
        var msgs=$("#ipts").val();
        var word=''
        if(msg.length>0){
            word=msg;
        }
        if(msgs.length>0){
            word=msgs;
        }
        location.href="/search?q="+word;
    }
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
    var pid = <?php echo ($pid); ?>;
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