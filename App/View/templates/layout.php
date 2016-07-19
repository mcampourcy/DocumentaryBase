<?php
$menu_controller = new \App\Controller\menuController();
$menu = $menu_controller->buildMenu();
$filename = substr(key($datas), 0, -4);
require_once TEMPLATE_ROOT.'headerView.php';
include TEMPLATE_ROOT.'menuView.php';
include TEMPLATE_ROOT.$filename.'View.php';
require_once TEMPLATE_ROOT.'footerView.php';