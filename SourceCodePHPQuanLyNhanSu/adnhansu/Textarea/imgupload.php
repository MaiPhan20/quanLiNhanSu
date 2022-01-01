<?
if (isset($HTTP_GET_VARS["upload"]))
	$upload=$HTTP_GET_VARS["upload"];
else $upload="";

switch($upload) {
default: 
include "config.inc.php";
echo "
<HTML id=dlgImage>

<head>
<title>Upload</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<style>
  html, body, button, div, input, select, fieldset { font-family: MS Shell Dlg; font-size: 8pt;  position: absolute; };
</style>

</head>

<body style=\"background: threedface; color: windowtext;\" scroll=no>
<p>&nbsp;</p>
<FIELDSET id=fldSpacing style=\"left: 1.2em; top: 0.7em; width: 31.3em; height: 6.6em;\">
<LEGEND><B>Upload File</B></LEGEND>
</FIELDSET>
<FIELDSET id=fldSpacing style=\"left: 1.2em; top: 7.9em; width: 31.3em; height: 8.6em;\">
<LEGEND><B>Chú ý:</B></font></LEGEND>
</FIELDSET>
<div style=\"left: 0.2em; top: 9.9em; width: 31.3em; height: 8.6em;\">
<ul type=\"square\">
<li>File phải có đuôi <b>";
		if (($extensions == "") or ($extensions == " ") or ($ext_count == "0") or ($ext_count == "") or ($limit_ext != "yes") or ($limit_ext == "")) {
           echo "any extension";
        } else {
			$ext_count2 = $ext_count+1;
			for($counter=0; $counter<$ext_count; $counter++) {
				echo "&nbsp; $extensions[$counter]";
			}
        }
        if (($limit_size == "") or ($size_limit != "yes")) {
				$limit_size = "any size";
        } else {
            $limit_size .= " bytes";
        }
        echo"</b></li>
<li>Dung lượng tối đa của file $limit_size</li>
<li>Không có khoảng trắng trong file</li>
<li>Tên file không chứa các kí tự đặc biệt (/,*,&,^,%,!,?\,etc)<BR>
</li>
</ul>
</div>
<form method=\"POST\" action=\"$PHP_SELF?upload=doupload\" enctype=\"multipart/form-data\">
<p align=\"center\">
<input type=file name=file size=30 style=\"left: 1.8em;  top: 2.2em;  width: 30em; height: 2.1294em; ime-mode: disabled;\" tabIndex=10><br>
<br>
<button name=\"submit\" type=\"submit\" style=\"left: 12.8em;  top: 4.7em;  width: 7em; height: 2.1294em; ime-mode: disabled;\" tabIndex=10>Upload</button>
</p>
</form>
</body>

</html>";
break;
case "doupload":
include "config.inc.php";
$endresult = "<BR><BR><font size=\"2\"><IMG SRC=\"images/success.gif\" WIDTH=\"25\" HEIGHT=\"24\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>File đã được upload thành công</B></font>
";
if ($file_name == "") {
	$endresult = "<BR><BR><font size=\"2\"><IMG SRC=\"images/error.gif\" WIDTH=\"25\" HEIGHT=\"24\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>Lỗi: Không có file nào được chọn</B></font>";
}
// Cho phep upload nhung file da ton tai
else{
	if(file_exists("$absolute_path/$file_name")) {
		$endresult = "<font size=\"2\"><IMG SRC=\"images/error.gif\" WIDTH=\"25\" HEIGHT=\"24\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>Lỗi: File này đã có</B></font>";
	}
	else {
		if (($size_limit == "yes") && ($limit_size < $file_size)) {
		$endresult = "<BR><BR><font size=\"2\"><IMG SRC=\"images/error.gif\" WIDTH=\"25\" HEIGHT=\"24\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>Lỗi: Dung lượng size quá lớn</B></font>";
		} 
		else {
			$ext = strrchr($file_name,'.');
			if (($limit_ext == "yes") && (!in_array($ext,$extensions))) {
				$endresult = "<BR><BR><font size=\"2\"><IMG SRC=\"images/error.gif\" WIDTH=\"25\" HEIGHT=\"24\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>Lỗi: File dạng này không upload được</B></font>";
			}
			else {
				@copy($file, "$absolute_path/$file_name") or $endresult = "<font size=\"2\"><IMG SRC=\"images/error.gif\" WIDTH=\"25\" HEIGHT=\"24\" BORDER=\"0\" ALIGN=\"absmiddle\">&nbsp;<B>Lỗi: Không thể upload file lên Server.</B></font>";
			}
		}
	}
}
echo "
<HTML id=dlgImage>

<head>
<title>Upload</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<style>
  html, body, button, div, input, select, fieldset { font-family: MS Shell Dlg; font-size: 8pt; position: absolute; };
</style>
</head>

<body style=\"background: threedface; color: windowtext;\" scroll=no>
<center> $endresult </center>
<BUTTON style=\"left: 13.1em;  top: 6.2em;  width: 7em; height: 2.1294em; ime-mode: disabled;\"  type=reset onClick=\"window.close();\">Close window</BUTTON><br>	</td>
</body>

</html>";
break;
}
?>
