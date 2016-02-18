<?php

namespace Rick\Model;

class ContactHoneypotFilledException extends \Exception{}
class ContactBadCsrfException extends \Exception{}

class Contact
{
	private $header = null;
	private $message = null;
	private $responseType = null;
	private $errorType = null;
	
	private $emailSentStatus = false;
	
	private $responseJson = null;
	
	public function handleFormSubmission()
	{
		$this->throwExceptionIfHoneypotFilled();
		$this->throwExceptionIfBadCsrf();
		
		$required = ['first-name', 'last-name', 'email', 'job-title', 'business', 'business-website'];
		if ($this->allRequiredFieldsAreFilled($required) === false) {
			
			$this->setResponseForMissingFields();
			
		} else if (\Rick\Validate::isValidEmail(\Rick\Input::post('email')) === false) {
			
			$this->setResponseForInvalidEmail();
			
		} else {
			
			$this->sendEmail();
			if ($this->emailWasSentSuccessfully()) {
				$this->setResponseForSuccessfulSend();
			} else {
				$this->setResponseForEmailNotSent();
			}
			
		}
		
		$this->setResponseArray();
	}
	
	public function getResponseJson()
	{
		return json_encode($this->responseJson);
	}
	
	private function throwExceptionIfHoneypotFilled()
	{
		if (\Rick\Input::post('username') !== '') {
			throw new ContactHoneypotFilledException();
		}
	}
	
	private function throwExceptionIfBadCsrf()
	{
		if (
			\Rick\CSRF::isValidToken(\Rick\Input::post('csrf')) === false ||
			\Rick\CSRF::isPossibleAjaxRequest() === false
		) {
			throw new ContactBadCsrfException();
		}
	}
	
	private function allRequiredFieldsAreFilled(array $requredFields)
	{
		foreach ($requredFields as $field) {
			
			if (\Rick\Input::post($field) === '') {
				return false;
			}
			
		}
		
		return true;
	}
	
	private function setResponseForMissingFields()
	{
		$this->header = \Rick\Lang::get('contactMissingRequiredHeader');
		$this->message = \Rick\Lang::get('contactMissingRequiredMessage');
		$this->responseType = 'negative';
		$this->errorType = 'missing fields';
	}
	
	private function setResponseForInvalidEmail()
	{
		$this->header = \Rick\Lang::get('contactInvalidEmailHeader');
		$this->message = \Rick\Lang::get('contactInvalidEmailMessage');
		$this->responseType = 'negative';
		$this->errorType = 'bad email';
	}
	
	private function sendEmail()
	{
		$email = new \Rick\Email();
		
		$email->to(\Rick\Config::get('core.contactEmail'));
		$email->from(\Rick\Input::post('email'));
		$email->subject(\Rick\Lang::get('contactEmailSubject'));
		
		$messageReplacements = $this->getMessageReplacements();
		$email->message(\Rick\Lang::get('contactEmailMessage', '', $messageReplacements));
		
		try {
			
			$email->send();
			$this->emailSentStatus = true;
			
		} catch (\Rick\Driver\MessageNotSentException $e) {
			
			$this->emailSentStatus = false;
			$logger = \Rick\Log::getChannel('contact');
			$logger->addWarning($e->getMessage());
			
		}
	}
	
	private function getMessageReplacements()
	{
		$_POST['send-book'] = \Rick\Input::post('send-book') === '' ? 'No' : 'Yes';
		
		return [
			htmlspecialchars(\Rick\Input::post('business')),
			htmlspecialchars(\Rick\Input::post('business-website')),
			htmlspecialchars(\Rick\Input::post('phone')),
			htmlspecialchars(\Rick\Input::post('address')),
			htmlspecialchars(\Rick\Input::post('address2')),
			htmlspecialchars(\Rick\Input::post('city')),
			htmlspecialchars(\Rick\Input::post('state')),
			htmlspecialchars(\Rick\Input::post('zip')),
			htmlspecialchars(\Rick\Input::post('country')),
			htmlspecialchars(\Rick\Input::post('send-book')),
			htmlspecialchars(\Rick\Input::post('comments')),
			htmlspecialchars(\Rick\Input::post('first-name')),
			htmlspecialchars(\Rick\Input::post('last-name')),
			htmlspecialchars(\Rick\Input::post('job-title')),
		];
	}
	
	private function emailWasSentSuccessfully()
	{
		return $this->emailSentStatus;
	}
	
	private function setResponseForSuccessfulSend()
	{
		$this->header = \Rick\Lang::get('contactSuccessfulSendHeader');
		$this->message = \Rick\Lang::get('contactSuccessfulSendMessage');
		$this->responseType = 'positive';
		$this->errorType = 'success';
	}
	
	private function setResponseForEmailNotSent()
	{
		$this->header = \Rick\Lang::get('contactMessageNotSentHeader');
		$this->message = \Rick\Lang::get('contactMessageNotSentMessage');
		$this->responseType = 'negative';
		$this->errorType = 'not sent';
	}
	
	private function setResponseArray()
	{
		$this->responseJson = [
			'header'		=> $this->header,
			'message'		=> $this->message,
			'responseType'	=> $this->responseType,
			'errorType'		=> $this->errorType,
			'csrf'			=> \Rick\CSRF::getToken()
		];
	}
}
