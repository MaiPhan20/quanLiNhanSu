	

			
			<?php
			   include ("sources/config.php"); 
			   $donvi=intval($_GET['kenh']);
			   $bophannc=intval($_GET['ngay']);
			   if($donvi!=Null && $bophannc!=Null){
			   	      if($donvi ==20 && $bophannc=='6'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvit.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvit.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvit.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvit.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvit.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvit.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvit.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvit.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>	  
		<?php	  }
		 elseif($donvi ==10 && $bophannc=='3'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvkt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvkt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvkt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvkt.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvkt.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvkt.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvkt.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvkt.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
					<?php	  }
		 elseif($donvi ==15 && $bophannc=='7'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvpc.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvpc.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvpc.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvpc.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
						
							<?php	  }
		 elseif($donvi ==15 && $bophannc=='10'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvtongdai.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvtongdai.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvtongdai.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtongdai.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvtongdai.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvtongdai.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvtongdai.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtongdai.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
										<?php	  }
		 elseif($donvi ==10 && $bophannc=='2'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvhcns.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvhcns.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvhcns.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvhcns.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvhcns.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvhcns.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvhcns.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvhcns.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
							<?php	  }
		 elseif($donvi ==18 && $bophannc=='5'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxd.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvxd.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvxd.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvxd.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxd.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
									<?php	  }
		 elseif($donvi ==18 && $bophannc=='9'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvtdn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvtdn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvtdn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtdn.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvtdn.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvtdn.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvtdn.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtdn.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>	
								<?php	  }
		 elseif($donvi ==19 && $bophannc=='4'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvudcn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvudcn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvudcn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvudcn.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvudcn.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvudcn.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvudcn.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvudcn.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
					<?php	  }
		 elseif($donvi ==16 && $bophannc=='8'){
			   	       echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophannc' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvxck.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvxck.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvxck.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophannc; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxck.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvxck.php?page=$page&&bophan=$bophannc\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvxck.php?page=$i&&bophan=$bophannc\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvxck.php?page=$page&&bophan=$bophannc\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxck.php?page=$max_page&&bophan=$bophannc\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>		
						
													      
			  <?php 	}  else    {
			   echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mact='$donvi' and qlns_mabp='$bophannc' order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=5;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mact='$donvi' and qlns_mabp='$bophannc' order by qlns_hsnv desc limit $start,$rowperpage");
		       while($vinh=@mysql_fetch_assoc($sqlgioihan)){
		       	     $mahsnv=$vinh["qlns_mahsnv"];
		       	     $honv=$vinh["qlns_honv"];
		       	     $tennv=$vinh["qlns_tennv"];	
		       	     $macv=$vinh["qlns_macv"];		
		       			?>	 
		     <tr><td height='27'><ul class="pane-list"><li>
		   	<table border='0' width='99%' name='vfdfasafffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>  			
		    <tr>
			<td width='75' height='27'><div align='center'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo   $mahsnv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng Cán bộ nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"index.php?page=$i\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"index.php?page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"index.php?page=$i\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"index.php?page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"index.php?page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>   
						
						<?php  }
				}
				else {
			   $bophan=$_GET["lich"];
			   if($bophan==100){
			   	  echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv != 2  order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=12;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv != 2  order by qlns_hsnv desc limit $start,$rowperpage");
		       while($vinh=@mysql_fetch_assoc($sqlgioihan)){
		       	     $mahsnv=$vinh["qlns_mahsnv"];
		       	     $honv=$vinh["qlns_honv"];
		       	     $tennv=$vinh["qlns_tennv"];	
		       	     $macv=$vinh["qlns_macv"];		
		       			?>	 
		     <tr><td height='27'><ul class="pane-list"><li>
		   	<table border='0' width='99%' name='vfdfasafffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>  			
		    <tr>
			<td width='75' height='27'><div align='center'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo   $mahsnv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng Cán bộ nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"index.php?page=$i\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"index.php?page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"index.php?page=$i\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"index.php?page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"index.php?page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>   
			   <?php } 
			   elseif($bophan==6){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan'  and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvit.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvit.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvit.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvit.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvit.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvit.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvit.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvit.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
		<?php	 } elseif($bophan==3){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan'and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvkt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvkt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvkt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvkt.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvkt.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvkt.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvkt.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvkt.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
				<?php	 } elseif($bophan==2){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvhcns.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvhcns.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvhcns.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvhcns.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvhcns.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvhcns.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvhcns.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvhcns.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
						
			<?php	 } elseif($bophan==5){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxd.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvxd.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvxd.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvxd.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxd.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>  
			<?php	 } elseif($bophan==9){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvtdn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvtdn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvtdn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtdn.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvtdn.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvtdn.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvtdn.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtdn.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table> 
							<?php	 } elseif($bophan==19){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvbanqlxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvbanqlxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvbanqlxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvbanqlxd.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvbanqlxd.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvbanqlxd.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvbanqlxd.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvbanqlxd.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
 
							<?php	 } elseif($bophan==4){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvudcn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvudcn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvudcn.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
							<?php	 } elseif($bophan==7){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvpc.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvpc.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvpc.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
			
							</tr></table>
							<?php	 } elseif($bophan==8){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnxck.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvxck.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvxck.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>  
					
	
							<?php	 } elseif($bophan==10){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvtongdai.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvtongdai.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvtongdai.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvpc.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvpc.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvpc.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>   
	
							<?php	 } elseif($bophan==11){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvtaxi.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvtaxi.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvtaxi.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtaxi.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvtaxi.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvtaxi.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvtaxi.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtaxi.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>  			
				<?php	 } elseif($bophan==24){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where (qlns_mabp='5' or qlns_mabp='9' or qlns_mabp='12' or qlns_mabp='13' or qlns_mabp='14' or qlns_mabp='15' or qlns_mabp='17' or qlns_mabp='18' or qlns_mabp='19' ) and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where (qlns_mabp='5' or qlns_mabp='9' or qlns_mabp='12' or qlns_mabp='13' or qlns_mabp='14' or qlns_mabp='15' or qlns_mabp='17' or qlns_mabp='18' or qlns_mabp='19') and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvqlxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvqlxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvqlxd.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvqlxd.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvqlxd.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvqlxd.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvqlxd.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvqlnxd.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>  			
					<?php	 } elseif($bophan==34){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where (qlns_mabp='7' or qlns_mabp='10' or qlns_mabp='11') and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where (qlns_mabp='7' or qlns_mabp='10' or qlns_mabp='11') and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvtaxihuonglua.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvtaxihuonglua.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvtaxihuonglua.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtaxihuonglua.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvtaxihuonglua.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvtaxihuonglua.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvtaxihuonglua.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvtaxihuonglua.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>  		 			  
			<?php	 } elseif($bophan==15){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
		       while($vinh=@mysql_fetch_assoc($sqlgioihan)){
		       	     $mahsnv=$vinh["qlns_mahsnv"];
		       	      $qlns_manv=$vinh["qlns_manv"];
		       	     $honv=$vinh["qlns_honv"];
		       	     $tennv=$vinh["qlns_tennv"];	
		       	     $macv=$vinh["qlns_macv"];		
		       			?>	 
		     <tr><td height='27'><ul class="pane-list"><li>
		   	<table border='0' width='99%' name='vfdfasafffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>  			
		    <tr>
			<td width='75' height='27'><div align='center'><a href='detailnvxu.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvxu.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvxu.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxu.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvxu.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvxu.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvxu.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvxu.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>  
				<?php	 } elseif($bophan==17){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
		       while($vinh=@mysql_fetch_assoc($sqlgioihan)){
		       	     $mahsnv=$vinh["qlns_mahsnv"];
		       	      $qlns_manv=$vinh["qlns_manv"];
		       	     $honv=$vinh["qlns_honv"];
		       	     $tennv=$vinh["qlns_tennv"];	
		       	     $macv=$vinh["qlns_macv"];		
		       			?>	 
		     <tr><td height='27'><ul class="pane-list"><li>
		   	<table border='0' width='99%' name='vfdfasafffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>  			
		    <tr>
			<td width='75' height='27'><div align='center'><a href='detailnvdanhmb.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvdanhmb.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvdanhmb.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvdanhmb.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvdanhmb.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvdanhmb.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvdanhmb.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvdanhmb.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>
					
						</tr></table>  
				<?php	 } elseif($bophan==18){
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
		       while($vinh=@mysql_fetch_assoc($sqlgioihan)){
		       	     $mahsnv=$vinh["qlns_mahsnv"];
		       	      $qlns_manv=$vinh["qlns_manv"];
		       	     $honv=$vinh["qlns_honv"];
		       	     $tennv=$vinh["qlns_tennv"];	
		       	     $macv=$vinh["qlns_macv"];		
		       			?>	 
		     <tr><td height='27'><ul class="pane-list"><li>
		   	<table border='0' width='99%' name='vfdfasafffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>  			
		    <tr>
			<td width='75' height='27'><div align='center'><a href='detailnvdahlqt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvdahlqt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvdahlqt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvdahlqt.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvdahlqt.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvdahlqt.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvdahlqt.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvdahlqt.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>		
					</tr></table> 			
					 									 				   
		<?php	   }
			  else {
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=5;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_mabp='$bophan' and qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnv.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nhân viên : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"index.php?page=$i\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"index.php?page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"index.php?page=$i\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"index.php?page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"index.php?page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
						<?php } 
						} ?>