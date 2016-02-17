<?php

namespace Rick\Driver;

class PHPMailerMessageNotSentException extends MessageNotSentException{};

class PHPMailer extends \PHPMailer implements DriverInterface
{
	public function __construct()
	{
		$this->isSMTP();
		$this->Host = \Rick\Config::get('email.host');
		
		$password = \Rick\Config::get('email.password');
		
		if (strlen($password) > 0) {
			
			$this->SMTPAuth = true;
			$this->Username = \Rick\Config::get('email.username');
			$this->Password = $password;
			
		}
		
		$this->SMTPSecure = \Rick\Config::get('email.securityProtocol');
		$this->Port = \Rick\Config::get('email.port');
		$this->isHTML(\Rick\Config::get('email.defaultToHtmlEmail'));
	}
	
	public function send()
	{
		if(!parent::send()) {
			throw new PHPMailerMessageNotSentException($this->ErrorInfo);
		}
	}
	
	public function to($email, $name = '')
	{
		$this->addAddress($email, $name);
	}
	
	public function from($email, $name = '')
	{
		$this->setFrom($email, $name);
	}
	
	public function subject($subject)
	{
		$this->Subject = $subject;
	}
	
	public function message($body)
	{
		$this->Body = $body;
	}
}
