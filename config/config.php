<?php

$settings = parse_ini_file('settings.ini.php', true);

// le chemin relatif pour aller au dossier private dépend du serveur courant
$relpath = '../../private/doc/';

// --- GENERAL
define('PRIVATE_ROOT', isset($settings['url']['private_root']) ? $settings['url']['private_root'] : '');
define('PUBLIC_ROOT', isset($settings['url']['public_root']) ? $settings['url']['public_root'] : '');
define('FO_URL', isset($settings['url']['fo_url']) ? $settings['url']['fo_url'] : '');

// --- UPLOAD
define('UPLOAD_PATH', PUBLIC_ROOT . 'upload/');
define('UPLOAD_URL', FO_URL . 'upload/');
define('UPLOAD_IMG_DIR', 'images');
define('UPLOAD_IMG_MAXSIZE', 100); // en ko
define('UPLOAD_IMG_EXT', 'jpg|png');
define('UPLOAD_DOC_DIR', 'documents');
define('UPLOAD_DOC_MAXSIZE', 100); // en ko
define('UPLOAD_DOC_EXT', 'doc|pdf');

// --- DB
define('DB_HOST', isset($settings['database']['host']) ? $settings['database']['host'] : 'localhost');
define('DB_NAME', isset($settings['database']['name']) ? $settings['database']['name'] : '');
define('DB_PORT', isset($settings['database']['port']) ? $settings['database']['port'] : '');
define('DB_USER', isset($settings['database']['user']) ? $settings['database']['user'] : '');
define('DB_PASS', isset($settings['database']['pass']) ? $settings['database']['pass'] : '');