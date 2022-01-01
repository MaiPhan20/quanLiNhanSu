<?php

define("IN_LONGHIEN",true);
require_once("class.php");
$DIALOOSEWEB->admin->load_member();
require_once("AdminNavigation.php");

		$member_id = addslashes($_SESSION['member_id']);

if ( $_GET["ctnvietnam"] == "change_profile" )
{
$sql = @mysql_query("SELECT * FROM qlns_administrator WHERE ctn_id='{$member_id}'");
$result = @mysql_fetch_array( $sql );

if ( $_GET["view"] == "do" )
{
	$old_pwd = md5(md5($_POST["old_pwd"]));
	$realname = addslashes($_POST["realname"]);
	$email = addslashes($_POST["email"]);
	$yahoo = addslashes($_POST["yahoo"]);
	$mobile = addslashes($_POST["mobile"]);

	if ( $result["ctn_password"] == $old_pwd )
	{
	       @mysql_query("UPDATE qlns_administrator SET ctn_name='{$realname}', ctn_email='{$email}',  ctn_yahoo='{$yahoo}', ctn_mobile='{$mobile}' WHERE ctn_id='{$member_id}'");
           print "<center><font color=red size=2><br><br><br><B>&#272;&#227; thay &#273;&#7893;i th&#244;ng tin c&#7911;a b&#7841;n th&#224;nh c&#244;ng.</b></font></center>";
exit;
	}
	else
	{
		print "<center><font color=red size=2><br><br><br><B>Vui l&#242;ng nh&#7853;p l&#7841;i m&#7853;t kh&#7849;u truy nh&#7853;p c&#7911;a b&#7841;n &#273;&#7875; thay &#273;&#7893;i th&#244;ng tin.</b></font></center>";
exit;
	}

	
}

$sql = @mysql_query("SELECT * FROM qlns_administrator WHERE ctn_id='{$member_id}'");
$result = @mysql_fetch_array( $sql );

print <<<EOF
<form action="members.php?ctnvietnam=change_profile&view=do" method="post" enctype="multipart/form-data">

<TABLE height=100><TBODY><TR><TD></TD></TR></TBODY></TABLE>


<TABLE  style="BORDER-BOTTOM: #a6b0c9 1px solid; BORDER-LEFT: #a6b0c9 1px solid; BORDER-RIGHT: #a6b0c9 1px solid; BORDER-TOP: #a6b0c9 1px solid" cellSpacing=0 cellPadding=1 align="center" width=350 bgColor=#f5f5f5 border=0>
                          <TBODY>
 <tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif"  colSpan=6>
<center><FONT color=#ffffff><B>Th&#244;ng tin c&#7911;a b&#7841;n</B></center></font></TD></TR>
                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>H&#7885; v&#224; t&#234;n
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" name="realname" value="{$result['adm_name']}" onkeyup=initTyper(this); size="23">
                                </TD></TR>
EOF;



		


print <<<EOF







                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>M&#7853;t kh&#7849;u &#273;&#259;ng nh&#7853;p
                                </B></TD>
                                <TD colSpan=2>
                                <input type="password" name="old_pwd" size="23">
                                </TD></TR>


                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>&#272;i&#7879;n tho&#7841;i
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" name="mobile" value="{$result['adm_mobile']}" size="23">
                                </TD></TR>



                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>Nick Y!M
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" name="yahoo" value="{$result['adm_yahoo']}" size="23">
                                </TD></TR>

                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>Email
                                </B></TD>
                                <TD colSpan=2>
                                <input type="text" name="email" value="{$result['adm_email']}" size="23">
                                </TD></TR>


                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                </TD>
                                <TD colSpan=2>
                                <input type="submit" name="submit" value="Submit">
                                </TD></TR>

				</form>
				</TBODY></TABLE>



EOF;

}

if ( $_GET["ctnvietnam"] == "change_pwd" )
{
//===================================================
// Begin change your password
//===================================================


if ( $_GET["view"] == "do" )
{
	$old_pwd = md5(md5($_POST["old_pwd"]));
	$new_pwd = md5(md5($_POST["new_pwd"]));
	$verify_new_pwd = md5(md5($_POST["verify_new_pwd"]));

	$sql = @mysql_query("SELECT * FROM qlns_administrator WHERE ctn_id='{$member_id}'");
	$result = @mysql_fetch_array( $sql );
	
	if ( $result["ctn_password"] != $old_pwd )
	{
		print "<center><font color=red size=2><br><br><br><B>M&#7853;t kh&#7849;u c&#361; kh&#244;ng &#273;&#250;ng n&#234;n th&#244;ng tin ch&#432;a &#273;&#432;&#7907;c thay &#273;&#7893;i.</B></font></center>";	
	}
	else if ( $new_pwd != $verify_new_pwd )
	{
		print "<center><font color=red size=2><br><br><br><B>X&#225;c nh&#7853;n l&#7841;i m&#7853;t kh&#7849;u m&#7899;i kh&#244;ng &#273;&#7891;ng nh&#7845;t.</B></font></center>";
	}
	else
	{
		@mysql_query("UPDATE qlns_administrator SET ctn_password='{$new_pwd}' WHERE ctn_id='{$member_id}'");
		
		print "<center><font color=red size=2><br><br><br><B>&#272;&#227; thay &#273;&#7893;i m&#7853;t kh&#7849;u th&#224;nh c&#244;ng.</B></font></center>";
exit;
	}
}

print <<<EOF
<form action="members.php?ctnvietnam=change_pwd&view=do" method="post" enctype="multipart/form-data">
<TABLE height=100><TBODY><TR><TD></TD></TR></TBODY></TABLE>


<TABLE  style="BORDER-BOTTOM: #a6b0c9 1px solid; BORDER-LEFT: #a6b0c9 1px solid; BORDER-RIGHT: #a6b0c9 1px solid; BORDER-TOP: #a6b0c9 1px solid" cellSpacing=0 cellPadding=1 align="center" width=350 bgColor=#f5f5f5 border=0>
                          <TBODY>
 <tr bgcolor="#4B9BE0"> 
<TD background="../images/headerbg.gif"  colSpan=6>
<center><FONT color=#ffffff><B>&#272;&#7893;i m&#7853;t kh&#7849;u</B></center></font></TD></TR>
                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>M&#7853;t kh&#7849;u c&#361;
                                </B></TD>
                                <TD colSpan=2>
                                <input  type="password" name="old_pwd" onkeyup=initTyper(this); size="23">
                                </TD></TR>


                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>M&#7853;t kh&#7849;u m&#7899;i
                                </B></TD>
                                <TD colSpan=2>
                                <input type="password" name="new_pwd" size="23">
                                </TD></TR>


                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                <B>X&#225;c nh&#7853;n l&#7841;i m&#7853;t kh&#7849;u m&#7899;i
                                </B></TD>
                                <TD colSpan=2>
                                <input type="password" name="verify_new_pwd" size="23">
                                </TD></TR>



                                <TR>
                                <TD vAlign=top height=22>&nbsp;&nbsp;
                                </TD>
                                <TD colSpan=2>
                                <input type="submit" name="submit" value="Submit">
                                </TD></TR>

				</form>
				</TBODY></TABLE>
EOF;
//===================================================
// End change your password
//===================================================
}
 ?>



