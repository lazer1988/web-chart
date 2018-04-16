<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\App;

define('APP_ROOT', basename(__DIR__));
define('APP_CACHE', APP_ROOT.'/var/cache');
define('APP_LOGS', APP_ROOT.'/var/logs');

$app = new App();
$app->run();
