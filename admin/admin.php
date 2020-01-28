<?php
session_start();
include_once("admin_portal.php");

$id = $_GET['page'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ระบบ Admin Panel</title>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<link href="../style/animate.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" height="1000" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="15%" align="center" valign="top" bgcolor="#150000"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="left_menu">
      <tr>
        <td height="39" align="center"><h3>ยินดีต้อนรับ <?php echo $admin_user; ?></h3></td>
      </tr>
      <tr>
        <td><a href="admin.php?page=1"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="14%" height="31"></td>
            <td width="86%">จัดการบัญชี</td>
          </tr>
        </table></a>
          <a href="admin.php?page=2"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มบัญชี</td>
            </tr>
          </table></a>
          <a href="admin.php?page=13"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มพ้อยเข้าไอดี</td>
            </tr>
          </table></a>
          <a href="admin.php?page=3">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขประเภทไอเทมมอล</td>
            </tr>
          </table>
          </a>
          <a href="admin.php?page=4"><table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มประเภทไอเทมมอล</td>
            </tr>
          </table></a>
          <a href="admin.php?page=5">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขไอเทมมอล</td>
            </tr>
          </table>
          </a><a href="admin.php?page=6">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มไอเทมมอล</td>
            </tr>
          </table></a>
          <a href="admin.php?page=7">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">ตั้งค่าจุติ</td>
            </tr>
          </table>
          </a><a href="admin.php?page=8">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">ตั้งค่าระบบเว็บไซต์</td>
            </tr>
          </table></a>
          <a href="admin.php?page=9">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขกล่องสุ่มไอเทม</td>
            </tr>
          </table>
          </a><a href="admin.php?page=10">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">แก้ไขไอเทมกล่องสุ่มไอเทม</td>
            </tr>
          </table></a>
          <a href="admin.php?page=11">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เพิ่มไอเทมกล่องสุ่มไอเทม</td>
            </tr>
          </table>
          </a><a href="admin.php?page=12">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">เช็คประวัติการเติมเงิน</td>
            </tr>
          </table></a>
          <a href="../logout.php">
          <table class="menu" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="14%" height="31"></td>
              <td width="86%">ออกจากระบบ</td>
            </tr>
          </table>
          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a>          <a href="admin.php?page=1">          </a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td width="85%" valign="top">
    <div class="animated fadeIn">
    <table class="main_box" width="100%">
      <tr>
        <td align="center"><strong><h1><?php echo $api->admin_title($id); ?></h1><hr /></strong></td>
      </tr>
      <tr>
        <td align="center"><?php
        if($id == 1)
		{
			echo '<table width="100%">
  <tr>
    <td colspan="4" align="center"><form name="searchaccount" method="post" action="">
      <label for="input"></label>
      <input class="txt01" type="text" name="input" id="input" placeholder="ใส่ชื่อไอดีที่ต้องการค้นหา" autocomplete="off">
      <input type="submit" name="search" id="search" value="ค้นหาไอดี">
    </form></td>
  </tr>
  <tr>
    <td width="11%" height="30" align="center" bgcolor="#282828"><strong><font color="#FFFFFF">ลำดับ</font></strong></td>
    <td width="39%" align="center" bgcolor="#282828"><strong><font color="#FFFFFF">ชื่อบัญชี</font></strong></td>
    <td width="25%" align="center" bgcolor="#282828"><strong><font color="#FFFFFF">รหัสผ่าน</font></strong></td>
    <td width="25%" align="center" bgcolor="#282828"><strong><font color="#FFFFFF">การกระทำ</font></strong></td>
  </tr>';
  // outlord
  if(!empty($_POST['search']))
  {
	  $searchingid = '%'.$_POST['input'].'%';
	  $acc_sql = $sql->prepare("SELECT * FROM MHCMember.dbo.chr_log_info WHERE id_loginid LIKE :p1");
	  $acc_sql->BindParam(":p1",$searchingid);
	  $acc_sql->execute();
  }
  else
  {
	  $acc_sql = $sql->prepare("SELECT * FROM MHCMember.dbo.chr_log_info");
	  $acc_sql->execute();
  }
  while($acc = $acc_sql->fetch(PDO::FETCH_ASSOC))
  {
	  echo '
  <tr class="tbl_hover">
    <td height="28" align="center">'.$acc['propid'].'</td>
    <td align="center">'.$acc['id_loginid'].'</td>
    <td align="center">'.$acc['id_passwd'].'</td>
    <td align="center"><a href="edit.php?page=1&id='.$acc['propid'].'">แก้ไข | <a href="delete.php?page=1&id='.$acc['propid'].'">ลบ</a></td>
  </tr>';
  }
echo '</table>';

		}
		else if($id == 2)
		{
			echo '<form name="addid" method="post" action="">
  <table width="100%">
    <tr>
      <td align="center"><label for="user"></label>
      <input class="txt01" type="text" name="user" id="user" placeholder="ชื่อบัญชี" autocomplete="off" required></td>
    </tr>
    <tr>
      <td align="center"><label for="pass"></label>
      <input class="txt01" type="text" name="pass" id="pass" placeholder="รหัสผ่าน" autocomplete="off" required></td>
    </tr>
    <tr>
      <td align="center"><label for="gander"></label>
        <label for="email"></label>
      <input class="txt01" type="email" name="email" id="email" placeholder="อีเมล" autocomplete="off" required></td>
    </tr>
    <tr>
      <td align="center"><label for="pin"></label>
      <input class="txt01" type="text" name="pin" id="pin" placeholder="รหัสลับ 4 หลัก" autocomplete="off" required></td>
    </tr>
    <tr>
      <td align="center"><input class="bt_login" type="submit" name="addaccount" id="addaccount" value="เพิ่มบัญชี"></td>
    </tr>
  </table>
</form>
';
			if($_POST['addaccount'])
			{
				$chk_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebAccInfo :p1");
				$chk_sql->BindParam(":p1",$_POST['user']);
				$chk_sql->execute();
				$chk = $chk_sql->fetch(PDO::FETCH_ASSOC);
				if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['email']) || empty($_POST['pin']))
				{
					$api->popup("กรุณากรอกให้ครบทุกช่อง");
				}
				else if($chk['id_loginid'] == $_POST['user'])
				{
					$api->popup("ชื่อบัญชี ".$_POST['user']." ถูกใช้แล้วค่ะ");
				}
				else
				{
					// Register
					$gander = "m";
					$register = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebRegister :p1,:p2,:p3,:p4,:p5,:p6");
					$register->BindParam(":p1",$_POST['user']);
					$register->BindParam(":p2",$_POST['pass']);
					$register->BindParam(":p3",$gander);
					$register->BindParam(":p4",$_POST['email']);
					$register->BindParam(":p5",$_POST['pin']);
					$register->BindParam(":p6",$ip);
					$register->execute();
					if(!$register)
					{
						$api->popup("เกิดข้อผิดพลาดขณะส่งข้อมูล");
					}
					else
					{
						echo '<div class="animated bounceIn"><font color="green">เพิ่มบัญชีสำเร็จ</font></div>';
					}
				}
			}
		}
		else if($id == 13)
		{
			echo '<form name="addpoints" action="" method="post"><table width="100%">
  <tr>
    <td align="center"><label for="point"></label>
      <input type="text" name="point" id="point" placeholder="จำนวนพ้อย" class="txt01" required="required"></td>
    </tr>
  <tr>
    <td align="center"><label for="account"></label>
      <input type="text" name="account" id="account" placeholder="ชื่อบัญชี" class="txt01" required="required"></td>
  </tr>
  <tr>
    <td align="center"><input type="submit" name="addpoint" id="addpoint" value="เพิ่มพ้อยเข้าไอดี" class="bt_login"></td>
  </tr>
</table>
</form>';
			if($_POST['addpoint'])
			{
				if(empty($_POST['point']) || empty($_POST['account']))
				{
					$api->popup("กรุณากรอกให้ครบทุกช่องด้วยค่ะ");
				}
				else if(!is_numeric($_POST['point']))
				{
					$api->popup("กรุณากรอกจำนวนพ้อยเป็นตัวเลขเท่านั้นค่ะ");
				}
				else
				{
					$api->addcash($_POST['account'],$_POST['point']);
					echo '<div class="animated bounceIn"><font color="green">เพิ่มพ้อยให้บัญชี '.$_POST['account'].' แล้วค่ะ</font></div>';
				}
			}
		}
		else if($id == 3)
		{
			echo '<table width="100%">
  <tr>
    <td height="26" align="center" bgcolor="#1B1B1B"><font color="#FFFFFF">ชื่อหมวดหมู่</font></td>
    <td align="center" bgcolor="#1B1B1B"><font color="#FFFFFF">กระทำ</font></td>
  </tr>';
  // Mall
  $mallcat_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.shop_catalog_tbl");
  $mallcat_sql->execute();
  while($mallcat = $mallcat_sql->fetch(PDO::FETCH_ASSOC))
  {
  echo '<tr class="tbl_hover">
    <td align="center" height="28">'.$mallcat['catalog_name'].'</td>
    <td align="center"><a href="edit.php?page=3&id='.$mallcat['id'].'">แก้ไข</a> | <a href="delete.php?page=3&id='.$mallcat['id'].'">ลบ</a></td>
  </tr>';
  }
  echo '
</table>
';
		}
		else if($id == 4)
		{
			echo '<form action="" method="post" name="addshopcatalog" id="addshopcatalog">
  <table width="100%">
    <tr>
      <td align="center"><label for="catalog_name"></label>
      <input name="catalog_name" type="text" class="txt01" id="catalog_name" placeholder="ชื่อหมวดหมู่"></td>
    </tr>
    <tr>
      <td align="center"><input name="addcatalog" type="submit" class="bt_login" id="addcatalog" value="เพิ่มหมวดหมู่"></td>
    </tr>
  </table>

</form>
';
			if($_POST['addcatalog'])
			{
				if(empty($_POST['catalog_name']))
				{
					$api->popup("กรุณากรอกชื่อหมวดหมู่");
				}
				else
				{
					// เพิ่มหมวดหมู่
					$addcat = $sql->prepare("INSERT INTO ".MSSQL_DB.".dbo.shop_catalog_tbl(catalog_name) VALUES(:p1)");
					$addcat->BindParam(":p1",$_POST['catalog_name']);
					$addcat->execute();
					if(!$addcat)
					{
						$api->popup("เกิดข้อผิดพลาดขณะทำการเพิ่มหมวดหมู่");
					}
					else
					{
						$api->popup("ทำการเพิ่มหมวดหมู่ ".$_POST['catalog_name']." สำเร็จ");
					}
				}
			}
		}
		else if($id == 5)
		{
			echo '<table width="100%">
  <tr>
    <td height="28" align="center" bgcolor="#1A1A1A"><font color="#FFFFFF">ชื่อไอเทม</font></td>
    <td align="center" bgcolor="#1A1A1A"><font color="#FFFFFF">หมวดหมู่</font></td>
    <td align="center" bgcolor="#1A1A1A"><font color="#FFFFFF">กระทำ</font></td>
  </tr>';
  $itemmall_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.shop_tbl");
  $itemmall_sql->execute();
  while($itemmall = $itemmall_sql->fetch(PDO::FETCH_ASSOC))
  {
	  // Catalog
	  $catalog_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.shop_catalog_tbl WHERE id = :p1");
	  $catalog_sql->BindParam(":p1",$itemmall['id_catalog']);
	  $catalog_sql->execute();
	  $catalog = $catalog_sql->fetch(PDO::FETCH_ASSOC);
  	echo '<tr class="tbl_hover">
    <td height="25" align="center">'.$itemmall['item_name'].'</td>
    <td align="center">'.$catalog['catalog_name'].'</td>
    <td align="center"><a href="edit.php?page=5&id='.$itemmall['id'].'">แก้ไข<a> |<a href="delete.php?page=5&id='.$itemmall['id'].'"> ลบ</a></td>
  </tr>';
  }
  echo '
</table>
';
		}
		else if($id == 6)
		{
			echo '<form action="" method="post" enctype="multipart/form-data" name="additem"><table width="500" align="center">
  <tr>
    <td align="center"><label for="id_catalog"></label>
      <select class="selected_03" name="id_catalog" id="id_catalog">
        <option value="0">== กรุณาเลือกหมวดหมู่สินค้า ==</option>';
		$catalog_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.shop_catalog_tbl");
		$catalog_sql->execute();
		while($catalog = $catalog_sql->fetch(PDO::FETCH_ASSOC))
		{
			echo '<option value="'.$catalog['id'].'">'.$catalog['catalog_name'].'</option>';
		}
      echo '</select></td>
  </tr>
  <tr>
    <td align="center"><label for="itemid"></label>
      <input class="txt01" type="text" name="itemid" id="itemid" placeholder="รหัสไอเทม"></td>
  </tr>
  <tr>
    <td align="center"><input class="txt01" type="text" name="itemname" id="itemname" placeholder="ชื่อสินค้า"></td>
  </tr>
  <tr>
    <td align="center"><label for="iteminfo"></label>
      <textarea class="txtfield" name="iteminfo" id="iteminfo" cols="45" rows="5" placeholder="รายละเอียดสินค้า"></textarea></td>
  </tr>
  <tr>
    <td align="center"><label for="itemprice"></label>
      <input type="text" name="itemprice" id="itemprice" placeholder="ราคาสินค้า" class="txt01"></td>
  </tr>
  <tr>
    <td align="center"><label for="image"></label>
      <input type="file" name="image" id="image" placeholder="รูปภาพสินค้า" class="txt01">
      <br>
      รูปภาพสินค้าขนาด 90x90</td>
  </tr>
  <tr>
    <td align="center"><label for="maxcount"></label>
      <input type="text" name="maxcount" id="maxcount" placeholder="จำนวนสินค้าที่อนุญาติให้ซื้อต่อครั้ง" class="txt01"></td>
  </tr>
  <tr>
    <td align="center"><label for="itemlock"></label>
      <select name="itemlock" id="itemlock" class="selected_03">
        <option value="99" selected="selected">สถานะสินค้า</option>
        <option value="1">ผนึก</option>
        <option value="0">ไม่ผนึก</option>
      </select></td>
  </tr>
  <tr>
    <td align="center"><label for="itemtype"></label>
      <select name="itemtype" id="itemtype" class="selected_03">
        <option value="0">ประเภทสินค้า</option>
        <option value="1">โกดังปกติ</option>
        <option value="2">โกดังมอล</option>
      </select></td>
  </tr>
  <tr>
    <td align="center"><input class="bt_login" type="submit" name="addproduct" id="addproduct" value="เพิ่มสินค้า"></td>
  </tr>
</table>
</form>';
			if($_POST['addproduct'])
			{
				if(empty($_POST['id_catalog']) || empty($_POST['itemid']) || empty($_POST['itemname']) || empty($_POST['iteminfo']) || empty($_POST['itemprice']) || empty($_POST['itemprice']) || empty($_POST['maxcount']) || $_POST['itemlock'] == 99 || empty($_POST['itemtype']))
				{
					$api->popup("กรุณากรอกข้อมูลให้ครบทุกช่อง");
				}
				else if(!is_numeric($_POST['itemprice']))
				{
					$api->popup("กรุณากรอกราคาเป็นตัวเลขค่ะ");
				}
				else if(!is_numeric($_POST['itemid']))
				{
					$api->popup("กรุณากรอกรหัสไอเทมเป็นตัวเลขค่ะ");
				}
				else if(!is_uploaded_file($_FILES['image']['tmp_name']))
				{
					$api->popup("กรุณาเลือกรูปภาพสินค้าด้วยค่ะ");
				}
				else if($_FILES['image']['size'] > 1048576)
				{
					$api->popup("ขนาดรูปภาพต้องไม่เกิน 1MB ค่ะ");
				}
				else
				{
					$time = time();
					$filename = "".strtoupper(substr(md5($time),0,10)."-".$_FILES["image"]["name"]."");
					move_uploaded_file($_FILES["image"]["tmp_name"],"../images/items/".$filename."");
					
					// Add Item
					$additem = $sql->prepare("INSERT INTO ".MSSQL_DB.".dbo.shop_tbl(id_catalog,item_id,item_name,item_description,item_price,item_image,max_count,item_lock,item_type) VALUES(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)");
					$additem->BindParam(":p1",$_POST['id_catalog']);
					$additem->BindParam(":p2",$_POST['itemid']);
					$additem->BindParam(":p3",$_POST['itemname']);
					$additem->BindParam(":p4",$_POST['iteminfo']);
					$additem->BindParam(":p5",$_POST['itemprice']);
					$additem->BindParam(":p6",$filename);
					$additem->BindParam(":p7",$_POST['maxcount']);
					$additem->BindParam(":p8",$_POST['itemlock']);
					$additem->BindParam(":p9",$_POST['itemtype']);
					$additem->execute();
					if(!$additem)
					{
						$api->popup("เกิดข้อผิดพลาดขณะเพิ่มไอเทม");
					}
					else
					{
						$api->popup("เพิ่มไอเทม ".$_POST['itemname']." สำเร็จเรียบร้อย");
						$api->go("admin.php?page=6");
					}
				}
			}
		}
		else if($id == 7)
		{
			echo '<table width="500" align="center">
  <tr>
    <td align="center"><p>&lt;&lt; เพิ่มรอบจุติ &gt;&gt;</p>
    <p>การจุติเลขจะต้องเรียง 1 2 3 4 5 ไปเรื่อย ๆ นะครับจะข้ามเลขไม่ได้</p></td>
  </tr>
  <tr>
    <td><table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="89" height="27" align="center" bgcolor="#1F1F1F"><font color="#FFFFFF">จุติครั้งที่</font></td>
        <td width="157" align="center" bgcolor="#1F1F1F"><font color="#FFFFFF">ราคาจุติ</font></td>
        <td width="123" align="center" bgcolor="#1F1F1F"><font color="#FFFFFF">เลเวลในการจุติ</font></td>
        <td width="123" align="center" bgcolor="#1F1F1F">&nbsp;</td>
      </tr>';
	  $reborn_sql = $sql->prepare("SELECT * FROM reborn_setting ORDER BY reborn_time ASC");
	  $reborn_sql->execute();
	  while($reborn = $reborn_sql->fetch(PDO::FETCH_ASSOC))
	  {
		  echo '
      <tr>
        <td align="center" height="25">'.$reborn['reborn_time'].'</td>
        <td align="center">'.$reborn['reborn_price'].'</td>
        <td align="center">'.$reborn['reborn_level'].'</td>
        <td align="center">แก้ไข | ลบ</td>
      </tr>';
	  }
	  echo '
    </table></td>
  </tr>
</table>
';
		}
		else if($id == 8)
		{
			echo '<form name="serversetup" action="" method="post"><table width="700" align="center">
  <tr>
    <td align="right">สถานะเว็บไซต์ :</td>
    <td><label for="site_status"></label>
      <select name="site_status" id="site_status">
        <option value="0" '; if($system['site_status'] == 0){ echo 'selected="selected"'; } echo '>ปิด</option>
        <option value="1" '; if($system['site_status'] == 1){ echo 'selected="selected"'; } echo '>เปิด</option>
      </select></td>
  </tr>
  <tr>
    <td align="right">กล่องสุ่มไอเทม :</td>
    <td><select name="random_box" id="random_box">
      <option value="0" '; if($system['random_box'] == 0){ echo 'selected="selected"'; } echo '>ปิด</option>
      <option value="1" '; if($system['random_box'] == 1){ echo 'selected="selected"'; } echo '>เปิด</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">ชื่อเซิฟเวอร์ :</td>
    <td><label for="server_name"></label>
      <input type="text" name="server_name" id="server_name" value="'.$system['server_name'].'" /></td>
  </tr>
  <tr>
    <td align="right">รีสเตตัส :</td>
    <td><select name="restatus" id="restatus">
      <option value="0" '; if($system['restatus'] == 0){ echo 'selected="selected"'; } echo '>ปิด</option>
      <option value="1" '; if($system['restatus'] == 1){ echo 'selected="selected"'; } echo '>เปิด</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">ราคารีสเตตัส :</td>
    <td><label for="restatus_price"></label>
      <input type="text" name="restatus_price" id="restatus_price" value="'.$system['restatus_price'].'" /></td>
  </tr>
  <tr>
    <td align="right">จุติ :</td>
    <td><select name="reborn" id="reborn">
      <option value="0" '; if($system['reborn'] == 0){ echo 'selected="selected"'; } echo '>ปิด</option>
      <option value="1" '; if($system['reborn'] == 1){ echo 'selected="selected"'; } echo '>เปิด</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">ระบบอีเมล :</td>
    <td><select name="mail_system" id="mail_system">
      <option value="0" '; if($system['mail_system'] == 0){ echo 'selected="selected"'; } echo '>ปิด</option>
      <option value="1" '; if($system['mail_system'] == 1){ echo 'selected="selected"'; } echo '>เปิด</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">อีเมล Admin :</td>
    <td><label for="admin_email"></label>
      <input type="text" name="admin_email" id="admin_email" value="'.$system['admin_email'].'" /></td>
  </tr>
  <tr>
    <td align="right">เวลาออนไลน์แลกพ้อย (นาที) :</td>
    <td><label for="online_time"></label>
      <input type="text" name="online_time" id="online_time" value="'.$system['online_time'].'" /></td>
  </tr>
  <tr>
    <td align="right">พ้อยที่แลกจากเวลาออนไลน์ :</td>
    <td><label for="online_point"></label>
      <input type="text" name="online_point" id="online_point" value="'.$system['online_point'].'" /></td>
  </tr>
  <tr>
    <td align="right">แต้มที่ได้จากการรีสเตตัส&nbsp;:</td>
    <td><label for="restatus_point"></label>
      <input type="text" name="restatus_point" id="restatus_point" value="'.$system['restatus_point'].'" /></td>
  </tr>
  <tr>
    <td align="right">รีสเตตัสได้ตอนเลเวล :</td>
    <td><label for="restatus_level"></label>
      <input type="text" name="restatus_level" id="restatus_level" value="'.$system['restatus_level'].'" /></td>
  </tr>
  <tr>
    <td align="right">โหมดรูปภาพ :</td>
    <td><select name="image_mode" id="image_mode">
      <option value="0" '; if($system['image_mode'] == 0){ echo 'selected="selected"'; } echo '>อัพโหลดเอง</option>
      <option value="1" '; if($system['image_mode'] == 1){ echo 'selected="selected"'; } echo '>รูปภาพจากระบบ</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input class="bt_login" type="submit" name="updatesite" id="updatesite" value="บันทึกการตั้งค่า" /></td>
    </tr>
</table>
</form>';
			if($_POST['updatesite'])
			{
				if(empty($_POST['server_name']))
				{
					$api->popup("กรุณากรอกชื่อเซิฟเวอร์");
				}
				else
				{
					// Count System
					$cntsystem_sql = $sql->prepare("SELECT COUNT(*) FROM ".MSSQL_DB.".dbo.setting_tbl");
					$cntsystem_sql->execute();
					$cntsystem = $cntsystem_sql->fetchColumn();
					if($cntsystem == 0)
					{
						// Insert
						$insert = $sql->prepare("INSERT INTO ".MSSQL_DB.".dbo.setting_tbl(id,site_status,random_box,server_name,restatus,restatus_price,reborn,mail_system,admin_email,online_time,online_point,restatus_point,restatus_level,image_mode) VALUES(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9,:p10,:p11,:p12,:p13,:p14)");
						$insert->BindParam(":p1",$true_0);
						$insert->BindParam(":p2",$_POST['site_status']);
						$insert->BindParam(":p3",$_POST['random_box']);
						$insert->BindParam(":p4",$_POST['server_name']);
						$insert->BindParam(":p5",$_POST['restatus']);
						$insert->BindParam(":p6",$_POST['restatus_price']);
						$insert->BindParam(":p7",$_POST['reborn']);
						$insert->BindParam(":p8",$_POST['mail_system']);
						$insert->BindParam(":p9",$_POST['admin_email']);
						$insert->BindParam(":p10",$_POST['online_time']);
						$insert->BindParam(":p11",$_POST['online_point']);
						$insert->BindParam(":p12",$_POST['restatus_point']);
						$insert->BindParam(":p13",$_POST['restatus_level']);
						$insert->BindParam(":p14",$_POST['image_mode']);
						$insert->execute();
						if(!$insert)
						{
							$api->popup("เกิดข้อผิดพลาดขณะบันทึกข้อมูล");
						}
						else
						{
							$api->popup("บันทึกข้อมูลสำเร็จค่ะ");
							$api->go("admin.php?page=8");
						}
					}
					else
					{
						// Update
						$update = $sql->prepare("UPDATE ".MSSQL_DB.".dbo.setting_tbl SET site_status = :p1,random_box = :p2,server_name = :p3, restatus = :p4, restatus_price = :p5, reborn = :p6, mail_system = :p7, admin_email = :p8, online_time = :p9, online_point = :p10, restatus_point = :p11, restatus_level = :p12, image_mode = :p13");
						$update->BindParam(":p1",$_POST['site_status']);
						$update->BindParam(":p2",$_POST['random_box']);
						$update->BindParam(":p3",$_POST['server_name']);
						$update->BindParam(":p4",$_POST['restatus']);
						$update->BindParam(":p5",$_POST['restatus_price']);
						$update->BindParam(":p6",$_POST['reborn']);
						$update->BindParam(":p7",$_POST['mail_system']);
						$update->BindParam(":p8",$_POST['admin_email']);
						$update->BindParam(":p9",$_POST['online_time']);
						$update->BindParam(":p10",$_POST['online_point']);
						$update->BindParam(":p11",$_POST['restatus_point']);
						$update->BindParam(":p12",$_POST['restatus_level']);
						$update->BindParam(":p13",$_POST['image_mode']);
						$update->execute();
						if(!$update)
						{
							$api->popup("ไม่สามารถบันทึกข้อมูลได้");
						}
						else
						{
							$api->popup("บันทึกข้อมูลสำเร็จค่ะ");
							$api->go("admin.php?page=8");
						}
					}
				}
			}
		}
		else if($id == 9)
		{
			echo '<table width="700" align="center">
    <tr>
      <td colspan="2" align="center"><strong>กล่องจะมีลำดับ 1 2 3 4 5 เท่านั้นครับผม</strong></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%">
        <tr>
          <td width="13%" height="31" align="center" bgcolor="#333333"><strong><font color="#FFFFFF">ลำดับกล่อง</font></strong></td>
          <td width="42%" align="center" bgcolor="#333333"><strong><font color="#FFFFFF">ชื่อกล่อง</font></strong></td>
          <td width="24%" align="center" bgcolor="#333333"><strong><font color="#FFFFFF">ราคากล่อง</font></strong></td>
          <td width="21%" align="center" bgcolor="#333333">&nbsp;</td>
        </tr>';
		// Box
		$box_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.box_tbl ORDER BY id_box ASC");
		$box_sql->execute();
		while($box = $box_sql->fetch(PDO::FETCH_ASSOC))
		{
			echo '
        <tr>
          <td height="26" align="center">'.$box['id_box'].'</td>
          <td align="center">'.$box['box_name'].'</td>
          <td align="center">'.number_format($box['box_price']).'</td>
          <td align="center">แก้ไข</td>
        </tr>';
		}
		echo '
      </table></td>
    </tr>
</table>';
		}
		else if($id == 10)
		{
			echo '<table width="700" align="center">
  <tr>
    <td width="272" height="25" align="center" bgcolor="#333333"><font color="#FFFFFF">ชื่อไอเทม</font></td>
    <td width="265" align="center" bgcolor="#333333"><font color="#FFFFFF">ประเภท</font></td>
    <td width="147" align="center" bgcolor="#333333">&nbsp;</td>
  </tr>
  <tr>
    <td height="26" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">แก้ไข | ลบ</td>
  </tr>
</table>
';
		}
		?></td>
      </tr>
    </table>
    </div>
    </td>
  </tr>
</table>
</body>
</html>