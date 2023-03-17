<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
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

    <div class="mainbox pb50">
        <include file="./Core/Template/Default/Pc/side.php"/>
        <div class="pt30">
            <div class="fw2">
                <!--<p class="intitle" aos="fade-up">{-$navigate['navigate_name']-}</p>-->
                <ul class="video-list">
                    <content type="page" cid="{$cid}" cache="false" limit="6" field="id,cid,title,save_time,style,click,url,description,thumbnail,video" start="1">
                    <li aos="fade-up">
                        <a href="javascript:;" data-src="{-$values.video-}">
                            <div class="pic"><img src="{-$values.thumbnail-}" alt=""></div>
                            <p class="tt">{-$values.a_title-}</p>
                        </a>
                    </li>
                    </content>
                </ul>
                <div class="page-pt">
                    {-$page-}
                </div>
            </div>
        </div>
    </div>
</block>
