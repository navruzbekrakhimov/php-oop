<?php

require_once 'autoload.php';

$connection = new DataBase('127.0.0.1','root','','oop_teach');
$pdo = $connection->connect();
Post::$pdo = $pdo;
// echo 'success';
