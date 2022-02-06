<?php 
require 'db_config.php';
require_once 'fonctions.php';

function userAll($mysqlclient){
    $sqlQuery = 'SELECT * FROM user ORDER BY prenom ASC';
    $users = $mysqlclient->prepare($sqlQuery);
    $users->execute();
    //Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
    return $users->fetchAll();
}

function produitAll($mysqlclient){
    $sqlQuery = 'SELECT * FROM produit ORDER BY titre ASC';
    $produits = $mysqlclient->prepare($sqlQuery);
    $produits->execute();
    //Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
    return $produits->fetchAll();
}

function addAchat($mysqlclient, $newAchat){
    $sqlQuery = 'INSERT INTO achat(id_user, id_produit, date_achat ) VALUE (:id_user, :id_produit, :date_achat)';
    $insertAchat = $mysqlclient->prepare($sqlQuery);
    $insertAchat->execute ([
        'id_user' => $newAchat['id_user'],
        'id_produit' => $newAchat['id_produit'],
        'date_achat' => date("Y-m-d"),
    ]);
}

function achatAllById($mysqlclient){

    $sqlQuery = 'SELECT * FROM achat ORDER BY id ASC';
    $achats = $mysqlclient->prepare($sqlQuery);
    $achats->execute();
    //Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
    return $achats->fetchAll();

}

function delAchat($mysqlclient, $id){
    $sqlQuery= 'DELETE FROM achat WHERE id = '.$id.'';
    $achats = $mysqlclient->prepare($sqlQuery);
    $achats->execute();
}


function updateAchats($mysqlclient, $achatUpdate){
    $sqlQuery = 'UPDATE achat SET id_user = :id_user, id_produit = :id_produit WHERE id = :id';
    $updateAchat = $mysqlclient->prepare($sqlQuery);
    $updateAchat->execute([
      'id' => $achatUpdate['id'],
      'id_user' => $achatUpdate['id_user'],
      'id_produit' => $achatUpdate['id_produit']
    ]);
}

if( isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $achatSelect = achatSelect($mysqlclient, $id);
  }

if ($_POST){
    if(isset($_POST['suppr']) && !empty($_POST['suppr'])){
        $id = $_POST['id'];
        delAchat($mysqlclient,$id);
    }else{ 
        if(isset($_POST['id_user']) && !empty($_POST['id_user']) && isset($_POST['id_produit']) && !empty($_POST['id_produit'])){
            if (isset($_POST['id']) && !empty($_POST['id'])){
            $achatUpdate = $_POST;
            updateAchats($mysqlclient,$achatUpdate);
            
          
        }else { 
        $newAchat = $_POST;
        addAchat($mysqlclient, $newAchat);    
            }
        }else{
            echo 'Completez tous les champs';
        }
    }
}
$achats = achatAllById($mysqlclient);