<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="images/phh.css">
<script type="text/javascript" src="images/jqueryit.js"></script>
<script src="images/dbMenu.js" type="text/javascript"></script>
<link href="images/side.css" type="text/css" rel="stylesheet" media="screen">
<script type="text/javascript" src="images/phh.js"></script>

<html>
<head>
</head>
<body topmargin="0" bottommargin="0">
	<?php 
	if(!defined("itdesignwebq2vk")){
    die ("<div align='center'><font color='blue' size='5'> Access Denied ! Contact Designwebvn@gmail.com");
}
	?>
<table border='0' width='980' name='cthgfn' cellSpacing=0 cellPadding=0 >
  
    	
    <tr><td background="images/nhansu_53_01.gif" height='22' width='242' valign='bottom'>
     <div align='left'>   <div style="display: none;" id="start_menu">
   <table style="margin-left: 10px;" width="210" border="0" cellpadding="0" cellspacing="0">
   <tbody><tr><td>
   <img src="images/agt_forum.png" style="margin-right: 10px;" align="absmiddle"> <font color="#ffffff" face="Courier New, Courier, monospace" size="3"><strong>Welcome CTN!</strong> </font><br>
   </td>
   </tr>
   </tbody></table>
   <hr color="0d3e77" size="1">
   <div class="clearfix">
   <ul id="side" class="dbMenu onMouse">
   <li><a class="none" href="http://ctnvietnam.vn/" target="_blank"><img src="images/gohome.png" align="absmiddle" border="0"> CTN Việt Nam</a></li>
    <li ><a class="none" href="http://ctnvietnam.com/modcontact.ctn" target="_blank"><img src="images/easymoblog.png" align="absmiddle" border="0"> Liên Hệ</a></li>
	<li onclick=" " ><a class="subMenu subMenu1" href="javascript:_postback(1);"><img src="images/findf.png" align="absmiddle" border="0"> Tìm Kiếm</a>
	   <ul class="             ">
             
            <li class=""><a href="ctnsearch.php"><img src='images/filefind.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; Tên Nhân Viên </a> </li>
		    <li class=""><a href="ctnsearchcmnd.php"><img src='images/filefind.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; Số CMND </a> </li>
		    <li class=""><a href="ctnsearchmanv.php"><img src='images/filefind.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; Mã Nhân Viên </a> </li>
		    <li class=""><a href="ctnsearchhoten.php"><img src='images/filefind.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; Họ và tên nhân viên </a> </li> 	
		    <li class=""><a href="ctnsearchchucvu.php"><img src='images/filefind.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; Chức Vụ </a> </li> 
		     </ul>
		</li>
    <li onclick=" "><a class="none" href="javascript:baoloi('index.php')"><img src="images/lock.png" align="absmiddle" border="0"> Thoát </a></li>
    <li class="             ">
    	<a class="subMenu subMenu             " href="javascript:_postback(1);"><img src="images/openofficeorg-20-calc.png" align="absmiddle" border="0"> <font color="#ffff00">Danh Mục</font></a>
        <ul class="             ">
             
            <li class="    "><a class="subMenu subMenu    " href="javascript:_postback(1);"><img src='images/fileprint.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; In Danh Sách</a>
        	<ul class="    ">
                        	<li onclick="window_new(1,0,'In Danh Sách','CTN Việt Nam');"><a href="printctnvietnam.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Việt Nam</a></li>
                        	 <li onclick="window_new(2,0,'In Danh Sách','CTN Xưởng');"><a href="printctnxaydung.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Xây Dựng</a></li>
                             <li onclick="window_new(2,0,'In Danh Sách','CTN Xưởng');"><a href="printctntech.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Ứng Dụng Công Nghệ</a></li>
                             <li onclick="window_new(2,0,'In Danh Sách','CTN Xưởng');"><a href="printctnit.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Công Nghệ Thông Tin</a></li> 
                        	 <li onclick="window_new(6,0,'In Danh Sách','CTN Hương Lúa');"><a href="printctnhuonglua.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Hương Lúa</a></li>
                        	 <li onclick="window_new(6,1,'In Danh Sách','CTN Taxi Xanh');"><a href="printctntaxixanh.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Taxi Xanh</a></li>
                             <li onclick="window_new(2,0,'In Danh Sách','CTN Xưởng');"><a href="printctnxuong.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Xưởng</a></li>
                        	<li onclick="window_new(5,0,'In Danh Sách','CTN Kon Tum');"><a href="printctnkontum.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Kon Tum</a></li>
                        	<li onclick="window_new(42,0,'In Danh Sách','CTN Bạc Liêu');"><a href="printctnbaclieu.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Bạc Liêu</a></li>
                        	<li onclick="window_new(41,0,'In Danh Sách','CTN Quảng Ngãi');"><a href="printctnquangngai.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Quảng Ngãi</a></li>
                            <li onclick="window_new(43,0,'In Danh Sách','CTN Quảng Bình');"><a href="printctnquangbinh.php" target='_blank'><img src='images/kjobviewer.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; CTN Quảng Bình</a></li>
                        </ul>
        </li>
         <li class="  "><a class="subMenu subMenu  " href="javascript:_postback(1);"><img src='images/agt_add-to-autorun.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; Thống Kế</a>
        	<ul class="  ">
                        	<li onclick="window_new(4,0,'Thống Kế','Nhân viên chính thức');"><a href="detailnvnthongkenvct.php"><img src='images/agt_family.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; Nhân viên chính thức</a></li>
                            <li onclick="window_new(4,0,'Thống Kế','Nhân viên thử việc');"><a href="detailnvnthongkenvtt.php"><img src='images/agt_family.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; Nhân viên thử việc</a></li>
                            <li onclick="window_new(4,0,'Thống Kế','Nhân viên nghỉ việc');"><a href="detailnvnthongkenvnv.php"><img src='images/agt_family.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; Nhân viên nghỉ việc</a></li>
                        </ul>
        </li>
            <li class=" "><a class="subMenu subMenu " href="javascript:_postback(1);"><img src='images/7days.png' border='0' width='24' height='24'>&nbsp;&nbsp;&nbsp; Báo Cáo</a>
        	<ul class=" ">
                        	<li onclick="window_new(17,0,'Báo Cáo','Cán bộ chủ chốt');"><a href="detailnvreportcbcc.php"><img src='images/agt_reload.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; Cán bộ chủ chốt</a></li>
                        	<li onclick="window_new(40,0,'Báo Cáo','Nhân viên nam');"><a href="detailnvreportnvnam.php"><img src='images/agt_reload.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; Nhân viên nam</a></li>
                        	<li onclick="window_new(35,0,'Báo Cáo','Nhân viên nữ');"><a href="detailnvreportnvnu.php"><img src='images/agt_reload.png' border='0' width='16' height='16'>&nbsp;&nbsp;&nbsp; Nhân viên nữ</a></li>
                        
                        </ul>
        </li>  
    </div>	
    	
    	</div>
     
	<div id="system_tray">
		<div id="quick_menu" onclick="start_menu();"></div>
		
		</div>
		
		

    	</td><td background='images/nhansu_53_02.gif' border='0' height='22' width='738'>	<div id="clock" align='center'><img src='images/kword.png' width='20' height='20' border='0' > <?php $d= date("d/m/20y"); echo  $d; ?> &nbsp;&nbsp;&nbsp; <img src='images/kalarm.png' width='20' height='20' border='0' > &nbsp; <span id="clock_value">  </span></div> </td>
       </tr></table>
    </body>
</html>
