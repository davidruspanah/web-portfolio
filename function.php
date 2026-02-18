<?php
if (!defined('BASE_URL')) {
    define("BASE_URL", "http://localhost/buanasarana-professional.com/");
}

//require_once("inc/db_conx.php");
$p = "home";
if(isset($_GET)){
	foreach ($_GET as $key => $value) {
		$value = trim($value);
		if($value!=""){
			${$key}=$value;
		}
	}
}

function getContent(){
	global $p;
	global $id;
	global $did;
	global $partnerid;
	$p=strtolower($p);

	$p_file = "pages/".$p.".php";

	if(is_file($p_file)){
		require_once($p_file);
	}
	else{
		require_once("pages/error.php");

	}
}

function deleteFile($d)
	{
		$sql = "SELECT * from file WHERE id={$d}";
	      $stmt = $pdo->prepare($sql);
	      $stmt->execute();

	      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	        $file_path=$row['file_path'];
	      }

	      $sql = "DELETE FROM file WHERE id={$d};";
	      $stmt = $pdo->prepare($sql);
	      if($stmt->execute()){
	      	if(isset($file_path)&&$file_path!=""){
		        if(file_exists ($file_path)&&$file_path!=""){
		          unlink($file_path);
		        }
		    }
	       	return true;
		  }else{
		    return false;
		  }
	}
// function resize($name,$filename,$new_w,$new_h){
// 	$system=explode('.',$name);
// 	if (preg_match('/jpg|jpeg/',$system[1])){
// 		$src_img=imagecreatefromjpeg($name);
// 	}
// 	if (preg_match('/png/',$system[1])){
// 		$src_img=imagecreatefrompng($name);
// 	}
//
// 	$old_x=imageSX($src_img);
// 	$old_y=imageSY($src_img);
//
// 	if ($old_x > $old_y) {
// 		$thumb_w=$new_w;
// 		$thumb_h=$old_y*($new_h/$old_x);
// 	}
// 	if ($old_x < $old_y) {
// 		$thumb_w=$old_x*($new_w/$old_y);
// 		$thumb_h=$new_h;
// 	}
// 	if ($old_x == $old_y) {
// 		$thumb_w=$new_w;
// 		$thumb_h=$new_h;
// 	}
//
// 	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
// 	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
//
// 	if (preg_match("/png/",$system[1]))
// 	{
// 		imagepng($dst_img,$filename);
// 	} else {
// 		imagejpeg($dst_img,$filename);
// 	}
// 	imagedestroy($dst_img);
// 	imagedestroy($src_img);
// }



function createthumb($name,$filename,$thumb_width){
	$system=explode('.',$name);
	if (preg_match('/jpg|jpeg/',strtolower($system[1]))){
		$src_img=imagecreatefromjpeg($name);
	}
	if (preg_match('/png/',strtolower($system[1]))){
		$src_img=imagecreatefrompng($name);
	}

	$width=imageSX($src_img);
	$height=imageSY($src_img);
	$x=0;
	$y=0;


	if($width<$thumb_width||$height<$thumb_width){
		$dst_img=ImageCreateTrueColor($thumb_width,$thumb_width);
		$bgcolor = imagecolorallocate($dst_img, 255,255, 255); // red
		imagefill($dst_img, 0, 0, $bgcolor);
		$begX=$thumb_width/2-($width/2);
		$begY=$thumb_width/2-($height/2);
			imagecopyresampled($dst_img,$src_img,$begX,$begY,$x,$y,$width,$height,$width,$height);

	}else{


		if ($width > $height) {

					$ratio = ($width/$thumb_width);
					$begX=0;
					$begY=($thumb_width/2)-(($height/$ratio)/2);

					$destW= $width/$ratio;
					$destH=$height/$ratio;


	    } else {

					$ratio = ($height/$thumb_width);

				  $begY=0;
					$begX=($thumb_width/2)-(($width/$ratio)/2);

					$destW= $width/$ratio;
					$destH=$height/$ratio;

	    }
		$dst_img=ImageCreateTrueColor($thumb_width,$thumb_width);
		$bgcolor = imagecolorallocate($dst_img, 255,255, 255); // red
		imagefill($dst_img, 0, 0, $bgcolor);


		imagecopyresampled($dst_img,$src_img,$begX,$begY,0,0,$destW,$destH,$width,$height);
	}


	if (preg_match("/png/",$system[1]))
	{
		imagepng($dst_img,$filename);
	} else {
		imagejpeg($dst_img,$filename);
	}
	imagedestroy($dst_img);
	imagedestroy($src_img);
}


function createthumbcustom($name,$filename,$thumb_width,$thumb_height){
	$system=explode('.',$name);
	if (preg_match('/jpg|jpeg/',strtolower($system[1]))){
		$src_img=imagecreatefromjpeg($name);
	}
	if (preg_match('/png/',strtolower($system[1]))){
		$src_img=imagecreatefrompng($name);
	}
	$width=imageSX($src_img);
	$height=imageSY($src_img);
	$x=0;
	$y=0;

	if($width<$thumb_width||$height<$thumb_height){
		$dst_img=ImageCreateTrueColor($thumb_width,$thumb_height);
		$bgcolor = imagecolorallocate($dst_img, 255,255, 255); // red
		imagefill($dst_img, 0, 0, $bgcolor);
		$begX=$thumb_width/2-($width/2);
		$begY=$thumb_height/2-($height/2);
			imagecopyresampled($dst_img,$src_img,$begX,$begY,$x,$y,$width,$height,$width,$height);
	}else{
		if ($width > $height) {
					$ratio = ($width/$thumb_width);
					$begX=0;
					$begY=($thumb_height/2)-(($height/$ratio)/2);
					$destW= $width/$ratio;
					$destH=$height/$ratio;
	    } else {
					$ratio = ($height/$thumb_height);
				  $begY=0;
					$begX=($thumb_width/2)-(($width/$ratio)/2);
					$destW= $width/$ratio;
					$destH=$height/$ratio;
	    }
		$dst_img=ImageCreateTrueColor($thumb_width,$thumb_height);
		$bgcolor = imagecolorallocate($dst_img, 255,255, 255); // red
		imagefill($dst_img, 0, 0, $bgcolor);
		imagecopyresampled($dst_img,$src_img,$begX,$begY,0,0,$destW,$destH,$width,$height);
	}
	if (preg_match("/png/",$system[1]))
	{
		imagepng($dst_img,$filename);
	} else {
		imagejpeg($dst_img,$filename);
	}
	imagedestroy($dst_img);
	imagedestroy($src_img);
}

//fungsi XOR encryption dari stackoverflow.com
function encrypt($str){
  $key = "hallohallobandung";
  for($i=0; $i<strlen($str); $i++) {
     $char = substr($str, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)+ord($keychar));
     $result.=$char;
  }
  return urlencode(base64_encode($result));
}

//fungsi XOR decryption dari stackoverflow.com
function decrypt($str){
  $str = base64_decode(urldecode($str));
  $result = '';
  $key = "hallohallobandung";
  for($i=0; $i<strlen($str); $i++) {
    $char = substr($str, $i, 1);
    $keychar = substr($key, ($i % strlen($key))-1, 1);
    $char = chr(ord($char)-ord($keychar));
    $result.=$char;
  }
return $result;
}

?>
