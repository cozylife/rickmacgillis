<?php

class LogTest extends \PHPUnit_Framework_TestCase
{
	public function testCanLogEvent()
	{
		$logger = \Rick\Log::getChannel('test');
		$this->assertTrue($logger->addDebug('Test data from the test class: ' . __CLASS__));
	}
}
