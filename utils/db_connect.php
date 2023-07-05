<?php 


try {
    $pdo = new PDO('mysql:host=localhost;dbname=hospitale2n;charset=utf8','root','', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\Throwable $th) {
    die('erreur db');
}