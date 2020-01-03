<?php

header ("Content-type: image/jpeg");

$source = imagecreatefrompng("images.logo.png");
$destination = imagecreatefromjpeg("images/couchersoleil.jpg");

# imagesx($x) gives the width of a picture and put in in variable $x, imagesy($y) does the same with the heigth
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

# We want to put the logo in the bottom corner right. These are the coordinates of where to put the logo.
$destination_x = $largeur_destination - $largeur_source;  # The most left pixel of the $destination - the width of the logo
$destination_y =  $hauteur_destination - $hauteur_source;  # Same for the height

# We merge the logo ($source) in the picture ($destination)
imagecopymerge($destination, $source, $destination_x, $destination_y, 0, 0, $largeur_source, $hauteur_source, 60);

imagejpeg($destination);

?>