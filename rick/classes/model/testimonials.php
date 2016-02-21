<?php

namespace Rick\Model;

class Testimonials
{
	public static function getTestimonials()
	{
		return \Rick\DB::getTableData('testimonials', "`ordered` ASC");
	}
}
