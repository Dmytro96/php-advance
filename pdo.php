<?php
require_once __DIR__. '/vendor/autoload.php';

function db(): PDO
{
    $dsn = 'mysql:host=mysql;dbname=homework6;port=3306';
    $user = 'root';
    $password = 'secret';
    
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    
    return new PDO($dsn, $user, $password, $options);
}


$pdo = db();

$query = $pdo->prepare('SELECT * FROM cars');

$query->execute();

dd($pdo->lastInsertId());
