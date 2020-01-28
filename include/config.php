<?php
define("MSSQL_HOST","DESKTOP-GA1T7RN\ASDASDASD"); // MSSQL Host
define("MSSQL_USER","sa"); // MSSQL User
define("MSSQL_PASS","123"); // MSSQL Pass
define("MSSQL_DB","WebTitan"); // Account DB
define("MEMBER","mhcmember"); // Member DB
define("GAME","mhgame"); // Game DB

#==============ห้ามแก้ไขเด็ดขาด===============#
include_once("function.php");
$sql = new PDO("sqlsrv:server=".MSSQL_HOST."; Database=".MSSQL_DB."",MSSQL_USER,MSSQL_PASS);
$api = new API(true);
date_default_timezone_set('Asia/Bangkok');
$date = date("d/m/Y H:i:s");
#========================================#

$ip = $_SERVER['REMOTE_ADDR'];
// IP ของ TMPAY.NET ที่อนุญาติให้รับส่งข้อมูลบัตรเงินสด (ไม่ควรแก้ไข)
$access_ip = '203.146.127.112';
// URL ที่ได้ติดตั้งไฟล์ tmpay.php // ห้ามแก้ไข
$resp_url = 'http://127.0.0.1/include/topup.php'; 

ini_set('display_errors', '0');


$tmpay_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.tmpay_setup");
$tmpay_sql->execute();
$tmpay = $tmpay_sql->fetch(PDO::FETCH_ASSOC);

$merchant_id = $tmpay['merchant_id'];

$true_0 = 0;
$true_50 = $tmpay['true50'];
$true_90 = $tmpay['true90'];
$true_150 = $tmpay['true150'];
$true_300 = $tmpay['true300'];
$true_500 = $tmpay['true500'];
$true_1000 = $tmpay['true1000'];


//////////// โปรโมชั่นเติมเงิน /////////////
$promotion_enable = 1; // เปิดปิดระบบ

$itemid_50		= ''; // รหัสไอเทมราคา 50 บาท
$itemid_90		= ''; // รหัสไอเทมราคา 90 บาท
$itemid_150		= ''; // รหัสไอเทมราคา 150 บาท
$itemid_300		= ''; // รหัสไอเทมราคา 300 บาท
$itemid_500		= ''; // รหัสไอเทมราคา 500 บาท
$itemid_1000	= ''; // รหัสไอเทมราคา 1000 บาท

$itemcount_50		= ''; // จำนวนไอเทมราคา 50 บาท
$itemcount_90		= ''; // จำนวนไอเทมราคา 90 บาท
$itemcount_150		= ''; // จำนวนไอเทมราคา 150 บาท
$itemcount_300		= ''; // จำนวนไอเทมราคา 300 บาท
$itemcount_500		= ''; // จำนวนไอเทมราคา 500 บาท
$itemcount_1000		= ''; // จำนวนไอเทมราคา 1000 บาท

$itemtype_50		= ''; // จำนวนไอเทมราคา 50 บาท
$itemtype_90		= ''; // จำนวนไอเทมราคา 90 บาท
$itemtype_150		= ''; // จำนวนไอเทมราคา 150 บาท
$itemtype_300		= ''; // จำนวนไอเทมราคา 300 บาท
$itemtype_500		= ''; // จำนวนไอเทมราคา 500 บาท
$itemtype_1000		= ''; // จำนวนไอเทมราคา 1000 บาท


// Bonus
/*
$bonus_50 = 50;
$bonus_90 = 90;
$bonus_150 = 150;
$bonus_300 = 300;
$bonus_500 = 500;
$bonus_1000 = 1000;
*/


#============================== ห้ามแก้ทั้งหมดเลยข้างล่างนี้ =========================#
// System
$system_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.setting_tbl WHERE  id = :p1");
$system_sql->BindParam(":p1",$true_0);
$system_sql->execute();
$system = $system_sql->fetch(PDO::FETCH_ASSOC);

if($system['site_status'] == 0)
{
	$api->go("http://www.gamesv-api.com/error404.php");
}

if(!empty($_SESSION['account']))
{
	$member_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebAccInfo :p1");
	$member_sql->BindParam(":p1",$_SESSION['account']);
	$member_sql->execute();
	$member = $member_sql->fetch(PDO::FETCH_ASSOC);
	if(!$member)
	{
		$api->go("logout.php");
	}
	$account = $member['id_loginid'];
	$userid = $member['propid'];
	
	// Store Count
	$storec_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCountStore :p1");
	$storec_sql->BindParam(":p1",$account);
	$storec_sql->execute();
	$storec = $storec_sql->fetchColumn();
	
	
	$count_cart = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCountCart :p1");
	$count_cart->BindParam(":p1",$account);
	$count_cart->execute();
	$cnt_cart = $count_cart->fetchColumn();
}

?>