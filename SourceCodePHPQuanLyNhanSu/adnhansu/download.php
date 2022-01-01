<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");

	$member_id = addslashes($_SESSION['member_id']);


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
	case "category":
			category();
	break;
	case "category_delete":
			category_delete();
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
    $ngayps =date($_POST["from"]);
	$daykt=substr($ngayps,8,2); 
    $thangkt=substr($ngayps,5,2); 
    $namkt=substr($ngayps,0,4); 
    $vinh=$daykt."/".$thangkt."/".$namkt;
    $content =addslashes($_POST["content"]);
    $theloai=intval($_POST["theloai"]);
    $member_id = addslashes($_SESSION['member_id']);
    $vi=$_REQUEST['from'];
    $day=substr($vi,8,2); 
    $thang=substr($vi,5,2); 
    $nam=substr($vi,0,4); 
    $vinh1=$day."/".$thang."/".$nam;
    if($vinh1){
    	$sqlkt=@mysql_query("select * from ctn_lichpsctv1 where ngayphatsong='$vinh1'");
    	$num1=@mysql_num_rows($sqlkt);
    	   if ($num1==0){
             $q3 = "insert into ctn_lichpsctv1 set
             typ_id=\"$theloai\",
	         lps_dateps =\"$vinh\",
             lps_content =\"$content\",
	         adm_id =\"$member_id\"
	                              ";
	           $r3 = @mysql_query($q3) or die(mysql_error());
	            echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=download.php">
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
      <br>(<a href="download.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
	        exit; }
	        else 
	        	echo "<script> alert('Ngay nay da co trong co so du lieu! Ban Chon Ngay khac') </script>";
	}
}

  
	//===================================================
	// END Update
	//===================================================

?>

<script type="text/javascript" src=him.js></script>
<script language="javascript">
	function check_form(the_form)
	{ var the_news_tieude    = the_form.donvi.value;
      if ((the_news_tieude==''))
		{
			alert("Ban nhap thong tin lich phat song!");
			the_form.donvi.focus();
			return false;
		}
}
</script>
	<script src="images/date-picker.js"></script>
<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<script type="text/javascript">
		    WYSIWYG.attach('content'); 
			</script>
	


<div align=center>
<form action="download.php?act=do" enctype="multipart/form-data" method="post" NAME="dk" >
	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="3" color="#0000FF"><b>Lịch phát sóng mới</b> <br><br></font></div></td>
    	</tr>
	</TBODY></TABLE>
<div align=center>
	<TABLE  cellSpacing=0 cellPadding=0 width="95%" border=0>
	<tr> 
<td ><font size="2"><b>Th&#7875; lo&#7841;i Kênh :</b></font></td>
<td><select name="theloai" id="theloai">
<? $a="select * from ctn_typelich ";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['typ_id']?>'><?=$row['typ_name']?></option>
<? }?> 
</select>
</td></tr>
	<tr>
        <td align="left" class="style1"><B>Ng&#224;y b&#7855;t &#273;&#7847;u:</td>
        <td align="left"><input  name="from" type="text" id="from" size='70' >
          <a href="javascript:show_calendar('dk.from');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a></td>
      </tr>	
    <tr> 
      	<td ><font size="2"><b>M&#244; t&#7843;:</b></font></td>
	<td><textarea  name="content" style="width:70%;height:250px;" id="content"></textarea>
	</td>
	</tr>
	<tr> <td ><font size="2"></td>
	<td valign="top"><div align='center'><input class=butstyle  name="submit" type="submit" id="submit" value="Submit"><br><br></td>
    	</tr>
	</form>
	</TBODY></TABLE></center>




<?

}
	//===================================================
	// FUNCTION edit
	//===================================================

function edit() {
	$id = intval($_GET["id"]); $fl=0;
$a = "select * from ctn_lichpsctv1  where lps_id= \"$id\" ";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);

	//===================================================
	// UPDATE PRODUCT
	//===================================================
  	$Submit = $_POST["Submit"];
	$id = intval($_GET["id"]);
	$member_id = addslashes($_SESSION['member_id']);
  if(isset($Submit) && $Submit == 'Edit & Update')
  {
	$category_id = intval($_POST["category_id"]);
$file_max_size = 5000; // Tinh theo KB 
$folder_upload_in = "../images/download/"; // Thu muc Upload 

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
$file_rename = "file_$rand_numb"."_$file_name";
copy ( $file_tmp, "./" . $folder_upload_in . $file_rename); 

 
echo("<br><br><br><br><br><br><div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"2; url=download.php?dialoose=select\">
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
      <br>(<a href=\"download.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");
    $ngayps = date($_POST["from"]);
	$daykt=substr($ngayps,8,2); 
    $thangkt=substr($ngayps,5,2); 
    $namkt=substr($ngayps,0,4); 
    $vinh=$daykt."/".$thangkt."/".$namkt;
    $theloai=intval($_POST['theloai']);
    $content =addslashes($_POST["content"]);
    if($ngayps==null){
    $q3 = "update ctn_lichpsctv1 set
    typ_id=\"$theloai\",
	lps_content= \"$content\",
	adm_id='$member_id' where lps_id= \"$id\"
	";
    $r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;
  }
  else {
  	$q3 = "update ctn_lichpsctv1 set
    typ_id=\"$theloai\",lps_dateps = \"$vinh\",
	lps_content= \"$content\",
	adm_id='$member_id' where lps_id= \"$id\"
	";
    $r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;  
  }
  }

?>

<script type="text/javascript" src=him.js></script>
<script language="javascript">
	function check_form(the_form)
	{ var the_news_tieude    = the_form.from.value;
      if ((the_news_tieude==''))
		{
			alert("Ban nhap thong tin tuyen dung!");
			the_form.from.focus();
			return false;
		}
}
</script>
	<script src="images/date-picker.js"></script>
<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<script type="text/javascript">
		    WYSIWYG.attach('content'); 
			</script>
	
<center>
<form enctype="multipart/form-data" method="POST" NAME="dk" onsubmit="return check_form(this)"> 
	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Chỉnh sửa lịch phát sóng</b></font></div></td>
    </tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>
    <tr> 
        <td valign="top"><B>Th&#7875; lo&#7841;i :</B></td>
        <td><SELECT NAME="theloai" size=0>
		<?
	$sel_cat=@mysql_query("select * from ctn_typelich");
	while($res=@mysql_fetch_array($sel_cat))
	{
?>
		<option value="<?php echo $res['typ_id']; ?>" <?php if($c['typ_id']==$res['typ_id']){echo "selected";}?>><?echo $res['typ_name'];?>
<?
	}
?>
				</select> </td>
    </tr>

    <tr>
        <td align="left" class="style1"><B>Ng&#224;y b&#7855;t &#273;&#7847;u:</td>
        <td align="left"><input  name="from" type="text" id="from" size='70' value="<?php echo $c['lps_dateps']; ?>" >
          <a href="javascript:show_calendar('dk.from');"><img src="images/calendar.jpg" width="16" height="15" border="0"></a></td>
      </tr>	
    <tr> 
      	<td ><font size="2"><b>M&#244; t&#7843;:</b></font></td>
	<td><textarea  name="content" style="width:70%;height:250px;" id="content"><?php echo $c['lps_content']; ?></textarea>
	</td>
	</tr>
	<tr> <td></td>
	<td valign="top"><div align='left'><input class=butstyle id="Submit" name="Submit" type="Submit" value="Edit & Update"><br><br></td>
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
    	temp = prompt( "", "'download.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Ban co chac la muon xoa khong vay???')) {
          window.location.href=theURL;
       }

    }
    //-->
</script>

<TABLE class=MenuTop cellSpacing=1 borderColor=#111111 cellSpacing=0 cellPadding=0  bgcolor=#000000 cellPadding=1 width="100%" border=0>
                                <TBODY>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold12 width="10%">&nbsp;<B>Mã phát sóng</B></TD>
                                <TD class=textxanhbold12 width="20%">
                                <DIV align=center><B>Ngày phát sóng</B></DIV></TD>
                                <TD class=textxanhbold12 width="30%">
                                <DIV align=center><B>ThểLoại</B></DIV></TD>
                                <TD class=textxanhbold12 width="30%">
                                <DIV align=center><B>Người gởi</B></DIV></TD>
                                  <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?
	$j=0; 
$sql=@mysql_query("SELECT * FROM `ctn_lichpsctv1` ORDER BY lps_id DESC") 
                                or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
			        	$j++;
				$id=$row[lps_id];
				$theloai=$row[typ_id];
			    $sql12345=@mysql_query("SELECT * FROM ctn_typelich where typ_id='$theloai'");
				$rowne12=@mysql_fetch_assoc($sql12345);
				$tenloai=$rowne12['typ_name'];
				$ngayphatsong=$row[lps_dateps];
				$nguoidung=$row[adm_id]; 
				$sql123=@mysql_query("SELECT * FROM ctn_administrator where adm_id='$nguoidung'");
				$rowne=@mysql_fetch_assoc($sql123);
				$ten=$rowne['adm_name'];
		        echo("
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>$j</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$ngayphatsong</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$tenloai</P></TD>
<TD align=middle alignt=middle><P class=textxam12>$ten</P></TD>		
<TD align=middle alignt=middle><P class=textxam12><a href=\"download.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('download.php?dialoose=delete&id=$id')\">Xo&#225;</a></p</TD>
</TR>");
					}
?>

</TBODY></TABLE>
<?


}
	//===================================================
	// FUNCTION remove
	//===================================================

function delete() {
$fl=1+0;
$vinh=intval($_GET[id]);
//delete the database record
$q1 = "delete  from  ctn_lichpsctv1  where lps_id='$vinh' ";
@mysql_query($q1) or die(mysql_error());
redirect("download.php?dialoose=select");

}
	
  	//-------------------------------------------------
  	//  CATEGORY
  	//-------------------------------------------------
  	$doitenkhong = $_POST["doitenkhong"];
  	$newname = $_POST["newname"];
  if($doitenkhong == 'co')
  {
 	$q3 = "update ctn_typelich set typ_name = \"$_POST[newname]\" where typ_id = \"$_POST[id]\"";
 	$q2 = "update ctn_typelich set typ_name = \"$_POST[newid]\" where typ_id= \"$_POST[id]\"";


	$r3 = @mysql_query($q3) or die("loi DB khi doi ten the loai");
}

  	$xoatheloai = $_POST["xoatheloai"];
  if($xoatheloai == 'co')
  {
 	$q5 = "DELETE FROM ctn_typelich WHERE typ_id= \"$_POST[id]\"";
	$r5 = @mysql_query($q5) or die("loi DB khi doi ten the loai");

       
 
 }$newname = $_POST["newname"];
  	$themcatmoi = $_POST["themcatmoi"]; 
if ($themcatmoi == 'co')
{
	if (isset($newname)){
 	$q4 = "INSERT INTO ctn_typelich (typ_name) VALUES ('$newname')";
	$r4 = @mysql_query($q4) or die("Loi khi ghi them the loai");
                   }
    else{
      echo"<script> alert ('B&#7841;n hãy nh&#7853;p tên th&#7875; lo&#7841;i m&#7899;i!')</script>"; 
    }
             }
if ($_REQUEST[delete_news_category]) {
// delete news_cat

// delete a record

    $sql = "DELETE FROM $_REQUEST[table] WHERE id=$_REQUEST[news_category]";	

    $result = @mysql_query($sql);

if (!$result)

{
      echo "Cannot Delete story - something screw up!";
}
else

{	
	echo "<div align=\"center\"><br><br><font color=\"red\">Deleted!</font><br><br>";     

} }
	//===================================================
	// FUNCTION remove CATEGORY
	//===================================================

function category_delete() {


 	$q5 = "DELETE FROM ctn_typelich WHERE typ_id = \"$_GET[id]\"";
	$r5 = @mysql_query($q5) or die("loi DB khi doi ten the loai");
     redirect("download.php?dialoose=category");

}
//===================================================
	// FUNCTION CATEGORY
	//===================================================

function category() {
$a = "SELECT * FROM ctn_typelich order by typ_id";
$b = @mysql_query($a) or die("Loi khi query trong news_category");
?>
<center>

<table border="0" cellpadding="0" cellspacing="0" width=350 align="center">
<tr>
	<td>
<?
$count_query = @mysql_query($a);
echo "<br><br><center>Hi&#7879;n c&#243; <b>".@mysql_num_rows($count_query)."</b> th&#7875; lo&#7841;i Tin t&#7913;c trong c&#417; s&#7903; d&#7919; li&#7879;u.<br><br>
<form method=post onsubmit='return check_form(this)' name=quangvinh><input onkeyup=initTyper(this);  type='text' name='newname' class='' size='45'>
					<input type=hidden name='themcatmoi' value='co'>
					<input style='FONT-WEIGHT: bold; CURSOR: hand; COLOR: #000000; ' type='submit' name='new' value='Th&#234;m m&#7899;i' class='button' style='width:100'>
					</form><br></center>";
if (sizeof($count_query) == 0)
{
?>
		<tr align="center">
			
  <td align="center"><b>Ch&#432;a c&#243; th&#7875; lo&#7841;i n&#224;o c&#7843;!</b> </td>
		</tr>
<?
}
else {
?>

	</td>
</tr>

<tr>
	<td align="center"> 
<table align="center" bgcolor=#6bAAef width="350" border="0" cellspacing="1" cellpadding="4">
  <tr bgcolor="#4B9BE0"> 
    <td width="5%" background="../images/headerbg.gif"  ><center>
            <b><font color="#FFFFFF">ID</font></b> 
          </center></td>
    <td width="65%" background="../images/headerbg.gif"  >
            <b><font color="#FFFFFF">T&#234;n c&#225;c th&#7875; lo&#7841;i :</font></b> 
          </td>
    <td width="10%" background="../images/headerbg.gif"  ><center>
            <b><font color="#FFFFFF">Ch&#7885;n l&#7921;a</font></b> 
          </center></td>
  <td width="5%" background="../images/headerbg.gif"  ><center>
            <b><font color="#FFFFFF">Xo&#225;</font></b> 
          </center></td>
  </tr>
<?
$a = "SELECT * FROM ctn_typelich order by typ_id ASC ";
$b = @mysql_query($a) or die("Loi trong news_category");
  while($c = @mysql_fetch_array($b))
  {
?>
<script language="javascript">
	function check_form(the_form)
	{ var the_newname    = the_form.newname.value;
	 if ((the_newname==''))
		{
			alert(" Ban Nhap ten the loai ! ");
			the_form.newname.focus();
			return false;
		}
}
</script>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Ban co chac chan muon xoa Danh muc nay khong?')){
		location.href='download.php?dialoose=category_delete&id=<? echo $c['typ_id']; ?>';
	}
}
</SCRIPT>
  <tr>
  <form method='post'>
    <td bgcolor='#ffffff'><center><B>
<?=$c[typ_id]?>
</B></center></td>

    <td bgcolor='#ffffff'><input onkeyup=initTyper(this); type='text' name='newname' value='<?=$c[typ_name]?>' size='40'></a></td>
    <td bgcolor='#ffffff'><center>

<input type=hidden name='doitenkhong' value='co'>
<input type=hidden name='id' value='<?=$c[typ_id]?>'>
<input style='FONT-WEIGHT: bold; CURSOR: hand; COLOR: #000000;  name='submit' type='submit' value='&#272;&#7893;i t&#234;n'>  </form>
</td><td bgcolor='#ffffff'>

  <form name="form1" method='post'>
<input type=hidden name='xoatheloai' value='co'>
<input type=hidden name='id' value='<?=$c[typ_id]?>'>
<input style='FONT-WEIGHT: bold; CURSOR: hand; COLOR: #000000;  name='delete_news_category' onclick=JavaScript:Deletepost(); name=btDeletepost type='button' value='Xo&#225;'> 
  </form>


</center></td>
  </form>
  </tr>
  <?
  }
  ?>
</table>
<br>
<?
	}

}


?>