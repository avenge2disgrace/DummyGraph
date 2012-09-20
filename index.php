<?php
require('smoothline.php');
require('customfuncs.php');

header ("Content-type: image/png");
$width = 320;
$height = 240;
$img = imagecreate($width, $height);

$background = hclr($img, "FFFFFF");
       $ink = hclr($img, "B19776");

$cache['h2'];
$cache['w2'];

for ($i = 0; $i < 10; $i++){
	//$width = 320;
	//$height = 240;
	$color = $ink;
	if(empty($cache['h2']) & empty($cache['w2'])){
		$w  = rand(0, $width);
		$w2 = rand(0, $width);
		$h  = rand(0, $height);
		$h2 = rand(0, $height);
	}else{
		$w = $cache['w2'];
		$h = $cache['h2'];
		$w2 = rand(0, $width);
		$h2 = rand(0, $height);
	}
	//print $w.":".$h.":".$w2.":".$h2;//Debug
	imagesmoothline($img, $w, $h, $w2, $h2, $color);
	$cache['h2'] = $h2;
	$cache['w2'] = $w2;
}

drawOverlay($img, $width, $height, 10, $ink, 2, 3, 4);

imagepng($img);
imagedestroy($img);
?>