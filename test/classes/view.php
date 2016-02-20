<?php

use \Rick\Config;
use \Rick\View;

class ViewTest extends \PHPUnit_Framework_TestCase
{
	public function testCanGetPageContent()
	{
		$pageContent = View::getPageContent('testtemplate');
		$this->assertInternalType('string', $pageContent);
	}
	
	public function testCanGetMinifiedPageContent()
	{
		Config::set('view.minify', true);
		$pageContent = View::getPageContent('testtemplate');
		$this->assertFalse(strpos($pageContent, "\n"));
	}
}
