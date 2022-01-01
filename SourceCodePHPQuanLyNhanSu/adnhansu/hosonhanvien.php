<?php
require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");

$member_id = addslashes($_SESSION['member_id']);

	//===================================================
	// Update
	//===================================================
 	$submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Add News') { 
   	$userfile1 = intval( $_POST["userfile1"] );
	$images1 = $_FILES['userfile1']['name'];
    $rand_numb1 = time();
    $images3 = "$images1";
    $uploaddir1 = '../images/news/'; // remember the trailing slash! 
    $uploadfile1 = "$uploaddir1"."$images3"; 
    if($_FILES['userfile1']['name']==''){
  //neu hinh anh  rong thi khong chen anh 
    @mysql_query("UPDATE qlns_administrator SET ctn_counterdb=ctn_counterdb+1 WHERE ctn_id='$member_id'");
	$donvi = intval($_POST['donvi']); 
	$manv=$_POST['manv'];
    $phongban = intval($_POST['phongban']);
	$chucvu = intval($_POST['chucvu']);	
	$qlns_mahsnv = $donvi."".$phongban."".$chucvu."".$manv;
	$honv = $_POST['honv'];
 	$tennv = $_POST['tennv'];
 	$hovaten=$honv." ".$tennv;
	$ngaysinh = $_POST['ngaysinh'];
	$gioitinh = intval($_POST['gioitinh']);
	$email = $_POST['email'];
	$ngayvaoct = $_POST['ngayvaoct'];
	$cmnd = $_POST['cmnd'];
	$tinhtrang=intval($_POST['tinhtrang']);
	$noidung = $_POST['noidung'];
	$tuoinv = $_POST['tuoinv'];
	$noisinh = $_POST['noisinh'];
	$quanhuyenns = $_POST['quanhuyenns'];
	$tinhthanhns = $_POST['tinhthanhns'];
	$quequan = $_POST['quequan'];
	$quanhuyenqq = $_POST['quanhuyenqq'];
	$tinhthanhqq = $_POST['tinhthanhqq'];
	$thuongtru = $_POST['thuongtru'];
	$quanhuyenthuongtru = $_POST['quanhuyenthuongtru'];
	$tinhthanhthuongtru = $_POST['tinhthanhthuongtru'];
	$tamtru = $_POST['tamtru'];
	$quanhuyentamtru = $_POST['quanhuyentamtru'];
	$tinhthanhtamtru = $_POST['tinhthanhtamtru'];
	$hinhthuctuyen = $_POST['hinhthuctuyen'];
	$noicap = $_POST['noicap'];
	$ngaycap = $_POST['ngaycap'];
	$dantoc = $_POST['dantoc'];
	$tongiao = $_POST['tongiao'];
	$chucdanh = $_POST['chucdanh'];
	
    $ngaytk=date("j-n-Y");
    $cmndkt=$_REQUEST['cmnd'];
    
    //them ly lich nhan vien
    $trinhdo=$_POST['trinhdo'];
    $chuyenmon=$_POST['chuyenmon'];
    $vanbangkhac=$_POST['vanbangkhac'];
    $tthn=intval($_POST['tthn']);
    $quoctich=$_POST['quoctich'];
    $dienthoainha=$_POST['dtnha'];
    $dtdd=$_POST['dtdd'];

    $manv=$_REQUEST['manv'];
    $sqlkiemtra=@mysql_query("select * from qlns_hosonhanvien where qlns_manv=$manv");
    $rowkiemtra=@mysql_num_rows($sqlkiemtra);
    if($rowkiemtra){
     echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=hosonhanvien.php">
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><fieldset style="padding: 2; width:312px; height:59px">
	<legend>Please stand by ...
	  </legend>
	  <p align="center">
		<b><font color=red>Mã Nhân Viên đã có hoặc Mã số CMND đã có.Bạn nhập mã số khác</font></b><br>
		<br>
      <img src="images/loading1.gif" width="150" height="13" border="0"> 
      <br>
      <br>(<a href="hosonhanvien.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
	exit;	
    }
   else {  
   	$sqlkiemtra1=@mysql_query("select * from qlns_hosonhanvien where qlns_macmnd=$cmndkt");
    $rowkiemtra1=@mysql_num_rows($sqlkiemtra1); 
    if($rowkiemtra1){
     echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=hosonhanvien.php">
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><fieldset style="padding: 2; width:312px; height:59px">
	<legend>Please stand by ...
	  </legend>
	  <p align="center">
		<b><font color=red>Mã Nhân Viên đã có hoặc Mã số CMND đã có.Bạn nhập mã số khác</font></b><br>
		<br>
      <img src="images/loading1.gif" width="150" height="13" border="0"> 
      <br>
      <br>(<a href="hosonhanvien.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
	exit;	
    }
    else {
  $qv =@mysql_query("INSERT INTO qlns_hosonhanvien(qlns_mact,qlns_mabp,qlns_macv,qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_hovaten,qlns_ngaysinh,qlns_tuoinv,qlns_noisinh,qlns_quanns,qlns_tinhthanhns,qlns_quequan,qlns_quanqq,qlns_tinhthanhqq,qlns_tamtru,qlns_quantt,qlns_tinhthanhtt,qlns_gioitinh,qlns_email,qlns_trinhdo,qlns_chuyenmon,qlns_vanbangkhac,qlns_chucdanh,qlns_nvcongty,qlns_tinhtrangnv,qlns_macmnd,qlns_noicap,qlns_ngaycap,qlns_ghichu,qlns_tinhtranghn,qlns_quoctich,qlns_dienthoainha,qlns_dthoaididong,qlns_diachi,qlns_quandc,qlns_tinhthanhdc,qlns_dantoc,qlns_tongiao,qlns_hinhthuctuyen) VALUES('$donvi','$phongban','$chucvu','$manv','$qlns_mahsnv','$honv','$tennv','$hovaten','$ngaysinh','$tuoinv','$noisinh','$quanhuyenns','$tinhthanhns','$quequan','$quanhuyenqq','$tinhthanhqq','$tamtru','$tinhthanhtamtru','$quanhuyentamtru','$gioitinh','$email','$trinhdo','$chuyenmon','$vanbangkhac','$chucdanh','$ngayvaoct','$tinhtrang','$cmnd','$noicap','$ngaycap','$noidung','$tthn','$quoctich','$dienthoainha','$dtdd','$thuongtru','$quanhuyenthuongtru','$tinhthanhthuongtru','$dantoc','$tongiao','$hinhthuctuyen')");
    if($qv==false){ echo"Loi".@mysql_error(); }
   
   echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=hosonhanvien.php">
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><fieldset style="padding: 2; width:312px; height:59px">
	<legend>Please stand by ...
	  </legend>
	  <p align="center">
		<b><font color=red>B&#7840;N &#272;&#7842; C&#7852;P NH&#7852;T TH&#192;NH C&#212;NG</font></b><br>
		<br>
      <img src="images/loading1.gif" width="150" height="13" border="0"> 
      <br>
      <br>(<a href="hosonhanvien.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
	exit;
	}
	       }  
	}
   elseif($_FILES['userfile1']['name']) {   // chen anh vao co so du lieu
    	
    	    if(!getimagesize($_FILES['userfile1']['tmp_name'])){ 
		        echo '<br><br><br><br><br><center><font color=red><B>D&#7919; li&#7879;u b&#7841;n Upload kh&#244;ng ph&#7843;i &#273;&#7883;nh d&#7841;ng &#7843;nh.</B></font></center>'; 
	            
	           exit;
		       }
            else { 
    	
  if ((move_uploaded_file($_FILES['userfile1']['tmp_name'], $uploadfile1))) 
  { 
    @mysql_query("UPDATE qlns_administrator SET ctn_counterdb=ctn_counterdb+1 WHERE ctn_id='$member_id'");
	$donvi = intval($_POST['donvi']); 
	$manv=$_POST['manv'];
	$phongban = intval($_POST['phongban']);
	$chucvu = intval($_POST['chucvu']);
	$qlns_mahsnv = $donvi."".$phongban."".$chucvu."".$manv;
	$honv = $_POST['honv'];
 	$tennv = $_POST['tennv'];
 	$hovaten=$honv." ".$tennv;
	$ngaysinh = $_POST['ngaysinh'];
	$gioitinh = intval($_POST['gioitinh']);
	$email = $_POST['email'];
	$ngayvaoct = $_POST['ngayvaoct'];
	$cmnd = $_POST['cmnd'];
	$tinhtrang=intval($_POST['tinhtrang']);
	$noidung = $_POST['noidung'];
	$dienthoainha=$_POST['dtnha'];
    $ngaytk=date("j-n-Y");
    
    
    $tuoinv = $_POST['tuoinv'];
	$noisinh = $_POST['noisinh'];
	$quanhuyenns = $_POST['quanhuyenns'];
	$tinhthanhns = $_POST['tinhthanhns'];
	$quequan = $_POST['quequan'];
	$quanhuyenqq = $_POST['quanhuyenqq'];
	$tinhthanhqq = $_POST['tinhthanhqq'];
	$thuongtru = $_POST['thuongtru'];
	$quanhuyenthuongtru = $_POST['quanhuyenthuongtru'];
	$tinhthanhthuongtru = $_POST['tinhthanhthuongtru'];
	$tamtru = $_POST['tamtru'];
	$quanhuyentamtru = $_POST['quanhuyentamtru'];
	$tinhthanhtamtru = $_POST['tinhthanhtamtru'];
	$hinhthuctuyen = $_POST['hinhthuctuyen'];
	$noicap = $_POST['noicap'];
	$ngaycap = $_POST['ngaycap'];
	$dantoc = $_POST['dantoc'];
	$tongiao = $_POST['tongiao'];
	$chucdanh = $_POST['chucdanh'];
    
    
    //them ly lich nhan vien
    $trinhdo=$_POST['trinhdo'];
    $chuyenmon=$_POST['chuyenmon'];
    $vanbangkhac=$_POST['vanbangkhac'];
    $tthn=intval($_POST['tthn']);
    $quoctich=$_POST['quoctich'];
    $dienthoainha=$_POST['dtnha'];
    $dtdd=$_POST['dtdd'];
    
    $cmndkt=$_REQUEST['cmnd'];
    $manv=$_REQUEST['manv'];
    $sqlkiemtra=@mysql_query("select * from qlns_hosonhanvien where qlns_manv=$manv");
    $rowkiemtra=@mysql_num_rows($sqlkiemtra);
    if($rowkiemtra){
     echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=hosonhanvien.php">
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><fieldset style="padding: 2; width:312px; height:59px">
	<legend>Please stand by ...
	  </legend>
	  <p align="center">
		<b><font color=red>Mã Nhân Viên đã có hoặc Mã số CMND đã có.Bạn nhập mã số khác</font></b><br>
		<br>
      <img src="images/loading1.gif" width="150" height="13" border="0"> 
      <br>
      <br>(<a href="hosonhanvien.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
	exit;	
    }
    else {
    $sqlkiemtra1=@mysql_query("select * from qlns_hosonhanvien where qlns_macmnd=$cmndkt");
    $rowkiemtra1=@mysql_num_rows($sqlkiemtra1); 
    if($rowkiemtra1){
     echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=hosonhanvien.php">
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><fieldset style="padding: 2; width:312px; height:59px">
	<legend>Please stand by ...
	  </legend>
	  <p align="center">
		<b><font color=red>Mã Nhân Viên đã có hoặc Mã số CMND đã có.Bạn nhập mã số khác</font></b><br>
		<br>
      <img src="images/loading1.gif" width="150" height="13" border="0"> 
      <br>
      <br>(<a href="hosonhanvien.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
	exit;	
    }
    else {	
    $qv =@mysql_query("INSERT INTO qlns_hosonhanvien(qlns_mact,qlns_mabp,qlns_macv,qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_hovaten,qlns_ngaysinh,qlns_tuoinv,qlns_noisinh,qlns_quanns,qlns_tinhthanhns,qlns_quequan,qlns_quanqq,qlns_tinhthanhqq,qlns_tamtru,qlns_quantt,qlns_tinhthanhtt,qlns_gioitinh,qlns_email,qlns_trinhdo,qlns_chuyenmon,qlns_vanbangkhac,qlns_chucdanh,qlns_nvcongty,qlns_anhnvien,qlns_tinhtrangnv,qlns_macmnd,qlns_noicap,qlns_ngaycap,qlns_ghichu,qlns_tinhtranghn,qlns_quoctich,qlns_dienthoainha,qlns_dthoaididong,qlns_diachi,qlns_quandc,qlns_tinhthanhdc,qlns_dantoc,qlns_tongiao,qlns_hinhthuctuyen) VALUES('$donvi','$phongban','$chucvu','$manv','$qlns_mahsnv','$honv','$tennv','$hovaten','$ngaysinh','$tuoinv','$noisinh','$quanhuyenns','$tinhthanhns','$quequan','$quanhuyenqq','$tinhthanhqq','$tamtru','$tinhthanhtamtru','$quanhuyentamtru','$gioitinh','$email','$trinhdo','$chuyenmon','$vanbangkhac','$chucdanh','$ngayvaoct','$images3','$tinhtrang','$cmnd','$noicap','$ngaycap','$noidung','$tthn','$quoctich','$dienthoainha','$dtdd','$thuongtru','$quanhuyenthuongtru','$tinhthanhthuongtru','$dantoc','$tongiao','$hinhthuctuyen')");	
    
    if($qv==false){ echo"Lỗi ".@mysql_error(); }
   echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=hosonhanvien.php">
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><fieldset style="padding: 2; width:312px; height:59px">
	<legend>Please stand by ...
	  </legend>
	  <p align="center">
		<b><font color=red>B&#7840;N &#272;&#7842; C&#7852;P NH&#7852;T TH&#192;NH C&#212;NG</font></b><br>
		<br>
      <img src="images/loading1.gif" width="150" height="13" border="0"> 
      <br>
      <br>(<a href="hosonhanvien.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
	exit;
	}
            }
            } 
		else { 
        echo '<br><br><br><br><br><center><font color=red><B>File b&#7841;n Upload kh&#244;ng ph&#7843;i &#273;&#7883;nh d&#7841;ng &#7842;nh!</B></font></center>'; 
        exit;
       } 
   	  		} 
   	   }
   }

	//===================================================
	// Reupdate
	//===================================================
  	$submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Update')
  {
  	//-------------------------------------------------
  	//  Reupload images
  	//-------------------------------------------------
  	
	if ( $_FILES['userfile1']['name'] )
  	{
  	   if($_FILES['userfile1']['name'] == ''){ 
		       echo("<br><br><br><br><br><center><font color=red><B>H&#7843;y ch&#7885;n &#7842;nh c&#7847;n Upload cho s&#7843;n ph&#7849;m tr&#432;&#7899;c khi k&#7871;t th&#250;c!</B></font></center>"); 
		       exit;
		       } 
	   else if($_FILES['userfile1']['size'] == 0) { 
		       echo '<center><font color=red><B>C&#243; l&#7895;i x&#7843;y ra trong qu&#225; tr&#236;nh Upload. Vui l&#242;ng ki&#7875;m tra l&#7841;i.</B></font></center>'; 
		    	exit;
		       } 
		else if($_FILES['userfile1']['size'] > $_POST["MAX_FILE_SIZE"]) { 
		        echo '<br><br><br><br><br><center><font color=red><B>&#7842;nh b&#7841;n Upload qu&#225; l&#7899;n. Vui l&#242;ng ch&#7885;n &#7842;nh b&#233; h&#417;n.</B></font></center>'; 
		       exit;
		       } 
		else if(!getimagesize($_FILES['userfile1']['tmp_name'])){ 
		        echo '<br><br><br><br><br><center><font color=red><B>D&#7919; li&#7879;u b&#7841;n Upload kh&#244;ng ph&#7843;i &#273;&#7883;nh d&#7841;ng &#7843;nh.</B></font></center>'; 
	           exit;
		       } 
	    else
		{
        $id = intval( $_GET["id"] );
	  	$sql_select = @mysql_query("SELECT * FROM qlns_hosonhanvien WHERE qlns_hsnv='$id'");
	  	$result_select = @mysql_fetch_array($sql_select);
	  	@unlink("../images/news/".$result_select["images"]);
	    $rand_numb =  time();
		$neu_name = "$rand_numb"."$imgfile_name";
		$final_filename = str_replace(" ", "_", $neu_name);
		$newfile = $uploaddir . "/$final_filename";
		$images1 = $_FILES['userfile1']['name'];		
        $images_small = "News_"."$images1";
        $uploaddir = '../images/news/'; // remember the trailing slash! 
		$uploadfile = "$uploaddir"."$images_small"; 
		@copy($_FILES['userfile1']['tmp_name'], $uploadfile) or die ("Kh&#244;ng th&#7875; upload file");
		}
	
	}

  	//-------------------------------------------------
  	//  Reupload images
  	//-------------------------------------------------

	$id = intval( $_GET["id"] );
    $donvi = intval($_POST['donvi']); 
	$manv=$_POST['manv'];
	$phongban = intval($_POST['phongban']);
	$chucvu = intval($_POST['chucvu']);
	$qlns_mahsnv = $donvi."".$phongban."".$chucvu."".$manv;
	$honv = $_POST['honv'];
 	$tennv = $_POST['tennv'];
 	$hovaten=$honv." ".$tennv;
	$ngaysinh = $_POST['ngaysinh'];
	$gioitinh = intval($_POST['gioitinh']);
	$email = $_POST['email'];
	$ngayvaoct = $_POST['ngayvaoct'];
	$cmnd = $_POST['cmnd'];
	$tinhtrang=intval($_POST['tinhtrang']);
	$noidung = $_POST['noidung'];
	
	$tuoinv = $_POST['tuoinv'];
	$noisinh = $_POST['noisinh'];
	$quanhuyenns = $_POST['quanhuyenns'];
	$tinhthanhns = $_POST['tinhthanhns'];
	$quequan = $_POST['quequan'];
	$quanhuyenqq = $_POST['quanhuyenqq'];
	$tinhthanhqq = $_POST['tinhthanhqq'];
	$thuongtru = $_POST['thuongtru'];
	$quanhuyenthuongtru = $_POST['quanhuyenthuongtru'];
	$tinhthanhthuongtru = $_POST['tinhthanhthuongtru'];
	$tamtru = $_POST['tamtru'];
	$quanhuyentamtru = $_POST['quanhuyentamtru'];
	$tinhthanhtamtru = $_POST['tinhthanhtamtru'];
	$hinhthuctuyen = $_POST['hinhthuctuyen'];
	$noicap = $_POST['noicap'];
	$ngaycap = $_POST['ngaycap'];
	$dantoc = $_POST['dantoc'];
	$tongiao = $_POST['tongiao'];
	$chucdanh = $_POST['chucdanh'];
	
    $ngaytk=date("j-n-Y");
    $cmndkt=$_REQUEST['cmnd'];
    
    //them ly lich nhan vien
    $trinhdo=$_POST['trinhdo'];
    $chuyenmon=$_POST['chuyenmon'];
    $vanbangkhac=$_POST['vanbangkhac'];
    $tthn=intval($_POST['tthn']);
    $quoctich=$_POST['quoctich'];
    $dienthoainha=$_POST['dtnha'];
    $dtdd=$_POST['dtdd'];
    $ngaytk=date("j-n-Y");
	$q3 = "UPDATE qlns_hosonhanvien SET
	qlns_mact ='$donvi',qlns_mabp='$phongban',qlns_macv='$chucvu',qlns_manv='$manv',
	qlns_mahsnv ='$qlns_mahsnv',qlns_honv='$honv',qlns_tennv='$tennv',qlns_hovaten='$hovaten',qlns_ngaysinh='$ngaysinh',qlns_tuoinv='$tuoinv',qlns_noisinh='$noisinh',qlns_quanns='$quanhuyenns',qlns_tinhthanhns='$tinhthanhns',qlns_quequan='$quequan',qlns_quanqq='$quanhuyenqq',qlns_tinhthanhqq='$tinhthanhqq',qlns_tamtru='$tamtru',qlns_quantt='$quanhuyentamtru',qlns_tinhthanhtt='$tinhthanhtamtru',qlns_gioitinh='$gioitinh'
	,qlns_email='$email',qlns_trinhdo='$trinhdo',qlns_chuyenmon='$chuyenmon',qlns_vanbangkhac='$vanbangkhac',qlns_chucdanh='$chucdanh',qlns_nvcongty='$ngayvaoct',
	";
	
	if ($images_small)
	{
		$q3 .= "
		qlns_anhnvien ='$images_small',
		";
	}
	
	$q3 .= "
	qlns_tinhtrangnv ='$tinhtrang',qlns_macmnd='$cmnd',qlns_noicap='$noicap',qlns_ngaycap='$ngaycap',qlns_ghichu='$noidung',qlns_tinhtranghn='$tthn',qlns_quoctich='$quoctich',qlns_dienthoainha='$dienthoainha',qlns_dthoaididong='$dtdd',qlns_diachi='$thuongtru',qlns_quandc='$quanhuyenthuongtru',qlns_tinhthanhdc='$tinhthanhthuongtru',qlns_dantoc='$dantoc',qlns_tongiao='$tongiao',qlns_hinhthuctuyen='$hinhthuctuyen' WHERE qlns_hsnv ='$id'
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=hosonhanvien.php?dialoose=select\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; s&#7917;a th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"hosonhanvien.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";

	exit;
  }
##################################################################
?>




<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "'hosonhanvien.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Ban co chac la muon xoa Tin nay khong vay???')) {
          window.location.href=theURL;
       }
       else {
          alert ('Ok. Chua thuc hien tac vu nao.');
       } 
    }
    //-->
</script>
<?
$dialoose = $_GET['dialoose'];
switch($dialoose) {
	default:
		index();
	break;
	case "edit":
			edit();
	break;
	case "edit2":
			edit2();
	break;
	case "remove":
			remove();
	break;
	case "remove2":
			remove2();
	break;
	case "remove3":
			remove3();
	break;
	case "deleteall":
			deleteall();
	break;
	case "select":
			select();
	break;
	case "validate":

			validate();
	break;
	case "selectcat":

			selectcat();
	break;
	case "selectct":
		    selectct();
	        break;
	case "selectcat1":
		    selectcat1();
	      break;        
	case "selecttv":
			selecttv();
	break;
		case "selectnvnv":
			selectnvnv();
	break;
		case "selectlknv":
			selectlknv();
	break;
	
	case "selectcbcc":
			selectcbcc();
	break;
}

	//===================================================
	// FUNCTION INDEX
	//===================================================

function index() {
?>
<script type="text/javascript" src=him.js></script>
<script language="javascript">
	function check_form(the_form)
	{ var the_tennv    = the_form.tennv.value;
      if ((the_tennv==''))
		{
			alert("Bạn nhập thông tin hồ sơ cán bộ nhân viên!");
			the_form.tennv.focus();
			return false;
		}
		var the_manv    = the_form.manv.value;
      if ((the_manv==''))
		{
			alert("Bạn nhập thông tin mã nhân viên!");
			the_form.manv.focus();
			return false;
		}
}
</script>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		
	   <script type="text/javascript">
		    WYSIWYG.attach('noidung'); 
			</script>
	
<div align='center'>
<form enctype="multipart/form-data" method="POST" NAME="mainform" onsubmit="return check_form(this)"> 
<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
<tr> 
      <td colspan="2"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Hồ Sơ Nhân Viên</b></font></div></td>
    </tr>
    <tr><td height='20'> </td></tr>   			
    <tr> 
      <td><font size="2"><b> Đơn vị:</b></font>
        <select name="donvi" id="donvi">
<? $a="select * from qlns_congty";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mact']?>'><?=$row['qlns_tencongty']?></option>
<? }?> 
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font size="2"><b>Phòng ban:</b></font> 
        <select name="phongban" id="phongban">
<? $a="select * from qlns_bophan";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mabp']?>'><?=$row['qlns_tenbophan']?></option>
<? }?> 
</select></td>
    </tr>
     <tr><td height='10'> </td></tr> 
<tr> 
      <td><font size="2"><b>Mã Nhân viên :</b></font> <input  name="manv" type="text" id="manv" size="31" >  <font size="2"><b>Chức vụ:</b></font>
       <select name="chucvu" id="chucvu">
<? $a="select * from qlns_chucvu";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_macv']?>'><?=$row['qlns_tenchucvu']?></option>
<? }?> 
</select></td>
    </tr>
   <tr><td height='10'> </td></tr> 	
  <tr> 
      <td><font size="2"><b>Họ :</b></font> <input  name="honv" type="text" id="honv" size="45" > <font size="2"><b>Tên nv:</b></font>
        <input  name="tennv" type="text" id="tennv" size="39" ></td>
  </tr>
    
   <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Ngày sinh :</b></font> <input  name="ngaysinh" type="text" id="ngaysinh" size="36" > <font size="2"><b>Tuổi :</b></font>
       <input  name="tuoinv" type="text" id="tuoinv" size="36" >
       </td>
  </tr>  
  	   <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Nơi sinh :</b></font> <input  name="noisinh" type="text" id="noisinh" size="39" > <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyenns" type="text" id="quanhuyenns" size="30" >
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhns" type="text" id="tinhthanhns" size="87" > 
       </td>
  </tr>  
  	   
  	     <tr><td height='15'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Quê Quán :</b></font> <input  name="quequan" type="text" id="quequan" size="36" > <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyenqq" type="text" id="quanhuyenqq" size="30" >
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhqq" type="text" id="tinhthanhqq" size="87" > 
       </td>
  </tr>  
  			 
  			   <tr><td height='15'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Thường Trú :</b></font> <input  name="thuongtru" type="text" id="thuongtru" size="34" > <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyenthuongtru" type="text" id="quanhuyenthuongtru" size="30" >
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhthuongtru" type="text" id="tinhthanhthuongtru" size="87" > 
       </td>
  </tr>  
  				   
  	   <tr><td height='15'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tạm trú :</b></font> <input  name="tamtru" type="text" id="tamtru" size="38" > <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyentamtru" type="text" id="quanhuyentamtru" size="30" >
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhtamtru" type="text" id="tinhthanhtamtru" size="87" > 
       </td>
  </tr>  			   
  	   <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Hình thức tuyển :</b></font>  <select name="hinhthuctuyen" id="hinhthuctuyen" size=0>
<option value="1">Thi tuyển</option>
<option value="0">Luân chuyển
</option>
</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><b>Giới tính:</b></font>
        <select name="gioitinh" id="gioitinh" size=0>
<option value="1">Nam</option>
<option value="0">Nữ
</option>
</select></td>
  </tr>  
  	   <tr><td height='10'> </td></tr>  
 <tr> 
      <td><font size="2"><b>Email :</b></font> <input  name="email" type="text" id="email" size="42" > <font size="2"><b>Ngày vào ct:</b></font>
 <input  name="ngayvaoct" type="text" id="ngayvaoct" size="32" ></td>
  </tr> 
  	   <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Số CMND:</b></font>
 <input  name="cmnd" type="text" id="cmnd" size="38" > <font size="2"><b>Nơi cấp: </b></font> 
        <input  name="noicap" type="text" id="noicap" size="38" > 
        </td>
  </tr> 
     <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>ngày cấp:</b></font>
 <input  name="ngaycap" type="text" id="ngaycap" size="37" > <font size="2"><b>Tình trạng : </b></font> 
        <select name="tinhtrang" id="tinhtrang" size=0>
<option value="1">Nhân viên chính thức</option>
<option value="0">Nhân viên thử việc</option>
<option value="2">Nhân viên nghỉ việc</option>	   
</select> </td>
  </tr> 	   
   <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Quốc tịch:</b></font>
 <input name="quoctich" type="text" id="quoctich" size="37" > <font size="2"><b>Tình trạng hôn nhân:</b></font>
        <select name="tthn" id="tthn" size=0>
<option value="1">Độc Thân</option>
<option value="0">Đã có gia đình
</option></select> </td>
  </tr> 
  	     	    <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Dân tộc:</b></font>
 <input name="dantoc" type="text" id="dantoc" size="39" > <font size="2"><b>Tôn giáo:</b></font>
       <input name="tongiao" type="text" id="tongiao" size="37" ></td>
  </tr>  	   
  <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Điện thoại nhà:</b></font>
 <input name="dtnha" type="text" id="dtnha" size="30"> <font size="2"><b>Điện thoại di động:</b></font>
        <input name="dtdd" type="text" id="dtdd" size="25" > </td>
  </tr>
 	   
  
  	   <tr><td height='10'> </td></tr>
  	  	<tr> 
      <td><font size="2"><b>Trình độ :</b></font>
 <select name="trinhdo" id="trinhdo" size=0>
<option value="Tiến Sỹ">Tiến Sỹ</option>
<option value="Thạc sỹ">Thạc sỹ</option>
<option value="Đại Học">Đại Học</option>
<option value="Cao Đẳng">Cao Đẳng</option>
<option value="Trung Cấp">Trung Cấp</option>
<option value="THPT">THPT</option>
<option value="THCS">THCS</option>
<option value="Khác">Khác</option>		   		   		   	   
</select>  
        </td>
  </tr> 
    
    <tr><td height='10'> </td></tr>
  	  	<tr> 
      <td> <font size="2"><b>Chuyên môn :  <input name="chuyenmon" type="text" id="chuyenmon" size="87" ></b></font> 
        </td>
  </tr>  
  	 <tr><td height='10'> </td></tr>
  	  	<tr> 
      <td> <font size="2"><b>Văn Bằng Khác :  <input name="vanbangkhac" type="text" id="vanbangkhac" size="83" ></b></font> 
        </td>
  </tr>  
  		<tr><td height='10'> </td></tr>
  	  	<tr> 
      <td> <font size="2"><b>Chức Danh :  <input name="chucdanh" type="text" id="chucdanh" size="83" ></b></font> 
        </td>
  </tr>         	      

	    	   
  	  <tr><td height='10'> </td></tr>   
<tr> 
      <td ><font size="2"><b>Ghi chú:</b></font>
    <textarea  name="noidung" cols="136" rows="10"  id="noidung"></textarea></td></td>
</tr>
	   
  	  	   
<tr> 
   <td valign="top"><B>Upload Ảnh :</B><font color="#FF0000">*</font> <br><input type="hidden" name="MAX_FILE_SIZE" value="1500000"> <input size=70 name="userfile1" type="file">
              <br>
              <font size="1">* The image can have maximum 1500 kb</font></td>
    </tr>
      
 <tr><td height=10></td></tr>
 <tr> 
 <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  name="submit" type="submit" id="submit" value="Add News"><br><br></td>
    </tr>

  </form>
</TBODY></TABLE></center>
<?

}
	//===================================================
	// FUNCTION edit
	//===================================================

function edit() {
$id = intval( $_GET["id"] );
$a = "select * from qlns_hosonhanvien where qlns_hsnv='$id'";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);
?>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Bạn có chắc chắn muốn xoá hồ sơ này không?')){
		location.href='hosonhanvien.php?dialoose=remove3&id=<? echo $c['news_id']; ?>';
	}
}
</SCRIPT>
<script type="text/javascript" src=him.js></script>
	<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
	
	   <script type="text/javascript">
		    WYSIWYG.attach('noidung'); 
			</script>
		
<center>
<TABLE  cellSpacing=1 cellPadding=0 width="80%" border=0>
<tr> 
      <td colspan="2"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Sửa Thông Tin Nhân Viên</b></font></div></td>
    </tr>
<form method="post" NAME="mainform" enctype="multipart/form-data">
	<tr><td height='25'></td></tr>			
	<tr> 
      <td><font size="2"><b> Đơn vị:</b></font>
 <SELECT NAME="donvi" size='0'><?
	$sel_cat=@mysql_query("select * from qlns_congty order by qlns_mact");
	while($res=@mysql_fetch_array($sel_cat))
	{
?>	<option value="<?php echo $res['qlns_mact']; ?>" <?php if($c['qlns_mact']==$res['qlns_mact']){echo "selected";}?>><?echo $res['qlns_tencongty'];?>
<?
	}
?>
				</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font size="2"><b>Phòng ban:</b></font> 
       <SELECT NAME="phongban" size='0'><?
	$sel_cat=@mysql_query("select * from qlns_bophan order by qlns_mabp");
	while($res=@mysql_fetch_array($sel_cat))
	{
?>	<option value="<?php echo $res['qlns_mabp']; ?>" <?php if($c['qlns_mabp']==$res['qlns_mabp']){echo "selected";}?>><?echo $res['qlns_tenbophan'];?>
<?
	}
?>
				</select></td>
    </tr>
     <tr><td height='10'> </td></tr> 
<tr> 
      <td><font size="2"><b>Mã Nhân viên :</b></font> <input  name="manv" type="text" id="manv" size="31"  value="<? echo $c['qlns_manv']; ?>" >  <font size="2"><b>Chức vụ:</b></font>
      <SELECT NAME="chucvu" size='0'><?
	$sel_cat=@mysql_query("select * from qlns_chucvu order by qlns_macv");
	while($res=@mysql_fetch_array($sel_cat))
	{
?>	<option value="<?php echo $res['qlns_macv']; ?>" <?php if($c['qlns_macv']==$res['qlns_macv']){echo "selected";}?>><?echo $res['qlns_tenchucvu'];?>
<?
	}
?>
				</select></td>
    </tr>
   <tr><td height='10'> </td></tr> 	
  <tr> 
      <td><font size="2"><b>Họ :</b></font> <input  name="honv" type="text" id="honv" size="45" value="<? echo $c['qlns_honv']; ?>"> <font size="2"><b>Tên nv:</b></font>
        <input  name="tennv" type="text" id="tennv" size="39" value="<? echo $c['qlns_tennv']; ?>"></td>
  </tr>
    
   <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Ngày sinh :</b></font> <input  name="ngaysinh" type="text" id="ngaysinh" size="36" value="<? echo $c['qlns_ngaysinh']; ?>"> <font size="2"><b>Tuổi :</b></font>
       <input  name="tuoinv" type="text" id="tuoinv" size="36" value="<? echo $c['qlns_tuoinv']; ?>">
        </td>
  </tr> 
  	     <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Nơi sinh :</b></font> <input  name="noisinh" type="text" id="noisinh" size="39" value="<? echo $c['qlns_noisinh']; ?>"> <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyenns" type="text" id="quanhuyenns" size="30" value="<? echo $c['qlns_quanns']; ?>">
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhns" type="text" id="tinhthanhns" size="87"  value="<? echo $c['qlns_tinhthanhns']; ?>"> 
       </td>
  </tr>  
  	   
  	     <tr><td height='15'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Quê Quán :</b></font> <input  name="quequan" type="text" id="quequan" size="36" value="<? echo $c['qlns_quequan']; ?>"> <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyenqq" type="text" id="quanhuyenqq" size="30" value="<? echo $c['qlns_quanqq']; ?>">
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhqq" type="text" id="tinhthanhqq" size="87" value="<? echo $c['qlns_tinhthanhqq']; ?>"> 
       </td>
  </tr>  
  			 
  			   <tr><td height='15'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Thường Trú :</b></font> <input  name="thuongtru" type="text" id="thuongtru" size="34" value="<? echo $c['qlns_diachi']; ?>"> <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyenthuongtru" type="text" id="quanhuyenthuongtru" size="30" value="<? echo $c['qlns_quandc']; ?>">
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhthuongtru" type="text" id="tinhthanhthuongtru" size="87" value="<? echo $c['qlns_tinhthanhdc']; ?>"> 
       </td>
  </tr>  
  				   
  	   <tr><td height='15'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tạm trú :</b></font> <input  name="tamtru" type="text" id="tamtru" size="38" value="<? echo $c['qlns_tamtru']; ?>"> <font size="2"><b>Quận/Huyện :</b></font>
       <input  name="quanhuyentamtru" type="text" id="quanhuyentamtru" size="30" value="<? echo $c['qlns_quantt']; ?>">
       </td>
  </tr>  
  	    <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Tỉnh /Thành :</b></font> <input  name="tinhthanhtamtru" type="text" id="tinhthanhtamtru" size="87" value="<? echo $c['qlns_tinhthanhtt']; ?>"> 
       </td>
  </tr>  
  	  <tr><td height='10'> </td></tr>  
   	 <tr> 
      <td><font size="2"><b>Hình thức tuyển :</b></font>  <select name="hinhthuctuyen" id="hinhthuctuyen" size=0>
      	   <?php if($c['qlns_hinhthuctuyen']==1){ ?>
<option value="1">Thi tuyển</option>
<option value="0">Luân chuyển
</option>
	  <?php }else {	 ?>
	 <option value="0">Luân chuyển </option> 
     <option value="1">Thi tuyển </option>

<?php }	 ?>
	</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2"><b>Giới tính:</b></font>
        <select name="gioitinh" id="gioitinh" size=0>
	 <?php 
	$sqltt=@mysql_query("SELECT * FROM qlns_hosonhanvien WHERE qlns_hsnv='$id'");
	while ($rowtt=@mysql_fetch_assoc($sqltt)){
		$vinh=$rowtt['qlns_gioitinh'];
		         if($vinh==1){ ?>
                          <option value="<?php echo $rowtt['qlns_gioitinh']; ?>">Nam</option>
                          <option value="0">Nữ</option>
                 <?php } else { ?>
                 		  <option value="<?php echo $rowtt['qlns_gioitinh']; ?>">Nữ</option>
                          <option value="1">Nam</option>
                 	<?php }
    } 
    ?>	  
                 			  
</select></td>
  </tr>  			    
  	   <tr><td height='10'> </td></tr>  
 <tr> 
      <td><font size="2"><b>Email :</b></font> <input  name="email" type="text" id="email" size="42" value="<? echo $c['qlns_email']; ?>"> <font size="2"><b>Ngày vào ct:</b></font>
 <input  name="ngayvaoct" type="text" id="ngayvaoct" size="32" value="<? echo $c['qlns_nvcongty']; ?>"></td>
  </tr> 
  	   <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Số CMND:</b></font>
 <input  name="cmnd" type="text" id="cmnd" size="38" value="<? echo $c['qlns_macmnd']; ?>"> <font size="2"><b>Nơi cấp: </b></font> 
        <input  name="noicap" type="text" id="noicap" size="38" value="<? echo $c['qlns_noicap']; ?>"> </td>
  </tr> 
     <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>ngày cấp:</b></font>
 <input  name="ngaycap" type="text" id="ngaycap" size="37" value="<? echo $c['qlns_ngaycap']; ?>"> <font size="2"><b>Tình trạng : </b></font> 
        <select name="tinhtrang" id="tinhtrang" size=0>
	 <?php 
	$sqltt12=@mysql_query("SELECT * FROM qlns_hosonhanvien WHERE qlns_hsnv='$id'");
	while ($rowtt12=@mysql_fetch_assoc($sqltt12)){
		    $vinh=$rowtt12['qlns_tinhtrangnv'];
		         if($vinh==1){ ?>
                          <option value="<?php echo $rowtt12['qlns_tinhtrangnv']; ?>">Nhân viên chính thức</option>
                          <option value="0">Nhân viên thử việc</option>
                          <option value="2">Nhân viên nghỉ việc</option>
                 <?php } elseif ($vinh==0) { ?>
                 		  <option value="<?php echo $rowtt12['qlns_tinhtrangnv']; ?>">Nhân viên thử việc</option>
                          <option value="1">Nhân viên chính thức</option>
                          <option value="2">Nhân viên nghỉ việc</option>
                 	<?php } elseif ($vinh==2) { ?>
                 	      <option value="<?php echo $rowtt12['qlns_tinhtrangnv']; ?>">Nhân viên nghỉ việc</option>
                          <option value="1">Nhân viên chính thức</option>
                          <option value="0">Nhân viên thử việc</option>
        <?php         	    } 
    }
    ?>	  
                 			  
</select> </td>
  </tr> 	   
     <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Quốc tịch:</b></font>
 <input name="quoctich" type="text" id="quoctich" size="37" value="<? echo $c['qlns_quoctich']; ?>"> <font size="2"><b>Tình trạng hôn nhân:</b></font>
        <select name="tthn" id="tthn" size=0>
    <?php	$sqltt12345=@mysql_query("SELECT * FROM qlns_hosonhanvien WHERE qlns_hsnv='$id'");
	         while ($rowtt12345=@mysql_fetch_assoc($sqltt12345)){
             $tinhtranghn=$rowtt12345['qlns_tinhtranghn']; 
               if($tinhtranghn==1){ ?>
                          <option value="<?php echo $rowtt12345['qlns_tinhtranghn']; ?>">Độc Thân</option>
                          <option value="0">Đã Có Gia Đình</option>
                         
                 <?php } elseif ($tinhtranghn==0) { ?>
                 		  <option value="<?php echo $rowtt12345['qlns_tinhtranghn']; ?>">Đã Có Gia Đình</option>
                          <option value="1">Độc thân</option>
  <?php                      
    } 
    		 }
    	?></select> </td>
  </tr>  
   <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Dân tộc:</b></font>
 <input name="dantoc" type="text" id="dantoc" size="39" value="<? echo $c['qlns_dantoc']; ?>"> <font size="2"><b>Tôn giáo:</b></font>
       <input name="tongiao" type="text" id="tongiao" size="37" value="<? echo $c['qlns_tongiao']; ?>"></td>
  </tr>  	   			
  				   
  <tr><td height='10'> </td></tr>  
  	<tr> 
      <td><font size="2"><b>Điện thoại nhà:</b></font>
 <input name="dtnha" type="text" id="dtnha" size="30" value="<? echo $c['qlns_dienthoainha']; ?>"> <font size="2"><b>Điện thoại di động:</b></font>
        <input name="dtdd" type="text" id="dtdd" size="25" value="<? echo $c['qlns_dthoaididong']; ?>"> </td>
  </tr>
  	   
  	   <tr><td height='10'> </td></tr>
  	  	<tr> 
 <td><font size="2"><b>Trình độ :</b></font>
  <select name="trinhdo" id="trinhdo" size=0>
  		 <?php	
	           $trinhdonv=$c['qlns_trinhdo'];
	           if($trinhdonv=="Tiến Sỹ"){
	           	 ?>
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                          <option value="Đại Học">Đại Học</option>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="Trung Cấp">Trung Cấp</option>
                          <option value="THPT">THPT</option>
                          <option value="THCS">THCS</option>
                     <?php
	           }elseif ($trinhdonv=="Thạc sỹ"){
	           	 ?>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Đại Học">Đại Học</option>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="Trung Cấp">Trung Cấp</option>
                          <option value="THPT">THPT</option>
                          <option value="THCS">THCS</option>
	       <?php }   
	       elseif ($trinhdonv=="Đại Học"){
	           	 ?>
                          <option value="Đại Học">Đại Học</option>
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="Trung Cấp">Trung Cấp</option>
                          <option value="THPT">THPT</option>
                          <option value="THCS">THCS</option> 	   
  		 
           <?php }   
	       elseif ($trinhdonv=="Cao Đẳng"){
	           	 ?>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                         <option value="Đại Học">Đại Học</option>
                          <option value="Trung Cấp">Trung Cấp</option>
                          <option value="THPT">THPT</option>
                          <option value="THCS">THCS</option> 	   
  	
  		       <?php }   
	       elseif ($trinhdonv=="Trung Cấp"){
	           	 ?>
                          <option value="Trung Cấp">Trung Cấp</option>
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                          <option value="Đại Học">Đại Học</option>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="THPT">THPT</option>
                          <option value="THCS">THCS</option> 
                     <?php }   
	       elseif ($trinhdonv=="THPT"){
	           	 ?>
                          <option value="THPT">THPT</option>
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                          <option value="Đại Học">Đại Học</option>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="Trung Cấp">Trung Cấp</option>	  
                          <option value="THCS">THCS</option> 	   
  				   <?php }   
	       elseif ($trinhdonv=="THCS"){
	           	 ?>
                          <option value="THCS">THCS</option> 
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                          <option value="Đại Học">Đại Học</option>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="Trung Cấp">Trung Cấp</option>	  
                          <option value="THPT">THPT</option>	   
  				   
  		  <?php }   
  		  	   elseif ($trinhdonv=="Khác"){
	           	 ?>
                          <option value="Khác">Khác</option> 
                          <option value="Tiến Sỹ">Tiến Sỹ</option>
                          <option value="Thạc sỹ">Thạc sỹ</option>
                          <option value="Đại Học">Đại Học</option>
                          <option value="Cao Đẳng">Cao Đẳng</option>
                          <option value="Trung Cấp">Trung Cấp</option>	  
                          <option value="THPT">THPT</option>	   
  				          <option value="THCS">THCS</option> 
  		  <?php }    ?>			 
	
	</select> 
	 
        </td>
  </tr> 
    
    <tr><td height='10'> </td></tr>
  	  	<tr> 
      <td> <font size="2"><b>Chuyên môn :  <input name="chuyenmon" type="text" id="chuyenmon" size="87" value="<? echo $c['qlns_chuyenmon']; ?>"></b></font> 
        </td>
  </tr>  
  	 <tr><td height='10'> </td></tr>
  	  	<tr> 
      <td> <font size="2"><b>Văn Bằng Khác :  <input name="vanbangkhac" type="text" id="vanbangkhac" size="83" value="<? echo $c['qlns_vanbangkhac']; ?>" ></b></font> 
        </td>
  </tr>       	      
  <tr><td height='10'> </td></tr>
  	  	<tr> 
      <td> <font size="2"><b>Chức Danh :  <input name="chucdanh" type="text" id="chucdanh" size="83" value="<? echo $c['qlns_chucdanh']; ?>"></b></font> 
        </td>
  </tr> 
  	  <tr><td height='10'> </td></tr>   
<tr> 
      <td ><font size="2"><b>Ghi chú:</b></font><br>
    <textarea  name="noidung" style="width:70%;height:250px;"  id="noidung"><?=$c['qlns_ghichu']; ?></textarea></td></td>
</tr>
<tr><td valign="top"><B>Upload ảnh lớn (Ảnh chi tiết):</B> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" name="MAX_FILE_SIZE" value="1150000">
<input size=26 name="userfile1" type="file"> (N&#7871;u mu&#7889;n thay &#7843;nh m&#7899;i)</td></tr>
<tr><td>
<?
if($c['qlns_anhnvien'])
{
echo("<br>(<a href=\"../images/news/".$c['qlns_anhnvien']."\" target=\"_blank\">Click v&#224;o &#273;&#226;y &#273;&#7875; xem &#7842;nh hi&#7879;n t&#7841;i</a>)<br>");
}
?>
   <tr> 		
    
<tr> 
    <tr> 
      <td valign="top"><div align='center'>&nbsp;<input  name="submit" type="submit" id="submit" value="Update">
<INPUT  onclick=JavaScript:Deletepost(); type=button value="Delete" name=btDeletepost>
</td>
    </tr>
<tr><td valign="top"><br></td></tr>
  </form>

  </form>
</TBODY></TABLE></center>
<?php
}
	//===================================================
	// FUNCTION Select
	//===================================================

function select() {

	$trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien order by qlns_hsnv desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=select&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
   <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê tin tức | Select news'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN </td></tr><tr><td colspan=1 bgcolor="#4B9BE0" width=70%><div align='right'><form action="hosonhanvien.php?dialoose=selectcat1" method='POST' name=hi><select name="theloai" id="theloai">
<?php 
$a="select * from qlns_congty";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mact']?>'><font size=1><?=$row['qlns_tencongty']?></option>
<? }?>     <input  name="submit" type="submit" id="submit" value="Tìm"></form></td></select>
<td colspan=1 bgcolor="#4B9BE0" width=30%><div align='right'><form action="hosonhanvien.php?dialoose=selectlknv" method='POST' name=vi><select name=ctnv size=0><option value=1> Nhân viên chính thức</option><option value=2> Nhân viên thử việc </option><option value=3> Nhân viên nghỉ việc</option></select><input  name="submit" type="submit" id="submit" value="Liệt kê"></form></td></tr>
  </tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";

}

function selectct() {

	$trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtrangnv='1' order by qlns_hsnv asc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=selectct&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
  <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê danh sách nhân viên | Select list'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN  </td></tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";

}
//============================
//Liêt ke theo the loai
//===========================

function selectcat1() {

    $theloai =intval($_POST['theloai']);
    $trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
    $rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_mact ='$theloai' order by qlns_hsnv desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=select&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
   <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê tin tức | Select news'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN </td></tr><tr><td colspan=1 bgcolor="#4B9BE0" width=70%><div align='right'><form action="hosonhanvien.php?dialoose=selectcat1" method='POST' name=hi><select name="theloai" id="theloai">
<?php 
$a="select * from qlns_congty";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mact']?>'><font size=1><?=$row['qlns_tencongty']?></option>
<? }?>     <input  name="submit" type="submit" id="submit" value="Tìm"></form></td></select>
<td colspan=1 bgcolor="#4B9BE0" width=30%><div align='right'><form action="hosonhanvien.php?dialoose=select" method='POST' name=vi><select name=ctnv size=0><option value=1> Nhân viên chính thức</option><option value=2> Nhân viên thử việc </option><option value=3> Nhân viên nghỉ việc</option></select><input  name="submit" type="submit" id="submit" value="Liệt kê"></form></td></tr>
  </tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";



}

//===============================================================
//Liệt kê nhân viên theo tình trạng
//===============================================================

function selectlknv() {

    $lknv =intval($_POST['ctnv']);
    if($lknv==1){
    $trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
    $rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtrangnv='1' order by qlns_hsnv desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=select&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
   <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê tin tức | Select news'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN </td></tr><tr><td colspan=1 bgcolor="#4B9BE0" width=70%><div align='right'><form action="hosonhanvien.php?dialoose=selectcat1" method='POST' name=hi><select name="theloai" id="theloai">
<?php 
$a="select * from qlns_congty";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mact']?>'><font size=1><?=$row['qlns_tencongty']?></option>
<? }?>     <input  name="submit" type="submit" id="submit" value="Tìm"></form></td></select>
<td colspan=1 bgcolor="#4B9BE0" width=30%><div align='right'><form action="hosonhanvien.php?dialoose=select" method='POST' name=vi><select name=ctnv size=0><option value=1> Nhân viên chính thức</option><option value=2> Nhân viên thử việc </option><option value=3> Nhân viên nghỉ việc</option></select><input  name="submit" type="submit" id="submit" value="Liệt kê"></form></td></tr>
  </tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";
	}
 elseif($lknv==2){
    $trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
    $rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtrangnv='0' order by qlns_hsnv desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=select&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
   <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê tin tức | Select news'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN </td></tr><tr><td colspan=1 bgcolor="#4B9BE0" width=70%><div align='right'><form action="hosonhanvien.php?dialoose=selectcat1" method='POST' name=hi><select name="theloai" id="theloai">
<?php 
$a="select * from qlns_congty";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mact']?>'><font size=1><?=$row['qlns_tencongty']?></option>
<? }?>     <input  name="submit" type="submit" id="submit" value="Tìm"></form></td></select>
<td colspan=1 bgcolor="#4B9BE0" width=30%><div align='right'><form action="hosonhanvien.php?dialoose=select" method='POST' name=vi><select name=ctnv size=0><option value=1> Nhân viên chính thức</option><option value=2> Nhân viên thử việc </option><option value=3> Nhân viên nghỉ việc</option></select><input  name="submit" type="submit" id="submit" value="Liệt kê"></form></td></tr>
  </tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức Danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";
	}
elseif($lknv==3){
    $trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
    $rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtrangnv='2' order by qlns_hsnv desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=select&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
   <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê tin tức | Select news'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN </td></tr><tr><td colspan=1 bgcolor="#4B9BE0" width=70%><div align='right'><form action="hosonhanvien.php?dialoose=selectcat1" method='POST' name=hi><select name="theloai" id="theloai">
<?php 
$a="select * from qlns_congty";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mact']?>'><font size=1><?=$row['qlns_tencongty']?></option>
<? }?>     <input  name="submit" type="submit" id="submit" value="Tìm"></form></td></select>
<td colspan=1 bgcolor="#4B9BE0" width=30%><div align='right'><form action="hosonhanvien.php?dialoose=select" method='POST' name=vi><select name=ctnv size=0><option value=1> Nhân viên chính thức</option><option value=2> Nhân viên thử việc </option><option value=3> Nhân viên nghỉ việc</option></select><input  name="submit" type="submit" id="submit" value="Liệt kê"></form></td></tr>
  </tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức Danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";
	}
}

//===============================================================
//===============================================================
function selecttv() {

	$trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtrangnv='0' order by qlns_hsnv asc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=selecttv&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
  <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê danh sách nhân viên | Select list'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN  </td></tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức Danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";

}
function selectcbcc() {

	$trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_macv='10' or qlns_macv='11' or qlns_macv='12' or qlns_macv='20' order by qlns_hsnv asc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=selectcbcc&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
  <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê danh sách nhân viên | Select list'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN  </td></tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";

}
function selectnvnv() {

	$trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtrangnv='2' order by qlns_hsnv desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='hosonhanvien.php?dialoose=selectcbcc&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
  <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê danh sách nhân viên | Select list'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN  </td></tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã Nhân viên</b></div></td>
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thuộc đơn vị</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Chức danh</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $row['qlns_manv'];?></td>
        <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; elseif($vinh==2) echo '<font color=red> Nhân viên nghỉ việc </font>'; else  echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['qlns_mact']; $sqltl=@mysql_query("SELECT * FROM qlns_congty WHERE qlns_mact='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['qlns_tencongty'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['qlns_chucdanh'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Nhân viên: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";

}

function remove() {

//delete the database record
$q1 = "delete from ctn_news where news_id = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

//delete the file
@unlink("../images/news/".$_GET[file]);

	redirect("".getenv("HTTP_REFERER")."");

}
	//===================================================
	// FUNCTION remove2
	//===================================================

function remove2() {

//delete the database record
$q1 = "delete from ctn_news where news_id = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

//delete the file
@unlink("../images/news/".$_GET[file]);

	redirect("hosonhanvien.php?dialoose=validate");

}
	//===================================================
	// FUNCTION remove3
	//===================================================

function remove3() {
	$id = intval( $_GET["id"] );
//delete the database record
$q1 = "delete from qlns_hosonhanvien where qlns_hsnv='$id' ";
@mysql_query($q1) or die(mysql_error());
//delete the file
@unlink("../images/news/".$_GET[file]);

	redirect("hosonhanvien.php?dialoose=select");

}






