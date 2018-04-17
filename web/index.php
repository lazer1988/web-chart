<?php

define('APP_ROOT', dirname(__DIR__));
define('APP_CACHE', APP_ROOT.'/var/cache');
define('APP_LOGS', APP_ROOT.'/var/logs');

require_once APP_ROOT.'/vendor/autoload.php';

use App\App;

$app = new App();
$app->run();
