<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/basespecial2022.php" />
<block name="title"><title>{-$special['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$special['title']-}"></block>
<block name="description"><meta name="description" content="{-$special['description']-}"></block>

<block name="main">
    <div class="special-three">
        <div class="w1200">
            <div class="head"><img src="__PUBLIC__/assets/ztimg/head3.png" alt=""></div>
            <div class="smenuwrap">
                <div class="menus">
                    <ul class="swiper-wrapper">
                        <style>
                            .menus li.active a{display: block;border-bottom: 3px solid #004EA2;}
                        </style>
                        <li class="swiper-slide first">
                            <a href="{-$special['url']-}">{-$special['title']-}</a>
                        </li>
                        <volist name="type" id="v">
                        <li class="swiper-slide <if condition="$v['typeid'] eq $typeid">active</if>" data-index="{-$key+1-}}">
                            <a href="{-:U('modules/special/lists',array('specialid'=>$specialid,'typeid'=>$v['typeid']))-}">{-$v['name']-}</a>
                        </li>
                        </volist>
                    </ul>
                </div>
            </div>
            <div class="whitebox pd50">
                <div class="three-title">
                    <if condition="$typeid eq 1">
                    <div class="title">
                        <img src="__PUBLIC__/assets/ztimg/icon1.png" alt="">
                        <span>最新动态</span>
                        <!--<img class="timg" src="__PUBLIC__/assets/ztimg/te.png" alt="">-->
                    </div>
                    </if>
                    <if condition="$typeid eq 2">
                        <div class="title">
                            <img src="__PUBLIC__/assets/ztimg/icon1.png" alt="">
                            <span>两会报道</span>
                            <img class="timg" src="__PUBLIC__/assets/ztimg/te.png" alt="">
                        </div>
                    </if>
                    <if condition="$typeid eq 3">
                        <div class="title">
                            <img src="__PUBLIC__/assets/ztimg/icon2.png" alt="">
                            <span>视频专访</span>
                           <!-- <img class="timg" src="__PUBLIC__/assets/ztimg/te.png" alt="">-->
                        </div>
                    </if>
                </div>
                <div class="three-timg"><img src="__PUBLIC__/assets/ztimg/te.png" alt=""></div>
                <ul class="ztone-newslist three">
                    <volist name="list" id="values">
                    <li>
                        <a href="{-$values['url']-}">
                            <p class="tt">{-$values.title-}</p>
                            <div class="desc">{-:msubstr(trim($values['description'],'　'),0,350)-}
                            </div>
                            <p class="date">{-:date('Y-m-d',$values['save_time'])-}</p>
                        </a>
                    </li>
                    </volist>
                </ul>
                <div class="page-pt">
                    {-$pages-}
                </div>
            </div>
        </div>
        <<!--div class="foot">
            <div class="w1200">
                通威集团 All Rights Reserved. <a href="">蜀ICP备14018337号</a>
            </div>
        </div>-->
    </div>
</block>