<?php
	require('../connect/connection.php');
	$dbConn_menu = new Database();
	$dbConn_menu->query("Select * from tbl_nhomtin");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

<script type="text/javascript" src="jquery-1.2.2.pack.js"></script>

<script type="text/javascript" src="ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>


<script type="text/javascript">


ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='plus.gif' class='statusicon' />", "<img src='minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>


<style type="text/css">

.glossymenu{
margin: 5px 0;
padding: 0;
width: 170px; /*width of menu*/
border: 1px solid #9A9A9A;
border-bottom-width: 0;
}

.glossymenu a.menuitem{
background: black url(glossyback.gif) repeat-x bottom left;
font: bold 9pt Geneva, Arial, Helvetica, sans-serif;
color: white;
display: block;
position: relative; /*To help in the anchoring of the ".statusicon" icon image*/
width: auto;
padding: 4px 0;
padding-left: 10px;
text-decoration: none;
}


.glossymenu a.menuitem:visited, .glossymenu .menuitem:active{
color: white;
}

.glossymenu a.menuitem .statusicon{ /*CSS for icon image that gets dynamically added to headers*/
position: absolute;
top: 5px;
right: 5px;
border: none;
}

.glossymenu a.menuitem:hover{
background-image: url(glossyback2.gif);
}

.glossymenu div.submenu{ /*DIV that contains each sub menu*/
background: white;
}

.glossymenu div.submenu ul{ /*UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
}

.glossymenu div.submenu ul li{
border-bottom: 1px solid blue;
}

.glossymenu div.submenu ul li a{
display: block;
font: normal 9pt Geneva, Arial, Helvetica, sans-serif;
color: black;
text-decoration: none;
padding: 2px 0;
padding-left: 10px;
}

.glossymenu div.submenu ul li a:hover{
background: #DFDCCB;
colorz: white;
}

</style>

</head>

<body>

<div class="glossymenu">
<a class="menuitem submenuheader" href="#">T&#7893;ng quan </a>
<div class="submenu">
	<ul>
	<li><a href="#">Gi&#7899;i thi&#7879;u PTTH B&#7841;c Li&ecirc;u</a></li>
	<li><a href="#">C&#417; c&#7845;u t&#7893; ch&#7913;c   </a></li>
	<li><a href="#">H&igrave;nh &#7843;nh</a></li>
	<li><a href="#">C&aacute;c chi nh&aacute;nh,tr&#7841;m thu ph&aacute;t  </a></li>
	</ul>
</div>
<a class="menuitem submenuheader" href="#" >Tin t&#7913;c </a>
<div class="submenu">
	<ul>
	<?php
		if($dbConn_menu->num_row()>0) {
			while($dbConn_menu->move_next()){
	?>
	<li><a href="#"><?php print $dbConn_menu->getField("ten_nhomtin");?></a></li>
	<? 
		    } //while
		}//if
	?>
	</ul>
</div>
<a class="menuitem" href="http://www.javascriptkit.com/jsref/">JavaScript Reference</a>
<a class="menuitem" href="http://www.javascriptkit.com/domref/">DOM Reference</a>
<a class="menuitem submenuheader" href="http://www.cssdrive.com">CSS Drive</a>
<div class="submenu">
	<ul>
	<li><a href="http://www.cssdrive.com">CSS Gallery</a></li>
	<li><a href="http://www.cssdrive.com/index.php/menudesigns/">Menu Gallery</a></li>
	<li><a href="http://www.cssdrive.com/index.php/news/">Web Design News</a></li>
	<li><a href="http://www.cssdrive.com/index.php/examples/">CSS Examples</a></li>
	<li><a href="http://www.cssdrive.com/index.php/main/csscompressor/">CSS Compressor</a></li>
	<li><a href="http://www.dynamicdrive.com/forums/forumdisplay.php?f=6">CSS Forums</a></li>
	</ul>
	<img src="http://i27.tinypic.com/sy7295.gif" style="margin: 10px 5px" />
</div>
<a class="menuitem" href="http://www.codingforums.com/" style="border-bottom-width: 0">Coding Forums</a>		
</div>


</p>
</body>
</html>