<?php

class LangTest extends \PHPUnit_Framework_TestCase
{
	public function testCanGetDefaultLanguageStringWhenNotFound()
	{
		$this->assertSame('test', \Rick\Lang::get('doesNotExist', 'test'));
	}
	
	public function testCanGetLanguageStringWhenExists()
	{
		$this->assertSame('it exists', \Rick\Lang::get('test', 'blah'));
	}
	
	public function testCanReplaceLanguageStringWhenExists()
	{
		$this->assertSame('it exists now', \Rick\Lang::get('testReplacements', '', ['now']));
	}
}
