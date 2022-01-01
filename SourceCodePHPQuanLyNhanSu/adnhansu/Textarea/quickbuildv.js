/*********************************************************************/
/*** Freeware Open Source writen by ngoCanh 2002-05                  */
/*** Original by Vietdev  http://vietdev.sourceforge.net             */
/*** Release 2004-01-07  R8.0                                        */
/*** GPL - Copyright protected                                       */
/*********************************************************************/
/*** CONFIGURATION - HERE YOU CAN SET DEFAULT-VALUES ********************/
if(typeof(SECURE)=="undefined") SECURE=1; //=0,1
if(typeof(VISUAL)=="undefined") VISUAL=1; //=0,1,2,3 see bottom of this file
if(typeof(POPWIN)=="undefined") POPWIN=1; //=1,0 Rightclick Popup dialog for textarea
if(typeof(DFFACE)=="undefined") DFFACE=''; // 'times new roman'; // Default fontFamily of Editor
if(typeof(DFSIZE)=="undefined") DFSIZE=''; // '14px'; // Default fontSize
if(typeof(DCOLOR)=="undefined") DCOLOR=''; // 'blue'; // Default color
if(typeof(DBGCOL)=="undefined") DBGCOL=''; // 'green'; // Default backgroundColor
if(typeof(DBGIMG)=="undefined") DBGIMG=''; // Default URL-backgroundImage 
if(typeof(DCSS)=="undefined") DCSS=''; // 'test.css'; // Default-Stylesheet-URL for content of editor
if(typeof(SYMBOLE)=="undefined") SYMBOLE='<QBFBR>' ; // Symbole for end-of-field in clipboard-chipcard.
if(typeof(USETABLE)=="undefined") USETABLE=1; // Enable table editor
if(typeof(USEFORM)=="undefined") USEFORM=0; // Enable form input
if(typeof(RETURNNL)=="undefined") RETURNNL=1; // Return-Button= Newline; Shift+Return= New Paragraph
if(typeof(FULLCTRL)=="undefined") FULLCTRL=0; //=0,1; 0=fast loading; 1=all control rows at bottom of Edi.
if(typeof(VDEVCSS)=="undefined") VDEVCSS= 'vdev.css'; // Edi. layout file - not for content of editor
if(typeof(LANGUAGE)=="undefined") LANGUAGE= 'language.js'; //your language file


if(typeof(ON_OFF)=="undefined") ON_OFF=1; // VietTyping 1:ON, 0:OFF
if(typeof(TYPMOD)=="undefined") TYPMOD=1; // VietTyping-mode 0:Auto, 1:Vni, 2:Telex, 3:VIQR, 4:VIQR-GER
if(typeof(SPELL)=="undefined") SPELL=1; // Check vietnamese word  0:No-check, 1:Yes
if(typeof(UNICODE)=="undefined" ) UNICODE=0; // 1= Button "SwapUni" (Unicode <-> Compound-Unicode)
if(typeof(MENUFORM)=='undefined') MENUFORM=1; // 1:quandrant, 2:bar
if(typeof(MENUPOS)=='undefined') MENUPOS=3; // 1:left-top,2:R-T,3:R-Bott,4:L-B,12:center-top,23,34,14; =0:status bar
if(typeof(NEWACCENT)=='undefined') NEWACCENT=0; // 0,1  1= hoa`; 0= ho`a
/*********************** END CONFIGURATION ****************************/


var fID; //***   IFRAME ID
var TXTOBJ=null; //***   TEXT Obj
var format=new Array();
var viewm=new Array();
var FACE= new Array();
var SIZE= new Array();
var COLOR= new Array();
var BCOLOR= new Array();
var BIMAGE= new Array();
var CSS= new Array();
var FWORD, FLAGS=0;



function getFullScriptPath(script)
{
  var i=0, path='';
  while(document.getElementsByTagName('script')[i])
  {
        var src= document.getElementsByTagName('script')[i].src
	if( src && src.lastIndexOf(script)>=0 ){ path=src.substring(0,src.lastIndexOf(script)); break;}
	i++
  }

  if(path.indexOf("://")>=0) return path
  path= path.replace(/^\.\//,"/")

  var href= document.location.href
  href= href.substring(0,href.lastIndexOf('/'))

  if(path=='.' || path=='') return href
  else if(path.indexOf('..')>=0)
   {
	 var sub= ''
	 if(path.length>2) sub= path.substr(path.lastIndexOf('../')+2)
     var temp= path.split('..')
	 for( var i=1; i<temp.length;i++)
	  {	href= href.substring(0,href.lastIndexOf('/')); }
	 if(sub!='/..') href += sub
   }
  else if(path!='') href += path;
  return href
}


QBPATH= getFullScriptPath('/quickbuild');

document.writeln('<style>@import url("' + QBPATH + '/skin/'+ VDEVCSS +'");</style>');
document.writeln('<script src="'+QBPATH+'/skin/'+ LANGUAGE +'"></script>');

if(document.all) document.writeln('<script src="'+QBPATH+'/quickbuildv_IE.js"></script>');
else document.writeln('<script src="'+QBPATH+'/quickbuildv_Moz.js"></script>');

