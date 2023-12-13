<?php
session_start();

$captcha = generateCaptcha(6);

// Create an image with a white background
$image = imagecreate(150, 40);
$background_color = imagecolorallocate($image, 255, 255, 255);

// Set the text color to black
$text_color = imagecolorallocate($image, 0, 0, 0);

// Add the captcha text to the image
imagestring($image, 5, 10, 10, $captcha, $text_color);

// Output the image as PNG
header('Content-Type: image/png');
imagepng($image);

// Clean up resources
imagedestroy($image);

$_SESSION['captcha'] = $captcha;

function generateCaptcha($length = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    $characters_length = strlen($characters);

    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, $characters_length - 1)];
    }

    return $captcha;
}
?>
