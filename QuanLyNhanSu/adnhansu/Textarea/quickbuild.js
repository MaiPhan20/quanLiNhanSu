/*** Freeware Open Source writen by ngoCanh 5-2002 v. 9.0     */
/*** Original by Vietdev  http://vietdev.sourceforge.net      */
/*** Release 2002/05/23  R9.0                                 */
/*** The script is as literature and not copyright protected  */
/*** Please fair-play to keep the notice intact               */
/*** And please DON'T SELL IT                                 */
/*** R 2.0 (2002/06/12)                                       */
/**************************************************************/
// Global variable
var FORMOBJ
var OBJ=null; 
var fID; //  IFRAME ID
var format=new Array();
var viewm=new Array();	
	
	
document.onclick=doMouseclick
document.onmousedown=doMousedown


function setHiddenValue()
{
 var strx= editorContents(fID)
 if(FORMOBJ && FORMOBJ[fID] ) FORMOBJ[fID].value= strx
}	



function changetoIframe(el)
{
   var wi= '', hi= '';
   if(el.style.height) hi= " height=" + el.style.height
   else if(el.rows) hi= " height=" + (14*el.rows+28)
   if(el.style.width) wi= " width=" + el.style.width
   else if(el.cols) wi= " width=" + (6*el.cols +25)
   	   
   var parent= el.parentElement
   while(parent.tagName != 'FORM') parent= parent.parentElement
   var val= el.innerText

   var strx = createEditor(el.name,wi,hi);

   el.outerHTML= strx
   
   fID= el.name
   initEditors(fID)
   
   FORMOBJ= parent
   	   
   var reg= eval("/<br>/i") ;
   if( reg.test(val) ) val= val.replace(/\n/g, "");
   else val= val.replace(/\n/g, "<br>");

   val= val.replace(/\r/g, "");
   val= val.replace(/\t/g, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
   val= val.replace(/\'/g, "\\\'");
   val= val.replace(/\\\\\'/g, "\\\'");

   document.frames[fID].document.onkeyup= setHiddenValue
   document.frames[fID].document.onmouseup= setHiddenValue
   setTimeout("document.frames['"+fID+"'].document.body.innerHTML='"+val+"'",200)
   FORMOBJ[fID].value= val

}




function doMouseclick()
{
 var el=event.srcElement 
 var el=event.srcElement 
 if(el.type!='text' && el.type!='textarea') return

 var visual=''
 if(el.type=='textarea' && !VISUAL) visual=confirm("Use Visual Mode ?")
 	 
 if(visual) changetoIframe(el);

 OBJ=el
}




function doMousedown()
{
  var el=event.srcElement 
  if(el.type!='text'&&el.type!='textarea') return true
  if(event.button==2) formatDialog(el)
  return false
}


function formatDialog(obj)
{
  obj.focus();
  var caret=obj.document.selection.createRange()
  obj.curword=caret.duplicate();
  wrd=obj.curword.text

  var y = screen.height -parseInt('27em')*14 - 30 
  var feature = "font-family:Arial;font-size:10pt;dialogWidth:30em;dialogHeight:27em;dialogTop:"+y
      feature+= ";edge:sunken;help:no;status:no"
  var arr= showModalDialog(DIALOG, "", feature);
  if(arr==null) return ;

  doFormat(arr,caret,obj)

}



function doFormat(arr,caret,obj)
{
  var cmd = new Array();
  cmd = arr.split(',')

  if(!cmd[0] || cmd[0]=='Swap[Text/HTML]' || cmd[0]=='Swap[Uni/View]' ) return 
  if(cmd[0]=='SelectAll') { obj.focus(); obj.select(); return }
  if(cmd[0]=='Cut') { caret.execCommand("Cut"); return }
  if(cmd[0]=='Copy') { caret.execCommand("Copy"); return }
  if(cmd[0]=='Paste') { caret.execCommand("Paste"); return }

  obj.curword=caret.duplicate();
  obj.curword.text= cmd[0]+wrd+cmd[1]
}



function remoteControl()
{
  if(!OBJ.type) formatDialogF();
  else formatDialog(OBJ)
}




function iEditor(idF)
{
  var obj=document.frames[idF]
  obj.document.designMode="On"
  obj.document.onclick=function(){ OBJ=null; fID=idF; return false }
  obj.document.onmousedown=FMousedown
  format[idF]='HTML'
  viewm[idF]=1;
}



// init all found TEXTAREA in document
function changeAllTextareaToIframe()
{
  var i=0;
  while(document.all.tags('textarea')[i])
   { 
      changetoIframe(document.all.tags('textarea')[i])
	  if(++i>0 && !document.all.tags('textarea')[i] ) i=0;
	}

}


// init all found IFRAME in document
function initAllEditors()
{
  var i=0;
  while(document.all.tags('iframe')[i])
  {iEditor(document.all.tags('iframe')[i++].id)}
}


// init only IFRAMEs that as argument of initEditors
// e.g. initEditors('id1','id2',...)
function initEditors()
{
  for(var i=0;i<arguments.length;i++) iEditor(arguments[i])
}



function FMousedown()
{
  var objF=document.frames[fID];
  if(objF && objF.event && objF.event.button==2) formatDialogF();
}




function formatDialogF()
{
  var y = screen.height -parseInt('30em')*14 //- 30 
  var feature = "font-family:Arial;font-size:10pt;dialogWidth:30em;dialogHeight:27em;dialogTop:"+y
      feature+= ";edge:sunken;help:no;status:no"
  var arr= showModalDialog(DIALOG, "visual", feature);
  if(arr==null) return ; 

  doFormatF(arr)
  	  
}



/////////////////////////////////////////////////////////////////
function createEditor(id,wi,hi)
{
  var idx= DIALOG.lastIndexOf('/')
  var urlx
  if(idx<0) iurl='./imgedit'
  else iurl= DIALOG.substring(0,idx)+ '/imgedit'

  var strx = "<input name="+id+" type=hidden></input>"
  strx += "<iframe id="+id+ hi +" width=100%></iframe>"

  var str="<TABLE border=1 cellspacing=0 cellpadding=1 width=90%><tr><td>"
  str += strx
  str += "</td></tr>\
<TR bgColor=#c0c0a0 align=center>\
<TD valign=middle nowrap>\
<a href=\"javascript:doFormatF('Bold')\"><img src='IURL/bold.gif' border=0 alt='Bold' width=23 height=22></a>\
<a href=\"javascript:doFormatF('JustifyLeft')\"><img src='IURL/left.gif' border=0 alt='Left' width=23 height=22></a>\
<a href=\"javascript:doFormatF('JustifyCenter')\"><img src='IURL/center.gif' border=0 alt='Center' width=23 height=22></a>\
<a href=\"javascript:doFormatF('JustifyRight')\"><img src='IURL/right.gif' border=0 alt='Right' width=23 height=22></a>\
<a href=\"javascript:doFormatF('Outdent')\"><img src='IURL/outdent.gif' border=0 alt='Outdent' width=23 height=22></a>\
<a href=\"javascript:doFormatF('Indent')\"><img src='IURL/indent.gif' border=0 alt='Indent' width=23 height=22></a>\
<a href=\"javascript:doFormatF('Italic')\"><img src='IURL/italic.gif' border=0 alt='Italic' width=23 height=22></a>\
<a href=\"javascript:doFormatF('Underline')\"><img src='IURL/under.gif' border=0 alt='Underline' width=23 height=22></a>\
<a href=\"javascript:doFormatF('StrikeThrough')\"><img src='IURL/strike.gif' border=0 alt='StrikeThrough' width=23 height=22></a>\
<a href=\"javascript:doFormatF('SuperScript')\"><img src='IURL/superscript.gif' border=0 alt='SuperScript' width=23 height=22></a>\
<a href=\"javascript:doFormatF('SubScript')\"><img src='IURL/subscript.gif' border=0 alt='SubScript' width=23 height=22></a>\
<a href=\"javascript:selectBgColor()\"><img src='IURL/bgcolor.gif' border=0 alt='Background' width=23 height=22></a>\
<a href=\"javascript:selectFgColor()\"><img src='IURL/fgcolor.gif' border=0 alt='Foreground' width=23 height=22></a>\
<a href=\"javascript:doFormatF('InsertImage')\"><img src='IURL/image.gif' border=0 alt='Insert Image' width=23 height=22></a>\
<a href=\"javascript:selectEmoticon()\"><img src='IURL/cool.gif' border=0 alt='Emotions' width=23 height=22></a>\
<a href=\"javascript:doFormatF('CreateLink')\"><img src='IURL/link.gif' border=0 alt='Create Link' width=23 height=22></a>\
<a href=\"javascript:doFormatF('UnLink')\"><img src='IURL/unlink.gif' border=0 alt='Del Link' width=23 height=22></a>\
<a href=\"javascript:doFormatF('InsertOrderedList')\"><img src='IURL/numlist.gif' border=0 alt='OrderedList' width=23 height=22></a>\
<a href=\"javascript:doFormatF('InsertUnorderedList')\"><img src='IURL/bullist.gif' border=0 alt='UnorderedList' width=23 height=22></a>\
<a href=\"javascript:doFormatF('InsertHorizontalRule')\"><img src='IURL/hr.gif' border=0 alt='HR' width=23 height=22></a>\
<a href=\"javascript:doFormatF('formatBlock,PRE')\"><img src='IURL/pre.gif' border=0 alt='Pre-Block' width=23 height=22></a>\
<a href=\"javascript:doFormatF('formatBlock,P')\"><img src='IURL/unpre.gif' border=0 alt='Del Pre-Block' width=23 height=22></a>\
<a href=\"javascript:doFormatF('InsertMarquee')\"><img src='IURL/marquee.gif' border=0 alt='Marquee' width=23 height=22></a>\
<a href=\"javascript:editTable()\"><img src='IURL/instable.gif' border=0 alt='TableEditor' width=23 height=22></a>\
<a href=\"javascript:doFormatF('InsertIFrame')\"><img src='IURL/iframe.gif' border=0 alt='IFrame' width=23 height=22></a>\
<a href=\"javascript:doFormatF('RemoveFormat')\"><img src='IURL/delformat.gif' border=0 alt='Delete Format' width=23 height=22></a>\
<a href=\"javascript:selectAll()\"><img src='IURL/all.gif' border=0 alt='SelectAll' width=23 height=22></a>\
<a href=\"javascript:doFormatF('Cut')\"><img src='IURL/cut.gif' border=0 alt='Cut' width=23 height=22></a>\
<a href=\"javascript:doFormatF('Copy')\"><img src='IURL/copy.gif' border=0 alt='Copy' width=23 height=22></a>\
<a href=\"javascript:doFormatF('Paste')\"><img src='IURL/paste.gif' border=0 alt='Paste' width=23 height=22></a>\
</TD></TR>\
<TR bgColor=#a0a080 valign=middle align=center>\
<TD nowrap>\
<SELECT onchange=\"doFormatF('formatBlock,'+this.value)\" style=\"height:22; width:103; background:#a0a080; color:#005555\">\
<OPTION value=\"\">Headline\
<OPTION value=\"H1\">Headline H1\
<OPTION value=\"H2\">Headline H2\
<OPTION value=\"H3\">Headline H3\
<OPTION value=\"H4\">Headline H4\
<OPTION value=\"H5\">Headline H5\
<OPTION value=\"H6\">Headline H6\
<OPTION value=\"P\">No Headline</OPTION>\
</SELECT>\
<SELECT onchange=\"doFormatF('FontName,'+this.value)\" style=\"height:22; width:145; background:#a0a080; color:#005555\">\
<OPTION value=\"\">Font Face\
<OPTION value=Arial>Arial\
<OPTION value=\"Times New Roman\">Times New Roman\
</SELECT>\
<SELECT onchange=\"doFormatF('FontSize,'+this.value)\" style=\"height:22; width:103; background:#a0a080; color:#005555\">\
<OPTION value=''>F-Size\
<OPTION value=7>Size=7\
<OPTION value=6>Size=6\
<OPTION value=5>Size=5\
<OPTION value=4>Size=4\
<OPTION value=3>Size=3\
<OPTION value=2>Size=2\
<OPTION value=1>Size=1\
</OPTION>\
</SELECT>\
<!--  erase comment tag to enable form element \
<SELECT onchange=doFormatF(this.value) style='height:22; width:103; background:#a0a080; color:#005555'>\
<OPTION value=''>Form\
<OPTION value=InsertFieldset>CreateField\
<OPTION value=InsertInputButton>Button\
<OPTION value=InsertInputReset>Resetbutton\
<OPTION value=InsertInputSubmit>Submitbutton\
<OPTION value=InsertInputCheckbox>Checkbox\
<OPTION value=InsertInputRadio>Radiobutton\
<OPTION value=InsertInputText>Text\
<OPTION value=InsertSelectDropdown>Dropdown\
<OPTION value=InsertSelectListbox>Listbox\
<OPTION value=InsertTextArea>TextArea\
<OPTION value=InsertButton>IEButton\
</SELECT>\
-->\
<INPUT type=button value=\"SwapMode\" onclick=\"swapMode()\" style=\"height:22; width:70; background:#a0a080; border-color:#f0f0c0; color:#005555\">\
<INPUT value='SwapCode' onclick=\"swapView()\"  type=button style=\"height:22; width:70;background:#a0a080; border-color:#f0f0c0; color:#005555\">\
</TD></TR>\
</TABLE>" ;

str = str.replace(/IURL/g, iurl);

return str ;

}
/////////////////////////////////////////////////////////////////







function doFormatF(arr)
{
  var objF=document.frames[fID];
  if(!objF){alert('Please click to select the editor');return}
  objF.focus()

  var cmd = new Array();
  cmd = arr.split(',')

  if(cmd[0]=='SelectAll') { selectAll(); return }
  if(cmd[0]=='Swap[Text/HTML]') { swapMode(); return }
  if(cmd[0]=='Swap[Uni/View]') { swapView(); return }
  if(cmd[0]=='InsertTable') { editTable(); setHiddenValue(); return }
  if(cmd[0]=='Emotions') { editEmotions(cmd[1],objF); setHiddenValue(); return }

  var edit=objF.document;
       if(cmd[0]=='formatBlock') edit.execCommand(cmd[0],false,"<"+cmd[1]+">")
  else if(cmd[0]=='InsertImage' && !cmd[1] ) edit.execCommand(cmd[0],true,"")
  else if( !cmd[1] ) edit.execCommand(cmd[0])
  else edit.execCommand(cmd[0],false,cmd[1])

  setHiddenValue(); 
}




function editEmotions(wrd,obj)
{
  var caret=obj.document.selection.createRange();
  obj.curword=caret.duplicate();
  obj.curword.text= wrd + ' '
}




function  swapView()
{
 var objF=document.frames[fID];
 if(!objF){alert('Please click to select the editor');return}

 if(format[fID]=="HTML")
 {
  objF.document.body.style.fontFamily="arial"
  objF.document.body.style.fontSize="11pt"
  objF.document.body.style.color="black"
  objF.document.body.style.background="#e0e0f0"
  var strx=objF.document.body.innerHTML
  if(viewm[fID]) strx=toUnicode(strx)
  else strx=viewISOCode(strx)
  format[fID]="Text"
}
 else
 {
  var strx=objF.document.body.innerText
  if(viewm[fID]) strx=toUnicode(strx)
  else strx=viewISOCode(strx)
}

 objF.document.body.innerText=strx
 viewm[fID]=1 - viewm[fID]

 objF.focus()
}



function swapMode()
{
 var objF=document.frames[fID];
 if(!objF){alert('Please click to select the editor');return}
 
 if(format[fID]=="HTML")
 {
  var strx=objF.document.body.innerHTML
  objF.document.body.innerText=strx
  objF.document.body.style.fontFamily="monospace"
  objF.document.body.style.fontSize="12pt"
  objF.document.body.style.color="black"
  objF.document.body.style.background="#e0e0f0"
  format[fID]="Text"
 }
 else
 {
  objF.document.body.style.fontFamily='Arial'
  objF.document.body.style.color="#000000"
  objF.document.body.style.background=""
  var strx=objF.document.body.innerText
  objF.document.body.innerHTML=strx
  format[fID]="HTML"
  viewm[fID]=1
 }

 objF.focus()
}



function selectAll()
{ 
  var objF=document.frames[fID];
  if(!objF){alert('Please click to select the editor');return}
  objF.focus()
  var s=objF.document.body.createTextRange()
  s.execCommand('SelectAll')
}



function editorContents(frameID)
{
  var objF=document.frames[frameID]
  if(!objF)return

  var strx;
  if(format[frameID]=="HTML") strx=objF.document.body.innerHTML
  else strx=objF.document.body.innerText

  strx = strx.replace(/\r/g, ""); 
  strx = strx.replace(/\n/g, ""); 

  // Security
  if(SECURE==1)
	{
	  strx = strx.replace(/<meta/ig, "< meta"); 
	  strx = strx.replace(/<script/ig, "< script"); 
	  strx = strx.replace(/<\/script/ig, "< /script"); 
	  strx = strx.replace(/ on/ig, " o n"); 
	  strx = strx.replace(/script:/ig, "script :"); 

	  strx = strx.replace(/&lt;meta/ig, "&lt; meta"); 
	  strx = strx.replace(/&lt;script/ig, "&lt; script"); 
	  strx = strx.replace(/&lt;\/script/ig, "&lt; /script"); 
	}

  return strx
}




/************* EXTRA ****************/
function selectEmoticon()
{ 
  var idx= DIALOG.lastIndexOf('/')
  var urlx
  if(idx<0) urlx='./emoticon.html'
  else urlx= DIALOG.substring(0,idx)+ '/emoticon.html'

  var objF=document.frames[fID];
  if(!objF){alert('Please click to select the editor');return}


  var arr=showModalDialog(urlx, urlx ,  "font-family:Verdana;font-size:12;dialogWidth:30em;dialogHeight:34em; edge:sunken;help:no;status:no");
  if(arr !=null) doFormatF('InsertImage,'+arr)
}


function selectBgColor()
{ 
  var idx= DIALOG.lastIndexOf('/')
  var urlx
  if(idx<0) urlx='./selcolor.html'
  else urlx= DIALOG.substring(0,idx)+ '/selcolor.html'

  var objF=document.frames[fID];
  if(!objF){alert('Please click to select the editor');return}

  var arr=showModalDialog(urlx, "",  "font-family:Verdana;font-size:12;dialogWidth:30em;dialogHeight:34em; edge:sunken;help:no;status:no");
  if(arr !=null) doFormatF('BackColor,'+arr)
}


function selectFgColor()
{ 
  var idx= DIALOG.lastIndexOf('/')
  var urlx
  if(idx<0) urlx='./selcolor.html'
  else urlx= DIALOG.substring(0,idx)+ '/selcolor.html'

  var objF=document.frames[fID];
  if(!objF){alert('Please click to select the editor');return}

  var arr=showModalDialog(urlx, "",  "font-family:Verdana;font-size:12;dialogWidth:30em;dialogHeight:34em; edge:sunken;help:no;status:no");
  if(arr !=null) doFormatF('ForeColor,'+arr)
}



function field2form(str1)
{
  var str2
  var index
  var lenx
  index=str1.indexOf('<FIELDSET')
  while(index>=0)
  {
    lenx=str1.length
    str1=str1.substring(0,index) + "<FORM" + str1.substring(index+9,lenx)
    index=str1.indexOf('<FIELDSET')
   }
  index=str1.indexOf('</FIELDSET>')
  while(index>=0)
  {
    lenx=str1.length
    str1=str1.substring(0,index) + "</FORM>" + str1.substring(index+11,lenx)
    index=str1.indexOf('<FIELDSET>')
  }
  return str1
}


function form2field(str1)
{
  var str2
  var index
  var lenx
  index=str1.indexOf('<FORM')
  while(index>=0)
  {
    lenx=str1.length
    str1=str1.substring(0,index) + "<FIELDSET" + str1.substring(index+5,lenx)
    index=str1.indexOf('<FORM')
  }
  index=str1.indexOf('</FORM>')
  while(index>=0)
  {
    lenx=str1.length
    str1=str1.substring(0,index) + "</FIELDSET>" + str1.substring(index+7,lenx)
    index=str1.indexOf('</FORM>')
  }
  return str1
}


function editTable()
{
  var objF=document.frames[fID];
  if(!objF){alert('Please click to select the editor');return}
  objF.focus()
  
  var sel = objF.document.selection;
  if (sel==null) return

  var Range = sel.createRange();
  var wrd ;
  
  if (sel.type == "Control")
  { 
    if(Range(0).tagName=='TABLE') wrd= Range(0).outerHTML
    else return
  }
  else
  {
  	if(!Range.duplicate) return;
  	objF.curword=Range.duplicate();
  	wrd= objF.curword.text;
  }

 var dlgstyle="font-family:Verdana;font-size:12" +
 	          ";dialogWidth:" + screen.width +
 	          ";dialogHeight:"+ screen.height+
 	          ";edge:sunken;help:no;status:no"
 	          	  

  var idx= DIALOG.lastIndexOf('/')
  var tabedit
  if(idx<0) tabedit='./tabedit.html'
  else tabedit= DIALOG.substring(0,idx)+ '/tabedit.html'

  var arr= showModalDialog(tabedit, wrd, dlgstyle);
  if(arr==null) return
  	  	  
  if (sel.type == "Control") Range(0).outerHTML=arr
  else Range.pasteHTML(arr);

}



/**************************/
function  toUnicode(str1)
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


/**** From Html-Code to UNICODE ***********/
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


// VISUAL=0 : Textarea to Editor after confirmation

// VISUAL=1 : all Textarea to Editor
if(VISUAL==1) changeAllTextareaToIframe() ;

// VISUAL=2 : some spezific iframes 
if(VISUAL==2) initEditors('id1','id2') ; // please edit idxxxxx

// VISUAL=3 : all Iframe to Editor
if(VISUAL==3) initAllEditors();


// VISUAL>4 : no Visual-Editor, only use Rightmouse-Control