<?php
require_once('libraries/database.php');

$id = trim($_GET['id']);
$prenom = $_GET['prenom'];
$nom = $_GET['nom'];
$email = $_GET['email'];
$telephone = $_GET['telephone'];
$groupe = $_GET['groupe'];

// si id est define & est un numeric dans _POST
if (isset( $_POST['id'] ) && is_numeric( $_POST['id'] ) )
   {
    $id = $_POST['id'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $groupe = $_POST['groupe'];
    updateUser($prenom, $nom, $email, $telephone, $groupe, $id);
    header('Location:index.php');
} 
else
    echo "/***********************************************************************************************************/";

 $majuser = readLastUser();
 print_r($majUser);
 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id" value=<?=$id?>>
        <input type="text" name="prenom" value=<?=$prenom?>>
        <input type="text" name="nom" value=<?=$nom?>>
        <input type="text" name="email" value=<?=$email?>>
        <input type="text" name="telephone" value=<?=$telephone?>>
        <input type="text" name="groupe" value=<?=$groupe?>>
        <input type="submit" value="MAJ">
    </form>
    <?php  echo "/***********************************************************************************************************/";?>
</body>
</html>