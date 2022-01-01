<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}

if ($_SESSION["member_id"])
{
echo("");
}
else
{
	exit;
}
require_once("AdminNavigation.php");
$DIALOOSEWEB->admin->load_member();
require_once("../sources/function.php");

	//===================================================
	// SEND MAIL TO MEMBER
	//===================================================

	$submit = $_POST["submit"];
	if(isset($submit) && $submit == 'Send Mail') {

	$tieude = htmlspecialchars($_POST['tieude']);
	$noidung = htmlspecialchars($_POST['noidung']);
	$type = $_POST["type"];

	if ((!$type) || ($type==1)) {

		$data = @mysql_query("SELECT * FROM qlns_administrator");
		$content = "Xin ch&#224;o !\n";
		$content .= $noidung;
		while ($list = @mysql_fetch_array($data)) {
			$foot = "\n----------------------------------";
			send_email($webmaster,$list[email],$tieude,$content.$foot);
		}
	}



echo "
<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=admin.php?dialoose=bulkmail\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>&#272;&#227; g&#7917;i Email t&#7899;i $totalRows th&#224;nh vi&#234;n th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"admin.php?dialoose=bulkmail\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>";

exit;

}
	//===================================================
	// ADD MEMBER
	//===================================================
  	$submit = $_POST["submit"];

if(isset($submit) && $submit == 'Submit')
{
    $username = addslashes(htmlspecialchars($_POST["username"]));
	$realname = addslashes(htmlspecialchars($_POST["realname"]));
	$password = md5(md5($_POST["password"]));
	$email = addslashes(htmlspecialchars($_POST["email"]));
    $yahoo = addslashes($_POST["yahoo"]);
	$mobile = addslashes($_POST["mobile"]);
	$ngaydk=date("j-n-Y");
   
	$Message = ("&#272;&#226;y l&#224; S&#7893; ghi nh&#7899; c&#7911;a b&#7841;n. B&#7841;n c&#243; th&#7875; ghi m&#7885;i th&#7913; tu&#7923; th&#237;ch !");


	if ( $username AND $password )
	{
              $tentc=$_REQUEST['username']; 
              if($tentc){
               $sqlkt=@mysql_query("select * from qlns_administrator where ctn_username='$tentc'");
               $rowkt=@mysql_num_rows($sqlkt);
                  if($rowkt>=1){
                  echo "<script> alert(' Ten dang nhap nay da co trong co so du lieu') </script>"; 
                                  }
                        else {
     $q3 = "insert into qlns_administrator set
    ctn_username  = \"$username\", 
	ctn_password  = \"$password\", 
	ctn_name  = \"$realname\", 
	ctn_yahoo  = \"$yahoo\", 
	ctn_mobile  = \"$mobile\", 
	ctn_email  = \"$email\" 

	";
	$r3 = @mysql_query($q3) or die(@mysql_error());


echo "
<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=admin.php?dialoose=select\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>&#272;&#227; th&#234;m th&#224;nh vi&#234;n {$realname} th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"admin.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>";

	exit;
  }
}

	}
}


	//===================================================
	// Re UPDATE
	//===================================================
	$id = intval($_GET["id"]); 
    $email = addslashes($_POST["email"]);
	$realname = addslashes($_POST["realname"]);
	$mobile = addslashes($_POST["mobile"]);
	$yahoo = addslashes($_POST["yahoo"]);
	$phong= addslashes($_POST["phong"]);
  	$submit = $_POST["submit"];
 if(isset($submit) && $submit == 'Update')
  {

 	$q3 = "update qlns_administrator set
    ctn_name  = \"$realname\", 
	ctn_email  = \"$email\",
	ctn_mobile  ='$mobile', 
	ctn_yahoo  = '$yahoo'
	where ctn_id ='$id'
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
echo "


<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=admin.php?dialoose=select\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>&#272;&#227; c&#7853;p nh&#7853;t th&#244;ng tin th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"admin.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>";

	exit;
  }

##################################################################

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
	case "bulkmail":
			bulkmail();
	break;
	case "select":
			select();
	break;
}

	//===================================================
	// FUNCTION INDEX
	//===================================================

function index() {
	$today = time();

echo("

<TABLE height=100><TBODY><TR><TD></TD></TR></TBODY></TABLE>


<TABLE  style=\"BORDER-BOTTOM: #a6b0c9 1px solid; BORDER-LEFT: #a6b0c9 1px solid; BORDER-RIGHT: #a6b0c9 1px solid; BORDER-TOP: 
#a6b0c9 1px solid\" cellSpacing=0 cellPadding=1 align=\"center\" width=400 bgColor=#f5f5f5 border=0>
                          <TBODY>
 <tr bgcolor=\"#4B9BE0\"> 
<TD background=\"../images/headerbg.gif\"  colSpan=6>
<center><FONT color=#ffffff><B>Th&#234;m th&#224;nh vi&#234;n m&#7899;i</B></center></font></TD></TR>


<form action=\"admin.php?view=add_member\" method=\"post\" enctype=\"multipart/form-data\">
                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>H&#7885; v&#224; t&#234;n
                                </B></TD>
                                <TD colSpan=2>
                                <input type=\"text\" name=\"realname\" onkeyup=initTyper(this); size=\"25\">
                                </TD></TR>

<TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>T&#234;n &#273;&#259;ng nh&#7853;p
                                </B></TD>
                                <TD colSpan=2>
                                <input type=\"text\" name=\"username\" value=\"\" size=\"25\">
                                </TD></TR>

                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>M&#7853;t kh&#7849;u &#273;&#259;ng nh&#7853;p
                                </B></TD>
                                <TD colSpan=2>
                                <input type=\"password\" name=\"password\" value=\"\" size=\"25\">
                                </TD></TR>

                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>Email
                                </B></TD>
                                <TD colSpan=2>
                                <input type=\"text\" name=\"email\" value=\"\" size=\"25\">
                                </TD></TR>

                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>Nick Y!M
                                </B></TD>
                                <TD colSpan=2>
                                <input type=\"text\" name=\"yahoo\" value=\"\" size=\"25\">
                                </TD></TR>

                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>&#272;i&#7879;n tho&#7841;i
                                </B></TD>
                                <TD colSpan=2>
                                <input type=\"text\" name=\"mobile\" value=\"\" size=\"25\">
                                </TD></TR>
                                	
                                	<TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                </TD>
                                <TD colSpan=2>
				<input type=\"hidden\" name=\"addon\" value=\"{$today}\">
                                <input type=\"submit\" name=\"submit\" value=\"Submit\">
                                </TD></TR>

				</form>
				</TBODY></TABLE>

");
}

	//===================================================
	// FUNCTION edit
	//===================================================
function edit() {

$id = intval( $_GET["id"] );
$a = "select * from qlns_administrator where ctn_id=\"$id\"";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);
?>

<TABLE height=100><TBODY><TR><TD></TD></TR></TBODY></TABLE>


<TABLE  style="BORDER-BOTTOM: #a6b0c9 1px solid; BORDER-LEFT: #a6b0c9 1px solid; BORDER-RIGHT: #a6b0c9 1px solid; BORDER-TOP: #a6b0c9 1px solid" cellSpacing=0 cellPadding=1 align="center" width=350 bgColor=#f5f5f5 border=0>
                          <TBODY>
   
<tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif"  colSpan=6>
<center><FONT color=#ffffff><B>S&#7917;a th&#244;ng tin th&#224;nh vi&#234;n</B></center></font></TD></TR>

<form method="post" NAME="mainform" onsubmit="validate();" enctype="multipart/form-data">
                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>H&#7885; v&#224; t&#234;n
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" onkeyup=initTyper(this); name="realname" value="<? echo $c['ctn_name']; ?>" size="35">
                                </TD></TR>

                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>Email
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" name="email" value="<? echo $c['ctn_email']; ?>" size="35">
                                </TD></TR>



                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>Nick Y!M
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" name="yahoo" value="<? echo $c['ctn_yahoo']; ?>" size="35">
                                </TD></TR>


                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>&#272;i&#7879;n tho&#7841;i
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" name="mobile" value="<? echo $c['ctn_mobile']; ?>" size="35">
                                </TD></TR>

                               
                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                </TD>
                                <TD colSpan=2>
                                <input type="submit" name="submit" value="Update">
                                </TD></TR>

				</form>
				</TBODY></TABLE>



 



<?
 }
	//===================================================
	// FUNCTION select
	//===================================================

function select() {
?>
<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "admin.php?dialoose=delete&id=" + pid );
    	return false;
    }
    
    function baoloi_mem(theURL) {
       if (confirm('Ban co chac la muon xoa Thanh vien nay khong?')) {
          window.location.href=theURL;
       }
       else {
          alert ('Chua thuc hien mot tac vu nao!');
       } 
    }
    //-->
</script>
<TABLE bgcolor="#4B9BE0" cellSpacing=1 cellPadding=1 width="100%" border=0>
<TBODY>
  <tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif"  colSpan=8>
<center><FONT color=#ffffff><B>Danh s&#225;ch Ban &#273;i&#7873;u h&#224;nh website CTN Việt Nam</B></center></font></TD></TR>
 <tr ><td height=10></td></tr>
	<TR class=nenxanh5>
                                <TD class=textxanhbold2 width="12%">
                                <DIV align=left>&nbsp;Nick name</DIV></TD>
                                <TD class=textxanhbold2 width="7%">
                                <DIV align=left>&nbsp;Nh&#243;m</DIV></TD>
                                <TD class=textxanhbold2 width="15%">
                                <DIV align=left>&nbsp;H&#7885; v&#224; t&#234;n&nbsp;</DIV></TD>
                                <TD class=textxanhbold2 width="4%">
                                <DIV align=right>S&#7917;a&nbsp;&nbsp;</DIV></TD>
                                <TD class=textxanhbold2 width="2%">
                                <DIV align=right>Xo&#225;</DIV></TD>
				</TR>                               

<?
$results = @mysql_query("SELECT * FROM `qlns_administrator`") or die (mysql_error()); 
		while ($row = @mysql_fetch_array($results)) { 
			                    $member_groups=1;
                                $names =$row["ctn_username"]; 
                                $id =$row["ctn_id"]; 
                                $real_names =$row["ctn_name"]; 
                                $email =$row["ctn_email"]; 
                                $post =$row["post"]; 
                                $ctn_level=$row["ctn_level"];
if ($member_groups == "1"){$member_groups = "<font color='red'><B>AdminCTN</B>";}
if ($post == ""){$post = "Kh&#244;ng c&#243;";}
echo("
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=left>&nbsp;$names</TD>
<TD align=left>&nbsp;$member_groups</TD>
<TD align=left>&nbsp;$real_names</TD>
<TD align=right>&nbsp;&nbsp;<a href='admin.php?dialoose=edit&id=$id'>S&#7917;a</a></TD>");


if ( $ctn_level == 1 || $ctn_level == 2 || $ctn_level == 3 || $ctn_level == 4 || $ctn_level == 5 || $ctn_level == 6 || $ctn_level == 7 || $ctn_level == 8|| $ctn_level == 9|| $ctn_level == 10|| $ctn_level == 11)
{
echo("<TD align=right>&nbsp;<IMG SRC='images/not_remove.gif' alt='Th&#224;nh vi&#234;n cao c&#7845;p'>&nbsp;</TD>");
}
else
{
echo("<TD align=right>&nbsp;<a href=\"javascript:baoloi_mem('admin.php?dialoose=delete&id=$id')\"><IMG border=0 SRC='images/remove.gif'></a>&nbsp;</TD>");
}

echo("</TR>");
}
?>
</TBODY></TABLE>

<?
 }
	//===================================================
	// FUNCTION REMOVE
	//===================================================

function delete() {
$id = intval( $_GET["id"] );
//delete the database record
$q1 = "delete from qlns_administrator where ctn_id = '$id'";
@mysql_query($q1) or die(mysql_error());
echo "<script> alert ('Xóa thành viên thành công ! ') </script>";
echo "<div align='center'> <font color=blue size=3><img src='images/undo.gif' border='0'><a href='admin.php?dialoose=select'> Trở về </a>";
}
	//===================================================
	// FUNCTION BULK MAIL
	//===================================================

function bulkmail() {

print <<<EOF
<form method="post" NAME="mainform" enctype="multipart/form-data">
<center>
<TABLE height=100><TBODY><TR><TD></TD></TR></TBODY></TABLE>
<TABLE bgcolor="#4B9BE0" cellSpacing=1 cellPadding=1 width="70%" border=0>
<TBODY>
  <tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif"  colSpan=2>
<center><FONT color=#ffffff><B>G&#7917;i Mail cho th&#224;nh vi&#234;n</B></center></font></TD></TR>
</TBODY></TABLE>

<TABLE bgcolor="#6bAAef" cellSpacing=1 cellPadding=2 width="70%" border=0>
<TBODY>

<tr bgcolor=#F5F5F5>
      <td width="80" ><font size="2"><b>&nbsp;&nbsp;Ti&#234;u &#273;&#7873;:</b></font></td>
      <td> 
      <input onkeyup=initTyper(this); name="tieude" type="text" id="news_tieude" size="75" ></td>
</tr>


<tr bgcolor=#F5F5F5>
      <td><font size="2"><b>&nbsp;&nbsp;N&#7897;i dung:</b></font></td>
	<td>  
<textarea onkeyup=initTyper(this); name="noidung" rows="17" class="adminTextbox" cols="75"></textarea>                        
	</td>
</tr>

</TBODY></TABLE>
<TABLE><TBODY><TR><TD></TD></TR></TBODY></TABLE>
<TABLE  align="center" bgcolor="#4B9BE0" cellSpacing=1 cellPadding=2 width="70%" border=0>
<TBODY>
<tr bgcolor=#F5F5F5>
      <td><font size="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></td><TD>
<input class=butstyle style="FONT-WEIGHT: bold; CURSOR: hand; COLOR: #ffffff; BACKGROUND-COLOR: #4B9BE0" name="submit" type="submit" id="submit" value="Send Mail"><br></td>
    </tr>

</form>
</TBODY></TABLE>
EOF;

}

?>
