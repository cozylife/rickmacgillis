<?php

class ContactTest extends \PHPUnit_Framework_TestCase
{
	public function testthrowsExceptionWhenHoneypotFilled()
	{
		$contact = new \Rick\Model\Contact();
		
		$_POST['username'] = 'test';
		
		try {
			
			$contact->handleFormSubmission();
			$this->fail();
			
		} catch (\Rick\Model\ContactHoneypotFilledException $e) {}
	}
	
	public function testthrowsExceptionForBadCsrf()
	{
		$contact = new \Rick\Model\Contact();
		\Rick\CSRF::regenerateToken();
		
		try {
				
			$contact->handleFormSubmission();
			$this->fail();
				
		} catch (\Rick\Model\ContactBadCsrfException $e) {}
	}
	
	public function testCanGetJsonForMissingFields()
	{
		$contact = new \Rick\Model\Contact();
		\Rick\CSRF::regenerateToken();
		
		$_POST['csrf'] = \Rick\CSRF::getToken();
		$_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
		$contact->handleFormSubmission();
		
		$response = json_decode($contact->getResponseJson());
		
		$this->assertSame('missing fields', $response->errorType);
	}
	
	public function testCanGetJsonForBadEmailAddress()
	{
		$contact = new \Rick\Model\Contact();
		\Rick\CSRF::regenerateToken();
	
		$_POST['csrf'] = \Rick\CSRF::getToken();
		$_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
		
		$required = ['first-name', 'last-name', 'email', 'job-title', 'business', 'business-website'];
		foreach ($required as $postKey) {
			$_POST[$postKey] = 'blah';
		}
		
		$contact->handleFormSubmission();
	
		$response = json_decode($contact->getResponseJson());
	
		$this->assertSame('bad email', $response->errorType);
	}
	
	public function testCanGetJsonForSentMessage()
	{
		$contact = new \Rick\Model\Contact();
		\Rick\CSRF::regenerateToken();
	
		$_POST['csrf'] = \Rick\CSRF::getToken();
		$_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
	
		$required = ['first-name', 'last-name', 'email', 'job-title', 'business', 'business-website'];
		foreach ($required as $postKey) {
			$_POST[$postKey] = 'blah';
		}
		
		$_POST['email'] = 'test@example.com';
		$contact->handleFormSubmission();
	
		$response = json_decode($contact->getResponseJson());
	
		$this->assertSame('success', $response->errorType);
	}
}
