<?php

/**
* Function icon
* @param $name
* @param int $margin_left
* @param int $margin_right
* @param string $add_class
* @return string
* Return a FontAwesome Icon
*/
function icon($name, $margin_left = '0px', $margin_right = '10px', $add_class = ''){
    $i_prefix = substr($name, 0, 3); //extract an eventual 'fa-' prefix
    $i_name = ($i_prefix == 'fa-') ? substr($name, 3) : $name;
    $icon = '<i class="fa fa-'.$i_name.'" style="margin-left: '.$margin_left.'; margin-right: '.$margin_right.'" class="'.$add_class.'" aria-hidden="true"></i>';
    return $icon;
}

/**
 * Function validateDate
 * @param $date
 * @param string $format
 * @return bool
 * Check if the date is at the format YYYY-MM-DD hh:mm:ss
 */
function validateDate($date, $format = 'Y-m-d H:i:s'){
    $d = \DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function dateToFrench($date){
    $format = '%A %d %B %Y';
    setlocale(LC_TIME, 'french');
    return utf8_encode(strftime($format, strtotime($date)));
}