<?php

session_start();
session_regenerate_id();

spl_autoload_register(function ($className)
{
	$fileName = realpath(__DIR__ . '/classes' . str_replace(array('\\', 'rick'), array('/', ''), strtolower($className)) . '.php');
	if ($fileName !== false) {
		require_once($fileName);
	}
});

require_once(__DIR__ . '/vendor/autoload.php');
