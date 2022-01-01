 <?php
#################################################
#  ----------------------------------------		#
#  Q2VK (Quân - Quỳnh - Vinh - Khánh)           #
#  Mobile  0905094336	                        #
#  Contact Designwebvn@gmail.com	            #
#  Please don't edit if you use this code       #
#  ----------------------------------------	    #
################################################# 

	$vinhne=$_GET["ctnvietnam"];
	
    if (!defined("itdesignwebq2vk")) {
    die ("<div align='center'><font color='blue' size='5'> Access Denied ! Contact Designwebvn@gmail.com");
}
	$ctn=addslashes($_GET['ctnvietnam']);

    $q2vk=array("introduce","news","support","detailnews","contact","hoidap","detailnewsttth","search");
		if (in_array($ctn,$q2vk)){
			include "includeskt/$ctn.php"; 
			} 
	  
		else {
		       echo "<IFRAME id=3DtabFrame 
name=3DtabFrame
              src='includesitq2vk/ctncontentfr.php?thongtin=$vinhne' 
frameBorder=0  scrolling=no marginheight='0' marginwidth='0'
                          width=726 height=609   
allowTransparency></IFRAME>";
		   
                }
            
 
					 ?>