<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="php">
    <php>$navigate = $NAV['22'];$thispid==$NAV['22']['pid'];</php>
</block>
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="page_banner">
    <div class="backwrap mt100">
        <div class="fw2">
            <a class="backbtn" href="javascript:history.back(-1);">返回</a>
        </div>
    </div>
</block>
<block name="main">
    <div class="mainbox pb50">
        <div class="pt30">
            <div class="fw2 zaiti-flex">
                <!-- 大屏分类显示 -->
                <div class="leftmenu">
                    <?php /*var_dump($navigate); */?>
                    <volist name="papers" id="r">
                    <a <if condition="$r['id'] eq $pid"> class="active"</if> href="{-$r['url']-}">{-$r.title-}</a>
                    </volist>
                </div>
                <!-- 小屏上分类展示  -->
                <div class="zaiti-mennu-swiper">
                    <ul class="swiper-wrapper">
                        <volist name="papers" id="r">
                            <php>$rid=$r['id'];</php>
                        <li class="swiper-slide <if condition='$rid eq $pid'> active</if>">
                            <a href="{-$r['url']-}">{-$r.title-}</a>
                        </li>
                        </volist>
                    </ul>
                </div>
                <!-- 内容 -->
                <div class="zaiti-right">
                    <div class="yearwrap">
                        <a class="nextbtn" href="javascript:;"></a>
                        <div class="year-swiper">
                            <?php
                            $t=array();
                            if($maxtime && $mintime){
                                for($i=date('Y',$maxtime);$i>=date('Y',$mintime);$i--){
                                    $t[] = $i;
                                }
                            }
                            ?>
                            <ul class="swiper-wrapper">
                                <volist name="t" id="r">
                                    <li class="swiper-slide <if condition='$r eq $year'> active</if>"><a class="year-list <if condition='$r eq $year'> active</if>" href="?year={-$r-}">{-$r-}年</a></li>
                                </volist>
                            </ul>
                        </div>
                    </div>
                    <ul class="zaiti-list w3">
                        <volist name="paperList" id="values">
                        <li aos="fade-up">
                            <a href="{-$values['url']-}">
                                <div class="pic"><img src="{-$values.thumbnail-}" alt=""></div>
                                <p class="tt">{-$paper.title-} &nbsp;{-$values.title-}</p>
                            </a>
                        </li>
                        </volist>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</block>