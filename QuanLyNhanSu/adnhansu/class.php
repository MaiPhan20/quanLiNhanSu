<?php
// Begin the first session
session_start();

require_once("../sources/config.php");

// Main action
$DIALOOSEWEB->admin = new dialoose_admin();
$DIALOOSEWEB->admin->DB_connect();
// End

$DIALOOSEWEB->admin->file_not_permit = "B&#7841;n kh&#244;ng c&#243; quy&#7873;n s&#7917; d&#7909;ng file n&#224;y.";

mt_srand ((double) microtime() * 1000000);
$sec_code = mt_rand(100000,999999);
$sec_code_md5 = md5( $sec_code );

if ( $_GET["view"] == "image" && $_GET["code"] )
{
	$DIALOOSEWEB->admin->security_gd( $sec_code, $_GET["code"] );
	exit;
}


//===================================================
// Admin class
//===================================================

class dialoose_admin
{
	//===================================================
	// DB Connector
	//===================================================
	
	function DB_connect()
	{
		global $DB, $info;
				
		@mysql_connect("{$info['db_host']}", "{$info['db_username']}", "{$info['db_password']}") or die ("Could not connect"); 
		@mysql_select_db("{$info['db_name']}") or die ("Could not select database");	
		
				

		
	}
	
	
	//===================================================
	// Login
	//===================================================
	
	function login()
	{
		if ( $_GET["ns"] == "login" )
		{
			$name =     addslashes($_POST['name']);
			$password = md5(md5($_POST['password']));
			
			if ( $_SESSION["request"] )
			{
				$request = $_SESSION['request'];
			}
			else
			{
				$request = $_POST['request'];
			}
			
			$_SESSION["request"] = $request;
			
			$sql = @mysql_query("SELECT * FROM qlns_administrator WHERE ctn_username='$name'");
			$result = @mysql_fetch_array( $sql );
	


			if ( @mysql_num_rows( $sql ) <= 0 )
			{
				print "<script> alert ('Username and Password Chua Chinh Xac') </script>";
				$_SESSION["member_id"] = 0;
			}
			
			else if ( $result["ctn_password"] != $password ) 	
		{
				print "<script> alert ('Username and Password Chua Chinh Xac') </script>";
				$_SESSION["member_id"] = 0;
			}
			else if ( $result["ctn_level"] != 1 )
		{
				print "<script> alert ('Username and Password Chua Chinh Xac') </script>";
				$_SESSION["member_id"] = 0;
			}
			else
			{
				$_SESSION["member_id"] = $result["ctn_id"];
				
				if ( $request )
				{
					$request = urldecode($request);
					
					header("location: ". $request);
				}
				else
				{
					header("location: index.php");
				}
			}
		
		}
		
		$is_no_member = @mysql_query("SELECT * FROM qlns_administrator");
		
		if ( @mysql_num_rows( $is_no_member ) > 0 )
		{
			$this->login_page();
		}
		else
		{

		}
	}
	
	//===================================================
	// Main page
	//===================================================
	
	function main()
	{		
				print '

<LINK href="http://ctnvietnam.com/images/logoctn.png" rel="shortcut icon">
<META content=http://ctnvietnam.com/images/logoctn.png name="SHORTCUT ICON">	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

		<html>

			<head>

				<title>T&#7893;ng C??ng Ty C&#7893; Ph&#7847;n &#272;&#7847;u T&#432; CTN Vi&#7879;t Nam Administrator CP</title>

			</head>
               
			<frameset cols="185,*" frameborder="no" border="0" framespacing="0">

				<frame name="menu" target="main" src="menu.php">

				<frame name="body" src="control.php">

				<noframes><body><p>This page uses frames, but your browser doesnt support them.</p></body></noframes>

			</frameset>

		</html>



';
	}
	
	
	//===================================================
	// Login page
	//===================================================
	
	function login_page()
	{
		global $sec_code_md5; 

echo("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 3.2 Final//EN\">
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<link rel='stylesheet' type='text/css' media='screen, projection' href='../images/login.css'>
<title>T&#7893;ng c??ng ty c&#7893; ph&#7847;n CTN Vi&#7879;t Nam Login</title>
<META http-equiv=content-type content=\"text/html; charset=utf-8\">
<NOSCRIPT><IFRAME SRC:*.html></IFRAME></NOSCRIPT>
<script type='text/javascript' src='../images/menuright.js'></script>
<script charset='utf-8' id='injection_graph_func' src='../images/injection_graph_func.js'></script></head><body>
<center>
	<div id='fw_frame' class='clearfix'>
		<div id='frame_1'>
			<h3>Khu v???c d??nh cho ng?????i qu???n tr???</h3>
			<div class='content'>
				<center>
				<table width='98%' border='0' cellpadding='0' cellspacing='0'>
				  <tbody><tr>
					<td align='left'><img src='../images/login.png'></td>
					<td align='left'>
						<b>????? website ho???t ?????ng t???t :</b>
						<ol>
						  <li><span class='designwebissmalldwd'>B???t cookies tr??nh duy???t</li>
						  <li><span class='designwebissmalldwd'>B???t javascript tr??nh duy???t</li>
						  <li><span class='designwebissmalldwd'>Duy???t t???t tr??n IE7 v?? FF2 tr??? l??n</li>
				    	</ol>
					</td>
				  </tr>
				</tbody></table>
				</center>
			</div>
		</div>
		<div id='frame_2'>
			<h3>????ng nh???p</h3>
			<div class='content'>
				<center>
<SCRIPT language=javascript>
function verifyForm()
	{
		with(document.all.mainform)
		{	
			if(name.value == \"\")
			{
					alert('B???n h??y nh???p t??n t??i kho???n')
					name.focus()
					return false
			}
			if(password.value == \"\")
			{
					alert('B???n H??y nh???p M???t kh???u ????ng nh???p')
					password.focus()
					return false
			}
	}	
}
</SCRIPT>");



		print '
<form action="index.php?ns=login" name="mainform" onsubmit="return verifyForm();" method="post">
<input type="hidden" name="request" value="'. urlencode($_SERVER["REQUEST_URI"]) .'" >
<table width="90%" border="0" cellpadding="5" cellspacing="0">
					  <tbody><tr>
						<td width="35%" align="right"><span class="designwebissmalldwd"> T??n ng?????i d??ng :</td>
						<td width="65%" align="left"><input class="inputbox" style="width: 80%;" autocomplete="off" name="name" type="text"></td>
					  </tr>
					  <tr>
						<td align="right"><span class="designwebissmalldwd"> M???t kh???u :</td>
						<td align="left"><input class="inputbox" style="width: 80%;" name="password" type="password"></td>
					  </tr>
					  <tr>
						<td></td>
						<td align="left"><input class="button" value="????ng nh???p" type="submit"></td>
					  </tr>
					  <tr>
						<td colspan="2" align="center"><span class="designwebissmallhd"> Vui l??ng ????ng nh???p v??o h??? th???ng !</font></td>
					  </tr>
					</tbody></table>
				</form>
				</center>
			</div>
		</div>
	</div>
	<div class="clearfix" id="copyright">
<b><span class="designwebissmall">Design by CTN IT .<a href="http://www.ctnvietnam.com"><span class="designwebissmall">C??ng ty c??? ph???n v?? ?????u t?? CTN Vi???t Nam</a></b><br>
<span class="designwebissmall">?????a Ch??? : 261 H???i Ph??ng Qu???n Thanh Kh?? - Th??nh Ph??? ???? N???ng<br>
<span class="designwebissmall"> Website: <a href="http://www.ctnvietnam.com"><span class="designwebissmall">http://ctnvietnam.com </a> - <a href="http://www.ctnvietnam.com"> <span class="designwebissmall"> http://ctnvietnam.vn </a>
</div></center>
</body></html>


';
	}

	

	
	
	//===================================================
	// Main page
	//===================================================
	
	function load_member()
	{
		global $member;
		
		$member_id = addslashes($_SESSION['member_id']);
		$sql = @mysql_query("SELECT * FROM ctn_administrator WHERE adm_id='{$member_id}'");
		$member = @mysql_fetch_array($sql);
	}
	
	
	//===================================================
	// Check user permission
	//===================================================
	
	function check_user()
	{
		if ( $_SESSION["member_id"] )
		{
			return TRUE;	
		}
		else
		{
			return FALSE;
		}	
		
		
	}
	}

    
?>