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
    $hinhthuc=$_POST['hinhthuc'];
    $lydo=$_POST['lydo'];
    $ghichu=$_POST['ghichu'];
    $sotien=$_POST['sotien'];
    $ngaytk=date('d/m/20y');
    echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=kyluatkl.php">
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
      <br>(<a href="kyluatkl.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';	
    $q3 = "Insert into qlns_kyluatkt set
	qlns_mahsnv  = \"$qlns_mahsnv\",
    qlns_hinhthuc = \"$hinhthuc\",
    qlns_ghichu =\"$ghichu\",	
    qlns_lydo = \"{$lydo}\",
    qlns_sotien = \"{$sotien}\",
    qlns_ngay = \"{$ngaytk}\"
    	
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
	{ var the_sotien    = the_form.sotien.value;
      if ((the_sotien==''))
		{
			alert("Bạn chưa nhập thông tin kỷ luật!");
			the_form.sotien.focus();
			return false;
		}
}
</script>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('hinhthuc'); 
			</script>
		<script type="text/javascript">
		    WYSIWYG.attach('lydo'); 
			</script>
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
   ajaxLoad('displayktkl.php?lich='+x,'lichps');
   }
</script>
<center>
<form action="kyluatkl.php?act=do"  method="post" NAME="mainform" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Thêm Kỷ Luật nhân viên </b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Tên Nhân viên:</b></font>
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
      	<td ><font size="2"><b>Hình Thức:</b></font><br>
	<textarea  name="hinhthuc" cols="136" rows="10" id="hinhthuc"></textarea><br>
	</td>
	</tr> 
		<tr> 
      	<td ><font size="2"><b>Lý do:</b></font><br>
	<textarea  name="lydo" cols="136" rows="10" id="lydo"></textarea><br>
	</td>
	</tr> 
			<tr> 
      	<td ><font size="2"><b>Số tiền :</b></font>
<input  name="sotien" type="text" id="sotien" size='70'>
	</td>
	</tr>   	
		<tr> 
      	<td ><font size="2"><b>Ghi chú:</b></font><br>
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
    $a = "select * from qlns_kyluatkt where qlns_idkl= \"$id\"";
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
<meta http-equiv=\"REFRESH\" content=\"2; url=kyluatkl.php?dialoose=select\">
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
      <br>(<a href=\"kyluatkl.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");


 

	$hinhthuc=$_POST['hinhthuc'];
    $lydo =$_POST["lydo"];
    $ghichu =$_POST["ghichu"];
    $qlns_sotien=$_POST["sotien"];
    $q3 = "update qlns_kyluatkt set
	qlns_hinhthuc= \"$hinhthuc\",
    qlns_lydo= \"$lydo\",qlns_sotien=\"$qlns_sotien\",qlns_ghichu = \"$ghichu\"
	where qlns_idkl = \"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;
  }



?>
	<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('hinhthuc'); 
			</script>
			<script type="text/javascript">
		    WYSIWYG.attach('lydo'); 
			</script>
			<script type="text/javascript">
		    WYSIWYG.attach('ghichu'); 
			</script>
<center>
<form enctype="multipart/form-data" method="POST" NAME="mainform"> 

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>S&#7917;a Kỷ Luật Nhân Viên</b></font></div></td>
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
	<tr><td width='17%'  height='30'><b>Mã Nhân Viên :</b></td><td width='1%'></td><td><div align='left'>$qlns_mahsnv</td></tr>
	<tr><td width='17%'  height='30'><b> Đơn vị : </b></td><td width='1%'></td><td><div align='left'>$tendonvi</td></tr>
	<tr><td width='17%'  height='30'><b> Phòng ban : </b></td><td width='1%'></td><td><div align='left'>$tenphongban</td></tr>
	<tr><td width='17%'  height='30'><b> Chức vụ : </b></td><td width='1%'></td><td><div align='left'>$tenchucvu</td></tr>
	<tr><td width='17%'  height='30'><b> Email : </b></td><td width='1%'></td><td><div align='left'>$qlns_email</td></tr>
	<tr><td width='17%'  height='30'><b> Số CMND : </b></td><td width='1%'></td><td><div align='left'>$qlns_macmnd</td></tr>
	<tr><td colspan='3' height='20' valign='top'></td></tr>
	</table>
	</td></tr>
<tr><td colspan='3' height='20'></td></tr> ";

echo "</table";	
       		
       		?>
       		</td></tr>
    	    
	    	<tr><td ><font size="2"><b>Hình Thức:</b></font><br>
	<textarea  name="hinhthuc" cols="136" rows="10" id="hinhthuc"><? echo $c['qlns_hinhthuc']; ?></textarea><br>
	</td>
	</tr>
    <tr><td ><font size="2"><b>Lý Do:</b></font><br>
	<textarea  name="lydo" cols="136" rows="10" id="lydo"><? echo $c['qlns_lydo']; ?></textarea><br>
	</td>
	</tr>
		<tr> 
      	<td ><font size="2"><b>Số tiền :</b></font>
<input  name="sotien" type="text" id="sotien" size='70' value="<? echo $c['qlns_sotien']; ?>">
	</td>
	</tr>   				
	<tr><td ><font size="2"><b>Ghi chú:</b></font><br>
	<textarea  name="ghichu" cols="136" rows="10" id="ghichu"><? echo $c['qlns_ghichu']; ?></textarea><br>
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
                                <TD class=textxanhbold12 width="12%">&nbsp;<B>Mã Nhân Viên</B></TD>
                                <TD class=textxanhbold12 width="35%">
                                <DIV align=center><B>Tên Nhân viên</B></DIV></TD>
                                 <TD class=textxanhbold12 width="31%">
                                <DIV align=center><B>Hình thức</B></DIV></TD>
                                <TD class=textxanhbold12 width="15%">
                                <DIV align=center><B>Ngày </B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?php  
	$sql=@mysql_query("SELECT * FROM `qlns_kyluatkt` ORDER BY qlns_idkl desc") 
                   or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
				$id=$row['qlns_idkl'];
				$qlns_mahsnv=$row['qlns_mahsnv'];
				$sqlten=@mysql_query("select * from qlns_hosonhanvien where qlns_mahsnv='$qlns_mahsnv'");
				$rowten=@mysql_fetch_assoc($sqlten);
				$qlns_honv=$rowten['qlns_honv'];
				$qlns_tennv=$rowten['qlns_tennv'];
				$qlns_manv=$rowten['qlns_manv'];
				$qlns_hinhthuc=$row['qlns_hinhthuc'];
				
				$qlns_ngay=$row['qlns_ngay'];
		echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>"; echo "<b>".$qlns_manv."</b>"; 
echo "</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_honv $qlns_tennv</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_hinhthuc</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$qlns_ngay</P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"kyluatkl.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('kyluatkl.php?dialoose=delete&id=$id&file=$images&file2=$images_big')\">Xo&#225;</a></p</TD>
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
$q1 = "delete from qlns_kyluatkt where qlns_idkl ='$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

redirect("kyluatkl.php?dialoose=select");

}
?>