<?php

namespace Rick\EmailDriver;

interface DriverInterface
{
	public function to($email, $name = '');
	public function from($email, $name = '');
	public function subject($subject);
	public function message($body);
	public function send();
}
