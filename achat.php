<?php
//require 'fonctions/fonctions_user.php';
// require 'fonctions/fonctions_produit.php';
 require 'fonctions/fonctions_achat.php';
 require_once 'fonctions/fonctions.php';
?>

<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <title>Achat</title>
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
    <h1>Achat</h1>
        <?php 
        $users = userAll($mysqlclient);
        $produits = produitAll($mysqlclient);
        
        
        ?>
        <?php if(isset($achatSelect['id'])&&!empty($achatSelect['id'])&& !isset($_GET['suppr'])){ echo '<h2>Modifier</h2>';}elseif(isset($_GET['suppr'])&& $_GET['suppr'] == 1){ echo "<h2>Supprimer</h2>";}else{echo '<h2>Ajouter</h2>';}?>
    <form action="achat.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php if(isset($achatSelect['id']) && !empty($achatSelect['id'])){ echo $achatSelect['id'];} ?>">
        
        <?php 
            if(isset($_GET['suppr'])&& $_GET['suppr'] == 1){
                ?>
                <input type="hidden" name="suppr" id="suppr" value ="1">
                <input type="submit" value="La suppression est définitive">
                <?php
            }else{

            
        ?>
        
        
        <span>Selectioner un utilisateur : </span>
            <select name="id_user" id="id_user">
                    <option value="">Selection un user</option>
                <?php 
                foreach ($users as $key => $user) {
                    
                    if ($achatSelect['id_user']==$user['id']){
                        echo'<option selected value ='.$user['id'].'>'.$user['prenom'].'</option>';
                        
                        }else{
                            echo'<option value ='.$user['id'].'>'.$user['prenom'].'</option>';
                        }
                        
                    }
                    ?>
                
            </select>
            <span>Selectionner un produit</span>
            <select name="id_produit" id="id_produit">
                <option  value="0">Selectionner un Produit</option>
                <?php
                foreach ($produits as $key => $produit) {
                    if($achatSelect['id_produit'] == $produit['id']){
                        echo'<option selected value ='.$produit['id'].'>'.$produit['titre'].'</option>';
                    }
                    echo'<option value ='.$produit['id'].'>'.$produit['titre'].'</option>';
                }
                ?>
            </select>
            <input type="submit" value="Enregistrer">
            
        
            <?php }
             ?>
        </form>
        <a href="achat.php">Ajouter achat</a>
        
        <br> <br> <br>
        <table>
              <thead>
                <tr>
                  <th colspan="1">id de l'achats</th>
                  <th colspan="1">prenom</th>
                  <th colspan="1">produits</th>
                  <th colspan="1">description</th>
                  <th colspan="1">prix</th>
                  <th colspan="1">date</th>
    
                </tr>
              </thead>
              <tbody>
                <?php 

                  foreach($achats as $key => $achat){ 
                      $user = userSelect($mysqlclient, $achat['id_user']);
                      $produit = produitSelect($mysqlclient, $achat['id_produit'])
                      ?>
                  <tr>
                    <td><?=$achat['id']?></td>
                    <td><?=$user['prenom']?></td>
                    <td><?=$produit['titre']?></td>
                    <td><?=$produit['description']?></td>
                    <td><?=$produit['prix']?>$</td>
                    <td><?=$achat['date_achat']?></td>
    
    
                    <td>
                  <p><a href="achat.php?id=<?=$achat['id']?>">Editer</a> <a href="achat.php?id=<?=$achat['id']?>&suppr=1">Supprimer</a></p> 
    
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