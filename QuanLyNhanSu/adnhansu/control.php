<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");
//===================================================
// Begin change your profile
//===================================================

		$member_id = addslashes($_SESSION['member_id']);


if ( $_GET["view"] == "do" )
{
	$message = replace($_POST["message"]);
	@mysql_query("UPDATE qlns_administrator SET ctn_content='{$message}' WHERE ctn_id='{$member_id}'");	
}

$sql = @mysql_query("SELECT * FROM qlns_administrator WHERE ctn_id='{$member_id}'");
$result = @mysql_fetch_array( $sql );

//===================================================
// End change your profile
//===================================================
?>

<script type='text/javascript' src='../images/menuright.js'></script>
<TABLE cellSpacing=0 cellPadding=0 width="800" align=center border=0>
  <TBODY>
  <TR>
    <TD height=30>

<TABLE cellSpacing=2 cellPadding=2 width="100%" align=center border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width=500>

<?

	//===================================================
	// BEGIN YOUR INFO
	//===================================================
print <<<EOF
<script src='him.js' ></script>
<TABLE class="Menubar" bgcolor="#4B9BE0" cellSpacing=0 cellPadding=1 width="100%" border=0>
<TBODY>
  <tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif"  colSpan=6>
<center><FONT color=#ffffff><B>Th&#244;ng tin t&#224;i kho&#7843;n c&#7911;a b&#7841;n</B></center></font></TD></TR>

				<TR>
				<TD width="130">
				<img src="images/depngay12.png" border='0' width='128' height='128'>
				</TD>


                                <TD vAlign=top  width="90%">
<TABLE cellSpacing=0 cellPadding=2 width="100%" border=0>
<TBODY>

				<TR>
				<TD align=middle>&nbsp;<B>H&#7885; v&#224; t&#234;n:</B> {$result['ctn_name']}</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>Ng&#224;y tham gia:</B> 
				
EOF;
echo(" 07/03/2009 </TD></TR>");
print <<<EOF

				<TR>
				<TD align=middle>&nbsp;<B>Email:</B> {$result['ctn_email']}</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>Thu&#7897;c nh&#243;m:</B>
EOF;

 echo " AdminCTN";





				
print <<<EOF

				</TD>
				</TR>


				<TR>
				<TD align=middle>&nbsp;<B>T&#7893;ng s&#7889; b&#224;i &#273;&#227; &#273;&#259;ng:</B>
EOF;

if($result['ctn_counterdb'] >= 1)
{
echo(" {$result['ctn_counterdb']}");
} else {
echo(" Ch&#432;a &#273;&#259;ng b&#224;i n&#224;o");
}				
print <<<EOF
				</TD>
				</TR>			
EOF;



// Neu la Admin ROOT thi hien thi Tin nhan

if($result['member_group'] == " Root")
{




}
else 
{
echo("");
}	
// Ket thuc 


echo(" 				</TBODY></TABLE>
				</TD>
				</TR>   



</TBODY></TABLE>");

	//===================================================
	// END YOUR INFO
	//===================================================
?>


<TABLE height=1><TBODY><TR><TD></TD></TR></TBODY></TABLE>


<?
	//===================================================
	// BEGIN YOUR MESSAGE
	//===================================================

print <<<EOF
<form action="control.php?view=do" method="post" enctype="multipart/form-data">

<TABLE bgcolor="#4B9BE0" cellSpacing=1 align="center" cellPadding=1 width="100%" border=0>
<TBODY>
  <tr bgcolor="#4B9BE0"> 

<td background="../images/headerbg.gif" colspan="2" width="100%"><b><font face="Verdana, Arial, Helvetica, sans-serif"  color="#ffffff">&nbsp;&nbsp;Ghi nh&#7899; C&#225; nh&#226;n c&#7911;a {$result['ctn_name']}</font></b></td>
</tr>
				<tr bgcolor="#FFFFFF" valign="middle"> 
				<TD><div align="center">
<textarea onkeyup=initTyper(this); cols="94%" rows=15 name=message>{$result['ctn_content']}</textarea>
				</div>
				<div align="center">
                                <input type="submit" name="submit" value="Ghi nh&#7899;"></div></TD></TR>                       
				</form>
</TD></TR></TBODY></TABLE>
EOF;
	//===================================================
	// END YOUR MESSAGE
	//===================================================
?>

</TD>

<!----------PRODUCT---->

    <TD vAlign=top width=300>

<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>


<TABLE bgcolor="#4B9BE0" cellSpacing=1 cellPadding=0 width="100%" border=0>
<TBODY>
  <tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif" class=nenxanh3 colSpan=0>
<center><FONT color=#ffffff><B>S&#7921; ki&#7879;n trong th&#225;ng</B></center></font></TD></TR>

				<TR class=nenxanh5>
                                <TD background='images/thongbao.gif' class=textxanhbold2 height="113">
<DIV style="MARGIN-HEADER: 1px; MARGIN-LEFT: 50px">
<img src="images/sm_cool.gif"><b>Ch&#250;c m&#7915;ng sinh nh&#7853;t</b>


</DIV>
				</TD>
				</TR>
                                </TBODY></TABLE>
<TABLE height=2><TBODY><TR><TD></TD></TR></TBODY></TABLE>











<TABLE bgcolor="#4B9BE0" cellSpacing=1 cellPadding=3 width="100%" border=0>
<TBODY>
  <tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif" class=nenxanh3 colSpan=6>
<center><FONT color=#ffffff><B>Th&#7889;ng k&#234; th&#224;nh vi&#234;n</B></center></font></TD></TR>

				<TR class=nenxanh5>
                                <TD class=textxanhbold2 width="65%">
                                <DIV align=left>&nbsp;H&#7885; v&#224; t&#234;n</DIV></TD>
                                <TD class=textxanhbold2 width="25%">
                                <DIV align=right>&nbsp;S&#7889; b&#224;i &#273;&#259;ng&nbsp;</DIV></TD>
				</TR>
<?
$results = @mysql_query("SELECT * FROM `qlns_administrator` order by ctn_name ASC") or die (mysql_error()); 
		while ($row = @mysql_fetch_array($results)) { 
                                $names =$row["ctn_username"]; 
                                $id =$row["ctn_id"]; 
                                $ma_nhom=0;
                                $real_names =$row["ctn_name"]; 
                                $email =$row["ctn_email"]; 
                                $post =$row["ctn_counterdb"]; 
                                $yahoo =$row["ctn_yahoo"];
                                $mobile =$row["ctn_mobile"];
                if ($ma_nhom==0) { $ma_nhom="AdminCTN"; }
				if ($yahoo == ""){$yahoo = "Ch&#432;a c&#7853;p nh&#7853;t";}
				if ($mobile == ""){$mobile = "Ch&#432;a c&#7853;p nh&#7853;t";}
				if ($email == ""){$email = "Ch&#432;a c&#7853;p nh&#7853;t";}
				if ($post == ""){$post = "Ch&#432;a c&#243;";}

echo("<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
				<TD align=middle>&nbsp;
				<a href=\"#\" 
onmouseover=\"showtip('H&#7885; v&#224; t&#234;n: <B>$real_names</B><br>Thu&#7897;c nh&#243;m: <font color=red> <b>$ma_nhom</b></font><br> Tham gia t&#7915;: 07/03/2009<br>Email: $email<br>Nick Y!M: $yahoo<br>Mobile: $mobile<br>B&#224;i &#273;&#227; &#273;&#259;ng: $post<br>')\" 
onmouseout=\"hidetip()\"><B><font face=Tahoma size=2>$real_names</a></B></a>
				</TD>
				<TD  width=\"20%\"><DIV align=right><font color=red><B>$post</B></font></DIV></TD>
				</TR>");
}
?>
                                </TBODY></TABLE>




<TABLE height=2><TBODY><TR><TD></TD></TR></TBODY></TABLE>
<TABLE class="Menubar" cellSpacing=0 cellPadding=3 width="100%" border=0>
<TBODY>
<TR><TD background="../images/headerbg.gif" class=nenxanh3 colSpan=6>
<center><FONT color=#ffffff><B>Th&#244;ng tin h&#7879; th&#7889;ng</B></center></font></TD></TR>
				<TR>
				<TD align=middle>&nbsp;<B>Date:</B> <?php echo date("m/d/Y H:i:s a") ?>&nbsp;</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>OS:</B> <?php echo PHP_OS ?>&nbsp;</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>Server:</B> <?php echo getenv("SERVER_SOFTWARE") ?>&nbsp;</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>Server Name:</B> <?php echo getenv("SERVER_NAME") ?>&nbsp;</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>Free Disk Space (Mb):</B> <?php echo getenv("$disco_free");?>&nbsp;</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>Admin Address:</B> <?php echo getenv("SERVER_ADMIN") ?>&nbsp;</TD>
				</TR>

				<TR>
				<TD align=middle>&nbsp;<B>IP Address:</B> <?php $v=ip(); echo $v;?>&nbsp;</TD>
				</TR>
                                </TBODY></TABLE>

<TABLE height=2><TBODY><TR><TD></TD></TR></TBODY></TABLE>


<TABLE class="Menubar" cellSpacing=0 cellPadding=3 width="100%" border=0>
<TBODY>
<TR><TD background="../images/headerbg.gif" class=nenxanh3 colSpan=6>
<center><FONT color=#ffffff><B>H&#7895; tr&#7907; t&#236;m ki&#7871;m</B></center></font></TD></TR>

				<TR>
				<TD align=middle>


<FORM name=_3_fm onsubmit="window.open(document._3_fm._3_engine[document._3_fm._3_engine.selectedIndex].value + escape(document._3_fm._3_query.value)); return false;" style="margin:0">
<INPUT class=form-text size=55 name=_3_query> </TD></TR>

                                <TR>
                                <TD align=middle><SELECT name=_3_engine> <OPTION 
                                value=http://search.yahoo.com/search?p= 
                                selected>Yahoo!</OPTION> <OPTION 
                                value=http://vivisimo.com/search?query=>Vivisimo</OPTION> 
                                <OPTION 
                                value=http://www.google.com/search?q=>Google</OPTION> 
                                <OPTION 
                                value=http://www.askjeeves.com/main/askjeeves.asp?ask=>AskJeeves</OPTION></SELECT> 
<INPUT type=submit value="Th&#7921;c hi&#7879;n"> 
				</TD>
				</TR>
                                </TBODY></TABLE>


</TD></TR>


</TBODY></TABLE>





