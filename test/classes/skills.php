<?php

class SkillsTest extends \PHPUnit_Framework_TestCase
{
	public function testCanGetArrayOfSkillTableData()
	{
		$skills = \Rick\Skills::getSkillTableArray();
		$this->assertInternalType('array', $skills);
		$this->assertFalse(empty($skills));
	}
	
	public function testCanGetArrayOfSkillColorData()
	{
		$skills = \Rick\Skills::getSkillColorsArray();
		$this->assertInternalType('array', $skills);
		$this->assertFalse(empty($skills));
	}
}
