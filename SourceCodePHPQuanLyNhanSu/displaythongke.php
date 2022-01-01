	

			
			<?php
			   include ("sources/config.php"); 
			   $bophan=$_GET["lich"];
			   if($bophan==100){
			   	  echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv != 2 order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv != 2 order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvnthongke.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvnthongke.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvnthongke.php?ctnvietnam=<?php echo $mahsnv; ?>' class='tinhyeuhueemyeu'><?php  
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"ctnthongkectn.php?page=$i\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"ctnthongkectn.php?page=$page\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"ctnthongkectn.php?page=$i\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"ctnthongkectn.php?page=$page\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"ctnthongkectn.php?page=$max_page\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>   
			   <?php } 
			  elseif($bophan==1) {
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
						<?php } 
					 elseif($bophan==0) {
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv='0' order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv='0' order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvnthongkenvtt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvnthongkenvtt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvnthongkenvtt.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nv thử việc : <?php echo $totalrow; ?> </span><td></tr>	
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvnthongkenvtt.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvnthongkenvtt.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvnthongkenvtt.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvnthongkenvtt.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvnthongkenvtt.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table>
						
					<?php }  elseif($bophan==2) {
			    echo "<table border='0' width='229' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0>";	  
			   $page=intval($_GET["page"]);
			   if($page=="") $page="1";
			   $sqlvinh=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv='2' order by qlns_hsnv desc");
			   $totalrow=@mysql_num_rows($sqlvinh);
			   $rowperpage=15;
			   $max_page=ceil($totalrow/$rowperpage);
			   $start=($page-1)* $rowperpage;
			   $sqlgioihan=@mysql_query("select qlns_manv,qlns_mahsnv,qlns_honv,qlns_tennv,qlns_macv from qlns_hosonhanvien where qlns_tinhtrangnv='2' order by qlns_hsnv desc limit $start,$rowperpage");
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
			<td width='75' height='27'><div align='center'><a href='detailnvnthongkenvnv.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo   $qlns_manv; ?></a></td>
			<td width='93' height='27'><div align='left'><a href='detailnvnthongkenvnv.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php echo $honv ." ".$tennv; ?></a></td>
			<td width='61' height='27'><div align='left'><span class='tinhyeuhueemye'>
				<table border='0' width='61' name='vfdfasaffdgsdgsigfdsffggfds'  cellSpacing=0 cellPadding=0><tr><td width='3'></td>
						<td width='58'><div align='left'><a href='detailnvnthongkenvnv.php?ctnvietnam=<?php echo $mahsnv; ?>&&bophan=<?php echo $bophan; ?>' class='tinhyeuhueemyeu'><?php  
						 $sqlvinhit=@mysql_query("select qlns_tenchucvu from qlns_chucvu where qlns_macv='$macv'");	
						 $rowv=@mysql_fetch_assoc($sqlvinhit);
						    $vhf=$rowv["qlns_tenchucvu"];
						    echo $vhf;	
							 ?></a></td></tr></table></td>
			</tr>
							</table>	 </td></tr></li></ul>
						 
					<?php }	 ?>
				<tr><td height='35'></td></tr>
				<tr><td><span class='tinhyeuhueemyeit'>Tổng nv Nghỉ việc : <?php echo $totalrow; ?> </span><td></tr>
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
 echo  "<TD class=pagemenu><div align='right'><A HREF=\"detailnvnthongkenvnv.php?page=$i&&bophan=$bophan\" title=\"Trang &#273;&#7847;u\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></TD><td widht='2'></td>";
 $page=$page-1;
  echo "<TD class=pagemenu><b><A HREF=\"detailnvnthongkenvnv.php?page=$page&&bophan=$bophan\" title=\"Trang tr&#432;&#7899;c\" class=song><img height=15 src=\"images/page_first.gif\" width=15 border=0></A></b></TD><td widht='2'></td>";
  }
for($i;$i<=$max; $i++) {
$page=$_GET['page']; if($page==""){$page=1;}
if ($i==$page) {
        echo "<TD class=pagemenu1><div align='right'>&nbsp;<b>".$i."</b>&nbsp;</TD><td width='2'></td><td widht='2'></td>";
    } else {
        echo "<TD class=pagemenu><div align='right'>&nbsp;<A HREF=\"detailnvnthongkenvnv.php?page=$i&&bophan=$bophan\" class=song title=\"Trang $i\"><font size=1><b>$i</b></font></A>&nbsp;</TD><td widht='2'></td>";
		}
	}
	if($page<=$max_page-1){
	$page=$page+1;
	 echo "<TD class=pagemenu><div align='right'><b><A HREF=\"detailnvnthongkenvnv.php?page=$page&&bophan=$bophan\" title=\"Trang ti&#7871;p\" class=song><img height=15 src=\"images/bullet1.png\" width=15 border=0></A></b></TD><td widht='2'></td>"; 
	 echo "<TD class=pagemenu><div align='right'><A HREF=\"detailnvnthongkenvnv.php?page=$max_page&&bophan=$bophan\" title=\"Trang cu&#7889;i $max_page\" class=song><img height=15 src=\"images/bullet3.png\" width=15 border=0></A></TD>";

}
					?>	
					</tr></table> 
						
					<?php } ?>
						