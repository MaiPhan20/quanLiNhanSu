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
</style>

<script>
function ajaxLoad(url,id)
   {
       if (document.getElementById) {
           var x = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
           }
           if (x){
           x.onreadystatechange = function()
                   {
                       el = document.getElementById(id);
                       el.innerHTML='<div align=center><font color=white> CTN Viet Nam....';
               if (x.readyState == 4 && x.status == 200)
                       {
                       el.innerHTML = x.responseText;
                   }
                   }
               x.open("GET", url, true);
               x.send(null);
               }
       }
function pb_display(x,y)       
   {
   ajaxLoad('displaytkphongbanctn.php?lich='+x,'lichps');
   }
</script>
<body background='../images/nhansu_07.png'>
<center>
	<?php  include ("../sources/config.php");?>
<div align='center'>
<table border='0' width='98%' name='fadfdsrw' cellSpacing='0' cellPadding='0'>
<tr><td height='25'></td></tr>	
<tr><td valign='center'><div align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='designwfdsaf'><b>Tìm Nhân viên theo phòng ban</b></td></tr>
<tr><td height='10'><img src='images/line2copy.png' border='0' width='450' height='1'></td></tr>
<tr><td height='10'></td></tr>    
		<tr> 
      	<td><div align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='designwfdsaf'> Tên Phòng ban :</b></font>
        <select name="title" id="title" onchange="pb_display(this.value);">
<?php $a="select * from qlns_bophan";
$result = @mysql_query($a) or die ("loi");
while ($row = @mysql_fetch_array($result))
{?><option value='<?=$row['qlns_mabp']?>'><?php echo $row['qlns_tenbophan']; ?></option>
<? }?> 
</select></td>
    	</tr>
   <tr><td><div id="lichps">
 <div></td></tr>
   
	</TBODY></TABLE></center>

</body></html>


