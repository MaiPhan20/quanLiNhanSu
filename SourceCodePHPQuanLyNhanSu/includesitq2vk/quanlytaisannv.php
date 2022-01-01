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
<body>
<div align='center'>
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
 $sqlrow=@mysql_query("select * from  qlns_quanlytaisan where qlns_mahsnv=$id");
 $rowhd=@mysql_fetch_assoc($sqlrow);
    $vinh=@mysql_num_rows($sqlrow);
    if($vinh){
    	$qlns_taisan=$rowhd['qlns_taisan'];
    echo "<tr><td valign='top'><div align='center'>
    <table border='0' width='90%' name='fadfdsddsrw' cellSpacing='0' cellPadding='0'>
     <tr><td width='25%' valign='top'><div align='left'><span class='tinhyeuhue'>Tài sản đang quản lý :</span></td><td width='5'></td><td width='70%' valign='top'><div align='left' ><span class='tinhyeuhueit'>$qlns_taisan </span></td></tr>
    </table></td></tr>";}
    else {
    	echo "<tr><td valign='top'><div align='center'>
    <table border='0' width='90%' name='fadfdsddsrw' cellSpacing='0' cellPadding='0'><tr><td valign='top'><div align='center'><span class=tinhyeuhueit>Chưa có thông tin về nhân viên này !</div></td></tr></table></span>";
    }
		 ?> 
	 
</table>

</body>
</html>
