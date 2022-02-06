<?php
require_once 'db_config.php';
require_once 'fonctions.php';



function addProduit($newProduit,$mysqlclient){ // fonction ajout produit
    $sqlQuery = 'INSERT INTO produit(titre, description, prix ) VALUE (:titre, :description, :prix)';
    $insertProduit = $mysqlclient->prepare($sqlQuery);
    $insertProduit->execute ([
        'titre' => $newProduit['titre'],
        'description' => $newProduit['description'],
        'prix' => $newProduit['prix'],
    ]);
}

function produitAllById($mysqlclient){

    $sqlQuery = 'SELECT * FROM produit ORDER BY id ASC';
    $produits = $mysqlclient->prepare($sqlQuery);
    $produits->execute();
    //Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
    return $produits->fetchAll();
}



function produitUpdate($mysqlclient, $produitUpdate){
    $sqlQuery = 'UPDATE produit SET titre = :titre, description = :description, prix = :prix WHERE id = :id';
    $updateUser = $mysqlclient->prepare($sqlQuery);
    $updateUser->execute([
      'id' => $produitUpdate['id'],
      'titre' => $produitUpdate['titre'],
      'description' => $produitUpdate['description'],
      'prix' => $produitUpdate['prix']
    ]);
}

function delProduit($mysqlclient, $id){
  $sqlQuery= 'DELETE FROM produit WHERE id = '.$id.'';
  $produits = $mysqlclient->prepare($sqlQuery);
  $produits->execute();
}

if( isset($_GET['id']) && is_numeric($_GET['id'])){

    $id = $_GET['id'];
    $produitSelect = produitSelect($mysqlclient, $id);
  }
  if($_POST){ 
    if (isset($_POST['suppr']) && !empty($_POST['suppr'])){
      delProduit($mysqlclient, $_POST['id']);
  }else{// Verification + appelle fonction ajout produit
    if(isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['prix']) && !empty($_POST['prix'])){
        if(strlen($_POST['titre'])<50){
          if (isset($_POST['id']) && !empty($_POST['id'])){
            $produitUpdate = $_POST;
            produitUpdate($mysqlclient, $produitUpdate);
          }else{
            $newProduit = $_POST;
            addProduit($newProduit,$mysqlclient);
          }
        }else {
            echo 'Le titre du produit est trop long';
        }
    }else{
        echo 'Veuillez remplir tous les champs';
    }
  }
}





