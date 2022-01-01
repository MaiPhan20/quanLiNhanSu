 <?php
#################################################
#  ----------------------------------------		#
#  Q2VK (Quân - Quỳnh - Vinh - Khánh)           #
#  Mobile  0905094336	                        #
#  Contact Designwebvn@gmail.com	            #
#  Please don't edit if you use this code       #
#  ----------------------------------------	    #
################################################# 
if (!defined("itdesignwebq2vk")) {
    die ("<div align='center'><font color='blue' size='5'> Access Denied ! Contact Designwebvn@gmail.com");
}
	$ctn=addslashes($_GET['ctnvietnam']);
    $q2vk=array("cbcc","dsnv","ktkl","nvct","nvtv","nvn","nvnu","honv","tennv","manv","macmnd","donvi","phongban","chucvu");
		if (in_array($ctn,$q2vk)){
		echo"<IFRAME id=3DtabFrame 
name=3DtabFrame
              src='includesitq2vk/$ctn.php' 
frameBorder=0  scrolling=no marginheight='0' marginwidth='0'
                     width=652 height=578 	
allowTransparency></IFRAME>";	
		}
				else {
				echo"<IFRAME id=3DtabFrame 
name=3DtabFrame
              src='includesitq2vk/danhsachnhanvien.php' 
frameBorder=0  scrolling=no marginheight='0' marginwidth='0'
                      width=652 height=578 	
allowTransparency></IFRAME>";
		       
		   }
    

					 ?>