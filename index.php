<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css" />
        <link rel="stylesheet" href="style.css" />
  <title>TP_3</title>
</head>
<body>
<?php require 'layout/header.php';
?>
      
  <h1>TP transmissions de données</h1>

  

  <?php


  //Ce sujet à pour objectif de tester vos compétences techniques (php et sql) en situation réélle.

  //Exercice 1 : Création de la base de données 
  //Créez une base de données que vous appellerez « production ».
  //A l’intérieur de celle-ci, vous créerez trois tables que vous appellerez 
  //« user », « achat » et « produit » avec les champs suivants :

  // Table : user
  // Champs :
  // - id (PK – AI)
  // - prenom (VARCHAR(30))

  // Table : achat
  // Champs :
  // - id(PK – AI – INT(3))
  // - id_produit (FK)
  // - id_user (FK)
  // - date_achat (DATE)

  // Table : Produit
  // Champs :
  // - id(PK – AI)
  // - titre (VARCHAR(50))
  // - description (TEXT)
  // - prix (int)


  //Exercice 2 : Création de la base de données 
  // Prévoir 3 affichages :
  // - users
  // - achat
  // - produit
  // Mettre en place un menu de navigation pour accèder aux différents affichages (1 affichage par entité).

  //Exercice 3 - formulaire et enregistrement des donnees
  // - Créez un formulaire pour chaque entité : user, achat et produit.
  // - Réaliser des contrôles de saisies.
  // - Enregistrer les données dans les tables correspondantes de la base.

  //Exercice 4 - Affichage
  //Pour chaque entité, créer une partie qui affichera chaque table sql en table html sur la page web. ( « user », « achat » et « produit » ).
  
  //Exercice 5 – Modification et Suppression
  // - Développer une option permettant la suppression des enregistrements (prévoir un message demandant une confirmation).
  // - Développer une option permettant la modification des enregistrements (prévoir l'ouverture d'un formulaire pour effectuer les modifications).
  // Ces deux actions doivent être possible directement via la page web pour toutes les données (user, achat et produit).
    

  // Resultat attendu :
  // Un menu : user, achat, Produit

  // Chaque page me renvoie à un tableau pouvant à la fois saisir des nouvelles données, modifier et supprimer
  // Pour id_produit et id_user voir comment récupérer tout les élèments de manière automatique via la base de données.  

    

  ?>

  

</body>
</html>