<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/basespecial2022.php" />
<block name="title"><title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$special['title']-}"></block>
<block name="description"><meta name="description" content="{-$special['description']-}"></block>

<block name="main">
    <div class="special-three" style="background-image: linear-gradient(#097ec3,#a9c6d7,#dfe5e9,#edf0f2,#f2f3f3,#f7f7f6, #fafafa);">
        <div class="w1200">
            <div class="head"><img src="__PUBLIC__/assets/ztimg/head3.png" alt=""></div>
            <!--<div class="smenuwrap">
                <div class="menus">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide active first">
                            <a href="javascript:;">首页</a>
                        </li>
                        <li class="swiper-slide" data-index="1">
                            <a href="javascript:;">最新动态</a>
                        </li>
                        <li class="swiper-slide" data-index="2">
                            <a href="javascript:;">两会报道</a>
                        </li>
                        <li class="swiper-slide" data-index="3">
                            <a href="javascript:;">视频专访</a>
                        </li>
                        <li class="swiper-slide" data-index="4">
                            <a href="javascript:;">观点语录</a>
                        </li>
                    </ul>
                </div>
            </div>-->
            <div class="whitebox">
                <div class="three-title topage1">
                    <div class="title">
                        <img src="__PUBLIC__/assets/ztimg/icon1.png" alt="">
                        <span>最新动态</span>
                    </div>
                    <a class="more" href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>1))-}">更多</a>
                </div>
                <div class="three-topnews">
                    <sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 1">
                    <a href="{-$values['url']-}">
                        <div class="pic">
                            <div class="bgimg">
                                <img src="{-$values['thumbnail']|thumb=###,342,224,1-}" alt=""></div>
                        </div>
                        <div class="con">
                            <div class="ww">
                                <div class="tt">{-$values.title-}</div>
                                <div class="desc">
                                    {-:msubstr($values['description'],0,220)-}</div>
                            </div>
                            <p class="tt2">更多</p>
                        </div>
                    </a>
                    </sql>
                </div>
                <ul class="three-list">
                    <sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 4">
                        <if condition="$key gt 0">
                        <li>
                            <a href="{-$values.url-}">
                                <div class="pic"><img src="{-$values['thumbnail']|thumb=###,342,224,1-}" alt="{-$values.title-}"></div>
                                <div class="tt">
                                    <p>{-$values['title_short']?$values['title_short']:$values['title']-}</p>
                                </div>
                            </a>
                        </li>
                        </if>
                    </sql>
                </ul>
            </div>
            <div class="whitebox">
                <div class="book-wrap">
                    <a class="prev btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/prev.png" alt=""></a>
                    <a class="next btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/next.png" alt=""></a>
                    <div class="book-swiper">
                        <ul class="swiper-wrapper">
                            <li class="swiper-slide">
                                <div class="pic"><img src="__PUBLIC__/assets/ztimg/230x330-1.jpg" alt=""></div>
                                <div class="con">
                                    <div class="yin1"><img src="__PUBLIC__/assets/ztimg/yin1.png" alt=""></div>
                                    <div class="yin2"><img src="__PUBLIC__/assets/ztimg/yin2.png" alt=""></div>
                                    <p class="t1">创变者逻辑</p>
                                    <p class="t2">刘汉元管理思想及通威模式嬗变</p>
                                    <div class="desc">
                                        以全国人大代表、全国工商联副主席、通威集团董事局主席刘汉元的企业经营思想形成过程为线索，对全球重要水产饲料企业和全球光伏新能源龙头企业通威集团成功发展的深层次逻辑，进行了系统研究和案例剖析，总结了刘主席的思想及方法论体系，具有广泛的启发意义和借鉴价值。
                                    </div>
                                    <a class="bookmore" href="/uploadfile/创变者逻辑.pdf">
                                        <span>查看</span>
                                        <img src="__PUBLIC__/assets/ztimg/jt4.png" alt="">
                                    </a>
                                </div>
                            </li>
                            <li class="swiper-slide">
                                <div class="pic"><img src="__PUBLIC__/assets/ztimg/230x330-2.jpg" alt=""></div>
                                <div class="con">
                                    <div class="yin1"><img src="__PUBLIC__/assets/ztimg/yin1.png" alt=""></div>
                                    <div class="yin2"><img src="__PUBLIC__/assets/ztimg/yin2.png" alt=""></div>
                                    <p class="t1">重大格局2</p>
                                    <p class="t2">能源革命：中国引领世界</p>
                                    <div class="desc">
                                        本书通过对全球能源问题展开从微观到宏观，从理论到实践，从过去、现在到未来发展的全面讨论，展示出一个全新的能源与人类社会发展的大画面，揭示了人类社会发展的根本原动力是能源与能源革命这一主题。
                                    </div>
                                    <a class="bookmore" href="/uploadfile/重构大格局.pdf" >
                                        <span>查看</span>
                                        <img src="__PUBLIC__/assets/ztimg/jt4.png" alt="">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="whitebox">
                <div class="three-bottom">
                    <div class="left">
                        <div class="three-title mb0 topage2">
                            <div class="title">
                                <img src="__PUBLIC__/assets/ztimg/icon2.png" alt="">
                                <span>历届全国</span>
                                <img class="timg" src="__PUBLIC__/assets/ztimg/te.png" alt="">
                            </div>
                            <a class="more" href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>2))-}">更多</a>
                        </div>
                        <div class="three-timg"><img src="__PUBLIC__/assets/ztimg/te.png" alt=""></div>
                        <div class="zttwo-media f16">
                            <ul class="swiper-wrapper">
                                <sql sql="select * from h_special_content where FIND_IN_SET('h',attr) and a_status=1 and typeid=2 and specialid={$specialid} order by id desc,sort desc limit 5">
                                <li class="swiper-slide">
                                    <a href="{-$values['url']-}" target="_blank">
                                        <div class="pic"><img src="{-$values['thumbnail']|thumb=###,736,390,1-}" alt=""></div>
                                        <p class="tt f16">{-$values.title-}</p>
                                    </a>
                                </li>
                                </sql>
                            </ul>
                            <a class="prev btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/prev.png" alt=""></a>
                            <a class="next btn" href="javascript:;"><img src="__PUBLIC__/assets/ztimg/next.png" alt=""></a>
                        </div>
                        <ul class="zttwo-newslist blue mb40">
                            <sql sql="select * from h_special_content where FIND_IN_SET('j',attr) and a_status=1 and typeid=2 and specialid={$specialid} order by id desc,sort desc limit 9">
                            <li>
                                <a href="{-$values['url']-}" target="_blank">
                                    <p class="tt">{-$values.title-}</p>
                                </a>
                            </li>
                            </sql>
                        </ul>
                        <div class="three-title mb0 topage3">
                            <div class="title">
                                <img src="__PUBLIC__/assets/ztimg/icon2.png" alt="">
                                <span>视频专访</span>
                            </div>
                            <a class="more" href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>3))-}">更多</a>
                        </div>
                        <div class="zttwo-video autoh mb10">
                            <ul class="swiper-wrapper">
                                <sql sql="select * from h_special_content where a_status=1 and typeid=3 and specialid={$specialid} order by save_time desc,sort desc limit 2">
                                <li class="swiper-slide">
                                    <a href="{-$values.url-}">
                                        <div class="pic">
                                            <img class="img" src="{-$values.thumbnail|thumb=###,370,240,true-}" alt="{-$values.title-}">
                                        </div>
                                        <div class="tt">{-$values.title-}</div>
                                    </a>
                                </li>
                                </sql>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <div class="three-title topage4">
                            <div class="title">
                                <img src="__PUBLIC__/assets/ztimg/icon3.png" alt="">
                                <span>观点语录</span>
                            </div>
                            <a class="more" href="{-:U('modules/special/lists',array('specialid'=>$specialid, 'typeid'=>4))-}">更多</a>
                        </div>
                        <ul class="yulu-list">
                            <sql sql="select * from h_special_content where a_status=1 and typeid=4 and specialid={$specialid} order by sort desc,id desc limit 4">
                            <li>
                                <div class="tt">
                                    {-$values.content|strip_tags-}
                                </div>
                                <div class="ts">{-$values.description-}</div>
                            </li>
                            </sql>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</block>