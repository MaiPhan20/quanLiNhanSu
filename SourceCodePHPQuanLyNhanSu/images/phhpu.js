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
		html		+=	'		<div class="title_1"><span><img src="cham.jpg" /> '+tt_1+' <img src="cham.jpg" /> '+tt_2+'</span></div>';
		html		+=	'		<div class="title_2"> <img class="button" src="min.gif" onclick="window_close_2(\''+cat+'\');" /> <img class="button" src="zoom.gif" onclick="window_zoom(\''+cat+'\');" /> <img class="button" src="close.gif" onclick="window_close(\''+cat+'\');" /> &nbsp;</div>';
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

function	window_resize()
{
	win_h	= $(window).height();
	win_w	= $(window).width();
	
	$('#lg_main').height(win_h);
	$('#lg_main').width(win_w);
	$('#icon_list').height(win_h - 75);
	$('#right_block').height(win_h - 49);
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

