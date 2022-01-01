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
.tinhyeuhue {font-size:14px; color:#a8d4f9; }
.tinhyeuhueit {font-size:14px; color:#e8e9e9; }

</style>

<html>
<body>
	<div class='Divtabs'>
<table border='0' width='98%' name='fadfdsrw' cellSpacing='0' cellPadding='0'>
<tr><td height='10'></td></tr>
 <?php
#################################################
#  ----------------------------------------		#
#  Contact Designwebvn@gmail.com	            #
#  Please don't edit if you use this code       #
#  ----------------------------------------	    #
#################################################
 $id=intval($_GET['id']);
 include ("../sources/config.php");
 $sqlrow=@mysql_query("select * from qlns_lylich where qlns_mahsnv=$id");
 $rowhd=@mysql_fetch_assoc($sqlrow);
    $vinh=@mysql_num_rows($sqlrow);
    if($vinh){
    	$quoctich=$rowhd['qlns_quoctich'];
    	$qlns_dienthoainha=$rowhd['qlns_dienthoainha'];
    	$qlns_dthoaididong=$rowhd['qlns_dthoaididong'];
    	$qlns_diachi=$rowhd['qlns_diachi'];
    	$tinhtrang=$rowhd['qlns_tinhtranghn'];
    echo "<tr><td valign='top'><div align='center'>
    <table border='0' width='90%' name='fadfdsddsrw' cellSpacing='0' cellPadding='0'>
    <tr><td width='25%' height='30'><div align='left'><span class='tinhyeuhue'>Quốc tịch :</span></td><td width='5'></td><td width='70%'><div align='left'><span class='tinhyeuhueit'>$quoctich </span></td></tr>
    <tr><td width='25%' height='30'><div align='left'><span class='tinhyeuhue'>Điện thoại nhà :</span></td><td width='5'></td><td width='70%'><div align='left'><span class='tinhyeuhueit'>$qlns_dienthoainha </span></td></tr>
    <tr><td width='25%' height='30'><div align='left'><span class='tinhyeuhue'>Điện thoại di động :</span></td><td width='5'></td><td width='70%'><div align='left'><span class='tinhyeuhueit'>$qlns_dthoaididong </span></td></tr>
    <tr><td width='25%' height='30'><div align='left'><span class='tinhyeuhue'>Tình trạng :</span></td><td width='5'></td><td width='70%'><div align='left'><span class='tinhyeuhueit'>";
    if($tinhtrang==1){echo "Độc thân"; }
       else { echo "Đã lập gia đình"; }
    	echo " </span></td></tr>
     <tr><td width='25%' height='70' valign='top'><div align='left'><span class='tinhyeuhue'>Địa chỉ :</span></td><td width='5'></td><td width='70%' valign='top'><div align='left'><span class='tinhyeuhueit'>$qlns_diachi </span></td></tr>
    </table></td></tr></table></div>";}
    else {
    	echo "<tr><td valign='top'><div align='center'>
    <table border='0' width='90%' name='fadfdsddsrw' cellSpacing='0' cellPadding='0'><tr><td valign='top'><div align='center'><span class=tinhyeuhueit>Chưa có thông tin về nhân viên này !</div></span></td></tr></table></table>";
    }
		 ?> 
	 


</body>
</html>
