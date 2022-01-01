<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");
	
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

if ( $_GET["act"] == "do" ) 
{ 
$member_id = addslashes($_SESSION['member_id']);
$file_max_size = 5000000; // Tinh theo KB 
$folder_upload_in = "../images/kenhps/"; // Thu muc Upload 
$file_tmp = isset($_FILES['file_upload2']['tmp_name']) ? $_FILES['file_upload2']['tmp_name'] : ""; 
$file_name2 = isset($_FILES['file_upload2']['name']) ? $_FILES['file_upload2']['name'] : ""; 
$file_type = isset($_FILES['file_upload2']['type']) ? $_FILES['file_upload2']['type'] : ""; 
$file_size = isset($_FILES['file_upload2']['size']) ? $_FILES['file_upload2']['size'] : ""; 
$file_error = isset($_FILES['file_upload2']['error']) ? $_FILES['file_upload2']['error'] : ""; 

if ( $file_size > ($file_max_size) ) 
{ 
print "B&#7841;n ch&#7881; c&#243; th&#7875; upload file c&#243; dung l&#432;&#7907;ng d&#432;&#7899;i <b>{$file_max_size} KB</b>."; 
return false; 
} 

$formats = array('exe','php','html','htm','txt','wma',); 
             
if(in_array(strtolower(substr($file_name2,-3)),$formats)) { 
                 
echo "<br><br><br><br><br><br><center><font color=red><b>Kh&#244;ng th&#7875; Upload c&#225;c file c&#243; &#273;&#7883;nh d&#7841;ng m&#7903; r&#7897;ng l&#224;: .exe.mp3.php.asp.html.htm,txt</b></font></center>"; 
return false; 
} 
$rand_numb = time();
$file_rename = "tqv_$rand_numb"."_$file_name2";
copy ( $file_tmp, "./" . $folder_upload_in . $file_rename); 


       echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=lichphatsong.php">
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
      <br>(<a href="lichphatsong.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';
    $member_id = addslashes($_SESSION['member_id']);
    $noidung = addslashes($_POST["cnoidung"]);
	$tieude = $_POST["tieude"];
     $q3 = "insert into ctn_chanelctv set
	cha_heading = \"{$tieude}\",  
	cha_images = \"$file_rename\",
	cha_des = \"$noidung\",adm_id='$member_id'
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
	{ var the_news_tieude    = the_form.tieude.value;
      if ((the_news_tieude==''))
		{
			alert("Ban nhap thong tin lich phat song!");
			the_form.tieude.focus();
			return false;
		}
}
</script>
<script src="images/date-picker.js"></script>
<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<script type="text/javascript">
		    WYSIWYG.attach('cnoidung'); 
			</script>

<form action="lichphatsong.php?act=do" enctype="multipart/form-data" method="post" NAME="mainform" onsubmit="return check_form(this)">
<div align='center'><TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0><tr> 
    <td colspan="1"> 
    <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Th&#234;m kênh phát sóng  m&#7899;i</b></font></div></td>
    </tr>
	</TBODY></TABLE>
<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>

 <tr> 
      <td><font size="2"><b>Ti&#234;u &#273;&#7873;:</b></font>
     <input  name="tieude" type="text" id="tieude" size="70" ></td>
    </tr>

<tr> 
	<td valign="top"><B>Logo Kênh:</B>
	<input size=70 name="file_upload2" type="file">
	<br><br></td>
	</tr>

 	<tr> 
      	<td ><font size="2"><b>N&#7897;i dung:</b></font><br>
	<textarea  name="cnoidung" style="width:70%;height:250px;"  id="cnoidung"></textarea></td>
</tr>

	
	<tr> 
	<td valign="top"><div align='center'><input class=butstyle name="submit" type="submit" id="submit" value="Submit"><br><br></td>
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
$a = "select * from ctn_chanelctv where cha_id = \"$id\"";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);



	//===================================================
	// UPDATE PRODUCT
	//===================================================
  	$Submit = $_POST["Submit"];
	$id = intval( $_GET["id"] );
  if(isset($Submit) && $Submit == 'Edit & Update')
  {
$userfile =  $_POST["file_upload2"];
$file_max_size = 5000000; // Tinh theo KB 
$folder_upload_in = "../images/kenhps/"; // Thu muc Upload 
$file_tmp = isset($_FILES['file_upload2']['tmp_name']) ? $_FILES['file_upload2']['tmp_name'] : ""; 
$file_name2 = isset($_FILES['file_upload2']['name']) ? $_FILES['file_upload2']['name'] : ""; 
$file_type = isset($_FILES['file_upload2']['type']) ? $_FILES['file_upload2']['type'] : ""; 
$file_size = isset($_FILES['file_upload2']['size']) ? $_FILES['file_upload2']['size'] : ""; 
$file_error = isset($_FILES['file_upload2']['error']) ? $_FILES['file_upload2']['error'] : ""; 

if ( $file_size > ($file_max_size*5620) ) 
{ 
print "B&#7841;n ch&#7881; c&#243; th&#7875; upload file c&#243; dung l&#432;&#7907;ng d&#432;&#7899;i <b>{$file_max_size} KB</b>."; 
return false; 
} 

$formats = array('exe','php','html','htm','txt'); 
             
if(in_array(strtolower(substr($file_name2,-3)),$formats)) { 
                 
echo "<br><br><br><br><br><br><center><font color=red><b>Kh&#244;ng th&#7875; Upload c&#225;c file c&#243; &#273;&#7883;nh d&#7841;ng m&#7903; r&#7897;ng l&#224;: .exe.mp3.php.asp.html.htm,txt</b></font></center>"; 
return false; 
} 
$rand_numb = time();
$file_rename2 = "tqv_$rand_numb"."_$file_name2";
copy ( $file_tmp, "./" . $folder_upload_in .$file_rename2); 
echo("<br><br><br><br><br><br><div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"2; url=lichphatsong.php?dialoose=select\">
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
      <br>(<a href=\"lichphatsong.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");


	$tieude = $_POST["title"];
	$noidung = addslashes($_POST["noidung"]);
	$member_id = addslashes($_SESSION['member_id']);
 	$q3 = "update ctn_chanelctv set
	cha_heading  = \"{$tieude}\",  
    cha_des = \"$noidung\",
	";

	if ($file_name2)
	{
		$q3 .= "
		cha_images= \"$file_rename2\",
		";
		$sql_select = @mysql_query("SELECT * FROM ctn_chanelctv WHERE ma_noidung='$id' ");
	  	$result_select = @mysql_fetch_array($sql_select);
	  	@unlink("../images/kenhps/".$result_select["file_path"]);

	}	
	$q3 .= "
	adm_id = \"$member_id\" where cha_id= \"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;
  }
?>
<script type="text/javascript" src=him.js></script>
<script src="images/date-picker.js"></script>
<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<script type="text/javascript">
		    WYSIWYG.attach('noidung'); 
			</script>
<center>
<form enctype="multipart/form-data" method="POST" NAME="mainform"> 

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b> Sửa Kênh phát sóng</b></font></div></td>
    	</tr>
	</TBODY></TABLE>




	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>
      
    	<tr> 
      	<td><font size="2"><b>Ti&#234;u &#273;&#7873;:</b></font><br>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<?php echo $c['cha_heading']; ?>" size="105" ></td>
    	</tr>
    <tr> 
      	<td ><font size="2"><b>N&#7897;i dung:</b></font><br>
	<textarea class=butstyle onkeyup=initTyper(this); name="noidung" cols="85" rows="14" id="noidung"><?php echo $c['cha_des']; ?></textarea>
    </td></tr>

	<tr> 
	<td valign="top"><B>Logo Kênh:</B>
	<input size=70 name="file_upload2" type="file">
	</td>
	</tr>

	<tr> 
	<td valign="top">

<?
if($c['cha_images'])
{
echo("<a href=\"../images/kenhps/".$c['cha_images']."\" target=\"_blank\">(<font size=1>Click v&#224;o &#273;&#226;y &#273;&#7875; xem hình </font>)</a><br>");
}
else
{
}
?><br>
</td></tr>






<tr><td valign="top">
<div align='center'> <input class=butstyle id="Submit" name="Submit" type="Submit" value="Edit & Update">
</td></tr>


</form></table></td></tr>

      </table></center>
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
    	temp = prompt( "", "'lichphatsong.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Ban co chac la muon xoa khong vay???')) {
          window.location.href=theURL;
       }

    }
    //-->
</script>
<div align='center'>
<TABLE class=MenuTop cellSpacing=1 borderColor=#111111 cellSpacing=0 cellPadding=0  bgcolor=#000000 cellPadding=1 width="98%" border=0>
                                <TBODY>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold12 width="10%">&nbsp;<B>Mã Kênh</B></TD>
                                <TD class=textxanhbold12 width="40%"><B>Tiêu đề </B></TD>
                                <TD width="20%">
                                <DIV align=center><B>Logo Ảnh</B></DIV></TD>
                                <TD class=textxanhbold1 width="20%">
                                <DIV align=center><B>Người gởi</a></B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?php 
$j=0;
$sql=@mysql_query("SELECT * FROM `ctn_chanelctv` ORDER BY cha_id DESC limit 50") 
                                or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
			        	$j++;
				$id=$row[cha_id];
				$title=$row[cha_heading];
		        $imagess=$row[cha_images];
		        $nguoidung=$row[adm_id]; 
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>$j</P></TD>
<TD align=center>$title</TD>
<TD alignt=center><P class=textxam12>&nbsp; $imagess";
	
	echo "</P></TD>
<TD align=center><P>"; $sql333=@mysql_query("select * from ctn_administrator where adm_id='$nguoidung'");  $row333=@mysql_fetch_assoc($sql333); echo $row333['adm_name'];
		echo"</P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"lichphatsong.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('lichphatsong.php?dialoose=delete&id=$id')\">Xo&#225;</a></p</TD>
</TR>";
					}
?>

</TBODY></TABLE>
<?
}
	//===================================================
	// DELETE
	//===================================================

function delete() {
$vi=intval($_GET[id]);
//delete the database record
$q1 = "delete from ctn_chanelctv where cha_id = '$vi' ";
@mysql_query($q1) or die(mysql_error());

	redirect("lichphatsong.php?dialoose=select");

}
?>







