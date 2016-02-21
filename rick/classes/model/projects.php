<?php

namespace Rick\Model;

class Projects
{
	public static function getProjects()
	{
		return \Rick\DB::getTableData('projects', "`ordered` ASC");
	}
}
