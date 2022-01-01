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
<link rel="stylesheet" type="text/css" href="ajaxtabs/ajaxtabs.css" />
<script type="text/javascript" src="ajaxtabs/ajaxtabs.js"></script>
<script type="text/javascript" src="js/javascript.js"></script>
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
<tr><td valign='center'><div align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='designwfdsaf'><b>Hồ sơ cán bộ công nhân viên</b></td></tr>
<tr><td height='10'><img src='../images/line2copy.png' border='0' width='450' height='1'></td></tr>
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
 $sqlrow=mysql_query("select * from qlns_hosonhanvien where qlns_mahsnv=$id order by qlns_hsnv desc");
 $rowhd=@mysql_fetch_assoc($sqlrow);
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
        $qlns_nvcongty=$rowhd['qlns_nvcongty'];
        $qlns_email=$rowhd['qlns_email'];
        $qlns_ngaysinh=$rowhd['qlns_ngaysinh'];
        $qlns_gioitinh=$rowhd['qlns_gioitinh'];
        $qlns_ghichu=$rowhd['qlns_ghichu'];
    echo "<tr><td valign='top'><div align='center'>
    <table border='0' width='99%' name='fadfdsddsrw' cellSpacing='0' cellPadding='0'>
    <tr><td width='20%'><img src='../images/news/$qlns_anhnvien' border='0' width='161' height='208' ></td><td width='7'></td>
    	<td  width=35%' valign='top'>
    <table border='0' width='100%' name='fadfdsddsrw' cellSpacing='0' cellPadding='0'>
    	<tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Đơn vị :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$tendonvi</span></td></tr>
    		<tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Phòng ban :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$tenbophan</span></td></tr>
    	    <tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Chức vụ :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$tenchucvu</span></td></tr>
    	    <tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Họ và Tên :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$qlns_honv $qlns_tennv</span></td></tr>
    	    <tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Ngày sinh :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$qlns_ngaysinh</span></td></tr> 
    	    <tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Giới tính :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>" ?> 
    	    
    	<?php if($qlns_gioitinh==1){
    		echo "Nam";
    		}else {
    			echo "Nữ";
    			} echo"</span></td></tr>
    	</table>
    	</td><td width='5'></td><td width='37%'>
    		<table border='0' width='100%' name='fadfdsddsrw' cellSpacing='0' cellPadding='0'>
    	<tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Email :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$qlns_email</span></td></tr>
    		<tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Ngày vào ct :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$qlns_nvcongty</span></td></tr>
    	    <tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Tình trạng :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>";
     
    	    if($qlns_tinhtrangnv==1){
    		echo "Nhân viên chính thức";
    		}
    	
    		echo"</span></td></tr>
    	    <tr><td width=35% height='35'><div align='left'><span class=tinhyeuhue>Số CMND :</span></td><td width='1'></td><td width='64%'><div align='left'><span class=tinhyeuhueit>$qlns_macmnd</span></td></tr>
    	    <tr><td width=35% height='70' valign='top'><div align='left'><span class=tinhyeuhue>Ghi chú :</span></td><td width='1'></td><td width='64%' valign='top'><div align='left'><span class=tinhyeuhueit>$qlns_ghichu</span></td></tr> 
    	   
    		</table>
    		</td></tr>
    </table>
    </td></tr><tr><td height='10' ></td></tr><tr><td>";
		 ?> 
		 <div align="left">
<div id="tabs1" class="indentmenu">
<ul>
<li><a href="lylichnv.php?id=<?php echo $qlns_mahsnv; ?>" rel="newsdivcontainer" class="selected"><font color='#1a4512'>Lý Lịch</a></li>
<li><a href="giadinhnv.php?id=<?php echo $qlns_mahsnv; ?>" rel="newsdivcontainer"><font color='#1a4512'>Gia Đình</a></li>
<li><a href="khenthuongkyluatnv.php?id=<?php echo $qlns_mahsnv; ?>" rel="newsdivcontainer"><font color='#1a4512'>Khen thưởng kỷ luật</a></li>
<li><a href="trinhdohocvannv.php?id=<?php echo $qlns_mahsnv; ?>" rel="newsdivcontainer"><font color='#1a4512'>Trình độ học vấn</a></li>
<li><a href="hopdonglaodongnv.php?id=<?php echo $qlns_mahsnv; ?>" rel="newsdivcontainer"><font color='#1a4512'>Hợp đồng lao đồng</a></li>
<li><a href="quanlytaisannv.php?id=<?php echo $qlns_mahsnv; ?>" rel="newsdivcontainer"><font color='#1a4512'>Quản lý tài sản</a></li>
<li><a href="nghiviecnv.php?id=<?php echo $qlns_mahsnv; ?>" rel="newsdivcontainer1"><font color='#1a4512'>Chấm công</a></li>

	
</ul>
<br style="clear: left" />
</div>

            <div id="newsdivcontainer" style="background:'' ;  border:1px solid gray; width:610px; height:230px ; margin-bottom: 0em; padding: 10px"></div>
  <div align="left"><script type="text/javascript">

var mypets=new ddajaxtabs("tabs1", "newsdivcontainer")
mypets.setpersist(false)
mypets.setselectedClassTarget("link")
mypets.init()

</script>
  </div>
</div>
</td></tr>		 
</table>

</body>
</html>
