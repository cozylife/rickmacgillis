<?php

namespace Rick;

class Lang
{
	private $translations = [];
	private static $instance = null;
	
	public static function get($key, $default = '', array $replacements = [])
	{
		$instance = static::getInstance();
		if (array_key_exists($key, $instance->translations)) {
			return vsprintf($instance->translations[$key], $replacements);
		}
		
		return $default;
	}
	
	private static function getInstance()
	{
		if (static::$instance === null) {
			static::$instance = new static;
		}
		
		return static::$instance;
	}
	
	private function __construct()
	{
		$this->translations = require_once(__DIR__ . '/../language/en_US.php');
	}
}
