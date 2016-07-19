<?php
namespace App;

class Functions{

	/**
	 * Function Slug
	 * @param $name
	 * @return string
	 * Return the name at the format my-section-title
	 */
	public static function slug($name){
		return strtolower(preg_replace("/[^a-zA-Z]+/", "-", $name));
	}

}