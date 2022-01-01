<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
A {
	COLOR: #FFFFFF; TEXT-DECORATION: none
}
A:hover {
	COLOR: #c3e572; TEXT-DECORATION: none
}
.tranquangvinhit img{border-color:#41B205}
.fs2fdses {font-size:13px; color:#b1b1b1; }
.fs2 {font-size:15px; color:#dcff92; }
.fs521 {font-size:14px; color:#989898; }
A.details {
	COLOR: #c3e572; TEXT-DECORATION: none
}
.inputboxdesignwebvn {
font-size:11px;
background:#447aa9;
color:#dcff92;
border:1px solid #99CCFF;

}
	
.designwfdsaf {font-size:16px; color:#c1e652; }
.designwfdsafsdff {font-size:15px; color:#d0d5cd; }
.designwfdfasfsafsdff {font-size:14px; color:#989898; }
.designw {font-size:12px; color:#c1e652; }
.designwebdnit {font-size:12px; color:#c3e572; }
.designwebdnkha {font-size:12px; color:#808080; }
.tinhyeuhue {font-size:13px; color:#365169; }
.tinhyeuhueit {font-size:13px; color:#3f3f3f; }
h3 {
	margin: 0;
	padding: 0 0 .3em;
}
p {
	margin: 0;
	padding: 0 0 .5em;
}
.pane-list {
	margin: 0;
	padding: 0;
	list-style: none;
}
.pane-list li {
	background: #485560;
	padding: 10px 20px 10px;
	border-top: solid 1px #73808b;
	cursor: pointer;
}
.pane-list li:hover {
	background: #6e7d8a;
}
</style>
<LINK media=screen href="../images/tooltip.css" type=text/css rel=stylesheet>
<SCRIPT language=JavaScript src="../images/tooltip.js" type=text/javascript></SCRIPT>
<script type="text/javascript" src="../images/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
						   
	$(".pane-list li").click(function(){
    	window.location=$(this).find("a").attr("href");return false;
	});

}); //close doc ready
</script>
<script type="text/javascript">
          jaSLWI.expandH = 110;
  </script>
<html>
<body background='../images/nhansu_07.png'>
<div align='center'>
<table border='0' width='98%' name='fadfdsrw' cellSpacing='0' cellPadding='0'>
<tr><td height='25'></td></tr>	
<tr><td valign='center'><div align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='designwfdsaf'><b> Danh sách nhân viên chính thức</b></td></tr>
<tr><td height='10'><img src='images/line2copy.png' border='0' width='450' height='1'></td></tr>
<tr><td height='10'></td></tr>
 <?php
#################################################
#  ----------------------------------------		#
#  Contact Designwebvn@gmail.com	            #
#  Please don't edit if you use this code       #
#  ----------------------------------------	    #
#################################################
    include ("../sources/config.php");
    $trang=isset($_GET['page'])?intval($_GET['page']):1;  
    $rowperpage=11;
	$page_start=($trang-1)*$rowperpage;
	$page_end=$trang*$rowperpage;
	$sql=@mysql_query("select * from qlns_hosonhanvien where qlns_tinhtrangnv='1' order by qlns_hsnv desc");
	$totalrow=@mysql_num_rows($sql);
    $number_page=ceil($totalrow/$rowperpage);
   if($number_page>=1){   
     	$listpage="<div align='right'><img src='../images/nghanhnghe.png' height='15' width='15' border='0' alt='S&#7889; trang | Total page'> <span class='designwfdsafsdff'><b>Trang:</b>"; 
    	      for($i=1;$i<=$number_page;$i++){   
   	           if($i==$trang){        
    	           $listpage.="<u><font color='#c1f9a6' size='2'>$i</u>";
    	      }
    	      else 
    	    $listpage.="<a href='danhsachnhanvien.php?page=$i' size='2'> $i</a>" ;
    	 
    }	
    }
    if($totalrow){
    echo "<tr><td><div align='center'>
    <table border='1' width='98%' name='fadfdsfdsfrw' cellSpacing='0' cellPadding='0'>
<tr><td width='14%' ><span class='designwfdsafsdff'> Mã nhân viên</td><td width='23%'><span class='designwfdsafsdff'> Tên nhân viên </td><td width='30%'><span class='designwfdsafsdff'> Đơn vị</td><td width='27%'> <span class='designwfdsafsdff'>Bộ Phận </td></tr>
    <tr><td colspan='4'><ul class='pane-list'>
    "; 
    $i=0;
    while($rowhd=@mysql_fetch_array($sql)){
    	if ($i>=$page_start){ 
        $id=$rowhd['qlns_hsnv'];
        $qlns_mact=$rowhd['qlns_mact'];
        $sqlcongty=@mysql_query("select * from qlns_congty  where qlns_mact='$qlns_mact'");
        $rowcongty=@mysql_fetch_assoc($sqlcongty);
        $tendonvi=$rowcongty['qlns_tencongty'];
        $qlns_mabp=$rowhd['qlns_mabp'];
        $sqlbophan=@mysql_query("select *  from qlns_bophan where qlns_mabp='$qlns_mabp'");
        $rowbophan=@mysql_fetch_assoc($sqlbophan);
        $tenbophan=$rowbophan['qlns_tenbophan'];
        $qlns_macv=$rowhd['qlns_macv'];
        $sqlchucvu=@mysql_query("select *  from qlns_chucvu where qlns_macv='$qlns_macv'");
        $rowchucvu=@mysql_fetch_assoc($sqlchucvu);
        $tenchucvu=$rowchucvu['qlns_tenchucvu'];
        $qlns_mahsnv=$rowhd['qlns_mahsnv'];
        $qlns_honv=$rowhd['qlns_honv'];
        $qlns_tennv=$rowhd['qlns_tennv'];
        $qlns_anhnvien=$rowhd['qlns_anhnvien'];
        $qlns_tinhtrangnv=$rowhd['qlns_tinhtrangnv'];
        $qlns_macmnd=$rowhd['qlns_macmnd'];
        $qlns_email=$rowhd['qlns_email'];
        $qlns_ngaysinh=$rowhd['qlns_ngaysinh'];
        $qlns_gioitinh=$rowhd['qlns_gioitinh'];
       ?> 
   <li>    
<div align='left'><table border='0' width='100%' name='fadfdsrw' cellSpacing='0' cellPadding='0'>
<tr> 
<td width='12%'><div align='left'><?php echo "<span class='designwfdfasfsafsdff'><a href='chitietnv.php?id=$qlns_mahsnv' class='fs521' onmouseover=\"showtip('<table border=0 width=100% cellSpacing=0 cellPadding=0 name=fdggfsf><tr><td><img src=../images/news/$qlns_anhnvien border=0 width=161 height=209></td><td width=2%></td><td width=68% valign=top><table border=0 width=100% name=fdsre> <tr><td height=27><span class=tinhyeuhue>Họ và Tên : </span> <span class=tinhyeuhueit>$qlns_honv $qlns_tennv </span></td></tr><tr> <td height=27><span class=tinhyeuhue> Chức vụ   : </span><span class=tinhyeuhueit> $tenchucvu </span></td></tr><tr><td height=27><span class=tinhyeuhue> Giới tính : </span>";
	   if($qlns_gioitinh==1){echo "<span class=tinhyeuhueit>Nam</span>" ; }else {echo "<span class=tinhyeuhueit>Nữ</span>";}
	   echo "<tr><td height=27> <span class=tinhyeuhue>Ngày Sinh : </span><span class=tinhyeuhueit> $qlns_ngaysinh </span></td> </tr> <tr><td height=27><span class=tinhyeuhue> Email : </span> <span class=tinhyeuhueit> $qlns_email </span></td></tr><tr><td height=27><span class=tinhyeuhue>Số CMND : </span><span class=tinhyeuhueit> $qlns_macmnd </span></td></tr> <tr><td height=27><span class=tinhyeuhue>Tình trạng : </span>"; 
		if($qlns_tinhtrangnv==1){ echo "<span class=tinhyeuhueit>Nhân viên chính thức</span>"; }else {echo "<span class=tinhyeuhueit>Nhân viên thử việc</span>"; };
		   echo"</td></tr></table> </td></tr></table>')\" 
onmouseout=\"hidetip()\">".$qlns_mahsnv."</a>";?></td><td width='25%'><div align='left'><?php echo "<span class='designwfdfasfsafsdff'><a href='chitietnv.php?id=$qlns_mahsnv' class='fs521' onmouseover=\"showtip('<table border=0 width=100% cellSpacing=0 cellPadding=0 name=fdggfsf><tr><td><img src=../images/news/$qlns_anhnvien border=0 width=161 height=209></td><td width=2%></td><td width=68% valign=top><table border=0 width=100% name=fdsre> <tr><td height=27><span class=tinhyeuhue>Họ và Tên : </span> <span class=tinhyeuhueit>$qlns_honv $qlns_tennv </span></td></tr><tr> <td height=27><span class=tinhyeuhue> Chức vụ   : </span><span class=tinhyeuhueit> $tenchucvu </span></td></tr><tr><td height=27><span class=tinhyeuhue> Giới tính : </span>";
	   if($qlns_gioitinh==1){echo "<span class=tinhyeuhueit>Nam</span>" ; }else {echo "<span class=tinhyeuhueit>Nữ</span>";}
	   echo "<tr><td height=27> <span class=tinhyeuhue>Ngày Sinh : </span><span class=tinhyeuhueit> $qlns_ngaysinh </span></td> </tr> <tr><td height=27><span class=tinhyeuhue> Email : </span> <span class=tinhyeuhueit> $qlns_email </span></td></tr><tr><td height=27><span class=tinhyeuhue>Số CMND : </span><span class=tinhyeuhueit> $qlns_macmnd </span></td></tr> <tr><td height=27><span class=tinhyeuhue>Tình trạng : </span>"; 
		if($qlns_tinhtrangnv==1){ echo "<span class=tinhyeuhueit>Nhân viên chính thức</span>"; }else {echo "<span class=tinhyeuhueit>Nhân viên thử việc</span>"; };
		   echo"</td></tr></table> </td></tr></table>')\" 
onmouseout=\"hidetip()\">".$qlns_honv." ".$qlns_tennv."</a></span>";?></td><td width='35%'><div align='left'><?php echo "<span class='designwfdfasfsafsdff'><a href='chitietnv.php?id=$qlns_mahsnv' class='fs521'>".$tendonvi; ?></td><td width='25%'><div align='left'> <?php echo "<span class='designwfdfasfsafsdff'><a href='chitietnv.php?id=$qlns_mahsnv' class='fs521'>".$tenbophan; ?></td>
</tr> </table>
  </li>
<?php        
    	}
    	$i++;
      if($i>=$page_end){
       break;
      }
    }
    echo "</ul> </td></tr></table>
    
    <tr><td><div align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class='designwfdsafsdff'> Tổng số nhân viên : $totalrow </span>".$listpage."</td></tr>";
    }
    else {
    echo "<tr><td valign='top'><div align='center'> <span class='designwfdsafsdff'> Dữ Liệu đang cập nhật</span> </p></td></tr>"; }
    


		 ?> 
		 
</table>

</body>
</html>
