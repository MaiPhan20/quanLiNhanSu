<?php
// $Id: editor.php,v 1.4 2003/09/26 08:51:51 rcastley Exp $
/**
* Editor handler
* @package Mambo Open Source
* @Copyright (C) 2000 - 2003 Miro International Pty Ltd
* @ All rights reserved
* @ Mambo Open Source is Free Software
* @ Released under GNU/GPL License : http://www.gnu.org/copyleft/gpl.html
* @version $Revision: 1.4 $
**/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

$mosConfig_editor = strtolower( @$mosConfig_editor );

if (file_exists( "$mosConfig_absolute_path/editor/editor.$mosConfig_editor.php" ))
{
	require_once( "$mosConfig_absolute_path/editor/editor.$mosConfig_editor.php" );
}
else
{
	require_once( "$mosConfig_absolute_path/editor/editor.htmlarea2.php" );
}
?>