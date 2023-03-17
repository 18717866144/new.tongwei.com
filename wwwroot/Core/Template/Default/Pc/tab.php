<?php if (!defined('HX_CMS')) exit(); ?>
<div class="menuwrap">
    <div class="fw2">
        <div class="menuswiper tc">
            <ul class="swiper-wrapper">
                <li class="swiper-slide <if condition=" $navigate['cate_name'] eq 'farming'">active</if>">
                    <a href="/agri/index.html">绿色农业</a>
                </li>
                <li class="swiper-slide <if condition=" $navigate['cate_name'] eq 'energy'">active</if>">
                    <a href="/energy/index.html">绿色能源</a>
                </li>
                <li class="swiper-slide <if condition=" $navigate['cate_name'] eq 'other'">active</if>">
                    <a href="/diversified/index.html">相关多元</a>
                </li>
            </ul>
        </div>
    </div>
    <php>$cid=$navigate['id'];</php>
</div>
<div class="pt30">
    <div class="fw2">
        <if condition=" $navigate['cate_name'] eq 'farming'">
        <div class="new-chanye-state">
            通威农牧产业以饲料工业为核心，不断延伸和完善水产及畜禽产业链条，打造集品种改良、研发、养殖技术研究和推广，以及食品加工、销售、品牌打造和服务为一体的安全、健康、可追溯的绿色农牧产业链。目前，以“通威鱼”为代表的通威食品品牌已经得到了终端消费者的充分认可，深受广大消费者青睐。未来，通威还将在打造“世界级健康安全食品供应商”的征程上阔步迈进！
        </div>
        <div class="new-chanye-tab">
            <a <if condition="$cid eq 8"> class="cur"</if> href="/agri/index.html">饲料生产</a>
            <a <if condition="$cid eq 11"> class="cur"</if> href="/breeds/index.html">绿色养殖</a>
            <a <if condition="$cid eq 12"> class="cur"</if> href="/foods/index.html">食品加工</a>
        </div>
        </if>
        <if condition=" $navigate['cate_name'] eq 'energy'">
            <div class="new-chanye-state">
                通威自2006年进军光伏新能源产业，历经10余年快速发展，已成为拥有从上游高纯晶硅生产，中游高效太阳能电池片及高效组件生产、到终端光伏电站建设与运营的垂直一体化光伏企业，形成了完整的拥有自主知识产权的光伏新能源产业链条，并已成为中国乃至全球光伏新能源产业发展的重要参与者和主要推动力量之一。
            </div>
            <div class="new-chanye-tab">
                <a <if condition="$cid eq 9"> class="cur"</if> href="/energy/index.html">高纯晶硅</a>
                <a <if condition="$cid eq 42"> class="cur"</if> href="/solarcell/index.html">太阳能电池</a>
                <a <if condition="$cid eq 52"> class="cur"</if> href="/module/index.html">高效组件</a>
                <a <if condition="$cid eq 10"> class="cur"</if> href="/yuguang/index.html">渔光一体</a>
            </div>
        </if>