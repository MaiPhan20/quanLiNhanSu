<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<SCRIPT language=JavaScript>
function openLink(c){
if(c.value!="") window.open(c.value);
}
</SCRIPT>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.quangvinh{
	border: 1px solid #99CCFF;
	FONT-FAMILY: Tahoma, Verdana;
	background:#bfd8f8;
	color:#608cc4;
	font-size:8pt;
	text-decoration:none;
}
-->
</style></head>

<body>
  <select name="lienket" class ='quangvinh'  style="font-family: tahoma; font-size: 9pt" onchange=openLink(this);>
 <option value="" selected="selected">-- CTN Vi&#7879;t Nam--</option>
 <?php $sqlink=@mysql_query("select * from qlns_link ");
         	   while ($rowlink=@mysql_fetch_assoc($sqlink)){
         	   	      $link_id=$rowlink['link_id'];
         	   	       if($link_id=='7'){ ?>
         	   	     <option value="http://taxi.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Taxi Xanh"  ?></option>
         	   	     <option value="http://taxi.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Taxi Hương Lúa"  ?></option>	   
         	         <option value="http://taxi.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cơ khí ô tô"  ?></option>
         	   <?php	       }
         	   	      if($link_id=='8'){
         	   	        
         	   	     
         	   	   ?> 
         	   	   <option value="http://baclieu.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cáp Bạc Liêu"  ?></option>
         	   	   <option value="http://quangbinh.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cáp Quãng Bình"  ?></option>	   
         	   	   <option value="http://kontum.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cáp Kontum"  ?></option>
         	   	   <option value="http://quangngai.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cáp Quảng Ngãi"  ?></option>	
         	   	   <option value="http://quangtri.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Cáp Quảng Trị"  ?></option>	      	   
         	   	   	 
         	   	   	 
         	   	   	    <?php  }   
         	   	   	  if($link_id=='9'){  	
         	   	   	    	 ?>
         	   	<option value="http://it.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Thiết kế website"  ?></option>
         	   	<option value="http://it.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Phần mềm"  ?></option>
         	    <option value="http://it.ctnvietnam.com"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Template - Font"  ?></option>
         	    	  <?php  }   
         	   	   	  	
         	   	   	    	 ?>			 
			    <option value="<?php echo $rowlink['link'];  ?>"><?php echo $rowlink['link_name'];  ?></option>    
		<?php  } ?>
  </select> 

 </body>
</html>
