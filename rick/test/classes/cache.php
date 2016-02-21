<?php

use \Rick\Cache;

class CacheTest extends \PHPUnit_Framework_TestCase
{
	public function testCanCachePage()
	{
		Cache::setCachedPage('testpage', 'test content');
		$this->assertSame('test content', Cache::getCachedPage('testpage'));
	}
	
	public function testWillThrowExceptionWhenCachedPageDoesNotExist()
	{
		try {
			
			Cache::getCachedPage('doesnotexist');
			$this->fail();
			
		} catch (\Rick\CacheFileDoesNotExistException $e) {}
	}
	
	public function testCanCheckIfWeCanGetCachedDataForAPage()
	{
		Cache::setCachedPage('testpage', 'test content');
		$this->assertTrue(Cache::canGetCachedDataForFile('testpage'));
		
		Cache::purgeCachedPage('testpage');
		$this->assertFalse(Cache::canGetCachedDataForFile('testpage'));
	}
}
