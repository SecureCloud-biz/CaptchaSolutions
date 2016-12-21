<a href="https://www.captchasolutions.com/"><img src="https://www.captchasolutions.com/img/captchasolutions.png"></a>

# Bypass Captcha / Captcha Solver / Decaptcha
A RESTful Captcha Solver or Bypass Captcha Service

Solving at a rate of $0.7 per 1000 captchas solved.

Check out https://www.captchasolutions.com

----
Usage

```php
<?php
	include ('lib/CaptchaSolutions.php');
	
	$image = 'http://www.captchacreator.com/files/captchac_code.php';
	
	$key = "[<YOUR API KEY]"; // Get your own key at https://www.captchasolutions.com/register/
	$secret = "[<YOUR SECRET KEY]"; // Get your own key at https://www.captchasolutions.com/register/	

	$api = new CaptchaSolutions($key, $secret);
	
	// Get available balance
	print $api->balance('sptest');
	
	// Simple captcha image decode via URL
	print $api->decode($image);	
	
	// Google's NoCaptcha
	print $api->nocaptcha('6LcT6wATAAAAAMBYUbtdHChwcLt3kaoBpvICxdDj', 'https://www.isnare.com/login.php');	
	
	//Text Captcha Decoding
	print $api->text('What color is the sky?');		
```

----
Sponsors:

- https://www.captchasolutions.com/
- https://www.isnare.com/
- https://www.captchas.xyz/
- https://www.freecontentarticles.com/
- http://www.solvecaptchas.com/
