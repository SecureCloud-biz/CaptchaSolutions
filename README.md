# Decaptcha / Bypass Captcha / Captcha Solver / Captcha Solutions
A RESTful Captcha Solver or Bypass Captcha Service, check out http://www.captchasolutions.com solving at a rate of $0.0017 per image captcha solved.

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
