<?php
try {
    $mysqlclient = new PDO('mysql:host=127.0.0.1:8889;dbname=production;charset=utf8','root','root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die ('Erreur :'.$e-> getMessage());
}
