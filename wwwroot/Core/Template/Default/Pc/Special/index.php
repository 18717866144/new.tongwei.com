<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="php">
    <php>$navigate = $NAV['17'];$thispid==$NAV['17']['pid'];</php>
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
    <div class="mainbox pb50">
        <include file="./Core/Template/Default/Pc/side.php"/>
        <div class="aboutbox pt30">
            <div class="fw2">
                <!--<p class="intitle">{-$navigate['navigate_name']-}</p>-->
                <ul class="special-list">
                    <sql type="page" table="h_special" limit="10" where="l_status=1 and is_show=0">
                        <li aos="fade-up">
                            <a href="{-$values['url']-}" target="_blank">
                                <div class="pic"><img src="{-$values['thumb']-}" alt=""></div>
                                <p class="tt">{-$values.title-}</p>
                            </a>
                        </li>
                    </sql>
                </ul>
                <div class="page-pt">
                    {-$page-}
                </div>
            </div>
        </div>
    </div>
</div>
</block>