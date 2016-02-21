<?php

class ValidateTest extends \PHPUnit_Framework_TestCase
{
	public function testCanValidateCorrectEmail()
	{
		$this->assertTrue(\Rick\Validate::isValidEmail('email@example.com'));
	}
	
	public function testreturnsFalseWhenInvalidEmail()
	{
		$this->assertFalse(\Rick\Validate::isValidEmail('nope'));
	}
}
