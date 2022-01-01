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
}

	//===================================================
	// FUNCTION INDEX
	//===================================================

function index() {
?>

<center>
<form action="lylichnvctn.php?act=do"  method="post" NAME="mainform" onsubmit="return check_form(this)">

	<TABLE  cellSpacing=1 cellPadding=0 width="95%" border=0>
	<tr> 
      	<td colspan="1"> 
        <div align="center"><font face=Tahoma size="2" color="#0000FF"><b>Thống kê theo tình trạng hôn nhân  </b></font></div></td>
    	</tr>
	</TBODY></TABLE>

	<TABLE  cellSpacing=2 cellPadding=2 width="97%" border=0>
<tr><td valign='top' ><div id="lichps">
 <TABLE  cellSpacing=2 cellPadding=2 width="95%" border=0 name='fdsafge'>

<tr><td width='49%' valign='top'>
	<TABLE  cellSpacing=2 cellPadding=2 width="100%" border=0 name='dfafdsafe'>		
	<tr><td><div align='center'> Đã Lập gia đình</td></tr>	<tr><td>
 <?php $trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtranghn='0' and qlns_tinhtrangnv!= 2"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='displaythongkegioitinh.php?trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
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
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê danh sách nhân viên | Select list'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN  </td></tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
 
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
      <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; else echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
       <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><div align='left'><img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số đã lập gia đình: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";
?>
			</td></tr>		
			</table>	
			</td><td width='1%'></td><td width='49%' valign='top'>
	<TABLE  cellSpacing=2 cellPadding=2 width="100%" border=0 name='dfafddfdsffsafe'>		
		<tr><td><div align='center'> Chưa lập gia đình</td></tr>
	    <tr><td><?php $trang=isset($_GET['trang'])?intval($_GET['trang']):1; //kiem tra $page co ton tai khong neu co lay gia tri so nguyen $trang nguoc lai thi co gia tri 1
	$rowperpage=200;//so dong tren 1 trang la 20
	$page_start=($trang-1)*$rowperpage; //tinh $page_start dua vao $trang * $rowperpage vidu: $trang=1 ->$page_start=(1-1)*20=0
	$page_end=$trang*$rowperpage;//tinh $page_end dua vao $trang * $rowperpage vidu: $trang=2 ->$page_start=(2-1)*20=20
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtranghn='1' and qlns_tinhtrangnv!= 2"); //cau lenh truy van
	$totalrow=@mysql_num_rows($sql);// tinh tong so dong trong co so du lieu
    $number_page=ceil($totalrow/$rowperpage);// tinh tong so trang bang cach lay tong so dong chia cho so dong tren mot trang lay tron bang ham ceil.
   if($number_page>=1){   //neu so trang lon hon 1 thi
     	$listpage="<div align='right'><img src='images/annoicon.gif' height='20' width='20' border='0' alt='Số trang | Total page'> <font color='blue' size='2'> Trang:"; //$listpage la chuoi de in ra tu Trang
    	      for($i=1;$i<=$number_page;$i++){   //vong lap for de bien i chay tu dau den khi be hon $number_page
   	           if($i==$trang){        //neu bien $i bang so $trang hien tai
    	           $listpage.="<b><u><font color='red' size='2'>$i<b></u>";// thi ta in dam bien i
    	      }
    	      else 
    	    $listpage.="<a href='displaythongkegioitinh.php?trang=$i' size='2'> $i</a>" ;//nguoc lai ta cho lien ket den bien $i
    	 
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
   <td colspan=2 bgcolor="#4B9BE0"><img src="images/newsmodule.gif" width="21" height="20"  alt='Liệt kê danh sách nhân viên | Select list'/><b><font color="#FFFFFF" size=2> DANH SÁCH NHÂN VIÊN  </td></tr>
  <tr>
    <td colspan="2" align="left"></td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border='1' cellpadding="0" cellspacing="2"  >
  <tr height=20>
       
        <td width="30%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Họ tên</b></div></td>
        <td width="20%" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Ảnh chi tiết</b></div></td>	
        <td width="10%" colspan="2" bgcolor="#4B9BE0"><div align="center" class="style1"><b><font color="#FFFFFF">Lựa chọn</b><div></td>
      </tr>
      <?php $i=0;
            
      while($row=@mysql_fetch_assoc($sql)){ 
      	  if ($i>=$page_start){ 
      	  $vinh=$row['qlns_tinhtrangnv'];
      	  
      	  ?>
      <tr onmouseover="this.bgColor='#CCCCCC'" onmouseout="this.bgColor='#FFFFFF'" bgColor=#ffffff>
       <td align="center" class=textxam12><A  href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>" onmouseover="showtip('<?php if($vinh==1)echo ' <b>Nhân viên chính thức'; else echo 'Nhân viên thử việc'; ?>')" 
            onmouseout="hidetip()"><?php if($vinh==1) echo "<b>&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv']."</b>"; else echo "&nbsp;".$row['qlns_honv']." ".$row['qlns_tennv'] ;?></td>
   <td align="center" class=textxam12><a class='Market' href='#' onmouseover='doTooltip(event,"../images/news/<?php echo $row['qlns_anhnvien'];?>","<div align=center> Ảnh thẻ nhân viên")' onmouseout='hideTip()'><?php echo $row['qlns_anhnvien'];?> </a></td>
          <td width="7%" class=textxam12><div align="center"><a href="hosonhanvien.php?dialoose=edit&id=<?php echo $row['qlns_hsnv'];?>"><img src='images/icon_duyetbai.gif' width='16' height='16' border='0' alt='Chỉnh sửa tin tức | Change news'> </a></div></td>
        <td width="6%" class=textxam12><div align="center"><a href="javascript:baoloi('hosonhanvien.php?dialoose=remove3&id=<?php echo $row['qlns_hsnv'];?>')"><img src='images/drop.jpg' width='16' height='16' border='0' alt='Xoá tin tức  | Delete news'> </a></div></td>
      </tr>
      <?php }
      $i++;
      if($i>=$page_end){
       break;
      }
      } 
echo "<table cellspacing='0' cellpadding='0' border='0'width='100%'> ";
echo "<tr> ";
echo "<Td><img src='images/pm.gif' height='17' width='12' border='0' alt='Tổng số nhân viên | Total news'><font color=blue>Tổng số Chưa lập gia đình: ".$totalrow;     
echo  "<td>".$listpage."</td>";
echo "</tr> ";
echo "</table></table></td>
  </tr>
</table> ";
?></td></tr>
		</table>		
			</td></tr>			
</table>	
	    <div></td></tr>
   	</form>
	</TBODY></TABLE></center>




<?
	  

}

?>