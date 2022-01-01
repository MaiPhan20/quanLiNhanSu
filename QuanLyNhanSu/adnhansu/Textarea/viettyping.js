/*** Freeware Open Source written by ngoCanh 5-2002                   */
/*** Original by Vietdev  http://vietdev.sourceforge.net             */
/*** Release 2003-05  R13.5                                          */
/*** GPL - Copyright protected                                       */
/*********************************************************************/

/*** CONFIGUARION HERE YOU CAN SET DEFAULT-VALUES                    */
/*** ON_OFF=1-> VietTyping 1:ON, 0:OFF                               */
/*** TYPMOD=0-> VietTyping-mode 0:Auto, 1:Vni, 2:Telex, */ 
if(typeof(USECOOKIE)=='undefined') USECOOKIE=1;
if(typeof(TYPMOD)=='undefined') TYPMOD=1;
if(typeof(ON_OFF)=='undefined') ON_OFF=1;
if(typeof(ENGLISH)=='undefined') ENGLISH=0;
if(typeof(NEWACCENT)=='undefined') NEWACCENT=0; // 0,1  1= hoa`; 0= ho`a

var IE= document.all
var CODE, CHANGE=0, THOAT=0;


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





function correcturAccent(obj,key)
{
  if(!IE) return correcturAccentTextMoz(obj,key)

  var arr= getSelectWord(obj)
  var i= arr[0]; 
  var wrd= arr[1];

  if( !(wrd= findCorrecturWord(wrd+key)) ) return;

  if(CHANGE) replaceWord(obj,wrd,i)
}


function correcturAccentTextMoz(obj,key)
{
  var arr= getSelectWordMoz(obj)
  var wrd= arr[2];
  if( !(wrd=findCorrecturWord(wrd+key)) ) return;
  if(CHANGE) replaceWordMoz(obj,wrd, arr)
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




function viewViet(obj,key)
{
  if(!IE) return viewVietMoz(obj,key)

  var arr= getSelectWord(obj);
  var i= arr[0];
  var wrd= arr[1];

  var wrd1=toViet(wrd,key);
  if(wrd1=='') return 

  if(CHANGE) replaceWord(obj,wrd1,i)
  else replaceWord(obj,wrd,i)
  THOAT=0;

}

/**********************************************/
function replaceWordMoz(obj,wrd,arr)
{
   var start= arr[0], end = arr[1];

   var conts1= obj.value.substring(0,start)
   var conts2= obj.value.substr(end)
   obj.value= conts1 + wrd + conts2
   var cursor= conts1.length+ wrd.length
   obj.setSelectionRange(cursor,cursor)
}



function replaceWord(obj,wrd,i)
{
  var caret=obj.document.selection.createRange();
  caret.moveStart("character", -i);  
  obj.curword=caret.duplicate();
  obj.curword.text=wrd;
}


function getSelectWordMoz(obj)
{
  var conts= obj.value

  var start= obj.selectionStart
  var end= obj.selectionEnd
  var conts1= conts.substring(0,start)
  var conts2= conts.substr(end)
  
  var wrd="", chrx, len= conts1.length ;

  for(var j=len-1;j>=0;j--)
  {
   wrd = conts1.substring(j,len)
   chrx= conts1.substring(j,j+1)
   if(notWord(chrx))
    {
      if(chrx.charCodeAt(0)==13) wrd=wrd.substr(2);
      else wrd=wrd.substr(1);
      break;
    }
  }
  var arr= new Array();
  arr[0]= j+1;  arr[1]=end;  arr[2]= wrd;
  return arr;
}



function deleteEscape(obj)
{
  var conts= obj.value
  var end= obj.selectionEnd
  var start= obj.selectionStart
  var conts1= conts.substring(0,start-1)
  var conts2= conts.substr(end)
  obj.value= conts1+conts2
  obj.setSelectionRange(start-1,start-1)
}


function viewVietMoz(obj,key)
{
  viewVietTextObj(obj,key); 
  THOAT=0; 
}

function viewVietTextObj(obj,key)
{
  var arr= getSelectWordMoz(obj)
  var wrd= arr[2], start=arr[0], end= arr[1];

  wrd= toViet(wrd,key);
  if(CHANGE) replaceWordMoz(obj,wrd, arr)
}






/**************** U N I C O D E *************************/
function toViet(str1,key)
{
   if(ENGLISH || !str1) return str1;

   var c2= '' + key; // change to string
   var sx=''

   // except
   if(TYPMOD!=1 && TYPMOD!=0 && (key==1||key==2||key==6)) return str1


   sx=UNI(str1,c2); /////////////////////


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

   var c3= '' + key; // change to string
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



function doMDown(e)
{
  var el;
  if(IE) el= event.srcElement
  else el= e.currentTarget

  if(!el.type || (el.type!='text'&&el.type!='textarea')) return
  statusMessage()
}


function keyDownInit(key)
{
  if(key==32||key==13||key==8) ENGLISH=0;
       if(key==118){NEWACCENT=1-NEWACCENT} // F7
  else if(key==119){ON_OFF=1; TYPMOD++ ; TYPMOD %= 5 } // F8=0/1/2/3=AUTO/VNI/TELEX/VIQR/VIQR-GER
  else if(key==123){ON_OFF=1-ON_OFF} // F12
  if(key==123 || key==119 || key==118) statusMessage()
}




function doKDown(e)
{
  var el;
  if(IE) el= event.srcElement
  else el= e.currentTarget

  // var el= TXTOBJ

  var ctrl,shft,key,alt;

  if(el.type!='text' && el.type!='textarea') return
  if(IE){ alt= event.altKey; ctrl= event.ctrlKey; shft= event.shiftKey; key= event.keyCode }
  else{ alt= e.altKey; ctrl= e.ctrlKey; shft= e.shiftKey; key= e.charCode }
  
  if(alt) return;


  if(IE) keyDownInit(key)
  else keyDownInit(e.keyCode)
  
  if(!IE || ON_OFF==0 || ENGLISH || TYPMOD!=4) return;

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



function keyPressInit(key,obj)
{
  if(ON_OFF==0 || ENGLISH) return;

  var chr= String.fromCharCode(key) ;
  var chr1= chr.toUpperCase() ;
  
  if(chr=='\\' && (TYPMOD==4||TYPMOD==3||TYPMOD==0)){ THOAT=1; return }
  if(!IE && THOAT==1){ THOAT=0; return deleteEscape(obj) }


  if(TYPMOD==4 && key==223){ chr='?'; chr1='?' } // outlaw chu+~ etzess 

       if((TYPMOD==3 ||(TYPMOD==4&&!obj.getSelection))
		   && "^`".indexOf(chr)>=0) viewVietX(obj,chr,0)
  else if(/[SFRXJDAEOWZ1234567890\/\'\?\~\.\-\#\(\+\*]/.test(chr1)) viewViet(obj,chr)
  else if(/[CINT]/.test(chr1)) correcturAccent(obj,chr);
  THOAT=0;
}




function doKPress(e)
{
  var el;
  if(IE) el= event.srcElement
  else el= e.currentTarget

  var key;

  if(el.type!='text' && el.type!='textarea') return
  if(IE){ key= event.keyCode }
  else{ key= e.charCode }

  keyPressInit(key,el)

  if(!IE && (e.keyCode>=118&&e.keyCode<=123)) e.stopPropagationX(); // F7-F12

  if(!CHANGE) return;  // no abort

  CHANGE=0
  if(IE) return false; // abort 
  
  e.stopPropagationX();
}



function QBsetCookie()
{
  var now = new Date();
  var exp = new Date(now.getTime() + 1000*60*60*24*365);
  exp= exp.toGMTString();

  document.cookie = 'VTYPMOD='+ TYPMOD + '; expires='+ exp;
  document.cookie = 'VONOFF='+ ON_OFF + '; expires='+ exp;
}


function QBgetCookie()
{
  var cookie= document.cookie ;
  var reg= eval('/VTYPMOD/');
  var res= reg.test(cookie) ;  
  if(res)
  {
   var cookieA= cookie.split('; ')
   var pair ;
   for(var i=0; i<cookieA.length; i++)
   	{
	 pair= cookieA[i].split('=')
   	 if(pair[0]=='VONOFF') { ON_OFF= pair[1]; }
   	 else if(pair[0]=='VTYPMOD') { TYPMOD= pair[1]; }
   	}
  }
 else { QBsetCookie() }
}



if(USECOOKIE) QBgetCookie();



function statusMessage()
{
  var str = 'Mode: '
	   if(ON_OFF==0) str +='NONE'
  else if(TYPMOD==0) str +='AUTO'
  else if(TYPMOD==1) str +='VNI'
  else if(TYPMOD==2) str +='TELEX'
  else if(TYPMOD==3) str +='VIQR-US'
  else if(TYPMOD==4) str +='VIQR-GER'

  str += (NEWACCENT==1) ? '+newACCENT' : '+oldACCENT'
  str += "  [F7=AccentRule; F8=TypingMode; F12=On/Off;] (C) Vietdev V13.5 (05/2003)";

  window.status= str
  QBsetCookie()
}




function viewVietX(obj,key,xkey)
{
  if(!IE) return viewVietXMoz(obj,key)

  var arr= getSelectWord(obj);

  var i= arr[0], wrd= arr[1], kchr;
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




function viewVietXMoz(obj,key)
{
  var wrd
  var tmp= TYPMOD
  TYPMOD=1
  if(key=='^') key=6
  else if(key=='`') key=2
  viewVietTextObj(obj,key); 
  THOAT=0; 
  TYPMOD=tmp;
}







function doAddEventToObj(oArr)
{
  for( var i=0; i<oArr.length ;i++)
   {
    if(IE)
     {
      oArr[i].onmousedown=doMDown
      oArr[i].onkeydown=doKDown
      oArr[i].onkeypress=doKPress
     }
    else
     {
      oArr[i].addEventListener("mousedown", doMDown, false);
      oArr[i].addEventListener("keydown", doKDown, false);
      oArr[i].addEventListener("keypress", doKPress, false);
     }
   }
}


function addEventToObj()
{
  var oArr= document.getElementsByTagName("textarea")
  doAddEventToObj(oArr)

  oArr= document.getElementsByTagName("input")
  doAddEventToObj(oArr)
}



addEventToObj();
