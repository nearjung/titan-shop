<?php
class API
{	
	public function img_ext($text)
	{
		$te = str_replace(".dds",".png",$text);
		return $te;
	}
	
	public function popup($text)
	{
		echo "<script>alert('".$text."');</script>";
	}
	
	public function go($link)
	{
		echo "<script>location='".$link."';</script>";
	}
	
	public function wait($link,$time)
	{
		echo '<script> window.setTimeout(function(){
        window.location.href = "'.$link.'"; }, '.$time.');</script>';
	}
	
	public function login($account,$password)
	{
		global $sql;
		$login_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebLogin :p1,:p2");
		$login_sql->BindParam(":p1",$account);
		$login_sql->BindParam(":p2",$password);
		$login_sql->execute();
		$login = $login_sql->fetch(PDO::FETCH_ASSOC);
		if(!$login)
		{
			$this->popup("ชื่อบัญชีหรือรหัสผ่านผิด");
		}
		else
		{
			$_SESSION['account'] = $login['id_loginid'];
			$_SESSION['password'] = $login['id_passwd'];
			session_write_close();
			$this->go("index.php");
		}
	}
	
	public function auth($id)
	{
		if($id == 2 || $id == 3)
		{
			$auth = "Game Master";
		}
		else if($id == 4)
		{
			$auth = "Banned";
		}
		else if($id == 6)
		{
			$auth = "Player";
		}
		else
		{
			$auth = "Error.";
		}
		return $auth;
	}
	
	public function refill_sendcard($user_no,$password)
	{
		global $access_ip;
		global $merchant_id;
		global $resp_url;
		global $sql;
		$curl = curl_init('https://203.146.127.112/tmpay.net/TPG/backend.php?merchant_id=' .$merchant_id. '&password=' . $password . '&resp_url=' . $resp_url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		curl_setopt($curl, CURLOPT_HEADER, FALSE);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
		$curl_content = curl_exec($curl);
		if($curl_content === false)
		{
			$curl_content = curl_errno($curl) . ':' . curl_error($curl);
		}
		curl_close($curl);
		if(strpos($curl_content,'SUCCEED') !== FALSE)
		{
			$num_zero = 0;
			$num_ten = 10;
			$insert = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebRefillTrueMoney :pw,:user,:amount,:stat");
			$insert->BindParam(":pw",$password);
			$insert->BindParam(":user",$user_no);
			$insert->BindParam(":amount",$num_zero);
			$insert->BindParam(":stat",$num_ten);
			$insert->execute();
			return TRUE;
		}
		else return $curl_content;
	}
	
	public function price_value($price)
	{
		if($price == 1)
		{
			$true = 50;
		}
		else if($price == 2)
		{
			$true = 90;
		}
		else if($price == 3)
		{
			$true = 150;
		}
		else if($price == 4)
		{
			$true = 300;
		}
		else if($price == 5)
		{
			$true = 500;
		}
		else if($price == 6)
		{
			$true = 1000;
		}
		else
		{
			$true = 0;
		}
		return $true;
	}
	
	public function status_card($status)
	{
		if($status == 0)
		{
			$s = "<strong>รหัสผิดพลาด</strong>";
		}
		else if($status == 1)
		{
			$s = "<strong><font color='green'>สำเร็จ</font></strong>";
		}
		else if($status == 3)
		{
			$s = "<strong><font color='red'>บัตรถูกใช้แล้ว</font></strong>";
		}
		else if($status == 4 )
		{
			$s = "<strong><font color='red'>รหัสบัตรไม่ถูกต้อง</font></strong>";
		}
		else if($status == 5 )
		{
			$s = "<strong><font color='red'>เป็นบัตรทรูมูฟ</font></strong>";
		}
		else if($status == 10 )
		{
			$s = "<strong><font color='red'>กำลังรอการตรวจสอบ</font></strong>";
		}
		return $s;
	}
	
	public function additem($userid,$itemid,$itemcount,$itemlock,$itemtype)
	{
		global $sql;
		$insert = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebInsertItem :p1,:p2,:p3,:p4,:p5");
		$insert->BindParam(":p1",$userid);
		$insert->BindParam(":p2",$itemid);
		$insert->BindParam(":p3",$itemcount);
		$insert->BindParam(":p4",$itemlock);
		$insert->BindParam(":p5",$itemtype);
		$insert->execute();
		if(!$insert)
		{
			$this->popup("เกิดข้อผิดพลาดขณะส่งไอเทม");
		}
	}
	
	public function deleteitem($id,$account)
	{
		global $sql;
		$delete = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebDeleteItemFromStore :p1,:p2");
		$delete->BindParam(":p1",$id);
		$delete->BindParam(":p2",$account);
		$delete->execute();
		if(!$delete)
		{
			$this->popup("เกิดข้อผิดพลาดขณะลบไอเทม");
		}
	}
	
	public function gander($sex)
	{
		if($sex == "m")
		{
			$gander = "ชาย";
		}
		else if($sex == "f")
		{
			$gander = "หญิง";
		}
		
		return $gander;
	}
	
	public function page_name($pg)
	{
		if($pg == "topup")
		{
			$page = "เติมเงินเข้าระบบ";
		}
		else if($pg == "onlinepoint")
		{
			$page = "ออนไลน์รับพ้อย";
		}
		else if($pg == "restate")
		{
			$page = "รีสเตตัส";
		}
		else if($pg == "reborn")
		{
			$page = "จุติ";
		}
		else if($pg == "chgjob")
		{
			$page = "เปลี่ยเทพ - มาร";
		}
		return $page;
	}
	
	public function charlist($userid)
	{
		global $sql;
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
				echo '<option value="'.$char['CHARACTER_IDX'].'">'.$char['CHARACTER_NAME'].'</option>';
			}
		}
	}
	
	public function chklogin($userid)
	{
		global $sql;
		$login_sql = $sql->prepare("SELECT COUNT(*) FROM MHCMember.dbo.LoginTable WHERE user_id = :p1");
		$login_sql->BindParam(":p1",$userid);
		$login_sql->execute();
		$login = $login_sql->fetchColumn();
		
		return $login;
	}
	
	public function charinfo($userid,$charid,$mode)
	{
		global $sql;
		$char_sql = $sql->prepare("EXEC ".MSSQL_DB.".dbo.WebGetCharacterByID :p1,:p2");
		$char_sql->BindParam(":p1",$userid);
		$char_sql->BindParam(":p2",$charid);
		$char_sql->execute();
		$char = $char_sql->fetch(PDO::FETCH_ASSOC);
		
		if($mode == 1)
		{
			$data = $char['CHARACTER_GRADEUPPOINT'];
		}
		else if($mode == 2)
		{
			$data = $char['reborn'];
		}
		else if($mode == 3)
		{
			$data = $char['CHARACTER_GRADE'];
		}
		else if($mode == 4)
		{
			$data = $char['CHARACTER_STAGE'];
		}
		else if($mode == 5)
		{
			$data = $char['CHARACTER_GRADEUPPOINT'];
		}
		
		return $data;
	}
	
	public function updatecash($account,$cash)
	{
		global $sql;
		$update = $sql->prepare("UPDATE MHCMember.dbo.chr_log_info SET MallMoney = MallMoney-:p1 WHERE id_loginid = :p2");
		$update->BindParam(":p1",$cash);
		$update->BindParam(":p2",$account);
		$update->execute();
		if(!$update)
		{
			$this->popup("เกิดข้อผิดพลาดขณะอัพเดทแคช");
		}
	}
	
	public function addcash($account,$cash)
	{
		global $sql;
		$update = $sql->prepare("UPDATE MHCMember.dbo.chr_log_info SET MallMoney = MallMoney+:p1 WHERE id_loginid = :p2");
		$update->BindParam(":p1",$cash);
		$update->BindParam(":p2",$account);
		$update->execute();
		if(!$update)
		{
			$this->popup("เกิดข้อผิดพลาดขณะอัพเดทแคช");
		}
	}
	
	public function faction($id)
	{
		if($id == 65)
		{
			$job = "จอมเทพ";
		}
		else if($id == 129)
		{
			$job = "จอมมาร";
		}
		
		return $job;
	}
	
	public function box_name($id)
	{
		global $sql;
		$box_sql1 = $sql->prepare("SELECT box_name FROM ".MSSQL_DB.".dbo.box_tbl WHERE id_box = :p1");
		$box_sql1->BindParam(":p1",$id);
		$box_sql1->execute();
		$box1 = $box_sql1->fetch(PDO::FETCH_ASSOC);
		
		return $box1['box_name'];
	}
	
	public function admin_title($id)
	{
		$name = array("","จัดการบัญชี","เพิ่มบัญชี","แก้ไขประเภทไอเทมมอล","เพิ่มประเภทไอเทมมอล","แก้ไขไอเทมมอล","เพิ่มไอเทมมอล","ตั้งค่าจุติ","ตั้งค่าระบบเว็บไซต์","แก้ไขกล่องสุ่มไอเทม","แก้ไขไอเทมกล่องสุ่มไอเทม","เพิ่มไอเทมกล่องสุ่มไอเทม","เช็คประวัติการเติมเงิน","เพิ่มพ้อยเข้าไอดี");
		return $name[$id];
	}
	
	public function warehouse_item($userid,$slot)
	{
		global $sql;
		 // Get Item Bank Slot 1
				  $s90 = $slot;
				  $slot90_sql = $sql->prepare("SELECT * FROM mhgame.dbo.TB_ITEM WHERE ITEM_PYOGUKIDX = :p1 AND ITEM_POSITION = :p2");
				  $slot90_sql->BindParam(":p1",$userid);
				  $slot90_sql->BIndParam(":p2",$s90);
				  $slot90_sql->execute();
				  $slot90 = $slot90_sql->fetch(PDO::FETCH_ASSOC);
				  if(!empty($slot90['ITEM_PYOGUKIDX']))
				  {
					  // Get Item Description
					  $item90_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.item_db WHERE item_id = :p1");
					  $item90_sql->BindParam(":p1",$slot90['ITEM_IDX']);
					  $item90_sql->execute();
					  $item90 = $item90_sql->fetch(PDO::FETCH_ASSOC);
					  
					  // Get Image position
					  $imgpos90_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.item_image_db WHERE image_id = :p1");
					  $imgpos90_sql->BindParam(":p1",$item90['item_image']);
					  $imgpos90_sql->execute();
					  $imgpos90 = $imgpos90_sql->fetch(PDO::FETCH_ASSOC);
					  
					  // Get Image Path
					  $imgitem90 = $imgpos90['image_name']+1;
					  $path90_sql = $sql->prepare("SELECT * FROM ".MSSQL_DB.".dbo.item_imagepath_db WHERE image_id = :p1");
					  $path90_sql->BindParam(":p1",$imgitem90);
					  $path90_sql->execute();
					  $path90 = $path90_sql->fetch(PDO::FETCH_ASSOC);
					  
					  $imgreplace90 = str_replace("tif","png",$path90['image_path']);
					  $finalreplace90 = str_replace("./image/","images/",$imgreplace90);
					  
                  	echo '<a href="createitem2.php?mode=1&id='.$slot90['ITEM_DBIDX'].'"><div style="background-image:url('.$finalreplace90.'); background-position-x:-'.$imgpos90['pos_x'].'px; background-position-y:-'.$imgpos90['pos_y'].'px; width: 40px; height: 40px;"><img src="images/translate.png" class="tooltip" title="'.$item90['item_name'].'" height="40" width="40" /></div></a>';
				  }
	}
	
	public function jobclass($id)
	{
		if($id == 65)
		{
			$job = 'จอมเทพ';
		}
		else if($id == 129)
		{
			$job = 'จอมมาร';
		}
		else
		{
			$job = 'ยังไม่เปลี่ยนเทพ/มาร';
		}
		return $job;
	}
}
?>