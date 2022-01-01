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
       if (confirm('Bạn có chắc chắn là xóa thông báo này không???')) {
          window.location.href=theURL;
       }
       else {
          alert ('Ok ! Chưa thực hiện tác vụ nào cả.');
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


       echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=announcement.php">
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
      <br>(<a href="announcement.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> ';
    $tinhtrang=$_POST['duyettin'];
	$title = $_POST["title"];
	$content = $_POST["noidung"];
    $subnoidung = $_POST["subnoidung"];
    $ngaygt= date("d/m/20y");
    $q3 = "Insert into qlns_announcement set
	ctn_id  = \"$member_id\",
	announ_title  = \"$title\",	
    announ_summary = \"$subnoidung\",
	announ_content = \"$content\",
    announ_display = \"$tinhtrang\",
	announ_day = \"{$ngaygt}\"
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
			alert("Bạn nhập thông tin bài viết thông báo!");
			the_form.title.focus();
			return false;
		}
}
</script>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('subnoidung'); 
			</script>

<script type="text/javascript">
		    WYSIWYG.attach('noidung'); 
			</script>

<center>
<form action="announcement.php?act=do" enctype="multipart/form-data" method="post" NAME="mainform" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Thêm mới thông báo</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Tiêu đề :</b></font><br>
        <input name="title" type="text" id="title" size="105" ></td>
    	</tr>

    	<tr> 
      	<td ><font size="2"><b>Nội dung  tóm tắt :</b></font><br>
	<textarea  name="subnoidung" cols="136" rows="10" id="subnoidung"></textarea><br>
	</td>
	</tr>
	<tr> 
      	<td ><font size="2"><b>Nội dung:</b></font><br>
	<textarea  name="noidung" cols="136" rows="10" id="noidung"></textarea><br>
	</td>
	</tr>

	<tr> 
		<tr> 
      <td ><font size="2"><b>Hiển thị :</b></font>
<select name="duyettin" id="duyettin">
<option value='1'>Tin hiển thị</option>
<option value='0'>Không hiển thị </option>
</select>
</td>
</tr>
	<td valign="top">&nbsp;<div align=center><input class=butstyle  name="submit" type="submit" id="submit" value="Thêm mới thông báo"><br><br></td>
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
    $a = "select * from qlns_announcement where announ_id= \"$id\"";
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
   echo("<br><br><br><br><br><br><div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"2; url=announcement.php?dialoose=select\">
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
      <br>(<a href=\"announcement.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>");


    $tinhtrang=intval($_POST["duyettin"]);
	$title = $_POST["title"];
	$content = $_POST["content"];
    $subcontent =$_POST["subcontent"];
    $q3 = "update qlns_announcement set
	announ_title='$title',
	announ_summary='$subcontent',
	announ_content='$content',
	announ_display	='$tinhtrang'		
	where announ_id = \"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "<br><br>";
	exit;
  }



?>
<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
<script type="text/javascript">
		    WYSIWYG.attach('subcontent'); 
			</script>

<script type="text/javascript">
		    WYSIWYG.attach('content'); 
			</script>
<center>
	
<form enctype="multipart/form-data" method="POST" NAME="mainform"> 

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>S&#7917;a th&#244;ng tin thông báo</b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0>

    	<tr> 
      	<td><font size="2"><b>Tiêu đề:</b></font><br>
        <input onkeyup=initTyper(this); name="title" type="text" id="title" value="<? echo $c['announ_title']; ?>" size="100" ></td>
    	</tr>

    <tr> 
      	<td ><font size="2"><b>Nội dung tóm tắt:</b></font><br>
	<textarea  name="subcontent" cols="136" rows="10" id="subcontent"><? echo $c['announ_summary']; ?></textarea><br>
	</td>
	</tr><tr> 
      	<td ><font size="2"><b>Nội dung:</b></font><br>
	<textarea  name="content" cols="136" rows="10" id="content"><? echo $c['announ_content']; ?></textarea><br>
	</td>
	</tr>

	
<tr> 
      <td ><font size="2"><b>Hiển thị:</b></font>
&nbsp;&nbsp;&nbsp;<select name="duyettin" id="duyettin" size=0>
	 <?php 
	$sqltt=@mysql_query("SELECT * FROM qlns_announcement WHERE announ_id='$id'");
	while ($rowtt=@mysql_fetch_assoc($sqltt)){
		$vinh=$rowtt['announ_display'];
		         if($vinh==1){ ?>
                          <option value="<?php echo $rowtt['announ_display']; ?>"> Tin hiển thị</option>
                          <option value="0">Không hiển thị</option>
                 <?php } else { ?>
                 		  <option value="<?php echo $rowtt['announ_display']; ?>">Không hiển thị</option>
                          <option value="1">Tin hiển thị</option>
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
    	temp = prompt( "", "'webdesign.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Bạn có chắc chắn muốn xóa thông báo này không ???')) {
          window.location.href=theURL;
       }

    }
    //-->
</script>

<div align=center> <TABLE class=MenuTop cellSpacing=1 borderColor=#111111 cellSpacing=0 cellPadding=0  bgcolor=#000000 cellPadding=1 width="90%" border=0>
                                <TBODY>
                                
                                <TR class=nenxanh5>
                                <TD class=textxanhbold12 width="5%">&nbsp;<B>Số TT</B></TD>	
                                <TD class=textxanhbold12 width="30%">&nbsp;<B>Tiêu đề</B></TD>
                                <TD class=textxanhbold12 width="15%">
                                <DIV align=center><B>Tình trạng</B></DIV></TD>
                                <TD class=textxanhbold12 width="10%">
                                <DIV align=center><B>Ngày đăng</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?
$sql=@mysql_query("SELECT * FROM `qlns_announcement` ORDER BY announ_id DESC") 
                                or die(mysql_error());
			        while($row=@mysql_fetch_array($sql)) {
				$id=$row[announ_id];
				$title=$row[announ_title];
			    $ngaydang=$row[announ_day];
				$tinhtrang=$row[announ_display];
			
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textxam12>$id</P></TD>
<TD align=middle alignt=middle><P class=textxam12>"; 
    echo "<b>".$title;
	echo "</P></TD>
<TD align=middle alignt=middle><P class=textxam12>";
		if($tinhtrang==1){Echo " Tin hiển thị"; } elseif($tinhtrang==0) {echo " Tin không hiển thị" ; }
		
		echo"</P></TD>
<TD alignt=center><P class=textxam12>&nbsp;".$ngaydang."</P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"announcement.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textxam12><a href=\"javascript:baoloi('announcement.php?dialoose=delete&id=$id&file=$images&file2=$images_big')\">Xo&#225;</a></p</TD>
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
$q1 = "delete from qlns_announcement where announ_id = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());
	redirect("announcement.php?dialoose=select");

}
?>