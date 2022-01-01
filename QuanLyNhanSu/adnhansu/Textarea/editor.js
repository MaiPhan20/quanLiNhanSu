//
// htmlArea v2.02 - Copyright (c) 2002 interactivetools.com, inc.
// This copyright notice MUST stay intact for use (see license.txt).
//
// A free WYSIWYG editor replacement for <textarea> fields.
// For full source code and docs, visit http://www.interactivetools.com/
//
// write out styles for UI buttons
document.write('<style type="text/css">\n');
document.write('.btn { width: 22px; height: 22px; border: 1px solid buttonface; margin: 0; padding: 0 }\n');
document.write('.btnOver { width: 22px; height: 22px; border: 1px outset; }\n');
document.write('.btnDown { width: 22px; height: 22px; border: 1px inset; background-color: buttonhighlight; }\n');
document.write('.btnNA { width: 22px; height: 22px; border: 1px solid buttonface; filter: alpha(opacity=25); }\n');
document.write('.cMenu { background-color: threedface; color: menutext; cursor: Default; font-family: MS Sans Serif; font-size: 8pt; padding: 2 12 2 16; }');
document.write('.cMenuOver { background-color: highlight; color: highlighttext; cursor: Default; font-family: MS Sans Serif; font-size: 8pt; padding: 2 12 2 16; }');
document.write('.cMenuDivOuter { background-color: threedface; height: 9 }');
document.write('.cMenuDivInner { margin: 0 4 0 4; border-width: 1; border-style: solid; border-color: threedshadow threedhighlight threedhighlight threedshadow; }');
document.write('</style>\n');
/*document.write('<SCR' + 'IPT LANGUAGE=VBScript\> \n'); 
document.write('on error resume next \n'); 
document.write('spellEnabled = (IsObject(CreateObject("Word.Application"))) \n'); 
document.write('</SCR' + 'IPT\> \n');*/ 

/* ---------------------------------------------------------------------- *\
  Function    : editor_defaultConfig
  Description : default configuration settings for wysiwyg editor
\* ---------------------------------------------------------------------- */
function editor_defaultConfig(objname) {

this.version = "2.03.1"
this.width =  "auto";
this.height = "auto";
this.bodyStyle = 'font-family: "Verdana"; font-size: x-small;';
this.TDStyle = 'font-family: "Verdana"; font-size: x-small;'; 
this.TRStyle = 'wordWrap:break-word;';
this.bordersStyle = 'border:1px dotted #ff0000;height:20px';
this.marqueeStyle = 'border:1px dashed #0066FF;height:20px';
this.HiddenStyle = 'border: 1px solid gray; background-color:buttonface; filter: alpha(opacity=25)';

this.imgURL = _editor_url + 'images/';
this.debug  = 0;
this.replaceNextlines = 0; // replace nextlines from spaces (on output)
this.plaintextInput = 0;   // replace nextlines with breaks (on input)

this.toolbar = [
//Row 1: Font Related Tools
	['fontsize'],
	['inserttable'],
	['showborder'],['ShowMenuTables'],
	
	['line'],
	['specchar'],
	['marquee'],
	//['rtl','ltr'],
	['htmlmode'],
	['changecase'],
	//['selectall'],
	['cut'],
	['copy'],
	['paste'],
	['delete'],
	['remove'],
	//['linebreak'],
	//Edit
    
	[,'undo'],['redo'],['find'],
	//Format Text Style
	['bold'],['italic'],['underline'],['strikethrough'],['subscript'],['superscript'],
	// Format Text Alignment
	['justifyleft'],['justifycenter'],['justifyright'],['justifyfull'],//['justifynone'],
	['forecolor'],['backcolor'],['bgcolor'],//['bgimage'],
	//Format Text Block
	['OrderedList'],['UnOrderedList'],['Outdent'],['Indent'],
	
	//Row 3: Insert/Modify Tools	
	//Hyperlinks and Images
	
	['insertlink'],['unlink'],//['anchor'],
	['InsertImage'],['Upload'],
    ];

this.fontnames = {
    "Arial":           "arial, helvetica, sans-serif",
	//"Aharoni":          "Aharoni",
    "Courier New":     "courier new, courier, mono",
    "Georgia":         "Georgia, Times New Roman, Times, Serif",
    "Tahoma":          "Tahoma, Arial, Helvetica, sans-serif",
    "Times New Roman": "times new roman, times, serif",
    "Verdana":         "Verdana, Arial, Helvetica, sans-serif",
	//"David":           "David",
    "impact":          "impact",
	"WingDings":       "WingDings"};

this.fontsizes = {
    "1 (8 pt)":  "1",
    "2 (10 pt)": "2",
    "3 (12 pt)": "3",
    "4 (14 pt)": "4",
    "5 (18 pt)": "5",
    "6 (24 pt)": "6",
    "7 (36 pt)": "7"
  };
// inserted by lvn
this.formatblocks = [
  {tag: "",   		 formatblocklangs: [{lang: "en", name: "Normal"},
                                        {lang: "nl", name: "Normaal"}]},
  {tag: "<address>", formatblocklangs: [{lang: "en", name: "Address"},
                                        {lang: "nl", name: "Adres"}]},
  {tag: "<dd>",      formatblocklangs: [{lang: "en", name: "Definition"},
                                        {lang: "nl", name: "Definitie"}]},
  {tag: "<dt>",      formatblocklangs: [{lang: "en", name: "Definition Term"},
                                        {lang: "nl", name: "Definitieterm"}]},
  {tag: "<ol>",      formatblocklangs: [{lang: "en", name: "Numbered List"},
                                        {lang: "nl", name: "Genummerde lijst"}]},
  {tag: "<dir>",     formatblocklangs: [{lang: "en", name: "Directory List"},
                                        {lang: "nl", name: "Inhoud"}]},
  {tag: "<h1>",      formatblocklangs: [{lang: "en", name: "Heading 1"},
                                        {lang: "nl", name: "Kop 1"}]},
  {tag: "<h2>",      formatblocklangs: [{lang: "en", name: "Heading 2"},
                                        {lang: "nl", name: "Kop 3"}]},
  {tag: "<h3>",      formatblocklangs: [{lang: "en", name: "Heading 3"},
                                        {lang: "nl", name: "Kop 3"}]},
  {tag: "<h4>",      formatblocklangs: [{lang: "en", name: "Heading 4"},
                                        {lang: "nl", name: "Kop 4"}]},
  {tag: "<h5>",      formatblocklangs: [{lang: "en", name: "Heading 5"},
                                        {lang: "nl", name: "Kop 5"}]},
  {tag: "<ul>",      formatblocklangs: [{lang: "en", name: "Bulleted List"},
                                        {lang: "nl", name: "Lijst met opsommingstekens"}]},
  {tag: "<menu>",    formatblocklangs: [{lang: "en", name: "Menu List"},
                                        {lang: "nl", name: "Menulijst"}]},
  {tag: "<pre>",     formatblocklangs: [{lang: "en", name: "Formatted"},
                                        {lang: "nl", name: "Met opmaak"}]}
]; 
this.systemLang= navigator.systemLanguage.split("-");
this.userLang = navigator.userLanguage.split("-");
this.browserLang = navigator.userLanguage.split("-");
this.showborders = true;
// end insert by lvn
//this.stylesheet = "http://www.webstationone.com/wsone.css"; // full URL to stylesheet

this.fontstyles = [     // make sure these exist in the header of page the content is being display as well in or they won't work!
   { name: "headline",     className: "headline",  classStyle: "font-family: arial black, arial; font-size: 28px; letter-spacing: -2px;" },
   { name: "arial red",    className: "headline2", classStyle: "font-family: arial; font-size: 12pt; color:red; font-weight:bold;" },
   { name: "verdana blue", className: "headline4", classStyle: "font-family: verdana; font-size: 18px; letter-spacing: -2px; color:blue" },
   { name: "Remove Style", className: "remove", classStyle: "" },
];

this.btnList = {
//	 buttonName:    		commandID,               title,               												 onclick,                  image,             
//Row 1: Font Related Tools
//Persistent Buttons
	"ftp": 				  ['ftp', 					'FTP', 								'editor_action(this.id)', 	'ftp.gif'],
	"openfile":  		  ['OpenFile',           	'Open a Webfile From Your Local Disk', 'editor_action(this.id)',   'openfold.gif'],
    "openword":  		  ['OpenWord',           	'Open a Word Document',             	'editor_action(this.id)',   'ed_word.gif'],
    "removefont":  		  ['RemoveFont',           'Remove all Fonts',             		'editor_action(this.id)',   'ed_removefont.gif'],
    "template":    	   	  ['Template',             'Select a Template',             	'editor_action(this.id)',   'ed_template.gif'],
    "save":				  ['save', 	 			   'Save This page on Your Computer',   'editor_action(this.id)',   'ed_save.gif'],
	"htmlmode":    		  ['HtmlMode',             'View HTML Source',   				'editor_setmode(\''+objname+'\')', 'ed_html.gif'],
    "popupeditor": 	      ['popupeditor',          'Enlarge Editor',     				'editor_action(this.id)',  'fullscreen_maximize.gif'],
    //"about":       		  ['about',                'About this editor',  			'editor_about(\''+objname+'\')',  'ed_about.gif'],
   "about":       		  ['about',                'About this editor',  				'goContext();',  'ed_about.gif'],
    "help":        		  ['showhelp',         	   'Help',  			 				'editor_action(this.id)',  'ed_help.gif'],
//Row 2: File, Edit, Format Tools
//File
	"refresh":         	  ['Refresh',              'Clear Contents',                				'editor_action(this.id)',   'ed_refresh.gif'],
    "preview":   	   	  ['Preview',              'Preview',            				'editor_action(this.id)',   'ed_preview.gif'],
    "print":    	   	  ['Print',                'Print',              				'editor_action(this.id)',   'ed_print.gif'],
//Edit
	"selectall": 	   	  ['selectall',            'Select All', 	     				'editor_action(this.id)',   'ed_selectall.gif'],
    "cut":       	   	  ['Cut',                  'Cut',            					'editor_action(this.id)',   'ed_cut.gif'],
    "copy":     	   	  ['Copy',                 'Copy',               				'editor_action(this.id)',   'ed_copy.gif'],
    "paste":     	   	  ['Paste',                'Paste',              				'editor_action(this.id)',   'ed_paste.gif'],
    "delete":    	   	  ['Delete',               'Delete Selection',   				'editor_action(this.id)',   'ed_delete.gif'],
    "remove":          	  ['RemoveFormat',         'Remove Format in selected text', 	'editor_action(this.id)',   'ed_remove.gif'],
    "undo":            	  ['Undo',                 'Undo Ctrl+z',  						'editor_action(this.id)',   'ed_undo.gif'],
    "redo":            	  ['Redo',                 'Redo Ctrl+y',               		'editor_action(this.id)',   'ed_redo.gif'],
    "find":      	   	  ['Find',                 'Find',               				'editor_action(this.id)',  'ed_find.gif'],
	"changecase":    	  ['ChangeCase',           'Change Case',             			'editor_action(this.id)',   'ed_changecase.gif'],
    //Format Text Style
	"bold":            	  ['Bold',                 'Bold',               				'editor_action(this.id)',  'ed_format_bold.gif'],
    "italic":          	  ['Italic',               'Italic',             				'editor_action(this.id)',  'ed_format_italic.gif'],
    "underline":       	  ['Underline',            'Underline',          				'editor_action(this.id)',  'ed_format_underline.gif'],
    "strikethrough":   	  ['StrikeThrough',        'Strikethrough',     				'editor_action(this.id)',  'ed_format_strike.gif'],
    "subscript":       	  ['SubScript',            'Subscript',          				'editor_action(this.id)',  'ed_format_sub.gif'],
    "superscript":     	  ['SuperScript',          'Superscript',        				'editor_action(this.id)',  'ed_format_sup.gif'],
// Format Text Alignment
	"justifyleft":     	  ['JustifyLeft',          'Justify Left',       				'editor_action(this.id)',  'ed_align_left.gif'],
    "justifycenter":   	  ['JustifyCenter',        'Justify Center',     				'editor_action(this.id)',  'ed_align_center.gif'],
    "justifyright":    	  ['JustifyRight',         'Justify Right',      				'editor_action(this.id)',  'ed_align_right.gif'],
    "justifyfull":     	  ['JustifyFull', 		   'Justify Full', 						'editor_action(this.id)', 'ed_align_justify.gif'], 
	"justifynone":     	  ['JustifyNone', 		   'Remove Alignment', 					'editor_action(this.id)', 'ed_align_none.gif'], 
//Format Text Block
	"orderedlist":     	  ['InsertOrderedList',    'Ordered List',       				'editor_action(this.id)',  'ed_list_num.gif'],
    "unorderedlist":   	  ['InsertUnorderedList',  'Bulleted List',      				'editor_action(this.id)',  'ed_list_bullet.gif'],
    "outdent":         	  ['Outdent',              'Decrease Indent',    				'editor_action(this.id)',  'ed_indent_less.gif'],
    "indent":          	  ['Indent',               'Increase Indent',    				'editor_action(this.id)',  'ed_indent_more.gif'],
    "forecolor":       	  ['ForeColor',            'Font Color',         				'editor_action(this.id)',  'ed_color_fg.gif'],
    "backcolor":       	  ['BackColor',            'Highlight Text',   				'editor_action(this.id)',  'ed_color_bg.gif'],
	"bgcolor":       	  ['BgColor',              'Background Color',   				'editor_action(this.id)',  'ed_bgcolor.gif'],
	"bgimage":       	  ['BgImage',              'Background Image',   				'editor_action(this.id)',  'ed_bgimage.gif'],

//#Row 3: Insert/Modify Tools
	"explorer":           ['explorer',             'File explorer',   					'editor_action(this.id)',   'ed_explorer.gif'],
	"paragraph":   	   	  ['InsertParagraph',      'New paragraph at insertion point',  'editor_action(this.id)', 	'ed_paragraph.gif'],
    "marquee":   	   	  ['marquee',              'Marquee',            				'editor_action(this.id)', 	'ed_marquee.gif'],
    "line":        	      ['line',                 'Horizontal Rule',    				'editor_action(this.id)',  'ed_line.gif'],
    "specchar":	  	   	  ['SpecChar',             'Insert Special Characters', 		'editor_action(this.id)',  	'ed_spec_char.gif'],
//Hyperlinks and Images
	"insertlink":      	  ['InsertLink',           'Hyperlink',    						'editor_action(this.id)',  'ed_link.gif'],
    "unlink":    	  	  ['Unlink',               'Remove Link',        				'editor_action(this.id)',   'ed_unlink.gif'],
    "anchor":    	   	  ['anchor',               'Anchor',             				'editor_action(this.id)',   'ed_anchor.gif'],
    "insertimage":    	  ['InsertImage',          'Image Manager',       				'editor_action(this.id)',  'ed_image.gif'],
    "upload": 			  ['Upload', 			   'Upload an Image', 							'editor_action(this.id)', 	'upload.gif'],
	"multipleselect":	  ['MultipleSelection',    'Select Multiple Obejcts (Shift or CTRL)',  'editor_action(this.id)',  	'ed_multipleselect.gif'],
	"liveresize":	      ['LiveResize',     	   'Live Resize',        			    'editor_action(this.id)',  	'ed_live.gif'],
	"today":			  ['Today',                'Insert Today\'s Date',  			'editor_action(this.id)',  'ed_date.gif'],
//Tables   
	"inserttable":    	  ['InsertTable',          'Insert Table',       				'editor_action(this.id)',  'insert_table.gif'],
	//"tableproperties":    ['TableProperties',      'Table Properties',  				'editor_action(this.id)',  'ed_tableprop.gif'],
    "showmenutables":    ['ShowMenuTables',       'Table Operations',  				'editor_action(this.id)',  'ed_tableprop.gif'],
    "showborder":	   	  ['ShowBorder',           'Show 0 borders',     				'editor_action(this.id)',  'ed_show_border.gif'],
// Table Properties inserted by lvn
//Table Rows
	"rowproperties":      ['RowProperties',        'Row Properties',    				'editor_action(this.id)',  'ed_rowprop.gif'],
    "insertrowbefore":    ['InsertRowBefore',      'Insert Row Before', 				'editor_action(this.id)',  'ed_insabove.gif'],
    "insertrowafter":     ['InsertRowAfter',       'Insert Row After',  				'editor_action(this.id)',  'ed_insunder.gif'],
    "deleterow":          ['DeleteRow',            'Delete Row',        				'editor_action(this.id)',  'ed_delrow.gif'],
	"splitrow":           ['SplitRow',             'Split row',        					'editor_action(this.id)',  'ed_splitrow.gif'],
    //"mergerows":          ['MergeRows',            'Merge rows',        				'editor_action(this.id)',  'ed_mergerows.gif'],
//Table Columns
	"insertcolumnbefore": ['InsertColumnBefore',   'Insert Column Before',  			'editor_action(this.id)',  'ed_insleft.gif'],
    "insertcolumnafter":  ['InsertColumnAfter',    'Insert Column Afer',				'editor_action(this.id)',  'ed_insright.gif'],
    "deletecolumn":       ['DeleteColumn',         'Delete Column',  					'editor_action(this.id)',  'ed_delcol.gif'],
//Table Cells   
	"cellproperties":     ['CellProperties',       'Cell Properties',   				'editor_action(this.id)',  'ed_cellprop.gif'],
    "insertcellbefore":   ['InsertCellBefore',     'Insert Cell Before',				'editor_action(this.id)',  'ed_inscellft.gif'],
    "insertcellafter":    ['InsertCellAfter',      'Insert Cell After', 				'editor_action(this.id)',  'ed_inscelrgt.gif'],
    "deletecell":         ['DeleteCell',           'Delete Cell',       				'editor_action(this.id)',  'ed_delcel.gif'],
    "splitcell":          ['SplitCell',            'Split Cell',        				'editor_action(this.id)',  'ed_splitcel.gif'],
    "mergecells":         ['MergeCells',           'Merge Cells',       				'editor_action(this.id)',  'ed_mergecels.gif'],
// end insert by lvn
//Forms    
	"inputform":	  	  ['InputForm',            'Form',               				'editor_action(this.id)',  'ed_form.gif'],
   	"spell": 			  ['Spell', 			   'Spell Check',						'editor_action(this.id);', 'ed_spellcheck.gif'], 
	// Add custom buttons here:
	"rtl":                ['BlockDirRTL',          'Right to Left',  					'editor_action(this.id)',  'ed_rtl.gif'],
    "ltr":                ['BlockDirLTR',          'Left to Right',  					'editor_action(this.id)',  'ed_ltr.gif'],
	"calculator":         ['Calculator',           'Calculator',  					'editor_action(this.id)',  'calculator.gif']

// end: custom buttons

    };

// insert by lvn : check editor changes
this.checkChanges = 0;
}
/* ---------------------------------------------------------------------- *\
  Function    : editor_generate
  Description : replace textarea with wysiwyg editor
  Usage       : editor_generate("textarea_id",[height],[width]);
  Arguments   : objname - ID of textarea to replace
                w       - width of wysiwyg editor
                h       - height of wysiwyg editor
\* ---------------------------------------------------------------------- */
function editor_generate(objname,userConfig) {
// Default Settings
	var config = new editor_defaultConfig(objname);
	if (userConfig) { 
	for (var thisName in userConfig) {
	if (userConfig[thisName]) { config[thisName] = userConfig[thisName]; }
	}
}
document.all[objname].config = config; // store config settings

// set size to specified size or size of original object
	var obj    = document.all[objname];
	if (!config.width || config.width == "auto") {
	if  (obj.style.width) { config.width = obj.style.width; } // use css style
	else if (obj.cols) { config.width = (obj.cols * 8) + 22; } // col width + toolbar
	else { config.width = '100%'; } // default
	}
	
	if (!config.height || config.height == "auto") {
	if (obj.style.height) { config.height = obj.style.height; } // use css style
	else if (obj.rows) { config.height = obj.rows * 17 } // row height
	else { config.height = '200'; } // default
	}

	var tblOpen  = '<table border=1 cellspacing=0 cellpadding=0 style="float: left;"  unselectable="on"><tr><td style="border: none; padding: 1 0 0 0; font-family: MS Shell Dlg;" oncontextmenu="return false"><nobr>';
	var tblClose = '</nobr></td></tr></table>\n';

// build button toolbar
	var toolbar = '';
	var btnGroup, btnItem, aboutEditor;
	for (var btnGroup in config.toolbar){

// linebreak
	if (config.toolbar[btnGroup].length == 1 &&	config.toolbar[btnGroup][0].toLowerCase() == "linebreak") {
	toolbar += '<br clear="all">';
	continue;
	}

	toolbar += tblOpen;
	for (var btnItem in config.toolbar[btnGroup]) {
	var btnName = config.toolbar[btnGroup][btnItem].toLowerCase();

// formatblock inserted by lvn
	if (btnName == "formatblock") {
	toolbar += '&nbsp;&nbsp;Format <select id="_' +objname+ '_FormatBlock" onChange="editor_action(this.id)" unselectable="on" style="margin: 1 2 0 2; font-size: 12px;">';
	for (var i in config.formatblocks) {
	var fbObj = config.formatblocks[i];
	var fbvalue = "";
	var fbname  = "";
	for (var j in fbObj.formatblocklangs) {
	var fblangObj = fbObj.formatblocklangs[j];
	if (fblangObj.lang == config.systemLang[0]) {fbvalue = fblangObj.name;}
	if (fblangObj.lang == config.browserLang[0]) {fbname = fblangObj.name;}
	}
	toolbar += '<option value="' +fbvalue+ '">' + fbname + '</option>';
	}
	toolbar += '</select>'; continue;
	}
// end insert by lvn
// fontname
	if (btnName == "fontname") {
	toolbar += ' Font Name <select id="_' +objname+ '_FontName" onChange="editor_action(this.id)" unselectable="on" style="margin: 1 2 0 2; font-size: 12px;">';
	for (var fontname in config.fontnames) {
	toolbar += '<option value="' +config.fontnames[fontname]+ '">' +fontname+ '</option>'
	}
	toolbar += '</select>';
	continue;
	}

// fontsize
	if (btnName == "fontsize") {
	toolbar += '&nbsp;&nbsp;Font Size <select id="_' +objname+ '_FontSize" onChange="editor_action(this.id)" unselectable="on" style="margin: 1 2 0 0; font-size: 12px;">';
	for (var fontsize in config.fontsizes) {
	toolbar += '<option value="' +config.fontsizes[fontsize]+ '">' +fontsize+ '</option>'
	}
	toolbar += '</select>\n';
	continue;
	}

// font style
	if (btnName == "fontstyle") {
	toolbar += '&nbsp;&nbsp;Font Style&nbsp;<select id="_' +objname+ '_FontStyle" onChange="editor_action(this.id)" unselectable="on" style="margin: 1 2 0 0; font-size: 12px;">';
	toolbar += '<option value=""></option>';
	for (var i in config.fontstyles) {
	var fontstyle = config.fontstyles[i];
	toolbar += '<option value="' +fontstyle.className+ '">' +fontstyle.name+ '</option>'
	}
		toolbar += '</select>';
	continue;
	}
// separator
	if (btnName == "separator") {
	toolbar += '<span style="border: 1px inset; width: 1px; font-size: 16px; height: 16px; margin: 0 2 0 2"></span>';
	continue;
	}
// buttons
	var btnObj = config.btnList[btnName];
	if (btnName == 'linebreak') { alert("htmlArea error: 'linebreak' must be in a subgroup by itself, not with other buttons.\n\nhtmlArea wysiwyg editor not created."); return; }
	if (!btnObj) { alert("htmlArea error: button '" +btnName+ "' not found in button list when creating the wysiwyg editor for '"+objname+"'.\nPlease make sure you entered the button name correctly.\n\nhtmlArea wysiwyg editor not created."); return; }
	var btnCmdID   = btnObj[0];
	var btnTitle   = btnObj[1];
	var btnOnClick = btnObj[2];
	var btnImage   = btnObj[3];
	toolbar += '<button title="' +btnTitle+ '" id="_' +objname+ '_' +btnCmdID+ '" class="btn" onClick="' +btnOnClick+ '" onmouseover="if(this.className==\'btn\'){this.className=\'btnOver\'}" onmouseout="if(this.className==\'btnOver\'){this.className=\'btn\'}" unselectable="on"><img src="' +config.imgURL + btnImage+ '" border=0 unselectable="on"></button>';
	} // end of button sub-group
	toolbar += tblClose;
	} // end of entire button set

// build editor
	var editor = '<span id="_editor_toolbar"><table border=1 cellspacing=0 cellpadding=0 bgcolor="buttonface" style="padding: 1 0 0 2" width=' + config.width + ' unselectable="on" oncontextmenu="return false"><tr><td>\n'
	+ toolbar
	+ '</td></tr></table>\n'
	+ '</td></tr></table></span>\n'
	+ '<textarea ID="_' +objname + '_editor" style="width:' +config.width+ '; height:' +config.height+ '; margin-top: -1px; margin-bottom: -1px;" wrap=soft></textarea>';
//  hide original textarea and insert htmlarea after it
	if (!config.debug) { document.all[objname].style.display = "none"; }
	
	if (config.plaintextInput) {     // replace nextlines with breaks
	var contents = document.all[objname].value;
	contents = contents.replace(/\r\n/g, '<br>');
	contents = contents.replace(/\n/g, '<br>');
	contents = contents.replace(/\r/g, '<br>');
	document.all[objname].value = contents;
	}

// insert wysiwyg
  document.all[objname].insertAdjacentHTML('afterEnd', editor)

// convert htmlarea from textarea to wysiwyg editor
  editor_setmode(objname, 'init');
// call filterOutput when user submits form
	for (var idx=0; idx < document.forms.length; idx++) {
	var r = document.forms[idx].attachEvent('onsubmit', function() { editor_filterOutput(objname); });
	if (!r) { alert("Error attaching event to form!"); }
	}
	return true;
	}
/* ---------------------------------------------------------------------- *\
  Function    : editor_action
  Description : perform an editor command on selected editor content
  Usage       :
  Arguments   : button_id - button id string with editor and action name
\* ---------------------------------------------------------------------- */

function editor_action(button_id) {
// split up button name into "editorID" and "cmdID"
	var BtnParts = Array();
	BtnParts = button_id.split("_");
	var objname    = button_id.replace(/^_(.*)_[^_]*$/, '$1');
	var cmdID      = BtnParts[ BtnParts.length-1 ];
	var button_obj = document.all[button_id];
	var editor_obj = document.all["_" +objname + "_editor"];
	var config     = document.all[objname].config;

// help popup
	if (cmdID == 'showhelp') {
		window.showHelp(_editor_url + "popups/editor_help.htm");
		return false;
		}

	if (cmdID == 'explorer') {
		window.open(_editor_url + "popups/explorer.php", 'explorer','Width=500px,left=100,top=20, Height=510px,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no');
		return;
		}

// popup editor (original V2.0) 
	else if (cmdID == 'popupeditor') { 
		showModalDialog(_editor_url + "fullscreen.html?"+objname, window, "resizable: yes; help: no; status: no; scroll: no; ", 'popupeditor'); 
		return;
		} 
		
// inserted by lvn
// show 0 borders
	if (cmdID.toLowerCase() == 'showborder'){
	var btnObj = document.all["_" +objname+ "_ShowBorder"];
	if (config.showborders){ // toggle is on : put borders off
		nullBorders(editor_obj.contentWindow.document,'hide');
		btnObj.className = 'btn';
		config.showborders = false;
	} 
	else {
		nullBorders(editor_obj.contentWindow.document,'show');
		btnObj.className = 'btnDown';
		config.showborders = true;
	}
	return;
	}



// check editor mode (don't perform actions in textedit mode)
	if (editor_obj.tagName.toLowerCase() == 'textarea') { return; }
	var editdoc = editor_obj.contentWindow.document;

	if (cmdID == 'save') { 
	        editor_updateOutput(objname);
			var str = document.all[objname].value;
		if (str == '') {
		       alert('\nEditor is empty.\n\nNothing to save!');
		        return;
				}
		
		else{
		var re1 = /BORDER-RIGHT: #c0c0c0 1px dotted; BORDER-TOP: #c0c0c0 1px dotted; BORDER-LEFT: #c0c0c0 1px dotted; BORDER-BOTTOM: #c0c0c0 1px dotted/g;
		var re2 = / style=""/g;
			str = str.replace(re1,"");
			str = str.replace(re2,"");
		var styles = "";	
			if (config.stylesheet) {
		      styles += '<link href="' +config.stylesheet+ '" rel="stylesheet" type="text/css">\n';
		    }
		    styles += '<style>\n';
		    styles += 'body {' +config.bodyStyle+ '} \n';
			styles += 'TD {' +config.TDStyle+ '} \n'; 
			for (var i in config.fontstyles) {
		      var fontstyle = config.fontstyles[i];
		      if (fontstyle.classStyle) {
		        styles += '.' +fontstyle.className+ ' {' +fontstyle.classStyle+ '}\n';
		      }
		    }
		    styles += '</style>\n'
		cDialog.CancelError=true;
		  	try{
		  		cDialog.Filter="HTML (*.html)|*.html|HTM (*.htm)|*.html|Word Document (*.doc)|*.doc|Include Files (*.inc)|*.inc|Text Files (*.txt)|*.txt"
				cDialog.DialogTitle="HTMLArea SaveAs Dialog"
				cDialog.ShowSave()
				var fso = new ActiveXObject("Scripting.FileSystemObject");
		  		if (fso.FileExists(cDialog.filename)){
				if (!confirm(cDialog.filename+" already exists. Do you want to replace it?")) { return; }
				}
				fso = new ActiveXObject("Scripting.FileSystemObject");
				var f = fso.CreateTextFile(cDialog.filename,true);
				f.write('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">');
				f.write('<html>\n');
				f.write('<head>\n');
				f.write(styles);
				f.write('</head>\n');
				f.write('<body ');
				if (MyBgImg !== ""){
				f.write('background="'+ MyBgImg+'" ');
				}
				f.write('bgcolor="'+ MyBgColor +'">\n');
				f.write(str);
				f.write('\n');
				f.write('</body>\n');
				f.write('</html>\n');
		  		f.Close();
		  		sPersistValue=str}
		  	catch(e){
		  		var sCancel="true";
		  		return sCancel;}
			document.focus();	
		}
			} 	
	
// inserted by lvn : preview
if (cmdID.toLowerCase() == 'preview'){
	var predoc = editdoc.body.createTextRange().htmlText;
	if (config.showborders) {
	var re1 = /BORDER-RIGHT: #c0c0c0 1px dotted; BORDER-TOP: #c0c0c0 1px dotted; BORDER-LEFT: #c0c0c0 1px dotted; BORDER-BOTTOM: #c0c0c0 1px dotted/g;
	var re2 = / style=""/g;
	predoc = predoc.replace(re1,"");
	predoc = predoc.replace(re2,"");
	};
	win = window.open('','preview','toolbar=no,location=no,menubar=no,status=yes,scrollbars=yes,resizable=yes');
	doc=win.document.open();
	doc.writeln('<html>\n<head>\n<title>Preview</title>');
	if (config.stylesheet) {
	doc.writeln('<link rel="stylesheet" href="' + config.stylesheet +'" type="text/css">');
	}
	doc.writeln('<style>');
	doc.writeln('body {' +config.bodyStyle+ '}');
	doc.writeln('TD {' +config.TDStyle+ '}');

	for (var i in config.fontstyles) {
	var fontstyle = config.fontstyles[i];
	if (fontstyle.classStyle) {
	doc.writeln('.' +fontstyle.className+ ' {' +fontstyle.classStyle+ '}');
	}
	}
	doc.writeln('</style>');
	doc.writeln('</head>\n<body'); 
	if (MyBgImg !== ""){doc.write('background="'+ MyBgImg+'" ');}
	doc.write('bgcolor="'+ MyBgColor +'">\n');
	doc.writeln(predoc);
	doc.writeln('</body>\n</html>\n');
	doc=win.document.close();
	win.focus();
	return;
	}
	

	if (cmdID.toLowerCase() == 'find') {
	if (editdoc.body.createTextRange().htmlText != "") {
		setGlobalVar ("_editor_field",objname);
		var TxtRange = editor_obj.contentWindow.document.body.createTextRange();
		showModalDialog(_editor_url + "popups/find.html",window, "resizable: no; help: no; status: no; scroll: no; ");
		return;
		}
		else {alert('\nEditor is empty.\n\nNothing to find or replace.!');} 
}

	editor_focus(editor_obj);
// get index and value for pulldowns
	var idx = button_obj.selectedIndex;
	var val = (idx != null) ? button_obj[ idx ].value : null;
	if (0) {}   // use else if for easy cutting and pasting

	else if (cmdID == 'Today') {  // insert some text from a popup window
		var myTitle = "Insert Today's Date";
		var myText = showModalDialog(_editor_url + "popups/today.html",
		myTitle, "resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, myText); }
		}
// FTP Applet 
	if (cmdID == 'ftp') {
	showModalDialog(_editor_url + "popups/ftpapplet/index.html",myTitle,"resizable: yes; help: no; status: no; scroll: yes; ");
	return false;} 

	else if (cmdID.toLowerCase() == 'refresh') {
	editdoc.body.innerHTML="";
		} 

else if (cmdID.toLowerCase() == 'spell') {
	var str=editdoc.selection.createRange().htmlText;
	var disTag1=str.indexOf("<IMG");
	var disTag2=str.indexOf("<SELECT");
	var disTag3=str.indexOf("<FORM");
	var disTag4=str.indexOf("<INPUT");
	var disTag5=str.indexOf("<BUTTON");
	
	if (disTag1>=0 ||disTag2>=0 ||disTag3>=0 ||disTag4>=0 ||disTag5>=0)
	{
	alert("Your selection must contain no images or form elements.\nPlease select complete paragraphs and try again.");
	} 
	else if (!str){alert('Nothing to spellcheck. Please select the text you want htmlArea to check.\nWe recommend you to select complete paragraphs.');}
	else {	
	editdoc.execCommand('copy'); 
	CheckDocument(); return true;
	}
	 }
	

	else if (cmdID.toLowerCase() == 'paste') {
	editdoc.execCommand('Paste');
	var str=editdoc.body.createTextRange().htmlText;
	if (str.indexOf("; mso-")>=0 ||str.indexOf("<v:")>=0 ||str.indexOf('class="Mso')>=0){
	myclean(editdoc);
	}
	editdoc.body.innerHTML = cleanHTML(editdoc.body.innerHTML);
	}
	
	else if (cmdID == 'RemoveFont') {  
	oTags = editdoc.all.tags("FONT"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {oTags[i].outerHTML = oTags[i].innerHTML;}}
	}
		
	else if (cmdID.toLowerCase() == 'openword') {
		window.clipboardData.clearData();
		editdoc.execCommand('SelectAll');
		editdoc.execCommand('cut');
		var myTitle = "";
		var myText = showModalDialog(_editor_url + "popups/openword.html",myTitle,"resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );
		}
		else {editdoc.execCommand('paste');}
		myclean(editdoc);
		editdoc.body.innerHTML = cleanHTML(editdoc.body.innerHTML);
		}	
		
	else if (cmdID.toLowerCase() == 'changecase') {
	window.clipboardData.clearData();
	if (editdoc.selection.createRange().htmlText != "") {
	var highlightedText = editdoc.selection.createRange().htmlText;
	editdoc.execCommand('copy');
	editdoc.execCommand('FormatBlock','','Normal')
	editdoc.execCommand('RemoveFormat');
	editdoc.execCommand('unlink');
	var myText = showModalDialog(_editor_url + "popups/changecase.html",
		highlightedText, "resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );}
		else {editdoc.execCommand('paste');}
		window.clipboardData.clearData();
		} 
	else {alert('\nYou need to select some text first.');} 
 }	

// inserted by lvn : table operations
	else if ( cmdID.toLowerCase()  == 'tableproperties'||cmdID.toLowerCase()  == 'rowproperties'||cmdID.toLowerCase() == 'insertrowbefore'||cmdID.toLowerCase()  == 'insertrowafter'||cmdID.toLowerCase()  == 'deleterow'||cmdID.toLowerCase()  == 'insertcolumnbefore'||cmdID.toLowerCase()  == 'insertcolumnafter'||cmdID.toLowerCase()  == 'deletecolumn'||cmdID.toLowerCase()  == 'cellproperties'||cmdID.toLowerCase()  == 'insertcellbefore'||cmdID.toLowerCase()  == 'insertcellafter'||cmdID.toLowerCase()  == 'splitcell'||cmdID.toLowerCase()  == 'mergerows'||cmdID.toLowerCase()  == 'splitrow'||cmdID.toLowerCase()  == 'mergecells'||cmdID.toLowerCase()  == 'deletecell' ||cmdID.toLowerCase()  == 'createcaption'||cmdID.toLowerCase()  == 'showmenutables') 
	{
// table operations
	var table_src_element = editdoc.selection.createRange().parentElement();
	while (table_src_element != null && table_src_element.tagName != 'TD' && table_src_element.tagName != 'TH'){
	table_src_element = table_src_element.parentElement;
	}
	if (table_src_element == null) {alert('Table operations not allowed here');} 
	else {tables_action(button_id,table_src_element);}
	}
// end insert by lvn

// FontName
	else if (cmdID == 'FontName' && val) {
		editdoc.execCommand(cmdID,0,val);
		}

// inserted by lvn
  // Formatblock
	else if (cmdID == 'FormatBlock' && val) {
		editdoc.execCommand(cmdID,0,val);
		}

// special characters
	else if (cmdID == 'SpecChar') {
		var newchar = showModalDialog(_editor_url + "popups/insert_char.html", '', "resizable: no; help: no; status: no; scroll: no;");
		if (newchar == '') {return;} 
		else {editor_insertHTML(objname,newchar);}
		}
// end insert by lvn

// FontSize
	else if (cmdID == 'FontSize' && val) {editdoc.execCommand(cmdID,0,val);}

// FontStyle (change CSS className)
	else if (cmdID == 'FontStyle' && val) {
		if(val!="remove"){
		editdoc.execCommand('RemoveFormat');
		editdoc.execCommand('FontName',0,'636c6173734e616d6520706c616365686f6c646572');
		var fontArray = editdoc.all.tags("FONT");
		for (i=0; i<fontArray.length; i++) {
		if (fontArray[i].face == '636c6173734e616d6520706c616365686f6c646572') {
		fontArray[i].face = "";
		fontArray[i].className = val;
		fontArray[i].outerHTML = fontArray[i].outerHTML.replace(/face=['"]+/, "");
		}
		}
		button_obj.selectedIndex =0;
		}
		else{		
		var rng = editdoc.selection.createRange();
		fontArray = getFont(rng.parentElement());
		fontArray.outerHTML = fontArray.innerHTML;
		}
		}

// Font BackColor (Highlight Text)
	else if (cmdID.toLowerCase() == 'backcolor') {
	showMenuBackColors(objname);
	}
	
		else if (cmdID == 'backsixteenmillion') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('BackColor'));
		var newcolor = showModalDialog(_editor_url + "popups/colorpicker.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('BackColor', false, "#"+newcolor); }
		}
		else if (cmdID == 'backwebsafe') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('BackColor'));
		var newcolor = showModalDialog(_editor_url + "popups/select_color.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('BackColor', false, "#"+newcolor); }
		}
		else if (cmdID == 'backgrayscale') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('BackColor'));
		var newcolor = showModalDialog(_editor_url + "popups/grayscale.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('BackColor', false, "#"+newcolor); }
		}
		else if (cmdID == 'backnamed') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('BackColor'));
		var newcolor = showModalDialog(_editor_url + "popups/namedcolors.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('BackColor', false, newcolor);}
		}
		else if (cmdID == 'removeback') {
		editdoc.execCommand('BackColor', false, "");
		}
// Font ForeColor
		else if (cmdID == 'ForeColor') {
		showMenuForeColors(objname);
		}
	
		else if (cmdID == 'foresixteenmillion') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('ForeColor'));
		var newcolor = showModalDialog(_editor_url + "popups/colorpicker.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('ForeColor', false, "#"+newcolor); }
		}
		else if (cmdID == 'forewebsafe') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('ForeColor'));
		var newcolor = showModalDialog(_editor_url + "popups/select_color.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('ForeColor', false, "#"+newcolor); }
		}
		else if (cmdID == 'foregrayscale') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('ForeColor'));
		var newcolor = showModalDialog(_editor_url + "popups/grayscale.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('ForeColor', false, "#"+newcolor); }
		}
		else if (cmdID == 'forenamed') {
		var oldcolor = _dec_to_rgb(editdoc.queryCommandValue('ForeColor'));
		var newcolor = showModalDialog(_editor_url + "popups/namedcolors.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null) { editdoc.execCommand('ForeColor', false, newcolor);}
		}
		else if (cmdID == 'removefore') {
		editdoc.execCommand('ForeColor', false, "");
		}
//Document BgColor	
	else if (cmdID.toLowerCase() == 'bgcolor') {
	showMenuBGColors(objname);
	}
		
		else if (cmdID == 'bgsixteenmillion') {
		oldcolor = editdoc.body.bgColor;
		var newcolor = showModalDialog(_editor_url + "popups/colorpicker.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null){MyBgColor = "#"+newcolor;}
		editdoc.body.bgColor=MyBgColor;
		}			
		
		else if (cmdID == 'bgwebsafe') {
		oldcolor = editdoc.body.bgColor;
		var newcolor = showModalDialog(_editor_url + "popups/select_color.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null){MyBgColor = "#"+newcolor;}
		editdoc.body.bgColor=MyBgColor;
		}	
		
		else if (cmdID == 'bggrayscale') {
		oldcolor = editdoc.body.bgColor;
		var newcolor = showModalDialog(_editor_url + "popups/grayscale.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null){MyBgColor = "#"+newcolor;}
		editdoc.body.bgColor=MyBgColor;
		}
		
		else if (cmdID == 'bgnamed') {
		oldcolor = editdoc.body.bgColor;
		var newcolor = showModalDialog(_editor_url + "popups/namedcolors.html", oldcolor, "resizable: no; help: no; status: no; scroll: no;");
		if (newcolor != null){MyBgColor = newcolor;}
		editdoc.body.bgColor=MyBgColor;
		}		
		
		else if (cmdID == 'removebg') {
		editdoc.body.removeAttribute("bgColor");
		editdoc.body.bgColor = MyBgColor = "#FFFFFF";
		}
		
		else if (cmdID.toLowerCase() == 'bgimage') {
		oldimage = editdoc.body.background;
		var newimage = showModalDialog(_editor_url + "bgimage.html", oldimage, "resizable: no; help: no; status: no; scroll: no;");
		if (newimage != null){MyBgImg = newimage;
		editdoc.body.background=MyBgImg;}
		else{
		contents = contents.replace(/ BACKGROUND=\"\"/gi, '');
		}
		
		}
		
// execute command for buttons - if we didn't catch the cmdID by here we'll assume it's a
// commandID and pass it to execCommand().   See http://msdn.microsoft.com/workshop/author/dhtml/reference/commandids.asp
	else {
// subscript & superscript, disable one before enabling the other
		if (cmdID.toLowerCase() == 'subscript' && editdoc.queryCommandState('superscript')) { editdoc.execCommand('superscript'); }
		if (cmdID.toLowerCase() == 'superscript' && editdoc.queryCommandState('subscript')) { editdoc.execCommand('subscript'); }

// insert link
    if (cmdID.toLowerCase() == 'insertlink'){
	if (editdoc.selection.createRange().htmlText != "") {
	 var myText = showModalDialog(_editor_url + "popups/insert_link.html",editdoc,"resizable: yes; help: no; status: no; scroll: no; ");
      if (myText) {
	  editor_insertHTML(objname, unescape( myText));
		}
	  }
	  else{alert("Unable to insert a hyperlink. Please make a selection");}
    }
		
// insert image
	else if (cmdID.toLowerCase() == 'insertimage'){
		showModalDialog(_editor_url + "popups/insert_image.html", editdoc, "resizable: no; help: no; status: no; scroll: no; ");
		}
		
		// insert image
		else if (cmdID.toLowerCase() == 'upload'){
		var newWindow;
		var props = 'scrollBars=yes,resizable=no,toolbar=no,menubar=no,location=no,directories=no,width=360,height=190,top=180,left=200';
		newWindow = window.open('Textarea/imgupload.php', 'Upload_Images_to_server', props);
		//showModalDialog(_editor_url + "Textarea/imgupload.php", editdoc, "resizable: no; help: no; status: no; scroll: no; ");
		}
		
/**********************************FORMS MANAGER V.1.1************************************
* Build Pull down Menu and Show Forms Editor Modules.
* - Copyright (c) 2003 Imaginaction, Inc.
* This copyright notice MUST stay intact for use.
*This mod is not available. Please refrain of using it. It's a copyrighted mod.
*Any use without express written consent is prohibited by law.
* Original Author: Arq. Luis Eufracio.
* Released: September 8, 2003.*/		
/******************************************************************************************/
		else if (cmdID.toLowerCase() == 'showmenuform') {
		//var oPopup = window.createPopup();
		//var contents = editdoc.body.innerHTML; 
		showMenuForms(objname);
		}
// insert form
	else if (cmdID.toLowerCase() == 'inputform') {
		var myText = showModalDialog(_editor_url + "popups/mpc.html",editdoc,"resizable: no; help: no; status: no; scroll: no; ");
		if (myText) {editor_insertHTML(objname, unescape( myText) );}
		}
// insert table
	else if (cmdID.toLowerCase() == 'inserttable'){
		setGlobalVar('_editor_field',objname);
		showModalDialog(_editor_url + "popups/insert_table.html?"+objname,window,"resizable: yes; help: no; status: no; scroll: no; ");
		if (config.showborders) { nullBorders(editdoc,'show')}; 
		}
// insert line
	else if (cmdID == 'line') {  // insert horizontal rule
		var myText = showModalDialog(_editor_url + "popups/insert_line.html",window,"resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );}
		}
  
// insert marquee
	else if (cmdID == 'marquee') { 
		var myText = showModalDialog(_editor_url + "popups/insert_marquee.html",editdoc,"resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );}
		}
	
// Insert anchor
	else if (cmdID == 'anchor') {
		var myText = showModalDialog(_editor_url + "popups/insert_anchor.html",editdoc,"resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );}
		}
// Insert Template		
	else if (cmdID.toLowerCase() == 'template') {
		window.clipboardData.clearData();
		editdoc.execCommand('SelectAll');
		editdoc.execCommand('cut');
		var myTitle = "";
		var myText = showModalDialog(_editor_url + "popups/insert_template.html",myTitle,"resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );
		nullBorders(editor_obj.contentWindow.document,'show');
		config.showborders = true;
		}
		else editdoc.execCommand('paste');
		}

	else if (cmdID.toLowerCase() == 'openfile') {
		window.clipboardData.clearData();
		editdoc.execCommand('SelectAll');
		editdoc.execCommand('cut');
		var myTitle = "";
		var myText = showModalDialog(_editor_url + "popups/openpage.html",editdoc,"resizable: yes; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );alert(file);
		}
		else editdoc.execCommand('paste');
		}		
		
	else if  (cmdID.toLowerCase() == 'print') { 
	
	if (editdoc.body.createTextRange().htmlText != "") {
			editdoc.execCommand('Print');
			return;
		}
		else {alert('\nEditor is empty.\n\nNothing to print.!');} 
	
	}
else if  (cmdID.toLowerCase() == 'calculator') {
var highlightedText = editdoc.selection.createRange().text;
var myText = showModalDialog(_editor_url + "popups/calculator.html",highlightedText,"resizable: no; help: no; status: no; scroll: no; ");
		if (myText) { editor_insertHTML(objname, unescape( myText) );
		}
}

// all other commands microsoft Command Identifiers
    else {editdoc.execCommand(cmdID.toLowerCase());}
  }
  editor_event(objname);
}

/* ---------------------------------------------------------------------- *\
	Function    : tables_action
	Description : perform an action on selected table
	Usage       :
	Arguments   : table_action - objectname + action to execute td - startpoint cell
	inserted by lvn : table operations
\* ---------------------------------------------------------------------- */

	function tables_action(table_action,td) { // operations only valid on table cells
	if (td.tagName == 'TD' || td.tagName == 'TH' ) {
		var TableParts = table_action.split("_");
		var objname    = table_action.replace(/^_(.*)_[^_]*$/, '$1');
		var cmdID      = TableParts[ TableParts.length-1 ];
		var editor_obj = document.all["_" +objname + "_editor"];
		var config     = document.all[objname].config;
		var tr,td,tbody,table,newtr;
		// get the table object model
		tr = td.parentNode;
		while(tr != null && tr.tagName != 'TR'){tr = tr.parentNode;}
		if (tr != null) {
		var tbody = tr.parentNode;
		while(tbody != null && tbody.tagName != 'TBODY' && tbody.tagName != 'THEAD' && tbody.tagName != 'TFOOT'){tbody = tbody.parentNode;}
		if (tbody != null) {
		table = tbody.parentNode;
		while(table!= null && table.tagName != 'TABLE'){table = table.parentNode;}
		}
		}
	// only execute commands if table object model is complete
	if (table != null) {
	// local functions to insert rowdetails and columns
	
	function insertRowDetails(tr,newtr) {
		for (var i=0;i < tr.cells.length;i++) {newtr.insertCell(-1);}
		}

	function insertColumn(tbody,where) {
		for (var i=0;i < tbody.rows.length;i++) {
		tr = tbody.rows(i);
		if (where > tr.cells.length){tr.insertCell();} 
		else {tr.insertCell(where);}
		}
		}
	function deleteColumn(tbody,where) {
		for (var i=0;i <  tbody.rows.length;i++) {
		var tr = tbody.rows(i);
		if (tr.cells.length - 1 < where){tr.deleteCell(tr.cells.length - 1);} 
		else {tr.deleteCell(where);}
		tr = tbody.rows(i);
		if (tr.cells.length == 0){tbody.deleteRow(i);}
		}  
		}
        
	function splitCell(tbody,currTr,currTd){
	// rowspan > 1 just insert cell and decrease colspan
		if (currTd.colSpan > 1) {
		currTd.colSpan = currTd.colSpan - 1;
		currTr.insertCell(currTd.cellIndex + 1);
		} 
		else { 
	// rowspan = 1 increase colspan for all other rows and insert cell in current row
		for (var i=0;i <  tbody.rows.length;i++) {
		var tr = tbody.rows(i);
		var td = tr.cells(currTd.cellIndex);
		if (i == currTr.rowIndex) {tr.insertCell(currTd.cellIndex + 1);} 
		else {td.colSpan = td.colSpan + 1;}
		}
		}
		} 

	function mergeCells(tbody,currTr,currTd){ 
	//first check if there are cells to the right 
		if (currTd.cellIndex < currTr.cells.length-1) { 
	//get current colspan and cell to be merged's colspan add the two together to get the new one, move the content and delete the right one 
		var currColSpan = currTd.colSpan ; 
		var mergeCellColSpan = currTr.cells(currTd.cellIndex+1).colSpan; 
		var mergeCell = currTr.cells(currTd.cellIndex+1); 
		currTd.innerHTML = currTd.innerHTML + mergeCell.innerHTML; 
		currTr.deleteCell(currTd.cellIndex + 1); 
		currTd.colSpan = currColSpan+mergeCellColSpan ; 
		} 
		else {alert('Select the leftmost cell of the split to merge.');} 
		} 
		
	function splitRow(tbody,currTr,currTd){
	// check rowspan on other cells
		if (currTd.rowSpan > 1){
		currTd.rowSpan = currTd.rowSpan - 1;
		var tr = tbody.rows(currTr.rowIndex + 1);
		var where = 0;
		for (var i=0;i <  currTr.cells.length;i++) {
		if (i < currTd.cellIndex){
		if (currTr.cells(i).rowSpan < 2){where++;}
		}
		}   
		tr.insertCell(where);
		} 
		else {
		for (var i=0;i <  currTr.cells.length;i++) {
		var td = currTr.cells(i);
		if (i == currTd.cellIndex) {
		tr = tbody.insertRow(currTr.rowIndex + 1);
		tr.insertCell(0);
		} 
		else {td.rowSpan = td.rowSpan + 1;}
		}
		}
		}
	function mergeRows(tbody,currTr,currTd){
	// check if topmost of cells to merge
		var top = false;
		if (currTd.rowSpan < 2){
		for (var i=0;i <  currTr.cells.length;i++) {
		if (i !== currTd.cellIndex) {
		if (currTr.cells(i).rowSpan > 1){top = true; break;}
		}
		}
		}
		if (top){return;} 
		else {alert('Select the topmost row of the split to merge.');}
		}
	
	// execute the operation depending on the given command
	switch(cmdID.toLowerCase()) {
		case 'createcaption'      : table.createCaption();break;
		case 'deletecaption'      : table.deleteCaption();break;
		case 'createthead'        : table.createTHead();break;
		case 'deletethead'        : table.deleteTHead();break;
		case 'createtfoot'        : table.createTFoot();break;
		case 'deletetfoot'        : table.deleteTFoot();break;
		case 'insertrowtop'       : newtr = tbody.insertRow(0);insertRowDetails(tr,newtr);break;
		case 'insertrowbottom'    : newtr = tbody.insertRow(-1);insertRowDetails(tr,newtr);break;
		case 'insertrowbefore'    : newtr = tbody.insertRow(tr.rowIndex);insertRowDetails(tr,newtr);break;
		case 'insertrowafter'     : newtr = tbody.insertRow(tr.rowIndex+1);insertRowDetails(tr,newtr);break;
		case 'insertrowstart'     : newtr = tbody.insertRow(0);insertRowDetails(tr,newtr);break;
		case 'deleterow'          : tbody.deleteRow(tr.rowIndex);break;
		case 'insertcolumnleft'   : insertColumn(tbody,0);break;
		case 'insertcolumnright'  : insertColumn(tbody,-1);break;
		case 'insertcolumnbefore' : insertColumn(tbody,td.cellIndex);break;
		case 'insertcolumnafter'  : insertColumn(tbody,td.cellIndex+1);break;
		case 'deletecolumn'       : deleteColumn(tbody,td.cellIndex);break;
		case 'insertcellleft'     : tr.insertCell(0);break;
		case 'insertcellright'    : tr.insertCell(-1);break;
		case 'insertcellbefore'   : tr.insertCell(td.cellIndex);break;
		case 'insertcellafter'    : tr.insertCell(td.cellIndex+1);break;
		case 'insertcellstart'    : tr.insertCell(0);break;
		case 'deletecell'         : tr.deleteCell(td.cellIndex);break;
		case 'splitcell'          : splitCell(tbody,tr,td);break;
		case 'mergecells'         : mergeCells(tbody,tr,td);break;
		case 'splitrow'           : splitRow(tbody,tr,td);break;
		case 'mergerows'          : mergeRows(tbody,tr,td);break;
// inserted by lvn : property Palettes
        case 'tableproperties'    : nullBorders(editor_obj.contentWindow.document,'hide'); 
                                       setGlobalVar('_editor_field',objname);
                                       setGlobalVar('_editor_table',table);
                                       showModalDialog(_editor_url + "popups/tableprop.html?"+objname,
                                                       window,
                                                       "resizable: yes; help: no; status: no; scroll: no; ");
                                       td.focus();
                                       break;
           case 'rowproperties'      : setGlobalVar('_editor_field',objname);
                                       setGlobalVar('_editor_row',tr);
                                       showModalDialog(_editor_url + "popups/rowprop.html?"+objname,
                                                       window,
                                                       "resizable: yes; help: no; status: no; scroll: no; ");
                                       td.focus();
                                       break;
									   
		   case 'showmenutables'		:
										showMenuTables(objname);
										td.focus();
										break;
	
									   
           case 'cellproperties'     : setGlobalVar('_editor_field',objname);
                                       setGlobalVar('_editor_cell',td);
                                       showModalDialog(_editor_url + "popups/cellprop.html?"+objname,
                                                       window,
                                                       "resizable: yes; help: no; status: no; scroll: no; ");
                                       td.focus();
                                       break;
// end insert lvn property Palettes
           default                   : break;
        }
// if 0 table borders and the switch to show them is on: show them 
	// toggle is on : show null borders
	if (config.showborders){nullBorders(editor_obj.contentWindow.document,'show');}
		}
		} 
		return;
		}
// end insert by lvn 

/* ---------------------------------------------------------------------- *\
  Function    : editor_event
  Description : called everytime an editor event occurs
  Usage       : editor_event(objname, runDelay, eventName)
  Arguments   : objname - ID of textarea to replace
                runDelay: -1 = run now, no matter what
                          0  = run now, if allowed
                        1000 = run in 1 sec, if allowed at that point
\* ---------------------------------------------------------------------- */

	function editor_event(objname,runDelay) {
		var config = document.all[objname].config;
		var editor_obj  = document.all["_" +objname+  "_editor"];// html editor object
		if (runDelay == null) { runDelay = 0; }
		var editdoc;
		var editEvent = editor_obj.contentWindow ? editor_obj.contentWindow.event : event;

// catch keypress events
	if (editEvent && editEvent.keyCode) {
	    if (editor_obj.tagName.toLowerCase() == 'textarea') { return; }
	    var editdoc = editor_obj.contentWindow.document;
		var ord       = editEvent.keyCode;    // ascii order of key pressed
		var ctrlKey   = editEvent.ctrlKey;
		var altKey    = editEvent.altKey;
		var shiftKey  = editEvent.shiftKey;

	if (ord == 16) { return; }  // ignore shift key by itself
	if (ord == 17) { return; }  // ignore ctrl key by itself
	if (ord == 18) { return; }  // ignore alt key by itself
	
	//if (ctrlKey && (ord == 122 || ord == 90)){ return;}	// catch ctrl-z (UNDO)
	//if (ctrlKey && (ord == 121 || ord == 89)){return;}	// catch ctrl-y (REDO)
	
	/*Default Shortcuts built-in in IE (*cannot be cancelled).
	When called, these events will fire being the cursor anywhere in the page
	CTRL+f	=	FIND (Browser/Editor)*			
	CTRL+o	=	IE OPEN (Browser)*	CTRL+i	=	IE FAVORITES (Browser)*
	
	Default Shortcuts built-in in IE we don't want cancelled.
	DEL		= 	DELETES SELECTION			HOME	=	GO TO TOP OF PAGE			END	=	GO TO BOTTOM OF PAGE
		
	CTRL+a	=	SELECT ALL (Editor)			CTRL+b	=	BOLD (Editor)				CTRL+c	=	COPY (Editor)
	CTRL+i	=	ITALICS (Editor)			CTRL+k	=	IE INSERT LINK (Editor)		CTRL+m	=	INSERT PARAGRAPH (Editor)	
	CTRL+p	=	PRINT (Editor)				CTRL+u	=	UNDERLINE (Editor)			CTRL+v	=	PASTE (Editor)				
	CTRL+y	=	REDO (Editor)				CTRL+z	=	UNDO (Editor)
	*/
	
	//When called, these events will fire only if the editor is focused, otherwise  
	//the browser's default will do. (if exists)
	
	if (ctrlKey && (ord == 87) && editEvent.type == 'keydown') {     // Cancels CTRL+w (Close Browser Window)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;
	}
	//Default Shortcuts built-in in IE we want to assign a new function.
	if (ctrlKey && (ord == 86) && editEvent.type == 'keydown') { 	//cleans up the code while pasting on CTRL+V
	editEvent.returnValue = false;  editEvent.cancelBubble = true;	
	editdoc.execCommand('Paste');
	var str=editdoc.body.createTextRange().htmlText;
	if (str.indexOf("; mso-")>=0 ||str.indexOf("<v:")>=0 ||str.indexOf("class=Mso")>=0){
	myclean(editdoc);
	}
	editdoc.body.innerHTML = cleanHTML(editdoc.body.innerHTML);
	}
	
	if (shiftKey && (ord == 45) && editEvent.type == 'keydown') { 	//cleans up the code while pasting on Shift+INS
	editEvent.returnValue = false;  editEvent.cancelBubble = true;	
	editdoc.execCommand('Paste');
	var str=editdoc.body.createTextRange().htmlText;
	if (str.indexOf("; mso-")>=0 ||str.indexOf("<v:")>=0 ||str.indexOf("class=Mso")>=0){
	myclean(editdoc);
	}
	editdoc.body.innerHTML = cleanHTML(editdoc.body.innerHTML);
	}
	
	if (ctrlKey && (ord == 82) && editEvent.type == 'keydown') {     // Cancels CTRL+r (Refresh Browser Window)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   // And sets it for Editor's Refresh
	editdoc.body.innerHTML=""; 
	}
    
	if (ctrlKey && (ord == 72) && editEvent.type == 'keydown') {     // Cancels CTRL-h (IE Browser History)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   //And sets it for Editor Help
	window.showHelp(_editor_url + "popups/editor_help.htm"); return false;
	}

	//Now, we build our custom shorcuts
	if (ctrlKey && (ord == 83) && editEvent.type == 'keydown') {     // CTRL+s (Search and Replace)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	showModelessDialog(_editor_url + "popups/find.html",window, "resizable: no; help: no; status: no; scroll: no; ");return;
	}
	
	if (ctrlKey && (ord == 76) && editEvent.type == 'keydown') {     // CTRL+l(Bulleted List)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	editdoc.execCommand("InsertUnorderedList");
	}
	
	if (ctrlKey && (ord == 78) && editEvent.type == 'keydown') {     // CTRL+n(Numbered List)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	editdoc.execCommand("InsertOrderedList");
	}
    
	if (altKey && (ord == 83) && editEvent.type == 'keydown') { 	//ALT+s (Spell Check)
	var str=editdoc.selection.createRange().htmlText;
	var disTag1=str.indexOf("<IMG");
	var disTag2=str.indexOf("<SELECT");
	var disTag3=str.indexOf("<FORM");
	var disTag4=str.indexOf("<INPUT");
	var disTag5=str.indexOf("<BUTTON");
	
	if (disTag1>=0 ||disTag2>=0 ||disTag3>=0 ||disTag4>=0 ||disTag5>=0)
	{
	alert("Your selection must contain no images or form elements.\nPlease select complete paragraphs and try again.");
	} 
	else if (!str){alert('Nothing to spellcheck. Please select the text you want htmlArea to check.\nWe recommend you to select complete paragraphs.');}
	else {	
	editdoc.execCommand('copy'); 
	CheckDocument(); return true;
	}
	 }
	
	if (altKey && (ord == 88) && editEvent.type == 'keydown') {     // ALT+x (Remove Format)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	editdoc.execCommand("RemoveFormat");
	}
	
	if (altKey && (ord == 76) && editEvent.type == 'keydown') {     // ALT+l (Align Left)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	editdoc.execCommand("JustifyLeft");
	}
	
	if (altKey && (ord == 67) && editEvent.type == 'keydown') {     // ALT+c (Align Center)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	editdoc.execCommand("JustifyCenter");
	}
	
	if (altKey && (ord == 82) && editEvent.type == 'keydown') {     // ALT+r (Align Right)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	editdoc.execCommand("JustifyRight");
	}
	
	if (altKey && (ord == 74) && editEvent.type == 'keydown') {     // ALT+j (Full Justification)   
	editEvent.returnValue = false;  editEvent.cancelBubble = true;   
	editdoc.execCommand("JustifyFull");
	}
// cancel ENTER key and insert <BR> instead (Example to insert code onkey event)
	if (ord == 13 && editEvent.type == 'keypress') {
		editEvent.returnValue = false;
		editor_insertHTML(objname, "<br>"); return;
	}
    
	}

// setup timer for delayed updates (some events take time to complete)
	if (runDelay > 0) { return setTimeout(function(){ editor_event(objname); }, runDelay); }
	
// don't execute more than 3 times a second (eg: too soon after last execution)
	if (this.tooSoon == 1 && runDelay >= 0) { this.queue = 1; return; } // queue all but urgent events
	this.tooSoon = 1;
	setTimeout(function(){
	this.tooSoon = 0;
	if (this.queue) { editor_event(objname,-1); };
	this.queue = 0;
	}, 333);  // 1/3 second

  //editor_updateOutput(objname);
	editor_updateToolbar(objname);
	}

/* ---------------------------------------------------------------------- *\
  Function    : editor_updateToolbar
  Description : update toolbar state
  Usage       :
  Arguments   : objname - ID of textarea to replace
                action  - enable, disable, or update (default action)
\* ---------------------------------------------------------------------- */

	function editor_updateToolbar(objname,action) {
		var config = document.all[objname].config;
		var editor_obj  = document.all["_" +objname+  "_editor"];

// disable or enable toolbar
		if (action == "enable" || action == "disable") {

//var tbItems = new Array('FontName','FontSize','FontStyle');  
	    var tbItems = new Array('FontName','FontSize','FontStyle','FormatBlock');                           // add pulldowns

// set _editor_disabled to close the open modeless dialogs
		if (action == "disable") {setGlobalVar("_editor_field","_editor_disabled");} 
		else {setGlobalVar("_editor_field",objname);}

		for (var btnName in config.btnList) { tbItems.push(config.btnList[btnName][0]); } // add buttons
		for (var idxN in tbItems) {
		var cmdID = tbItems[idxN].toLowerCase();
		var tbObj = document.all["_" +objname+ "_" +tbItems[idxN]];
		if (cmdID == "htmlmode" ||  cmdID == "showhelp" || cmdID == "about" || cmdID == "popupeditor") { continue; } // don't change these buttons
		if (tbObj == null) { continue; }
		var isBtn = (tbObj.tagName.toLowerCase() == "button") ? true : false;

		if (action == "enable")  { tbObj.disabled = false; if (isBtn) { tbObj.className = 'btn' }}
		if (action == "disable") { tbObj.disabled = true;  if (isBtn) { tbObj.className = 'btnNA' }}
		}
		return;
		}

// update toolbar state
		if (editor_obj.tagName.toLowerCase() == 'textarea') { return; }   // don't update state in textedit mode
		var editdoc = editor_obj.contentWindow.document;

// Set FontName pulldown
		var fontname_obj = document.all["_" +objname+ "_FontName"];
		if (fontname_obj) {
		var fontname = editdoc.queryCommandValue('FontName');
		if (fontname == null) { fontname_obj.value = null; }
		else {
		var found = 0;
		for (i=0; i<fontname_obj.length; i++) {
		if (fontname.toLowerCase() == fontname_obj[i].text.toLowerCase()) {
		fontname_obj.selectedIndex = i;
		found = 1;
		}}
		if (found != 1) { fontname_obj.value = null; }// for fonts not in list
		}}
		
// Set Formatblock pulldown inserted by lvn
		var formatblock_obj = document.all["_" +objname+ "_FormatBlock"];
		if (formatblock_obj) {
		var formatblock = editdoc.queryCommandValue('FormatBlock');
		if (formatblock == null) { formatblock_obj.value = null; }
		else {
		var found = 0;
		for (i=0; i<formatblock_obj.length; i++) {
		if (formatblock == formatblock_obj[i].value) {
		formatblock_obj.selectedIndex = i;
		found = 1;
		}}
		if (found != 1) { formatblock_obj.value = null; }// for formatblocks not in list
		}}
// end insert by lvn

// Set FontSize pulldown
		var fontsize_obj = document.all["_" +objname+ "_FontSize"];
		if (fontsize_obj) {
		var fontsize = editdoc.queryCommandValue('FontSize');
		if (fontsize == null) { fontsize_obj.value = null; }
		else {
		var found = 0;
		for (i=0; i<fontsize_obj.length; i++) {
		if (fontsize == fontsize_obj[i].value) { fontsize_obj.selectedIndex = i; found=1; }
		}
		if (found != 1) { fontsize_obj.value = null; }// for sizes not in list
		}}

// Set FontStyle pulldown
		var classname_obj = document.all["_" +objname+ "_FontStyle"];
		if (classname_obj) {
		var curRange = editdoc.selection.createRange();
	// check element and element parents for class names
	    var pElement;
	    if (curRange.length) { pElement = curRange[0]; }// control tange
	    else                 { pElement = curRange.parentElement(); }// text range
	    while (pElement && !pElement.className) { pElement = pElement.parentElement; }// keep going up
		var thisClass = pElement ? pElement.className.toLowerCase() : "";
		if (!thisClass && classname_obj.value) { classname_obj.value = null; }
		else {
		var found = 0;
		for (i=0; i<classname_obj.length; i++) {
		if (thisClass == classname_obj[i].value.toLowerCase()) {
		classname_obj.selectedIndex = i;
		found=1;
		}}
		if (found != 1) { classname_obj.value = null; }// for classes not in list
		}}

// update button states
		var IDList = Array('Bold','Italic','Underline','StrikeThrough','SubScript','SuperScript','JustifyLeft','JustifyCenter','JustifyRight','JustifyFull','JustifyNone','InsertOrderedList','InsertUnorderedList','BlockDirLTR','BlockDirRTL','MultipleSelection','LiveResize');
		for (i=0; i<IDList.length; i++) {
		var btnObj = document.all["_" +objname+ "_" +IDList[i]];
		if (btnObj == null) { continue; }
		var cmdActive = editdoc.queryCommandState( IDList[i] );
		
	// option is OK
		if (!cmdActive)  {
		if (btnObj.className != 'btn') { btnObj.className = 'btn'; }
		if (btnObj.disabled  != false) { btnObj.disabled = false; }
		} 
	// option already applied or mixed content
		else if (cmdActive)  {
		if (btnObj.className != 'btnDown') { btnObj.className = 'btnDown';}
		if (btnObj.disabled  != false)   { btnObj.disabled = false;}
		}
			}

// inserted by lvn: table operations
	// disable table handling buttons when not in a table cell
		var table_src_element = null;
	// only works on non-control ranges
		if (editdoc.selection.type != 'Control'){
		table_src_element = editdoc.selection.createRange().parentElement();
		while (table_src_element != null && table_src_element.tagName != 'TD' && table_src_element.tagName != 'TH'){
		table_src_element = table_src_element.parentElement;
		}
			}
  // check if buttons are set in the config
		var IDList = Array('TableProperties','RowProperties','InsertRowBefore','InsertRowAfter','DeleteRow','InsertColumnBefore','InsertColumnAfter','DeleteColumn','CellProperties','InsertCellBefore','InsertCellAfter','DeleteCell','SplitCell','MergeCells','SplitRow','MergeRows','ShowMenuTables');
		for (var i=0; i<IDList.length; i++) {
		var found = false;
		for (var j=0;j<config.toolbar.length;j++){
		if(config.toolbar[j]) {
		for (var k=0;k<config.toolbar[j].length;k++){
		if ( IDList[i] ==  config.toolbar[j][k]){found = true;}
		}
			}
				}
// if in cell enable buttons, else disable them
		if (found) {
		var btnObj = document.all["_" +objname+ "_" +IDList[i]];
		if (table_src_element == null) {btnObj.disabled = true; btnObj.className = 'btnNA';} 
		else {btnObj.disabled = false;btnObj.className = 'btn';}
		}}
// end insert by lvn
		}

/* ---------------------------------------------------------------------- *\
  Function    : editor_updateOutput
  Description : update hidden output field with data from wysiwg
\* ---------------------------------------------------------------------- */

	function editor_updateOutput(objname) {
		var config = document.all[objname].config;
		var editor_obj  = document.all["_" +objname+  "_editor"];// html editor object
		var editEvent = editor_obj.contentWindow ? editor_obj.contentWindow.event : event;
		var isTextarea = (editor_obj.tagName.toLowerCase() == 'textarea');
		var editdoc = isTextarea ? null : editor_obj.contentWindow.document;
		
	// get contents of edit field
		var contents;
		if (isTextarea) { contents = editor_obj.value; }
		else{ contents = editdoc.body.innerHTML; }
		contents = cleanHTML(contents);
		contents = contents.replace(/<IMG id=((.|\s)+?) title=((.|\s)+?)name=\"MyAnchorGlyph">/gi, '<A NAME=$1></A>');
	
		 
	// check if contents has changed since the last time we ran this routine
		if (config.lastUpdateOutput && config.lastUpdateOutput == contents) { return; }
		else { config.lastUpdateOutput = contents; }
	// update hidden output field
		document.all[objname].value = contents;
		}

/* ---------------------------------------------------------------------- *\
  Function    : editor_filterOutput
  Description :
\* ---------------------------------------------------------------------- */

	function editor_filterOutput(objname) {
		editor_updateOutput(objname);
		var contents = document.all[objname].value;
		var config   = document.all[objname].config;
		
	// ignore blank contents
		if (contents.toLowerCase() == '<p>&nbsp;</p>') { contents = ""; }
	
	// filter tag - this code is run for each HTML tag matched
		var filterTag = function(tagBody,tagName,tagAttr) {
		tagName = tagName.toLowerCase();
		var closingTag = (tagBody.match(/^<\//)) ? true : false;
		
	// fix placeholder URLS - remove absolute paths that IE adds
		if (tagName == 'img') { tagBody = tagBody.replace(/(src\s*=\s*.)[^*]*(\*\*\*)/, "$1$2"); }
		if (tagName == 'a')   { tagBody = tagBody.replace(/(href\s*=\s*.)[^*]*(\*\*\*)/, "$1$2"); }
		
	// add additional tag filtering here

    // convert to vbCode
//    if      (tagName == 'b' || tagName == 'strong') {
//      if (closingTag) { tagBody = "[/b]"; } else { tagBody = "[b]"; }
//    }
//    else if (tagName == 'i' || tagName == 'em') {
//      if (closingTag) { tagBody = "[/i]"; } else { tagBody = "[i]"; }
//    }
//    else if (tagName == 'u') {
//      if (closingTag) { tagBody = "[/u]"; } else { tagBody = "[u]"; }
//    }
//    else {
//      tagBody = ""; // disallow all other tags!
//    }
	
	return tagBody;
	};

	// match tags and call filterTag
		RegExp.lastIndex = 0;
		var matchTag = /<\/?(\w+)((?:[^'">]*|'[^']*'|"[^"]*")*)>/g;   // this will match tags, but still doesn't handle container tags (textarea, comments, etc)
		contents = contents.replace(matchTag, filterTag);
		contents = contents.replace(/class=borders /gi, '');
		contents = contents.replace(/class=\"RunTimeHidden\" /gi,""); 
		var re1 = /BORDER-RIGHT: #c0c0c0 1px dotted; BORDER-TOP: #c0c0c0 1px dotted; BORDER-LEFT: #c0c0c0 1px dotted; BORDER-BOTTOM: #c0c0c0 1px dotted/g;
		var re2 = / style=""/g;
		contents = contents.replace(re1,"");
		contents = contents.replace(re2,"");
		// remove nextlines from output (if requested)
	if (config.replaceNextlines) { 
		contents = contents.replace(/\r\n/g, ' ');
		contents = contents.replace(/\n/g, ' ');
		contents = contents.replace(/\r/g, ' ');
	}

  // update output with filtered content
  document.all[objname].value = contents;
		}

// inserted by lvn
/* ---------------------------------------------------------------------- *\
  Function    : nullBorders
  Description : show 'dotted' borders for tables with border=0
  Usage       : nullBorders(doc,status);
  Arguments   : doc - document object in wich the borders must be shown
                status - show or hide 
\* ---------------------------------------------------------------------- */

	function nullBorders(doc,status) {
	// show table borders
		var edit_Tables = doc.body.getElementsByTagName("TABLE");
		for (i=0; i < edit_Tables.length; i++) {
			if (edit_Tables[i].border == '' || edit_Tables[i].border == '0' ) {
				if (status == 'show' ) {edit_Tables[i].style.border = "1px dotted #C0C0C0";} 
				else {edit_Tables[i].removeAttribute("style");}
		}
		
	edit_Rows = edit_Tables[i].rows;
		for (j=0; j < edit_Rows.length; j++) {
		edit_Cells = edit_Rows[j].cells;
		for (k=0; k < edit_Cells.length; k++) {
		if (edit_Tables[i].border == '' || edit_Tables[i].border == '0' ) {
		if (!edit_Cells[k].border || edit_Cells[k].border == '' || edit_Cells[k].border == '0' ) {
		if (status == 'show' ) {edit_Cells[k].style.border = "1px dotted #C0C0C0";} 
		else {edit_Cells[k].removeAttribute("style");}
		}} 
		else {
		if ( edit_Cells[k].border == '0' ) {
		if (status == 'show' ) {edit_Cells[k].style.border = "1px dotted #C0C0C0";} 
		else {edit_Cells[k].removeAttribute("style");}
		}}
		}}
		}}

// end insert by lvn

/* ---------------------------------------------------------------------- *\
  Function    : editor_setmode
  Description : change mode between WYSIWYG and HTML editor
  Usage       : editor_setmode(objname, mode);
  Arguments   : objname - button id string with editor and action name
                mode      - init, textedit, or wysiwyg
\* ---------------------------------------------------------------------- */

function editor_setmode(objname, mode) {
  var config     = document.all[objname].config;
  var editor_obj = document.all["_" +objname + "_editor"];

  // wait until document is fully loaded
  if (document.readyState != 'complete') {
    setTimeout(function() { editor_setmode(objname,mode) }, 25);
    return;
  }

  // define different editors
  var TextEdit   = '<textarea ID="_' +objname + '_editor" style="width:' +editor_obj.style.width+ '; height:' +editor_obj.style.height+ '; margin-top: -1px; margin-bottom: -1px;" TABINDEX=2></textarea>';
  var RichEdit   = '<iframe ID="_' +objname+ '_editor"    style="width:' +editor_obj.style.width+ '; height:' +editor_obj.style.height+ ';" TABINDEX=2></iframe>';

 // src="' +_editor_url+ 'popups/blank.html"

  //
  // Switch to TEXTEDIT mode
  //

  if (mode == "textedit" || editor_obj.tagName.toLowerCase() == 'iframe') {
    config.mode = "textedit";
    var editdoc = editor_obj.contentWindow.document;
    // inserted by lvn
    // show table borders
    nullBorders(editdoc,'hide');
    // end insert by lvn
    var contents = cleanHTML(editdoc.body.createTextRange().htmlText);
    contents = contents.replace(/<IMG id=((.|\s)+?) title=((.|\s)+?)name=\"MyAnchorGlyph">/gi, '<A NAME=$1></A>');
	
	editor_obj.outerHTML = TextEdit;
    editor_obj = document.all["_" +objname + "_editor"];
    editor_obj.value = contents;
    editor_event(objname);
    // inserted by lvn
    if (config.showborders) {
      editor_updateToolbar(objname, "disable");
      config.showborders =  true;
    } else {
    // end insert by lvn
    editor_updateToolbar(objname, "disable");  // disable toolbar items
    // insert by lvn
    }
    // end insert by lvn
      
// set event handlers
    editor_obj.onkeydown   = function() { editor_event(objname); }
    editor_obj.onkeypress  = function() { editor_event(objname); }
    editor_obj.onkeyup     = function() { editor_event(objname); }
    editor_obj.onmouseup   = function() { editor_event(objname); }
    editor_obj.ondrop      = function() { editor_event(objname, 100); }     // these events fire before they occur
    editor_obj.oncut       = function() { editor_event(objname, 100); }
    editor_obj.onpaste     = function() { editor_event(objname, 100); }
    editor_obj.onblur      = function() { editor_event(objname, -1); }

    editor_updateOutput(objname);
    editor_focus(editor_obj);
  }

  //
  // Switch to WYSIWYG mode
  //

  else {
    config.mode = "wysiwyg";
    var contents = editor_obj.value;
	//You can add markers or glyphs here
	contents = contents.replace(/<A NAME=\"(.*?)\"><\/A>/gi, '<img src=\"images/ed_anchor.gif\" id=\"$1\" title=\"Anchor Name\: $1\" name=\"MyAnchorGlyph\">');
		
		
    if (mode == 'init') { contents = document.all[objname].value; } // on init use original textarea content

    // create editor
    editor_obj.outerHTML = RichEdit;
    editor_obj = document.all["_" +objname + "_editor"];

    // get iframe document object
    // create editor contents (and default styles for editor)
	var html = "";
    html += '<html><head>\n';
    if (config.stylesheet) {
      html += '<link href="' +config.stylesheet+ '" rel="stylesheet" type="text/css">\n';
    }
    html += '<style>\n';
	//alert(editor_obj.style.backgroundColor);
	//mycolor="";
    html += 'body {' +config.bodyStyle+ '} \n';
	html += 'TD {' +config.TRStyle+ '} \n'; 
	html += 'TR {' +config.TDStyle+ '} \n'; 
	html += 'FORM {' +config.bordersStyle+ '} \n';
	html += 'MARQUEE {' +config.marqueeStyle+ '} \n';
	html += '.RunTimeHidden  {' +config.HiddenStyle+ '} \n';
    for (var i in config.fontstyles) {
      var fontstyle = config.fontstyles[i];
      if (fontstyle.classStyle) {
        html += '.' +fontstyle.className+ ' {' +fontstyle.classStyle+ '}\n';
      }
    }
    html += '</style>\n'
	  + '</head>\n'
      + '<body contenteditable="true" background="'+ MyBgImg+'" topmargin=1 leftmargin=1 bgcolor="'+ MyBgColor+'"' 
// still working on this
// updated by lvn: table actions (uncommented next line to show in popupmenu)
	 //+ ' oncontextmenu="return false;"'
      + ' oncontextmenu="parent.displayMenu(window,\'' +objname+ '\');return false;"'
	  + ' onDblClick="parent.DblClick(window,\'' +objname+ '\');return false;"'
	  + ' onHelp="window.showHelp(\'' +_editor_url + 'popups/editor_help.htm\');return false;"'
	  +'>'
      + contents
	  + '</body>\n'
      + '</html>\n';

    // write to editor window
    var editdoc = editor_obj.contentWindow.document;

    editdoc.open();
    editdoc.write(html);
    editdoc.close();
    editor_updateToolbar(objname, "enable");  // enable toolbar items

    // store objname under editdoc
    editdoc.objname = objname;

    // set event handlers
    editdoc.onkeydown      = function() { editor_event(objname); }
    editdoc.onkeypress     = function() { editor_event(objname); }
    editdoc.onkeyup        = function() { editor_event(objname); }
    editdoc.onmouseup      = function() { editor_event(objname); }
    editdoc.body.ondrop    = function() { editor_event(objname, 100); }     // these events fire before they occur
    editdoc.body.oncut     = function() { editor_event(objname, 100); }
    editdoc.body.onpaste   = function() { editor_event(objname, 100); }
    editdoc.body.onblur    = function() { editor_event(objname, -1); }

    // inserted by lvn
    // show table borders
	
	// show table borders 
	if (config.showborders) { 
	nullBorders(editdoc,'show'); 
	var btnObj = document.all["_" +objname+ "_ShowBorder"]; 
	if(btnObj) { btnObj.className = 'btnDown'; } 
	} 

    // end insert by lvn

// bring focus to editor. 
	//Don't focus on page load, only on mode switch
	if (mode != 'init') {editor_focus(editor_obj);} 
	// insert by lvn : check editor changes)
	else { 
	if (config.checkChanges == 1) { 
	var localVar = getGlobalVar("objnames");
	if (localVar == null){setGlobalVar("objnames",objname);} 
	else {	localVar = localVar + ',' + objname; setGlobalVar("objnames",localVar);}
	
	setGlobalVar("_" +objname + "_initialText",editdoc.body.innerHTML);
	if (window.onbeforeunload == null){window.onbeforeunload = function() {discardOnExit();}}
	}
// end insert by lvn
	}
	}

  // Call update UI
  // don't update UI on page load, only on mode switch
	if (mode != 'init') {editor_event(objname);}
	 editor_filterOutput(objname)
    editor_focus(editor_obj);
	}
//endfunction editor_setmode

/* ---------------------------------------------------------------------- *\
  Function    : editor_focus
  Description : bring focus to the editor
  Usage       : editor_focus(editor_obj);
  Arguments   : editor_obj - editor object
\* ---------------------------------------------------------------------- */

	function editor_focus(editor_obj) {
		// check editor mode
		if (editor_obj.tagName.toLowerCase() == 'textarea') {// textarea
			var myfunc = function() { editor_obj.focus(); };
			setTimeout(myfunc,100); // doesn't work all the time without delay
		}

		else {// wysiwyg
			var editdoc = editor_obj.contentWindow.document; 	// get iframe editor document object
			var editorRange = editdoc.body.createTextRange();	// editor range
			var curRange    = editdoc.selection.createRange();	// selection range
		
		if (curRange.length == null && 			// make sure it's not a controlRange
			!editorRange.inRange(curRange)) { 	// is selection in editor range
			editorRange.collapse(); 			// move to start of range
			editorRange.select(); 				// select
			curRange = editorRange;
			}
			}
		}
//end Function editor_focus
/* ---------------------------------------------------------------------- *\
  Function    : editor_about
  Description : display "about this editor" popup
\* ---------------------------------------------------------------------- */

function editor_about(objname) {
  showModalDialog(_editor_url + "popups/about.html", window, "resizable: yes; help: no; status: no; scroll: no; ");
}

/* ---------------------------------------------------------------------- *\
  Function    : _dec_to_rgb
  Description : convert dec color value to rgb hex
  Usage       : var hex = _dec_to_rgb('65535');   // returns FFFF00
  Arguments   : value   - dec value
\* ---------------------------------------------------------------------- */

	function _dec_to_rgb(value) {
		var hex_string = "";
		for (var hexpair = 0; hexpair < 3; hexpair++) {
		var myByte = value & 0xFF;			// get low byte
		value >>= 8;						// drop low byte
		var nybble2 = myByte & 0x0F;		// get low nybble (4 bits)
		var nybble1 = (myByte >> 4) & 0x0F;	// get high nybble
		hex_string += nybble1.toString(16); // convert nybble to hex
		hex_string += nybble2.toString(16);	// convert nybble to hex
		}
		return hex_string.toUpperCase();
		}

/* ---------------------------------------------------------------------- *\
  Function    : editor_insertHTML
  Description : insert string at current cursor position in editor.
  				If two strings are specifed, surround selected text with them.
  Usage       : editor_insertHTML(objname, str1, [str2], reqSelection)
  Arguments   : objname - ID of textarea
                str1 - HTML or text to insert
                str2 - HTML or text to insert (optional argument)
                reqSelection - (1 or 0) give error if no text selected
\* ---------------------------------------------------------------------- */
	function editor_insertHTML(objname, str1,str2, reqSel) {
		var config     = document.all[objname].config;
		var editor_obj = document.all["_" +objname + "_editor"];    // editor object
		if (str1 == null) { str1 = ''; }
		if (str2 == null) { str2 = ''; }

// for non-wysiwyg capable browsers just add to end of textbox
	if (document.all[objname] && editor_obj == null) {
		document.all[objname].focus();
		document.all[objname].value = document.all[objname].value + str1 + str2;
		return;
		}

// error checking
	if (editor_obj == null) { return alert("Unable to insert HTML.  Invalid object name '" +objname+ "'."); }
		editor_focus(editor_obj);
		var tagname = editor_obj.tagName.toLowerCase();
		var sRange;

 // insertHTML for wysiwyg iframe
	if (tagname == 'iframe') {
		var editdoc = editor_obj.contentWindow.document;
		sRange  = editdoc.selection.createRange();
		var sHtml   = sRange.htmlText;

// check for control ranges
	if (sRange.length) { return alert("Unable to insert HTML.  Try highlighting content instead of selecting it."); }

// insert HTML
		var oldHandler = window.onerror;
		window.onerror = function() { alert("Unable to insert HTML for current selection."); return true; } // partial table selections cause errors
		if (sHtml.length) {									// if content selected
		if (str2) { sRange.pasteHTML(str1 +sHtml+ str2) }	// surround
		else { sRange.pasteHTML(str1); }					// overwrite
		} 
		else {												// if insertion point only
		if (reqSel) { return alert("Unable to insert HTML.  You must select something first."); }
		sRange.pasteHTML(str1 + str2);                    	// insert strings
		}
		window.onerror = oldHandler;
		}

	// insertHTML for plaintext textarea
		else if (tagname == 'textarea') {
			editor_obj.focus();
			sRange  = document.selection.createRange();
			var sText   = sRange.text;
	
	// insert HTML
		if (sText.length) {								// if content selected
		if (str2) { sRange.text = str1 +sText+ str2; }	// surround
		else { sRange.text = str1; }					// overwrite
		} 
		else {											// if insertion point only
		if (reqSel) { return alert("Unable to insert HTML.  You must select something first."); }
			sRange.text = str1 + str2;					// insert strings
		}
		}
		else { alert("Unable to insert HTML.  Unknown object tag type '" +tagname+ "'."); }

	// move to end of new content
		  sRange.collapse(false);						// move to end of range
		  sRange.select();								// re-select
	}
//end function editor_insertHTML	

/* ---------------------------------------------------------------------- *\
  Function    : editor_getHTML
  Description : return HTML contents of editor (in either wywisyg or html mode)
  Usage       : var myHTML = editor_getHTML('objname');
\* ---------------------------------------------------------------------- */

	function editor_getHTML(objname) {
		var editor_obj = document.all["_" +objname + "_editor"];
		var isTextarea = (editor_obj.tagName.toLowerCase() == 'textarea');
		
		if (isTextarea) { return editor_obj.value; }
		else { return editor_obj.contentWindow.document.body.innerHTML;
		 }
		}
//end function editor_getHTML

/* ---------------------------------------------------------------------- *\
  Function    : editor_setHTML
  Description : set HTML contents of editor (in either wywisyg or html mode)
  Usage       : editor_setHTML('objname',"<b>html</b> <u>here</u>");
\* ---------------------------------------------------------------------- */

	function editor_setHTML(objname, html) {
		var editor_obj = document.all["_" +objname + "_editor"];
		var isTextarea = (editor_obj.tagName.toLowerCase() == 'textarea');
		
		if (isTextarea) { editor_obj.value = html; }
		else { editor_obj.contentWindow.document.body.innerHTML = html; }
		}
//end function editor_setHTML

/* ---------------------------------------------------------------------- *\
  Function    : editor_appendHTML
  Description : append HTML contents to editor (in either wywisyg or html mode)
  Usage       : editor_appendHTML('objname',"<b>html</b> <u>here</u>");
\* ---------------------------------------------------------------------- */

	function editor_appendHTML(objname, html) {
		var editor_obj = document.all["_" +objname + "_editor"];
		var isTextarea = (editor_obj.tagName.toLowerCase() == 'textarea');
		
		if (isTextarea) { editor_obj.value += html; }
		else { editor_obj.contentWindow.document.body.innerHTML += html; }
		}
//end function editor_appendHTML
/* ---------------------------------------------------------------------- *\
  Function    : setGlobalVar
  Description : set a variable with a global scope
  Usage       : setGlobalVar(varName, value);
  Arguments   : varName - name of the global variable to set
                value - value of the global variable to set
\* ---------------------------------------------------------------------- */
function setGlobalVar(varName, value) {
   if (this.cache == null) {this.cache = new Object();} 
   this.cache[varName] = value;
}
/* ---------------------------------------------------------------------- *\
  Function    : getGlobalVar
  Description : get a variable in a global scope
  Usage       : value = getGlobalVar(varName);
  Arguments   : varName - name of the global variable to get
                value - value of the global variable to get
\* ---------------------------------------------------------------------- */
function getGlobalVar(varName, value) {
   if (this.cache == null) {
     return null;
   } else {
     return this.cache[varName]; 
   }
}
// insert by lvn : check editor changes
/* ---------------------------------------------------------------------- *\
  Function    : discardOnExit
  Description : check if contents have been changed and ask user confirmation
                to discard changes
  Usage       : discardOnExit();
\* ---------------------------------------------------------------------- */
function discardOnExit(){
   var objNames = getGlobalVar("objnames").split(",");
   for (var i=0;i < objNames.length;i++){
       if (document.all["_" +objNames[i] + "_editor"].contentWindow.document.body.innerHTML 
           != getGlobalVar("_" + objNames[i] + "_initialText")) {
          event.returnValue = "Your document has changed. Discard changes?";
       }
   }
}
// end insert by lvn

// WME: MS-Word clean-up (begin)
/* ---------------------------------------------------------------------- *\
  Function    : MS-Word clean-up 
  Description : replace textarea with wysiwyg editor
  Usage       : editor_generate("textarea_id",[height],[width]);
  Arguments   : objname - ID of textarea to replace
                w       - width of wysiwyg editor
                h       - height of wysiwyg editor
\* ---------------------------------------------------------------------- */


function cleanEmptyTag(oElem) {  	
	if (oElem.hasChildNodes) {  		
	var tmp = oElem  		
	for (var k = tmp.children.length; k >= 0; k--) {
	if (tmp.children[k] != null) {cleanEmptyTag(tmp.children[k]);}  		
	}  
	} 
 	
	var oAttribs = oElem.attributes;  	
	if (oAttribs != null) {  		
	for (var j = oAttribs.length - 1; j >=0; j--) {  			
	var oAttrib = oAttribs[j];  			
	if (oAttrib.nodeValue != null) {  				
			oAttribs.removeNamedItem('style')
			oAttribs.removeNamedItem('title')
			oAttribs.removeNamedItem('class')
	}  	
	}}  
	
	if (oElem.style) oElem.style.cssText = ''; 
	if (oElem.innerHTML == '' || oElem.innerHTML == ' '); 
	}

function cleanTable(oElem) {  	
	oElem.style.cssText = '';  	
	var oAttribs = oElem.attributes;  	
	if (oAttribs != null) {for (var j = oAttribs.length - 1; j >=0; j--) {var oAttrib = oAttribs[j];  			
	if (oAttrib.nodeValue != null) {  				
			oAttribs.removeNamedItem('class')
			oAttribs.removeNamedItem('style')
			}  		
		}  	
	}    	
	var oTR = oElem.rows;  	
	if (oTR != null) {for (var r = oTR.length - 1; r >= 0; r--) {oTR[r].style.cssText = '';}}    	
	var oTD = oElem.cells;  	
	if (oTD != null) {for (var t = oTD.length - 1; t >= 0; t--) {oTD[t].style.cssText = '';}}  
}

function CheckDocument()
{
oShell= new             
ActiveXObject("WScript.Shell");
oShell.SendKeys( "^c" ); // copy
oWord = new ActiveXObject("Word.Application");
oWord.Documents.Add();
oWord.Selection.Paste();
oWord.ActiveDocument.CheckSpelling();
oWord.Selection.WholeStory();
oWord.Selection.Copy();
oWord.ActiveDocument.Close(0);
oWord.Quit();
var nRet= oShell.Popup( "HTMLArea finished checking your document.\nApply changes? Click OK to replace the corrected words.",0,"Spell Check Complete",33 );
if ( nRet == 1 ) {oShell.SendKeys( "^v" );}// paste
}

function cleanHTML(unclean){ 
this.RelativePaths=1;
this.ReplaceSpecialChars=1;

		unclean = unclean.replace(/\t/g, " ");
		//unclean = unclean.replace(/<v\:imagedata/gi, "<IMG");
		//unclean = unclean.replace(/<\/v:imagedata>/gi, "");  
		unclean = unclean.replace(/<\/?\w+:[^>]*>/gi, "");
		unclean = unclean.replace(/<\\?\??xml[^>]>/gi, "");
		unclean = unclean.replace(/<(\/)?strong>/ig, '<$1B> '); //replaces <STRONG> with <B>
		unclean = unclean.replace(/<(\/)?em>/ig, '<$1I> '); //replaces <EM> with <I>
		unclean = unclean.replace(/&nbsp;/gi, " ");
		unclean = unclean.replace(/[ ]+/g, " ");
		unclean = unclean.replace(/<\/TR>/gi, '\n<\/TR>');
		unclean = unclean.replace(/<\/FORM>/gi, '\n<\/FORM>');
		unclean = unclean.replace(/<\/TBODY>/gi, '\n<\/TBODY>');
		unclean = unclean.replace(/<\/TABLE>/gi, '\n<\/TABLE>\n');
		unclean = unclean.replace(/<BR[^>]*>/gi, "\n<BR>");
		unclean = unclean.replace(/<\/UL>/gi, '\n<\/UL>');
		unclean = unclean.replace(/<\/OL>/gi, '\n<\/OL>\r');
		unclean = unclean.replace(/<\/DL>/gi, '\n<\/DL>');
		unclean = unclean.replace(/<\/P>/gi, '');
		unclean = unclean.replace(/<SELECT/gi, '\n<SELECT');
		unclean = unclean.replace(/<OPTION/gi, '\r<OPTION');
		unclean = unclean.replace(/<\/SELECT>/gi, '\n<\/SELECT>');
		unclean = unclean.replace(/<INPUT/gi, '\n<INPUT');
		unclean = unclean.replace(/<!--\s+/gi, '<!--\r');
		unclean = unclean.replace(/ ([^=]+)=([^" >]+)/gi, " $1=\"$2\"");//"double quoted" attributes
		unclean = unclean.replace(/<INPUT type=\"hidden\" value=\"(.*?)\" name=\"(.*?)\">/gi, "<INPUT class=\"RunTimeHidden\" type=\"hidden\" value=\"$1\" name=\"$2\">");
//For my personal purposes
		unclean = unclean.replace(/^\s/gi, ''); //Removes Spaces on the beginning 
		unclean = unclean.replace(/\s$/gi, ''); //Removes Spaces on the end 
		unclean = unclean.replace(/\[I\]/gi, '\[1\]');
		unclean = unclean.replace(/\[II\]/gi, '\[2\]');
		unclean = unclean.replace(/\[III\]/gi, '\[3\]');
		unclean = unclean.replace(/\[IV\]/gi, '\[4\]');
		unclean = unclean.replace(/\[V\]/gi, '\[5\]');
		unclean = unclean.replace(/\[VI\]/gi, '\[6\]');
		unclean = unclean.replace(/\[VII\]/gi, '\[7\]');
		unclean = unclean.replace(/\[VIII\]/gi, '\[8\]');
		unclean = unclean.replace(/\[IX\]/gi, '\[9\]');
		unclean = unclean.replace(/\[X\]/gi, '\[10\]');
		unclean = unclean.replace(/\[XI\]/gi, '\[11\]');
		unclean = unclean.replace(/\[XII\]/gi, '\[12\]');
		unclean = unclean.replace(/\[XIII\]/gi, '\[13\]');
		unclean = unclean.replace(/\[XIV\]/gi, '\[14\]');
		unclean = unclean.replace(/\[XV\]/gi, '\[15\]');
		unclean = unclean.replace(/\[XVI\]/gi, '\[16\]');
		unclean = unclean.replace(/\[XVII\]/gi, '\[17\]');
		unclean = unclean.replace(/\[XVIII\]/gi, '\[18\]');
		unclean = unclean.replace(/\[XIX\]/gi, '\[19\]');
		unclean = unclean.replace(/\[XX\]/gi, '\[20\]');
		unclean = unclean.replace(/\[XXI\]/gi, '\[21\]');
		unclean = unclean.replace(/\[XXII\]/gi, '\[22\]');
		unclean = unclean.replace(/\[XXIII\]/gi, '\[23\]');
		unclean = unclean.replace(/\[XXIV\]/gi, '\[24\]');
		unclean = unclean.replace(/\[XXV\]/gi, '\[25\]');
		unclean = unclean.replace(/\[XXVI\]/gi, '\[26\]');
		unclean = unclean.replace(/\[XXVII\]/gi, '\[27\]');
		unclean = unclean.replace(/\[XXVIII\]/gi, '\[28\]');
		unclean = unclean.replace(/\[XXIX\]/gi, '\[29\]');
		unclean = unclean.replace(/\[XXX\]/gi, '\[30\]');
		unclean = unclean.replace(/\[XXXI\]/gi, '\[31\]');
		unclean = unclean.replace(/\[XXXII\]/gi, '\[32\]');
		unclean = unclean.replace(/\[XXXIII\]/gi, '\[33\]');
		unclean = unclean.replace(/\[XXXIV\]/gi, '\[34\]');
		unclean = unclean.replace(/\[XXXV\]/gi, '\[35\]');
		unclean = unclean.replace(/\[XXXVI\]/gi, '\[36\]');
		unclean = unclean.replace(/\[XXXVII\]/gi, '\[37\]');
		unclean = unclean.replace(/\[XXXVIII\]/gi, '\[38\]');
		unclean = unclean.replace(/\[XXXIX\]/gi, '\[39\]');
		unclean = unclean.replace(/\[XL\]/gi, '\[40\]');
		unclean = unclean.replace(/\[XLI\]/gi, '\[41\]');
		unclean = unclean.replace(/\[XLII\]/gi, '\[42\]');
		unclean = unclean.replace(/\[XLIII\]/gi, '\[43\]');
		unclean = unclean.replace(/\[XLIV\]/gi, '\[44\]');
		unclean = unclean.replace(/\[XLV\]/gi, '\[45\]');
		unclean = unclean.replace(/\[XLVI\]/gi, '\[46\]');
		unclean = unclean.replace(/\[XLVII\]/gi, '\[47\]');
		unclean = unclean.replace(/\[XLVIII\]/gi, '\[48\]');
		unclean = unclean.replace(/\[XLIX\]/gi, '\[49\]');
		unclean = unclean.replace(/\[L\]/gi, '\[50\]');
		unclean = unclean.replace(/\[LI\]/gi, '\[51\]');
		unclean = unclean.replace(/\[LII\]/gi, '\[52\]');
		unclean = unclean.replace(/\[LIII\]/gi, '\[53\]');
		unclean = unclean.replace(/\[LIV\]/gi, '\[54\]');
		unclean = unclean.replace(/\[LV\]/gi, '\[55\]');
		unclean = unclean.replace(/\[LVI\]/gi, '\[56\]');
		unclean = unclean.replace(/\[LVII\]/gi, '\[57\]');
		unclean = unclean.replace(/\[LVIII\]/gi, '\[58\]');
		unclean = unclean.replace(/\[LIX\]/gi, '\[59\]');
		unclean = unclean.replace(/\[LX\]/gi, '\[60\]');
		unclean = unclean.replace(/\[LXI\]/gi, '\[61\]');
		unclean = unclean.replace(/\[LXII\]/gi, '\[62\]');
		unclean = unclean.replace(/\[LXIII\]/gi, '\[63\]');
		unclean = unclean.replace(/\[LXIV\]/gi, '\[64\]');
		unclean = unclean.replace(/\[LXV\]/gi, '\[65\]');
		unclean = unclean.replace(/\[LXVI\]/gi, '\[66\]');
		unclean = unclean.replace(/\[LXVII\]/gi, '\[67\]');
		unclean = unclean.replace(/\[LXVIII\]/gi, '\[68\]');
		unclean = unclean.replace(/\[LXIX\]/gi, '\[69\]');
		unclean = unclean.replace(/\[LXX\]/gi, '\[70\]');
		unclean = unclean.replace(/\[LXXI\]/gi, '\[71\]');
		unclean = unclean.replace(/\[LXXII\]/gi, '\[72\]');
		unclean = unclean.replace(/\[LXXIII\]/gi, '\[73\]');
		unclean = unclean.replace(/\[LXXIV\]/gi, '\[74\]');
		unclean = unclean.replace(/\[LXXV\]/gi, '\[75\]');
		unclean = unclean.replace(/\[LXXVI\]/gi, '\[76\]');
		unclean = unclean.replace(/\[LXXVII\]/gi, '\[77\]');
		unclean = unclean.replace(/\[LXXVIII\]/gi, '\[78\]');
		unclean = unclean.replace(/\[LXXIX\]/gi, '\[79\]');
		unclean = unclean.replace(/\[LXXX\]/gi, '\[80\]');
		unclean = unclean.replace(/\[LXXXI\]/gi, '\[81\]');
		unclean = unclean.replace(/\[LXXXII\]/gi, '\[82\]');
		unclean = unclean.replace(/\[LXXXIII\]/gi, '\[83\]');
		unclean = unclean.replace(/\[LXXXIV\]/gi, '\[84\]');
		unclean = unclean.replace(/\[LXXXV\]/gi, '\[85\]');
		unclean = unclean.replace(/\[LXXXVI\]/gi, '\[86\]');
		unclean = unclean.replace(/\[LXXXVII\]/gi, '\[87\]');
		unclean = unclean.replace(/\[LXXXVIII\]/gi, '\[88\]');
		unclean = unclean.replace(/\[LXXXIX\]/gi, '\[89\]');
		unclean = unclean.replace(/\[XC\]/gi, '\[90\]');
		unclean = unclean.replace(/\[XCI\]/gi, '\[91\]');
		unclean = unclean.replace(/\[XCII\]/gi, '\[92\]');
		unclean = unclean.replace(/\[XCIII\]/gi, '\[93\]');
		unclean = unclean.replace(/\[XCIV\]/gi, '\[94\]');
		unclean = unclean.replace(/\[XCV\]/gi, '\[95\]');
		unclean = unclean.replace(/\[XCVI\]/gi, '\[96\]');
		unclean = unclean.replace(/\[XCVII\]/gi, '\[97\]');
		unclean = unclean.replace(/\[XCVIII\]/gi, '\[98\]');
		unclean = unclean.replace(/\[XCIX\]/gi, '\[99\]');
		unclean = unclean.replace(/\[C\]/gi, '\[100\]');
		unclean = unclean.replace(/ <\/A>/gi, '<\/A> ');
		//unclean = unclean.replace(/<[^(>|\/)]+>[ |	]*<\/[^>]+>/gi,"")//clears empty tags
		unclean = unclean.replace(/alt=\"\" /gi, '');//clears empty alt tag
		unclean = unclean.replace(/hspace=\"0\" /gi, '');//clears unnecessary hspace=0
		//var re  = /STYLE=\"WIDTH\s*:\s*(\d+)px;\s*HEIGHT:\s*(\d+)px;*\s*\"/gi;
		//unclean = unclean.replace(re, "width=$1 height=$2");

//This section handles relative links and link to anchors, taking rid of the path to the editor.
//In order it works, you need to move fullscreen.html out of the popups directory, fixing the image and editor paths in fullscreen.html
//and the path in the fullscreen function call. It doesn't handle images yet.
if (RelativePaths) {
	var re = new RegExp (document.URL, 'gi') ;
	unclean = unclean.replace(re, '') ;
	unclean = unclean.replace(/<A\s+HREF=\"/gi, '<A HREF=\"');
	
	DocumentLevel = document.URL.substring(0,document.URL.lastIndexOf("/")+1);
	var re = new RegExp ('<A HREF=\"'+DocumentLevel, 'gi') ;
	unclean = unclean.replace(re, '<A HREF=\"') ;
	
	LB1 = DocumentLevel.substring(0,DocumentLevel.lastIndexOf("/"));
	LB1 = LB1.substring(0,LB1.lastIndexOf("/")+1);
	var re = new RegExp ('<A HREF=\"'+LB1, 'gi') ;
	unclean = unclean.replace(re, '<A HREF=\"../') ;
	
	LB2 = LB1.substring(0,LB1.lastIndexOf("/"));
	LB2 = LB2.substring(0,LB2.lastIndexOf("/")+1);
	var re = new RegExp ('<A HREF=\"'+LB2, 'gi') ;
	unclean = unclean.replace(re, '<A HREF=\"../../') ;
	
	//LB3 = LB2.substring(0,LB2.lastIndexOf("/"));
	//LB3 = LB3.substring(0,LB3.lastIndexOf("/")+1);
	//var re = new RegExp ('<A HREF=\"'+LB3, 'gi') ;
	//unclean = unclean.replace(re, '<A HREF=\"../../../') ;
	 
	//LB4 = LB3.substring(0,LB3.lastIndexOf("/")+1);
	//var re = new RegExp ('<A HREF=\"'+LB4, 'gi') ;
	//unclean = unclean.replace(re, '<A HREF=\"../../../../')
	
	unclean = unclean.replace(/fullscreen\.html\?(.*?)\#(.*?)/gi, '#$2'); 
	unclean = unclean.replace(/fullscreen\.html/gi, '');
    		 
	}
if (ReplaceSpecialChars) {
	/*	Replace Special Character with Character Entities. 
		Method: String.fromCharCode(n)*/
		
		var spchars = [
		[255,254,253,252,251,250,249,248,247,246,245,244,243,242,241,240,239,238,237,236,235,234,233,232,231,230,229,228,227,226,225,224,223,222,221,220,219,218,217,216,215,214,213,212,211,210,209,208,207,206,205,204,203,202,201,200,199,198,197,196,195,194,193,192,191,190,189,188,187,186,185,184,183,182,181,180,179,178,177,176,175,174,172,171,169,168,167,166,165,164,163,162,161,376,339,353,8482,732,8211,8212,8226,8221,8220,8217,8216,338,352,8240,710,8224,8225,8230,8222,402,8218,8364,8249,8250,170],
		["&yuml;","&thorn;","&yacute;","&uuml;","&ucirc;","&uacute;","&ugrave;","&oslash;","&divide;","&ouml;","&otilde;","&ocirc;","&oacute;","&ograve;","&ntilde;","&eth;","&iuml;","&icirc;","&iacute;","&igrave;","&euml;","&ecirc;","&eacute;","&egrave;","&ccedil;","&aelig;","&aring;","&auml;","&atilde;","&acirc;","&aacute;","&agrave;","&szlig;","&THORN;","&Yacute;","&Uuml;","&Ucirc;","&Uacute;","&Ugrave;","&Oslash;","&times;","&Ouml;","&Otilde;","&Ocirc;","&Oacute;","&Ograve;","&Ntilde;","&ETH;","&Iuml;","&Icirc;","&Iacute;","&Igrave;","&Euml;","&Ecirc;","&Eacute;","&Egrave;","&Ccedil;","&AElig;","&Aring;","&Auml;","&Atilde;","&Acirc;","&Aacute;","&Agrave;","&iquest;","&frac34;","&frac12;","&frac14;","&raquo;","&ordm;","&sup1;","&cedil;","&middot;","&para;","&micro;","&acute;","&sup3;","&sup2;","&plusmn;","&deg;","&macr;","&reg;","&not;","&laquo;","&copy;","&uml;","&sect;","&brvbar;","&yen;","&curren;","&pound;","&cent;","&iexcl;","&Yuml;","&oelig;","&scaron;","&trade;","&tilde;","&mdash;","&ndash;","&bull;","&rdquo;","&ldquo;","&rsquo;","&lsquo;","&OElig;","&Scaron;","&permil;","&circ;","&Dagger;","&dagger;","&hellip;","&bdquo;","&fnof;","&sbquo;","&euro;","&lsaquo;","&rsaquo;","&ordf;"]
	];
		if (unclean) {
		for(var j = 0; j < spchars[0].length; j++){
			unclean = unclean.replace(eval("/"+String.fromCharCode(spchars[0][j])+"/g"),spchars[1][j]);
		}
	}
}//End if ReplaceSpecialChars=1

	return unclean; 
} 

function myclean(editdoc) { 
var 	oTags = editdoc.all.tags("SPAN"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {oTags[i].outerHTML = oTags[i].innerHTML;}}
		oTags = editdoc.all.tags("DIV"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {oTags[i].outerHTML = oTags[i].innerHTML;}}    	
		oTags = editdoc.all.tags("FONT"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {oTags[i].outerHTML = oTags[i].innerHTML;}}
		oTags = editdoc.all.tags("OBJECT"); 	if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {oTags[i].outerHTML = oTags[i].innerHTML;}}
		oTags = editdoc.all.tags("PARAM"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {oTags[i].outerHTML = oTags[i].innerHTML;}}
		oTags = editdoc.all.tags("P"); 			if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}  
		oTags = editdoc.all.tags("B"); 			if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}
		oTags = editdoc.all.tags("I"); 			if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}
		oTags = editdoc.all.tags("IMG"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}  
		oTags = editdoc.all.tags("U"); 			if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}
		oTags = editdoc.all.tags("H1"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}  
		oTags = editdoc.all.tags("H2"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}
		oTags = editdoc.all.tags("H3"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}
		oTags = editdoc.all.tags("H4"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}	
		oTags = editdoc.all.tags("H5"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}	
		oTags = editdoc.all.tags("H6"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}	
		oTags = editdoc.all.tags("BLOCKQUOTE"); if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}	
		oTags = editdoc.all.tags("OL"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}    	
		oTags = editdoc.all.tags("UL"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanEmptyTag(oTags[i]);}}  
		oTags = editdoc.all.tags("TABLE"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanTable(oTags[i]);}}  
		oTags = editdoc.all.tags("TR"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanTable(oTags[i]);}}  
		oTags = editdoc.all.tags("TD"); 		if (oTags != null) {for (var i = oTags.length - 1; i >= 0; i--) {cleanTable(oTags[i]);}}  
} 


/* ---------------------------------------------------------------------- *\
  Function    :displayMenu();
  Description : Context Menus
  Usage       : Displays Menus on right click
\* ---------------------------------------------------------------------- */
var oPopup = window.createPopup();
function displayMenu(editorWin,objname){
var parentWin = window;
var src_object = document.all["_" +objname + "_editor"];
var src_element = src_object.contentWindow.event.srcElement;
var table_object      = document.all["_" +objname + "_editor"];
var table_src_element = table_object.contentWindow.event.srcElement;

var editor_obj  = document.all["_" +objname+  "_editor"];       // html editor object
var editEvent = editor_obj.contentWindow ? editor_obj.contentWindow.event : event;
var editdoc = editor_obj.contentWindow.document;
var mouseX = editEvent.clientX + parentWin.document.all['_'+objname+'_editor'].offsetLeft;
var mouseY = editEvent.clientY + parentWin.document.all['_'+objname+'_editor'].offsetTop;
var contents = editdoc.body.innerHTML; 
//Builds the Context Menu popup
var oPopupBody = oPopup.document.body;
	oPopupBody.style.backgroundColor = "threedface";
    oPopupBody.style.border = "outset 2px";
    oPopupBody.style.fontFamily = "MS sans serif";
    oPopupBody.style.fontSize = "11px";
	oPopupBody.style.cursor = 'default';
	oPopupBody.onclick = oPopup.hide;
	oPopup.document.body.oncontextmenu = oPopup.hide;
	var MWidth = 150;

//Decide which Context Menu to show. Order of these routines is important. Don't alter it.
//Routine 1

if (src_element.tagName == 'IMG'){
CMenu=parentWin.document.all[objname+"Image_CMenu"];
oPopupBody.innerHTML = CMenu.innerHTML;
ContextItems=oPopupBody.all.tags("DIV").length*18+oPopupBody.all.tags("HR").length*19;
MHeight= ContextItems;
oPopup.show(mouseX+5, mouseY+100, MWidth, MHeight);
}

//MARQUEE
else if(src_element.tagName=="MARQUEE"){editor_action('_' + objname + '_' + 'marquee');}

//Routine 2
else if (table_src_element.tagName == 'TABLE'){
alert("Table Operations are not allowed here. Try un-selecting the table and positioning the cursor inside a cell.");
}
//Routine 3
else if (src_element.tagName == 'BODY' && contents ==""){
CMenu=parentWin.document.all[objname+"InsertOptions_CMenu"];
oPopupBody.innerHTML = CMenu.innerHTML;
ContextItems=oPopupBody.all.tags("DIV").length*18+oPopupBody.all.tags("HR").length*19;
MHeight= ContextItems;
oPopup.show(mouseX+5, mouseY+100, MWidth, MHeight);
}
//Routine 4
else if (editdoc.selection.createRange().text != ""){
oPopupBody.innerHTML = parentWin.document.all[objname+"Format_CMenu"].innerHTML;
ContextItems=oPopupBody.all.tags("DIV").length*18+oPopupBody.all.tags("HR").length*19;
MHeight= ContextItems;
oPopup.show(mouseX+5, mouseY+100, MWidth, MHeight);
}
//Routine 5
else if (table_src_element.tagName == 'TD'){
oPopupBody.innerHTML = parentWin.document.all[objname+"TableOperations_CMenu"].innerHTML;
ContextItems=oPopupBody.all.tags("DIV").length*18+oPopupBody.all.tags("HR").length*19;
MHeight= ContextItems;
oPopup.show(mouseX+5, mouseY+100, MWidth+20, MHeight);
}

//Last Routine 
else if(contents !==""){
oPopupBody.innerHTML = parentWin.document.all[objname+"Contents_CMenu"].innerHTML;
ContextItems=oPopupBody.all.tags("DIV").length*18+oPopupBody.all.tags("HR").length*19;
MHeight= ContextItems;
oPopup.show(mouseX+5, mouseY+100, MWidth, MHeight);
}

	}

//Adds Context Menu Items to the popup
function WriteMenuItems(objname){
//Setup Variables for Re-usable elements.
var CMDIdCode= 	' style="height:18" unselectable="on" onselectstart="return false;" oncontextmenu="return false;" onclick="parent.editor_action(this.id);" STYLE="background: threedface; height:18px; padding:2 0 0 2; color:menutext" onMouseOver= "this.style.background = \'highlight\'\; this.style.color=\'highlighttext\'" onMouseOut= "this.style.background = \'threedface\'\; this.style.color=\'menutext\'"';
var AboutCode= 	' style="height:18" unselectable="on" onselectstart="return false;" oncontextmenu="return false;" onclick="parent.goContext()";" STYLE="background: threedface; height:18px; padding:2 0 0 2; color:menutext" onMouseOver= "this.style.background = \'highlight\'\; this.style.color=\'highlighttext\'" onMouseOut= "this.style.background = \'threedface\'\; this.style.color=\'menutext\'"';
var separator= 	'<hr width="98%">'; 

var bold=		'<div id="_'		+ objname +	'_bold" '			+CMDIdCode+'>&nbsp;&nbsp;Bold</div> ';
var italic=		'<div id="_'		+ objname +	'_italic" '			+CMDIdCode+'>&nbsp;&nbsp;Italics</div> ';
var underline=	'<div id="_'		+ objname +	'_underline" '		+CMDIdCode+'>&nbsp;&nbsp;Underline</div> ';
var cut=		'<div id="_'		+ objname +	'_cut" '			+CMDIdCode+'>&nbsp;&nbsp;Cut</div> ';
var copy=		'<div id="_'		+ objname +	'_copy" '			+CMDIdCode+'>&nbsp;&nbsp;Copy</div> ';
var deletion=	'<div id="_'		+ objname +	'_delete" '			+CMDIdCode+'>&nbsp;&nbsp;Delete Selection</div> ';
var remove=		'<div id="_'		+ objname +	'_removeformat" '	+CMDIdCode+'>&nbsp;&nbsp;Remove Format</div> ';
var image=		'<div id="_'		+ objname +	'_insertimage"'		+CMDIdCode+'>&nbsp;&nbsp;Insert or Edit an Image</div> ';
var paste=		'<div id="_'		+ objname +	'_paste" '			+CMDIdCode+'>&nbsp;&nbsp;Paste</div> ';
var selectall=	'<div id="_'		+ objname +	'_SelectAll" '		+CMDIdCode+'>&nbsp;&nbsp;Select All</div> ';
var clearall=	'<div id="_'		+ objname +	'_refresh" '		+CMDIdCode+'>&nbsp;&nbsp;Clear All</div> ';
var find=   	'<div id="_'		+ objname +	'_find" '			+CMDIdCode+'>&nbsp;&nbsp;Find and Replace</div> ';
var inserttable='<div id="_'		+ objname +	'_inserttable" '	+CMDIdCode+'>&nbsp;&nbsp;Insert a Table</div> ';
var inserttemplate='<div id="_'		+ objname +	'_template" '		+CMDIdCode+'>&nbsp;&nbsp;Select a Template</div> ';
var helpfile=   '<div id="_'		+ objname +	'_showhelp" '		+CMDIdCode+'>&nbsp;&nbsp;Help</div> ';
var about=   	'<div'												+AboutCode+'>&nbsp;&nbsp;About This Editor</div> ';
var openfile=	'<div id="_'		+ objname +	'_openfile" '		+CMDIdCode+'>&nbsp;&nbsp;Open a Web File</div> ';
var openword=	'<div id="_'		+ objname +	'_openword" '		+CMDIdCode+'>&nbsp;&nbsp;Open a MS-Word File</div> ';
var print=		'<div id="_'		+ objname +	'_print" '			+CMDIdCode+'>&nbsp;&nbsp;Print</div> ';
var preview=	'<div id="_'		+ objname +	'_preview" '		+CMDIdCode+'>&nbsp;&nbsp;Preview</div> ';
var hyperlink=	'<div id="_'		+ objname +	'_insertlink" '		+CMDIdCode+'>&nbsp;&nbsp;Insert or Edit Hyperlink</div> ';
var removelink=	'<div id="_'		+ objname +	'_unlink" '			+CMDIdCode+'>&nbsp;&nbsp;Remove Hyperlink</div> ';
var changecase=	'<div id="_'		+ objname +	'_changecase" '		+CMDIdCode+'>&nbsp;&nbsp;Change Case</div> ';
var spellcheck=	'<div id="_'		+ objname +	'_spell" '			+CMDIdCode+'>&nbsp;&nbsp;Spell Check</div> ';

var insertcaption=		'<div id="_'	+ objname +	'_createcaption" '		+CMDIdCode+'>&nbsp;&nbsp;Insert Caption</div> ';
var insertrowbefore=	'<div id="_'	+ objname +	'_insertrowbefore" '	+CMDIdCode+'>&nbsp;&nbsp;Insert Row Before</div> ';
var insertrowafter=		'<div id="_'	+ objname +	'_insertrowafter" '		+CMDIdCode+'>&nbsp;&nbsp;Insert Row After</div> ';
var deleterow=			'<div id="_'	+ objname +	'_deleterow" '			+CMDIdCode+'>&nbsp;&nbsp;Delete Row</div> ';
var insertcolumnbefore=	'<div id="_'	+ objname +	'_insertcolumnbefore" '	+CMDIdCode+'>&nbsp;&nbsp;Insert Column Before</div> ';
var insertcolumnafter=	'<div id="_'	+ objname +	'_insertcolumnafter" '	+CMDIdCode+'>&nbsp;&nbsp;Insert Column After</div> ';
var deletecolumn=		'<div id="_'	+ objname +	'_deletecolumn" '		+CMDIdCode+'>&nbsp;&nbsp;Delete Column</div> ';
var insertcellbefore=	'<div id="_'	+ objname +	'_insertcellbefore" '	+CMDIdCode+'>&nbsp;&nbsp;Insert Cell Before</div> ';
var insertcellafter=	'<div id="_'	+ objname +	'_insertcellafter" '	+CMDIdCode+'>&nbsp;&nbsp;Insert Cell After</div> ';
var deletecell=			'<div id="_'	+ objname +	'_deletecell" '			+CMDIdCode+'>&nbsp;&nbsp;Delete Cell</div> ';
var tableproperties=	'<div id="_'	+ objname +	'_tableproperties" '	+CMDIdCode+'>&nbsp;&nbsp;Table Properties</div> ';
var rowproperties=		'<div id="_'	+ objname +	'_rowproperties" '		+CMDIdCode+'>&nbsp;&nbsp;Row Properties</div> ';
var cellproperties=		'<div id="_'	+ objname +	'_cellproperties" '		+CMDIdCode+'>&nbsp;&nbsp;Cell Properties</div> ';
var splitrow=			'<div id="_'	+ objname +	'_splitrow" '			+CMDIdCode+'>&nbsp;&nbsp;Split Row</div> ';
//var mergerow=			'<div id="_'	+ objname +	'_mergerows" '			+CMDIdCode+'>&nbsp;&nbsp;Merge Row</div> ';
var splitcell=			'<div id="_'	+ objname +	'_splitcell" '			+CMDIdCode+'>&nbsp;&nbsp;Split Cell</div> ';
var mergecell=			'<div id="_'	+ objname +	'_mergecells" '			+CMDIdCode+'>&nbsp;&nbsp;Merge Cell</div> ';
var showborder=			'<div id="_'	+ objname +	'_showborder" '			+CMDIdCode+'>&nbsp;&nbsp;Show/Hide Table Borders</div> ';
var upload=				'<div id="_'	+ objname +	'_upload" '				+CMDIdCode+'>&nbsp;&nbsp;Upload a New Image</div> ';
var insertform= 		'<div id="_'	+ objname +	'_inputform" '			+CMDIdCode+'>&nbsp;&nbsp;Form</div> ';
//Color Palletes Options
var bgsixteenmillion=	'<div id="_'	+ objname +	'_bgsixteenmillion" '	+CMDIdCode+'>&nbsp;&nbsp;16 Million Colors Palette</div> ';
var bgwebsafe=			'<div id="_'	+ objname +	'_bgwebsafe" '			+CMDIdCode+'>&nbsp;&nbsp;Web Safe Palette</div> ';
var bggrayscale=		'<div id="_'	+ objname +	'_bggrayscale" '		+CMDIdCode+'>&nbsp;&nbsp;Grayscale Palette</div> ';
var bgnamed=			'<div id="_'	+ objname +	'_bgnamed" '			+CMDIdCode+'>&nbsp;&nbsp;Named Colors Palette</div> ';
var removebg=			'<div id="_'	+ objname +	'_removebg" '			+CMDIdCode+'>&nbsp;&nbsp;Remove Background Color</div> ';
var backsixteenmillion=	'<div id="_'	+ objname +	'_backsixteenmillion" '	+CMDIdCode+'>&nbsp;&nbsp;16 Million Colors Palette</div> ';
var backwebsafe=		'<div id="_'	+ objname +	'_backwebsafe" '		+CMDIdCode+'>&nbsp;&nbsp;Web Safe Palette</div> ';
var backgrayscale=		'<div id="_'	+ objname +	'_backgrayscale" '		+CMDIdCode+'>&nbsp;&nbsp;Grayscale Palette</div> ';
var backnamed=			'<div id="_'	+ objname +	'_backnamed" '			+CMDIdCode+'>&nbsp;&nbsp;Named Colors Palette</div> ';
var removeback=			'<div id="_'	+ objname +	'_removeback" '			+CMDIdCode+'>&nbsp;&nbsp;Remove Highlight Color</div> ';
var foresixteenmillion=	'<div id="_'	+ objname +	'_foresixteenmillion" '	+CMDIdCode+'>&nbsp;&nbsp;16 Million Colors Palette</div> ';
var forewebsafe=		'<div id="_'	+ objname +	'_forewebsafe" '		+CMDIdCode+'>&nbsp;&nbsp;Web Safe Palette</div> ';
var foregrayscale=		'<div id="_'	+ objname +	'_foregrayscale" '		+CMDIdCode+'>&nbsp;&nbsp;Grayscale Palette</div> ';
var forenamed=			'<div id="_'	+ objname +	'_forenamed" '			+CMDIdCode+'>&nbsp;&nbsp;Named Colors Palette</div> ';
var removefore=			'<div id="_'	+ objname +	'_removefore" '			+CMDIdCode+'>&nbsp;&nbsp;Remove Font Color</div> ';

//InsertOptions_CMenu
document.write('<div id='+objname+'InsertOptions_CMenu style="display:none;"> ');
var InsertOptions_CMenu= new Array(openfile,openword,paste,separator,image,upload,inserttable,insertform,inserttemplate,separator,helpfile,about);
	for (j = 0; j < InsertOptions_CMenu.length; j++) {
		document.write(InsertOptions_CMenu[j]);
		}
document.write('</div>');

//Contents_CMenu
document.write('<div id='+objname+'Contents_CMenu style="display:none;"> ');
var Contents_CMenu= new Array(selectall,clearall,paste,find,separator,image,inserttable,insertform,separator,print,preview,separator,helpfile,about);
	for (j = 0; j < Contents_CMenu.length; j++) {
		document.write(Contents_CMenu[j]);
      		}
document.write('</div>');

//Image_CMenu
document.write('<div id='+objname+'Image_CMenu style="display:none;"> ');
var Image_CMenu= new Array(image,upload,cut,copy,separator,hyperlink);
	for (j = 0; j < Image_CMenu.length; j++) {
		document.write(Image_CMenu[j]);
      		}
document.write('</div>');

//Format_CMenu
document.write('<div id='+objname+'Format_CMenu style="display:none;"> ');
var Format_CMenu= new Array(bold,italic,underline,separator,copy,cut,deletion,remove,separator,hyperlink,removelink,changecase,spellcheck);
	for (j = 0; j < Format_CMenu.length; j++) {
		document.write(Format_CMenu[j]);
      		}
document.write('</div>');

//Tables_CMenu
document.write('<div id='+objname+'TableOperations_CMenu style="display:none;"> ');
var TableOperations_CMenu= new Array(inserttable,insertcaption,showborder,separator,tableproperties,rowproperties,cellproperties,separator,insertrowbefore,insertrowafter,deleterow,separator,insertcolumnbefore,insertcolumnafter,deletecolumn,separator,insertcellbefore,insertcellafter,deletecell,splitcell,mergecell,separator,paste,image,insertform);
	for (j = 0; j < TableOperations_CMenu.length; j++) {
		document.write(TableOperations_CMenu[j]);
      		}
document.write('</div>');

//Tables_CMenu
document.write('<div id='+objname+'TableProps_PDMenu style="display:none;">');
var TableProps_PDMenu= new Array(inserttable,insertcaption,showborder,separator,tableproperties,rowproperties,cellproperties,separator,insertrowbefore,insertrowafter,deleterow,separator,insertcolumnbefore,insertcolumnafter,deletecolumn,separator,insertcellbefore,insertcellafter,deletecell,splitcell,mergecell);
	for (j = 0; j < TableProps_PDMenu.length; j++) {
		document.write(TableProps_PDMenu[j]);
      		}
document.write('</div>');

//ColorPalletes
document.write('<div id='+objname+'BGColorPalletes_PullDownMenu style="display:none;"> ');
var BGColorPalletes_PullDownMenu= new Array(bgwebsafe,bgnamed,bgsixteenmillion,bggrayscale,removebg);
	for (j = 0; j < BGColorPalletes_PullDownMenu.length; j++) {
		document.write(BGColorPalletes_PullDownMenu[j]);
		}
document.write('</div>');

document.write('<div id='+objname+'BackColorPalletes_PullDownMenu style="display:none;"> ');
var BackColorPalletes_PullDownMenu= new Array(backwebsafe,backnamed,backsixteenmillion,backgrayscale,removeback);
	for (j = 0; j < BackColorPalletes_PullDownMenu.length; j++) {
		document.write(BackColorPalletes_PullDownMenu[j]);
		}
document.write('</div>');

document.write('<div id='+objname+'ForeColorPalletes_PullDownMenu style="display:none;"> ');
var ForeColorPalletes_PullDownMenu= new Array(forewebsafe,forenamed,foresixteenmillion,foregrayscale,removefore);
	for (j = 0; j < ForeColorPalletes_PullDownMenu.length; j++) {
		document.write(ForeColorPalletes_PullDownMenu[j]);
		}
document.write('</div>');
}

var oPopup = window.createPopup()
function goContext(){
var oPopupBody = oPopup.document.body;

  oPopupBody.innerHTML = oContext.innerHTML;
  oPopup.show(195, 200, 404, 174, document.body);
  //document.body.onmousedown = oPopup.hide;
}

//Create Pulldown Menu
var oPopupBody = oPopup.document.body;
oPopupBody.style.backgroundColor = "threedface";
oPopupBody.style.border = "outset 2px";
oPopupBody.style.fontFamily = "MS sans serif";
oPopupBody.style.fontSize = "11px";
oPopupBody.style.cursor = 'default';
oPopupBody.onclick = oPopup.hide;
MWidth = 150;
		
function showMenuTables(objname){
		var mouseX = event.clientX;
		var mouseY = event.clientY;
		oPopupBody.innerHTML = document.all[objname+"TableProps_PDMenu"].innerHTML;
		MHeight=oPopupBody.all.tags("DIV").length*18+oPopupBody.all.tags("HR").length*19;
		oPopup.show(mouseX+5, mouseY+5, MWidth+20, MHeight, document.body);
		}
		
function showMenuBackColors(objname){
		var mouseX = event.clientX;
		var mouseY = event.clientY;
		oPopupBody.innerHTML = document.all[objname+"BackColorPalletes_PullDownMenu"].innerHTML;
		MHeight= oPopupBody.all.tags("DIV").length*19+oPopupBody.all.tags("HR").length*19;
		oPopup.show(mouseX+5, mouseY+5, MWidth, MHeight, document.body);
		}
		
function showMenuForeColors(objname){
		var mouseX = event.clientX;
		var mouseY = event.clientY;
		oPopupBody.innerHTML = document.all[objname+"ForeColorPalletes_PullDownMenu"].innerHTML;
		MHeight= oPopupBody.all.tags("DIV").length*19+oPopupBody.all.tags("HR").length*19;
		oPopup.show(mouseX+5, mouseY+5, MWidth, MHeight, document.body);
		}

function showMenuBGColors(objname){
var oPopupBody = oPopup.document.body;
		var mouseX = event.clientX;
		var mouseY = event.clientY;
		oPopupBody.innerHTML = document.all[objname+"BGColorPalletes_PullDownMenu"].innerHTML;
		MHeight= oPopupBody.all.tags("DIV").length*19+oPopupBody.all.tags("HR").length*19;
		oPopup.show(mouseX+5, mouseY+5, MWidth, MHeight, document.body);
		}

function stoperror(){ 
return true 
} 
window.onerror=stoperror 


function DblClick(editorWin,objname){
var parentWin = window;
var src_object = document.all["_" +objname + "_editor"];
var src_element = src_object.contentWindow.event.srcElement;
var table_object = document.all["_" +objname + "_editor"];
var table_src_element = table_object.contentWindow.event.srcElement;
var editor_obj  = document.all["_" +objname+  "_editor"];       // html editor object
var editEvent = editor_obj.contentWindow ? editor_obj.contentWindow.event : event;
var editdoc = editor_obj.contentWindow.document;
var contents = editdoc.body.innerHTML; 

if (src_element.tagName == 'IMG' && src_element.name == 'MyAnchorGlyph'){
editor_action('_' + objname + '_' + 'anchor');
return false;
}

if (src_element.tagName == 'IMG')				{editor_action('_' + objname + '_' + 'insertimage');}
else if (src_element.tagName == 'HR')			{editor_action('_' + objname + '_' + 'line');}
else if (table_src_element.tagName == 'TD')		{displayMenu(editorWin,objname);}
else if (table_src_element.tagName == 'TABLE')	{alert('Table operations not allowed here\n To display the Table Properties Dialogs, double click or right click inside a cell.');}
}


function getHyperLink(currEl) {
while (currEl.tagName != "BODY") {
if (currEl.tagName == "A") {return currEl;}
currEl = currEl.parentElement;
}
return null;    
}

function getFont(currEl) {
while (currEl.tagName != "BODY") {
if (currEl.tagName == "FONT") {return currEl;}
currEl = currEl.parentElement;
}
return null;    
}
