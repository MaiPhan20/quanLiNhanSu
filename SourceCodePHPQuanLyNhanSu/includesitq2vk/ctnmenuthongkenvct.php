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
function pb_display(x,y)       
   {
   ajaxLoad('displaythongke.php?lich='+x,'lichps');
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
	<tr><td background='images/thongke.png' width='71' height='23'></td>
		<td background='images/nhansu_11.png' width='169' height='23'><div align='center'>
         	<select name="lienket" class ='ctnvietnamit' onchange="pb_display(this.value);">
            <option value="100"  width='169'>-- CTN Vi&#7879;t Nam--</option>
             
         	   <option selected="selected" value="1">Nhân viên chính thức</option>
         	   <option value="0">Nhân viên thử việc</option>
         	   <option value="2">Nhân viên nghỉ việc</option>	   	
            </select>
		
		</td><td background='images/nhansu_12.png' width='14' height='23'></td></tr>	
		</table>	
		</td></tr>
		
		<tr><td>
		    <table border='0' width='254' name='vfdsaffdsigfdsggfds'  cellSpacing=0 cellPadding=0>	
			<tr>
			<td background='images/nhansu_24.png' width='11' height='562'></td>
			<td width='229'>
			<table border='0' width='229' name='vfdfasaffdsigfdsggfds'  cellSpacing=0 cellPadding=0>
			<tr><td height='21'>
			<table border='0' width='229' name='vfdfasaffdgsdgsigfdsggfds'  cellSpacing=0 cellPadding=0>
			<tr>
			<td background='images/nhansu_25.png' height='21' width='75'></td>
			<td background='images/nhansu_26.png' height='21' width='93'></td>
			<td background='images/nhansu_27.png' height='21' width='61'></td></tr>
			</table>
			</td></tr>
		
			<tr><td background='images/nhansu_30.png' width='229' height='529' valign='top'>
				<div id="lichps">
			<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>
			
			<?php 
				
			   echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv='1' order by qlns_hsnv asc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv='1' order by qlns_hsnv asc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvnthongkenvct.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvnthongkenvct.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvnthongkenvct.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nv chính thức: <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvnthongkenvct.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvnthongkenvct.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvnthongkenvct.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvnthongkenvct.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvnthongkenvct.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
						</div>
			</td></tr>
			<tr><td background='images/nhansu_52.png' height='12' width='229'></td></tr>
			</table>	
			</td>
			<td background='images/nhansu_28.png' width='14' height='562'></td>
			</tr>
			</table>
			</td></tr>
	</table>
</body>
</html>
