<?php if (!defined('HX_CMS')) exit();?>	

        <div class="left_nav">
		
		<php>$thispid = $navigate['pid']>0 ? $navigate['pid'] : $navigate['id'];</php>
		   <a href="{-$NAV[$thispid]['url']-}" class="top-link">
		    <div class="nav_tit">{-$NAV[$thispid]['navigate_name']-}</div>
		   </a>

		    <ul>
        <navigate type="all">
		<if condition="$thispid eq $values['id']">
		<volist name="values['child']" id="v">		   
		     <a href="{-$v['url']-}">
			   <li class="<if condition="$v['id'] eq $navigate['id']">active</if>">· {-$v['navigate_name']-}</li>
		     </a>
         </volist>		
		 
		 </if> 
		 </navigate>
			</ul>		
		</div>
	
	