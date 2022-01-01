var win_h = $(window).height();
var win_w = $(window).width();
var khau_tru	=	0;
var close_count =	0;

function $$$(id) {
	return document.getElementById(id);
}
// AJAX INIT
function khoitao_ajax()
{
	var x;
	try 
	{
		x	=	new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
    	try 
		{
			x	=	new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(f) { x	=	null; }
  	}
	if	((!x)&&(typeof XMLHttpRequest!="undefined"))
	{
		x=new XMLHttpRequest();
  	}
	return  x;
}
function	Forward(url)
{
	window.location.href = url;
}
function	_postback()
{
	return void(1);
}

// icon list
function	show_mn(id)
{
	$$$('start_menu').style.display = 'none';
	$$$('icon_'+id).style.display = 'block';
}
function	hide_mn(id)
{
	$$$('icon_'+id).style.display = 'none';
}

//	new windows
var	window_current	=	0;

function	window_new(cat,cms,tt_1,tt_2)
{	
	$$$('start_menu').style.display = 'none';
	
	if (cat != window_current)
	{
		if (window_current != 0)
			window_close_2(window_current);
		
		window_current = cat;
		
		var	html	=	'';
		
		html		+=	'<div id="window_'+cat+'" class="windows">';
		html		+=	'	<div class="title" ondblclick="window_zoom(\''+cat+'\');">';
		html		+=	'		<div class="title_1"><span><img src="images/cham.jpg" /> '+tt_1+' <img src="images/cham.jpg" /> '+tt_2+'</span></div>';
		html		+=	'		<div class="title_2"> <img class="button" src="images/min.gif" onclick="window_close_2(\''+cat+'\');" /> <img class="button" src="images/zoom.gif" onclick="window_zoom(\''+cat+'\');" /> <img class="button" src="images/close.gif" onclick="window_close(\''+cat+'\');" /> &nbsp;</div>';
		html		+=	'	</div>';
		html		+=	'	<div id="sub_window_'+cat+'" class="div_1">';
		html		+=	'		<div class="newest"></div>';
		html		+=	'		<div class="content"></div>';
		html		+=	'	</div>';
		html		+=	'</div>';
		
		$$$('lg_main').innerHTML += html;
		
		dbMenu.init();

		$$$('window_'+cat).style.top = 2;
		$$$('window_'+cat).style.left = 200;
		
		$("#window_"+cat).height(win_h-52);
		$("#window_"+cat).width(win_w-188-200);
		
		$("#sub_window_"+cat).height(win_h-52-44);
		$("#sub_window_"+cat+" .newest").height( win_h - 52 - 44 - 20);
		
		$("#sub_window_"+cat+" .content").animate(
			{
				width : win_w - 188 - 200 - 200 - 50,
				height : win_h - 52 - 44 - 20
			}
		);
	
		$("#window_"+cat).fadeIn('slow');
		$("#window_"+cat).draggable(
			{
			handle: ".title",
			opacity: 1,
			cursor: "move"
			}
		);
		window_get_newest(cat);
	}
	
	if (cms == 0)	window_get_top(cat);
	else			window_get_cms(cms,cat);
}

function	window_zoom(cat)
{
	if ( ($("#window_"+cat).width() < win_w) )
	{
		khau_tru	=	win_w - $("#window_"+cat).width();
		$("#window_"+cat).animate({
			left:0,
			top:0,
			width:win_w
		}, 500 );
		$("#sub_window_"+cat+" .content").animate({
			width:$("#sub_window_"+cat+" .content").width() + khau_tru
		}, 500);
	}
	else
	{
		$("#window_"+cat).animate({
			left:188,
			top:0,
			width:win_w-khau_tru
		}, 500 );
		$("#sub_window_"+cat+" .content").animate({
			width:$("#sub_window_"+cat+" .content").width() - khau_tru
		}, 500);
	}
}
function	contact_submit(frm)
{
	if (frm.txt_ten.value == "")
	{
		alert("Vui lòng nhập tên");
		frm.txt_ten.focus();
	}
	else if (frm.txt_email.value == "")
	{
		alert("Vui lòng nhập email");
		frm.txt_email.focus();
	}
	else if (frm.txt_chu_de.value == "")
	{
		alert("Vui lòng nhập Chủ đề");
		frm.txt_chu_de.focus();
	}
	else if (frm.txt_noi_dung.value == "")
	{
		alert("Vui lòng nhập nội dung");
		frm.txt_noi_dung.focus();
	}
	else 
	{
		var obj	= $("#contact_status");
		obj.html('<center><hr size="1" color="#003333" /><img src="images/65.gif"><br>Email is sending ...</center>');

		var	query	=	"act=save_contact&ten="+encodeURIComponent(frm.txt_ten.value)+"&email="+encodeURIComponent(frm.txt_email.value)+"&chu_de="+encodeURIComponent(frm.txt_chu_de.value)+"&noi_dung="+encodeURIComponent(frm.txt_noi_dung.value);
		var http = khoitao_ajax();
		try
		{
			http.open("POST", "action.php");
			http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			http.setRequestHeader("Cache-control", "no-cache");		
			http.onreadystatechange = function()
			{
				if (http.readyState == 4)
				{
					if (http.status == 200)
					{
						obj.html(http.responseText);
					}
				}
			}
			http.send(query);
		}
		catch (e)
		{
		}
	}
	return false;
}

function	register_submit(frm)
{
	if (frm.txt_ten.value == "")
	{
		alert("Vui lòng nhập tên");
		frm.txt_ten.focus();
	}
	else if (frm.txt_email.value == "")
	{
		alert("Vui lòng nhập email");
		frm.txt_email.focus();
	}
	else if (frm.txt_dien_thoai.value == "")
	{
		alert("Vui lòng nhập số điện thoại");
		frm.txt_dien_thoai.focus();
	}
	else if (frm.txt_dia_chi.value == "")
	{
		alert("Vui lòng nhập địa chỉ");
		frm.txt_dia_chi.focus();
	}
	else if (frm.txt_cmnd.value == "")
	{
		alert("Vui lòng nhập số CMND.");
		frm.txt_cmnd.focus();
	}
	else if (frm.txt_username.value == "")
	{
		alert("Vui lòng nhập tên đăng nhập.");
		frm.txt_username.focus();
	}
	else if (frm.txt_password.value == "")
	{
		alert("Vui lòng nhập mật khẩu.");
		frm.txt_password.focus();		
	}
	else if (frm.txt_password.value != frm.txt_password_2.value)
	{
		alert("Mật khẩu xác nhận không đúng với mật khẩu đã nhập");
		frm.txt_password_2.focus();
	}
	else 
	{
		var obj	= $("#register_status");
		obj.html('<center><hr size="1" color="#003333" /><img src="images/65.gif"></center>');

		var	query	=	"act=do_register&txt_ten="+encodeURIComponent(frm.txt_ten.value)+"&txt_email="+encodeURIComponent(frm.txt_email.value)+"&txt_dien_thoai="+encodeURIComponent(frm.txt_dien_thoai.value)+"&txt_dia_chi="+encodeURIComponent(frm.txt_dia_chi.value)+"&txt_cmnd="+encodeURIComponent(frm.txt_cmnd.value)+"&txt_username="+encodeURIComponent(frm.txt_username.value)+"&txt_password="+encodeURIComponent(frm.txt_password.value)+"&txt_password_2="+encodeURIComponent(frm.txt_password_2.value);
		var http = khoitao_ajax();
		try
		{
			http.open("POST", "action.php");
			http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			http.setRequestHeader("Cache-control", "no-cache");		
			http.onreadystatechange = function()
			{
				if (http.readyState == 4)
				{
					if (http.status == 200)
					{
						if (http.responseText == "OK")
						{
							alert("Bạn đã đăng ký thành công. Vui lòng đăng nhập để sử dụng các dịch vụ của Website.");
							window_close("register");
						}
						else
							obj.html(http.responseText);
						
					}
				}
			}
			http.send(query);
		}
		catch (e)
		{
		}
	}
	return false;
}
function	user_login(frm)
{
	var	query	=	"act=user_login&username="+encodeURIComponent(frm.txt_username.value)+"&password="+encodeURIComponent(frm.txt_password.value);
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					if (http.responseText == "error")
					{
						alert("Tên đăng nhập & mật khẩu của bạn vừa nhập không chính xác.");
					}
					else
					{
						$('#user_information').html(http.responseText);
					}
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
	return false;
}
function	user_logout()
{
	var	query	=	"act=user_logout";
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					alert("Cảm ơn bạn đã ghé thăm website Cybercare.");
					window.location.reload(true);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
	return false;
}
function	load_contact_form()
{
	var obj	= $("#window_contact .div_1 .content");
	obj.html('<center><br>Form is building ...<br><br><img src="images/65.gif"></center>');

	var	query	=	"act=get_contact_form";
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					obj.html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}
function	load_register_form()
{
	var obj	= $("#window_register .div_1 .content");
	obj.html('<center><br>Form is building ...<br><br><img src="images/65.gif"></center>');

	var	query	=	"act=get_register_form";
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					obj.html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}
function	window_contact()
{
	$$$('start_menu').style.display = 'none';

	cat = "contact";
	
	if (window_current != cat)
	{
		if (window_current != 0)
			window_close_2(window_current);
		
		window_current = cat;
		
		var	html	=	'';
		
		html		+=	'<div id="window_'+cat+'" class="windows">';
		html		+=	'	<div class="title">';
		html		+=	'		<div class="title_1"><span><img src="images/cham.jpg" /> Contact </span></div>';
		html		+=	'		<div class="title_2"> <img class="button" src="images/close.gif" onclick="window_close(\''+cat+'\');" /> &nbsp;</div>';
		html		+=	'	</div>';
		html		+=	'	<div id="sub_window_'+cat+'" class="div_1">';
		html		+=	'		<div class="content" style="width:100%;"></div>';
		html		+=	'	</div>';
		html		+=	'</div>';
		
		$$$('lg_main').innerHTML += html;
		
		dbMenu.init();
		
		$$$('window_'+cat).style.top	= (win_h / 2) - 250;
		$$$('window_'+cat).style.left	= (win_w / 2) - (680/2);
	
		$("#window_"+cat).fadeIn('slow',load_contact_form());
		$("#window_"+cat).draggable(
			{
			handle: ".title",
			opacity: 1,
			cursor: "move"
			}
		);
	}
}
function	window_register()
{
	$$$('start_menu').style.display = 'none';
	cat = "register";
	
	if (window_current != cat)
	{
		if (window_current != 0)
			window_close_2(window_current);
		
		window_current = cat;
		
		var	html	=	'';
		
		html		+=	'<div id="window_'+cat+'" class="windows">';
		html		+=	'	<div class="title">';
		html		+=	'		<div class="title_1"><span><img src="images/cham.jpg" /> Đăng ký thành viên </span></div>';
		html		+=	'		<div class="title_2"> <img class="button" src="images/close.gif" onclick="window_close(\''+cat+'\');" /> &nbsp;</div>';
		html		+=	'	</div>';
		html		+=	'	<div id="sub_window_'+cat+'" class="div_1">';
		html		+=	'		<div class="content" style="width:100%;"></div>';
		html		+=	'	</div>';
		html		+=	'</div>';
		
		$$$('lg_main').innerHTML += html;
		
		dbMenu.init();
		
		$$$('window_'+cat).style.top	= (win_h / 2) - 250;
		$$$('window_'+cat).style.left	= (win_w / 2) - (680/2);
	
		$("#window_"+cat).fadeIn('slow',load_register_form());
		$("#window_"+cat).draggable(
			{
			handle: ".title",
			opacity: 1,
			cursor: "move"
			}
		);
	}
}
function	window_close(cat)
{
	window_current = 0;
	close_count++;
	
	var exit_style = new Array(4);
	exit_style[0] = "left";
	exit_style[1] = "right";
	exit_style[2] = "up";
	exit_style[3] = "down";
	
	$("#window_"+cat).toggle("drop", { 
        direction: exit_style[close_count % 4]
    }, 
    350, function() {window_close_2(cat);} );
	window_min(cat,"remove");
}
function	window_close_2(cat)
{
	window_current = 0;
	$("#window_"+cat).remove();
}
function	window_forum()
{	
	$$$('start_menu').style.display = 'none';
	
	cat = "forum";
	
	if (cat != window_current)
	{
		if (window_current != 0)
			window_close_2(window_current);
		
		window_current = cat;
		
		var	html	=	'';
		
		html		+=	'<div id="window_'+cat+'" class="windows">';
		html		+=	'	<div class="title" ondblclick="window_zoom(\''+cat+'\');">';
		html		+=	'		<div class="title_1"><span><img src="images/cham.jpg" /> CyberCare <img src="images/cham.jpg" /> Forum</span></div>';
		html		+=	'		<div class="title_2"><img class="button" src="images/zoom.gif" onclick="window_zoom(\''+cat+'\');" /> <img class="button" src="images/close.gif" onclick="window_close(\''+cat+'\');" /> &nbsp;</div>';
		html		+=	'	</div>';
		html		+=	'	<div id="sub_window_'+cat+'" class="div_1">';
		html		+=	'		<div style="height:15px;line-height:15px;text-align:left;color:#fff;">Mở <a href="http://www.cybercare.vn/forum/" target="_blank"><b>forum</b></a> bằng cửa sổ mới</div>';
		html		+=	'		<div class="forum clearfix"><iframe width="100%" src="http://www.cybercare.vn/forum/" frameborder="0"></iframe></div>';
		html		+=	'	</div>';
		html		+=	'</div>';
		
		$$$('lg_main').innerHTML += html;
		
		dbMenu.init();
		
		$$$('window_'+cat).style.top = 2;
		$$$('window_'+cat).style.left = 200;
		
		$("#window_"+cat).height(win_h-52);
		$("#window_"+cat).width(win_w-188-200);
		
		$("#sub_window_"+cat).height(win_h-52-44);
		$("#sub_window_"+cat+" .forum").height( win_h - 52 - 44 - 20 - 18);
		$("#sub_window_"+cat+" .forum iframe").height( win_h - 52 - 44 - 20 - 18 - 6);
	
		$("#window_"+cat).fadeIn('slow');
		$("#window_"+cat).draggable(
			{
				handle: ".title",
				opacity: 1,
				cursor: "move"
			}
		);
	}
}


function	window_get_newest(cat)
{
	var obj	= $("#window_"+cat+" .div_1 .newest");
	obj.html('<center><br>List is building ...<br><br><img src="images/65.gif"></center>');

	var	query	=	"act=window_get_newest&cat="+cat;
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					obj.html(http.responseText);
					window_min(cat,"add");
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}
function	window_get_top(cat)
{
	var obj	= $("#window_"+cat+" .div_1 .content");
	obj.html('<center><br>Content is loading ...<br><br><img src="images/65.gif"></center>');

	var	query	=	"act=window_get_top&cat="+cat;
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					obj.html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}
function	window_get_content(cat,page)
{
	var obj	= $("#window_"+cat+" .div_1 .content");
	obj.html('<center><br>Content is loading ...<br><br><img src="images/65.gif"></center>');

	var	query	=	"act=window_get_content&cat="+cat+"&page="+page;
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					obj.html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}
function	window_get_search(cat,search)
{
	var obj	= $("#window_"+cat+" .div_1 .content");
	obj.html('<center><br>Content is loading ...<br><br><img src="images/65.gif"></center>');

	var	query	=	"act=window_get_search&cat="+cat+"&search="+search;
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					obj.html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}
function	window_get_cms(id,cat)
{
	var obj	= $("#window_"+cat+" .div_1 .content");
	obj.html('<center><br>Content is loading ...<br><br><img src="images/65.gif"></center>');

	var	query	=	"act=window_get_cms&id="+id;
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
    	http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					obj.html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}

function	window_resize()
{
	win_h	= $(window).height();
	win_w	= $(window).width();
	
	$('#lg_main').height(win_h);
	$('#lg_main').width(win_w);
	$('#icon_list').height(win_h - 75);
	$('#right_block').height(win_h - 49);
}

function	start_menu()
{
	if ($$$('start_menu').style.display == 'block')
	{
		// $$$('start_menu').style.display = 'none';
		$('#start_menu').fadeOut('fast');
	}
	else
	{
		//$$$('start_menu').style.display = 'block'
		$('#start_menu').fadeIn('slow');
	}
}

function	window_min(cat,func)
{
	var	query	=	"act=window_min&func="+func+"&cat="+cat;
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
		http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					$("#window_min").html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
	}
}

//	đồng hồ

now	=	new Date();
var now, hrs, min, sec, clkv;
var spc = (navigator.appName=="Netscape")? "  ":"       ";

function runclk()
{
	now = new Date();
	hrs = now.getHours();
	min = now.getMinutes();
	sec = now.getSeconds();
	// clkv=((hrs >12) ? hrs-12:hrs)+"";
	clkv = hrs+"";
	clkv = ((clkv.length==1)? "0"+clkv :clkv);
	clkv += ((min < 10) ? ":0" : ":") + min;
	clkv += ((sec < 10) ? ":0" : ":") + sec;
	// clkv += (hrs >= 12) ? " P.M." : " A.M.";
	clkv = spc+clkv;
	$$$('clock_value').innerHTML = clkv;
	window.status = "Clock "+clkv;
}

window.onload	=	function()
{
	setInterval('runclk()',1000);
		win_h = $(window).height();
		win_w = $(window).width();
	window_resize();
}

sM_current = '';

function	sM_show(obj,id)
{
	$(obj).addClass("hover");
	$("#"+id).show();
}
function	sM_hide(obj,id)
{
	$(obj).removeClass("hover");
	$("#"+id).hide();
}

var myWindow;
function openCenteredWindow(objA)
{
    var width = 500;
    var height = 300;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
	var windowFeatures = "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top + ",screenX=" + left + ",screenY=" + top;
	myWindow = window.open(objA.toString(), "subWind", windowFeatures);
	return false;
}

function	quen_mat_khau_frm()
{
	var	query	=	"act=get_quen_mk";
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
		http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					$("#quen_mat_khau").html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
		
	}
}
function	do_quen_mk(frm)
{
	if (frm.txt_username.value == "")
	{
		alert("Vui lòng nhập tên đăng nhập.");
		frm.txt_username.focus();
		return false;
	}
	else if (frm.txt_email.value == "")
	{
		alert("Vui lòng nhập email");
		frm.txt_email.focus();
		return false;
	}
	else if (frm.txt_cmnd.value == "")
	{
		alert("Vui lòng nhập số CMND");
		frm.txt_cmnd.focus();
		return false;
	}
	
	var	query	=	"act=do_quen_mk&txt_username="+encodeURIComponent(frm.txt_username.value)+"&txt_email="+encodeURIComponent(frm.txt_email.value)+"&txt_cmnd="+encodeURIComponent(frm.txt_cmnd.value);
	var http = khoitao_ajax();
	try
	{
		http.open("POST", "action.php");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		http.setRequestHeader("Cache-control", "no-cache");		
		http.onreadystatechange = function()
		{
			if (http.readyState == 4)
			{
				if (http.status == 200)
				{
					$("#quen_mk_status").html(http.responseText);
				}
			}
		}
		http.send(query);
	}
	catch (e)
	{
		
	}
	
	return false;
}