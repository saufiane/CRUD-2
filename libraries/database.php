<?php

function getPdo() : PDO
{
 /** 
 * $options = tableau MODE exceptions et Attribus FETCH MODE par default a ASSOC
 */
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
try {
   $pdo = new PDO('mysql:host=localhost;dbname=tutopdo;charset=utf8','root','', $options);
     }
 catch (PDOException $e) {
         echo 'Connection failed: ' . $e->getMessage();
     }

    return $pdo;
}

function createUser(string $prenom,string $nom,string $email,string $telephone,string $groupe) :bool
{
    $pdo = getPdo();
    $query = $pdo->prepare('INSERT INTO user (prenom, nom, email, telephone, groupe) VALUES (:prenom, :nom, :email, :telephone, :groupe)');
    $query->bindValue(':prenom',$prenom, PDO::PARAM_STR);
    $query->bindValue(':nom',$nom, PDO::PARAM_STR);
    $query->bindValue(':email',$email, PDO::PARAM_STR);
    $query->bindValue(':telephone',$telephone, PDO::PARAM_INT);
    $query->bindValue(':groupe',$groupe, PDO::PARAM_STR);
   if ($query->execute());
    return true;
}

function readUsers() : array
{
    $pdo = getPdo();
    $query = $pdo->query('SELECT * FROM user');
    $users = $query->fetchAll();
    return $users;     
}

function readLastUser() 
{
    $pdo = getPdo();
    $query = $pdo->query('SELECT * FROM user');
    $user = $query->fetchAll();
    $enduser = end($user);
  foreach ($enduser as $value) {
         echo "<br>Enregistrement->".$value;
  }
     echo "<br><a href='index.php'>retour</a>";
}

// Mise a jour de user en fonction de l'ID
function updateUser(string $prenom,string $nom,string $email,string $telephone,string $groupe,int $id) :bool
{
    $pdo = getPdo();
    $query = 'UPDATE user SET prenom =?, nom =?, email =?, telephone =?, groupe =? WHERE id =?';
    $stmt = $pdo->prepare($query);
    if (!$stmt->execute([$prenom, $nom, $email, $telephone, $groupe, $id]));
    return false;
}

function deleteUser(int $id)
{
    $pdo = getPdo();
    $query = 'DELETE FROM user WHERE id =?';
    $stmt= $pdo->prepare($query);
    if (!$stmt->execute([$id]));
    header('Location: index.php');
    exit();    
}
