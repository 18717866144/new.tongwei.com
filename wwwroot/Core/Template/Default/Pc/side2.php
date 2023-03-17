<?php if (!defined('HX_CMS')) exit(); ?>
<div class="menuwrap">
    <php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>
    <div class="fw2">
        <div class="menuswiper">
            <ul class="swiper-wrapper">
                <navigate type="all" where="id=`37`">
                    <if condition="$thispid eq $values['id']">
                        <volist name="values['child']" id="v">
                            <li class="swiper-slide <if condition=" $v['id'] eq $navigate['id']">active</if>">
                                <a href="{-$v['url']-}">{-$v['navigate_name']-}</a>
                            </li>
                    </volist>
                    </if>
                </navigate>
            </ul>
        </div>
    </div>
</div>