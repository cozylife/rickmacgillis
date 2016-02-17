<?php

class InputTest extends \PHPUnit_Framework_TestCase
{
	public function testCanGetDefaultGetWhenBadInput()
	{
		$this->assertSame(false, \Rick\Input::get('doesNotExist', false));
	}
	
	public function testCanGetGetInputWhenItDoesExist()
	{
		$_GET['test'] = 1;
		$this->assertSame(1, \Rick\Input::get('test', false));
	}
	
	public function testCanGetPostDefaultWhenBadInput()
	{
		$this->assertSame(false, \Rick\Input::post('doesNotExist', false));
	}
	
	public function testCanGetPostInputWhenItDoesExist()
	{
		$_POST['test'] = 1;
		$this->assertSame(1, \Rick\Input::post('test', false));
	}
}