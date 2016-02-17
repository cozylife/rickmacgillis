<?php

class CSRFTest extends \PHPUnit_Framework_TestCase
{
	public function testCanRegenerateCSRF()
	{
		\Rick\CSRF::regenerateToken();
		$this->assertInternalType('string', \Rick\CSRF::getToken());
	}
	
	public function testCanValidateToken()
	{
		\Rick\CSRF::regenerateToken();
		$token = \Rick\CSRF::getToken();
		
		$this->assertTrue(\Rick\CSRF::isValidToken($token));

		\Rick\CSRF::regenerateToken();
		$this->assertTrue(\Rick\CSRF::isValidToken($token));
		
		\Rick\CSRF::regenerateToken();
		$this->assertFalse(\Rick\CSRF::isValidToken($token));
	}
}
