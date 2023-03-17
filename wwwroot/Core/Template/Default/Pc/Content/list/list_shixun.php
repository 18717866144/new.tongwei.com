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
        <div class="aboutbox pt30">
            <div class="fw2">
                <!--<p class="intitle">{-$navigate['navigate_name']-}</p>-->
                <div class="shixu-wrap">
                    <div class="left">
                        <content type="page" cid="{$cid}" cache="false" limit="7" field="id,cid,title,save_time,style,click,url,description,thumbnail,video">
                            <if condition="$key eq 0">
                        <a class="bignews" href="javascript:;">

                            <div class="pic">
                                <!-- <div class="bgimg" style="background-image: url(temp/n0.png);"></div> -->
                                <!-- <img class="img" src="temp/n0.png" alt=""> -->

                                <video id="video" src="{-$values.video-}" controls width="100%" height="100%"
                                       poster="{-$values.thumbnail-}"></video>
                            </div>
                            <div class="tt" id="vtitle">{-$values.a_title-}</div>

                        </a>
                            </if>
                        </content>
                    </div>
                    <div class="right">
                        <ul class="sxlist">
                            <content type="page" cid="{$cid}" cache="false" limit="7" field="id,cid,title,save_time,style,click,url,description,thumbnail,video" start="1">
                                <if condition="$key gt 0">
                                <li>
                                    <a href="javascript:;" data-src="{-$values.video-}" data-title="{-$values.a_title-}">
                                        <div class="pic">
                                            <div class="bgimg" style="background-image: url({-$values.thumbnail-});"></div>
                                        </div>
                                        <div class="con">
                                            <p class="tt">{-$values.a_title-}</p>
                                        </div>
                                    </a>
                                </li>
                                </if>
                            </content>
                        </ul>
                    </div>
                </div>
                <div class="page-pt">
                    {-$page-}
                </div>
            </div>
        </div>
    </div>
</block>
