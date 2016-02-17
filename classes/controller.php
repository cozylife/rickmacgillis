<?php

namespace Rick;

class Controller
{
	public static function page($page)
	{
		static::{'page_' . $page}();
	}
	
	public static function __callStatic($method, array $params)
	{
		throw new HttpNotFoundException(str_replace('page_', '', $method));
	}
	
	public static function page_index()
	{
		$pageData = [
			'skillTable'	=> Skills::getSkillTableArray(),
			'skillColors'	=> Skills::getSkillColorsArray(),
			'testimonials'	=> Model\Testimonials::getTestimonials(),
			'projects'		=> Model\Projects::getProjects(),
			'csrf'			=> CSRF::getToken(),
		];
		View::displayPage('index', $pageData);
	}
	
	public static function page_contact()
	{
		if (empty($_POST)) {
			throw new HttpNotFoundException();
		} else {
			
			$contact = new Model\Contact();
			$contact->handleFormSubmission();
			echo $contact->getResponseJson();
			
		}
	}
	
	public static function page_404()
	{
		View::displayPage('404');
	}
}
