<?php

$dsn = 'mysql:dbname=monprojetblog;host=localhost:3306';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user,$password); 
    $pdo->exec('SET NAMES UTF8');
} catch (PDOException $Exception) {
    echo 'Erreur de connexion' .$Exception->getMessage();
} 


?>