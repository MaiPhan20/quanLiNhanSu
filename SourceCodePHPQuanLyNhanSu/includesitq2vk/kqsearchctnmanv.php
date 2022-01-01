<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
function ajaxLoad1(url,id)
   {
       if (document.getElementById) {
           var y = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
           
           }
           if (y){
           y.onreadystatechange = function()
          
                   {
                       el = document.getElementById(id);
                       el.innerHTML='<div align=center><font color=#a2c8e7> CTN Viet Nam IT....';
               if (y.readyState == 4 && y.status == 200)
                       {
                       el.innerHTML = y.responseText;
                    
                   }
                   }
               y.open("GET", url, true);
               y.send(null);
            
               }
       } 
function ajaxLoad2(url,id)
   {
       if (document.getElementById) {
           var z = (window.ActiveXObject) ? new ActiveXObject("Microsoft.XMLHTTP") : new XMLHttpRequest();
           
           }
           if (z){
           y.onreadystatechange = function()
          
                   {
                       el = document.getElementById(id);
                       el.innerHTML='<div align=center><font color=#a2c8e7> CTN Viet Nam ITV....';
               if (z.readyState == 4 && z.status == 200)
                       {
                       el.innerHTML = z.responseText;
                    
                   }
                   }
               z.open("GET", url, true);
               z.send(null);
            
               }
       }              
function pb_display(x,y)       
   {
   ajaxLoad('displaybophan.php?lich='+x,'lichps');
   }
 function pb_display1(y,z)       
   {
   ajaxLoad1('displaybophan.php?lich='+y,'lichps');
   }
function pb_display2(z,y)       
   {
   ajaxLoad2('displaybophan.php?ngay='+z,'lichps');
   }
  function doShowCalendar()
{
	var ngay = document.getElementById('ngay').value;
	var kenh = document.getElementById('kenh').value;
	if(ngay != '' && kenh != ''){
		ajaxLoad('displaybophan.php?ngay='+ngay+'&kenh='+kenh,'lichps');
	}else{
		alert('Co loi trong qua trinh hien thi');
	}
} 
</script>
<body  topmargin="0" bottommargin="0">
	<?php 
	if(!defined("itdesignwebq2vk")){
    die ("<div align='center'><font color='blue' size='5'> Access Denied ! Contact Designwebvn@gmail.com");
}
	?>
<table border='0' width='254' name='vigfdsggfds'  cellSpacing=0 cellPadding=0>
    	<tr><td background='images/nhansu_08.png' height='24' width='254'></td></tr>
	<tr><td>
	<table border='0' width='254' name='vfdsafigfdsggfds'  cellSpacing=0 cellPadding=0>
	<tr><td background='images/nhansu_10.png' width='71' height='23'></td>
		<td background='images/nhansu_11.png' width='169' height='23'><div align='center'>
         	<select name="lienket" class ='ctnvietnamit' onchange="pb_display(this.value);">
           <option value="100" selected="selected" width='169'>-- CTN Vi&#7879;t Nam--</option>
             <option value="2"><?php echo "Hành chính - Nhân sự"  ?></option>  
         	 <option value="3"><?php echo "Tài chính - Kế toán"  ?></option>  
         	 <option value="4"><?php echo "Ứng dụng - Công nghệ"  ?></option>
             <option value="24"><?php echo "Bộ Phận Xây Dựng"  ?></option>
                             <option value="19"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ban Quản lý xây dựng"  ?></option>
                             <option value="14"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án Đà Nẵng"  ?></option>
                             <option value="15"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án Kon Tum"  ?></option>
                             <option value="17"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án Ngọc Hoàng Măng Bút"  ?></option>
                             <option value="18"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án HL Quảng Trị"  ?></option>
                             <option value="9"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Tổ Điện nước"  ?></option>
             <option value="6"><?php echo "Công nghệ thông tin"  ?></option> 
             <option value="8"><?php echo "Xưởng cơ khí ô tô"  ?></option> 
             <option value="34"><?php echo "Taxi Hương Lúa"  ?></option>    
            </select>
		
		</td><td background='images/nhansu_12.png' width='14' height='23'></td></tr>	
		</table>	
		</td></tr>
		
		<tr><td valign='top'>
		    <table border='0' width='254' name='vfdsaffdsigfdsggfds'  cellSpacing=0 cellPadding=0>	
			<tr>
			<td background='images/giaodientimkiem_28.png' width='11' height='562'></td>
			<td width='229' valign='top'>
			<table border='0' width='229' name='fdvfdsaffdsigfdsggfds'  cellSpacing=0 cellPadding=0>
			<tr><td background='images/giaodientimkiem_29.png' border='0' height='20' width='229'></td></tr>
			<tr><td > <table border='0' width='229' name='fdvfdsaffdfdfdsigfdsggfds'  cellSpacing=0 cellPadding=0>
			<tr><td background='images/giaodientimkiemmanv.png' width='36' height='25'></td><td background='images/giaodientimkiem_33.png' width='126' height='25'><form action="kqsearchctnmanv.php" method='POST' name='fsdarfe4'><input name="searchword" class="inputboxdesignwebvn" alt="Mã nhân viên"  value="Mã nhân viên" onblur="if(this.value=='') this.value='Mã nhân viên';" onfocus="if(this.value=='Mã nhân viên') this.value='';" type="text"></td><td background='images/giaodientimkiem_34.png' width='67' height='25'><input src="images/timkiem1.png" onmouseover="this.src='images/tinhkiem2.png'" onmouseout="this.src='images/timkiem1.png'" type="image"></td></tr> </form>
			</table></td></tr>
			<tr><td > <table border='0' width='229' name='fdvfdsaffdjfdfdsigfdsggfds'  cellSpacing=0 cellPadding=0>
			<tr><td background='images/giaodientimkiem_38.png' width='36' height='28'></td><td background='images/giaodientimkiem_39.png' width='80' height='28'>
			<select name="select" id="kenh" class='quangvinhit' onchange="doShowCalendar();"  size="1" style="width: 79px; height:19px">	
 		<?php
   $query_tinh=@mysql_query("select * from qlns_congty ORDER BY qlns_idct ASC");
   while($row_tinh=@mysql_fetch_array($query_tinh))
   {
   echo "<option value=$row_tinh[qlns_mact]>$row_tinh[qlns_tencongty]</option>" ;
   }
   
?>
 	</select>	
			</td><td background='images/giaodientimkiem_40.png' width='46' height='28'></td>
				<td background='images/giaodientimkiem_41.png' width='67' height='28'>
				<select name="select" id="ngay"  class='quangvinhit' onchange="doShowCalendar();" size="1" style="width: 66px; height:19px">
                  <option value="100" selected="selected" width='169'>-- CTN Vi&#7879;t Nam--</option>
             <option value="2"><?php echo "Hành chính - Nhân sự"  ?></option>  
         	 <option value="3"><?php echo "Tài chính - Kế toán"  ?></option>  
         	 <option value="4"><?php echo "Ứng dụng - Công nghệ"  ?></option>
             <option value="24"><?php echo "Bộ Phận Xây Dựng"  ?></option>
                             <option value="19"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ban Quản lý xây dựng"  ?></option>
                             <option value="14"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án Đà Nẵng"  ?></option>
                             <option value="15"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án Kon Tum"  ?></option>
                             <option value="17"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án Ngọc Hoàng Măng Bút"  ?></option>
                             <option value="18"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dự án HL Quảng Trị"  ?></option>
                             <option value="9"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Tổ Điện nước"  ?></option>
             <option value="6"><?php echo "Công nghệ thông tin"  ?></option> 
             <option value="8"><?php echo "Xưởng cơ khí ô tô"  ?></option> 
             <option value="34"><?php echo "Taxi Hương Lúa"  ?></option>  
                   </select> 
				</td></tr> 
			</table></td></tr>
			<tr><td>
			<table border='0' width='229' name='fdvfdsaffdjfdfdsigfdsggfds'  cellSpacing=0 cellPadding=0>
			<tr><td background='images/giaodientimkiem_43.png' width='75' height='23'></td><td background='images/giaodientimkiem_44.png' width='93' height='23'></td><td background='images/giaodientimkiem_45.png' width='61' height='23'></td></tr>
			</table>
			</td></tr>
			<tr><td background='images/giaodientimkiem_46.png' width='229' height='454' valign='top'>
				<div id="lichps">
			<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>
			
			<?php 
			   $search=addslashes($_POST['searchword']);
			   $keyword=addslashes($_GET['keyword']);	
			   if($keyword == Null){
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_manv ='$search' order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=12; 
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_manv ='$search' order by qlns_hsnv desc limit $start,$rowperpage");
		       while($vinh=@mysql_fetch_assoc($sqlgioihan)){
		       	     $qlns_manv=$vinh["qlns_manv"];
		       	     $mahsnv=$vinh["qlns_mahsnv"];
		       	     $honv=$vinh["qlns_honv"];
		       	     $tennv=$vinh["qlns_tennv"];	
		       	     $macv=$vinh["qlns_macv"];		
		       			?>	 
		     <tr><td height='27'><ul class="pane-list"><li>
		   	<table border='0' width='99%' name='vfdfasafffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>  			
		    <tr>
			<td width='75' height='27'><div align='center'><a href='detailnvsearchmanv.php?ctnvietnam=<?php echo $mahsnv; ?>&&keyword=<?php echo $search; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvsearchmanv.php?ctnvietnam=<?php echo $mahsnv; ?>&&keyword=<?php echo $search; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvsearchmanv.php?ctnvietnam=<?php echo $mahsnv; ?>&&keyword=<?php echo $search; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><div align='left'>&nbsp;&nbsp;&nbsp;<span class='tinhyeuhueemyeit'>Tổng Cán bộ nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
					</table>
				<div align='right'><table border='0' width='70' name='ctnvietnam' cellSpacing=0 cellPadding=0>  <tr>		
				<?php 
					if($page>3){
					if($page+3>$max_page){
                         $max=$max_page; $i=$max_page-3;
                             } else {
                               $max=$page+4;$i=$page-3;
                                    } 	
						
					}
					else {
                  if($max_page<3){
                  $i=1;$max=$max_page;
                   } else {
                  $i=1;
                  if($page+3>$max_page){$max=$max_page;}else{
                  $max=$page+3;}}
                  }
            if($page>1){
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"kqsearchctnmanv.php?page=$i&&keyword=$search\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"kqsearchctnmanv.php?page=$page&&keyword=$search\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"kqsearchctnmanv.php?page=$i&&keyword=$search\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"kqsearchctnmanv.php?page=$page&&keyword=$search\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"kqsearchctnmanv.php?page=$max_page&&keyword=$search\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
			   }
		else {
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_manv ='$keyword' order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=12;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_manv = '$keyword' order by qlns_hsnv desc limit $start,$rowperpage");
		       while($vinh=@mysql_fetch_assoc($sqlgioihan)){
		       	     $qlns_manv=$vinh["qlns_manv"];
		       	     $mahsnv=$vinh["qlns_mahsnv"];
		       	     $honv=$vinh["qlns_honv"];
		       	     $tennv=$vinh["qlns_tennv"];	
		       	     $macv=$vinh["qlns_macv"];		
		       			?>	 
		     <tr><td height='27'><ul class="pane-list"><li>
		   	<table border='0' width='99%' name='vfdfasafffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>  			
		    <tr>
			<td width='75' height='27'><div align='center'><a href='detailnvsearchmanv.php?ctnvietnam=<?php echo $mahsnv; ?>&&keyword=<?php echo $keyword; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvsearchmanv.php?ctnvietnam=<?php echo $mahsnv; ?>&&keyword=<?php echo $keyword; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvsearchmanv.php?ctnvietnam=<?php echo $mahsnv; ?>&&keyword=<?php echo $keyword; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><div align='left'>&nbsp;&nbsp;&nbsp;<span class='tinhyeuhueemyeit'>Tổng Cán bộ nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
					</table>
				<div align='right'><table border='0' width='70' name='ctnvietnam' cellSpacing=0 cellPadding=0>  <tr>		
				<?php 
					if($page>3){
					if($page+3>$max_page){
                         $max=$max_page; $i=$max_page-3;
                             } else {
                               $max=$page+4;$i=$page-3;
                                    } 	
						
					}
					else {
                  if($max_page<3){
                  $i=1;$max=$max_page;
                   } else {
                  $i=1;
                  if($page+3>$max_page){$max=$max_page;}else{
                  $max=$page+3;}}
                  }
            if($page>1){
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"kqsearchctnmanv.php?page=$i&&keyword=$keyword\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"kqsearchctnmanv.php?page=$page&&keyword=$keyword\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"kqsearchctnmanv.php?page=$i&&keyword=$keyword\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"kqsearchctnmanv.php?page=$page&&keyword=$keyword\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"kqsearchctnmanv.php?page=$max_page&&keyword=$keyword\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}	   	   
			   	   
			   } 
					?>	
					</tr></table>
						</div>
			
			
			
			</td></tr>
			<tr><td background='images/giaodientimkiem_64.png' width='229' height='12'></td></tr>	
			</table>	
			</td>
			<td background='images/giaodientimkiem_30.png' width='14' height='562'></td>
			</tr>
			</table>
			</td></tr>
	</table>
</body>
</html>
