<?php

use \Rick\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
	public function testCanGetFirstLevelValueFromConfigFile()
	{
		$this->assertSame('value', Config::get('dummy.test'));
	}
	
	public function testCanGetSecondLevelValueFromConfigFile()
	{
		$this->assertSame('anotherValue', Config::get('dummy.an-array.key'));
	}
	
	public function testCanGetArrayValueFromConfigFile()
	{
		$this->assertSame(['key' => 'anotherValue'], Config::get('dummy.an-array'));
	}
	
	public function testCanGetCachedValues()
	{
		Config::get('dummy.test');
		$this->assertSame('value', Config::get('dummy.test'));
		
		Config::get('dummy.an-array.key');
		$this->assertSame('anotherValue', Config::get('dummy.an-array.key'));
	}
	
	public function testWillThrowExceptionWhenInvalidKey()
	{
		try {
			
			Config::get('dummy.doesntExist');
			$this->fail();
			
		} catch (\Rick\ConfigInvalidKeyException $e) {}
	}
	
	public function testWillThrowExceptionWhenFileNotFound()
	{
		try {
			
			Config::get('doesntExist.test');
			$this->fail();
			
		} catch (\Rick\ConfigFileNotFoundException $e) {}
	}
	
	public function testWillThrowFileNotFoundExceptionWhenNoDotNotation()
	{
		try {
			
			Config::get('blah');
			$this->fail();
			
		} catch (\Rick\ConfigFileNotFoundException $e) {}
	}
	
	public function testCanSetValueInConfig()
	{
		$this->assertSame('value', Config::get('dummy.test'));
		
		Config::set('dummy.test', 'new value');
		$this->assertSame('new value', Config::get('dummy.test'));
	}
}
