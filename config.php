<?php

$conn = mysqli_connect('localhost','audrey','Audrey123','user_db');

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