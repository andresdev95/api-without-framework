<?php
require __DIR__ . '/vendor/autoload.php';

$app = new App\Lib\App;

$app->configPath(require __DIR__ . '/src/config/paths.php');

$app->run();
