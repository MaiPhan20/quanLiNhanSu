var sf_mess_lib = {
	loadCss: function (url) {
		var css = document.createElement('link');
		css.setAttribute('rel', 'stylesheet');
	
		css.setAttribute('href', url);
		document.getElementsByTagName('head')[0].appendChild(css);
	},
	
	getElement: function (id) {
		return document.getElementById(id);
	}
}

var sf_mess_browser = {};
sf_mess_browser.ieVersion = /msie (\d+)/.exec(navigator.userAgent.toLowerCase());
sf_mess_browser.higherThanIE6 = sf_mess_browser.ieVersion && parseInt(sf_mess_browser.ieVersion[1]) > 6;
sf_mess_browser.onQuirkMode = document.compatMode && document.compatMode.indexOf('Back') == 0;

if(sf_mess_browser.ieVersion && !(sf_mess_browser.higherThanIE6)) {
	document.execCommand("BackgroundImageCache", false, true);
}
var SF_MESS_FORM_NAME			= "SfMessForm";
var SF_MESS_WRAP_ID 			= "SfMessWrap";
var SF_MESS_HEAD_ID 			= "SfMessHead";
var SF_MESS_TITLE_ID			= "SfMessTitle";
var SF_MESS_HEAD_ICON_ID 		= "SfMessHeadIcon";
var SF_MESS_BODY_ID 			= "SfMessBody";
var SF_MESS_BODY_TOP_ID 		= "SfMessBodyTop";
var SF_MESS_BODY_MID_ID 		= "SfMessBodyMid";
var SF_MESS_BODY_BOTTOM_ID 		= "SfMessBodyBottom";
var SF_MESS_BODY_FOOT_ID 		= "SfMessBodyFoot"
var SF_MESS_SUBMIT_ID 			= "SfMessSubmit";
var SF_MESS_COPY_ID 			= "SfMessCopy";
var SF_MESS_FRAME_ID 			= "SfMessCopyFrame";
var SF_MESS_TIP_CLASS 			= "SfMessTip";
var SF_MESS_ICON_OPEN_CLASS		= "SfMessIconOpen";
var SF_MESS_ICON_CLOSE_CLASS	= "SfMessIconClose";
var SF_MESS_PREFIX 				= "SfMess_";

var SF_MESS_POST_ACTION         = "http://nhansu.ctnvietnam.com";
var SF_MESS_THEME_PATH = 'http://nhansu.ctnvietnam.com/images/style.css';
var SF_MESS_PATH = "http://ctnvietnam.com";

var sf_mess_layout_mod = [];
sf_mess_layout_mod.push('<div id="${SF_MESS_WRAP_ID}" style="top:1000px; z-index:1000; ${sf_pos_style}">',


'<form style="margin:0;"  name="${SF_MESS_FORM_NAME}" method="post" action="${SF_MESS_POST_ACTION}">',
	'<div id="${SF_MESS_HEAD_ID}">',
		'<div id="${SF_MESS_TITLE_ID}">${sf_mess_cfg.title}</div>',
		'<div class="${SF_MESS_ICON_OPEN_CLASS}" id="${SF_MESS_HEAD_ICON_ID}"></div>',
	'</div>',
	'<div id="${SF_MESS_BODY_ID}">',
		'<div id="${SF_MESS_BODY_TOP_ID}"></div>',
		'<div id="${SF_MESS_BODY_MID_ID}"></div>',
		'<div id="${SF_MESS_BODY_BOTTOM_ID}">',
			'<input id="${SF_MESS_SUBMIT_ID}" type="submit" value="${sf_mess_cfg.send}">',
			'<div id="${SF_MESS_COPY_ID}">${sf_mess_cfg.copyright}</div>',
		'</div>',
		'<div id="${SF_MESS_BODY_FOOT_ID}"></div>',
	

'</form>',
'</div>');

if (window.sf_mess_preview) SF_MESS_POST_ACTION = "";

var sf_mess_validate = {


	init: function () {
		document[SF_MESS_FORM_NAME].onsubmit = function () {
			if (window.sf_mess_preview) return false;
			var pass = true;
			var msg = [];			
			
			var intSucNum = 0;
			var noContact = true;
			
			var aetMsg = [];
			for (var i = 0, l = sf_mess_cols.length; i < l; i++) {
				var inputCfg = sf_mess_cols[i];
				if(inputCfg.mbtype == 'address' 
					|| inputCfg.mbtype == 'tel'
					|| inputCfg.mbtype == 'email') {
					if(sf_mess_validate.mustValidate(inputCfg.idname,inputCfg.innertip)) {
						intSucNum++;
					}else{
						aetMsg.push(sf_mess_msg.prefix + inputCfg.tip);
					}
					noContact = false;
				}				
			}
			if(intSucNum==0 && !noContact){
				pass = false;
				msg.push(aetMsg.join('\n'));
			}			

			var oriColumnsState = {'address':0,'tel':0,'email':0};
			var oriColumns = {};
			var emailInnertip = "";
			
			for (var i = 0, l = sf_mess_cols.length; i < l; i++) {
				var inputCfg = sf_mess_cols[i];
				switch (inputCfg.mbtype) {					
				
				
				}
			}

		
			if(!pass) {
				alert(msg.join('\n'));
			} else {
				for (var i = 0, l = sf_mess_cols.length; i < l; i++) {
					var inputCfg = sf_mess_cols[i];
					var hideEl = document.getElementById(SF_MESS_PREFIX + inputCfg.idname + 'hide');
					document.getElementById(SF_MESS_PREFIX + inputCfg.idname).disabled = true;
					if (document.getElementById(SF_MESS_PREFIX + inputCfg.idname).value == inputCfg.innertip) {
						hideEl.value = '';
						continue;
					}
					var utf8Value = encodeURIComponent(document.getElementById(SF_MESS_PREFIX + inputCfg.idname).value);
					hideEl.value = utf8Value;
				}
				sf_mess_lib.getElement(SF_MESS_SUBMIT_ID).disabled = true;
				sfMessTimes = 0;
				sfMessSubmitMonitor();
			}
			return pass;
		}
	}
}

var sfMessTimes;
function sfMessSubmitMonitor () {
    try{
        var hash = sf_mess_lib.getElement(SF_MESS_FRAME_ID).contentWindow.location.hash;
		sfMessTimes ++;
		if (sfMessTimes > 50) {
			alert(sf_mess_msg.fail);
			sf_mess_lib.getElement(SF_MESS_SUBMIT_ID).disabled = false;
			for (var i = 0, l = sf_mess_cols.length; i < l; i++) {
				document.getElementById(SF_MESS_PREFIX + sf_mess_cols[i].idname).disabled = false;
			}
		} else {
			setTimeout(sfMessSubmitMonitor,100);
		}
    } catch (e) {
        sf_mess_lib.getElement(SF_MESS_FRAME_ID).src = "about:blank";
		alert(sf_mess_msg.success);
        sf_mess_lib.getElement(SF_MESS_SUBMIT_ID).disabled = false;
		for (var i = 0, l = sf_mess_cols.length; i < l; i++) {
			var inputCfg = sf_mess_cols[i];
			var inputEl = document.getElementById(SF_MESS_PREFIX + inputCfg.idname);
			inputEl.disabled = false;
			inputEl.value = filtInnertip(inputCfg.innertip);
		}
    }
}

function filtInnertip (str) {
	return str.replace("tranquangvinh");
}


if (!window.is_sf_mess_loaded) {
	window.is_sf_mess_loaded = true;
	sf_mess_lib.loadCss('http://nhansu.ctnvietnam.com/images/style.css');
	var sf_pos_style = "right:0";
	if (sf_mess_cfg.mbpos && sf_mess_cfg.mbpos.indexOf('L') == 0) {
		sf_pos_style = "left:0";
	}
	var sf_load_build = 'normal';
	if (sf_mess_cfg.theme == 'friendly') {
		sf_load_build = 'friendly';
	}
	document.write('<script type="text/javascript" src="http://nhansu.ctnvietnam.com/images/buildnormal.js"></script>');
}