<?php

include("config.inc.php");


/**
   Get the extension of a file. You might want to see objFile.Type too
   In php4, you can use pathinfo() function for this
*/
function get_extension($filename){
  $x=explode(".",strrev($filename));
  return strrev($x[0]);
}
/**
  Utility function. Returns the path minus root folder path
  Also takes out the leading "/"
*/
function cut_root_folder($sub_folder){
	if (strlen($sub_folder) > strlen(ROOTFOLDER)){
		$fld=str_replace(ROOTFOLDER,'',$sub_folder);
		$fld=ereg_replace("^/+","",$fld);
		return $fld;
	} else {
		return "";
	}
}
/**
  Utility function.  check for the existence of a string in an array.
*/
function php3_in_array($str,$arr){
 // in php4, you don't need this function. use in_array instead
 $l=count($arr)-1;
 while($l>=0){
 	if(0==strcmp($str,$arr[$l])){
		return $l;
    }
    $l--;
 }
 return -1;
}
/**
 Utility function. print a file's size
*/
function print_filesize($file){
	$s=filesize($file);
	if($s>1024){
		$s=round($s/1024);
		return "$s Kb";
	}
	if($s>1024*1024){
		$s=round($s/(1024*1024));
		return "$s Mb";
	}
	return "$s b";
}

/**
 print the links at the top to navigate to parent folders
*/
function print_header_links($folder_path){
	//folder path is verified against site root as mild security
	//what if someone passes / or ~?
	global $PHP_SELF;
	if(DEBUG)
	
#		echo "$PHP_SELF : print_header_links('$folder_path')<br>\n";


    $folder_path = cut_root_folder(ereg_replace("/$","",$folder_path));
	$arr_folders = split("/",$folder_path);
	$prev_folder = "";
	if($folder_path != ""){
		echo '<a href="', $PHP_SELF, '"><img hspace="2" src="images/openfold.gif" alt="go to" border="0">/</a>',"\n";
		for($i=0;$i<count($arr_folders); $i++){
			//echo "$i ..$arr_folders[$i]..$prev_folder $arr_folders[$i]<br>\n";
			echo "<br>\n";
			for($x=0;$x<=$i;$x++) echo "&nbsp;";
			if($i==count($arr_folders)-1)
				echo '<img hspace="2" src="images/openfold.gif" border="0" alt="showing..."><b>', $arr_folders[$i], "</b><br>\n";
			else
				echo '<a href="', $PHP_SELF, '?dir=', urlencode(ereg_replace("^/","","$prev_folder/$arr_folders[$i]")), '"><img hspace="2" src="images/openfold.gif" border="0" alt="go to">', $arr_folders[$i], "</a>\n";
            $prev_folder = "$prev_folder/$arr_folders[$i]";
		}
		echo '<b>', $arr_folders[$i], "</b><br>\n";
	}
} // print_header_links end


/**
 display the contents of a directory
*/
function display_directory($dir){
    global $valid_file_types;
	global $PHP_SELF;
	//make link(s) to the parent(s)
	$dir = ereg_replace("/+","/","$dir/"); // squeeze extra slashes
	if(DEBUG)
	
/**   TZVIKA CHANGED HERE ***************************
echo "<-- $PHP_SELF : display_directory('$dir') --><br>\n";
*/

	$dirext= print_header_links($dir);
	echo $dirext;
	//Display every file in the folder, that matches
	//the extension given in valid_file_types
	if(!($d=dir($dir))){
		echo "\t Cannot open directory - [$dir]";
		return;
	}
	while($entry=$d->read()){
		if(is_file("$dir/$entry")){
			$ext = get_extension($entry);
			if(0<=php3_in_array($ext,$valid_file_types)){
				echo "<img hspace=\"2\" src=\"images/$ext.gif\" alt=\"\" border=\"0\">\n";
				//here, it should be a link really
				print_copy_link("$dir/$entry",$entry);
				echo " <FONT SIZE=\"-2\">(",print_filesize("$dir/$entry"),")</FONT><br>\n";
			}
		}
	    if (is_dir("$dir/$entry") && $entry!='.' && $entry!='..') {
			printf("<a href=\"%s?dir=%s\">",$PHP_SELF, urlencode(ereg_replace("/+","/",cut_root_folder("$dir/$entry"))));
			printf("<img hspace=\"2\" src=\"images/closefold.gif\" alt=\"expand\" border=\"0\">%s </a><br>\n",$entry);
		}
	}
} // display_directory end

/**
 main process...
*/
function main_process($dir){
	//if a parameter dir is passed, use that
	global $PHP_SELF;
	$dir=ereg_replace(SITEROOT,"",$dir);
	if(!$dir)$dir="";
	$current_folder=ROOTFOLDER."$dir";
	display_directory($current_folder);
}
?>
