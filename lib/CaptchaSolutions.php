<?php
/*
File: CaptchaSolutions.php
Date: 10/25/2015
Version 1.0
Author: Glenn Prialde
Copyright Captcha Solutions http://www.captchasolutions.com/ 2015.  All rights reserved.


Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* You must provide a link back to www.henryranch.net on the site on which this software is used.
* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer 
in the documentation and/or other materials provided with the distribution.
* Neither the name of the HenryRanch LCC nor the names of its contributors nor authors may be used to endorse or promote products derived 
from this software without specific prior written permission.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 
OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 
THE AUTHORS, OWNERS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES 
OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, 
ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER 
DEALINGS IN THE SOFTWARE.  
*/

require_once('TinyHttpClient.php');

class CaptchaSolutions extends TinyHttpClient {

	private $host = 'api.captchasolutions.com';
	private $token = null;
	private $secret = null;		
	private $port = 80;
	private $remoteFile = "/solve";
	private $basicAuthUsernameColonPassword = "";
	private $bufferSize = 2048;
	//private $mode = "post";
	private $mode = "get";
	private $fromEmail = "admin@captchasolutions.com";
	private $postData = "";
	private $localFile = "";
	
	public function __construct($token, $secret) {
		$this->token = $token;
		$this->secret = $secret;
	}
	
	public function balance($username) { 
		$remoteFile = $this->remoteFile . '?p=balance&username=' . $username . '&key=' . $this->token;
		$ret = $this->getRemoteFile($this->host, $this->port, $remoteFile, $this->basicAuthUsernameColonPassword, $this->bufferSize, $this->mode, $this->fromEmail, $this->postData, $this->localFile);
		return $ret;
	}

	public function decode($catpcha) { 
		$remoteFile = $this->remoteFile . '?p=decode&url=' . urlencode($catpcha) . '&key=' . $this->token . '&secret=' . $this->secret;
		$ret = $this->getRemoteFile($this->host, $this->port, $remoteFile, $this->basicAuthUsernameColonPassword, $this->bufferSize, $this->mode, $this->fromEmail, $this->postData, $this->localFile);
		return $ret;
	}	

	public function base64($catpcha) { 
		$this->localFile = $catpcha;
		$this->mode = 'POST';
		$this->postData = 'p=base64&captcha=' . $this->localFile . '&key=' . $this->token . '&secret=' . $this->secret;
		$ret = $this->getRemoteFile($this->host, $this->port, $this->remoteFile, $this->basicAuthUsernameColonPassword, $this->bufferSize, $this->mode, $this->fromEmail, $this->postData, $this->localFile);
		return $ret;
	}	
	
	public function audio($audiofile) { 
		$this->localFile = $audiofile;
		$this->mode = 'POST';
		$this->postData = 'p=audio&audiofile=@' . $this->localFile . '&key=' . $this->token . '&secret=' . $this->secret;
		$ret = $this->getRemoteFile($this->host, $this->port, $this->remoteFile, $this->basicAuthUsernameColonPassword, $this->bufferSize, $this->mode, $this->fromEmail, $this->postData, $this->localFile);
		return $ret;
	}	
	
	public function text($question) { 
		$this->remoteFile = 'p=textcaptcha&question=' . $question . '&key=' . $this->token . '&secret=' . $this->secret;
		$ret = $this->getRemoteFile($this->host, $this->port, $this->remoteFile, $this->basicAuthUsernameColonPassword, $this->bufferSize, $this->mode, $this->fromEmail, $this->postData, $this->localFile);
		return $ret;
	}	
	
	public function upload($catpcha) { 
		$this->localFile = $catpcha;
		$this->mode = 'POST';
		$this->postData = 'p=upload&captcha=@' . $this->localFile . '&key=' . $this->token . '&secret=' . $this->secret;
		$ret = $this->getRemoteFile($this->host, $this->port, $this->remoteFile, $this->basicAuthUsernameColonPassword, $this->bufferSize, $this->mode, $this->fromEmail, $this->postData, $this->localFile);
		return $ret;
	}	
	
	public function scrape_recaptcha($_html) {
		$content = preg_replace('/([\n])/sim', '', $_html);
		$rcaptcha = preg_replace('#(.+?<iframe src=".+?recaptcha.+?k=(.+?)" height="300" width="500" frameborder="0"></iframe>.+)#si', '$2', $content);
		$rcaptcha = "http://www.google.com/recaptcha/api/challenge?k=" . trim($rcaptcha);
		$rdata = file_get_contents($rcaptcha);
		$rcontent = preg_replace('/([\n])/sim', '', $rdata);
		$captcha = preg_replace('#(.+?challenge : \'(.+?)\',.+)#si', '$2', $rcontent);
		$captcha = 'http://www.google.com/recaptcha/api/image?c=' . $captcha;
		return $captcha;
	}

}

?>