<?php

use app\core\Router;

require __DIR__ . '/../vendor/autoload.php';

session_start();

dd($_SERVER);

Router::run();