<?
$webmaster = "ctn@ctnvietnam.com";
$db_host = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "ctnvietn_qlns";
// Begin config
$info['db_host'] = "localhost";
$info['db_name'] = "ctnvietn_qlns";
$info['db_username'] = "root";
$info['db_password'] = "root";
// End config
$conn = @mysql_connect($db_host, $db_username, $db_password) or die(mysql_error());
$db = @mysql_select_db($db_name, $conn) or die(mysql_error());
?>
