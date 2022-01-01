<?


	//===================================================
	// FUNCTION ADMIN CP
	//===================================================
function timeserver($str,$time) {
 	$timezone  = +6;
 	return gmdate($str, $time + 3600*($timezone+date("I"))); 
	}
	function timex($str) {
 	$timezone  = +6;
 	return gmdate($str, time() + 3600*($timezone+date("I"))); 
	}
function ip() {
  	 if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
   	$ip = getenv("HTTP_CLIENT_IP");
   	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
   	$ip = getenv("HTTP_X_FORWARDED_FOR");
   	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
   	$ip = getenv("REMOTE_ADDR");
   	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
   	$ip = $_SERVER['REMOTE_ADDR'];
   	else   $ip = "unknown";
   	return($ip);
}
function permission($input){
	if($input=="0"){ echo "Banned"; }
	if($input=="1"){ echo "Member"; }
	if($input=="2"){ echo "Mod"; }
    if($input=="3"){ echo "Admin"; }
	if($input=="4"){ echo "VIP"; }
}
	//===================================================
	// FUNCTION REDIRECT
	//===================================================

function redirect($url, $message="", $delay=0) { 
	/* redirects to a new URL using meta tags */
	echo "<meta http-equiv='refresh' content='$delay;URL=$url'; charset=utf-8>"; 
	if (!empty($message)) echo ""; 
	exit; 
	} 


	//===================================================
	// FUNCTION SEND MAIL
	//===================================================

function send_email($from,$to,$subject,$message) {
	$mailheaders = "From: $from\n";
	$mailheaders .= "Reply-To:$from\n";
	$subject=stripslashes($subject);
	$message=stripslashes($message);
	$message .= "\nXin cam on da su dung dich vu cua chung toi\n";
	$message .= "Ban quan tri http://ctn.com.vn";
	@mail ($to,$subject,$message,$mailheaders);
}

	//===================================================
	// FUNCTION TRANSFORM DATE
	//===================================================

function transform_date ($date) {
	$date += 3600*11;
	return strftime("%d.%m.%Y", $date);
}
	//===================================================
	// FUNCTION TRANSFORM TIME
	//===================================================

function transform_time ($time) {
	$time += 3600*11;
	return strftime("%r", $time);
}
	//===================================================
	// Begin check text
	//===================================================

function filter_char($text) {
	$content = str_replace("ð","&#273;",$text);
	$content = str_replace("õ","&#417;",$content);
	return $content;
}

function replace($text2)
{
    $text2 = str_replace("'","\'",$text2);
    $text2 = str_replace('"','\"',$text2);
return $text2;
}


function cut_string($str,$len,$more){
   if ($str=="" || $str==NULL) return $str;
   if (is_array($str)) return $str;
   $str = trim($str);
   if (strlen($str) <= $len) return $str;
   $str = substr($str,0,$len);
   if ($str != "") {
        if (!substr_count($str," ")) {
                  if ($more) $str .= " ...";
                return $str;
        }
        while(strlen($str) && ($str[strlen($str)-1] != " ")) {
                $str = substr($str,0,-1);
        }
        $str = substr($str,0,-1);
        if ($more) $str .= " ...";
        }
        return $str;
}

	//===================================================
	// End text
	//===================================================

function get_extension($type) {
	if ($type == "image/pjpeg") {
		return ".jpg";
	} elseif ($type == "image/bmp") {
		return ".bmp";
	} elseif ($type == "image/gif") {
		return ".gif";
	} elseif ($type == "application/x-shockwave-flash") {
		return ".swf";
	} else {
		return 0;
	}
}

	//===================================================
	// Other
	//===================================================


function valid_email($email) {
	if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-z]{2,3}$",$email) && $email != "") {
		return false;
	} else {
		return true;
	}
}

	//===================================================
	// FORMAT BYTES
	//===================================================

function format_bytes($size)
{
	if($size>(1024*1024))
		return (round($size/(1024*1024),1)." MB");
	if($size>1024)
		return (round($size/1024,1)." KBytes");
	return $size." Bytes";
}

	//===================================================
	// FORMAT NUMBER
	//===================================================

function format_number($p_price){
	$p_price .= "";
	$v_size = strlen($p_price);
	$reval_str="";
	$count =0;
	for ($i=strlen($p_price)-1;$i>=0;$i--){
		$reval_str .= substr($p_price,$i,1);
		$count++;
		if (($i>0)&&($count%3==0)) $reval_str .= ".";
	}
	return strrev($reval_str);
}

	//===================================================
	// execute SQL statement
	//===================================================

function execSQL($stsql){

	$rs =mysql_query($stsql) or die("<a href='/'>ERROR</a>"."<br>".$stsql);

	return $rs;

}

function recordset($sql){

	if($sql){

		$rs = mysql_query($sql) or die("<a href='/'>ERROR</a>");

		$row =  mysql_fetch_array($rs);	

		return $row;

	}

}
	//===================================================
	// FUNCTION USER VISIT
	//===================================================
function user_visit(){

global $_SERVER;

$url=$_SERVER['HTTP_REFERER'];

$host=$_SERVER['HTTP_HOST'];

$path=$_SERVER['REQUEST_URI'];

$docurl=$host."".$path;

$lienket="$docurl";

$url=str_replace("http://","",$url);

$url=str_replace("www.","",$url);

$ipmay = getenv(REMOTE_ADDR);

list($url)=explode("/",$url);

$sokytu=strlen($url);

$hosttruycap = strtolower($url);
$time=time();

if ($hosttruycap != '')

{

$result=@mysql_query("SELECT * FROM  where hostname='$url'") or die(mysql_error());

$row=@mysql_fetch_array($result);

 $count = $row["count"];

 $new_count = $count+1;

$check_link=@mysql_num_rows($result);

if($check_link!=0){

$updatelink=@mysql_query("Update  set count='$new_count' where hostname='$url'");


}else{

$inserlink=@mysql_query("insert  (id,ip,hostname,count,date) values ('','$ipmay','$url','1','$time')") or die(mysql_error());

	}


}






}
?>