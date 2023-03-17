<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<style type="text/css">
.u_m tr td,.u_m tr th {text-align:left;padding:10px 0px 10px 10px;border-bottom:1px solid #EFEFEF;}
.u_m tr td {padding:20px 0px 20px 10px;}
.left {border-right:1px solid #EFEFEF;}
.s1 {width:400px;padding:5px;height:260px;}
.u_s {height:260px;}
.u_s tr td {padding:0px;}
.createAction {text-align:center;margin-top:30px;}
</style>
<form action="<?php echo U('index_create_html')?>" method="post">
<div class="createAction"><input type="text" value="index.html" name="index_name" style="height: 26px;line-height:26px;" size="20" />&nbsp;&nbsp;<input type="submit" class="sub" value="开始更新" /></div>
</form>
<include file="./Core/App/Tpl/global_footer.php" />