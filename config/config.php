<?php

define('VIEW', 'c:\\xampp\\htdocs\\projets\\ZeProject\\App\\View');
define('DOCBASE', '/projets/ZeProject');

$settings = parse_ini_file('settings.ini.php', true);
define('DB_HOST', isset($settings['database']['host']) ? $settings['database']['host'] : 'localhost');
define('DB_NAME', isset($settings['database']['name']) ? $settings['database']['name'] : '');
define('DB_PORT', isset($settings['database']['port']) ? $settings['database']['port'] : '');
define('DB_USER', isset($settings['database']['user']) ? $settings['database']['user'] : '');
define('DB_PASS', isset($settings['database']['pass']) ? $settings['database']['pass'] : '');