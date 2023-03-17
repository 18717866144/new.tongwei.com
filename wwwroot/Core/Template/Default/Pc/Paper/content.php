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
    <div class="zaiti-infos">
        <div class="left clearfix">
            <div class="cons fr">
                <p class="title">{-$paper.title-} {-$paperList.title-}</p>
                <p class="tt">{-$layout.layout_number-}：{-$layout.layout_title-}</p>
                <div class="imgs">
                    <img src="{-$layout.thumbnail-}" alt="">
                </div>
                <div class="btns">
                    <a href="{-$prev.url-}">上一版</a>
                    <a href="{-$next.url-}">下一版</a>
                </div>
                <style>
                    .btns a:hover{color: white;background: #0054a3;}
                </style>
            </div>
        </div>
        <div class="right">
            <div class="wrap">
                <h3 class="title">{-$currentData['title_content']?$currentData['title_content']:$currentData['title']-}</h3>
                <notempty name="currentData.title_bottom"><p class="subtitle">{-$currentData['title_bottom']-}</p></notempty>
                <div class="date">
                    <span>{-:date('Y年m月d日',$currentData['save_time'])-}</span>
                    <notempty name="currentData['source']"><span>来源：<notempty name="currentData['sourceurl']"><a href="{-$currentData['sourceurl']-}" target="_blank">{-$currentData['source']-}</a><else/>{-$currentData['source']-}</notempty></span></notempty>
                </div>
                <div class="details">
                    {-$currentData.content-}
                </div>
            </div>
        </div>
    </div>
</block>