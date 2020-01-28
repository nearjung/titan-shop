<?php
include_once("include/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<table width="100%">
  <tr>
    <td align="right"> สถานะเซิฟเวอร์ : </td>
    <td><?php
    $online = @fsockopen($sv_ip, $sv_port, $errno, $errstr, 1);
    if($online >= 1) { 
        echo '<font color="#009900"><strong>Online</strong></font>';
    }
    else {
    echo '<font color="#FF0000">Offline</font>';
    } 
?></td>
  </tr>
  <tr>
    <td align="right">
จำนวนตัวละครทั้งหมด :</td>
    <td><?php
    $count_sql = $sql->prepare("SELECT COUNT(*) FROM mhgame.dbo.TB_CHARACTER");
	$count_sql->execute();
	$count = $count_sql->fetchColumn();
	echo $count;
	?></td>
  </tr>
  <tr>
    <td align="right">จำนวนไอดีทั้งหมด :</td>
    <td><?php
    $count_sql = $sql->prepare("SELECT COUNT(*) FROM MHCMember.dbo.chr_log_info");
	$count_sql->execute();
	$count = $count_sql->fetchColumn();
	echo $count;
	?></td>
  </tr>
  <tr>
    <td align="right">จำนวนผู้เล่นออนไลน์ : </td>
    <td><?php
    $count_sql = $sql->prepare("SELECT COUNT(*) FROM MHCMember.dbo.LoginTable");
	$count_sql->execute();
	$count = $count_sql->fetchColumn();
	echo $count;
	?></td>
  </tr>
</table>
</body>
</html>