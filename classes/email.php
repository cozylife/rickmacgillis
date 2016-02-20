<?php

namespace Rick;

class Email
{
	private $driver = null;
	
	public function __construct()
	{
		$driverName = '\\Rick\\EmailDriver\\' . Config::get('email.driver');
		$this->driver = new $driverName;
	}
	
	public function __call($name, array $args)
	{
		call_user_func_array([$this->driver, $name], $args);
	}
}
