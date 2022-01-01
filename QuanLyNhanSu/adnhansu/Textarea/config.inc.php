<?php

// This is the FULL path to the directory where the program files
// are located. 
// NOTE: If you put it in your "web root" directory, the $ROOT and 
//       $PATH settings will then be the same. DO NOT add a trailing slash.
	$PATH = "../../images/upload/";

// This is the FULL path to the directory where your website files are 
// located on your server (Your web root). DO NOT add a trailing slash.
	$ROOT = "../../images/upload";

// Set to the full url to access the value you set for $ROOT
	$PREVIEW = "../../../images/upload";

// Set to the full url to access the value you set for $PATH. 
	$URL = "../../images/upload";

// Specify a list of folders to ignore when browsing 
	$IGNORE = array("temp","tmp");

// What kind of file types should be visible to the users when browsing for
// images using the WYSIWYG editor?  (The extensions you specify MUST be 
// for an image filetype or you will get javascript errors.)
	$VALID_IMAGE_FILE_TYPES =  array("gif","jpg","jpeg","png","png");

// What kind of file types should be visible to the users when browsing for
// links using the WYSIWYG editor? 
	$VALID_LINK_FILE_TYPES =  array("html","htm","doc","pdf","xls","ppt","txt","jpg","gif","png","phtml","php");

// Set to 1 to use authentication, otherwise set to 0.
// NOTE: If  you don't need password protection, set AUTH to 0.
	$AUTH = 0;
	$USER = "";
	$PASS = "";

// To turn off errors from appearing in your email inbox, 
// set to 0.
	$REPORT = 0;

// Set to 1 to enabling printing of WYSIWYG debug messages, otherwise 
// set to 0 
	$DEBUG = 1;

// You can specify an unlimited number of upload locations for your users. To
// add more locations, just follow the variable pattern.  (Be sure to increment
// the array number for each new location.)
// PATH - The _full_ path to the destination directory. (DO NOT add a trailing 
//   slash.) This directory MUST already exist and have permissions of 777.
// NAME  - The text users will see in the Upload window for this location.
// OVERWRITE - For this location, allow files that already exist to be 
//             overwritten? For yes, set to 1; for no, set to 0.


$absolute_path = "../../images/upload"; //Ðuongf d?n d?n thu m?c du?c Upload ?nh
$size_limit = "yes"; //do you want a size limit yes or no.
$limit_size = "150000"; //How big do you want size limit to be in bytes
$limit_ext = "yes"; //do you want to limit the extensions of files uploaded
$ext_count = "4"; //total number of extensions in array below
$extensions = array(".gif", ".jpg", ".jpeg", ".png"); //List extensions you want files uploaded to be

// Do you want to limit the acceptable extensions of uploaded file types?
// To enable set to 1; to disable change to 0.
	$LIMIT_UPLOAD_FILE_TYPES = 1;

// If enabled, specify a list of acceptable file types for the upload function.
	$VALID_UPLOAD_FILE_TYPES =  array("gif","jpg","jpeg","png");

// Do you want to set a size limit for uploaded files?  
// To enable set to 1; to disable change to 0.
	$UPLOAD_FILE_SIZE_LIMIT = 1;

// If enabled, specify the size limit (in bytes) for uploaded files.
	$UPLOAD_FILE_MAX_SIZE = 150000;

	$MAXSIZE=150000;
	define("MAXSIZE", $MAXSIZE);

	/* What is the root of the site? THE LAST "/" IS REQUIRED */
	define("ROOTFOLDER", "$ROOT/");
	define("SITEROOT", "$PREVIEW/");

	/* Set to 1 to enable the printing of debug messages, otherwise set to 0 */
	define("DEBUG", $DEBUG);
	
	
?>