<?php
require 'connect.php';
function setTextToImage($picture, $font, $text){
	$picture = 'images\\'.$picture;
	$image = imagecreatefromjpeg($picture);
	$textColor = imagecolorallocate($image, 255, 0, 0);
	$font = $font.'.ttf';
	imagettftext($image, 24, 0, 10, 50, $textColor, $font, $text);
	return $image;
}
if (isset($_GET['link_']))
{
	$link = addslashes($_GET['link_']);
	$res = $conn->query("SELECT id, pic_link, link, out_text FROM graph WHERE link='$link';");
	$row = mysqli_fetch_assoc($res);
	header("Content-type: image/png");
	$image = setTextToImage($row['pic_link'], 'arial', $row['out_text']);
	imagepng($image);
	imagedestroy($image);	
}