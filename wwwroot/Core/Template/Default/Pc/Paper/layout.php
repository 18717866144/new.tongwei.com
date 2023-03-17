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
                        <a href="{-$r['url']-}" target="_blank" <if condition="$r['id'] eq $pid"> class="active"</if> >{-$r.title-}</a>
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
                <div class="zaiti-right ml">
                    <div class="zaiti-title">
                        <php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>
                        <p class="title">{-$paper.title-}> {-$paperList.title-}> {-$layout.layout_number-}：{-$layout.layout_title-}</p>
                        <div class="date-wrap">
                            <a class="datebtn" href="javascript:;"><span>分期查看</span> <img src="__PUBLIC__/assets/images/date.png" alt=""></a>
                            <div class="date-showbox">
                                <div class="inyears">
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
                                        <li class="swiper-slide yearcl <if condition='$r eq $year'> active</if>" data-year="{-$r-}">{-$r-}年</li>
                                        </volist>
                                    </ul>
                                </div>
                                <div class="yearcon" id="paperListContent-c">
                                    <volist name="layoutlist" id="vo">
                                    <a href="{-$vo.url-}">{-$vo.title-}</a>
                                    </volist>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="zaiti-detail">
                        <div class="left">
                            <php>
                                $zoom = 0.7;
                                $content = json_decode($layout['content'],true);
                            </php>
                            <img src="{-$layout.thumbnail-}" alt="{-$paper.title-}{-$paperList.title-}"  style="position: relative; z-index: 9" usemap="#paperPic">
                        </div>
                        <div class="right">
                            <p class="title">要闻版</p>
                            <ul class="sjlist mb50">
                                <volist name="content" id="vo">
                                    <php>
                                        $mapInfo =explode(',', $vo['areaMapInfo']);
                                        $width = $mapInfo[2] - $mapInfo[0];
                                        $height = $mapInfo[3] - $mapInfo[1];
                                        $left = $mapInfo[0];
                                        $top = $mapInfo[1];
                                        $width = $width * $zoom;
                                        $height = $height * $zoom;
                                        $left = $left * $zoom;
                                        $top = $top * $zoom;
                                    </php>
                                    <a class="positionBg" rel="{-$key-}" href="{-$vo.areaLink-}" title="{-$vo.areaTitle-}" style="width:{-$width-}px;height:{-$height-}px;left:{-$left-}px;top:{-$top-}px"></a>
                                </volist>
                                <volist name="content" id="vo">
                                <li><a href="{-$vo.areaLink-}">{-$vo.areaTitle-}</a></li>
                                </volist>
                            </ul>
                            <p class="title">本期版面导航</p>
                            <ul class="sjlist mb50">
                                <volist name="layouts" id="vo">
                                <li><a href="{-$vo.url-}">{-$vo.layout_number-}：{-$vo.layout_title-}</a></li>
                                </volist>
                            </ul>
                            <div class="btns">
                                <a href="{-$prev.url-}">上一版</a>
                                <a href="{-$next.url-}">下一版</a>
                            </div>
                            <style>
                                .btns a:hover{color: white;background: #0054a3;}
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</block>