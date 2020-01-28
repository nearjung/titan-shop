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

<body><div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<table width="100%">
  <tr>
    <td height="339">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><div class="animated fadeIn"><table width="900" class="login_tbl">
      <tr>
        <td align="center"><form name="logedin" action="" method="post">
          <p><h2>เข้าสู่ระบบ</h2></p>
          <table width="500" align="center">
          <tr>
            <td align="center"><label for="account"></label>
              <input name="account" type="text" class="txt01" id="account" autocomplete="off" placeholder="ชื่อบัญชี" /></td>
            </tr>
          <tr>
            <td align="center"><label for="password"></label>
              <input name="password" type="password" class="txt01" id="password" autocomplete="off" placeholder="รหัสผ่าน" /></td>
            </tr>
          <tr>
            <td align="center"><input name="login" type="submit" class="bt_login" id="login" value="เข้าสู่ระบบ" /></td>
            </tr>
          <tr>
            <td align="center"><a href="forgetpass.php">ลืมรหัสผ่าน</a> | <a href="register.php">สมัครสมาชิก</a></td>
          </tr>
          </table>
          <p>&nbsp;</p>
        </form>
        <?php
		if($_POST['login'])
		{
			if(empty($_POST['account']) || empty($_POST['password']))
			{
				$api->popup("ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง");
			}
			else
			{
				$api->login($_POST['account'],$_POST['password']);
			}
		}
		?>
        </td>
      </tr>
    </table></div></td>
  </tr>
  <tr>
    <td align="center"><br />
    <div class="fb-page" data-href="https://www.facebook.com/gameserverapi/" data-tabs="timeline,messages" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/gameserverapi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/gameserverapi/">Game Server API</a></blockquote></div><br /></td>
  </tr>
  <tr>
    <td align="center"><font color="#FFFFFF">บริการเช่าเว็บไซต์โดย <a style="color:#FFF;" href="https://www.facebook.com/gameserverapi/?fref=ts" target="_blank">Gamesv-api.com</a> ครบวงจรทุกเกมส์</font></td>
  </tr>
</table>
</body>
</html>