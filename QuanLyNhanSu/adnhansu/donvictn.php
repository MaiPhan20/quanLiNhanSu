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

if ( $_GET["act"] == "do" ) { 
    $madonvi = intval($_POST["title"]); 
	$tencongty=$_POST["gioithieu"];
	$vinh=$_REQUEST['title'];
	$sqlss=@mysql_query("select * from qlns_congty where qlns_mact='$vinh'");
    $tong=@mysql_num_rows($sqlss);
    if($tong){
        echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=donvictn.php">
<table width="40%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><fieldset style="padding: 2; width:312px; height:59px">
	<legend>Please stand by ...
	  </legend>
	  <p align="center">
		<b><font color=red>Báo Lỗi ! Mã Đơn vị này đã có trong cơ sở dữ liệu. Bạn chọn mã đơn vị khác</font></b><br>
		<br>
      <img src="images/loading1.gif" width="150" height="13" border="0"> 
      <br>
      <br>(<a href="donvictn.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';
			exit;
     }
  
    else  {
       echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=donvictn.php">
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
      <br>(<a href="donvictn.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';	
    $q3 = "Insert into qlns_congty set
	qlns_mact  = \"$madonvi\",
    qlns_tencongty = \"$tencongty\",
    ctn_id = \"{$member_id}\"
    ";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;

	}
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

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('gioithieu'); 
			</script>

<center>
<form action="donvictn.php?act=do"  method="post" NAME="mainform" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Thêm Đơn vị công ty cổ phần đầu tư CTN Việt Nam</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Mã Đơn vị:</b></font><br>
        <input name="title" type="text" id="title" size="105" ></td>
    	</tr>
       <tr> 
      	<td ><font size="2"><b>Tên đơn vị:</b></font><br>
	<textarea  name="gioithieu" cols="136" rows="10" id="gioithieu"></textarea><br>
	</td>
	</tr>
<td valign="top">&nbsp;<div align=center><input class=butstyle  name="submit" type="submit" id="submit" value="Add "><br><br></td>
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
    $a = "select * from qlns_congty where qlns_idct= \"$id\"";
    $b = @mysql_query($a) or die(mysql_error());
    $c = @mysql_fetch_array($b);
    //===================================================
	// UPDATE PRODUCT
	//===================================================
  	$Submit = $_POST["Submit"];
	$id = intval( $_GET["id"] );
  if(isset($Submit) && $Submit == 'Edit & Update')
  {

echo("<br><br><br><br><br><br><div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"2; url=donvictn.php?dialoose=select\">
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
      <br>(<a href=\"donvictn.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");


 
	$title = intval($_POST["title"]);
    $company_url = $_POST["content"];
    $q3 = "update qlns_congty set
	qlns_mact  = \"$title\", 
	qlns_tencongty = \"$company_url\"
	where qlns_idct = \"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;
  }



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
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>S&#7917;a th&#244;ng tin đối tác</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>T&#234;n Kh&#225;ch h&#224;ng/C&#244;ng ty:</b></font><br>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $c['qlns_mact']; ?>" size="136" ></td>
    	</tr>

    
      	<tr><td ><font size="2"><b>Gi&#7899;i thi&#7879;u chi ti&#7871;t:</b></font><br>
	<textarea  name="content" cols="136" rows="10" id="content"><? echo $c['qlns_tencongty']; ?></textarea><br>
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
                                <TD class=textxanhbold12 width="7%">&nbsp;<B>Mã đơn vị</B></TD>
                                <TD class=textxanhbold12 width="35%">
                                <DIV align=center><B>Tên Đơn vị</B></DIV></TD>
                                <TD class=textxanhbold12 width="13%">
                                <DIV align=center><B>Người gởi</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?
$sql=@mysql_query("SELECT * FROM `qlns_congty` ORDER BY qlns_idct DESC") 
                   or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
				$id=$row['qlns_idct'];
				$title=$row['qlns_mact'];
			    $company_url=$row['qlns_tencongty'];
			
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>"; echo "<b>".$title."</b>"; 
echo "</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$company_url</P></TD>
<TD align=middle alignt=middle><P class=textxam12>CTN Việt Nam</P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"donvictn.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('donvictn.php?dialoose=delete&id=$id&file=$images&file2=$images_big')\">Xo&#225;</a></p</TD>
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
$q1 = "delete from qlns_congty where qlns_idct = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

redirect("donvictn.php?dialoose=select");

}
?>