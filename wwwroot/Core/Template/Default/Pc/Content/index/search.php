<?php defined('HX_CMS') or exit;?>
<extend name="./Core/Template/Default/Pc/base2022.php" />
<block name="title"><title>{-:empty($navigate['title']) ? $navigate['navigate_name'] : $navigate['title']-} - {-$Think.config.web_name-} - {-$Think.config.web_name_ext-}</title></block>
<block name="keywords"><meta name="keywords" content="{-$navigate.keywords-}"></block>
<block name="description"><meta name="description" content="{-$navigate.description-}"></block>

<block name="page_banner">
    <div class="subbanner mt100" style="background-image: url(__PUBLIC__/assets/images/sub14.png);">
        <div class="text">
            <div class="fw">
                <?php $parid=$navigate['pid']; ?>
                <p class="t1">新闻中心</p>
                <p class="t2">PRESS CENTER</p>
                <div class="state">
                    <p>通威官方发布的最新动态或消息，为您提供关于通威的第一手资讯</p>
                </div>
            </div>
        </div>
    </div>
</block>
<block name="main">
    <div class="mainbox pb100">
        <div class="aboutbox pt50">
            <div class="fw2">
                <p class="intitle" style="font-size: 16px;">内容搜索 找到 <span style="color:#be3234">{-$q-}</span> 相关内容共 <span style="color:#be3234"> {-$searchData[2]-}</span> 个</p>
                <notempty name="searchData[0]">
                <ul class="news-center-list">
                    <volist name="searchData[0]" id="values">
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
                                    <div class="img" style="background-image: url(<notempty name='values.thumbnail'>{-$values.thumbnail-}<else/>__PUBLIC__/assets/images/default.png</notempty>);"></div>
                                </div>
                                <div class="con">
                                    <div class="ntop">
                                        <p class="tt">{-:str_replace($q,'<span style="color:red">'.$q.'</span>',$values['title'])-}</p>
                                        <div class="desc">{-:trim($values['description'],'　')-}
                                        </div>
                                    </div>
                                    <p class="date">{-:date('Y-m-d',$values['save_time'])-}</p>
                                </div>
                            </a>
                        </li>
                    </volist>
                </ul>
                    <div class="page-pt">
                        {-$searchData[1]-}
                    </div>
                    <else />
                    <div style="width:300px;float:left;">
                        <p style="margin-bottom:0px;margin-top:20px;">抱歉，没有找到相关内容！</p>
                        <p>您可以更换或精简关键词再次搜索！</p>
                    </div>
                </notempty>

            </div>
        </div>
    </div>
</block>