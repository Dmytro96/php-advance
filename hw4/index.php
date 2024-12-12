<?php


use Classes\User;
use Classes\MethodNotFoundException;

spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    echo $classPath . "\n";
    
    if (file_exists($classPath)) {
        require_once $classPath;
    }
});


$user = new User();

try {
    $user->setName('John Doe');
    $user->setAge(30);
    $user->setEmail('john.doe@example.com');
} catch (MethodNotFoundException $e) {
    echo $e->getMessage();
}

print_r($user->getAll());
