<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>
<block name="head"></block>
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
    <div class="mainbox pb30">
        <include file="./Core/Template/Default/Pc/side.php"/>
            <?php
            $id=$navigate['id'];
            switch($id){

                case 1:
                case 2: echo '<include file=\'./Core/Template/Default/Pc/commons/intro.php\' />' ;break;
                case 3: echo '<include file=\'./Core/Template/Default/Pc/commons/chairman.php\' />' ;break;
                case 43: echo '<include file=\'./Core/Template/Default/Pc/commons/leadcare.php\' />' ;break;
                case 4: echo '<include file=\'./Core/Template/Default/Pc/commons/develop.php\' />' ;break;
                case 5: echo '<include file="./Core/Template/Default/Pc/commons/honor.php" />' ;break;
                case 6: echo '<include file=\'./Core/Template/Default/Pc/commons/publics.php\' />' ;break;
                case 30: echo '<include file=\'./Core/Template/Default/Pc/commons/members.php\' />' ;break;

                case 7:
                case 8: echo '<include file=\'./Core/Template/Default/Pc/commons/agri.php\' />' ;break;
                case 9: echo '<include file=\'./Core/Template/Default/Pc/commons/guangfu.php\' />' ;break;
                case 10: echo '<include file=\'./Core/Template/Default/Pc/commons/yuguang.php\' />' ;break;
                case 42: echo '<include file=\'./Core/Template/Default/Pc/commons/solarcell.php\' />' ;break;
                case 11: echo '<include file=\'./Core/Template/Default/Pc/commons/breeds.php\' />' ;break;
                case 12: echo '<include file=\'./Core/Template/Default/Pc/commons/foods.php\' />' ;break;
                case 13: echo '<include file=\'./Core/Template/Default/Pc/commons/diversified.php\' />' ;break;

                case 19:
                case 20: echo '<include file=\'./Core/Template/Default/Pc/commons/wenhualinian.php\' />' ;break;
                case 48: echo '<include file=\'./Core/Template/Default/Pc/commons/partys.php\' />' ;break;
                case 21: echo '<include file=\'./Core/Template/Default/Pc/commons/wenhuahuodong.php\' />' ;break;
                case 31: echo '<include file=\'./Core/Template/Default/Pc/commons/pinpai.php\' />' ;break;

                case 25:
                case 26: echo '<include file=\'./Core/Template/Default/Pc/commons/zhaopin.php\' />' ;break;
                case 27: echo '<include file=\'./Core/Template/Default/Pc/commons/hrpeiyang.php\' />' ;break;
                case 32: echo '<include file=\'./Core/Template/Default/Pc/commons/hrlinian.php\' />' ;break;
                case 34: echo '<include file=\'./Core/Template/Default/Pc/commons/twschool.php\' />' ;break;
                case 51: echo '<include file=\'./Core/Template/Default/Pc/commons/supervision.php\' />' ;break;

                case 36:
                case 44: echo '<include file=\'./Core/Template/Default/Pc/commons/systems.php\' />' ;break;//科研体系
                case 45: echo '<include file=\'./Core/Template/Default/Pc/commons/patents.php\' />' ;break; //发明专利
                case 46: echo '<include file=\'./Core/Template/Default/Pc/commons/achievement.php\' />' ;break; //科研成果
                case 47: echo '<include file=\'./Core/Template/Default/Pc/commons/cooperation.php\' />' ;break; //产学研合作

                case 37:
                case 38: echo '<include file=\'./Core/Template/Default/Pc/commons/operator.php\' />' ;break;
                case 39: echo '<include file=\'./Core/Template/Default/Pc/commons/foodstuff.php\' />' ;break;
                case 40: echo '<include file=\'./Core/Template/Default/Pc/commons/energys.php\' />' ;break;
                case 41: echo '<include file=\'./Core/Template/Default/Pc/commons/dream.php\' />' ;break;


            }


            ?>
    </div>
</block>