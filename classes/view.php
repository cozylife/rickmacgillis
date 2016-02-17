<?php

namespace Rick;

class View
{
	public static function displayPage($pageName, array $pageData = [])
	{
		static::throwIfTemplateForPageNotFound($pageName);
		$fileName = static::getFileNameForPage($pageName);
		
		require_once($fileName);
	}
	
	private static function throwIfTemplateForPageNotFound($pageName)
	{
		if (static::getFileNameForPage($pageName) === false) {
			throw new HttpNotFoundException($pageName . ' template');
		}
	}
	
	private static function getFileNameForPage($pageName)
	{
		return realpath(__DIR__ . '/../template/' . $pageName . '.php');
	}
}
