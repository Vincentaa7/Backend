<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'backend_di231');
define('DB_USER', 'root');
define('DB_PASS', '');


try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    die("could not connect to the database " .DB_NAME. ":" . $e->getmessage());
}