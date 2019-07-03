<table width=100% style="border:1px solid #AAA;">
	<tr>
		<td bgcolor="#e1eaff" style="border:1px solid #AAA;height:20px;padding:5px;">
			<h2><a href="/newmeet_1">Новые анкеты свингеров</a></h2>
		</td>
	</tr>
<tr>
	<td style="padding-top: 10px; padding-bottom: 10px;">
<table border="0" width="100%">
<tr>
<?php
$sql = "SELECT login, regdate, photo_visibility, id, pic1,gender, city, birthday
		FROM users WHERE pic1 <> 'net-avatara.jpg'
		AND `status` = 1 ".(!isset($myrow['id'])?'AND photo_visibility = 0 ':''). '
		ORDER BY id DESC LIMIT 0,8';
$result_anketi_list = db()->query($sql);
while ($row_anketi_list = $result_anketi_list->fetch()) {
	if (($row_anketi_list['photo_visibility']!=1) || ($myrow['real_status' ]==1)) {
		$avanewank= '/avatars/user_thumb/' .rawurlencode($row_anketi_list['pic1']);
	} else {
		$avanewank= '/avatars/net-dostupa.jpg';
	}
	$city = !isset($myrow['city']) ? $row_anketi_list['city'] : (mb_strtolower($myrow['city']) != mb_strtolower($row_anketi_list['city'])) ? $row_anketi_list['city']:"<b style='color:blue'>".$row_anketi_list['city']."</b>";
?>
	<td width="100" height="100"  align="center" valign="top">
		<a href="<?=isset($myrow['id'])?'id'.$row_anketi_list['id']:'#showimagemsg';?>">
			<div class="border-box" style="background: url(<?=$avanewank;?>) no-repeat center;width:70px;height:70px;margin:2px;padding:0;"></div>
		</a>
		<img src="/img/newred.gif" width="34" height="15" alt="new">
		<br>
		<strong><?=\App\Arrays\Genders::$gender[$row_anketi_list['gender']];?><br><?= crutchDate($row_anketi_list['birthday'])->getHumansShort();?></strong>
		<br>
		<?=$city;?>
	</td>
<?php }?>
</tr>
</table>
</td></tr>
</table>