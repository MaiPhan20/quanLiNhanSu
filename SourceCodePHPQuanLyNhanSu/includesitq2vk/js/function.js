// JavaScript Document

function main_m_over(menu){
	menu.style.color = "#FF3333";
}

function main_m_out(menu){
	menu.style.color = "";
}

function load_position(){
	var div_left = document.getElementById('div_adv_left');
	var div_right = document.getElementById('div_adv_right');
	
	var m_left = document.getElementById('tb_main').offsetLeft - div_left.offsetWidth - 5;
	
	div_left.style.left = m_left  + 'px';
	div_right.style.left = m_left + document.getElementById('tb_main').offsetWidth + div_left.offsetWidth + 10 + 'px';
	div_left.style.top = (screen.availHeight - div_left.offsetHeight)/2 + 'px';
	div_right.style.top = (screen.availHeight - div_left.offsetHeight)/2 + 'px';
	setInterval(set_avd_position,20);
}

function set_avd_position(){
	var div_left = document.getElementById('div_adv_left');
	var div_right = document.getElementById('div_adv_right');
	var cur_y = div_left.offsetTop;
	var y = document.documentElement.scrollTop;
	
	if (cur_y != y){
		if (cur_y > y) {
			var i = cur_y - y;
			if (i > 70){
				cur_y = cur_y - 20;
			} else if(i > 50 && i < 70) {
				cur_y = cur_y - 4;
			} else if(i > 30 && i < 50) {
				cur_y = cur_y - 3;
			} else if(i > 10 && i < 30) {
				cur_y = cur_y - 2;
			} else {
				cur_y = cur_y - 1;
			}
			
			if (cur_y < y) {
				cur_y = y;
			}
		} else {
			var i = y - cur_y ;
			if (i > 70){
				cur_y = cur_y + 20;
			} else if(i > 50 && i < 70) {
				cur_y = cur_y + 4;
			} else if(i > 30 && i < 50) {
				cur_y = cur_y + 3;
			} else if(i > 10 && i < 30) {
				cur_y = cur_y + 3;
			} else {
				cur_y = cur_y + 1;
			}
			if (cur_y > y) {
				cur_y = y;
			}
		}
		
		div_left.style.top = cur_y + 'px';
		div_right.style.top = cur_y + 'px';
	}
	
}

function change_tab(act,sub_id){
	
	var strID = document.getElementById('txt_id').value;
	while(strID != "") {
		var pos = strID.indexOf("|");
		var id = strID.substr(0,pos);
		strID = strID.substr(pos+1);
		document.getElementById('par_' + id).bgColor = "#FFFFFF";
		document.getElementById('par_' + id).style.color = "#0672b5";
		document.getElementById('sub_' + id).style.display = "none";
	}
	act.bgColor = "";
	act.style.color = '#ee1616';
	document.getElementById('sub_' + sub_id).style.display = "block";
}

function search_item(){
	var strValue = document.getElementById('txtSearch').value;
	if (strValue != "") {
		window.location = "?mod=dCBpIG0gayBpIGUgbQ==&value="+strValue;
	} else {
		alert("Bạn phải nhập từ khóa cần tìm!");	
	}
}

function pressEnter(e){
	if (e.keyCode == 13) {
		search_item();
	}
}