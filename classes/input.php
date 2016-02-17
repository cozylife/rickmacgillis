<?php

namespace Rick;

class Input
{
	public static function get($key, $default = '')
	{
		return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
	}
	
	public static function post($key, $default = '')
	{
		return array_key_exists($key, $_POST) ? $_POST[$key] : $default;
	}
}
