<?php
	session_start();

		$random_number = rand(10000,99999);
		$_SESSION['captcha_text'] = $random_number;
		$captcha_image = imagecreatefromjpeg("1.jpg");
		$font_color = imagecolorallocate($captcha_image, 0, 0, 0);
		imagestring($captcha_image, 5, 60, 30, $random_number, $font_color);
		imagejpeg($captcha_image);
		imagedestroy($captcha_image);
?>