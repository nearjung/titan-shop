<?php
session_start();
include_once("include/config.php");

if(!empty($_SESSION['account']))
{
	$api->go("index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: เข้าสู่ระบบ ::</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<link href="style/animate.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon"> 
</head>

<body>
<table width="100%">
  <tr>
    <td height="339">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><div class="animated fadeIn"><table width="900" class="login_tbl">
      <tr>
        <td align="center"><form name="logedin" action="" method="post">
          <p>
          <h2>ลืมรหัสผ่าน</h2></p>
          <table width="500" align="center">
          <tr>
            <td align="center"><label for="account"></label>
              <input name="account" type="text" class="txt01" id="account" autocomplete="off" placeholder="ชื่อบัญชี" /></td>
            </tr>
          <tr>
            <td align="center"><label for="email"></label>
              <input name="email" type="email" class="txt01" id="email" autocomplete="off" placeholder="อีเมล" /></td>
            </tr>
          <tr>
            <td align="center"><label for="pin"></label>
              <input name="pin" type="text" class="txt01" id="pin" maxlength="4" autocomplete="off" placeholder="รหัสลับ 4 หลัก" /></td>
          </tr>
          <tr>
            <td align="center"><input name="getpass" type="submit" class="bt_login" id="getpass" value="กู้รหัสผ่าน" /></td>
            </tr>
          <tr>
            <td align="center">
            <?php
			if($_POST['getpass'])
			{
			// Check Account Information
			$acc_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebAccInfo :p1");
			$acc_sql->BindParam(":p1",$_POST['account']);
			$acc_sql->execute();
			$acc = $acc_sql->fetch(PDO::FETCH_ASSOC);
			
			if(empty($_POST['email']) || empty($_POST['pin']) || empty($_POST['account']))
			{
				$api->popup("กรุณากรอกข้อมูลให้ครบทุกช่อง");
			}
			else if($acc['id_loginid'] != $_POST['account'])
			{
				$api->popup("ไม่พบชื่อบัญชีนี้ค่ะ");
			}
			else if($acc['WebEmail'] != $_POST['email'])
			{
				$api->popup("ข้อมูลไม่ถูกต้องค่ะ");
			}
			else if($acc['WebKey'] != $_POST['pin'])
			{
				$api->popup("ข้อมูลไม่ถูกต้องค่ะ");
			}
			else
			{
				if($system['mail_system'] == 1)
				{
						$strTo = $_POST['email'];
						$strSubject = "=?utf-8?B?".base64_encode("ลืมรห้สผ่านเซิฟเวอร์ Titan ".$system['server_name']."")."?=";
						$header  = "MIME-Version: 1.0\r\n";
						$header .= "Content-type: text/html; charset=utf-8\r\n";
						$header .= "From: mailcache@gamesv-api.com\r\n";
						$header .= "Reply-To: ".$system['admin_email']."\r\n";
						$header .= "X-Mailer: PHP/picoHosting";
						$strVar = "My Message";
						$strMessage = "<p><img src='http://www.compgamer.com/home/wp-content/uploads/2011/01/TITAN_H1.jpg'></p>
<p>รหัสผ่านของท่านคือ : <strong>".$acc['id_passwd']."</strong></p>
<p>อีเมลฉบับนี้ถูกส่งจากระบบ Gamesv-API ซึ่งไม่ได้มีความเกี่ยวข้องใด ๆ กับเซิฟเวอร์นี้<br>
หากมีข้อสงสัยกรุณาติดต่อที่อีเมลของเซิฟเวอร์โดยตรง : ".$system['admin_email']."</p>
<p>&nbsp;</p>
<p>บริการรับทำเว็บ,เช่าเว็บ, ระบบเติมเงิน ฯลฯ ครบวงจร<br>
<a href='http://www.gaemsv-api.com' target='_blank'>www.gaemsv-api.com </a></p>";
					
						mail($strTo,$strSubject,$strMessage,$header);  // @ = No Show Error //
					$api->popup("ระบบได้ทำการส่งรหัสผ่านไปยัง E-mail ของท่านแล้วค่ะ");
				}
				else
				{
					echo '<div class="animated bounceIn">รหัสผ่านของท่านคือ : '.$acc['id_passwd'].'</div>';
				}
			}
			}
			?>
            </td>
          </tr>
          <tr>
            <td align="center"><a href="login.php">กลับไปหน้าล็อกอิน</a></td>
          </tr>
          </table>
          <p>&nbsp;</p>
        </form></td>
      </tr>
    </table></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><font color="#FFFFFF">บริการเช่าเว็บไซต์โดย <a style="color:#FFF;" href="https://www.facebook.com/gameserverapi/?fref=ts" target="_blank">Gamesv-api.com</a> ครบวงจรทุกเกมส์</font></td>
  </tr>
</table>
</body>
</html>