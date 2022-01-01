<?php
// $Id: editor.xstandard.php,v 1.1 2004/02/18 20:15:39 ronbakker Exp $
/**
* Handler for htmlarea3
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Miro International Pty Ltd
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: 1.1 $
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

function initEditor() {
}

function editorArea( $name, $content, $hiddenField, $width, $height, $col, $row ) {
?>
<object classid="clsid:0EED7206-1661-11D7-84A3-00606744831D" id="<?php echo $name; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
<param name="Value" value="<?php echo $content; ?>" />
</object>
<input type="hidden" name="<?php echo $hiddenField; ?>" id="<?php echo $hiddenField; ?>" value="" />
<?php
}

function getEditorContents( $editorArea, $hiddenfield ) {
?>
	document.getElementById('<?php echo $editorArea ; ?>').EscapeUNICODE = true;
	document.getElementById('<?php echo $hiddenfield ; ?>').value = document.getElementById('<?php echo $editorArea ; ?>').value;
<?php
}
	

?>