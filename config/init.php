<?php

define("DEBUG", 1);  // 1 - dev, 0 - prod
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/store/core');
define("LIBS", ROOT . '/vendor/store/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'watches');

// http://localhost:8888/webStore/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

// http://localhost:8888/webStore/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);

// http://localhost:8888/webStore/
$app_path = str_replace('public/', '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . 'admin');

require_once ROOT . '/vendor/autoload.php';