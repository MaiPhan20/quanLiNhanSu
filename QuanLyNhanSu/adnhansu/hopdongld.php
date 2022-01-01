<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");

	$member_id = addslashes($_SESSION['member_id']);

	

?>

<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "'new.php?" + pid );
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
	case "delete":
			delete();
	break;
	case "select":
			select();
	break;
}

	//===================================================
	// FUNCTION INDEX
	//===================================================

function index() {

	//===================================================
	// BEGIN Update
	//===================================================

if ($_GET["act"] == "do" ) { 
    $qlns_mahsnv =$_POST["title"]; 
    $mahopdong= $_POST["mahopdong"];
    $ngaybatdau= $_POST["from"];
    $ngayketthuc= $_POST["end"];
    $hinhthuc= $_POST["hinhthuc"];
    $noidung= $_POST["noidung"];
    $ghichu= $_POST["ghichu"];
	  echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=hopdongld.php">
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
      <br>(<a href="hopdongld.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';	
    $q3 = "Insert into qlns_hopdonglaodong set
	qlns_mahsnv  = \"$qlns_mahsnv\",
    qlns_mahopdong = \"{$mahopdong}\",qlns_ngaybd = \"{$ngaybatdau}\",qlns_ngaykt= \"{$ngayketthuc}\",
    	qlns_hinhthuchd = \"{$hinhthuc}\",qlns_noidunghd = \"{$noidung}\",qlns_ghichuhd = \"{$ghichu}\"		
    ";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;

	}
   
	//===================================================
	// END Update
	//===================================================

?>
<script type="text/javascript" src=him.js></script>
<script language="javascript">
	function check_form(the_form)
	{ var the_title    = the_form.title.value;
      if ((the_title==''))
		{
			alert("Ban nhap thong tin doi tac!");
			the_form.title.focus();
			return false;
		}
}
</script>
<script src="images/date-picker.js"></script>
<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>

			<script type="text/javascript">
		    WYSIWYG.attach('ghichu'); 
			</script>
				<script type="text/javascript">
		    WYSIWYG.attach('hinhthuc'); 
			</script>
	<script>

function ajaxLoad(url,id)
   {
       if (document.getElementById) {
           var x = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
           }
           if (x){
           x.onreadystatechange = function()
                   {
                       el = document.getElementById(id);
                       el.innerHTML='<div align=center><font color=white> CTN Viet Nam....';
               if (x.readyState == 4 && x.status == 200)
                       {
                       el.innerHTML = x.responseText;
                   }
                   }
               x.open("GET", url, true);
               x.send(null);
               }
       }
function pb_display(x,y)       
   {
   ajaxLoad('displayhopdongld.php?lich='+x,'lichps');
   }
</script>
<center>
<form action="hopdongld.php?act=do"  method="post" NAME="dk" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Thêm Hợp đồng lao động cán bộ nhân viên</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Tên Nhân viên:</b></font>
        <select name="title" id="title" onchange="pb_display(this.value);">
<? $a="select * from qlns_hosonhanvien where qlns_tinhtrangnv='1'";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mahsnv']?>'><?php echo $row['qlns_honv']." ".$row['qlns_tennv']; ?></option>
<? }?> 
</select></td>
    	</tr>
   <tr><td><div id="lichps">
 <div></td></tr>
   	 		<tr> 
      	<td ><font size="2"><b>Mã hợp đồng :</b></font>
<input  name="mahopdong" type="text" id="mahopdong" size='70' >
	</td>
	</tr> 
   	 	<tr> 
      	<td ><font size="2"><b>Ngày bắt đầu :</b></font>
<input  name="from" type="text" id="from" size='70' >
          <a href="javascript:show_calendar('dk.from');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a><br>
	</td>
	</tr> 
   	 	 	<tr> 
      	<td ><font size="2"><b>Ngày kết thúc :</b></font>
<input  name="end" type="text" id="end" size='70' >
          <a href="javascript:show_calendar('dk.end');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a><br>
	</td>
	</tr> 
   	 <tr> 
      	<td ><font size="2"><b>Hình thức :</b></font><br>
	<textarea  name="hinhthuc" cols="136" rows="10" id="hinhthuc"></textarea><br>
	</td>
	</tr> 
   	
	<tr> 
      	<td ><font size="2"><b>Ghi chú :</b></font><br>
	<textarea  name="ghichu" cols="136" rows="10" id="ghichu"></textarea><br>
	</td>
	</tr> 
	<tr><td valign="top">&nbsp;<div align=center><input class=butstyle  name="submit" type="submit" id="submit" value="Add "><br><br></td>
    	</tr>

	</form>
	</TBODY></TABLE></center>




<?
	  

}
	//===================================================
	// FUNCTION edit
	//===================================================

function edit() {
	$member_id = addslashes($_SESSION['member_id']);
	$id = intval( $_GET["id"] );
    $a = "select * from qlns_hopdonglaodong where qlns_mahd= \"$id\"";
    $b = @mysql_query($a) or die(mysql_error());
    $c = @mysql_fetch_array($b);
    $manv=$c['qlns_mahsnv'];
    //===================================================
	// UPDATE PRODUCT
	//===================================================
  	$Submit = $_POST["Submit"];
	$id = intval( $_GET["id"] );
  if(isset($Submit) && $Submit == 'Edit & Update')
  {
  
echo("<br><br><br><br><br><br><div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"2; url=hopdongld.php?dialoose=select\">
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7840;N &#272;&#7842; C&#7852;P NH&#7852;T TH&#192;NH C&#212;NG</font></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"hopdongld.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");


 
	$title = replace($_POST["title"]);
	$taisan=addslashes($_POST['content']);
	$mahopdong= $_POST["mahopdong"];
    $ngaybatdau= $_POST["from"];
    $ngayketthuc= $_POST["end"];
    $hinhthuc= $_POST["hinhthuc"];
    $noidung= $_POST["noidung"];
    $ghichu= $_POST["ghichu"];
    $q3 = "update qlns_hopdonglaodong set
    qlns_mahopdong=\"$mahopdong\",qlns_ngaybd=\"$ngaybatdau\",qlns_ngaykt=\"$ngayketthuc\",qlns_hinhthuchd =\"$hinhthuc\",qlns_noidunghd =\"$noidung\",qlns_ghichuhd =\"$ghichu\"	
	where qlns_mahd= \"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;
  }



?> <script src="images/date-picker.js"></script>
	<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('hinhthuc'); 
			</script>
		
			<script type="text/javascript">
		    WYSIWYG.attach('ghichu'); 
			</script>	
				<center>
<form enctype="multipart/form-data" method="POST" NAME="dk"> 

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>S&#7917;a Hợp đồng lao động</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Mã Nhân Viên:</b></font>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $c['qlns_mahsnv']; ?>" size="70" readonly=true></td>
    	</tr>
       <tr><td>
     <?php  	
 $query=@mysql_query("SELECT * FROM qlns_hosonhanvien WHERE qlns_mahsnv='$manv'");
$designwebvn=@mysql_fetch_assoc($query);
$ho=$designwebvn['qlns_honv'];
$ten=$designwebvn['qlns_tennv'];
$qlns_manv=$designwebvn['qlns_manv'];
$qlns_mahsnv=$designwebvn['qlns_mahsnv'];
$imagectv=$designwebvn['qlns_anhnvien'];
$qlns_mact=$designwebvn['qlns_mact'];
$qlns_mabp=$designwebvn['qlns_mabp'];
$qlns_macv=$designwebvn['qlns_macv'];
$qlns_macmnd=$designwebvn['qlns_macmnd'];
$qlns_email=$designwebvn['qlns_email'];
$donvi=@mysql_query("select * from qlns_congty where qlns_mact='$qlns_mact'");
$rowdonvi=@mysql_fetch_assoc($donvi);
$tendonvi=$rowdonvi['qlns_tencongty'];
$phongban=@mysql_query("select * from qlns_bophan where qlns_mabp='$qlns_mabp'");
$rowphongban=@mysql_fetch_assoc($phongban);
$tenphongban=$rowphongban['qlns_tenbophan'];
$chucvu=@mysql_query("select * from qlns_chucvu where qlns_macv='$qlns_macv'");
$rowchucvu=@mysql_fetch_assoc($chucvu);
$tenchucvu=$rowchucvu['qlns_tenchucvu'];
echo "	<table border='0' width='100%' name='hfasdf' cellSpacing=0 cellPadding=0 valign='top'>
<tr><td colspan='3' height='20' valign='top'></td></tr>
<tr><td width='20%' valign='top'><img src='../images/news/$imagectv' width='161' height='209'> </td><td width='1%'></td><td width='79%' valign='top'>
	<table border='0' width='100%' name='hffsdafasdf' cellSpacing=0 cellPadding=0 >
	<tr><td colspan='3' height='5' valign='top'></td></tr>
	<tr><td width='17%' height='30'><b>Họ Tên : </b></td><td width='1%'></td><td width='82%'><div align='left'>$ho $ten</td></tr>
	<tr><td width='17%'  height='30'><b>Mã Nhân Viên :</b></td><td width='1%'></td><td><div align='left'>$qlns_manv</td></tr>
	<tr><td width='17%'  height='30'><b> Đơn vị : </b></td><td width='1%'></td><td><div align='left'>$tendonvi</td></tr>
	<tr><td width='17%'  height='30'><b> Phòng ban : </b></td><td width='1%'></td><td><div align='left'>$tenphongban</td></tr>
	<tr><td width='17%'  height='30'><b> Chức vụ : </b></td><td width='1%'></td><td><div align='left'>$tenchucvu</td></tr>
	<tr><td width='17%'  height='30'><b> Email : </b></td><td width='1%'></td><td><div align='left'>$qlns_email</td></tr>
	<tr><td width='17%'  height='30'><b> Số CMND : </b></td><td width='1%'></td><td><div align='left'>$qlns_macmnd</td></tr>
	<tr><td colspan='3' height='20' valign='top'></td></tr>
	</table>
	</td></tr>
<tr><td colspan='3' height='20'></td></tr>
</table";	
       		
       		?>
       		</td></tr>
     	<tr> 
      	<td ><font size="2"><b>Mã hợp đồng :</b></font>
<input  name="mahopdong" type="text" id="mahopdong" size='70' value="<?php echo $c['qlns_mahopdong']; ?>">
	</td>
	</tr>   			
       			
    <tr> 
      	<td ><font size="2"><b>Ngày Bắt đầu :</b></font>
<input  name="from" type="text" id="from" size='70' value="<?php echo $c['qlns_ngaybd']; ?>" >
          <a href="javascript:show_calendar('dk.from');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a><br>
	</td>
	</tr> 
	<tr> 
      	<td ><font size="2"><b>Ngày Kết thúc :</b></font>
<input  name="end" type="text" id="end" size='70' value="<?php echo $c['qlns_ngaykt']; ?>" >
          <a href="javascript:show_calendar('dk.end');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a><br>
	</td>
	</tr> 			
     
     
     <tr><td ><font size="2"><b>Hình thức :</b></font><br>
	<textarea  name="hinhthuc" cols="136" rows="10" id="hinhthuc"><? echo $c['qlns_hinhthuchd']; ?></textarea><br>
	</td>
	</tr>

	<tr><td ><font size="2"><b>Ghi chú :</b></font><br>
	<textarea  name="ghichu" cols="136" rows="10" id="ghichu"><? echo $c['qlns_ghichuhd']; ?></textarea><br>
	</td>
	</tr>
	<tr> 
	<td valign="top">&nbsp;<input class=butstyle id="Submit" name="Submit" type="Submit" value="Edit & Update"><br><br></td>
    	</tr>

	</form>
	</TBODY></TABLE></center>




<?
}
	//===================================================
	// FUNCTION Select
	//===================================================

function select() {



?>
<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "'webdesignvn.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Ban co chac la muon xoa khong vay???')) {
          window.location.href=theURL;
       }

    }
    //-->
</script>

<div align=center> <TABLE class=MenuTop cellSpacing=1 borderColor=#111111 cellSpacing=0 cellPadding=0  bgcolor=#000000 cellPadding=1 width="90%" border=0>
                                <TBODY>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold12 width="15%">&nbsp;<B>Mã Nhân Viên</B></TD>
                                <TD class=textxanhbold12 width="25%">
                                <DIV align=center><B>Họ và Tên</B></DIV></TD>
                                <TD class=textxanhbold12 width="25%">
                                <DIV align=center><B>Đơn vị</B></DIV></TD>
                                <TD class=textxanhbold12 width="15%">
                                 <DIV align=center><B>Mã hợp đồng</B></DIV></TD>
                                  <TD class=textxanhbold12 width="10%">
                                 <DIV align=center><B>Ngày bắt đầu</B></DIV></TD>
                                  <TD class=textxanhbold12 width="10%">
                                 <DIV align=center><B>Ngày kết thúc</B></DIV></TD>
                                 <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?
$sql=@mysql_query("SELECT * FROM `qlns_hopdonglaodong` ORDER BY qlns_mahd desc") 
                   or die(mysql_error());
			     while($row=@mysql_fetch_array($sql)) {
				$id=$row['qlns_mahd'];
				$qlns_mahsnv=$row['qlns_mahsnv'];
				$qlns_mahopdong=$row['qlns_mahopdong'];
				$qlns_ngaybd=$row['qlns_ngaybd'];
				$qlns_ngaykt=$row['qlns_ngaykt'];
				
				
				$sqlten=@mysql_query("select * from qlns_hosonhanvien where qlns_mahsnv='$qlns_mahsnv'");
				$rowten=@mysql_fetch_assoc($sqlten);
				$qlns_honv=$rowten['qlns_honv'];
				$qlns_manv=$rowten['qlns_manv'];
				$qlns_mact=$rowten['qlns_mact'];
				$qlns_tennv=$rowten['qlns_tennv'];
				$qlns_tinhtranghn=$row['qlns_tinhtranghn'];
				$qlns_quoctich=$row['qlns_quoctich'];
				$qlns_dienthoainha=$row['qlns_dienthoainha'];
				$qlns_dthoaididong=$row['qlns_dthoaididong'];
			    $qlns_diachi=$row['qlns_diachi'];
			    $sqldonvi=@mysql_query("select * from qlns_congty where qlns_mact='$qlns_mact'");
				$rowdonvi=@mysql_fetch_assoc($sqldonvi);
				$qlns_tencongty=$rowdonvi['qlns_tencongty'];
		echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>"; echo "<b>".$qlns_manv."</b>"; 
echo "</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_honv $qlns_tennv</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_tencongty</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_mahopdong</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_ngaybd</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_ngaykt</P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"hopdongld.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('hopdongld.php?dialoose=delete&id=$id&file=$images&file2=$images_big')\">Xo&#225;</a></p</TD>
</TR>";
					}
?>

</TBODY></TABLE>
<?


}
	//===================================================
	// FUNCTION remove
	//===================================================

function delete() {

//delete the database record
$q1 = "delete from qlns_hopdonglaodong where qlns_mahd = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

redirect("hopdongld.php?dialoose=select");

}
?>