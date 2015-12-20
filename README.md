# Decaptcha / Bypass Captcha / Captcha Solver / Captcha Solutions
A RESTful Captcha Solver or Bypass Captcha Service

Solving at a rate of $0.99 per 1000 captchas solved.

Check out http://www.captchasolutions.com

----
Usage

```php
<?php
	include ('lib/CaptchaSolutions.php');
	
	$image = 'http://www.captchacreator.com/files/captchac_code.php';
	
	$key = "[<YOUR API KEY]"; // Get your own key at http://www.captchasolutions.com/register/
	$secret = "[<YOUR SECRET KEY]"; // Get your own key at http://www.captchasolutions.com/register/
	
	$captchasolutions = new CaptchaSolutions($key, $secret);
	
	//print $captchasolutions->balance('sptest');
	print $captchasolutions->decode($image);	
```

----
Sponsors:

- http://www.captchasolutions.com/
- https://www.isnare.com/
- https://articlefr.cf/
