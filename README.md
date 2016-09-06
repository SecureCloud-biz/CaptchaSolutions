<img src="http://www.captchasolutions.com/img/captchasolutions.png">

# Bypass Captcha / Captcha Solver / Decaptcha
A RESTful Captcha Solver or Bypass Captcha Service

<b>Solving at a rate of $0.7 per 1000 captchas solved.</b>

Check out https://www.captchasolutions.com

----
Usage

```php
<?php
	include ('lib/CaptchaSolutions.php');
	
	$image = 'http://www.captchacreator.com/files/captchac_code.php';
	
	$key = "[<YOUR API KEY]"; // Get your own key at http://www.captchasolutions.com/register/
	$secret = "[<YOUR SECRET KEY]"; // Get your own key at http://www.captchasolutions.com/register/
	
	$captchasolutions = new CaptchaSolutions($key, $secret);
	
	// scraping reCaptcha v1 
	// $image = $captchasolutions->scrape_recaptcha($_html_source);
		
	print $captchasolutions->decode($image);	
	//print $captchasolutions->balance('sptest');
```

----
Sponsors:

- https://www.captchaco.in/
- http://www.textcaptchadecoder.com/
- https://www.freecontentarticles.com
- https://www.isnare.com/
