<?php
require 'db_config.php';

function userSelect($mysqlclient, $id){
    
    $sqlQuery = 'SELECT * FROM user WHERE id = '.$id.'';
    $users = $mysqlclient->prepare($sqlQuery);
    $users->execute();
    return $users->fetch(PDO::FETCH_ASSOC);
}

function produitSelect($mysqlclient, $id){
    
    $sqlQuery = 'SELECT * FROM produit WHERE id = '.$id.'';
    $produits = $mysqlclient->prepare($sqlQuery);
    $produits->execute();
    return $produits->fetch(PDO::FETCH_ASSOC);
}
function achatSelect($mysqlclient, $id){
    
    $sqlQuery = 'SELECT * FROM achat WHERE id = '.$id.'';
    $achats = $mysqlclient->prepare($sqlQuery);
    $achats->execute();
    return $achats->fetch(PDO::FETCH_ASSOC);
}
