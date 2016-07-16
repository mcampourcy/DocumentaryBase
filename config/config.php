<?php

$settings = parse_ini_file('settings.ini.php', true);

// le chemin relatif pour aller au dossier private dépend du serveur courant
$relpath = '../../private/doc/';

// --- GENERAL
define('TEMPLATE_ROOT', isset($settings['url']['template_root']) ? $settings['url']['template_root'] : '');
define('PUBLIC_ROOT', isset($settings['url']['public_root']) ? $settings['url']['public_root'] : '');
define('FO_URL', isset($settings['url']['fo_url']) ? $settings['url']['fo_url'] : '');
define('FO_ROOT', isset($settings['url']['fo_root']) ? $settings['url']['fo_root'] : '');

define('DB_HOST', isset($settings['database']['host']) ? $settings['database']['host'] : 'localhost');
define('DB_NAME', isset($settings['database']['name']) ? $settings['database']['name'] : '');
define('DB_PORT', isset($settings['database']['port']) ? $settings['database']['port'] : '');
define('DB_USER', isset($settings['database']['user']) ? $settings['database']['user'] : '');
define('DB_PASS', isset($settings['database']['pass']) ? $settings['database']['pass'] : '');