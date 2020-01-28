<?php
session_start();
include_once("include/config.php");
include_once('securimage/securimage.php');
require 'PHPMailer/PHPMailerAutoload.php';

$securimage = new Securimage();

if(!empty($_SESSION['account']))
{
	$api->go("index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: สมัครสมาชิก ::</title>
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
        <td align="center"><form name="registerform" action="" method="post">
          <p>
          <h2>สมัครสมาชิก</h2></p>
          <table width="500">
            <tr>
              <td align="center"><label for="account"></label>
                <input name="account" type="text" class="txt01" id="account" autocomplete="off" placeholder="ชื่อบัญชี" /></td>
            </tr>
            <tr>
              <td align="center"><label for="pass1"></label>
                <input name="pass1" type="password" class="txt01" id="pass1" autocomplete="off" placeholder="รหัสผ่าน" /></td>
            </tr>
            <tr>
              <td align="center"><label for="pass2"></label>
                <input name="pass2" type="password" class="txt01" id="pass2" autocomplete="off" placeholder="ยืนยันรหัสผ่าน" /></td>
            </tr>
            <tr>
              <td align="center"><label for="gander"></label>
                <select class="selected_03" name="gander" id="gander">
                  <option value="0">กรุณาเลือกเพศ</option>
                  <option value="m">ชาย</option>
                  <option value="f">หญิง</option>
                </select></td>
            </tr>
            <tr>
              <td align="center"><label for="email"></label>
                <input name="email" type="email" class="txt01" id="email" autocomplete="off" placeholder="อีเมล" /></td>
            </tr>
            <tr>
              <td align="center"><label for="numkey"></label>
                <input name="numkey" type="text" class="txt01" id="numkey" placeholder="รหัสลับ 4 หลัก" autocomplete="off" maxlength="4" /></td>
            </tr>
            <tr>
              <td align="center"><a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false"><img src="securimage/securimage_show.php" alt="CAPTCHA Image" width="283" height="102" id="captcha" /></a></td>
            </tr>
            <tr>
              <td align="center"><label for="captcha_code"></label>
                <input name="captcha_code" type="text" class="txt01" id="captcha_code" autocomplete="off" placeholder="รหัสรักษาความปลอดภัย" /></td>
            </tr>
            <tr>
              <td align="center"><input name="register" type="submit" class="bt_login" id="register" value="ลงทะเบียสมาชิก" /></td>
            </tr>
            <tr>
              <td align="center"><a href="login.php">กลับไปหน้าล็อกอิน</a></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </form>
        <?php
		if($_POST['register'])
		{
			// ตรวจสอบบัญชี
			$chk_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebAccInfo :p1");
			$chk_sql->BindParam(":p1",$_POST['account']);
			$chk_sql->execute();
			$chk = $chk_sql->fetch(PDO::FETCH_ASSOC);
			if(empty($_POST['account']) || empty($_POST['pass1']) || empty($_POST['pass2']) || empty($_POST['email']) || empty($_POST['numkey']) || empty($_POST['gander']) || empty($_POST['captcha_code']))
			{
				$api->popup("กรุณากรอกข้อมูลให้ครบทุกช่องค่ะ");
			}
			else if($chk['id_loginid'] == $_POST['account'])
			{
				$api->popup("ชื่อบัญชี ".$_POST['account']." ถูกใช้แล้วค่ะ");
			}
			else if($_POST['pass1'] != $_POST['pass2'])
			{
				$api->popup("รหัสผ่านไม่ตรงกันค่ะ");
			}
			else if(!preg_match('/^[a-zA-Z0-9]+$/', $_POST['account']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['pass1']))
			{
				$api->popup("ชื่อบัญชีและรหัสผ่านจะต้องเป็นตัวอักษรภาษาอังกฤษหรือตัวเลขเท่านั้นค่ะ");
			}
			else if(!is_numeric($_POST['numkey']))
			{
				$api->popup("รหัสลับจะต้องเป็นตัวเลขเท่านั้นค่ะ");
			}
			else if($securimage->check($_POST['captcha_code']) == false)
			{
				$api->popup("รหัสรักษาความปลอดภัยไม่ถูกต้องค่ะ");
			}
			else
			{
				// Register
				$register = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebRegister :p1,:p2,:p3,:p4,:p5,:p6");
				$register->BindParam(":p1",$_POST['account']);
				$register->BindParam(":p2",$_POST['pass2']);
				$register->BindParam(":p3",$_POST['gander']);
				$register->BindParam(":p4",$_POST['email']);
				$register->BindParam(":p5",$_POST['numkey']);
				$register->BindParam(":p6",$ip);
				$register->execute();
				if(!$register)
				{
					$api->popup("เกิดข้อผิดพลาดขณะส่งข้อมูล");
				}
				else
				{
					$api->popup("การสมัครเสร็จสิ้น ยินดีต้อนรับ ".$_POST['account']." ค่ะ ขอให้สนุกกับการเล่นเกมส์นะค่ะ ~♥");
					if($system['mail_system'] == 1)
					{
						$strTo = $_POST['email'];
						$strSubject = "=?utf-8?B?".base64_encode("ยินดีต้อนรับเข้าสู่ Titan ".$system['server_name']."")."?=";
						$header  = "MIME-Version: 1.0\r\n";
						$header .= "Content-type: text/html; charset=utf-8\r\n";
						$header .= "From: mailcache@gamesv-api.com\r\n";
						$header .= "Reply-To: ".$system['admin_email']."\r\n";
						$header .= "X-Mailer: PHP/picoHosting";
						$strVar = "My Message";
						$strMessage = "<p><img src='http://www.compgamer.com/home/wp-content/uploads/2011/01/TITAN_H1.jpg'></p>
												<p>ยินดีต้อนรับเข้าสู่เซิฟเวอร์ : ".$system['server_name']."</p>
												<p>รายละเอียดบัญชี<br>
												  - ชือบัญชี : ".$_POST['account']."<br>
												  - รหัสผ่าน : ".$_POST['pass2']."<br>
												  - รหัสลับ : ".$_POST['numkey']."
												</p>
												<p>อีเมลฉบับนี้ถูกส่งจากระบบ Gamesv-API ซึ่งไม่ได้มีความเกี่ยวข้องใด ๆ กับเซิฟเวอร์นี้<br>
												หากมีข้อสงสัยกรุณาติดต่อที่อีเมลของเซิฟเวอร์โดยตรง : ".$system['admin_email']."</p>
												<p>&nbsp;</p>
												<p>บริการรับทำเว็บ,เช่าเว็บ, ระบบเติมเงิน ฯลฯ ครบวงจร<br>
												<a href='http://www.gaemsv-api.com' target='_blank'>www.gaemsv-api.com </a></p>";
					
						mail($strTo,$strSubject,$strMessage,$header);  // @ = No Show Error //
							
					}
					$api->go("index.php");
				}
			}
		}
		?>
        </td>
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
<p>&nbsp;</p>
</body>
</html>