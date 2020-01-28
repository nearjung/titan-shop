<?php
session_start();
include_once("admin_portal.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบ Admin Panel</title>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link href="../style/animate.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" height="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" align="center" valign="top" bgcolor="#150000"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="left_menu">
      <tr>
        <td height="39" align="center"><h3>ยินดีต้อนรับ <?php echo $admin_user; ?></h3></td>
      </tr>
      <tr>
        <td><a href="admin.php?page=1"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="14%" height="31"></td>
            <td width="86%">จัดการบัญชี</td>
          </tr>
        </table></a>
          <a href="admin.php?page=2"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มบัญชี</td>
            </tr>
          </table></a>
          <a href="admin.php?page=13"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มพ้อยเข้าไอดี</td>
            </tr>
          </table></a>
          <a href="admin.php?page=3">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขประเภทไอเทมมอล</td>
            </tr>
          </table>
          </a>
          <a href="admin.php?page=4"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มประเภทไอเทมมอล</td>
            </tr>
          </table></a>
          <a href="admin.php?page=5">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขไอเทมมอล</td>
            </tr>
          </table>
          </a><a href="admin.php?page=6">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มไอเทมมอล</td>
            </tr>
          </table></a>
          <a href="admin.php?page=7">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">ตั้งค่าจุติ</td>
            </tr>
          </table>
          </a><a href="admin.php?page=8">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">ตั้งค่าระบบเว็บไซต์</td>
            </tr>
          </table></a>
          <a href="admin.php?page=9">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขกล่องสุ่มไอเทม</td>
            </tr>
          </table>
          </a><a href="admin.php?page=10">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขไอเทมกล่องสุ่มไอเทม</td>
            </tr>
          </table></a>
          <a href="admin.php?page=11">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มไอเทมกล่องสุ่มไอเทม</td>
            </tr>
          </table>
          </a><a href="admin.php?page=12">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เช็คประวัติการเติมเงิน</td>
            </tr>
          </table></a>
          <a href="../logout.php">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">ออกจากระบบ</td>
            </tr>
          </table>
          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="85%" align="center" valign="top"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>ยินดีต้อนรับ</p></td>
  </tr>
</table>
</body>
</html>