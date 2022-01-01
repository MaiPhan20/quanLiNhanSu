/*** Freeware Open Source written by ngoCanh 2002-05                 */
/*** Original by Vietdev  http://vietdev.sourceforge.net             */
/*** Release 2004-01-07  R14.0                                       */
/*** GPL - Copyright protected                                       */
/*********************************************************************/
function iEditor(idF)
{
  obj= document.frames[idF]
  obj.document.designMode="On"

  obj.document.onmousedown= function(){ TXTOBJ=null; fID=idF;}
  obj.document.onmouseup= FMUp
  obj.document.onkeypress=FKPress
  obj.document.onkeydown=FKDown
  
  var arr= idF.split("VDevID");
  var val= document.forms[arr[0]][arr[1]].value

   val= val.replace(/\r/g,"");
   val= val.replace(/\n</g,"<");
   
   var reg= /<pre>/i ;
   if( reg.test(val) )
	 { val= val.replace(/\n/g, "&#13;"); val= val.replace(/\t/g, "     "); }

   val= val.replace(/\n/g, "<br>");
   val= val.replace(/\t/g, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");

   val= val.replace(/\\/g, "&#92;");
   val= val.replace(/\'/g, "&#39;");

   if(val && val.indexOf('ViEtDeVdIvId')>=0) val= initDefaultOptions1(val,idF)
   else initDefaultOptions0(idF)

   setTimeout("document.frames['"+idF+"'].document.body.innerHTML='"+val+"'",200)

   TXTOBJ= null
   format[idF]='HTML'
   viewm[idF]=1;

   obj.focus();
}





function changetoIframeEditor(el)
{
   if( navigator.platform!="Win32" ) return null;

   var wi= '', hi= '';
   if(el.style.height) hi= el.style.height
   else if(el.rows) hi= (14*el.getAttribute('rows')+28)
   if(el.style.width) wi= el.style.width
   else if(el.cols) wi= (6*el.getAttribute('cols') +25)
   
   var parent= el.parentNode   
  
   while(parent.nodeName != 'FORM') parent= parent.parentNode
   var oform= parent
   var fidx=0; while(document.forms[fidx] != oform) fidx++ ; // form index

   var fID;

   if(el.nodeName=='TEXTAREA' || el.nodeName=='INPUT')
	 fID= fidx+'VDevID'+el.getAttribute('name'); 
   else fID= fidx+'VDevID'+el.getAttribute('id')


   createEditor(el,fID,wi,hi);

   setTimeout("iEditor('"+fID+"')",200); 
   return true;
  
}




//////////////////////////////
// for text mode
function doFormat(arr,caret)
{
  var wrd=TXTOBJ.curword.text

  var cmd = new Array();
  cmd = arr.split(',')

  if(!cmd[0] || cmd[0]=='Swap[Text/HTML]' || cmd[0]=='Swap[Uni/View]' ) return 
  if(cmd[0]=='SelectAll') { TXTOBJ.focus(); TXTOBJ.select(); return }
  if(cmd[0]=='Cut') { caret.execCommand("Cut"); return }
  if(cmd[0]=='Copy') { caret.execCommand("Copy"); return }
  if(cmd[0]=='Paste') { caret.execCommand("Paste"); return }

  TXTOBJ.curword=caret.duplicate();
  TXTOBJ.curword.text= cmd[0]+wrd+cmd[1]
}





// init all found TEXTAREA in document
function changeAllTextareaToEditors()
{
  var i=0;
  while(document.getElementsByTagName('textarea')[i])
   { 
    if(!changetoIframeEditor(document.getElementsByTagName('textarea')[i])) break;
	if(++i>0 && !document.getElementsByTagName('textarea')[i] ) i=0;
   }
}



// init all found IFRAME in document to Editable
function changeAllIframeToEditors()
{
  var i=0;
  while(document.getElementsByTagName('iframe')[i])
  { 
	if(!changetoIframeEditor(document.getElementsByTagName('iframe')[i])) break;
	i++
  }

}



// init some IFRAMEs
// e.g. changeIframeToEditor('id1','id2',...); // id1= id of frame
function changeIframeToEditor()
{
  for(var j=0;j<arguments.length;j++)
   {
     var i=0;
	 while(document.getElementsByTagName('iframe')[i])
	  { 
		if(document.getElementsByTagName('iframe')[i].id == arguments[j])
		  {	changetoIframeEditor(document.getElementsByTagName('iframe')[i]); break; }
	    i++
	  }
   }
}




/////////////////////////////////////////////////////////////////
function controlRows(fid)
{
  var str = "<TR class=vdev align=center valign=middle EVENT>\
<TD nowrap style='cursor:pointer'>\
<img src='IURL/bold.gif' title='Bold' class=vdev onclick='doFormatF(\"Bold\")'>\
<img src='IURL/left.gif' title='Left' class=vdev onclick='doFormatF(\"JustifyLeft\")'>\
<img src='IURL/center.gif' title='Center' class=vdev onclick='doFormatF(\"JustifyCenter\")'>\
<img src='IURL/right.gif' title='Right' class=vdev onclick='doFormatF(\"JustifyRight\")'>\
<img src='IURL/outdent.gif' title='Outdent' class=vdev onclick='doFormatF(\"Outdent\")'>\
<img src='IURL/indent.gif' title='Indent' class=vdev onclick='doFormatF(\"Indent\")'>\
<img src='IURL/italic.gif' title='Italic' class=vdev onclick='doFormatF(\"Italic\")'>\
<img src='IURL/under.gif' title='Underline' class=vdev onclick='doFormatF(\"Underline\")'>\
<img src='IURL/strike.gif' title='StrikeThrough' class=vdev onclick='doFormatF(\"StrikeThrough\")'>\
<img src='IURL/superscript.gif' title='SuperScript' class=vdev onclick='doFormatF(\"SuperScript\")'>\
<img src='IURL/subscript.gif' title='SubScript' class=vdev onclick='doFormatF(\"SubScript\")'>\
<img src='IURL/bgcolor.gif' title='Background' class=vdev onclick='selectBgColor()'>\
<img src='IURL/fgcolor.gif' title='Foreground' class=vdev onclick='selectFgColor()'>\
<img src='IURL/image.gif' title='Insert Image' class=vdev onclick='doFormatF(\"InsertImage\")'>\
<img src='IURL/link.gif' title='Create Link' class=vdev onclick='createLink()'>\
<img src='IURL/numlist.gif' title='OrderedList' class=vdev onclick='doFormatF(\"InsertOrderedList\")'>\
<img src='IURL/bullist.gif' title='UnorderedList' class=vdev onclick='doFormatF(\"InsertUnorderedList\")'>\
<img src='IURL/hr.gif' title='HR' class=vdev onclick='doFormatF(\"InsertHorizontalRule\")'>\
<img src='IURL/delformat.gif' title='Delete Format' class=vdev onclick='doFormatF(\"RemoveFormat\")'>\
<img src='IURL/undo.gif' title='Undo' class=vdev onclick='doFormatF(\"Undo\")'>\
<img src='IURL/redo.gif' title='Redo' class=vdev onclick='doFormatF(\"Redo\")'>\
<img src='IURL/cool.gif' title='Emotions' class=vdev onclick='selectEmoticon()'>\
<img src='IURL/wow.gif' title='Characters' class=vdev onclick='characters()'>\
</TD></TR>"

if(FULLCTRL)
{
str += "\
<TR class=vdev valign=middle align=center EVENT>\
<TD nowrap style='cursor:pointer'>\
<img src='IURL/instable.gif' title='InsertTable' class=vdev onclick='insertTable()'>\
<img src='IURL/tabprop.gif' title='TableProperties' class=vdev onclick='tableProp()'>\
<img src='IURL/cellprop.gif' title='CellProperties' class=vdev onclick='cellProp()'>\
<img src='IURL/inscell.gif' title='InsertCell' class=vdev onclick='insertTableCell()'>\
<img src='IURL/delcell.gif' title='DeleteCell' class=vdev onclick='deleteTableCell()'>\
<img src='IURL/insrow.gif' title='InsertRow' class=vdev onclick='insertTableRow()'>\
<img src='IURL/delrow.gif' title='DeleteRow' class=vdev onclick='deleteTableRow()'>\
<img src='IURL/inscol.gif' title='InsertCol' class=vdev onclick='insertTableCol()'>\
<img src='IURL/delcol.gif' title='DeleteCol' class=vdev onclick='deleteTableCol()'>\
<img src='IURL/mrgcell.gif' title='IncreaseColSpan' class=vdev onclick='morecolSpan()'>\
<img src='IURL/spltcell.gif' title='DecreaseColSpan' class=vdev onclick='lesscolSpan()'>\
<img src='IURL/mrgrow.gif' title='IncreaseRowSpan' class=vdev onclick='morerowSpan()'>\
<img src='IURL/spltrow.gif' title='DecreaseRowSpan' class=vdev onclick='lessrowSpan()'>\
<img src='IURL/div.gif' title='CreateDiv/DivStyle' class=vdev onclick='insertDivLayer()'>\
<img src='IURL/divborder.gif' title='DivBorder' class=vdev onclick='editDivBorder()'>\
<img src='IURL/divfilter.gif' title='DivFilter' class=vdev onclick='editDivFilter()'>\
<img src='IURL/marquee.gif' title='Marquee' class=vdev onclick='doFormatF(\"InsertMarquee\")'>\
<img src='IURL/all.gif' title='SelectAll' class=vdev onclick='selectAll()'>\
<img src='IURL/cut.gif' title='Cut' class=vdev onclick='doFormatF(\"Cut\")'>\
<img src='IURL/copy.gif' title='Copy' class=vdev onclick='doFormatF(\"Copy\")'>\
<img src='IURL/paste.gif' title='Paste' class=vdev onclick='doFormatF(\"Paste\")'>\
<img src='IURL/chipcard.gif' title='Content Recover/Insert-Smartcard-Data' class=vdev onclick='SmartcardData()'>\
<img src='IURL/search.gif' title='Search/Replace' class=vdev onclick='findText()'>\
<img src='IURL/file.gif' title='Open/Save File' class=vdev onclick='FileDialog()'>\
</TD></TR>\
";
}

str += "<TR class=vdev valign=middle align=center EVENT>\
<TD nowrap style='cursor:pointer'>\
<SELECT name='QBCNTRL1' title='FontName' class=vdev onchange='doFormatF(\"FontName,\"+this.value)' style='width:120'>\
<OPTION value=''>"+ M_DEFFONT +
"<OPTION value='Arial'>Arial\
<OPTION value='Times New Roman'>Times New Roman\
<OPTION value='Webdings'>Webdings\
</SELECT>\
<SELECT name='QBCNTRL2' title='Headline' class=vdev onchange='doFormatF(\"formatBlock,\"+this.value)' style='width:50'>\
<OPTION value=''>"+ M_HEAD +
"<OPTION value='H1'>H1\
<OPTION value='H2'>H2\
<OPTION value='H3'>H3\
<OPTION value='H4'>H4\
<OPTION value='H5'>H5\
<OPTION value='H6'>H6\
<OPTION value='P'>"+ M_REMOVE +"</OPTION>\
</SELECT>\
<SELECT name='QBCNTRL3' title='FontSize' class=vdev onchange='doFormatF(\"FontSize,\"+this.value)' style='width:55'>\
<OPTION value=3>"+ M_FSIZE +
"<OPTION value=7>Size=7\
<OPTION value=6>Size=6\
<OPTION value=5>Size=5\
<OPTION value=4>Size=4\
<OPTION value=3>Size=3\
<OPTION value=2>Size=2\
<OPTION value=1>Size=1\
</OPTION>\
</SELECT>"


if(USEFORM==1)
{
str += "\
<SELECT name='QBCNTRL4' title='Form Elements' class=vdev onchange=doFormatF(this.value) style='width:80'>\
<OPTION value=''>"+ M_FORM +
"<OPTION value=InsertFieldset>Fieldset\
<OPTION value=InsertInputButton>Button\
<OPTION value=InsertInputReset>Reset\
<OPTION value=InsertInputSubmit>Submit\
<OPTION value=InsertInputCheckbox>Checkbox\
<OPTION value=InsertInputRadio>Radio\
<OPTION value=InsertInputText>Text\
<OPTION value=InsertSelectDropdown>Dropdown\
<OPTION value=InsertSelectListbox>Listbox\
<OPTION value=InsertTextArea>TextArea\
<OPTION value=InsertButton>IEButton\
<OPTION value=InsertIFrame>IFrame\
</SELECT>";
}

str += "\
<INPUT name='QBCNTRL6' title='Quicksave' value='"+ M_QSAVE +"' class=vdev onclick='saveBefore()' type=button style='width:45'>\
<INPUT name='QBCNTRL5' title='View/Source' value='"+ M_SWAPMODE +"' class=vdev onclick='swapMode()' type=button style='width:70'>\
<INPUT name='QBCNTRL8' title='Upload files' value='"+ M_UPLOAD +"' class=vdev onclick='doUploadFile()' type=button style='width:50'>\
"

if(UNICODE) str += "\
<INPUT name='QBCNTRL4' title='Unicode/Iso' value='"+ M_SWAPUNI +"' class=vdev onclick='swapUnicode()' type=button style='width:70'>\
"

if(FULLCTRL)
{
str += "\
<INPUT name='QBCNTRL7' title='View/Iso' value='"+ M_SWAPCODE +"' class=vdev onclick='swapCharCode()' type=button style='width:70'>\
<INPUT name='QBCNTRL9' title='General options' value='"+ M_OPTIONS +"' class=vdev onclick='doEditorOptions()' type=button style='width:50'>\
<INPUT name='QBCNTRL10' title='Help' value='"+ M_HELP +"' class=vdev onclick='displayHelp()' type=button style='width:35'>\
";
}
else
{
str += "<INPUT name='QBCNTRL11' title='Extra functions' value='"+ M_EXTRAS +"' class=vdevx onclick='doExtras()' type=button style='width:65'>"
}

str += "<INPUT name='QBCNTRL12' title='Change back to textmode' value='"+M_DESTROY +"' class=vdev onclick='destroyEditor()' type=button style='width:25;'>"

str += "</TD></TR>"

 var iurl= QBPATH + '/imgedit'
 var event= "onmousedown='fID=\"" + fid +"\"'"
 str = str.replace(/IURL/g, iurl);
 str = str.replace(/EVENT/g, event);
 return str ;
}




function createEditor(el,id,wi,hi)
{
  if(wi=='' || parseInt(wi)<600) wi=600;
  if(hi=='' || parseInt(hi)<100) hi=100;
  
  var hval='';
  if(el.value) hval= el.value;
  hval= hval.replace(/\'/g,"&#39;")
  hval= hval.replace(/&/g,"&amp;")

  var arr = id.split("VDevID")

  var strx = "<iframe id="+id+" style='height:"+hi+"; width:"+wi+"'></iframe>"
  strx += "<input name="+arr[1]+" type=hidden value='"+hval+"'></input>"
  var str="<TABLE border=1 cellspacing=0 cellpadding=1 width="+wi+"><tr><td align=center>"
  str += strx+"</td></tr>"
  str += controlRows(id);
  str += "</TABLE>" ;

  el.outerHTML= str;
}



function destroyEditor()
{
  var el=document.frames[fID]; 
  if(!el){alert(EDISELECT);return}

  var urlx= QBPATH + '/deeditor.html'

  var twidth= 300, theight=140;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 55
  	    	  
  var newWin1=window.open(urlx,"destroy","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()
}






function selectEmoticon()
{ 
  var el=document.frames[fID]; 
  if(!el){alert(EDISELECT);return}
  el.focus();
  doFormatDialog('emoticon.html','InsertImage','')
}


function selectBgColor()
{ 
  doFormatDialog('selcolor.html',"BackColor",'')
}


function selectFgColor()
{ 
  doFormatDialog('selcolor.html','ForeColor','')
}




function doUploadFile()
{
  var el=document.frames[fID]; 
  if(!el){alert(EDISELECT);return}
  el.focus()

  var urlx= QBPATH + '/upload.html'

  var twidth= 0.8*screen.width, theight=140;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 55
  	    	  
  var newWin1=window.open(urlx,"upload","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()

}


function doEditorOptions()
{
  var el=document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()

  var urlx= QBPATH + '/options.html'

  var twidth= 0.8*screen.width, theight=190;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 55
  	    	  
  var newWin1=window.open(urlx,"options","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()

}


function displayHelp()
{
  var urlx= QBPATH + '/edithelp.html'

  var newWin=window.open(urlx,"help","toolbar=no, width=600px,height=400px,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no;scroll=no")
  newWin.focus()
}


function doExtras()
{
  var el=document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()

  var urlx= QBPATH + '/extras.html'
  var twidth=400, theight=20;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 155
  	    	  
  var newWin1=window.open(urlx,"extras","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()

}



function insertLink(linkurl)
{
  var el=document.frames[fID]
  if(!el && !TXTOBJ){alert(ELESELECT);return}

  if(el)
  {
	el.focus();
    var sel = el.document.selection;
	var strx= "<A href='"+linkurl+"' target=nwin>" + linkurl + "</A>"

	var Range = sel.createRange();
	if(!Range.duplicate) return;
	Range.pasteHTML(strx);
  }
  else 
  {
	TXTOBJ.focus();
    var caret= TXTOBJ.document.selection.createRange()
	TXTOBJ.curword=caret.duplicate();
	var strx= "<A href='"+linkurl+"' target=nwin>" + linkurl + "</A>,"
	doFormat(strx,caret)
  }

}





function editDivBorder()
{
  var el=document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()
  
  var sel = el.document.selection;
  if(sel==null || sel.type!='Control') {alert(DIVSELECT);return} 

  var Range = sel.createRange();
  if(Range(0).tagName!='DIV') return

  var urlx= QBPATH + '/divborder.html'

  var twidth= 0.8*screen.width, theight=215;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 55
  	    	  
  var newWin1=window.open(urlx,"divborder","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()

}




function editDivFilter()
{
  var el=document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()

  var sel = el.document.selection;
  if(sel==null || sel.type!='Control') {alert(DIVSELECT);return} 

  var Range = sel.createRange();
  if(Range(0).tagName!='DIV') return

  var urlx= QBPATH + '/divfilter.html'

  var twidth= 0.8*screen.width, theight=210;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 55
  	    	  
  var newWin1=window.open(urlx,"divfilter","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()

}





function findTextHotKey(forward)
{
  if(!fID && !TXTOBJ){alert(EDISELECT);return}
  if(fID) el=document.frames[fID]
  else el= TXTOBJ
  el.focus();

  var rng = el.document.selection.createRange();
  el.curword=rng.duplicate();

  if(!FWORD && !el.curword.text ){ alert(NOFINDKEY); return }
  else if(el.curword.text)FWORD= el.curword.text

  if(el.curword.text)
   {
     if(forward==1) rng.moveEnd("character", -1 );  
	 else rng.moveStart("character", 1);  
   }

  if(rng.findText(FWORD,100000,FLAGS+forward)==true)
   { rng.select();  rng.scrollIntoView(); return }

  alert(FINDFINISH)
  return

}









function FileDialog()
{
  var urlx= QBPATH + '/filedialog.html'

  var twidth= 0.5*screen.width, theight=100;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 55
  	    	  
  var newWin1=window.open(urlx,"fdialog","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()
}




function initDefaultOptions0(fID)
{
   setTimeout("document.frames['"+fID+"'].document.body.style.fontFamily='"+DFFACE+"'",200)
   setTimeout("document.frames['"+fID+"'].document.body.style.fontSize='"+DFSIZE+"'",200)
   setTimeout("document.frames['"+fID+"'].document.body.style.color='"+DCOLOR+"'",200)
   setTimeout("document.frames['"+fID+"'].document.body.style.backgroundColor='"+DBGCOL+"'",200)
   setTimeout("document.frames['"+fID+"'].document.body.style.backgroundImage='url("+DBGIMG+")'",200)
   setTimeout("CSS['"+fID+"']=document.frames['"+fID+"'].document.createStyleSheet('"+DCSS+"')",200)
   FACE[fID]= DFFACE;
   SIZE[fID]= DFSIZE;
   COLOR[fID]= DCOLOR;
   BCOLOR[fID]= DBGCOL;
   BIMAGE[fID]= DBGIMG;
}






function DefaultOptions(linex)
{
  var retArr= new Array('','','','','','','');
  var tempx, strx, objx, idx ;


  // DEFAULT DIV
  var idx= linex.indexOf('ViEtDeVdIvId')
  if(idx>=0) 
	{
	  strx= linex.substring(linex.indexOf('style="')+7,linex.indexOf('">'))

      var atrA= strx.split(";")
	  for(var i=0; i<atrA.length; i++)
		{
		  tempx= atrA[i].split(':')
		  switch(tempx[0].toUpperCase())
		   {
			case "FONT-FAMILY": retArr[0]= tempx[1]; break;
			case "FONT-SIZE": retArr[1]= tempx[1]; break;
			case "BACKGROUND-COLOR": retArr[2]= tempx[1]; break;
			case "COLOR": retArr[3]= tempx[1]; break;
			case "BACKGROUND-IMAGE": if(tempx[2]) tempx[1] += ':'+ tempx[2];
                        retArr[4]= tempx[1].substring(tempx[1].indexOf('url(')+4,tempx[1].indexOf(')') ); 
									 break;
		   }
	    }

	  linex= ""+ />.*<\/div>/i.exec(linex)
      linex= linex.substring(1,linex.length-6)	
    }


   // EXT STYLE
   idx= linex.indexOf('<style>@import url("')
   if( idx>=0 )
    {
	   var strx= linex.substring(idx+20, linex.indexOf('")'))
       retArr[5]= strx
	   linex= linex.substring(0,idx)
    }

   retArr[6]= linex

   return retArr

}





function initDefaultOptions1(linex,fID)
{
  var retArr= new Array();

  retArr= DefaultOptions(linex);

  setTimeout("document.frames['"+fID+"'].document.body.style.fontFamily='"+retArr[0]+"'",200)
  setTimeout("document.frames['"+fID+"'].document.body.style.fontSize='"+retArr[1]+"'",200)
  setTimeout("document.frames['"+fID+"'].document.body.style.backgroundColor='"+retArr[2]+"'",200)
  setTimeout("document.frames['"+fID+"'].document.body.style.color='"+retArr[3]+"'",200)
  setTimeout("document.frames['"+fID+"'].document.body.style.backgroundImage='url("+retArr[4]+")'",200)
  setTimeout("CSS['"+fID+"']=document.frames['"+fID+"'].document.createStyleSheet('"+retArr[5]+"')",200)

  FACE[fID]= retArr[0];
  SIZE[fID]= retArr[1];
  COLOR[fID]= retArr[3];
  BCOLOR[fID]= retArr[2];
  BIMAGE[fID]= retArr[4];

  return retArr[6]

}






function actualize()
{
  var i=0;
  while(document.getElementsByTagName('iframe')[i])
  { 
	setHiddenValue(document.getElementsByTagName('iframe')[i].id) 
	i++
  }
}



function setHiddenValue(fid)
{ 
 if(!fid) return

 var strx= editorContents(fid)

 var idA= fid.split('VDevID')
 if(!idA[0]) return;

 var fobj= document.forms[idA[0]]
 if(!fobj) return;

 var loc=location.href
 loc= loc.substring(0,loc.lastIndexOf('/'))
 if(! /http:\/\//.test(loc) || /http\:\/\/127\.0\.0\.1/.test(loc) || /http\:\/\/localhost/.test(loc))
  {
   loc= loc.replace(/\//g,"\\/")
   loc= loc.replace(/\./g,"\\.")
   var reg= eval("/"+loc+"/g");
   strx= strx.replace(reg,".")
  }

 fobj[idA[1]].value= strx

}	





function doCleanCode(strx,fid) 
{    

  strx = strx.replace(/\r/g,""); 
  strx = strx.replace(/\n>/g,">"); 
  strx = strx.replace(/>\n/g,">"); 

  strx = strx.replace(/\\/g,"&#92;");
  strx = strx.replace(/\'/g,"&#39;")


  // Security
  if(SECURE==1)
	{
	  strx = strx.replace(/<meta/ig, "< meta"); 
	  strx = strx.replace(/&lt;meta/ig, "&lt; meta"); 

	  strx = strx.replace(/<script/ig, "< script"); 
	  strx = strx.replace(/&lt;script/ig, "&lt; script"); 
	  strx = strx.replace(/<\/script/ig, "< /script"); 
	  strx = strx.replace(/&lt;\/script/ig, "&lt; /script"); 

	  strx = strx.replace(/<iframe/ig, "< iframe"); 
	  strx = strx.replace(/&lt;iframe/ig, "&lt; iframe"); 
	  strx = strx.replace(/<\/iframe/ig, "< /iframe"); 
	  strx = strx.replace(/&lt;\/iframe/ig, "&lt; /iframe"); 

	  strx = strx.replace(/<object/ig, "< object"); 
	  strx = strx.replace(/&lt;object/ig, "&lt; object"); 
	  strx = strx.replace(/<\/object/ig, "< /object"); 
	  strx = strx.replace(/&lt;\/object/ig, "&lt; /object"); 

	  strx = strx.replace(/<applet/ig, "< applet"); 
	  strx = strx.replace(/&lt;applet/ig, "&lt; applet"); 
	  strx = strx.replace(/<\/applet/ig, "< /applet"); 
	  strx = strx.replace(/&lt;\/applet/ig, "&lt; /applet"); 

	  strx = strx.replace(/ on/ig, " o&shy;n"); 
	  strx = strx.replace(/script:/ig, "script&shy;:"); 
    }


  var idx= strx.indexOf('ViEtDeVdIvId')
  if( idx>=0 ) strx= strx.substring(strx.indexOf('>')+1,strx.lastIndexOf('</DIV>'))

  idx= strx.indexOf('<style>@import url(')
  if( idx>=0 ) strx= strx.substring(0,idx)
  if(CSS[fid] && CSS[fid].href) strx += '<style>@import url("'+CSS[fid].href+'");</style>';


  var defdiv="" ;
  if(FACE[fid]) defdiv += "; FONT-FAMILY:"+ FACE[fid] 
  if(SIZE[fid]) defdiv += "; FONT-SIZE:"+ SIZE[fid]
  if(COLOR[fid]) defdiv += "; COLOR:"+ COLOR[fid]
  if(BCOLOR[fid])defdiv += "; BACKGROUND-COLOR:"+ BCOLOR[fid]
  if(BIMAGE[fid] && BIMAGE[fid]!='about:blank')
	{
     BIMAGE[fid]= BIMAGE[fid].replace(/\\/g,"/"); 
	 defdiv += "; BACKGROUND-IMAGE:url("+ BIMAGE[fid]+")"
    }
  if(defdiv)
	{
	 defdiv = '<DIV id=ViEtDeVdIvId style="POSITION:Relative' + defdiv + '">'
	 strx = defdiv + strx + "</DIV>"
	}


  // From Valerio Santinelli, PostNuke Developer,(http://www.onemancrew.org)
  // removes all Class attributes on a tag eg. '<p class=asdasd>xxx</p>' returns '<p>xxx</p>'    
     //code = code.replace(/<([\w]+) class=([^ |>]*)([^>]*)/gi, "<$1$3")
  // removes all style attributes eg. '<tag style="asd asdfa aasdfasdf" something else>' returns '<tag something else>'
     //code = code.replace(/<([\w]+) style=\"([^\"]*)\"([^>]*)/gi, "<$1$3")
  // gets rid of all xml stuff... <xml>,<\xml>,<?xml> or <\?xml>
     //code = code.replace(/<]>/gi">\\?\??xml[^>]>/gi, "")
  // get rid of ugly colon tags <a:b> or </a:b>
     //code = code.replace(/<\/?\w+:[^>]*>/gi, "")
  // removes all empty <p> tags
     strx = strx.replace(/<p([^>])*>(&nbsp;)*\s*<\/p>/gi,"")
  // removes all empty span tags
     strx = strx.replace(/<span([^>])*>(&nbsp;)*\s*<\/span>/gi,"")
  return strx
}





/*
* LIB- For Quickbuild-Script with IExplorer
* Begindate: 2003/03/20
* GPL-Copyright by Canh Ngo (ngo_canh@yahoo.com)
* http://vietdev.sourceforge.net
*/
function addEventToObj()
{
  // addEventListener -> all Textarea
  var oArr= document.getElementsByTagName("textarea")
  var i=-1;
  while(oArr[++i])
   {
	 oArr[i].onmousedown=doMDown
	 oArr[i].onmouseup= doMUp
	 oArr[i].onkeydown=doKDown
   }

  // addEventListener -> all Input
  oArr= document.getElementsByTagName("input")
  i=-1
  while(oArr[++i])
   {
	 oArr[i].onmousedown=doMDown
	 oArr[i].onmouseup= doMUp
	 if(oArr[i].type!="text") continue
	 oArr[i].onkeydown=doKDown
   }
}


addEventToObj();







function editorContents(fid)
{
  var el= document.frames[fid]
  if(!el)return

  var strx, strx1;
  if(format[fid]=="HTML")
	{
	  if(curTD)
	   { 
   	     curTD.runtimeStyle.backgroundColor = "";
		 curTD.runtimeStyle.color = "";
		 curTD=null 
		 curTB.runtimeStyle.backgroundColor = "";
		 curTB.runtimeStyle.color = "";
		 curTB=null 
	   }
	  strx= el.document.body.innerHTML
	  strx1= el.document.body.innerText
	}
  else
	{
	  strx = el.document.body.innerText
	  strx1=el.document.body.innerHTML
    }
  if(strx1=='' && strx.indexOf('<IMG')<0 && strx.indexOf('<HR')<0 ) return ''


  strx = doCleanCode(strx,fid);

  return strx
}



function doFormatF(arr)
{
  var el= document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()

  var cmd = new Array();
  cmd = arr.split(',')

  var edit=el.document; 
  if(cmd[0]=='formatBlock')
   {
    edit.execCommand(cmd[0],false,"<"+cmd[1]+">");
    if(cmd[1]=='PRE' && format[fID]=="HTML") swapMode();
   }
  else if(cmd[0]=='InsertImage' && !cmd[1] )
   {
    alert(IMAGESRC); 
    edit.execCommand(cmd[0],true,null) 
   }
  else if(cmd[1]!=null) edit.execCommand(cmd[0],false,cmd[1]) 
  else edit.execCommand(cmd[0],false,null)


}



function insertImageSimple(el,cmd)
{
  var html= '<img src="' + cmd +'">'
  insertHTML(el,html)
}



function swapCharCode()
{
 var el= document.frames[fID]
 if(!el){alert(EDISELECT);return}
 el.focus()

 var eStyle= el.document.body.style;
 var strx;
 if(format[fID]=="HTML")
 {
  swapMode();
  strx= el.document.body.innerText
  format[fID]="Text"
 }
 else if(viewm[fID]==0)
 {
  strx= el.document.body.innerHTML
  strx= strx.replace(/\&amp;#/g,"&#")
  el.document.body.innerHTML= strx
  viewm[fID]=1 - viewm[fID]
  return
 }
 else
 {
  strx= el.document.body.innerText
 }

 if(viewm[fID]) strx=toUnicode(strx)
 else strx=viewISOCode(strx)
 
 el.document.body.innerText=strx

 viewm[fID]=1 - viewm[fID]
}



function swapMode()
{
 var el= document.frames[fID]
 if(!el){alert(EDISELECT);return}
 el.focus()

 var MARK= "ViEtDeVtRiCk"
 var selType=el.document.selection.type

 if(selType!="Control")
 {
   var caret=el.document.selection.createRange();
   el.curword=caret.duplicate();
   var selwrd= el.curword.text
   el.curword.text = selwrd + MARK;
 }

 var eStyle= el.document.body.style
	 
 if(format[fID]=="HTML")
 {
  FACE[fID]= eStyle.fontFamily
  SIZE[fID]= eStyle.fontSize
  COLOR[fID]= eStyle.color
  BCOLOR[fID]= eStyle.backgroundColor
  BIMAGE[fID]= eStyle.backgroundImage
  BIMAGE[fID]= BIMAGE[fID].substring( BIMAGE[fID].indexOf('(')+1,BIMAGE[fID].indexOf(')') )

  eStyle.fontFamily="";
  eStyle.fontSize="12pt"
  eStyle.fontStyle="normal"
  eStyle.color="black"
  eStyle.backgroundColor="#e0e0f0"
  eStyle.backgroundImage=''
  var innerHTML= el.document.body.innerHTML
  var reg= eval("/"+MARK+"/ig");
  var res= innerHTML.match(reg);
  if(res)
   for(var i=0; i<res.length-1; i++)
	 innerHTML= innerHTML.replace(res[i],"") 

  el.document.body.innerText= innerHTML;
  format[fID]="Text"
 }
 else
 {
  eStyle.fontFamily= FACE[fID]
  eStyle.fontSize= SIZE[fID]
  eStyle.color= COLOR[fID]
  eStyle.backgroundColor= BCOLOR[fID]
  eStyle.backgroundImage= "url(" + BIMAGE[fID] + ")"

  var temp=el.document.body.innerText
  el.document.body.innerHTML= temp;

  format[fID]="HTML"
  viewm[fID]=1

  // addeventlistener for table-cell
  var tdA= el.document.getElementsByTagName('td')
  for(var i=0; i<tdA.length;i++)
   { tdA[i].attachEvent("onclick", clickTD) }

 }


 if(selType!="Control")
 {
  caret = el.document.selection.createRange();
  var found= caret.findText(MARK,100000,5) // backward
  if(found==false) 
   found= caret.findText(MARK,100000,4) // foreward

  if(found==false && format[fID]=="HTML") 
   {
     var strx= el.document.body.innerHTML
	 strx= strx.replace(/ViEtDeVtRiCk/ig,"");
	 el.document.body.innerHTML= strx
	 return;
   }

  caret.select();
  el.curword=caret.duplicate();
  el.curword.text = '' ;  // erase trick selection 

  if(selwrd!="") caret.findText(selwrd,100000,5); // real selection
  caret.select();  caret.scrollIntoView(); 
 }

}




function objInnerHTML(el) 
{
  var content= el.document.body.innerHTML;
  content= content.replace(/\r\n/g,"&#13;");
  content= content.replace(/&amp;/g,"&");
  content= content.replace(/&lt;/g,"<");
  content= content.replace(/&gt;/g,">");
  return content;
}



function selectAll()
{ 
  var el= document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()
  
  var s=el.document.body.createTextRange()
  s.execCommand('SelectAll',false,null)
}





function highLight(key)
{
  function doDefFormat()
   {
     var el= document.frames[fID]
     el.focus();
	 var rng = el.document.selection.createRange();
     rng.moveEnd("character", 1);
	 rng.select();
	 el.curword=rng.duplicate();
	 if(el.curword.text=='') doFormatF('RemoveFormat'); 
	 else
	  {
	    rng.moveEnd("character", -1);
   	    rng.select();
		doFormatF('ForeColor,'); doFormatF('BackColor,'); 
	  }
    }

  switch(key)
	{  
	  case 48: doDefFormat(); break; // ctrl+0  no highlight
	  case 49: doFormatF('ForeColor,red'); break; // ctrl+1
	  case 50: doFormatF('ForeColor,green'); break; // ctrl+2
	  case 51: doFormatF('ForeColor,blue'); break; // ctrl+3
      case 52: doFormatF('ForeColor,#00AAFF'); break; // ctrl+4
      case 53: doFormatF('ForeColor,magenta'); break; // ctrl+5
	  case 54: doFormatF('BackColor,yellow'); doFormatF('ForeColor,black'); break; // ctrl+6
	  case 55: doFormatF('BackColor,cyan'); doFormatF('ForeColor,black'); break; // ctrl+7
	  case 56: doFormatF('BackColor,#00FF00'); doFormatF('ForeColor,black'); break; // ctrl+8
	  case 57: doFormatF('BackColor,#FF00AA'); doFormatF('ForeColor,white'); break; // ctrl+9
    }
}



function FKPress()
{
  var obj= document.frames[fID]
  if(!obj|| !obj.event){alert(EDISELECT);return}


  var ctrl= obj.event.ctrlKey
  var key= obj.event.keyCode
  keyPressInit(key,obj)

  if(typeof(CHANGE)!="undefined" && CHANGE ){ CHANGE=0; return false; }// abort
  else return true ;  // no abort
}




function FKDown()
{
  var el= document.frames[fID]
  var event= el.event

  if(!el ||!event){alert(EDISELECT);return}
  if(event.altKey) return;

  var key= event.keyCode
  var shft= event.shiftKey
  var ctrl= event.ctrlKey


  if(RETURNNL && !shft && key==13){ insertNewline(el); return false }
  else if(RETURNNL && key==13){ insertNewParagraph(el); return false }

  if(ctrl && key==71){ findText(); return false }  // ctrl+G search
  else if(ctrl && key==75){ findTextHotKey(0); return false } // ctrl+K  search forward
  else if(ctrl && key==74){ findTextHotKey(1); return false } // ctrl+J  search backward 
  else if(ctrl && key==83 && SYMBOLE!=''){ SmartcardData(); return false } // ctrl+S content rewrite
  else if(ctrl && key==84){ swapMode(); return false } // ctrl+T swapMode
  else if(ctrl && (key>=48 && key<=57)){ highLight(key); return false } // ctrl+1 Highlight
 
  keyDownInit(key)

  if(typeof(ON_OFF)!="undefined" && (ON_OFF==0 || ENGLISH || TYPMOD!=4) ) return;

  if(ctrl && key==190){viewVietX(el,key,1); return false} // .
  if(ctrl && key==220){viewVietX(el,key,1); return false} // ^
  if(ctrl && shft && key==221){viewVietX(el,key,3); return false}
  if(ctrl && key==221){viewVietX(el,key,1); return false}
  if(ctrl && shft && key==219){viewVietX(el,key,3); return false} // \?
  if(ctrl && key==219){viewVietX(el,key,1); return false} // \ß special 
  if(ctrl && shft && key==187){viewVietX(el,key,3); return false} // *
  if(ctrl && key==187){viewVietX(el,key,1); return false} // +
  if(ctrl && shft && key==191){viewVietX(el,key,3); return false} // \'
  if(ctrl && key==191){viewVietX(el,key,1); return false} // \#
  if(ctrl && key==189){viewVietX(el,key,1); return false} // - 
  
  if(!shft && key==220){key=6; viewVietX(el,key,0); return false;} // ^
  if(shft && key==221){ key=2; viewVietX(el,key,0); return false;} // ` 
  else if(key==221){ key=1; viewVietX(el,key,0); return false;}  // '

}






function insertHTML(el,html)
{
  var sel = el.document.selection;
  if(sel.type=="Control") return 

  var Range = sel.createRange();
  if(!Range.duplicate) return;
  var wrd='' ;
  el.curword=Range.duplicate();
  wrd= el.curword.text;

  var Range = sel.createRange();
  if(!Range.duplicate) return;
  Range.pasteHTML(html);
}



function insertDivLayer()
{
  var el= document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()
  
  var sel = el.document.selection;
  if(sel==null) return

  var Range = sel.createRange();
  var wrd='' ;

  if(sel.type!="Control")
  {
  	if(!Range.duplicate) return;
  	el.curword=Range.duplicate();
  	wrd= el.curword.text;
	if(wrd=='') wrd="I'm a DIV-Layer. Select me and click the button once more to change properties. Or doubleclick me to change the text."
	var arr= "<DIV style='position:relative; width:150px; height:100px; font-family:Arial; font-size:12px; background-color:#f0fdd0; border:1 solid'>"+ wrd + "</DIV>" ;
	Range.pasteHTML(arr);
	return
  }  

  if(Range(0).tagName!='DIV') return

  var urlx= QBPATH + '/divstyle.html'

  var twidth= 0.8*screen.width, theight=190;
  var tposx= (screen.width- twidth)/2
  var tposy= screen.height- theight - 55
  	    	  
  var newWin1=window.open(urlx,"divstyle","toolbar=no,width="+ twidth+",height="+ theight+ ",directories=no,status=no,scrollbars=yes,resizable=no, menubar=no")
  newWin1.moveTo(tposx,tposy);
  newWin1.focus()

}




function formatDialog()
{
  TXTOBJ.focus();
  var caret=TXTOBJ.document.selection.createRange()
  TXTOBJ.curword=caret.duplicate();
  
  var y = screen.height -parseInt('27em')*14 - 30 
  var feature = "font-family:Arial;font-size:10pt;dialogWidth:30em;dialogHeight:27em;dialogTop:"+y
      feature+= ";edge:sunken;help:no;status:no"

  var dialog= QBPATH+'/dialog.html'
  var arr= showModalDialog(dialog, "", feature); //////////////////////////////////////////
  if(arr==null) return ;

  if(arr=='VISUAL') changetoIframeEditor(TXTOBJ);
  else doFormat(arr,caret)
}




function createLink()
{
  var el= document.frames[fID]
  if(!el){alert(EDISELECT);return}
  el.focus()

  var urlx= QBPATH + '/createlink.html'

  var arr=showModalDialog(urlx, el, 
	  "font-family:Verdana;font-size:12;dialogWidth:30em;dialogHeight:14em; edge:sunken;help:no;status:no");

}




function doFormatDialog(file,cmd,arg)
{ 
  var urlx= QBPATH + '/' + file

  var el=document.frames[fID];
  if(!el){alert(EDISELECT);return}

  var arr=showModalDialog(urlx, arg, "font-family:Verdana;font-size:12;dialogWidth:30em;dialogHeight:30em; edge:sunken;help:no;status:no");
  if(arr !=null) doFormatF(cmd+','+arr)
}



function characters()
{
  var el=document.frames[fID];
  if(!el){alert(EDISELECT);return}
  el.focus();

  var sel = el.document.selection;
  if(sel.type=="Control") return 

  var urlx= QBPATH + '/selchar.html'

  var arr=showModalDialog(urlx, '', "font-family:Verdana;font-size:12;dialogWidth:30em;dialogHeight:34em; edge:sunken;help:no;status:no");
  if(arr==null) return

  var arrA = arr.split(';QuIcKbUiLd;')

  var strx= "<FONT FACE='" + arrA[0] + "'>" + arrA[1] + "</FONT>"

  var Range = sel.createRange();
  if(!Range.duplicate) return;
  Range.pasteHTML(strx);

}

///////////////////////////////////////////////////////////////////////


/*** Freeware Open Source writen by ngoCanh 2002-05                  */
/*** Original by Vietdev  http://vietdev.sourceforge.net             */
/*** Release 2002-12-12  R11.5                                       */
/*** Release 2003-05-04  R13.5                                       */
/*** GPL - Copyright protected                                       */
/*********************************************************************/
function addEventToObjViet()
{
  // Textarea
  var oArr= document.getElementsByTagName("textarea")
  for( var i=0; i<oArr.length ;i++)
    oArr[i].onkeypress=doKPress

  // Input
  oArr= document.getElementsByTagName("input")
  for( var i=0; i<oArr.length;i++)
   {
     if(oArr[i].type!="text") continue
	 oArr[i].onkeypress=doKPress
   }
}


addEventToObjViet();



function correcturAccent(obj,key)
{
  var arr= getSelectWord(obj)
  var i= arr[0]; 
  var wrd= arr[1];

  if( !(wrd= findCorrecturWord(wrd+key)) ) return;
  if(CHANGE) replaceWord(obj,wrd,i)
}



function getSelectWord(obj)
{
  replaceWord(obj,'',0)

  var caret=obj.document.selection.createRange();
  var caret2=caret.duplicate();
  var wrd="", i=0, chrx, len ;
  while(1)
  {
   caret2.moveStart("character", -1);  
   obj.curword=caret2.duplicate();
   len=obj.curword.text.length
   if(len==wrd.length) break;
   wrd=obj.curword.text
   chrx=wrd.substring(0,1);
   if(notWord(chrx))
    {
      if(chrx.charCodeAt(0)==13) wrd=wrd.substr(2);
      else wrd=wrd.substr(1);
      break;
    }
   i++;
  }

  var arr= new Array()
  arr[0]= i; arr[1]= wrd;
  return arr
}







function replaceWord(obj,wrd,i)
{
  var caret=obj.document.selection.createRange();
  caret.moveStart("character", -i);  
  obj.curword=caret.duplicate();
  obj.curword.text=wrd;
}



function viewViet(obj,key)
{
  if(obj.document.selection.type=='Control') return;
  var arr= getSelectWord(obj);
  var i= arr[0];
  var wrd= arr[1];

  var wrd1=toViet(wrd,key);
  if(wrd=='') return 

  if(CHANGE) replaceWord(obj,wrd1,i)
  else replaceWord(obj,wrd,i)
  THOAT=0;

}



function viewVietX(obj,key,xkey)
{
  if(obj.document.selection.type=='Control') return;

  var arr= getSelectWord(obj);
  var i= arr[0];
  var wrd= arr[1];
  var kchr;

  switch(key)
	{
	  case '^': if(wrd!='') wrd= toVietX(wrd,6); kchr= ''; break;
	  case '`': if(wrd!='') wrd= toVietX(wrd,2); kchr= ''; break;
	  case '\'': if(wrd!='') wrd= toVietX(wrd,1); kchr= ''; break;

	  case 190: if(xkey==1) kchr= '.'; break;
	  case 220: if(xkey==1) kchr= '^'; break;
	  case 221: if(xkey==1) kchr= '\''; else kchr= '\`'; break;
	  case 219: if(xkey==1) kchr= '?'; else kchr='?'; break; // special
	  case 191: if(xkey==1) kchr= '\#'; else kchr='\''; break;
	  case 187: if(xkey==1) kchr= '+'; else kchr= '*'; break;
	  case 189: if(xkey==1) kchr= '-'; break;

	  case 6: if(wrd=='') wrd='^'; else wrd= toVietX(wrd,key); CHANGE=0; kchr= ''; break;
	  case 2: if(wrd=='') wrd='`'; else wrd= toVietX(wrd,key); CHANGE=0; kchr= ''; break;
	  case 1: if(wrd=='') wrd='\''; else wrd= toVietX(wrd,key); CHANGE=0; kchr= ''; break;
    }

  wrd += kchr;

  if(THOAT) i=1;
  replaceWord(obj,wrd,i)
  THOAT=0;
}


if(USETABLE) document.writeln('<script src="'+QBPATH+'/tabedit.js"></script>');
if(RETURNNL) document.writeln('<script src="'+QBPATH+'/returnnl.js"></script>');
if(UNICODE) document.writeln('<script src="'+QBPATH+'/unicode.js"></script>');

document.writeln('<script src="'+QBPATH+'/recover.js"></script>');




// VISUAL=0 : Textarea to Editor after confirmation
// VISUAL=1 : all Textarea to Editor
// VISUAL=2 : change only specific textarea
// VISUAL=3 : all Iframe to Editor
// VISUAL=4 : some specific iframes 
// VISUAL=other : no Visual-Editor, only use Rightmouse-Control
switch(VISUAL)
{
  case 1: changeAllTextareaToEditors(); break;
  case 2: changetoIframeEditor(document.forms[xxx].yyy); break;// replace xxx=formIndex and yyy=textareaName
  case 3: changeAllIframeToEditors(); break;
  case 4: changeIframeToEditor('contents2'); break;//replace contents.. = fid
}






function doMDown(e)
{
 var el= event.srcElement
 var button= event.button

 if(el.type=='text' || el.type=='textarea')
   {
	TXTOBJ=el; fID=''
    if(button>1 && POPWIN==1) formatDialog();
   }
}

/*************************************************************/
/********************* not the same *************************/
function doMUp(e)
{
 var el= event.srcElement

 if(!el.type) return
 if(el.type!='text'&&el.type!='textarea'&&el.type!='password'&&el.type!='file')
  {
	if(!el.name || el.name.substring(0,7)!='QBCNTRL')
	 { 
	   actualize(); 
	   if(el.type != 'select-one' && el.type != 'select-multiple') el.focus(); 
	 }
    return
  }

 var visual=''
 if(typeof(ASKED)=="undefined" && el.type=='textarea' && VISUAL==0)
  { visual=confirm(VISMODE); if(!visual) ASKED=1; }
 	 
 if(visual) changetoIframeEditor(el);

 ENGLISH=0;  
 if(MENUPOS!=0) qbmenuActivate()
 else statusMessage()

}



THOAT=0;
function doKDown(e)
{
  var el= event.srcElement
  var ctrl,shft,key,alt;

  if(el.type!='text' && el.type!='textarea') return
  alt= event.altKey; ctrl= event.ctrlKey; shft= event.shiftKey; key= event.keyCode 
  if(alt) return;

  TXTOBJ=el; fID='';


       if(ctrl && key==71) { findText(); return false }  // ctrl+G search
  else if(ctrl && key==75){ findTextHotKey(0); return false } // ctrl+K  search forward
  else if(ctrl && key==74){ findTextHotKey(1); return false } // ctrl+J  search backward 
  else if(ctrl && key==83 && SYMBOLE!=''){ SmartcardData(); return false } // ctrl+S content rewrite

  keyDownInit(key)
    
  if(ON_OFF==0 || ENGLISH || TYPMOD!=4) return;

       if(ctrl && key==190){viewVietX(el,key,1); return false} // .
  else if(ctrl && key==220){viewVietX(el,key,1); return false} // ^
  else if(ctrl && shft && key==221){viewVietX(el,key,3); return false}
  else if(ctrl && key==221){viewVietX(el,key,1); return false}
  else if(ctrl && shft && key==219){viewVietX(el,key,3); return false} // \?
  else if(ctrl && key==219){viewVietX(el,key,1); return false} // \ß special 
  else if(ctrl && shft && key==187){viewVietX(el,key,3); return false} // *
  else if(ctrl && key==187){viewVietX(el,key,1); return false} // +
  else if(ctrl && shft && key==191){viewVietX(el,key,3); return false} // \'
  else if(ctrl && key==191){viewVietX(el,key,1); return false} // \#
  else if(ctrl && key==189){viewVietX(el,key,1); return false} // - 
  else if(!shft && key==220){key=6; viewVietX(el,key,0); return false;} // ^
  else if(shft && key==221){ key=2; viewVietX(el,key,0); return false;} // ` 
  else if(key==221){ key=1; viewVietX(el,key,0); return false;}  // '

}





function findText()
{
  if(!fID && !TXTOBJ){alert(EDISELECT);return}
  if(fID) document.frames[fID].focus()
  else TXTOBJ.focus()

  var urlx= QBPATH + '/dfindtextv.html'

  var newWin=window.open(urlx,"find","toolbar=no, width=350px,height=220px,directories=no,status=no,scrollbars=yes,resizable=yes,menubar=no;scroll=no")
  newWin.moveTo(screen.width-500,50);
  newWin.focus()
}



/******************************************************************************/
/************************** Not In English Version ****************************/
// text mode
function doKPress(e)
{
  var el= event.srcElement
  if(el.type!='text' && el.type!='textarea') return

  keyPressInit(event.keyCode,el)

  if(!CHANGE) return true ;  // no abort

  CHANGE=0
  return false; // abort 
}




function keyPressInit(key,obj)
{
  if(ON_OFF==0 || ENGLISH) return;

  var chr= String.fromCharCode(key) ;
  var chr1= chr.toUpperCase() ;
  
  if(chr=='\\' && (TYPMOD==4||TYPMOD==3||TYPMOD==0)){ THOAT=1; return }

  if(TYPMOD==4 && key==223){ chr='?'; chr1='?' } // outlaw chu+~ etzess 

       if("^`".indexOf(chr)>=0) viewVietX(obj,chr,0)
  else if(/[SFRXJDAEOWZ1234567890\/\'\?\~\.\-\#\(\+\*]/.test(chr1)) viewViet(obj,chr)
  else if(/[CINT]/.test(chr1)) correcturAccent(obj,chr)
  THOAT=0;
}





function findCorrecturWord(wrd)
{
  var wrdA= wrd.split(''), keyx;
  var lenx= wrd.length
  var key= wrdA[lenx-1].charCodeAt(0); // last char	

  if(lenx<3) return; 

  var code1, chr2, pos, idx;
  
  code1= wrdA[lenx-3].charCodeAt(0); chr2= wrdA[lenx-2]; pos=3
  idx= indexOfViet(code1);
  keyx= idx%6;
  if(idx>126 || keyx<1) return;


  // aA a+ a^ A+ A^ 
  if( !/[aA\u00E2\u00C2\u0103\u0102eEiIyY]/.test(chr2) ) return;

  wrdA[lenx-pos]= String.fromCharCode(VIETVOCAL[idx-keyx]);


  wrd= wrdA.join('')

  var typ= TYPMOD
  TYPMOD= 1
  wrd=toViet(wrd,keyx);
  TYPMOD= typ
  return wrd
}





function FMUp()
{ 
  ENGLISH=0; 
  if(MENUPOS!=0) qbmenuActivate()
  else statusMessage()
}



var ENGLISH=0, CODE, CHANGE=0;
var hmenu;


function notWord(cc)
{
 return ("\ \r\n#,\\;.:-_()<>+-*/=?!\"§$%{}[]\'~|^°€ß²³\@\&´`0123456789".indexOf(cc)>=0);
}


function UNI(str1,key)
{
 var lenX=str1.length
 var sX1, sX2, c1X, c2X, c3X, c4X, code, code1, first=1, idx, keyx;
 var ACCENT= 'sfrxjSFRXJ12345/\'-?#~\.'.indexOf(key)>=0

 if(ACCENT) // erase accent
 {
  var keynr, keyidx;
  keynr= '' + key;
  keynr= keynr.toLowerCase()
  if(TYPMOD==1 || TYPMOD==0)
  {
   keyidx= "_12345".indexOf(keynr)
   if(keyidx>0) keyx=keyidx
  }
  if(TYPMOD==2 || TYPMOD==0)
  {
   keyidx= "_sfrxj".indexOf(keynr)
   if(keyidx>0) keyx=keyidx
  }
  if(TYPMOD==3 || TYPMOD==4 || TYPMOD==0)
  {
   keyidx= "_'-?~.".indexOf(keynr)
   if(keyidx>0) keyx=keyidx
   else if(key=='#') keyx=4
  }
  var strA= str1.split('');

  var accent;
  for(var i=0; i<strA.length; i++)
 	{
	  idx = indexOfViet(strA[i].charCodeAt(0));
	  accent= idx%6;
	  if(idx<0 || idx>215 || accent==keyx) continue
	  if(accent>0) strA[i]= String.fromCharCode(VIETVOCAL[idx-accent])
    }
  str1= strA.join('');
 }


 ACCENT = ACCENT || 'aAeE'.indexOf(key)>=0
 CODE=''
 for(var i=lenX;i>=0;i--)
  {
    sX1=str1.substring(0,i-1)
    sX2=str1.substring(i,lenX)
    c1X=str1.substring(i-1,i); code2=c1X.charCodeAt(0) ;
	c2X=str1.substring(i-2,i-1); code=c2X.charCodeAt(0) ;
	c3X=str1.substring(i-3,i-2); code1=c3X.charCodeAt(0) ;
	c4X=(c3X+c2X).toLowerCase() ;

	var vidx1= indexOfViet(code2);
	var vidx2= indexOfViet(code);
	var vidx3= indexOfViet(code1);

	/**************** typing assistance *****************/
	if( !key&&(code1==432||code1==431)&&(code==417||code==416) ) // Z+0 and u'o' -> undo
	  {
		c3X= (code1==432) ? 'u':'U'; c2X= (code==417) ? 'o':'O' ; 
		CODE=1;
		return sX1.substring(0,sX1.length-2)+c3X+c2X+c1X+sX2
	  }


	if(key&&'6#aAeE'.indexOf(key)>=0) 
	  {
		// u'a u`a u?a u~a u.a or // u'e u`e u?e u~e u.e
		if( c2X && !/u|U/.test(c2X) && vidx2>=108 && vidx2<120 
			&& ( (/a|A/.test(c1X) && !(/e|E/.test(key))) || (/e|E/.test(c1X) && !(/a|A/.test(key))) ) 
		  )  
		 {
		   idx= indexOfViet(c2X.charCodeAt(0));
           keyx= idx%6;
		   c2X= String.fromCharCode(VIETVOCAL[idx-keyx])
		   idx= indexOfViet(c1X.charCodeAt(0));
		   c1X= String.fromCharCode(VIETVOCAL[idx+12+keyx])
		   CHANGE=1; CODE=1
		   return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
     	 }

        // u'ye u`ye u?ye u~ye u.ye
		if( c3X && !/u|U/.test(c3X) && vidx3>=108 && vidx3<120 && 'yY'.indexOf(c2X)>=0 && 'eE'.indexOf(c1X)>=0 )  
		 {
		   idx= indexOfViet(c3X.charCodeAt(0));
           keyx= idx%6;
		   c3X= String.fromCharCode(VIETVOCAL[idx-keyx])
		   
		   idx= indexOfViet(c1X.charCodeAt(0));

		   c1X= String.fromCharCode(VIETVOCAL[idx+12+keyx])
	
		   CHANGE=1; CODE=1 
		   return sX1.substring(0,sX1.length-2)+c3X+c2X+c1X+sX2
     	 }

         // i'e i`e i?e i~e i.e // y'e y`e y?e y~e y.e
		if( c2X && !/[iIyY]/.test(c2X)
			&& ( (vidx2>=144 && vidx2<156 )||(vidx2>=180 && vidx2<192) ) 
			&& /e|E/.test(c1X) && ! /a|A/.test(key)
		  ) 
		 {
		   idx= indexOfViet(c2X.charCodeAt(0));
           keyx= idx%6;
		   c2X= String.fromCharCode(VIETVOCAL[idx-keyx])
		   idx= indexOfViet(c1X.charCodeAt(0));
		   c1X= String.fromCharCode(VIETVOCAL[idx+12+keyx])
		   CHANGE=1; CODE=1 
		   return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
     	 }

	 }


   if(key&&'wW78+*('.indexOf(key)>=0
	   && ( (/w|W/.test(key)&&TYPMOD==2)||(/7|8/.test(key)&&TYPMOD==1)||(/\+|\*|\(/.test(key)&&TYPMOD>=3)||TYPMOD==0 )
	  )
	  {
		if(str1.toLowerCase()=='thuo' || str1.toLowerCase()=='quo'){}
		else if(c4X=='uo') // uon
         {
          c3X= (c3X=='u') ? 432:431 ; c2X= (c2X=='o') ? 417:416; CODE=1;
		  CHANGE=1 ; CODE=1 
		  return sX1.substring(0,sX1.length-2)+String.fromCharCode(c3X)+String.fromCharCode(c2X)+c1X+sX2
	     } 
        else if( c2X && 'uU'.indexOf(c2X)>=0 && vidx1>=36 && vidx1<48) // uo' uo` uo? ...
		 {
		  if(c2X=='u') c2X= '\u01B0'; // u+
		  else c2X= '\u01AF'; // U+

	      idx= indexOfViet(c1X.charCodeAt(0));
		  c1X= String.fromCharCode(VIETVOCAL[idx+24])

		  CHANGE=1 ; CODE=1 
		  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
		 }

		if( c2X && vidx2>=0 && vidx2<12 && 'uU'.indexOf(c1X)>=0) // au
		 {
		   idx= indexOfViet(c2X.charCodeAt(0));
		   c2X= String.fromCharCode(VIETVOCAL[idx+12])
 		   CHANGE=1; CODE=1 
		   return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
		 }

   	    if('aAeE'.indexOf(c1X)>=0 && (i<lenX||c4X=='qu') ) {} // qua, que
		else if( c2X && 'oO'.indexOf(c2X)>=0 && 'uU'.indexOf(c1X)>=0) continue // ou by no' u'
		else if( c2X && vidx2>=108 && vidx2<120 && 'uUaA'.indexOf(c1X)>=0) continue //u u' u`u? u~ u. uu, ua
	  }


         if( c4X=='gi' && c1X && 'aAuU'.indexOf(c1X)>=0 ) {}
	else if( c2X && c1X && 'oO'.indexOf(c2X)>=0 && 'oO'.indexOf(c1X)>=0 ) {}
	else if( c2X && c1X && 'iI'.indexOf(c2X)>=0 && 'aAuU'.indexOf(c1X)>=0 )continue // ia,iu
	else if( NEWACCENT==1 && ACCENT && c2X &&
	        ( ('eEyY'.indexOf(c1X)>=0 && 'oOuU'.indexOf(c2X)>=0)
		      ||('aA'.indexOf(c1X)>=0 && 'oO'.indexOf(c2X)>=0) )
		   ){} // oa,oe,uy NEW****
    else if( ('aAeEiIyY'.indexOf(c1X)>=0 && (i<lenX||c4X=='qu') ) || (c2X && 'iI'.indexOf(c2X)>=0) ){} //--qua,que,qui,quy,ia,i..
	else if( ACCENT && 'oO'.indexOf(c1X)>=0 && c2X && 'uU'.indexOf(c2X)>=0 ){} // uo and ACCENT
    else if( ACCENT && 'eE'.indexOf(c1X)>=0 && c2X && 'yY'.indexOf(c2X)>=0 ){} // ye and ACCENT
	else if( ACCENT && first && 'aAeEiIoOuUyY'.indexOf(c1X)>=0 
		     && !( ('aA'.indexOf(c1X)>=0||'eE'.indexOf(c1X)>=0) && i<lenX) 
		   ){ first=0; continue }
	/**************** end typing assistance *****************/

    CODE= changeVietCode(c1X.charCodeAt(0),key)
	if(CODE) break;
	if((!CODE || CODE<0) && !first){ ACCENT=0; first=1; i=lenX+1; continue}
  }

 if(!CODE) return str1+key
 if(isNaN(CODE)){str1=sX1+CODE+sX2+key;ENGLISH=1}
 else str1=sX1+String.fromCharCode(CODE)+sX2;
 return str1;
}





/**************** U N I C O D E *************************/
function toViet(str1,key)
{
   if(ENGLISH || !str1) return str1;
   if(SPELL==1 && notviet(str1)) return str1 ;

   var c2= '' + key; // change to string
   var sx=''

   // except
   if(TYPMOD!=1 && TYPMOD!=0 && (key==1||key==2||key==6)) return str1

   sx= UNI(str1,c2); /////////////////////

   //*** VIQR-US and VIQR-GER
   if(TYPMOD==3 || TYPMOD==4 || TYPMOD==0)
	 if(!CODE && (c2!='d'||c2!='D')) sx= str1 + c2 

   if(/[zZ0]/.test(c2)) sx=UNIZZ(str1,c2)

   if(CODE) CHANGE=1
   if(sx!='') str1=sx


   return str1;
}



function toVietX(str1,key)
{
   if(ENGLISH || !str1) return str1;
   if(SPELL==1 && notviet(str1)) return str1 ;

   var c2= '' + key; // change to string
   var c3=c2;
   var sx='';

   sx=UNI(str1,c3);

   if(c3=='6') 
   {
	if(sx=='') sx= str1 + "^"
	if(sx.lastIndexOf('6')>=0) sx= sx.substring(0,sx.length-1) + '^'
   }
   else if(c3=='1')
   {
	if(sx=='') sx= str1 + "'"
   	if(sx.lastIndexOf('1')>=0) sx= sx.substring(0,sx.length-1) + "'"
   }
   else if(c3=='2')
   {
	if(sx=='') sx= str1 + "`" 
   	if(sx.lastIndexOf('2')>=0) sx= sx.substring(0,sx.length-1) + "`"
   }

   if(sx!=''){ CHANGE=1;  str1=sx }
   return str1;
}




function eraseAccent(str1)
{
  var code, idx, newidx;
  var group, line, accent;

  var strA= str1.split('');


  for(var time=0;time<3;time++)
  {
   var found=0;
   for(var i=0; i<strA.length; i++)
	{
	  code= strA[i].charCodeAt(0) ;
	  idx = indexOfViet(code);
  	  group= idx%36, line= group%12, accent= line%6;
	  newidx=-1;
	  if(idx && idx<192 && VIETVOCAL[idx]>0)
	   {
		 if(time==0 && accent) // accent
   		   newidx= parseInt(idx/36)*36 + parseInt(group/12)*12 + parseInt(line/6)*6;
	     else if(time==1) // without '-?~.
           newidx= parseInt(idx/36)*36; 
		 if(newidx!=-1 && newidx!=idx)
		   { strA[i] = String.fromCharCode(VIETVOCAL[newidx]); found=1; if(accent) break;}
	   }
     else if(time==2)
	  {
	    if(code==273){ strA[i]='d'; found=1; break}
		else if(code==272){ strA[i]='D'; found=1; break}
	  }
    }
   if(found) return strA.join('');
  }

 return str1

}



function UNIZZ(str1,key)
{
  if( (TYPMOD==1 && key!=0) || (TYPMOD==2 && key!='z' && key!='Z') ) return ''

  var str2= eraseAccent(str1);
  if(str2!=str1){ CHANGE=1; return str2 }

  ENGLISH=0;
  return str1+key;
}





function changeTypeModeKey(idx,key)
{
  if((TYPMOD==1||TYPMOD==0) && /[0123456789]/.test(key)) return key

  var key= key.toUpperCase();
  if(TYPMOD==2 || TYPMOD==0)
	{
	  if(key=='D') return 9
      if(key=='S') return 1
      if(key=='F') return 2
      if(key=='R') return 3
      if(key=='X') return 4
      if(key=='J') return 5
      if(key=='W') return 7
      if( (key=='A' && idx<36 ) ||
		  (key=='O' && idx>=36&&idx<72 ) ||
		  (key=='E' && idx>=72&&idx<108 )
		) return 6
      if(key=='Z') return 0
	}

 if(TYPMOD==3 || TYPMOD==4 || TYPMOD==0)
	{
   	  if(key=='D') return 9
	  if(key=='/' || key=='\'' || key==1) return 1
	  if(key=='-' || key==2) return 2
	  if(key=='?') return 3
	  if(key=='\~' || key=='\#') return 4
	  if(key=='.') return 5
	  if(key=='6') return 6
	  if(key=='+'||key=='*'||key=='(') return 7
   }

}


function changeVietCode(oldcode,key)
{
   var idx = indexOfViet(oldcode);

   key= changeTypeModeKey(idx,key)
   if(!key || idx<0 || (key!=9 && idx>191)) return 

   var result
   var group= idx%36;
   var line= group%12;
   var newidx;

        if(key==6) newidx= parseInt(idx/36)*36 + 12 + line;
   else if(key==7 || key==8) newidx= parseInt(idx/36)*36 + 24 + line;
   else if(key==1) newidx= parseInt(idx/6)*6 + 1;
   else if(key==2) newidx= parseInt(idx/6)*6 + 2;
   else if(key==3) newidx= parseInt(idx/6)*6 + 3;
   else if(key==4) newidx= parseInt(idx/6)*6 + 4;
   else if(key==5) newidx= parseInt(idx/6)*6 + 5;
   else if(key==9 && idx>191) newidx= idx+1;
   else return
   
   result= VIETVOCAL[newidx];


   if(result<0) return;
   if(result!=oldcode) return result
  

   // result==oldcode
        if(key==9 && idx>191) newidx= idx-1;
   else if(key>=6) newidx= parseInt(idx/36)*36 + line;
   else if(key>=1) newidx= parseInt(idx/6)*6 ;

   return String.fromCharCode(VIETVOCAL[newidx]);

}


var VIETVOCAL= new Array(
         97,225,224,7843,227,7841,      65,193,192,7842,195,7840,         //a
	     226,7845,7847,7849,7851,7853,  194,7844,7846,7848,7850,7852,    //a^
		 259,7855,7857,7859,7861,7863,  258,7854,7856,7858,7860,7862,    //a(
		 111,243,242,7887,245,7885,     79,211,210,7886,213,7884,         //o
	     244,7889,7891,7893,7895,7897,  212,7888,7890,7892,7894,7896,    //o^
	     417,7899,7901,7903,7905,7907,  416,7898,7900,7902,7904,7906,    //o' 
	     101,233,232,7867,7869,7865,    69,201,200,7866,7868,7864,        //e  
	     234,7871,7873,7875,7877,7879,  202,7870,7872,7874,7876,7878,    //e^
	     -1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,	     
		 117,250,249,7911,361,7909,     85,218,217,7910,360,7908,         //u
	     -1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,	     
	     432,7913,7915,7917,7919,7921,  431,7912,7914,7916,7918,7920,    //u'
		 105,237,236,7881,297,7883,     73,205,204,7880,296,7882,         //i
	     -1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,	     
	     -1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,	     
    	 121,253,7923,7927,7929,7925,   89,221,7922,7926,7928,7924,       //y 
	     -1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,	     
	     -1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,
		 100,273,273,68,272,272 // dd
	  );



function indexOfViet(code)
{
  for(var i=0; i<VIETVOCAL.length; i++)
	{ if(code==VIETVOCAL[i]) return i;  }
  return -1;
}




function notviet(wrd)
{
  wrd= wrd.toLowerCase();

  // special , ngoai. le^.
  var yes= "giac|giam|gian|giao|giap|giat|giay|giua|giuo|"
  yes += "ngoam|ngoao|ngoeo|ngup|quam"
  var reg= eval("/"+yes+"/") ;
  var res= reg.test(wrd) ;
  if(res) return ''


  var no= '' ;
  no +="f|j|w|z|"
  no +="aa|ab|ad|ae|ag|ah|ak|al|aq|ar|as|av|ax|"
  no +="bb|bc|bd|bg|bh|bk|bl|bm|bn|bp|bq|br|bs|bt|bv|bx|by|"
  no +="cb|cc|cd|ce|cg|ci|ck|cl|cm|cn|cp|cq|cr|cs|ct|cv|cx|cy|"
  no +="db|dc|dg|dh|dk|dl|dm|dn|dp|dq|dr|ds|dt|dv|dx|dy|"
  no +="ea|eb|ed|ee|eg|eh|ei|ek|el|eq|er|es|ev|ex|ey|"
  no +="gb|gc|gd|gg|gk|gl|gm|gn|gp|gq|gr|gs|gt|gv|gx|gy|"
  no +="hb|hc|hd|hg|hh|hk|hl|hm|hn|hp|hq|hr|hs|ht|hv|hx|"
  no +="ib|id|ig|ih|ii|ik|il|iq|ir|is|iv|ix|iy|"
  no +="kb|kc|kd|kg|kk|kl|km|kn|kp|kq|kr|ks|kt|kv|kx|khy|"
  no +="lb|lc|ld|lg|lh|lk|ll|lm|ln|lp|lq|lr|ls|lt|lv|lx|"
  no +="mb|mc|md|mg|mh|mk|ml|mm|mn|mp|mq|mr|ms|mt|mv|mx|"
  no +="nb|nc|nd|nk|nl|nm|nn|np|nq|nr|ns|nt|nv|nx|"
  no +="ob|od|og|oh|ok|ol|oo|oq|or|os|ov|ox|oy|"
  no +="pa|pb|pc|pd|pe|pg|pi|pk|pl|pm|pn|po|pp|pq|pr|ps|pt|pu|pv|px|py|phy|"
  no +="qa|qb|qc|qd|qe|qg|qh|qi|qk|ql|qm|qn|qo|qp|qq|qr|qs|qt|qv|qx|qy|"
  no +="rb|rc|rd|rg|rh|rk|rl|rm|rn|rp|rq|rr|rs|rt|rv|rx|ry|"
  no +="sb|sc|sd|sg|sh|sk|sl|sm|sn|sp|sq|sr|ss|st|sv|sx|"
  no +="tb|tc|td|tg|tk|tl|tm|tn|tp|tq|ts|tt|tv|tx|"
  no +="ub|ud|ug|uh|uk|ul|uq|ur|us|uv|ux|"
  no +="vb|vc|vd|vg|vh|vk|vl|vm|vn|vp|vq|vr|vs|vt|vv|vx|"
  no +="xb|xc|xd|xg|xh|xk|xl|xm|xn|xp|xq|xr|xs|xt|xv|xx|xy|"
  no +="yb|yd|yg|yh|yi|yk|yl|ym|yo|yp|yq|yr|ys|yv|yx|yy"


  reg= eval("/"+no+"/") ;
  res= reg.test(wrd) ;
  if(res) return res;

  no= '' ;
  no +="aca|aco|acu|"
  no +="aia|aic|aie|aim|ain|aio|aip|ait|aiu|"
  no +="ama|ame|ami|amo|amu|amy|"
  no +="ana|ane|ani|ano|anu|any|"
  no +="aoa|aoc|aoe|aoi|aom|aon|aop|aot|aou|"
  no +="apa|ape|aph|api|apo|apu|"
  no +="ata|ate|ath|ati|ato|atr|atu|aty|"
  no +="aua|auc|aue|aui|aum|aun|auo|aup|aut|auu|auy|"
  no +="aya|aye|ayn|ayt|ayu|"

  no +="bec|bem|bio|boa|boe|bom|bou|bue|buy|"

  no +="chy|coa|coe|cou|cue|cuy|"

  no +="dio|doe|dou|duu|"
        
  no +="eca|eco|ecu|ema|eme|emi|emo|emu|emy|ena|ene|eni|eno|enu|eny|"
  no +="eoa|eoc|eoe|eoi|eom|eon|eop|eot|eou|epa|epe|eph|epi|epo|epu|"
  no +="eta|ete|eth|eti|eto|etr|etu|ety|eua|euc|eue|eui|eum|eun|euo|eup|eut|euu|euy|"

  no +="gec|geo|get|geu|gha|gho|ghu|ghy|gic|gip|git|"
  no +="goe|gou|gua|gue|gum|gup|guu|"

  no +="hio|hou|hya|hye|hyn|hyt|hyu|"

  no +="iac|iam|ian|iao|iap|iat|iay|"
  no +="ica|ico|icu|ima|ime|imi|imo|imu|imy|ina|ine|ing|ini|ino|inu|iny|ioa|ioe|iou|"
  no +="ipa|ipe|iph|ipi|ipo|ipu|ita|ite|ith|iti|ito|itr|itu|ity|iua|iue|iuo|iuu|iuy|"

  no +="kac|kai|kam|kan|kao|kap|kat|kau|kay|"
  no +="kea|key|khy|kio|koa|koc|koe|koi|kom|kon|kop|kot|kou|"
  no +="kua|kuc|kue|kui|kum|kun|kuo|kup|kut|kuu|kuy|kya|kye|kyn|kyt|kyu|"

  no +="lio|lou|lue|lya|lye|lyn|lyt|lyu|"

  no +="mio|mip|miu|moa|moe|mou|mue|mup|muy|mya|mye|myn|myt|myu|"

  no +="ngi|nge|nhy|nim|nio|nip|noe|nue|nuy|nya|nye|nyn|nyt|nyu|"

  no +="oam|oap|oeo|oao|oau|oca|och|oco|ocu|oec|oem|oep|oeu|"
  no +="oia|oic|oie|oim|oin|oio|oip|oit|oiu|oma|ome|omi|omo|omu|omy|"
  no +="ona|one|onh|oni|ono|onu|ony|opa|ope|oph|opi|opo|opu|"
  no +="ota|ote|oth|oti|oto|otr|otu|oty|oua|ouc|oue|oui|oum|oun|ouo|oup|out|ouu|ouy|"

  no +="quc|qum|qun|qup|qut|quu|"

  no +="rec|rio|roa|roe|rou|rue|"

  no +="sec|sia|sic|sin|sio|sip|sit|siu|soe|sop|sou|sue|sum|sup|sya|sye|syn|syt|syu|"

  no +="thy|tio|tou|tya|tye|tyn|tyt|tyu|"

  no +="uam|uca|uch|uco|ucu|uec|uem|uep|ueu|"
  no +="uia|uic|uie|uim|uin|uio|uip|uma|ume|umi|umo|umu|umy|"
  no +="una|une|unh|uni|uno|unu|uny|uoa|uoe|upa|upe|uph|upi|upo|upu|"
  no +="uta|ute|uth|uti|uto|utr|utu|uty|uua|uuc|uue|uui|uum|uun|uuo|uup|uut|uuu|uuy|"

  no +="vec|vep|vic|vim|vio|vip|voa|voe|vou|vue|vum|vup|vuu|vuy|vya|vye|vyn|vyt|vyu|"
    
  no +="xim|xio|xip|xou|xuu"

  no +="yac|yai|yam|yan|yao|yap|yat|yau|yay|yec|yem|yeo|yep|yna|yne|yng|yni|yno|ynu|yny|"
  no +="yta|yte|yth|yti|yto|ytr|ytu|yty|yua|yuc|yue|yui|yum|yun|yuo|yup|yut|yuu|yuy"

  reg= eval("/"+no+"/") ;
  res= reg.test(wrd) ;

  return res
}




function  viewISOCode(str1)
{
 var c0, str2='', strx='', idx;
 
 idx=str1.indexOf('&#')
 if(idx<0) return str1
 var i=0
 while (i<str1.length)
  {
    c0=str1.substring(i,i+2)
    i++
    if(c0 !='&#') continue
    strx  +=str1.substring(0,i-1)
    str1=str1.substring(i-1,str1.length)
    idx=str1.indexOf(';')
    if(idx <0) break;
    str2=str1.substring(2,idx)
    str2++;str2--
    str1=str1.substring(idx+1,str1.length)
    strx +=String.fromCharCode(str2)
    i=0
  }
 return strx+str1;
}


function toUnicode(str1)
{
  var code, str2 , j=0;
  var len
  while(j<2)
   {
	len=str1.length
	str2=''
	for(var i=0;i<len;i++) 
	 {
      code=str1.charCodeAt(i);
      if(code<128) continue;
      str2 +=str1.substring(0,i) + '&#' + code + ';'
      str1=str1.substring(i+1,str1.length)
      len=str1.length
      i=0
     }
    str1=str2+str1
    j++;
   }
  return str1;
}


/************* QUICKBUILD-MENU  **********************/
function actInit()
{
  if(!hmenu ) hmenu = new MoveLayTo('qbmenu')

  var WHeight=document.body.offsetHeight
  var WWidth =document.body.offsetWidth
 

  // Position of qbmenu *********************
  var wx,wy;
  var mhi= parseInt(document.getElementById('qbmenu').style.height)
  var mwi= parseInt(document.getElementById('qbmenu').style.width)

  MENUPOS++; MENUPOS--;
  switch(MENUPOS)
   {
	 case 1: wx=10; wy=10; break; // top+left 
	 case 2: wx= WWidth - mwi -25; wy= 10; break; // top+right
	 case 3: wx= WWidth - mwi -25; wy= WHeight - mhi -35; break; // bottom+right
	 case 4: wx=10; wy= WHeight - mhi -35; break; // bottom+left 

	 case 12: case 21: wx= WWidth/2 - mwi/2 -25; wy= 10; break; // top+center 
	 case 23: case 32: wx= WWidth - mwi -25; wy= WHeight/2 - mhi/2 -35; break; // right+center
	 case 34: case 43: wx= WWidth/2 - mwi/2 -25; wy= WHeight - mhi -35; break; // bottom+center
	 case 14: case 41: wx= 10; wy= WHeight/2 - mhi/2 -35; break; // left+center
   }
  wx += mwi/2; wy += mhi/2;

  var wx1= wx-0.001, wy1= wy-0.001;

  setInterval("hmenu.moveLayTo(50,"+wx1+","+wy1+","+wx+","+wy+")",25)

}


function qbmenuActivate()
{
  // Here you can customize the appearance of qbmenu **********************
  var mwidth= 125, mheight= 135; // menu size
  var fsize= 11, mbgcolor='#c0f0f0', fcolor= 'red', fface= 'arial'; // font size and color
  var linehi= 1.15; //line-height: disdant
  var talign= '' ; //text align -> left,center,right,justify
  var fstyle= '' ; //text style -> italic,normal
  var tdecor= '' ;  // text decoration -> underline,none
  var mpadding= 3 ; // space between border and contents
  var mbordercolor= 'red'
  var mborderwidth= 2
  var mborderstyle= 'outset' ; // borderstyle -> none,solid,dotted,dashed,double,
  	                           // groove,ridge,inset,outset

  if(MENUFORM==2){ mwidth= 600; mheight= 14; }
  // End customize **********************************************************
  	  
  var str, mnuobj;
  if(!document.getElementById('qbmenu'))
  {
   var body= document.getElementsByTagName("body")[0]
   var oDiv = document.createElement('div');
   oDiv.setAttribute("id","qbmenu")
   body.appendChild(oDiv);
   
   with(document.getElementById('qbmenu').style)
	{
	 position= "absolute"
	 width= mwidth
	 height= mheight
	 background= mbgcolor
	 fontSize= fsize
	 lineHeight= linehi
	 fontFamily= fface
	 color= fcolor
	 textAlign= talign
	 fontStyle= fstyle
	 textDecoration= tdecor
	 padding= mpadding
	 borderStyle= mborderstyle
	 borderColor= mbordercolor
	 borderWidth= mborderwidth 
    }
   
   actInit()
  }
  
  mnuobj= document.getElementById('qbmenu')
	  
  var cmd='<a style="font-size:' +fsize+ 'px" href="javascript:'

  if(mnuobj.style.visibility=='hidden') mnuobj.style.visibility='visible'

  var str0 = ''
	   if(ON_OFF==0) str0 +='NONE'
  else if(TYPMOD==0) str0 +='AUTO'
  else if(TYPMOD==1) str0 +='VNI'
  else if(TYPMOD==2) str0 +='TELEX'
  else if(TYPMOD==3) str0 +='VIQR-US'
  else if(TYPMOD==4) str0 +='VIQR-GER'

  var spell= (SPELL==1) ? '<BR>C&#211;' : '<BR>KH&#212;NG'
  str0 += spell + ' KI&#7874;M T&#7914;'

  str0 += (NEWACCENT==1) ? '<BR>Q.T&#7854;C M&#7898;I' : '<BR>Q.T&#7854;C C&#360;'
  
  str = str0
  str += '<hr>' +cmd+ 'ON_OFF=1;TYPMOD++ ;TYPMOD %=5;qbmenuActivate()">Ki&#7875;u G&#245; [F8]</a>'
  str += '<br>' +cmd+ 'SPELL=1-SPELL; qbmenuActivate()">Ki&#7875;m t&#7915; [F9]</a>'
  str += '<br>' +cmd+ 'NEWACCENT=1-NEWACCENT; qbmenuActivate()">Quy T&#7855;c D&#7845;u [F7]</a>'
  str += '<br>' +cmd+ 'ON_OFF=1-ON_OFF; qbmenuActivate()">T&#7855;t M&#7903; [F12]</a>'
  str += '<br>' +cmd+ 'hideQBmenu()">D&#7845;u Menu</a>'
  str += '<br>&#169;VietDev V14.0'

  if(MENUFORM==2)
	{
	  str= str.replace(/<br>/g," "); 
	  str= str.replace(/<hr>/g," &nbsp; "); 
	  str= str.replace(/<BR>/g,"+"); 
    } 


  var str1= mnuobj.innerHTML
  var str1= str1.substring(0,str1.indexOf('<HR>'))
  str1= toUnicode(str1)
  str1= str1.replace(/\r/,'')
  str1= str1.replace(/\n/,'')

  if(str1!=str0)
	{
	  mnuobj.innerHTML= str 
	  QBsetCookie(); 
	}


}



function remoteControl()
{
  if(POPWIN!=1 || !TXTOBJ) return;
  formatDialog()
}


function hideQBmenu()
{ 
  document.getElementById('qbmenu').style.visibility='hidden'
  MENUPOS=0; statusMessage(); QBsetCookie();

  if(TXTOBJ) TXTOBJ.focus();
  else if(fID) document.frames[fID].focus()
}



function MoveLayTo(idC)
{
  this.First= 1
  this.x = 0
  this.y=0
  this.dx=0
  this.dy=0

  this.objC = document.getElementById(idC).style
  this.moveLayTo = moveQBmenuTo
}


function moveQBmenuTo (np,X1,Y1,WW,HH)
{

  if( WW==0 && HH==0 )
  {
	  HH=document.body.offsetHeight
	  WW=document.body.offsetWidth
  }

  if ( this.First )
  {
   this.First=0;
   this.objC.left= X1 ; 
   this.objC.top= Y1;  
   this.x = X1 ;
   this.y = Y1
   this.dx = (WW - X1) / np 
   this.dy = (HH - Y1) / np
   return 
  }


  var wPosX = document.body.scrollLeft
  var wPosY = document.body.scrollTop

  var widthC  = parseInt(this.objC.width)
  var heightC = parseInt(this.objC.height)

  WW += ( wPosX - widthC/2)
  HH += ( wPosY - heightC/2)

  this.x += this.dx
  this.y += this.dy

  if( (this.dx>0 && this.x>=WW) || (this.dx<0 && this.x<=WW) ||
      (this.dy>0 && this.y>=HH) || (this.dy<0 && this.y<=HH)
    )
   { this.x= WW ; this.y=HH }

  this.objC.left = this.x
  this.objC.top  = this.y

}




function keyDownInit(key)
{
  if(key==32||key==13||key==8) ENGLISH=0;

       if(key==118){NEWACCENT=1-NEWACCENT} // F7
  else if(key==119){ON_OFF=1; TYPMOD++ ; TYPMOD %= 5 } // F8  =0/1/2/3=AUTO/VNI/TELEX/VIQR/VIQR-GER
  else if(key==120){SPELL=1-SPELL} // F9
  else if(key==123){ON_OFF=1-ON_OFF} // F12

  if(key==118 || key==119 || key==120 || key==123)
   {
	 if(MENUPOS!=0) qbmenuActivate()
	 else statusMessage()
   }
}




function QBsetCookie()
{
  var now = new Date();
  var exp = new Date(now.getTime() + 1000*60*60*24*365);
  exp= exp.toGMTString();

  document.cookie = 'VTYPMOD='+ TYPMOD + '; expires='+ exp;
  document.cookie = 'VSPELL='+ SPELL + '; expires='+ exp;
  document.cookie = 'VACCENT='+ NEWACCENT + '; expires='+ exp;
  document.cookie = 'VONOFF='+ ON_OFF + '; expires='+ exp;
  document.cookie = 'VSTATUS='+ MENUPOS + '; expires='+ exp;
}


function QBgetCookie()
{
  var cookie= document.cookie ;
  var res= /VSPELL/.test(cookie) ;  
  if(res)
  {
   var cookieA= cookie.split('; ')
   var pair ;
   for(var i=0; i<cookieA.length; i++)
   	{
	 pair= cookieA[i].split('=')
   	      if(pair[0]=='VSPELL') SPELL= pair[1];
	 else if(pair[0]=='VACCENT') NEWACCENT= pair[1];
   	 else if(pair[0]=='VONOFF') ON_OFF= pair[1];
   	 else if(pair[0]=='VTYPMOD') TYPMOD= pair[1];
	 else if(pair[0]=='VSTATUS' && pair[1]==0) MENUPOS= 0;
   	}
  }
 else { QBsetCookie() }
}


QBgetCookie();




/************* statusMessage  **********************/
function statusMessage()
{
  var str = ''
	   if(ON_OFF==0) str +='NONE'
  else if(TYPMOD==0) str +='AUTO'
  else if(TYPMOD==1) str +='VNI'
  else if(TYPMOD==2) str +='TELEX'
  else if(TYPMOD==3) str +='VIQR-US'
  else if(TYPMOD==4) str +='VIQR-GER'

  str += (SPELL==1) ? '+SPELLING' : '+noSPELLING'
  str += (NEWACCENT==1) ? '+newACCENT' : '+oldACCENT'
  str += "  [F7=AccentRule; F8=TypingMode; F9=Spelling; F12=On/Off] (C) Vietdev V14.0 (01/2004)";

  window.status= str
  QBsetCookie()
}

