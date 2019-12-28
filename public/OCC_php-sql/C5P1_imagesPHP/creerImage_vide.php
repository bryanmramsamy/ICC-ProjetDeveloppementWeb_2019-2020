<?php

// This header is meant for the browser to indicate we are sending an image, not a web page.
// WARINIG: The'header' function mustbe used before any HTML-code !
header("Content-type: image/png");  // *1*

// imagecreate(imageWidth_inPixels, imageHeigth_inPixels)
// The $image-variable is an image-variable now, we talk about a ressource
$image = imagecreate(200,50);

// Now, we can work on the image if needed
$bleu = imagecolorallocate($image, 0, 0, 255);
$orange = imagecolorallocate($image, 255, 128, 0);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);


// Finally, we display the image
imagepng($image);
// imagejpeg() for a jpeg-image

/*  If we wanted to save the image somewhere, the destination folder must be added to the imagepng function as second argument.
 *  The header *1* must be deleted too. Useless and prevent the code execution.
 *      imagepng($image, "images/monimage.png");
 *  The image can be used in an <img>-tag:
 *      Example:    <img src="images/monimage.png"/>
 */

?>