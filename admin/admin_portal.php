<?php
include_once("../include/config.php");
$c = 1;
// Admin
$admin_sql = $sql->prepare("SELECT * FROM MHCMember.dbo.chr_log_info WHERE id_loginid = :p1 AND id_passwd = :p2");
$admin_sql->BindParam(":p1",$_SESSION['adminid']);
$admin_sql->BindParam(":p2",$_SESSION['adminpw']);
$admin_sql->execute();
$admin = $admin_sql->fetch(PDO::FETCH_ASSOC);

$admin_user = $admin['id_loginid'];
if(empty($_SESSION['adminid']))
{
	$api->go("login.php");
}
?>