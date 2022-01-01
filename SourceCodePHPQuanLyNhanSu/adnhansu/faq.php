<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");

	//===================================================
	// CAP NHAT MOI
	//===================================================
  	$submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Submit')
  {
	$title = replace($_POST["title"]);
	$content_a = replace($_POST["content_a"]);
	$content_q = replace($_POST["content_q"]);
	$sender_name = replace($_POST["sender_name"]);
	$sender_info = replace($_POST["sender_info"]);
	$date = time();

 	$q3 = "insert into dialoose_faq set
	title = \"$title\",
	content_q = \"$content_q\", 
	content_a = \"$content_a\", 
	sender_name = \"$sender_name\",
	sender_info = \"$sender_info\" ,
	addon = \"$date\",
	status = \"1\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=faq.php\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#7843; th&#234;m c&#226;u h&#7887;i th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"../images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"faq.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>";
	exit;
}

	//===================================================
	// CAP NHAT MOI
	//===================================================
  	$submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Update')
  {
	$title = replace($_POST["title"]);
	$content_a = replace($_POST["content_a"]);
	$content_q = replace($_POST["content_q"]);
	$sender_name = replace($_POST["sender_name"]);
	$sender_info = replace($_POST["sender_info"]);
	$date = time();

 	$q3 = "update dialoose_faq set
	title = \"$title\",
	content_q = \"$content_q\", 
	content_a = \"$content_a\", 
	sender_name = \"$sender_name\",
	sender_info = \"$sender_info\" ,
	addon = \"$date\",
	status = \"1\" where id = \"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=faq.php?dialoose=select\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#7843; s&#7917;a c&#226;u h&#7887;i th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"../images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"faq.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>";
	exit;
}
$dialoose = $_GET['dialoose'];
switch($dialoose) {
	default:
		index();
	break;
	case "select":
		select();
	break;
	case "edit":
		edit();
	break;
	case "delete":
		delete();
	break;
}

	//===================================================
	// INDEX 
	//===================================================

function index() {

?>
<center>
<form method="post" NAME="mainform">
<center>
<table width="550" border="0" cellpadding="0" cellspacing="0">
        <tr>
    <td height="19" valign="middle" background="img/topbarfolder.gif"> <center>
        <strong><font color="red">C&#7853;p nh&#7853;t C&#226;u h&#7887;i m&#7899;i</font><br>
      </center></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class=dott2><table width="550" border="0" cellspacing="1" cellpadding="1">
 
    <tr> 
            <td valign="top"><B>Ti&#234;u &#273;&#7873; h&#7887;i :</b></td>
      <td><input onkeyup=initTyper(this); size=55 name="title" type="text">
            </td>
    </tr>

    <tr> 
            <td valign="top"><B>G&#7917;i b&#7903;i :</b></td>
      <td><input onkeyup=initTyper(this); size=55 name="sender_name" type="text">
            </td>
    </tr>


    <tr> 
            <td valign="top"><B>Email :</b></td>
      <td><input size=55 name="sender_info" type="text">
            </td>
    </tr>


<tr><td><font size="2"><b>N&#7897;i dung h&#7887;i:</b></font></td>
<td colspan="2">  
<textarea onkeyup=initTyper(this); name="content_q" cols="55" rows="7" id="content_q">
</textarea></td></tr>

<tr> 
<td ><font size="2"><b>Tr&#7843; l&#7901;i:</b></font></td>

<td colspan="2">  
<textarea onkeyup=initTyper(this); name="content_a" cols="55" rows="12" id="content_a"></textarea></td>
</tr>

<TR><td></td>
      <td><input class=butstyle name="submit" type="submit" id="submit" value="Submit"><br><br></td>
    </tr>

  </form>
                </table>
            
          </td>
        </tr>

      </table><br>

<?
}
	//===================================================
	// SELECT
	//===================================================

function select() {
?>
<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "'sms_love.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Ban co chac la muon xoa khong vay?')) {
          window.location.href=theURL;
       }
       else {
          alert ('Ok. Chua thuc hien tac vu nao.');
       } 
    }
    //-->
</script>
                         
                                <TABLE class=nenxanh1 cellSpacing=1 
                                cellPadding=1 width="100%" border=0>
                                <TBODY>
                                <TR>
                                <TD class=nenxanh3 colSpan=6>
                                <TABLE cellSpacing=2 cellPadding=2 width="100%" 
                                border=0>
                                <TBODY>
                                <TR>                             
                                <TD background="../images/headerbg.gif" class=textxanhbold 
                                width="100%">&nbsp;<font color=#ffffff><B><B>Danh s&#225;ch &#273;ang ch&#7901; tr&#7843; l&#7901;i</B></B></font></TD></TR></TBODY></TABLE></TD></TR>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold2 width="60%">
                                <DIV align=left>&nbsp;Ti&#234;u &#273;&#7873;</DIV></TD>
                                <TD class=textxanhbold2 width="20%">
                                <DIV align=center>G&#7917;i b&#7903;i</DIV></TD> 
                                <TD class=textxanhbold2 width="10%">
                                <DIV align=center>C&#7853;p nh&#7853;t</DIV></TD>                           
                                <TD class=textxanhbold2 width="5%">
                                <DIV align=center>S&#7917;a</DIV></TD>
                                <TD class=textxanhbold2 width="5%">
                                <DIV align=center>Xo&#225;</DIV></TD>
</TR>
<?
$result2 = @mysql_query("SELECT * FROM `dialoose_faq` where status='0' ORDER BY id DESC LIMIT 10") 
				or die (mysql_error()); 
				while ($row = @mysql_fetch_array($result2)) { 
                                $id =$row["id"]; 
                                $title = $row["title"]; 
                                $sender_name = $row["sender_name"];
                                $sender_info = $row["sender_info"];
                                $addon  = $row["addon"]; 


$bgcolor = ($bgcolor=="#FFFFFF") ? "#e4e4e4" : "#FFFFFF"; 


                          echo("<TR bgColor=#ffffff>


<TD bgcolor=$bgcolor alignt=middle>
&nbsp; <A class=textxam12 href=\"faq.php?dialoose=edit&id=$id\">$title</A></TD>
<TD bgcolor=$bgcolor align=middle><P class=textdo12><a href='#' title='$sender_info'>$sender_name</a></p></TD>
<TD bgcolor=$bgcolor align=middle><P class=textdo12><font color=red>".transform_date($addon)."</font></p></TD>
<TD bgcolor=$bgcolor align=middle>
<P class=textdo12><a href=\"faq.php?dialoose=edit&id=$id\">S&#7917;a</a></p></TD>

<TD bgcolor=$bgcolor align=middle>
<P class=textdo12><a href=\"javascript:baoloi('faq.php?dialoose=delete&id=$id')\">Xo&#225;</a></p></TD>
</TR>");
}
echo("</TBODY></TABLE>


<TABLE height=1><TBODY><TR><TD></TD></TR></TBODY></TABLE>");
?>




                                <TABLE class=nenxanh1 cellSpacing=1 
                                cellPadding=1 width="100%" border=0>
                                <TBODY>
                                <TR>
                                <TD class=nenxanh3 colSpan=6>
                                <TABLE cellSpacing=2 cellPadding=2 width="100%" 
                                border=0>
                                <TBODY>
                                <TR>                             
                                <TD background="../images/headerbg.gif" class=textxanhbold 
                                width="100%">&nbsp;<font color=#ffffff><B><B>Danh s&#225;ch &#273;&#227; tr&#7843; l&#7901;i</B></B></font></TD></TR></TBODY></TABLE></TD></TR>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold2 width="60%">
                                <DIV align=left>&nbsp;Ti&#234;u &#273;&#7873;</DIV></TD>
                                <TD class=textxanhbold2 width="20%">
                                <DIV align=center>G&#7917;i b&#7903;i</DIV></TD> 
                                <TD class=textxanhbold2 width="10%">
                                <DIV align=center>C&#7853;p nh&#7853;t</DIV></TD>                           
                                <TD class=textxanhbold2 width="5%">
                                <DIV align=center>S&#7917;a</DIV></TD>
                                <TD class=textxanhbold2 width="5%">
                                <DIV align=center>Xo&#225;</DIV></TD>
</TR>
<?
$cat = intval($_GET[cat]);
$page = intval($_GET[page]);
if($page=="") 
{ $page="1"; } else { $page = intval($_GET[page]); } 

$sql=@mysql_query("SELECT * FROM `dialoose_faq` where status='1'  ORDER BY id DESC")or die(mysql_error());
				$total_song=@mysql_num_rows($sql); 
				$limit=10;
				$max_page=ceil($total_song/$limit);
				$start=($page-1)*$limit;
$result = @mysql_query("SELECT * FROM `dialoose_faq` where status='1' ORDER BY id DESC LIMIT $start,$limit") 
				or die (mysql_error()); 
				while ($row = @mysql_fetch_array($result)) { 
                                $id =$row["id"]; 
                                $title = $row["title"]; 
                                $sender_name = $row["sender_name"];
                                $sender_info = $row["sender_info"];
                                $addon  = $row["addon"]; 


$bgcolor = ($bgcolor=="#FFFFFF") ? "#e4e4e4" : "#FFFFFF"; 


                          echo("<TR bgColor=#ffffff>


<TD bgcolor=$bgcolor alignt=middle>
&nbsp; <A class=textxam12 href=\"faq.php?dialoose=edit&id=$id\">$title</A></TD>
<TD bgcolor=$bgcolor align=middle><P class=textdo12><a href='#' title='$sender_info'>$sender_name</a></p></TD>
<TD bgcolor=$bgcolor align=middle><P class=textdo12><font color=red>".transform_date($addon)."</font></p></TD>
<TD bgcolor=$bgcolor align=middle>
<P class=textdo12><a href=\"faq.php?dialoose=edit&id=$id\">S&#7917;a</a></p></TD>

<TD bgcolor=$bgcolor align=middle>
<P class=textdo12><a href=\"javascript:baoloi('faq.php?dialoose=delete&id=$id')\">Xo&#225;</a></p></TD>
</TR>");
}
echo("</TBODY></TABLE>


<TABLE height=1><TBODY><TR><TD></TD></TR></TBODY></TABLE>

<DIV style=\"MARGIN-BOTTOM: 1px; MARGIN-LEFT: 3px\">
                  <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" 
                  border=0>
                    <TBODY>
                    <TR>
                      <TD width=\"100%\">
                        <TABLE  align=center cellSpacing=2 cellPadding=0 
                          border=0><TBODY>
                          <TR>
                            <TD>
                              <TABLE width=\"100%\" cellSpacing=2 cellPadding=0 border=0>
                                <TBODY>
                                <TR align=middle>
                                <TD bgColor=#efefef>");
if($page>3){
if($page+3>$max_page){
$max=$max_page; $i=$max_page-3;
} else {
$max=$page+3;$i=$page-3;
} 
} else {
if($max_page<3){
$i=1;$max=$max_page;
} else {
$i=1;
if($page+3>$max_page){$max=$max_page;}else{
$max=$page+3;}}
}

if($page>1){
 echo "<TD class=NSDivCenter><A HREF=\"faq.php?dialoose=select&page=1\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"../../images/pic_dautien.gif\" width=15 border=0></A></TD>";
 $page=$page-1;
  echo "<TD class=NSDivCenter><b><A HREF=\"faq.php?dialoose=select&page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"../../images/pic_truoc.gif\" width=15 border=0></A></b></TD>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=NSDivCenter1>&nbsp;<font color=#FFFFFF><b>".$i."</b></font>&nbsp;</TD>";
    } else {
        echo "<TD class=NSDivCenter>&nbsp;<A HREF=\"faq.php?dialoose=select&page=$i\" class=song><font size=2><b>$i</b></font></A>&nbsp;</TD>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=NSDivCenter><b><A HREF=\"faq.php?dialoose=select&page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"../../images/pic_tieptheo.gif\" width=15 border=0></A></b></TD>"; 
	 echo "<TD class=NSDivCenter><A HREF=\"faq.php?dialoose=select&page=$max_page\" title=\"Trang cu&#7889;i\" class=song><img height=15 src=\"../../images/pic_cuoicung.gif\" width=15 border=0></A></TD>";
	 }
echo("</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV>");

}
	//===================================================
	// EDIT
	//===================================================

function edit() {
	$id = intval($_GET[id]);
$a = "select * from dialoose_faq where id = \"$id\"";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);
?>
<center>
<form method="post" NAME="mainform">
<center>
<table width="550" border="0" cellpadding="0" cellspacing="0">
        <tr>
    <td height="19" valign="middle" background="img/topbarfolder.gif"> <center>
        <strong><font color="red">S&#7917;a c&#226;u h&#7887;i</font><br>
      </center></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class=dott2><table width="550" border="0" cellspacing="1" cellpadding="1">
 
    <tr> 
            <td valign="top"><B>Ti&#234;u &#273;&#7873; h&#7887;i :</b></td>
      <td><input onkeyup=initTyper(this); size=55 name="title" value="<? echo $c['title']; ?>" type="text">
            </td>
    </tr>

    <tr> 
            <td valign="top"><B>G&#7917;i b&#7903;i :</b></td>
      <td><input onkeyup=initTyper(this); size=55 name="sender_name" value="<? echo $c['sender_name']; ?>" type="text">
            </td>
    </tr>


    <tr> 
            <td valign="top"><B>Email :</b></td>
      <td><input size=55 name="sender_info" value="<? echo $c['sender_info']; ?>" type="text">
            </td>
    </tr>


<tr><td><font size="2"><b>N&#7897;i dung h&#7887;i:</b></font></td>
<td colspan="2">  
<textarea onkeyup=initTyper(this); name="content_q" cols="55" rows="7" id="content_q">
<? echo $c['content_q']; ?></textarea></td></tr>

<tr> 
<td ><font size="2"><b>Tr&#7843; l&#7901;i:</b></font></td>

<td colspan="2">  
<textarea onkeyup=initTyper(this); name="content_a" cols="55" rows="12" id="content_a"><? echo $c['content_a']; ?></textarea></td>
</tr>

<TR><td></td>
      <td><input class=butstyle style="FONT-WEIGHT: bold; CURSOR: hand; COLOR: #000000; BACKGROUND-COLOR: #2196ce" name="submit" type="submit" id="submit" value="Update"><br><br></td>
    </tr>

  </form>
                </table>
            
          </td>
        </tr>

      </table><br>

<?
}
	//===================================================
	// DELETE
	//===================================================

function delete() {
	$id = intval($_GET[id]);

		//delete the database record
		$q1 = "delete from dialoose_faq where id = '$_GET[id]' ";
		@mysql_query($q1) or die(mysql_error());

echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=faq.php?dialoose=select\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; xo&#225; th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"../images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"faq.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";
}
?>





