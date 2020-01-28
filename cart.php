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
    <td align="center" valign="top" class="boxmain"> <div class="title">สินค้าในตะกร้า</div>
      <table width="850">
  <tr>
    <td><div style="font-family:'true-thai'; font-size:30px;">รายการไอเทม</div></td>
  </tr>
  <tr>
    <td>
    <div class="animated bounceIn">
    <table width="100%" border="1" cellpadding="10" cellspacing="0" class="box_cart">
      <tr>
        <td width="9%" height="32" align="center" bgcolor="#ba2222"><strong>ลบไอเทม</strong></td>
        <td width="15%" align="center" bgcolor="#ba2222"><strong>รูปภาพ</strong></td>
        <td width="26%" align="center" bgcolor="#ba2222"><strong>รายการ</strong></td>
        <td width="15%" align="center" bgcolor="#ba2222"><strong>ประเภท</strong></td>
        <td width="17%" align="center" bgcolor="#ba2222"><strong>จำนวน</strong></td>
        <td width="18%" align="center" bgcolor="#ba2222"><strong>ราคา</strong></td>
      </tr>
      <?php
	  $cart_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetItemCart :p1");
	  $cart_sql->BindParam(":p1",$account);
	  $cart_sql->execute();
	  while($cart = $cart_sql->fetch(PDO::FETCH_ASSOC))
	  {
		  // Product Detail
		  $item_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetShopDetail :p1");
		  $item_sql->BindParam(":p1",$cart['shop_id']);
		  $item_sql->execute();
		  $item = $item_sql->fetch(PDO::FETCH_ASSOC);
		  
		  // Catalog Name
		  $cat_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetCatalogID :p1");
		  $cat_sql->BindParam(":p1",$item['id_catalog']);
		  $cat_sql->execute();
		  $cat = $cat_sql->fetch(PDO::FETCH_ASSOC);
		  echo '
      <tr>
        <td height="49" align="center"><a href="cart.php?event=delete&id='.$cart['id'].'"><img src="images/x-icon.png" width="20" height="20" /></a></td>
        <td align="center"><img src="images/items/'.$item['item_image'].'" width="59" height="59" /></td>
        <td>'.$item['item_name'].'</td>
        <td>'.$cat['catalog_name'].'</td>
        <td align="right">'.$cart['item_count'].'</td>
        <td align="right">'.number_format($cart['total_price']).'</td>
      </tr>';
	  	
	  }
	  
	  // Calculater
	  $piece_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCalCartPiece :p1");
	  $piece_sql->BindParam(":p1",$account);
	  $piece_sql->execute();
	  $piece = $piece_sql->fetchColumn();
	  
	  $price_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCalculatePrice :p1");
	  $price_sql->BindParam(":p1",$account);
	  $price_sql->execute();
	  $price = $price_sql->fetchColumn();
      ?>
      
      <tr>
        <td height="28" colspan="4">&nbsp;</td>
        <td bgcolor="#BA2222"><strong>&nbsp;จำนวนรวม : <?php echo number_format($piece); ?></strong></td>
        <td bgcolor="#BA2222"><strong>&nbsp;ราคารวม : <?php echo number_format($price); ?></strong></td>
      </tr>
    </table>
    
    </div>
    
    </td>
  </tr>
      </table>
      <p></p>
     
        <p>*หลังจากชำระเงินแล้ว ไอเทมจะถูกเก็บเข้าไปที่สโตร์เว็บ</p>
        <p>
          <a href="cart.php?event=purchase"><input name="purchase" type="button" class="bt_purchase" id="purchase" value="ชำระเงิน" /></a>
          
        </p>
      <p>
      <?php
	  $event = $_GET['event'];
	  
	  if($event == "delete")
	  {
		  // Delete
		  $delete_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebDeleteCart :p1,:p2");
		  $delete_sql->BindParam(":p1",$_GET['id']);
		  $delete_sql->BindParam(":p2",$account);
		  $delete_sql->execute();
		  if(!$delete_sql)
		  {
			  $api->popup("เกิดข้อผิดพลาดในการลบไอเทม");
		  }
		  else
		  {
			  $api->go("cart.php");
		  }
	  }
	  else if($event == "purchase")
	  {
		  if($cnt_cart != 0)
		  {
			  if($price > $member['MallMoney'])
			  {
				  $api->popup("คุณมีจำนวนเงินไม่เพียงพอในการซื้อไอเทม กรุณาเติมเงินค่ะ");
				  $api->go("cart.php");
			  }
			  else
			  {
				  // Insert to Store
				  // Cut off
				  $cut_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebUpdateCash :p1,:p2");
				  $cut_sql->BindParam(":p1",$price);
				  $cut_sql->BindParam(":p2",$account);
				  $cut_sql->execute();
				  if(!$cut_sql)
				  {
					  $api->popup("เกิดข้อผิดพลาดขณะชำระเงิน");
					  $api->go("cart.php");
				  }
				  else
				  {
					  $cart2_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetItemCart :p1");
					  $cart2_sql->BindParam(":p1",$account);
					  $cart2_sql->execute();
					  while($cart2 = $cart2_sql->fetch(PDO::FETCH_ASSOC))
					  {
						  // INSERT TO STORE
						  $store_sql = $sql->prepare("INSERT INTO ".MSSQL_DB.".dbo.shopping_store(account,shop_id,item_count) VALUES(:p1,:p2,:p3)");
						  $store_sql->BindParam(":p1",$account);
						  $store_sql->BindParam(":p2",$cart2['shop_id']);
						  $store_sql->BindParam(":p3",$cart2['item_count']);
						  $store_sql->execute();
						  if(!$store_sql)
						  {
							  $api->popup("เกิดข้อผิดพลาดขณะชำระเงิน");
							  $api->go("cart.php");
						  }
					  }
					 // DELETE ALL
					 $del_sql = $sql->prepare("DELETE FROM ".MSSQL_DB.".dbo.shopping_cart WHERE account = :p1");
					 $del_sql->BindParam(":p1",$account);
					 $del_sql->execute();
					 $api->popup("ชำระเงินเสร็จสิ้น ไอเทมของท่านจะปรากฎอยู่ในเว็บสโตร์ ขอบคุณที่ใช้บริการค่ะ ♥");
					 $api->go("cart.php");
				  }
			  }
		  }
		  else
		  {
			  $api->popup("ไม่พบสินค้าในตะกร้า");
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