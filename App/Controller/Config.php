<?php
namespace App\Controller;

class Config{

	/**
	 * Function Slug
	 * @param $name
	 * @return string
	 * Return the name at the format my-section-title
	 */
	public static function slug($name){
		return strtolower(preg_replace("/[^a-zA-Z]+/", "-", $name));
	}

	public static function icon($name, $margin_left = 0, $margin_right = 2, $add_class = ''){
		$icon = '<i class="fa fa-'.$name.' '.$add_class.'" style="margin-left: '.$margin_right.', margin-left: '.$margin_left.' aria-hidden="true"></i>';
		return $icon;
	}

}