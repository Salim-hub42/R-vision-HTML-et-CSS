<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Révision</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>

    </header>
    <main>
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







?>
</main>
    <footer>

    </footer>
</body>

</html>