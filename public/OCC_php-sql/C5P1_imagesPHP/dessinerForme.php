<?php
header("Content-type: image/png");  # Indicate to the browser this is an image

$image = imagecreate(200, 200);
$blanc = imagecolorallocate($image, 255, 255, 255);  # Background

# Colors to be used later 
$noir = imagecolorallocate($image, 0, 0, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$rouge = ImageColorAllocate($image, 255, 0, 0);
$vert = imagecolorallocate($image, 0, 255, 0);
$mauve = imagecolorallocate($image, 255, 0, 255);

# Draw pixel at coordinates (x, y)
    # imagesetpixel($image, $x, $y, $colour);
imagesetpixel($image, 175, 25, $noir);

# Draw line between coordinates (x1, y1) and (x2, y2)
    # imageline($image, $x1, $y1, $x2, $y2, $colour);
imageline($image, 30, 30, 120, 120, $bleu);

# Draw ellipse with (x, y) as center
    # ImageEllipse($image, $x, $y, $width, $heigth, $colour);
ImageEllipse($image, 50, 50, 50, 30, $rouge);

# Draw rectangle with (x1, y1) as higher-left corner and (x2, y2) as lower-right corner
    # ImageRectangle($image, $x1, $y1, $x2, $y2, $colour)
imagerectangle($image, 150, 150, 190, 180, $vert);

# Draw a polygon with nbPoints as number of points which are contained in the arrya $array_points
    # ImagePolygon($image, $array_points, $nbPoints, $colour);

# The array must contains the x, then the y-coordinate of the first point, then the second until the last one)
# The number of values in this array must be an even number.
$points_of_polygon = array(10, 40, 120, 50, 160, 160);  # Here, the polygon is made of 3 points: (10, 40), (120, 50) and (160, 160)
imagepolygon($image, $points_of_polygon, 3, $mauve);

imagepng($image);

?>