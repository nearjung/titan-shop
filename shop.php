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
    <td align="center" valign="top" class="boxmain"> <div class="title"><?php
	if($_GET['id'] == 0)
	{
		echo "ไอเทมมาใหม่";
	}
	else
	{
	 	echo $shop['catalog_name']; 
	}
	 ?></div><div class="titlesub-cart">
                        <a href="cart.php"><div class="bt-cart"></div></a>
                        <span class="txt-cart">
                        <?php echo $cnt_cart; ?> รายการ ในตะกร้า</span>  
                    </div>
      <p>&nbsp;</p>
      <div class="animated fadeIn"><table width="800">
  <tr>
    <td>
    
    
    <?php
			if($_GET['id'] == 0)
			{
				  $itemcount_sql = $sql->prepare("SELECT COUNT(*) FROM ".MSSQL_DB.".dbo.shop_tbl");
				  $itemcount_sql->execute();
				  $num_rows = $itemcount_sql->fetchColumn();
			}
			else
			{
				  $itemcount_sql = $sql->prepare("SELECT COUNT(*) FROM ".MSSQL_DB.".dbo.shop_tbl WHERE id_catalog = :p1");
				  $itemcount_sql->BindParam(":p1",$_GET['id']);
				  $itemcount_sql->execute();
				  $num_rows = $itemcount_sql->fetchColumn();
			}			
					$per_page = 30;   // Per Page
					$page  = 1;
					
					if(isset($_GET["Page"]))
					{
						$page = $_GET["Page"];
					}
					
					$prev_page = $page-1;
					$next_page = $page+1;
					$row_start = (($per_page*$page)-$per_page);
					if($num_rows<=$per_page)
					{
						$num_pages =1;
					}
					else if(($num_rows % $per_page)==0)
					{
						$num_pages =($num_rows/$per_page) ;
					}
					else
					{
						$num_pages =($num_rows/$per_page)+1;
						$num_pages = (int)$num_pages;
					}
					$row_end = $per_page * $page;
					if($row_end > $num_rows)
					{
						$row_end = $num_rows;
					}
					
					echo"<table border=\"0\"  cellspacing=\"0\" cellpadding=\"0\"><tr>";
					$intRows = 0;
					if($_GET['id'] == 0)
					{
						$item_sql = $sql->prepare("SELECT c.* FROM (SELECT ROW_NUMBER() OVER(ORDER BY id DESC) AS RowID,*  FROM ".MSSQL_DB.".dbo.shop_tbl) AS c WHERE c.RowID > $row_start AND c.RowID <= $row_end");
						$item_sql->execute();
					}
					else
					{
						$item_sql = $sql->prepare("SELECT c.* FROM (SELECT ROW_NUMBER() OVER(ORDER BY id DESC) AS RowID,*  FROM ".MSSQL_DB.".dbo.shop_tbl WHERE id_catalog = :p1) AS c WHERE c.RowID > $row_start AND c.RowID <= $row_end");
						$item_sql->BindParam(":p1",$_GET['id']);
						$item_sql->execute();
					}
					while($item = $item_sql->fetch(PDO::FETCH_ASSOC))
					{
						echo "<td>";
						$intRows++;
						?>
    <table width="250" cellpadding="5">
      <tr>
          <td><table width="250" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="191" valign="top" background="images/bg-mall.png">
              <form name="itemlist" action="" method="post" id="<?php echo $item['id']; ?>">
              <table width="100%">
                <tr>
                  <td height="10" colspan="4"></td>
                </tr>
                <tr>
                  <td height="94" colspan="4" align="center"><img src="images/items/<?php echo $item['item_image']; ?>" width="88" height="88" /></td>
                </tr>
                <tr>
                  <td colspan="4" align="center"><?php echo $item['item_name']; ?></td>
                </tr>
                <tr>
                  <td height="19" colspan="4" align="center" valign="top">จำนวน : 
                    <label for="number"></label>
                    <input name="number<?php echo $item['id']; ?>" type="text" class="txt02" id="number<?php echo $item['id']; ?>" value="1" maxlength="2" /> 
                    ชิ้น</td>
                </tr>
                <tr>
                  <td width="13%" align="right"><img src="images/coin.png" width="21" height="15" /></td>
                  <td width="60%"><strong><?php echo number_format($item['item_price']); ?> Point</strong></td>
                  <td width="12%"><div class="just_cursor" id="opener<?php echo $item['id']; ?>"><img src="images/bt-detail.png" width="27" height="25" /></div><div id="mydialog<?php echo $item['id']; ?>" title="<?php echo $item['item_name']; ?>"><?php echo $item['item_description']; ?></div>
<script>
$(document).ready(function(){
   $( "#mydialog<?php echo $item['id']; ?>" ).dialog({ autoOpen: false });
   $( "#opener<?php echo $item['id']; ?>" ).click(function() {
     $( "#mydialog<?php echo $item['id']; ?>" ).dialog( "open" );
   });
});
</script></td>
                  <td width="15%">
                    <input type="submit" class="cart_butt" name="<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>" value="" /></td>
                </tr>
              </table>
              </form>
              <?php
			  // Add Cart
			  if($_POST['number'.$item['id'].''])
			  {
				  if(empty($_POST['number'.$item['id'].'']))
				  {
					  $api->popup("กรุณาใส่จำนวนสินค้าที่ต้องการค่ะ");
				  }
				  else if($_POST['number'.$item['id'].''] > $item['max_count'])
				  {
					  $api->popup("จำนวนสินค้าชิ้นนี้จะต้องใส่ไม่เกิน ".$item['max_count']." ชิ้น");
				  }
				  else if($cnt_cart > 20)
				  {
					  $api->popup("คุณมีรายการไอเท็มครบ 20 รายการแล้ว กรุณาดำเนินการก่อนทำรายการต่อไปค่ะ");
				  }
				  else if(!is_numeric($_POST['number'.$item['id'].'']) || $_POST['number'.$item['id'].''] < 1 )
				  {
					  $api->popup("กรุณาใส่จำนวนไอเท็มให้ถูกต้องค่ะ");
				  }
				  else
				  {
					  $realprice = $item['item_price']*$_POST['number'.$item['id'].''];
					  $cart_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebAddCart :p1,:p2,:p3,:p4");
					  $cart_sql->BindParam(":p1",$account);
					  $cart_sql->BindParam(":p2",$item['id']);
					  $cart_sql->BindParam(":p3",$_POST['number'.$item['id'].'']);
					  $cart_sql->BindParam(":p4",$realprice);
					  $cart_sql->execute();
					  if(!$cart_sql)
					  {
						  $api->popup("เกิดข้อผิดพลาดขณะรันข้อมูล");
					  }
					  else
					  {
						  $api->go("shop.php?id=".$_GET['id']."");
					  }
				  }
			  }
			  ?>
              </td>
            </tr>
          </table></td>
        </tr>
    </table>
        <?php
						echo"</td>";
						if(($intRows)%3==0)
						{
							echo '</tr>';
						}
					}
					echo"</tr></table>";
			  ?>
    <?php
		  
			echo "<center>";
	for($i=1; $i<=$num_pages; $i++){
		if($i != $page)
		{
			echo "[ <a href='$_SERVER[SCRIPT_NAME]?id=".$_GET['id']."&Page=".$i."'>".$i."</a> ]";

		}
		else
		{
			echo "<b> $i </b>";
		}
	}
			echo "</center>";
			?>
    
    </td>
  </tr>
</table></div>
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
<p>&nbsp;</p>
</body>
</html>