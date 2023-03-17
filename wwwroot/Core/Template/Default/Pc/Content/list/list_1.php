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
                <ul class="news-center-list">
                    <content type="page" cid="{$cid}" order="save_time desc" cache="false" limit="10" field="id,cid,title,save_time,style,click,url,description,thumbnail">

                        <?php
                        if(!$values['thumbnail']){
                            $cmodel = new Model();
                            $sql="select * from h_article_data where aid =".$values['id'];
                            $con=$cmodel->query($sql);
                            //提取内容中的图片
                            $pattern ="/<img.*?src=[\”|\’]?(.*?)[\”|\’]?\s.*?>/i";
                            $content=$con[0]["content"];
                            $a=preg_match_all($pattern,$content,$match);
                            $imgSrcArr=[];
                            if (isset($match[0])){
                                foreach ($match[0] as $key => $imgTag){

                                    //进一步提取 img标签中的 src属性信息
                                    $pattern_src = "/src=.*[gif|jpg|jpeg|png]\"/i";
                                    preg_match_all($pattern_src,$imgTag,$matchSrc);
                                    if (isset($matchSrc[0])){
                                        foreach ($matchSrc[0] as $src){
                                            //将匹配到的src信息压入数组
                                            $src=str_replace('src="','',$src);
                                            $src=str_replace('"','',$src);
                                            $imgSrcArr[] = $src;
                                        }
                                    }
                                }
                            }
                            $values['thumbnail']=$imgSrcArr[0];
                        }
                        ?>
                    <li aos="fade-up">
                        <a href="{-$values['url']-}">
                            <div class="pic">
                                <div class="img">
                                    <img src="<notempty name='values.thumbnail'>{-$values.thumbnail-}<else/>__PUBLIC__/assets/images/default.png</notempty>" alt="" height="100%" width="100%">
                                </div>
                            </div>
                            <div class="con">
                                <div class="ntop">
                                    <p class="tt">{-$values.a_title-}</p>
                                    <div class="desc">{-:trim($values['description'],'　')-}
                                    </div>
                                </div>
                                <p class="date">{-:date('Y-m-d',$values['save_time'])-} {-$values['save_time']-}</p>
                            </div>
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