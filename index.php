<?php
require('smoothline.php');
function hclr($img,$color) {
    sscanf($color, "%2x%2x%2x", $red, $green, $blue);
    return imagecolorallocate($img,$red,$green,$blue);
    return($c);
}
header ("Content-type: image/png");
$img = imagecreate(320, 240);
$background = hclr($img, "FFFFFF");
       $ink = hclr($img, "B19776");
   $default = hclr($img, "")
$h2cached;
$w2cached;
function drawrand($img, $width, $height, $color) {
	$w  = rand(0, $width);
	$w2 = rand(0, $width);
	$h  = rand(0, $height);
	$h2 = rand(0, $height);
	//print $w.":".$h.":".$w2.":".$h2;//Debug
	imagesmoothline($img, $w, $h, $w2, $h2, $color);
}

for ($i = 0; $i < 10; $i++){
	$width = 320;
	$height = 240;
	$color = $ink;
	if(empty($h2cached) & empty($w2cached)){
		$w  = rand(0, $width);
		$w2 = rand(0, $width);
		$h  = rand(0, $height);
		$h2 = rand(0, $height);
	}else{
		$w = $w2cached;
		$h = $h2cached;
		$w2 = rand(0, $width);
		$h2 = rand(0, $height);
	}
	//print $w.":".$h.":".$w2.":".$h2;//Debug
	imagesmoothline($img, $w, $h, $w2, $h2, $color);
	$h2cached = $h2;
	$w2cached = $w2;
}
imagepng($img);
imagedestroy($img);
?>