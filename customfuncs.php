<?php
function hclr($img,$color) {
    sscanf($color, "%2x%2x%2x", $red, $green, $blue);
    return imagecolorallocate($img,$red,$green,$blue);
    return($c);
}

function drawRand($img, $width, $height, $color) {
	$w  = rand(0, $width);
	$w2 = rand(0, $width);
	$h  = rand(0, $height);
	$h2 = rand(0, $height);
	imagesmoothline($img, $w, $h, $w2, $h2, $color);
}

function is_really_int(&$val) {
	$num = (int)$val;    
    if ($val==$num) {
    	$val=$num;
    	return true;
    }
    return false;
}

function drawOverlay($img, $width, $height, $padding, $color, $offset, $step, $thickness){
	imagesmoothline($img, $padding - $offset, $height - $padding, $width - $padding - $offset, $height - $padding, $color); //horizontal line
	imagesmoothline($img, $padding, $padding, $padding, $height - $padding + $offset, $color); //vertical line
	$length = $width - 2*$padding;
	for($i = 0; $i < $length; $i++){
		$tmp = $i / $step;
		if(is_really_int($tmp) AND $i < $width - $padding){
			imagesmoothline($img, $i + $padding, $height - $padding + ($thickness / 2), $i + $padding, $height - $padding - ($thickness / 2), $color);
		}
	}

	for($j = 0; $j < $width; $j++){
		$tmp = $j / $step;
		if(is_really_int($tmp) AND $j < $width - $padding){
			imagesmoothline($img, $padding, $padding, $padding, $height - $padding + $offset, $color);
		}
	}
}
?>