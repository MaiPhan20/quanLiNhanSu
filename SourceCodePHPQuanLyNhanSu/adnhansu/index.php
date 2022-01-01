<?php

require_once("class.php");

if ( $_GET["ns"] == "logout" )
{
$_SESSION["member_id"] = 0;
}
if ( ! $_SESSION["member_id"] )
{
	$DIALOOSEWEB->admin->login();
}
else
{
switch ( intval($_GET["ns"]) )
	{
	
		default:
			$DIALOOSEWEB->admin->main();
		break;
	}
}
    
?>