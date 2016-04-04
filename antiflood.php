<?php 
session_start(); 
header("Content-Type: image/jpeg");
header("Pragma: No-cache");
header("Cache-Control:No-cache, Must-revalidate"); 
$image_width = 55; 
$image_height = 20; 
$im = ImageCreate($image_width, $image_height); 
$white = ImageColorAllocate($im, 25, 25, 25); 
$black = ImageColorAllocate($im, 255,255,255); 
//$gray = ImageColorAllocate($im, 192, 192, 192); 
ImageFill($im, 0, 0, $white); 
$i =0; 
/*
for ($i=0; $i <= $image_height; $i = $i + 7) 
    ImageLine($im, 0, $i, $image_width, $i, $gray); 
for ($i=0; $i <= $image_width; $i = $i + 7) 
    ImageLine($im, $i, 0, $i, $image_height, $gray); 
	*/
imagestring($im, 4, 2, 2, $_SESSION["code_verify"], $black); 
ImageJPEG($im);
ImageDestroy($im); 
?>