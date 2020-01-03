<?php
$source = imagecreatefromjpeg("images/couchersoleil.jpg"); // Source image
$destination = imagecreatetruecolor(200, 150); // Empty thumbnail

$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

// Creation of thumbnail
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $largeur_source, $hauteur_source);

// Save thumbnail as"mini_couchersoleil.jpg"
imagejpeg($destination, "images/mini_couchersoleil.jpg");
?>