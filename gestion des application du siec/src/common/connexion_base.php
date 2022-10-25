<?php
try{
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER;
    $pdo;
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(Exception $e){
    die('Erreur:' . $e->getMessage());
}
