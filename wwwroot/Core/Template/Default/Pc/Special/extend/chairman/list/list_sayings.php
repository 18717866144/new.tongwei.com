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
                    <div class="title">
                        <img src="__PUBLIC__/assets/ztimg/icon3.png" alt="">
                        <span>观点语录</span>
                        <!--<img class="timg" src="__PUBLIC__/assets/ztimg/te.png" alt="">-->
                    </div>
                </div>
                <div class="three-timg"><img src="__PUBLIC__/assets/ztimg/te.png" alt=""></div>
                <ul class="yulu-list">
                    <volist name="list" id="values">
                        <li>
                            <div class="tt">
                                {-$values.content|strip_tags-}
                            </div>
                            <div class="ts">{-$values.description-}</div>
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