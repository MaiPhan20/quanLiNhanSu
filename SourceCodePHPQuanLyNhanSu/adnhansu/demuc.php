<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");


        $submit = $_POST["submit"];
       $MAX_FILE_SIZE = $_POST["MAX_FILE_SIZE"];
  if(isset($submit) && $submit == 'Update')
  {
 	//-------------------------------------------------
  	//  UPLOAD 
  	//-------------------------------------------------
    
	$alt = addslashes($_POST["alt"]);
	$thutu = intval($_POST["thutu"]);
	$tinhtrang=intval($_POST["tinhtrang"]);
    $q3 = "insert into qlns_chapter set
    chapter_name=\"$alt\",
    chapter_order = \"$thutu\",chapter_status='$tinhtrang'";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
	<div align=\"center\">
            <meta http-equiv=\"REFRESH\" content=\"3; url=demuc.php\"><br><br><br><br><br><br><br><br><br>
            <table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; c&#7853;p nh&#7853;t th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"demuc.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";
	exit;
  }

 
	//===================================================
	// END UPDATE
	//===================================================
        $MAX_FILE_SIZE = $_POST["MAX_FILE_SIZE"];
        $submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Edit & Update')
  {
 	//-------------------------------------------------
  	//  RE UPLOAD
  	//-------------------------------------------------


if ( $_FILES['file_upload']['name'] )
  	{
  	
	  	$sql_select = @mysql_query("SELECT * FROM tbl_quangcaochitiet  WHERE ma_quangcao='{$id}'");
	  	$result_select = @mysql_fetch_array( $sql_select );
	  	
	  	@unlink("../images/qc/".$result_select["images"]);




if($_FILES['file_upload']['name'] == '') { 
		       echo("<br><br><br><br><br><center><font color=red><B>H&#7843;y ch&#7885;n &#7842;nh c&#7847;n Upload cho s&#7843;n ph&#7849;m tr&#432;&#7899;c khi k&#7871;t th&#250;c!</B></font></center>"); 
		
				exit;
		       } 
		else if($_FILES['file_upload']['size'] == 0) { 
		   echo '<center><font color=red><B>C&#243; l&#7895;i x&#7843;y ra trong qu&#225; tr&#236;nh Upload. Vui l&#242;ng ki&#7875;m tra l&#7841;i.</B></font></center>'; 
		
				exit;
		       } 
		else if($_FILES['file_upload']['size'] > $_POST["MAX_FILE_SIZE"]) { 
		        echo '<br><br><br><br><br><center><font color=red><B>&#7842;nh b&#7841;n Upload qu&#225; l&#7899;n. Vui l&#242;ng ch&#7885;n &#7842;nh b&#233; h&#417;n.</B></font></center>'; 
		
				exit;
		       } 
		else if(!getimagesize($_FILES['file_upload']['tmp_name'])) { 
		        echo '<br><br><br><br><br><center><font color=red><B>D&#7919; li&#7879;u b&#7841;n Upload kh&#244;ng ph&#7843;i &#273;&#7883;nh d&#7841;ng &#7843;nh.</B></font></center>'; 
		
				exit;
		       } 


		else
		{
		
		   $images1 = $_FILES['file_upload']['name'];
		   $rand_numb = time();
		   $color_1 = "logo_$rand_numb"."_$images1";
		   $uploaddir = '../images/qc/'; // remember the trailing slash! 
		   $uploadfile = "$uploaddir"."$color_1"; 
			
			@copy($_FILES['file_upload']['tmp_name'], $uploadfile) or die ("Kh&#244;ng th&#7875; upload file");
		}
	 }
	 
  	//-------------------------------------------------
  	//  REUPDATE 
  	//-------------------------------------------------
    $id =intval($_GET[id]); 
    $name = addslashes($_POST["alt"]);
	$thutu = intval($_POST["thutu"]);
    $tinhtrang = intval($_POST["tinhtrang"]);
	$q3 = "update qlns_chapter set
	chapter_name=\"$name\",
  	chapter_order= \"$thutu\",
    chapter_status  = \"$tinhtrang\"
	";
	$q3 .= "
	where chapter_id=\"$id\"
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
  echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=demuc.php\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; c&#7853;p nh&#7853;t th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"demuc.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";
	exit;
  }

	//===================================================
	// END REUPDATE
	//===================================================


$dialoose = $_GET['dialoose'];
switch($dialoose) {
	default:
		index();
	break;
	case "Edit":
			Edit();
	break;
	case "Delete":
			Delete();
	break;
	case "Order":
			Order();
	break;
}

function index() {

	//===================================================
	// INDEX 
	//===================================================
?>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
<script src="images/date-picker.js"></script>
<script src="him.js"></script>	
<script language="javascript">
	function check_form(the_form)
	{ var the_news_tieude    = the_form.alt.value;
      if ((the_news_tieude==''))
		{
			alert("Bạn nhập thông tin cho đề mục!");
			the_form.alt.focus();
			return false;
		}
}
</script>

<form method="post" name="dk" onsubmit="return check_form(this)" enctype="multipart/form-data">
<center>
<table width="90%" border="0" cellpadding="0" cellspacing="0" borderColor=#111111>
        <tr>
    <td height="19" valign="middle" background="img/topbarfolder.gif"> <center>
        <strong><font color="red"> Danh sách đề mục </font><br>
      </center></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class=dott2><table width="90%" borderColor=#111111 cellspacing="1" cellpadding="1">
 
    <tr> 
            <td valign="top"><B>Tên đề mục :</B></td>
      <td><input onkeyup=initTyper(this); size=75 name="alt" type="text">
            </td>
    </tr>
    <tr> 
            <td valign="top"><B>Thứ tự :</B></td>
      <td><input size=75 name="thutu"  type="text">
            </td>
    </tr>
     <tr> 
            <td valign="top"><B>Tình Trạng :</B></td>
      <td><select name="tinhtrang" id="tinhtrang">
        <option value='1'>Không Xóa được</option>
        <option value='0'>Xóa được</option>

</select>
            </td>
    </tr>
  <TR><td></td>
      <td><br><input  name="submit" type="submit" id="submit" value="Update"></td>
    </tr>
<br>
  </form></table></td></tr></table>


<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "'demuc.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Bạn có chắc muốn xóa không vậy???')) {
          window.location.href=theURL;
       }
       else {
          alert ('Ok.Chưa thực hiện tác vụ nào.');
       } 
    }
    //-->
</script>

<TABLE height=20><TBODY><TR><TD></TD></TR></TBODY></TABLE>


		<Body bgcolor=#000000>
			           
                              <TABLE class=MenuTop cellSpacing=1 borderColor=#111111 bgcolor=#000000
                                cellPadding=1 width="96%" border=0>
                                <TBODY>

                                <TR class=nenxanh5>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Số TT</B></DIV></TD>
                                <TD class=textxanhbold12 width="23%">
                                <DIV align=center><B>Tên đề mục</B></DIV></TD>
                                <TD class=textxanhbold12 width="23%">
                                <DIV align=center><B>Thứ tự</B></DIV></TD>
                                 <TD class=textxanhbold1 width="10%">
                                <DIV align=center><B>Tình trạng</a></B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="5%">
                                <DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
<?php
$n=0;
$sql=@mysql_query("SELECT * FROM `qlns_chapter` ORDER BY chapter_order asc") 
                                or die(mysql_error());
                                $line=0;
			                    while($row=@mysql_fetch_array($sql)) {
			                 	$line++;
			                 	$name=$row["chapter_name"];
                                $id =$row["chapter_id"]; 
                                $thutu = $row["chapter_order"]; 
                                $status=$row["chapter_status"];	
 echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=\"left\">&nbsp;&nbsp; $line
 </TD>
<TD align=\"left\">&nbsp;&nbsp; $name
 </TD><TD align=\"left\">&nbsp;&nbsp; $thutu
 </TD><TD><center><font color=#76B646>";
 	 if($status==1){ echo "Không Xóa Được";
 	 echo"</font></center></TD>
		  
<TD><center>
<a class='Market' href='demuc.php?dialoose=Edit&id=$id' ><IMG SRC='images/edit.gif' alt='Sửa đề mục' height='16' widht='16' border='0' ></a>
</center></TD>
<TD><center><IMG SRC='images/not_remove.gif' alt='Thư mục gốc'></a></center></TD>
</TR>";}
  else{
  echo "Xóa Được";
 	 echo"</font></center></TD>
		  
<TD><center>
<a class='Market' href='demuc.php?dialoose=Edit&id=$id' ><IMG SRC='images/edit.gif' alt='Sửa đề mục' height='16' widht='16' border='0' ></a>
</center></TD>
<TD><center><a href=\"javascript:baoloi('demuc.php?dialoose=Delete&id=$id&file=$images')\"><IMG SRC='images/remove.gif' alt='Thư mục thường' border='0'></a></center></TD>
</TR>";
  
  }
	
				}

echo("</table>

<TABLE height=20><TBODY><TR><TD></TD></TR></TBODY></TABLE>");
}
function Edit() {
$id = intval($_GET[id]);
$a = "select * from qlns_chapter where chapter_id = \"$id\"";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);

	//===================================================
	// EDIT:
	//===================================================
?>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Bạn có chắc chắn muốn xóa không vậy?')){
		location.href='demuc.php?dialoose=Delete&id=<? echo $c['chapter_id']; ?>';
	}
}
</SCRIPT>
<script src="images/date-picker.js"></script>
<form method="post" name="dk" onsubmit="validate();" enctype="multipart/form-data">
<center>
<table width="550" border="0" cellpadding="0" cellspacing="0">
        <tr>
    <td height="19" valign="middle" background="img/topbarfolder.gif"> <center>
        <strong><font color="red">S&#7917;a thông tin Đề mục</font><br>
      </center></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class=dott2><table width="550" border="0" cellspacing="1" cellpadding="1">
    <tr> 
            <td valign="top"><B>Đề mục:</B></td>
      <td><input onkeyup=initTyper(this); size=61 name="alt" value="<? echo $c['chapter_name']; ?>" type="text">
            </td>
    </tr>
  <tr> 
            <td valign="top"><B>Thứ tự:</B></td>
      <td><input size=61 name="thutu"  value="<? echo $c['chapter_order']; ?>" type="text">
            </td>
    </tr>







    <tr> 
            <td valign="top"><B>Tình Trạng:</B></td>
      <td>
<SELECT NAME="tinhtrang" size=0>
	
	<?php 
	$sqltd=@mysql_query("SELECT * FROM qlns_chapter WHERE chapter_id ='$id'");
	while ($rowtd=@mysql_fetch_assoc($sqltd)){
		$tinhtrang=$rowtd['chapter_status'];
		         if($tinhtrang==1){ ?>
                          <option value="<?php echo $rowtd['chapter_status']; ?>">Không xóa được</option>
                          <option value="0">Xóa được</option>
                 <?php } else { ?>
                 		  <option value="<?php echo $rowtd['chapter_status']; ?>">Xóa được</option>
                          <option value="1">Không xóa được</option>
                 	<?php }
    } 
    ?>	  
				</select></td>
    </tr>
<TR><td></td>
      <td><input name="submit" type="submit" id="submit" value="Edit & Update">


<INPUT  onclick=JavaScript:Deletepost(); type=button value="Delete" name=btDeletepost>

</td>
    </tr>

  </form></table></td></tr></table>






<?
}
function Delete() {

	//===================================================
	// DELETE:
	//===================================================

$id =intval($_GET[id]);
//delete the database record
		$q1 = "delete from qlns_chapter where chapter_id= '$id' ";
		@mysql_query($q1) or die(mysql_error());
echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"1; url=demuc.php\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; xo&#225; th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"demuc.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";


}
?>
