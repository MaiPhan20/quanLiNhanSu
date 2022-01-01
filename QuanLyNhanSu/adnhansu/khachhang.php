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

if ( $_GET["act"] == "do" ) 
{ 

$file_max_size = 5000; // Tinh theo KB 
$folder_upload_in = "../images/doitac/"; // Thu muc Upload 
$file_tmp = isset($_FILES['file_upload']['tmp_name']) ? $_FILES['file_upload']['tmp_name'] : ""; 
$file_name = isset($_FILES['file_upload']['name']) ? $_FILES['file_upload']['name'] : ""; 
$file_type = isset($_FILES['file_upload']['type']) ? $_FILES['file_upload']['type'] : ""; 
$file_size = isset($_FILES['file_upload']['size']) ? $_FILES['file_upload']['size'] : ""; 
$file_error = isset($_FILES['file_upload']['error']) ? $_FILES['file_upload']['error'] : ""; 

if ( $file_size > ($file_max_size*1024) ) 
{ 
print "B&#7841;n ch&#7881; c&#243; th&#7875; upload file c&#243; dung l&#432;&#7907;ng d&#432;&#7899;i <b>{$file_max_size} KB</b>."; 
return false; 
} 

$formats = array('mp3','exe','php','html','htm','txt'); 
             
if(in_array(strtolower(substr($file_name,-3)),$formats)) { 
                 
echo "<br><br><br><br><br><br><center><font color=red><b>Kh&#244;ng th&#7875; Upload c&#225;c file c&#243; &#273;&#7883;nh d&#7841;ng m&#7903; r&#7897;ng l&#224;: .exe.mp3.php.asp.html.htm,txt</b></font></center>"; 
return false; 
} 

$rand_numb = time();
$file_rename = "tqv_$rand_numb"."_$file_name";
copy ( $file_tmp, "./" . $folder_upload_in . $file_rename); 




$member_id = addslashes($_SESSION['member_id']);
$file_max_size = 5000; // Tinh theo KB 
$folder_upload_in = "../images/doitac/"; // Thu muc Upload 
$file_tmp = isset($_FILES['file_upload2']['tmp_name']) ? $_FILES['file_upload2']['tmp_name'] : ""; 
$file_name2 = isset($_FILES['file_upload2']['name']) ? $_FILES['file_upload2']['name'] : ""; 
$file_type = isset($_FILES['file_upload2']['type']) ? $_FILES['file_upload2']['type'] : ""; 
$file_size = isset($_FILES['file_upload2']['size']) ? $_FILES['file_upload2']['size'] : ""; 
$file_error = isset($_FILES['file_upload2']['error']) ? $_FILES['file_upload2']['error'] : ""; 

if ( $file_size > ($file_max_size*1024) ) 
{ 
print "B&#7841;n ch&#7881; c&#243; th&#7875; upload file c&#243; dung l&#432;&#7907;ng d&#432;&#7899;i <b>{$file_max_size} KB</b>."; 
return false; 
} 

$formats = array('mp3','exe','php','html','htm','txt'); 
             
if(in_array(strtolower(substr($file_name2,-3)),$formats)) { 
                 
echo "<br><br><br><br><br><br><center><font color=red><b>Kh&#244;ng th&#7875; Upload c&#225;c file c&#243; &#273;&#7883;nh d&#7841;ng m&#7903; r&#7897;ng l&#224;: .exe.mp3.php.asp.html.htm,txt</b></font></center>"; 
return false; 
} 
$rand_numb = time();
$file_rename2 = "tqv_$rand_numb"."_$file_name2";
copy ( $file_tmp, "./" . $folder_upload_in . $file_rename2); 


       echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=khachhang.php">
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
      <br>(<a href="khachhang.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';
    $tinhtrang=$_POST['duyettin'];
	$title = replace($_POST["title"]);
	$content = $_POST["gioithieu"];
    $company_url = replace($_POST["company_url"]);
    $q3 = "Insert into ctn_partner set
	partner_name  = \"$title\",
    partner_logo = \"$file_rename\",
	partner_url = \"$company_url\",
    partner_intro = \"$content\",
	adm_id = \"{$member_id}\",
	partner_status=\"{$tinhtrang}\" 
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

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('gioithieu'); 
			</script>

<center>
<form action="khachhang.php?act=do" enctype="multipart/form-data" method="post" NAME="mainform" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>C&#7853;p nh&#7853;t Kh&#225;ch h&#224;ng m&#7899;i</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>T&#234;n Kh&#225;ch h&#224;ng/C&#244;ng ty:</b></font><br>
        <input name="title" type="text" id="title" size="105" ></td>
    	</tr>

    	<tr> 
      	<td><font size="2"><b>&#272;&#7883;a ch&#7881; trang web:</b></font><br>
        <input name="company_url" type="text" id="company_url" size="105" ></td>
    	</tr>
	<tr> 
      	<td ><font size="2"><b>Gi&#7899;i thi&#7879;u chi ti&#7871;t:</b></font><br>
	<textarea  name="gioithieu" cols="136" rows="10" id="gioithieu"></textarea><br>
	</td>
	</tr>

	<tr> 
	<td valign="top"><B>Logo công ty:</B>
	 <input size=30 name="file_upload" type="file">
	</td>
	</tr>
	<tr> 
		<tr> 
      <td ><font size="2"><b>Duy&#7879;t :</b></font>
<select name="duyettin" id="duyettin">
<option value='1'> &#273;&#432;&#7907;c duy&#7879;t</option>
<option value='0'>Ch&#432;a &#273;&#432;&#7907;c duy&#7879;t</option>
</select>
</td>
</tr>
	<td valign="top">&nbsp;<div align=center><input class=butstyle  name="submit" type="submit" id="submit" value="Add Customer"><br><br></td>
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
    $a = "select * from ctn_partner where partner_id= \"$id\"";
    $b = @mysql_query($a) or die(mysql_error());
    $c = @mysql_fetch_array($b);
    //===================================================
	// UPDATE PRODUCT
	//===================================================
  	$Submit = $_POST["Submit"];
	$id = intval( $_GET["id"] );
  if(isset($Submit) && $Submit == 'Edit & Update')
  {
	$category_id = intval($_POST["category_id"]);
$file_max_size = 5000; // Tinh theo KB 
$folder_upload_in = "../images/doitac/"; // Thu muc Upload 

$file_tmp = isset($_FILES['file_upload']['tmp_name']) ? $_FILES['file_upload']['tmp_name'] : ""; 
$file_name = isset($_FILES['file_upload']['name']) ? $_FILES['file_upload']['name'] : ""; 
$file_type = isset($_FILES['file_upload']['type']) ? $_FILES['file_upload']['type'] : ""; 
$file_size = isset($_FILES['file_upload']['size']) ? $_FILES['file_upload']['size'] : ""; 
$file_error = isset($_FILES['file_upload']['error']) ? $_FILES['file_upload']['error'] : ""; 

if ( $file_size > ($file_max_size*1024) ) 
{ 
print "B&#7841;n ch&#7881; c&#243; th&#7875; upload file c&#243; dung l&#432;&#7907;ng d&#432;&#7899;i <b>{$file_max_size} KB</b>."; 
return false; 
} 

$formats = array('mp3','exe','php','html','htm','txt'); 
             
if(in_array(strtolower(substr($file_name,-3)),$formats)) { 
                 
echo "<br><br><br><br><br><br><center><font color=red><b>Kh&#244;ng th&#7875; Upload c&#225;c file c&#243; &#273;&#7883;nh d&#7841;ng m&#7903; r&#7897;ng l&#224;: .exe.mp3.php.asp.html.htm,txt</b></font></center>"; 
return false; 
} 
$rand_numb = time();
$file_rename = "tqv_$rand_numb"."_$file_name";
copy ( $file_tmp, "./" . $folder_upload_in . $file_rename); 




$file_max_size = 5000; // Tinh theo KB 
$folder_upload_in = "../images/doitac/"; // Thu muc Upload 
$file_tmp = isset($_FILES['file_upload2']['tmp_name']) ? $_FILES['file_upload2']['tmp_name'] : ""; 
$file_name2 = isset($_FILES['file_upload2']['name']) ? $_FILES['file_upload2']['name'] : ""; 
$file_type = isset($_FILES['file_upload2']['type']) ? $_FILES['file_upload2']['type'] : ""; 
$file_size = isset($_FILES['file_upload2']['size']) ? $_FILES['file_upload2']['size'] : ""; 
$file_error = isset($_FILES['file_upload2']['error']) ? $_FILES['file_upload2']['error'] : ""; 

if ( $file_size > ($file_max_size*1024) ) 
{ 
print "B&#7841;n ch&#7881; c&#243; th&#7875; upload file c&#243; dung l&#432;&#7907;ng d&#432;&#7899;i <b>{$file_max_size} KB</b>."; 
return false; 
} 

$formats = array('mp3','exe','php','html','htm','txt'); 
             
if(in_array(strtolower(substr($file_name2,-3)),$formats)) { 
                 
echo "<br><br><br><br><br><br><center><font color=red><b>Kh&#244;ng th&#7875; Upload c&#225;c file c&#243; &#273;&#7883;nh d&#7841;ng m&#7903; r&#7897;ng l&#224;: .exe.mp3.php.asp.html.htm,txt</b></font></center>"; 
return false; 
} 
$rand_numb = time();
$file_rename2 = "tqv_$rand_numb"."_$file_name2";
copy ( $file_tmp, "./" . $folder_upload_in . $file_rename2); 

 
echo("<br><br><br><br><br><br><div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"2; url=khachhang.php?dialoose=select\">
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
      <br>(<a href=\"khachhang.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");


    $tinhtrang=intval($_POST["duyettin"]);
	$title = replace($_POST["title"]);
	$content = replace($_POST["content"]);
    $company_url = replace($_POST["company_url"]);
    $q3 = "update ctn_partner set
	partner_name  = \"$title\", ";
	if ($file_name)
	{
		$q3 .= "
		partner_logo = \"$file_rename\",
		";

	  	$sql_select = @mysql_query("SELECT * FROM ctn_partner WHERE partner_id='$id' ");
	  	$result_select = @mysql_fetch_array($sql_select);
	  	
	  	@unlink("../images/doitac/".$result_select["partner_logo"]);

	}
	
	$q3 .= "
	partner_url = \"$company_url\",
	partner_intro = \"$content\",partner_status='$tinhtrang'
	 where partner_id = \"$id\"
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
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $c['partner_name']; ?>" size="136" ></td>
    	</tr>

    	<tr> 
      	<td><font size="2"><b>&#272;&#7883;a ch&#7881; trang web:</b></font><br>
        <input onkeyup=initTyper(this); name="company_url" type="text" id="company_url" value="<? echo $c['partner_url']; ?>"size="136" ></td>
    	</tr><tr> 
      	<td ><font size="2"><b>Gi&#7899;i thi&#7879;u chi ti&#7871;t:</b></font><br>
	<textarea  name="content" cols="136" rows="10" id="content"><? echo $c['partner_intro']; ?></textarea><br>
	</td>
	</tr>

	<tr> 
	<td valign="top"><B>&#7842;nh b&#233; website:</B>
	 <input size=30 name="file_upload" type="file"><br>
<?
if($c['partner_logo'])
{
echo("<a href=\"../images/doitac/".$c['partner_logo']."\" target=\"_blank\">(<font size=1>Click v&#224;o &#273;&#226;y &#273;&#7875; xem &#7842;nh hi&#7879;n t&#7841;i</font>)</a><br>");
}
else
{
}
?>
	</td>
	</tr>
	
<tr> 
      <td ><font size="2"><b>Duy&#7879;t tin:</b></font>
&nbsp;&nbsp;&nbsp;<select name="duyettin" id="duyettin" size=0>
	 <?php 
	$sqltt=@mysql_query("SELECT * FROM ctn_partner WHERE partner_id='$id'");
	while ($rowtt=@mysql_fetch_assoc($sqltt)){
		$vinh=$rowtt['partner_status'];
		         if($vinh==1){ ?>
                          <option value="<?php echo $rowtt['partner_status']; ?>"> Được duy&#7879;t</option>
                          <option value="0">Ch&#432;a &#273;&#432;&#7907;c duy&#7879;t</option>
                 <?php } else { ?>
                 		  <option value="<?php echo $rowtt['partner_status']; ?>"> Ch&#432;a &#273;&#432;&#7907;c duy&#7879;t</option>
                          <option value="1">Được duy&#7879;t</option>
                 	<?php }
    } 
    ?>	  
                 			  
</select>
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
                                <TD class=textxanhbold12 width="30%">&nbsp;<B>Đối tác</B></TD>
                                <TD class=textxanhbold12 width="15%">
                                <DIV align=center><B>Website</B></DIV></TD>
                                <TD class=textxanhbold12 width="10%">
                                <DIV align=center><B>Ảnh</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?
$sql=@mysql_query("SELECT * FROM `ctn_partner` ORDER BY partner_id DESC") 
                                or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
				$id=$row[partner_id];
				$title=$row[partner_name];
			    $company_url=$row[partner_url];
				$images=$row[partner_logo];
				$tinhtrang=$row[partner_status];
			
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>";if($tinhtrang==1){ echo "<b>".$title; } else echo $title;
	echo "</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$company_url</P></TD>
<TD alignt=center><P class=textxam12>&nbsp;".$images."</P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"khachhang.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('khachhang.php?dialoose=delete&id=$id&file=$images&file2=$images_big')\">Xo&#225;</a></p</TD>
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
$q1 = "delete from ctn_partner where partner_id = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

//delete the file
@unlink("../images/doitac/".$_GET[file]);
@unlink("../images/doitac/".$_GET[file2]);

	redirect("khachhang.php?dialoose=select");

}
?>