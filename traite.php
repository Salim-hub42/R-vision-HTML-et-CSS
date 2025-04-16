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

if (isset($_POST['ok'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Validation des champs
    if (empty($nom) || empty($prenom) || empty($email) || empty($pass)) {
        echo "Tous les champs sont obligatoires !";
    } else {
        // Connexion à la base de données 
       

        // Hashage du mot de passe
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        // Insertion dans la base de données
        $requete = $connexion->prepare("INSERT INTO gotrenk VALUES (0, :nom, :prenom, :email, :pass)");
        $success = $requete->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'pass' => $pass
        ]);

        if ($success) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur lors de l'inscription !";
        }
    }
}
header("Location: index.php"); // Rediriger vers index.php après le traitement
exit(); // Terminer le script pour éviter d'afficher du contenu supplémentaire

?>
