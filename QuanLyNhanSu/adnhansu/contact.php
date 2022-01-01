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
	$donvi= intval($_POST["donvi"]);
    $tieude = $_POST["tieude"]; 
	$noidung= $_POST["gioithieu"];
    $d= date("d/m/20y"); 
    $nguoigoi= "CTN Việt Nam";
       echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=contact.php">
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
      <br>(<a href="contact.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';	
    $q3 = "Insert into qlns_contact set
	ctn_level  = \"$donvi\",
	contact_post = \"$nguoigoi\",
	contact_heading = \"$tieude\",
    contact_content= \"$noidung\",
    contact_ngay = \"{$d}\"
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
	{ var the_tieude    = the_form.tieude.value;
      if ((the_tieude==''))
		{
			alert("Ban nhap thong tin Liên hệ!");
			the_form.title.focus();
			return false;
		}
}
</script>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('gioithieu'); 
			</script>

<center>
<form action="contact.php?act=do"  method="post" NAME="mainform" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Thêm Liên Hệ</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Đơn vị Liên hệ:</b></font><br>
       <select name="donvi" id="donvi">
<? $a="select * from qlns_administrator where ctn_level != 1";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['ctn_level']?>'><?=$row['ctn_name']?></option>
<? }?> 
</select>
       
        </td>
    	</tr>
    	<tr> 
      	<td><font size="2"><b>Tiêu đề:</b></font><br>
        <input name="tieude" type="text" id="tieude" size="105" ></td>
    	</tr>
   <tr> 
      	<td ><font size="2"><b>Nội dung:</b></font><br>
	<textarea  name="gioithieu" cols="136" rows="10" id="gioithieu"></textarea><br>
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
    $a = "select * from qlns_contact where contact_id= \"$id\"";
    $b = @mysql_query($a) or die(mysql_error());
    $c = @mysql_fetch_array($b);
    //===================================================
	// UPDATE PRODUCT
	//===================================================
  	$Submit = $_POST["Submit"];
	$id = intval( $_GET["id"] );
	$level=$c['ctn_level'];
	$sqe=@mysql_query("select ctn_name from qlns_administrator where ctn_level='$level'");
	$rowsqe=@mysql_fetch_assoc($sqe);
	$name=$rowsqe["ctn_name"];
  ?>
	<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('content'); 
			</script>
<center>
<form enctype="multipart/form-data" method="POST" NAME="mainform"> 

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Xem thông tin Liên Hệ</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Đơn vị Gởi :</b></font><br>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $c['contact_post']; ?>" size="136" ></td>
    	</tr>
        <tr> 
      	<td><font size="2"><b>Đơn vị Nhận:</b></font><br>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $name; ?>" size="136" ></td>
    	</tr>
         <tr> 
      	<td><font size="2"><b>Tiêu đề:</b></font><br>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $c['contact_heading']; ?>" size="136" ></td>
    	</tr>
    
      	<tr><td ><font size="2"><b>Nội dung:</b></font><br>
	<textarea  name="content" cols="136" rows="10" id="content"><? echo $c['contact_content']; ?></textarea><br>
	</td>
	</tr>
       <tr> 
      	<td><font size="2"><b>Ngày Liên hệ:</b></font>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $c['contact_ngay']; ?>" size="25" ></td>
    	</tr>
	

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
                                <TD class=textxanhbold12 width="7%">&nbsp;<B>Mã Liên hệ</B></TD>
                                <TD class=textxanhbold12 width="25%">
                                <DIV align=center><B>Tiêu đề</B></DIV></TD>
                                 <TD class=textxanhbold12 width="25%">
                                <DIV align=center><B>Đơn vị gởi</B></DIV></TD>
                                <TD class=textxanhbold12 width="25%">
                                <DIV align=center><B>Đơn vị nhận</B></DIV></TD>
                                <TD class=textxanhbold12 width="8%">
                                <DIV align=center><B>Ngày </B></DIV></TD> 
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xem</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?
$sql=@mysql_query("SELECT * FROM `qlns_contact` ORDER BY contact_id ASC") 
                   or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
				$id=$row['contact_id'];
				$ctn_level=$row['ctn_level'];
				$sqk=@mysql_query("Select ctn_name from qlns_administrator where ctn_level='$ctn_level'");
				$rowsqk=@mysql_fetch_assoc($sqk);
				$name=$rowsqk['ctn_name'];
				$contact_post=$row['contact_post'];
				$contact_heading=$row['contact_heading'];
				$contact_ngay=$row['contact_ngay'];
			 
			    
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>$id</P></TD>
	
<TD align=middle alignt=middle><P class=textxam12>"; echo "<b>".$contact_heading."</b>"; 
echo "</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$contact_post</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$name</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$contact_ngay</P></TD>	
<TD align=middle alignt=middle><P class=textxam12><a href=\"contact.php?dialoose=edit&id=$id\">Xem</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('contact.php?dialoose=delete&id=$id&file=$images&file2=$images_big')\">Xo&#225;</a></p</TD>
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
$q1 = "delete from qlns_contact where contact_id = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

redirect("contact.php?dialoose=select");

}
?>