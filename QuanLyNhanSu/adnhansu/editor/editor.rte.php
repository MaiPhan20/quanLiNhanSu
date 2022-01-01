<?php
// $Id: editor.rte.php,v 1.3 2004/02/28 18:46:32 rcastley Exp $
/**
* Handler for htmlarea2
* @package Mambo Open Source
* @Copyright (C) 2000 - 2004 Miro International Pty Ltd
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: 1.3 $
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

function initEditor() {
	global $mosConfig_live_site;
?>
<script language="JavaScript" type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/editor/rte/richtext.js"></script>
<?php
}

function editorArea( $name, $content, $hiddenField, $width, $height, $col, $row )	{
	global $mosConfig_live_site;
	$content = str_replace("&lt;", "<", $content);
	$content = str_replace("&gt;", ">", $content);
	$content = str_replace("&amp;", "&", $content);
	$content = str_replace("&nbsp;", " ", $content);
	$content = str_replace("&quot;", "\"", $content);

	$content = RTESafe($content);
?>

<script language="JavaScript" type="text/javascript">
<!--

//Usage: initRTE(imagesPath, includesPath, cssFile)
initRTE("<?php echo $mosConfig_live_site; ?>/editor/rte/images/", "<?php echo $mosConfig_live_site; ?>/editor/rte/", "");

//Usage: writeRichText(fieldname, html, width, height, buttons)
writeRichText('<?php echo $hiddenField ; ?>', '<?php echo $content; ?>', <?php echo $width; ?>, <?php echo $height; ?>, true, false);
//-->
</script>
<?php
}

function getEditorContents( $editorArea, $hiddenField ) {
?>

updateRTE('<?php echo $hiddenField; ?>');

<?php
}

function RTESafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = trim($strText);
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	$tmpString = str_replace("&lt;", "<", $tmpString);
	$tmpString = str_replace("&gt;", ">", $tmpString);
	
	return $tmpString;
}
?>
