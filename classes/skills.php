<?php

namespace Rick;

class Skills
{
	private $skillTypes = [];
	private $skills = [];
	
	private static $instance = null;
	
	public static function getSkillTableArray()
	{
		$instance = static::getInstance();
		$buffer = $instance->skillTypes;
		foreach ($instance->skills as $skill) {
			
			$skillTypeId = $skill['skilltypeid'];
			$skillType = &$buffer[$skillTypeId][0];
			if (array_key_exists('skills', $skillType) === false) {
				$skillType['skills'] = [];
			}
			
			$skillType['skills'][] = $skill['skill'];
			
		}
		
		return $buffer;
	}
	
	public static function getSkillColorsArray()
	{
		$instance = static::getInstance();
		$buffer = [];
		
		foreach ($instance->skills as $skill) {
			
			$buffer[$skill['id']] = [
				'skill' => $skill['skill'],
				'color' => $instance->skillTypes[$skill['skilltypeid']][0]['skillcolor']
			];
			
		}
		
		return $buffer;
	}
	
	private static function getInstance()
	{
		if (static::$instance === null) {
			static::$instance = new static;
		}
		
		return static::$instance;
	}
	
	private function __construct(){
		$this->skillTypes = \Rick\DB::getTableData('skilltypes', "`id` ASC", \PDO::FETCH_ASSOC|\PDO::FETCH_GROUP);
		$this->skills = \Rick\DB::getTableData('skills', "`skilltypeid`, `id` ASC");
	}
}
