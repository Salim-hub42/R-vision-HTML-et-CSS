<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Connexion a la BDD</title>
</head>

<body>

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
   } //*    Connexion à la base de données *//

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
      $pass = $_POST['pass'];

      if (!empty($email) && !empty($pass)) {
         // Rechercher l'utilisateur par email
         $req = $connexion->prepare('SELECT * FROM gotrenk WHERE email = :email');
         $req->execute(['email' => $email]);
         $rep = $req->fetch();

         if ($rep) {
            // Vérifier le mot de passe
            if (password_verify($pass, $rep['pass'])) {
               // Générer un token aléatoire
               $token = bin2hex(random_bytes(32));

               // Mettre à jour le token dans la base de données
               $update = $connexion->prepare('UPDATE gotrenk SET token = :token WHERE email = :email');
               $update->execute(['token' => $token, 'email' => $email]);
               setcookie('token', $token, time() + 3600, '/');
               setcookie('email', $email, time() + 3600, '/');
               header('Location: client.php');
               exit();
               echo "Vous êtes connecté avec succès !!!!";
            } else {
               echo "Mot de passe incorrect.";
            }
         } else {
            echo "Utilisateur non trouvé.";
         }
      } else {
         echo "Veuillez remplir tous les champs.";
      }
   }





   ?>

   <form method="POST" action="">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
      <br>
      <label for="pass">Mot de passe:</label>
      <input type="password" id="pass" name="pass" placeholder="Entrez votre mot de passe" required>
      <br>
      <input type="submit" value=" Se connecter " name="yo">
   </form>



</body>

</html>