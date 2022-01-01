// JavaScript Document

var calendar = new Object();
var dem = 0;
var s;
var bgco = "#ABCDFF";
var actChange = false;

calendar.setValue = function(change){
	var value = document.getElementById('txt_date').value;
	var sday, month, year;
	if (change) {
		actChange = true;
	}
	if (value == ''){
		var now = new Date();
		sday = now.getDate() ;
		month = now.getMonth();
		year = now.getYear();
	} else {
		sday = value.substr(0,2);
		month = value.substr(3,2);
		year = value.substr(6);
	}
	
	draw_value(sday,eval(month)-1,year);
}

function draw_value(sday,month,year){

	var num = 0;
	
	var nhuan = year%4;

	if (month == 0 || month == 2 || month == 45 || month == 6 || month == 7 || month == 9 || month == 11) {
		num = 31;
	} else if(month == 3 || month == 5 || month == 8 || month == 10 ) {
		num = 30;
	} else {
		if (month == 1 && nhuan == 0) {
			num = 29;
		} else {
			num = 28;
		}
		
	}
	var day = new Date(year,month,1);
	var dayInWeek = new Array(7,1,2,3,4,5,6);
	var dayOfWeek = dayInWeek[day.getDay()];
	
	var stt = 0;
	for(i=1; i <= 42; i++){
		if (i >= dayOfWeek){
			stt += 1;
			if (stt <= num){
				document.getElementById('day' + i).innerHTML = stt;
				if (stt == sday) { 
					document.getElementById('day' + i).bgColor = bgco;
				}
			} else {
				document.getElementById('day' + i).innerHTML = '';
			}
		} else {
			document.getElementById('day' + i).innerHTML = '';
		}
	}
	
	document.getElementById('sp_month').innerHTML = month + 1;
	document.getElementById('sp_year').innerHTML = year;
	
	
}

calendar.prev_month = function (){
	dem = 0;
	var sdate = document.getElementById('div_ngay').innerHTML;
	var month = document.getElementById('sp_month').innerHTML;
	var year = document.getElementById('sp_year').innerHTML;
	var d = new Date();
	if (sdate = ''){
		sdate = d.getDate();
	}
	if(year == '') {
		year = d.getYear();
	}
	if(month == '') {
		month = d.getMonth();
	}
	if (month == 1) {
		month = 12;
		year -= 1;
	} else {
		month -= 1;
	}
	draw_value(sdate,month-1,year)
}

calendar.next_month = function (){
	dem = 0;
	var sdate = document.getElementById('div_ngay').innerHTML;
	var month = document.getElementById('sp_month').innerHTML;
	var year = document.getElementById('sp_year').innerHTML;
	var d = new Date();
	if (sdate = ''){
		sdate = d.getDate();
	}
	if(year == '') {
		year = d.getYear();
	}
	if(month == '') {
		month = d.getMonth();
	}
	if (month == 12) {
		month = 1;
		year = eval(year) + 1;
	} else {
		month = eval(month) + 1;
	}
	draw_value(sdate,month-1,year)
}

calendar.show_item = function(){
	document.getElementById('dis_calendar').style.display = 'block';
	dem = 0;
	s = setInterval(check_timer,1000);
}

calendar.hide_item = function(){
	document.getElementById('dis_calendar').style.display = 'none';
	clearInterval(s);
	if (actChange) {
		actChange = false;
		change_date();
	}
}

calendar.select_value = function(){
	var day = document.getElementById('div_ngay').value;
	var month = document.getElementById('sp_month').innerHTML;
	var year = document.getElementById('sp_year').innerHTML;
	if (day.length == 1){
		day = '0'+day;
	}
	if (month.length == 1){
		month = '0'+month;
	}
	return day+'/'+month+'/'+year;
}

calendar.change_value = function(day){
	var ngay = day.innerHTML;
	var month = document.getElementById('sp_month').innerHTML;
	var year = document.getElementById('sp_year').innerHTML;
	if (ngay != ''){
		document.getElementById('div_ngay').value = ngay;
	}
	if (ngay.length == 1){
		ngay = '0'+ngay;
	}
	if (month.length == 1){
		month = '0'+month;
	}
	for (i= 1; i<=42; i++){
		document.getElementById('day'+i).bgColor = '';
	}
	day.bgColor = bgco;
	change_date(ngay,month,year);
}

calendar.setPosition = function(top,left){
	document.getElementById('dis_calendar').style.top = top + 'px';
	document.getElementById('dis_calendar').style.left = left + 'px';	
}

function check_timer(){
	if (dem < 10) {
		dem += 1;	
	} else {
		calendar.hide_item();
	}
}

function change_date(ngay,thang,nam){
	var strLink = window.location.href;
	var strPos = strLink.indexOf('?date=');
	if (strPos>-1){
		strLink = strLink.substr(0,strPos + 6)  + ngay + '/' + thang + '/' + nam + strLink.substr(strPos + 16);
	} else {
		strLink = strLink + "?date=" + ngay + '/' + thang + '/' + nam;	
	}
	window.location = strLink;
}