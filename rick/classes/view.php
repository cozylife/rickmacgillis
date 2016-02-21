<?php

namespace Rick;

class View
{
	public static function getPageContent($pageName, array $pageData = [])
	{
		if (Cache::canGetCachedDataForFile($pageName) === true) {
			return Cache::getCachedPage($pageName);
		}
		
		static::throwIfTemplateForPageNotFound($pageName);
		$fileName = static::getFileNameForPage($pageName);
		
		$rawPageContent = static::getParsedPageContent($fileName, $pageData);
		$pageContent = static::needsMinification() === true ? static::minify($rawPageContent) : $rawPageContent;
		
		Cache::setCachedPage($pageName, $pageContent);
		
		return $pageContent;
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
	
	private static function getParsedPageContent($fileName, $pageData)
	{
		$currentBuffer = ob_get_clean();
		ob_start();
		require_once($fileName);
		$parsedPage = ob_get_clean();
		echo $currentBuffer;
		return $parsedPage;
	}
	
	private static function needsMinification()
	{
		return Config::get('view.minify') === true;
	}
	
	private static function minify($rawPageContent)
	{
		return str_replace(["\n", "\t"], ' ', $rawPageContent);
	}
}
