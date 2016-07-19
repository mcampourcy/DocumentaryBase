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
function icon($name, $margin_left = 0, $margin_right = 2, $add_class = ''){
    $i_prefix = substr($name, 0, 3); //extract an eventual 'fa-' prefix
    $i_name = ($i_prefix == 'fa-') ? substr($name, 3) : $name;
    $icon = '<i class="fa fa-'.$i_name.' '.$add_class.'" style="margin-left: '.$margin_right.', margin-left: '.$margin_left.' aria-hidden="true"></i>';
    return $icon;
}