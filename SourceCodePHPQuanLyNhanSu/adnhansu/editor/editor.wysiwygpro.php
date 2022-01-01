<?php
// $Id: editor.wysiwygpro.php,v 1.3 2004/04/05 17:47:00 ronbakker Exp $
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

}

function editorArea( $name, $content, $hiddenField, $width, $height, $col, $row ) {
	global $mosConfig_absolute_path;

	$content = str_replace("&lt;", "<", $content);
	$content = str_replace("&gt;", ">", $content);
	$content = str_replace("&amp;", "&", $content);
	$content = str_replace("&nbsp;", " ", $content);
	$content = str_replace("&quot;", "\"", $content);


// include the config file and editor class:

include_once ($mosConfig_absolute_path.'/editor/wysiwygpro/config.php');
include_once ($mosConfig_absolute_path.'/editor/wysiwygpro/editor_class.php');

// create a new instance of the wysiwygPro class:

$name = new wysiwygPro();

$name->set_name($hiddenField);

if ($hiddenField=='fulltext') {
	$name->subsequent(true);
}

$name->usep(true);

// insert some HTML
$name->set_code($content);

// print the editor to the browser:

$name->print_editor('100%', intval($height));

}

function getEditorContents( $editorArea, $hiddenField ) {
?>

submit_form();

<?php

}

?>
