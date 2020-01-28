<?php
session_start();
include_once("include/config.php");

if(empty($_SESSION['account']))
{
	$api->go("login.php");
}

// Get Shop
$shop_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetShopCatalog :p1");
$shop_sql->BindParam(":p1",$_GET['id']);
$shop_sql->execute();
$shop = $shop_sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: TITAN Darkstory Online Member ::</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<link href="style/animate.css" rel="stylesheet" type="text/css" />
<link href="style/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="style/hover.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon"> 

<link rel="stylesheet" href="css/le-frog/jquery-ui-1.10.4.custom.min.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
</head>

<body>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="367" height="360">&nbsp;</td>
    <td width="721">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><table border="0" cellpadding="0" cellspacing="0" class="bg-menuleft">
      <tr>
        <td class="bg-menutop">&nbsp;</td>
      </tr>
      <tr>
        <td class="bg-menucen"><table class="left_box" width="100%">
          <tr>
            <td width="15%">&nbsp;</td>
            <td width="68%" align="center"><div class="titlemenu">ยินดีต้อนรับ : <?php echo $_SESSION['account']; ?></div>
              <a href="member.php">
                <input type="button" class="bt_profile" value="โปรไฟล์ส่วนตัว" />
                </a> &nbsp; <a href="logout.php">
                  <input type="button" class="bt_logout" value="ออกจากระบบ" />
                </a></td>
            <td width="17%">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><table width="250" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="90" align="center" background="images/sv_box.png"><h2>เซิฟเวอร์ : <?php echo $system['server_name']; ?></h2></td>
              </tr>
            </table></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="31">&nbsp;</td>
            <td><strong>จำนวน Cash  : <?php echo number_format($member['MallMoney']); ?> <img src="images/coin.png" width="21" height="15" /></strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center"><div class="titlemenu">ระบบจัดการบัญชี</div></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><a href="page.php?a=topup" style="text-decoration:none; color:#FFF;">
              <table width="100%" class="left_btt">
                <tr>
                  <td height="26">&nbsp;• เติมเงิน</td>
                </tr>
              </table>
              </a>
              <?php
			  if($system['promotion_mode'] == 2)
			  {
				  echo '
              <a href="promotion.php" style="text-decoration:none; color:#FFF;">
              <table width="100%" class="left_btt">
                <tr>
                  <td height="26">&nbsp;• โปรโมชั่นเติมเงิน</td>
                </tr>
              </table>
              </a>';
			  }
			  ?>
              <?php
			  if($system['online_time'] != 0)
			  {
               echo '<a href="page.php?a=onlinepoint" style="text-decoration:none; color:#FFF;">
              <table width="100%" class="left_btt">
                <tr>
                  <td height="26">&nbsp;• ออนไลน์รับพ้อย</td>
                </tr>
              </table>
              </a>';
			  }
			  ?>
              <a href="cart.php" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• ไอเทมในตะกร้า [<?php echo $cnt_cart; ?>]</td>
                  </tr>
                </table>
                </a> <a href="inventory.php" style="text-decoration:none; color:#FFF;">
                  <table width="100%" class="left_btt">
                    <tr>
                      <td height="26">&nbsp;• ไอเทมสโตร์เว็บ [<?php echo $storec; ?>]</td>
                    </tr>
                  </table>
                  </a>
              <?php
			  if($system['restatus'] == 1)
			  {
				  echo '
            <a href="page.php?a=restate" style="text-decoration:none; color:#FFF;">
              <table width="100%" class="left_btt">
                <tr>
                  <td height="26">&nbsp;• รีสเตตัส</td>
                </tr>
              </table></a>';
			  }
			  ?>
              <?php
			  if($system['reborn'] == 1)
			  {
				  echo '
              <a href="page.php?a=reborn" style="text-decoration:none; color:#FFF;">
              <table width="100%" class="left_btt">
                <tr>
                  <td height="26">&nbsp;• จุติ</td>
                </tr>
              </table></a>';
			  }
			  ?>
              <a href="page.php?a=chgjob" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• เปลี่ยนเทพ / มาร</td>
                  </tr>
                </table>
                </a>
              <a href="rank.php?a=player" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• จัดอันดับตัวละคร</td>
                  </tr>
                </table>
                </a>
              <a href="rank.php?a=guild" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• จัดอันดับกิลด์</td>
                  </tr>
                </table>
                </a>
              <?php
			  if($system['random_box'] == 1)
			  {
              	echo '<a href="index.php" style="text-decoration:none; color:#FFF;">
              <table width="100%" class="left_btt">
                <tr>
                  <td height="26">&nbsp;• กล่องเสี่ยงโชค</td>
                </tr>
              </table>
              </a>';
			  }
			  ?>
              <?php if($system['getchar'] == 1)
			  {
              echo '<a href="page.php?a=getdelchar" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• กู้ตัวละครที่ลบ</td>
                  </tr>
                </table>
                </a>';
			  }
			  ?>
              <?php
			  // Consigtment
			  $con_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.consignment_setup_tbl");
			  $con_sql->execute();
			  $con = $con_sql->fetch(PDO::FETCH_ASSOC);
			  if(!empty($con['system_status']))
			  {
              echo '<a href="consignment.php?id=0" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• ตลาดฝากขาย</td>
                  </tr>
                </table>
                </a>';
              echo '<a href="createshop.php" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• ตั้งร้านฝากขาย</td>
                  </tr>
                </table>
                </a>';
              echo '<a href="createshop.php?id=0" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td height="26">&nbsp;• ประวัติซื้อ-ขายจากร้านฝากขาย</td>
                  </tr>
                </table>
                </a>';
			  }
			  ?>
              <table width="100%" class="left_btt">
                <tr>
                  <td height="26" align="center"><div class="titlemenu">ITEM MALL</div></td>
                </tr>
            </table>
              <a href="shop.php?id=0" style="text-decoration:none; color:#FFF;">
                <table width="100%" class="left_btt">
                  <tr>
                    <td width="13%" height="26">&nbsp;</td>
                    <td width="87%">&nbsp;• ไอเทมมาใหม่</td>
                  </tr>
                </table>
                </a>
              <!------------ ITEM MALL ----->
              <?php
			  $mall_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebShopCat");
			  $mall_sql->execute();
			  while($mall = $mall_sql->fetch(PDO::FETCH_ASSOC))
			  {
				  echo '
				  <a href="shop.php?id='.$mall['id'].'" style="text-decoration:none; color:#FFF;">
              <table width="100%" class="left_btt">
                <tr>
                  <td width="13%" height="26">&nbsp;</td>
                  <td width="87%">&nbsp;• '.$mall['catalog_name'].'</td>
                </tr>
              </table></a>';
			  }
			  ?></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td class="bg-menubot">&nbsp;</td>
      </tr>
    </table></td>
    <td align="center" valign="top" class="boxmain"> <div class="title">จัดอันดับ</div>
      <table width="850">
  <tr>
    <td><div style="font-family:'true-thai'; font-size:30px;"><?php 
	$a = $_GET['a'];
	if($a == "player")
	{
		echo 'จัดอันดับตัวละคร';
	}
	else
	{
		echo "จัดอันดับกิลด์";
	}
	?></div></td>
  </tr>
  <tr>
    <td>
    <div class="animated bounceIn">
    <?php
	if($a == "player")
	{
		echo '<table width="100%" border="1" cellpadding="10" cellspacing="0" class="box_cart">
  <tr>
    <td width="8%" align="center" bgcolor="#ba2222"><strong>ลำดับ</strong></td>
    <td width="50%" align="center" bgcolor="#ba2222"><strong>ชื่อตัวละคร</strong></td>
    <td width="16%" align="center" bgcolor="#ba2222"><strong>เลเวล</strong></td>
    <td width="26%" align="center" bgcolor="#ba2222"><strong>อาชีพ</strong></td>
  </tr>';
  $c = 1;
  // Player
  $notlike = '%@%';
  $player_sql = $sql->prepare("SELECT TOP 50 * FROM mhgame.dbo.TB_CHARACTER WHERE CHARACTER_NAME NOT LIKE :p1  ORDER BY CHARACTER_MAXGRADE DESC");
  $player_sql->BindParam(":p1",$notlike);
  $player_sql->execute();
  while($player = $player_sql->fetch(PDO::FETCH_ASSOC))
  {
	  echo '
	  <tr>
		<td align="center">'.$c++.'</td>
		<td>'.$player['CHARACTER_NAME'].'</td>
		<td align="center">'.$player['CHARACTER_MAXGRADE'].'</td>
		<td align="center">'.$api->jobclass($player['CHARACTER_STAGE']).'</td>
	  </tr>
	';
  }
	echo '</table>';
	}
	else
	{
		echo ' <table width="100%" border="1" cellpadding="10" cellspacing="0" class="box_cart">
  <tr>
    <td width="6%" align="center" bgcolor="#ba2222"><strong>ลำดับ</strong></td>
    <td width="44%" align="center" bgcolor="#ba2222"><strong>ชื่อกิลด์</strong></td>
    <td width="16%" align="center" bgcolor="#ba2222"><strong>คะแนนรวม</strong></td>
    <td width="16%" align="center" bgcolor="#ba2222"><strong>ทัวนาเมนต์</strong></td>
    <td width="18%" align="center" bgcolor="#ba2222"><strong>สงคราม</strong></td>
  </tr>';
  $c = 1;
  $guild_sql = $sql->prepare("SELECT TOP 50 * FROM mhgame.dbo.TB_GUILDWARRECORD ORDER BY GFWVictory DESC");
  $guild_sql->execute();
  while($guild = $guild_sql->fetch(PDO::FETCH_ASSOC))
  {
	  // Guild Name
	  $name_sql = $sql->prepare("SELECT GuildName FROM mhgame.dbo.TB_GUILD WHERE GuildIdx = :p1");
	  $name_sql->BindParam(":p1",$guild['GuildIdx']);
	  $name_sql->execute();
	  $name = $name_sql->fetch(PDO::FETCH_ASSOC);
	  echo '
  <tr>
    <td align="center">'.$c++.'</td>
    <td>'.$name['GuildName'].'</td>
    <td align="center">'.$guild['GFWVictory'].'</td>
    <td align="center">'.$guild['GFWDraw'].'</td>
    <td align="center">'.$guild['GFWLoose'].'</td>
  </tr>';
  }
  echo '
</table>
';
	}
	?>
    </div>
    
    </td>
  </tr>
      </table>
      <p></p>
     
        <p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><font color="#FFFFFF">บริการเช่าเว็บไซต์โดย <a style="color:#FFF;" href="https://www.facebook.com/gameserverapi/?fref=ts" target="_blank">Gamesv-api.com</a> ครบวงจรทุกเกมส์</font></td>
  </tr>
</table>
</body>
</html>