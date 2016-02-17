<?php

class ConfigTest extends \PHPUnit_Framework_TestCase
{
	public function testCanGetFirstLevelValueFromConfigFile()
	{
		$this->assertSame('value', \Rick\Config::get('dummy.test'));
	}
	
	public function testCanGetSecondLevelValueFromConfigFile()
	{
		$this->assertSame('anotherValue', \Rick\Config::get('dummy.an-array.key'));
	}
	
	public function testCanGetArrayValueFromConfigFile()
	{
		$this->assertSame(['key' => 'anotherValue'], \Rick\Config::get('dummy.an-array'));
	}
	
	public function testCanGetCachedValues()
	{
		\Rick\Config::get('dummy.test');
		$this->assertSame('value', \Rick\Config::get('dummy.test'));
		
		\Rick\Config::get('dummy.an-array.key');
		$this->assertSame('anotherValue', \Rick\Config::get('dummy.an-array.key'));
	}
	
	public function testWillThrowExceptionWhenInvalidKey()
	{
		try {
			
			\Rick\Config::get('dummy.doesntExist');
			$this->fail();
			
		} catch (\Rick\ConfigInvalidKeyException $e) {}
	}
	
	public function testWillThrowExceptionWhenFileNotFound()
	{
		try {
			
			\Rick\Config::get('doesntExist.test');
			$this->fail();
			
		} catch (\Rick\ConfigFileNotFoundException $e) {}
	}
	
	public function testWillThrowFileNotFoundExceptionWhenNoDotNotation()
	{
		try {
			
			\Rick\Config::get('blah');
			$this->fail();
			
		} catch (\Rick\ConfigFileNotFoundException $e) {}
	}
}
