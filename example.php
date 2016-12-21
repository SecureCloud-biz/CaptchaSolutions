<?php
	include ('lib/CaptchaSolutions.php');
	
	$image = 'http://www.captchacreator.com/files/captchac_code.php';
	
	$key = "[<YOUR API KEY]"; // Get your own key at http://www.captchasolutions.com/clients/
	$secret = "[<YOUR SECRET KEY]"; // Get your own key at http://www.captchasolutions.com/clients/
	
	$api = new CaptchaSolutions($key, $secret);
	
	// Get available balance
	print $api->balance('sptest');
	
	// Simple captcha image decode via URL
	print $api->decode($image);	
	
	// Google's NoCaptcha
	print $api->nocaptcha('6LcT6wATAAAAAMBYUbtdHChwcLt3kaoBpvICxdDj', 'https://www.isnare.com/login.php');
	
	//Text Captcha Decoding
	print $api->text('What color is the sky?');	
?>