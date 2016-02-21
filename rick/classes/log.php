<?php

namespace Rick;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

class Log
{
	private static $instances = [];
	private $logger = null;
	
	public static function getChannel($channel)
	{
		$instance = static::getInstance($channel);
		return $instance->logger;
	}
	
	private static function getInstance($channel)
	{
		if (array_key_exists($channel, static::$instances) === false) {
			static::$instances[$channel] = new static($channel);
		}
		
		return static::$instances[$channel];
	}
	
	private function __construct($channel)
	{
		$formatter = new LineFormatter();
		
		$stream = new StreamHandler(__DIR__.'/../log/' . $channel . '.log', Logger::DEBUG);
		$stream->setFormatter($formatter);

		$this->logger = new Logger($channel);
		$this->logger->pushHandler($stream);
	}
}
