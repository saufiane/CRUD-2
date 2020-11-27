<?php
require_once('libraries/database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire saisie de data</title>
</head>

<body>
    <!---  Formulaire method post send $var to recept.php 
with simple type en name only no more need today-->
    <form action="creation.php" method="post">
        <input type="text" name="prenom"><br>
        <input type="text" name="nom"><br>
        <input type="email" name="email"><br>
        <input type="text" name="telephone"><br>
        <input type="text" name="groupe"><br>
        <input type="submit" name="submit" value="Créé">
    </form>
    <?php
     $users = readUsers();
        foreach ($users as $key => $value) {
            echo "<br>".$value['prenom']."<a href='supprimer.php?id=".$value['id']."'>Supprimer</a>";
            echo "<br>".$value['nom']."<a href='maj.php?id=".$value['id']."&prenom=".$value['prenom']."&nom=".$value['nom']."&email=".$value['email']."&telephone=".$value['telephone']."&groupe=".$value['groupe']."'onclick='return confirm('Effacer la facture n°".$value['id'].";' >Mise a jour</a>";
            echo "<br>".$value['email'];
            echo "<br>".$value['telephone'];
            echo "<br>".$value['groupe']."<br>";
    }
    ?>
</body>

</html>