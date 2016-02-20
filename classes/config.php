<?php

namespace Rick;

class ConfigFileNotFoundException extends \Exception{}
class ConfigInvalidKeyException extends \Exception{}

class Config
{
	private static $instance = null;
	private $configs = [
		'dot-notated' => [],
	];
	
	public static function get($item)
	{
		return static::getValueFromDotNotation($item);
	}
	
	public static function set($item, $value)
	{
		$instance = static::getInstance();
		$instance->configs['dot-notated'][$item] = $value;
	}
	
	private static function getValueFromDotNotation($dotNotated)
	{
		try {
			return static::getValueFromCache($dotNotated);
		} catch (ConfigInvalidKeyException $e) {
			
			$parts = explode('.', $dotNotated);
			if ($parts === false) {
				static::throwConfigInvalidKeyException();
			}
			
			static::loadConfigFile($parts[0]);
			
			$instance = static::getInstance();
			$instance->configs['dot-notated'][$dotNotated] = static::getValueFromKeyArray($parts, $instance->configs);
			return $instance->configs['dot-notated'][$dotNotated];
			
		}
	}
	
	private static function getValueFromCache($key)
	{
		$instance = static::getInstance();
		if (array_key_exists($key, $instance->configs['dot-notated'])) {
			return $instance->configs['dot-notated'][$key];
		}
		
		$instance->throwConfigInvalidKeyException();
	}
	
	private static function throwConfigInvalidKeyException()
	{
		throw new ConfigInvalidKeyException();
	}
	
	private static function getValueFromKeyArray(array $keyArray, $configSection)
	{
		$instance = static::getInstance();
		$key = array_shift($keyArray);
		if (empty($keyArray) === true) {
			
			if (array_key_exists($key, $configSection)) {
				return $configSection[$key];
			}
			
			$instance->throwConfigInvalidKeyException();
			
		}
		
		return static::getValueFromKeyArray($keyArray, $configSection[$key]);
	}
	
	private static function getConfig($configName)
	{
		$instance = static::getInstance();
		
		if (array_key_exists($configName, $instance->configs)) {
			return $instance->configs[$configName];
		}
		
		$instance->loadConfigFile($configName);
		return $instance->configs[$configName];
	}
	
	private static function getInstance()
	{
		if (static::$instance === null) {
			static::$instance = new static;
		}
		
		return static::$instance;
	}
	
	private static function loadConfigFile($configName)
	{
		$instance = static::getInstance();
		if (array_key_exists($configName, $instance->configs) === false) {
			
			$fileName = realpath(__DIR__ . '/../config/' . $configName . '.php');
			if (file_exists($fileName)) {
				$instance->configs[$configName] = require_once($fileName);
			} else {
				$instance->throwConfigFileNotFoundException();
			}
			
		}
	}
	
	private function throwConfigFileNotFoundException()
	{
		throw new ConfigFileNotFoundException();
	}
}
