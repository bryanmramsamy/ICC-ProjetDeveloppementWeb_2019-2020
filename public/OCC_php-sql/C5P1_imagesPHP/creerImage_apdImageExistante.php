<?php

// This header is meant for the browser to indicate we are sending an image, not a web page.
// WARINIG: The'header' function mustbe used before any HTML-code !
header("Content-type: image/jpeg");

$image = imagecreatefromjpeg("images/couchersoleil.jpg");
// $image = imagecreatefrompng("images/couchersoleil.png"); If file was png-format

imagejpeg($image);

?>