<?php

require_once("class.php");
if (    $DIALOOSEWEB->admin->check_user()    ==    FALSE    ) 
   {    exit(    $DIALOOSEWEB->admin->login_page()    );  
}
require_once("AdminNavigation.php");
require_once("../sources/function.php");

$member_id = addslashes($_SESSION['member_id']);

	//===================================================
	// Update
	//===================================================
  	$submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Add News')
  {


if($_FILES['userfile']['name'] == '') { 
       echo '<br><br><br><br><br><center><font color=red><B>B&#7841;n ch&#432;a ch&#7885;n &#7842;nh &#273;&#7875; Upload</B></font></center>'; 

		exit;
       } 
   $userfile = intval( $_POST["userfile"] );
   $images = $_FILES['userfile']['name'];
   $rand_numb = time();
   $images2 = "News_$rand_numb_"."$images";
   $uploaddir = '../video/'; // remember the trailing slash! 
   $uploadfile = "$uploaddir"."$images2"; 
   if(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { 
   	  echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=clipvui.php">
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
      <br>(<a href="clipvui.php"> Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 

      
   } 
   else { 
       echo '<br><br><br><br><br><center><font color=red><B>C&#243; l&#7895;i x&#7843;y ra trong qu&#225; tr&#236;nh Upload file !</B></font></center>.<br>'; 

		exit;
   } 
    $news_tieude = htmlspecialchars($_POST['news_tieude']); 
	$news_noidung =$_POST['news_noidung'];
	$qv =@mysql_query("INSERT INTO tbl_videoclip(tieude,noidung,file_path,ma_nguoidung) VALUES('$news_tieude','$news_noidung','$images2','$member_id')");
    if($qv==false){ echo"Loi".mysql_error(); }
    echo "<br><br>";
	exit;


  }

	//===================================================
	// Reupdate
	//===================================================
  	$submit = $_POST["submit"];
  if(isset($submit) && $submit == 'Update')
  {
  	//-------------------------------------------------
  	//  Reupload images
  	//-------------------------------------------------
  	
   $userfile = intval( $_POST["userfile1"] );
   $images = $_FILES['userfile1']['name'];
   $rand_numb = time();
   $images2 = "News_$rand_numb_"."$images";
   $uploaddir = '../video/'; // remember the trailing slash! 
   $uploadfile = "$uploaddir"."$images2"; 

  	//-------------------------------------------------
  	//  Reupload images
  	//-------------------------------------------------

	$id = intval( $_GET["id"] );
	$news_tieude =htmlspecialchars($_POST["news_tieude"]);
    $news_noidung = $_POST["news_noidung"];
    $duyettin= $_POST["duyettin"];
    $q3 = "UPDATE tbl_videoclip SET
    tieude ='$news_tieude',
	noidung ='$news_noidung',
	";
if ($images_small )
	{
		$q3 .= "
		file_path='$images2',
		";
	}		
	
	$q3 .= "
	ma_nguoidung='$member_id' WHERE ma_video ='$id'
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=clipvui.php?dialoose=select\"><br><br><br><br><br><br><br><br><br>
<table width=\"40%\"  border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
  <tr>
    <td align=\"center\" valign=\"top\"><fieldset style=\"padding: 2; width:312px; height:59px\">
	<legend>Please stand by ...
	  </legend>
	  <p align=\"center\">
		<b><font color=red>B&#7841;n &#273;&#227; s&#7917;a th&#224;nh c&#244;ng</b></b><br>
		<br>
      <img src=\"images/loading1.gif\" width=\"150\" height=\"13\" border=\"0\"> 
      <br>
      <br>(<a href=\"clipvui.php?dialoose=select\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";

	exit;
  }

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
	case "edit2":
			edit2();
	break;
	case "remove":
			remove();
	break;
	case "remove2":
			remove2();
	break;
	case "remove3":
			remove3();
	break;
	case "deleteall":
			deleteall();
	break;
	case "select":
			select();
	break;
	case "validate":

			validate();
	break;
	case "selectcat":

			selectcat();
	break;
	case "selectcat1":
		    selectcat1();
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
?>
<script type="text/javascript" src=him.js></script>
<script language="javascript">
	function check_form(the_form)
	{ var the_news_tieude    = the_form.news_tieude.value;
      if ((the_news_tieude==''))
		{
			alert("Ban nhap thong tin cho giai tri: clip vui!");
			the_form.news_tieude.focus();
			return false;
		}
}
</script>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
	    <script type="text/javascript">
		    WYSIWYG.attach('news_noidung'); 
			</script>
<div align='center'>
<form enctype="multipart/form-data" method="POST" NAME="mainform" onsubmit="return check_form(this)"> 
<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
<tr> 
      <td colspan="2"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Giải trí : Clip vui</b></font></div></td>
    </tr>
    <tr> 
      <td><font size="2"><b>Ti&#234;u &#273;&#7873;:</b></font><br>
        <input  name="news_tieude" type="text" id="news_tieude" size="105" ></td>
    </tr>
<tr> 
      <td ><font size="2"><b>N&#7897;i dung :</b></font><br>
    <textarea  name="news_noidung" style="width:70%;height:250px;" >
     </textarea></td>
</tr>




  <tr> 
            <td valign="top"><B>File Clip:</B><font color="#FF0000">*</font> <br><input type="hidden" name="MAX_FILE_SIZE" value="1500000000"> <input size=70 name="userfile" type="file">
             
             </td>
    </tr>
  <tr><td height=10></td></tr>
 <tr> 
 <td valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  name="submit" type="submit" id="submit" value="Add News"><br><br></td>
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
$a = "select * from tbl_videoclip where ma_video='$id'";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);
?>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Ban co chac chan muon xoa Bai viet nay khong?')){
		location.href='clipvui.php?dialoose=remove3&id=<? echo $c['ma_video']; ?>';
	}
}
</SCRIPT>
<script type="text/javascript" src=him.js></script>
	<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
	      <script type="text/javascript">
		    WYSIWYG.attach('news_noidung'); 
			</script>
<center>
<TABLE  cellSpacing=1 cellPadding=0 width="80%" border=0>
<tr> 
      <td colspan="2"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>S&#7917;a th&#244;ng tin Clip vui</b></font></div></td>
    </tr>
<form method="post" NAME="mainform" enctype="multipart/form-data">
    <tr> 
      <td><font size="2"><b>Ti&#234;u &#273;&#7873;:</b></font><br>
<input onkeyup=initTyper(this); name="news_tieude" type="text" value="<? echo $c['tieude']; ?>"  size="105"></td>
    </tr>
         <tr> 
            <td valign="top"><B>N&#7897;i dung :</B><br>
<textarea  name="news_noidung" style="width:70%;height:250px;" ><?=$c['noidung']; ?>
     </textarea>
</td>
    </tr>
   



<tr><td valign="top"><B>&#7842;nh Upload:</B><input type="hidden" name="MAX_FILE_SIZE" value="1150000000000">
<input size=26 name="userfile1" type="file"> (N&#7871;u mu&#7889;n thay &#7843;nh m&#7899;i)</td></tr>
<tr><td>
<?
if($c['file_path'])
{
echo("<br>(<a href=\"../video/".$c['file_path']."\" target=\"_blank\">Click v&#224;o &#273;&#226;y &#273;&#7875; xem link video clip</a>)<br>");
}
?>
  <tr><td valign="top"><br></td></tr>
<tr> 
      <td valign="top"><div align='center'>&nbsp;<input  name="submit" type="submit" id="submit" value="Update">
<INPUT  onclick=JavaScript:Deletepost(); type=button value="Delete" name=btDeletepost>
</td>
    </tr>
<tr><td valign="top"><br></td></tr>
  </form>

  </form>
</TBODY></TABLE></center>
<?php
}
	//===================================================
	// FUNCTION Select
	//===================================================

function select() {
	$vin=0;
	$trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=20; //so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from tbl_videoclip where flag='$vin' order by ma_video desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='clipvui.php?dialoose=select&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
    }	
    }
   
 ?>
 <LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
 <div align=center>
 <table width="96%" border="0" cellspacing="0" cellpadding="2" >
  <tr>
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê tin tức | Select news'/><b><font color="#FFFFFF" size=2> DANH SÁCH VIDEO CLIP </td></tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="7%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã TT </b></div></td>
        <td width="43%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Tiêu Đề </b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Url File</b><div></td>
        <td width="27%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Người gởi</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            $j=0;
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $ma_nd=$row['ma_nguoidung'];
      	 $j++;
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $j;?></td>
        <td align="center" class=textxam12><A  href="clipvui.php?dialoose=edit&id=<?php echo $row['ma_video'];?>" onmouseover="showtip('<?php echo $row['noidung']; ?>')" 
            onmouseout="hidetip()"><?php echo $row['tieude'];?></td>
        <td width="22%" align="center" class=textxam12><?php echo $row['file_path']?></td>
        <td align="center" class=textxam12><a class='Market'><?php $sqlnd=@mysql_query("select * from tbl_nguoidung where ma_nguoidung='$ma_nd'"); $rownd=mysql_fetch_assoc($sqlnd); echo $rownd['tendaydu']; ?> </a></td>
        <td width="7%" class=textxam12><div align="center"><a href="clipvui.php?dialoose=edit&id=<?php echo $row['ma_video'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa chương trình | Change program'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('clipvui.php?dialoose=remove3&id=<?php echo $row['ma_video'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá chương trình  | Delete program'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số tin | Total news'><font color=blue>Tổng số chương trình: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table> ";
?>
    </table></td>
  </tr>
</table>
<?php 
	}

	
	

//===================================================
// FUNCTION Select by CAT
//===================================================

function selectcat() {

$cat = intval($_GET[cat]);
$page = intval($_GET[page]);

if($page=="") $page="1";

print <<<EOF
<LINK media=screen href="images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="images/tooltip.js" type=text/javascript></SCRIPT>
<script language="javascript" type="text/javascript" src="images/imageToolTip.js"></script>
<div id="tipDiv" style="Z-INDEX:1; VISIBILITY:hidden; POSITION:absolute"></div>
<TABLE class="Menubar" cellSpacing=2 cellPadding=1 width="100%" align=center bgColor=#4B9BE0 border=0>
		<TBODY>
		<TR align=center>
		<SCRIPT language=JavaScript>
		<!--
		var LETTERS="#ABCD!EFGHIJKLMNOPQRSTUVWXYZ";

		for (var i=0; i<LETTERS.length; i++) {
		var id=LETTERS.substr(i,1);
		var xemten=id;
		if (xemten=="!") xemten="&ETH;";
		if (id=="#") id="0-9";
		if (id=="!") id="&#272;";
		document.write('<td class="NSDivCenter" align="center"> \
		&nbsp;&nbsp;<a href="clipvui.php?dialoose=selectcat&cat=$cat&request='+id+'"><b>'+xemten+'</b></a>\</td>');
								
		}
//-->
</SCRIPT>
</TR></TBODY></TABLE>  

<TABLE class=MenuTop cellSpacing=1 borderColor=#111111 bgcolor=#000000 cellPadding=1 width="100%" border=0>
                                <TBODY>
 <TR class=nenxanh5><td colspan=6 class=textxanhbold12 height=20><div align=center><font color=blue>Danh Sách Tin Tức </td></tr>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold12 width="4%">&nbsp;<B>ID</B></TD>
                                <TD class=textxanhbold12 width="35%">&nbsp;<B>Ti&#234;u &#273;&#7873;</B></TD>
                                <TD class=textxanhbold1 width="20%"><DIV align=center><B>Thể Loại</B></DIV></TD>
                                <TD class=textxanhbold1 width="25%"><DIV align=center><B>Ảnh </B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
EOF;



if($_POST['request']!=""){
$request=$submit_request;
} else { $request=$_GET['request']; }
$search_at="tieude";

$page = intval($_GET[page]);
$request=$_GET['request'];
if($page==""){ $page=1;}
if($request=="0-9"){
$sql=@mysql_query("SELECT * FROM tbl_chuongtrinh WHERE ma_theloai = '$cat' and  $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%'") or die(mysql_error());
} else {
$sql=@mysql_query("select * from tbl_chuongtrinh where ma_theloai = '$cat' and  $search_at like '$request%'") or die(mysql_error());
}
$total=@mysql_num_rows($sql);
$limit=20;
$max_page=ceil($total/$limit);
$start=($page-1)*$limit;


if($request=="0-9"){
$sql=@mysql_query("SELECT *  FROM tbl_chuongtrinh WHERE ma_theloai = '$cat' and $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%' order by ma_chuongtrinh desc limit $start,$limit") or die(mysql_error());
} else {
$sql=@mysql_query("select *  from tbl_chuongtrinh where ma_theloai = '$cat' and  $search_at like '$request%' order by ma_chuongtrinh desc limit $start,$limit") or die(mysql_error());
}
$j=0;
while($row=@mysql_fetch_array($sql)){

                                $j++;
                                $id =$row["ma_chuongtrinh"]; 
                                $title = $row["tieude"]; 
                                $images = $row["hinhanh"];
                                $count = $row["news_count"];
                                $post_date  = $row["ngaydang"]; 
                                $cat = $row["ma_theloai"]; 
                                $tinhtrang=$row["tinhtrang"];
$sqlten=@mysql_query("select * from tbl_theloaichuongtrinh where ma_theloai='$cat'"); $rowten=@mysql_fetch_array($sqlten);$quvinh=$rowten['ten_theloai'];
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$j&nbsp;</P></TD>
<TD align=left>&nbsp;";

	if($tinhtrang==1){echo "<b>".$title;} else echo $title;
	echo"</TD>
<TD align=left>&nbsp;$quvinh</TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$images&nbsp;</P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"clipvui.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"javascript:baoloi('clipvui.php?dialoose=remove3&id=$id&file=$images')\">Xo&#225;</a></p</TD>
</TR>";
					}
echo("
</TBODY></TABLE>
<TABLE height=1><TBODY><TR><TD></TD></TR></TBODY></TABLE>
<TABLE align=\"center\" cellSpacing=1 cellPadding=0 border=0 >
                                <TBODY>
                                <TR align=middle>");

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
 echo "<TD class=NSDivCenter><A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=1\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD>";
 $page=$page-1;
  echo "<TD class=NSDivCenter><b><A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=NSDivCenter1 bgColor=#c0c0c0>&nbsp;<b>".$i."</b>&nbsp;</TD>";
    } else {
        echo "<TD class=NSDivCenter>&nbsp;<A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$i\" class=song><font size=1><b>$i</b></font></A>&nbsp;</TD>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=NSDivCenter><b><A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD>"; 
	 echo "<TD class=NSDivCenter><A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
echo("
</TD></TR></TBODY></TABLE>");



}
//===================================================
// FUNCTION Select by CAT1
//===================================================

function selectcat1() {

$theloai =intval($_POST['theloai']);
$page = intval($_GET[page]);
if($page=="") $page="1";
print <<<EOF


<TABLE class=MenuTop cellSpacing=1 borderColor=#111111 bgcolor=#000000 cellPadding=1 width="100%" border=0>
                                <TBODY>
 <TR class=nenxanh5><td colspan=6 class=textxanhbold12 height=20><div align=center><font color=blue>Danh Sách Tin Tức </td></tr>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold12 width="4%">&nbsp;<B>ID</B></TD>
                                <TD class=textxanhbold12 width="35%">&nbsp;<B>Ti&#234;u &#273;&#7873;</B></TD>
                                <TD class=textxanhbold1 width="20%"><DIV align=center><B>Thể Loại</B></DIV></TD>
                                <TD class=textxanhbold1 width="25%"><DIV align=center><B>Ảnh </B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
EOF;



if($_POST['request']!=""){
$request=$submit_request;
} else { $request=$_GET['request']; }
$search_at="tieude";

$page = intval($_GET[page]);
$request=$_GET['request'];
if($page==""){ $page=1;}
if($request=="0-9"){
$sql=@mysql_query("SELECT * FROM tbl_chuongtrinh WHERE ma_theloai = '$theloai' and  $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%'") or die(mysql_error());
} else {
$sql=@mysql_query("select * from tbl_chuongtrinh where ma_theloai = '$theloai' and  $search_at like '$request%'") or die(mysql_error());
}
$total=@mysql_num_rows($sql);
$limit=20;
$max_page=ceil($total/$limit);
$start=($page-1)*$limit;


if($request=="0-9"){
$sql=@mysql_query("SELECT *  FROM tbl_chuongtrinh WHERE ma_theloai = '$theloai' and $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%' order by ma_chuongtrinh desc limit $start,$limit") or die(mysql_error());
} else {
$sql=@mysql_query("select *  from tbl_chuongtrinh where ma_theloai = '$theloai' and  $search_at like '$request%' order by ma_chuongtrinh desc limit $start,$limit") or die(mysql_error());
}
$j=0;
while($row=@mysql_fetch_array($sql)){

                                $j++;
                                $id =$row["ma_chuongtrinh"]; 
                                $title = $row["tieude"]; 
                                $images = $row["hinhanh"];
                                $count = $row["news_count"];
                                $post_date  = $row["ngaydang"]; 
                                $cat = $row["ma_theloai"]; 
                                $tinhtrang=$row['tinhtrang'];
$sqlten=@mysql_query("select * from tbl_theloaichuongtrinh where ma_theloai='$cat'"); $rowten=@mysql_fetch_array($sqlten);$quvinh=$rowten['ten_theloai'];
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$j&nbsp;</P></TD>
<TD align=left>&nbsp;";
if($tinhtrang==1) echo "<b>".$title; else echo $title;
	echo	"</TD>
<TD align=left>&nbsp;$quvinh</TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$images&nbsp;</P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"clipvui.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"javascript:baoloi('clipvui.php?dialoose=remove3&id=$id&file=$images')\">Xo&#225;</a></p</TD>
</TR>";
					}
echo("
</TBODY></TABLE>
<TABLE height=1><TBODY><TR><TD></TD></TR></TBODY></TABLE>
<TABLE align=\"center\" cellSpacing=1 cellPadding=0 border=0 >
                                <TBODY>
                                <TR align=middle>");

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
 echo "<TD class=NSDivCenter><A HREF=\"clipvui.php?dialoose=selectcat&request=$request&page=1\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD>";
 $page=$page-1;
  echo "<TD class=NSDivCenter><b><A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=NSDivCenter1 bgColor=#c0c0c0>&nbsp;<b>".$i."</b>&nbsp;</TD>";
    } else {
        echo "<TD class=NSDivCenter>&nbsp;<A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$i\" class=song><font size=1><b>$i</b></font></A>&nbsp;</TD>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=NSDivCenter><b><A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD>"; 
	 echo "<TD class=NSDivCenter><A HREF=\"clipvui.php?dialoose=selectcat&cat=$cat&request=$request&page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
echo("
</TD></TR></TBODY></TABLE>");



}
	//===================================================
	// FUNCTION remove
	//===================================================

function remove() {
$nv=1+0;
//delete the database record
$q1 = "update tbl_chuongtrinh set flag='$nv' where ma_video= '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

//delete the file
@unlink("..//".$_GET[file]);

	redirect("".getenv("HTTP_REFERER")."");

}
	//===================================================
	// FUNCTION remove2
	//===================================================

function remove2() {

//delete the database record
$q1 = "delete from tbl_videoclip where ma_video = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

//delete the file
@unlink("../images/ctds/".$_GET[file]);

	redirect("clipvui.php?dialoose=validate");

}
	//===================================================
	// FUNCTION remove3
	//===================================================

function remove3() {
	$id = intval( $_GET["id"] );
	$nv=1+0;
//delete the database record
$q1 = "update  tbl_videoclip set flag='$nv' where ma_video='$id' ";
@mysql_query($q1) or die(mysql_error());


//delete the file
@unlink("../images/ctds/".$_GET[file]);

	redirect("clipvui.php?dialoose=select");

}
	//===================================================
	// FUNCTION REMOVE
	//===================================================

function deleteall() {

//delete all the database record

$a = "SELECT * FROM tbl_chuongtrinh where validate = '0' order by ma_chuongtrinh desc";
$b = @mysql_query($a) or die(mysql_error());
  while($c = @mysql_fetch_array($b))
  {
//delete the file
@unlink("../images/ctds/".$c[limages]);
}

$a2 = "delete from tbl_chuongtrinh where validate = '0'";
$b2 = @mysql_query($a2) or die(mysql_error());

	redirect("".getenv("HTTP_REFERER")."");

}

	//===================================================
	// FUNCTION remove CATEGORY
	//===================================================

function category_delete() {


 	$q5 = "DELETE FROM tbl_theloaichuongtrinh WHERE ma_theloai = \"$_GET[id]\"";
	$r5 = @mysql_query($q5) or die("loi DB khi doi ten the loai");

       $q6 = "delete from tbl_theloaichuongtrinh where ma_theloai = '$_GET[id]' ";
       @mysql_query($q6) or die(mysql_error());

	redirect("clipvui.php?dialoose=category");

}


	//===================================================
	// FUNCTION CATEGORY
	//===================================================

function category() {
$a = "SELECT * FROM tbl_theloaichuongtrinh order by ma_theloai";
$b = @mysql_query($a) or die("Loi khi query trong news_category");
?>
<center>

<table border="0" cellpadding="0" cellspacing="0" width=350 align="center">
<tr>
	<td>
<?
$count_query = mysql_query($a);
echo "<br><br><center>Hi&#7879;n c&#243; <b>".@mysql_num_rows($count_query)."</b> th&#7875; lo&#7841;i chương trình trong c&#417; s&#7903; d&#7919; li&#7879;u.<br><br>
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
<table align="center" bgcolor=#6bAAef width="90%" border="0" cellspacing="1" cellpadding="4">
  <tr bgcolor="#4B9BE0"> 
    <td width="5%" background="../images/headerbg.gif"  ><center>
            <b><font color="#FFFFFF">ID</font></b> 
          </center></td>
    <td width="35%" background="../images/headerbg.gif"  >
            <b><font color="#FFFFFF">T&#234;n c&#225;c th&#7875; lo&#7841;i </font></b> 
          </td>
     <td width="30%" background="../images/headerbg.gif"  >
            <b><font color="#FFFFFF">Ảnh:</font></b> 
          </td>
     <td width="10%" background="../images/headerbg.gif"  ><center>
            <b><font color="#FFFFFF">Ch&#7885;n l&#7921;a</font></b> 
          </center></td>
  <td width="5%" background="../images/headerbg.gif"  ><center>
            <b><font color="#FFFFFF">Xo&#225;</font></b> 
          </center></td>
  </tr>
<?
$a = "SELECT * FROM tbl_theloaichuongtrinh order by ma_theloai ASC ";
$b = @mysql_query($a) or die("Loi trong news_category");
  while($c = @mysql_fetch_array($b))
  {
?>
<script language="javascript">
	function check_form(the_form)
	{ var the_newname    = the_form.newname.value;
	 if ((the_newname==''))
		{
			alert(" Ban Nhap ten the loai chuong trinh ! ");
			the_form.newname.focus();
			return false;
		}
}
</script>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Ban co chac chan muon xoa Danh muc nay khong?')){
		location.href='clipvui.php?dialoose=category_delete&id=<? echo $c['ma_theloai']; ?>';
	}
}
</SCRIPT>
  <tr>
  <form method='post'>
    <td bgcolor='#ffffff'><center><B>
<?=$c[ma_theloai]?>
</B></center></td>

    <td bgcolor='#ffffff'><input onkeyup=initTyper(this); type='text' name='newname' value='<?=$c['ten_theloai']?>' size='40'></a></td>
    <td bgcolor='#ffffff'><input onkeyup=initTyper(this); type='text' name='anh' value='<?=$c['hinhanh']?>' size='40'></a></td>
    <td bgcolor='#ffffff'><center>

<input type=hidden name='doitenkhong' value='co'>
<input type=hidden name='id' value='<?=$c[ma_theloai]?>'>
<input style='FONT-WEIGHT: bold; CURSOR: hand; COLOR: #000000;  name='submit' type='submit' value='&#272;&#7893;i t&#234;n'>  </form>
</td><td bgcolor='#ffffff'>

  <form name="form1" method='post'>
<input type=hidden name='xoatheloai' value='co'>
<input type=hidden name='id' value='<?=$c[ma_theloai]?>'>
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
	//===================================================
	// FUNCTION validate
	//===================================================

function validate() {
$a = "SELECT * FROM tbl_chuongtrinh where validate='0' order by ma_chuongtrinh";
$b = mysql_query($a) or die("Loi khi query trong news_category");

?>
<table border="0" cellpadding="0" cellspacing="0" width=100% align="center">
<tr>
	<td>

<?
$count_query = mysql_query($a);
echo "<br><center><B>Hi&#7879;n c&#243; <b>".mysql_num_rows($count_query)."</b> B&#7843;n Tin do th&#224;nh vi&#234;n &#273;&#243;ng g&#243;p &#273;ang c&#7847;n &#273;&#432;&#7907;c ki&#7875;m duy&#7879;t.</B></center><br><br>";
?>
	</td>
</tr>
<tr>
	<td align="center"> 
<table bgcolor="#000000" width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr bgcolor="#4B9BE0"> 
    <td background="../images/headerbg.gif" width="5%"><center>
        <b><font color="#FFFFFF">ID</font></b></center></td>
    <td background="../images/headerbg.gif" width="55%"><center>
        <b><font color="#FFFFFF">Ti&#234;u &#273;&#7873;</font></b></center></td>
  <td background="../images/headerbg.gif"width="25%"><center>
        <b><font color="#FFFFFF">Ng&#432;&#7901;i g&#7917;i</font></b></center></td>
    <td background="../images/headerbg.gif"><center>
       <b><font color="#FFFFFF">L&#7921;a ch&#7885;n</font></b></center></td>
  </tr>
<?
$a = "SELECT * FROM tbl_chitiettin where validate = '0' order by ma_tin desc LIMIT 100";
$b = mysql_query($a) or die(mysql_error());
  while($c = mysql_fetch_array($b))
  {
echo "
  <tr>
    <td bgcolor='#FFFFff'>&nbsp;&nbsp;$c[ma_theloai]</td>
    <td bgcolor='#FFFFff'>&nbsp;&nbsp;$c[tieude]</td>
    <td bgcolor='#FFFFff'>&nbsp;&nbsp;<a href='#' title='$c[email]'>$c[sender]</a></td>
    <td bgcolor='#FFFFff'><center>[ <a href='clipvui.php?dialoose=edit2&id=$c[id]'>Xem</a> ] [ <a href=\"javascript:baoloi('new.php?dialoose=remove2&id=$c[id]&file=$c[images]')\">Xo&#225;</a> ]</center></td>
  </tr>";
  }
  ?>
</table>
<table bgcolor="#000000" width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor='#FFFFCC'><center>[ <a href='clipvui.php?dialoose=deleteall'>Xo&#225; t&#7845;t c&#7843; Danh s&#225;ch m&#7899;i n&#224;y</a> ]</center></td>
  </tr>
</table>

<br>
<?
}
?>