<?php
	include ('lib/CaptchaSolutions.php');
	
	$image = 'http://www.captchacreator.com/files/captchac_code.php';
	
	$key = "[<YOUR API KEY]"; // Get your own key at http://www.captchasolutions.com/clients/
	$secret = "[<YOUR SECRET KEY]"; // Get your own key at http://www.captchasolutions.com/clients/
	
	$submitia = new CaptchaSolutions($key, $secret);
	
	//print $submitia->balance('sptest');
	print $submitia->decode($image);	
?>