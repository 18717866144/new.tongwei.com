<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="php">
    <php>$navigate = $NAV['22'];$thispid==$NAV['22']['pid'];</php>
</block>
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="page_banner">
    <div class="subbanner mt100" style="background-image: url(__PUBLIC__/assets/images/sub<?php echo $navigate['pid'];?>.png);">
        <div class="text">
            <div class="fw">
                <?php $parid=$navigate['pid']; ?>
                <p class="t1">{-$NAV[$parid]['navigate_name']-}</p>
                <p class="t2">{-$NAV[$parid]['keywords']-}</p>
                <div class="state">
                    <php>
                        $titles =explode('==',$NAV[$parid]['synopsis']);
                    </php>
                    <p>{-$titles[0]-}</p>
                    <p>{-$titles[1]-}</p>
                </div>
            </div>
        </div>
    </div>
</block>
<block name="main">
    <div id="mainContent" >
        <div class="mainbox pb30">
            <include file="./Core/Template/Default/Pc/side.php"/>
            <div class="pt20">
                <div class="fw2">
                    <!--<p class="intitle" aos="fade-up">{-$navigate['navigate_name']-}</p>-->
                    <ul class="zaiti-list">
                        <php>$m=0;</php>
                        <volist name="paper" id="r">
                            <php>$thumbnail = $r['thumbnail'];</php>
                        <li aos="fade-up">
                            <a href="{-$r['url']-}">
                                <div class="pic"><img src="{-$thumbnail-}" alt=""></div>
                                <p class="tt">{-$r.title-}</p>
                            </a>
                        </li>
                            <php>$m++;</php>
                        </volist>

                    </ul>
                    <!--<div class="page-pt">
                        <div class="pages">
                            <a class="btn" href="javascript:;"><img src="images/prev.png" alt=""></a>
                            <a class="item active" href="javascript:;">1</a>
                            <a class="item" href="javascript:;">2</a>
                            <a class="item" href="javascript:;">3</a>
                            <a class="item" href="javascript:;">4</a>
                            <a class="btn" href="javascript:;"><img src="images/next.png" alt=""></a>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</block>