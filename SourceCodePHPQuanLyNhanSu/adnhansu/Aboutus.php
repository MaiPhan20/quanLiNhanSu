<?php
require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");$v=1+0;
$a = "select * from ctn_introduce where intro_id='$v'";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);
$noidung = $_POST["noidung"]; 
$ctn=$_GET['change'];
if($ctn=='changes')
  {
 	$q3 = "UPDATE ctn_introduce SET
	intro_content='$noidung' WHERE intro_id='$v'
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
	<br><br><br><br><br><br><div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"2; url=Aboutus.php\">
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
      <br>(<a href=\"Aboutus.php\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>  
	";

	exit;
  }
	
?>
<script type="text/javascript" src=him.js></script>
<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<script type="text/javascript">
		    WYSIWYG.attach('noidung'); 
			</script>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<div align='center'>
<table width="600" border="0" cellpadding="0" cellspacing="0">
        <tr>
    <td height="19" valign="middle" background="img/topbarfolder.gif"> <center>
        <strong><font color="red">Gi&#7899;i Thi&#7879;u v&#7873; t&#7893;ng công ty c&#7893; ph&#7847;n &#273;&#7847;u t&#432; CTN Vi&#7879;t Nam</font><br>
      </center></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class=dott2><table width="595" border="0" cellspacing="1" cellpadding="1">
<form method="post" NAME="mainform" action='Aboutus.php?change=changes'>

 <tr> 
            <td valign="top"><B>N&#7897;i dung</B></td></tr><tr>
 <tr> 
<td valign="top">

           <textarea  name="noidung" style="width:70%;height:250px;" ><?=$c['intro_content']; ?></textarea>                          
                              
</td>
    </tr>
<TR>
      <td ><div align='center'><input  name="submit" type="submit" id="submit" value="Thay &#273;&#7893;i"></td>
    </tr>

  </form>
                </table>
            
          </td>
        </tr>

      </table><br>
</center>