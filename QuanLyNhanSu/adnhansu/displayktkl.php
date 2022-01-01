

	<style type="text/css">
<!--
.designwebdnitq {font-size:13px; color:#FFFFFF; }
.designwebdnkhafsactf {font-size:11px; color:#d0d0d0; }
-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link media="screen" href="tooltip.css" type="text/css" rel="stylesheet">
<script language="JavaScript" src="tooltip.js" type="text/javascript"></script><body>
<?php
#################################################
#  ----------------------------------------		#
#  Q2VK (Quan - Quynh - Vinh - Khanh)           #
#  Mobile  0905094336	                        #
#  Contact Designwebvn@gmail.com	            #
#  Please don't edit if you use this code       #
#  ----------------------------------------	    #
################################################# 
include ("../sources/config.php");
$get=$_GET['lich'];
if(isset($get)){
$query=@mysql_query("SELECT * FROM qlns_hosonhanvien WHERE qlns_mahsnv='$get'");
$designwebvn=@mysql_fetch_assoc($query);
$ho=$designwebvn['qlns_honv'];
$ten=$designwebvn['qlns_tennv'];
$qlns_manv=$designwebvn['qlns_manv'];
$qlns_mahsnv=$designwebvn['qlns_mahsnv'];
$imagectv=$designwebvn['qlns_anhnvien'];
$qlns_mact=$designwebvn['qlns_mact'];
$qlns_mabp=$designwebvn['qlns_mabp'];
$qlns_macv=$designwebvn['qlns_macv'];
$qlns_macmnd=$designwebvn['qlns_macmnd'];
$qlns_email=$designwebvn['qlns_email'];
$donvi=@mysql_query("select * from qlns_congty where qlns_mact='$qlns_mact'");
$rowdonvi=@mysql_fetch_assoc($donvi);
$tendonvi=$rowdonvi['qlns_tencongty'];
$phongban=@mysql_query("select * from qlns_bophan where qlns_mabp='$qlns_mabp'");
$rowphongban=@mysql_fetch_assoc($phongban);
$tenphongban=$rowphongban['qlns_tenbophan'];
$chucvu=@mysql_query("select * from qlns_chucvu where qlns_macv='$qlns_macv'");
$rowchucvu=@mysql_fetch_assoc($chucvu);
$tenchucvu=$rowchucvu['qlns_tenchucvu'];
echo "	<table border='0' width='100%' name='hfasdf' cellSpacing=0 cellPadding=0 valign='top'>
<tr><td colspan='3' height='20' valign='top'></td></tr>
<tr><td width='20%' valign='top'><img src='../images/news/$imagectv' width='161' height='209'> </td><td width='1%'></td><td width='79%' valign='top'>
	<table border='0' width='100%' name='hffsdafasdf' cellSpacing=0 cellPadding=0 >
	<tr><td colspan='3' height='5' valign='top'></td></tr>
	<tr><td width='17%' height='30'><b>Họ Tên : </b></td><td width='1%'></td><td width='82%'><div align='left'>$ho $ten</td></tr>
	<tr><td width='17%'  height='30'><b>Mã Nhân Viên :</b></td><td width='1%'></td><td><div align='left'>$qlns_manv</td></tr>
	<tr><td width='17%'  height='30'><b> Đơn vị : </b></td><td width='1%'></td><td><div align='left'>$tendonvi</td></tr>
	<tr><td width='17%'  height='30'><b> Phòng ban : </b></td><td width='1%'></td><td><div align='left'>$tenphongban</td></tr>
	<tr><td width='17%'  height='30'><b> Chức vụ : </b></td><td width='1%'></td><td><div align='left'>$tenchucvu</td></tr>
	<tr><td width='17%'  height='30'><b> Email : </b></td><td width='1%'></td><td><div align='left'>$qlns_email</td></tr>
	<tr><td width='17%'  height='30'><b> Số CMND : </b></td><td width='1%'></td><td><div align='left'>$qlns_macmnd</td></tr>
	<tr><td colspan='3' height='20' valign='top'></td></tr>
	</table>
	</td></tr>
<tr><td colspan='3' height='20'></td></tr>";
	$query1=@mysql_query("SELECT * FROM qlns_khenthuongkl WHERE qlns_mahsnv='$get'");
$designwebvn1=@mysql_num_rows($query1);	
if($designwebvn1){
	echo "<tr><td colspan='3' height='20'> Nhan vien da co khen thuong</td></tr> ";
}
echo "</table";
}
?>

</body>
</html>
                                                                                                                                                                                                                                                                                            