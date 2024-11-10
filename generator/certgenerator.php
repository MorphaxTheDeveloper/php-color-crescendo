<?php 
$image = imagecreatefrompng('../img/thumbnail.png');

if (!$image) {
    die('Hata: Resim yüklenemedi');
}

ob_start();
imagepng($image);
imagedestroy($image);
header('Content-Type: image/png');
ob_end_flush();
?>