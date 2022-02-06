<?php
require 'db_config.php';
require_once 'fonctions.php';

function addUser($newUser, $mysqlclient){ // fonction ajout user
    $sqlQuery = 'INSERT INTO user(prenom) VALUE (:prenom)';
    $insertUser = $mysqlclient->prepare($sqlQuery);
    $insertUser->execute ([
        'prenom' => $newUser['prenom'],
    ]);
}

function userAllById($mysqlclient){


    $sqlQuery = 'SELECT * FROM user ORDER BY id ASC';
    $users = $mysqlclient->prepare($sqlQuery);
    $users->execute();
    //Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
    return $users->fetchAll();
}

function userUpdate($mysqlclient, $userUpdate){
    $sqlQuery = 'UPDATE user SET prenom = :prenom WHERE id = :id';
    $updateUser = $mysqlclient->prepare($sqlQuery);
    $updateUser->execute([
      'id' => $userUpdate['id'],
      'prenom' => $userUpdate['prenom']
    ]);
}

function delUser($mysqlclient, $id){
    $sqlQuery= 'DELETE FROM user WHERE id = '.$id.'';
    $users = $mysqlclient->prepare($sqlQuery);
    $users->execute();
}



if( isset($_GET['id']) && is_numeric($_GET['id'])){

    $id = $_GET['id'];
    $userSelect = userSelect($mysqlclient, $id);
  }

if($_POST){ // Verification + appelle fonction ajout user
    if (isset($_POST['suppr']) && !empty($_POST['suppr'])){
        $id = $_POST['id'];
        delUser($mysqlclient, $id);
    }else{

    
    if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
        if (strlen($_POST['prenom']) < 30){
            if (isset($_POST['id'])&& !empty($_POST['id'])){
                $userUpdate = $_POST;
                userUpdate($mysqlclient, $userUpdate);
            }else{
                $newUser = $_POST;
                addUser($newUser,$mysqlclient);
            }
            
        }else {
            echo 'Vos prenom est trop long';
        } 
    }else {
        echo 'Veuillez remplir tous les champs';
    }
    }
}



$users = userAllById($mysqlclient);