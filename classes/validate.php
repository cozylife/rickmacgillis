<?php

namespace Rick;

class Validate
{
	public static function isValidEmail($email)
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL) === $email;
	}
}
