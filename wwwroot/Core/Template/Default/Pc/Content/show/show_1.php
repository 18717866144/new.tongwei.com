<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
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
    <!-- 主体内容 -->
    <div class="mainbox pb100">
        <div class="fw2">
            <div class="newsdetail pt50">
                <h3 class="title">{-$currentData['title_content']?$currentData['title_content']:$currentData['title']-}</h3>
                <notempty name="currentData.title_bottom"><p class="subtitle">{-$currentData['title_bottom']-}</p></notempty>
                <div class="tags">
                    <span>{-:date('Y年m月d日',$currentData['save_time'])-}</span>
                    <span><notempty name="currentData['source']">来源：<notempty name="currentData['sourceurl']"><a href="{-$currentData['sourceurl']-}" target="_blank">{-$currentData['source']-}</a><else/>{-$currentData['source']-}</notempty></notempty></span>
                    <span><notempty name="currentData['author']">作者：{-$currentData['author']-}</notempty></span>
                </div>
                <div class="details">
                    {-$currentData.content-}
                </div>
                <div class="switch">
                    <a class="prev" href="{-$next['url']-}">{-$next['title']-}</a>
                    <a class="next" href="{-$prev['url']-}">{-$prev['title']-}</a>
                </div>
            </div>
        </div>
    </div>
</block>