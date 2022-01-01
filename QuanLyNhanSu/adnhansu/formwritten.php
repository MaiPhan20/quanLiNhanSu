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
  if(isset($submit) && $submit == 'Add News') { 
 
    @mysql_query("UPDATE  qlns_administrator SET ctn_counterdb=ctn_counterdb+1 WHERE ctn_id='$member_id'");
	$news_tieude = $_POST['news_tieude']; 
	$tomtat =$_POST['tomtat'];
	$theloai = $_POST['theloai']; 
	$tenfile = $_POST['tenfile']; 
    $ngaygt= date("d/m/20y");
    
    $qv =@mysql_query("INSERT INTO qlns_formwritten(catfor_id,for_heading,for_summarize,for_link,for_day,ctn_id) VALUES('$theloai','$news_tieude','$tomtat','$tenfile','$ngaygt','$member_id')");
  
   echo '<br><br><br><br><br><br><div align="center">
<meta http-equiv="REFRESH" content="2; url=formwritten.php">
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
      <br>(<a href="formwritten.php">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br> '; 
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

	$id = intval( $_GET["id"] );
	$news_tieude = $_POST['news_tieude']; 
	$tomtat =$_POST['tomtat'];
    $theloai = $_POST['theloai']; 
	$tenfile = $_POST['tenfile']; 
    $ngaygt= date("d/m/20y");
	$q3 = "UPDATE qlns_formwritten SET
	catfor_id ='$theloai',
	for_heading ='$news_tieude',
	for_summarize ='$tomtat',for_link='$tenfile',for_day='$ngaygt' WHERE for_id ='$id'
	";
	$r3 = @mysql_query($q3) or die(mysql_error());
	echo "
	<div align=\"center\">
<meta http-equiv=\"REFRESH\" content=\"3; url=formwritten.php?dialoose=selectcat&cat=$theloai\"><br><br><br><br><br><br><br><br><br>
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
      <br>(<a href=\"formwritten.php?dialoose=selectcat&cat=$theloai\">Click v&#224;o &#273;&#226;y n&#7871;u k&#244; mu&#7889;n &#273;&#7907;i l&#226;u</a>)</p>
</fieldset></td>
  </tr>
</table></div><br><br>
</td></tr></table><br>";

	exit;
  }

	
  	//-------------------------------------------------
  	//  CATEGORY
  	//-------------------------------------------------
  	$doitenkhong = $_POST["doitenkhong"];
  	$newname = $_POST["newname"];
  if($doitenkhong == 'co')
  {
 	$q3 = "update qlns_catelogyfor set catfor_name = \"$_POST[newname]\" where catfor_id = \"$_POST[id]\"";
 	$q2 = "update qlns_catelogyfor set catfor_id = \"$_POST[newid]\" where catfor_id= \"$_POST[id]\"";


	$r3 = @mysql_query($q3) or die("Lỗi khi đổi tên thể loại");
}

  	$xoatheloai = $_POST["xoatheloai"];
  if($xoatheloai == 'co')
  {
 	$q5 = "DELETE FROM qlns_catelogyfor WHERE catfor_id= \"$_POST[id]\"";
	$r5 = @mysql_query($q5) or die("Lỗi khi đổi tên thể loại");
}

    $newname = $_POST["newname"];
  	$themcatmoi = $_POST["themcatmoi"]; 
if ($themcatmoi == 'co')
{
	if (isset($newname)){
 	$q4 = "INSERT INTO qlns_catelogyfor (catfor_name) VALUES ('$newname')";
	$r4 = @mysql_query($q4) or die("Lỗi khi ghi thêm thể loại");
                   }
    else{
      echo"<script> alert ('Bạn hãy nhập tên thể loại mới!')</script>"; 
    }
             }
if ($_REQUEST[delete_news_category]) {
// delete news_cat

// delete a record

    $sql = "DELETE FROM $_REQUEST[table] WHERE catfor_id=$_REQUEST[news_category]";	

    $result = @mysql_query($sql);

if (!$result)

{
      echo "Cannot Delete story - something screw up!";
}
else

{	
	echo "<div align=\"center\"><br><br><font color=\"red\">Deleted!</font><br><br>";     

} }
##################################################################
?>




<script language='javascript' type='text/javascript'>
    <!--
    
    function link_to_post(pid)
    {
    	temp = prompt( "", "'formwritten.php?" + pid );
    	return false;
    }
    
    function baoloi(theURL) {
       if (confirm('Bạn có chắc là muốn xóa tin này không???')) {
          window.location.href=theURL;
       }
       else {
          alert ('Ok. Chưa thực hiện tác vụ nào.');
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
			alert("Bạn nhập thông tin cho biểu mẫu - văn bản!");
			the_form.news_tieude.focus();
			return false;
		}
}
</script>

<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
	
	   <script type="text/javascript">
		    WYSIWYG.attach('tomtat'); 
			</script>
<div align='center'>
<form enctype="multipart/form-data" method="POST" NAME="mainform" onsubmit="return check_form(this)"> 
<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
<tr> 
      <td colspan="2"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>&#272;&#259;ng Biểu mẫu - nội quy  m&#7899;i</b></font></div></td>
    </tr>
    <tr> 
      <td><font size="2"><b>Ti&#234;u &#273;&#7873;:</b></font><br>
        <input  name="news_tieude" type="text" id="news_tieude" size="105" ></td>
    </tr>
<tr> 
<td ><font size="2"><b>Th&#7875; lo&#7841;i:</b></font><br>
<select name="theloai" id="theloai">
<? $a="select * from qlns_catelogyfor";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['catfor_id']?>'><?=$row['catfor_name']?></option>
<? }?> 
</select>
</td></tr>

<tr> 
      <td ><font size="2"><b>N&#7897;i dung :</b></font><br>
    <textarea  name="tomtat" style="width:70%;height:250px;" id="tomtat">
     </textarea></td>
</tr>
        <tr> 
      <td><font size="2"><b>Tên File</b></font><br>
        <input  name="tenfile" type="text" id="tenfile" size="105" ></td>
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
$a = "select * from qlns_formwritten where for_id='$id'";
$b = @mysql_query($a) or die(mysql_error());
$c = @mysql_fetch_array($b);
?>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Bạn có chắc chắn muốn xóa bài viết này không?')){
		location.href='formwritten.php?dialoose=remove3&id=<? echo $c['for_id']; ?>';
	}
}
</SCRIPT>
<script type="text/javascript" src=him.js></script>
	<script type="text/javascript" src="scripts/wysiwyg.js"></script>
		<script type="text/javascript" src="scripts/wysiwyg-settings.js"></script>
		<script type="text/javascript">
		    WYSIWYG.attach('tomtat'); 
			</script>
	 
<center>
<TABLE  cellSpacing=1 cellPadding=0 width="80%" border=0>
<tr> 
      <td colspan="2"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>S&#7917;a th&#244;ng tin bài viết</b></font></div></td>
    </tr>
<form method="post" NAME="mainform" enctype="multipart/form-data">
    <tr> 
      <td><font size="2"><b>Ti&#234;u &#273;&#7873;:</b></font><br>
<input onkeyup=initTyper(this); name="news_tieude" type="text" value="<? echo $c['for_heading']; ?>"  size="105"></td>
    </tr>
  
<tr> 
            <td valign="top"><B>Th&#7875; lo&#7841;i :</B><br><SELECT NAME="theloai" size=0>
		<?
	$sel_cat=@mysql_query("select * from qlns_catelogyfor order by catfor_id");
	while($res=@mysql_fetch_array($sel_cat))
	{
?>
		<option value="<?php echo $res['catfor_id']; ?>" <?php if($c['catfor_id']==$res['catfor_id']){echo "selected";}?>><?echo $res['catfor_name'];?>
<?
	}
?>
				</select> </td>
    </tr>

    <tr> 
            <td valign="top"><B>N&#7897;i dung :</B><br>
<textarea  name="tomtat" style="width:70%;height:250px;" id="tomtat"><?=$c['for_summarize']; ?>
     </textarea>
</td>
    </tr>
  
    
      <td><font size="2"><b>Tên file</b></font><br>
        <input  name="tenfile" type="text" id="tenfile" size="105" value="<? echo $c['for_link']; ?>" ></td>
    </tr>
    

	
	
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

	$trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=20; //so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from  qlns_formwritten order by for_id desc"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='formwritten.php?dialoose=select&&trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
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
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê tin tức | Select news'/><b><font color="#FFFFFF" size=2> DANH SÁCH TIN TỨC </td></tr><tr><td colspan=1 bgcolor="#4B9BE0" width=70%><div align='right'><form action="formwritten.php?dialoose=selectcat1" method='POST' name=hi><select name="theloai" id="theloai">
<?php 
$a="select * from qlns_catelogyfor";
$result = @mysql_query($a) or die ("Lỗi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['catfor_id']?>'><font size=1><?=$row['catfor_name']?></option>
<? }?>     <input  name="submit" type="submit" id="submit" value="Tìm"></form></td></select>
<td colspan=1 bgcolor="#4B9BE0" width=30%></td></tr>
  </tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
        <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
        <td width="5%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Mã TT </b></div></td>
        <td width="35%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Tiêu Đề </b></div></td>
        <td width="10%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Thể Loại</b><div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ngày đăng</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Tên file</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            $j=0;
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['news_status'];
      	  $j++;
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
        <td align="center" class=textxam12><div align=center><?php echo $j;?></td>
        <td align="center" class=textxam12><A  href="formwritten.php?dialoose=edit&id=<?php echo $row['for_id'];?>" 
           ><?php echo "<b>&nbsp;".$row['for_heading']."</b>";  ?></td>
        <td width="22%" align="center" class=textxam12><?php $theloai=$row['catfor_id']; $sqltl=@mysql_query("SELECT * FROM qlns_catelogyfor WHERE catfor_id='$theloai'"); $row5=@mysql_fetch_assoc($sqltl); echo "&nbsp;&nbsp;". $row5['catfor_name'];?></td>
        <td align="center" class=textxam12><a class='Market' ><?php echo $row['for_day'];?> </a></td>
         <td align="center" class=textxam12><a class='Market' href='#' ><?php echo $row['for_link'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="formwritten.php?dialoose=edit&id=<?php echo $row['for_id'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('formwritten.php?dialoose=remove3&id=<?php echo $row['for_id'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/icon_articlelist.gif' height='20' width='17' border='0' alt='Tổng số trang | Total page'> <font color='blue' size='2'>Tổng số trang:".$number_page."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số tin | Total news'><font color=blue>Tổng số tin: ".$totalrow;     
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
		&nbsp;&nbsp;<a href="formwritten.php?dialoose=selectcat&cat=$cat&request='+id+'"><b>'+xemten+'</b></a>\</td>');
								
		}
//-->
</SCRIPT>
</TR></TBODY></TABLE>  

<TABLE class=MenuTop cellSpacing=1 borderColor=#111111 bgcolor=#000000 cellPadding=1 width="100%" border=0>
                                <TBODY>
 <TR class=nenxanh5><td colspan=6 class=textxanhbold12 height=20><div align=center><font color=blue>Danh Sách Tin Tức </td></tr>
                                <TR class=nenxanh5>
                                <TD class=textxanhbold12 width="4%">&nbsp;<B>ID</B></TD>
                                <TD class=textxanhbold12 width="30%">&nbsp;<B>Ti&#234;u &#273;&#7873;</B></TD>
                                <TD class=textxanhbold1 width="15%"><DIV align=center><B>Thể Loại</B></DIV></TD>
                                <TD class=textxanhbold1 width="20%"><DIV align=center><B>Ngày đăng</B></DIV></TD>
                                <TD class=textxanhbold1 width="15%"><DIV align=center><B>Ảnh minh họa</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
EOF;



if($_POST['request']!=""){
$request=$submit_request;
} else { $request=$_GET['request']; }
$search_at="for_heading";

$page = intval($_GET[page]);
$request=$_GET['request'];
if($page==""){ $page=1;}
if($request=="0-9"){
$sql=@mysql_query("SELECT * FROM qlns_formwritten WHERE catfor_id = '$cat' and  $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%'") or die(mysql_error());
} else {
$sql=@mysql_query("select * from qlns_formwritten where catfor_id = '$cat' and  $search_at like '$request%'") or die(mysql_error());
}
$total=@mysql_num_rows($sql);
$limit=20;
$max_page=ceil($total/$limit);
$start=($page-1)*$limit;


if($request=="0-9"){
$sql=@mysql_query("SELECT *  FROM qlns_formwritten WHERE catfor_id = '$cat' and $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%' order by for_id desc limit $start,$limit") or die(mysql_error());
} else {
$sql=@mysql_query("select *  from qlns_formwritten where catfor_id = '$cat' and  $search_at like '$request%' order by for_id desc limit $start,$limit") or die(mysql_error());
}
$j=0;
while($row=@mysql_fetch_array($sql)){

                                $j++;
                                $id =$row["for_id"]; 
                                $title = $row["for_heading"];
                                $images = $row["for_link"];
                                $count = $row["news_count"];
                                $post_date  = $row["for_day"]; 
                                $cat = $row["catfor_id"]; 
                                $tinhtrang=$row["news_status"];
$sqlten=@mysql_query("select * from qlns_catelogyfor where catfor_id='$cat'"); $rowten=@mysql_fetch_array($sqlten);$quvinh=$rowten['catfor_name'];
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$j&nbsp;</P></TD>
<TD align=left>&nbsp;";

echo "<b>".$title;
	echo"</TD>
<TD align=left>&nbsp;$quvinh</TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$post_date&nbsp;</P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$images&nbsp;</P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"formwritten.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"javascript:baoloi('formwritten.php?dialoose=remove3&id=$id&file=$images')\">Xo&#225;</a></p</TD>
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
 echo "<TD class=NSDivCenter><A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=1\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD>";
 $page=$page-1;
  echo "<TD class=NSDivCenter><b><A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=NSDivCenter1 bgColor=#c0c0c0>&nbsp;<b>".$i."</b>&nbsp;</TD>";
    } else {
        echo "<TD class=NSDivCenter>&nbsp;<A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$i\" class=song><font size=1><b>$i</b></font></A>&nbsp;</TD>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=NSDivCenter><b><A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD>"; 
	 echo "<TD class=NSDivCenter><A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

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
                                <TD class=textxanhbold12 width="30%">&nbsp;<B>Ti&#234;u &#273;&#7873;</B></TD>
                                <TD class=textxanhbold1 width="15%"><DIV align=center><B>Thể Loại</B></DIV></TD>
                                <TD class=textxanhbold1 width="20%"><DIV align=center><B>Ảnh </B></DIV></TD>
                                <TD class=textxanhbold1 width="15%"><DIV align=center><B>Ngày đăng</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>S&#7917;a</B></DIV></TD>
                                <TD class=textxanhbold1 width="3%"><DIV align=center><B>Xo&#225;</B></DIV></TD>
</TR>
EOF;



if($_POST['request']!=""){
$request=$submit_request;
} else { $request=$_GET['request']; }
$search_at="for_heading";

$page = intval($_GET[page]);
$request=$_GET['request'];
if($page==""){ $page=1;}
if($request=="0-9"){
$sql=@mysql_query("SELECT * FROM qlns_formwritten WHERE catfor_id = '$theloai' and  $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%'") or die(mysql_error());
} else {
$sql=@mysql_query("select * from qlns_formwritten where catfor_id = '$theloai' and  $search_at like '$request%'") or die(mysql_error());
}
$total=@mysql_num_rows($sql);
$limit=20;
$max_page=ceil($total/$limit);
$start=($page-1)*$limit;


if($request=="0-9"){
$sql=@mysql_query("SELECT * FROM qlns_formwritten WHERE catfor_id = '$theloai' and $search_at like '0%' OR $search_at like '1%' OR $search_at like '2%' OR $search_at like '3%' OR $search_at like '4%' OR $search_at like '5%' OR $search_at like '6%' OR $search_at like '7%' OR $search_at like '8%' OR $search_at like '9%' order by for_id desc limit $start,$limit") or die(mysql_error());
} else {
$sql=@mysql_query("select *  from qlns_formwritten where catfor_id = '$theloai' and  $search_at like '$request%' order by for_id desc limit $start,$limit") or die(mysql_error());
}
$j=0;
while($row=@mysql_fetch_array($sql)){

                                $j++;
                                $id =$row["for_id"]; 
                                $title = $row["for_heading"]; 
                                $images = $row["for_link"];
                                $count = $row["news_count"];
                                $post_date  = $row["for_day"]; 
                                $cat = $row["catfor_id"]; 
                               
$sqlten=@mysql_query("select * from qlns_catelogyfor where catfor_id='$cat'"); $rowten=@mysql_fetch_array($sqlten);$quvinh=$rowten['catfor_name'];
echo"
<TR onmouseover=\"this.bgColor='#CCCCCC'\" onmouseout=\"this.bgColor='#FFFFFF'\" bgColor=#ffffff>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$j&nbsp;</P></TD>
<TD align=left>&nbsp;";
echo "<b>".$title;
	echo	"</TD>
<TD align=left>&nbsp;$quvinh</TD>
		<TD align=middle alignt=middle><P class=textdo12>&nbsp;$images &nbsp;</P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;$post_date&nbsp;</P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"formwritten.php?dialoose=edit&id=$id\">S&#7917;a</a></P></TD>
<TD align=middle alignt=middle><P class=textdo12>&nbsp;<a href=\"javascript:baoloi('formwritten.php?dialoose=remove3&id=$id&file=$images')\">Xo&#225;</a></p</TD>
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
 echo "<TD class=NSDivCenter><A HREF=\"formwritten.php?dialoose=selectcat&request=$request&page=1\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD>";
 $page=$page-1;
  echo "<TD class=NSDivCenter><b><A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=NSDivCenter1 bgColor=#c0c0c0>&nbsp;<b>".$i."</b>&nbsp;</TD>";
    } else {
        echo "<TD class=NSDivCenter>&nbsp;<A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$i\" class=song><font size=1><b>$i</b></font></A>&nbsp;</TD>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=NSDivCenter><b><A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD>"; 
	 echo "<TD class=NSDivCenter><A HREF=\"formwritten.php?dialoose=selectcat&cat=$cat&request=$request&page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
echo("
</TD></TR></TBODY></TABLE>");



}
	//===================================================
	// FUNCTION remove
	//===================================================

function remove() {

//delete the database record
$q1 = "delete from qlns_formwritten where for_id = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

//delete the file
@unlink("../images/news/".$_GET[file]);

	redirect("".getenv("HTTP_REFERER")."");

}
	//===================================================
	// FUNCTION remove2
	//===================================================

function remove2() {

//delete the database record
$q1 = "delete from qlns_formwritten where for_id = '$_GET[id]' ";
@mysql_query($q1) or die(mysql_error());

//delete the file
@unlink("../images/news/".$_GET[file]);

	redirect("formwritten.php?dialoose=validate");

}
	//===================================================
	// FUNCTION remove3
	//===================================================

function remove3() {
	$id = intval( $_GET["id"] );
//delete the database record
$q1 = "delete from qlns_formwritten where for_id='$id' ";
@mysql_query($q1) or die(mysql_error());
@unlink("../images/news/".$_GET[file]);

	redirect("formwritten.php?dialoose=select");

}

	//===================================================
	// FUNCTION remove CATEGORY
	//===================================================

function category_delete() {
    $q5 = "DELETE FROM qlns_catelogyfor WHERE catfor_id = \"$_GET[id]\"";
	$r5 = @mysql_query($q5) or die("Lỗi DB khi truy vấn thể loại");
    redirect("formwritten.php?dialoose=category");

}


	//===================================================
	// FUNCTION CATEGORY
	//===================================================

function category() {
$a = "SELECT * FROM qlns_catelogyfor order by catfor_id";
$b = @mysql_query($a) or die("Lỗi DB khi truy vấn thể loại");
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
$a = "SELECT * FROM qlns_catelogyfor order by catfor_id ASC ";
$b = @mysql_query($a) or die("Lỗi trong news_category");
  while($c = @mysql_fetch_array($b))
  {
?>
<script language="javascript">
	function check_form(the_form)
	{ var the_newname    = the_form.newname.value;
	 if ((the_newname==''))
		{
			alert(" Bạn nhập tên thể loại ! ");
			the_form.newname.focus();
			return false;
		}
}
</script>
<SCRIPT language=JavaScript>
function Deletepost(){
	if(confirm('Bạn có chắn chắn muốn xóa danh mục này?')){
		location.href='formwritten.php?dialoose=category_delete&id=<? echo $c['catfor_id']; ?>';
	}
}
</SCRIPT>
  <tr>
  <form method='post'>
    <td bgcolor='#ffffff'><center><B>
<?=$c[catfor_id]?>
</B></center></td>

    <td bgcolor='#ffffff'><input onkeyup=initTyper(this); type='text' name='newname' value='<?=$c[catfor_name]?>' size='40'></a></td>
    <td bgcolor='#ffffff'><center>

<input type=hidden name='doitenkhong' value='co'>
<input type=hidden name='id' value='<?=$c[catfor_id]?>'>
<input style='FONT-WEIGHT: bold; CURSOR: hand; COLOR: #000000;  name='submit' type='submit' value='&#272;&#7893;i t&#234;n'>  </form>
</td><td bgcolor='#ffffff'>

  <form name="form1" method='post'>
<input type=hidden name='xoatheloai' value='co'>
<input type=hidden name='id' value='<?=$c[catfor_id]?>'>
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
