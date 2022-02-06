<?php include_once 'fonctions/fonctions_user.php';?>

<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>Users</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Une description de la page" />
        <link rel="stylesheet" href="reset.css" />
        <link rel="stylesheet" href="style.css" />
        <script src="main.js" defer></script>
    </head>
    <body>
    <?php require 'layout/header.php';?>
    <main>
 
    <h1>Users</h1>
    <?php if(isset($userSelect['id'])&&!empty($userSelect['id'])&& !isset($_GET['suppr'])){ echo '<h2>Modifier</h2>';}elseif(isset($_GET['suppr'])&& $_GET['suppr'] == 1){ echo "<h2>Supprimer</h2>";}else{echo '<h2>Ajouter</h2>';}?>
    <form action="users.php" method="post">
      <input type="hidden" name="id" id="id" value ="<?php if(isset($userSelect['id'])&&!empty($userSelect['id'])){ echo $userSelect['id'];}?>">

      <?php 
      if(isset($_GET['suppr'])&& $_GET['suppr'] == 1){
        ?>
        <input type="hidden" name="suppr" id="suppr" value ="1">
        <input type="submit" value="La suppression est définitive">
        <?php
    }else{
      ?>
        <input type="hidden" name="id" id="id" value ="<?php if(isset($userSelect['id'])&&!empty($userSelect['id'])){ echo $userSelect['id'];}?>">
        <input type="text" name="prenom" id="prenom" placeholder="Prenom de l'user" value="<?php if(isset($userSelect['id'])&&!empty($userSelect['id'])){ echo $userSelect['prenom'];}?>">
        <input type="submit" value="<?php if(isset($userSelect['id'])&&!empty($userSelect['id'])){ echo 'MODIFIER';}else{echo 'AJOUTER';} ?>">
        <?php }?>
    </form>
    <?php

      

    ?>
    <a href="users.php">Ajouter utlisateurs</a>
    <br> <br> <br>
    <table>
          <thead>
            <tr>
              <th colspan="1">id</th>
              <th colspan="1">prenom</th>

            </tr>
          </thead>
          <tbody>
            <?php 
              foreach($users as $key => $user){ ?>
              <tr>
                <td><?=$user['id']?></td>
                <td><?=$user['prenom']?></td>


                <td>
                    <p><a href="users.php?id=<?=$user['id']?>">Editer</a> <a href="users.php?id=<?=$user['id']?>&suppr=1"">Supprimer</a></p> 

                </td>
              </tr>
            <?php
              }
            ?>
            <tr>
          </tbody>
        </table>
        

    </main>
    <?php require_once 'layout/footer.php'; ?>
   
        
    </body>
</html>
