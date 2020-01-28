<?php
session_start();
include_once("include/config.php");

if(empty($_SESSION['account']))
{
	$api->go("login.php");
}
$id = $_GET['id'];
$ex = @$_GET['execute'];
// Box information
$box_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.box_tbl WHERE id_box = :p1");
$box_sql->BindParam(":p1",$_GET['id']);
$box_sql->execute();
$box = $box_sql->fetch(PDO::FETCH_ASSOC);
if($box['box_active'] != 1)
{
	$api->popup("กล่องไอเทมไม่ได้เปิด");
	$api->go("index.php");
}
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
    <td valign="top" class="boxmain"> <div class="title">กล่องสุ่ม</div>
    
	  <div style="width:100%;margin:auto;">

                    <center><span style="font-family:true-thai;font-size:50px;"><?php echo $box['box_name']; ?> - <?php echo number_format($box['box_price']); ?> Cash</span></center>


<div class="bgbox-random">

<div class="talk-bubble tri-right border btm-right-in animated fadeInDown" style="margin-top:-80px; margin-left:160px; position:absolute; z-index:21; display:none;" id="rdItem">
  <div class="talktext">
    <p>ยินดีด้วย คุณได้รับ   ea</p>
  </div>
</div>


<div class="item-random animated flip" style="z-index:30; display:none;" id="randomItem">
<img src="items/.png" width="60">
</div>

<div style="width:300px;height:300px;margin:auto; z-index:10;"> <a href="#" onclick="yesno()"><img src="images/box/100001-1.png" class="hvr-buzz" id="imgBox"></a>

</div>


</div>
	  </div>
	  <table width="540" border="0" align="center" cellpadding="0" cellspacing="0">
	    <tr>
	      <td height="480" valign="top" background="images/box/bg-boxdetail.png"><table width="466" align="center">
	        <tr>
	          <td height="97" colspan="2">&nbsp;</td>
	          </tr>
	        <tr>
	          <td width="8" height="28">&nbsp;</td>
	          <td width="446"><?php echo $box['box_name']; ?></td>
	          </tr>
	        <tr>
	          <td height="120" colspan="2"> <div class="pic-itempopup">
              <?php
			  // Item From Box
			  $item_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.box_item_tbl WHERE id_box = :p1");
			  $item_sql->BindParam(":p1",$id);
			  $item_sql->execute();
			  
			  while($img = $item_sql->fetch(PDO::FETCH_ASSOC))
			  {
                echo '<img src="images/items/'.$img['item_image'].'" data-content=" เมื่อทำการดับเบิ้ลคลิ๊กที่ห่อของขวัญ, ได้รับหยกสีน้ำเงิน 50 อัน.">';
			  }
               ?> 
    </div></td>
	          </tr>
	        <tr>
	          <td height="181" colspan="2"><div class="detail-itempopup" id="focusbox">
        เมื่อทำการเปิดมีโอกาศได้รับ<br>
        <?php
		$item_sql2 = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.box_item_tbl WHERE id_box = :p1");
		$item_sql2->BindParam(":p1",$id);
		$item_sql2->execute();
		while($txt = $item_sql2->fetch(PDO::FETCH_ASSOC))
		{
        	echo '&nbsp; - '.$txt['item_name'].' '.$txt['item_count'].' ea<br>';
		}
		?>
        <?php
		
		?>
        </div></td>
	          </tr>
          </table></td>
        </tr>
      </table>
	  <p>
      <?php
	  if($ex == "random")
	  {
		  
		  // Check Mall Bank
		  $bank_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCheckMallItem :p1");
		  $bank_sql->BindParam(":p1",$userid);
		  $bank_sql->execute();
		  $bank = $bank_sql->fetchColumn();
		  
		  // Ware House
		  $ware_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebCheckBankItem :p1");
		  $ware_sql->BindParam(":p1",$account);
		  $ware_sql->execute();
		  $ware = $ware_sql->fetchColumn();
		  
		  if(empty($box))
		  {
			  $api->popup("ไม่พบกล่องไอเทม");
			  $api->go("index.php");
		  }
		  else if($box['box_price'] > $member['MallMoney'])
		  {
			  $api->popup("คุณมีจำนวน Cash ไม่เพียงพอต่อการเปิดกล่อง");
			  $api->go("index.php");
		  }
		  else if($api->chklogin($account) != 0)
		  {
			  $api->popup("กรุณาออกจากเกมส์ก่อนทำรายการทุกครั้งค่ะ");
			  $api->go("index.php");
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
			  // Add Item
			  $itemrand_sql = $sql->prepare("SELECT TOP 1 * FROM ".MSSQL_DB.".dbo.box_item_tbl WHERE id_box = :p1 ORDER BY NEWID()");
			  $itemrand_sql->BindParam(":p1",$id);
			  $itemrand_sql->execute();
			  $itemrand = $itemrand_sql->fetch(PDO::FETCH_ASSOC);
			  
			  $api->updatecash($account,$box['box_price']);
			 
			  $api->additem($userid,$itemrand['item_id'],$itemrand['item_count'],$itemrand['item_lock'],$itemrand['item_type']);
			  
			  $api->popup("♥ ยินดีด้วยค่ะ ท่านเปิดได้ไอเทม == ".$itemrand['item_name']." == กรุณาเช็คไอเท็มที่โกดังไอเทมมอล หรือโกดังเก็บของค่ะ ♥");
			  $api->go("randombox.php?id=".$id."");
		  }
	  }
	  ?>
      </p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><font color="#FFFFFF">บริการเช่าเว็บไซต์โดย <a style="color:#FFF;" href="https://www.facebook.com/gameserverapi/?fref=ts" target="_blank">Gamesv-api.com</a> ครบวงจรทุกเกมส์</font></td>
  </tr>
</table>
<p>&nbsp;</p><script>
function chglo() {
	location='index.php';
}
function yesno() {
if(confirm("ท่านต้องการเปิด <?php echo $box['box_name']; ?> หรือไม่ ?"))location='randombox.php?id=<?php echo $id; ?>&execute=random';
}
</script>
</body>
</html>