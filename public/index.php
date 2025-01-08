<?php

use Core\Router;
use Dotenv\Dotenv;

define('BASE_DIR', dirname(__DIR__));

require_once BASE_DIR . '/vendor/autoload.php';

try {
    require_once BASE_DIR . '/routes/api.php';

    Dotenv::createUnsafeImmutable(BASE_DIR)->load();
    Router::dispatch($_SERVER['REQUEST_URI']);
} catch (Throwable $exception) {
    dd($exception);
}
