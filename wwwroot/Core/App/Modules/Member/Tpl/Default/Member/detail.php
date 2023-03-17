<?php if (!defined('HX_CMS')) exit();?>
<include file="./Core/App/Tpl/global_header.php" />
<include file="./Core/App/Tpl/global_rule_navi.php" />
<style type="text/css">
table {border-collapse:separate;background:#95AADB;width:98%;margin:0px auto;}
table tr td {background:#FFFFFF;padding:12px 0px;text-align:left;text-indent:10px;}
table tr td.explain {font-weight:800;width:12%;}
table tr td.value {width:21.333%;}
table.showTable tr td {text-align:center;text-indent:0px;border:0px;}
</style>

<table cellspacing="1">
	<tr>
		<td class="explain">用户名[username]：</td>
		<td class="value"><?php echo $mainData['username']?></td>
		<td class="explain">Email&nbsp;[email]：</td>
		<td class="value"><?php echo $mainData['email']?></td>
		<td class="explain">附加模型：</td>
		<td class="value"><?php echo $appendModel['model_name'].'/'.$mainData['append_model'];?></td>
	</tr>
	<tr>
		<td class="explain">会员状态：</td>
		<td class="value">
			<?php if ($mainData['m_status']==1 ) {
				echo '正常';
			} elseif ($mainData['m_status']==2) {
 				echo '禁用';
			} else {			
				echo '未验证';
			}
			?>
		</td>
		<td class="explain">验证状态：</td>
		<td class="value">无</td>
		<td class="explain">附加模型：</td>
		<td class="value"><?php echo $appendModel['model_name'];?></td>
	</tr>
	<tr>
		<td class="explain">会员头像：</td>
		<td class="value"><img src="__ROOT__/<?php echo $mainData['picture_path']?>/middle.jpg" alt="" /></td>
		<td class="explain">主页地址：</td>
		<td class="value"><a href="<?php echo $mainData['home_url'];?>" target="_blank"><?php echo $mainData['home_url'];?></a></td>
		<td class="explain">积分，金额，消费，余额：</td>
		<td class="value">积分：<?php echo $mainData['points'];?>&nbsp;&nbsp;金额：<?php echo $mainData['money'];?>&nbsp;&nbsp;消费：<?php echo $mainData['spent'];?>&nbsp;&nbsp;余额：<?php echo $mainData['money']-$mainData['spent'];?></td>
	</tr>
	<?php $IPL = new IpLocation();?>
	<tr>
		<td class="explain">注册时间：</td>
		<td class="value"><?php echo date('Y-m-d H:i:s',$mainData['register_time'])?></td>
		<td class="explain">登录时间：</td>
		<td class="value"><?php echo date('Y-m-d H:i:s',$mainData['login_time'])?></td>
		<td class="explain">注册IP：</td>
		<td class="value">
			<?php $ip = long2ip($mainData['register_ip']);echo $ip;?>/
			<?php $ip_location = $IPL->getlocation($ip);echo $ip_location['country'].'['.$ip_location['area'].']';?>
		</td>
	</tr>
	<tr>
		<td class="explain">登录IP：</td>
		<td class="value">
			<?php $ip = long2ip($mainData['login_ip']);echo $ip;?>/
			<?php $ip_location = $IPL->getlocation($ip);echo $ip_location['country'].'['.$ip_location['area'].']';?>
		</td>
		<td class="explain">登录次数：</td>
		<td class="value"><?php echo $mainData['login_num'];?></td>
		<td class="explain">默认皮肤：</td>
		<td class="value"><?php echo $appendData['skin'];?></td>
	</tr>
	<?php 
		$fields = array_keys($mainFields);
		$num = count($mainFields);
		for ($i=0;$i<$num;$i+=3) { ?>
		<tr>
			<td class="explain"><?php echo $mainFields[$fields[$i]]['nick_name']?>：</td>
			<td class="value"><?php echo is_numeric($mainData[$fields[$i]])&&strlen($mainData[$fields[$i]])>=10 ? date('Y-m-d H:i:s',$mainData[$fields[$i]]) : $mainData[$fields[$i]];?></td>
			<td class="explain"><?php echo $mainFields[$fields[$i+1]]['nick_name']?>：</td>
			<td class="value"><?php echo is_numeric($mainData[$fields[$i+1]])&&strlen($mainData[$fields[$i+1]])>=10 ? date('Y-m-d H:i:s',$mainData[$fields[$i+1]]) : $mainData[$fields[$i+1]];?></td>
			<td class="explain"><?php echo $mainFields[$fields[$i+2]]['nick_name']?>：</td>
			<td class="value"><?php echo is_numeric($mainData[$fields[$i+2]])&&strlen($mainData[$fields[$i+2]])>=10 ? date('Y-m-d H:i:s',$mainData[$fields[$i+2]]) : $mainData[$fields[$i+2]];?></td>
		</tr>
	<?php 
		}
	?>
	<?php 
		$fields = array_keys($appendFields);
		$num = count($appendFields);
		for ($i=0;$i<$num;$i+=3) { ?>
		<tr>
			<td class="explain"><?php echo $appendFields[$fields[$i]]['nick_name']?>：</td>
			<td class="value"><?php echo is_numeric($appendData[$fields[$i]])&&strlen($appendData[$fields[$i]])>=10 ? date('Y-m-d H:i:s',$appendData[$fields[$i]]) : $appendData[$fields[$i]];?></td>
			<td class="explain"><?php echo $appendFields[$fields[$i+1]]['nick_name']?>：</td>
			<td class="value"><?php echo is_numeric($appendData[$fields[$i+1]])&&strlen($appendData[$fields[$i+1]])>=10 ? date('Y-m-d H:i:s',$appendData[$fields[$i+1]]) : $appendData[$fields[$i+1]];?></td>
			<td class="explain"><?php echo $appendFields[$fields[$i+2]]['nick_name']?>：</td>
			<td class="value"><?php echo is_numeric($appendData[$fields[$i+2]])&&strlen($appendData[$fields[$i+2]])>=10 ? date('Y-m-d H:i:s',$appendData[$fields[$i+2]]) : $appendData[$fields[$i+2]];?></td>
		</tr>
	<?php 
		}
	?>
	<?php unset($IPL);?>
</table>
<include file="./Core/App/Tpl/global_footer.php" />