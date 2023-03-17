<extend name="./Core/Template/Default/Pc/Special/extend/2016ec/2016ec.php" />
<block name="main">
<div class="wrap clearfix">
    <div class="hdjj">
        <div class="zw_bt">活动简介<span>Activity profile</span></div>
        <div class="zw_hdjj">根据通威发〔2016〕10号文件精神，为配合“讲用活动”开展，展现通威人风采，推动文化落地，实现“融合、变革、创新”，通威集团隆重举办2016年度企业文化征文大赛。本次征文大赛围绕“我为通威建言”、“通威文化正能量”、“一个合格的通威人”、“感受‘诚、信、正、一’”等主题展开，全体员工均可积极投稿参与。针对大赛获奖者，集团给予丰厚的奖励。其中，一等奖10名，奖励奖杯、奖状、2000元现金或等值奖品；二等奖20名，奖励奖状、1000元现金或等值奖品；三等奖30名，奖励奖状、500元现金或等值奖品；优秀奖50名，奖励奖状、300元现金或等值奖品。同时，比赛中的优秀征文，将在集团官网、《通威报》等开设专栏进行展示，并由总部整理、编撰后，收录进2016年度集团《企业文化故事集》。</div>
    </div>
    <div class="time"></div>
</div>
<div class="show clearfix">
    <div class="zw_bt">作品展示<span>SHOWCASE</span></div>
    <div class="show_li">
        <ul>
            <sql sql="select * from h_special_content where a_status=1 and typeid=1 and specialid={$specialid} order by sort desc,id desc limit 200">
			<php>$class=$key%2==0?'':' class="libg"';</php>
            <li{-$class-}><div class="author"><em>{-$values['source']-}</em><span>{-$values['author']-}</span></div><i>{-$i-}</i><a href="{-$values['url']-}">{-$values['title']-}</a></li>
            </sql>
        </ul>
    </div>
</div>
<div style="text-align: center; line-height: 30px; padding: 20px 0px;"><a href="{-:U('modules/special/lists',array('specialid'=>$specialid,'typeid'=>1,'p'=>2))-}" style="background: #004AA6; padding: 10px 50px; line-height: 30px; color:#FFF; font-size: 14px;">查看更多</a></div>
</block>