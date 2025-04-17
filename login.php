<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Connexion a la BDD</title>
</head>
<body>
   <h1> Connexion à la base de données </h1>
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
}//*    Connexion à la base de données *//

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $email = $_POST['email'];
   $pass = $_POST['pass'];

  if(!empty($email) && !empty ($pass)){
   $req = $connexion->prepare('SELECT * FROM gotrenk WHERE email = :email');
   $req->execute(['email' => $email]);
   $rep= $req->fetch();

  if ($rep){
   if(password_verify($pass, $rep['pass'])){
            // Connexion réussie
            setcookie('username', $email, time() + 7200); // Stocker uniquement l'email
            echo "Vous êtes connecté !";
}else{
   echo "Erreur d'authentification !";}
}}  }


?>

 <form method="POST" action="">
         <label for="email">Email:</label>
         <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
         <br>
         <label for="pass">Mot de passe:</label>
         <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe"required>
         <br>
         <input type="submit" value=" Se connecter "name="yo">
   </form>



</body>
</html>