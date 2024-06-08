<?php
session_start();

    function randText(){
        $txt = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ($i = 0; $i < 5; $i++) 
        {
            $index = rand(0, strlen($txt) - 1);
            $str .= $txt[$index];
        }
        return $str;
    }

    header("Content-type: image/png");
    $image = imagecreatetruecolor(100, 40);
    $backColor = imagecolorallocate($image, 168, 167, 165);
    $txtColor = imagecolorallocate($image, 250, 250, 250);
    $code = randText();
    $_SESSION["captcha"] = $code;
    imagestring($image, 15, 25, 13, $code, $txtColor);
    imagepng($image);
    imagecolordeallocate($image, $backColor);
    imagecolordeallocate($image, $txtColor);
    imagedestroy($image);

?>