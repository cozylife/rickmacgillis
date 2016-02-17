<?php

namespace Rick;

class CSRF
{
	public static function regenerateToken()
	{
		if (!array_key_exists('csrf', $_SESSION)) {
			$_SESSION['csrf'] = null;
		}
		
		$_SESSION['previousCsrf'] = $_SESSION['csrf'];
		$_SESSION['csrf'] = hash('sha256', openssl_random_pseudo_bytes(32));
	}
	
	public static function getToken()
	{
		return $_SESSION['csrf'];
	}
	
	public static function isValidToken($token)
	{
		if (array_key_exists('csrf', $_SESSION) === false) {
			return false;
		}
		
		return $token === $_SESSION['csrf'] || $token === $_SESSION['previousCsrf'];
	}
	
	public static function isPossibleAjaxRequest()
	{
		return array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
	}
}
