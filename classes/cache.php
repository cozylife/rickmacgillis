<?php

namespace Rick;

class CacheFileDoesNotExistException extends \Exception{}

class Cache
{
	public static function setCachedPage($cacheFile, $cacheContent)
	{
		if (static::isCacheEnabled() === true) {
			$fullPath = static::getFullPathForCachedFile($cacheFile);
			file_put_contents($fullPath, $cacheContent);
		}
	}
	
	public static function getCachedPage($cacheFile)
	{
		$fullPath = static::getFullPathForCachedFile($cacheFile);
		static::throwIfFileDoesNotExist($cacheFile);
		return file_get_contents($fullPath);
	}
	
	public static function canGetCachedDataForFile($cacheFile)
	{
		return static::isCacheEnabled() === true && static::doesCachedPageExist($cacheFile) === true;
	}
	
	public static function purgeCachedPage($cacheFile)
	{
		if (static::doesCachedPageExist($cacheFile) === true) {
			unlink(static::getFullPathForCachedFile($cacheFile));
		}
	}
	
	private static function doesCachedPageExist($cacheFile)
	{
		return realpath(static::getFullPathForCachedFile($cacheFile)) !== false;
	}
	
	private static function isCacheEnabled()
	{
		return Config::get('cache.enabled') === true;
	}
	
	private static function getFullPathForCachedFile($cacheFile)
	{
		return __DIR__ . '/../cache/' . $cacheFile . '.html';
	}
	
	private static function throwIfFileDoesNotExist($cacheFile)
	{
		if (static::doesCachedPageExist($cacheFile) === false) {
			throw new CacheFileDoesNotExistException($cacheFile);
		}
	}
}
