<?php

require_once __DIR__.'/vendor/autoload.php';

use App\App;

define('APP_ROOT', __DIR__);
define('APP_CACHE', __DIR__.'/var/cache');
define('APP_LOGS', __DIR__.'/var/logs');

$app = new App();
$app->run();
