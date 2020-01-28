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
                  </table> <a href="shop.php?id=0" style="text-decoration:none; color:#FFF;">
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
    <td align="center" valign="top" class="boxmain"> <div class="title">ไอเทมสโตร์</div>
      <table width="850">
  <tr>
    <td><div style="font-family:'true-thai'; font-size:30px;">รายการไอเทม</div></td>
  </tr>
  <tr>
    <td>
    <div class="animated bounceIn">
    <table width="100%" border="1" cellpadding="10" cellspacing="0" class="box_cart">
      <tr>
        <td width="15%" height="32" align="center" bgcolor="#ba2222"><strong>รูปภาพ</strong></td>
        <td width="26%" align="center" bgcolor="#ba2222"><strong>รายการ</strong></td>
        <td width="15%" align="center" bgcolor="#ba2222"><strong>ประเภท</strong></td>
        <td width="17%" align="center" bgcolor="#ba2222"><strong>จำนวน</strong></td>
        <td width="18%" align="center" bgcolor="#ba2222"><strong>รับสินค้า</strong></td>
      </tr>
      
      <?php
	  //
	  $store_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetStore :p1");
	  $store_sql->BindParam(":p1",$account);
	  $store_sql->execute();
	  while($store = $store_sql->fetch(PDO::FETCH_ASSOC))
	  {
		  // Product Detail
		  $item_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetShopDetail :p1");
		  $item_sql->BindParam(":p1",$store['shop_id']);
		  $item_sql->execute();
		  $item = $item_sql->fetch(PDO::FETCH_ASSOC);
		  
		  // Catalog Name
		  $cat_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetCatalogID :p1");
		  $cat_sql->BindParam(":p1",$item['id_catalog']);
		  $cat_sql->execute();
		  $cat = $cat_sql->fetch(PDO::FETCH_ASSOC);
		  echo '
      <tr>
        <td height="32" align="center"><img src="images/items/'.$item['item_image'].'" width="59" height="59" /></td>
        <td align="center">'.$item['item_name'].'</td>
        <td align="center">'.$cat['catalog_name'].'</td>
        <td align="center">'.$store['item_count'].'</td>
        <td align="center"><a href="inventory.php?a=getitem&id='.$store['id'].'"><input class="bt_getitem" value="รับสินค้า" name="" type="button" /></a></td>
      </tr>';
	  }
	  ?>
    </table>
    
    </div>
    
    </td>
  </tr>
      </table>
      <p></p>
     
        <p>*หลังกดรับสินค้าแล้ว ไอเทมของท่านจะไปอยู่ในโกดังไอเทมมอล หรือโกดังเก็บของค่ะ (แล้วแต่ชนิดไอเท็ม กรุณาตรวจสอบไอเท็มตามนี้ค่ะ)*</p>
        <p>
          <a href="inventory.php?a=getall"><input name="purchase" type="button" class="bt_purchase" id="purchase" value="รับสินค้าทั้งหมด" /></a>
          
        </p>
      <p>
      <?php
	  $a = $_GET['a'];
	  $id = $_GET['id'];
	  if($a == "getitem")
	  {
		  // Check Item
		  $chkstore_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetStoreByID :p1,:p2");
		  $chkstore_sql->BindParam(":p1",$id);
		  $chkstore_sql->BindParam(":p2",$account);
		  $chkstore_sql->execute();
		  $chkstore = $chkstore_sql->fetch(PDO::FETCH_ASSOC);
		  
		  // Check Mall Bank
		  $bank_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCheckMallItem :p1");
		  $bank_sql->BindParam(":p1",$userid);
		  $bank_sql->execute();
		  $bank = $bank_sql->fetchColumn();
		  
		  // Check Item Detail
		  $items_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetShopDetail :p1");
		  $items_sql->BindParam(":p1",$chkstore['shop_id']);
		  $items_sql->execute();
		  $items = $items_sql->fetch(PDO::FETCH_ASSOC);
		  
		  // Ware House
		  $ware_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCheckBankItem :p1");
		  $ware_sql->BindParam(":p1",$account);
		  $ware_sql->execute();
		  $ware = $ware_sql->fetchColumn();
		  
		  if($chkstore['account'] != $account)
		  {
			  $api->popup("เกิดข้อผิดพลาดขณะรับไอเท็ม");
			  $api->go("inventory.php");
		  }
		  else if($api->chklogin($account) != 0)
		  {
			  $api->popup("กรุณาออกจากเกมส์ก่อนทำรายการทุกครั้งค่ะ");
			  $api->go("inventory.php");
		  }
		  else if(!$chkstore)
		  {
			  $api->popup("เกิดข้อผิดพลาดขณะรับไอเทม");
			  $api->go("inventory.php");
		  }
		  else if($ware == 117)
		  {
			  $api->popup("คลังของท่านเต็มค่ะ กรุณาเคลียของก่อนทำรายการทุกครั้ง");
			  $api->go("inventory.php");
		  }
		  else if($bank == 90)
		  {
			  $api->popup("ช่องเก็บของในโกดังไอเทมมอลเต็มค่ะ กรุณาเคลียไอเทมก่อนทำรายการ");
			  $api->go("inventory.php");
		  }
		  else
		  {
			  // Insert Item
			  $api->additem($userid,$items['item_id'],$chkstore['item_count'],$items['item_lock'],$items['item_type']);
			  $api->deleteitem($chkstore['id'],$account);
			  $api->popup("ระบบได้ทำการส่งไอเท็มแล้วค่ะ");
			  $api->go("inventory.php");
		  }
	  }
	  else if($a == "getall")
	  {
		  if($storec == 0)
		  {
			  $api->popup("ไม่พบไอเทมในไอเทมสโตร์");
			  $api->go("inventory.php");
		  }
		  else
		  {
			  if($api->chklogin($account) != 0)
			  {
				  $api->popup("กรุณาออกจากเกมส์ก่อนทำรายการทุกครั้งค่ะ");
				  $api->go("inventory.php");
				  exit();
			  }
			  
			  for($i = 1; $i <= $storec; $i++)
			  {
				  // Check Item
				  $chkstore2_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetStore :p2");
				  $chkstore2_sql->BindParam(":p2",$account);
				  $chkstore2_sql->execute();
				  $chkstore2 = $chkstore2_sql->fetch(PDO::FETCH_ASSOC);
				  
				  // Check Mall Bank
				  $bank_sql2 = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCheckMallItem :p1");
				  $bank_sql2->BindParam(":p1",$userid);
				  $bank_sql2->execute();
				  $bank2 = $bank_sql2->fetchColumn();
				  
				  // Check Item Detail
				  $items_sql2 = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetShopDetail :p1");
				  $items_sql2->BindParam(":p1",$chkstore2['shop_id']);
				  $items_sql2->execute();
				  $items2 = $items_sql2->fetch(PDO::FETCH_ASSOC);
				  
				  // Ware House
				  $ware_sql2 = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCheckBankItem :p1");
				  $ware_sql2->BindParam(":p1",$account);
				  $ware_sql2->execute();
				  $ware2 = $ware_sql2->fetchColumn();
				  
				  if($chkstore2['account'] != $account)
				  {
					  $api->popup("เกิดข้อผิดพลาดขณะรับไอเท็ม");
					  $api->go("inventory.php");
				  }
				  else if(!$chkstore2)
				  {
					  $api->popup("เกิดข้อผิดพลาดขณะรับไอเทม");
					  $api->go("inventory.php");
				  }
				  else if($ware2 == 117)
				  {
					  $api->popup("คลังของท่านเต็มค่ะ กรุณาเคลียของก่อนทำรายการทุกครั้ง");
					  $api->go("inventory.php");
				  }
				  else if($bank2 == 90)
				  {
					  $api->popup("ช่องเก็บของในโกดังไอเทมมอลเต็มค่ะ กรุณาเคลียไอเทมก่อนทำรายการ");
					  $api->go("inventory.php");
				  }
				  else
				  {
					  // Insert Item
					  $api->additem($userid,$items2['item_id'],$chkstore2['item_count'],$items2['item_lock'],$items2['item_type']);
					  $api->deleteitem($chkstore2['id'],$account);
				  }
				  $api->popup("ระบบได้ทำการส่งไอเท็มแล้วค่ะ");
				  $api->go("inventory.php");
			  }
		  }
	  }
	  ?>
      </p>
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