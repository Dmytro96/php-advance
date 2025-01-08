<?php

use App\Controllers\AuthController;
use Core\Router;

Router::get('admin/users/{id:\d+}')
    ->controller(AuthController::class)
    ->action('register');

