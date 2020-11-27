<?php
require_once('libraries/database.php');

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$groupe = $_POST['groupe'];

$pdo = getPdo();
createUser($prenom, $nom, $email, $telephone, $groupe);
// header('Location:index.php');
$lastUser = readLastUser();
print_r($lastUser);