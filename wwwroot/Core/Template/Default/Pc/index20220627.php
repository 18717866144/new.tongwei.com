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
                        <li <if condition="$values['id'] == 0|''"> class="active"</if>>
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
    <!-- banner  -->
    <div class="banner mt100">
        <ul class="swiper-wrapper">
            <sql sql="select * from h_slide where type_id=1 and l_status=1 order by sort desc,id desc limit 5">
                <li class="swiper-slide">
                    <a <notempty name="values.url"> href="{-$values.url-}"  target="_blank"</notempty>style="background-image: url({-$values.picurl-});">
                        <img class="img" src="{-$values.url-}" alt="">
                    <if condition="$values.t_show == 1">
                        <div class="text">
                            <div class="fw">
                                <notempty name="values.title"><p class="t1" <notempty name="values.color">style="color: {-$values.color-};"</notempty>>{-$values.title-}</p></notempty>
                                <notempty name="values.s_title"><p class="t2" <notempty name="values.color">style="color: {-$values.color-};"</notempty>>{-$values.s_title-}</p></notempty>
                            </div>
                        </div>
                    </if>
                    </a>
                </li>
            </sql>
            <!--<li class="swiper-slide">
                <a href="" style="background-image: url(__PUBLIC__/assets/temp/banner.png);">
                    <img class="img" src="__PUBLIC__/assets/temp/banner.png" alt="">
                    <div class="text">
                        <div class="fw">
                            <p class="t1">通威 · 为了生活更美好</p>
                            <p class="t2">追求卓越 奉献社会 诚信正一</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="swiper-slide">
                <a href="" style="background-image: url(__PUBLIC__/assets/temp/banner02.png);">
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
                <a href="" style="background-image: url(__PUBLIC__/assets/temp/banner03.png);">
                    <img class="img" src="__PUBLIC__/assets/temp/banner03.png" alt="">
                    <div class="text">
                        <div class="fw">
                            <p class="t1" style="color: #fff;">绿水青山就是金山银山</p>
                        </div>
                    </div>
                </a>
            </li>-->
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
        <section class="section1">
            <div class="fw">
                <div class="common-title">
                    <span class="title">热点新闻</span>
                </div>
                <div class="hotnews">
                    <ul class="swiper-wrapper">
                        <content limit="3" type="list" where="FIND_IN_SET('f',attr)" cid="15" field="id,title,title_short,title_hot,style,save_time,url,thumbnail">
                        <li class="swiper-slide">
                            <a href="{-$values.url-}">
                                <span class="type">推荐</span>
                                <p class="tt">{-$values.title-}</p>
                            </a>
                        </li>
                        </content>
                    </ul>
                </div>
                <div class="swiper-btns">
                    <a class="prevbtn" href="javascript:;"></a>
                    <a class="nextbtn" href="javascript:;"></a>
                </div>
            </div>
        </section>
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
                                    <div class="imgbg" style="background-image: url({-:thumb($pic_ulr,827,845,true)-});"></div>
                                    <img class="img" src="{-:thumb($pic_ulr,827,845,true)-}" alt="{-$values.title-}">
                                    <div class="text">
                                        <div class="title">
                                            <p>{-$titles[0]-}</p>
                                            <p>{-$titles[1]-}</p>
                                        </div>
                                        <div class="dates">
                                            <span>{-:date('Y-m-d',$values['save_time'])-}</span>
                                            <span>集团要闻</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                                <?php $noids[]=$values['id']; ?>
                            </content>
                        </ul>
                        <div class="swiper-pages-btns">
                            <a class="btn prev" href="javascript:;"><img src="__PUBLIC__/assets/images/prev3.png" alt=""></a>
                            <div class="swiper-pagination"></div>
                            <a class="btn next" href="javascript:;"><img src="__PUBLIC__/assets/images/next3.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="tabs-wrap">
                        <div class="tabs">
                            <a class="on" href="javascript:;">集团新闻</a>
                            <a href="javascript:;">媒体聚焦</a>
                            <a href="http://rm.tongwei.com/index">通威融媒</a>
                        </div>
                        <a class="more-jt" href="#"><img src="__PUBLIC__/assets/images/jt2.png" alt=""></a>
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
                    </div>
                    <!-- 专区链接 -->
                    <div class="person-area" style="background-image: url(__PUBLIC__/assets/temp/1.png);">
                        <a href="/special/1.html">
                        <div class="common-title white">
                            <span class="title">刘汉元主席专区</span>
                        </div>
                        </a>
                        <a class="brief" href="/special/1.html">让大家在不远的未来能够常常看到青山绿水白云蓝天</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- 集团产业 -->
        <section class="section3">
            <div class="fw">
                <div class="topinfo" aos="fade-up">
                    <div class="common-title">
                        <span class="title">集团产业</span>
                    </div>
                    <div class="brief">以农业、光伏新能源为主业,形成了“农业+光伏”资源整合、协同发展的经营模式，在农业领域和新能源领域,为人们提供一流的产品和服务</div>
                    <a class="more-jt" href="/agri/index.html"><img src="__PUBLIC__/assets/images/jt2.png" alt=""></a>
                </div>
                <div class="cywrap" style="background-image: url(__PUBLIC__/assets/temp/cy1.png);">
                    <div class="cyinfo-wrap" aos="fade-up">
                        <div class="box show">
                            <div class="cy-infos">
                                <p class="num">01.</p>
                                <div class="tw">
                                    <p class="tt">饲料生产</p>
                                    <a class="more-jt" href="/agri/index.html"><img src="__PUBLIC__/assets/images/jt1.png" alt=""></a>
                                </div>
                                <div class="wrap">
                                    <div class="text">
                                        经过30多年的科技研发、养殖试验和市场实践并经广大用户认可，通威饲料已形成独有的健康指数品质特色，包括原料指数、营养指数、成长指数、抗病指数、耐运输指数，已代表了当今我国水产饲料的领先标准和水平。公司现拥有200多个饲料品种，满足并适合于不同的养殖条件和养殖需求。此外，在特种水产饲料、猪料、禽料、复合预混料等专精饲料产品方面，通威也稳居行业前列。
                                    </div>
                                    <div class="types">
                                        <span>强化原料控制</span>
                                        <span>优化产品结构</span>
                                        <span>生产过程把关</span>
                                        <span>精确检测品质</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="cy-infos">
                                <p class="num">02.</p>
                                <div class="tw">
                                    <p class="tt">绿色养殖</p>
                                    <a class="more-jt" href="/breeds/index.html"><img src="__PUBLIC__/assets/images/jt1.png" alt=""></a>
                                </div>
                                <div class="wrap">
                                    <div class="text">
                                        通威智能系统集成化养殖模式应用无线传输技术、传感器技术、软件开发技术，集成一批物联网设备，实现水质监控、环境监控、水质调节、精准化投喂与生物生长状态科学调控与自动化管理，并在此基础上开展智能养殖应用示范，构建水产养殖全过程数字化、科学化、标准化、规范化、精细化、远程化、自动化、智能化、环保化的现代水产养殖模式，建立并不断完善现代水产养殖信息化体系。
                                    </div>
                                    <div class="types">
                                        <span>科学规划</span>
                                        <span>营养提升</span>
                                        <span>智能监测</span>
                                        <span>全程服务</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="cy-infos">
                                <p class="num">03.</p>
                                <div class="tw">
                                    <p class="tt">食品加工</p>
                                    <a class="more-jt" href="/foods/index.html"><img src="__PUBLIC__/assets/images/jt1.png" alt=""></a>
                                </div>
                                <div class="wrap">
                                    <div class="text">
                                        通威食品是通威股份重点打造的食品品牌，旗下涵盖成都通威鱼、通威宴、成都春源食品、成都新太丰农业、通威(成都)水产、通威水产、通威三联水产、通威三文鱼、通威(海南)水产、全农惠等多家大型现代食品加工企业，涉足畜禽、水产两大食品领域，致力于为消费者提供健康安全的优质食品。
                                    </div>
                                    <div class="types">
                                        <span>春源冷鲜⾁</span>
                                        <span>新太丰鲜禽</span>
                                        <span>通威鱼</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="cy-infos">
                                <p class="num">04.</p>
                                <div class="tw">
                                    <p class="tt">高纯晶硅</p>
                                    <a class="more-jt" href="/energy/index.html"><img src="__PUBLIC__/assets/images/jt1.png" alt=""></a>
                                </div>
                                <div class="wrap">
                                    <div class="text">
                                        在新能源主业方面，通威已成为拥有上游高纯晶硅生产、中游高效太阳能电池片生产、到终端光伏电站建设与运营的垂直一体化光伏企业，形成了完整的拥有自主知识产权的光伏新能源产业链条，并已成为中国乃至全球光伏新能源产业发展的重要参与者和主要推动力量。
                                    </div>
                                    <div class="types types2">
                                        <div class="item">
                                            <p class="t0">99.999999999%</p>
                                            <p>⾼纯晶硅产品纯度</p>
                                        </div>
                                        <div class="item">
                                            <p class="t0">180000吨</p>
                                            <p>⾼纯晶硅年产能</p>
                                        </div>
                                        <div class="item">
                                            <p class="t0">NO.1</p>
                                            <p>产量位居全球第⼀</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="cy-infos">
                                <p class="num">05.</p>
                                <div class="tw">
                                    <p class="tt">太阳能电池</p>
                                    <a class="more-jt" href="/solarcell/index.html"><img src="__PUBLIC__/assets/images/jt1.png" alt=""></a>
                                </div>
                                <div class="wrap">
                                    <div class="text">
                                        目前,通威太阳能电池总产能达35GW,连续5年成为全球电池行业产能规模最大、出货量最大、盈利最多、成本最低、开工率最高、建设速度最快的“六个最”企业。2023年,通威太阳能电池产能规模将达到80-100GW,进-步夯实在光伏电池片环节的全球龙头地位。
                                    </div>
                                    <div class="types">
                                        <span>引领光伏行业</span>
                                        <span>5G应用基地</span>
                                        <span>自主创新</span>
                                        <span>标准引领</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="cy-infos">
                                <p class="num">06.</p>
                                <div class="tw">
                                    <p class="tt">渔光一体</p>
                                    <a class="more-jt" href="/yuguang/index.html"><img src="__PUBLIC__/assets/images/jt1.png" alt=""></a>
                                </div>
                                <div class="wrap">
                                    <div class="text">
                                        通威将光伏发电与现代渔业有机融合，于全球率先创造“渔光一体”发展模式。目前，通威正在全国各地推广和建立“渔光一体”基地，优质而清洁的光伏电力正源源不断地惠及千家万户。作为中国乃至全球同时涉足农业和新能源光伏产业的龙头企业，通威真正实现了农业和光伏高效协同发展，并将最终成为全球领先的绿色农业和绿色能源供应商。
                                    </div>
                                    <div class="types">
                                        <span>发电效益</span>
                                        <span>养殖效益</span>
                                        <span>环境效益</span>
                                        <span>社会效益</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="cy-infos">
                                <p class="num">07.</p>
                                <div class="tw">
                                    <p class="tt">其他产业</p>
                                    <a class="more-jt" href="/diversified/index.html"><img src="__PUBLIC__/assets/images/jt1.png" alt=""></a>
                                </div>
                                <div class="wrap">
                                    <div class="text">
                                        在深耕农业与新能源产业的同时，通威集团秉承“相关、适度多元”发展原则，积极拓展宠物食品、建筑与房地产、物业管理、文化传媒等相关产业，不断夯实集团整体实力，全力支撑双主业稳健快速发展。
                                    </div>
                                    <div class="types">
                                        <span>好主人宠物食品</span>
                                        <span>通威地产</span>
                                        <span>通宇物业</span>
                                        <span>通威商管</span>
                                        <span>通威传媒</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cylist-swiper" aos="fade-up">
                        <ul class="swiper-wrapper">
                            <li class="swiper-slide active" data-img="__PUBLIC__/assets/temp/cy1.png">
                                <div class="icon"><img src="__PUBLIC__/assets/images/icons/icon1.png" alt=""></div>
                                <p class="tt">饲料生产</p>
                            </li>
                            <li class="swiper-slide" data-img="__PUBLIC__/assets/temp/cy2.png">
                                <div class="icon"><img src="__PUBLIC__/assets/images/icons/icon2.png" alt=""></div>
                                <p class="tt">绿色养殖</p>
                            </li>
                            <li class="swiper-slide" data-img="__PUBLIC__/assets/temp/cy3.png">
                                <div class="icon"><img src="__PUBLIC__/assets/images/icons/icon3.png" alt=""></div>
                                <p class="tt">食品加工</p>
                            </li>
                            <li class="swiper-slide" data-img="__PUBLIC__/assets/temp/cy4.png">
                                <div class="icon"><img src="__PUBLIC__/assets/images/icons/icon4.png" alt=""></div>
                                <p class="tt">高纯晶硅</p>
                            </li>
                            <li class="swiper-slide" data-img="__PUBLIC__/assets/temp/cy5.png">
                                <div class="icon"><img src="__PUBLIC__/assets/images/icons/icon5.png" alt=""></div>
                                <p class="tt">太阳能电池</p>
                            </li>
                            <li class="swiper-slide" data-img="__PUBLIC__/assets/temp/cy6.png">
                                <div class="icon"><img src="__PUBLIC__/assets/images/icons/icon6.png" alt=""></div>
                                <p class="tt">渔光一体</p>
                            </li>
                            <li class="swiper-slide" data-img="__PUBLIC__/assets/temp/cy7.png">
                                <div class="icon"><img src="__PUBLIC__/assets/images/icons/icon7.png" alt=""></div>
                                <p class="tt">其他产业</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- 可持续发展 -->
        <section class="section4">
            <div class="fw">
                <div class="topwrap" aos="fade-up">
                    <div class="common-title">
                        <span class="title">可持续发展</span>
                    </div>
                    <div class="fatabs">
                        <a class="on" href="javascript:;">绿色运营</a>
                        <a href="javascript:;">绿色食品</a>
                        <a href="javascript:;">绿色能源</a>
                        <a href="javascript:;">绿色梦想</a>
                    </div>
                </div>
                <div class="fatabs-wrap" aos="fade-up">
                    <div class="box open">
                        <div class="whitebox">
                            <div class="leftcon">
                                <p class="tt1">绿色运营</p>
                                <div class="brief">
                                    通威集团是深耕绿色农业和绿色能源产业,快速发展的大型跨国集团公司,现拥有遍布全国各地及海外地区的300余家分、子公司,员工近5万人。目前,通威已打造出水产饲料、高纯晶硅、高效电池三大全球龙头,在新能源产业方面,已成为拥有从上游高纯晶硅生产、中游高效太阳能电池片生产,到终端光伏电站建设与运营的垂直一体化光伏企业,成为全球能源革命的主要参与者和重要推动力量之一。
                                </div>
                                <div class="totaldata mtb">
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
                                <p class="tt2">贡献SDGS</p>
                                <div class="sdgs"><a href=""><img src="__PUBLIC__/assets/images/icons/yy.png" alt=""></a></div>
                                <a class="more-jt" href="/operator/index.html"><img src="__PUBLIC__/assets/images/jt2.png" alt=""></a>
                            </div>
                            <div class="bgimg" style="background-image: url(__PUBLIC__/assets/images/about.png);"></div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="whitebox">
                            <div class="leftcon">
                                <p class="tt1">绿色食品</p>
                                <ul class="numlist">
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
                                <p class="tt2">贡献SDGS</p>
                                <div class="sdgs"><img src="__PUBLIC__/assets/images/icons/sp.png" alt=""></div>
                                <a class="more-jt" href="/foodstuff/index.html"><img src="__PUBLIC__/assets/images/jt2.png" alt=""></a>
                            </div>
                            <div class="bgimg" style="background-image: url(__PUBLIC__/assets/images/about2.png);"></div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="whitebox">
                            <div class="leftcon">
                                <p class="tt1">绿色能源</p>
                                <ul class="numlist">
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
                                <div class="totaldata mtb">
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
                                <p class="tt2">贡献SDGS</p>
                                <div class="sdgs"><img src="__PUBLIC__/assets/images/icons/ny.png" alt=""></div>
                                <a class="more-jt" href="/energys/index.html"><img src="__PUBLIC__/assets/images/jt2.png" alt=""></a>
                            </div>
                            <div class="bgimg" style="background-image: url(__PUBLIC__/assets/images/about3.png);"></div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="whitebox">
                            <div class="leftcon">
                                <p class="tt1">绿色梦想</p>
                                <ul class="numlist">
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
                                <div class="totaldata fwrap mtb">
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
                                <p class="tt2">贡献SDGS</p>
                                <div class="sdgs"><img src="__PUBLIC__/assets/images/icons/mx.png" alt=""></div>
                                <a class="more-jt" href="/dream/index.html"><img src="__PUBLIC__/assets/images/jt2.png" alt=""></a>
                            </div>
                            <div class="bgimg" style="background-image: url(__PUBLIC__/assets/images/about4.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- footer  -->
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
                                <form action="/search" method="get">
                                <input type="text" name="q" id="ipts" placeholder="输入关键词，回车">
                                <a href="javascript:;" class="btn-search" onclick="searchs()"><img src="__PUBLIC__/assets/images/ss.png" alt=""></a>
                                <a href="javascript:;" class="btn-close"><img src="__PUBLIC__/assets/images/close.png" alt=""></a>
                                </form>
                            </div>
                        </div>
                        <div class="line"></div>
                        <!--<div class="item">
                            <a class="tt" href="/">首页</a>
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
                    <a href="">通威股份</a>
                    <a href="">永祥股份</a>
                    <a href="">通威太阳能</a>
                    <a href="">通威新能源</a>
                    <a href="">通威农牧</a>
                    <a href="">通宇物业</a>
                    <a href="">通威食品</a>
                    <a href="">通威鱼</a>
                    <a href="">好主人宠物食品</a>
                    <a href="">通威传媒</a>
                    <a href="">通威商管</a>
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

    <!-- JavaScript -->
    <script src="__PUBLIC__/assets/js/jquery.js"></script>
    <script src="__PUBLIC__/assets/js/aos.js"></script>
    <script src="__PUBLIC__/assets/js/swiper.js"></script>
    <script src="__PUBLIC__/assets/js/common.js"></script>
    <script>
        var bannerSwiper = new Swiper('.banner', {
            autoplay: {
                delay: 6000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
            },
            loop:true,
            pagination: {
                el: '.banner .swiper-pagination',
                clickable: true,
            }
        });
        // 热点新闻轮播
        var hotnewsSwiper = new Swiper('.hotnews', {
            direction: 'vertical',
            autoplay: {
                delay: 2000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
            },
            speed: 800,
            navigation: {
                nextEl: '.section1 .nextbtn',
                prevEl: '.section1 .prevbtn',
                disabledClass: 'disabled',
            },
        })
        // 大图新闻轮播
        var leftnewsSwiper = new Swiper('.leftnews', {
            autoplay: {
                delay: 4000,
                stopOnLastSlide: false,
                disableOnInteraction: false,
            },
            speed: 500,
            loop:true,
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
</body>

</html>