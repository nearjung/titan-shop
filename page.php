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
    <td align="center" valign="top" class="boxmain"> <div class="title"><?php echo $api->page_name($_GET['a']); ?></div>
      <table width="850">
  <tr>
    <td>
      <div class="animated fadeIn">
      <?php
	  $a = $_GET['a'];
	  if($a == "topup")
	  {
		  if(empty($merchant_id))
		  {
			  $api->popup("ยังไม่ติดตั้งระบบเติมเงิน");
			  $api->go("index.php");
		  }
		  echo '<table width="500" cellpadding="5" align="center">
  <tr>
    <td height="29" align="center" bgcolor="#121212"><strong>ราคาบัตรเติมเงิน</strong></td>
    <td align="center" bgcolor="#121212"><strong>จำนวนแคชที่ได้รับ</strong></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#333333">50 บาท</td>
    <td align="center" bgcolor="#333333">'.number_format($true_50).'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#272727">90 บาท</td>
    <td align="center" bgcolor="#272727">'.number_format($true_90).'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#333333">150 บาท</td>
    <td align="center" bgcolor="#333333">'.number_format($true_150).'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#272727">300 บาท</td>
    <td align="center" bgcolor="#272727">'.number_format($true_300).'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#333333">500 บาท</td>
    <td align="center" bgcolor="#333333">'.number_format($true_500).'</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#272727">1,000 บาท</td>
    <td align="center" bgcolor="#272727">'.number_format($true_1000).'</td>
  </tr>
</table>
<br>
<form name="refill_truemoney" action="" method="post"><table width="500" align="center">
  <tr>
    <td align="center"><label for="truemoney_password"></label>
      <input class="txt03" type="text" name="truemoney_password" id="truemoney_password" maxlength="14" autocomplete="off" placeholder="กรุณาใส่รหัสบัตรเติมเงิน 14 หลัก"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="refill" id="refill" value="เติมเงิน">
      <input type="reset" name="cancel" id="cancel" value="ยกเลิก"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></form>
<p>&nbsp;</p>
';

			
  				if($_POST['refill'])
				{
					// Check Truemoney Card
					$true_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.truemoney WHERE password = :p1");
					$true_sql->BindParam(":p1",$_POST['truemoney_password']);
					$true_sql->execute();
					$true = $true_sql->fetch(PDO::FETCH_ASSOC);
					if(!is_numeric($_POST['truemoney_password']))
					{
						$api->popup("รูปแบบรหัสเลขบัตรไม่ถูกต้อง");
					}
					else if($_POST['truemoney_password'] == "")
					{
						$api->popup("กรุณากรอกรหัสบัตรเติมเงินค่ะ");
					}
					else if(strlen($_POST['truemoney_password']) > 14)
					{
						$api->popup("กรุณากรอกรหัสบัตรทรูมันนี่ 14 หลักค่ะ");
					}
					else if(strlen($_POST['truemoney_password']) < 14)
					{
						$api->popup("กรุณากรอกรหัสบัตรทรูมันนี่ 14 หลักค่ะ");
					}
					else if($_POST['truemoney_password'] == $true['password'])
					{
						$api->popup("รหัสนี้มีอยู่ในระบบแล้วค่ะ");
					}
					else
					{
						if(($tmpay_ret = $api->refill_sendcard($account,$_POST['truemoney_password'])) !== TRUE)
						{
							echo '
							<table border="0" align="center" cellpadding="5" cellspacing="2">
							  <tr>
								<td align="center">ขออภัย ขณะนี้ระบบ TMPAY.NET ขัดข้อง กรุณาติดต่อเจ้าหน้าที่ (' . $tmpay_ret . ')<br /></td>
							  </tr>
							</table>';
						}
						else
						{
							echo '
							<table border="0" align="center" cellpadding="5" cellspacing="2">
							  <tr>
								<td>ได้รับข้อมูลบัตรเงินสดเรียบร้อย กรุณารอการตรวจสอบจากระบบ<br />'.$api->wait("page.php?a=topup",5000).'</td>
							  </tr>
							</table>';
						}
					}
				}
				
echo '<table width="95%">
  <tr>
    <td width="8%" height="29" align="center" bgcolor="#1D1D1D">ลำดับ</td>
    <td width="30%" align="center" bgcolor="#1D1D1D">เลขบัตร</td>
    <td width="13%" align="center" bgcolor="#1D1D1D">ราคา</td>
    <td width="23%" align="center" bgcolor="#1D1D1D">สถานะ</td>
    <td width="26%" align="center" bgcolor="#1D1D1D">วันที่</td>
  </tr>';
  // Topup Table
  $c = 1;
  $topup_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.truemoney WHERE user_no = :p1");
  $topup_sql->BindParam(":p1",$account);
  $topup_sql->execute();
  while($topup = $topup_sql->fetch(PDO::FETCH_ASSOC))
  {
  	echo '<tr>
    <td height="24" align="center">'.$c++.'</td>
    <td align="center">'.$topup['password'].'</td>
    <td align="center">'.$api->price_value($topup['amount']).'</td>
    <td align="center">'.$api->status_card($topup['status']).'</td>
    <td align="center">'.$topup['added_time'].'</td>
  </tr>';
  }echo '
</table>';
	  }
	  else if($a == "restate")
	  {
		  if($system['restatus'] == 0)
		  {
			  $api->popup("ระบบไม่ได้เปิดให้ใช้บริการค่ะ");
			  $api->go("index.php");
			  exit();
		  }
		  echo '<form name="restate" action="" method="post"><table width="500" align="center" cellpadding="4">
  <tr>
    <td align="center">*การรีสเตตัสจะมีค่าธรรมเนียมทั้งสิ้น <strong>'.$system['restatus_price'].' </strong>Cash</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">กรุณาเลือกตัวละคร</td>
  </tr>
  <tr>
    <td align="center"><label for="character"></label>
      <select class="selected_01" name="character" id="character">
        ';
		$api->charlist($userid);
		echo '
      </select></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="restatus" id="restatus" value="รีสเตตัส"></td>
  </tr>
</table></form>';

		if($_POST['restatus'])
		{
			if($_POST['character'] == 0)
			{
				$api->popup("กรุณาเลือกตัวละคร");
			}
			else if($api->chklogin($account) != 0)
			{
				$api->popup("กรุณาออกจากเกมส์ก่อนทำรายการทุกครั้งค่ะ");
			}
			else if($member['MallMoney'] < $system['restatus_price'])
			{
				$api->popup("คุณมีจำนวน Cash ไม่เพียงพอในการรีสเตตัสค่ะ");
				$api->go("page.php?a=restate");
			}
			else if($api->charinfo($userid,$_POST['character'],3) != $system['restatus_level'])
			{
				$api->popup("คุณจะต้องมีเลเวล ".$system['restatus_level']." ก่อนถึงทำการรีสเตตัสได้");
				$api->go("page.php?a=restate");
			}
			else if($api->charinfo($userid,$_POST['character'],5) != 0)
			{
				$api->popup("กรุณาอัพสเตตัสเก่าให้หมดก่อน");
				$api->go("page.php?a=restate");
			}
			else
			{
				// Restatus
				$reborn = $api->charinfo($userid,$_POST['character'],2)+1;
				$point_all = $system['restatus_point']*$reborn;
				$restate_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebRestatus :p1,:p2,:p3");
				$restate_sql->BindParam(":p1",$_POST['character']);
				$restate_sql->BindParam(":p2",$userid);
				$restate_sql->BindParam(":p3",$point_all);
				$restate_sql->execute();
				if(!$restate_sql)
				{
					$api->popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
				}
				else
				{
					$api->popup("ทำการรีสเตตัสสำเร็จ");
					$api->go("page.php?a=restate");
				}
			}
		}
	  }
	  else if($a == "reborn")
	  {
		  if($system['reborn'] == 0)
		  {
			  $api->popup("ระบบนี้ไม่เปิดให้ใช้งาน");
			  $api->go("index.php");
			  exit();
		  }
		  echo '<table width="800" align="center" cellpadding="7">
  <tr>
    <td width="395" rowspan="5" align="center" valign="top"><img src="images/char/character01.png" width="395" height="295"></td>
    <td width="393" align="left" bgcolor="#1A1A1A">ระบบจุติคืออะไร ?</td>
  </tr>
  <tr>
    <td align="left">- เมื่อจุติ สเตตัสเดิมจะไม่หายไป (สเตตัสทบรอบ)</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#1A1A1A">ตารางการจุติ</td>
  </tr>
  <tr>
    <td valign="top"><table width="100%">
      <tr>
        <td width="79" align="center">รอบที่</td>
        <td width="80" align="center">แคชที่ใช้</td>
        <td width="80" align="center">แต้มอัพ</td>
        <td width="80" align="center">GenGoal</td>
        <td width="80" align="center">Dex</td>
        <td width="80" align="center">Sta</td>
        <td width="80" align="center">Simmak</td>
      </tr>';
	  $rebirth_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.NewReborn_tbl ORDER BY id_times ASC");
	  $rebirth_sql->execute();
	  while($rebirth = $rebirth_sql->fetch(PDO::FETCH_ASSOC))
	  {
		  echo '
      <tr>
        <td align="center">'.$rebirth['id_times'].'</td>
        <td align="center">'.$rebirth['RePrice'].'</td>
        <td align="center">'.$rebirth['Uppoint'].'</td>
        <td align="center">'.$rebirth['GenGoal'].'</td>
        <td align="center">'.$rebirth['Dex'].'</td>
        <td align="center">'.$rebirth['Sta'].'</td>
        <td align="center">'.$rebirth['Simmak'].'</td>
      </tr>';
	  }
    echo '</table></td>
  </tr>
</table>
<br>
<form name="rebirth" action="" method="post"><table width="500" align="center">
  <tr>
    <td height="32" align="center" bgcolor="#1A1A1A">กรุณาเลือกตัวละครที่ต้องการจุติ</td>
  </tr>
  <tr>
    <td height="32" align="center"><label for="character"></label>
      <select class="selected_01" name="character" id="character">';

		$char_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetCharacter :p1");
		$char_sql->BindParam(":p1",$userid);
		$char_sql->execute();
		
		while($char = $char_sql->fetch(PDO::FETCH_ASSOC))
		{
			if(!$char)
			{
				echo '<option value="0">ไม่พบตัวละคร</option>';
			}
			else
			{
				echo '<option value="'.$char['CHARACTER_IDX'].'">'.$char['CHARACTER_NAME'].' จุติ : '.$api->charinfo($userid,$char['CHARACTER_IDX'],2).' ครั้ง</option>';
			}
		}
		
		echo'
      </select></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="reborn" id="reborn" value="จุติตัวละคร"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
';
		if($_POST['reborn'])
		{
			// Count Reborn
			$state = $api->charinfo($userid,$_POST['character'],2);
			$cntrebirth_sql = $sql->prepare("SELECT COUNT(*) FROM ".MSSQL_DB.".dbo.NewReborn_tbl");
			$cntrebirth_sql->execute();
			$cntrebirth = $cntrebirth_sql->fetchColumn();
			
			$allstate = $state+1;
			$cntrebirth2_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.NewReborn_tbl WHERE id_times = :p1");
			$cntrebirth2_sql->BindParam(":p1",$allstate);
			$cntrebirth2_sql->execute();
			$cntrebirth2 = $cntrebirth2_sql->fetch(PDO::FETCH_ASSOC);
			
			if($_POST['character'] == 0)
			{
				$api->popup("กรุณาเลือกตัวละครด้วยค่ะ");
				$api->go("page.php?a=reborn");
			}
			else if($api->chklogin($account) != 0)
			{
				$api->popup("กรุณาออกจากเกมส์ก่อนทำรายการทุกครั้งค่ะ");
				$api->go("page.php?a=reborn");
			}
			else if($cntrebirth == $state)
			{
				$api->popup("คุณไม่สามารถจุติไปได้มากกว่านี้อีกแล้วค่ะ");
				$api->go("page.php?a=reborn");
			}
			else if($cntrebirth2['RePrice'] > $member['MallMoney'])
			{
				$api->popup("คุณ Cash ไม่เพียงพอในการจุติค่ะ");
				$api->go("page.php?a=reborn");
			}
			else if($cntrebirth2['RebornLevel'] != $api->charinfo($userid,$_POST['character'],3))
			{
				$api->popup("คุณมีเลเวลไม่ตรงกับเงื่อนไขที่กำหนด");
				$api->go("page.php?a=reborn");
			}
			else
			{
				// Set New Reborn
				$newreb_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.NewReborn_tbl WHERE id_times = :p1");
				$newreb_sql->BindParam(":p1",$allstate);
				$newreb_sql->execute();
				$newreb = $newreb_sql->fetch(PDO::FETCH_ASSOC);
				
				if(!$newreb)
				{
					$api->popup("ไม่สามารถรีสเตตัสได้แล้ว");
				}
				else if($member['MallMoney'] < $newreb['RePrice'])
				{
					$api->popup("คุณมีจำนวน Cash ไม่เพียงพอในการรีสเตตัสค่ะ");
					$api->go("page.php?a=restate");
				}
				else
				{
				
					// Set Character
					$set_sql = $sql->prepare("UPDATE mhgame.dbo.TB_CHARACTER SET CHARACTER_GRADE = :p1, CHARACTER_MAXGRADE = :p2, CHARACTER_GRADEUPPOINT = :p3, CHARACTER_GENGOAL = :p4, CHARACTER_DEX = :p5, CHARACTER_STA = :p6, CHARACTER_SIMMAK = :p7 WHERE CHARACTER_IDX = :p8");
					$set_sql->BindParam(":p1",$newreb['LevelGet']);
					$set_sql->BindParam(":p2",$newreb['LevelGet']);
					$set_sql->BindParam(":p3",$newreb['Uppoint']);
					$set_sql->BindParam(":p4",$newreb['GenGoal']);
					$set_sql->BindParam(":p5",$newreb['Dex']);
					$set_sql->BindParam(":p6",$newreb['Sta']);
					$set_sql->BindParam(":p7",$newreb['Simmak']);
					$set_sql->BindParam(":p8",$_POST['character']);
					$set_sql->execute();
					
					// Up reborn
					$plus = 1;
					$ureb = $sql->prepare("UPDATE mhgame.dbo.TB_CHARACTER SET reborn = reborn+:p1 WHERE CHARACTER_IDX = :p2");
					$ureb->BindParam(":p1",$plus);
					$ureb->BindParam(":p2",$_POST['character']);
					$ureb->execute();
					$api->popup("ทำการจุติให้เรียบร้อยแล้วครับ");
					$api->go("page.php?a=reborn");
					
					
					$api->updatecash($account,$newreb['RePrice']);
				}
				
			}
				
		}
	  }
	  else if($a == "chgjob")
	  {
		  echo '<form name="changejob" action="" method="post"><table width="500" align="center">
  <tr>
    <td align="center"><img src="images/char/character02.png" width="800" height="463"></td>
  </tr>
  <tr>
    <td align="center"><strong>เปลี่ยนอาชีพระบบ เทพ/มาร</strong></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">กรุณาเลือกตัวละคร</td>
  </tr>
  <tr>
    <td height="35" align="center"><label for="character"></label>
      <select class="selected_01" name="character" id="character">';
		$api->charlist($userid);echo'
      </select></td>
  </tr>
  <tr>
    <td height="35" align="center"><label for="job"></label>
      <select class="selected_01" name="job" id="job">
        <option value="0">กรุณาเลือกอาชีพ</option>
        <option value="65">จอมเทพ</option>
        <option value="129">จอมมาร</option>
      </select></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="chgjob" id="chgjob" value="เปลี่ยนเทพ-มาร"></td>
  </tr>
  </table>
</form>
';
		if($_POST['chgjob'])
		{
			if($_POST['character'] == 0)
			{
				$api->popup("กรุณาเลือกตัวละครค่ะ");
				$api->go("page.php?a=chgjob");
			}
			else if($_POST['job'] == 0)
			{
				$api->popup("กรุณาเลือกอาชีพก่อนทำรายการค่ะ");
				$api->go("page.php?a=chgjob");
			}
			else if($api->charinfo($userid,$_POST['character'],4) == 65 || $api->charinfo($userid,$_POST['character'],4) == 129)
			{
				$api->popup("ตัวละครนี้ไม่สามารถเปลี่ยนอาชีพได้อีกแล้ว เนื่องจากได้ทำการเปลี่ยนอาชีพเป็น ".$api->faction($api->charinfo($userid,$_POST['character'],4))." ไปแล้ว");
				$api->go("page.php?a=chgjob");
			}
			else if($api->charinfo($userid,$_POST['character'],3) < 70)
			{
				$api->popup("ตัวละครของคุณจะต้องมีเลเวลครบ 70 ถึงจะสามารถทำรายการได้");
				$api->go("page.php?a=chgjob");
			}
			else if($api->chklogin($account))
			{
				$api->popup("กรุณาออกจากเกมส์ก่อนทำรายการทุกครั้งค่ะ");
				$api->go("page.php?a=chgjob");
			}
			else
			{
				// Update Job
				$job_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebUpdateJob :p1,:p2,:p3");
				$job_sql->BindParam(":p1",$userid);
				$job_sql->BindParam(":p2",$_POST['character']);
				$job_sql->BindParam(":p3",$_POST['job']);
				$job_sql->execute();
				if(!$job_sql)
				{
					$api->popup("เกิดข้อผิดพลาดขณะเปลี่ยนอาชีพ");
				}
				else
				{
					$api->popup("ระบบได้ทำการเปลี่ยนอาชีพตัวละครเรียบร้อยแล้วค่ะ");
					$api->go("page.php?a=chgjob");
				}
			}
		}
	  }
	  else if($a == "onlinepoint")
	  {
		  $timeonline = round($member['total_game_time']/60);
		  echo '<table width="500" align="center">
  <tr>
    <td align="center">บัญชี : '.$account.' | เวลาออนไลน์ : '.number_format($timeonline).' นาที</td>
  </tr>
  <tr>
    <td align="center">อัตราการแลกเปลี่ยนจะอยู่ที่ '.$system['online_time'].' นาที ได้รับ '.number_format($system['online_point']).' Cash</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="32" align="center"><label for="getcash"></label>
    <a href="page.php?a=onlinepoint&event=getcash"><input class="bt_login" type="button" name="getcash" id="getcash" value="แลกเปลี่ยนแคช"></a></td>
  </tr>
  <tr>
    <td align="center"><div class="animated fadeIn">';
	if($_GET['event'] == "getcash")
	{
		if($timeonline < $system['online_time'])
		{
			echo '<font color="#FF0000">คุณมีจำนวนเวลาออนไลน์ไม่เพียงพอค่ะ</font>';
				$api->wait("page.php?a=onlinepoint",4000);
		}
		else if($api->chklogin($account) != 0)
		{
			echo '<font color="#FF0000">กรุณาออกจากเกมส์ก่อนทำรายการทุกครั้งค่ะ</font>';
				$api->wait("page.php?a=onlinepoint",4000);
		}
		else
		{
			$api->addcash($account,$system['online_point']);
			$updatetime = $system['online_time']*60;
			$time_sql = $sql->prepare("UPDATE MHCMember.dbo.chr_log_info SET total_game_time = total_game_time-:p1 WHERE id_loginid = :p2");
			$time_sql->BindParam(":p1",$updatetime);
			$time_sql->BindParam(":p2",$account);
			$time_sql->execute();
			if(!$time_sql)
			{
				$api->popup("เกิดข้อผิดพลาดขณะแลกเปลี่ยนแคช");
			}
			else
			{
				echo '<font color="#009900">ทำการแลกเปลี่ยนเวลาออนไลน์เป็นแคชเรียบร้อยแล้ว</font>';
				$api->wait("page.php?a=onlinepoint",5000);
			}
		}
	}
	echo '</div></td>
  </tr>
</table>
';
	  }
      ?>
      </div>      </td>
  </tr>
  </table>
      <p></p>
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