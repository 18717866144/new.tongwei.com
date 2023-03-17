<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"></block>
<block name="page_banner">
    <div class="subbanner mt100" style="background-image: url(__PUBLIC__/assets/images/sub33.png);">
        <div class="text">
            <div class="fw">
                <p class="t1">联系通威</p>
                <p class="t2">CONTACT TONGWEI</p>
                <div class="state">
                    <p>对通威产品、技术支持、合作等有任何问题，请与我们联系</p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</block>
<block name="main">
    <div class="mainbox">
        <div class="page-pt page-pb">
            <div class="fw2">
                <div class="intitle">联系通威</div>
                <div class="mapwrap">
                    <div class="map" id="ditu"></div>
                    <div class="infos">
                        <p style="background-image: url(__PUBLIC__/assets/images/addr.png);">总部地址： 中国·四川·成都·天府大道中段588号通威国际中心</p>
                        <p style="background-image: url(__PUBLIC__/assets/images/mail.png);">邮 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 编： 610093
                        </p>
                        <p style="background-image: url(__PUBLIC__/assets/images/tel.png);">电 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 话：
                            +86-28-8518 8888</p>
                        <p style="background-image: url(__PUBLIC__/assets/images/cz.png);">传 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 真： +86-28-8519
                            9999</p>
                    </div>
                </div>
                <div class="map-bottom">
                    <div class="tt">
                        <span>全国服务热线：</span>
                        <span class="tel">800-8866888</span>
                        <span class="ss">|</span>
                        <span class="tel">400-8080888</span>
                    </div>
                    <div class="erweima">
                        <img src="__PUBLIC__/assets/temp/code1.png" alt="">
                        <p class="er">关注通威</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</block>