<?php

require_once('../bootstrap.php');

\Rick\CSRF::regenerateToken();

$page = \Rick\Input::get('page');

if (empty($page)) {
	$page = 'index';
}

//header("strict-transport-security: max-age=15552000; includeSubDomains; preload");
header("x-content-security-policy: default-src https:;script-src 'unsafe-inline' 'unsafe-eval' https:;style-src 'unsafe-inline' https:;");
header("x-content-type-options: nosniff");
header("x-frame-options: DENY");
header("x-webkit-csp: default-src https:;script-src 'unsafe-inline' 'unsafe-eval' https:;style-src 'unsafe-inline' https:;");
header("x-xss-protection: 1; mode=block");

try {
	\Rick\Controller::page($page);
} catch (\Rick\HttpNotFoundException $e) {
	
	http_response_code(404);
	\Rick\Controller::page('404');
	
} catch (\Exception $e) {
	echo 'An error occurred.';
}
