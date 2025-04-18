
<?php
$serveur = "localhost";
$login = "root";
$mdp = "";
try {
   $connexion = new PDO("mysql:host=$serveur;port=3307;dbname=familles", $login, $mdp);
   $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Connexion réussie !!";
} catch (PDOException $e) {
   echo "Erreur de connexion : " . $e->getMessage();
} //* Connexion à la base de données *//

$email = $_COOKIE['email'];
$token = $_COOKIE['token'];

if ($token) {

   $req = $connexion->prepare('SELECT * FROM gotrenk WHERE email = :email AND token = :token');
   $req->execute(['email' => $email, 'token' => $token]);
   $rep = $req->fetch();

   if ($rep['prenom'] != false) {
      echo "Bonjour " . $rep['prenom'] . " " . $rep['nom'] . ", vous êtes bien connecté !";
   }
} else {
   echo "Vous n'êtes pas connecté !";
}

?>