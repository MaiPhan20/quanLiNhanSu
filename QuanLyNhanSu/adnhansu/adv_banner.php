<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");


        $submit = $_POST["submit"];
       $MAX_FILE_SIZE = $_POST["MAX_FILE_SIZE"];
  if(isset($submit) && $submit == 'Update')
  {
 	//-------------------------------------------------
  	//  UPLOAD
  	//-------------------------------------------------

if($_FILES['file_upload']['name'] ==''){  		  	

	}

if($_FILES['file_upload']['size'] == 0) { 
   echo '<br><br><br><br><br><center><font color=red><B>C&#243; l&#7895;i x&#7843;y ra trong qu&#225; tr&#236;nh Upload. Vui l&#242;ng ki&#7875;m tra l&#7841;i.</B></font></center>'; 

		exit;
       } 
elseif($_FILES['file_upload']['size'] > $MAX_FILE_SIZE) { 
        echo '<br><br><br><br><br><center><font color=red><B>&#7842;nh b&#7841;n Upload qu&#225; l&#7899;n. Vui l&#242;ng ch&#7885;n &#7842;nh b&#233; h&#417;n.</B></font></center>'; 

		exit;
       } 
elseif(!getimagesize($_FILES['file_upload']['tmp_name'])) { 
        echo ("<br><br><br><br><br><center><font color=red><B>File b&#7841;n Upload kh&#244;ng ph&#7843;i &#273;&#7883;nh d&#7841;nh &#7842;nh.</B></font></center>");
		exit;
		}
		else
		{
		
		   $images1 = $_FILES['file_upload']['name'];
		   $rand_numb = time();
		   $color_1 = "logo_$rand_numb"."_$images1";
		   $uploaddir = '../images/qc/'; // remember the trailing slash! 
		   $uploadfile = "$uploaddir"."$color_1"; 
			
			@copy($_FILES['file_upload']['tmp_name'], $uploadfile) or die ("Kh&#244;ng th&#7875; upload file");
		}
	 
  	//-------------------------------------------------
  	//  UPDATE DATA
  	//-------------------------------------------------
    $url = replace($_POST["website"]);
	$alt = replace($_POST["alt"]);
	$vitri = replace($_POST["vitri"]);
	$ngaydk=date(@$_POST["from"]);
    $ngaykt=date(@$_POST["from1"]);
    $vni=1+0;
//tach chuoi ngay,thang,nam ket thuc
$daykt=substr($ngaykt,8,2);
$thangkt=substr($ngaykt,5,2);
$namkt=substr($ngaykt,0,4);
//tach chuoi ngay thang nam dang ky
$ngay=substr($ngaydk,8,2);
$thang=substr($ngaydk,5,2);
$nam=substr($ngaydk,0,4);
$tgdk=$nam."-".$thang."-".$ngay;
// lay ngay thang nam hien hanh
$today = getdate();
$month1 = $today['mon'];
$day1 = $today['mday'];
$year1 = $today['year'];
$ngay1 = $year1."-".$month1."-".$day1;
// neu nam bat dau nho hon nam hien hanh hoac nam ket thuc nho hon nam hien hanh thi bao loi
if((int)$nam < (int)$year1 || (int)$namkt < (int)$year1)
	echo"<script> alert(' phải lớn hơn hoặc bằng ngày hiện tại !') </script>";
	else
    {
		// neu nam bat dau = nam hien hanh va nam ket thuc = nam bat dau thi kiem tra tiep
		if(((int)$nam==(int)$year1) && ((int)$namkt == (int)$nam))
 		 // neu thang bat dau nho hon thang hien hanh hoac thang ket thuc nho hon thang bat dau thi bao loi
			if(((int)$thang < (int)$month1) || ((int)$thangkt<(int)$thang))
				echo"<script> alert('Tháng bắt đầu phải lớn hơn hoặc bằng tháng hiện tại !') </script>";
          	// neu thang bat dau = thang hien hanh va thang ket thuc = thang bat dau thi kiem tra tiep
   			else if(((int)$thang==(int)$month1) && ((int)$thangkt==(int)$thang))
   		 // neu ngay bat dau nho hon ngay hien hanh hoac ngay ket thuc nho hon ngay bat dau thi bao loi
				if(((int)$ngay < (int)$day1) || ((int)$daykt < (int)$ngay))
				echo"<script> alert('Ngày bắt đầu phải lớn hơn hoặc bằng ngày hiện tại !') </script>";
	     else {
  
    $q3 = "insert into tbl_quangcaochitiet set
    ma_vitri=\"$vitri\",
    donvidangquangcao  = \"$alt\",
	url   = \"$url\",
    logo = \"$color_1\",batdau=\"$ngaydk\",ketthuc=\"$ngaykt\",tinhtrang='$vni'
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
	<div align=\"center\">
            <meta http-equiv=\"REFRESH\" content=\"3; url=adv_banner.php\"><br><br><br><br><br><br><br><br><br>
            <table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; c&#7853;p nh&#7853;t th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"adv_banner.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";
	exit;
  }
}
  }
 
	//===================================================
	// END UPDATE
	//===================================================
        $MAX_FILE_SIZE = $_POST["MAX_FILE_SIZE"];
        $submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Edit & Update')
  {
 	//-------------------------------------------------
  	//  RE UPLOAD
  	//-------------------------------------------------


if ( $_FILES['file_upload']['name'] )
  	{
  	
	  	$sql_select = @mysql_query("SELECT * FROM tbl_quangcaochitiet  WHERE ma_quangcao='{$id}'");
	  	$result_select = @mysql_fetch_array( $sql_select );
	  	
	  	@unlink("../images/qc/".$result_select["images"]);




if($_FILES['file_upload']['name'] == '') { 
		       echo("<br><br><br><br><br><center><font color=red><B>H&#7843;y ch&#7885;n &#7842;nh c&#7847;n Upload cho s&#7843;n ph&#7849;m tr&#432;&#7899;c khi k&#7871;t th&#250;c!</B></font></center>"); 
		
				exit;
		       } 
		else if($_FILES['file_upload']['size'] == 0) { 
		   echo '<center><font color=red><B>C&#243; l&#7895;i x&#7843;y ra trong qu&#225; tr&#236;nh Upload. Vui l&#242;ng ki&#7875;m tra l&#7841;i.</B></font></center>'; 
		
				exit;
		       } 
		else if($_FILES['file_upload']['size'] > $_POST["MAX_FILE_SIZE"]) { 
		        echo '<br><br><br><br><br><center><font color=red><B>&#7842;nh b&#7841;n Upload qu&#225; l&#7899;n. Vui l&#242;ng ch&#7885;n &#7842;nh b&#233; h&#417;n.</B></font></center>'; 
		
				exit;
		       } 
		else if(!getimagesize($_FILES['file_upload']['tmp_name'])) { 
		        echo '<br><br><br><br><br><center><font color=red><B>D&#7919; li&#7879;u b&#7841;n Upload kh&#244;ng ph&#7843;i &#273;&#7883;nh d&#7841;ng &#7843;nh.</B></font></center>'; 
		
				exit;
		       } 


		else
		{
		
		   $images1 = $_FILES['file_upload']['name'];
		   $rand_numb = time();
		   $color_1 = "logo_$rand_numb"."_$images1";
		   $uploaddir = '../images/qc/'; // remember the trailing slash! 
		   $uploadfile = "$uploaddir"."$color_1"; 
			
			@copy($_FILES['file_upload']['tmp_name'], $uploadfile) or die ("Kh&#244;ng th&#7875; upload file");
		}
	 }
	 
  	//-------------------------------------------------
  	//  REUPDATE 
  	//-------------------------------------------------
    $id =intval($_GET[id]); 
    $vi=intval($_POST["duyettin"]);
    $url = replace($_POST["website"]);
	$alt = replace($_POST["alt"]);
	$vitri = intval($_POST["vitri"]);
	$ngaydk=date(@$_POST["from"]);
    $ngaykt=date(@$_POST["from1"]);
	$q3 = "update tbl_quangcaochitiet set
	ma_vitri=\"$vitri\",
  	donvidangquangcao= \"$alt\",
    url   = \"$url\",
	";
	
	if ( $color_1 )
	{
		$q3 .= "
		logo = \"$color_1\",
		";
	}	


	$q3 .= "
	batdau = \"$ngaydk\",ketthuc=\"$ngaykt\",tinhtrang=\"$vi\" where ma_quangcao=\"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
  echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=adv_banner.php\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; c&#7853;p nh&#7853;t th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"adv_banner.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";
	exit;
  }

	//===================================================
	// END REUPDATE
	//===================================================


$dialoose = $_GET['dialoose'];
switch($dialoose) {
	default:
		index();
	break;
	case "Edit":
			Edit();
	break;
	case "Delete":
			Delete();
	break;
	case "Order":
			Order();
	break;
}

function index() {

	//===================================================
	// INDEX 
	//===================================================
?>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
<script src="images/date-picker.js"></script>
<script language="javascript">
	function check_form(the_form)
	{ var the_news_tieude    = the_form.alt.value;
      if ((the_news_tieude==''))
		{
			alert("Ban nhap thong tin cho quang cao!");
			the_form.alt.focus();
			return false;
		}
}
</script>

<form method="post" name="dk" onsubmit="return check_form(this)" enctype="multipart/form-data">
<center>
<table width="90%" border="0" cellpadding="0" cellspacing="0" borderColor=#111111>
        <tr>
    <td height="19" valign="middle" background="img/topbarfolder.gif"> <center>
        <strong><font color="red"> Qu&#7843;ng c&#225;o Banner/Logo </font><br>
      </center></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class=dott2><table width="90%" borderColor=#111111 cellspacing="1" cellpadding="1">
 
    <tr> 
            <td valign="top"><B>Đơn vị quảng cáo :</B></td>
      <td><input onkeyup=initTyper(this); size=75 name="alt" type="text">
            </td>
    </tr>
    <tr> 
            <td valign="top"><B>Website :</B></td>
      <td><input size=75 name="website"  type="text">
            </td>
    </tr>
  



    <tr> 
            <td valign="top"><B>Vị trí quảng cáo:</B></td>
      <td>
<select name="vitri" id="vitri">
<? $a="select * from tbl_vitriquangcao";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['ma_vitri']?>'><?=$row['vitriquangcao']?></option>
<? }?> 
</select>
</td>
    </tr>



<tr><td valign="top"><B>&#7842;nh Upload:</B></td>
<td><input type="hidden" name="MAX_FILE_SIZE" value="9150000" size='50'>
<input size='50' name="file_upload" type="file"></td></tr>

<tr>
        <td align="left" class="style1"><B>Ng&#224;y b&#7855;t &#273;&#7847;u:</td>
        <td align="left"><input  name="from" type="text" id="from" size='50'>
          <a href="javascript:show_calendar('dk.from');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a></td>
      </tr>
    <tr>
        <td align="left" class="style1"><B>Ng&#224;y k&#7871;t thúc:</td>
        <td align="left"><input  name="from1" type="text" id="from1" size='50'>
          <a href="javascript:show_calendar('dk.from1');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a></td>
      </tr>
    
<TR><td></td>
      <td><br><input  name="submit" type="submit" id="submit" value="Update"></td>
    </tr>
<br>
  </form></table></td></tr></table>


<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "'adv_banner.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Ban co chac la muon xoa khong vay???')) {
          window.location.href=theURL;
       }
       else {
          alert ('Ok. Chua thuc hien tac vu nao.');
       } 
    }
    //-->
</script>

<TABLE height=20><TBODY><TR><TD></TD></TR></TBODY></TABLE>


		<Body bgcolor=#000000>
			           
                              <TABLE class=MenuTop cellSpacing=1 borderColor=#111111 bgcolor=#000000
                                cellPadding=1 width="96%" border=0>
                                <TBODY>

                                <TR class=nenxanh5>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Số TT</B></DIV></TD>
                                <TD class=textxanhbold12 width="23%">
                                <DIV align=center><B>Website</B></DIV></TD>
                                <TD class=textxanhbold12 width="23%">
                                <DIV align=center><B>Đơn vị quảng cáo</B></DIV></TD>
                                <TD class=textxanhbold1 width="10%">
                                <DIV align=center><B>V&#7883; tr&#237;</B></DIV></TD>
                                <TD class=textxanhbold1 width="10%">
                                <DIV align=center><B>Ngày bắt đầu</a></B></DIV></TD>
                                <TD class=textxanhbold1 width="10%">
                                <DIV align=center><B>Ngày kết thúc</a></B></DIV></TD>
                                <TD class=textxanhbold1 width="10%">
                                <DIV align=center><B>Tình trạng</a></B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?php
$n=0;
$today = getdate();
$month1 = $today['mon'];
$day1 = $today['mday'];
$year1 = $today['year'];
$ngay1 = $year1."-".$month1."-".$day1;																
$sql=@mysql_query("SELECT * FROM `tbl_quangcaochitiet` where flag='$n' ORDER BY ma_quangcao DESC") 
                                or die(mysql_error());
                                $line=0;
			                    while($row=@mysql_fetch_array($sql)) {
			                 	$line++;
			                 	$donvi=$row["donvidangquangcao"];
                                $id =$row["ma_quangcao"]; 
                                $url = $row["url"]; 
                                $images = $row["logo"];
                                $ma_vitri= $row["ma_vitri"];
                                $batdau=$row["batdau"];
                                $ketthuc=$row["ketthuc"];
                                $daykt=substr($ketthuc,8,2);
                                $thangkt=substr($ketthuc,5,2);
                                $namkt=substr($ketthuc,0,4);
                                $tinhtrang=$row["tinhtrang"];	
 echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=\"left\">&nbsp;&nbsp; $line
 </TD>
<TD align=\"left\">&nbsp;&nbsp; $url
 </TD><TD align=\"left\">&nbsp;&nbsp; $donvi
 </TD><TD><center><font color=#76B646><B>";
  $sql1=@mysql_query("SELECT * FROM tbl_vitriquangcao WHERE ma_vitri='$ma_vitri'");
  	  while($v=@mysql_fetch_array($sql1)){
  	  echo $v['vitriquangcao'];	 } 
	  echo "</B></font></center></TD>
<TD><center>$batdau</center></TD>
<TD><center>$ketthuc</center></TD>
<TD><center>"; if(($daykt<$day1)&&($thangkt<=$month1)&&($namkt<=$year1)){ echo "<font color='red'>Hết hiệu lực"; } else echo "Còn hiệu lực";
echo "</center></TD>		  
<TD><center>
<a class='Market' href='adv_banner.php?dialoose=Edit&id=$id' onmouseover='doTooltip(event,\"../images/qc/$images\",\"$alt\")' onmouseout='hideTip()'>S&#7917;a</a>
</center></TD>
<TD><center><a href=\"javascript:baoloi('adv_banner.php?dialoose=Delete&id=$id&file=$images')\">Xo&#225;</a></center></TD>
</TR>";
	
				}

echo("</table>

<TABLE height=20><TBODY><TR><TD></TD></TR></TBODY></TABLE>");
}
function Edit() {
$id = intval($_GET[id]);
$a = "select * from tbl_quangcaochitiet where ma_quangcao = \"$id\"";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);

	//===================================================
	// EDIT:
	//===================================================
?>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Ban co chac chan muon xoa hay khong?')){
		location.href='adv_banner.php?dialoose=Delete&id=<? echo $c['ma_quangcao']; ?>';
	}
}
</SCRIPT>
<script src="images/date-picker.js"></script>
<form method="post" name="dk" onsubmit="validate();" enctype="multipart/form-data">
<center>
<table width="550" border="0" cellpadding="0" cellspacing="0">
        <tr>
    <td height="19" valign="middle" background="img/topbarfolder.gif"> <center>
        <strong><font color="red">S&#7917;a thông tin quảng cáo</font><br>
      </center></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class=dott2><table width="550" border="0" cellspacing="1" cellpadding="1">
    <tr> 
            <td valign="top"><B>Đơn vị quảng cáo:</B></td>
      <td><input onkeyup=initTyper(this); size=61 name="alt" value="<? echo $c['donvidangquangcao']; ?>" type="text">
            </td>
    </tr>
  <tr> 
            <td valign="top"><B>Website:</B></td>
      <td><input size=61 name="website"  value="<? echo $c['url']; ?>" type="text">
            </td>
    </tr>







    <tr> 
            <td valign="top"><B>Vị trí quảng cáo:</B></td>
      <td>
<SELECT NAME="vitri" size=0>
		<?
	$sel_cat=@mysql_query("select * from tbl_vitriquangcao order by ma_vitri");
	while($res=@mysql_fetch_array($sel_cat))
	{
?>
		<option value="<?php echo $res['ma_vitri']; ?>" <?php if($c['ma_vitri']==$res['ma_vitri']){echo "selected";}?>><?echo $res['vitriquangcao'];?>
<?
	}
?>
				</select></td>
    </tr>


<tr><td valign="top"><B>&#7842;nh Upload:</B></td>
<td><input type="hidden" name="MAX_FILE_SIZE" value="9150000">
<input size=26 name="file_upload" type="file"> (Nếu muốn thay ảnh mới) <br><a href="../images/qc/<? echo $c['logo']; ?>" target='_blank'>(Click vào đây xem ảnh đã upload)</a>
</td></tr>
<tr>
        <td align="left" class="style1"><B>Ng&#224;y b&#7855;t &#273;&#7847;u:</td>
        <td align="left"><input  name="from" type="text" id="from" size='50' value="<?php echo $c['batdau'];?>">
          <a href="javascript:show_calendar('dk.from');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a></td>
      </tr>
    <tr>
        <td align="left" class="style1"><B>Ng&#224;y k&#7871;t thúc:</td>
        <td align="left"><input  name="from1" type="text" id="from1" size='50' value="<?php echo $c['ketthuc'];?>">
          <a href="javascript:show_calendar('dk.from1');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a></td>
      </tr>

<tr> 
      <td align="left" class="style1"><font size="2"><b>Duy&#7879;t tin:</b></font></td>
<td align="left"><select name="duyettin" id="duyettin" size=0>
	 <?php 
	$sqltt=@mysql_query("SELECT * FROM tbl_quangcaochitiet WHERE ma_quangcao='$id'");
	while ($rowtt=@mysql_fetch_assoc($sqltt)){
		$vinh=$rowtt['tinhtrang'];
		         if($vinh==1){ ?>
                          <option value="<?php echo $rowtt['tinhtrang']; ?>">Tin &#273;&#432;&#7907;c duy&#7879;t</option>
                          <option value="0">Tin ch&#432;a &#273;&#432;&#7907;c duy&#7879;t</option>
                 <?php } else { ?>
                 		  <option value="<?php echo $rowtt['tinhtrang']; ?>">Tin ch&#432;a &#273;&#432;&#7907;c duy&#7879;t</option>
                          <option value="1">Tin &#273;&#432;&#7907;c duy&#7879;t</option>
                 	<?php }
    } 
    ?>	  
                 			  
</select>
</td>
</tr>


<TR><td></td>
      <td><input name="submit" type="submit" id="submit" value="Edit & Update">


<INPUT  onclick=JavaScript:Deletepost(); type=button value="Delete" name=btDeletepost>

</td>
    </tr>

  </form></table></td></tr></table>






<?
}
function Delete() {

	//===================================================
	// DELETE:
	//===================================================

$id =intval($_GET[id]);
$nv=1+0;
		//delete the database record
		$q1 = "update tbl_quangcaochitiet  set flag='$nv' where ma_quangcao= '$_GET[id]' ";
		@mysql_query($q1) or die(mysql_error());
echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"1; url=adv_banner.php\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; xo&#225; th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"adv_banner.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";


}
?>
