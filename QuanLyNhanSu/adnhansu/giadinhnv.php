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
    $quanhe=$_POST['quanhe'];
    $hoten=$_POST['hoten'];
    $gioitinh=$_POST['gioitinh'];
    $tinhtrang=$_POST['tinhtrang'];
    $ngaysinh=$_POST['ngaysinh'];
    $tuoi=$_POST['tuoi'];
    $diachi=$_POST['diachi'];
    $nghenghiep=$_POST['nghenghiep'];
    $ghichu=$_POST['ghichu'];
     echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=giadinhnv.php">
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
      <br>(<a href="giadinhnv.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';	
    $q3 = "Insert into qlns_giadinh  set
	qlns_mahsnv  = \"$qlns_mahsnv\",
    qlns_quanhe = \"$quanhe\",
    qlns_ten = \"{$hoten}\",
    qlns_gioitinh = \"{$gioitinh}\",
    qlns_tinhtrang = \"{$tinhtrang}\",
    qlns_ngaysinh = \"{$ngaysinh}\",
    qlns_tuoi = \"{$tuoi}\",
    qlns_diachi = \"{$diachi}\",
    qlns_nghenghiep = \"{$nghenghiep}\",					 
    qlns_ghichu = \"{$ghichu}\"		
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
			alert("Ban Nh???p th??ng tin gia ????nh !");
			the_form.title.focus();
			return false;
		}
}
</script>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('ghichu'); 
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
   ajaxLoad('displaygdnv.php?lich='+x,'lichps');
   }
</script>
<center>
<form action="giadinhnv.php?act=do"  method="post" NAME="mainform" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Th??m Gia ????nh nh??n vi??n </b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>T??n Nh??n vi??n:</b></font>
        <select name="title" id="title" onchange="pb_display(this.value);">
<? $a="select * from qlns_hosonhanvien";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mahsnv']?>'><?php echo $row['qlns_honv']." ".$row['qlns_tennv']; ?></option>
<? }?> 
</select></td>
    	</tr>
   <tr><td><div id="lichps">
 <div></td></tr>
   		<tr> 
      	<td><font size="2"><b>Quan h???:</b></font><br>
         <input name="quanhe" type="text" id="quanhe" size="105" >
         </td>
    	</tr>
    		<tr> 
      	<td><font size="2"><b>H??? t??n:</b></font><br>
        <input name="hoten" type="text" id="nghenghiepc" size="105" ></td>
    	</tr>
   		<tr> 
      	<td><font size="2"><b>Gi???i t??nh:</b></font> 
         <select name="gioitinh" id="gioitinh" size=0>
<option value="Nam">Nam</option>
<option value="N???">N???
</option>
</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font size="2"><b>T??nh tr???ng:</b></font>
        <select name="tinhtrang" id="tinhtrang" size=0>
<option value="C??n S???ng">C??n S???ng</option>
<option value="???? m???t">???? m???t
</option> </select></td>
    	</tr>
       
         <tr> 
      	<td><font size="2"><b>Ng??y sinh:</b></font><br>
        <input name="ngaysinh" type="text" id="ngaysinh" size="105" ></td>
    	</tr>
        <tr> 
      	<td><font size="2"><b>Tu???i:</b></font><br>
        <input name="tuoi" type="text" id="tuoi" size="105" ></td>
    	</tr>
        <tr> 
      	<td><font size="2"><b>?????a ch??? :</b></font><br>
        <input name="diachi" type="text" id="diachi" size="105" ></td>
    	</tr>
         <tr> 
      	<td><font size="2"><b>Ngh??? nghi???p :</b></font><br>
        <input name="nghenghiep" type="text" id="nghenghiep" size="105" ></td>
    	</tr>
        
        <tr> 
      	<td ><font size="2"><b>Ghi ch??:</b></font><br>
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
	$id = intval($_GET["id"] );
    $a = "select * from qlns_giadinh  where qlns_idgdnv= \"$id\"";
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
<meta http-equiv=\"REFRESH\" content=\"2; url=giadinhnv.php?dialoose=select\">
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
      <br>(<a href=\"giadinhnv.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");


 
    $mahsnvmn=$_POST["title"]; 
	$quanhe=$_POST['quanhe'];
    $hoten =$_POST["hoten"];
    $gioitinh=$_POST['gioitinh'];
    $tinhtrang=$_POST['tinhtrang'];
    $ngaysinh=$_POST['ngaysinh'];
    $tuoi=$_POST['tuoi'];
    $diachi=$_POST['diachi'];
    $nghenghiep=$_POST['nghenghiep'];
    $ghichu=$_POST['ghichu'];
    
    $q3 = "update qlns_giadinh  set
    qlns_mahsnv= \"$mahsnvmn\",
	qlns_quanhe= \"$quanhe\",
    qlns_ten= \"$hoten\",
	qlns_gioitinh= \"$gioitinh\",
	qlns_tinhtrang= \"$tinhtrang\",
    qlns_ngaysinh= \"$ngaysinh\",
    qlns_tuoi = \"$tuoi\",
    qlns_diachi= \"$diachi\",
    qlns_nghenghiep= \"$nghenghiep\",				
	qlns_ghichu=\"$ghichu\"	
	where qlns_idgdnv = \"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;
  }



?>
	<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>

			<script type="text/javascript">
		    WYSIWYG.attach('ghichu'); 
			</script>
<center>
<form enctype="multipart/form-data" method="POST" NAME="mainform"> 

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>S&#7917;a Gia ????nh Nh??n Vi??n</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>M?? Nh??n Vi??n:</b></font>
        <select name="title" id="title" onchange="pb_display(this.value);">
<? $a="select * from qlns_hosonhanvien";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mahsnv']?>' <?php if($manv==$row['qlns_mahsnv']){echo "selected";}?>><?php echo $row['qlns_honv']." ".$row['qlns_tennv']; ?></option>
<? }?> 
</select></td>
    	</tr>
       <tr><td>
    <div id="lichps">
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
	<tr><td width='17%' height='30'><b>H??? T??n : </b></td><td width='1%'></td><td width='82%'><div align='left'>$ho $ten</td></tr>
	<tr><td width='17%'  height='30'><b>M?? Nh??n Vi??n :</b></td><td width='1%'></td><td><div align='left'>$qlns_manv</td></tr>
	<tr><td width='17%'  height='30'><b> ????n v??? : </b></td><td width='1%'></td><td><div align='left'>$tendonvi</td></tr>
	<tr><td width='17%'  height='30'><b> Ph??ng ban : </b></td><td width='1%'></td><td><div align='left'>$tenphongban</td></tr>
	<tr><td width='17%'  height='30'><b> Ch???c v??? : </b></td><td width='1%'></td><td><div align='left'>$tenchucvu</td></tr>
	<tr><td width='17%'  height='30'><b> Email : </b></td><td width='1%'></td><td><div align='left'>$qlns_email</td></tr>
	<tr><td width='17%'  height='30'><b> S??? CMND : </b></td><td width='1%'></td><td><div align='left'>$qlns_macmnd</td></tr>
	<tr><td colspan='3' height='20' valign='top'></td></tr>
	</table>
	</td></tr>
<tr><td colspan='3' height='20'></td></tr>
</table";	
       		
       		?>
       </div>		</td></tr>
    	
    	 <tr> 
      	<td><font size="2"><b>Quan h???:</b></font><br>
        <input name="quanhe" type="text" id="quanhe" size="105" value="<? echo $c['qlns_quanhe']; ?>"></td>
    	</tr>
    	<tr> 
      	<td><font size="2"><b>H??? t??n:</b></font><br>
        <input name="hoten" type="text" id="hoten" value="<? echo $c['qlns_ten']; ?>" size="105" ></td>
    	</tr>
    	<tr> 
      	<td><font size="2"><b>Gi???i t??nh :</b></font><br>
        <select name="gioitinh" id="gioitinh" size=0>
	 <?php 

		         if($c['qlns_gioitinh']=="Nam"){ ?>
                          <option value="<?php echo $c['qlns_gioitinh']; ?>">Nam</option>
                          <option value="N???">N???</option>
                 <?php } else { ?>
                 		  <option value="<?php echo $c['qlns_gioitinh']; ?>">N???</option>
                          <option value="Nam">Nam</option>
                 	<?php }
    
    ?>	  
                 			  
</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <font size="2"><b>T??nh tr???ng:</b></font>
	
	 <select name="tinhtrang" id="tinhtrang" size=0>
	 <?php 

		         if($c['qlns_tinhtrang']=="C??n S???ng"){ ?>
                          <option value="<?php echo $c['qlns_tinhtrang']; ?>">C??n S???ng</option>
                          <option value="???? m???t">???? m???t</option>
                 <?php } else { ?>
                 		  <option value="<?php echo $c['qlns_tinhtrang']; ?>">???? m???t</option>
                          <option value="C??n S???ng">C??n S???ng</option>
                 	<?php }
     
    ?>	  
                 			  
</select>
	</td>
    	</tr>
       
      	<td><font size="2"><b>Ng??y sinh:</b></font><br>
        <input name="ngaysinh" type="text" id="ngaysinh" size="105" value="<? echo $c['qlns_ngaysinh']; ?>"></td>
    	</tr>
        <tr> 
      	<td><font size="2"><b>Tu???i :</b></font><br>
        <input name="tuoi" type="text" id="tuoi" size="105" value="<? echo $c['qlns_tuoi']; ?>"></td>
    	</tr>
       	  <tr> 
      	<td><font size="2"><b>?????a ch??? :</b></font><br>
        <input name="diachi" type="text" id="diachi" size="105" value="<? echo $c['qlns_diachi']; ?>"></td>
    	</tr>
    	 <tr> 
      	<td><font size="2"><b>Ngh??? nghi???p :</b></font><br>
        <input name="nghenghiep" type="text" id="nghenghiep" size="105" value="<? echo $c['qlns_nghenghiep']; ?>"></td>
    	</tr>	 	
     <tr><td ><font size="2"><b>Ghi Ch??:</b></font><br>
	<textarea  name="ghichu" cols="136" rows="10" id="ghichu"><? echo $c['qlns_ghichu']; ?></textarea><br>
	</td>
	</tr>
    
	<tr> 
	<td valign="top">&nbsp;<input class=butstyle id="Submit" name="Submit" type="Submit" value="Edit & Update"><br><br></td>
    	</tr>

	</form>
	</TBODY></TABLE></center>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('ghichu'); 
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
   ajaxLoad('displaygdnv.php?lich='+x,'lichps');
   }
</script>



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
                                <TD class=textxanhbold12 width="10%">&nbsp;<B>M?? Nh??n Vi??n</B></TD>
                                <TD class=textxanhbold12 width="20%">
                                <DIV align=center><B>T??n Nh??n vi??n</B></DIV></TD>
                                 <TD class=textxanhbold12 width="15%">
                                <DIV align=center><B>Quan h???</B></DIV></TD>
                                <TD class=textxanhbold12 width="15%">
                                <DIV align=center><B>H??? v?? t??n </B></DIV></TD>
                                <TD class=textxanhbold12 width="15%">
                                <DIV align=center><B>N??m sinh </B></DIV></TD>
                                <TD class=textxanhbold12 width="15%">
                                <DIV align=center><B>T??nh tr???ng </B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?php
$sql=@mysql_query("SELECT * FROM `qlns_giadinh` ORDER BY qlns_idgdnv Desc") 
                   or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
				$id=$row['qlns_idgdnv'];
				$qlns_mahsnv=$row['qlns_mahsnv'];
				$sqlten=@mysql_query("select * from qlns_hosonhanvien where qlns_mahsnv='$qlns_mahsnv'");
				$rowten=@mysql_fetch_assoc($sqlten);
				$qlns_manv=$rowten['qlns_manv'];
				$qlns_honv=$rowten['qlns_honv'];
				$qlns_tennv=$rowten['qlns_tennv'];
				$qlns_quanhe=$row['qlns_quanhe'];
				$qlns_ten=$row['qlns_ten'];
				$qlns_ngaysinh=$row['qlns_ngaysinh'];
				$qlns_tinhtrang=$row['qlns_tinhtrang'];
			    
		echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>"; echo "<b>".$qlns_manv."</b>"; 
echo "</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_honv $qlns_tennv</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_quanhe</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_ten</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_ngaysinh</P></TD>	
<TD align=middle alignt=middle><P class=textxam12>$qlns_tinhtrang</P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"giadinhnv.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('giadinhnv.php?dialoose=delete&id=$id&file=$images&file2=$images_big')\">Xo&#225;</a></p</TD>
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
$q1 = "delete from qlns_giadinh  where qlns_idgdnv = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

redirect("giadinhnv.php?dialoose=select");

}
?>