<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"></block>
<block name="page_banner">
    <div class="subbanner mt100" style="background-image: url(__PUBLIC__/assets/images/sub37.png);">
        <div class="text">
            <div class="fw">
                <p class="t1">可持续发展</p>
                <p class="t2">{-$NAV[$parid]['synopsis']-}</p>
                <div class="state">
                    <p>发端于水产、成长于农牧、跨越于新能源 通威始终坚守实体经济，</p>
                    <p>践行实业报国 不忘初心，持续演绎绿色发展梦想</p>
                </div>
            </div>
        </div>
    </div>
</block>
<block name="main">
    <div class="mainbox pb30">
        <div class="menuwrap">
            <div class="fw2">
                <div class="menuswiper">
                    <php>$thispid = $navigate['id'];</php>
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide <if condition='$thispid == 38'> active </if>">
                            <a href="/operator/index.html">绿色运营</a>
                        </li>
                        <li class="swiper-slide <if condition='$thispid == 39'> active </if>">
                            <a href="/foodstuff/index.html">绿色食品</a>
                        </li>
                        <li class="swiper-slide <if condition='$thispid == 40'> active </if>">
                            <a href="/energys/index.html">绿色能源</a>
                        </li>
                        <li class="swiper-slide <if condition='$thispid == 41'> active </if>">
                            <a href="/dream/index.html">绿色梦想</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <?php
            $id=$navigate['id'];
            switch($id){
                case 37:
                case 38: echo '<include file=\'./Core/Template/Default/Pc/commons/operator.php\' />' ;break;
                case 39: echo '<include file=\'./Core/Template/Default/Pc/commons/foodstuff.php\' />' ;break;
                case 40: echo '<include file=\'./Core/Template/Default/Pc/commons/energys.php\' />' ;break;
                case 41: echo '<include file=\'./Core/Template/Default/Pc/commons/dream.php\' />' ;break;

            }


            ?>
    </div>
</block>