<?php 
	session_start();
    session_register("user");
    $_SESSION["user"]=$user;
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link href="http://designwebvn.com/images/logodesignwebvntqv.png" rel="shortcut icon">
<meta content="http://designwebvn.com/images/logodesignwebvntqv.png" name="SHORTCUT ICON">
<META http-equiv=Page-Exit 
content=progid:DXImageTransform.Microsoft.GradientWipe(duration=.3)>
<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<META content=C# name=CODE_LANGUAGE>
<META content=JavaScript name=vs_defaultClientScript>
<META content=http://schemas.microsoft.com/intellisense/ie5 
name=vs_targetSchema>
<meta name="ROBOTS" content="index, follow">
	
 <title>CTN VIỆT NAM - QUẢN LÝ NHÂN SỰ  </title>    
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src='images/menuright.js'></script>	
		<script type="text/javascript" src="images/mootools.11_jsmin,mootools_ext,planet"></script>
<link rel="stylesheet" type="text/css" media="all" href="images/resetplanet.css">
</head>
      <body>
        <div id="planet"><img src="images/planet_half.png" alt=""></div>
<div id="message" style="display: none;">
	<div class="inner">
								</div>
</div>
<div id="control">	
	<form method="post" action="checklogin.php" id="form">
		<div id="label1" class="label">Tên đăng nhập</div>
		<div class="rounded_input">
			<input id="field1" name="nameuser"  value="" type="text">
		</div>
		<div id="label2" class="label">Mật khẩu</div>
		<div class="rounded_input">
			<input id="field2" name="passworduser" type="password">
		</div>
		<input class="button"  value="Đăng nhập" type="submit">
		<div id="forgot1" class="forgot">
			<a href="">Bạn quên mật khẩu?</a>
		</div>		
	</form>
	<div id="flagpole">
		<div id="title">Đăng nhập </div>
	</div>
			</div>
</div>
<script type="text/javascript">
			
		window.addEvent('domready', function() { 
			get_email('field1');
		});
			EventCenter.fire('domready');
</script><img style="position: fixed; top: 40%; right: 886px;" src="images/cloud.png"><div style="display: none;" id="avatar_hover"></div><div style="display: none;">
			
		    