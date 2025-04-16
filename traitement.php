<?php

$serveur = "localhost";
$login = "root";
$mdp = "";
try{
    $connexion = new PDO("mysql:host=$serveur;port=3307;dbname=familles",$login,$mdp);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
}
catch(PDOException $e){
    echo "Erreur de connexion : " . $e->getMessage();
}

if (isset($_POST['ok'])){
   $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   


   $requete = $connexion->prepare('INSERT INTO gotrenk VALUES (0, :nom, :prenom, :email, :pass)');
   $success = $requete->execute(array(
       'nom' => $nom,
       'prenom' => $prenom,
       'email' => $email,
       'pass' => $pass
   ));

header('Location: index.php');
   exit(); 
       echo "Inscription réussie !";
   } else {
       echo "Erreur lors de l'inscription.";
   }

 

?>
