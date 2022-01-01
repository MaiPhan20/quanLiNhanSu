/*** Du`ng cho IE-Browser ***/
var SP=1
function uKP()
{
var el,ky,shi
if(FRA){el=document.frames[FRA];ky=el.event.keyCode;shi=el.event.shiftKey}
else{el=event.srcElement;ky=event.keyCode;shi=event.shiftKey}
if(ky==32&&!shi){SP=1-SP; NOV=(SP==1)?0:1}
else SP=0
if(NOV==1&&ky==32&&!shi)return false
if(!el||(el.type&&el.type!='text'&&el.type!='textarea'))return
kpIni(ky,el)
if(typeof(CHG)!="undefined"&&CHG){CHG=0;return false}//abort
else return true//no abort
}

function uKD()
{
var el,k,alt
if(FRA){el=document.frames[FRA];k=el.event.keyCode;alt=el.event.altKey}
else{el=event.srcElement;k=event.keyCode;alt=event.altKey}
if(!el||(el.type&&el.type!='text'&&el.type!='textarea'))return
if(alt)return
kdIni(k)
}

function kdIni(k)
{
if(k==13||k==8)NOV=0
if(k==118){NEWV=1-NEWV}//F7
else if(k==119){ON_OFF=1;MOD++;MOD%=4}//F8
else if(k==120){SPELL=1-SPELL}//F9
else if(k==123){ON_OFF=1-ON_OFF}//F12
if(STATUS&&(k==118||k==119||k==120||k==123))wrtStat()
}

function iEvt(idF)
{
var o=document.frames[idF]
if(!o)return;
o=o.document
o.designMode="On"
o.attachEvent("onmouseup",function(){TXT=null;FRA=idF;uMU()})
o.attachEvent("onkeypress",uKP)
o.attachEvent("onkeydown",uKD)
return true
}

function tEvt(el)
{
el.attachEvent("onmouseup",function(){TXT=el;FRA=null;uMU()})
el.attachEvent("onkeypress",uKP)
el.attachEvent("onkeydown",uKD)
}

function EvtViet()
{
	var oA=document.getElementsByTagName("textarea")
	var i=-1
	while(oA[++i])tEvt(oA[i])
	oA=document.getElementsByTagName("input")
	i=-1
	while(oA[++i])
	{
	 if(oA[i].type!="text" || oA[i].name == 'txt_user_name' || oA[i].name == 'txt_user_email' || oA[i].name == 'txt_security_num' )continue
	 tEvt(oA[i])
	}
	if(typeof(ALLFRAME)=='undefined')ALLFRAME=1
	if(!ALLFRAME)return
	oA=document.getElementsByTagName("iframe")
	i=-1
	while(oA[++i])if(!iEvt(oA[i].id))break
}

EvtViet()

function getSelectWord(obj)
{
replaceWord(obj,'',0)
var caret=obj.document.selection.createRange()
var caret2=caret.duplicate()
var wrd="",i=0,chrx,len
while(1)
{
 caret2.moveStart("character",-1)
 obj.curword=caret2.duplicate()
 len=obj.curword.text.length
 if(len==wrd.length)break
 wrd=obj.curword.text
 chrx=wrd.substring(0,1)
 if(notWord(chrx))
 {
  if(chrx.charCodeAt(0)==13)wrd=wrd.substr(2)
  else wrd=wrd.substr(1)
  break
 }
 i++
}
var arr=new Array()
arr[0]=i;arr[1]=wrd
return arr
}

function replaceWord(o,wrd,i)
{
var caret=o.document.selection.createRange()
caret.moveStart("character",-i)
o.curword=caret.duplicate()
o.curword.text=wrd
}

function viewViet(o,k)
{
if(o.document.selection.type=='Control')return
var arr=getSelectWord(o)
var i=arr[0]
var wrd=arr[1]
var wrd1=toViet(wrd,k)

if(wrd=='')return
if(CHG)replaceWord(o,wrd1,i)
else replaceWord(o,wrd,i)
ESC=0
}

function kpIni(k,o)
{
 function findCorrecturWord(wrd)
 {
  var wrdA=wrd.split(''),keyx
  var lenx=wrd.length
  if(lenx<3)return
  var code1,chr2,pos,idx
  code1=wrdA[lenx-3].charCodeAt(0);chr2=wrdA[lenx-2];pos=3
  idx=vIdx(code1)
  keyx=idx%6
  if(idx>126||keyx<1)return
  //a A a+ a^ A+ A^ 
  if(!/[aA\u00E2\u00C2\u0103\u0102eEiIyY]/.test(chr2))return
  wrdA[lenx-pos]=String.fromCharCode(VOW[idx-keyx])
  wrd=wrdA.join('')
  var typ=MOD
  MOD=1
  wrd=toViet(wrd,keyx)
  MOD=typ
  return wrd
 }
 function rmEsc(o)
 {
  var caret=o.document.selection.createRange()
  caret.moveStart("character",-1)
  o.curword=caret.duplicate()
  o.curword.text=''
 }
 function correcturAccent(o,k)
 {
  var arr=getSelectWord(o)
  var i=arr[0]
  var wrd=arr[1]
  if(!(wrd=findCorrecturWord(wrd+k)))return
  if(CHG)replaceWord(o,wrd,i)
 }
if(ON_OFF==0||NOV)return
var chr=String.fromCharCode(k)
var chr1=chr.toUpperCase()
if((chr==' '||chr=='\\')&&(MOD==3||MOD==0)){ESC=1;return}
if(ESC==1&&/[\/\'\?\~\.\`\-\^\#\(\+\*]/.test(chr)){ESC=0;return rmEsc(o)}
if(/[SFRXJDAEOWZ1234567890\/\'\?\~\.\`\-\^\#\(\+\*]/.test(chr1))viewViet(o,chr)
else if(/[CINT]/.test(chr1))correcturAccent(o,chr)
ESC=0
}

function uMU(){NOV=0;if(STATUS)wrtStat()}
var NOV=0,CODE,CHG=0
function notWord(cc){return("\ \r\n#,\\;.:-_()<>+-*/=?!\"§$%{}[]\'~|^°€ß²³\@\&´`0123456789".indexOf(cc)>=0)}
var VOW=new Array(
97,225,224,7843,227,7841,65,193,192,7842,195,7840,//a12
226,7845,7847,7849,7851,7853,194,7844,7846,7848,7850,7852,//a^24
259,7855,7857,7859,7861,7863,258,7854,7856,7858,7860,7862,//a(36
111,243,242,7887,245,7885,79,211,210,7886,213,7884,//o48
244,7889,7891,7893,7895,7897,212,7888,7890,7892,7894,7896,//o^60
417,7899,7901,7903,7905,7907,416,7898,7900,7902,7904,7906,//o+72
101,233,232,7867,7869,7865,69,201,200,7866,7868,7864,//e84
234,7871,7873,7875,7877,7879,202,7870,7872,7874,7876,7878,//e^96
-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,//108
117,250,249,7911,361,7909,85,218,217,7910,360,7908,//u120
-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,//132
432,7913,7915,7917,7919,7921,431,7912,7914,7916,7918,7920,//u+144
105,237,236,7881,297,7883,73,205,204,7880,296,7882,//i156
-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,//168
-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,//180
121,253,7923,7927,7929,7925,89,221,7922,7926,7928,7924,//y192
-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,//204
-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,//216
100,273,273,68,272,272//dd228
)
function vIdx(c)
{
for(var i=0;i<VOW.length;i++) if(c==VOW[i])return i
return -1
}
function UNI(str1,k)
{
var lenX=str1.length
var sX1,sX2,c1X,c2X,c3X,c4X,code,code1,first=1,idx1,idx2,keyx,vx1,vx2,vx3
var ACC="sfrxjSFRXJ12345/\'-\`?#~\.".indexOf(k)>=0
if(ACC)// erase accent
{
var keynr,kid
keynr=''+k
keynr=keynr.toLowerCase()
if(MOD==1||MOD==0)
{
 kid="_12345".indexOf(keynr)
 if(kid>0)keyx=kid
}
if(MOD==2||MOD==0)
{
 kid="_sfrxj".indexOf(keynr)
 if(kid>0)keyx=kid
}
if(MOD==3||MOD==0)
{
 kid="_'-?~.".indexOf(keynr)
 if(kid>0)keyx=kid
 else kid="_\/\`?#.".indexOf(keynr)
 if(kid>0)keyx=kid
}
var A=str1.split('')
var accent
for(var i=0;i<A.length;i++)
{
 var idx=vIdx(A[i].charCodeAt(0))
 accent=idx%6
 if(idx<0||idx>215||accent==keyx)continue
 if(accent>0)A[i]=String.fromCharCode(VOW[idx-accent])
}
str1=A.join('')
}

ACC=ACC||/[aAeE]/.test(k)
CODE=''
for(var i=lenX;i>=0;i--)
{
sX1=str1.substring(0,i-1)
sX2=str1.substring(i,lenX)
c1X=str1.substring(i-1,i);code2=c1X.charCodeAt(0)
c2X=str1.substring(i-2,i-1);code=c2X.charCodeAt(0)
c3X=str1.substring(i-3,i-2);code1=c3X.charCodeAt(0)
c4X=(c3X+c2X).toLowerCase()
vx1=vIdx(code2)
vx2=vIdx(code)
vx3=vIdx(code1)
idx1=vIdx(c1X.charCodeAt(0))
idx2=vIdx(c2X.charCodeAt(0))
var s1=str1.toLowerCase(),s2=s1.substring(0,2),s3=s1.substring(0,3)
/*assistance*/
if(!k&&(code1==432||code1==431)&&(code==417||code==416))//Z+0 and u'o'->undo
{
 c3X=(code1==432)?'u':'U';c2X=(code==417)?'o':'O'
 CODE=1
 return sX1.substring(0,sX1.length-2)+c3X+c2X+c1X+sX2
}
if(((vx2>71&&vx2<96)||(vx2>=0&&vx2<36))&&vx1>35&&vx1<72&&accent&&accent!=0)return str1 //eo,ao
if(k&&/[aA]/.test(k)&&c2X&&vx2>=36&&vx2<48&&(vx1>=0&&vx1<12||vx1>=24&&vx1<36))return str1//oa+a
if("frxFRX234-\`?#~".indexOf(k)>=0&&/.c|.ch|.p|.t/.test(s1)) return str1// huye^`n+ho²i+nga~ 
if(k&&/[6oO\^]/.test(k))// mu~ o
{
 if(c2X&&vx2>=36&&vx2<48&&(vx1>=0&&vx1<12||vx1>=24&&vx1<36)) return str1//oa oa(
 if(c2X&&/[\u01B0\u01AF]/.test(c2X)&&vx1>=60&&vx1<72)//u+o+ u+o+' u+o+`
  {
   c2X=(c2X=='\u01B0')?'u':'U'
   c1X=String.fromCharCode(VOW[idx1-12])
   CHG=1;CODE=1
   return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
  }
}
if(k&&/[6aAeE\^]/.test(k))//mu~ a,e,o
{
 if((vx2>=0&&vx2<12||vx2>=24&&vx2<36)&&(/i|I/.test(c1X)||/.nh/.test(s1)||/.ch/.test(s1)))return str1//ai,a'i..
 if(c2X&&(vx2>=108&&vx2<144)&&((/a|A/.test(c1X)&&!/e|E/.test(k))||(/e|E/.test(c1X)&&!(/a|A/.test(k)))))//u'a,u'e,..
  {
   keyx=idx2%6
   li=parseInt(idx2/6);c2X=(li==18||li==22)?'u':'U' 
   c1X=String.fromCharCode(VOW[idx1+12+keyx])
   CHG=1;CODE=1
   return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
  }
 if(c3X&&!/u|U/.test(c3X)&&vx3>=108&&vx3<120&&/y|Y/.test(c2X)&&/e|E/.test(c1X))//u'ye,..
 {
   var idx3=vIdx(c3X.charCodeAt(0))
   keyx=idx3%6
   c3X=String.fromCharCode(VOW[idx3-keyx])
   c1X=String.fromCharCode(VOW[idx1+12+keyx])
   CHG=1;CODE=1
   return sX1.substring(0,sX1.length-2)+c3X+c2X+c1X+sX2
 }
 if(c2X&&!/[iIyY]/.test(c2X)&&((vx2>=144&&vx2<156)||(vx2>=180&&vx2<192))&&/e|E/.test(c1X)&&!/a|A/.test(k))//i'e,..y'e
 {
   keyx=idx2%6
   c2X=String.fromCharCode(VOW[idx2-keyx])
   c1X=String.fromCharCode(VOW[idx1+12+keyx])
   CHG=1;CODE=1
   return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
}
// da^u' tra(ng
if(k&&/[wW78\+\*\(]/.test(k)&&((/w|W/.test(k)&&MOD==2)||(/7|8/.test(k)&&MOD==1)||(/\+|\*|\(/.test(k)&&MOD>=3)||MOD==0))
{
 if(
   (vx2>=0&&vx2<24&&/i|I/.test(c1X))
   ||((/.nh/.test(s1)||/.ch/.test(s1))&&!/[\u0103\u0102\u1EAF\u1EAE\u1EB1\u1EB0\u1EB3\u1EB2\u1EB5\u1EB4\u1EB7\u1EB6]/.test(s1))
   ||(!c3X&&vx2>=36&&vx2<60&&/c|C/.test(c1X))
   ||(c3X&&!/u|U/.test(c3X)&&vx2>=36&&vx2<60&&/c|C/.test(c1X))
   ||(vx1>=180&&vx1<192&&vx2>=108&&vx2<144)
   ||(vx1>=108&&vx1<120&&vx2>=48&&vx2<72)
   ||(vx1>=108&&vx1<120&&vx2>=180&&vx2<192)
   )return str1//1=ai,a'i,a^i;2=.nh,.ch;3=oc;4=.oc,.o^c;5=uy;6=o^u,o+u;7=yu,y'u..
 var idx3=vIdx(s1.charCodeAt(3))
 if(s2=='qu'||s1=='huo'||s1=='thuo'||(s1.length==4&&s3=='thu'&&idx3>=48&&idx3<60)){}
 else if(c4X=='uo')//uon
 {
  c3X=(c3X=='u')?432:431;c2X=(c2X=='o')?417:416
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-2)+String.fromCharCode(c3X)+String.fromCharCode(c2X)+c1X+sX2
 } 
 else if(c2X&&/u|U/.test(c2X)&&vx1>=36&&vx1<48)//uo' uo` uo? ...
 {
  c2X=(c2X=='u')?'\u01B0':'\u01AF'//u+:U+
  c1X=String.fromCharCode(VOW[idx1+24])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
 else if(c2X&&/u|U/.test(c2X)&&vx1>=48&&vx1<60)//uo^' uo^` uo^? ...
 {
  c2X=(c2X=='u')?'\u01B0':'\u01AF'//u+:U+
  c1X=String.fromCharCode(VOW[idx1+12])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
 else if(c2X&&/u|U/.test(c2X)&&vx1>=0&&vx1<12)//ua
 {
  keyx=vx1%6
  c1X=String.fromCharCode(VOW[idx1-keyx])
  c2X=String.fromCharCode(VOW[idx2+24+keyx])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
 else if(c2X&&/u|U/.test(c2X)&&vx1>=12&&vx1<24)//ua^' ua^` ua^..
 {
  keyx=idx1%6
  c1X=String.fromCharCode(VOW[idx1-12-keyx])
  c2X=String.fromCharCode(VOW[idx2+24+keyx])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
 else if(c2X&&/u|U/.test(c2X)&&vx1>=84&&vx1<96)//ue^' ue^` ue^
 {
  keyx=idx1%6
  c1X=String.fromCharCode(VOW[idx1-12-keyx])
  c2X=String.fromCharCode(VOW[idx2+24+keyx])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
 else if(c2X&&vx2>=0&&vx2<12&&/u|U|y|Y/.test(c1X))//au,ay
 {
  c2X=String.fromCharCode(VOW[idx2+12])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
 else if(c2X&&vx2>=12&&vx2<24&&/u|U|y|Y/.test(c1X))//a^u,a^y
 {
  c2X=String.fromCharCode(VOW[idx2-12])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2+k
 }
 else if(c2X&&vx2>=36&&vx2<48&&vx1>=0&&vx1<24)//oa, o'a oa'
 {
  keyx=idx2%6;//accent
  c2X=String.fromCharCode(VOW[idx2-keyx])
  if(idx1<12)c1X=String.fromCharCode(VOW[idx1+24+keyx])
  else c1X=String.fromCharCode(VOW[idx1+12+keyx])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2
 }
 else if(c2X&&vx2>=36&&vx2<48&&vx1>=24&&vx1<36)//oa(, oa('
 {
  c1X=String.fromCharCode(VOW[idx1-24])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2+k
 }
 else if(c2X&&vx2>=132&&vx2<144&&vx1>=0&&vx1<12)//u+a, u+'a
 {
  c2X=String.fromCharCode(VOW[idx2-24])
  CHG=1;CODE=1
  return sX1.substring(0,sX1.length-1)+c2X+c1X+sX2+k
 }
 if(/[aAeE]/.test(c1X)&&(i<lenX||c4X=='qu')){}//qua,que
 else if(c2X&&vx2>35&&vx2<48&&/u|U/.test(c1X)>=0)continue//ou by no'u'
 else if(c2X&&vx2>=108&&vx2<120&&/[uUaA]/.test(c1X))continue//u u' u`u? u~ u. uu, ua
}
if(c4X=='gi'&&/[aAuU]/.test(c1X)){}
else if(c2X&&/o|O/.test(c2X)&&/o|O/.test(c1X)){}
else if(c2X&&/i|I/.test(c2X)&&/[aAuU]/.test(c1X))continue//ia,iu
else if(NEWV==1&&ACC&&c2X&&((/[eEyY]/.test(c1X)&&/[oOuU]/.test(c2X))||(/[aA]/.test(c1X)&&/[o|O]/.test(c2X)))){}//oa,oe,uyNEWV
else if((/[aAeEiIyY]/.test(c1X)&&(i<lenX||c4X=='qu'))||(c2X&&/i|I/.test(c2X))){}//--qua,que,qui,quy,ia,i..
else if(ACC&&/o|O/.test(c1X)&&c2X&&/u|U/.test(c2X)){}//uo and Accent
else if(ACC&&/e|E/.test(c1X)&&c2X&&/y|Y/.test(c2X)){}// ye and ACC
else if(ACC&&first&&/[aAeEiIoOuUyY]/.test(c1X)&&!((/a|A/.test(c1X)||/e|E/.test(c1X))&&i<lenX)){first=0;continue}
/* end assist*/
CODE=chgViCode(c1X.charCodeAt(0),k)
if(CODE)break
if((!CODE||CODE<0)&&!first){ACC=0;first=1;i=lenX+1;continue}
}
if(!CODE)return str1+k
if(isNaN(CODE)){str1=sX1+CODE+sX2+k;NOV=1}
else str1=sX1+String.fromCharCode(CODE)+sX2
return str1
}

/* UNICODE */
function toViet(str1,k)
{
if(NOV||!str1)return str1
if(SPELL==1&&notviet(str1))return str1
var c2=''+k
var sx=''
//except
if(MOD!=1&&MOD!=0&&(k==1||k==2||k==6))return str1
sx=UNI(str1,c2)
//***VIQR
if((MOD==3||MOD==0)&&(!CODE&&(c2!='d'||c2!='D')))sx=str1+c2
if(/[zZ0]/.test(c2)) sx=UNIZZ(str1,c2)
if(CODE)CHG=1
if(sx!='')str1=sx
return str1
}

function UNIZZ(str1,k)
{
 function eraseAccent(str1)
 {
  var code,idx,nid
  var grp,li,accent
  var A=str1.split('')
  for(var time=0;time<3;time++)
  {
   var found=0
   for(var i=0;i<A.length;i++)
   {
    code=A[i].charCodeAt(0)
    idx=vIdx(code)
    grp=idx%36,li=grp%12,accent=li%6
    nid=-1
    if(idx&&idx<192&&VOW[idx]>0)
    {
     if(time==0&&accent)//accent
       nid=parseInt(idx/36)*36+parseInt(grp/12)*12+parseInt(li/6)*6
     else if(time==1)//without '-?~.
       nid=parseInt(idx/36)*36+parseInt(li/6)*6
     if(nid!=-1&&nid!=idx)
      {A[i]=String.fromCharCode(VOW[nid]);found=1;if(accent)break}
    }
    else if(time==2)
    {
     if(code==273){A[i]='d';found=1;break}
     else if(code==272){A[i]='D';found=1;break}
    }
   }
  if(found)return A.join('')
 }
 return str1
 }
if((MOD==1&&k!=0)||(MOD==2&&k!='z'&&k!='Z'))return''
var str2=eraseAccent(str1)
if(str2!=str1){CHG=1;return str2}
NOV=0
return str1+k
}

function chgTypeKey(idx,k)
{
if((MOD==1||MOD==0)&&/[0123456789]/.test(k))return k
var k=k.toUpperCase()
if(MOD==2||MOD==0)
{
 if(k=='D')return 9
 if(k=='S')return 1
 if(k=='F')return 2
 if(k=='R')return 3
 if(k=='X')return 4
 if(k=='J')return 5
 if(k=='W')return 7
 if((k=='A'&&idx<36)||(k=='O'&&idx>=36&&idx<72)||(k=='E'&&idx>=72&&idx<108))return 6
 if(k=='Z')return 0
}
if(MOD==3||MOD==0)
{
 if(k=='D')return 9
 if(k=='/'||k=='\''||k==1)return 1
 if(k=='-'||k=='\`'||k==2)return 2
 if(k=='?')return 3
 if(k=='\~'||k=='\#')return 4
 if(k=='.')return 5
 if(k=='^')return 6
 if(k=='+'||k=='*'||k=='(')return 7
}
}

function chgViCode(oldcode,k)
{
var idx=vIdx(oldcode)
k=chgTypeKey(idx,k)
if(!k||idx<0||(k!=9&&idx>191))return
var res
var grp=idx%36
var li=grp%12
var nid
if(k==6)nid=parseInt(idx/36)*36+12+li
else if(k==7||k==8)nid=parseInt(idx/36)*36+24+li
else if(k==1)nid=parseInt(idx/6)*6+1
else if(k==2)nid=parseInt(idx/6)*6+2
else if(k==3)nid=parseInt(idx/6)*6+3
else if(k==4)nid=parseInt(idx/6)*6+4
else if(k==5)nid=parseInt(idx/6)*6+5
else if(k==9&&idx>191)nid=idx+1
else return
res=VOW[nid]
if(res<0)return
if(res!=oldcode)return res
//res==oldcode
if(k==9&&idx>191)nid=idx-1
else if(k>=6)nid=parseInt(idx/36)*36+li
else if(k>=1)nid=parseInt(idx/6)*6
return String.fromCharCode(VOW[nid])
}

function notviet(wrd)
{
wrd=wrd.toLowerCase()
// ngoai. le^.
var yes="giac|giam|gian|giao|giap|giat|giay|giua|giuo|ngoam|ngoao|ngoeo|ngua|ngup|quam|quen|quet|uyech"
var reg=eval("/"+yes+"/")
var res=reg.test(wrd)
if(res)return''
var no="f|j|w|z|aa|ab|ad|ae|ag|ah|ak|al|aq|ar|as|av|ax|bb|bc|bd|bg|bh|bk|bl|bm|bn|bp|bq|br|bs|bt|bv|bx|by|cb|cc|cd|ce|cg|ci|ck|cl|cm|cn|cp|cq|cr|cs|ct|cv|cx|cy|db|dc|dg|dh|dk|dl|dm|dn|dp|dq|dr|ds|dt|dv|dx|dy|ea|eb|ed|ee|eg|eh|ei|ek|el|eq|er|es|ev|ex|ey|gb|gc|gd|gg|gk|gl|gm|gn|gp|gq|gr|gs|gt|gv|gx|gy|hb|hc|hd|hg|hh|hk|hl|hm|hn|hp|hq|hr|hs|ht|hv|hx|ib|id|ig|ih|ii|ik|il|iq|ir|is|iv|ix|iy|kb|kc|kd|kg|kk|kl|km|kn|kp|kq|kr|ks|kt|kv|kx|khy|lb|lc|ld|lg|lh|lk|ll|lm|ln|lp|lq|lr|ls|lt|lv|lx|mb|mc|md|mg|mh|mk|ml|mm|mn|mp|mq|mr|ms|mt|mv|mx|nb|nc|nd|nk|nl|nm|nn|np|nq|nr|ns|nt|nv|nx|ob|od|og|oh|ok|ol|oo|oq|or|os|ov|ox|oy|pa|pb|pc|pd|pe|pg|pi|pk|pl|pm|pn|po|pp|pq|pr|ps|pt|pu|pv|px|py|phy|qa|qb|qc|qd|qe|qg|qh|qi|qk|ql|qm|qn|qo|qp|qq|qr|qs|qt|qv|qx|qy|rb|rc|rd|rg|rh|rk|rl|rm|rn|rp|rq|rr|rs|rt|rv|rx|ry|sb|sc|sd|sg|sh|sk|sl|sm|sn|sp|sq|sr|ss|st|sv|sx|tb|tc|td|tg|tk|tl|tm|tn|tp|tq|ts|tt|tv|tx|ub|ud|ug|uh|uk|ul|uq|ur|us|uv|ux|vb|vc|vd|vg|vh|vk|vl|vm|vn|vp|vq|vr|vs|vt|vv|vx|xb|xc|xd|xg|xh|xk|xl|xm|xn|xp|xq|xr|xs|xt|xv|xx|xy|yb|yd|yg|yh|yi|yk|yl|ym|yo|yq|yr|ys|yv|yx|yy|aca|aco|acu|aia|aic|aie|aim|ain|aio|aip|ait|aiu|ama|ame|ami|amo|amu|amy|ana|ane|ani|ano|anu|any|aoa|aoc|aoe|aoi|aom|aon|aop|aot|aou|apa|ape|aph|api|apo|apu|ata|ate|ath|ati|ato|atr|atu|aty|aua|auc|aue|aui|aum|aun|auo|aup|aut|auu|auy|aya|aye|ayn|ayt|ayu|bec|bem|bio|boa|boe|bom|bou|bue|chy|coa|coe|cou|cue|cuy|dio|doe|dou|duu|eca|eco|ecu|ema|eme|emi|emo|emu|emy|ena|ene|eni|eno|enu|eny|eoa|eoc|eoe|eoi|eom|eon|eop|eot|eou|epa|epe|eph|epi|epo|epu|eta|ete|eth|eti|eto|etr|etu|ety|eua|euc|eue|eui|eum|eun|euo|eup|eut|euu|euy|gec|geo|get|geu|gha|gho|ghu|ghy|gic|gip|git|goe|gou|gua|gue|gum|gup|guu|hio|hou|hya|hye|hyn|hyt|hyu|iac|iam|ian|iao|iap|iat|iay|ica|ico|icu|ima|ime|imi|imo|imu|imy|ina|ine|ing|ini|ino|inu|iny|ioa|ioe|iou|ipa|ipe|iph|ipi|ipo|ipu|ita|ite|ith|iti|ito|itr|itu|ity|iua|iue|iuo|iuu|iuy|kac|kai|kam|kan|kao|kap|kat|kau|kay|kea|key|khy|kio|koa|koc|koe|koi|kom|kon|kop|kot|kou|kua|kuc|kue|kui|kum|kun|kuo|kup|kut|kuu|kuy|kya|kye|kyn|kyt|kyu|lio|lou|lue|lya|lye|lyn|lyt|lyu|mio|mip|miu|moa|moe|mou|mue|mup|muy|mya|mye|myn|myt|myu|ngi|nge|nhy|nim|nio|nip|noe|nue|nuy|nya|nye|nyn|nyt|nyu|oap|oeo|oao|oau|oca|och|oco|ocu|oec|oem|oep|oeu|oia|oic|oie|oim|oin|oio|oip|oit|oiu|oma|ome|omi|omo|omu|omy|ona|one|onh|oni|ono|onu|ony|opa|ope|oph|opi|opo|opu|ota|ote|oth|oti|oto|otr|otu|oty|oua|ouc|oue|oui|oum|oun|ouo|oup|out|ouu|ouy|quc|qum|qun|qup|qut|quu|rec|rio|roa|roe|rou|rue|sec|sia|sic|sin|sio|sip|sit|siu|soe|sop|sou|sue|sum|sup|sya|sye|syn|syt|syu|thy|tio|tou|tya|tye|tyn|tyt|tyu|uam|uca|uch|uco|ucu|uec|uem|uen|uep|uet|ueu|uia|uic|uie|uim|uin|uio|uip|uma|ume|umi|umo|umu|umy|una|une|unh|uni|uno|unu|uny|uoa|uoe|upa|upe|uph|upi|upo|upu|uta|ute|uth|uti|uto|utr|utu|uty|uua|uuc|uue|uui|uum|uun|uuo|uup|uut|uuu|uuy|vec|vep|vic|vim|vio|vip|voa|voe|vou|vue|vum|vup|vuu|vuy|vya|vye|vyn|vyt|vyu|xim|xio|xip|xou|xuu|yac|yai|yam|yan|yao|yap|yat|yau|yay|yec|yem|yeo|yep|yna|yne|yng|yni|yno|ynu|yny|yta|yte|yth|yti|yto|ytr|ytu|yty|yua|yuc|yue|yui|yum|yun|yuo|yup|yut|yuu|yuy"
reg=eval("/"+no+"/")
res=reg.test(wrd)
return res
}

function QBsetCookie()
{
var now=new Date()
var exp=new Date(now.getTime()+1000*60*60*24*365)
exp=exp.toGMTString()
document.cookie='VTYPMOD='+MOD+';expires='+exp
document.cookie='VSPELL='+SPELL+';expires='+exp
document.cookie='VACCENT='+NEWV+';expires='+exp
document.cookie='VONOFF='+ON_OFF+';expires='+exp
}

function QBgetCookie()
{
var ck=document.cookie
var res=/VSPELL/.test(ck)
if(!res){QBsetCookie();return}
var ckA=ck.split(';')
var p
for(var i=0;i<ckA.length;i++)
{
 p=ckA[i].split('=')
 if(p[0]=='VSPELL')SPELL=p[1]
 else if(p[0]=='VACCENT')NEWV=p[1]
 else if(p[0]=='VONOFF')ON_OFF=p[1]
 else if(p[0]=='VTYPMOD')MOD=p[1]
}
}

QBgetCookie()

function wrtStat()
{
var s=''
if(ON_OFF==0)s+='NONE [F8]'
else if(MOD==0)s+='AUTO [F8]'
else if(MOD==1)s+='VNI [F8]'
else if(MOD==2)s+='TELEX [F8]'
else if(MOD==3)s+='VIQR [F8]'
s+=(SPELL==1)?'++SPELLING [F9]':'++noSPELLING [F9]'
s+=(NEWV==1)?'++newAccent [F7]':'++oldAccent [F7]'
s+="++On/Off [F12] (C)Vietdev R10.1(08/2004)"
window.status=s
QBsetCookie()
}
//e.g. addIframe('id1','id2',...)//id1=id of frame
function addIframe()
{
var oA=document.getElementsByTagName('iframe')
var i,j
for(j=0;j<arguments.length;j++)
{
 i=0
 while(oA[i])
 {
  if(oA[i].id==arguments[j])
  {
   setTimeout("iEvt('"+oA[i].id+"')",200);break}
   i++
  }
 }
}

function userInit()
{
if(FID) setTimeout("iEvt('"+FID+"')",200)
else tEvt(TXT)
}
